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
        
        var razao = $('#razao_social').val();
        var cnpj = $('#cnpj').val();
        var email = $('#email').val();
        var atividade = $('#ramo').val();
        var cep = $('#cep').val();
        var endereco = $('#endereco').val();
        var bairro = $('#bairro').val();
        var uf = $('#uf').val();
        var cidade = $('#cidade').val();
        var contato = $('#contato').val();
        var referencia = $('#referencia').val();
        var password = $('#password').val();
        var pontuacao = 0;
    
        let _url = $('#url_cadastro').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $('#modal-loading').modal('show');

        setTimeout(function () {
            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    razao_social: razao,
                    cnpj: cnpj,
                    email: email,
                    ramo_atividade: atividade,
                    cep: cep,
                    endereco: endereco,
                    bairro: bairro,
                    uf: uf,
                    cidade: cidade,
                    contato: contato,
                    referencia: referencia,
                    password: password,
                    pontuacao:pontuacao,
                    _token: _token
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
            // location.reload();
        }, 3000);
    });

    $(".btn-editar-empresa").click(function(){
        $("#modal-editar-empresa").modal();
        let id = $("#id_input").val();
        let _url = $('#url_visualizar').val();
        //let _token   = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: _url+"/"+id,
            type: "GET",
            
            success: function(response) {
                //console.log(response[0]["razao_social"]);
                $("#id_edit").val(response[0]["id"]);
                $('#razao_social_edit').val(response[0]["razao_social"]);
                $('#cnpj_edit').val(response[0]["cnpj"]);
                $('#email_edit').val(response[0]["email"]);
                $('#email_verified').val(response[0]["email"]);
                $('#ramo_edit').val(response[0]["ramo_atividade"]);
                $('#cep_edit').val(response[0]["cep"]);
                $('#endereco_edit').val(response[0]["endereco"]);
                $('#bairro_edit').val(response[0]["bairro"]);
                $('#uf_edit').val(response[0]["uf"]);
                $('#cidade_edit').val(response[0]["cidade"]);
                $('#referencia_edit').val(response[0]["referencia"]);
                $('#contato_edit').val(response[0]["contato"]);
                $('#password_edit').val(response[0]["password"]);
            },
            error: function(err) {
                console.log(err)
            }
        });

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

        let _url = $('#url_cadastro').val();
        $("#modal-editar-empresa").modal('hide');
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
                    razao_social: razao,
                    cnpj: cnpj,
                    email: email,
                    email_verified:email_verified,
                    ramo_atividade: atividade,
                    cep: cep,
                    endereco: endereco,
                    bairro: bairro,
                    uf: uf,
                    cidade: cidade,
                    contato: contato,
                    referencia: referencia,
                    password: password
                    // _token: _token
                },
                
                success: function(response) {
                    console.log(response);
                },
                error: function(err) {
                    console.log(err)
                }
            });
            $('#modal-loading').modal('hide');
            //location.reload();
        }, 3000);
    });

    $(".btn-excluir-empresa").click(function(){
        $("#modal-excluir-empresa").modal();
        let id = $("#id_input").val();
        $('#id_deletar_empresa').val(id);
    });

    $("#deletar").click(function(){
        
        let id = $("#id_deletar_empresa").val();
        let _url = $('#url_visualizar').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $('#modal-excluir-empresa').modal('hide');
        $('#modal-loading').modal('show');
        setTimeout(function () {
            $.ajax({
                url: _url+"/"+id,
                type: "DELETE",
                data: {_token:_token},
                
                success: function(response) {
                    console.log(response);
                },
                error: function(err) {
                    console.log(err)
                }
            });
            $('#modal-loading').modal('hide');
            alert("Empresa deletada com sucesso!");
            //location.reload();
        }, 3000);
    });

});
