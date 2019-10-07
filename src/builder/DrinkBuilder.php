<?php

namespace Builder;

require_once 'src/model/entity/Coffee.php';
require_once 'src/model/entity/Tea.php';
require_once 'src/model/entity/Chocolate.php';

use Model\Entity\Coffee;
use Model\Entity\Tea;
use Model\Entity\Chocolate;

/**
 * Class DrinkBuilder
 */
class DrinkBuilder {

  /**
   * @var int
   */
  public $sugarLevel;

  /**
   * @var int
   */
  public $milkLevel;

  /**
   * @return Coffee
   */
  public function getCoffee(): Coffee
  {
    return new Coffee($this);
  }

  /**
   * @return Tea
   */
  public function getTea(): Tea
  {
    return new Tea($this);
  }

  /**
   * @return Chocolate
   */
  public function getChocolate(): Chocolate
  {
    return new Chocolate($this);
  }

  /**
   * @param int $sugarLevel
   * @return self
   */
  public function setSugarLevel($sugarLevel): self
  {
    $this->sugarLevel = $sugarLevel;
    return $this;
  }

  /**
   * @param int $milkLevel
   * @return self
   */
  public function setMilkLevel($milkLevel): self
  {
    $this->milkLevel = $milkLevel;
    return $this;
  }
}