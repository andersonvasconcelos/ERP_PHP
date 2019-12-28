const bUrl = 'https://erp.portaleja.com.br/';
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
    var valorParcelas = valor / qtd;
    var table = $('#table');
    var dia = $('[name=dia_vencimento]').val();
    if(valorEntrada == 0){
     swal("Erro!", "Valor da entrada não pode ser 0", "error");
    };

//Arrumar Mes
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
            "<td><input type='text' name='valorParcelas[]' value='"+valorParcelas+".00'/></td>"+
            "</tr>"); 
    }

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
  $('[name=campanha]').change(function() {
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
                "<td> <input type='text' class='form-control' name='parcela[]' value='"+valorParcela+"'></td>";
   

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

// Gerar Boleto 
$(function(){
  $('#ftIugu').on('submit', function(e){
        e.preventDefault();
        //var entrada = $('[name=valorEntrada]').val();
        var form = $('#ftIugu')[0];
        var data = new FormData(form);

        $("#myModal").modal('show');

      $.ajax({
        url:'https://erp.portaleja.com.br/pagamentos/iuguFatura',
        type:'POST',
        data:data,
        dataType:'json',
        contentType:false,
        processData:false,
        success:function(msg)
        {
          console.log(msg);
          if (msg.erro == 1) {
              swal("Erro!", msg.msg, "error");
            }
          else{
              console.log(msg);
              $("#myModalResult").modal('show'); 
              $("#carne").append(
              "<tr>"+
              '<td><a class="btn btn-default" target="_blank" href="'+bUrl+'pagamentos/gerarCarneIugu/'+msg+'">Imprimir Carne</a></td>'+
              "</tr>");
              $("#myModal").modal('hide');
            }
        },
        error: function (result) 
        {
          console.log(result);
          //swal("Atenção!", "Boleto nao foi gerado", "error");
        }
      });
  });
});