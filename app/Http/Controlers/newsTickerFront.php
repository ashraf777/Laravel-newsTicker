<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\HomeAjaxRequest;
use App\Http\Requests\HomeRequest;
//use App\Http\Requests\EventStoreRequests;
use App\Http\Requests\ReviewRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

use App\Models\NewsTricker;

class NewsTrickerController extends Controller {

	private $newsTricker;

	public function  __construct(NewsTricker $newsTricker){
		$this->newsTricker = $newsTricker;
	}

		function getNewsTicker(){
    	return $this->newsTricker
    				->whereIsActive(1)
    				->orderBy('created_at', 'desc')
    				->get([
						'news_ticker.id',
						'news_ticker.title',
						'news_ticker.priority'
						])
    				->take(10);
    }

    public function index()
	{
		$newsTicker = $this->getNewsTicker();
		return view('newsTickerFront', compact('newsTicker'));

	}
}