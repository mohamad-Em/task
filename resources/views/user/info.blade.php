<link rel="stylesheet" href="../css/user-info.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/posts.css">
<link rel="stylesheet" href="../css\dashboard.css">
<link rel="stylesheet" href="../css\main.css">
<div class="container">
    <div class="main-title-sec">
        <h2>my information:</h2>
    </div>
    <div class="content">
        <div class="content-img">
            <img src={{ asset('images/users/'.Session::get('Pictures')) }} alt="hello">
        </div>
        <div class="content-info">
            <div class="label name">
                <span>name:</span><span> {{ Session::get('Name') }} </span>
            </div>
            <div class="label fullname">
                <span>full name:</span><span> {{ Session::get('Email') }}</span>
            </div>
            <div class="label email">
                <span>email:</span><span> {{ Session::get('Fullname') }}</span>
            </div>

        </div>
    </div>
    <div class="control-btn">
        <a href="{{ url('user/edit/'.Session::get('ID')) }}" >Edit</a>
    </div>
</div>


