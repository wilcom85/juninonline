var x;
x=$(document);
x.ready(inicializar);

function inicializar(){
	var x;
	x=$(".opcionMenu");
	x.click(resaltarBoton);
}

function resaltarBoton(){
	var x;
	x=$(".opcionMenu");
	x.css("backround-color","green");
}