<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Contracts\Validation\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Sentencia para retornar solo los campos indicados de los registros activos en formato JSON*/

        return Categories::query()->select(['id', 'name', 'amount'])->where('active', '=', 1)->get()->toJson();
    }

    public function show($id)
    {
        /*Sentencia para retornar solo los campos indicados de los registros activos en formato JSON*/

        return Categories::query()->select(['id', 'name', 'amount'])->where('id', '=', $id)->get()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Categories::create($request->all());
        return response()->json($categories);
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
        $categories = Categories::findOrFail($id);
        $categories->name = $request->name;
        $categories->amount = $request->amount;
        $categories->update();
        return $categories;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::findOrFail($id);
        $categories->active = 0;
        $categories->update();
        return $categories;
    }
}
