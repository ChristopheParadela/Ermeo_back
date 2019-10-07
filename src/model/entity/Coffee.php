<?php

namespace Model\Entity;

require_once 'Drink.php';

use Model\Consts\DrinkPriceConsts;
use Builder\DrinkBuilder;

/**
 * Class Coffee
 */
class Coffee extends Drink {

  public function __construct(DrinkBuilder $drink)
  {
    $this->price = DrinkPriceConsts::COFFEE;
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