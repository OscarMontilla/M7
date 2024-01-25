<?php

class Utils {
    const CHART_COLORS = array(
        'red' => 'rgb(255, 99, 132)',
        'blue' => 'rgb(54, 162, 235)'
    );

    public static function transparentize($color, $opacity) {
        // Convierte el color en formato rgb(a) a rgba y ajusta la opacidad
        list($r, $g, $b) = sscanf($color, "rgb(%d, %d, %d)");
        return "rgba($r, $g, $b, $opacity)";
    }

    public static function numbers($config) {
        // Genera un conjunto de números aleatorios dentro del rango especificado
        $count = $config['count'];
        $min = isset($config['min']) ? $config['min'] : 0;
        $max = isset($config['max']) ? $config['max'] : 100;
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand($min, $max);
        }
        return $numbers;
    }

    public static function months($config) {
        // Genera un conjunto de nombres de meses basados en el número especificado
        $count = $config['count'];
        $months = array();
        for ($i = 0; $i < $count; $i++) {
            $months[] = date('F', mktime(0, 0, 0, $i + 1, 1));
        }
        return $months;
    }

   
}
