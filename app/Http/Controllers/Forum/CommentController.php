<?php

namespace App\Http\Controllers\Forum;

use Exception;
use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForumCommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentCollection;
use Illuminate\Database\QueryException;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('forum.topic.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $comment = new Comment();
        $comment->topic_id = $request->input('topic_id'); 
        //$topic = Topic::select('id', 'title')->where('id', '=', )
        
        //return view('forum.comment.create', compact('comment'));

        if (!$comment->topic_id) {
            return response()->json(['msg' => "Тема не найдена"]);
        }
        return new CommentResource($comment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ForumCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumCommentRequest $request)
    {
        $data = $request->input();
        
        //$data['user_id'] = Auth::id();
        $data['topic_id'] = $request->input('topic_id');

        $comment = new Comment($data);
        //dd($item);
        $comment->save();

        if (empty($data['topic_id'])) {
            return response()->json(['msg' => "Тема не найдена"]);  
        }
        
        if ($comment) {
            return response()->json(['success' => 'Успешно сохранено']);
        } else {
            return response()->json(['msg' => 'Ошибка сохранения']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ForumCommentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ForumCommentRequest $request, $id)
    {
        $comment = Comment::find($id);
        //Use Policy
        //$this->authorize('update', $comment);

        if (empty($comment)) {
            /*return back()
                ->withErrors(['msg' => "Комментарий id=[{$id}] не найден"])
                ->withInput(); */
            return response()->json(['msg' => "Комментарий id=[{$id}] не найден"]); 
        }

        $data = $request->all();

        if (empty($comment->published_at) && $comment->is_published) {
            $data['published_at'] = Carbon::now();
        }

        $result = $comment->update($data->validated());

        if ($result) {
            /*return redirect()
                ->route('forum.topic.show', $comment->topic->slug)
                ->with(['success' => 'Успешно сохранено']);*/
            return (new CommentResource($comment))->additional(['success' => 'Успешно сохранено']);    

        } else {
            /*return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();*/ 
            return (new CommentResource($comment))->additional(['msg' => 'Ошибка сохранения']);    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        
        //Софт удаление - остается в бд
        $result = Comment::destroy($id);

        //полное удаление из бд
        //$result = Comment::find($id)->forceDelete();
         
        if ($result) {
            return redirect()
                ->route('forum.topic.show', $comment->topic->slug)
                ->with(['success' => "Запись c id[$id] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
