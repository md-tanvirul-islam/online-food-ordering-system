<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Models\Food;
use App\Services\FoodService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FoodController extends Controller
{
    private $foodService;

    public function __construct(FoodService $foodService)
    {
        $this->foodService = $foodService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(! Auth::user()->can('food-list'), 403);

        if(Auth::user()->hasRole('admin')){
            $food = Food::orderBy('id','desc')->paginate(15);
        }
        else{
            $food = Food::orderBy('id','desc')->where('restaurant_id', '=', Auth::user()->restaurant->id)->paginate(15);
        } 
        return view('backend.crud.food.index',compact('food'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(! Auth::user()->can('food-create'), 403);

        return view('backend.crud.food.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodStoreRequest $request)
    {
        abort_if(! Auth::user()->can('food-store'), 403);
        
        $requestedData = $request->except('_token');

        $food = $this->foodService->store($requestedData);      
        
        return Redirect::back()->withSuccess("$food->name is added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        abort_if(! Auth::user()->can('food-show'), 403);
        
        return view('backend.crud.food.show',compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        abort_if(! Auth::user()->can('food-edit'), 403);
        
        return view('backend.crud.food.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(FoodUpdateRequest $request, Food $food)
    {
        abort_if(! Auth::user()->can('food-update'), 403);
    
        $requestedData = $request->except('_token');

        $food = $this->foodService->update($requestedData, $food);  
        
        return Redirect::back()->withSuccess("$food->name's info is updated");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        abort_if(! Auth::user()->can('food-delete'), 403);
        
        $food->delete();

        return Redirect::back()->withSuccess("$food->name is deleted successfully");
    }
}
