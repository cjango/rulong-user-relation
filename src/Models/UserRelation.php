<?php

namespace RuLong\UserRelation\Models;

use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model
{

    const UPDATED_AT = null;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(config('user_relation.user_model'), 'parent_id');
    }

    public function children()
    {
        return $this->hasManyThrough(config('user_relation.user_model'), UserRelation::class, 'parent_id', 'id', 'user_id', 'user_id');
    }
}