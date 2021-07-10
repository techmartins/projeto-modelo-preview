$(document).ready(function(){

    $('#cep').on('blur', function(){

        if($.trim($("#cep").val()) != ""){

            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){

                if(resultadoCEP["resultado"]){
                    $("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
                    $("#uf").val(unescape(resultadoCEP["uf"]));
                }
            });				
        }			
    });

    $('#cep_edit').on('blur', function(){

        if($.trim($("#cep_edit").val()) != ""){

            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep_edit").val(), function(){

                if(resultadoCEP["resultado"]){
                    $("#endereco_edit").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                    $("#bairro_edit").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade_edit").val(unescape(resultadoCEP["cidade"]));
                    $("#uf_edit").val(unescape(resultadoCEP["uf"]));
                }
            });				
        }			
    });

    $('#enviar-dados').on('click', function() {
        
        var nome_completo = $('#nome_completo').val();
        var telefone = $('#telefone').val();
        var cpf = $('#cpf').val();
        var pix = $('#pix').val();
        var banco = $('#banco').val();
        var agencia = $('#agencia').val();
        var conta = $('#conta').val();
        var cep = $('#cep').val();
        var endereco = $('#endereco').val();
        var bairro = $('#bairro').val();
        var uf = $('#uf').val();
        var cidade = $('#cidade').val();
        
        // let _url = $('#url_cadastro').val();
        // let _token   = $('meta[name="csrf-token"]').attr('content');

        $('#modal-loading').modal('show');

        setTimeout(function () {
            $("#nome_completo").val(response[0]["nome_completo"]);
            $('#telefone').val(response[0]["telefone"]);
            $('#cpf').val(response[0]["cpf"]);
            $('#pix').val(response[0]["pix"]);
            $('#banco').val(response[0]["banco"]);
            $('#agencia').val(response[0]["agencia"]);
            $('#conta').val(response[0]["conta"]);
            $('#cep').val(response[0]["cep"]);
            $('#endereco').val(response[0]["endereco"]);
            $('#bairro').val(response[0]["bairro"]);
            $('#uf').val(response[0]["uf"]);
            $('#cidade').val(response[0]["cidade"]);
        }, 3000);
    });

    $(".btn-editar-indicados").click(function(){
        $("#modal-editar-indicados").modal();
        $("#nome_completo_edit").val(response[0]["nome_completo"]);
        $('#telefone_edit').val(response[0]["telefone"]);
        $('#cpf_edit').val(response[0]["cpf"]);
        $('#pix_edit').val(response[0]["pix"]);
        $('#banco_edit').val(response[0]["banco"]);
        $('#agencia_edit').val(response[0]["agencia"]);
        $('#conta_edit').val(response[0]["conta"]);
        $('#cep_edit').val(response[0]["cep"]);
        $('#endereco_edit').val(response[0]["endereco"]);
        $('#bairro_edit').val(response[0]["bairro"]);
        $('#uf_edit').val(response[0]["uf"]);
        $('#cidade_edit').val(response[0]["cidade"]);

    });

    $("#editar-dados").click(function(){
        var id = $("#id_edit").val();
        var razao = $('#razao_social_edit').val();
        var cnpj = $('#cnpj_edit').val();
        var email = $('#email_edit').val();
        var email_verified = $('#email_verified').val();
        var atividade = $('#ramo_edit').val();
        var cep = $('#cep_edit').val();
        var endereco = $('#endereco_edit').val();
        var bairro = $('#bairro_edit').val();
        var uf = $('#uf_edit').val();
        var cidade = $('#cidade_edit').val();
        var contato = $('#contato_edit').val();
        var referencia = $('#referencia_edit').val();
        var password = $('#password_edit').val();

        // let _url = $('#url_cadastro').val();
        $("#modal-editar-empresa").modal('hide');
        $('#modal-loading').modal('show');
        
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        setTimeout(function () {
            // $.ajax({
            //     url: _url+"/"+id,
            //     type: "PUT",
            //     data: {
            //         id: id,
            //         razao_social: razao,
            //         cnpj: cnpj,
            //         email: email,
            //         email_verified:email_verified,
            //         ramo_atividade: atividade,
            //         cep: cep,
            //         endereco: endereco,
            //         bairro: bairro,
            //         uf: uf,
            //         cidade: cidade,
            //         contato: contato,
            //         referencia: referencia,
            //         password: password
            //         // _token: _token
            //     },
                
            //     success: function(response) {
            //         console.log(response);
            //     },
            //     error: function(err) {
            //         console.log(err)
            //     }
            // });
            $('#modal-loading').modal('hide');
            //location.reload();
        }, 3000);
    });

    $(".btn-excluir-indicados").click(function(){
        $("#modal-excluir-indicados").modal();
        // let id = $("#id_input").val();
        // $('#id_deletar_empresa').val(id);
    });

    $("#deletar").click(function(){
        
        // let id = $("#id_deletar_empresa").val();
        // let _url = $('#url_visualizar').val();
        // let _token   = $('meta[name="csrf-token"]').attr('content');
        $('#modal-excluir-empresa').modal('hide');
        $('#modal-loading').modal('show');
        setTimeout(function () {
            // $.ajax({
            //     url: _url+"/"+id,
            //     type: "DELETE",
            //     data: {_token:_token},
                
            //     success: function(response) {
            //         console.log(response);
            //     },
            //     error: function(err) {
            //         console.log(err)
            //     }
            // });
            // $('#modal-loading').modal('hide');
            // alert("Empresa deletada com sucesso!");
            // //location.reload();
        }, 3000);
    });

});
