$(function(){

	$('#addCol').on('submit', function(e){
		e.preventDefault();

		let form = $('#addCol')[0];
		let data = new FormData(form);

		/*let nome = $('[name=nome_colaborador]').val();
		let cpf = $('[name=cpf]').val();
		let tel = $('[name=telefone_colaborador]').val();
		let email = $('[name=email_colaborador]').val();
		let senha = $('[name=senha_colaborador]').val();*/

		$.ajax({
			url:urlBase+'colaboradores/adicionar',
			type:'POST',
			data:data,
			contentType:false,
			processData:false,
			success:function(msg){
			 alert(msg);
			location.href = urlBase+'colaboradores/listar';
				  }
		});
	});

});


$(function(){
	$('#delCol').on('submit', function(e){
		e.preventDefault();
		let id_col = $('#id_col').val();
		$.ajax({
			url:urlBase+'colaboradores/deletar',
			type:'POST',
			data:{id_col: id_col},
			success:function(resp){
				alert(resp);
				location.href = urlBase+'colaboradores/listar';
			}

		});
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
});

$(document).ready(function() {
$("input[name='itens[]']").click(function(){
			let grupo_id = $('[name=id_grupo]').val();
			let $this = $( this );//guardando o ponteiro em uma letiavel, por performancens
			let status = $this.attr('checked') ? 1 : 0;
			let id = $this.next('input').val();

			itens = new Array();
		$("input[type=checkbox][name='itens[]']:checked").each(function(){
   		 itens.push($(this).val());
		});

			let checado = $this.is(":checked"); 
			if( checado == true){
				
				$.ajax({
				url: urlBase+'colaboradores/addPermissao',
				type: 'GET',
				data: 'status='+status+'&id='+id+'&grupo_id='+grupo_id,
				success: function( data ){
					alert( data );
				}
			});

			} else{
				//alert('deschecado');
				$.ajax({
			url:urlBase+'colaboradores/delPermissao',
			type:'GET',
			data: 'status='+status+'&id='+id+'&grupo_id='+grupo_id,
			success:function(resp){
				alert(resp);
			}

		});
			}
			console.log($this.is(":checked"));
			

		
	});
});
