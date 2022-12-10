<link rel="stylesheet" href="../css/user-info.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/posts.css">
<link rel="stylesheet" href="../css\dashboard.css">
<link rel="stylesheet" href="../css\main.css">

<div class="container">
    <div class="header-sec">
        <div class="icon"><i class="fas fa-bars"></i></div>
        <a href="{{ url('user/addAlbum',Session::get('ID')) }}" class="logut-btn">
            add<i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
<div class="container">
    <div class="main-title-sec">
        <h2>my album:</h2>
    </div>

    @foreach ($albums as $album )

    <div class="content">
        <div class="content-img">
            <img src={{ asset('images/album/'.$album->albumImage) }} alt="hello">
        </div>
        <div class="content-info">
            <div class="label name">
                <span>album Name:</span><span> {{ $album->albumName }} </span>
            </div>

            <div class="label fullname">
                <span>user name:</span><span> {{ Session::get('Name') }}</span>
            </div>

        </div>
    </div>
    </div>
    <div class="control-btn">
        <a href="{{ url('user/deleteAlbum/'.$album->albumID) }}" id="delete">delete</a>
        <a href="{{ url('user/viewAlbum/'.$album->albumID) }}" >view</a>
    </div>

</div>
@endforeach

<script>
    @include('sweetalert::alert');
</script>
