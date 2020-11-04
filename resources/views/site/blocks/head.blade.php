<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="yandex-verification" content="602786825721ffb9" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

<!-- Bootstrap core CSS -->
<link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">
<link href="/css/prettyPhoto.css" rel="stylesheet">
<link href="/css/mdb.min.css" rel="stylesheet">
<link href="/css/flexslider.css" rel="stylesheet">

<!-- Your custom styles (optional) -->
<link href="/css/mdb_style.min.css" rel="stylesheet">
<link href="{{ mix('css/my_style.css', 'build') }}" rel="stylesheet">

<meta name="description" content="@yield('description')">
<meta name="author" content="Александр Гавриленко">

<link rel="icon" href="../../favicon.ico">

<style>

    html,
    body {
        background: #fff;
    }

    .carousel {
        height: 100%;
    }

    .post-carousel {
        height: auto;
    }

    .main-carousel {
        height: 60vh;
    }

    @media (max-width: 740px) {    	

    	.carousel {
            height: 100%;
        }

        .main-carousel {
            height: 100vh;
        }

    }

    @media (min-width: 800px) and (max-width: 850px) {

    	.carousel {
            height: 100%;
        }    	

        .main-carousel {
            height: 100vh;
        }

    }

</style>



<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-1225098430331430",
        enable_page_level_ads: true
    });
</script>



<title>@yield('title')</title>