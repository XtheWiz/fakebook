<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "Comment";

    public function owner() {
      return $this->belongsTo(User::class, 'ownerUser');
    }
}
