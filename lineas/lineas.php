<?php

$server='localhost';
$username='root';
$password='root';
$database='control';

//Create connection
$conn = new mysqli($server,$username,$password,$database);

//check Connection
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}


$sql="SELECT COUNT(*) as cantidad_edificio_comteco,
-- subconsultas-- 
-- cantidades de las sucursales--

--  cantidad de la sucursal de muyurina --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1'
                 AND 	i.id_sucursal='2') AS cantidad_edificio_muyurina,
    
--  cantidad de la sucursal de km0 --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1'
                 AND 	i.id_sucursal='3') AS cantidad_edificio_km0,
    
--  cantidad de la sucursal de hipodromo --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1'
                 AND 	i.id_sucursal='4') AS cantidad_edificio_hipodromo,
    
--  cantidad de la sucursal de quillacollo --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1'
                 AND 	i.id_sucursal='5') AS cantidad_edificio_quillacollo,
    
--  cantidad de la sucursal de administrativo --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1'
                 AND 	i.id_sucursal='6') AS cantidad_edificio_administrativo,
    
--  cantidad de la sucursal de tecnico --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1'
                 AND 	i.id_sucursal='7') AS cantidad_edificio_tecnico,
    
--  cantidad de la sucursal de edificio norte --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1' 
                 AND 	i.id_sucursal='8') AS cantidad_edificio_norte,
    
--  cantidad de la sucursal de edificio sud --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1' 
                 AND 	i.id_sucursal='9') AS cantidad_edificio_sud,
    
--  cantidad de la sucursal de sucre --
(SELECT COUNT(*) FROM 	control.ingreso_salida_visitante i 
                 JOIN 	control.sucursal s 
                 JOIN 	control.persona p 
                 WHERE	i.id_sucursal	= s.id_sucursal 
                 AND 	i.id_persona	= p.id_persona 
                 AND 	i.estado='1'
                 AND	i.id_sucursal='10') AS cantidad_edificio_sucre,
    
--  nombres de las sucursales

-- 	sucursal comteco --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=1
    AND control.sucursal.estado=1) AS nombre_sucursal_comteco,
    
-- 	sucursal muyurina --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=2
    AND control.sucursal.estado=1) AS nombre_sucursal_muyurina, 
    
-- 	sucursal km0 --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=3
    AND control.sucursal.estado=1) AS nombre_sucursal_km0,

-- 	sucursal Hipodromo --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=4
    AND control.sucursal.estado=1) AS nombre_sucursal_hipodromo,
    
-- 	sucursal Quillacollo --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=5
    AND control.sucursal.estado=1) AS nombre_sucursal_quillacollo,

-- 	sucursal Administrativo --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=6
    AND control.sucursal.estado=1) AS nombre_sucursal_administrativo,
    
 -- 	sucursal Tecnico --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=7
    AND control.sucursal.estado=1) AS nombre_sucursal_tecnico,

 -- 	sucursal Central Norte --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=8
    AND control.sucursal.estado=1) AS nombre_sucursal_norte,

 -- 	sucursal Sud --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=9
    AND control.sucursal.estado=1) AS nombre_sucursal_sud,
    
 -- 	sucursal Sucre --
(SELECT nombre FROM control.sucursal 
    WHERE  control.sucursal.id_sucursal=10
    AND control.sucursal.estado=1) AS nombre_sucursal_sucre
FROM 	control.ingreso_salida_visitante i 
JOIN 	control.sucursal s 
JOIN 	control.persona p 

WHERE	i.id_sucursal	= s.id_sucursal 
AND 	i.id_persona	= p.id_persona 
AND 	i.estado='1'
AND 	i.id_sucursal='1';";

//Cantidad de personas

$sql1="SELECT COUNT(*) AS empleados,
-- subconsultas --

-- cantidad de guardias --
(SELECT COUNT(*) FROM control.guardia
 WHERE control.guardia.estado=1) AS guardias,
 
-- cantidad de visitantes --
(SELECT COUNT(*) FROM control.visitante
 WHERE control.visitante.estado=1) AS visitantes,

-- cantidad de conductores --
(SELECT COUNT(*) FROM control.conductores
 WHERE control.conductores.estado=1) AS conductores


FROM  control.empleado 
WHERE control.empleado.estado=1;";

