<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\NewsTrickerRequest;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Models\NewsTricker;


class NewsTrickerController extends Controller {


	private $newsT;

	public function  __construct(NewsTricker $newsT){

	 	$this->newsT = $newsT;
	 	$this->middleware('auth');

	 }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$limit = 20;
		$newsT = $this->newsT
					->orderBy('id', 'desc')
					->paginate($limit);
		return view('newsTricker.index', compact('newsT'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$newsT = $this->newsT->all();
		return view('newsTricker.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(NewsTrickerRequest $request)
	{
		$limit = 20;
		$activate = 0;
		if( $request['active'] )
			$activate = 1;
		$ticker = $this->newsT->create([
			'title' => $request['title'],
			'details' => $request['details'],
			'priority' => $request['priority'],
			'is_active' => $activate
			]);
		$ticker_id = $ticker->id; //last inserted ID

		return redirect()->route('newsTricker.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$newsT  = $this->newsT->find($id);
		return view('newsTricker.edit', compact('newsT'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(NewsTrickerRequest $request, $id)
	{
		$newsT = [];
		$activate = 0;
		if( $request['active'] )
			$activate = 1;
		$newsT['title'] = $request['title'];
		$newsT['details'] = $request['details'];
		$newsT['priority'] = $request['priority'];
		$newsT['is_active'] = $activate;
		$this->newsT->where('id', $id)->update( $newsT );
		return redirect()->route('newsTricker.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$newsTr = $this->newsT->findOrFail( $id );
		$newsTr->delete();
		return redirect()->route('newsTricker.index');
	}

}
