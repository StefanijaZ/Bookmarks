<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Tag;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{

    public function index()
    {

        $tags=Tag::with('getBookmarks')->get()->sortByDesc(function ($tag){
            return $tag->getBookmarks->count();
        });
        $i = 1;
        return view('home', ['tags'=>$tags, 'i'=>$i]);
    }

    public function info(Tag $tag)
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        $userId=Auth::user()->id;
        $bookmarks=Bookmark::where('tag_id', $tag->id)->where('public', 1)->get();
        $i = 1;
        return view('info', ['bookmarks'=>$bookmarks, 'userId'=>$userId, 'i'=>$i]);
    }

    public function home()
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        $userId=Auth::user()->id;
        $bookmarks=Bookmark::where('user_id', $userId)->get()->sortByDesc('created_at');
        $i = 1;
        return view('bookmarks', ['bookmarks'=>$bookmarks, 'i'=>$i]);
    }

    public function delete(Bookmark $bookmark)
    {
        $bookmark->delete();
        return redirect('/home');
    }

    public function edit(Bookmark $bookmark)
    {
        $tags=Tag::all();
        return view('edit', ['bookmark'=>$bookmark, 'tags'=>$tags]);
    }

    public function saveEdit(Request $request, Bookmark $bookmark)
    {
        $bId=$request->input('bId');
        $url=$request->input('url');
        $comment=$request->input('comment');
        $isP=$request->input('isPublic');
        $tagId=$request->input('tag');
        Bookmark::where('id', $bookmark->id)->update(['url'=>$url, 'comment'=>$comment, 'public'=>$isP, 'tag_id'=>$tagId]);
        return redirect('/home');
    }

    public function add()
    {
        $tags=Tag::all();
        return view('add', ['tags'=>$tags]);
    }

    public function saveAdd(Request $request)
    {
        $tName=$request->input('tag_name');
        $tInfo=$request->input('tag_info');

        if($tName!="" && $tInfo!="")
        {
            $tag=Tag::create(['name'=>$tName, 'info'=>$tInfo]);
            $userId=Auth::user()->id;
            $url=$request->input('url');
            $comment=$request->input('comment');
            $isP=$request->input('isPublic');
            Bookmark::create(['url'=>$url, 'comment'=>$comment, 'public'=>$isP, 'tag_id'=>$tag->id, 'user_id'=>$userId]);
        }
        else{
            $userId=Auth::user()->id;
            $url=$request->input('url');
            $comment=$request->input('comment');
            $isP=$request->input('isPublic');
            $tagId=$request->input('tag');
            Bookmark::create(['url'=>$url, 'comment'=>$comment, 'public'=>$isP, 'tag_id'=>$tagId, 'user_id'=>$userId]);
        }

        return redirect('/home');
    }

    public function search(Request $request)
    {
        $url=$request->input('search_url');
        $comment=$request->input('search_comment');
        if($url!="")
        {
            $tags=Tag::whereHas('getBookmarks', function ($query) use ($url) {
                $query->where('url', '=',$url);
            })->get();
        }
        if($comment!="")
        {
            $tags=Tag::whereHas('getBookmarks', function ($query) use ($comment) {
                $query->where('comment', '=',$comment);
            })->get();
        }
        $i=1;
        return view('home', ['tags'=>$tags, 'i'=>$i]);
    }
}
