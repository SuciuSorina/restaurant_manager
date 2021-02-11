<?php

namespace App\Http\Controllers;

use App\Category as Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct( Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->getAll();
        // dd($this->category->getAll());
        return view('categories/listing')->withCategories($categories);
        //dd('Afisare');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $inputs = $request->all();
        $category = $this->category->create($inputs);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = $this->category->find($id);

        return view('categories/edit')->withCategory($category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $inputs= $request->all();
        // dd($inputs['name']);
        $checkIfExist= $this->category->where('id','!=', $id)->where('name',$inputs['name'])->exists();
        
        if ($checkIfExist) {
            return back()->with("categoryExists", "Your category name already exists.");
        }

        $category= $this->category->find($id);

        // dd($category);
        $category->update($inputs);
        // dd($inputs);/

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= $this->category->find($id);
        // dd($category);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
