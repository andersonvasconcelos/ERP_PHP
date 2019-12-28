    <div class="col-sm-3 col-md-3 atxt">
        <div id="navbar" class="navbar-collapse collapse">
            <div class="panel-group" id="accordion">
                <a href="<?= BASE_URL ?>">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <img src="<?= URL_IMG ?>inicial.png" class="ico"> Principal</h4>
                        </div>
                    </div>
                </a>

                <?php if ($this->hasPermisson('aba-gateway-de-pagamento')) : ?>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <img src="<?= URL_IMG ?>curso.png">
                                    <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span> Gateway de Pagamento
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <i class="fas fa-money-check-alt"></i>
                                            <a href="<?= BASE_URL ?>iugu"> Criar SubConta</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fas fa-money-check-alt"></i>
                                            <a href="<?= BASE_URL ?>iugu/getTudoSubConta">Informações da Conta</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fas fa-money-check-alt"></i>
                                            <a href="<?= BASE_URL ?>iugu/saque">Solicitar Saque</a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <?php if ($this->hasPermisson('aba-polos')) : ?>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <img src="<?= URL_IMG ?>polo.png" class="ico"> <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span>Polos
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-plus"></span><a href="<?= BASE_URL ?>polos">Adicionar Polo</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-th-list"></span><a href="<?= BASE_URL ?>polos/listar">Listar Polos</a>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
                <?php if ($this->hasPermisson('aba-colaboradores')) : ?>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <img src="<?= URL_IMG ?>cadastro.png" class="ico"> <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span>Colaboradores
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-plus"></span><a href="<?= BASE_URL ?>colaboradores">Adicionar Colaborador</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon glyphicon-list"></span>
                                            <a href="<?= BASE_URL ?>colaboradores/listar">Listar Colaboradores</a>
                                        </td>
                                    </tr>
                                    <?php
                                    if ($this->hasPermisson('aba-gateway-de-pagamento')) : ?>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon glyphicon-th-large"></span>
                                                <a href="<?= BASE_URL ?>colaboradores/grupos"> Grupos de Permissões</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon glyphicon-th"></span>
                                                <a href="<?= BASE_URL ?>colaboradores/itens"> Itens de Permissões </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($this->hasPermisson('aba-aluno')) : ?>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <img src="<?= URL_IMG ?>alunos.png" class="ico"> <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span>Alunos
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <i class="fas fa-list-ol"></i>
                                            <a href="<?= BASE_URL ?>alunos/listar">Listar Alunos</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-plus-circle"></i>
                                            <a href="<?= BASE_URL ?>alunos">Adicionar Aluno</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-address-book"></i>
                                            <a href="<?= BASE_URL ?>alunos/matriculas">Listar Matrículas</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-hourglass-end"></i>
                                            <a href="<?= BASE_URL ?>matriculas/moduloConcluido">Módulo Concluido</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-list-ol"></i>
                                            <a href="<?= BASE_URL ?>pagamentos/listarCarne">Imprimir Carne</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-list-ol"></i>
                                            <a href="<?= BASE_URL ?>pagamentos/listarFaturas">Faturas Iugu</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-plus-circle"></i>
                                            <a href="<?= BASE_URL ?>pagamentos/listar">Finalizar Pagamento</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <?php // if($this->hasPermisson('aba-liberação-de-matricula')):
                ?>

                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSer">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <img src="<?= URL_IMG ?>businessman_man_person_people_2842.png" class="ico"> <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span>
                                Serviços</h4>
                        </div>
                    </a>
                    <div id="collapseSer" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">

                                <tr>
                                    <td>
                                        <i class="fas fa-list-ol"></i>
                                        <a href="<?= BASE_URL ?>servicos/">Listar Serviços</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <i class="fas fa-list-ol"></i>
                                        <a href="<?= BASE_URL ?>servicos/fatura">Gerar Cobrança</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <?php //endif;
                ?>

                <?php if ($this->hasPermisson('aba-liberação-de-matricula')) : ?>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseMat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <img src="<?= URL_IMG ?>Teachers_35749.png" class="ico"> <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span>Liberação de Matrículas
                                </h4>
                            </div>
                        </a>
                        <div id="collapseMat" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <i class="fas fa-list-ol"></i>
                                            <a href="<?= BASE_URL ?>liberarMatricula/listarMatriculas">Listar Matrículas</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php endif;

                if ($this->admin()) { ?>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <img src="<?= URL_IMG ?>cadastro.png" class="ico"> <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span>Cursos
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-list"></span>
                                            <a href="<?= BASE_URL ?>pacotes/listar">Cursos e Combos</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-tasks"></span><a href="<?= BASE_URL ?>modulos/listar">Módulos</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-tasks"></span>
                                            <a href="<?= BASE_URL ?>campanhas/listar">Campanhas</a>
                                        </td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>

                <?php  }

                if ($this->hasPermisson('aba-avaliação-presencial')) : ?>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <img src="<?= URL_IMG ?>matdidatico.png" class="ico"> <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span>Avaliação Presencial
                                </h4>
                            </div>
                        </a>
                        <div id="collapseNine" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <?php if ($this->admin()) : ?>
                                        <tr>
                                            <td>
                                                <i class="fas fa-tasks"></i><a href="<?= BASE_URL ?>exercicios/listar"> Exercícios</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($this->hasPermisson('imprimir-prova')) : ?>
                                        <tr>
                                            <td>
                                                <i class="fas fa-chalkboard-teacher"></i><a href="<?= BASE_URL ?>prova/avaliacao">Imprimir Avaliações</a>
                                            </td>
                                        </tr>

                                    <?php endif; ?>
                                    <tr>
                                        <td>
                                            <i class="far fa-comments"></i>
                                            <a href="<?= BASE_URL ?>prova/listar">Prova Presencial</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fab fa-wpforms"></i>
                                            <a href="<?= BASE_URL ?>prova/historico">Histórico de Notas</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php endif;
                if ($this->hasPermisson('aba-relatórios-financeiros')) : ?>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <img src="<?= URL_IMG ?>business_table_order_report_history_2332.png" class="ico"> <span class="glyphicon glyphicon glyphicon-chevron-down pull-right"></span>Relatórios
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEleven" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <i class="fas fa-business-time"></i>
                                            <a href="<?= BASE_URL ?>relatorios/listar">Financeiro </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-user-graduate"></i>
                                            <a href="<?= BASE_URL ?>relatorios/academico">Acadêmico </a>
                                        </td>
                                    </tr>

                                    <?php if ($this->admin()) : ?>

                                        <tr>
                                            <td>
                                                <i class="fas fa-user-graduate"></i>
                                                <a href="<?= BASE_URL ?>relatorios/completo">Completo</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php endif;?>

                <a href="<?= BASE_URL ?>login/logout">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <img src="<?= URL_IMG ?>sair.png" class="ico">Sair
                                <span class="glyphicon glyphicon glyphicon-off pull-right" aria-hidden="true"></span></h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>