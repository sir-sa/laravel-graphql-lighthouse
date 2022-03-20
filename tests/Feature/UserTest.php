<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Nuwave\Lighthouse\Testing\RefreshesSchemaCache;

abstract class UserTest extends TestCase
{
    use CreatesApplication;
    use RefreshesSchemaCache;

    protected function setUp(): void
    {
        parent::setUp();
       $this->bootRefreshesSchemaCache();
     }
}
