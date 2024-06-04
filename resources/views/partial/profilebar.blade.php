<!-- Sprofile bar -->
<div class="profilebar">
<div class="profile-container">
  <i class="fa fa-bell-o" aria-hidden="true"></i>
  <img src="{{ asset('image/jamal.jpg') }}" alt="Profile" class="profile-img">
  </div>
</div>


<style>
.profilebar{
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

/*bell icon*/
.profilebar i{
    margin-right: 10px;
    font-size: 30px;
    width: 50px;
    text-align: center; /* Center the icon */
}

/* Circular profile image */
.profile-img {
    border-radius: 50%; /* Make the image circular */
    width: 60px; /* Set the width */
    height: 60px; /* Set the height */
    object-fit: cover; /* Ensure the image covers the circular frame */
    margin-top: 10px; /* Add some space between the title and image */
}

/* Container for the icon and profile image */
.profile-container {
            display: flex; /* Use flexbox for alignment */
            align-items: center; /* Center items vertically */ 
        }

</style>