 <?php require 'head.php';?>
 <?php require 'menu.php'; ?>


 <div class="col-sm-9 col-md-9">

	<?php $this->loadAlert('success');?>
	<?php $this->loadAlert('danger');?>


            <div class="well el">
               <?php $this->loadView($viewName, $viewData)?>
            </div>

</div>



<?php require 'footer.php'; ?>
 