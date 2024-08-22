import 'package:animate_do/animate_do.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:desa_app/consts.dart';
import 'package:velocity_x/velocity_x.dart';
import '../widgets/build_list.dart';

class Information extends StatelessWidget {
  const Information({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.grey[100],
      appBar: AppBar(
        elevation: 0,
        title: 'Informasi Seputar Desa'.text.color(Colors.white).make(),
        backgroundColor: Colors.indigo,
      ),
      body: Padding(
        padding: const EdgeInsets.only(left: 20, right: 20),
        child: DefaultTabController(
          length: 3,
          child: Column(
            children: [
              const TabBar(
                labelColor: Colors.black,
                tabs: [
                  Tab(
                    text: 'Semua',
                  ),
                  Tab(
                    text: 'Tempat Ibadah',
                  ),
                  Tab(
                    text: 'Wisata Budaya',
                  ),
                ],
              ),
              Expanded(
                child: TabBarView(
                  children: [
                    buildList(items: semuaInformasi),
                    buildList(items: daftarTempatIbadah),
                    buildList(items: daftarWisataBudaya),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
