<?php if ($resp = $this->getBoletosPj()) {
  ?>
  <table id="table_id" class="display table-bordered">
     <thead>
    <tr>
      <th>#</th>
      <th>Aluno</th>
      <th>Situação</th>
      <th>Valor</th>
      <th>Data Vencimento</th>
      <th>Data Pagamento</th>
    </tr></thead>
      <tbody>

    <?php foreach ($resp as $r): ?>

    <tr>
        
      <td><?=$r->id_unico?></td>
      <td><?=$r->pagador?></td>
      <?php if ($r->registro_sistema_bancario == 'pendente'): ?>
        <td><span class="btn btn-sm btn-danger"><?=$r->registro_sistema_bancario?></span></td>
      <?php endif ?>     
      <td><?=$r->valor?></td>
      <td><?php echo date("d/m/Y", strtotime($r->data_vencimento))?></td>
      <td><?=$r->data_pagamento?></td>
    </tr>
          <?php endforeach ?>
  </tbody>
     <tfoot>
            <tr>
      <th>#</th>
      <th>Aluno</th>
      <th>Situação</th>
      <th>Valor</th>
      <th>Data Vencimento</th>
      <th>Data Pagamento</th>
            </tr>
        </tfoot>
</table>
  
<?php } ?>