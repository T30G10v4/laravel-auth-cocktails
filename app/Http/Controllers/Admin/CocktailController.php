<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use App\Models\Ingredient;
use App\Models\Technique;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cocktails = Cocktail::all();
        return view('admin.cocktails.index', compact('cocktails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $techniques = Technique::all();
        $ingredients = Ingredient::all();
        return view('admin.cocktails.create', compact('techniques','ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->validate([
            'name' => ['required', 'unique:cocktails', 'max:255'],
            'technique' => ['required', 'max:255'],
            'ingredients.*.id' => ['exists:ingredients,id', 'nullable'],
            'ingredients.*.quantity' => ['nullable']

        ]);
        
        $new_cocktail = Cocktail::create($form_data);

        // $temp = [];

        foreach($form_data['ingredients'] as $ingredient ){
            if(isset($ingredient['id'])  && $ingredient['quantity']){
                // $temp[] = $ingredient;
                $new_cocktail->ingredients()->attach([
                    $ingredient['id'] => [
                        'quantity' => $ingredient['quantity']
                    ]
                ]);
            }
        }
        // dd($temp);
        return redirect()->route('admin.cocktails.index')->with('message', "$new_cocktail->name è stato creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cocktail $cocktail)
    {
        return view('admin.cocktails.show', compact('cocktail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
