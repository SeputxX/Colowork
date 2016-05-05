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
		http_request.open('GET', 'http://localhost/colowork/web/index.php?ctl=aptos&url='+url, true);
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