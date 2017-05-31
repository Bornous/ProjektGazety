<div id="main" class="none_main" >
			<h2>Wprowadź dane:</h2>
			<div class="form">
				<form action="user_wpis.php" method="post">
						Dekanat: <select name="dekanat" onchange="znajdzParafie(this.value)" style="min-width:200px;">
									<option value="">				Wybierz dekanat:</option>
									<option value="BEŁŻYCE">					BEŁŻYCE</option>
									<option value="BYCHAWA">				BYCHAWA</option>
									<option value="CHEŁM WSCHÓD">		CHEŁM WSCHÓD</option>
									<option value="CHEŁM ZACHÓD">		CHEŁM ZACHÓD</option>
									<option value="CZEMIERNIKI">			CZEMIERNIKI</option>
									<option value="GARBÓW">					GARBÓW</option>
									<option value="KAZIMIERZ DOLNY">	KAZIMIERZ DOLNY</option>
									<option value="KONOPNICA">				KONOPNICA</option>
									<option value="KRASNYSTAW WSCHÓD">KRASNYSTAW WSCHÓD</option>
									<option value="KRASNYSTAW ZACHÓD">KRASNYSTAW ZACHÓD</option>
									<option value="KRAŚNIK">					KRAŚNIK</option>
									<option value="LUBARTÓW">				LUBARTÓW</option>
									<option value="LUBLIN PODMIEJSKI">	LUBLIN PODMIEJSKI</option>
									<option value="LUBLIN POŁUDNIE">	LUBLIN POŁUDNIE</option>
									<option value="LUBLIN PÓŁNOC">		LUBLIN PÓŁNOC</option>
									<option value="LUBLIN ŚRÓDMIEŚCIE">LUBLIN ŚRÓDMIEŚCIE</option>
									<option value="LUBLIN WSCHÓD">		LUBLIN WSCHÓD</option>
									<option value="LUBLIN ZACHÓD">		LUBLIN ZACHÓD</option>
									<option value="ŁĘCZNA">					ŁĘCZNA</option>
									<option value="MICHÓW">					MICHÓW</option>
									<option value="OPOLE LUBELSKIE">	OPOLE LUBELSKIE</option>
									<option value="PIASKI">						PIASKI</option>
									<option value="PUŁAWY">					PUŁAWY</option>
									<option value="SIEDLISZCZE">			SIEDLISZCZE</option>
									<option value="ŚWIDNIK">					ŚWIDNIK</option>
									<option value="TUROBIN">					TUROBIN</option>
									<option value="URZĘDÓW">				URZĘDÓW</option>
									<option value="ZAKRZÓWEK">			ZAKRZÓWEK</option>
									<option value="INNE">							INNE</option>
						
						</select>
						<br>
						 <div  id="spis">
							Parafia: Wybierz najpierw dekanat
						</div>
						
						<br>Maly gosc niedzielny: <input type="number_format" name="mgn" value="0"/>
						<br>Gosc niedzielny: <input type="number_format" name="gnd" value="0"/>
						<br>Niedziela: <input type="number_format" name="ndz" value="0"/>
						<br><br><br>
						
						
				
				<button type="subbmit" class="option opt_1"  >Wprowadz dane do systemu</button>
				</form>
			
			
			</div>
			
			
		</div>