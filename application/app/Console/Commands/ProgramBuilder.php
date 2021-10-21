<?php

namespace App\Console\Commands;

use App\Services\ProgramComponent\Interfaces\BuilderInterface;
use Illuminate\Console\Command;

class ProgramBuilder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'program:build {modules? : The number of program modules}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build and export of program modules.';

    /**
     * @var BuilderInterface
     */
    protected $programBuilder;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BuilderInterface $programBuilder)
    {
        parent::__construct();

        $this->programBuilder = $programBuilder;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->programBuilder->build();
    }
}
