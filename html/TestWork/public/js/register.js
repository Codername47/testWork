$(".reg-form").on("submit", function (e){
    e.preventDefault();
    $(".msg").val("")
    $.ajax({
        url: '/auth/reg',
        method: 'post',
        dataType: 'html',
        data: $('form').serialize(),
        success: function(data){
            $(".msg").text(data)
        }
    });
})
