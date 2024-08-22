// ignore_for_file: prefer_const_literals_to_create_immutables, prefer_const_constructors

import 'package:badges/badges.dart' as Badges;
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart' as MaterialBadge;
import '../../core/theme/theme_colors.dart';

class ListTileWidget extends StatelessWidget {
  final String title;
  final String lastMessage;
  final String appLogoUrl;

  final dynamic onTap;
  const ListTileWidget({
    MaterialBadge.Key? key,
    required this.title,
    required this.lastMessage,
    required this.appLogoUrl,
    this.onTap,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(right: 15),
      child: MaterialBadge.ListTile(
        onTap: onTap,
        leading: MaterialBadge.Container(
          height: 50,
          width: 50,
          decoration: MaterialBadge.BoxDecoration(
            color: ThemeColors().blue,
            borderRadius: MaterialBadge.BorderRadius.circular(15),
            image: MaterialBadge.DecorationImage(
              fit: MaterialBadge.BoxFit.cover,
              image: MaterialBadge.NetworkImage(appLogoUrl),
            ),
          ),
        ),
        title: MaterialBadge.Text(title),
        subtitle: MaterialBadge.Text(lastMessage),
        trailing: MaterialBadge.Badge(
          backgroundColor: ThemeColors().blue,
        ),
      ),
    );
  }
}
