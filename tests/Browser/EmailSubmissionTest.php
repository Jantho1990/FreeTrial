<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmailSubmissionTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected $user;
    protected $email;
    protected $unusedEmail;

    /**
     * Run before each test.
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        // This does not work because we are accessing the development application,
        // and subsequently the development database. I have not been able to figure
        // out a way around this.
        // $this->user = factory(\App\User::class)->create();
        
        // Since we can't create a fake user (or rather, we can't store one in 
        // the database), we'll need to settle for using data we know is seeded
        // in the test database.
        $this->email = 'ckling@example.org';
        $this->unusedEmail = 'not@inthe.db';
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser1, Browser $browser2) {
            $browser1->visit('http://freetrial.test/free-trial')
                    ->waitForText("3 free downloads")
                    ->assertSee('START YOUR FREE TRIAL')
                    ->click('.form-panel button')
                    ->pause(1000)
                    ->assertSee('error with your submission')
                    ->type('email', $this->unusedEmail)
                    ->pause(250)
                    ->assertVue('emailValue', $this->unusedEmail, '@FormPanel')
                    ->assertValue('input[name="email"]', $this->unusedEmail)
                    ->click('.form-panel button')
                    ->pause(1000)
                    ->assertUrlIs('https://pro.creativemarket.com/sign-up');
            
            $browser2->visit('/free-trial')
                    ->waitForText("3 free downloads")
                    ->assertSee('START YOUR FREE TRIAL')
                    ->type('email', $this->email)
                    ->pause(250)
                    ->assertVue('emailValue', $this->email, '@FormPanel')
                    ->assertValue('input[name="email"]', $this->email)
                    ->click('.form-panel button')
                    ->pause(50)
                    ->assertUrlIs('http://freetrial.test/free-trial')
                    ->waitForText('Unfortunately, the free trial')
                    ->assertDontSee('START YOUR FREE TRIAL');
        });
    }
}
