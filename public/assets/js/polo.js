$(function(){

	$('#addPolo').on('submit', function(e){
		e.preventDefault();

		let form = $('#addPolo')[0];
		let data = new FormData(form);
		/*let nome_polo = $('[name=nome_polo]').val();
		let endereco_polo = $('[name=endereco_polo]').val();
		let telefone_polo = $('[name=telefone_polo]').val();
		let cidade_polo = $('[name=cidade_polo]').val();
		let estado_polo = $('[name=estado_polo]').val();
		let apelido = $('[name=apelido]').val();
		let resp = $('[name=resp]').val();
		let email = $('[name=email]').val();
		let senha = $('[name=senha]').val();
		let parceiro = $("[name='parceiro']:checked").val();*/

		$.ajax({
			url:urlBase+'polos/addPolo',
			type:'POST',
			data:data,
			contentType:false,
			processData:false,
			success:function(msg){
			alert(msg);
			location.href = urlBase+'polos/listar';
				  }
		});
	});

});

$(function(){

	$('#beditPolo').on('click', function(e){
		e.preventDefault();
		let id_polo = $('[name=id_polo]').val();
		let nome_polo = $('[name=nome_polo]').val();
		let endereco_polo = $('[name=endereco_polo]').val();
		let telefone_polo = $('[name=telefone_polo]').val();
		let cidade_polo = $('[name=cidade_polo]').val();
		let estado_polo = $('[name=estado_polo]').val();
		let apelido = $('[name=apelido]').val();

		$.ajax({
			url:urlBase+'polos/editarPolo',
			type:'POST',
			data:{id_polo: id_polo,
				  nome_polo: nome_polo, 
				  endereco_polo: endereco_polo, 
				  telefone_polo: telefone_polo, 
				  cidade_polo: cidade_polo,
				  estado_polo: estado_polo,
				  apelido: apelido},
				  success:function(msg){
				  	alert(msg);
				  	location.href = urlBase+'polos/listar';
				  }
		});
	});

});


$(document).ready(function(){
   $("button[name=delete]").click(function(ev){
	    
	    let id = $(this).val();
	    let resp = confirm("ATENÇÃO: Você esta preste a deletar um polo!\nVocê realmente quer deletar?");

	    if (resp == true) {

	    $.ajax({
	    	url:urlBase+'polos/deletePolo',
	    	type:'POST',
	    	data:{id: id},
	    	success:function(resp){
	    		alert(resp);
	    		location.href= urlBase+'polos/listar';
	    	}
	    });
} else {
  			
			}
	});
});
