<?php

use CccValidate\Ccc;

/**
 * Ccc validator test.
 *
 * @link 
 *
 * Pattern:
 * EEEE OOOO DC CCCCCCCCCC
 */
class CccTest extends PHPUnit_Framework_TestCase
{
    public function testCorrectCcc()
    {
        $entidad = '2100';
        $oficina = '3000';
        $cuenta = '2103991515';
        $dc = '12';

        $this->assertEquals(true, Ccc::validate($entidad, $oficina, $dc, $cuenta));
    }

    public function testWrongCcc()
    {
        $entidad = '16350';
        $oficina = '7823';
        $cuenta = '7081002373';
        $dc = '47';

        $this->assertEquals(false, Ccc::validate($entidad, $oficina, $dc, $cuenta));
    }
}
