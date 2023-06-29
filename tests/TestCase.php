<?php

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        $this->withoutMix();

        parent::setUp();
    }
}