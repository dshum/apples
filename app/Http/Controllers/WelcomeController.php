<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;

class WelcomeController extends Controller
{
	public function __construct()
	{
		// $this->middleware('guest');
	}

	public function index(Request $request)
	{
		$scope = [];

		$goods = cache()->tags('goods')->remember('goods', 1440, function() {
			return Good::where('hide', false)->orderBy('order')->get();
		});

		$scope['goods'] = $goods;

		return view('welcome', $scope);
	}
} 