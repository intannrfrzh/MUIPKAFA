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

    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        margin: 20px;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Sidebar */
    .sidebar {
        width: 200px;
        position: fixed;
        height: 100%;
        background: #394264;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar img {
        width: 150px;
        margin-bottom: 20px;
    }

    .sidebar a {
        color: #ffffff;
        display: block;
        margin: 10px 0;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .sidebar a:hover {
        background: #4b537d;
    }

    /* Content */
    .content {
        margin-left: 220px;
        padding: 20px;
    }

    /* Button Styles */
    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-warning {
        color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        color: #212529;
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #c82333;
        border-color: #bd2130;
    }

    /* Table Styles */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }

    /* Status Styles */
    .status {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .status.pending {
        background-color: #ffc107;
        color: #212529;
    }

    .status.rejected {
        background-color: #dc3545;
        color: #fff;
    }

    .status.approved {
        background-color: #28a745;
        color: #fff;
    }

    /* Popup styles */
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 50, 0.9);
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        color: white;
        z-index: 1000;
    }

    .popup button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin: 5px;
        cursor: pointer;
        border-radius: 5px;
    }

    .popup button:hover {
        background-color: #0056b3;
    }

    /* Overlay styles */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    /* Button styles */
    .deleteActivities {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .deleteActivities:hover {
        background-color: #c0392b;
    }

</style>
</head>

<body>
    {{-- Header --}}
    @include('partial.header')

    {{-- Main layout --}}
    <div class="main-layout">
        {{-- Sidebar --}}
        @include('partial.sidebar')

        {{-- Profile bar --}}
        {{--@include('partial.profilebar')--}}

        {{-- Content --}}
        <div class="content">
            <div class="container">
                <center><h1><b>MANAGE ACTIVITIES</b></h1></center>
                <h2>Pending Approval</h2>
                <a href="{{ route('create', ['User_ID' => $User_ID]) }}" class="btn btn-primary">ADD ACTIVITY </a>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Purpose</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingActivities as $activity)
                        <tr>
                            <td>{{ $activity->A_Activity_name }}</td>
                            <td>{{ $activity->A_Activity_details }}</td>
                            <td>{{ $activity->A_Activity_datestart }}</td>
                            <td>{{ $activity->A_Activity_dateend }}</td>
                            <td>{{ $activity->A_Activity_timestart }}</td>
                            <td>{{ $activity->A_Activity_timeend }}</td>
                            <td><!--{{ $activity->A_Activity_status }}-->
                                <span class="status {{ strtolower($activity->A_Activity_status) }}">
                                    {{ ucfirst($activity->A_Activity_status) }}
                                </span>
                            </td>
                            <td>
                            <a href="{{ route('activities.show', ['id' => $activity->id, 'User_ID' => $User_ID]) }}" class="btn btn-info">VIEW</a>
                                <a href="{{ route('editActivities', $activity->id) }}" class="btn btn-warning">EDIT</a>
                                <form id="deleteForm{{ $activity->id }}" action="{{ route('destroy', ['id' => $activity->id, 'User_ID' => $User_ID]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="deleteActivities" data-id="{{ $activity->id }}" onclick="showDeletePopup(this)">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2>Approved Activities</h2>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Purpose</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($approvedActivities as $activity)
                        <tr>
                            <td>{{ $activity->A_Activity_name }}</td>
                            <td>{{ $activity->A_Activity_details }}</td>
                            <td>{{ $activity->A_Activity_datestart }}</td>
                            <td>{{ $activity->A_Activity_dateend }}</td>
                            <td>{{ $activity->A_Activity_timestart }}</td>
                            <td>{{ $activity->A_Activity_timeend }}</td>
                            <td>
                            <span class="status approved">
                                    {{ ucfirst($activity->A_Activity_status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('activities.show', ['id' => $activity->id, 'User_ID' => $User_ID]) }}" class="btn btn-info">VIEW</a>
                                <form id="deleteForm{{ $activity->id }}" action="{{ route('destroy', ['id' => $activity->id, 'User_ID' => $User_ID]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="deleteActivities" data-id="{{ $activity->id }}" onclick="showDeletePopup(this)">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h2>Rejected Activities</h2>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Purpose</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rejectedActivities as $activity)
                        <tr>
                            <td>{{ $activity->A_Activity_name }}</td>
                            <td>{{ $activity->A_Activity_details }}</td>
                            <td>{{ $activity->A_Activity_datestart }}</td>
                            <td>{{ $activity->A_Activity_dateend }}</td>
                            <td>{{ $activity->A_Activity_timestart }}</td>
                            <td>{{ $activity->A_Activity_timeend }}</td>
                            <td>
                                <span class="status rejected">
                                    {{ ucfirst($activity->A_Activity_status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('activities.show', ['id' => $activity->id, 'User_ID' => $User_ID]) }}" class="btn btn-info">VIEW</a>
                                <form id="deleteForm{{ $activity->id }}" action="{{ route('destroy', ['id' => $activity->id, 'User_ID' => $User_ID]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="deleteActivities" data-id="{{ $activity->id }}" onclick="showDeletePopup(this)">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    {{-- Popup --}}
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="deletePopup">
        <p>Delete the selected activity?</p>
            <button type="button" onclick="confirmDelete()">CONFIRM</button>
            <button type="button" onclick="closeDeletePopup()">CANCEL</button>
        </form>
    </div>

    <script>
        let deleteActivityId = null;

        function showDeletePopup(button) {
            const activityId = button.getAttribute('data-id');
            deleteActivityId = activityId;
            document.getElementById('deletePopup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
}

        function closeDeletePopup() {
            document.getElementById('deletePopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function confirmDelete() {
            if (deleteActivityId) {
                document.getElementById(`deleteForm${deleteActivityId}`).submit();
            }
        }
    </script>

</body>

</html>
