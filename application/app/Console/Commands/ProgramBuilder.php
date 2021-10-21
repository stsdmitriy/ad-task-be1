<?php

namespace App\Console\Commands;

use App\Services\ProgramComponent\Interfaces\BuilderInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class ProgramBuilder extends Command
{
    /**
     * Default number of program modules.
     *
     * @var int
     */
    const DEFAULT_MODULES = 1;

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
     * @return int
     */
    public function handle(): int
    {
        $modules = $this->argument('modules');

        $validator = Validator::make([
            'modules' => $modules,
        ], [
            'modules' => ['nullable', 'numeric'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return 1;
        }

        $this->programBuilder->forModules(
            $this->argument('modules') ?? self::DEFAULT_MODULES
        )->build();

        return 0;
    }
}
