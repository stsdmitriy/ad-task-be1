<?php

namespace App\Services\ProgramComponent\Modules;

use App\Services\ProgramComponent\Interfaces\ProgramModuleInterface;

class CssModule implements ProgramModuleInterface
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
        $backgroundColor = $this->getRandomBackgroundColor();

        return "
            .{$moduleName} {
                background: {$backgroundColor};
                width: 100%;
                height: 200px;
                display: block;
            }
        " . PHP_EOL . PHP_EOL;
    }

    /**
     * Get a random background color for a module.
     *
     * @return string
     */
    private function getRandomBackgroundColor(): string
    {
        $colors = [
            '#000000',
            '#ffffff',
            '#003e9f',
            '#d61517',
            '#00a7bd',
            '#001070',
            '#a0210c',
        ];

        return $colors[array_rand($colors)];
    }
}
