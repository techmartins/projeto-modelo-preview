$(document).ready(function(){

    $("#tabela_compras input").keyup(function(){        
        var index = $(this).parent().index();
        var nth = "#tabela_compras td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#tabela_compras tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#tabela_compras input").blur(function(){
        $(this).val("");
    });

    $("#valor").inputmask('decimal', {
        'alias': 'numeric',
        'groupSeparator': '.',
        'autoGroup': true,
        'digits': 2,
        'radixPoint': ",",
        'digitsOptional': false,
        'allowMinus': false,
        'prefix': 'R$ ',
        'placeholder': ''
    });

    $('#enviar-dados-compra').on('click', function() {
        
        var cliente = $('#cliente').val();
        var id_profissional = $("#identificador").val();
        var id_usuario = $("#id_usuario").val();
        var valor = $('#valor').val();
        valor = valor.split("R$ ");
        valor = valor[1];
        var anotacao = $('#anotacao').val();
        var empresa = $('#empresa').val();

        if($('#data_compra').val() != ""){
            var data_compra = $('#data_compra').val();
        }else{
            var data_compra = null;
        }
                
        let _url = $('#url_cadastro_compra').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $('#modal-loading').modal('show');

        setTimeout(function () {
            $.ajax({
                url: _url,
                type: "post",
                data: {
                    cliente:cliente,
                    id_profissional:id_profissional,
                    id_usuario:id_usuario,
                    valor:valor,
                    empresa:empresa,
                    anotacao:anotacao,
                    data_compra:data_compra,
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
            //location.reload();
        }, 3000);
    });

});
