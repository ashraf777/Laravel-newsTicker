<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTricker extends Model {

	protected $table = "news_ticker";
	protected $fillable = ['title', 'details', 'priority', 'is_active'];

}
