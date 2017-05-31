<div id="main" class="<?php  
			if(isset($_GET['name_gaz'])) $_SESSION['choose']=$_GET['name_gaz'];
			if($_SESSION['choose']=='NIEDZIELA') echo 'bgcol_n_main';
			else{
					if($_SESSION['choose']=='GOŚĆ NIEDZIELNY') echo 'bgcol_gn_main';
					else{
							if($_SESSION['choose']=='MAŁY GOŚĆ NIEDZIELNY') echo 'bgcol_mgn_main';
							else 	echo 'none_main';
					}	
			}
			
			?>">
			<div class="dottedline"></div>
			<span class="dane" style="float:left;">Dany miesiąc:</span><div  id="miesiac1" style="margin-left:10px;float:left;text-transform:uppercase;"></div> <div style="clear:both;"></div>
			<div class="dottedline"></div>
			<span class="dane" style="float:left;">Dany tydzień: </span> <div  id="tydz" style="margin-left:10px;float:left;"></div> <div style="clear:both;"></div>
			<div class="dottedline"></div>
			<span class="dane">Ilość uzupełnionych zwrotów: </span>
			<div class="dottedline"></div>
			
			<button class="option txtopt" onclick="flink()" style="min-width: 600px; margin-left: 70px;">Wyświetl nieuzupełnione parafie</button>

		</div>