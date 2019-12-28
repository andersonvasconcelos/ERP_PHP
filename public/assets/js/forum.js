$(function(){

	$('#addforum').on('submit', function(e){
		e.preventDefault();
	
	let titulo = $('[name=titulo]').val();
	let topico = $('[name=topico]').val();
	let descricao = $('[name=descricao]').val();
	let ativo = $('[name=ativo]:checked').val();

	if ($('#curso_id').val() == 0) {
    		
    		alert("Selecione um curso");}

    	else{let curso = $('#curso_id').val();}

		if ($('#id_modulo').val() == "Selecione") {
		
			alert("Selecione um modulo");}

		else{let modulo = $('#id_modulo').val();}

		if ($('#id_aula').val() == "Selecione") {
		
			alert("Selecione um aula");}

		else{let aula = $('#id_aula').val();}

		$.ajax({
			url:'http://localhost/eja/forum/add',
			type:'POST',
			data:{curso: curso, modulo: modulo, aula: aula, titulo: titulo, 
			topico: topico, descricao: descricao, ativo: ativo},
				  success:function(msg){
				  	alert(msg);
				  	location.href = 'http://localhost/eja/forum/listar';
				  }
		});
	});

});
		
$(document).ready(function(){
   $("button[name=bdel]").click(function(ev){
	    
	    let id = $(this).val();
	    let resp = confirm("ATENÇÃO: Você esta preste a deletar um arquivo!\nVocê realmente deseja deletar?");

	    if (resp == true) {

	    $.ajax({
	    	url:'http://localhost/eja/forum/deletar',
	    	type:'POST',
	    	data:{id: id},
	    	success:function(resp){
	    		alert(resp);
	    		location.href= "http://localhost/eja/forum/listar";
	    	}
	    });
} else {
  			
			}
	});
});

$(function(){

	$('#editEx').on('submit', function(e){
		e.preventDefault();
	let id = $('[name=id_e]').val();
	let pergunta = $('[name=pergunta]').val();
	let opcao1 = $('[name=opcao1]').val();
	let opcao2 = $('[name=opcao2]').val();
	let opcao3 = $('[name=opcao3]').val();
	let opcao4 = $('[name=opcao4]').val();
	let opcao5 = $('[name=opcao5]').val();
	let resposta = $('[name=resposta]:checked').val();

		$.ajax({
			url:'http://localhost/eja/exercicios/editar',
			type:'POST',
			data:{id: id, pergunta: pergunta, resposta: resposta, opcao1: opcao1, 
			opcao2: opcao2, opcao3: opcao3, opcao4: opcao4, opcao5: opcao5},
				  success:function(msg){
				  	alert(msg);
				  	location.href = 'http://localhost/eja/exercicios/listar';
				  }
		});
	});

});
		
$(document).ready(function(){
   $("button[name=btdel]").click(function(ev){
	    
	    let id = $(this).val();
	    let resp = confirm("ATENÇÃO: Você esta preste a deletar um arquivo!\nVocê realmente deseja deletar?");

	    if (resp == true) {

	    $.ajax({
	    	url:'http://localhost/eja/exercicios/deletar',
	    	type:'POST',
	    	data:{id: id},
	    	success:function(resp){
	    		alert(resp);
	    		location.href= "http://localhost/eja/exercicios/listar";
	    	}
	    });
} else {
  			
			}
	});
});

