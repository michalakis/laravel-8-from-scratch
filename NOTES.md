## Laravel 8 From Scratch

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
  
- ### Section 2 – The Basics 

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

    - ### Episode 07 – Make a Route and Link to it 

        - All routes are stored in the `routes/web.php` folder
        - If a route returns a view that doesn't exist, laravel will throw an exception 

    - ### Episode 08 – Store Blog Posts as HTML Files 

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
        - **TODO:** Why does `YamlFrontMatter::parseFile($file)` work even when the argument passed in is an object, not a string?
        - **TODO:** `document->body()` function is used without prior mention or explanation

    - ### Episode 13 – Collection Sorting and Caching Refresher 
    
        - `php artisan tinker` is a shell for php and the laravel application
        - `cache()->rememberForever({ unique key }, closure);`
        - `cache({ unique key });` retrieves a cached resource if it matches the unique key  
        - `cash()->forget({ unique key });`
        - `cash()->put('foo','bar')` and `cache(['foo' => 'buzz'])` are the same
        - You can add the time before expiration as the second argument to the cache function e.g., `cache(['foo','buzz], now()->addSeconds(3));`

- ### Section 3 – Blade 

    - ### Episode 14 - Blade: The Absolute Basics 
    
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
        - `Laravel` adds a `$loop` variable to `foreach` directives, it contains information about the loop which are accessible from within the foreach statement
        - `@if @endif` 
        - `@unless @endunless`

    - ### Episode 15 - Blade Layouts Two Ways 
    
        - `@yield()`
        - `@extends()`
        - `@section() @endsection`
        - `Blade Components` are a different way to create layout files
        - A `Blade Component` allows us to wrap a piece of html 
        - You add components in a component's directory, which itself resides inside the `view` directory
        - `<x-layout>`, `{{ $slot }}`, `{{ $attributes }}`, `$slot` and `$attributes` are the default

    - ### Episode 16 - A few Tweaks and Consideration 
    
        - **TODO:** Does ModelNotFoundException() show an error page, or a 404 page?
        - Tip: have both a find() method, and a findOrFail() method
  
