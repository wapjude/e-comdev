<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Create Auction', 'url'=>array('createauction')),
	array('label'=>'Update Auction', 'url'=>array('updateauction', 'id'=>$model->id_post)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_post),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Auction', 'url'=>array('auctions')),
);
?>

<h1><?php echo $model->title; ?></h1>
<div class="alert">
  <strong>Images</strong>.
</div>
<div class="row-fluid">
	<ul class="thumbnails">
		<?php
		foreach ($foto as $key) {
			?>

		  <li class="span2">
		    <a href="#" class="thumbnail">
		      <img src="<?=Yii::app()->request->baseUrl.'/../'.$key['thumbnail_path']; ?>" >
		    </a>
		  </li>

		<?php
		}
		?>
	</ul>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_post',
		'url_post',
		'title',
		'tags',
		'content',
		'post_type',
		array('name'=>'post_time',
                          'type'=>'html',
                          'header'=>'post_time',
                          'htmlOptions'=> array('style'=>'text-align:center;'),
                                'value'=>date("Y-m-d",$model->post_time),
                        ),
		'author',
		'post_status',
		'amount',
		'amount_bid',
		//'time_open',
		//'time_close',
		'viewer',
		array('name'=>'post_update_time',
                          'type'=>'html',
                          'header'=>'post_update_time',
                          'htmlOptions'=> array('style'=>'text-align:center;'),
                                'value'=>date("Y-m-d",$model->post_update_time),
                        ),
		'idLocation.name_location',
		'idItem.name_item',
		//'id_video',
		//'video_thumbnail',
		//'amount_label',
	),
)); ?>


