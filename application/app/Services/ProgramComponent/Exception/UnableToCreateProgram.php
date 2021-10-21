<?php

namespace App\Services\ProgramComponent\Exception;

use Exception;

class UnableToCreateProgram extends Exception
{
    /**
     * @var int
     */
    const STATUS_CODE = 500;

    /**
     * @var string
     */
    const MESSAGE = 'Unable to create a program.';

    /**
     * @param string|null $message
     */
    public function __construct(string $message = null)
    {
        parent::__construct($message ?? self::MESSAGE, self::STATUS_CODE);
    }
}
