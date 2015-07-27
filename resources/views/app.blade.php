<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Pro-techic iznajmljivanje alata</title>
    <!-- the meta tag scales the web page so that it displays correctly on all resolutions -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/customization/my.css" />
</head>
<body>
    <!--
    csrf means Cross Site Request Forgery
    this command will add a hidden value to the form and
    Laravel will protect us. The field will look like this:
    <input type="hidden" name="_token" value=" csrf_token(); ">
    the csrf_token is generated for us.
    -->
    {!! csrf_field() !!}

    @include('partials._menu')

    <div class="container">
        @yield('content')
    </div>

    <div class="container-fluid">
        @yield('table')
    </div>

    <div class="container">
        @include('errors._list')
    </div>

    @yield('footer')

</body>
</html>