<?php ini_set('default_charset', 'UTF-8');?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="<?=BASE_URL?>assets/img/favicon.ico">


 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="<?=URL_CSS?>style.css">
<link rel="stylesheet" href="<?=BASE_URL?>public/assets/bootstrap/css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>App de ensino a distância - EDC EJA</title>
</head>

<body>
<input type="hidden" id="urlBase" value="<?=BASE_URL?>">
<!------ Include the above in your HEAD tag ---------->
   <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="logo">
          <a class="navbar-brand" href="<?=BASE_URL?>">
            <img src="<?php echo URL_IMG?>polos/CGD JC/logo.png">
          </a>
        </div>
        </div>
        
        <div class="sumir">



                  <!--ul class="nav navbar-nav navbar-right txt">
                    <li><a href="#" class="nt"></a></li>
                 </ul-->
               

         	<ul class="nav navbar-nav navbar-right txt">
          	<li>
              <a href="#">
              <?php echo $this->getUser()['nome_colaborador']?> | 
              <?php echo($this->getAplelido($this->getUser()['polo_id']))?>
              </a>
            </li>

            <?php if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4) { ?>

            <li role="presentation" class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-danger nt">0</span>
              </a>
              <ul class="dropdown-menu">
                <?php 
                if(!empty($this->getAlerts())){
                foreach($this->getAlerts() as $a){?>
                <li><a href="<?=BASE_URL?><?=$a->link?>" class="alido" data-id="<?=$a->id?>"><i class="fas fa-user-graduate text-green"></i> [<?=$a->ra?>] em análise </a></li>
              <?php }  
          } else{ echo 'Sem matricula nova';}?>
              </ul>
            </li> 

            <?php } ?>

        </ul>
       </div>
      </div>
</nav>

<div class="container">
    <div class="row">

  <div id="preloader">
        <div class="inner">
           <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
           <div class="bolas">
              <div></div>
              <div></div>
              <div></div>                    
           </div>
        </div>
    </div>