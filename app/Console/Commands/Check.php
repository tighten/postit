<?php

namespace App\Console\Commands;

use App\RssSync;
use App\Source;
use Illuminate\Console\Command;

class Check extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check sources';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Source::all()->each(function ($source) {
            $this->syncSource($source);
        });
    }

    private function syncSource($source)
    {
        app(RssSync::class)->sync($source);
    }
}
