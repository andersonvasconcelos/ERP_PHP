$(function(){
	$('#addCpj').on('submit', function(e) {
		e.preventDefault();
		let nome = $('[name=nome_empresa]').val();
		let conta = $('[name=conta_repasse]').val();
		let agencia = $('[name=agencia_repasse]').val();
		let banco = $('[name=banco_repasse]').val();
		let cnpj = $('[name=cnpjs]').val();
		let ddd = $('[name=ddd]').val();
		let telefone = $('[name=telefone]').val();
		let email = $('[name=email]').val();
		let credencial = $('[name=credencial]').val();
		let chave = $('[name=chave]').val();
		let conta_virtual = $('[name=conta_virtual]').val();
				
		$.ajax({
			url:urlBase+'contas/adicionar',
			type:'POST',
			data:{nome: nome,
				  conta: conta,
				  agencia: agencia,
				  banco: banco,
				  cnpj: cnpj,
				  ddd: ddd,
				  telefone: telefone,
				  email: email,
				  credencial: credencial, 
					chave: chave,
					conta_virtual: conta_virtual},
			success:function(msg){
				alert(msg);
			}
		});
	});

});


$(document).ready(function(){
	$.ajax({
			url:urlBase+'contas/listar',
			type:'POST',
			dataType: "json",
        	contentType: "application/json; charset=utf-8",
			success:function(dados){
				$('[name=nome_empresa]').val(dados.nome_empresa);
				$('[name=conta_repasse]').val(dados.conta_repasse);
				$('[name=agencia_repasse]').val(dados.agencia_repasse);
				$('[name=banco_repasse]').val(dados.banco_repasse);
				$('[name=cnpjs]').val(dados.cnpj);
				$('[name=ddd]').val(dados.ddd);
				$('[name=telefone]').val(dados.telefone);
				$('[name=email]').val(dados.email);
				$('[name=client_id]').val(dados.client_id);
				$('[name=client_secret]').val(dados.client_secret);
				$('[name=id_conta]').val(dados.id_conta);
				$('[name=credencial]').val(dados.credencial);
				$('[name=chave]').val(dados.chave);
		        $('[name=conta_virtual]').val(dados.conta_virtual);
			}
		});
});

$(function(){
	$('#addGeN').on('submit', function(e){
		e.preventDefault();

		let client_id = $('[name=client_id]').val();
		let client_secret = $('[name=client_secret]').val();
		let id_conta = $('[name=id_conta]').val();

		$.ajax({
			url:urlBase+'contas/editarContaNet',
			type:'POST',
			data:{client_id: client_id, client_secret: client_secret, id_conta: id_conta},
			success:function(msg){
				alert(msg);
			}
		});
	});
});

$(document).ready(function(){
 function pegaValor(){
		let parcela = document.getElementsByName('parcela');
		let elemento = document.getElementsByName('nameval');
		let valor = $('[name=valor]').val();
		let qtdp = $('[name=qtdp]').val();
		let nome_cliente = $('[name=nome_cliente]').val();
		let cpf_cliente = $('[name=cpf_cliente]').val();
		let endereco_cliente = $('[name=endereco_cliente]').val();
		let numero_cliente = $('[name=numero_cliente]').val();
		let complemento_cliente = $('[name=complemento_cliente]').val();
		let bairro_cliente = $('[name=bairro_cliente]').val();
		let cidade_cliente = $('[name=cidade_cliente]').val();
		let estado_cliente = $('[name=estado_cliente]').val();
		let cep_cliente = $('[name=cep_cliente]').val();

 
       for(i=0;i<elemento.length;i++){
          let e = elemento[i];
          let p = parcela[i];
     
	          	$.ajax({
			url:urlBase+'pagamentos/pjBoleto',
			type:'POST',
			data:{id: e.value, parcela: p.value, valor: valor, qtdp: qtdp,
				nome_cliente: nome_cliente, cpf_cliente: cpf_cliente,
				endereco_cliente: endereco_cliente, numero_cliente: numero_cliente,
				complemento_cliente: complemento_cliente, bairro_cliente: bairro_cliente,
				cidade_cliente: cidade_cliente, estado_cliente: estado_cliente, 
				cep_cliente: cep_cliente},
			success:function(msg){
				alert(msg);
			}
			});
       	}//fim for
	}
});