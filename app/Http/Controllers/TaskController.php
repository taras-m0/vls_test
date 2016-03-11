<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TaskController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function task1()
	{
		$phones = DB::table('task1')->take(100)->get();

		foreach($phones as $phone){
			if(preg_match('/^\+(.*)/', $phone->Phone, $matches)){
				$clear = '+' . preg_replace('/[^\d]+/', '', $phone->Phone);
			}else{
				$clear = preg_replace('/[^\d]+/', '', $phone->Phone);
			}

			if(preg_match('/^\+/', $clear)){
				$phone->E = $clear;
			}elseif(preg_match('/^8(.*)/', $clear, $matches)){
				$phone->E = '+7' . $matches[1];
			}elseif(preg_match('/\d{10,}/', $clear)){
				$phone->E = '+' . $clear;
			}else{
				$phone->E = 'unknown';
			}
		}

		return view('task1', array('phones' => $phones));
	}

	public function task2()
	{
		$sql = '
     		SELECT DISTINCT t2.*

               FROM (SELECT GROUP_CONCAT(DISTINCT Phone) AS Phone_sort
                      FROM (
                        SELECT  Phone
                           FROM task2
                           ORDER BY Date  DESC
                           ) t3
                    )t1

            JOIN task2 t2

            ORDER BY FIND_IN_SET(t2.Phone, t1.Phone_sort), t2.Date DESC
		';

		$orders = DB::select($sql);

		return view('task2', array('orders' => $orders));
	}

	public function task3()
	{
		return view('task3');
	}
}
