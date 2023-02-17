<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenSpout\Common\Exception\IOException;
use OpenSpout\Common\Exception\UnsupportedTypeException;
use OpenSpout\Reader\Exception\ReaderNotOpenedException;
use Rap2hpoutre\FastExcel\FastExcel;

class ImportZipCodesFromXlsx extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:importzipcodesxlsx';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $start = now();

        try {
            $collection = (new FastExcel)->import('app/CPdescarga.xls');
        } catch (IOException|UnsupportedTypeException|ReaderNotOpenedException $e) {
            $collection = $e;
        }
        $this->info(PHP_EOL . $collection);


        return Command::SUCCESS;
    }
}
