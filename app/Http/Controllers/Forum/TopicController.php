<?php

namespace App\Http\Controllers\Forum;

use App\Models\Topic;
use App\Models\Comment;
use App\Http\Resources\TopicResource;
use App\Http\Resources\TopicCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForumTopicCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginatorTopic = Topic::where('is_published', true);

        return new TopicCollection(
            $paginatorTopic->paginate(10)
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = new Topic();

        return new TopicResource($topic);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ForumTopicCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumTopicCreateRequest $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        //$data['user_id'] = Auth::id();

        $topic = new Topic($data);
       
        $topic->save();
        
        return new TopicResource($topic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::findOrFail($id);

        event('topicHasViewed', $topic);
        
        return new TopicResource($topic);
    }
}
