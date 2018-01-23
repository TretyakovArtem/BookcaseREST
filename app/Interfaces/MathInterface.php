<?php
/**
 * Created by PhpStorm.
 * User: pathfinder
 * Date: 24.01.18
 * Time: 1:06
 */

namespace App\Interfaces;


interface MathInterface
{
    public function sum($a, $b);
    public function sub($a, $b);
    public function mul($a, $b);
    public function div($a, $b);
}