<?php
require_once('observable.php');
require_once('abstract_widget.php');
require_once('Utils.php');

$dat = new DataSource(); 
$widget = new abstract_widget();
$dat->addObserver($widget);

$dat->addRecord('Dataset 1', Utils::numbers(array('count' => 7, 'min' => -100, 'max' => 100)), Utils::CHART_COLORS['red']);
$dat->addRecord('Dataset 2', Utils::numbers(array('count' => 7, 'min' => -100, 'max' => 100)), Utils::CHART_COLORS['blue']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js Line Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 800px; height: 400px;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('myChart');
        const config = <?php echo $widget->draw(); ?>;

        new Chart(ctx, config);
    </script>
</body>
</html>
