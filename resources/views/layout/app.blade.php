<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Management')</title>
    {{-- Bootstrap icons link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    {{-- Jquery CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- Bootstrap JS bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    {{-- Custom Js file for ajax code --}}
    <script src="{{ asset('assets/custom.js') }}"></script>

</head>

<body>
    {{-- header section --}}
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Task Management</a>
        </nav>
    </header>

    {{-- Content Section --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="mt-4 bg-dark text-light py-2 text-center">
        <p>&copy; {{ date('Y') }} Task Management App. All rights reserved.</p>
    </footer>

</body>
</html>