- ### Section 4 – Working With Databases

    - ### Episode 17 – Environment Flies and Database Connections 
    
        - Every application requires a certain level of environment specific configuration e.g., database name, access ids and tokens
        - The files containing these configurations are not committed to version control, and the application does not reference the values explicitly, but rather references the keys that point to the values
        - `mysql -u root -p`
        - `create database foobar;`
        - `CTRL D` to exit the mysql cli
        - `php artisan migrate`
        - `use foobar;`
        - `show tables;`

    - ### Episode 18 – Migrations: The Absolute Basics 
        - `php artisan migrate`
        - `php artisan migrate:rollback`
        - `php aritsan migrate:fresh`, this command will give a warning if app environment is in production
        - `Table Plus` lets you copy a row as an import statement
        - `Eloquent` maps a database table row to a model

    - ### Episode 19 – Eloquent and the Active Record Pattern 
    
        - Classes in the `App\Models` directory are referred to as `Eloquent Models`
        - `Eloquent` is `Laravel's` official `Object Relational Mapper`
        - It is `Laravel's` way of interacting with the database tables
        - Each of the database tables can have a corresponding `Eloquent Model`
        - The corresponding `Eloquent Model` will be the singular of the table name
        - Each instance of the `Eloquent Model` will map to a corresponding row in the database table
        - This is known as the `active record pattern`
        - When creating a new eloquent model instance, we do not require to prepend the namespace, `tinker` adds it automatically
        - `Laravel` offers a helper function for hashing passwords, `bcrypt({ password })`
        - `Laravel` automatically creates the timestamps
        - `$instance->pluck({ table column })` is similar to `$instance->map()`
        - You can access eloquent model instances either with object notation, or array notation
        - This means you can access the collection using foreach loops

    - ### Episode 20 – Make a Post Model and Migration 
        - If you don't know what parameters a command expects, precede it with help e.g., `php artisan help make:migration`
        - The migration name should describe what the migration does
        - `php artisan make:migration { migration name }`
        - `php artisan make:model { model name }`
        - `Model::all()`
        - `Model::count()`
        - When we run the `find()` or `findOrFail()` methods, eloquent expects to be provided the row id, not the slug

    - ### Episode 21 – Updates and HTML Escaping 
        - `{{ $foo }}` escapes the data
        - `{!! $bar !!}` does not escape the data 
      
    - ### Episode 22 – 3 Ways to Mitigate Mass Assignment Vulnerabilities
        - You can create a new record with this syntax too: `Model::create([ key1 => value1, key2 => value2 ... ])`
        - A model's `fillable` property specifies which attributes can be mass assigned i.e., when you pass all the variables in bulk, en mass
        - This is protection against mass assignment vulnerabilities
        - The `guarded` property is the opposite of `fillable` i.e. which columns cannot be mass assigned
        - `alter table posts AUTO_INCREMENT={ number }` use this to remove gaps between the values of the ids
        - If you set the `guarded` property equal to an empty array, then mass assignment protection is effectively disabled
        - `$instance->fresh()` brings up a fresh instance from the database
        - `$instance->update([ key1 => value1, key2 => value2 ... ])`
      
    - ### Episode 23 – Route Model Binding
        - `Route Model Binding` is binding a route key to an underlying `eloquent` model
        - The route wildcard name has to match up with the variable name passed to the callback function e.g., `Route::get('posts/{post}', function (Post $post) {});` 
        - The variable passed to the callback is typehinted, and laravel will look for the record in that specific model
        - It will find out what the default key that represents a post is, by default it is id
        - If you want to override the default key, you can include the key with the wildcard, e.g. `{ post:slug }`
        - If you want to permanently override the default key, include the `getRouteKeyName()` method in the Model, and return the key name
      
    - ### Episode 24 – Your first eloquent Relationship
        - When creating a model, you can append an `-m` flag, and a migration will be generated along with the model
        - `$table->foreignId('column name');`
        - `return $this->belongsTo(Category::class);`
        - When calling a relationship, when calling as a function, e.g., `$post->category()`, Laravel will return a relationship instance, but when we call it as a property, `$post->category`, Laravel will return a category instance
        - Now when we get an instance, we also get its relationships, this introduces the `n + 1` problem

    - ### Episode 25 – Show All Posts Associated with a Category 
        - When retrieving objects through a relationship, Eloquent is still running database queries behind the scene

    - ### Episode 26 – Clockwork, and the N+1 problem 
        - By retrieving a relationship from within a loop, we make additional database queries 
        - Laravel offers a `DB` facade that can listen to incoming queries, `DB::lisetn(funciton ($query){});`
        - It also offers a `Log` Facade that can log information to the log files, `Log::info($query)`
        - There is also a helper function to achieve the same thing `logger($query->sql)`
        - The query instance that is fired when the database is being accessed, has an `sql` property that returns the raw sql 
        - Anything logged can be found in `\storage\log\laravel.log`
        - When you are logging, you do not see the bindings in the logs, because laravel is using prepared statements
        - You can access the query bindings by using `$query->bindings`, `logger($query->sql, $query->bindings)`
        - the `n + 1` problem arises because laravel lazy loads relationships
        - To overcome this, we retrieve the relationship from the controller and then pass it to the view, e.g., `Post::with('category')->get()`. This is known as `eager loading`
        - clockwork is a package that allows us to have php dev tools in the browser

    - ### Episode 27 – Database Seeding Saves Time 
        - Seeder classes can be found in `database\seeders`
        - Insert into a table like so, `Category::create([ 'key', 'value' ])`\
        - Using `create` instead of `insert()` adds the timestamps automatically
        - `php artisan db:seed` seeds the database, runs the seeder run() classes
        - `php aritsan migrate:fresh --seed` rolls back and reruns migrations and then seeds the tables 
        - By adding `Model::truncate()` to the seeder `run()` method, we make sure the data in those tables is cleared out before we run `php artisan db:seed`
    
    - ### Episode 28 – Turbo Boost with Factories 
        - `database\factories`
        - Leverages library called `faker`
        - Factories have a corresponding model
        - Models use the `hasFactory` trait i.e., `use HasFactoy;`
          - This trait is added to all new eloquent models by default when they are created 
        - Factories let you create and persist new records into the database
        - `Model::factory()->create()`
        - `php artisan make:factory PostFactory`
        - `php artisan make:model Comment -mf`
        - Inside the factory `definition()` method, we return an array which defines the content of each column
        - ` 'title' => $this->faker->sentence`
        - ` 'body' => $this->faker->sentence`
        - You can also call a factory for a different model, and it will create that factory, and use the id as the value
        - ` 'user_id' => User::factory() `
        - ` 'name' => $this->faker->word `
        - ` 'slug' => $this->faker->slug `
        - ` 'name' => $this->faker->name() `
        - ` 'email' => $this->faker->unique()->safeEmail() `
        - ` 'email_verified_at' => now() `
        - ` Str::random(10) `
        - ` 'password' => Hash::make('password') `
        - In the factory create function, you can pass an array with values that will override the corresponding column seeded value
        - `Post::factory()->create([ 'name' => 'John Doe' ])`

    - ### Episode 29 – View All Posts by an Author 
        - `Post::latest('published_at' ? )->with('category')->get()`
        - Get the code to reflect how you speak about the site
        - When eager loading a relationship, we can pass data as arguements to the `with()` method, or we can pass them in as an array
        - `'username' => $this->faker->unique()->userName`

    - ### Episode 30 – Eager Load Relationships on an Existing Model 
        - When loading data through a relationship, we can use the `load()` method to eager load the related data
        - `'posts' => $category->posts->load('category', 'author')`
        - We can set what relationships should be eager loaded automatically, by adding the relationships in a `$with` variable inside the model
        - `protected $with = ['category' 'author'];`
        - `Post::without('author')->first()` lets you stop eager loading of a relationship if it is not needed

