<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{


	use SoftDeletes;

	protected $fillable = [
        'title','content','category_id','featrued','slug',
    ];

public function grtFrstruedAttribute($featrued)
{
	return asset($featrued);
}

protected $dates = ['deleted_at'];
      public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
