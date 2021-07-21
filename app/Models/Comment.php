<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $topic_id
 * @property string $content
 * @property bool $is_published
 * @property string|null $published_at
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Topic $topic
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @mixin \Eloquent
 */

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content',
        'topic_id',
        'user_id'
    ];

   /**
     * Тема комментария (Топик).
     * 
     * @return \Illumimate\Database\Eloquent\Relations\BelongsTo\
     */
    public function topic()
    {
        //Тема комментария (Топик)
        return $this->belongsTo('App\Models\Topic', 'topic_id');
    }

    /**
     * Автор комментария.
     * 
     * @return \Illumimate\Database\Eloquent\Relations\BelongsTo\
     */
    public function user()
    {
        //Автор комментария
        return $this->belongsTo('App\User', 'user_id');
    }
}
