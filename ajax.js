$(document).ready(function() {
    setInterval(loadMessages, 1000); // периодическая загрузка сообщений

    $('#send').click(function() {
        var message = $('#message').val();
        if (message.length > 0) {

            $.ajax({
                url: 'send_message.php',
                method: 'POST',
                data: { message: "ajax " + message },
                success: function(response) {
                    console.log(response); 
                    $('#message').val(''); 
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
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Логирование эмоций
        }
    });
}
