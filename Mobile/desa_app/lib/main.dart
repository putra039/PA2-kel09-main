import 'package:desa_app/Core/Theme/theme_colors.dart';
import 'package:flutter/material.dart';
import 'package:get/get_navigation/src/root/get_material_app.dart';
import 'package:hexcolor/hexcolor.dart';
import 'package:flutter/painting.dart';

import 'pages/splash_screen.dart';

void main() {
  runApp(LoginUiApp());
}

class LoginUiApp extends StatelessWidget {
  Color _primaryColor = HexColor('#012668');
  Color _accentColor = HexColor('#0C2E69');

  @override
  Widget build(BuildContext context) {
    final ColorScheme colorScheme = ColorScheme.fromSwatch(
      primarySwatch: Colors.grey,
    ).copyWith(
      primary: ThemeColors().blue,
      secondary: _accentColor,
    );

    return GetMaterialApp(
      title: 'Pelayanan Desa',
      theme: ThemeData(
        colorScheme: colorScheme,
        scaffoldBackgroundColor: Colors.grey.shade100,
      ),
      home: SplashScreen(title: 'Pelayanan Desa'),
    );
  }
}


