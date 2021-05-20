<h1 style="color:#EF3B2D; text-align: center; margin-bottom: 50px;">    
    LARAVEL 8 FROM SCRATCH
</h1>

- ### Section 1 – Prerequisites and Setup

    - ### Episode 01 – An Animated Introduction to MVC 
    
        - In Laravel, it is easy to associate a URI with a response
        - We register these in the routes file
        - When the request is made, we then load a controller
        - A controller receives a request and provides a response
        - The controller must delegate, to fetch the necessary information from the database
        - For this we use an eloquent model
        - `Eloquent` provides an API for performing any number of `SQL` queries against the database
        - The model is also a place to store any domain or business specific logic
        - The next step is to load the view
        - The view is what the user sees, it’s the html portion of the codebase
        - The view receives the data from the controller and renders it for the user 
    
    - ### Episode 02 – Initial Environment Setup and Composer 

        - To connect to MySQL through the terminal, `mysql –u root`
        - `Composer` is a dependency or package manager for `PHP`
        - `Composer` offers you a way to declare the dependencies your project has, and then immediately pull them in with a single command
        - `composer create-project laravel/laravel { app name }`
        - `composer.json` is the configuration file for the composer dependencies
        - In the `composer.json` file you can separate dependencies depending on whether the app is in production or not
        - `php artisan serve` boots up a local server for the project
        - The app will be served at `127.0.0.1:8000` 

    - ### Episode 03 – The Laravel Installer Tool 

        - The laravel installer is a composer package
        - `composer global require laravel/installer`
        - `laravel new { project name }`
        - The `global` option is to make the installer available everywhere on the machine
        - pwd returns the present working directory
        - Add the pwd to the `./bashrc` file in macOS
        - You can also add it to `/etc/paths`
        - `sudo vim /etc/paths` 

    - ### Episode 04 – Why Do We Use Tools 

        - Tools help us solve a problem we are having 
  
- ### SECTION 2 – THE BASICS  

    - ### Episode 05 – How a Route Loads a View 

        - Browser specific routes are stored in routes/web.php
        - A view is something the user sees/views, usually that is the HTML
        - Views are stored in the resources/views directory
        - `return view( { template name } )` returns a view based on the provided template name
        - Blade template files end in `.blade.php`
        - The file ending does not need to be passed to the view function, only the file name
        - The route takes a URI as the first argument, and a closure as the second argument
        - A closure is a class used to represent anonymous functions  

    - ### Episode 06 – Include CSS and JavaScript 

        - CSS and JavaScript files are compiled by a bundler and places in the resourced folder 
        - Alternatively, you can place your assets in the `public` directory and reference them directly

    - ### 07 – Make a Route and Link to it 

        - All routes are stored in the `routes/web.php` folder
        - If a route returns a view that doesn't exist, laravel will throw an exception 

    - ### 08 – Store Blog Posts as HTML Files 

        - You can pass variables to the view, by passing a set of value key pairs as the second argument of the view function
        - Each item in the array will be extracted as its own variable
        - `file_get_contents()`
        - `__DIR__` returns the path to the current directory
        - You can pass a wildcard to the URI, and it will be matched and passed into the second argument function
        - `dd()` dump, die
        - `ddd()` dump, die, debug
        - `abort( { error code} )`
        - `redirect( { Uniform Resource Identifier } )` 

    - ### Episode 09 – Route Wildcard Constraints 

        - You can chain a where function to the route and constrain the wildcard using either regular expressions, or laravel helper functions
        - `Route::get()->where({ wildcard name }, { regular expression })`
        - Helper functions include `whereAlpha()` and `whereNumber()` 

    - ### Episode 10 – Use Caching for Expensive Operations 

        - `cache()->remember({ unique key }, { time before expiry }, closure)`
        - An example of a unique key is `posts.all`
        - For the time to expiration use seconds
        - You can also use helper functions e.g., `now()->addMinutes(20)` 
      
    - ### Episode 11 – Use the Filesystem Class to Read a Directory 

        - `base_path()` gets the path to the base of the install
        - `file_exists()`
        - `function_exists()`
        - `app_path()`
        - `app()`
        - `resource_path()`
        - `throw new ModelNotFoundException();`
        - The file `facade` is a class that gives you access to various functionality for doing things with files
        - `File::files()` allows us to read a directory of files
        - `files->getContents()` returns the content of the file
        - `array_map()` is similar to a loop but returns an array 

    - ### Episode 12 – Find a Composer Package for Post Metadata 

        - Yaml Front Matter is metadata added to the top of the html file, delimited with three dashes
        - `composer require spatie/yaml-front-matter`
        - `Collections` are a feature of `Laravel` and are like arrays on steroids
        - It provides a more object-oriented syntax for calling methods
        - If you have a loop that returns a different array, it might be better to use `array_map()`
        - `collect()` is a helper function that collects an array and raps it within a collection object
        - `collection->map()` is  the equivalent of `array_map()`
        - `Ctrl + Alt + N` inline’s  a variable in `PHPStorm`
        - `Alt + Enter` converts a closure into an arrow function 

    - ### Episode 13 – Collection Sorting and Caching Refresher 
    
        - `php artisan tinker` is a shell for php and the laravel application
        - `cache()->rememberForever({ unique key }, closure);`
        - `cache({ unique key });` retrieves a cached resource if it matches the unique key  
        - `cash()->forget({ unique key });`
        - `cash()->put('foo','bar')` and `cache(['foo' => 'buzz'])` are the same
        - You can add the time before expiration as the second argument to the cache function e.g., `cache(['foo','buzz], now()->addSeconds(3));`

