function desplegarCompe()  {
	var div = document.getElementById('competencias');
	div.style.display="inline";
	var a = document.getElementById('desple');
	a.style.display="none";
	var b = document.getElementById('ocul');
	b.style.display="inline";
}
function ocultarCompe(){
	var a = document.getElementById('desple');
	a.style.display="inline";
	var div = document.getElementById('competencias');
	div.style.display="none";	
	var b = document.getElementById('ocul');
	b.style.display="none";

}

function jugar(){

		var tr = document.getElementsByTagName('tr');
		var td =document.getElementsByTagName('td');
		var filas= tr.length;
		var columnas=tr[0].getElementsByTagName('td').length;

		var tablero=new Array(filas);
		var tablero_aux=new Array(filas);

		function hasClass(el, cls) {
		  return el.className && new RegExp("(\\s|^)" + cls + "(\\s|$)").test(el.className);
		}

		for(var x=0;x<filas;x++){
			tablero[x]=new Array(columnas);
			tablero_aux[x]=new Array(columnas);
		}


				for (x = 0; x < filas; x++) {				
					for (y = 0; y < columnas; y++) {
						if(hasClass(document.getElementsByTagName('tr')[x].getElementsByTagName('td')[y],'viva')){
							tablero[x][y] = 1;	
							tablero_aux[x][y] = 1;	
						}else{
							tablero[x][y] = 0;	
							tablero_aux[x][y] = 0;	
						}
			  		}
	  			}

	  			function algoritmo_xy() {
				
				for (x = 0; x < filas; x++) {
					for (y = 0; y < columnas; y++) {

						// Comprueba población alrededor.
						casillas_on = 0;

						if ( (x-1>=0) && (y-1>=0) && (tablero[x-1][y-1]==1) ) casillas_on++;
						if ( (y-1>=0) && (tablero[x][y-1]==1) ) casillas_on++;
						if ( (x+1<filas) && (y-1>=0) && (tablero[x+1][y-1]==1) ) casillas_on++;
						if ( (x-1>=0) && (tablero[x-1][y]==1) ) casillas_on++;
						if ( (x+1<filas) && (tablero[x+1][y]==1) ) casillas_on++;
						if ( (x-1>=0) && (y+1<columnas) && (tablero[x-1][y+1]==1) ) casillas_on++;
						if ( (y+1<columnas) && (tablero[x][y+1]==1) ) casillas_on++;
						if ( (x+1<filas) && (y+1<columnas) && (tablero[x+1][y+1]==1) ) casillas_on++;

						// Condiciones de vida.
						if (casillas_on<2) {		// Si alrededor hay menos de dos celdas vivas,
							tablero_aux[x][y]=0;	// muere por escasa población.
						}

						else					

						if (casillas_on>3) {		// Si alrededor hay más de tres celdas vivas,
							tablero_aux[x][y]=0;	// muere por superporblación.
						}

						else 

						if (casillas_on==3) {		// Si alrededor hay tres celdas vivas,
							tablero_aux[x][y]=1;	// vive (sigue viviendo o se crea vida).
						}

			  		}
	  			}

	  			copiar (tablero_aux, tablero);
	  			mostrar();
	  				
	  			}
	  				
	  			
	  			
	  			
				
				
	  			//document.getElementById('a1').innerHTML=JSON.stringify(tablero_aux);

			function mostrar () {
				for (x = 0; x < filas; x++) {
					
					for (y = 0; y < columnas; y++) {

						if (tablero[x][y] == 0)	{
			  				document.getElementsByTagName('tr')[x].getElementsByTagName('td')[y].setAttribute("class", "juego");
						}
			  			else{
			  				document.getElementsByTagName('tr')[x].getElementsByTagName('td')[y].setAttribute("class","juego viva");
			  			}
			  		}
	  			}
			}
			function copiar (origen, destino) {
				for (x = 0; x < filas; x++) {
					for (y = 0; y < columnas; y++) {
						destino[x][y] = origen[x][y];
			  		}
	  			}

			}

			setTimeout(function (){
				algoritmo_xy();
				setInterval(function (){algoritmo_xy()},100);
			},3000);
			

			
	}

