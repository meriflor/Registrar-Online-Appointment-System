@extends('admin-dashboard.admin')

@section('content')

<!-- header -->
<div class="d-flex flex-row align-items-center mb-3">
    <a class="btn d-flex flex-row align-items-center" id="menu-btn">
        <img src="/images/back-arrow.png" alt="" />
        <p class="m-0 p-0 font-nun fs-6 ms-2" id="page-title">
            Messages
        </p>
    </a>
</div>

<div class="row w-100 m-0 d-flex flex-row">
    <div class="col-lg-4 mb-3">
        <div class="this-box inbox-content" id="inbox-content">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active message" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        {{-- <!-- {{sender}} --> --}}
                        <h6 class="">Meriflor Gonoy</h6>
                        <!-- ersa nlng daun ang 3 minutes chu2 ug ang rest na list -->
                        <small id="timestamp" class="text-body-secondary">3 minutes ago</small>
                    </div>
                    <!-- ang message content -->
                    <small class="text-body-secondary text-truncate">And some muted small print.asdasdasdasdasd asd asda sdas dasd asdas dasd</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action message opened">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="">Harris Revelo</h5>
                        <small id="timestamp" class="text-body-secondary">3 days ago</small>
                    </div>
                    <small class="text-body-secondary text-truncate">I have some concern about asdasdasdasdasd asd asda sdas dasd asdas dasd</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action message unread">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="">Bryan Ladion</h5>
                        <small id="timestamp" class="text-body-secondary">3 days ago</small>
                    </div>
                    <small class="text-body-secondary text-truncate">This is another concern about the documents And some muted small print.asdasdasdasdasd asd asda sdas dasd asdas dasd</small>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-3">
        <div class="this-box message-view d-flex flex-column" id="message-view">
            <div class="message-head d-flex flex-row row">
                <div class="head-info d-flex flex-column col-lg-9">
                    <p class="m-0 p-0 fs-4 font-nun font-bold">Merfilor Gonoy</p>
                    <small class="text-body-secondary">mgonoy13@gmail.com</small>
                    <small class="text-body-secondary">April 6, 2023<!--{{-- $message->created_at->format('Fj,Y') --}}--></small>
                </div>
                <div class="head-button d-flex flex-row col-lg-3 justify-content-end align-items-center">
                    <!-- <button class="btn d-flex flex-row align-items-center">
                        <img src="/images/post.png" alt="">
                        <small class="m-0 ms-1 p-0 font-nun">Post </small>
                    </button> -->
                    <button class="btn d-flex flex-row align-items-center">
                        <img src="/images/delete.png" alt="">
                        <small class="m-0 ms-1 p-0 font-nun">Delete</small>
                    </button>
                </div>
            </div>
            <div class="message-body mt-5 font-13 px-5 flex-1">
                <pre class="fs-6">
                    Hello! I hope you're doing well. I was wondering if you could provide me with some additional information regarding the fees that are required when booking through the form. I'm interested in understanding the fee structure and any other associated costs, such as taxes or processing fees.

                    If possible, it would be helpful to know the breakdown of the fees and when they need to be paid. 
                    I appreciate your time and assistance with this matter. Please let me know if you need any further information from me. Thank you!
                </pre>
            </div>
        </div>
    </div>
</div>


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

    function getTimeText(date) {
        // Get the current time
        const now = new Date();

        // Calculate the time difference in milliseconds
        const diff = now.getTime() - date.getTime();

        // Convert the time difference to minutes
        const minutes = Math.floor(diff / 1000 / 60);

        // Update the time text
        let timeText = "";
        if (diff < 60000) {
            timeText = 'Just now';
        } else if (diff < 3600000) {
            const minutes = Math.floor(diff / 60000);
            timeText = `${minutes} ${minutes > 1 ? 'minutes' : 'minute'} ago`;
        } else if (diff < 86400000) {
            const hours = Math.floor(diff / 3600000);
            timeText = `${hours} ${hours > 1 ? 'hours' : 'hour'} ago`;
        } else {
            const days = Math.floor(diff / 86400000);
            timeText = `${days} ${days > 1 ? 'days' : 'day'} ago`;
        }

        // Update the timestamp text content
        return timeText;
    }
</script>
@endsection