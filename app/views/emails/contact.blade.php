<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario Contacto</title>
	<style type="text/css">
		body{
			font-size: 18px;
		}
		.info p{
			color: #45aabb;
		}
		.info p span{
			color: #61a75b;
		}
		.social{
			text-align: right;	
		}
		.social img{
			width: 40px
		}
		.footer{
			color: white;
			text-align:  center
		}
		.footer p{
			margin: 0;
		}
		.footer ul{
			margin: 0;
		}
		.footer ul li{
			list-style: none;
			display: inline-block;
		}
		.footer ul li a{
			text-decoration: underline;
			color: white;

		}

	</style>
</head>
<body>
	<table align="center" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;"> 
		<tr> 
			<td align="left" style="padding: 40px 0 30px 0;"> 
 				<img src="http://masempleosyservicios.com.ni/img/logo.png" alt="Creating Email Magic" width="130" height="130" style="display: block; float:left" /> 
 				<h2 style="color:#61a75b; text-align:center; font-size: 2em">Mas empleos y servicios</h2>
			</td> 
		</tr> 
		<tr> 
			<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;" class="info"> 
				<h2 style="color:#45aabb; text-align:center">Informacion de contacto enviado desde <a href="http://masempleosyservicios.com.ni/Contactenos" target="new" style="text-decoration:underline; color:#45aabb; ">Contacto</a></h2>
				
				<p>Nombre y Apellido: <span>{{ $nombre }}</span></p>
				<p>Razon Social: <span>{{ $razon }}</span></p>
				<p>Correo Electronico: <span>{{ $email }}</span></p>
				<p>Telefono: <span>{{ $telefono }}</span></p>
				<p>Mensaje: <span>{{ $mensaje }}</span></p>
			</td> 
		</tr> 
		<tr> 
			<td bgcolor="#61a75b" class="footer"> 
	    		<p>Mas Empleos Y Servicios &copy; 2014 MAGECSA</p>
	    		<P>Todos Los Derechos Reservados</P>    		
	    		<ul>
	    			<li><a href="http://masempleosyservicios.com.ni/">MAGECSA</a> <span>|</span></li>
			        <li><a href="http://masempleosyservicios.com.ni/Nosotros">Quienes somos</a> <span>|</span></li>
			        <li><a href="http://masempleosyservicios.com.ni/Contactenos">Contáctenos</a> <span>|</span></li>
			        <li>Designed by <a href="http://doctorpc.com.ni/" target="new">Doctor PC</a></li>
			     </ul> 
			     <div class="social">
	    			<a href=""><img src="http://masempleosyservicios.com.ni/img/facebooklogo.png" alt=""></a>
	    			<a href=""><img src="http://masempleosyservicios.com.ni/img/twiter.png" alt=""></a>
	    			<a href=""><img src="http://masempleosyservicios.com.ni/img/linkeding.png" alt=""></a>
	    		</div>
			</td> 
	 	</tr> 
 	</table> 
</body>
</html>