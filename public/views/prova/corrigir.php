
 <h2><?=$pagina?></h2>
<div class="row">
    <div class="col-md-4">
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
        
        if(!empty($ex)){
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
                        <input type="radio" name="respostas[<?php echo $i?>]" value="nulo" required>N
                    </td>
                </tr>

            <?php  $i++; } 
        }?>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="prova" value="<?=$dado['id_prova']?>">
                    <input type="submit" class="btn btn-success" value="Corrigir Prova">
                </td>
            </tr>
        </form>
    </table>
</div>
    <div class="col-md-8">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Informações</div>

  <!-- Table -->
  <table class="table">
       
    <tr>
        <td><strong>RA</strong></td>
        <td><?php echo $dado['numero_matricula'];?></td>
    </tr>
    <tr>
        <td><strong>Nome</strong></td>
        <td><?php echo $dado['nome_aluno'];?></td>
    </tr>
    <tr>
        <td><strong>Curso</strong></td>
        <td><?php echo $dado['nome_curso'];?></td>
    </tr>
    <tr>
        <td><strong>Area</strong></td>
        <td><?php echo mb_strtoupper($dado['nome_area'], 'UTF-8');?></td>
    </tr>
    <tr>
        <td><strong>Disciplina</strong></td>
        <td><?php echo substr($dado['nome_modulo'], 8);?></td>
    </tr>
    <tr>
        <td><strong>Data</strong></td>
        <td><?php echo $this->formatData($dado['data_prova']);?></td>
    </tr>

  </table>
</div>
<div class="text-right">
<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar Pagina Anterior</a>
</div>
</div>







</div>

</main>
  </body>
</html>
