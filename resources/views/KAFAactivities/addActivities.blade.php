<?php 
/*require '/resources/views/KAFAactivities/adminActivitiesController';

if(isset($POST["submit"]))
$A_Activity_name = $_POST['A_Activity_name'];
$A_Activity_details = $_POST['A_Activity_details'];
$A_Activity_datestart = $_POST['A_Activity_datestart'];
$A_Activity_dateend = $_POST['A_Activity_dateend'];
$A_Activity_timestart = $_POST['A_Activity_timestart'];
$A_Activity_timeend = $_POST['A_Activity_timeend'];

$query = "INSERT INTO activities VALUES ('', '$A_Activity_name', '$A_Activity_details', '$A_Activity_datestart', '$A_Activity_dateend', '$A_Activity_timestart', '$A_Activity_timeend')";
mysqli_query($conn, $query);
echo
"<script> alert('Activity added successfully'); </script>";*/
?>
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
                <h1> ADD ACTIVITY</h1>
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="A_Activity_name">TITLE:</label>
                        <input placeholder ="activity name" type="text" id="A_Activity_name" name="A_Activity_name" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_details">PURPOSE:</label>
                        <textarea placeholder ="purpose of the activity" id="A_Activity_details" name="A_Activity_details" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_date">START DATE:</label>
                        <input type="date" id="A_Activity_datestart" name="A_Activity_datestart" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_date">END DATE:</label>
                        <input type="date" id="A_Activity_dateened" name="A_Activity_dateend" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_time">START TIME:</label>
                        <input type="time" id="A_Activity_timestart" name="A_Activity_timestart" required>
                    </div>
                    <div class="form-group">
                        <label for="A_Activity_time">END TIME:</label>
                        <input type="time" id="A_Activity_timeend" name="A_Activity_timeend" required>
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
