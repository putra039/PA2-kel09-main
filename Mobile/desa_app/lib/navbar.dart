import 'package:desa_app/models/saranModel.dart';
import 'package:desa_app/pages/home/home.dart';
import 'package:desa_app/pages/Profile/settings_editprofile.dart';
import 'package:desa_app/pages/informasi/information_list.dart';
import 'package:desa_app/pages/pengajuan/createPengajuan.dart';
import 'package:bottom_navy_bar/bottom_navy_bar.dart';
import 'package:desa_app/pages/saran/createSaran.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

import 'dart:math';

import 'package:hexcolor/hexcolor.dart';

class NavbarPage extends StatefulWidget {
  final String authenticatedUserName;
  final dynamic authenticatedUser;
  final String authToken;

  const NavbarPage({required this.authenticatedUserName, required this.authenticatedUser, required this.authToken});

  @override
  NavbarPageState createState() => NavbarPageState();
}

class NavbarPageState extends State<NavbarPage> {
  String _itemSelected = 'item-1';
  bool _enableAnimation = true;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        bottom: false,
        child: Stack(
          children: <Widget>[
            AnimatedSwitcher(
              duration: const Duration(milliseconds: 700),
              switchOutCurve: const Interval(0.0, 0.0),
              transitionBuilder: (Widget child, Animation<double> animation) {
                final revealAnimation = Tween(begin: 0.0, end: 1.0).animate(
                    CurvedAnimation(parent: animation, curve: Curves.ease));
                return AnimatedBuilder(
                  builder: (BuildContext context, Widget? _) {
                    return _buildAnimation(
                        context, _itemSelected, child, revealAnimation.value);
                  },
                  animation: animation,
                );
              },
              child: _buildPage(_itemSelected),
            ),
          ],
        ),
      ),
      bottomNavigationBar: BottomNavyBar(
        selectedIndex: _getSelectedIndex(_itemSelected),
        onItemSelected: (index) {
          final selectedItem = _getSelectedItem(index);
          _changePage(selectedItem);
        },
        items: <BottomNavyBarItem>[
          BottomNavyBarItem(
            icon: Icon(Icons.home),
            title: Center(child: Text('Beranda')),
            activeColor: Colors.indigo,
          ),
          BottomNavyBarItem(
            icon: Icon(Icons.calendar_month_outlined),
            title: Center(child: Text('Kegiatan')),
            activeColor: Colors.indigo,
          ),
          BottomNavyBarItem(
            icon: Icon(Icons.add_box_rounded),
            title: Center(child: Text('Pengajuan')),
            activeColor: Colors.indigo,
          ),
          BottomNavyBarItem(
            icon: Icon(Icons.face),
            title: Center(child: Text('Profil')),
            activeColor: Colors.indigo,
          ),
          BottomNavyBarItem(
            icon: Icon(Icons.message),
            title: Center(child: Text('Pengaduan')),
            activeColor: Colors.indigo,
          ),
        ],
      ),
    );
  }

  void _changePage(String itemSelected) {
    if (_itemSelected != itemSelected && _enableAnimation) {
      _enableAnimation = false;
      setState(() => _itemSelected = itemSelected);
      Future.delayed(
          const Duration(milliseconds: 700), () => _enableAnimation = true);
    }
  }

  Widget _buildAnimation(BuildContext context, String itemSelected,
      Widget child, double valueAnimation) {
    switch (itemSelected) {
      case 'item-1':
        return Transform.translate(
            offset: Offset(
                .0,
                -(valueAnimation - 1).abs() *
                    MediaQuery.of(context).size.width),
            child: child);
      case 'item-2':
        return PageReveal(revealPercent: valueAnimation, child: child);
      case 'item-3':
        return Opacity(opacity: valueAnimation, child: child);
      case 'item-4':
        return Transform.translate(
            offset: Offset(
                -(valueAnimation - 1).abs() * MediaQuery.of(context).size.width,
                .0),
            child: child);
      case 'item-5':
        return Transform.translate(
            offset: Offset(
                (valueAnimation - 1).abs() * MediaQuery.of(context).size.width,
                .0),
            child: child);
      default:
        return Transform.translate(
            offset: Offset(
                .0,
                -(valueAnimation - 1).abs() *
                    MediaQuery.of(context).size.width),
            child: child);
    }
  }

  Widget _buildPage(String itemSelected) {
    switch (itemSelected) {
      case 'item-1':
        return Information(key: UniqueKey());
      case 'item-2':
        return HomePage(
            key: UniqueKey(),
            authenticatedUserName: widget.authenticatedUserName);
      case 'item-3':
        // return CreatePengajuan();
        return CreatePengajuan(authToken: widget.authToken);
      case 'item-4':
        return EditProfilePage(authenticatedUser: widget.authenticatedUser);
      case 'item-5':
        return CreateSaran(authToken: widget.authToken);
      default:
        return FlutterPage(key: UniqueKey(), backgroundColor: Colors.white);
    }
  }

  int _getSelectedIndex(String itemSelected) {
    switch (itemSelected) {
      case 'item-1':
        return 0;
      case 'item-2':
        return 1;
      case 'item-3':
        return 2;
      case 'item-4':
        return 3;
      case 'item-5':
        return 4;
      default:
        return 0;
    }
  }

  String _getSelectedItem(int index) {
    switch (index) {
      case 0:
        return 'item-1';
      case 1:
        return 'item-2';
      case 2:
        return 'item-3';
      case 3:
        return 'item-4';
      case 4:
        return 'item-5';
      default:
        return 'item-1';
    }
  }
}

class FlutterPage extends StatelessWidget {
  final Color? backgroundColor;
  final String? urlAsset;
  final String? title;

  const FlutterPage({Key? key, this.backgroundColor, this.urlAsset, this.title})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      color: backgroundColor,
      child: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            Image.asset(
              urlAsset!,
              width: 200.0,
              height: 200.0,
            ),
            SizedBox(height: 16.0),
            Text(
              title!,
              style: TextStyle(fontSize: 24.0, fontWeight: FontWeight.bold),
            ),
          ],
        ),
      ),
    );
  }
}

class PageReveal extends StatelessWidget {
  final double? revealPercent;
  final Widget? child;

  const PageReveal({Key? key, this.revealPercent, this.child})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ClipOval(
      child: child,
      clipper: CircleRevealClipper(revealPercent!),
    );
  }
}

class CircleRevealClipper extends CustomClipper<Rect> {
  final double revealPercent;

  CircleRevealClipper(this.revealPercent);

  @override
  Rect getClip(Size size) {
    final epicenter = Offset(size.width / 2, size.height / 2);
    double theta = atan(epicenter.dy / epicenter.dx);
    final distanceToCorner = epicenter.dy / sin(theta);
    final radius = distanceToCorner * revealPercent;
    final diameter = 2 * radius;

    return Rect.fromLTWH(epicenter.dx - radius, epicenter.dy - radius,
        diameter, diameter);
  }

  @override
  bool shouldReclip(CustomClipper<Rect> oldClipper) {
    return revealPercent != oldClipper;
  }
}
