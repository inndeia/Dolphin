<body>
	<div id="container_internas">
		<header class="header_internas">
			<div class="content_bar">
				<div class="bar_header">
					<span class="bar_left">
						<figure class="left m_right"> <a href="https://www.facebook.com/DolphinHotelNoronha" target="_black"><img src="<?php echo $this->baseUrl('images/ico_face.png');?>"> </a></figure>
						<figure class="left m_right"> <a href="https://instagram.com/dolphinnoronha/" target="_black"><img src="<?php echo $this->baseUrl('images/ico_ig.png');?>"> </a></figure>
						<figure class="left"> <a href="https://www.youtube.com/channel/UCZoTdgk4NVogjkRiyPNk6bA" target="_black"><img src="<?php echo $this->baseUrl('images/ico_you.png');?>"> </a></figure>
					</span> <!-- bar_left-->
					<span class="bar_center"> Central de Reservas: (81) 3366-6601 / 3366.6602 | Hotel: (81) 3619-1100 | <img src="<?php echo $this->baseUrl('images/whatsapp.png');?>"> (81) 9723-3101</span> <!--bar_center-->
					<!-- <span class="bar_right"> <strong>PT </strong>| EN </span>  bar_right -->
				</div> <!--bar_header-->
			</div> <!--content_bar -->

			<?php require_once('menu.php'); ?> <!--menu-->

		</header> <!-- Header -->
		<div class="reservas_internas">
			<div class="content_reservas_internas">
				<div class="texto_content_reservas">
					<p>FAÇA A SUA<br><span> RESERVA</span></p><span class="senta_reservas"><img src="<?php echo $this->baseUrl('images/arrow_reservas.png');?>"></span>
				</div>
				<form action="" method="post" >
					<input  class="input_resevas3" id="calendar-input3" placeholder="CHECK-IN" name="CheckIn">
					<span class="calendar-icon3"></span>
					<input  class="input_resevas3" id="calendar-input4" placeholder="CHECK-OUT" name="CheckOut">
					<span class="calendar-icon4"></span>
					<div class="select_resevas3">
						<select class="" id="input_pessoas" name="ad">
							<option value="">N° DE PESSOAS</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>
					<button class="btn_reserva_internas" onclick="javascript:enviarReserva();"> reservar </button>
				</form>	
			</div>			
		</div>
		<script type="text/javascript">
			function enviarReserva(){
				var checkin = $('#calendar-input3').val();
				checkin = checkin.replace("/","");
				checkin = checkin.replace("/","");
				var checkout = $('#calendar-input4').val();
				checkout = checkout.replace("/","");
				checkout = checkout.replace("/","");
				var pessoas = $('#input_pessoas').val();

				window.open('https://reservations.omnibees.com/default.aspx?q=4334&CheckIn='+checkin+'&CheckOut='+checkout+'&ad='+pessoas);
			}

		</script>