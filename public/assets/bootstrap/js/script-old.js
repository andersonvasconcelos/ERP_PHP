// EMITIR BOLETO PARCELADO
$(document).ready(function(){
  $(".cnd").click(function (){
     var valor = $('input[name=valorf]:checked').val();
        var qtdp = $('[name=qtdp]').val();
        var nome_cliente = $('[name=nome_cliente]').val();
        var cpf_cliente = $('[name=cpf_cliente]').val();
        var endereco_cliente = $('[name=endereco_cliente]').val();
        var numero_cliente = $('[name=numero_cliente]').val();
        var bairro_cliente = $('[name=bairro_cliente]').val();
        var cidade_cliente = $('[name=cidade_cliente]').val();
        var estado_cliente = $('[name=estado_cliente]').val();
        var cep_cliente = $('[name=cep_cliente]').val();
        var id_aluno = $('[name=id_aluno]').val();

        var p = new Array();
        var datat = new Array();

     $("input[name='parcela[]']").each(function ()
     {p.push( $(this).val());});

     $("input[name='nameval[]']").each(function ()
     {datat.push( $(this).val());});

     $("#myModal").modal('show');  
     
        $.ajax({
    url:'https://erp.portaleja.com.br/pagamentos/pjBoleto',
    type:'POST',
    data:{'datat': datat, 'parcela': p, 'valor': valor, 'qtdp': qtdp,
        'nome_cliente': nome_cliente, 'cpf_cliente': cpf_cliente,
        'endereco_cliente': endereco_cliente, 'numero_cliente': numero_cliente,
        'bairro_cliente': bairro_cliente, 'cidade_cliente': cidade_cliente, 
        'estado_cliente': estado_cliente, 'cep_cliente': cep_cliente, 'id_aluno': id_aluno},
        dataType:'json',
    success:function(resposta){

        if (resposta.status != '201' ) {
        swal("Erro ao gerar Cobrança", resposta.msg, "error");
        //alert('Erro: '+resposta.msg);
        $("#myModal").modal('hide');
        } else{
        $("#myModalResult").modal('show'); 
        $("#carne").append(
        "<tr>"+
        '<td><a class="btn btn-default" target="_blank" href="https://erp.portaleja.com.br/pagamentos/getCarne/'+id_aluno+'">Imprimir Carne</a></td>'+
        '<td><a class="btn btn-success" target="_blank" href="https://erp.portaleja.com.br/docs/gerarPdf/contrato/'+id_aluno+'">Gerar Contrato</a></td>'+
        "</tr>");

        $("#myModal").modal('hide');}
        },
        error: function(resposta){
        console.log(resposta);
        alert('Erro verificar se todos os dados foram inseridos');
        }
        });
  });

});

