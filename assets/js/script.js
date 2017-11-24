$(function(){
    $('#a_login').on('click', function(){
        $('.login').fadeToggle();
    });
    $('#btn_login').bind('click', function(){
        $('.aviso_login').hide();
        $("#LoadingImage").show();
        $('button').hide();
        var email = $('#email').val();
        var senha = $('#senha').val();
        $.ajax({
            url: "login.php",
            type: "POST",
            data: {email:email, senha: senha},
            success: function(result){
                $("#LoadingImage").hide();
                if(result === 'sucesso'){
                    $(location).attr('href', '/');                    
                }else{
                    $('button').show();
                    $('.aviso_login').show();
                    $('#email').val('');
                    $('#senha').val('');
                }
            }
        });
    });
    $(".texte").click(function(){
        var url = $(this).attr('data-url');
        $.ajax({url: url, success: function(result){
            $("#div1").html(result);
        }});
    }); 
});