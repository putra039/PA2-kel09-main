import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:desa_app/common/theme_helper.dart';
import 'package:http/http.dart' as http;
import 'package:rflutter_alert/rflutter_alert.dart';
import 'package:hexcolor/hexcolor.dart';
import 'package:velocity_x/velocity_x.dart';
import 'package:flutter/services.dart';

import '../../Core/Animation/Fade_Animation.dart';
import 'package:desa_app/core/services/apiService.dart';
import '../../models/saranModel.dart';

class CreateSaran extends StatefulWidget {
  final String authToken;
  const CreateSaran({required this.authToken});

  @override
  _CreateSaranState createState() => _CreateSaranState();
}

class _CreateSaranState extends State<CreateSaran> {
  double _headerHeight = 250;
  Key _formKey = GlobalKey<FormState>();
  late TextEditingController _saranController;
  String? authenticatedUserName = '';

  @override
  void initState() {
    super.initState();
    _saranController = TextEditingController();
    }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F7F7F7'),
      appBar: AppBar(
        elevation: 0,
        title: 'Saran'.text.color(Colors.white).make(),
        backgroundColor: Colors.indigo,
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            FadeAnimation(
              delay: 1,
              child: SafeArea(
                child: Container(
                  padding: EdgeInsets.all(20),
                  margin: EdgeInsets.symmetric(horizontal: 20, vertical: 100),
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
                        'Buat Pengaduan',
                        style: TextStyle(
                          fontSize: 24,
                          color: Colors.indigo,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                      SizedBox(height: 10),
                      Text(
                        'Isi data dan surat yang ingin Anda ajukan',
                        style: TextStyle(
                          color: Colors.grey,
                          fontSize: 14,
                        ),
                      ),
                      SizedBox(height: 30),
                      Form(
                        key: _formKey,
                        child: Column(
                          children: [
                            
                            SizedBox(height: 20),
                            TextFormField(
                              controller: _saranController,
                              decoration: ThemeHelper().textInputDecoration(
                                'Pengaduan',
                                'Masukkan Pengaduan',
                              ),
                              maxLines: null,
                            ),
                            SizedBox(height: 20),
                            Container(
                              decoration:
                              ThemeHelper().buttonBoxDecoration(context),
                              child: ElevatedButton(
                                style: ThemeHelper().buttonStyle(),
                                onPressed: () async {
                                  final saran = _saranController.text;
                                  
                                  final srn = Saran(
                                    saran: saran,
                                    );
                                  final response = await ApiService().addSaran(srn, widget.authToken);

                                  // try {
                                  //
                                  //   if (response.statusCode == 200 || response.statusCode == 201) {
                                  //     final responseData =
                                  //     jsonDecode(response.body);
                                  //     print('Response body: $responseData');
                                  //   } else {
                                  //     throw Exception('Failed to add saran');
                                  //   }
                                  // } catch (e) {
                                  //   Alert(
                                  //     context: context,
                                  //     title: 'Failed to add saran',
                                  //   ).show();
                                  // }
                                },
                                child: Padding(
                                  padding: EdgeInsets.symmetric(vertical: 10),
                                  child: Text(
                                    'Kirim'.toUpperCase(),
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
