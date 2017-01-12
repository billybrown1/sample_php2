Requirement:
============
php and phpunit

Versions:
=========
   php -v
   PHP 7.0.12 (cli) (built: Nov  1 2016 10:21:11) ( NTS )
   Copyright (c) 1997-2016 The PHP Group
   Zend Engine v3.0.0, Copyright (c) 1998-2016 Zend Technologies
       with Zend OPcache v7.0.12, Copyright (c) 1999-2016, by Zend Technologies
       with Xdebug v2.4.1, Copyright (c) 2002-2016, by Derick Rethans

   phpunit --version
   PHPUnit 5.7.5 by Sebastian Bergmann and contributors.


Make testresults directory:
===========================
   cd ~/GitHub/autolotto-calculator/sample_php
   mkdir -p shippable/testresults

Run the tests:
==============
   cd ~/GitHub/autolotto-calculator/sample_php
   phpunit tests/calculator_test.php --log-junit "shippable/testresults/log.junit.xml"

Sample output:
==============
PHPUnit 5.7.5 by Sebastian Bergmann and contributors.

...E                                                                4 / 4 (100%)

Time: 76 ms, Memory: 10.00MB

There was 1 error:

1) CalculatorTest::testDivide
assert(): *** function divide() *** Division of 8 by 0 would be undefined! failed

/Users/billybrown/GitHub/autolotto-calculator/sample_php/calculator.php:28
/Users/billybrown/GitHub/autolotto-calculator/sample_php/tests/calculator_test.php:128

ERRORS!
Tests: 4, Assertions: 19, Errors: 1.
