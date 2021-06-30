<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->belongsTo(User::class);
    }
}
