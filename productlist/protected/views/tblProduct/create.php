<?php
/* @var $this TblProductController */
/* @var $model TblProduct */

$this->breadcrumbs=array(
	'Tbl Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblProduct', 'url'=>array('index')),
	array('label'=>'Manage TblProduct', 'url'=>array('admin')),
);
?>

<h1>Create TblProduct</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>