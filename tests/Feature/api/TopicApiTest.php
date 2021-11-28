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
        
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'user_id',
                    'user',
                    'updated_at',
                    'created_at',
                    'title',
                    'description',
                    'slug',
                    'comment_list',
                    'is_published',
                    'view_count',
                    'published_at',
                    'deleted_at'
                ]
            ]
        ]);
    }

    /**
     * Добавление темы
     *
     * @return void
     */
    public function testCreateTopic()
    {
        $topic = factory(Topic::class)->make();
        $this->postJson('/forum/topic', $topic->toArray())
             ->assertStatus(201)
             ->assertJson([
                'data' => [
                    'title'   => $topic->title,
                    'description' => $topic->description,
                    'user_id' => $topic->user_id,
                    'comment_list' => $topic->comment_list,
                    'slug' => $topic->slug
                ]
            ]);
    }

    /**
     * Детали темы
     *
     * @return void
     */
    public function testShowTopic()
    {
        $topic = factory(Topic::class)->create();
        
        $this->json('GET', route('forum.topic.show', ['topic' => $topic->slug]))
             ->assertStatus(200)
             ->assertJson([
                'data' => [
                    'id' => $topic->id,
                    'title'   => $topic->title,
                    'description' => $topic->description,
                    'user_id' => $topic->user_id,
                    'comment_list' => $topic->comment_list,
                    'slug' => $topic->slug
                ]
             ])
             ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'description',
                    'user_id',
                    'user' => [
                        'id',
                        'name',
                        'email'
                    ],
                    'comment_list' => [
                        '*' => [
                           'content',
                           'user_id',
                           'is_published'
                        ]
                    ],
                    'slug',
                    'view_count'
                ]
            ]);
    }
}
