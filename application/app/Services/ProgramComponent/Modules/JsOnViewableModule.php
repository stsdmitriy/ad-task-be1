<?php

namespace App\Services\ProgramComponent\Modules;

use App\Services\ProgramComponent\Interfaces\ProgramModuleInterface;

class JsOnViewableModule implements ProgramModuleInterface
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
        return "console.log('onViewable {$moduleName}');" . PHP_EOL;
    }
}
