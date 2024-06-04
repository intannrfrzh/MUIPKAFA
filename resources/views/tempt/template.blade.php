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
        @include('partial.profilebar')
        
            {{-- Content --}}
        <div class="content">
            <h1>Main Content</h1>
            <p>This is the main content area.</p>
        </div>
    </div>

</body>

</html>