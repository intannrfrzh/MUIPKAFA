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
@include('partial.header', ['User_ID' => $User_ID])

    
    
    {{-- Main layout --}}
    <div class="main-layout">
        {{-- Sidebar --}}
        @include('partial.sidebar_admin', ['User_ID' => $User_ID])
        
        {{-- Content --}}
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

            
        
        </div>
        
    </div>

</body>

</html>