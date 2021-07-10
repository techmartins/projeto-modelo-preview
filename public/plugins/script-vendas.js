$(document).ready(function(){

    $("#contato").inputmask({mask:"(99) 99999-9999"});

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

    $("#rt").inputmask('decimal', {
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

    $('#enviar-dados-venda').on('click', function() {
        
        var cliente = $('#cliente').val();
        var valor = $('#valor').val();
        var perfil_usuario = $('#perfil').val();
        valor = valor.split("R$ ");
        valor = valor[1]; // 20.000,00
        
        var rt = $('#rt').val();
        var descricao_servico = $('#descricao_servico').val();
        if(perfil_usuario == "admin"){
    		if($('#empresa_indicadora').val() != 0){
    		    var indicador = $('#empresa_indicadora').val();
    		    indicador = indicador.split("/");
    		    indicador = indicador[1];
    		}else{
    		    var indicador = $('#indicador').val();
    		}
    	}else{
    		var indicador = $('#indicador').val();
    	}
	
        if($('#data_venda').val() != ""){
            var data_venda = $('#data_venda').val();
        }else{
            var data_venda = null;
        }
                
        if($('#indicado_profissional').val() != 0){
            var indicado = $('#indicado_profissional').val();
            var perfil = "profissional-empresa";
            var id_indicado = $('#id_indicado').val();
        }else{
            var indicado = $('#indicado_empresa').val();
            var id_indicado = $('#id_indicado').val();
            var perfil = "empresa-empresa";
        }
        
        indicado = indicado.split("/");
        indicado = indicado[1];
        id_indicado = id_indicado.split("/");
        id_indicado = id_indicado[0];
        
        var contato = $('#contato').val();
        let _url = $('#url_cadastro_venda').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $('#modal-loading').modal('show');

        setTimeout(function () {
            $.ajax({
                url: _url,
                type: "post",
                data: {
                    cliente:cliente,
                    valor:valor,
                    rt:rt,
                    descricao_servico:descricao_servico,
                    indicador:indicador,
                    indicado:indicado,
                    id_indicado:id_indicado,
                    data_venda:data_venda,
                    contato:contato,
                    perfil:perfil,
                    _token:_token
                },

                success: function(response) {
                	if(response){
                	   alert("Venda Registrada com Sucesso!");
                	}
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

    $("#chk_empresa").on("change", function(){
        if($(this).val() === "empresa"){
            $("#indicado_profissional").prop('disabled', true);
            $("#indicado_empresa").prop('disabled', false);
        }else{
            $("#indicado_profissional").prop('disabled', false);
            $("#indicado_empresa").prop('disabled', true);
        }
    });

    $("#indicado_profissional").on("change", function(){
        $("#id_indicado").val($(this).val());
    });

    $("#indicado_empresa").on("change", function(){
        $("#id_indicado").val($(this).val());
    });

    // $(".btn-editar-empresa").click(function(){
    //     $("#modal-editar-empresa").modal();
    //     let id = $("#id_input").val();
    //     let _url = $('#url_visualizar').val();
    //     //let _token   = $('meta[name="csrf-token"]').attr('content');
        
    //     $.ajax({
    //         url: _url+"/"+id,
    //         type: "GET",
            
    //         success: function(response) {
    //             //console.log(response[0]["razao_social"]);
    //             $("#id_edit").val(response[0]["id"]);
    //             $('#razao_social_edit').val(response[0]["razao_social"]);
    //             $('#cnpj_edit').val(response[0]["cnpj"]);
    //             $('#email_edit').val(response[0]["email"]);
    //             $('#ramo_edit').val(response[0]["ramo_atividade"]);
    //             $('#cep_edit').val(response[0]["cep"]);
    //             $('#endereco_edit').val(response[0]["endereco"]);
    //             $('#bairro_edit').val(response[0]["bairro"]);
    //             $('#uf_edit').val(response[0]["uf"]);
    //             $('#cidade_edit').val(response[0]["cidade"]);
    //             $('#referencia_edit').val(response[0]["referencia"]);
    //             $('#contato_edit').val(response[0]["contato"]);
    //             $('#password_edit').val(response[0]["password"]);
    //         },
    //         error: function(err) {
    //             console.log(err)
    //         }
    //     });

    // });


});
