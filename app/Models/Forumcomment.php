<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forumcomment extends Model
{
    use HasFactory;

    protected $table = 'forumcomments';
    public $timestamps = false;

    public function forum(){
        return $this->belongsTo(Forum::class, 'fc_forum_fk');
    }

    public function users(){
        return $this->belongsTo(Userlogin::class, 'fc_uid');
    }
}
