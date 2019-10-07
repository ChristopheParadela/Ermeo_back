<?php

require_once 'src/model/entity/CoffeeMachine.php';
require_once 'src/model/consts/DrinkPriceConsts.php';

use Model\Entity\CoffeeMachine;
use Model\Consts\DrinkPriceConsts;

$coffeeMachine = new CoffeeMachine();

$amount = intval(readline("Please insert money \n > "));
$coffeeMachine->addAmount($amount);

while ($amount > 0) {
  $choice = readline(
    "What do you want ? ({$coffeeMachine->getAmount()}$) \n" .
    "[1] Coffee " . DrinkPriceConsts::COFFEE . "$ \n" .
    "[2] Tea " . DrinkPriceConsts::TEA . "$ \n" .
    "[3] Chocolate " . DrinkPriceConsts::CHOCOLATE . "$ \n" .
    "[other] Give back change \n " .
    "> " 
  );

  if (in_array($choice, [1, 2, 3])) {
    $sugarLevel = intval(readline("Sugar [0-4] \n > "));
    $milkLevel = intval(readline("Milk [0-4] \n > "));

    if ($coffeeMachine->isSugarLevelValid($sugarLevel) && $coffeeMachine->isMilkLevelValid($milkLevel)) {
      $coffeeMachine->setSugarLevel($sugarLevel);
      $coffeeMachine->setMilkLevel($milkLevel);

      switch ($choice) {
        case 1:
          $coffee = $coffeeMachine->getCoffee();

          if ($coffee) {
            echo "Your coffee is ready \n";
            print_r($coffee);
          }

          break;
        case 2:
          $tea = $coffeeMachine->getTea();

          if ($tea) {
            echo "Your tea is ready \n";
            print_r($tea);
          }

          break;
        case 3:
          $chocolate = $coffeeMachine->getChocolate();

          if ($chocolate) {
            echo "Your chocolate is ready \n";
            print_r($chocolate);
          }

          break;
      }
    }
  } else {
    echo "Your change: {$coffeeMachine->getAmount()}$, Bye !\n";
    $amount = $coffeeMachine->giveBackChange();
  }
}
