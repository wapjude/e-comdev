<?php
/* @var $this ThreadController */
/* @var $model Thread */

$this->breadcrumbs=array(
	'Threads'=>array('index'),
	$model->id_thread,
);

$this->menu=array(
	array('label'=>'List Thread', 'url'=>array('index')),
	array('label'=>'Create Thread', 'url'=>array('create')),
	array('label'=>'Update Thread', 'url'=>array('update', 'id'=>$model->id_thread)),
	array('label'=>'Delete Thread', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_thread),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Thread', 'url'=>array('admin')),
);
?>

<h1>View Thread #<?php echo $model->id_thread; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_thread',
		'name_thread',
		'url_thread',
		'viewer',
	),
)); ?>
