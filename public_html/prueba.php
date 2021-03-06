<?php require_once('../Connections/chekin.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.html";
  $MM_redirectLoginFailed = "img/Jel1.gif";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_chekin, $chekin);
  
  $LoginRS__query=sprintf("SELECT nombre_persona, numeroId_persona FROM persona WHERE nombre_persona=%s AND numeroId_persona=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $chekin) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel=stylesheet href="css/favoritos.css" type="text/css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-8"></head>
    <body>
    	<div id="contenedor">
            <header>
                <section id="logotipo">
					<div id="logo">
						<svg width="123" height="124" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							 <defs>
							  <linearGradient id="imagebot_24">
							   <stop stop-color="#6687aa" id="imagebot_46" offset="0"/>
							   <stop stop-color="#ffffff" id="imagebot_45" offset="1"/>
							  </linearGradient>
							  <linearGradient id="imagebot_22">
							   <stop stop-color="#1e0fff" id="imagebot_44" offset="0"/>
							   <stop stop-color="#42cfff" id="imagebot_43" offset="1"/>
							  </linearGradient>
							  <linearGradient id="imagebot_21">
							   <stop stop-color="#ffffff" stop-opacity="0" id="imagebot_42" offset="0"/>
							   <stop stop-color="#ffffff" id="imagebot_41" offset="1"/>
							  </linearGradient>
							  <linearGradient id="imagebot_25">
							   <stop stop-color="#d7ffff" id="imagebot_40" offset="0"/>
							   <stop stop-color="#d2ffff" stop-opacity="0.6235" id="imagebot_39" offset="1"/>
							  </linearGradient>
							  <linearGradient id="imagebot_23">
							   <stop stop-color="#000fff" stop-opacity="0.8431" id="imagebot_38" offset="0"/>
							   <stop stop-color="#00879d" stop-opacity="0.6235" id="imagebot_37" offset="1"/>
							  </linearGradient>
							  <linearGradient y2="0.08453" x2="0.25042" y1="0.72372" x1="0.72878" id="imagebot_15" xlink:href="#imagebot_25"/>
							  <linearGradient y2="0.10082" x2="-0.06436" y1="0.41753" x1="0.74656" id="imagebot_16" xlink:href="#imagebot_22"/>
							  <linearGradient y2="1.0137" x2="-0.16128" y1="0.13212" x1="0.78" id="imagebot_12" xlink:href="#imagebot_24"/>
							  <linearGradient y2="0.0824" x2="0.24615" y1="0.72486" x1="0.7327" id="imagebot_9" xlink:href="#imagebot_23"/>
							  <linearGradient y2="0.19825" x2="-0.70067" y1="0.79512" x1="0.94054" id="imagebot_10" xlink:href="#imagebot_22"/>
							  <linearGradient y2="0.20312" x2="0.05102" y1="0.39062" x1="0.51021" id="imagebot_7" xlink:href="#imagebot_21"/>
							 </defs>
							 <g id="imagebot_2">
							  <g transform="translate(-2.59342 -2.25747) matrix(0.808772 0 0 0.808772 -1.38747 -1.61869)" id="imagebot_3">
							   <path fill="white" fill-rule="evenodd" stroke="white" stroke-width="2.42437" stroke-linejoin="bevel" d="M487.03931,710.46149C464.26279,698.60327 441.035,686.92389 421.26981,675.72009L429.4245,667.4137L421.62561,658.16418L472.97791,603.71411C497.73071,614.92352 522.70142,628.56122 548.0083,640.19312L487.03931,710.46149z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_20"/>
							   <path fill="white" fill-rule="evenodd" stroke-width="2.5" stroke-linejoin="bevel" d="M417.5,662.36212L488.75,686.11212L518.75,614.86212L453.75,594.86212L417.5,662.36212z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_19"/>
							   <path fill="white" fill-rule="evenodd" stroke="white" stroke-width="2.5" stroke-linejoin="bevel" d="M413.75,654.86212L485,678.61212L515,607.36212L450,587.36212L413.75,654.86212z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_18"/>
							   <path fill="white" fill-rule="evenodd" stroke="white" stroke-width="3.75" stroke-linejoin="bevel" d="M488.0365,709.07312C471.32339,688.90222 457.492,671.0365 444.81311,648.5603L464.40771,628.3894L464.98401,611.67639L499.56271,574.79248C512.62567,598.6134 528.5705,620.70532 547.39661,641.0683L488.0365,709.07312z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_17"/>
							   <path fill="url(#imagebot_15)" fill-rule="evenodd" stroke="url(#imagebot_16)" stroke-width="2.42437" stroke-linejoin="bevel" d="M487.03931,710.46149C464.26279,698.60327 441.035,686.92389 421.26981,675.72009L429.4245,667.4137L421.62561,658.16418L472.97791,603.71411C497.73071,614.92352 522.70142,628.56122 548.0083,640.19312L487.03931,710.46149z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_14"/>
							   <path fill-opacity="0.1575" fill-rule="evenodd" stroke-width="2.5" stroke-linejoin="bevel" d="M417.5,662.36212L488.75,686.11212L518.75,614.86212L453.75,594.86212L417.5,662.36212z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_13"/>
							   <path fill="white" fill-rule="evenodd" stroke="url(#imagebot_12)" stroke-width="2.5" stroke-linejoin="bevel" d="M413.75,654.86212L485,678.61212L515,607.36212L450,587.36212L413.75,654.86212z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_11"/>
							   <path fill="url(#imagebot_9)" fill-rule="evenodd" stroke="url(#imagebot_10)" stroke-width="3.75" stroke-linejoin="bevel" d="M488.0365,709.07312C471.32339,688.90222 457.492,671.0365 444.81311,648.5603L464.40771,628.3894L464.98401,611.67639L499.56271,574.79248C512.62567,598.6134 528.5705,620.70532 547.39661,641.0683L488.0365,709.07312z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_8"/>
							   <path fill="url(#imagebot_7)" fill-rule="evenodd" stroke-width="2.5" stroke-linejoin="bevel" d="M488.0365,709.07312C471.32339,688.90222 457.492,671.0365 444.81311,648.5603L464.40771,628.3894L464.98401,611.67639L499.56271,574.79248C512.62567,598.6134 528.5705,620.70532 547.39661,641.0683L488.0365,709.07312z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_6"/>
							   <path fill="white" fill-opacity="0.2598" fill-rule="evenodd" d="M451.75189,641.51563C493.37479,654.31348 515.98022,645.58221 531.40948,625.00989L512.39209,598.4574L499.11581,576.56952L466.10461,612.09253L465.74579,627.52173L451.75189,641.51563z" transform="matrix(1.130927,0,0,1.130927,-462.9989,-645.2557)" id="imagebot_5"/>
							   <path fill="white" fill-rule="evenodd" d="M321.43021,193.0425L337.8092,211.76151L241.8748,321.7352L220.81599,297.55649L200.5372,269.47809L180.2585,237.50011L172.4588,222.68089L202.80405,189.74886L203.58977,161.83868L259.03381,101.7879L262.9335,104.1279L259.8139,104.9077L206.60295,163.01149L205.9969,189.14281L174.79871,221.90089L186.49809,242.95959L204.437,272.59811L223.15601,296.77661L321.43021,193.0425z" id="imagebot_4" transform="matrix(0.673307,0,0,0.673307,-74.19154,-62.39847)"/>
							  </g>
							  <title>imagebot_2</title>
							 </g>
							 <metadata>image/svg+xmlOpen Clip Art Libraryopen folder2006-11-27T02:33:00An open blue transparent folder.http://openclipart.org/detail/1642/open-folder-by-dagobert83dagobert83blueblueclip artclipartcomputercomputerfilefilefolderfoldericoniconimagemediaopenopenpaperpaperpngpublic domainsvgtransparenttransparent</metadata>
						</svg>	
					</div>
					<div id="tipo">
						<h1>
							misFavoritos
						</h1>
					</div>
                </section>
                <section id="login">
                    <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST">
                        <input type="text" name="usuario" value="usuario" size="20">
                        <input type="text" name="contrasena" value="contrasena" size="20">
                        <input type="submit">
                    </form>
					<div id="registrate">
						<a href="">
							Pulsa aqu&iacute; para registrarte en la web
					  </a>
					</div>
                </section>
            </header>
            <section id="contenido">
                <section id="presentacion">
                	<div id="animaciontexto1">
                		<h2>
                    		Cansad@ de perder tus favoritos?
                    	</h2>	
                	</div>
                	<div id="animaciontexto2">
                		<h2>
                    		Te gustar&iacute;a no volver a perderlos?
                   	  </h2>	
                	</div>
                    
                </section>
                <section id="etiquetas">
                	<table border="1">
                    	<tr>
                        	<th>
                            	T&iacute;tulo
                              <span id="estrellas">Valoraci&oacute;n</span>
                            </th>
                        </tr>
                        <tr>
                        	<td>
                            	Enlace
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Categor&iacute;a
                          </td>
                        </tr>
                        <tr>
                        	<td>
                            	Comentario
                            </td>
                        </tr>
                    </table>
                    
                    <table border="1">
                    	<tr>
                        	<th>
                            	T&iacute;tulo
                              <span id="estrellas">Valoraci&oacute;n</span>
                            </th>
                        </tr>
                        <tr>
                        	<td>
                            	Enlace
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Categor&iacute;a
                          </td>
                        </tr>
                        <tr>
                        	<td>
                            	Comentario
                            </td>
                        </tr>
                    </table>
                    
                    <table border="1">
                    	<tr>
                        	<th>
                            	T&iacute;tulo
                              <span id="estrellas">Valoraci&oacute;n</span>
                            </th>
                        </tr>
                        <tr>
                        	<td>
                            	Enlace
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Categor&iacute;a
                          </td>
                        </tr>
                        <tr>
                        	<td>
                            	Comentario
                            </td>
                        </tr>
                    </table>
                    <table border="1">
                    	<tr>
                        	<th>
                            	T&iacute;tulo
                              <span id="estrellas">Valoraci&oacute;n</span>
                            </th>
                        </tr>
                        <tr>
                        	<td>
                            	Enlace
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Categor&iacute;a
                          </td>
                        </tr>
                        <tr>
                        	<td>
                            	Comentario
                            </td>
                        </tr>
                    </table>                    

				</section>
            </section>
            <p>
              <footer>
                (c) 2013 - Wilmer Manuel Am&eacute;zquita - Wilcom1
              </footer>
            </p>
            <p>&nbsp;</p>
		</div>
</body>
    
</html>
