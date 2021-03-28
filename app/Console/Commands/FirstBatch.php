<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\People;
use Illuminate\Support\Facades\Log;

class FirstBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'first:batch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'a command to process first batch';

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
        $data = People::where('id', '<', 452)->get();
        $firstnames = People::where('id', '>', 451);

        foreach($data as $key => $value){

            $lastname = $value->last_name;
            $new_id = $value->id+451;
            $firstname = People::find($new_id)->first_name;
            $full_name = $firstname.' '.$lastname;
            $full_name = trim($full_name);
            if($full_name == 'Kipkorir If it is a baby girl she will be named Nyanchera.'){
                $full_name = "Kipkorir Nyanchera";
            }

            if($full_name == 'Abdinoor The name is given to both boys and girls.'){
                $full_name = "Abdinoor Nino";
            }

            $firstname = explode(' ', $full_name); 

            $value->first_name = $firstname[0];
            $value->save();

            Log::debug($full_name);

        }
        

    }
}
