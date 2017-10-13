<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/11/2017
 * Time: 8:53 PM
 */

namespace App\Transport;

use App\Transport\Interfaces\AirportBusBoardingCardInterface;

/**
 * This class acts as model for airport bus
 * Class AirportBusBoardingCard
 * @package App\Transport
 */
class AirportBusBoardingCard extends AbstractBoardingCard implements AirportBusBoardingCardInterface
{
    /**
     * AirportBusBoardingCard constructor.
     * @param $from string
     * @param $to string
     * @param $number string|null
     * @param $seat string|null
     *
     */
    public function __construct(string $from, string $to, ?string $number, ?string $seat)
    {
        $this->from = $from;
        $this->to = $to;
        $this->number = $number;
        $this->seat = $seat;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return "Take the airport bus " . (isset($this->number) ? $this->number : "") . " from {$this->from} to {$this->to}. " . (isset($this->seat) ? "Sit in seat {$this->seat}" : "No seat assignment");
    }
}