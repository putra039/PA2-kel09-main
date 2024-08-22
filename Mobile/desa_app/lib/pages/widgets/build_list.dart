import 'package:animate_do/animate_do.dart';
import 'package:flutter/material.dart';
import 'package:desa_app/pages/widgets/build_item.dart';
import 'package:desa_app/models/informasiModel.dart';

Widget buildList({required List<InformationModel> items}) {
  return ListView.builder(
    itemCount: items.length,
    itemBuilder: (context, index) {
      return index.isEven
          ? FadeInLeft(
        duration: const Duration(milliseconds: 600),
        from: 400,
        child: buildItem(items: items, index: index),
      )
          : FadeInRight(
        duration: const Duration(milliseconds: 600),
        from: 400,
        child: buildItem(items: items, index: index),
      );
    },
  );
}
