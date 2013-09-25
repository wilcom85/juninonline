var x;
x=$(document);
x.ready(inicializar);

function inicializar()
{
	var x;
	x=$("#hola");
	x.click(clicHecho);
}

function clicHecho()
{
	var x;
	x=$("#hola");
	x.css("color","green");
	x.css("background-color","yellow");
	x.css("font-size","24px");
	x.css("border","1px solid black");
}