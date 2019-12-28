

 <h2><?=$pagina?></h2>

<hr>

<?php if (!empty($acertos) && !empty($nota))  {?>
<table class="table table-striped table-bordered table-hover"> 
     <tr>
        <td>RA:</td>
        <td><?php echo $dado['numero_matricula'];?></td>
    </tr>
     <tr>
        <td>Nome Aluno:</td>
        <td><?php echo $dado['nome_aluno'];?></td>
    </tr>
     <tr>
        <td>Curso:</td>
        <td><?php echo $dado['nome_curso'];?></td>
    </tr>
     <tr>
        <td>Data da Prova:</td>
        <td><?php echo $this->formatData($dado['data_prova']);?></td>
    </tr>
    <tr>
        <td>Quantidade de questôes certas:</td>
        <td><?=$acertos?></td>
    </tr>
    <tr>
        <td>Nota da Prova:</td>
        <td><?=$nota?></td>
    </tr>
</table>

<?php echo $msg; } elseif (isset($_GET['id_prova'])){
echo 'teste';
}?>