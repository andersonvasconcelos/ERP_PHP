$(function(){
	$('#addCurso').on('submit', function(e) {
		e.preventDefault();
		let nome_curso = $('[name=nome_curso]').val();
		let descricao = $('[name=editordata]').val();
		let segmento = $('[name=segmento]').val();
		let tempo_de_acesso = $('[name=tempo_de_acesso]').val();
		let valor = $('[name=valor]').val();
		let comissao = $('[name=comissao]').val();

		$.ajax({
			url:urlBase+'cursos/adicionar',
			type:'POST',
			data:{nome_curso: nome_curso,
				descricao: descricao,
				segmento: segmento,
				tempo_de_acesso: tempo_de_acesso,
				valor: valor,
				comissao: comissao},
			success:function(msg){
				alert(msg);
				location.href = urlBase+'cursos/listar';
			}
		});
	});

});

$('#myModal').on('show.bs.modal', function (event) {
  let button = $(event.relatedTarget) // Button that triggered the modal
  let recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  let modal = $(this)
  modal.find('.modal-title').text('Deletar curso ')
  modal.find('.modal-body input').val(recipient)
})

$(function(){
$('#delCurso').on('click', function(e){
	e.preventDefault();
		let id = $('[name=id_curso]').val();

	$.ajax({
		url:urlBase+'cursos/deletar',
		type:'POST',
		data:{id: id},
		success:function(erro){
			confirm(erro);
			}
		});
	});
});
