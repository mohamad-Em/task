<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/dashboard.css">
<link rel="stylesheet" href="../../css/styling-forms.css">

<!-- front end  -->
</head>

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >

        <form class="login-form" action="{{ url('user/updatePic',$ID) }}" method="POST">
            @csrf
            <h2 class="login-title">edit picture</h2>
            <div class="input-field">
                <label for="">pictureName:</label>
                <input type="text" name="pictureName" >
                @error('pictureName')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <label for="">albumID:</label>
                <select name="album_ID" class="select">
                    @foreach ($allAlbums as $allAlbum)
                        <option value="{{ $allAlbum->albumID }}">{{ $allAlbum->albumName }}</option>
                    @endforeach
                    @error('albumName')
                        <p>{{ $message }}</p>
                    @enderror
                </select>
            </div>

            <div class="input-field">
                <input class="btn btn-info" type="submit" name="submit" value="update">
            </div>

        </form>
