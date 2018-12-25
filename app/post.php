<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{	
		use SoftDeletes;

		protected $fillable = ['title','content','category_id','featured','slug'];

		public function getFeaturedAttribute($featured){

			return asset($featured);
		}

     	public function category(){
			return $this->belongsTo('App\category');
			}

		public function tags(){
			return $this->belongsToMany('App\Tag');

		}	

		protected $dates=['deleted_at'];
}
