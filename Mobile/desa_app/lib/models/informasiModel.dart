import 'dart:ui';

class InformationModel {
  final String name;
  final String img;
  final String location;
  final String description;
  final bool isSelected;
  final Color color;

  InformationModel(
      {
        required this.name,
        required this.img,
        required this.location,
        required this.description,
        required this.isSelected,
        required this.color, }
      );
}
