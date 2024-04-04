<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExportEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'outtask:export-employees';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports employees to a csv file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employees = Employee::all();
        $filename = "employees_" . date('YmdHis') . ".csv";

        foreach ($employees as $employee) {
            $data = $employee->toArray();
            Storage::disk('local')->append($filename, str_putcsv($data));
        }

        return Command::SUCCESS;
    }
}
