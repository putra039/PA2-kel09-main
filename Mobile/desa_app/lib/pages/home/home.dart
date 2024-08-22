import 'package:desa_app/core/colors/Hex_Color.dart';
import 'package:desa_app/models/userModel.dart';
import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:velocity_x/velocity_x.dart';
import '../../Core/Theme/theme_colors.dart';
import '../../core/widgets/custom_widget.dart';
import '../../core/widgets/widget_home.dart';
import 'package:desa_app/models/kegiatanModel.dart';
import 'package:desa_app/core/services/apiService.dart';
import 'package:marquee/marquee.dart';

class HomePage extends StatefulWidget {
  final String authenticatedUserName;
  HomePage({required this.authenticatedUserName, Key? key}) : super(key: key);

  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  List<Kegiatan> todayKegiatan = [];
  List<Kegiatan> inProgressKegiatan = [];
  List<Kegiatan> pastKegiatan = [];

  @override
  void initState() {
    super.initState();
    fetchKegiatanData();
  }

  Future<void> fetchKegiatanData() async {
    try {
      final kegiatanResponse = await ApiService().getKegiatan(Kegiatan());

      if (kegiatanResponse is Map<String, dynamic> &&
          kegiatanResponse.containsKey('data')) {
        final List<dynamic> kegiatanData = kegiatanResponse['data'];

        final List<Kegiatan> kegiatanList = kegiatanData.map((data) {
          final kegiatan = Kegiatan.fromJson(data);
          return kegiatan;
        }).toList();

        final DateTime now = DateTime.now();

        final List<Kegiatan> todayKegiatan = kegiatanList.where((kegiatan) {
          final DateTime startDate = DateTime.parse(kegiatan.tanggal_mulai!);
          final DateTime endDate = DateTime.parse(kegiatan.tanggal_akhir!);
          return startDate.day == now.day &&
              startDate.month == now.month &&
              startDate.year == now.year &&
              endDate.isAfter(now);
        }).toList();

        final List<Kegiatan> inProgressKegiatan = kegiatanList.where((kegiatan) {
          final DateTime startDate = DateTime.parse(kegiatan.tanggal_mulai!);
          final DateTime endDate = DateTime.parse(kegiatan.tanggal_akhir!);
          return endDate.day >= now.day &&
              endDate.month >= now.month &&
              endDate.year >= now.year &&
              endDate.isAfter(now);
        }).toList();

        final List<Kegiatan> pastKegiatan = kegiatanList.where((kegiatan) {
          final DateTime endDate = DateTime.parse(kegiatan.tanggal_akhir!);
          return endDate.isBefore(now);
        }).toList();

        setState(() {
          this.todayKegiatan = todayKegiatan;
          this.inProgressKegiatan = inProgressKegiatan;
          this.pastKegiatan = pastKegiatan;
        });
      } else {
        print('Invalid kegiatan response format: $kegiatanResponse');
      }
    } catch (error) {
      print('Failed to fetch kegiatan data: $error');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F7F7F7'),
      appBar: AppBar(
        elevation: 0,
        title: Text(
          'Kegiatan',
          style: TextStyle(color: Colors.white),
        ),
        backgroundColor: Colors.indigo,
      ),
      body: Padding(
        padding: const EdgeInsets.all(15.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Header
            Text(
              'Halo, ${widget.authenticatedUserName}',
              style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 25),

            // Body layout
            Expanded(
              child: SingleChildScrollView(
                physics: BouncingScrollPhysics(),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    // Blue top card
                    Container(
                      padding: EdgeInsets.all(20),
                      decoration: BoxDecoration(
                        boxShadow: [
                          BoxShadow(
                            color: Colors.grey,
                            offset: const Offset(0, 1),
                            blurRadius: 0.5,
                            spreadRadius: 0.5,
                          ),
                        ],
                        color: ThemeColors().blue,
                        borderRadius: BorderRadius.circular(25),
                      ),
                      width: double.infinity,
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Kegiatan saat ini',
                            style: TextStyle(
                                color: Colors.white,
                                fontSize: 16,
                                fontWeight: FontWeight.bold),
                          ),
                          const SizedBox(height: 20),
                          if (todayKegiatan.isNotEmpty)
                            ListView.builder(
                              shrinkWrap: true,
                              physics: NeverScrollableScrollPhysics(),
                              itemCount: todayKegiatan.length,
                              itemBuilder: (context, index) {
                                final kegiatan = todayKegiatan[index];
                                return Text(
                                  kegiatan.judul!,
                                  style: TextStyle(
                                    color: Colors.white,
                                    fontSize: 25,
                                    fontWeight: FontWeight.bold,
                                  ),
                                );
                              },
                            )
                          else
                            Text(
                              'Tidak ada kegiatan saat ini',
                              style: TextStyle(
                                  color: Colors.white,
                                  fontSize: 25,
                                  fontWeight: FontWeight.bold),
                            ),
                        ],
                      ),
                    ),
                    const SizedBox(height: 25),

                    // In progress section
                    Row(
                      children: [
                        Text(
                          'Kegiatan yang belum selesai',
                          style: TextStyle(
                              color: Colors.black,
                              fontSize: 16,
                              fontWeight: FontWeight.bold),
                        ),
                        const SizedBox(width: 10),
                        Container(
                          height: 25,
                          width: 30,
                          decoration: BoxDecoration(
                            color: ThemeColors().grey.withOpacity(0.5),
                            borderRadius: BorderRadius.circular(10),
                          ),
                          child: Center(
                            child: Text(
                              inProgressKegiatan.length.toString(),
                              style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  color: ThemeColors().pink),
                            ),
                          ),
                        ),
                      ],
                    ),
                    const SizedBox(height: 15),
                    SizedBox(
                      height: 140,
                      child: ListView.builder(
                        itemCount: inProgressKegiatan.length,
                        physics: BouncingScrollPhysics(),
                        scrollDirection: Axis.horizontal,
                        itemBuilder: (context, index) {
                          final kegiatan = inProgressKegiatan[index];
                          return CustomContainer(
                            description: kegiatan.deskripsi!,
                            title: kegiatan.judul!,
                            createDate: kegiatan.tanggal_mulai!,
                          );
                        },
                      ),
                    ),
                    const SizedBox(height: 15),

                    // Past kegiatan section
                    Row(
                      children: [
                        Text(
                          'Kegiatan yang telah lewat',
                          style: TextStyle(
                              color: Colors.black,
                              fontSize: 16,
                              fontWeight: FontWeight.bold),
                        ),
                        const SizedBox(width: 10),
                        Container(
                          height: 25,
                          width: 30,
                          decoration: BoxDecoration(
                            color: ThemeColors().grey.withOpacity(0.5),
                            borderRadius: BorderRadius.circular(10),
                          ),
                          child: Center(
                            child: Text(
                              pastKegiatan.length.toString(),
                              style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  color: ThemeColors().pink),
                            ),
                          ),
                        ),
                      ],
                    ),
                    const SizedBox(height: 10),
                    ListView.builder(
                      itemCount: pastKegiatan.length,
                      shrinkWrap: true,
                      physics: NeverScrollableScrollPhysics(),
                      itemBuilder: (context, index) {
                        final kegiatan = pastKegiatan[index];
                        return WidgetHome(
                          description: kegiatan.deskripsi!,
                          progress_percentage: '100',
                          createDate: kegiatan.tanggal_mulai!,
                          title: kegiatan.judul!,
                        );
                      },
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
