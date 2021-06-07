<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use Session;
use Redirect;
use Validator;
use Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the categories
        $categories = categories::all();

        // load the view and pass the category
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'description' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        try {
            if ($validator->fails()) {
                return Redirect::to('categories/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                $category = new categories();
                $category->name = $request->get('name');
                $category->description = $request->get('description');
                $category->save();
            }
        }
        catch (\Exception $ex){
            // redirect
            Session::flash('message', 'Error occurred creating category: ' . $ex->getMessage());
            return Redirect::to('categories');
        }

        // redirect
        Session::flash('message', 'Successfully created category!');
        return Redirect::to('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the category
        $category = categories::find($id);

        // show the view and pass the category to it
        return view('categories.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the category
        $category = categories::find($id);

        // show the edit form and pass the category
        return view('categories.edit')
            ->with('category', $category);
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
        $rules = array(
            'name'       => 'required',
            'description' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('categories/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $category = categories::find($id);
            $category->name        = Input::get('name');
            $category->description = Input::get('description');
            $category->save();

            // redirect
            Session::flash('message', 'Successfully updated category!');
            return Redirect::to('categories');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $category = categories::find($id);
        $category->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the category!');
        return Redirect::to('categories');
    }
}
