<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/11/2017
 * Time: 7:10 PM
 */

namespace App;
use App\Transport\Interfaces\BoardingCardInterface;

/**
 * Class TripSorter
 * @package App
 */

class TripSorter
{
    private $boardingCards;

    /**
     * TripSorter constructor.
     * @param array $boardingCards
     */
    public function __construct(array $boardingCards)
    {
        $this->boardingCards = $boardingCards;
    }

    /**
     * @return array
     */
    public function sort(): array
    {

        $sortedCards = [];

        //Get start and end from array
        $start = (array_values(array_diff(array_column((array)$this->boardingCards, "from"), array_column((array)$this->boardingCards, "to"))))[0];
        $end = (array_values(array_diff(array_column((array)$this->boardingCards, "to"), array_column((array)$this->boardingCards, "from"))))[0];

        $start_point = $start;

        for ($i = 0; $i < sizeof($this->boardingCards); $i++) {

            if(!($this->boardingCards[$i] instanceof BoardingCardInterface)){
                unset($this->boardingCards[$i]);
                continue;
            }

            $arr = array_filter($this->boardingCards, function ($v, $k) use ($start_point) {
                return $v->from == $start_point;
            }, ARRAY_FILTER_USE_BOTH);

            if (count($arr) > 0) {
                $card = array_values($arr)[0];

                $sortedCards[] = $card;

                if ($card->to != $end) {
                    $start_point = $card->to;
                } else {
                    break;
                }
            }
        }

        $this->boardingCards = $sortedCards;

        return $sortedCards;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        $str = "";

        for ($i = 0; $i < sizeof($this->boardingCards); $i++) {
            $str .= ($i + 1) . ". " . $this->boardingCards[$i]->getDescription() . PHP_EOL;
        }

        $str .= (sizeof($this->boardingCards) + 1) . ". You have arrived at your final destination.";

        return $str;
    }

}