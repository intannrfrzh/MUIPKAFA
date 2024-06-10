<!DOCTYPE html>
<html lang="en">

<head>
    @include('partial.head')
    <style>
        /* Global styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Main layout styles */
        .main-layout {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        /* Sidebar styles */
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

        /* Content styles */
        .content {
            margin-left: 220px;
            padding: 20px;
            flex: 1;
            overflow-y: auto;
            background-color: #fff;
        }

        .container {
            margin: 20px;
            max-width: 800px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #394264;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #394264;
        }

        .form-group input,
        .form-group textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-group button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 50, 0.9);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
            z-index: 1000;
        }

        .popup button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup button:hover {
            background-color: #0056b3;
        }

        /* Overlay styles */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Success message styles */
        .success-message {
            display: none;
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1001;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .container {
                margin: 20px auto;
                width: calc(100% - 40px);
            }
        }
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
        {{-- @include('partial.profilebar') --}}

        {{-- Content --}}
        <div class="content">
            <div class="container">
            <center><h1><b>UPDATE ACTIVITY</b></h1></center>
                <form id="updateForm" action="{{ route('update', $activity->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="A_Activity_name">TITLE:</label>
                        <input placeholder="activity name" type="text" id="A_Activity_name" name="A_Activity_name" value="{{ $activity->A_Activity_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_details">PURPOSE:</label>
                        <textarea placeholder="purpose of the activity" id="A_Activity_details" name="A_Activity_details" required>{{ $activity->A_Activity_details }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_datestart">START DATE:</label>
                        <input type="date" id="A_Activity_datestart" name="A_Activity_datestart" value="{{ $activity->A_Activity_datestart }}" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_dateend">END DATE:</label>
                        <input type="date" id="A_Activity_dateend" name="A_Activity_dateend" value="{{ $activity->A_Activity_dateend }}" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_timestart">START TIME:</label>
                        <input type="time" id="A_Activity_timestart" name="A_Activity_timestart" value="{{ $activity->A_Activity_timestart }}" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_timeend">END TIME:</label>
                        <input type="time" id="A_Activity_timeend" name="A_Activity_timeend" value="{{ $activity->A_Activity_timeend }}" required>
                    </div>
                    
                    <center><div class="form-group">
                        <th>
                        <button type="button" onclick="showPopup()">UPDATE</button>
                        </th>
                        <th>
                        <button type="button" onclick="history.back()">BACK</button>
                        </th>
                    </div></center>
                    
                </form>
            </div>
        </div>
    </div>

    {{-- Popup --}}
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <p>The content will be changed! Continue?</p>
        <button onclick="confirmUpdate()">CONFIRM</button>
        <button onclick="closePopup()">CANCEL</button>
    </div>
    <div class="success-message" id="success-message">Activity has been successfully updated!</div>

    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function confirmUpdate() {
            // Show the success message
            document.getElementById('success-message').style.display = 'block';
            // timeout success message
            setTimeout(function() {
            document.getElementById('updateForm').submit();
            }, 1000);
        }
    </script>
</body>

</html>