$sql2="SELECT COUNT(*) as cantidad_edificio_comteco,

		-- subconsultas-- 
		-- cantidades de las sucursales--

		--  cantidad de la sucursal de muyurina --
		(SELECT COUNT(*)	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1'
							AND   		i.id_sucursal='2') AS cantidad_edificio_muyurina,
			
		--  cantidad de la sucursal de km0 --
		(SELECT COUNT(*) 	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1' 
							AND 		i.id_sucursal='3') AS cantidad_edificio_km0,
			
		--  cantidad de la sucursal de hipodromo --
		(SELECT COUNT(*) 	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1'  
							AND 		i.id_sucursal='4') AS cantidad_edificio_hipodromo,
			
		--  cantidad de la sucursal de quillacollo --
		(SELECT COUNT(*) 	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1' 
							AND 		i.id_sucursal='5') AS cantidad_edificio_quillacollo,
			
		--  cantidad de la sucursal de administrativo --
		(SELECT COUNT(*) 	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1'  
							AND 		i.id_sucursal='6') AS cantidad_edificio_administrativo,
			
		--  cantidad de la sucursal de tecnico --
		(SELECT COUNT(*) 	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1' 
							AND 		i.id_sucursal='7') AS cantidad_edificio_tecnico,
			
		--  cantidad de la sucursal de edificio norte --
		(SELECT COUNT(*) 	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1'  
							AND 		i.id_sucursal='8') AS cantidad_edificio_norte,
			
		--  cantidad de la sucursal de edificio sud --
		(SELECT COUNT(*)	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1'  
							AND 		i.id_sucursal='9') AS cantidad_edificio_sud,
			
		--  cantidad de la sucursal de sucre --
		(SELECT COUNT(*) 	FROM 		control.ingresos_vehiculo i 
							INNER JOIN  control.sucursal s 
							INNER JOIN  control.vehiculo v
							INNER JOIN  control.escalera es 
							INNER JOIN  control.persona p
										
							WHERE 		i.id_persona=p.id_persona   
							AND   		i.id_sucursal=s.id_sucursal
							AND   		i.id_vehiculo=v.id_vehiculo 
							AND   		i.id_escalera=es.id_escalera 
							AND   		i.estado='1' 
							AND 		i.id_sucursal='10') AS cantidad_edificio_sucre
    
	FROM 		control.ingresos_vehiculo i 
	INNER JOIN  control.sucursal s 
	INNER JOIN  control.vehiculo v
	INNER JOIN  control.escalera es 
	INNER JOIN  control.persona p
				
	WHERE 		i.id_persona=p.id_persona   
	AND   		i.id_sucursal=s.id_sucursal
	AND   		i.id_vehiculo=v.id_vehiculo 
	AND   		i.id_escalera=es.id_escalera 
	AND   		i.estado=1
	AND   		i.id_sucursal=1;";


//resulatados de los  Query
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

//Almacenamiento de datos
$chart_data='';
$chart_data1='';
$chart_data2='';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $chart_data .= "
            {
                
                cantidad_edificio_comteco:          ".$row["cantidad_edificio_comteco"].               ",
                cantidad_edificio_muyurina:         ".$row["cantidad_edificio_muyurina"].              ",
                cantidad_edificio_km0:              ".$row["cantidad_edificio_km0"].                   ",
                cantidad_edificio_hipodromo:        ".$row["cantidad_edificio_hipodromo"].             ",
                cantidad_edificio_quillacollo:      ".$row["cantidad_edificio_quillacollo"].           ",
                cantidad_edificio_administrativo:   ".$row["cantidad_edificio_administrativo"].        ",
                cantidad_edificio_norte:            ".$row["cantidad_edificio_norte"].                 ",
                cantidad_edificio_sud:              ".$row["cantidad_edificio_sud"].                   ",
                cantidad_edificio_sucre:            ".$row["cantidad_edificio_sucre"].                 ",
                
                nombre:                             'Ingreso y salidas de visitantes                    ',
                nombre_sucursal_comteco:            '".$row["nombre_sucursal_comteco"].                 "',
                nombre_sucursal_muyurina:           '".$row["nombre_sucursal_muyurina"].                "',
                nombre_sucursal_km0:                '".$row["nombre_sucursal_km0"].                     "',
                nombre_sucursal_hipodromo:          '".$row["nombre_sucursal_hipodromo"].               "',
                nombre_sucursal_quillacollo:        '".$row["nombre_sucursal_quillacollo"].             "',
                nombre_sucursal_administrativo:     '".$row["nombre_sucursal_administrativo"].          "',
                nombre_sucursal_tecnico:            '".$row["nombre_sucursal_tecnico"].                 "',
                nombre_sucursal_norte:              '".$row["nombre_sucursal_norte"].                   "',
                nombre_sucursal_sud:                '".$row["nombre_sucursal_sud"].                     "',
                nombre_sucursal_sucre:              '".$row["nombre_sucursal_sucre"].                   "',

            }, ";

    }
} else {
    echo "0 results";
}

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        $chart_data1 .= "

                {   value:            ".$row["empleados"].               ", label: 'Empleados'},
                {   value:            ".$row["guardias"].                ", label: 'Guardias'},
                {   value:            ".$row["visitantes"].              ", label: 'Visitantes'},
                {   value:            ".$row["conductores"].             ", label: 'Conductores'}
                ";

    }
} else {
    echo "0 results";
}
if($result2->num_rows>0){
    while($row=$result2->fetch_assoc()){
        $chart_data2 .="
            {
                cantidad_edificio_comteco:          ".$row["cantidad_edificio_comteco"].               ",
                cantidad_edificio_muyurina:         ".$row["cantidad_edificio_muyurina"].              ",
                cantidad_edificio_km0:              ".$row["cantidad_edificio_km0"].                   ",
                cantidad_edificio_hipodromo:        ".$row["cantidad_edificio_hipodromo"].             ",
                cantidad_edificio_quillacollo:      ".$row["cantidad_edificio_quillacollo"].           ",
                cantidad_edificio_administrativo:   ".$row["cantidad_edificio_administrativo"].        ",
                cantidad_edificio_norte:            ".$row["cantidad_edificio_norte"].                 ",
                cantidad_edificio_sud:              ".$row["cantidad_edificio_sud"].                   ",
                cantidad_edificio_sucre:            ".$row["cantidad_edificio_sucre"].                 ",

                nombre:                             'Ingreso y salidas de Vehiculos                    ',
            }
        ";
    }
}else{
    echo "0 results";
}


