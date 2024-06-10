<!DOCTYPE html>
<html lang="en">
<head>
    @include('partial.head')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .content {
            padding: 20px;
            overflow-y: auto;
        }
        .print-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .print-button:hover {
            background-color: #45a049;
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
    @include('partial.header', ['User_ID' => $User_ID])
    <div class="content">
        <h1>Results for {{ $student->SR_Student_Name }}</h1>
        <hr>
        
        <button class="print-button" onclick="window.print()">Print Results</button>
        
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Subject Name</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ $result->S_Subject_ID }}</td>
                    <td>
                        @if($result->subject)
                            {{ $result->subject->S_Subject_name }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $result->R_Result_grade }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
