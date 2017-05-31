
	var dzisiaj= new Date();	
	var dzien = dzisiaj.getDate();
	var dzien_tyg = dzisiaj.getDay();
	var mies = dzisiaj.getMonth();
	var rok = dzisiaj.getFullYear();

	var dni = new Array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela");
	var miesiace= new Array("styczeń", "luty", "marzec", "kwiecień", "maj", "czerwiec", "lipiec", "sierpień", "wrzesień", "październik", "listopad", "grudzień");
	var miesiac = miesiace[mies];
	var dzien_tygodnia=dni[dzien_tyg];
	mies++;
	
	//Obliczanie tygodnia roku:
	
	//ĆWICZENIA:
	//dzien=1;
	//mies=1;
	//rok=2017;
	//
	
	//Info o algorytmie- wymaga on podawania na kożdy rok daty rozpoczęcia pierwszego tygodnia (a jesli ktorys z dni nowego roku nalezy jeszcze do tygodnia z poprzedniego roku to nalezy to tez uwzglednic ) - narazie ustalne sa daty az do 2018 włącznie
	
	
	//Start pierwszego tygodnia:
	var first_sunday;
	var first_month;
	var rok_temp;
	var tydzien=1;
	
	if(rok==2016){
			first_sunday=4;
			first_month=1;
			rok_temp=2016;
	}
	
	if(rok==2017){
			if(dzien==1 && mies==1){
				first_sunday=26;
				first_month=12;
				rok_temp=2016;
				tydzien=52;}
			else{
				first_sunday=2;
				first_month=1;
				rok_temp=2017;
				
			}
	}
	
	if(rok==2018){
			first_sunday=1;
			first_month=1;
			rok_temp=2018;
	}
	
	
	
	
	//var week = new Array();
	

	
	
	var mies_temp=1;
	var dzien_temp=-1;
	
	
	var liczba_dni_w_miesiacu=31;
	var temp=0;
	var m=0;
	var d=0;
	var aDaysProblemSolution;
	var andTheMonth;
	var andAYear;
	var butIsThereAnyProblem=0;
	var i;
	for(i=0;dzien_temp<dzien && mies_temp<=mies && rok_temp<=rok;){
		
		if(rok_temp==rok)m=1;
		if(first_month==mies)d=1;
		
		
		
		i++;
		
		first_sunday++;
		if(d==1) dzien_temp=first_sunday;
		
		
		if(i+temp==7 ){
	
			tydzien++;
			i=0;
			temp=0;
			
			if(tydzien>53 || (tydzien>=51 && 31-first_sunday<=3)){
				tydzien=1;
				
			} 
			
			butIsThereAnyProblem=0;
		}
		
		if(first_sunday==liczba_dni_w_miesiacu){
			
			aDaysProblemSolution=first_sunday-i;
			andTheMonth=first_month;
			andAYear=rok_temp;
			butIsThereAnyProblem=1;
			
			first_month++;
			if(m==1)mies_temp=first_month;
			first_sunday=0;	
			temp=i;
			i=0;
			if(liczba_dni_w_miesiacu==31 && first_month!=8)liczba_dni_w_miesiacu=30;
			else liczba_dni_w_miesiacu=31;
			if(first_month==2 && rok_temp%4==0 && rok_temp%100!=0)liczba_dni_w_miesiacu=29;
            else if(first_month==2){
                    liczba_dni_w_miesiacu=28;
                    if(rok_temp%400==0)liczba_dni_w_miesiacu++;
            }

            if(first_month==13){
                rok_temp++;
                first_month=1;
				liczba_dni_w_miesiacu=31;
            }
		}
		
		
	}
	/*
	var aDaysProblemSolution;
	var andTheMonth;
	var andAYear;
	var butIsThereAnyProblem=0;
	var i=1;
	while(first_sunday<dzien && first_month<=mies && rok_temp<=rok){
		
		
	
		
		first_sunday++;
		
		if(i+temp==7 ){
	
			tydzien++;
			i=0;
			temp=0;
			if(tydzien>53 || (tydzien>=51 && 31-first_sunday<=3)){
				tydzien=1;
				
			}
			butIsThereAnyProblem=0;
		}
		
		if(first_sunday==liczba_dni_w_miesiacu){
			
			aDaysProblemSolution=firts_sunday-i;
			andTheMonth=first_month;
			andAYear=rok_temp;
			butIsThereAnyProblem=1;
			first_month++;
			first_sunday=0;	
			
			temp=i;
			i=0;			
			if(liczba_dni_w_miesiacu==31 && first_month!=8)liczba_dni_w_miesiacu=30;
			else liczba_dni_w_miesiacu=31;
			if(first_month==2 && rok_temp%4==0 && rok_temp%100!=0)liczba_dni_w_miesiacu=29;
            else if(first_month==2){
                    liczba_dni_w_miesiacu=28;
                    if(rok_temp%400==0)liczba_dni_w_miesiacu++;
            }

            if(first_month==13){
                rok_temp++;
                first_month=1;
				liczba_dni_w_miesiacu=31;
            }
		}
		
		i++;
		
	}
	
	
	*/
