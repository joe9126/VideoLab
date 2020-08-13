<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Crypt;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(){}

    public function create(Request $request){
         $videos = DB::table("uploads")
            ->select("uploads.*","users.name")
            ->join("users","uploads.uploadedby","=","users.id")
            ->orderBy("uploads.uploaddate","desc")
            ->get(); 

        return response($videos);
    }

    public function show($vid){
     
       $video_data = DB::table("uploads")
                    ->select("uploads.*","users.name")
                    ->join("users","uploads.uploadedby","=","users.id")
                    ->where("uploads.ID","=",$vid)
                    ->get();
     $crypted_data = Crypt::encrypt($video_data);

      $videocomments = DB::table('comments')
        ->select("comments.*","users.name")
            ->join("users","comments.user_ID","=","users.id")
              ->where("comments.video_ID",$vid)
               ->orderBy("comments.created_at","desc")
                ->get();

            $crypted_comments = Crypt::encrypt($videocomments);

   if(isset($crypted_data)){
        return view('pages.videoplayer')->withVideodata($crypted_data)->withVideocomments($crypted_comments);
       // return response()->json(['videodata'=>$crypted_data,'videocomments'=>$crypted_comments]);
     }else{
       // return view('pages.home');
        //return response(null);
     }
        //return view('pages.videoplayer')->withVideodata($crypted_data)->withVideocomments($crypted_comments);       
    }

    public function edit(){}
    public function update(){}
    public function destroy(){}

//POST USER COMMENT
 
 public function postComment(Request $request){
  $video_data = $request->get('videodata');
  foreach (Crypt::decrypt($video_data) as $value) {
      $videoID = $value->ID;
  }
    $usercomment = DB::table('comments')
    ->insert([
        'video_ID'=>$videoID,
            'user_ID'=>Auth::user()->id,
                'comment'=>$request->get('comment'),
                    'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
    ]);
    if(isset($usercomment)){
       
        $commentcount = DB::table('uploads')
                        ->where("id",$videoID)
                        ->update(['comments'=>DB::raw('comments+1')]);

                if(isset($commentcount)){
                     $msg = "Commented posted!"; $status =1;
                }else{
                    $status = 0; $msg ="Something went wrong! Try Again";
                }

    }else{
        $status = 0; $msg ="Something went wrong! Try Again";
    }
    return response()->json(['status'=>$status,'msg'=>$msg]);
 }


/* public function loadComments(Request $request){
    $videocomments = DB::table('comments')
        ->select("comments.*","users.name")
        ->join("users","comments.user_ID","=","users.id")
        ->where("comments.video_ID",$request->get('videoid'))
              ->orderBy("comments.created_at","desc")
                ->get();

    return response($videocomments);
 }*/
}
