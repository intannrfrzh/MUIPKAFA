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
            /* Fixed positioning to keep it at the right side */
            right: 0;
            /* Position it at the right side */
            height: 100vh;
            /* Set the height to full viewport height */
            width: 180px;
            background-color: #fff;
            box-sizing: border-box;
            border-left: 1px solid #89c0ef;
            padding: 10px;
            /* Added padding for content */
            display: flex;
            /* Use flexbox for alignment */
            flex-direction: column;
            /* Stack items vertically */
            align-items: center;
            /* Center items horizontally */
            justify-content: flex-start;
            /* Align items to the start (top) of the container */
        }
    </style>
</head>

<body>
    @include('partial.header')
    <div class="main-layout">
        @include('partial.sidebar_teacher', ['User_ID' => $User_ID])

        <div class="content">
            <h1>Student Results</h1>
            <hr>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Verification Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->User_ID }}</td>
                        <td>
                            @if (isset($results[$student->User_ID]))
                                @if ($results[$student->User_ID] !== null)
                                    @foreach ($results[$student->User_ID] as $result)
                                        <p>{{ $result->R_Result_Verfication }}</p>
                                    @endforeach
                                @else
                                    <p>No results found</p>
                                @endif
                            @else
                                <p>Please add the result</p>
                            @endif
                        </td>
                        <td>
                            @if (!isset($results[$student->User_ID]))
                                <a href="{{ route('teacher.addResult', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}" class="btn btn-primary">
                                    Add Result
                                </a>
                            @else
                                <a href="{{ route('teacher.viewresult', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}" class="btn btn-primary">
                                    View Results
                                </a>
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