- ### SECITON 3 – BLADE 

    - ### 14 Blade: The Absolute Basics 
    
        - `Blade` is `Laravel's` templating engine and it is used in the views
        - `Blade` files end in `.blade.php`
        - If `Blade` syntax is included in the views, `Laravel` will compile it down to vanilla `PHP`
        - `<?= 'foobar' ?>` is shorthand for the `PHP` `echo` function
        - `<?= $post->title ?>` `<?php echo $post->title ?>` and `{{ $post->title; }}` are exactly the same
        - Compiled `Blade` files can be found in `/storage/framework/views`
        - `e()` is a Laravel function for encoding
        - `{!! $post->body !!}` does not escape the data, in case we want it to be treated as html
        - `@foreach () @endforeach` is called a `Blade` directive
        - `{{ dd() }}` and `@dd()` are the same, the latter is another `Blade` directive
        - `Laravel` adds a `$loop` variable to `foreach` directives, it contains information about the loop which are accessible from within the loop
        - `@if @endif` 
        - `@unless @endunless`

    15 Blade Layouts Two Ways 

    16 A few Tweaks and Consideration 

    SECTION 4 – WORKING WITH DATABSES 

    17 – Environment Flies and Database Connections 

    18 – Migrations: The Absolute Basics 

    19 – Eloquent and the Active Record Pattern 

    20 – Make a Post Model and Migration 

    21 – Updates and HTML Escaping 

    22 – 3 Ways to Mitigate Mass Assignment Vulnerabilities 

    23 – Route Model Binging 

    24 – Your first eloquent Relationship 

    25 – Show All Posts Associated with a Category 

    26 – Clockwork, and the N+1 problem 

    27 – Database Seeding Saves Time 

    28 – Turbo Boost with Factories 

    29 – View All Posts by an Author 

    30 – Eager Load Relationships on an Existing Model 

    SECTION 5 – INTEGRATE THE DESIGN 

    31 – Integrate the Design 

    32 – Blade Components and CSS Grids 

    33 – Convert the Blog Post Page 

    34 – A Small JavaScript Dropdown Detour 

    35 – How to Extract a Dropdown Blad Component 

    36 – Quick Tweaks and Clean-Up 

    SECTION 6 – SEARCH 

    37 – Search (The Messy Way) 

    38 – Search (The Cleaner Way) 
