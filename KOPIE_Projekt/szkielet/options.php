<div id="options" class="<?php  
			if(isset($_GET['name_gaz'])) $_SESSION['choose']=$_GET['name_gaz'];
			if($_SESSION['choose']=='NIEDZIELA') echo 'bgcol_n_options';
			else{
					if($_SESSION['choose']=='GOŚĆ NIEDZIELNY') echo 'bgcol_gn_options';
					else{
							if($_SESSION['choose']=='MAŁY GOŚĆ NIEDZIELNY') echo 'bgcol_mgn_options';
							else 	echo 'none_options';
					}	
			}
			
			?>">
			
			<a href="panel_Znajdz.php"><div class="option">ZNAJDŹ PARAFIĘ</div></a>
			<a href="panel_Dodaj.php"><div class="option">DODAJ PARAFIĘ</div></a>
			<a href="panel_Zmien.php"><div class="option">ZMIEŃ DANE</div></a>
			<a href="panel_Inna.php"><div class="option">INNA TABELA</div></a>
			
		

		</div>