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

        <center><h1><b>EDIT STUDENT PROFILE</b></h1></center>
            <form method="POST" action="{{ route('admin.updateStudentProfile', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}">
                @csrf
                <div class="form-group">
                    <label for="SR_Student_Name">Name:</label>
                    <input type="text" id="SR_Student_Name" name="SR_Student_Name" value="{{ $student->SR_Student_Name }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="SR_Student_IC">IC Number:</label>
                    <input type="text" id="SR_Student_IC" name="SR_Student_IC" value="{{ $student->SR_Student_IC }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="SR_Student_gender">Gender:</label>
                    <select id="SR_Student_gender" name="SR_Student_gender" class="form-control" required>
                        <option value="Male" {{ $student->SR_Student_gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $student->SR_Student_gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="SR_Student_phone_no">Phone Number:</label>
                    <input type="text" id="SR_Student_phone_no" name="SR_Student_phone_no" value="{{ $student->SR_Student_phone_no }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        
    </div>

</body>

</html>