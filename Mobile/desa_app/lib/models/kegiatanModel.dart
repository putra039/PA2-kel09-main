import 'dart:convert';

class Kegiatan {
  Kegiatan({this.judul, this.tempat,this.tanggal_mulai, this.tanggal_akhir,this.deskripsi});
  String? judul;
  String? tempat;
  String? tanggal_mulai;
  String? tanggal_akhir;
  String? deskripsi;

  factory Kegiatan.fromJson(Map<String, dynamic> json) {
    return Kegiatan(
      judul: json["judul"],
      tempat: json["tempat"],
      tanggal_mulai: json["tanggal_mulai"],
      tanggal_akhir: json["tanggal_akhir"],
      deskripsi: json["deskripsi"],
    );
  }

  Map<String, dynamic> toJson() => {
    "judul": judul,
    "tempat" : tempat,
    "tanggal_mulai": tanggal_mulai,
    "tanggal_akhir": tanggal_akhir,
    "deskripsi": deskripsi,
  };
}
