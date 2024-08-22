import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';

class BottomContainerChat extends StatefulWidget {
  final String projectId;
  const BottomContainerChat({
    Key? key,
    required this.projectId,
  });

  @override
  State<BottomContainerChat> createState() => _BottomContainerChatState();
}

class _BottomContainerChatState extends State<BottomContainerChat> {
  final TextEditingController _controller = TextEditingController();

  @override
  void dispose() {
    _controller.dispose();
    super.dispose();
  }

  void sendMessage() {
    String message = _controller.text;
    // Implement your logic to send the message
    print('Sending message: $message');
    _controller.clear();
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      constraints: BoxConstraints(maxHeight: 100, minHeight: 50),
      width: double.infinity,
      color: Colors.white,
      child: Row(
        children: [
          IconButton(
            onPressed: () {},
            icon: SvgPicture.asset('assets/icons/emoji.svg'),
          ),
          Expanded(
            child: TextField(
              minLines: 1,
              maxLines: 5,
              keyboardType: TextInputType.multiline,
              controller: _controller,
              decoration: InputDecoration(
                hintText: 'Type a message',
                border: InputBorder.none,
              ),
            ),
          ),
          IconButton(
            onPressed: () {
              sendMessage();
            },
            icon: SvgPicture.asset(
              'assets/icons/send.svg',
            ),
          ),
        ],
      ),
    );
  }
}
