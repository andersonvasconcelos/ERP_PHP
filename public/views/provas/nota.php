

 <h2><?=$pagina?></h2>

<hr>

<table class="table table-striped table-bordered table-hover"> 
     <tr>
        <td><strong>RA:</strong></td>
        <td><?php echo $dado['numero_matricula'];?></td>
    </tr>
     <tr>
        <td><strong>Nome Aluno:</strong></td>
        <td><?php echo $dado['nome_aluno'];?></td>
    </tr>
     <tr>
        <td><strong>Curso:</strong></td>
        <td><?php echo $dado['nome_curso'];?></td>
    </tr>
      <tr>
        <td><strong>Área do Conhecimento:</strong></td>
        <td><?php echo mb_strtoupper($dado['nome_area'], 'UTF-8');?></td>
    </tr>
     <tr>
        <td><strong>Data da Prova:</strong></td>
        <td><?php echo $this->formatData($dado['data_prova']);?></td>
    </tr>
     <tr>
        <td><strong>Tentativas:</strong></td>
        <td><?php echo $dado['tentativa'];?></td>
    </tr>
    <tr>
        <td><strong>Quantidade de questões certas:</strong></td>
        <td><?php echo $dado['qtd_acertos'];?></td>
    </tr>
    <tr>
        <td><strong>Nota da Prova:</strong></td>
        <td><?php echo $dado['nota'];?></td>
    </tr>
      <tr>
        <td><strong>Média Final:</strong></td>
        <td><?php echo $media_final;?></td>

    </tr>
     <tr>
        <td colspan="2"><?php echo $msg;?></td>
    </tr>
</table>


<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>