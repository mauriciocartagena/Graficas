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
echo "Connection Success";

$sql="SELECT * FROM control.conductores c
        INNER    JOIN control.persona p
        WHERE c.id_persona = p.id_persona;";

$sql2="SELECT COUNT(*) as cantidad FROM control.ingreso_salida_visitante 
WHERE estado='1' 
AND id_sucursal='1';";

$sql3="SELECT COUNT(*) as cantidad,(SELECT COUNT(*) FROM control.ingreso_salida_visitante 
WHERE estado='1' 
AND id_sucursal='1')as cantidad2 FROM control.ingreso_salida_visitante 
WHERE estado='1' 
AND id_sucursal='6';";

//resulatados de los  Query
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);


$chart_data='';
$chart_data2='';
$chart_data3='';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $chart_data .= "{dni1:'".$row["dni"]."', dni:".$row["dni"].",dni2:".$row["dni"]."}, ";

    }
} else {
    echo "0 results";
}
$conn->close();
if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
            $chart_data2 .= "{cantidad1:'".$row["cantidad"]."'}";

    }
} else {
    echo "0 results";
}
$conn->close();

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
            $chart_data3 .= "{cantidad1:".$row["cantidad"].", cantidad2:".$row["cantidad2"].",cantidad3:".$row["cantidad2"].",nombre:'Ingresos y salidas',   }, ";

    }
} else {
}
    echo "0 results";
$conn->close();



$chart_data = substr($chart_data,0,-2);
$chart_datas = substr($chart_data3,0,-2);
echo $chart_datas;

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
                    <h2>Grafica de Linea</h2>
                    <hr>
                    <div id="myfirstchart"></div>
                    <button type="button" id="botData" class="btn btn-primary">
                        Cargar Data
                </div>
                    </button>
                <div class="col-md-6">
                    <h2>Grafico de Area</h2>
                    <hr>
                    <div id="mysecondchart"></div>
                    <button id="mySecondButton" type="button" class="btn btn-primary">
                            Cargar Nuevos Datos
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
      <?php echo $chart_datas ?>
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'nombre',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['cantidad1','cantidad3'],
    lineWidth:1,
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Coca Cola','Pepsi'],
    resize:true,
    lineColors:['#C14d9f','#2CB4AC','#2CB4AC']
  });

</script>
