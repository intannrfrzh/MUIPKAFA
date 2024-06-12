<body>
<header class="header">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('image/logokafa.png') }}" alt="Logo" class="d-inline-block align-text-top">
        </div>


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
    /* Global styles */
    body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

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

    /* Profile container styles */
        .profile-container {
            padding: 10px;
            background-color: #f4f4f4;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-radius: 10px; /* Added rounded corners */
            margin: 5px; /* Added margin to avoid container touching edges */
        }

        .profilebar {
            display: flex;
            align-items: center;
        }

        .profilebar i {
            margin-right: 5px;
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
