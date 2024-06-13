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
            <center><h1><b>STUDENT PROFILE</b></h1></center>
                <div class="form-group">
                    <label for="User_ID">Student ID:</label>
                    <input type="text" id="User_ID" name="User_ID" value="{{ $student->User_ID }}" readonly>
                </div>
                <div class="form-group">
                    <label for="SR_Student_Name">Name:</label>
                    <input type="text" id="SR_Student_Name" name="SR_Student_Name" value="{{ $student->SR_Student_Name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="SR_Student_IC">IC Number:</label>
                    <input type="text" id="SR_Student_IC" name="SR_Student_IC" value="{{ $student->SR_Student_IC }}" readonly>
                </div>
                <div class="form-group">
                    <label for="SR_Student_gender">Gender:</label>
                    <input type="text" id="SR_Student_gender" name="SR_Student_gender" value="{{ $student->SR_Student_gender }}" readonly>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" id="SR_Student_phone_no" name="SR_Student_phone_no" value="{{ $student->SR_Student_phone_no }}" readonly>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
