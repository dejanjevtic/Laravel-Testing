In file tests/Feature/example.php

change following function:

public function testBasicTest()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

and then make unit test in command prompt:

"./vendor/bin/phpunit"

We will get:

PHPUnit 7.4.3 by Sebastian Bergmann and contributors.
.F                                                                  2 / 2 (100%)
Time: 1.48 seconds, Memory: 10.00MB
There was 1 failure:
1) Tests\Feature\ExampleTest::testBasicTest
Expected status code 200 but received 404.
Failed asserting that false is true.
C:\laravel_projekti\testing\vendor\laravel\framework\src\Illuminate\Foundation\Testing\TestResponse.php:133
C:\laravel_projekti\testing\tests\Feature\ExampleTest.php:19
FAILURES!
Tests: 2, Assertions: 2, Failures: 1.

We add route:

Route::get('/about', function () {
    return 'About';
});

and then test in CLI   "./vendor/bin/phpunit"

PHPUnit 7.4.3 by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: 1.08 seconds, Memory: 10.00MB

OK (2 tests, 2 assertions)

Now, if we add new function:

/** @test */
    public function about_route_return_something(){
        $response = $this->get('/about');
        //dd($response);
        $response->assertSee('About');
    }

and start test "./vendor/bin/phpunit", we get:


PHPUnit 7.4.3 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 17.25 seconds, Memory: 10.00MB

OK (3 tests, 3 assertions)

Everything is OK, but if change route



Route::get('/about', function () {
    return 'Page';
});

and do same    "./vendor/bin/phpunit"

PHPUnit 7.4.3 by Sebastian Bergmann and contributors.

..F                                                                 3 / 3 (100%)

Time: 1.31 seconds, Memory: 10.00MB

There was 1 failure:

1) Tests\Feature\ExampleTest::about_route_return_something
Failed asserting that 'Page' contains "About".

C:\laravel_projekti\testing\vendor\laravel\framework\src\Illuminate\Foundation\Testing\TestResponse.php:345
C:\laravel_projekti\testing\tests\Feature\ExampleTest.php:26

FAILURES!
Tests: 3, Assertions: 3, Failures: 1.

