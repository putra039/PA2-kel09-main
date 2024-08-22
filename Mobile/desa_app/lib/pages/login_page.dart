import 'package:desa_app/navbar.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:desa_app/common/theme_helper.dart';
import 'package:desa_app/core/services/apiService.dart';
import 'package:desa_app/models/userModel.dart';
import 'package:hexcolor/hexcolor.dart';
import 'package:rflutter_alert/rflutter_alert.dart';
import '../../Core/Animation/Fade_Animation.dart';

class LoginPage extends StatefulWidget {
  const LoginPage({Key? key}) : super(key: key);

  @override
  _LoginPageState createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  double _headerHeight = 250;
  Key _formKey = GlobalKey<FormState>();
  late TextEditingController _nikController;
  late TextEditingController _passwordController;
  String? authenticatedUserName = '';

  @override
  void initState() {
    super.initState();
    _nikController = TextEditingController();
    _passwordController = TextEditingController();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F7F7F7'),
      body: SingleChildScrollView(
        child: Column(
          children: [
            FadeAnimation(
              delay: 1,
              child: SafeArea(
                child: Container(
                  padding: EdgeInsets.all(20),
                  margin: EdgeInsets.symmetric(horizontal: 20, vertical: 200),
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(20),
                    boxShadow: [
                      BoxShadow(
                        color: Colors.black.withOpacity(0.1),
                        blurRadius: 10,
                        offset: Offset(0, 5),
                      ),
                    ],
                  ),
                  child: Column(
                    children: [
                      Text(
                        'Login',
                        style: TextStyle(
                          fontSize: 36,
                          color: Colors.indigo,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                      SizedBox(height: 10),
                      Text(
                        'Silahkan Login dengan Akun Anda',
                        style: TextStyle(color: Colors.grey),
                      ),
                      SizedBox(height: 30),
                      Form(
                        key: _formKey,
                        child: Column(
                          children: [
                            TextFormField(
                              controller: _nikController,
                              decoration: ThemeHelper().textInputDecoration(
                                'NIK',
                                'Masukkan Nik Anda',
                              ),
                              validator: (value) {
                                if (value == null || value.isEmpty) {
                                  return 'NIK harus diisi';
                                }
                                // Tambahkan validasi khusus lainnya sesuai kebutuhan
                                return null; // Mengembalikan null jika tidak ada pesan error
                              },
                            ),
                            SizedBox(height: 20),
                            TextFormField(
                              controller: _passwordController,
                              obscureText: true,
                              decoration: ThemeHelper().textInputDecoration(
                                'Password',
                                'Masukkan Password Anda',
                              ),
                              validator: (value) {
                                if (value == null || value.isEmpty) {
                                  return 'Password harus diisi';
                                }
                                // Tambahkan validasi khusus lainnya sesuai kebutuhan
                                return null; // Mengembalikan null jika tidak ada pesan error
                              },
                            ),
                            SizedBox(height: 20),
                            Container(
                              width: double.infinity,
                              decoration: ThemeHelper().buttonBoxDecoration(context),
                              child: ElevatedButton(
                                style: ThemeHelper().buttonStyle(),
                                onPressed: () async {
                                  final nik = _nikController.text;
                                  final password = _passwordController.text;

                                  try {
                                    final response = await ApiService().loginUser(User(
                                      nik: nik,
                                      password: password,
                                    ));

                                    if (response['access_token'] != null) {
                                      final accessToken = response['access_token'];
                                      ApiService().authToken = accessToken;

                                      // Set the authenticated user's name
                                      final userResponse = await ApiService().getUser(nik);
                                      final authenticatedUser = userResponse['data'];
                                      var authenticatedUserName = authenticatedUser['nama'];
                                      setState(() {
                                        authenticatedUserName = authenticatedUserName;
                                      });
                                      Navigator.pushReplacement(
                                        context,
                                        MaterialPageRoute(
                                          builder: (context) => NavbarPage(
                                            authenticatedUserName: authenticatedUserName ?? 'Unknown User',
                                            authenticatedUser: authenticatedUser,
                                            authToken: accessToken,
                                          ),
                                        ),
                                      );
                                    } else {
                                      Alert(
                                        context: context,
                                        title: response['msg'],
                                      ).show();
                                    }
                                  } catch (e) {
                                    Alert(
                                      context: context,
                                      title: 'Failed to login',
                                    ).show();
                                  }
                                },
                                child: Padding(
                                  padding: EdgeInsets.symmetric(vertical: 10),
                                  child: Text(
                                    'Sign In'.toUpperCase(),
                                    style: TextStyle(
                                      fontSize: 18,
                                      fontWeight: FontWeight.bold,
                                      color: Colors.white,
                                    ),
                                  ),
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
