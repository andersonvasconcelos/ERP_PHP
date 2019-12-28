$(function(){

	$('#addSeg').on('submit', function(e){
		e.preventDefault();

		let nome = $('#nome_segmento').val();

		/*let nome = $('[name=nome_colaborador]').val();
		let cpf = $('[name=cpf]').val();
		let tel = $('[name=telefone_colaborador]').val();
		let email = $('[name=email_colaborador]').val();
		let senha = $('[name=senha_colaborador]').val();*/

		$.ajax({
			url:'http://localhost/eja/segmentos/adicionar',
			type:'POST',
			data:{nome: nome},
			success:function(msg){
			 alert(msg);
			location.href = 'http://localhost/eja/segmentos';
				  }
		});
	});

});

$(function(){

	$('.editSegmento').on('submit', function(e){
		e.preventDefault();

		let id = $('#id_segmento').val();
		let nome = $('#nome_segmento').val();
		

		$.ajax({
			url:'http://localhost/eja/segmentos/editar',
			type:'POST',
			data:{id: id, nome: nome},
				  success:function(msg){
				  	alert(msg);
				  	location.href = 'http://localhost/eja/segmentos';
				  }
		});
	});

});

$(function(){
	$('.seg').on('click', function(){

		let id = $(this).val();
		let resp = confirm("ATENÇÃO: Você esta preste a deletar um Segmento!\nVocê realmente deseja deletar?");

		if (resp == true) {
		$.ajax({
			url:'http://localhost/eja/segmentos/deletar/'+id,
			type:'POST',
			success:function(resp){
				alert(resp);
				location.href = "http://localhost/eja/segmentos";
			}

		});
	}else {}
	});
});

$('#delcModal').on('show.bs.modal', function (event) {
  let button = $(event.relatedTarget) // Button that triggered the modal
  let id_col = button.data('id_col') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  let modal = $(this)
  modal.find('.modal-title').text('Deletar modulo ')
  modal.find('#id_col').val(id_col)
})  
