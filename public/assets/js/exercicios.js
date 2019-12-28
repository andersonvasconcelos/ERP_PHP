$(function(){

	$('#addEx').on('submit', function(e){
		e.preventDefault();
	
	let pergunta = $('[name=pergunta]').val();
	let opcao1 = $('[name=opcao1]').val();
	let opcao2 = $('[name=opcao2]').val();
	let opcao3 = $('[name=opcao3]').val();
	let opcao4 = $('[name=opcao4]').val();
	let opcao5 = $('[name=opcao5]').val();
	let resposta = $('[name=resposta]:checked/*').val();

	if ($('#curso_id').val() == 0) {
    		
    		alert("Selecione um curso");}

    	else{let curso = $('#curso_id').val();}

		if ($('#id_modulo').val() == "Selecione") {
		
			alert("Selecione um modulo");}

		else{let modulo = $('#id_modulo').val();}


		$.ajax({
			url:urlBase+'exercicios/add',
			type:'POST',
			data:{curso: curso, modulo: modulo, pergunta: pergunta, 
			resposta: resposta, opcao1: opcao1, opcao2: opcao2, opcao3: opcao3, opcao4: opcao4,
			opcao5: opcao5},
				  success:function(msg){
				  	alert(msg);
				  	location.href = urlBase+'exercicios/listar';
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
	    	url:urlBase+'exercicios/deletar',
	    	type:'POST',
	    	data:{id: id},
	    	success:function(resp){
	    		alert(resp);
	    		location.href= urlBase+'exercicios/listar';
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
			url:urlBase+'exercicios/editar',
			type:'POST',
			data:{id: id, pergunta: pergunta, resposta: resposta, opcao1: opcao1, 
			opcao2: opcao2, opcao3: opcao3, opcao4: opcao4, opcao5: opcao5},
				  success:function(msg){
				  	alert(msg);
				  	location.href = urlBase+'exercicios/listar';
				  }
		});
	});

});

//Pegar as disciplinas depois de selecionar o curso//
$(document).ready(function(){
            $('[name=curso_id]').change(function(){
            	let id = $('[name=curso_id]').val();

            $.ajax({
            	url:urlBase+'exercicios/getModulo',
            	type:'POST',
            	data:{id: id},
            	success:function(result){
            	$('[name=id_modulo]').html(result);
            	}
            });
                

            });
        });

//Pegar alunos matriculados depois de selecionar o curso//
$(document).ready(function(){
            $('[name=curso]').change(function(){
            	let id = $('[name=curso]').val();
            	let lg = $('.lg')

            	if (id == '76') {lg.hide();}
            	else if(id != '76'){lg.show();}
            $.ajax({
            	url:urlBase+'prova/getAlunoMatriculado',
            	type:'POST',
            	data:{id: id},
            	success:function(result){
            		console.log(result);
            	$('[name=id_aluno]').html(result);
            	}
            });
                

            });
        });
