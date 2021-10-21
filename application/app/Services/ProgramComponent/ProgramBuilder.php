<?php

namespace App\Services\ProgramComponent;

use App\Services\ProgramComponent\Components\CssComponent;
use App\Services\ProgramComponent\Components\HtmlComponent;
use App\Services\ProgramComponent\Components\JsComponent;
use App\Services\ProgramComponent\Interfaces\BuilderInterface;

class ProgramBuilder implements BuilderInterface
{
    /**
     * Number of program modules.
     *
     * @var int
     */
    protected $modules;

    /**
     * Build the program.
     *
     * @return void
     */
    public function build()
    {
        $folder = $this->getProgramFolderPath();

        $jsFilename = (new JsComponent(
            $folder, $this->modules
        ))->build()->save();

        $cssFilename = (new CssComponent(
            $folder, $this->modules
        ))->build()->save();

        (new HtmlComponent(
            $folder, $this->modules
        ))->setCssFilename($cssFilename)
            ->setJsFilename($jsFilename)
            ->build()
            ->save();
    }

    /**
     * Set the number of modules.
     *
     * @param int $number
     *
     * @return ProgramBuilder
     */
    public function forModules(int $number): ProgramBuilder
    {
        $this->modules = $number;

        return $this;
    }

    /**
     * @return string
     */
    private function getProgramFolderPath(): string
    {
        return 'public' . DIRECTORY_SEPARATOR . 'ProgramOutput';
    }
}
