<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function articles()
    {
        return $this->belongsTo(Article::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toggleStatus()
    {
        if($this->status == 0)
        {
            $this->status = 1;
            $this->save();
        }else{
            $this->status = 0;
            $this->save();
        }
    }

    public function remove()
    {
        $this->delete();
    }
}