- ### Section 5 – Integrate the Design

    - ### Episode 31 – Convert the HTML and CSS to Blade
        - `@include('partial name')`
        - It is convention to prepend partial names with an underscore e.g., `_partial.blade.php`, but it is not obligatory

    - ### Episode 32 – Blade Components and CSS Grids 
        - `<x-post-featured-card :post="$posts[0]" />` we can pass variables to the partial this way, with a colon at the beginning of the attribute name
        - `@props(['post])` inside the partial, import the props like so
        - In Laravel, the default timestamps are instances of a class and library called carbon, which builds upon PHP's datetime object, to make it clean and fluent to work with
        - `{{ $post->created_at->diffForHumans() }}` is one of the methods carbon provides    
        - `@foreach($posts->skip(1) as $post)` 
        - The skip function lets you avoid the first post for example
        - `$posts->count()`
        - When you are working with blade components, you will have access to an attributes variable, this will contain all html attributes, but not the props
        - Props are declared at the top of the file, props are passed by adding : to the prop name
        - `@dd($loop)`
        - `$loop->iteration`

    - ### Episode 33 – Convert the Blog Post Page 
        - Extract repetitive code to its own component

    - ### Episode 34 – A Small JavaScript Dropdown Detour 
        - AlpineJS borrows its syntax from vue, and by extension Angular
        - Add attribute `x-data` to an element to create an alpine component
        - The attribute is given an object which is the single source of truth for the component  
        - `<div x-data="{ show: false }"></div>` 
        - This says we do not show the component by default
        - We next bind the display of an element to the boolean single source of truth 
        - `x-show="show"`
        - We can add click events to elements with alpine
        - `<button @click="alert('hi')">Categories</button>`
        - We can use the click event to change the single source of truth 
        - `<button @click="show = true">Categories</button>`
        - We can set the variable to switch between true and false on every click
        - `<button @click="show = ! show">Categories</button>`
        - Add `display: none` to get around the jumping of elements issue on load, alpine will remove the property when the page loads
        - `<div x-data="{ show: false }" @click.away="show = false"></div>
        - `{{ ucwords($category->name) }}` capitalizes first letter of every word
        - `{{ isset($variable) }}`
        - `$currentCategory->is($category)` compares ids to determine equivalence 

    - ### Episode 35 – How to Extract a Dropdown Blade Component 
        - When passing attributes to a component, you can use the `merge()` function, or you can pass in an object to the attributes variable
        - `{{ $attributes([ 'class' => 'transform -rotate-90 absolute']) }}`  
        - `request()->is('uri')`
        - You can also use wildcards
        - `request()->is('*' . $category->slug)`
        - `{$varialbe}` string interpolation
        - A named route is a name you give to a particular route, it's an identifier
        - You can reference the uri without writing the uri out, like a variable 
        - `request()->routeIs('home')`
        - You can check the current uri if it matches a named route
        - Would the particular route respond to the current uri
        - Q: Do component props always require a variable to be passed in?

    - ### Episode 36 – Quick Tweaks and Clean-Up
        - `'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>'`
        - `space-y-4` is a tailwind class that adds spacing to all children except the first one
        - With utility frameworks like tailwind, you can pull in a plugin that would handle specific functions, e.g., give a margin to all paragraphs except first

- ### Section 6 – Search
      
    - ### Episode 37 – Search (The Messy Way) 
        - A form field that is submitted empty returns `null`
        - `Post::latest()` builds the query string, but does not execute it since `get()` is missing 
        - `select * from posts where title like '%Doloribus%'`
        - It seems like the search term is not case-sensitive
        - `$posts = Post::latest()->with('category', 'author');`
        - `if (request('search')) { 
                $posts
                    ->where('title', 'like', '%' . request('search')
                    ->orWhere('body', 'like', '%' . request('search') . '%'); . '%'); 
          }`
        - `'posts' => $posts->get()`
        - `value="{{ request('search') }}"`

    - ### Episode 38 – Search (The Cleaner Way) 
        - `php artisan make:controller PostController`
        - There is no convention about whether the controller name should be singular or plural, the documentation keeps it singular
        - `Route::get('/', [PostController::class, 'index'])->name('home');`
        - If you route to a controller you provide the full path to the controller, and as the second item to the array, the controller action that you want to trigger
        - You can create your own `query scopes` directly on the `eloquent` model
        - You pass in the `query builder` to the `query scope`
        - `public function scopeFilter($query) // Post::newQuery()->filter()
          {
              if (request('search')) {
                  $query
                  ->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('body', 'like', '%' . request('search') . '%');
              }
          }`
        - `Post::latest()->filter()->get()`
        - The first argument is passed in by laravel automatically, that is the query builder
        - Reaching into the `request` is not the responsibility of the eloquent model
        - `??` is the `null safe operator`, it handles situations where the value does not exist
          - In `PHP 8` the `null safe operator` also checks if the variable `isset`, and if it is it returns the value
        - `request('search)` returns the string contained inside 
        - `reqeust(['search'])` returns an array with search as the key, and the string as the value
        - `request()->only('search)` does the same
        - If in the future you have more filters, you can pass them in as well
        - `PHPStorm` `ctrl + n` to search for classes, `ctrl + F12` to see list of inherited members 
        - The `when()` function on the `eloquent` `builder` class is a chainable, object-oriented way to add conditionals
        - `$query->when($filters['search'] ?? false, fn($query, $search) => $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            );`
          
- ### Section 7 – Filtering

    - ### Episode 39 – Advanced Eloquent Query Constraints
        - `SELECT
                *
            FROM
                posts
            WHERE
                EXISTS (
                    SELECT
                    *
                    FROM
                        categories
                    WHERE categories.id = posts.category_id AND categories.slug = 'commodi-ea-facere-nulla-est')`
        - `EXISTS` accepts a boolean, and returns the row only if the condition evaluates to true
        - `$query->when($filters['category'] ?? false, fn($query, $category) =>
            $query
                ->whereExists(fn($query) =>
                    $query->from('categories')
                        ->whereColumn('categories.id', 'posts.category_id')
                        ->where('categories.slug',$category))
        );`
        - Try to speak the `sql` out loud to help it make sense 
        - `whereHas` and `exists` produce the same sql (exists) 
        - `$query->when($filters['category'] ?? false, fn($query, $category) =>
              $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
              )
          );`
        - We combine the filters 
        
        

    - ### Episode 40 - Extract a Category Dropdown Blade Component
    - ### Episode 41 - Author Filtering
    - ### Episode 42 - Merge Category and Search Queries
    - ### Episode 43 - Fix a Confusing Eloquent Query Bug
    
- ### Section 8 - Pagination

    - ### Episode 44 - Laughably Simple Pagination

- ### Section 9 - Forms and Authentication

    - ### Episode 45 - Build a Register User Page
    - ### Episode 46 - Automatic Password Hashing With Mutators
    - ### Episode 47 -  Failed Validation and Old Input Data
