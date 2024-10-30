<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env; //karena kita pakai cara di bawah untuk direct class method
use Illuminate\Support\Facades\App; //untuk di bawah cara facade
use Tests\TestCase;

class EnvironmentCheck_withEnvironmentVariable_returnEnvironmentValueTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_getEnvHelperFunction(): void
    {
        $owner = env('OWNER_NAME', 'fajar'); //ini langsung berfungsi
        $this->assertEquals('mfbd', $owner);
        self::assertEquals('mfbd', $owner);
    }

    public function test_getEnvDirectClass(): void 
    {
        $owner = Env::get('OWNER_NAME', 'fajar'); //ini namanya cara direct class method, harus import class Env-nya dahulu, Env-nya pilih yang Illuminate\Support\Env
        $this->assertEquals('mfbd', $owner);
    }

    public function test_getCurrentEnv(): void
    {
        $currentEnvironment = App::environment(); //ini ambil datanya pake cara facade, harus import class Env-nya dahulu, Env-nya pilih yang Illuminate\Support\Env
        $this->assertEquals('testing', $currentEnvironment);
    }
}
