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

        /* Table styles */
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

        /* Button styles */
        .submit-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .submit-button:hover {
            background-color: #45a049;
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
    @include('partial.header', ['User_ID' => $User_ID])
    <div class="main-layout">
        @include('partial.sidebar_admin', ['User_ID' => $User_ID])

        <div class="content">
            <h1>Results for {{ $student->User_ID }}</h1>
            <hr>

            <p>Student Name: {{ $student->SR_Student_Name }}</p>

            <form action="{{ route('admin.updateVerification', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}" method="POST">
                @csrf
                @method('PUT')

                <table>
                   <thead>
                       <tr>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Grade</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $sresult)
                            <tr>
                                <td>{{ $sresult->S_Subject_ID }}</td>
                                <td>{{ $sresult->S_Subject_name }}</td>
                                <td>{{ $sresult->R_Result_grade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Verify button --}}
                <button type="submit" name="action" value="verify" class="submit-button">Verify Results</button>
                
                {{-- Reject button --}}
                <button type="submit" name="action" value="reject" class="submit-button" style="background-color: #f44336;">Reject Results</button>
                
                <a href="{{ route('admin.resultslist', ['User_ID' => $User_ID]) }}" class="back-button">Back to Results List</a>
            </form>
        </div>
    </div>
</body>

</html>
