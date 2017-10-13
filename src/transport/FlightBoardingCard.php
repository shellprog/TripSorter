<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/11/2017
 * Time: 8:53 PM
 */

namespace App\Transport;

use App\Transport\Interfaces\FlightBoardingCardInterface;

/**
 * This class acts as model for flight transport
 * Class FlightBoardingCard
 * @package App\Transport
 */
class FlightBoardingCard extends AbstractBoardingCard implements FlightBoardingCardInterface
{
    /**
     * Gate no for flight boarding
     * @var
     */
    public $gate;

    /**
     * Baggage counter no
     * @var
     */
    public $baggage;

    /**
     * FlightBoardingCard constructor.
     * @param $from string
     * @param $to string
     * @param $number string
     * @param $seat string
     * @param $gate string
     * @param $baggage string|null
     *
     */
    public function __construct(string $from, string $to, string $number, string $seat, string $gate, ?string $baggage)
    {
        $this->from = $from;
        $this->to = $to;
        $this->number = $number;
        $this->seat = $seat;
        $this->gate = $gate;
        $this->baggage = $baggage;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return "From {$this->from}, take flight {$this->number} to {$this->to}. Gate {$this->gate}, seat {$this->seat}. " . (isset($this->baggage) ? "Baggage drop at ticket counter {$this->baggage}" : "Baggage will we automatically transferred from your last leg");
    }
}