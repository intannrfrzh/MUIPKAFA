<body>
    <header class="header">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('image/logokafa.png') }}" alt="Logo" class="d-inline-block align-text-top">
        </div>
        <!-- Search bar container -->
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button><i class="fa fa-search"></i></button>
        </div>
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

    /* Search bar styles */
    .search-bar {
        background-color: #fff;
        border-radius: 20px;
        padding: 5px 10px;
        display: flex;
        align-items: center;
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
</style>
