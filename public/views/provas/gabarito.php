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
<table class="table table-striped table-bordered table-hover"> 
 
    <tr>
	    <th>Exercício</th>
	    <th>Reposta Correta</th>
	</tr>
<?php 
# code...

    $ex = json_decode($alunos['exercicios_id']);
    $total = count($ex); 


    $i = 1;
     
        foreach ($ex as $id_exercicio) 
        {
            $r = $this->respostas($id_exercicio);
            /*if ($i <= 10) {*/?>
                <tr> 
                	<td><?php echo $i?></td>
                	<td><?php echo $this->mudarResposta($r['resposta']);?> </td>
                </tr>

            <?php  $i++; } /*
             elseif ($i <= 20) {?>
                <tr><td><?php echo $i.'.'.$this->mudarResposta($r['resposta']);?> </td></tr>
            <?php   }
           /* echo '<p class="linha">';
            echo $i.'.'.$this->mudarResposta($r['resposta']);
            echo '</p>';*/
            

?>
</table> 
</main>
  </body>
</html>
