<?php

namespace App\Console\Commands;

use App\Helper\GenerateInvoices;
use Illuminate\Console\Command;
use Log;

class AutoSetStatusInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $generator = app()->make(GenerateInvoices::class);
        $generator->updateStatusInvoices();
        Log::info('Update statuses Invoices success');
    }
}
