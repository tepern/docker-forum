<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Topic
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $user_id
 * @property string $slug
 * @property bool $is_published
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 */

class Topic extends Model
{
    /**
     * Автор темы.
     * 
     * @return \Illumimate\Database\Eloquent\Relations\BelongsTo\
     */
    public function user()
    {
        //Автор темы
        return $this->belongsTo('App\User', 'user_id');
    }
}
