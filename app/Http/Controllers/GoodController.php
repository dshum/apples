<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;

class GoodController extends Controller
{
	public function __construct()
	{
		// $this->middleware('guest');
	}

	public function index(Request $request, $id)
	{
		$scope = [];

		$currentGood = Good::find($id);

		if (! $currentGood) {
			return redirect()->route('welcome');
        }
        
        $goods = cache()->tags('goods')->remember('goods', 1440, function() {
			return Good::where('hide', false)->orderBy('order')->get();
		});

        $scope['currentGood'] = $currentGood;
        $scope['goods'] = $goods;

		return view('good', $scope);
	}
} 