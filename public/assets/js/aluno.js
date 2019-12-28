//Pegar as cidades depois de selecionar o estado de nascimento//
$(document).ready(function(){
            $('[name=estado_de_nascimento]').change(function(){
            	let estado = $('[name=estado_de_nascimento]').val();

            $.ajax({
            	url:urlBase+'home/getCidadesUf',
            	type:'POST',
            	data:{estado: estado},
            	success:function(result){
            	$('[name=cidade_de_nascimento]').html(result);
            	}
            });
                

            });
        });

$(document).ready(function(){
	$('#email').change(function(){
		$('#cpf').unmask();
		let cpf = $('#cpf').val();

		$('#senha').val(cpf);
	});
});

//TIPO DE DOCUMENTOS E REQUERIMENTO CLASSIFICACAO / APROVEITAMENTO / MATRICULA 
$(document).ready(function(){
	$('input[type=radio][name=tipo_matricula]').click(function() {
		let clas = $('.clas');
		let ap = $('.ap');
		let tr = $('.tr');
		let mat = $('.mat');

		let tipo = $('input[type=radio][name=tipo_matricula]:checked').val();
		if (tipo=='classificacao') {clas.show(); ap.hide(); tr.hide(); mat.hide();}
		else if (tipo=='aproveitamento') {ap.show(); clas.hide(); tr.hide(); mat.show();}
		else if (tipo=='transferencia') {tr.show(); ap.hide(); clas.hide();} 
		else if (tipo=='matricula') {tr.hide(); ap.hide(); clas.hide(); mat.show();} 
	});
});

//Pegar as cidades depois de selecionar o estado de titulo de eleitor//
$(document).ready(function(){
            $('[name=estado_t]').change(function(){
            	let estado = $('[name=estado_t]').val();

            $.ajax({
            	url:urlBase+'home/getCidadesUf',
            	type:'POST',
            	data:{estado: estado},
            	success:function(result){
            	$('[name=cidade_t]').html(result);
            	}
            });
                

            });
        });


//Adicionar Aluno//
$(function(){

	$('#addAluno').on('submit', function(e){
		e.preventDefault();
		
		let form = $('#addAluno')[0];
		let data = new FormData(form);
		let esconder = $('.esconder');

		$.ajax({
			url:urlBase+'alunos/adicionar',
			type:'POST',
			data:data,
			dataType:'json',
			contentType:false,
			processData:false,
				  success:function(msg){
				  	console.log(msg);
				  	if (msg == 0) {alert('Não é possível cadastrar aluno!');}
				  	else{
				  		swal("Good job!", "Aluno Cadastrado com Sucesso!", "success");
				  		esconder.show();
				$('.aluno').html('\
 			<input type="hidden" name="aluno_id" id="aluno_id" value="'+msg+'">');
				  	}
				  },
				  error: function (result) {
				  	console.log(result);
				  swal("Atenção!", "CPF ou email já cadastrado!", "error");	
                        }
		});


	});

}); 

//Editar Aluno//
$(function(){

	$('#editAluno').on('submit', function(e){
		e.preventDefault();

		var form = $('#editAluno')[0];
		var data = new FormData(form);
		$.ajax({
			url:urlBase+'alunos/editarAluno',
			type:'POST',
			data:data,
			contentType:false,
			processData:false,
				  success:function(msg){
				  	console.log(msg);
				  	if (msg === 'success') {swal('Aluno editado com sucesso!', {icon: 'success'})}
				  	else{swal(msg, {icon: 'error'})}
				  }
		});
	});

});

//GERAR REQUERIMENTOS
$(document).ready(function(){
$(document).on('click', '.docs', function(e){
	let id = $('#id_aluno_docs').val();
	let pagina = $(this).data('p');
	let url = urlBase+'docs/gerarPdf/'+pagina+'/'+id;
	let win = window.open(url, '_blank');
	//window.location = "http://localhost/eja/docs/gerarPdf/"+pagina+'/'+id;
	
});
});
   
	//Deletar Aluno//	
$(document).ready(function(){
    $(document).on('click', '.del', function(e){
	    let tr = $(this).closest("tr");
	    let id = $(this).data('id');
	    //let id = $(this).val();
	    swal({
  title: "ATENÇÃO: Você vai deletar?",
  text: "Você esta preste a deletar um Aluno!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
		     url:urlBase+'alunos/deleteAluno',
		     type:'POST',
		     data:{id: id},
		     success:function(resp)
		     {
		       swal(resp, {icon: "success"})
		       .then((value) => {tr.fadeOut();});
			  }
	    	});
  
  } else {
    swal("Ação cancelada com sucesso!");
  }
});
	});
});


 // adicionar documentos do aluno    
$(document).ready(function(){
    $('#addDocs').on('submit', function(e){
    	e.preventDefault();

	    let forms = $('#addDocs')[0];
		let data = new FormData(forms);


		$.ajax({
			url:urlBase+'docs/adicionar',
			type:'POST',
			data:data,
			dataType:'json',
			contentType:false,
			processData:false,

		beforeSend: function(xhr) {
		$("#myModal").modal('show');
      	},

      	success:function(r){
      		console.log(r);
			if (r.erro == false) {
				swal("Parabéns!", r.msg, "success");
			} 
			else{ swal("ATENÇÃO!", r, "error"); }
		},
		error: function (r){
			console.log(r);
		alert('ERRO:!');
                        }
		});
 
	});
});

// Editar documentos / subir requerimentos
$(document).ready(function(){
	$('#editDocs').on('submit', function(e){
		e.preventDefault();
		let curso = $('.curso');
		let docs = $('#editDocs')[0];
		let data = new FormData(docs);

		$.ajax({
			url:urlBase+'docs/editar',
			type:'POST',
			data:data,
			contentType:false,
			processData:false,
				  success:function(msg){
				  	alert(msg);
				  	curso.show();
				  	//location.href = (urlBase+'matriculas/');	  			
				  			},
				  error: function (result) {
                           alert('ERRO:!');
                        }
		});

	});
});

