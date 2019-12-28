 <h2><?=$pagina?></h2>
  <hr>
  <div class="rradio">
    <div class="interna">
        <div class="row">
          <form method="POST" action="<?=BASE_URL?>campanhas/add">
            <div class="form-group col-md-4">
              <label>Polo</label>
              <select class="form-control" name="polo">
                <option>Escolha um polo</option>
                <?php foreach($polos as $item){?>
                  <option value="<?=$item['id_polo']?>"><?=$item['apelido']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-8">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome_cp">
            </div>
            <div class="form-group col-md-4">
              <label>Valor (<em class="atributo">Para R$10,00  insira 1000</em>)</label>
              <input type="text" class="form-control" placeholder="0000" name="desconto">
            </div>
            <div class="form-group col-md-3">
              <label>Inicio</label>
              <input type="date" class="form-control" name="inicio">
            </div>
            <div class="form-group col-md-3">
              <label>Fim</label>
              <input type="date" class="form-control" name="fim">
            </div>
            <div class="form-group col-md-2">
              <label>Cupom</label>
              <input type="text" class="form-control" value="<?php echo '#' . strtoupper(substr(md5(microtime()),0,6)); ?>" name="cupom">
            </div>
            <div class="col-md-12">
              <hr>
              <div class="form-group">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
                <button type="submit" class="btn btn-success">Cadastrar Campanha</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
