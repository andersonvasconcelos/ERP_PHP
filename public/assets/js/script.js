const urlBase = $('#urlBase').val();    

$(document).ready(function() {
    $('#table_id').DataTable( {
        "language": {
             "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
        }
    } );
} );

$(document).ready(function() {
    $('#tb').DataTable( {
        "language": {
             "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
        }
    } );
} );


$(document).ready(function() {
    $('#academico').DataTable( {
         initComplete: function () {
            this.api().columns([0, 3, 4]).every( function () {
                let column = this;
                let select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        let val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        "language": {
             "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
        }

    } );
} );

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
});

$(document).ready(function(){
$(".cxa").keyup(function(){
$(this).val($(this).val().toUpperCase());
});
});

$(document).ready(function () { 
        let cpf = $('#cpf');
        cpf.mask('000.000.000-00', {reverse: true});

        let cnpj = $('[name=cnpj]');
        cnpj.mask('00.000.000/0000-00', {reverse: true});

        let telefone = $('.tel');
        telefone.mask('00 0000-0000', {reverse: true});

        let celular = $('.cel');
        celular.mask('00 0 0000-0000', {reverse: true});

        $('.dinheiro').mask('#.##0,00', {reverse: true});
        $('.rg').mask('00.000.000-000');
        $('.data').mask('00/00/0000');
        $('.cartaoCredito').mask('0000 0000 0000 0000');
    });

$(document).ready(function() {
      $("#id_tipo_contacto").on('change', function(){
          $(".formulario").hide();
          $('#' + this.value).show();
});
});

  function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
           
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova letiável "cep" somente com dígitos.
        let cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            let validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                let script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

$(document).ready(function() {
  $('#summernote').summernote();
});

function confirmExcluir(id)
{
  swal({
      title: "Excluir",
      text: "Confirma a exclusão?",
      type: "error",
      showCancelButton: false,
      confirmButtonClass: 'btn-success',
      confirmButtonText: 'OK!',
      closeOnConfirm: false
   }, function () {
      window.location.href = 'deletrow.php?id=' + id;   
   });
}

//fazer login
$(document).ready(function(){
    $('#formLogin').on('submit', function(e){
        e.preventDefault();
        
        let login = $('[name=login]').val();
        let senha = $('[name=senha]').val();

    if (login.length <= 4) {alert("ERRO: digite o login completo");} 
    else if (senha.length < 3) {alert("ERRO: digite a senha completa");} 
    else{
        $.ajax({
          url:'http://localhost/eja/login/logar',
          type:'POST',
          data:{login: login, senha: senha},
          success:function(msg){
            console.log(msg);
            let tentativas = 4 - msg;
            if(msg == 0){
              alert('Login feito com sucesso!');
              location.href = 'http://localhost/eja/';
              }
            else if (msg <= 4){alert('Cuidado: Você tem mais '+tentativas+' tentativas');}
            else if (msg >= 5){
              alert('Usuário bloqueado procure o diretor do polo!');
              location.href = 'http://localhost/eja/login/logout';
            } 
          },
          error: function(msg) {
          console.log(msg);
      }
        })
        
              }
    });
  });   

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


// verifica se ter matricula nova // 
function verificaAlerta(){
    $.ajax({
        url:urlBase+'alertas/qtAlertas/',
        type:'POST',
        dataType:'json',
        success:function(resposta){
            console.log(resposta);
            //alert(json.cliente_id);
            if (resposta > 0) {
                $('.header').html('Você tem '+resposta+ ' notificações' );
                $('.nt').html(resposta);
            }else{
                $('.nt').html('0');
                $('.header').html('Você tem 0 notificações' );
            }   
        }
    });
}
// alerta lido //
$(function(){
    setInterval(verificaAlerta, 10000);
    verificaAlerta();

    $('.alido').on('click', function(){
        let id = $(this).attr('data-id');
            $.ajax({
            url:urlBase+'alertas/lidoAlert/',
            type:'POST',
            data:{id:id},
            dataType:'json',
            success:function(resposta){
                console.log(resposta);
                location.href = urlBase+'liberarMatricula/liberacao/'+resposta;          
            }
         });
     });
});

$(document).ready(function(){
$("[name=cpf]").on('blur', function(){
    let cpf = $('[name=cpf]').val();

        $.ajax({
            url:urlBase+'servicos/getAlunos/',
            type:'POST',
            data:{cpf:cpf},
            dataType:'json',
             success:function(r){
                console.log(r);
                $('#name').val(r.nome_aluno); 
                $('#email').val(r.email_aluno); 
                $('#fixo').val(r.telefone_aluno.substring(0,2)); 
                $('#phone').val(r.telefone_aluno.substring(3,15));
                $('#rua').val(r.endereco_aluno); 
                $('#numero').val(r.numero_aluno); 
                $('#bairro').val(r.bairro_aluno); 
                $('#cidade').val(r.cidade_aluno); 
                $('#estado').val(r.estado_aluno);
                $('#cep').val(r.cep);
                $('#id_aluno').val(r.numero_matricula);          
            }

        });

    });
});
