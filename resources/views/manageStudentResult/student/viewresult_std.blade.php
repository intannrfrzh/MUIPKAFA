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

        /* Search bar styles */
        .search-bar {
            background-color: #f1f1f1;
            border-radius: 20px;
            padding: 5px 10px;
            display: flex;
            align-items: center;
            width: 250px;
        }

        .search-bar input[type="text"] {
            border: none;
            outline: none;
            padding: 5px;
            font-size: 16px;
            width: 200px;
        }

        .search-bar button {
            background-color: transparent;
            border: none;
            outline: none;
            cursor: pointer;
        }

        .addconbar {
            position: fixed;
            right: 0;
            height: 100vh;
            width: 180px;
            background-color: #fff;
            box-sizing: border-box;
            border-left: 1px solid #89c0ef;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @include('partial.header')

    {{-- Main layout --}}
    <div class="main-layout">
        {{-- Sidebar --}}
        @include('partial.sidebar_student', ['User_ID' => $User_ID])

        {{-- Content --}}
        <div class="content">
            <h1>STUDENT RESULT</h1>
            <hr>
            <p>STUDENT NAME: {{ $student->SR_Student_Name }}</p>
            <p>STUDENT ID: {{ $student->User_ID }}</p>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>CODE</th>
                        <th>SUBJECT NAME</th>
                        <th>GRADE</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($results as $result)
                    <tr>
                        <td>{{ $result->S_Subject_ID }}</td>
                        <td>{{ $result->subject->S_Subject_name }}</td>
                        <td>{{ $result->R_Result_grade }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Print Button -->
            <button onclick="window.print()" 
            style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Print Result</button>
        </div>
        {{-- end Content --}}
    </div>
    {{--end Main layout --}}
</body>

</html>
