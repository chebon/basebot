<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\People;
use Illuminate\Support\Facades\Log;

class LastnameTest extends DuskTestCase
{
     /**
     * A Dusk test example.
	* @group last
     * @group bug2204
     *@test
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('www.forebears.io/kenya/surnames')
            ->pause(5000)
                    ->assertSee('Otieno');

                    for ($i = 1; $i <=1000; $i++){
                        $text = $browser->text('#names-2014 > table > tbody > tr:nth-child('.$i.') > td.sur > a');
                        $people = new People();
                        $people->first_name = '';
                        $people->last_name = $text;
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
