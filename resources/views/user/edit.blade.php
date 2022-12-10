<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/dashboard.css">
<link rel="stylesheet" href="../../css/styling-forms.css">

<!-- front end  -->
</head>

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >

        <form class="login-form" action="{{ url('user/update',$edit[0]->userID) }}" method="POST">
            @csrf
            <h2 class="login-title">edit</h2>
            <div class="input-field">
                <label for="">userName:</label>
                <input type="text" name="userName" value="{{ $edit[0]->userName }}">
                @error('userName')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <label for="">userEmail:</label>
                <input type="text" name="userEmail" value="{{ $edit[0]->userEmail }}">
                @error('userEmail')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <label for="">userFullname:</label>
                <input type="text" name="userFullname" value="{{ $edit[0]->userFullname }}">
                @error('userFullname')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input class="btn btn-info" type="submit" name="submit" value="update">
            </div>

        </form>
