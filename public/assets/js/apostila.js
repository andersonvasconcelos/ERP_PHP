$(function(){

	$('#addApostila').on('submit', function(e){
		e.preventDefault();
		
		let form = $('#addApostila')[0];
		let data = new FormData(form);

		$.ajax({
			url:'http://localhost/eja/apostilas/add',
			type:'POST',
			data:data,
			contentType:false,
			processData:false,
				  success:function(msg){
				  	alert(msg);
				  	location.href = 'http://localhost/eja/apostilas/listar';
				  }
		});
	});

});
		
$(document).ready(function(){
   $("button[name=btndel]").click(function(ev){
	    
	    let id = $(this).val();
	    let resp = confirm("ATENÇÃO: Você esta preste a deletar um arquivo!\nVocê realmente deseja deletar?");

	    if (resp == true) {

	    $.ajax({
	    	url:'http://localhost/eja/apostilas/deletar',
	    	type:'POST',
	    	data:{id: id},
	    	success:function(resp){
	    		alert(resp);
	    		location.href= "http://localhost/eja/apostilas/listar";
	    	}
	    });
} else {
  			
			}
	});
});
