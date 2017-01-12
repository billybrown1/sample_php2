<?php
require_once('calculator.php'); //our calculator class which we will creater later.
class CalculatorTest extends PHPUnit_Framework_TestCase{
  
  //test if the add() method in our calculator class
  //actually returns the sum that
  //were expecting
  public function testAdd(){
      $calc = new Calculator();
      $sum = $calc->add(array(2,3,4,5));
      $this->assertEquals(14, $sum); //check if 2+3+4+5 is equal to 14

  //BillyBrown @ 1-12-2017
  //test if the add() method in our calculator class works if passed only a single number
      $calc = new Calculator();
      $sum = $calc->add(array(7));
      $this->assertEquals(7, $sum); //check if 7 summed by itself is equal to 7

  //BillyBrown @ 1-12-2017
  //test if the add() method in our calculator class works if passed 0 as one of the numbers to be summed
      $calc = new Calculator();
      $sum = $calc->add(array(1,2,3,0,4));
      $this->assertEquals(10, $sum); //check if summed is equal to 10

  //BillyBrown @ 1-12-2017
  //test if the add() method in our calculator class works summing non-integers producing an integer result
      $calc = new Calculator();
      $sum = $calc->add(array(1.5,2.3,3.2));
      $this->assertEquals(7, $sum); //check if summed is equal to 7

  //BillyBrown @ 1-12-2017
  //test if the add() method in our calculator class works summing non-integers producing a non-integer result
      $calc = new Calculator();
      $sum = $calc->add(array(1.2,2.3,3.4,4.5));
      $this->assertEquals(11.4, $sum); //check if summed is equal to 11.4

  //BillyBrown @ 1-12-2017
  //test if the add() method in our calculator class works if a negative number passed as one of the numbers to be summed
      $calc = new Calculator();
      $sum = $calc->add(array(2,4,6,-8,10,12));
      $this->assertEquals(26, $sum); //check if summed is equal to 26

  //BillyBrown @ 1-12-2017
  //test if the add() method in our calculator class works if can accept a large array of numbers (ie. 256 '1's summed) to be summed
      $calc = new Calculator();
      $sum = $calc->add(array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1));
      $this->assertEquals(256, $sum); //check if summed is equal to 256

  }

  //test if the subtract() method in our calculator class
  //actually returns the difference that
  //were expecting
  public function testSubtract(){
      $calc = new Calculator();
      $difference = $calc->subtract(5,2);
      $this->assertEquals(3, $difference); //check if 5 - 2 is equal to 3

  //BillyBrown @ 1-12-2017
  //test if accidentally passing a negative number in for the second parameter produces a double-negative, acting as an addition
      $difference = $calc->subtract(11,-4);
      $this->assertEquals(15, $difference); //check result of 11 -(-4) is equal to.  Should be 15

  //BillyBrown @ 1-12-2017
  //test if subtract() class able to work with floating-point numbers
      $difference = $calc->subtract(6.789,0.789);
      $this->assertEquals(6, $difference); //check result of 6.789 - 0.789.  Should be equal to 6

  //BillyBrown @ 1-12-2017
  //test if able to handle both numbers being negative
      $difference = $calc->subtract(-7,-3);
      $this->assertEquals(-4, $difference); //check result of -7 -(-3) is equal to.  Should be -4

  //BillyBrown @ 1-12-2017
  //test if able to handle subtracting of 0 from a positive number.
      $difference = $calc->subtract(256,0);
      $this->assertEquals(256, $difference); //check result of 256 - 0 is equal to.  Should be 256

  //BillyBrown @ 1-12-2017
  //test if able to handle the largest 32-bit unsigned integer -1
      $difference = $calc->subtract(4294967296,1);
      $this->assertEquals(4294967295, $difference); //check result of 4294967296 - 1 is equal to 4294967295

  //BillyBrown @ 1-12-2017
  //test if able to handle the largest 32-bit unsigned integer -(-1), which would overflow into a 33-bit positive value
      $difference = $calc->subtract(4294967296,-1);
      $this->assertEquals(4294967297, $difference); //check result of 4294967296 -(-1) is equal to 4294967297

  //BillyBrown @ 1-12-2017
  //test if able to handle 2^63-bit unsigned integer and subtract 2
  // 9223372036854775808 - 2 should NOT == 9223372036854775808, but rather 9223372036854775806
  // However, it appears that the following call to subtract() not only returns the wrong number but the assert does NOT get triggered either!
      $difference = $calc->subtract(9223372036854775808,2);
  // **** THE FOLLOWING ASSERT SHOULD FAIL... but it does NOT!
      $this->assertEquals(9223372036854775808, $difference); //check result of 9223372036854775808 - 2 SHOULD equal to 9223372036854775806, not the asserted 9223372036854775808

  }

  //test if the multiply() method in our calculator class
  //actually returns the product that
  //were expecting   
  public function testMultiply(){
      $calc = new Calculator();
      $product = $calc->multiply(array(1,3,5,6));
      $this->assertEquals(90, $product); //check if 1*3*5*6 is equal to 90

  //BillyBrown @ 1-12-2017
  //test if multiply class correctly returns a zero if any of the values passed in the array is a zero
      $product = $calc->multiply(array(2,4,0,8));
      $this->assertEquals(0, $product); //check if 2*4*0*8 is equal to 0

  //BillyBrown @ 1-12-2017
  //test if multiply class correctly returns a negative product if an ODD (3) number of negative values were passed in
      $product = $calc->multiply(array(3,-6,9,-12,15,-18));
      $this->assertEquals(-524880, $product); //check if 3*(-6)*9*(-12)*15*(-18) is equal to -524880

  //BillyBrown @ 1-12-2017
  //test if multiply class correctly returns a positive product if an EVEN (4) number of negative values were passed in
      $product = $calc->multiply(array(1,-2,3,-4,5,-6,7,-8,9));
      $this->assertEquals(362880, $product); //check if 1*(-2)*3*(-4)*5*(-6)*7*(-8)*9 is equal to 362880

  }

  //test if the divide() method in our calculator class
  //actually returns the quotient that
  //were expecting   
  public function testDivide(){
      $calc = new Calculator();
      $quotient = $calc->divide(10,2);
      $this->assertEquals(5, $quotient); //check if 10/2 is equal to 5

  //BillyBrown @ 1-12-2017
  //test if divide() is able to return a floating-point (non-integer) result
      $quotient = $calc->divide(11,5);   // 11 divide by 5 should return a rational floating point value of 2.2
      $this->assertEquals(2.2, $quotient); //check returned result of 11 / 5 should equal 2.2

  //BillyBrown @ 1-12-2017
  //test if divide() is able to return a rounded irrational floating-point (non-integer) result
      $quotient = $calc->divide(22,7);   // 22 divide by 7 is a really poor approximation of PI (3.1428571428571428...)
      $this->assertEquals(3.1428571428571428, $quotient); //check returned result of an irrational number gets rounded

  //BillyBrown @ 1-12-2017
  //test if divide() class properly catches @ run-time an invalid operation attempt such 2nd parameter passed is a zero (0)
      $quotient = $calc->divide(8,0);
      $this->assertEquals(0, $quotient); //check if 8/0 should produce an error since it division by zero is "undefined"

  }
}
?>
