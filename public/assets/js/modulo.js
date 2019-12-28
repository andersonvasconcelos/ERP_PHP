
$('#delModulo').on('show.bs.modal', function (event) {
  let button = $(event.relatedTarget) // Button that triggered the modal
  let id_mod = button.data('id_mod') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  let modal = $(this)
  modal.find('.modal-title').text('Deletar modulo ')
  modal.find('#id_modulo').val(id_mod)
})  

$(function(){
$('#delMod').on('submit', function(e){
	e.preventDefault();
	let id = $('#id_modulo').val();

	$.ajax({
		url:'http://localhost/eja/modulos/deletar',
		type:'POST',
		data:{id: id},
		success:function(erro){
			alert(erro);
			location.href = "http://localhost/eja/modulos/listar";
			}
		});

	});
});
