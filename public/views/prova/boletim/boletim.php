
<?php if (!empty($infor)){ ?>
    
<table class="table">
    <tr>
        <td><strong>Nome:</strong></td>
        <td><?=$infor->nome_aluno?></td>
    </tr>
    <tr>
        <td><strong>RA:</strong></td>
        <td><?=$infor->numero_matricula?></td>
    </tr>
    <tr>
        <td><strong>CPF:</strong></td>
        <td><?=$infor->cpf_aluno?></td>
    </tr>
    <tr>
        <td><strong>CURSO:</strong></td>
        <td><?=$infor->nome_curso?></td>
    </tr>
    <tr>
        <td><strong>DATA:</strong></td> 
        <td><?=date('d/m/Y')?></td>
    </tr>
</table>
<hr>
<?php } ?>

<?php if ($infor->area_id == 5) {?>

<table width="100%" class="table table-striped table-bordered">
        <tr>
            <th>RA</th>
            <th>Nome</th>
            <th>Nota</th>
        </tr>
            <tr>
                <td><?=$infor->numero_matricula?></td>
                <td><?=$infor->nome_aluno?></td>
                <td><?php echo $infor->nota ?></td>
            </tr>
    </table>
<?php } else{

    if (!empty($notas)) { ?>

     
    <table width="100%" class="table table-striped table-bordered">
        
            <tr>
                <tr>
                    <th>ÁREAS DE CONHECIMENTO</th>
                    <th>DISCIPLINAS</th>
                    <th>NOTA</th>
                </tr>
               
         <?php foreach ($notas as $n): ?> 
           
            <tr>
                <td><?=$n->nome_area?></td>
                <td><?=substr($n->nome_modulo, 9)?></td>
                <td><?=$this->notaDez($n->nota)?></td> 
            </tr>
    <?php endforeach ?>
    </table>
     
    <?php }  

} ?>
    

<a href="javascript:history.back()" class="btn btn-danger">Voltar</a>