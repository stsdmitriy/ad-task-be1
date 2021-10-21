<?php

namespace App\Services\ProgramComponent\Components;

use App\Services\ProgramComponent\Interfaces\ProgramComponentInterface;
use App\Services\ProgramComponent\Modules\HtmlModule;

class HtmlComponent extends BaseComponent
{
    /**
     * @var string
     */
    const JS_FILE_PLACEHOLDER = '%js-file%';

    /**
     * @var string
     */
    const CSS_FILE_PLACEHOLDER = '%css-file%';

    /**
     * @var string
     */
    const HTML_CONTENT_PLACEHOLDER = '%html-content%';

    /**
     * @var string
     */
    protected $jsFile;

    /**
     * @var string
     */
    protected $cssFile;

    /**
     * Filename.
     *
     * @var string
     */
    protected $filename = 'index.html';

    /**
     * Build component content.
     *
     * @return ProgramComponentInterface
     */
    public function build(): ProgramComponentInterface
    {
        $htmlContent = '';

        for ($number = 1; $number <= $this->getNumberOfModules(); $number++) {
            $htmlContent .= (new HtmlModule())->getContent($this->getModuleFilename($number));
        }

        if($htmlContent) {
            $placeholders = [
                self::JS_FILE_PLACEHOLDER,
                self::CSS_FILE_PLACEHOLDER,
                self::HTML_CONTENT_PLACEHOLDER,
            ];

            $placeholdersContent = [
                $this->jsFile,
                $this->cssFile,
                $htmlContent,
            ];

            $this->setContent(str_replace($placeholders, $placeholdersContent, $this->getTemplate()));
        }

        return $this;
    }

    /**
     * Set CSS filename.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setCssFilename(string $name): HtmlComponent
    {
        $this->cssFile = $name;

        return $this;
    }

    /**
     * Set JS filename.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setJsFilename(string $name): HtmlComponent
    {
        $this->jsFile = $name;

        return $this;
    }

    /**
     * Get the component template.
     *
     * @return string
     */
    public function getTemplate(): string
    {
        $jsFilePlaceholder = self::JS_FILE_PLACEHOLDER;
        $cssFilePlaceholder = self::CSS_FILE_PLACEHOLDER;
        $htmlPlaceholder = self::HTML_CONTENT_PLACEHOLDER;

        return '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="stylesheet" href="./' . $cssFilePlaceholder . '" />
                <title>Test program</title>
            </head>
            <body>
            ' . $htmlPlaceholder . '
            <script src="./' . $jsFilePlaceholder . '"></script>
            </body>
            </html>
        ';
    }
}
