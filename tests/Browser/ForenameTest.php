<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Log;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\People;

class ForenameTest extends DuskTestCase
{
     /**
     * A Dusk test example.
	* @group fore
     * @group bug2204
     *@test
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('www.forebears.io/kenya/forenames')
            ->pause(5000)
                    ->assertSee('John');

                    for ($i = 1; $i <=1001; $i++){
                        $text = $browser->text('#names-2014 > table > tbody > tr:nth-child('.$i.') > td.sur > a');
                        $people = new People();
                        $people->first_name = $text;
                        $people->last_name = '';
                        $people->fb_first_name = '';
                        $people->mail_first_name = '';
                        $people->mail_last_name = '';
                        $people->fb_last_name = '';
                        $people->email = '';
                        $people->save();
                        Log::debug($text);
                    }
        });
    }
}
