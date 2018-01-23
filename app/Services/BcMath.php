<?php
/**
 * Created by PhpStorm.
 * User: pathfinder
 * Date: 24.01.18
 * Time: 1:09
 */

namespace App\Services;


use App\Interfaces\MathInterface;

class BcMath implements MathInterface
{
    private $bcSum;
    private $bcDiv;
    private $bcMul;
    private $bcSub;


    public function sum($a, $b)
    {
        return $this->bcSum = bcadd($a, $b);
    }

    public function div($a, $b)
    {
        return $this->bcDiv = bcadd($a, $b);
    }

    public function mul($a, $b)
    {
        return $this->bcMul = bcmul($a, $b);
    }

    public function sub($a, $b)
    {
        return $this->bcSub = bcsub($a, $b);
    }


}