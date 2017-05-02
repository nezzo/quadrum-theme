<?php 
######################
###Страница рапорта###
######################
/*
Template Name: Рапорт
*/
?>
<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
		require_once ('wp-load.php');
		require_once ('wp-admin/includes/admin.php');
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
		
		//получаем данные с полей
		 $titleRaport = $_POST['titleRaport'];
		 $cityRaptor = $_POST['cityRaptor'];
		 $instantRaptor = $_POST['instantRaptor'];
		 $subjectRaport = $_POST['subjectRaport'];
		 $fioRaport = $_POST['fioRaport'];
		 $doljnostRaport = $_POST['doljnostRaport'];
		 $workRaport = $_POST['workRaport'];
		 $sinkRaport = $_POST['sinkRaport'];
		 $bodyRaport = $_POST['bodyRaport'];
		 $raport_file_upload = $_FILES['raport_file_upload'];
		 $podpisRaport = $_POST['podpisRaport'];
		 $emailRaport = $_POST['emailRaport'];
		 $anonInformRaport = $_POST['anonInformRaport'];
		 
		 //формируем массив для отправки
		 $mas = array($titleRaport,$cityRaptor,$instantRaptor,$subjectRaport,
			  $fioRaport,$doljnostRaport,$workRaport,$sinkRaport,
			  $bodyRaport,$raport_file_upload,$podpisRaport,$emailRaport,$anonInformRaport
			  );
		 
 		 //поле заголовок поста обязательный
		if(!empty($titleRaport)){
		//отправляем данные для добавление поста
		  do_action("wp_raport",$mas);
		 } 
?>

<?=get_header();?>
<div class="container-fluid">
     <div class="col-md-12">
      <div class="formaRaport">
	 <form class="raport"  enctype="multipart/form-data" action="#" method="post" id="raportForm">
	  <div class="col-md-12">
	    <label>Заголовок рапорта</label>
	    <input type="text" class="titleRaport"  name="titleRaport" />
	  </div>
     
	  <div class="col-md-12">
	    <div class="col-md-6 ui-widget" style="padding-top:25px;">
	      <label>Город</label>
	      <input type="text" class="cityRaport" name="cityRaptor" />
	    </div>
	    <div class="col-md-6 ui-widget" style="padding-top:25px;">
	      <label>Инстанция</label>
	      <input type="text" class="instantRaport" name="instantRaptor" />
	    </div>
	 </div>
	 <div class="col-md-12" style="padding-top:25px; padding-bottom:25px;">
	  <label>Субъект</label>
	  <input type="text" class="subjectRaport"  name="subjectRaport" />
	 </div>
	 
	 <div class="col-md-12" style="padding-top:10px; border: 1px solid red; height: auto;">
	  <div class="newSubject">
	    <div class="col-md-12">
	      <label>Не нашли субъект правонарушения? Сообщите нам о новом.</label>
	    </div>
	    
	    <div class="col-md-12" style="padding-top:25px;">
	      
	      <div class="col-md-3">
 		  <input type="text" class="fioRaport"  name="fioRaport" />
	      </div>
	      <div class="col-md-3">
		<label style="float:left;">ФИО</label>
	      </div>
	      
	      
	      <div class="col-md-3">
		 <input type="text" class="doljnostRaport"  name="doljnostRaport" />
	      </div>
	      <div class="col-md-3">
		<label style="float:left;">Должность</label>
	      </div>
	    </div>
	    <div class="col-md-12" style="padding-top:25px;">
	      <div class="col-md-8">
		<input type="text" class="workRaport"  name="workRaport" />
	      </div>
	      <div class="col-md-2">
		<label>Место работы</label>
	      </div>
	    </div>
	    <div class="col-md-12" style="padding:25px 25px;">
	      <input type="text" class="sinkRaport" name="sinkRaport" placeholder="Пару слов о субъекте"/>
	    </div>
	   </div>
	 </div>
	 <div class="col-md-12" style="padding-top:25px;">
	  <div class="col-md-12">
	    <label>Тело рапорта</label>
	  </div>
 	    <textarea class="bodyRaport" style="margin-top:10px;" rows="20" cols="102" name="bodyRaport"></textarea>
	 </div>
	 <div class="col-md-12" style="padding: 25px 0px 50px;">
	  <div class="col-md-5">
 	    <input name="raport_file_upload"  class="downButton" type="file"  accept="image/*"/>
  	  </div>
	  <div class="col-md-7">
	    <label>Добавить файл (bmp,jpeg,png)</label>
	  </div>
	 </div>
 	 <div class="col-md-12"  style="border-top: 3px solid black;padding-top: 25px;">
	    <div class="col-md-6" >
	      <label>Ваша подпись</label>
	      <input type="text" style="margin-top:10px;" class="podpisRaport" name="podpisRaport"/>
	    </div>
	    <div class="col-md-6">
	      <label>Почта для управления рапортом</label>
	      <input type="email" style="margin-top:10px;"  class="emailRaport" name="emailRaport"/>
	    </div>
	 </div>
	 <div class="col-md-12" style="padding-top: 30px;">
	  <div class="col-md-12">
	    <label>
		    Любая информация с которой Вы хотите поделиться
		    с нами, но которая не будет опубликована на ресурсе
	    </label>
	  </div>
	  <div class="col-md-12">
	   <textarea class="anonInformRaport" style="margin-top:10px;" rows="10" cols="100" name="anonInformRaport" ></textarea>
	  </div>
	 </div>
	 <div class="col-md-12" style="padding-top: 30px;">
	      <button class="btn btn-primary otpravitRaport">Опубликовать</button>
	 </div>
     
</form>
      </div>
   </div>
</div>
 
<?=get_footer();?>