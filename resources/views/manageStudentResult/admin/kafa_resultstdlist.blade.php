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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    @include('partial.header')
    <div class="main-layout">
        @include('partial.sidebar_admin', ['User_ID' => $User_ID])

        <div class="content">
            <h1>Student Results</h1>
            <hr>

            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Verification Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $student)
                    <tr>
                        <td>{{ $student->User_ID }}</td>
                        <td>{{ $student->SR_Student_Name }}</td>
                        <td>{{ $student->R_Result_Verfication ?? 'No results found' }}</td>
                        <td>
                        @if($student->R_Result_Verfication)      
                        <!--If the student has a result, display the View Results button-->
                                <a href="{{ route('admin.viewresult', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}" 
                                    class="btn btn-primary">
                                    View Results
                                </a>
                                <!--If the verification status is Pending, display edit update button-->
                                @if($student->R_Result_Verfication == 'PENDING')
                                    <a href="{{ route('admin.updateInterface', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}" 
                                        class="btn btn-warning">
                                        Edit Result
                                    </a>
                                @endif
                        @else
                        <!--If the student has no result, display none-->
                                <p>No action needed</p>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
