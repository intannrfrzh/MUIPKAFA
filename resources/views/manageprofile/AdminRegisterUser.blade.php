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
        <form id="registrationForm" method="POST" action="{{ route('admin.storeUser',  ['User_ID' => $User_ID, 'studentId'])  }}">
    @csrf
<h1>Register Student </h1>
    <div class="mb-3">
        <label for="User_ID" class="form-label">Student User ID</label>
        <input type="text" class="form-control" name="User_ID" id="User_ID" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Student IC (used for password)</label>
        <input type="text" class="form-control" name="password" id="password" required>
        <input type="hidden" name="role" value="student">
    </div>

    

    <button type="submit" class="btn btn-primary">Next</button>
</form>

        </div>
    </div>

</body>

</html>