//OBLICZANIE KONCA TYGODNIA
	if(butIsThereAnyProblem==1){
		var second_sunday=aDaysProblemSolution;
		var second_month=andTheMonth;
		var second_year=andAYear;
		rok=andAYear;
	}
	else{
		var second_sunday=first_sunday-i;
		var second_month=mies;
		var second_year=rok;
		
	}
	
	if(second_month==1 || second_month==3 || second_month==5 || second_month==7 || second_month==8 || second_month==10 || second_month==12)liczba_dni_w_miesiacu=31;
	if(second_month==4 || second_month==6 || second_month==9 || second_month==11) liczba_dni_w_miesiacu=30;
	if(second_month==2 && second_year%4==0 && second_year%100!=0) liczba_dni_w_miesiacu=29;
            else if(second_month==2){
                    liczba_dni_w_miesiacu=28;
                    if(second_year%400==0) liczba_dni_w_miesiacu++;
            }
	
	
	var j=1;
	for(j=1;j<7;j++){
		
		if(second_sunday==liczba_dni_w_miesiacu){
			
			second_month++;
			second_sunday=0;	

			if(liczba_dni_w_miesiacu==31 && second_month!=8)liczba_dni_w_miesiacu=30;
			else liczba_dni_w_miesiacu=31;
			
			if(second_month==2 && second_year%4==0 && second_year%100!=0)liczba_dni_w_miesiacu=29;
            else if(second_month==2){
                    liczba_dni_w_miesiacu=28;
                    if(second_year%400==0) liczba_dni_w_miesiacu++;
            }

            if(second_month==13){
				second_sunday=0;
                second_year++;
                second_month=1;
				liczba_dni_w_miesiacu=31;
            }
		}
		
		
		second_sunday++;
		
		
		
	}
	
	
	var liczba;
	
	function flink() 		{window.location.href = "panel_BETA.php";}
	

	
	function link() 		{window.location.href = "panel_BETA.php";}
		
		// Handle Loaded Imports
	function handleLoad(event) {
	console.log('Loaded import: ' + event.target.href);
		//document.write('udalosie');
	}
		 
		// Handle Errors.
	function handleError(event) {
	console.log('Error loading import: ' + event.target.href);
		//document.write('nie udal osie ' + event.target.href);
	}

	function daty(){
		
		if(butIsThereAnyProblem==1){
			dzien=aDaysProblemSolution;
			mies=andTheMonth;
		}
		else{
			dzien=first_sunday-i;			
		}
		
		var mies_s="";
		var d_s="";
		var d_ss="";
		var mies_ss="";
		
		if(dzien<10)		d_s="0"+dzien;
		else  						d_s=dzien;
		
		if (second_sunday<10)	d_ss="0"+second_sunday;
		else  									d_ss=""+second_sunday;
		
		if(mies<10)			mies_s="0"+mies;
		else 						mies_s=mies;
		
		if(second_month<10)			mies_ss="0"+second_month;
		else 										mies_ss=second_month;
		
		if(tydzien<10) 		tydzien="0"+tydzien;
		
		rr=rok-2000;
		second_rr=second_year-2000;
		
		
		document.getElementById("miesiac1").innerHTML =miesiac;
		document.getElementById("tydz").innerHTML =tydzien+" ("+d_s+"."+mies_s+"."+rok+" - "+d_ss+"."+mies_ss+"."+second_year+")";
		document.getElementById("begining").innerHTML =d_s+"."+mies_s+"."+rr;
		document.getElementById("ending").innerHTML =d_ss+"."+mies_ss+"."+second_rr;
	}
	
	function change_gaz(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange=function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		document.getElementById("nazwa_gazety").innerHTML = 'MAŁY GOŚĆ NIEDZIELNY';
		}
		};
		xhttp.open("GET", "panel_Beta.php?name_gaz=MAŁY+GOŚĆ+NIEDZIELNY", true);
		xhttp.send();
		
	}

	//DRUKOWANIE
	//DZiałające ale bez gazety:
	/*var elem;
	
	function PrintElem(elem)
{
   Popup($(elem).html());
}

function Popup(data) 
{
   var mywindow = window.open("", "to_print", "height=500,width=600");
   var html = "<html><head><title></title>	<link href='CSS/panel_styles_BETA.css' rel='stylesheet' type='text/css'></head>"+
   "<body style='background-color:white; max-width:900px;' onload='setTimeout(window.focus() window.print() window.close(),10000)'><div id='resultt'>"+
   data+
   "</div><div class='dottedline'></div></body></html>";

   mywindow.document.write(html);
   mywindow.print();
   mywindow.document.close();
   return true;					
}*/
	
	
	var elem;
	
	function PrintElem(elem,el2)
{
	var gazeta = document.getElementById("nazwa_gazety").innerHTML;
   Popup($(elem).html(),gazeta);
}

function Popup(data,data2) 
{
   var mywindow = window.open("", "to_print", "height=500,width=600");
   var html = "<html><head><title></title>	<link href='CSS/panel_styles_BETA.css' rel='stylesheet' type='text/css'></head>"+
   "<body style='background-color:white; max-width:900px;' onload='setTimeout(window.focus() window.print() window.close(),10000)'><div id='resultt'><br/>"+
   data2+
   "<br/><br/>"+
   data+
   "</div><div class='dottedline'></div></body></html>";

   mywindow.document.write(html);
   mywindow.print();
   mywindow.document.close();
   return true;					
}