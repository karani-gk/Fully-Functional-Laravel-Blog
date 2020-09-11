<!DOCTYPE html>
<html lang="en"> 
    <head>

        <?php
            if( !isset($title) ){
                $title = "Home - Perfect the skills you need for your next big project";
            }

            if( !isset($ogImage) ){
                $ogImage = $ogImage = "profile.png";
            }
        ?>
        

        <title>{{ $title }}</title>
        
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Geoffrey Karani">
        <meta name="description" content="Educative programming articles for ambitious developers who want to conquer the world with the next generation of software applications | Codewithkarani.tech">
        
        <meta name="keywords" content="laravel,php,api,django,mysql,database,jquery,json,ajax,bootstrap,javascript,html,css,wordpress,python,databases,
        software,software development,programming,computer programming,software engineering,software architect,perfect,skills,project,programmer,
        programming,app development,code,code with karani,karani,geoffrey,kamundi,geoffrey karani,geoffrey kamundi" />
        
        <meta itemprop="image" content="https://codewithkarani.tech/assets/images/{{ $ogImage }}" alt="Code with Karani" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:locale" content="en_US" />
        <meta property="og:url" content="https://www.codewithkarani.tech/" />
        <meta property="og:type" content="article" />
        <meta property="og:site_name" content="Codewithkarani" />
        <meta property="og:image" content="https://codewithkarani.tech/assets/images/{{ $ogImage }}"/>
        <meta property="og:image:alt" content="Code with Karani" />
        <meta property="og:title" content="{{ $title }}" />
        <meta property="og:description" content="Educative programming articles for ambitious developers who want to conquer the world with the next generation of software applications | Codewithkarani.tech" />
        
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@codewithkarani.tech">
        <meta name="twitter:creator" content="@GeoffreyKamundi">
        <meta name="twitter:title" content="{{ $title }}">
        <meta name="twitter:description" content="Educative programming articles for ambitious developers who want to conquer the world with the next generation of software applications | Codewithkarani.tech">
        <meta name="twitter:image" content="https://codewithkarani.tech/assets/images/{{ $ogImage }}" alt="Code with Karani">
        
        <meta name="language" content="English">
        <meta name="coverage" content="Worldwide">
        <meta name="expires" content="never">
        <meta name="language" content="English">
        <meta name="audience" content="all">
        <meta name="web-type" content="normal">
        <meta name="doc-type" content="Web Page">
        <meta name="Rating" content="General">
        <meta name="Distribution" content="Global">
        <meta name="YahooSeeker" content="index, follow" />
        <meta name="msnbot" content="index, follow" />
        <meta name="allow-search" content="yes" />
        <meta name="DC.title" content="codewithkarani.tech | {{ $title }}">
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        
        <link rel="shortcut icon" href="/assets/images/favicon.png" alt="Code with Karani"> 
        
        <!-- FontAwesome JS-->
        <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
        
        <!-- Theme CSS -->  
        <link id="theme-style" rel="stylesheet" href="/assets/css/theme-2.css">
        <link id="theme-style" rel="stylesheet" href="/assets/css/custom.css">

        <script data-ad-client="ca-pub-3125995890975970" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

        <script type="application/ld+json">
          {
            "@context" : "http://schema.org",
            "@type" : "Software Development",
            "name" : "Code with Karani",
            "url" : "https://codewithkarani.tech/",
            "sameAs" : [
              "https://twitter.com/GeoffreyKamundi",
              "https://www.facebook.com/Gheffs",
              "https://www.linkedin.com/in/gheffs/",
              "https://www.instagram.com/gkkamundi/"
              ],
            "address": {
              "@type": "PostalAddress",
              "streetAddress": "10772 Nairobi",
              "addressRegion": "NBI",
              "postalCode": "00400",
              "addressCountry": "KE"
            }
          }
          </script>

    </head> 

<body style="overflow-x: hidden !important;">