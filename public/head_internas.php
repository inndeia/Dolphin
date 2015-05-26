<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Dolphin Hotel</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->baseUrl('images/fav-icon.png');?>" />

	<!-- css padrão-->
	<link href="<?php echo $this->baseUrl('css/style.css');?>" rel='stylesheet' type='text/css' />

	<!-- Slide Página Pacotes & Tarifas -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->baseUrl('css/liquid-slider.css');?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="<?php echo $this->baseUrl('js/jquery.easing.1.3.js');?>"></script>
  <script src="<?php echo $this->baseUrl('js/jquery.touchSwipe.min.js');?>"></script>
  <script src="<?php echo $this->baseUrl('js/jquery.liquid-slider.js');?>"></script>

  <!--Datapicker -->
  <link rel="stylesheet" type="text/css" href="<?php echo $this->baseUrl('src/datepickr.min.css');?>">

  <!--Select-->
  <link rel="stylesheet" href="<?php echo $this->baseUrl('css/Selectyze.jquery.css');?>" type="text/css" />

  <!-- Galeria com Lightbox-->
  <link rel="stylesheet" href="<?php echo $this->baseUrl('index_files/vlb_files1/vlightbox1.css');?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseUrl('/source/jquery.fancybox.css?v=2.1.5')?>" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->baseUrl('index_files/vlb_files1/visuallightbox.css');?>" type="text/css" media="screen" />
  <!--<script src="<?php echo $this->baseUrl('index_files/vlb_engine/jquery.min.js');?>" type="text/javascript"></script>-->
  <script src="<?php echo $this->baseUrl('index_files/vlb_engine/visuallightbox.js');?>" type="text/javascript"></script>
  <!-- End Galeria com Lightbox -->

  <script>
    $(function(){


          $('#slider-id').liquidSlider({
            autoSlide:true,
            autoHeight:false
          });

    });
    </script>

    <!-- Script âncora -->

    <script type="text/javascript">
    function rolar_para(reserva) {
      $('html, body').animate({
        scrollTop: $(reserva).offset().top
      }, 1000);
}
    </script>


    <!-- Player Video -->

    <script type="text/javascript">

    function vidplay() {
       var video = document.getElementById("Video1");
       var button = document.getElementById("play");
       if (video.paused) {
          video.play();
          button.textContent = "||";
       } else {
          video.pause();
          button.textContent = ">";
       }
    }

    function restart() {
        var video = document.getElementById("Video1");
        video.currentTime = 0;
    }

    function skip(value) {
        var video = document.getElementById("Video1");
        video.currentTime += value;
    }      
</script>

</head>

<body>