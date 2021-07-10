$(document).ready(function(){

    $('#enviar-resgate-pontos').on('click', function() {
        
        let _url = $('#url_resgate').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        var perfil = $('#perfil').val();
        var email = $('#email').val();
        var pontuacao = $('#pontuacao').val();

        if(pontuacao<30000){
            alert("Pontuação mínima a resgatar é de 30000!")
        }else{
            $('#modal-loading').modal('show');

            setTimeout(function () {
                $.ajax({
                    url: _url,
                    type: "post",
                    data: {
                        pontuacao:pontuacao,
                        perfil:perfil,
                        email:email,
                        _token:_token
                    },
    
                    success: function(response) {
                        console.log(response);
                        //location.reload();
                    },
                    error: function(response) {
                        console.log(response)
                    }
                });
                $('#modal-loading').modal('hide');
                location.reload();
            }, 3000);
        }
    });

});