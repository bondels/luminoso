<?php
error_reporting( error_reporting() & ~E_NOTICE );
require('../../bdd/base.php');
//Carga de caja ultimos participantes
date_default_timezone_set('America/Los_Angeles');

$fecha =date("Y-m-d");

$sqlUltimos ='select * from datos ORDER BY dato_id DESC limit 10 ';

$ultimos  = mysql_query($sqlUltimos);

//Valle Nevado
$sqlTodos="select COUNT(*) as valle from datos where dato_comentario = 'valle nevado'";
$todos  = mysql_query($sqlTodos);
$regTodos = mysql_fetch_array($todos);

//El Colorado
$sqlAprueba ="select COUNT(*) as colorado from datos where dato_comentario = 'el colorado'";
$aprueba  = mysql_query($sqlAprueba);
$regAprueba = mysql_fetch_array($aprueba);

//Nevados de Chillan
$sqlDesaprueba ="select COUNT(*) as chillan from datos where dato_comentario = 'nevados de chillan'";
$desaprueba  = mysql_query($sqlDesaprueba);
$regdesaprueba = mysql_fetch_array($desaprueba);

if (isset($_POST['id_tip'])) {

    $id_tip = $_POST['id_tip']; 
    $aprueba = $_POST['aprueba'];

    $sqlAprueba="update tips set aprueba_tip = $aprueba where id_tip = $id_tip";   
    $resultCupon = mysql_query($sqlAprueba)or die ("Problema en la Query");

echo '<meta http-equiv="refresh" content="1;URL=index.php" />';
}



/*Dato de regiones*/
$sqlRegiones="
SELECT COUNT(dato_region) as cantRegion, 
CASE dato_region
        WHEN 0 THEN 'Sin Region'
        WHEN 1 THEN 'Arica y Parinacota'
        WHEN 2 THEN 'Tarapacá'
        WHEN 3 THEN 'Antofagasta'
        WHEN 4 THEN 'Atacama'
        WHEN 5 THEN 'Coquimbo'
        WHEN 6 THEN 'Valparaiso'
        WHEN 7 THEN 'Metropolitana'
        WHEN 8 THEN 'OHiggins'
        WHEN 9 THEN 'Maule'
        WHEN 10 THEN 'Biobío'
        WHEN 11 THEN 'La Araucanía'
        WHEN 12 THEN 'Los Ríos'
        WHEN 13 THEN 'Los Lagos'
        WHEN 14 THEN 'Aisén'
        WHEN 15 THEN 'Magallanes'
    END as region
FROM datos
GROUP BY dato_region
ORDER BY dato_region";

$datoRegiones = mysql_query($sqlRegiones);


?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php';?>

<body>

    <div id="wrapper">
        <?php include 'menu.php';?>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard Entel Nieve</h1>
                </div>
    
            </div>

            <div class="row">
                <?php include 'detalle.php';?>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Ultimos 10 Inscritos
                            <div class="pull-right">
                                <a href="index.php"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th>ID</th>
                                          <th>Nombre</th>
                                          <th>Email</th>
                                          <th>RUT</th>
                                          <th>Teléfono</th>
                                          <th>Región</th>
                                          <th>Nivel Sky</th>
                                          <th>Beneficio</th>
                                          <th>Centro Sky</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php while($regUltimos = mysql_fetch_array($ultimos)){ ?>
                                        <tr>
                                          <td><?php echo $regUltimos['dato_id'];?></td>
                                          <td><?php echo $regUltimos['dato_nombre'];?></td>
                                          <td><?php echo $regUltimos['dato_mail'];?></td>
                                          <td><?php echo $regUltimos['dato_rut'];?></td>
                                          <td><?php echo $regUltimos['dato_telefono'];?></td>
                                          <td><?php echo $regUltimos['dato_region'];?></td>
                                          <td><?php echo $regUltimos['dato_nivel'];?></td>
                                          <td><?php echo $regUltimos['dato_beneficio'];?></td>
                                          <td><?php echo $regUltimos['dato_comentario'];?></td>
                                        </tr>
                                        <?php } ?>
                                      </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
                    </div>
                </div>
            </div>

        </div>
  </div>

   <?php include 'footer.php';?>

    <!-- amCharts javascript code -->
        <script type="text/javascript">
            AmCharts.makeChart("chartdiv",
                {
                    "type": "serial",
                    "categoryField": "category",
                    "startDuration": 1,
                    "categoryAxis": {
                        "gridPosition": "start"
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-1",
                            "title": "Datos",
                            "type": "column",
                            "valueField": "column-1"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [],
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Datos totales por Regiones"
                        }
                    ],
                    "dataProvider": [
                         <?php while($regRegiones = mysql_fetch_array($datoRegiones)){?>
                            {
                        
                            "category": "<?php echo $regRegiones['region']; ?>",
                            "column-1": "<?php echo $regRegiones['cantRegion']; ?>",
                            },
                        <?php }?>
                    ]
                }
            );
        </script>
</body>

</html>
