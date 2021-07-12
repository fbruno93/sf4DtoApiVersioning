<?php

namespace App\Util;

use Nette\PhpGenerator\Printer;

class MyPrinter extends Printer
{
    protected $indentation = "\t";
    protected $linesBetweenProperties = 1;
    protected $linesBetweenMethods = 1;
    protected $returnTypeColon = ': ';
}
