    <!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Um momento.</h4>
                </div>
                <div class="modal-body">
                    Estamos processando a requisição <img src="<?=URL_IMG?>ajax-loader.gif">.
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

 <div class="modal fade" id="myModalResult" tabindex="-1" role="dialog" aria-labelledby="myModalResultLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalResultLabel">Retorno da emissão do Carnê.</h4>
                </div>
                <div class="modal-body">
                   
        <!--div responsável por exibir o resultado da emissão do boleto-->
       
            <div class="panel panel-success">
                <div class="panel-body">
                    <table id="carne" class="table table-bordered">
                        <tr>
                        
                        </tr>
                    </table>
                        
            </div>            
        </div>  
               
            </div>
        </div>
    </div>
</div>


    <!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModalResult2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">Retorno de um pagamento com cartão, enviando apenas os dados obrigatórios .</h4>
                </div>
                <div class="modal-body">

        <!--div responsável por exibir o resultado da emissão do boleto-->
        <div id="boleto" class="hide">
            <div class="panel panel-success">
                <div id="" class="panel-body">
                    <table class="table">
                       <caption></caption>
                        <thead>
                            <tr>
                                <th>ID da transação(<em>charge_id</em>)</th>
                                <th>N° de parcelas (<em>installments</em>)</th>
                                <th>Valor da parcela (<em>installment_value</em>)</th>
                                <th>Status (<em>status</em>)</th>
                                <th>Total (<em>total</em>)</th>
                                <th>Método de pagamento (<em>payment</em>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="result_table2">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
             