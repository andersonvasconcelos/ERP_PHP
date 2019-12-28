$(function(){
	$('#curso_id').on('change', function(){

		let id = $('#curso_id').val();

		$.ajax({
			url:'http://localhost/eja/videos/getMid',
			type:'POST',
			data:{id: id},
			success:function(msg){
				$('#id_modulo').html(msg);
			}
		});
	});
});

$(function(){
	$('#id_modulo').on('change', function(){

		let id = $('#id_modulo').val();

		$.ajax({
			url:'http://localhost/eja/videos/getAid',
			type:'POST',
			data:{id: id},
			success:function(msg){
				$('#id_aula').html(msg);
			}
		});
	});
});        

$(function(){
	$('#addVideo').on('submit', function(e){
		e.preventDefault();

		
		
		let tipo = $("[name='tipo']:checked").val();
		let link = $('#link').val();

		if ($('#curso_id').val() == "Selecione") {
    		
    		alert("Selecione um curso");}

    	else{let curso = $('#curso_id').val();}

		if ($('#id_modulo').val() == "Selecione") {
		
			alert("Selecione um modulo");}

		else{let modulo = $('#id_modulo').val();}

		if ($('#id_aula').val() == "Selecione") {
		
			alert("Selecione um aula");}

		else{let aula = $('#id_aula').val();}


		$.ajax({
			url:'http://localhost/eja/videos/add',
			type:'POST',
			data:{curso: curso, modulo: modulo, aula: aula, tipo: tipo, link: link},
			success:function(msg){
				alert(msg);
			}
		});
		
	});
});    

$('#delvModal').on('show.bs.modal', function (event) {
  let button = $(event.relatedTarget) // Button that triggered the modal
  let recipient = button.data('id_video') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  let modal = $(this)
  modal.find('.modal-title').text('Atenção ')
  modal.find('#id_video').val(recipient)
})

$(function(){
	$('#delVid').on('submit', function(){
		let id = $('#id_video').val();

		$.ajax({
			url:'http://localhost/eja/videos/deletar',
			type:'POST',
			data:{id: id},
			success:function(resp){
				alert(resp);
				location.href = "http://localhost/eja/videos/listar";
			}
		});
	});
});