<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\User;
class FrontendCOntroller extends Controller
{
    public function index(Request $request){

    	$albums = Album::latest()->paginate(50);
    	return view('home',compact('albums'));
    }

    public function userAlbum($id){
    	$albums  = Album::where('user_id',$id)->get();
        if(\Auth::check()){
    	   $userId = $id;
    	   $follows = (new User)->amIfollowing($userId);
        }

        $user = User::where('id',$id)->first();
        $userBgPic= $user->bgpic;
        
       return view('user-album',compact('albums','userId','follows','userBgPic'));
    }

    public function albumCategory($id){
        $albums = Album::where('category_id',$id)->get();
        return view('album-category',compact('albums'));
    }


   
}
