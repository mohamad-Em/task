<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album;
use App\Http\Requests\EditAlbum;
use App\Http\Requests\Login;
use App\Http\Requests\Pictures;
use App\Http\Requests\Register;
use App\Http\Requests\Update;
use App\Models\Album as ModelsAlbum;
use App\Models\Pictures as ModelsPictures;
use App\Models\Users;
use App\trait\userTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    use userTrait;
    public function index()
    {
        return view('user.index');
    }
    public function login(Login $request)
    {
        $login = Users::where([
            'userEmail' => $request->userEmail,
            'userPassword' => sha1($request->userPassword),
        ])->get();
        if(count($login) > 0)
        {
            session(['ID'=>$login[0]->userID]);
            session(['Name'=>$login[0]->userName]);
            session(['Email'=>$login[0]->userEmail]);
            session(['Fullname'=>$login[0]->userFullname]);
            session(['Pictures'=>$login[0]->userPictures]);
            return redirect()->intended('user/dashboard');
        }
    }
    public function register()
    {
        return view('user.register');
    }
    public function save(Register $request)
    {
        $fileName = $this->saveImage($request->userPictures,'images/users');
        $save = Users::create([
            'userName' => $request->userName,
            'userEmail' => $request->userEmail,
            'userPassword' => sha1($request->userPassword),
            'userFullname' => $request->userFullname,
            'userPictures' => $fileName,
        ]);
        if($save)
        {
            return view('user.index');
        }
    }
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function info()
    {
        return view('user.info');
    }
    public function edit($ID)
    {
        $ID = Session::get('ID');
        $edit = Users::where('userID',$ID)->get();
        return view('user.edit',compact('edit'));
    }
    public function update(Update $request , $ID)
    {
        $ID = Session::get('ID');
        $update = Users::where('userID',$ID)->update([
            'userName' => $request->userName,
            'userEmail' => $request->userEmail,
            'userFullname' => $request->userFullname,
        ]);
        if($update)
        {
            Session::flush();
            Auth::logout();
            return redirect()->route('index');
        }
    }
    public function albums()
    {
        $userID = Session::get('ID');
        $albums = DB::table('users')
                ->join('album','users.userID','=','album.user_ID')
                ->where('users.userID',$userID)
                ->get();
        return view('user.albums',compact('albums'));

    }
    public function addAlbum($ID)
    {
        $ID = Session::get('ID');
        return view('user.addAlbum',compact('ID'));
    }
    public function saveAlbum(Album $request , $ID)
    {
        $ID = Session::get('ID');
        $fileName = $this->saveImage($request->albumImage,'images/album');
        $saveAlbum = ModelsAlbum::create([
            'albumName' => $request->albumName,
            'albumImage' => $fileName,
            'user_ID' => $ID
        ]);
        if($saveAlbum)
        {
            return redirect()->route('albums');
        }
    }
    public function viewAlbum($ID)
    {
        $viewAlbum = ModelsAlbum::where('albumID',$ID)->get();
        $pictures = DB::table('album')
                ->join('pictures','album.albumID','=','pictures.album_ID')
                ->where('album.albumID',$ID)
                ->get();
        return view('user.viewAlbum',compact('viewAlbum','pictures'));
    }
    public function addPic($ID)
    {
        return view('user.addPic',compact('ID'));
    }
    public function savePic(Pictures $request , $ID)
    {
        $fileName = $this->saveImage($request->picture,'images/pictures');
        $save = ModelsPictures::create([
            'pictureName' => $request->pictureName,
            'picture' => $fileName,
            'album_ID' => $ID
        ]);
        if($save)
        {
            return redirect()->route('viewAlbum',$ID);
        }
    }

    public function deleteAlbum($ID)
    {

    }

    public function editPicture($ID)
    {
        $allAlbums = ModelsAlbum::all();
        return view('user.editPicture',compact('allAlbums','ID'));
    }
    public function updatePic(EditAlbum $request , $ID)
    {
        $update = ModelsPictures::where('picturesID',$ID)->update([
            'pictureName' => $request->pictureName,
            'album_ID' => $request->album_ID,
        ]);
        if($update)
        {
            return redirect()->route('albums');
        }
    }
    public function deletePicture($ID)
    {
        $del = ModelsAlbum::where('albumID',$ID)->delete();
        if($del)
        {
            return view('user.albums');
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
}
