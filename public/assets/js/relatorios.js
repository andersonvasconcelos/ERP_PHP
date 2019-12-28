//Pegar as cidades depois de selecionar o estado de nascimento//
$(document).ready(function(){
            $('[name=selectAno]').change(function(){
            	let mes = $('[name=selectMes]').val();
            	let ano = $('[name=selectAno]').val();

            	

            $.ajax({
            	url:urlBase+'relatorios/getFaturamento',
            	type:'POST',
            	data:{mes: mes, ano: ano},
            	success:function(result){
            	$('.faturamento').html(result);
            	}
            });
                
            });
        });

