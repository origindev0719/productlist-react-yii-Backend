<?php
/* @var $this TblProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Products',
);

$this->menu=array(
	array('label'=>'Create TblProduct', 'url'=>array('create')),
	array('label'=>'Manage TblProduct', 'url'=>array('admin')),
);
?>

<h1>Tbl Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
