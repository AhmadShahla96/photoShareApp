<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Follower;

class FollowController extends Controller
{
  
    public function followUnfollow(Request $request){
    	$followerId = User::find(auth()->user()->id);
    	$followingId = User::find($request->userId);
    	$followerId->following()->toggle($followingId);
    	return redirect()->back();
	}

	public function profile(){
		$followings = Follower::where('follower_id',auth()->user()->id)->get();
		foreach($followings as $following){
			$userId = $following->userfollow->id;
			$follows = (new User)->amIFollowing($userId);
		}

		return view('profile',compact('userId','follows','followings'));
	}
	public function updateProfilePic(Request $request){
		$this->validate($request,[
			'image'=>'required|mimes:jpeg,jpg,png'
		]);
		$image = $request->image->store('public/avatar');
		$authUser = auth()->user()->id;
		$user = User::where('id',$authUser)->update(['profilePic'=>$image]);
		return redirect()->back();

	}

	public function userProfilePic($id){
		$user = User::find($id);
		return $user->profilePic;
	}

	public function updatebgPic(Request $request){
		$this->validate($request,[
			'image'=>'required|mimes:jpeg,jpg,png'
		]);
		$image = $request->image->store('public/avatar');
		$authUser = auth()->user()->id;
		$user = User::where('id',$authUser)->update(['bgpic'=>$image]);
		return redirect()->back();

	}

	public function userbgPic($id){
		$user = User::find($id);
		return $user->bgpic;
	}


}
