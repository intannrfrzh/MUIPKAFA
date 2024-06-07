<!-- resources/views/KAFAactivities/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    @include('partial.head')
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .main-layout {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        .content {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            overflow-y: auto;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            margin: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .sidebar {
            width: 200px;
            position: fixed;
            height: 100%;
            background: #394264;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar img {
            width: 150px;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #ffffff;
            display: block;
            margin: 10px 0;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #4b537d;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #394264;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #4b537d;
        }
    </style>
</head>

<body>
    @include('partial.header')

    <div class="main-layout">
        @include('partial.sidebar')

        @include('partial.profilebar')

        <div class="content">
            <div class="container">
                <h1>Edit Activity</h1>
                
                @foreach($activities as $activity)

                <form action="{{ route('editActivities', $activity->A_Activity_ID) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="A_Activity_name">Title:</label>
                        <input type="text" id="A_Activity_name" name="A_Activity_name" value="{{ $activity->A_Activity_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="A_Activity_details">Purpose:</label>
                        <textarea id="A_Activity_details" name="A_Activity_details" required>{{ $activity->A_Activity_details }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="A_Activity_date">Date:</label>
                        <input type="date" id="A_Activity_date" name="A_Activity_date" value="{{ $activity->A_Activity_date }}" required>
                    </div>

                    <div class="form-group">
                        <label for="A_Activity_time">Time:</label>
                        <input type="time" id="A_Activity_time" name="A_Activity_time" value="{{ $activity->A_Activity_time }}" required>
                    </div>

                    <div class="form-group">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
