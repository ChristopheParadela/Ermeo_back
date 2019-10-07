<?php

namespace Model\Entity;

require_once 'src/model/consts/DrinkPriceConsts.php';
require_once 'src/builder/DrinkBuilder.php';

use Model\Consts\DrinkPriceConsts;
use Builder\DrinkBuilder;

/**
 * Class CoffeeMachine
 */
class CoffeeMachine {

  /**
   * @var int
   */
  private $amount;

  /**
   * @var int
   */
  private $sugarLevel;

  /**
   * @var int
   */
  private $milkLevel;

  public function __construct()
  {
    $this->amount = 0;
    $this->sugarLevel = 0;
    $this->milkLevel = 0;
  }

  /**
   * @return Coffee|null 
   */
  public function getCoffee(): ?Coffee
  {
    if ($this->amount >= DrinkPriceConsts::COFFEE) {
      $this->amount -= DrinkPriceConsts::COFFEE;

      return (new DrinkBuilder())
              ->setSugarLevel($this->sugarLevel)
              ->setMilkLevel($this->milkLevel)
              ->getCoffee();
    }

    return null;
  }

  /**
   * @return Tea|null 
   */
  public function getTea(): ?Tea
  {
    if ($this->amount >= DrinkPriceConsts::TEA) {
      $this->amount -= DrinkPriceConsts::TEA;
      return (new DrinkBuilder())
              ->setSugarLevel($this->sugarLevel)
              ->setMilkLevel($this->milkLevel)
              ->getTea();
    }

    return null;
  }

  /**
   * @return Chocolate|null 
   */
  public function getChocolate(): ?Chocolate
  {
    if ($this->amount >= DrinkPriceConsts::CHOCOLATE) {
      $this->amount -= DrinkPriceConsts::CHOCOLATE;
      return (new DrinkBuilder())
              ->setSugarLevel($this->sugarLevel)
              ->setMilkLevel($this->milkLevel)
              ->getChocolate();
    }

    return null;
  }

  /**
   * @param int $level
   * @return bool
   */
  public function isSugarLevelValid(int $level): bool {
    return $level >= 0 && $level <= 4;
  }

  /**
   * @param int $level
   * @return bool
   */
  public function isMilkLevelValid(int $level): bool {
    return $level >= 0 && $level <= 4;
  }

  /**
   * @return int 
   */
  public function giveBackChange(): int
  {
    return $this->amount = 0;
  }

  /**
   * @param int $amount
   * @return self 
   */
  public function addAmount(int $amount): self
  {
    $this->amount += $amount;
    return $this;
  }

  /**
   * @param int $level
   * @return self 
   */
  public function setSugarLevel(int $level): self
  {
    $this->sugarLevel = $level;
    return $this;
  }

  /**
   * @param int $level
   * @return self 
   */
  public function setMilkLevel(int $level): self
  {
    $this->milkLevel = $level;
    return $this;
  }

  /**
   * @return int 
   */
  public function getAmount(): int
  {
    return $this->amount;
  }
}