// // This widget will draw header section of all page. Wich you will get with the project source code.
//
// import 'package:flutter/material.dart';
//
// class HeaderWidget extends StatefulWidget {
//   final double _height;
//   final bool _showIcon;
//   final IconData _icon;
//
//   const HeaderWidget(this._height, this._showIcon, this._icon, {Key? key}) : super(key: key);
//
//   @override
//   _HeaderWidgetState createState() => _HeaderWidgetState(_height, _showIcon, _icon);
// }
//
// class _HeaderWidgetState extends State<HeaderWidget> {
//   double _height;
//   bool _showIcon;
//   IconData _icon;
//
//   _HeaderWidgetState(this._height, this._showIcon, this._icon);
//
//   @override
//   Widget build(BuildContext context) {
//     double width = MediaQuery.of(context).size.width;
//     final Color primaryColor = Theme.of(context).colorScheme.primary;
//     final Color accentColor = Theme.of(context).colorScheme.secondary;
//
//
// }
//
// class ShapeClipper extends CustomClipper<Path> {
//   List<Offset> _offsets = [];
//   ShapeClipper(this._offsets);
//   @override
//   Path getClip(Size size) {
//     var path = new Path();
//
//     path.lineTo(0.0, size.height-20);
//
//     // path.quadraticBezierTo(size.width/5, size.height, size.width/2, size.height-40);
//     // path.quadraticBezierTo(size.width/5*4, size.height-80, size.width, size.height-20);
//
//     path.quadraticBezierTo(_offsets[0].dx, _offsets[0].dy, _offsets[1].dx,_offsets[1].dy);
//     path.quadraticBezierTo(_offsets[2].dx, _offsets[2].dy, _offsets[3].dx,_offsets[3].dy);
//
//     // path.lineTo(size.width, size.height-20);
//     path.lineTo(size.width, 0.0);
//     path.close();
//
//
//     return path;
//   }
//
//   @override
//   bool shouldReclip(CustomClipper<Path> oldClipper) => false;
// }
