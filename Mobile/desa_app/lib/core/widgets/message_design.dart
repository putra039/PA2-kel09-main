import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:fluttertoast/fluttertoast.dart';
import '../../core/theme/theme_colors.dart';

class MessageDesign extends StatelessWidget {
  final String message;
  final String time;
  final bool isMe;
  final String senderId;
  final String projectId;
  final dynamic messageIndex;

  const MessageDesign({
    Key? key,
    required this.message,
    required this.time,
    required this.isMe,
    required this.senderId,
    required this.projectId,
    required this.messageIndex,
  }) : super(key: key);

  void deleteMessage() {
    // Implement your logic to delete the message
    print('Deleting message: $message');
  }

  void showDeleteMsgDialog(BuildContext context) {
    showDialog(
      context: context,
      builder: ((_) {
        return CupertinoAlertDialog(
          title: Column(
            children: <Widget>[
              Text("Delete message"),
            ],
          ),
          content: Text("Are you sure you want to delete this message?"),
          actions: <Widget>[
            CupertinoDialogAction(
              child: Text("CANCEL"),
              onPressed: () {
                Navigator.of(_).pop();
              },
            ),
            CupertinoDialogAction(
              child: Text(
                "Delete",
                style: TextStyle(
                  color: Colors.red,
                ),
              ),
              onPressed: () {
                Fluttertoast.showToast(
                  msg: "Message deleted",
                  toastLength: Toast.LENGTH_SHORT,
                  gravity: ToastGravity.BOTTOM,
                  timeInSecForIosWeb: 1,
                  backgroundColor: Colors.green,
                  textColor: Colors.white,
                  fontSize: 16.0,
                );
                deleteMessage();
                Navigator.of(_).pop();
              },
            ),
          ],
        );
      }),
    );
  }

  void showCopyTextMsgDialog(BuildContext context) {
    showDialog(
      context: context,
      builder: ((_) {
        return CupertinoAlertDialog(
          title: Column(
            children: <Widget>[
              Text("Copy message"),
            ],
          ),
          content: Text("Do you want to copy this message to clipboard?"),
          actions: <Widget>[
            CupertinoDialogAction(
              child: Text("CANCEL"),
              onPressed: () {
                Navigator.of(_).pop();
              },
            ),
            CupertinoDialogAction(
              child: Text(
                "Copy",
                style: TextStyle(
                  color: ThemeColors().blue,
                ),
              ),
              onPressed: () {
                Clipboard.setData(
                  ClipboardData(text: message),
                ).then((_) {
                  Fluttertoast.showToast(
                    msg: "Copied to clipboard",
                    toastLength: Toast.LENGTH_SHORT,
                    gravity: ToastGravity.BOTTOM,
                    timeInSecForIosWeb: 1,
                    backgroundColor: Colors.green,
                    textColor: Colors.white,
                    fontSize: 16.0,
                  );
                });
                Navigator.of(_).pop();
              },
            ),
          ],
        );
      }),
    );
  }

  @override
  Widget build(BuildContext context) {
    var size = MediaQuery.of(context).size;
    return isMe
        ? GestureDetector(
      onLongPress: () {
        showDeleteMsgDialog(context);
      },
      child: Row(
        mainAxisAlignment: MainAxisAlignment.end,
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Padding(
            padding:
            const EdgeInsets.only(right: 8.0, top: 10, bottom: 10),
            child: Container(
              constraints: BoxConstraints(maxWidth: size.width / 1.5),
              child: Container(
                padding: EdgeInsets.only(
                    bottom: 10, right: 8.0, top: 5, left: 5),
                decoration: BoxDecoration(
                  color: ThemeColors().blue,
                  borderRadius: BorderRadius.only(
                    topLeft: Radius.circular(15),
                    bottomLeft: Radius.circular(15),
                    bottomRight: Radius.circular(15),
                  ),
                ),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.end,
                  children: [
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      message,
                      style: TextStyle(
                        fontSize: 16,
                        color: Colors.white,
                      ),
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      time,
                      style: TextStyle(
                        fontSize: 12,
                        color: Colors.white,
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
    )
        : GestureDetector(
      onLongPress: () {
        showCopyTextMsgDialog(context);
      },
      child: Row(
        mainAxisAlignment: MainAxisAlignment.start,
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Padding(
            padding:
            const EdgeInsets.only(left: 8.0, top: 10, bottom: 10),
            child: Container(
              constraints: BoxConstraints(maxWidth: size.width / 1.5),
              child: Container(
                padding: EdgeInsets.only(
                    bottom: 10, right: 8.0, top: 5, left: 5),
                decoration: BoxDecoration(
                  color: ThemeColors().blue.withOpacity(0.5),
                  borderRadius: BorderRadius.only(
                    topRight: Radius.circular(15),
                    bottomLeft: Radius.circular(15),
                    bottomRight: Radius.circular(15),
                  ),
                ),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    // Fetch for the sender Name with senderId.
                    Text(
                      'Username',
                      style: TextStyle(
                        fontSize: 16,
                        fontWeight: FontWeight.bold,
                        color: Colors.white,
                      ),
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      message,
                      style: TextStyle(
                        fontSize: 16,
                        color: Colors.white,
                      ),
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      time,
                      style: TextStyle(
                        fontSize: 12,
                        color: Colors.white,
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
