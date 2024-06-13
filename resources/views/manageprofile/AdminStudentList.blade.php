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
            padding: 20px;
            overflow-y: auto;
        }


</style>
</head>

<body>
    {{-- Header --}}
@include('partial.header')

    
    
    {{-- Main layout --}}
    <div class="main-layout">
        {{-- Sidebar --}}
        @include('partial.sidebar_admin')
        
            {{-- Content --}}
        <div class="content">

        {{-- Controller yg ni pakai KafaController --}}
        <h1>Student List</h1>
    <table class="table table-success table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>User ID</th>
                <th>Student Name</th>
                <th>Student IC</th>
                <th>Student Gender</th>
                <th>Student Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->User_ID }}</td>
                    <td>{{ $student->SR_Student_Name }}</td>
                    <td>{{ $student->SR_Student_IC }}</td>
                    <td>{{ $student->SR_Student_gender }}</td>
                    <td>{{ $student->SR_Student_phone_no }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!--end content-->
        </div>
    </div>

</body>

</html>