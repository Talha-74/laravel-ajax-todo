<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Management')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Task Management</a>
        </nav>
    </header>

    <div class="container mt-4">
        {{-- Content Section --}}
        @yield('content')
    </div>

    {{-- <footer class="mt-4"> --}}
        {{-- Add your footer content here --}}
        {{-- <p>&copy; {{ date('Y') }} Task Management App. All rights reserved.</p> --}}
        {{-- </footer> --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   function updatePriority(event) {
    // Stop the event from bubbling up the DOM tree
    event.stopPropagation();

    // Get task ID from data attribute
    var taskId = $(event.target).data('id');  // Updated to 'data-id'

    // AJAX Request
    $.ajax({
        url: '/task/update-priority/' + taskId,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            // Update the UI based on the response
            $(event.target).html(data.priority == 1 ? 'High' : 'Low');
            $(event.target).toggleClass('badge-danger badge-warning');
            $(event.target).find('i').toggleClass('bi-arrow-down-square bi-arrow-up-square');
            console.log('Priority Updated:', data);
        },
        error: function (xhr, status, error) {
            console.error('Error updating priority:', error);
        }
    });
}

</script>

</html>
