<?php

namespace App\Services\ProgramComponent\Components;

use App\Services\ProgramComponent\Interfaces\ProgramComponentInterface;
use App\Services\ProgramComponent\Modules\JsOnReadyModule;
use App\Services\ProgramComponent\Modules\JsOnViewableModule;

class JsComponent extends BaseComponent
{
    /**
     * @var string
     */
    const ON_READY_PLACEHOLDER = '%on-ready-content%';

    /**
     * @var string
     */
    const ON_VIEWABLE_PLACEHOLDER = '%on-ready-content%';

    /**
     * Filename.
     *
     * @var string
     */
    protected $filename = 'app.js';

    /**
     * Build component content.
     *
     * @return ProgramComponentInterface
     */
    public function build(): ProgramComponentInterface
    {
        $onReadyContent = '';
        $onViewableContent = '';

        for ($number = 1; $number <= $this->getNumberOfModules(); $number++) {
            $onReadyContent .= (new JsOnReadyModule())->getContent($this->getModuleFilename($number));
            $onViewableContent .= (new JsOnViewableModule())->getContent($this->getModuleFilename($number));
        }

        if($onReadyContent || $onViewableContent) {
            $placeholders = [
                self::ON_READY_PLACEHOLDER,
                self::ON_VIEWABLE_PLACEHOLDER,
            ];

            $placeholdersContent = [
                $onReadyContent,
                $onViewableContent,
            ];

            $this->setContent(str_replace($placeholders, $placeholdersContent, $this->getTemplate()));
        }

        return $this;
    }

    /**
     * Get the component template.
     *
     * @return string
     */
    public function getTemplate(): string
    {
        $onReadyPlaceholder = self::ON_READY_PLACEHOLDER;
        $onViewablePlaceholder = self::ON_VIEWABLE_PLACEHOLDER;

        return "
            function onReady() {
                {$onReadyPlaceholder}
            }

            function onViewable() {
                {$onViewablePlaceholder}
            }

            onReady()
            setTimeout(function() {
                onViewable()
            }, 500)
        ";
    }
}
