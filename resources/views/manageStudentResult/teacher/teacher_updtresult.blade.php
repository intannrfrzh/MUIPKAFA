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

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('partial.header')
    <div class="main-layout">
        @include('partial.sidebar_teacher', ['User_ID' => $User_ID])

        <div class="content">
            <h1>Edit Result for {{ $student->SR_Student_Name }}</h1>
            <hr>

            <form method="POST" action="{{ route('teacher.updateResult', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}">
                @csrf
                @method('PUT')
                <table>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{ $result->S_Subject_name }}</td>
                            <td>
                                <input type="text" name="grades[{{ $result->S_Subject_ID }}]" value="{{ $result->R_Result_grade }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-warning edit-btn" onclick="openModal()">Edit Results</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete Results</button>
            </form>
        </div>
    </div>

    <!-- The Modal -->
<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Are you sure you want to update these results?</p>
            <form method="POST" action="{{ route('teacher.updateResult', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Yes, Update</button>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDeleteModal()">&times;</span>
            <p>Are you sure you want to delete all results for this student?</p>
            <form id="deleteForm" method="POST" action="{{ route('teacher.deleteResults', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Yes, Delete All</button>
            </form>
        </div>
    </div>


    <script>
        // Get the modal elements
        var modal = document.getElementById("myModal");
        var deleteModal = document.getElementById("deleteModal");

        // Function to open the update modal
        function openModal() {
            modal.style.display = "block";
        }

        // Function to close the update modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Function to open the delete confirmation modal
        function confirmDelete() {
            deleteModal.style.display = "block";
        }

        // Function to close the delete modal
        function closeDeleteModal() {
            deleteModal.style.display = "none";
        }

        // Close the modals if the user clicks outside of them
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == deleteModal) {
                deleteModal.style.display = "none";
            }
        }
    </script>



</body>


</html>
