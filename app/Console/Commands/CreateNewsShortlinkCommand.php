<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use Str;

class CreateNewsShortlinkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:shortlink:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Shortlink For News';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->output->createProgressBar(News::count());
        $this->output->progressStart(News::count());
        News::query()->where('shortlink', null)->chunkById(100, function ($news) {
            foreach ($news as $new) {
                $new->shortlink = Str::random(6).$new->id;
                $new->save();
                $this->output->progressAdvance(1);
            }
        });
        $this->output->progressFinish();
    }
}
