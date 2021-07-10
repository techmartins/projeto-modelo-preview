$(document).ready(function(){

    $(".btn-editar-pontuacao").click(function(){
        $("#modal-editar-pontuacao").modal();
        let id = $(this).data('id');
        let _url = $('#url_visualizar').val();
        //let _token   = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: _url+"/"+id,
            type: "GET",
            
            success: function(response) {
                //console.log(response[0]["razao_social"]);
                $("#id").val(response[0]["id"]);
                $('#pontuacao').val(response[0]["pontuacao"]);
                $('#premio').val(response[0]["premio"]);
            },
            error: function(err) {
                console.log(err)
            }
        });

    });

    $("#editar-dados").click(function(){
        var id = $("#id").val();
        var pontuacao = $('#pontuacao').val();
        var premio = $('#premio').val();
        
        let _url = $('#url_cadastro').val();
        $("#modal-editar-pontuacao").modal('hide');
        $('#modal-loading').modal('show');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        setTimeout(function () {
            $.ajax({
                url: _url+"/"+id,
                type: "PUT",
                data: {
                    id: id,
                    pontuacao: pontuacao,
                    premio: premio,
                },
                
                success: function(response) {
                    console.log(response);
                },
                error: function(err) {
                    console.log(err)
                }
            });
            $('#modal-loading').modal('hide');
            location.reload();
        }, 3000);
    });

});