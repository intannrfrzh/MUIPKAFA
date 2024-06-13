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
            <h1>Add Results for {{ $student->User_ID }}</h1>
            <hr>

            <p>Student Name: {{ $student->SR_Student_Name }}</p>

            <form action="{{ route('teacher.saveResult', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}" method="POST">
            @csrf
            <!-- Hidden input field to store teacher ID -->
            <input type="hidden" name="T_Teacher_ID" value="{{ $teacher->User_ID }}">

            <table>
               <thead>
                   <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Grade</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->S_Subject_ID }}</td>
                            <td>{{ $subject->S_Subject_name }}</td>
                            <td>
                                <input type="hidden" name="subjects[{{ $subject->S_Subject_ID }}][id]" value="{{ $subject->S_Subject_ID }}">
                                <input type="text" name="subjects[{{ $subject->S_Subject_ID }}][grade]" value="{{ $subject->R_Result_grade ?? '' }}" required>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="submit-button">Save Results</button>
            <a href="{{ route('teacher.resultslist', ['User_ID' => $User_ID]) }}" class="back-button">Back to Results List</a>
            </form>

        </div>
    </div>
</body>

</html>
