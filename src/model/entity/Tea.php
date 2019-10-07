<?php

namespace Model\Entity;

require_once 'Drink.php';

use Model\Consts\DrinkPriceConsts;
use Builder;

/**
 * Class Tea
 */
class Tea extends Drink {

  public function __construct(Builder\DrinkBuilder $drink)
  {
    $this->price = DrinkPriceConsts::TEA;
    $this->sugarLevel = $drink->sugarLevel;
    $this->milkLevel = $drink->milkLevel;
  }

  /**
   * @return int 
   */
  public function getCost(): int
  {
    return $this->price;
  }
}