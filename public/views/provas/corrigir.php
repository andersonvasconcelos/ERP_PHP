
 <h2><?=$pagina?></h2>

<table class="table">
    <tr>
        <th>RA</th>
        <th>Nome</th>
        <th>Curso</th>
        <th>Area</th>
        <th>Data</th>
    </tr>
    <tr>
        <td><?php echo $dado['numero_matricula'];?></td>
        <td><?php echo $dado['nome_aluno'];?></td>
        <td><?php echo $dado['nome_curso'];?></td>
        <td><?php echo mb_strtoupper($dado['nome_area'], 'UTF-8');?></td>
        <td><?php echo $this->formatData($dado['data_prova']);?></td>
    </tr>
</table>
<table class="table table-striped table-bordered table-hover" style="width: 0 !important"> 
 <form method="POST" action="<?php echo BASE_URL?>prova/correcao">
 	<input type="hidden" name="area" value="<?=$alunos['area_id']?>">
    <tr>
        <th>Exercício</th>
        <th>Escolha uma opção</th>
    </tr>
<?php 

    $ex = json_decode($alunos['exercicios_id']);
    $total = count($ex); 
    $i = 1;
     
        foreach ($ex as $id_exercicio) 
        {
            $r = $this->respostas($id_exercicio);
            /*if ($i <= 10) {*/?>
                <tr>
                    <td><input type="hidden" name="exer[<?php echo $i?>]" value="<?php echo $r['resposta']?>"><?php echo $i?></td>
                    <td>
                        <input type="radio" name="respostas[<?php echo $i?>]" value="opcao1" required>A 
                        <input type="radio" name="respostas[<?php echo $i?>]" value="opcao2" required>B
                        <input type="radio" name="respostas[<?php echo $i?>]" value="opcao3" required>C
                        <input type="radio" name="respostas[<?php echo $i?>]" value="opcao4" required>D
                        <input type="radio" name="respostas[<?php echo $i?>]" value="opcao5" required>E
                    </td>
                </tr>

            <?php  $i++; }?>
</table> 
<input type="hidden" name="prova" value="<?=$dado['id_prova']?>">
<input type="submit" class="btn btn-success" value="Corrigir"></form>
</main>
  </body>
</html>
