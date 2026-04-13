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
