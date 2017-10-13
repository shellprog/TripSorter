<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/11/2017
 * Time: 8:54 PM
 */

namespace App\Transport;

use App\Transport\Interfaces\BoardingCardInterface;

/**
 * Class AbstractBoardingCard
 * @package App\Transport
 */
abstract class AbstractBoardingCard implements BoardingCardInterface
{

    /**
     * Journey starts from
     * @var
     */
    public $from;

    /**
     * Journey ends to
     * @var
     */
    public $to;

    /**
     * Identifier for transport like, flight no, bus no etc
     * @var
     */
    public $number;


    /**
     * Seat no
     * @var
     */
    public $seat;

    /**
     * @return string
     */
    public function from(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function to(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function number(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function seat(): string
    {
        return $this->seat;
    }

}