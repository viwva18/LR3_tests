<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>
    <h1>Chat Application</h1>
    <div id="chat-box">
        <!-- Сообщения будут загружены здесь -->
    </div>
    <textarea id="message" placeholder="Type your message here..."></textarea>
    <button id="send">Send</button>

    <script>
        $(document).ready(function() {
            setInterval(loadMessages, 1000); // периодическая загрузка сообщений

            $('#send').click(function() {
                var message = $('#message').val();
                if (message.length > 0) {
                    $.ajax({
                        url: 'send_message.php',
                        method: 'POST',
                        data: { message: message },
                        success: function(response) {
                            $('#message').val(''); // очистить поле ввода
                        }
                    });
                }
            });
        });

        function loadMessages() {
            $.ajax({
                url: 'get_messages.php',
                method: 'GET',
                success: function(response) {
                    $('#chat-box').html(response); // обновление списка сообщений
                }
            });
        }
    </script>
</body>
</html>
