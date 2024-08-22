import 'dart:convert';

class Saran {
  Saran({this.saran});
  String? saran;

  factory Saran.fromJson(Map<String, dynamic> json) {
    return Saran(
      saran: json["saran"],
      );
  }

  Map<String, dynamic> toJson() => {
    "saran": saran,
    };
}
