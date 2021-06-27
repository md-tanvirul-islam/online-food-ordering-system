<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class categoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    
    public function index()
    {
        abort_if(! Auth::user()->can('category-list'), 403);

        if(Auth::user()->hasRole('admin')){

            $category = Category::orderBy('id','desc')->paginate(15);
        }
        else{

            // $category = category::orderBy('id','desc')->->paginate(15);
            $category = Category::orderBy('id','desc')->paginate(15);

        } 
        return view('backend.crud.category.index',compact('category'));
    }

    
    public function create()
    {
        abort_if(! Auth::user()->can('category-create'), 403);

        return view('backend.crud.category.create');
        
    }

    
    public function store(categoryStoreRequest $request)
    {
        abort_if(! Auth::user()->can('category-store'), 403);
        
        $requestedData = $request->except('_token');

        $category = $this->categoryService->store($requestedData);      
        
        return Redirect::back()->withSuccess("$category->name is added");
    }

    
    public function show(category $category)
    {
        abort_if(! Auth::user()->can('category-show'), 403);
        
        return view('backend.crud.category.show',compact('category'));
    }

    
    public function edit(category $category)
    {
        abort_if(! Auth::user()->can('category-edit'), 403);
        
        return view('backend.crud.category.edit',compact('category'));
    }

    
    public function update(CategoryUpdateRequest $request, category $category)
    {
        abort_if(! Auth::user()->can('category-update'), 403);
    
        $requestedData = $request->except('_token');

        $category = $this->categoryService->update($requestedData, $category);  
        
        return Redirect::back()->withSuccess("$category->name's info is updated");
        
    }


    public function destroy(category $category)
    {
        abort_if(! Auth::user()->can('category-delete'), 403);
        
        $category->delete();

        return Redirect::back()->withSuccess("$category->name is deleted successfully");
    }
}
