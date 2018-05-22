<?php

namespace Tests;

use Faker\Factory;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Generate test data.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Set-up the testing environment.
     */
    public function setUp()
    {
        $this->faker = Factory::create();
    }
}
