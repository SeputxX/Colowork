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