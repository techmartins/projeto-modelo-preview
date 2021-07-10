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
        
        var parceiro = $('#parceiro').val();
        var cpf = $('#cpf').val();
        var email = $('#email').val();
        var area_atuacao = $('#area').val();
        var nascimento = $('#nascimento').val();
        var telefone = $('#telefone').val();
        var cep = $('#cep').val();
        var endereco = $('#endereco').val();
        var bairro = $('#bairro').val();
        var uf = $('#uf').val();
        var cidade = $('#cidade').val();
        var chave_pix = $('#chave_pix').val();
        var password = $('#password').val();
        var pontuacao = 0;
        var perfil = $('#perfil').val();
        
        let _url = $('#url_cadastro').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $('#modal-loading').modal('show');

        setTimeout(function () {
            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    parceiro: parceiro,
                    cpf: cpf,
                    email: email,
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
                    pontuacao:pontuacao,
                    perfil:perfil,
                    _token: _token
                },

                success: function(response) {
                    console.log(response);
                },
                error: function(response) {
                    console.log(response)
                }
            });
            $('#modal-loading').modal('hide');
            alert("Profissional cadastrado com sucesso.");
            // location.reload();
        }, 3000);
    });

    $(".btn-editar-profissional").click(function(){
        $("#modal-editar-profissional").modal();
        let id = $("#id_input").val();
        let _url = $('#url_visualizar').val();
        //let _token   = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: _url+"/"+id,
            type: "GET",
            
            success: function(response) {
                console.log(response);
                //console.log(response[0]["razao_social"]);
                $("#id_edit").val(response[0]["id"]);
                $('#parceiro_edit').val(response[0]["parceiro"]);
                $('#cpf_edit').val(response[0]["cpf"]);
                $('#email_edit').val(response[0]["email"]);
                $('#email_verified').val(response[0]["email"]);
                $('#area_edit').val(response[0]["area_atuacao"]);
                $('#nascimento_edit').val(response[0]["nascimento"]);
                $('#telefone_edit').val(response[0]["telefone"]);
                $('#cep_edit').val(response[0]["cep"]);
                $('#endereco_edit').val(response[0]["endereco"]);
                $('#bairro_edit').val(response[0]["bairro"]);
                $('#uf_edit').val(response[0]["uf"]);
                $('#cidade_edit').val(response[0]["cidade"]);
                $('#chave_pix_edit').val(response[0]["chave_pix"]);
                $('#password_edit').val(response[0]["password"]);
            },
            error: function(err) {
                console.log(err)
            }
        });

    });

    $("#editar-dados").click(function(){
        var id = $("#id_edit").val();
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
        $("#modal-editar-profissional").modal('hide');
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
                    parceiro: parceiro,
                    cpf: cpf,
                    email: email,
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
                    //location.reload(); 
                },
                error: function(err) {
                    console.log(err)
                }
            });
            $('#modal-loading').modal('hide');

            //location.reload();
        }, 3000);

    });

    $(".btn-excluir-profissional").click(function(){
        $("#modal-excluir-profissional").modal();
        let id = $("#id_input").val();
        $('#id_deletar_profissional').val(id);
    });

    
    $("#deletar").click(function(){
    
        let id = $("#id_deletar_profissional").val();
        let _url = $('#url_visualizar').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $('#modal-excluir-profissional').modal('hide');
        $('#modal-loading').modal('show');
        setTimeout(function () {
            $.ajax({
                url: _url+"/"+id,
                type: "DELETE",
                data: {
                    _token:_token
                },
                
                success: function(response) {
                    console.log(response);
                    if(response === "success"){
                        console.log("deleção realizada")
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            });
            $('#modal-loading').modal('hide');
            //location.reload();
        }, 3000);
    });

});
