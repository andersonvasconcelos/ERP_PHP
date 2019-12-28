 <h2><?=$pagina?></h2>
  <hr>
  <div class="rradio">
    <div class="interna">
        <div class="row">
          <form method="POST" action="<?=BASE_URL?>campanhas/edit">
            <input type="hidden" value="<?=$cp->id_cp?>" name="id">
            <div class="form-group col-md-4">
              <label>Polo</label>
               <select class="form-control" name="polo">
                <option value="<?=$cp->polo_id?>"><?=$cp->apelido?></option>
                <?php foreach($polos as $item){?>
                  <option value="<?=$item['id_polo']?>"><?=$item['apelido']?></option>
                <?php } ?>
              </select>
           
            </div>
            <div class="form-group col-md-8">
              <label>Nome</label>
              <input type="text" class="form-control" value="<?=$cp->nome_cp?>" name="nome_cp">
            </div>
            <div class="form-group col-md-4">
              <label>Valor (<em class="atributo">Para R$10,00  insira 1000</em>)</label>
              <input type="text" class="form-control" value="<?=$cp->desconto?>" name="desconto">
            </div>
            <div class="form-group col-md-3">
              <label>Inicio</label>
              <input type="text" class="form-control" value="<?=$cp->inicio?>" name="inicio">
            </div>
            <div class="form-group col-md-3">
              <label>Fim</label>
              <input type="text" class="form-control" value="<?=$cp->fim?>" name="fim">
            </div>
            <div class="form-group col-md-2">
              <label>Cupom</label>
              <input type="text" class="form-control" value="<?=$cp->cupom?>" name="cupom">
            </div>
            <div class="col-md-12">
              <hr>
              <div class="form-group">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
                <button type="submit" class="btn btn-success">Editar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
