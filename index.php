<?php

declare(strict_types=1);

require_once("vendor/autoload.php");

use App\TripSorter;
use \App\Transport\{
    TrainBoardingCard, FlightBoardingCard, AirportBusBoardingCard, BusBoardingCard
};

$boardingCards = [
    new TrainBoardingCard("Madrid", "Barcelona", "78A", "45B"),
    new FlightBoardingCard("Gerona Airport", "Stockholm", "SK455", "3A", "45B", "344"),
    new FlightBoardingCard("Stockholm", "New York JFK", "SK22", "7B", "22", null),
    new AirportBusBoardingCard("Barcelona", "Gerona Airport", null, "3A")
];

$sorter = new TripSorter($boardingCards);

//Sort the given boarding cards
$sorter->sort();

//Print human understandable information
echo $sorter->getDescription();

