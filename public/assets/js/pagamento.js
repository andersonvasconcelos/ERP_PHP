	//Deletar Aluno//	
$(document).ready(function(){
    $(document).on('click', '.deletarBoleto', function(e){
	    let id = $(this).data('id');

			     swal({
		  title: "ATENÇÃO: Você vai deletar?",
		  text: "Você esta preste a deletar um Boleto!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
				$.ajax({
					url:urlBase+'pagamentos/invalidarBoleto',
					type:'POST',
					data:{id: id},
					   success:function(resp)
					   {swal(resp, {icon: "success"})}
				});
		  
		  } else {
		    swal("Ação cancelada com sucesso!");
		  }
		});

});

});

// deletar boleto cancelado da tabela iugu
$(document).ready(function(){
	$(document).on('click', '.btn-del-canceled', function(e){
		e.preventDefault();
		let id = $(this).data('id');

		$.ajax({
			url:urlBase+'iugu/deletFatura',
			type:'POST',
			data:{id: id},
				  success:function(m){
				  	console.log(m);
				  	alert(m);
				  },error: function (m) {
				  	console.log(m);
				  }
			});
	});
});


// Invalidar boleto, Cancelar Boleto do IUGU 
$(document).ready(function(){
	$(document).on('click', '.btn-cancelar', function(e){
		e.preventDefault();
		let id = $(this).data('id');
		let token = $(this).data('token');

		$("#myModal").modal('show');

		$.ajax({
			url:urlBase+'iugu/invalidarFatura',
			type:'POST',
			data:{id: id, token: token},
				  success:function(m){
				  	console.log(m);
				  	alert(m);
				  	$("#myModal").modal('hide');
				  },error: function (m) {
				  	console.log(m);
				  	alert(m);
				  }
			});

	});
});

// gerar boleto de serviços iugu
$(document).ready(function(){
	$('#gerarBoletoIugu').on('submit', function(e){
		e.preventDefault();
		
		let form = $('#gerarBoletoIugu')[0];
		let data = new FormData(form);
		let id_aluno = $('#id_aluno').val();

		$.ajax({
			url:urlBase+'servicos/boleto',
			type:'POST',
			data:data,
			dataType:'json',
			contentType:false,
			processData:false,
				  success:function(m){
					console.log(m);
					$("#myModalResult").modal('show'); 
        $("#carne").append(
        "<tr>"+
        '<td><a class="btn btn-default" target="_blank" href='+m+'>Imprimir Boleto</a></td>'+
        "</tr>");

        $("#myModal").modal('hide');
				  },
				  error: function (m) {
				  	console.log(m);
				  }
		});
	});
}); 
