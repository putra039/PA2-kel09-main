import 'dart:convert';
import 'dart:ffi';

class User {
  User
      ({
        this.nama,
        this.nik,
        this.no_telp,
        this.tempat_lahir,
        this.tanggal_lahir,
        this.usia,
        this.jenis_kelamin,
        this.pekerjaan,
        this.agama,
        this.kk,
        this.alamat,
        this.gambar,
        this.password
      });

  String?   nama;
  String?   nik;
  String?   no_telp;
  String?   tempat_lahir;
  DateTime? tanggal_lahir;
  String?   usia;
  String?   jenis_kelamin;
  String?   pekerjaan;
  String?   agama;
  String?   kk;
  String?   alamat;
  String?   gambar;
  String?   password;

  factory User.fromJson(Map<String, dynamic> json) => User(
      nama: json["nama"],
      nik: json["nik"],
      no_telp: json["no_telp"],
      tempat_lahir: json["tempat_lahir"],
      tanggal_lahir: json["tanggal_lahir"],
      usia: json["usia"],
      jenis_kelamin: json["jenis_kelamin"],
      pekerjaan: json["pekerjaan"],
      agama: json["agama"],
      kk: json["kk"],
      alamat: json["alamat"],
      gambar: json["gambar"],
      password: json["password"],
  );
  Map<String, dynamic> toJson() => {
  "nama": nama,
  "nik": nik,
  "no_telp": no_telp,
  "tempat_lahir": tempat_lahir,
  "tanggal_lahir": tanggal_lahir,
  "usia": usia,
  "jenis_kelamin": jenis_kelamin,
  "pekerjaan": pekerjaan,
  "agama": agama,
  "kk": kk,
  "alamat": alamat,
  "gambar": gambar,
  "password": password,
  };
}
