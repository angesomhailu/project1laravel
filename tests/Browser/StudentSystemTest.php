<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StudentSystemTest extends DuskTestCase
{
    public function test_student_registration_process()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('Fname', 'Angesom')
                    ->type('email', 'angesomhailu1414@example.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('Register')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Welcome, Angesom');
        });
    }
}
