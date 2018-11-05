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
