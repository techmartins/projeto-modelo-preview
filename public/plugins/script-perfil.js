$(document).ready(function(){

    function carregaPerfil(){
        var email = $('#email-user').val();
        var _url = $("#url-perfil").val();
        var perfil = $("#perfil-user").val();
        
        $.ajax({
            url: _url+"/"+email,
            type: "get",
            data: {
                email: email,
                perfil:perfil
            },

            success: function(response) {
                //console.log(response);
                if(perfil == "profissional"){
                    $("#parceiro_edit").val(response[0]["parceiro"]);
                    $("#cpf_edit").val(response[0]["cpf"]);
                    $("#email_edit").val(response[0]["email"]);
                    $("#email_verified").val(response[0]["email"]);
                    $("#nascimento_edit").val(response[0]["nascimento"]);
                    $("#telefone_edit").val(response[0]["telefone"]);
                    $("#area_edit").val(response[0]["area_atuacao"]);
                    $("#chave_pix_edit").val(response[0]["chave_pix"]);
                    $("#cep_edit").val(response[0]["cep"]);
                    $("#endereco_edit").val(response[0]["endereco"]);
                    $("#bairro_edit").val(response[0]["bairro"]);
                    $("#uf_edit").val(response[0]["uf"]);
                    $("#cidade_edit").val(response[0]["cidade"]);
                    $("#password_edit").val(response[0]["password"]);
                }else{
                    $("#razao_social_edit").val(response[0]["razao_social"]);
                    $("#cnpj_edit").val(response[0]["cnpj"]);
                    $("#email_edit").val(response[0]["email"]);
                    $("#ramo_atividade_edit").val(response[0]["ramo_atividade"]);
                    $("#cep_edit").val(response[0]["cep"]);
                    $("#endereco_edit").val(response[0]["endereco"]);
                    $("#bairro_edit").val(response[0]["bairro"]);
                    $("#uf_edit").val(response[0]["uf"]);
                    $("#cidade_edit").val(response[0]["cidade"]);
                    $("#contato_edit").val(response[0]["contato"]);
                    $("#referencia_edit").val(response[0]["referencia"]);
                    $("#password_edit").val(response[0]["password"]);
                }
            },
            error: function(response) {
                console.log("response")
            }
        });
    }
    carregaPerfil();

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

    $("#editar-dados-profissional").click(function(){
        var id = $("#id").val();
        var perfil = $("#perfil").val();
        var parceiro = $('#parceiro_edit').val();
        var cpf = $('#cpf_edit').val();
        var email = $('#email_edit').val();
        var email_verified = $('#email_verified').val();
        var area_atuacao = $('#area_edit').val();
        var nascimento = $('#nascimento_edit').val();
        var telefone = $('#telefone_edit').val();
        var cep = $('#cep_edit').val();
        var endereco = $('#endereco_edit').val();
        var bairro = $('#bairro_edit').val();
        var uf = $('#uf_edit').val();
        var cidade = $('#cidade_edit').val();
        var chave_pix = $('#chave_pix_edit').val();
        var password = $('#password_edit').val();

        let _url = $('#url_cadastro').val();
        
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
                    perfil: perfil,
                    parceiro: parceiro,
                    cpf: cpf,
                    email: email,
                    email_verified: email_verified,
                    area_atuacao: area_atuacao,
                    nascimento: nascimento,
                    telefone: telefone,
                    cep: cep,
                    endereco: endereco,
                    bairro: bairro,
                    uf: uf,
                    cidade: cidade,
                    chave_pix: chave_pix,
                    password: password,
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
        }, 2000);

    });

    $("#editar-dados-empresa").click(function(){
        var id = $("#id").val();
        var perfil = $("#perfil").val();
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
                    perfil:perfil,
                    razao_social: razao,
                    cnpj: cnpj,
                    email: email,
                    email_verified: email_verified,
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
        }, 2000);
    });

    

});
