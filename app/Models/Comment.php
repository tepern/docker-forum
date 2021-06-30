<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
   /**
     * Тема комментария (Топик).
     * 
     * @return \Illumimate\Database\Eloquent\Relations\BelongsTo\
     */
    public function topic()
    {
        //Тема комментария (Топик)
        return $this->belongsTo(Topic::class);
    }

    /**
     * Автор комментария.
     * 
     * @return \Illumimate\Database\Eloquent\Relations\BelongsTo\
     */
    public function user()
    {
        //Автор комментария
        return $this->belongsTo(User::class);
    }
}
