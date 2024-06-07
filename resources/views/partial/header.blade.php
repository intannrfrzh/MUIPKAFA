
<body>
    <header class="header">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('image/logokafa.png') }}" alt="Logo" class="d-inline-block align-text-top">
        </div>
        
        <!--notification icon-->
        <i class="fa fa-bell-o" aria-hidden="true"></i>

        <!-- Profile session -->
         
    </header>   
</body>

<style>
    /* Header styles */
    .header {
        background-color: #89c0ef;
        padding: 10px;
        display: flex;
        justify-content: space-between; /* Adjusted to space-between */
        align-items: center;
    }

    /* Logo styles */
    .logo {
        margin-right: auto; /* Push the logo to the left */
    }

    .header img {
        width: 30px;
        height: auto;
        margin-right: 10px;
    }



    /*bell icon*/
.profilebar i{
    margin-right: 10px;
    font-size: 30px;
    width: 50px;
    text-align: center; /* Center the icon */
}


/* Container for the icon and profile image */
.profile-container {
            display: flex; /* Use flexbox for alignment */
            align-items: center; /* Center items vertically */ 
}
</style>
