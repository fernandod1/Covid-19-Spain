<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Covid-19 daily report in Spain</title>
  </head>
  <body><div class="container"><a name=up></a>
    <h1>Covid-19 reporte diario en España / Covid-19 daily report in Spain</h1>

<?php
include_once 'ApiCovidClass.php';
include_once 'ColourLabelClass.php';  
$api = new ApiCovidClass();
$data = $api->getApiData();
$label = new ColourLabelClass();

$timestamp = filemtime(__FILE__);
print('Última actualización/Last updated: '.date('d-m-Y'));
  
print('<ul class="list-inline"><a name=up></a><li class="list-inline-item"><a href="#España"><b>España</b></a> | ');
for ($i=0;$i<sizeof($data)-1;$i++){
    print('<li class="list-inline-item"><a href="#'.$data[$i]["comunidad_autonoma"].'">'.$data[$i]["comunidad_autonoma"].'</a> | </li>');
}
print('</ul>');

print('<div class="row"><ul class="list-group">');
for ($i=0;$i<sizeof($data);$i++){
    print('<div class="col-lg"><h2>');
    print('<a name='.$data[$i]["comunidad_autonoma"].'></a>'.$data[$i]["comunidad_autonoma"]);
    print('</h2>');
    print('<li class="list-group-item-secondary list-group-item d-flex justify-content-between align-items-center"><b>EVOLUCIÓN DE CASOS</b></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-exclamation-triangle"></i> Nivel de riesgo: <span class="badge bg-'.$label->getColourRisk($data[$i]["evaluacion_de_riesgo"]).' rounded-pill">'.$data[$i]["evaluacion_de_riesgo"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-users"></i> Casos totales: <span class="badge bg-primary rounded-pill">'.$data[$i]["casos_totales"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-user-plus"></i> Nuevos &uacute;ltimas 24 horas: <span class="badge bg-primary rounded-pill">'.$data[$i]["diagnosticados_ultimas_24_horas"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-user-plus"></i> Nuevos &uacute;ltimos 7 d&iacute;as: <span class="badge bg-primary rounded-pill">'.$data[$i]["diagnosticados_ultimos_7_dias"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-chart-bar"></i> Incidencia acumulada 7 d&iacute;as: <span class="badge bg-primary rounded-pill">'.$data[$i]["ia_7_dias"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-chart-bar"></i> Incidencia acumulada 14 d&iacute;as: <span class="badge bg-primary rounded-pill">'.$data[$i]["ia"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-chart-line"></i> Variaci&oacute;n IA: <span class="badge bg-'.$label->getColourIA($data[$i]["VARIACIÓN IA "]).' rounded-pill">'.$data[$i]["variacion_ia"].'</span></li>');
    print('<li class="list-group-item-secondary list-group-item d-flex justify-content-between align-items-center"><b>FALLECIMIENTOS</b></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-grip-lines"></i> Fallecidos: <span class="badge bg-primary rounded-pill">'.$data[$i]["fallecidos"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-grip-lines"></i> Incremento fallecidos: <span class="badge bg-'.$label->getColourPassedAway($data[$i]["incremento_fallecidos"]).' rounded-pill">'.$data[$i]["incremento_fallecidos"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-grip-lines"></i> Fallecidos &uacute;ltimos 7 d&iacute;as: <span class="badge bg-primary rounded-pill">'.$data[$i]["fallecidos_ultimos_7_dias"].'</span></li>');
    print('<li class="list-group-item-secondary list-group-item d-flex justify-content-between align-items-center"><b>CARGA HOSPITALARIA</b></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-hospital-user"></i> Hospitalizados: <span align=right class="badge bg-primary rounded-pill">'.$data[$i]["hospitalizados"].' <span class="badge bg-primary bg-light text-dark rounded-pill">'.$data[$i]["por_hospitalizados"].'</span></span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-procedures"></i> UCI: <span class="badge bg-primary rounded-pill">'.$data[$i]["uci"].' <span class="badge bg-light text-dark rounded-pill">'.$data[$i]["por_uci"].'</span></span></li>');
    print('<li class="list-group-item-secondary list-group-item d-flex justify-content-between align-items-center"><b>PRUEBAS DIAGNÓSTICAS</b></li>');

    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-stethoscope"></i> Pruebas &uacute;ltimos 7 d&iacute;as: <span class="badge bg-primary rounded-pill">'.$data[$i]["pcr_ultima_semana"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-bacteria"></i> Pruebas/100.000 hab.: <span class="badge bg-primary rounded-pill">'.$data[$i]["pcr_100000_hab"].'</span></li>');
    print('<li class="list-group-item d-flex justify-content-between align-items-center"><i class="fas fa-lungs-virus"></i> Positividad: <span class="badge bg-primary rounded-pill">'.$data[$i]["por_positividad"].'</span></li>');
    print('<br><div align=center><a href=#up><b><i class="fas fa-arrow-up"></i> Subir</b></a></div><hr><br></div>');
}

print('</ul></div>');


?>


<br>v1.0 script creado por <a href="https://www.fernando.info">Fernando</a> con datos recopilados cada 24 horas desde el 
<a href=https://www.mscbs.gob.es/profesionales/saludPublica/ccayes/alertasActual/nCov/situacionActual.htm>Ministerio de Sanidad</a>.
<br><br><br><br><br><br>
</div>
</body>
</html>
