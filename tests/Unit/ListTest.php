<?php

namespace Tests\Unit;

use Tests\TestCase;

class ListTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_list()
    {
        $response = $this->get('/list');

        $this->assertContains('Xiaomi Poco F3', $response);
    }
}
