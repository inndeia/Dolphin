<div class="content_rodape">
			<footer>
				<div class="footer_left">
					<span>
						<figure class="left m_right"> <a href="https://www.facebook.com/DolphinHotelNoronha" target="_black"><img src="<?php echo $this->baseUrl('images/ico_face.png'); ?>"></a> </figure>
						<figure class="left m_right"> <a href="https://instagram.com/dolphinnoronha/" target="_black"><img src="<?php echo $this->baseUrl('images/ico_ig.png');?>"> </a></figure>
						<figure class="left"> <a href="https://www.youtube.com/channel/UCZoTdgk4NVogjkRiyPNk6bA" target="_black"><img src="<?php echo $this->baseUrl('images/ico_you.png');?>"> </a></figure>
					</span> <!-- bar_left-->
					<p> Central de Reservas: (81) 3366-6601 / 3366.6602<br>
						Hotel: (81) 3619-1100 | <img src="<?php echo $this->baseUrl('images/whatsapp.png');?>"> (81) 9723-3101<br>
						Informações: faleconosco@dolphinhotel.tur.br
						<br>
						<br>
						<a href="http://inndeia.com" target="_black"><img src="<?php echo $this->baseUrl('images/logoInndeia.png');?>"/></a>
					</p>
					
				</div> <!-- footer_left -->
				<div class="footer_center">
					<div class="widgetTrip"> 
						<div id="TA_excellent723" class="TA_excellent"><ul id="ijxudA" class="TA_links Y0H33Sr2Dhp"><li id="VOowTri" class="rHbxiV"><a target="_blank" href="http://www.tripadvisor.com.br/"><img src="http://e2.tacdn.com/img2/widget/tripadvisor_logo_115x18.gif" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a></li></ul></div><script src="http://www.jscache.com/wejs?wtype=excellent&amp;uniq=723&amp;locationId=2423254&amp;lang=pt&amp;display_version=2"></script>
					</div>
				</div> <!--footer_center-->
				<div class="footer_right">	
					<ul>
						<li><a href="<?php echo $this->baseUrl('/dolphin'); ?>">DOLPHIN</a></li>
						<li><a href="<?php echo $this->baseUrl('/acomodacoes'); ?>">ACOMODAÇÕES</a></li>
						<li><a href="<?php echo $this->baseUrl('/gastronomia'); ?>">GASTRÔNOMIA</a></li>
						<li><a href="<?php echo $this->baseUrl('/servicos'); ?>">SERVIÇOS & PASSEIOS</a></li>
						<li><a href="<?php echo $this->baseUrl('/reservas'); ?>">RESERVAS</a></li>
						<li><a href="<?php echo $this->baseUrl('/tarifas'); ?>">PACOTES</a></li>
						<li><a href="<?php echo $this->baseUrl('/contatos'); ?>">CONTATO</a></li>
						<li><a href="https://instagram.com/noronhalovers" target="_black">NORONHA LOVERS</a></li>
					</ul>
					
				</div> <!--footer_right-->
			</footer>
		</div> <!--content_rodape-->

	</div> <!-- container-->

	<script src="<?php echo $this->baseUrl('src/datepickr.min.js'); ?>"></script>
        <script>
            // Regular datepickr
            datepickr('#datepickr');

            // Formato data
            datepickr('.datepickr', { dateFormat: 'd/m/Y'});

            // Min and max date
            datepickr('#minAndMax', {
                // few days ago
                minDate: new Date().getTime() - 2.592e8,
                // few days from now
                maxDate: new Date().getTime() + 2.592e8
            });

            // datepickr on an icon, using altInput to store the value
            // altInput must be a direct reference to an input element (for now)
            datepickr('.calendar-icon', { altInput: document.getElementById('calendar-input') });
            datepickr('.calendar-icon2', { altInput: document.getElementById('calendar-input2') });
            datepickr('#calendar-input', { altInput: document.getElementById('calendar-input') });
            datepickr('#calendar-input2', { altInput: document.getElementById('calendar-input2') });


            datepickr('.calendar-icon3', { altInput: document.getElementById('calendar-input3') });
            datepickr('.calendar-icon4', { altInput: document.getElementById('calendar-input4') });
            datepickr('#calendar-input3', { altInput: document.getElementById('calendar-input3') });
            datepickr('#calendar-input4', { altInput: document.getElementById('calendar-input4') });

            datepickr('.calendar-icon6', { altInput: document.getElementById('calendar-input6') });
            datepickr('.calendar-icon7', { altInput: document.getElementById('calendar-input7') });
            datepickr('#calendar-input6', { altInput: document.getElementById('calendar-input6') });
            datepickr('#calendar-input7', { altInput: document.getElementById('calendar-input7') });

            datepickr('.calendar-icon8', { altInput: document.getElementById('calendar-input8') });
            datepickr('.calendar-icon9', { altInput: document.getElementById('calendar-input9') });
            datepickr('#calendar-input8', { altInput: document.getElementById('calendar-input8') });
            datepickr('#calendar-input9', { altInput: document.getElementById('calendar-input9') });
            // If the input contains a value, datepickr will attempt to run Date.parse on it
            datepickr('[title="parseMe"]');

            // Overwrite the global datepickr prototype
            // Won't affect previously created datepickrs, but will affect any new ones
            datepickr.prototype.l10n.months.shorthand = ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dec'];
            datepickr.prototype.l10n.months.longhand = ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];
            datepickr.prototype.l10n.weekdays.shorthand = ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sab'];
            datepickr.prototype.l10n.weekdays.longhand = ['domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sabado'];
            datepickr('#someFrench.sil-vous-plait', { dateFormat: '\\le j F Y' });
        </script>

  
</body>
</html>