function avisarBorrado(){
	var flag = confirm("¿Esta seguro de que desea borrar su perfil en ColoWork?")

	if (flag){
		// Si necesitas poner alguna variable en el formulario oculto hazlo aquí antes de enviar, poniendo campos ocultos en el mismo
		document.form_hidden.submit();
	}
}
function anadirIdioma(){
	var td = document.getElementById('idiomas');
	var guia = document.getElementById('idi');
	var nuevo = guia.cloneNode(true);
	var cant=td.getElementsByTagName('div').length;
	
	nuevo.getElementsByTagName('select')[0].setAttribute("name","idiomas["+cant+"]");
	nuevo.getElementsByTagName('select')[1].setAttribute("name","n_hablado["+cant+"]");
	nuevo.getElementsByTagName('select')[2].setAttribute("name","n_escrito["+cant+"]");
	nuevo.getElementsByTagName('input')[0].setAttribute("name","fechat["+cant+"]");
	var but = document.getElementById('but');

	td.insertBefore(nuevo, but);
}
function anadirExp(){
	var td = document.getElementById('experiencia');
	var guia = document.getElementById('exp');
	var nuevo = guia.cloneNode(true);
	var cant=td.getElementsByTagName('div').length;
	
	nuevo.getElementsByTagName('input')[0].setAttribute("name","descripcion["+cant+"]");
	nuevo.getElementsByTagName('input')[1].setAttribute("name","finicio["+cant+"]");
	nuevo.getElementsByTagName('input')[2].setAttribute("name","ffinal["+cant+"]");

	var but = document.getElementById('but2');

	td.insertBefore(nuevo, but);
}

function setCookie(nombre, valor, exmin) {
			var d = new Date();
			 d.setTime(d.getTime() + (exmin*60*1000));
			var expires = "expires="+d.toUTCString();
			 document.cookie = nombre + "=" + valor + "; " + expires;
		}
function getCookie(nombre) {
	var name = nombre + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) ==0)return c.substring(name.length,c.length);
	}
	return"";
} 

function alumnosAptos(pos,idcom){

	var url = getCookie("url");
	
	var compe =document.getElementsByName('competencias[]');

		if(compe[pos].checked==true){	

			if(url.search(idcom)==-1){
				var pr=getCookie('url');
				var n=	url+idcom+"a";
				setCookie("url",n,3);
			}
		}else{			
			var url2=url.replace(idcom+"a","");
			setCookie("url",url2,1);			
		}
		
				

		http_request = new XMLHttpRequest();
		http_request.overrideMimeType('text/xml');
		url=getCookie("url");
		http_request.open('GET', 'index.php?ctl=aptos&url='+url, true);
		http_request.send();

		http_request.onreadystatechange = function(){

			if(http_request.status==200 && http_request.readyState==4){
		    
			    var respuesta = http_request.responseText;	
			   	if(respuesta==0){
			   		can="todos";
			   	}else{	    
				    var numAl=JSON.parse(respuesta);		  
				    var can=numAl.length;
			    }	   	
			    var b = document.getElementById('alumnos').innerHTML=can;
			}
		}	
}
	function getCookie2(c_name){
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1){
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1){
        c_value = null;
    }else{
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1){
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}
 
function setCookie2(c_name,value,exdays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}
 

function PonerCookie(){
    setCookie2('tiendaaviso','1',365);
    document.getElementById("barraaceptacion").style.display="none";
}


window.onload = function () {

if(getCookie2('tiendaaviso')!="1"){
	document.getElementById("barraaceptacion").style.display="block";
}

$('.imgP').each(function(){
	$(this).css("margin-top",((92-$(this).height())/2));
});
}