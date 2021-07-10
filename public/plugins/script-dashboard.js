$(document).ready(function(){

    $("#tabela-vendas input").keyup(function(){        
        var index = $(this).parent().index();
        var nth = "#tabela-vendas td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#tabela-vendas tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#tabela-vendas input").blur(function(){
        $(this).val("");
    });
    
    function carregaPontuacao(){
        var perfil = $('#perfil').val();
        var email = $('#email').val();
        var _url = $('#url_base_dashboard').val();
        $.ajax({
            url: _url+"/minhapontuacao",
            type: "get",
            data: {
                perfil: perfil,
                email: email
            },

            success: function(response) {
                // console.log(response);
                $("#pontuacao_atual_usuario").html("<b>"+response['pontuacao']['original']+"</b>");
                $('#realizar-resgate').html(response['resgate']);
                $('#btn-resgate').html(response['btn_resgate']);
            },
            error: function(response) {
                console.log(response)
            }
        });
    }

    function carregaVendasUsuario(){
        var perfil = $('#perfil').val();
        var email = $('#email').val();
        var usuario = $('#nome_usuario').val();
        var _url = $('#url_base_dashboard').val();
        $.ajax({
            url: _url+"/minhasvendas",
            type: "get",
            data: {
                perfil: perfil,
                email: email
            },

            success: function(response) {
                var html = "";
                
                for (let i = 0; i < response.length; i++) {
                console.log(usuario + " - " + response[i]['indicado'] + " - ID" + response[i]['id_indicado']);
                    if(response[i]['indicador'] == usuario || response[i]['indicado'] == usuario || response[i]['email_indicado'] == email){
                    	html += "<tr>";
                    	html += "<td>"+response[i]['cliente']+"</td>";
                    	if(perfil == "profissional"){
                    	    html += "<td>"+response[i]['indicador']+"</td>";
                    	}else{
                    	    html += "<td>"+response[i]['indicado']+"</td>";
                    	}
                    	html += "<td>"+response[i]['valor']+"</td>";
                    	if(perfil == "empresa"){
                    	    html += "<td>"+response[i]['rt']+"</td>";
                    	}
                    	html += "<td>"+response[i]['data_venda']+"</td>";
                    	html += "</tr>";
                    }
                }
                $('.vendas').append(html);
                //location.reload();
            },
            error: function(response) {
                console.log("response")
            }
        });
    }

    $('#btn-resgate').click(function(){
        window.location.replace("/public/vendas/resgate/premio");
    });

    carregaPontuacao();
    carregaVendasUsuario();

});
