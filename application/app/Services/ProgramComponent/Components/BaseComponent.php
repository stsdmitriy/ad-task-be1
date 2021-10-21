<?php

namespace App\Services\ProgramComponent\Components;

use App\Services\ProgramComponent\Exception\UnableToCreateProgram;
use App\Services\ProgramComponent\Interfaces\ProgramComponentInterface;
use PHPUnit\Exception;

abstract class BaseComponent implements ProgramComponentInterface
{
    /**
     * Filename.
     *
     * @var string
     */
    protected $filename;

    /**
     * Component content.
     *
     * @var string
     */
    protected $content = '';

    /**
     * The number of component modules.
     *
     * @var int
     */
    protected $modulesQuantity;

    /**
     * Directory of the components.
     *
     * @var int
     */
    protected $directory;

    /**
     * BaseComponent construct.
     *
     * @param string   $directory
     * @param int      $modulesQuantity
     */
    public function __construct(string $directory, int $modulesQuantity)
    {
        $this->directory = $directory;
        $this->modulesQuantity = $modulesQuantity;
    }

    /**
     * @return string
     *
     * @throws UnableToCreateProgram
     */
    public function save(): string
    {
        if (! is_dir($this->getDirectoryPath())) {
            mkdir($this->getDirectoryPath());
        }

        file_put_contents($this->getDirectoryPath() . $this->getFilename(), $this->content);

        if(! is_file($this->getDirectoryPath() . $this->getFilename())) {
            throw new UnableToCreateProgram;
        }

        return $this->getFilename();
    }

    /**
     * Get the filename.
     *
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * Get the directory path.
     *
     * @return string
     */
    public function getDirectoryPath(): string
    {
        return $this->directory . DIRECTORY_SEPARATOR;
    }

    /**
     * Get the filename.
     *
     * @param int $number
     *
     * @return string
     */
    public function getModuleFilename(int $number): string
    {
        return 'module_' . $number;
    }

    /**
     * Set the component content.
     *
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content .= $content;
    }

    /**
     * Get the number of modules.
     *
     * @return int
     */
    protected function getNumberOfModules(): int
    {
        return $this->modulesQuantity;
    }

    abstract public function build(): ProgramComponentInterface;
}
