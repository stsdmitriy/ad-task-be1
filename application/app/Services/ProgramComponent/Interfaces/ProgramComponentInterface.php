<?php

namespace App\Services\ProgramComponent\Interfaces;

interface ProgramComponentInterface
{
    /**
     * Build content of component.
     *
     * @return ProgramComponentInterface
     */
    public function build(): ProgramComponentInterface;

    /**
     * Save the component file.
     *
     * @return string Name of the saved file
     */
    public function save(): string;

    /**
     * Get the filename.
     *
     * @return string
     */
    public function getFilename(): string;
}
