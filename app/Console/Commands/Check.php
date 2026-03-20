<?php

namespace App\Console\Commands;

use App\Models\Source;
use App\RssSync;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('check')]
#[Description('Check sources')]
class Check extends Command
{
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
     */
    public function handle(): void
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
