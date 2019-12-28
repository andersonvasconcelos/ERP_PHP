//Adicionar Prova//
$(function(){

	$('#addProva').on('submit', function(e){
		e.preventDefault();

		let form = $('#addProva')[0];
		let data = new FormData(form);

		$.ajax({
			url:urlBase+'prova/gerarProva',
			type:'POST',
			data:data,
			dataType:'json',
			contentType:false,
			processData:false,
				  success: function(r){
				  	console.log(r);
				  	if (r.erro == true) {
				  		alert(r.msg);
				  	}else{
				  		swal("Good job!", r, "success");
				  	}
				  },
				  error: function (r) {
				  	console.log(r);
				  swal("Atenção!", r.msg, "error");	
                        }
		});


	});

}); 
