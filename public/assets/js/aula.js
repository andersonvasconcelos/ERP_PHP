
$('#delaModal').on('show.bs.modal', function (event) {
  let button = $(event.relatedTarget) // Button that triggered the modal
  let recipient = button.data('id_aula') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  let modal = $(this)
  modal.find('.modal-title').text('Deletar curso ')
  modal.find('#id_aula').val(recipient)
})

$(function(){
$('#delCurso').on('submit', function(e){
	e.preventDefault();
		let id = $('[name=id_curso]').val();

	$.ajax({
		url:'http://localhost/eja/cursos/deletar',
		type:'POST',
		data:{id: id},
		success:function(msg){
			alert(msg);
			location.href = "http://localhost/eja/cursos/listar";
		}
		});
	});
});
