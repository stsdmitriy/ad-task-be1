<?php

namespace App\Services\ProgramComponent\Interfaces;

interface ProgramComponentInterface
{
    /**
     * Build content of component.
     *
     * @return mixed
     */
    public function build();

    /**
     * Save the component file.
     *
     * @return mixed
     */
    public function save();

    /**
     * Get the component template.
     *
     * @return string
     */
    public function getTemplate(): string;
}
