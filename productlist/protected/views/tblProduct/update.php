<?php
/* @var $this TblProductController */
/* @var $model TblProduct */

$this->breadcrumbs=array(
	'Tbl Products'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblProduct', 'url'=>array('index')),
	array('label'=>'Create TblProduct', 'url'=>array('create')),
	array('label'=>'View TblProduct', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblProduct', 'url'=>array('admin')),
);
?>

<h1>Update TblProduct <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>