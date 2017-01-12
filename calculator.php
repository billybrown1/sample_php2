<?php
class Calculator{
  
  public function add($numbers_to_add){
      $sum = 0;
      foreach($numbers_to_add as $num){
          $sum = $num + $sum;
      }
      return $sum;
  }

  public function subtract($x, $y){
      return $x - $y;
  }

  public function multiply($numbers_to_multiply){
      $product = 1;
      foreach($numbers_to_multiply as $num){
          $product = $num * $product;
      }
      return $product;
  }

  public function divide($x, $y){
    //BillyBrown @ 1-12-2017
    //Should NOT assume that $y will always be non-zero
    //Added assertEquals() to check if $y is non-zero, and display helpful message @ runtime if it is
      assert($y != 0, "*** function divide() *** Division of $x by $y would be undefined!");
      return $x / $y;
  }
}
?>
