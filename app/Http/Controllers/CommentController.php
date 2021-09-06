<?php

namespace App\Http\Controllers;

use App\Models\tache;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Models\User;
use App\Http\Controllers\UserAuthController;
use Auth;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        
        if( $request->hasFile('file'))
            { 
                $file=$request->file;
                $filename=$file->getClientOriginalName();
                $request->file->move('assets',$filename);
                $comment->file=$filename;
            }else{
                $comment->file= null;
            }

        $comment->comment = $request->comment;

        //$comment->user()->associate($request->user());
        //$comment->user()->associate('1');
        $comment->user_id = Auth::user()->id;


        $tache = Tache::find($request->tache_id);

        $tache->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        //$reply->user()->associate($request->user());
        //$reply->user()->associate('1');
        $reply->user_id = Auth::user()->id;

        $reply->parent_id = $request->get('comment_id');

        $tache = Tache::find($request->get('tache_id'));

         if( $request->hasFile('file'))
            { 
                $file=$request->file;
                $filename=$file->getClientOriginalName();
                $request->file->move('assets',$filename);
                $reply->file=$filename;

            }else{
                $reply->file= null;
            }

        $tache->comments()->save($reply);

        return back();

    }

    public function download(Request $request, $file)
    
    {
        return response()->download(public_path('assets/'.$file));
    }
}
