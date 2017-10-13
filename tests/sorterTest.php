<?php

namespace Test;

require_once(__DIR__ . "/../vendor/autoload.php");

use App\Transport\Interfaces\BoardingCardInterface;
use App\TripSorter;
use PHPUnit\Framework\TestCase;

use \App\Transport\{
    TrainBoardingCard, FlightBoardingCard, AirportBusBoardingCard, BusBoardingCard
};

/**
 * Class sorterTest
 *
 */
class sorterTest extends TestCase
{
    /**
     * @var TripSorter
     */
    protected $sorter;

    public function setUp()
    {
        $boardingCards = [
            new TrainBoardingCard("Madrid", "Barcelona", "78A", "45B"),
            new FlightBoardingCard("Gerona Airport", "Stockholm", "SK455", "3A", "45B", "344"),
            new FlightBoardingCard("Stockholm", "New York JFK", "SK22", "7B", "22", null),
            new AirportBusBoardingCard("Barcelona", "Gerona Airport", null, "3A")
        ];

        $this->sorter = new TripSorter($boardingCards);
    }

    /**
     * @test
     */
    public function testSorterOutput()
    {
        $this->assertTrue(is_array($this->sorter->sort()));
        $this->assertTrue(is_string($this->sorter->getDescription()));
    }

    /**
     * @test
     */
    public function testStartingString()
    {
        $this->assertStringStartsWith("1. Take train 78A from Madrid to Barcelona. Sit in seat 45B", $this->sorter->getDescription());
    }

    /**
     * @test
     */
    public function testEndingString()
    {
        $this->assertStringEndsWith("5. You have arrived at your final destination.", $this->sorter->getDescription());
    }

    /**
     * @test
     */
    public function testInstanceOf()
    {
        $arr = $this->sorter->sort();

        foreach ($arr as $ar) {
            $this->assertTrue($ar instanceof BoardingCardInterface);
        }

    }

}