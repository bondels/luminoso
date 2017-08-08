<?php
error_reporting( error_reporting() & ~E_NOTICE );
require('../../bdd/base.php');
//Carga de caja ultimos participantes
date_default_timezone_set('America/Los_Angeles');

$fecha =date("Y-m-d");

$sqlUltimos ="select * from datos where dato_comentario = 'valle nevado' ORDER BY dato_id DESC limit 10 ";
$ultimos  = mysql_query($sqlUltimos);

//Cuenta Descuentos

$sqlDescuento ="
SELECT COUNT(dato_beneficio) as cantidad, 
CASE dato_beneficio
        WHEN 1 THEN '15% Descuento'
        WHEN 2 THEN '2x1 Ticket'
        WHEN 3 THEN '20% Arriendo'
    END as beneficio
FROM datos
WHERE dato_comentario = 'valle nevado'
GROUP BY dato_beneficio
ORDER BY dato_beneficio";

$datoDescuento = mysql_query($sqlDescuento);


//Datos nivel de Sky
$sqlNivel = "
SELECT COUNT(dato_nivel) as cant, 
CASE dato_nivel
        WHEN 1 THEN 'Basico'
        WHEN 2 THEN 'Intermedio'
        WHEN 3 THEN 'Avanzado'
    END as nivel
FROM datos
WHERE dato_comentario = 'valle nevado'
GROUP BY dato_nivel
ORDER BY dato_nivel";



$datoNivel = mysql_query($sqlNivel);


/*Dato de regiones*/
$sqlRegion="
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
WHERE dato_comentario = 'valle nevado'
GROUP BY dato_region
ORDER BY dato_region";

$datoRegion = mysql_query($sqlRegion);

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
                    <h1 class="page-header">Dashboard Entel Nieve Valle Nevado</h1>
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
                                <a href="baseValle.php">Descargar Base Valle Nevado</a>
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
                <div class="col-md-12">
                    <div class="col-md-4"> <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
                    </div>
                </div></div>
                    <div class="col-md-4"> <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="chartdiv1" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
                    </div>
                </div></div>
                    <div class="col-md-4"> <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="chartdiv2" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
                    </div>
                </div></div>
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
                    "rotate": true,
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
                            "labelText": "[[value]]",
                            "title": "graph 1",
                            "type": "column",
                            "valueField": "column-1"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": ""
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "legend": {
                        "enabled": false,
                        "useGraphSettings": false
                    },
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Dato de Regiones"
                        }
                    ],
                    "dataProvider": [
                       <?php while($regRegion = mysql_fetch_array($datoRegion)){?>
                            {
                        
                            "category": "<?php echo $regRegion['region']; ?>",
                            "column-1": "<?php echo $regRegion['cantRegion']; ?>",
                            },
                        <?php }?>
                    ]
                }
            );
        </script>
   
        <!-- amCharts javascript code -->
        <script type="text/javascript">
            AmCharts.makeChart("chartdiv1",
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
                            "valueField": "column-1",
                            "fillColors": "#0066a1",
                            "lineColor": "#0066a1",
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
                            "text": "Beneficios Requeridos"
                        }
                    ],
                    "dataProvider": [
                        <?php while($regDescuento = mysql_fetch_array($datoDescuento)){?>
                            {
                        
                            "category": "<?php echo $regDescuento['beneficio']; ?>",
                            "column-1": "<?php echo $regDescuento['cantidad']; ?>",
                            },
                        <?php }?>    
                    ]
                }
            );
        </script>

         <!-- amCharts javascript code -->
        <script type="text/javascript">
            AmCharts.makeChart("chartdiv2",
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
                            "valueField": "column-1",
                            "fillColors": "#28b128",
                            "lineColor": "#28b128"
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
                            "text": "Nivel de Sky"
                        }
                    ],
                    "dataProvider": [
                        <?php while($regNivele = mysql_fetch_array($datoNivel)){?>
                            {
                        
                            "category": "<?php echo $regNivele['nivel']; ?>",
                            "column-1": "<?php echo $regNivele['cant']; ?>",
                            },
                        <?php }?>    
                    ]
                }
            );
        </script>
</body>

</html>
