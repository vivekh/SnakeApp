<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Snake;

class SnakesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Snake::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($snake)
	{
        //$snake = array('name' => 'Tigris', 'age' => 9.5, 'sex' => 'f');
        Snake::create($snake);
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function stats(Request $request){
        $days = $request->route('days');
        $snakes = Snake::production($days);
        $livestock = Snake::livestock($days);
        return array('production' => array(array('type' => 'Venom','value' => $snakes['venom'], 'unit' => 'ML'),
                        array('type' => 'Leather', 'value' => $snakes['leather'], 'unit' => 'skins')),
            'cost' => array('type'=>'Food', 'value' => $livestock['mice'],'unit' => 'Mice'));
    }

    public function livestock(Request $request){
        $days = $request->route('days');
        $result = Snake::livestock($days);
        return $result['snakes'];
    }


}
