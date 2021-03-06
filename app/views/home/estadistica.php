<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <div class="div-est-main">
        <div style="width: 33%;">
            <canvas id="myChart1" width="400" height="400"></canvas>
        </div>
        <div style="width: 33%;">
            <canvas id="myChart2" width="400" height="400"></canvas>
        </div>
        <div style="width: 33%;">
            <canvas id="myChart3" width="400" height="400"></canvas>
        </div>
        <div style="width: 33%;">
            <canvas id="myChart4" width="400" height="400"></canvas>
        </div>
    </div>

<?php for($i = 1; $i < 5; $i++){
    $labels = "";
    $datas = "";
    $nombreOrgano = "";
    foreach ($datos['votos'] as $voto)  :
        if($voto->id_organo == $i){
            $nombreOrgano = $voto->nombre_organo;
            $labels.= '"' . $voto->nombre_candidato . ' ' . $voto->apellido_candidato . '", ';
            $datas.= $voto->cantidad . ", ";
        }
    endforeach;
    foreach ($datos['votosBlancos'] as $voto)  :
        if($voto->organo == $i){
            $labels.= '"Blanco"';
            $datas.= $voto->cantidad;
        }
    endforeach;
    $script1 = "<script>
        var ctx = document.getElementById('myChart" . $i;
    $script2 = "');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [";
    $script3 = $labels . '],
                datasets: [{
                    label: "Votos de Organo ';
    $script4 = ' ", ';
    $script5 = "data: [" . $datas . "],";
    $script6 = "backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>";
    echo $script1 . $script2 . $script3 . $nombreOrgano . $script4 . $script5 . $script6;
}

?>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>