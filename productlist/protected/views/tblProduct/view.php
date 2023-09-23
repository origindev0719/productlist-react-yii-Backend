<?php
/* @var $this TblProductController */
/* @var $model TblProduct */

$this->breadcrumbs=array(
	'Tbl Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TblProduct', 'url'=>array('index')),
	array('label'=>'Create TblProduct', 'url'=>array('create')),
	array('label'=>'Update TblProduct', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblProduct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblProduct', 'url'=>array('admin')),
);
?>

<h1>View TblProduct #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'price',
		'count',
		'status_id',
		'created_at',
		'updated_at',
	),
)); ?>
