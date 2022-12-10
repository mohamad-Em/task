<link rel="stylesheet" href="../../css/user-info.css">
<link rel="stylesheet" href="../../css/forms.css">
<link rel="stylesheet" href="../../css/posts.css">
<link rel="stylesheet" href="../../css\dashboard.css">
<link rel="stylesheet" href="../../css\main.css">
<div class="container">
    <div class="header-sec">
        <div class="icon"><i class="fas fa-bars"></i></div>
        <a href="{{ url('user/addPic/'.$viewAlbum[0]->albumID) }}" class="logut-btn">
            addPic<i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
<div class="container">
    <div class="main-title-sec">
        <h2>all pictures:</h2>
    </div>
    @foreach ($pictures as $picture )
    <div class="content">
        <div class="content-img">
            <img src={{ asset('images/pictures/'.$picture->picture) }} alt="hello">
        </div>

        <div class="content-info">
            <div class="label name">
                <span>picture Name:</span><span> {{ $picture->pictureName }} </span>
            </div>
            <div class="content-info">
                <div class="label name">
                    <span>album Name:</span><span> {{ $picture->albumName }} </span>
                </div>
            </div>
            <div class="control-btn">
                <a href="{{ url('user/deletePicture/'.$picture->picturesID) }}" id="confirm">delete</a>
                <a href="{{ url('user/editPicture/'.$picture->picturesID) }}" >edit</a>
            </div></div></div>
    @endforeach
