$(".auth-form").on("submit", function (e){
    e.preventDefault();
    $(".msg").val("")
    $.ajax({
        url: '/auth/authorizate',
        method: 'post',
        dataType: 'html',
        data: $('form').serialize(),
        success: function(data){
            if(data != "Неправильный логин или пароль")
                document.location = "/";
            else
                $(".msg").text(data)
        }
    });
})