import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:desa_app/common/theme_helper.dart';
import 'package:http/http.dart' as http;
import 'package:rflutter_alert/rflutter_alert.dart';
import 'package:hexcolor/hexcolor.dart';
import 'package:velocity_x/velocity_x.dart';
import 'package:file_picker/file_picker.dart';
import 'package:flutter/services.dart';

import '../../Core/Animation/Fade_Animation.dart';
import '../../Core/services/apiService.dart';
import '../../models/pengajuanModel.dart';

class CreatePengajuan extends StatefulWidget {
  final String authToken;
  const CreatePengajuan({required this.authToken});

  @override
  _CreatePengajuanState createState() => _CreatePengajuanState();
}

class _CreatePengajuanState extends State<CreatePengajuan> {
  double _headerHeight = 250;
  Key _formKey = GlobalKey<FormState>();
  late TextEditingController _jenis_pengajuanController;
  late TextEditingController _deskripsiController;
  late TextEditingController _fileController;
  String? authenticatedUserName = '';

  @override
  void initState() {
    super.initState();
    _jenis_pengajuanController = TextEditingController();
    _deskripsiController = TextEditingController();
    _fileController = TextEditingController();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F7F7F7'),
      appBar: AppBar(
        elevation: 0,
        title: 'Pengajuan'.text.color(Colors.white).make(),
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
                        'Buat Pengajuan',
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
                            TextFormField(
                              controller: _jenis_pengajuanController,
                              decoration: ThemeHelper().textInputDecoration(
                                'Jenis Pengajuan',
                                'Masukkan Jenis Surat',
                              ),
                            ),
                            SizedBox(height: 20),
                            TextFormField(
                              controller: _deskripsiController,
                              decoration: ThemeHelper().textInputDecoration(
                                'Deskripsi',
                                'Masukkan Deskripsi',
                              ),
                              maxLines: null,
                            ),
                            SizedBox(height: 20),
                            TextFormField(
                              controller: _fileController,
                              decoration: ThemeHelper().textInputDecoration(
                                'File',
                                'Masukkan Nama File',
                              ),
                              readOnly: true,
                              onTap: () async {
                                FilePickerResult? result =
                                await FilePicker.platform.pickFiles(
                                  type: FileType.custom,
                                  allowedExtensions: ['doc', 'docx', 'pdf'],
                                );

                                if (result != null) {
                                  PlatformFile file = result.files.first;
                                  setState(() {
                                    _fileController.text = file.name;
                                  });
                                }
                              },
                            ),
                            SizedBox(height: 20),
                            Container(
                              decoration:
                              ThemeHelper().buttonBoxDecoration(context),
                              child: ElevatedButton(
                                style: ThemeHelper().buttonStyle(),
                                onPressed: () async {
                                  final jenis_pengajuan =
                                      _jenis_pengajuanController.text;
                                  final deskripsi = _deskripsiController.text;
                                  final file = _fileController.text;

                                  final pengajuan = Pengajuan(
                                    jenis_pengajuan: jenis_pengajuan,
                                    deskripsi: deskripsi,
                                    file: file,
                                  );

                                  final response = await ApiService().addPengajuan(pengajuan,
                                      widget.authToken);

                                  // try {
                                  //
                                  //
                                  //   if (response.statusCode == 200) {
                                  //     final responseData =
                                  //     jsonDecode(response.body);
                                  //     print('Response body: $responseData');
                                  //   } else {
                                  //     throw Exception('Failed to add pengajuan');
                                  //   }
                                  // } catch (e) {
                                  //   Alert(
                                  //     context: context,
                                  //     title: 'Failed to add pengajuan',
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
