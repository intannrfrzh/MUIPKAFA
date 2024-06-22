<!-- resources/views/manageprofile/StudentProfile.blade.php -->

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
        }

        /* Main layout styles */
        .main-layout {
            display: flex;
            flex: 1;
            overflow: hidden;
            
        }


        /* Content styles */
        .content {
            flex: 1;
            background-color: #fff;
            Center-align: center;
            padding: 50px;
            overflow-y: auto;
            max-height: 80vh;
            max-width: 80vw;
        }

        /*picture*/
        .image {
            display: flex;
            justify-content: center;
            margin-top: 200px0px;
            height: 100% auto;
            width: 100% auto;
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

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #555;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    @include('partial.header')

    <div class="main-layout">
        @include('partial.sidebar_admin', ['User_ID' => $User_ID])

        <div class="content shadow p-3 mb-5 bg-body-tertiary rounded">
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

            <a href="{{ route('admin.studentList', ['User_ID' => $User_ID]) }}" class="back-button">Back to Results List</a>
        </div>
    </div>
</body>
</html>
