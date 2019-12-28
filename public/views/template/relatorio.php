 <?php require 'head.php';?>


 <div class="col-sm-12 col-md-12">

	<?php $this->loadAlert('success');?>
	<?php $this->loadAlert('danger');?>


            <div class="well el">
               <?php $this->loadView($viewName, $viewData)?>
            </div>

</div>



<?php require 'footer.php'; ?>
 