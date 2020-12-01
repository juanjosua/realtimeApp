<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Prevent non authenticated person to like / unlike.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    /**
     * Like a particular reply.
     *
     * @return \Illuminate\Http\Response
     */
    public function likeIt(Reply $reply)
    {
        $reply->like()->create([
          // 'user_id' => auth()->id()
          'user_id' => '1'
        ]);
    }

    /**
     * Unlike a particular reply.
     *
     * @return \Illuminate\Http\Response
     */
    public function unLikeIt(Reply $reply)
    {
        $reply->like()->where([
          // 'user_id', auth()->id()
          'user_id' => '1'
        ])->first()->delete();
    }
}
