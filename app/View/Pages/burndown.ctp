<?php
$project_points = $project[0]['Project']['points'];
$project_start = explode(' ',$project[0]['Project']['start_date']);
$project_date = explode('-',$project_start[0]);
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Points', {type: 'string' , role : 'tooltip'}],
            [new Date(<?php echo $project_date[0];?>,<?php echo $project_date[1];?>,<?php echo $project_date[2];?>), <?php echo $project_points;?>, "Initial state" ],
            <?php
            foreach ($burndown_data as &$data) {
                $project_points -= $data['Task']['points'];
                $dateTime = explode(' ',$data['Task']['date_completed']);
                $date = explode('-', $dateTime[0]);
                echo '[
                    new Date(' . $date[0] . ', ' . $date[1] . ',' . $date[2] . '),
                    ' . $project_points . ',
                    "-' . $data['Task']['points'] . ' points. \n ' . $data['Task']['name'] . '"],';
            }
            ?>
        ]);

        var options = {
            title: 'Burndown chart',
            hAxis: {
                title: 'Year',
                titleTextStyle: {color: '#333'},
                gridlines:{
                    color:'#333',
                    count:10
//                    units : {
//                        months : {
//                            format :
//                        }
//                    }
                }
            },
            vAxis: {title: 'Points',minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<div id="chart_div" style="width: 900px; height: 500px;"></div>
<h3>Points remaining: <?php echo $project_points;?></h3>