	<div id="topmenu" class="topmeni" >
<div style="padding: 10px;margin-left: 70px;;">
		<span class="dane  " style="float:left;">Dany miesiąc:</span><div  id="miesiac1" style="margin-left:10px;float:left;text-transform:uppercase;"><?php if(isset( $_SESSION["miesiac"]))echo $_SESSION["miesiac"];  ?></div> 
			
			<span class="dane" style="float:left; margin-left:20px;">Dany tydzień: </span> <div  id="tydz" style="margin-left:10px;float:left;"><?php if(isset( $_SESSION["miesiac"]))echo $_SESSION["tt"]." (".$_SESSION["poczatekTygodnia"]." - ".$_SESSION["koniecTygodnia"].")";?></div> <div style="clear:both;"></div>
		<div style="clear:both;"></div>
			</div>	
	</div>
	