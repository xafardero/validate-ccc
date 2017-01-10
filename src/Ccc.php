<?php

namespace CccValidate;

/**
 * Class Ccc.
 *
 * Description
 *
 * @link 
 */
class Ccc
{
    /**
     * Ccc validation.
     *
     * @param mixed $entidad
     * @param mixed $oficina
     * @param mixed $control
     * @param mixed $numeroCuenta
     *
     * @return bool
     */
    public static function validate($entidad, $oficina, $control, $numeroCuenta)
    {
        $dc = '';
        $validations = array(6, 3, 7, 9, 10, 5, 8, 4, 2, 1);

        foreach (array($entidad . $oficina, $numeroCuenta) as $cadena) {
            $suma = 0;

            for ($i = 0, $len = strlen($cadena); $i < $len; $i++) {
                $suma += $validations[$i] * substr($cadena, $len - $i - 1, 1);
            }

            $digito = 11 - $suma % 11;

            if ($digito == 11) {
                $digito = 0;
            } elseif ($digito == 10) {
                $digito = 1;
            }

            $dc .= $digito;
        }

        return $control === $dc;
    }
}

