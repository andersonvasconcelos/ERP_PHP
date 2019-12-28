<?php if(!empty($saldo)){?>

 <h2><?=$pagina?></h2>
  <hr>
  <div class="rradio">
    <div class="interna">
      <div class="row">
        <form method="POST" action="<?=BASE_URL?>iugu/sacar">
          <div class="form-group col-md-12">
            <h3><strong>Disponível para saque : <?=$saldo->balance?></strong></h3>   
          </div>

  <div class="col-md-12">
    <hr>
    <div class="form-group">
      <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
      <input type="hidden" name="valorSaque" value="<?=$saldo->balance?>">
      <button type="submit" class="btn btn-success">Solicitar</button>
    </div>
  </div>
</form>
 </div>
</div>
</div>
<?php } ?>