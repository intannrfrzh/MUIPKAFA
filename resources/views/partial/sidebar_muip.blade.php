<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Side navigation -->
<nav class="sidebar">
  <ul>
      <li>
      <a href="{{ route('muip.home', ['User_ID' => $User_ID]) }}" class="nav-link">
              <i class="fa fa-home" aria-hidden="true"></i>
          Home</a>
      </li>
      <li>
      <a href="{{ route('muip.studentList', ['User_ID' => $User_ID]) }}" class="nav-link">
        <i class="fa fa-user" aria-hidden="true"></i>
          Profile</a>
      </li>
      <li>
      <a href="{{ route('verifyActivities', ['User_ID' => $User_ID]) }}) }}" class="nav-link">
        <i class="fa fa-tasks" aria-hidden="true"></i>
          Activities</a>
      </li>
      <li>
      <a href="#" class="nav-link">
        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
          Payment</a>
      </li>
      <li>
      <a href="{{ route('muip.resultslist', ['User_ID' => $User_ID]) }}" class="nav-link">
        <i class="fa fa-check-square-o"></i>
          Result</a>
      </li>
      </ul>
  </nav>

<style>
/* The sidebar menu */
.sidebar {
  width: 180px; /* Set the width of the sidebar */ 
  left: 0;
  background-color: #89c0ef; 
  box-sizing: border-box;
  margin-top: 20px;
  border-top-right-radius: 50px;
  padding-top: 20px;
}

/* The navigation menu links */
.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: flex;
  align-items: center;
  font-style: normal;
}

/* Icon styling */
.sidebar a i {
  margin-right: 10px;
  width: 30px; /* Set a fixed width for icons */
  text-align: center; /* Center the icon */
}

/* Remove default list styles */
.sidebar ul {
            list-style-type: none; /* Remove default list item marker */
            padding: 0; /* Remove default padding */
            margin: 0; /* Remove default margin */
        }

/* When you mouse over the navigation links, change their color */
.sidebar a:hover {
  color: #f1f1f1;
}

/* Style for the active link */
.sidebar a.active {
            font-weight: bold;
            color: #fff; /* Change the color to differentiate active link */
        }

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<script>
        // JavaScript to handle click events and toggle the active class
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                // Remove the active class from all links
                document.querySelectorAll('.nav-link').forEach(item => item.classList.remove('active'));
                
                // Add the active class to the clicked link
                this.classList.add('active');
            });
        });
    </script>