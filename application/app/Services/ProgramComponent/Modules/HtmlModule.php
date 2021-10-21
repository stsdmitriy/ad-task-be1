<?php

namespace App\Services\ProgramComponent\Modules;

use App\Services\ProgramComponent\Interfaces\ProgramModuleInterface;

class HtmlModule implements ProgramModuleInterface
{
    /**
     * Get a content from the module.
     *
     * @param string $moduleName
     *
     * @return string
     */
    public function getContent(string $moduleName): string
    {
        return '<div class="' . $moduleName . '"></div>' . PHP_EOL . PHP_EOL;
    }
}
