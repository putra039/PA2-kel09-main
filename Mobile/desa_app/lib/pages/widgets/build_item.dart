import 'package:desa_app/Core/Theme/theme_colors.dart';
import 'package:desa_app/core/colors/Hex_Color.dart';
import 'package:flutter/material.dart';
import 'package:desa_app/pages/informasi/details.dart';
import 'package:velocity_x/velocity_x.dart';
import 'package:desa_app/models/informasiModel.dart';
import 'package:get/get.dart';

Widget buildItem({required List<InformationModel> items, required int index}) {
  return Hero(
    tag: 'Detail',
    child: Card(
      margin: const EdgeInsets.symmetric(horizontal: 5, vertical: 10),
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(20)),
      elevation: 10,
      child: Material(
        color: items[index].color,
        borderRadius: BorderRadius.circular(20),
        child: Padding(
          padding: const EdgeInsets.fromLTRB(12,12,12,12),
          child: Row(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              ClipRRect(
                borderRadius: BorderRadius.circular(12),
                child: Image.asset(
                  items[index].img,
                  width: 150,
                  height: 150,
                  fit: BoxFit.cover,
                ),
              ),
              const SizedBox(width: 10),
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    items[index].name.text
                        .size(25)
                        .bold
                        .maxLines(2)
                        .ellipsis
                        .white
                        .make(),
                    const SizedBox(height: 10),
                    items[index].location.text
                        .size(12)
                        .white
                        .semiBold
                        .make(),
                    const SizedBox(height: 10),
                    items[index].description.text
                        .white
                        .size(12)
                        .semiBold
                        .overflow(TextOverflow.ellipsis)
                        .make(),
                    const SizedBox(height: 10),
                    Center(
                      child: ElevatedButton(
                        onPressed: () {
                          Get.to(() => Scaffold(
                            body: DetailsScreen(
                              detail_item: items[index],
                            ),
                          ));
                        },
                        style: ElevatedButton.styleFrom(
                          primary: Colors.grey[100], // Set the background color here
                        ),
                        child: const Text(
                          'Lihat Details',
                          style: TextStyle(
                            color: Colors.black, // Change text color here
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
  );
}
