<?php

namespace SBT\CSV;

use Crockett\CsvSeeder\CsvSeeder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Wrapper class for CSV Imports and support
 * 
 * @category Library
 * @author Ted Nugent <nuge@geniusfactor.ca>
 * @license http://geniusfactor.io MIT
 * @link http://geniusfactor.io
 */
class CSVSeed extends CsvSeeder
{
    public $sourcePath = "";
    public $tableName = "";

    /**
     * Instantiates a new instance of the class
     */
    public function __construct()
    {
        
    }

    /**
     * Process runner
     */
    public function run()
    {
        // derive source CSV path
        $this->sourcePath    = env("CSV_PATH", "database/csv");
        
        // get configuration for import
        $this->filename = base_path($this->sourcePath . "/{$this->tableName}.csv");
        $this->table = $this->tableName;

        // runs the seeder - alternatively, you could call $this->runSeeder(); 
        // for the same result
        parent::run();
    }
}
