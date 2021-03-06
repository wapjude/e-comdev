<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
     'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row" >
                <?php echo $form->labelEx($model, 'author'); ?>
                <?php // echo $form->textField($model,'id_usaha',array('size'=>10,'maxlength'=>10));  ?>
                <?php
                $this->widget('ext.select2.ESelect2', array(
                    'model' => $model,
                    'attribute' => 'author',
                    'data' => $model->getuser(),
                    'htmlOptions' => array('selected'=>'selected','reqiured'=>'required'),
                ));
                ?>
                <?php echo $form->error($model, 'author'); ?> 
       </div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
        <div class="row">
        <?php echo $form->labelEx($model,'amount'); ?>
        <?php echo $form->textField($model,'amount'); ?>
        <?php echo $form->error($model,'amount'); ?>
    </div>
    <div class="row" >
                <?php echo $form->labelEx($model, 'id_location'); ?>
                <?php // echo $form->textField($model,'id_usaha',array('size'=>10,'maxlength'=>10));  ?>
                <?php
                $this->widget('ext.select2.ESelect2', array(
                    'model' => $model,
                    'attribute' => 'id_location',
                    'data' => $model->getlocation(),
                    'htmlOptions' => array('selected'=>'selected','reqiured'=>'required'),
                ));
                ?>
                <?php echo $form->error($model, 'id_location'); ?> 
       </div>

    <div class="row">
          <?php echo $form->labelEx($model, 'id_category'); ?>
                <?php // echo $form->textField($model,'id_usaha',array('size'=>10,'maxlength'=>10));  ?>
                <?php
                $this->widget('ext.select2.ESelect2', array(
                    'model' => $model,
                    'attribute' => 'id_category',
                    'data' => $model->getitem(),
                    'htmlOptions' => array('selected'=>'selected','reqiured'=>'required'),
                ));
                ?>
                <?php echo $form->error($model, 'id_category'); ?> 
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'post_type'); ?>
		<?php echo $form->hiddenField($model,'post_type',array('size'=>7,'value'=>'tipe')); ?>
		<?php // echo $form->error($model,'post_type'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'post_time'); ?>
		<?php 
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		echo $form->hiddenField($model,'post_time',array('value'=> date_format($dt,"Y-m-d H:i:s"))); ?>
		<?php // echo $form->error($model,'post_time'); ?>
	</div>


	<div class="row">
		<?php // echo $form->labelEx($model,'post_status'); ?>
		<?php echo $form->hiddenField($model,'post_status',array('size'=>8,'value'=>'inactive')); ?>
		<?php // echo $form->error($model,'post_status'); ?>
	</div>



    <input type="hidden" id="jum_foto" name="jum_foto" value="0">
    <div class="multi-field-wrapper4">
      <div class="multi-fields4">
        <div class="multi-field4">
          <label class="multi-input"> add Foto </label>
          <input type="file" name="foto0" class="multi-input" required>
           <label class="multi-input"> Deskripsi </label>
          <input type="text" name="deskripsi[]" class="multi-input" required>
        </div>
      </div>
    <button type="button" class="add-field4" id="add-foto">Add foto</button>
	

	<div class="row">
		<?php echo $form->labelEx($model,'id_video'); ?>
		<?php echo $form->textField($model,'id_video',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'id_video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_thumbnail'); ?>
		<?php echo $form->textArea($model,'video_thumbnail',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'video_thumbnail'); ?>
	</div>


    <div class="row">
        <?php echo $form->labelEx($model,'post_status'); ?>
        <?php
         echo $form->radioButtonList($model, 'post_status',
                            array(  'active' => 'active',
                                    'inactive' => 'inactive',
                                    'suspend' => 'suspend',),
                          
                           array(
            'labelOptions'=>array('style'=>'display:inline'), // add this code
            'separator'=>'  ',
        ) );


        ?>

        <?php echo $form->error($model,'post_status'); ?>
    </div>
        <br> <br> <br>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $this->widget('application.extensions.tinymce.SladekTinyMce'); ?>
<script type="text/javascript">
 
    tinymce.init({
    selector: "textarea#Post_content",
    theme: "modern",
    width: 800,
    height: 200,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
 </script>

</div><!-- form -->