$conn->close();

//subtrayendo datos
$chart_data = substr($chart_data,0,-2);
$chart_data1 = substr($chart_data1,0,-2);
$chart_data2 = substr($chart_data2,0,-2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafiacsa de Lineas</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <link rel="stylesheet" href="../libs/morris.css">
    <script src="../libs/morris.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head> 
<body>
    <div class="container">
        <h1>Graficas</h1>
        <hr>
            <div class="row">
                <div class="col-md-6">
                    <h2>Cantidad de ingresos de visitantes</h2>
                    <hr>
                    <div id="myfirstchart"></div>
                    <!-- <button type="button" id="botData" class="btn btn-primary">
                        Cargar Data -->
                </div>
                    </button>
                <div class="col-md-6">
                    <h2>Grafico de cantidad de Personas</h2>
                    <hr>
                    <div id="mysecondchart"></div>
                    <!-- <button id="mySecondButton" type="button" class="btn btn-primary">
                            Cargar Nuevos Datos -->
                    </button>
                </div>
                <div class="col-md-6">
                    <h2>Cantidad de ingresos de vehiculos</h2>
                    <hr>
                    <div id="mythirdchart"></div>
                    <!-- <button id="mySecondButton" type="button" class="btn btn-primary">
                            Cargar Nuevos Datos -->
                    </button>
                </div>
                
            </div>
         

    </div>
</body>
</html>
<script>

var morris1 = new Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'myfirstchart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
      <?php echo $chart_data ?>
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'nombre',
    // A list of names of data record attributes that contain y-values.
    ykeys: [
            'cantidad_edificio_comteco',
            'cantidad_edificio_muyurina',
            'cantidad_edificio_km0',
            'cantidad_edificio_hipodromo',
            'cantidad_edificio_quillacollo',
            'cantidad_edificio_administrativo',
            'cantidad_edificio_norte',
            'cantidad_edificio_sud',
            'cantidad_edificio_sucre',
            
            ],
    lineWidth:1,
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: [
            'sucursal comteco',
            'sucursal muyurina',
            'sucursal km0',
            'sucursal hipodromo',
            'sucursal quillacollo',
            'sucursal administrativo',
            'sucursal tecnico',
            'sucursal norte',
            'sucursal sud',
            'sucursal sucre',
            ],
    resize:true,
    lineColors:['#C14d9f','#2CB4AC','#2CB4AC']
  });

  // Use Morris.Area instead of Morris.Line


Morris.Donut({
    element: 'mysecondchart',
    data: [

        <?php echo $chart_data1 ?>

    ],
  labelColor: 'blue',
  colors: [
    'skyeblue',
    '#39B580',
    '#67C69D',
    '#95D7BB'
  ],
    resize:true,
    formatter: function (x) { return x + ""}
    }).on('click', function(i, row){
    console.log(i, row);
});

var morris2 = new Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'mythirdchart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
      <?php echo $chart_data2 ?>
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'nombre',
    // A list of names of data record attributes that contain y-values.
    ykeys: [
            'cantidad_edificio_comteco',
            'cantidad_edificio_muyurina',
            'cantidad_edificio_km0',
            'cantidad_edificio_hipodromo',
            'cantidad_edificio_quillacollo',
            'cantidad_edificio_administrativo',
            'cantidad_edificio_norte',
            'cantidad_edificio_sud',
            'cantidad_edificio_sucre',
            
            ],
    lineWidth:1,
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: [
            'sucursal comteco',
            'sucursal muyurina',
            'sucursal km0',
            'sucursal hipodromo',
            'sucursal quillacollo',
            'sucursal administrativo',
            'sucursal tecnico',
            'sucursal norte',
            'sucursal sud',
            'sucursal sucre',
            ],
    resize:true,
    barColors:['#C14d9f','#2CB4AC','skyblue']
  });
</script>
