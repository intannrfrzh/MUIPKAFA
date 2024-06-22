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
            Center-align: center;
            padding: 50px;
            overflow-y: auto;
            max-height: 80vh;
            max-width: 80vw;
        }

        /*picture*/
        .image {
            display: flex;
            justify-content: center;
            margin-top: 200px0px;
            height: 100% auto;
            width: 100% auto;
        }
    

</style>
</head>

<body>
    {{-- Header --}}
@include('partial.header')

    
    
    {{-- Main layout --}}
    <div class="main-layout">
        {{-- Sidebar --}}
        @include('partial.sidebar_admin', ['User_ID' => $User_ID])
        
        {{-- Content --}}
        <div class="content shadow p-3 mb-5 bg-body-tertiary rounded">

            <form>
                <h1>Register Student</h1>
                <div class="mb-3">
                    <label for="User_ID" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="User_ID" aria-describedby="User_ID">
                </div>

                <div class="mb-3">
                    <label for="Student_Name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="SR_Student_Name">
                </div>

                
                <div class="mb-3">
                    <label for="Student_Password" class="form-label">Student IC (will be used as password)</label>
                    <input type="password" class="form-control" id="SR_Student_IC">
                </div>

                <div class="mb-3">
                    <label for="Student_Gender" class="form-label">Student Gender</label>
                    <dropdown>
                        <select class="form-select" aria-label="StudentGender">
                            <option selected>Select Gender</option>
                            <option id="SR_Student_gender" value="Male">Male</option>
                            <option id="SR_Student_gender" value="Female">Female</option>
                        </select>
                    </dropdown>
                </div>
                
                <div class="mb-3">
                    <label for="Student_PhoneNum" class="form-label">Student Phone Number</label>
                    <input type="text" class="form-control" id="SR_Student_phone_no">
                </div>

                <!--Submit button-->
                <button type="submit" class="btn btn-primary">Submit</button>

                <!--Delete button-->
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete Results</button>
                
            </form>
        </div>
        
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDeleteModal()">&times;</span>
            <p>Are you sure you want to delete this student?</p>
            <form id="deleteForm" method="POST" action="{{ route('admin.deleteStudentProfile', ['User_ID' => $User_ID, 'studentId' => $student->User_ID]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Yes, Delete Student</button>
            </form>
        </div>
    </div>


    <script>
        // Get the modal elements
        var modal = document.getElementById("myModal");
        var deleteModal = document.getElementById("deleteModal");

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