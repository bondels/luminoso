<?php 
require('../../bdd/base.php');

header("Content-Type: text/html;charset=utf-8");

$sql="SELECT dato_nombre, dato_mail, dato_telefono, dato_fnac, dato_rut, dato_region, 
    CASE dato_nivel
        WHEN 1 THEN 'Basico'
        WHEN 2 THEN 'Intermedio'
        WHEN 3 THEN 'Avanzado'
    END as nivel,
    CASE dato_beneficio
        WHEN 1 THEN '15% Descuento'
        WHEN 2 THEN '2x1 Ticket'
        WHEN 3 THEN '20% Arriendo'
    END as beneficio, dato_comentario, dato_truco, dato_fecha
FROM datos
WHERE dato_comentario = 'valle nevado' 
ORDER BY dato_fecha";
$result = mysql_query($sql); 

$factual = date('Y-m-d');

header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=concursoMejorconNieveValleNevado".$factual.".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<html>
<head>
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1" class="display" id="tabla_lista_paises" style="margin-bottom: 40px;">
    <thead>
        <tr>
            <th style="text-align: left;">NOMBRE</th>
            <th style="text-align: left;">EMAIL</th>
            <th style="text-align: left;">TELEFONO</th>
            <th style="text-align: left;">F NACIMIENTO</th>
            <th style="text-align: left;">RUT</th>
            <th style="text-align: left;">REGION</th>
            <th style="text-align: left;">NIVEL SKY</th>
            <th style="text-align: left;">TRUCO</th>
            <th style="text-align: left;">BENEFICIO</th>
            <th style="text-align: left;">CENTRO SKY</th>
            <th style="text-align: left;">FECHA PARTICIPACION</th>
        </tr>
    </thead>
    <tbody>
    <?php while($reg=  mysql_fetch_array($result)){
                    
    ?>
    <tr>
        <td><?php echo $reg['dato_nombre']; ?></td>
        <td><?php echo $reg['dato_mail']; ?></td>
        <td><?php echo $reg['dato_telefono']; ?></td>
        <td><?php echo $reg['dato_fnac']; ?></td>
        <td><?php echo $reg['dato_rut']; ?></td>
        <td><?php echo $reg['dato_region']; ?></td>
        <td><?php echo $reg['nivel']; ?></td>
        <td><?php echo $reg['dato_truco']; ?></td>
        <td><?php echo $reg['beneficio']; ?></td>
        <td><?php echo $reg['dato_comentario']; ?></td>
        <td><?php echo $reg['dato_fecha']; ?></td>
    </tr>
    <?php }?>
    <tbody>
</table>
</body>
</html>