// EMITIR BOLETO ENTRADS + PARCELA
$(document).ready(function(){
  $(".bep").click(function (){

    var qtdp = $('[name=qtd]').val();

    if(qtdp > 14){
      alert("O máximo de parcela permitido é 14");
      return;
        }

        var valorEntrada = $('[name=valorEntrada]').val();
        var valor = $('[name=valorf]').val();

        var vp = new Array();
        vp.push(valorEntrada);

        $("input[name='valorParcelas[]']").each(function ()
        {vp.push( $(this).val());});

        var total = 0;
        for (var i = 0; i <vp.length; i++) {
          total += parseFloat(vp[i]);
        }

        if (total < valor) {
           alert("O valor das parcelas tem que ser igual ao valor do curso");
          return;
        }

        var nome_cliente = $('[name=nome_cliente]').val();
        var cpf_cliente = $('[name=cpf_cliente]').val();
        var endereco_cliente = $('[name=endereco_cliente]').val();
        var numero_cliente = $('[name=numero_cliente]').val();
        var bairro_cliente = $('[name=bairro_cliente]').val();
        var cidade_cliente = $('[name=cidade_cliente]').val();
        var estado_cliente = $('[name=estado_cliente]').val();
        var cep_cliente = $('[name=cep_cliente]').val();
        var id_aluno = $('[name=id_aluno]').val();
        var dt = $('[name=dt]').val();
        var empresa_convenio = $('[name=empresa_convenio]').val();

        var p = new Array();
        var datat = new Array();

        datat.push(dt);

     $("input[name='parcela[]']").each(function ()
     {p.push( $(this).val());});

     $("input[name='datav[]']").each(function ()
     {datat.push( $(this).val());});

     $("#myModal").modal('show');  

     if (total <= 1000){
      $.ajax({
    url:'https://erp.portaleja.com.br/pagamentos/pjArea',
    type:'POST',
    data:{'datat': datat, 'parcela': p, 'valor': vp, 'qtdp': qtdp,
        'nome_cliente': nome_cliente, 'cpf_cliente': cpf_cliente,
        'endereco_cliente': endereco_cliente, 'numero_cliente': numero_cliente,
        'bairro_cliente': bairro_cliente, 'cidade_cliente': cidade_cliente, 
        'estado_cliente': estado_cliente, 'cep_cliente': cep_cliente, 'id_aluno': id_aluno,
        'empresa_convenio': empresa_convenio},
        dataType:'json',
    success:function(resposta){

        if (resposta.status != '201' ) {
        swal("Erro ao gerar Cobrança", resposta.msg, "error");
        //alert('Erro: '+resposta.msg);
        $("#myModal").modal('hide');
        } else{
        $("#myModalResult").modal('show'); 
        $("#carne").append(
        "<tr>"+
        '<td><a class="btn btn-default" target="_blank" href="https://erp.portaleja.com.br/pagamentos/getCarne/'+id_aluno+'">Imprimir Carne</a></td>'+
        '<td><a class="btn btn-success" target="_blank" href="https://erp.portaleja.com.br/docs/gerarPdf/contrato/'+id_aluno+'">Gerar Contrato</a></td>'+
        "</tr>");

        $("#myModal").modal('hide');}
        },
        error: function(resposta){
        console.log(resposta);
        alert('Erro verificar se todos os dados foram inseridos');
        }
        });
   }

   else if (total >1000){
    
     $.ajax({
    url:'https://erp.portaleja.com.br/pagamentos/pjBoleto',
    type:'POST',
    data:{'datat': datat, 'parcela': p, 'valor': vp, 'qtdp': qtdp,
        'nome_cliente': nome_cliente, 'cpf_cliente': cpf_cliente,
        'endereco_cliente': endereco_cliente, 'numero_cliente': numero_cliente,
        'bairro_cliente': bairro_cliente, 'cidade_cliente': cidade_cliente, 
        'estado_cliente': estado_cliente, 'cep_cliente': cep_cliente, 'id_aluno': id_aluno,
        'empresa_convenio': empresa_convenio},
        dataType:'json',
    success:function(resposta){

        if (resposta.status != '201' ) {
        swal("Erro ao gerar Cobrança", resposta.msg, "error");
        //alert('Erro: '+resposta.msg);
        $("#myModal").modal('hide');
        } else{
        $("#myModalResult").modal('show'); 
        $("#carne").append(
        "<tr>"+
        '<td><a class="btn btn-default" target="_blank" href="https://erp.portaleja.com.br/pagamentos/getCarne/'+id_aluno+'">Imprimir Carne</a></td>'+
        '<td><a class="btn btn-success" target="_blank" href="https://erp.portaleja.com.br/docs/gerarPdf/contrato/'+id_aluno+'">Gerar Contrato</a></td>'+
        "</tr>");

        $("#myModal").modal('hide');}
        },
        error: function(resposta){
        console.log(resposta);
        alert('Erro verificar se todos os dados foram inseridos');
        }
        });
  }// fim else if > que 1000 
  });

});

// Gerear tabela com data de vencimento, valor entrada e valor das parcelas
$(document).ready(function(){
  $(".parcelas").click(function (){
    $("#table td").remove();
    var qtd = $('[name=qtd]').val();
    var data = $('[name=dt]').val();
    var valor = ($('[name=price_cents]').val());
    var valor = valor.replace(/\D+/g, '');
    var valor = valor.replace('00', '');
    var valorEntrada = $('[name=valorEntrada]').val();
    var valorParcelas = (valor - valorEntrada) /qtd;
    var table = $('#table');
    var dia = $('[name=dia_vencimento]').val();

function meses(mes){
  switch(mes){
    
    case '00':
    return '01';
    break;

    case '01':
    return '02';
    break;

      case '02':
    return '03';
    break;

    case '03':
    return '04';
    break;

    case '04':
    return '05';
    break;

      case '05':
    return '06';
    break;

      case '06':
    return '07';
    break;

    case '07':
    return '08';
    break;

      case '08':
    return '09';
    break;

    case '09':
    return '10';
    break;

    case 10:
    return 11;
    break;

      case 11:
    return 12;
    break;


  }
}

function correcaoMes(mes) {
    if (isNaN(mes)) return false;
    return mes < 10 ? "0" + mes : mes;
}
 
    for (var i = 0; i < qtd; i++) {

        data = data.split('-');
        data = (dia+'-'+data[1]+'-'+data[2]);
        data = data.split('-');
        data = new Date(data[2],data[1],data[0]);
        data.setMonth(data.getMonth());
        mes = meses(correcaoMes(data.getMonth()));
        data = data.getDate() + '-' + mes + '-' + data.getFullYear();

          $("#table").append(
            "<tr>"+
            "<td><input type='text' name='parcela[]' value='"+0+(i+1)+"'/></td>"+
            "<td><input type='text' name='datav[]' value='"+data+"'/></td>"+
            "<td><input type='text' name='valorParcelas[]' value='"+valorParcelas+"'/></td>"+
            "</tr>"); 
    }

     /*$("#table tfoot").html(
    "<tr>"+
   "<td colspan='5' style='text-align: left'>"+
    "<button type='button' id='bep' class='btn btn-success bep'>Gerar Boletos <img src='http://localhost/eja/assets/img/ok-mark.png'></button>"+
   "</td>"+
 "</tr>");*/

table.show();
$(".bep").show();
confirm('Atenção!! Confira todos os dados antes de finalizar o pagamento. Depois de gerado o pagamento o mesmo não poderá ser alterado!');
    });
});


