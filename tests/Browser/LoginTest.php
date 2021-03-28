<?php

namespace Tests\Browser;

use App\Models\People;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Log;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * @test
     * A Dusk test example.
	* @group foo
     * @group bug2204
     *
     * @return void
     */

    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('www.kenyans.co.ke/news/41634-names-kenya-meaning-popular-kenyan-surnames')
		    ->pause(2000)
                    ->assertSee('Kibet');

                    // for ($i = 15; $i <=465; $i++){
                        
                    //     $text = $browser->text('#block-kenyans-system-main > article > div > div:nth-child(4) > div > div > div > div > div > ul > li > p:nth-child('.$i.')');
                    //     $people = new People();
                    //     $people->first_name = '';
                    //     $people->last_name = $text;
                    //     $people->fb_first_name = '';
                    //     $people->mail_first_name = '';
                    //     $people->mail_last_name = '';
                    //     $people->fb_last_name = '';
                    //     $people->email = '';
                    //     $people->save();
                    //     Log::debug($text);
                        
                    // }

                    
        });
    }
}
