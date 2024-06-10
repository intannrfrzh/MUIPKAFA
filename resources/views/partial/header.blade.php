<body>
<header class="header">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('image/logokafa.png') }}" alt="Logo" class="d-inline-block align-text-top">
        </div>

        <!-- Notification Icon -->
        <i class="fa fa-bell-o" aria-hidden="true"></i>

        <!-- Profile Session -->
        <div class="profile-container">
            @auth
                <div class="profilebar">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <span>User ID: {{ auth()->user()->User_ID }}</span>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </div>
            @else
                <div class="login-link">
                    <a href="{{ route('login') }}">Login</a>
                </div>
            @endauth
        </div>
    </header>
</body>

<style>
    /* Header styles */
    .header {
        background-color: #89c0ef;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Logo styles */
    .logo {
        margin-right: auto;
    }

    .header img {
        width: 30px;
        height: auto;
        margin-right: 10px;
    }

    /* Bell Icon */
    .profilebar i {
        margin-right: 10px;
        font-size: 30px;
        width: 50px;
        text-align: center;
    }

    /* Container for the icon and profile image */
    .profile-container {
        display: flex;
        align-items: center;
    }

    /* Profile Info Styles */
    .profilebar span {
        margin-right: 10px;
        font-size: 14px;
        color: #333;
    }

    /* Logout Button Styles */
    .logout-button {
        background-color: #ff4d4f;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
        margin-left: 10px;
    }

    .logout-button:hover {
        background-color: #f5222d;
    }

    /* Login Link Styles */
    .login-link a {
        text-decoration: none;
        color: #007bff;
        font-size: 14px;
    }

    .login-link a:hover {
        text-decoration: underline;
    }
</style>
