<div id="main" class="none_main">
			<?php
			if(isset($_SESSION["brakPrzedzialu"])){
				if($_SESSION["brakPrzedzialu"]!="1")
				{
					echo "<div class='error' >".$_SESSION["brakPrzedzialu"]." </div>";
					$_SESSION["brakPrzedzialu"]="1";
					
				}
				
				
			}

				?>

			<div class="dottedline"></div>
			<span class="dane" >Dany miesiąc:</span><div  id="miesiac1" style="margin-left:10px;float:left;text-transform:uppercase;"></div> <div style="clear:both;"></div>
			<div class="dottedline"></div>
			<span class="dane" >Dany tydzień: </span> <div  id="tydz" style="margin-left:10px;float:left;"></div> <div style="clear:both;"></div>
			<div class="dottedline"></div>
			<div class="dane">Ilość uzupełnionych zwrotów: </div><div style="clear:both;"></div>
			<div class="dottedline"></div>
			
			<button class="option txtopt" onclick="stronaGlowna()" style="min-width: 600px; margin-left: 70px;">Wyświetl nieuzupełnione parafie</button>
			<br>
			<button class="option txtopt" onclick="zakoncz()" style="min-width: 600px; margin-left: 70px;">Rozpocznij nowy tydzien</button>

		</div>