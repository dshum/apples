<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;

class PageController extends Controller
{
	public function __construct()
	{
		// $this->middleware('guest');
	}

	public function index(Request $request)
	{
		$scope = [];

		if ($request->routeIs('delivery')) :
			$element = Section::find(1);
		elseif ($request->routeIs('contacts')) :
			$element = Section::find(2);
		else :
			$element = null;
		endif;

		if (! $element) {
			return redirect()->route('welcome');
		}

		$scope['element'] = $element;

		return view('page', $scope);
	}
} 