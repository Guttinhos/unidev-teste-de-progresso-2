<?php

namespace App;

use Exception;

class BonusCalculator
{
    /**
     * Instruções:
     * 
     * - O bônus é calculado em cima do valor do salário do funcionário
     * - Para cada filho o funcionário tem seu bônus acrescido em 10% do seu salário
     * - Se o funcionário tiver mais de 3 filhos, o acrescimo de bônus deve ser aplicado apenas a 3 filhos.
     * - Funcionários com salário igual ou superior a R$ 10.000 não podem receber bônus
     * - Funcionários com salário de até R$ 2.000 devem receber 20% de bônus
     * - Funcionários com salário acima de 2.000 e abaixo de R$ 5.000 devem receber bônus de 10%
     * - Funcionários com salário acima de 5.000 e abaixo de R$ 10.000 devem receber bônus de 5%
     */

    /**
     * Deve retornar um valor numérico com o total de Bonus do funcionário
     */
    public static function calculate($salary, $totalChildren)
    {


        if (!is_numeric($salary) || !is_numeric($totalChildren) || $salary < 0 || $totalChildren < 0) {
            throw new Exception('Apenas valores numéricos são aceitos!');
        }

        if ($salary >= 10000) {
            $bonus =  0;
        }

        if ($salary < 10000 && $salary > 5000) {
            $bonus = $salary * 0.05;
        }

        if ($salary > 2000 && $salary <= 5000) {
            $bonus =  $salary * 0.10;
        }

        if ($salary <= 2000 && $salary > 0) {
            $bonus = $salary * 0.20;
        }


        if ($totalChildren <= 3 &&  $salary < 10000) {
            $bonusKid = $salary * $totalChildren * 0.10;
        } else if ($totalChildren > 3 &&  $salary < 10000) {
            $bonusKid =  $salary *  0.30;
        } else {
            $bonusKid = 0;
        }



        return $bonus + $bonusKid;
    }
}
