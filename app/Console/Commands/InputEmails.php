<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\People;

class InputEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'input:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A Command to input emails';

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
        $count = 0;
        $contents = Storage::get('emails.txt');
        $data = explode(' ', $contents);
        $data = explode(',', $data[0]);
        foreach ($data as $key => $value) {
            $count = $count + 1;
            Log::Debug($value);
            Log::Debug($count);
            $people = People::find($count);
            $people->email = trim($value);
            $people->mail_first_name = $people->first_name;
            $people->mail_last_name = $people->last_name;
            $people->fb_last_name = $people->last_name;
            $people->fb_first_name = $people->first_name;
            $people->save();
        }
        echo "deon";
    }
}
