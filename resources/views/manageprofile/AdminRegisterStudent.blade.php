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
            center-align: center;
            padding: 50px;
            overflow-y: auto;
            max-height: 80vh;
            max-width: 80vw;
        }

        /* Picture */
        .image {
            display: flex;
            justify-content: center;
            margin-top: 200px0px;
            height: 100% auto;
            width: 100% auto;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @include('partial.header')

    {{-- Main layout --}}
    <div class="main-layout">
        {{-- Sidebar --}}
        @include('partial.sidebar_admin', ['User_ID' => $User_ID])

        {{-- Content --}}
        <div class="content shadow p-3 mb-5 bg-body-tertiary rounded">
        <form method="POST" action="{{ route('admin.storeStudentDetails', ['User_ID' => $User_ID, 'studentId']) }}">
    @csrf
    <h1>Register Student </h1>

    <input type="hidden" name="K_Admin_ID" value="{{ $User_ID }}">
    <div class="form-group">
        <label for="SR_Student_IC">Student ID</label>
        <input type="text" id="User_ID" name="User_ID" value="{{ $studentId }}" class="form-control" required readonly>
    </div>
    <div class="form-group">
        <label for="SR_Student_Name">Student Name</label>
        <input type="text" id="SR_Student_Name" name="SR_Student_Name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="SR_Student_IC">Student IC</label>
        <input type="text" id="SR_Student_IC" name="SR_Student_IC" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="SR_Student_gender">Gender</label>
        <select id="SR_Student_gender" name="SR_Student_gender" class="form-control" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="SR_Student_phone_no">Phone Number</label>
        <input type="text" id="SR_Student_phone_no" name="SR_Student_phone_no" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register Student</button>
</form>

        </div>
    </div>

    

</body>

</html>
