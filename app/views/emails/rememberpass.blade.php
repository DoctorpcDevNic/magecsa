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
			width: 40px !important;
		}
		.footer{
			color: white !important;
			text-align:  center !important;
		}
		.footer p{
			margin: 0 !important;
		}
		.footer ul{
			margin: 0 !important;
		}
		.footer ul li{
			list-style: none !important;
			display: inline-block !important;
		}
		.footer ul li a{
			text-decoration: underline !important;
			color: white !important;
		}

	</style>
</head>
<body>
	<table align="center" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; font-size:18px"> 
		<tr> 
			<td align="left" style="padding: 40px 0 30px 0;"> 
 				<img src="http://masempleosyservicios.com.ni/img/logo.png" alt="Creating Email Magic" width="130" height="130" style="display: block; float:left" /> 
 				<h2 style="color:#61a75b; text-align:center; font-size: 2em">Mas empleos y servicios</h2>
			</td> 
		</tr> 
		<tr> 
			
			<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;" class="info"> 
				<h2 style="color:#45aabb; text-align:center">Recuperar Contraseña </h2>
				
				<p>Correro enviado para recuperar contraseña. Si usted no ha pedido recuperar contraseña, omita este mensaje</p>
				<p>Ingrese a este link para repuerar contraseña <a href="{{ $email }}" target="new">{{ $email }}</a></p>
				
			</td> 
		</tr> 
		<tr> 
			<td bgcolor="#61a75b" class="footer" style="color: white !important;text-align:center !important;"> 
	    		<p style="margin: 0 !important;">Mas Empleos Y Servicios &copy; 2014 MAGECSA</p>
	    		<P style="margin: 0 !important;">Todos Los Derechos Reservados</P>    		
	    		<ul style="margin: 0 !important;">
	    			<li style="list-style: none !important;display: inline-block !important;"><a href="http://masempleosyservicios.com.ni/" style="text-decoration: underline !important;color: white !important;">MAGECSA</a> <span>|</span></li>
			        <li style="list-style: none !important;display: inline-block !important;"><a href="http://masempleosyservicios.com.ni/Nosotros" style="text-decoration: underline !important;color: white !important;">Quienes somos</a> <span>|</span></li>
			        <li style="list-style: none !important;display: inline-block !important;"><a href="http://masempleosyservicios.com.ni/Contactenos" style="text-decoration: underline !important;color: white !important;">Contáctenos</a> <span>|</span></li>
			        <li style="list-style: none !important;display: inline-block !important;">Designed by <a href="http://doctorpc.com.ni/" target="new" style="text-decoration: underline !important;color: white !important;">Doctor PC</a></li>
			     </ul> 
			     <div class="social" style="text-align: right;">
	    			<a href=""><img src="http://masempleosyservicios.com.ni/img/facebooklogo.png" alt="" style="width: 40px !important;"></a>
	    			<a href=""><img src="http://masempleosyservicios.com.ni/img/twiter.png" alt="" style="width: 40px !important;"></a>
	    			<a href=""><img src="http://masempleosyservicios.com.ni/img/linkeding.png" alt="" style="width: 40px !important;"></a>
	    		</div>
			</td> 
	 	</tr> 
 	</table> 
</body>
</html>