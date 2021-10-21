<?php

namespace App\Services\ProgramComponent\Interfaces;

interface ProgramModuleInterface
{
    /**
     * Get a content from each module.
     *
     * @return string
     */
    public function getContent(): string;
}
