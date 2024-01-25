<?php

require_once('observable.php');
require_once('abstract_widget.php');

$dat = new dataSource(); 

$widgetAnimals = new MenuAnimals();
$widgetNames= new MenuNames();
$widgetThings = new MenuThings();
$widgetMovies = new MenuMovies();

$dat->addObserver($widgetAnimals);
$dat->addObserver($widgetNames);
$dat->addObserver($widgetThings);
$dat->addObserver($widgetMovies);

$dat->addRecord('cat','Kevin','bench','Godzilla');
$dat->addRecord('dog','Jim','pizza','Man on Wire');
$dat->addRecord('horse','Andy','Honda CB125','Spirited Away');
$dat->addRecord('cow','','space','Interstellar');
$dat->addRecord('','','black matter','');
$dat->addRecord('','','apple','');
$dat->addRecord('','','philodendron',' ');
$dat->addRecord('','','liver','');
$dat->addRecord('','','brass','');


$widgetAnimals->draw();

$widgetNames->draw();

$widgetThings->draw();

$widgetMovies->draw();