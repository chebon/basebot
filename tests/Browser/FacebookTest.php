<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\People;
use Illuminate\Support\Facades\Log;

class FacebookTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group fb
     *
     * @return void
     */
    public function testExample()
    {
        $data = People::where('id', '=', 6)->get();
        foreach ($data as $peps => $pep) {
            if (!$pep->fb_completed || $pep->fb_completed == '') {
                $this->browse(function (Browser $browser) use ($pep) {
                    $browser->visit('www.facebook.com/')
                        ->pause(1500)
                        ->clickLink('Create New Account')
                        ->pause(3000)
                        ->type('firstname', $pep->first_name)
                        ->type('lastname', $pep->last_name)
                        ->type('reg_passwd__', 'refrigerator')
                        ->type('reg_email__', $pep->email . '@yandex.com')
                        ->pause(120000)
                        ->assertSee('Facebook');
                });
                $pep->fb_completed = 'true';
            }
        }
    }
}
