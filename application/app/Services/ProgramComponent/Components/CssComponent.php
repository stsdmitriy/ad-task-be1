<?php

namespace App\Services\ProgramComponent\Components;

use App\Services\ProgramComponent\Interfaces\ProgramComponentInterface;
use App\Services\ProgramComponent\Modules\CssModule;

class CssComponent extends BaseComponent
{
    /**
     * Filename.
     *
     * @var string
     */
    protected $filename = 'app.css';

    /**
     * Build component content.
     *
     * @return ProgramComponentInterface
     */
    public function build(): ProgramComponentInterface
    {
        $cssContent = '';

        for ($number = 1; $number <= $this->getNumberOfModules(); $number++) {
            $cssContent .= (new CssModule())->getContent($this->getModuleFilename($number));
        }

        if($cssContent) {
            $this->setContent($cssContent);
        }

        return $this;
    }
}
