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

    .addconbar{
    position: fixed; /* Fixed positioning to keep it at the right side */
    right: 0; /* Position it at the right side */
    height: 100vh; /* Set the height to full viewport height */
    width: 180px;
    background-color: #fff; 
    box-sizing: border-box;
    border-left: 1px solid #89c0ef;
    padding: 10px; /* Added padding for content */
    display: flex; /* Use flexbox for alignment */
    flex-direction: column; /* Stack items vertically */
    align-items: center; /* Center items horizontally */
    justify-content: flex-start; /* Align items to the start (top) of the container */
}

</style>
</head>

<body>
    {{-- Header --}}
@include('partial.header')

    
    
    {{-- Main layout --}}
    <div class="main-layout">
        {{-- Sidebar --}}
        @include('partial.sidebar_student')
        
        
            {{-- Content --}}
        <div class="content">
            <h1>STUDENT RESULT</h1>
            <hr>
            <p>STUDENT NAME : </p>
            
            <p>STUDENT ID : </p>

            <table class="table table-bordered">
                <thead>
                <th>
                    CODE
                </th>
                <th>
                    SUBJECT NAME
                </th>
                <th>
                    GRADE
                </th>
                </thead>

                <tbody class="table-group-divider">
                <tr>

                </tr>
                <tr>
                    
                </tr>
                <tr>
                    
                </tr>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>