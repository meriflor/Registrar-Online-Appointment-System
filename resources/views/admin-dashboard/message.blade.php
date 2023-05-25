@extends('admin-dashboard.admin')

@section('content')

<!-- header -->
<div class="d-flex flex-row align-items-center mb-3">
    <a class="btn d-flex flex-row align-items-center" id="menu-btn">
        <img src="/images/back-arrow.png" alt="" />
        <p class="m-0 p-0 font-nun fs-6 ms-2" id="page-title">
            Message
        </p>
    </a>
</div>

<div class="row w-100 m-0 d-flex flex-row">
    <div class="col-lg-4 mb-3">
        <div class="this-box inbox-content" id="inbox-content">
            <div class="list-group">
                @foreach($messages as $message)
                <a href="#" class="list-group-item list-group-item-action active message" aria-current="true" data-message-id="{{ $message->id }}">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="">{{ $message->fullname }}</h6>
                        <small id="timestamp" class="text-body-secondary">{{ $message->created_at->diffForHumans() }}</small>
                    </div>
                    <small class="text-body-secondary text-truncate">{{ $message->message }}</small>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-3">
        <div class="this-box message-view d-flex flex-column" id="message-view">
            <div class="message-head d-flex flex-row row">
                <div class="head-info d-flex flex-column col-lg-9">
                    <p class="m-0 p-0 fs-4 font-nun font-bold" id="full_name_message"></p>
                    <small class="text-body-secondary" id="email_message"></small>
                    <small class="text-body-secondary" id="date_posted_message"><!--{{-- $message->created_at->format('Fj,Y') --}}--></small>
                </div>
                    <div class="head-button d-flex flex-row col-lg-3 justify-content-end align-items-center">
                        <!-- <button class="btn d-flex flex-row align-items-center">
                            <img src="/images/post.png" alt="">
                            <small class="m-0 ms-1 p-0 font-nun">Post </small>
                        </button> -->
                        <button class="btn d-flex flex-row align-items-center delete-button" data-message-id="{{ $message->id }}">
                            <img src="/images/delete.png" alt="">
                            <small class="m-0 ms-1 p-0 font-nun">Delete</small>
                        </button>                        
                    </div>
            </div>
            <div class="message-body mt-5 font-13 px-5 flex-1">
                <pre class="fs-6" id="body_message">
                    {{-- Hello! I hope you're doing well. I was wondering if you could provide me with some additional information regarding the fees that are required when booking through the form. I'm interested in understanding the fee structure and any other associated costs, such as taxes or processing fees.

                    If possible, it would be helpful to know the breakdown of the fees and when they need to be paid. 
                    I appreciate your time and assistance with this matter. Please let me know if you need any further information from me. Thank you! --}}
                </pre>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this message?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete</button>
            </div>
        </div>
    </div>
</div>


<button id="back-to-top-btn" class="btn btn-custom show" style="color: #131313;">Back to top</button>

<script>
    function message_content_height(){
        var screenHeight = window.innerHeight;
        var message = document.getElementById('message-view');
        var inbox = document.getElementById('inbox-content');

        var content_height = (screenHeight * 0.73) + 'px';

        message.style.height = content_height;
        inbox.style.height = content_height;
        console.log(screenHeight);
        console.log(message.offsetHeight);
        console.log(inbox.offsetHeight);
    }
    message_content_height();
    window.addEventListener('resize',message_content_height);
    const messages = document.querySelectorAll('.message');

    // Add event listener to each message element
    messages.forEach((message) => {
        message.addEventListener('click', () => {
            // Remove "unread" class and add "opened" class
            message.classList.remove('unread');
            message.classList.add('opened');

            // Update timestamp
            const timestamp = message.querySelector('#timestamp');
            timestamp.textContent = getTimeText(new Date());
        });
    });

    $('.message').click(function() {
        var messageId = $(this).data('message-id');
        console.log(messageId);

        // Make an AJAX request to fetch the message details
        $.ajax({
            url: '/messages/' + messageId, // Update the AJAX URL
            method: 'GET',
            success: function(response) {
                $('#full_name_message').text(response.fullname);
                $('#email_message').text(response.email);
                $('#body_message').text(response.message);
                $('#date_posted_message').text(response.created_at);
            },
            error: function(xhr) {
                // Handle error response
                console.log(xhr.responseText);
            }
        });
        // Delete button click event
        $('.delete-button').click(function (e) {
            e.stopPropagation(); // Prevent click event propagation to the message element

            // Retrieve the message ID from the data attribute
            var messageId = $(this).data('message-id');

            // Display the confirmation modal
            $('#delete-modal').modal('show');

            // Confirm delete action
            $('#confirm-delete-btn').click(function () {
                // Make an AJAX request to delete the message
                $.ajax({
                    url: '/messages/' + messageId,
                    method: 'DELETE',
                    success: function (response) {
                        // Handle successful deletion
                        // For example, you can show a success message or perform any other necessary action
                        $('#delete-modal').modal('hide'); // Hide the confirmation modal
                        location.reload(); // Refresh the page
                    },
                    error: function (xhr) {
                        // Handle error response
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    });
</script>
@endsection