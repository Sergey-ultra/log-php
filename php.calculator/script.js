
$(document).ready(function() {
    $("#calculate").click( function (e) {
        e.preventDefault();

        let data = {
            "operation": $("#operation").val(),
            "first": $("#first").val(),
            "second": $("#second").val()
        };
        $.ajax({
            type: 'POST',
            url: 'operation.php',
            data: data,
            success: function (msg) {
                $('#result').html(msg);
                console.log(msg);
            },
            error: function(response) {
                console.log('Ошибка. Данные не отправлены.');
            }
        });
        return false;
    });
})