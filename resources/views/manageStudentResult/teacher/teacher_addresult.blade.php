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
        <h1>Results for {{ $student->User_ID }}</h1>
        <hr>
      
        {{-- add student result form --}}
        <form action="{{ route('teacher.storeResult', ['User_ID' => $User_ID]) }}" method="POST"></form>
        @csrf
        <input type="hidden" name="SR_Student_ID" value="{{ $student->User_ID }}">
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Subject Name</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>{{----}}</td>
                    <td>
                        
                    </td>
                    <td>{{----}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</body>
</html>
