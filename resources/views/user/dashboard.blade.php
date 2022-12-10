<link rel="stylesheet" href="../css\dashboard.css">
<link rel="stylesheet" href="../css\main.css">

<body>

<div class="container">
    <div class="header-sec">
        <div class="icon"><i class="fas fa-bars"></i></div>
        <a href="{{ route('logout') }}" class="logut-btn">
            logout<i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
    <div class="main-title-sec">
        <h2>dashboard:</h2>
    </div>
    <div class="card-container">
        <a href="{{ url('user/info') }}" class="card">
            <i class="card-icon fas fa-running"></i>
            <span class="name">my information</span>
            <span class="num">

            </span>
        </a>
        <a href="{{ url('user/albums') }}" class="card">
            <i class="card-icon fas fa-running"></i>
            <span class="name">all albums  </span>
            <span class="num">

            </span>
        </a>



    </div>



