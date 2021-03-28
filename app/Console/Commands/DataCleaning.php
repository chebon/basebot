<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\People;
use Illuminate\Support\Facades\Log;

class DataCleaning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to clean name data';

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
        $data = People::all();

        foreach($data as $key => $value){
            $text = $value->last_name;
            if (preg_match('/\-\b/', $text)) {
                $text = explode('-', $text);
                $text = $text[0];
            } else {
                $text = explode(' ', $text);
                $text = $text[0];

            }

            if (preg_match('/\ \b/', $text)) {
                $text = explode(' ', $text);
                $text = $text[0];
            }

            if (preg_match('/\(\b/', $text)) {
                $text = explode('(', $text);
                $text = $text[0];
            }
            if (preg_match('/\\/\b/', $text)) {
                $text = explode('\/', $text);
                $text = $text[0];
            }
            if (preg_match('/\[\b/', $text)) {
                $text = explode('[', $text);
                $text = $text[0];
            }
            if (preg_match('/\\A\b/', $text)) {
                $text = explode('\A', $text);
                $text = $text[0];
            }

            if (preg_match('/\/\b/', $text)) {
                $text = explode('/', $text);
                $text = $text[0];
            }

            

           $text =  str_replace("-","",$text);
           $text =  str_replace("/","",$text);
           $text = trim($text);

           if ($text == ' ' || $text == "If"|| $text == "The") {
            continue;
        }
            $value->last_name = $text;
            $value->save();

            Log::debug($text);
        }
    }
}
