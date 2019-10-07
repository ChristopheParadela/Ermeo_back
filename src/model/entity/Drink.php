<?php

namespace Model\Entity;

/**
 * Class Drink
 */
class Drink {
  /**
   * @var int
   */
  protected $price;

  /**
   * @var int
   */
  protected $sugarLevel;

  /**
   * @var int
   */
  protected $milkLevel;

  /**
   * @return int 
   */
  protected function getCost(): int
  {
    return $this->price;
  }
}