// Gerear tabela com data de vencimento, valor entrada e valor das parcelas
$(document).ready(function(){
  $(".parcela").click(function (){
    $("#table td").remove();
    var qtd = $('[name=qtd]').val();
    var data = $('[name=dt]').val();
    var valor = $('[name=valorf]').val();
    var valorEntrada = $('[name=valorEntrada]').val();
    var valorParcelas = (valor - valorEntrada) /qtd;
    var table = $('#table');

function meses(mes){
  switch(mes){
    
    case '00':
    return '01';
    break;

    case '01':
    return '02';
    break;

      case '02':
    return '03';
    break;

    case '03':
    return '04';
    break;

    case '04':
    return '05';
    break;

      case '05':
    return '06';
    break;

      case '06':
    return '07';
    break;

    case '07':
    return '08';
    break;

      case '08':
    return '09';
    break;

    case '09':
    return '10';
    break;

    case 10:
    return 11;
    break;

      case 11:
    return 12;
    break;


  }
}

function correcaoMes(mes) {
    if (isNaN(mes)) return false;
    return mes < 10 ? "0" + mes : mes;
}
 
    for (var i = 0; i < qtd; i++) {

        data = data.split('-');
        data = (10+'-'+data[1]+'-'+data[2]);
        data = data.split('-');
        data = new Date(data[2],data[1],data[0]);
        data.setMonth(data.getMonth());
        mes = meses(correcaoMes(data.getMonth()));
        data = data.getDate() + '-' + mes + '-' + data.getFullYear();

          $("#table").append(
            "<tr>"+
            "<td><input type='text' name='parcela[]' value='"+0+(i+1)+"'/></td>"+
            "<td><input type='text' name='datav[]' value='"+data+"'/></td>"+
            "<td><input type='text' name='valorParcelas[]' value='"+valorParcelas+"'/></td>"+
            "</tr>"); 
    }

     /*$("#table tfoot").html(
    "<tr>"+
   "<td colspan='5' style='text-align: left'>"+
    "<button type='button' id='bep' class='btn btn-success bep'>Gerar Boletos <img src='http://localhost/eja/assets/img/ok-mark.png'></button>"+
   "</td>"+
 "</tr>");*/

table.show();
$(".bep").show();
confirm('Atenção!! Confira todos os dados antes de finalizar o pagamento. Depois de gerado o pagamento o mesmo não poderá ser alterado!');
    });
});


// MOSTRAR A DIV COM A FORMA DE PAGAMENTO DEPOIS DE ESCOLHER
$(document).ready(function(){
  $("[name=formaPgt]").change(function (){
     var formaPgt = $('[name=formaPgt]').val();
     var boletoP = $('.boletoP');
     var entradaP = $('.entradaP');
     var cartao = $('.cartao');

     if (formaPgt=='Boleto') {boletoP.show();entradaP.hide();cartao.hide()}
     else if(formaPgt == 'Boleto entrada + parcelas'){boletoP.hide();cartao.hide();entradaP.show();}
     else if(formaPgt == 'cartao'){boletoP.hide();entradaP.hide();cartao.show();} 

    });
});

$(document).ready(function(){
  $('.cp').change(function(){
    var classe = $('.emp_conv');
    classe.show();
  });
});

//Funcao para atualizar as parcelas e seus valores
 function atualizaValores(){
  // pegando a quantidade de parcelas
   var valor=$("#n-parcelas").val();

  //variavel que recebe os inputs(HTML)
   var geraInputs="";

  //Calculando o valor de cada parcela
   var vp = parseFloat($(".total").val()).toFixed(3);
   var vp = vp.replace('.', '');
   var tot = (vp/valor);
   var valorParcela = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'BRL' }).format(tot);
  
  //gerando os inputs com os valores de cada parcela
   geraInputs+="<td> Valor R$</td>"+
                "<td> <input type='text' name='parcela[]' value='"+valorParcela+"'></td>";
   

    // inserindo as parcelas 
    $("#parcelas").html(geraInputs);
   }

$(document).ready(function(e) {
    $(".total").on('change keyup keydown keypress',function(){
    // ao alterar o valor total, chama a funcao para alterar as parcelas
    atualizaValores();

  
  });
    $('#condicao-pag').on('change', 'select', function() {
  // ao alterar a condicao de pagamento,chama a funcao para alterar as parcelas
  atualizaValores();
        if($(this).val() == 1){
            $('#parcelamento').show();
            /*Calcular valor das parcelas (2x, 3x, 4x) e preencher inputs*/
            $('#parcelas').show();
        }
        else{
            $('#parcelamento').hide();
            $('#parcelas').hide();
            $("input[name='parcela[]']").val('');
        }
    })
          
    $('#n-parcelas').on('change', function() {
        /*Calcular valor das parcelas (2x, 3x, 4x) e preencher inputs*/
 //Ao alterar a quantidade e parcelas chama a funcao para alterar as parcelas
  atualizaValores();
    });
    
  
  
    });