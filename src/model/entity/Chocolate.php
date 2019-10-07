<?php

namespace Model\Entity;

require_once 'Drink.php';

use Model\Consts\DrinkPriceConsts;
use Builder\DrinkBuilder;

/**
 * Class Chocolate
 */
class Chocolate extends Drink {

  public function __construct(DrinkBuilder $drink)
  {
    $this->price = DrinkPriceConsts::CHOCOLATE;
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