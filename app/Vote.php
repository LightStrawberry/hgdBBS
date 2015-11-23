<?php
/**
 * 1. User can vote a topic;
 * 2. User can vote a reply;
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id', 'votable_id', 'votable_type', 'is'];

    public $timestamps = false;

    public function votable()
    {
        return $this->morphTo();
    }

    public function scopeByWhom($query, $user_id)
    {
        return $query->where('user_id', '=', $user_id);
    }

    public function scopeWithType($query, $type)
    {
        return $query->where('is', '=', $type);
    }
}