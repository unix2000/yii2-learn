$( document ).ready(function() {
    var socket = io.connect('http://localhost:8890');
    //on自定义事件于channel参数名称一致
    socket.on('notification', function (data) {
        var message = JSON.parse(data);
        $( "#notifications" ).prepend( "<p><strong>" + message.name + "</strong>: " + message.message + "</p>" );
    });
});