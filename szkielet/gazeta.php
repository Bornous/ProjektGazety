	<div id="gazeta" class="topmeni<?php 
				if(isset($_GET['name_gaz'])) $_SESSION['choose']=$_GET['name_gaz'];
				else if(!isset($_SESSION['choose'])) $_SESSION['choose']=" ";
						if($_SESSION['choose']=='NIEDZIELA') echo ' bgcol_n';
						else{
								if($_SESSION['choose']=='GOŚĆ NIEDZIELNY') echo ' bgcol_gn';
								else{
										if($_SESSION['choose']=='MAŁY GOŚĆ NIEDZIELNY') echo ' bgcol_mgn';
										else 	echo ' none';
								}	
				}   ?>">
				
				<div id="nazwa_gazety" class="option gaz_txt" >
				<?php
				if(isset($_GET['name_gaz']))$_SESSION['choose']=$_GET['name_gaz'];
				if(!isset($_SESSION['choose']) OR (  ($_SESSION['choose']!='MAŁY GOŚĆ NIEDZIELNY') AND ($_SESSION['choose']!='GOŚĆ NIEDZIELNY') AND ($_SESSION['choose']!='NIEDZIELA')  )) $_SESSION['choose']='^Wybierz gazetę z powyższego menu^' ;
				
				echo $_SESSION['choose'];
				
				?>
				</div>
								
	</div>