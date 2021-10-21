<?php

namespace App\Services\ProgramComponent;

use App\Services\ProgramComponent\Interfaces\BuilderInterface;

class ProgramBuilder implements BuilderInterface
{
    /**
     * Default number of program modules
     *
     * @var int
     */
    const DEFAULT_MODULES = 1;

    /**
     * Build the program.
     *
     * @return void
     */
    public function build()
    {
        //
    }
}
