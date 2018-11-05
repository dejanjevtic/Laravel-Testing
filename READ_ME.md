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

next test:

change function

 public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertSee('Laravel');
    }


It means Laravel must be contained in welcom page

CLI: php artisan serve

CLI2:    "./vendor/bin/phpunit"

PHPUnit 7.4.3 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 3.86 seconds, Memory: 10.00MB

OK (3 tests, 3 assertions)

but if we change:



 public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertSee('Roger');
    }


  We expect Roger is contained in welcome page

CLI: php artisan serve

CLI2:    "./vendor/bin/phpunit"

we get:

PHPUnit 7.4.3 by Sebastian Bergmann and contributors.

.F.                                                                 3 / 3 (100%)

Time: 1.11 seconds, Memory: 10.00MB

There was 1 failure:

1) Tests\Feature\ExampleTest::testBasicTest
Failed asserting that '<!doctype html>\n
<html lang="en">\n
    <head>\n
        <meta charset="utf-8">\n
        <meta http-equiv="X-UA-Compatible" content="IE=edge">\n
        <meta name="viewport" content="width=device-width, initial-scale=1">\n
\n
        <title>Laravel</title>\n
\n
        <!-- Fonts -->\n
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">\n
\n
        <!-- Styles -->\n
        <style>\n
            html, body {\n
                background-color: #fff;\n
                color: #636b6f;\n
                font-family: 'Nunito', sans-serif;\n
                font-weight: 200;\n
                height: 100vh;\n
                margin: 0;\n
            }\n
\n
            .full-height {\n
                height: 100vh;\n
            }\n
\n
            .flex-center {\n
                align-items: center;\n
                display: flex;\n
                justify-content: center;\n
            }\n
\n
            .position-ref {\n
                position: relative;\n
            }\n
\n
            .top-right {\n
                position: absolute;\n
                right: 10px;\n
                top: 18px;\n
            }\n
\n
            .content {\n
                text-align: center;\n
            }\n
\n
            .title {\n
                font-size: 84px;\n
            }\n
\n
            .links > a {\n
                color: #636b6f;\n
                padding: 0 25px;\n
                font-size: 12px;\n
                font-weight: 600;\n
                letter-spacing: .1rem;\n
                text-decoration: none;\n
                text-transform: uppercase;\n
            }\n
\n
            .m-b-md {\n
                margin-bottom: 30px;\n
            }\n
        </style>\n
    </head>\n
    <body>\n
        <div class="flex-center position-ref full-height">\n
            \n
            <div class="content">\n
                <div class="title m-b-md">\n
                    Laravel\n
                </div>\n
\n
                <div class="links">\n
                    <a href="https://laravel.com/docs">Documentation</a>\n
                    <a href="https://laracasts.com">Laracasts</a>\n
                    <a href="https://laravel-news.com">News</a>\n
                    <a href="https://nova.laravel.com">Nova</a>\n
                    <a href="https://forge.laravel.com">Forge</a>\n
                    <a href="https://github.com/laravel/laravel">GitHub</a>\n
                </div>\n
            </div>\n
        </div>\n
    </body>\n
</html>\n
' contains "Roger".

C:\laravel_projekti\testing\vendor\laravel\framework\src\Illuminate\Foundation\Testing\TestResponse.php:345
C:\laravel_projekti\testing\tests\Feature\ExampleTest.php:19

FAILURES!
Tests: 3, Assertions: 3, Failures: 1.

