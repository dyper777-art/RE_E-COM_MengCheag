<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    @include('frontend.layout.style')

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('frontend.layout.header')

    @if(!request()->routeIs('home*'))
        <!-- Breadcrumb Section Begin -->
        @include('frontend.layout.breadcrumb')
        <!-- Breadcrumb Section End -->
    @else
        <!-- Hero Section End -->
        @include('frontend.layout.hero')
        <!-- Hero Section End -->
    @endif

    <!-- Featured Section Begin -->
    @yield('content')
    <!-- Featured Section End -->

    <!-- Footer Section Begin -->
    @include('frontend.layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('frontend.layout.jsshop')


</body>

</html>
