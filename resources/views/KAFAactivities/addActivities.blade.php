<!DOCTYPE html>
<html lang="en">

<head>
    @include('partial.head')
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    {{-- Header --}}
    @include('partial.header')

    {{-- Main layout --}}
    <div class="main-layout">
        {{-- Sidebar --}}
        @include('partial.sidebar')

        {{-- Profile bar --}}
        {{--@include('partial.profilebar')--}}

        {{-- Content --}}
        <div class="content">
            <div class="container">
                <h1>Add Activity</h1>
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="A_Activity_name">Title:</label>
                        <input type="text" id="A_Activity_name" name="A_Activity_name" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_details">Purpose:</label>
                        <textarea id="A_Activity_details" name="A_Activity_details" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_date">Date:</label>
                        <input type="date" id="A_Activity_date" name="A_Activity_date" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_time">Time:</label>
                        <input type="time" id="A_Activity_time" name="A_Activity_time" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add Activity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
