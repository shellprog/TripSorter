<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/11/2017
 * Time: 7:06 PM
 */

namespace App\Transport\Interfaces;

/**
 * Interface BoardingCardInterface
 * @package App\Transport\Interfaces
 */
interface BoardingCardInterface
{

    /**
     * @return string
     */
    public function from(): string;

    /**
     * @return string
     */
    public function to(): string;

    /**
     * @return string
     */
    public function number(): string;

    /**
     * @return string
     */
    public function seat(): string;

}