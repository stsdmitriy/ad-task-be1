<?php

namespace App\Services\ProgramComponent\Interfaces;

interface ProgramModuleInterface
{
    /**
     * Get a content from the module.
     *
     * @param string $moduleName
     *
     * @return string
     */
    public function getContent(string $moduleName): string;
}
