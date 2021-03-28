<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\People;
use Illuminate\Support\Facades\Log;

class MailTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group yandex
     * @group bug2204
     *@test
     * @return void
     */
    public function testExample()
    {
        $data = People::where('id', '>', 1)->where('id', '<', 452)->get();

        foreach ($data as $peps => $pep) {
            $this->browse(function (Browser $browser) use ($pep) {

                
                $browser->visit('mail.yandex.com/')
                    ->clickLink('Create an account')
                    ->pause('2000')
                    //->dragDown('#firstname', $pixels = 10)
                    ->value('#firstname', $pep->first_name)
                    ->value('#lastname', $pep->last_name)
                    ->dragLeft('#lastname', $pixels = 10)
                    ->value('#password', env('secretpassword', 'refregirator'))
                    ->value('#password_confirm', env('secretpassword', 'refregirator'))
                    ->pause(5000)
                    
                    ->assertSee('account');
                    $username = $browser->value('#login');
                    Log::Debug($username);
            });
        }
    }
}
