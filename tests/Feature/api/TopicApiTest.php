<?php

namespace Tests\Feature\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Topic;

class TopicApiTest extends TestCase
{
    /**
     * Список тем
     *
     * @return void
     */
    public function testPaginatorTopic()
    {
        $response = $this->getJson('/forum/topic');

        $response->assertStatus(200);

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
     * Добавление темы
     *
     * @return void
     */
    public function testCreateTopic()
    {
        $topic = factory(Topic::class)->make();
        $this->postJson('/forum/topic', $topic->toArray())->assertStatus(201);

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
     * Детали темы
     *
     * @return void
     */
    public function testShowTopic()
    {
        $topic = factory(Topic::class)->create();
        
        $this->json('GET', route('forum.topic.show', ['topic' => $topic->slug]))->assertStatus(200);

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
