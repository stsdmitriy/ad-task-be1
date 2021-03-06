<?php

namespace App\Services\ProgramComponent\Modules;

use App\Services\ProgramComponent\Interfaces\ProgramModuleInterface;

class JsOnReadyModule implements ProgramModuleInterface
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
        return "console.log('onReady {$moduleName}');" . PHP_EOL;
    }
}
