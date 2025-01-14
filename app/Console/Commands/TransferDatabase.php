<?php

namespace App\Console\Commands;

use App\Services\TransferDataService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TransferDatabase extends Command
{
    protected TransferDataService $transfer_data_service;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:transfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transfer Database from old kutla db to the new one';

    public function __construct()
    {
        parent::__construct();
        $this->transfer_data_service = new TransferDataService();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            if ($this->transfer_data_service->transferPosts()) {
                $this->info('Posts Transferred Successfully');
            }

            if ($this->transfer_data_service->transferVideos()) {
                $this->info('Videos Transferred Successfully');
            }
        } catch (\Throwable $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}
