<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	public function hasManyComments(){
		return $this->hasMany('App\Model\Comment','page_id','id');
	}

}
