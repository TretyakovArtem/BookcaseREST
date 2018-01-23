<?php
/**
 * Created by PhpStorm.
 * User: pathfinder
 * Date: 24.01.18
 * Time: 1:05
 */

namespace App\Http\Controllers;


use App\Services\BcMath;

class DI
{
    /**
     * @Inject
     * @var FormFactoryInterface
     */
    private $formFactory;



    public function createForm(BcMath $bcMath)
    {
        $a = 7;
        $b = 8;
        $c = 10;
        $arguments = [$a, $b, $c];

        $this->formFactory = $bcMath->summator($arguments);

        return $this->formFactory;
    }
}