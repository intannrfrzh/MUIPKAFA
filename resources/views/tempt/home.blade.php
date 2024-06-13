<!DOCTYPE html>

<html lang="en">

<head>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

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
            justify-content: center;
        }


/* Content styles */
.content {
            flex: 1;
            background-color: #fff;
            Center-align: center;
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
        
            {{-- Content --}}
            <div class="content shadow p-3 mb-5 bg-body-tertiary rounded">

            <h1 class="text-center">Welcome to KAFA Management System</h1>
                <div class="image">
                    <img src="{{ asset('image/bgmainpage.png') }}" alt="Logo">
    </div>


        </div>
            
        </div>
    </div>

</body>

</html>