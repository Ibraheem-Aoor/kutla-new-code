<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TempUploadsClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:temp-uploads-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Temp Uploads';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        File::cleanDirectory('public/temp/uploads');
        $this->comment('Temp Uploads cleared');
    }
}
