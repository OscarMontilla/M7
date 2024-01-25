<?php

require_once('Utils.php');

interface Observer {
    public function update(Observable $subject);
}

class abstract_widget implements Observer {
    private $internalData = array();

    public function update(Observable $subject){
        $this->internalData = $subject->getData();
    }

    public function draw() {
        $labels = Utils::months(array('count' => 7));
        $data = array(
            array(
                'label' => 'Dataset 1',
                'data' => Utils::numbers(array('count' => 7, 'min' => -100, 'max' => 100)),
                'borderColor' => Utils::CHART_COLORS['red'],
                'backgroundColor' => Utils::transparentize(Utils::CHART_COLORS['red'], 0.5)
            ),
            array(
                'label' => 'Dataset 2',
                'data' => Utils::numbers(array('count' => 7, 'min' => -100, 'max' => 100)),
                'borderColor' => Utils::CHART_COLORS['blue'],
                'backgroundColor' => Utils::transparentize(Utils::CHART_COLORS['blue'], 0.5)
            )
        );
    
        $config = array(
            'type' => 'line',
            'data' => array(
                'labels' => $labels,
                'datasets' => $data
            ),
            'options' => array(
                'responsive' => true,
                'plugins' => array(
                    'legend' => array(
                        'position' => 'top',
                    ),
                    'title' => array(
                        'display' => true,
                        'text' => 'Chart.js Line Chart'
                    )
                )
            )
        );
    
        return json_encode($config);
    }
    
}
