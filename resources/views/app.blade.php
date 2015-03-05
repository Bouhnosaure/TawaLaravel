<!doctype html>
<html lang="en">
<head>
    @include('elements.head')
</head>
<body>
@include('elements.header')

<div class="container">

    @include('flash::message')

    @yield('content')

</div>


@include('elements.footer')
@include('elements.scripts')


</body>
</html>