<?php

namespace Tests\Feature\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comment;

class CommentApiTest extends TestCase
{
    /**
     * Получение комментариев - редирект на список тем
     *
     * @return void
     */
    public function testGetComments()
    {
        $response = $this->getJson('/forum/comment');

        $response->assertRedirect('/forum/topic');
    }

    /**
     * Добавление комментария
     *
     * @return void
     */
    public function testCreateComment()
    {
        $comment = factory(Comment::class)->make();
        $this->postJson('/forum/comment', $comment->toArray())->assertStatus(200);

        /*$news = factory(News::class)->make();
        $this
            ->json('POST', route('api.news.index'), $news->toArray())
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'title'   => $news->title,
                    'preview' => $news->preview,
                    'content' => $news->content,
                ]
            ]);*/
    }

    /**
     * Обновление комментария
     *
     * @return void
     */
    public function testUpdateComment()
    {
        $comment = factory(Comment::class)->create();
        $editedComment = factory(Comment::class)->make();
        $this->json('PUT', route('forum.comment.update', ['comment' => $comment->id]), $editedComment->toArray())->assertStatus(200);

        /*$news = factory(News::class)->make();
        $this
            ->json('POST', route('api.news.index'), $news->toArray())
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'title'   => $news->title,
                    'preview' => $news->preview,
                    'content' => $news->content,
                ]
            ]);*/
    }

    /**
     * Удаление комментария
     *
     * @return void
     */
    public function testDeleteComment()
    {
        $comment = factory(Comment::class)->create();
        
        $this->json('DELETE', route('forum.comment.destroy', ['comment' => $comment->id]))->assertStatus(204);

        $this->json('GET', route('forum.comment.edit', ['comment' => $comment->id]))->assertStatus(404);

        /*$news = factory(News::class)->make();
        $this
            ->json('POST', route('api.news.index'), $news->toArray())
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'title'   => $news->title,
                    'preview' => $news->preview,
                    'content' => $news->content,
                ]
            ]);*/
    }
}
