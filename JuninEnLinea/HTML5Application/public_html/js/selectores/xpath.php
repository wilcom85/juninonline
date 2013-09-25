<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Documento sin título</title>
			<script type="text/javascript" src="../jquery.js"></script>
			<script type="text/javascript">
				var x;
				x=$(document);
				x.ready(inicio);
				
				function inicio(){
					var x;
					x=$("#revelar");
					x.click(mostrar);
				}
				
				function mostrar(){
					var x;
					x=$("cambiame");
					x.css("background","yellow");
				}
				
			</script>
    </head>
    
    <body>
    	<input type="button" id="revelar" value="revelar" /></br> 
			<p>Soy un párrafo</p>
            <p id="cambiame">Soy un párrafo</p>
			<h1 id="cambiame">Soy un título</h1>
            <h1>Soy otro título</h1>		
    </body>
</html>