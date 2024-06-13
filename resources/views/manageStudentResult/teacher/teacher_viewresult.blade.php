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
    </style>
</head>

<body>
    @include('partial.header', ['User_ID' => $User_ID])
    <div class="main-layout">
    @include('partial.sidebar_teacher', ['User_ID' => $User_ID])

    <div class="content">
        <h1>Results for {{ $student->SR_Student_Name }}</h1>
        <hr>

        <table>
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                    <tr>
                        <td>{{ $result->S_Subject_ID }}</td>
                        <td>{{ $result->S_Subject_name ?? 'N/A' }}</td>
                        <td>{{ $result->R_Result_grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="print-button" onclick="window.print()">Print Results</button>
        <a href="{{ route('teacher.resultslist', ['User_ID' => $User_ID]) }}" class="back-button">Back to Results List</a> 
    </div>
    
    
    </div>
</body>

</html>
