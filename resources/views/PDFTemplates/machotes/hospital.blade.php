<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	html{
		maring: 0;
	}
	/* Page */
	.container-fluid{
        padding: 0 !important;
    }

	.footer-page{
        position: fixed;
        bottom: -0.5cm; 
        height: 27px;
        width:210vh;
        margin-left:-50px;
        margin-right:-10px;
        background-color: #00179F;
    }

    .contenedor-info{
    	display: inline-block;
    	position: fixed;
    	left: 150px;

    	line-height: 20%;
    	text-align: right;
    }

    .leyenda{
    	font-size: 12px;
    	text-align: center;
    	position: fixed;
    	bottom: 0.8cm;
    }

    .footer-text{
    	color: white;
    }

    .contenedor-firma{
    	line-height: 20%;
    	position: fixed;
    	bottom: 2.5cm;
    	text-align: center;
    }

    hr.linea-firma{
    	background-color:#070707;
        height:1.6px;
        width: 270px;
        border-style: none;
    }

    /* Imagenes */
    .marca-agua{
	    background-repeat: no-repeat;
	    background-position: center;
	    width: 100%;
	    height: auto;
	    margin: auto;
    }

    .marca-agua img{
    	padding: 0;
    	width: 100%;
		height: auto;
		opacity: 0.3;
    }

    .logoHeader{
    	margin-top:-50px;
    	margin-left:-14px;
    	height: 170px;
    	width: 33%;
    }
    .icon-footer{
    	height: 25px;
    	width: 30px;
    }
</style>
<body>
	<div class="container-fluid">
		<!-- Grid [header] portada -->
		<table>
			<tr>
				<!-- Logotipo -->
				<td>
					<img class="logoHeader" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/hospital/logo.png'))) }}" />
				</td>
				<!-- Info -->
				<td>
					<div class="contenedor-info">
						<p id="subject" style="font-weight:bolder;">
							LABORATORIO DE ANALISIS CLINICOS
						</p>
						<p id="matriz">
							<strong>Matriz: </strong>
							Av. Progreso #712, Colonia Gonzales
						</p>
						<p id="sucursal">
							<strong>Sucursal:</strong>
							Zaragoza Ote. No. 401, Villa de Fuente Pidras Negras, Coahuila
						</p>
						<p id="Telefono">
							Tel. 878 688 y 878 688 7013
						</p>
					</div>
				</td>
			</tr>
		</table>

		<!-- Marca de Agua -->
		<div class="marca-agua">
			<img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('img/hospital/b.jpg'))) }}">
		</div>

		<!-- Firma -->
		<div class="contenedor-firma">
			<hr class="linea-firma">
			<p style="font-size:9.7px;">
				Responsable sanitario
			</p>
			<p id="responsable" style="font-weight:bolder;">
				L.C.Q. Victor Javier Gomez Rodriguez
			</p>
			<p id="cedula" style="font-weight:bolder;">
				CED. PROF. 1205998
			</p>
		</div>

		<!-- Leyenda -->
		<div class="leyenda">
			El uso de informacion de este reporte es estrictamente confidencial y dirigida solo al destinatario
		</div>

		<!-- Footer -->
		<div class="footer-page">
			<div>
				<img id="facebook" class="icon-footer" style="margin-top:3px; margin-left:5px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/hospital/iconos/facebook.png'))) }}"/>
				<img id="instagram" class="icon-footer" style="margin-top:3px; margin-left:2px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/hospital/iconos/instagram.png'))) }}"/>
				<p class="footer-text" style="margin-left:80px; margin-top:-24px;">
					Farmacia y Laboratorio Vida
				</p>
			</div>
			<div>
				<img id="whatsapp" class="icon-footer" style="margin-left:310px; margin-top:-32px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/hospital/iconos/whatsapp.png'))) }}"/>
				<p>
					(878) 159 9181
				</p>
			</div>
			<div>
				<img id="whatsapp" class="icon-footer" style="margin-left:410px; margin-top:-32px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/hospital/iconos/mail.png'))) }}"/>
			</div>
		</div>
	</div>
</body>
</html>