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

