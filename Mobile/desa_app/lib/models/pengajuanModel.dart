import 'dart:convert';

class Pengajuan {
  Pengajuan({this.jenis_pengajuan, this.deskripsi,this.file});
  String? jenis_pengajuan;
  String? deskripsi;
  String? file;

  factory Pengajuan.fromJson(Map<String, dynamic> json) {
    return Pengajuan(
      jenis_pengajuan: json["jenis_pengajuan"],
      deskripsi: json["deskripsi"],
      file: json["file"],
      );
  }

  Map<String, dynamic> toJson() => {
    "jenis_pengajuan": jenis_pengajuan,
    "deskripsi" : deskripsi,
    "file": file,
    };
}
