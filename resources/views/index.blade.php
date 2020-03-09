<!DOCTYPE html>
<html lang="en">
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bulma_override.css') }}" rel="stylesheet">
        
        <!-- jQuery -->
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    </head>
    <body>
        <section class="hero is-primary">
            <div class="hero-body">
              <div class="container has-text-centered">
                <h1 class="title web-site-title">
                  Web-site Title
                </h1>
                <h2 class="subtitle web-site-subtitle">
                  some random text
                </h2>
              </div>
            </div>
          </section>
  
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
              
            </a>
        
            <a role="button" id="nav-toggle" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
            </div>
   

    <div id="nav-menu" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
            Home
            </a>
    
            <a class="navbar-item">
            Videos
            </a>

            <a class="navbar-item">
            Gallery
            </a>

            <a class="navbar-item">
            About
            </a>
    
            <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
            Links
            </a>
    
            <div class="navbar-dropdown">
                <a class="navbar-item">
                    [blank]
                </a>
                <a class="navbar-item">
                    [blank]
                </a>
                <a class="navbar-item">
                    [blank]
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                   Contact
                </a>
            </div>
            </div>
        </div>
        </div>

          
        </nav>
    
    </body>

    <footer class="footer">
        <div class="content has-text-centered">
           <h5>Some random text here</h5>
        </div>
      </footer>
</html>


<script>
    //вызов меню в мобильной версии сайта
    $("#nav-toggle").click(function(){
       var nav = $("#nav-menu");
       var className = $(nav).attr("class");
       $(nav).toggleClass("is-active");
    });
</script>