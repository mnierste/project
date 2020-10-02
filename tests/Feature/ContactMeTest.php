<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ContactMeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testExample()
    {
        $response = $this->get('/contactme');

        $response->assertStatus(200);
    }

    //5.6 laravel testing?
    public function testContactMeForm()
     {
         $this->visit('/contactme')
              ->type('testing@testing.com', 'email')
              ->type('php Unit', 'name')
              ->type('Testing phpunit', 'subject')
              ->type('Testing phpunit', 'message')
              ->press('Submit')
              ->seePageIs('/contactme');
     }
}
