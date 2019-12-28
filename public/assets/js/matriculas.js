// ADICIONAR MATRICULA // 
$(function(){

	$('#addMat').on('submit', function(e){
		e.preventDefault();

		let id_curso = $('#id_curso').val();
		let id_aluno = $('#aluno_id').val();
		let tipo_matricula = $('[name=tipo_matricula]').val();
		

		if (id_curso == 0) {
			alert("ERRO: Curso não pode estar vazio");
		} else{

		$.ajax({
			url:urlBase+'matriculas/adicionar',
			type:'POST',
			data:{id: id_aluno, id_curso: id_curso, tipo: tipo_matricula},
			dataType:'json',
			success:function(msg){
				if (msg.erro == true ) 
				{
					console.log(msg);
				  		swal({
							  title: "ERRO AO MATRICULAR!",
							  text: msg.msg,
							  icon: "error",
							  buttons: "Sair",
							});
				} 
				else
				{
					console.log(msg);
					url = urlBase+'pagamentos/iugu/'+msg;
					cc = urlBase+'pagamentos/iugu/'+msg;

					swal({
					  title: "Aluno Matriculado com sucesso!",
					  text: "Clique no botão de pagamento abaixo",
					  icon: "success",
					  buttons: {
					  	boleto:{
					  		text: "Ira para pagamento",
					  		value: "boleto",
					  	}, 
					  }
						}) .then((value) => {
						  switch (value) {
						 
						    case "boleto":
						      var win = window.open(url, '_blank');
						      location.href = (urlBase+'alunos/listar/')
						      break;
						 
						    case "cartao":
						      var win = window.open(cc, '_blank');
						      break; 
						  }
						});
 				} //fim else mensagem json
   		  		
   		  		;
			},
			error: function(msg) {
				console.log(msg);
				swal('ERRO!', msg.msg, 'error');
			}
		    
		});
	}//fim else;
	});

});

$(function(){
$('.indeferir').on('click', function(){
	$('.negado').show();
});
});

//CONFIRMAR MATRICULA //

$(function(){
$('.matricular').on('click', function(){

	let id = $('[name=id_matricula]').val();
	let id_aluno = $('[name=id_aluno]').val();
	let id_curso = $('[name=id_curso]').val();

		    swal({
  title: "ATENÇÃO:",
  text: "Você está um passo de confirmar a matrícula!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
		     url:urlBase+'liberarMatricula/confirmaMatricula',
		     type:'POST',
		     data:{id: id, id_aluno: id_aluno, id_curso: id_curso},
		     success:function(resp)
		     {
		     	console.log(resp);
		       swal(resp, {icon: "success"})
		       .then((value) => {
		       	location.href = urlBase+"liberarMatricula/listarMatriculas";
		       	;});
			  }
	    	});
  			
  } else {
    swal("Ação cancelada com sucesso!");
  }
});
});
});


// INDEFERIR MATRICULA DEIXAR PENDENTE //
$(function(){
$('.pendente').on('click', function(){

	let id = $('[name=id_matricula]').val();
	let negativa = $('[name=motivo]').val();

		    swal({
  title: "ATENÇÃO:",
  text: "Você está um passo de negar a matrícula!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
		     url:urlBase+'liberarMatricula/matriculaPendente',
		     type:'POST',
		     data:{id: id, negativa: negativa},
		     success:function(resp)
		     {
		       swal(resp, {icon: "success"})
		       .then((value) => {
		       	location.href = urlBase+"liberarMatricula/listarMatriculas";
		       	;});
			  }
	    	});
  			
  } else {
    swal("Ação cancelada com sucesso!");
  }
});
});
});



$(function(){
$('.editarM').on('click', function(){

let id = $('#id_mat').val();

		    swal({
  title: "ATENÇÃO: ",
  text: "Você realmente conferiu todos os dados!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
		     url:urlBase+'alunos/upEdit',
		     type:'POST',
		     data:{id: id},
		     success:function(resp)
		     {
		       swal(resp, {icon: "success"})
		       .then((value) => {
		       	location.href = urlBase+"alunos/matriculas";
		       	;});
			  }
	    	});
  			
  } else {
    swal("Ação cancelada com sucesso!");
  }
});

});
});

//updates docuemnto para liberar matricula
$(document).ready(function(){
    $('#upDocs').on('submit', function(e){
    	e.preventDefault();

	    let forms = $('#upDocs')[0];
		let data = new FormData(forms);


		$.ajax({
			url:urlBase+'docs/adicionar',
			type:'POST',
			data:data,
			contentType:false,
			processData:false,

		beforeSend: function(xhr) {
        $(".carregando").css('visibility', 'visible');
      	},
      
      // chamada quando a requisição termina (seja com erro ou OK)
      // alteramos e escondemos a imagem
      	complete: function(jqXHR, textStatus) {
        $(".carregando").css('visibility', 'hidden');
      	},
 
		success:function(msg){
		alert(msg);
		$('#docsModal').modal('hide');
				  			
				  			},
		error: function (result) {
		alert('ERRO:!');
                        }
		});

	});
});

// Editar documentos / subir requerimentos para liberar a matricula
$(document).ready(function(){
	$('#upEditDocs').on('submit', function(e){
		e.preventDefault();

		let docs = $('#upEditDocs')[0];
		let data = new FormData(docs);

		$.ajax({
			url:urlBase+'docs/editar',
			type:'POST',
			data:data,
			contentType:false,
			processData:false,
				  success:function(msg){
				  	alert(msg);
				  	$('.hidebtn').hide();
				  	//location.href = (urlBase+'matriculas/');	  			
				  			},
				  error: function (result) {
                           alert('ERRO:!');
                        }
		});

	});
});

/*$(document).ready(function(){
$('#editarM').on('submit', function(e){
	e.preventDefault();

	let id = alert('oie');
});
});*/
$(document).ready(function(){
    $(document).on('click', '.delMat', function(e){
    	e.preventDefault();
	    
	    let id = $(this).data('id');
	     swal({
  title: "ATENÇÃO:",
  text: "Você está um passo de DELETAR a matrícula!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
		     url:urlBase+'liberarMatricula/deletMatricula/',
		     type:'POST',
		     data:{id: id,},
		     success:function(resp)
		     {
		       swal(resp, {icon: "success"})
		       .then((value) => {
		       	location.href = urlBase+"liberarMatricula/listarMatriculas";
		       	;});
			  }
	    	});
  			
  } else {swal("Ação cancelada com sucesso!");}

    });
	   
 });
 });

// INCLUIR CONCLUIDO NO MODULO // 
	$(document).ready(function(){
    $(document).on('click', '.btn-fim', function(){
		let id = $(this).data('id');
			    swal({
  title: "ATENÇÃO: Tem certeza disso?",
  text: "Você esta preste a concluir um modulo para esse aluno!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
		     url:urlBase+'matriculas/fimMod',
		     type:'POST',
		     data:{id: id},
		     success:function(resp)
		     {
		     	console.log(resp);
		     	if (resp === 'success') 
		     	{
			       swal(resp, {icon: "success"})
			       .then((value) => {tr.fadeOut()});
			       setTimeout(function(){ 
   					location.href = urlBase+'matriculas/addFim';
   					}, 1500);
			  	}
			 }
	    	});
  
  } else {
    swal("Ação cancelada com sucesso!");
  }
});
	});
});
