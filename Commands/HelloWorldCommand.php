<?php

declare(strict_types=1);

namespace Ship\Commands;

use Ship\Parent\Command\ConsoleCommand;

class HelloWorldCommand extends ConsoleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:world';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hello World!';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        echo "Hello World :)\n";
    }
}
