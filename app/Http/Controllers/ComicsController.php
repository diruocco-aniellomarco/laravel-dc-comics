<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());
        $this->validation($data);

        $comic = new Comic();
        $comic->fill($data);
        $comic->save();
        return redirect()->route('comics.show', $comic);
        // aggiungi sul model comic protected $fillable = [array di dati da riempire]
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $this->validation($request->all(), $comic->id);
        
        $comic->update($data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }

    private function validation($data, $id = null){

        $validator = Validator::make(
            $data,
            [
                'title'=> 'required|string|max:100',
                'description'=> 'required',
                'thumb'=> 'required',
                'price'=> 'required|string',
                'series'=> 'required|string|max:100',
                'sale_date'=> 'required|date',
                'type'=> 'required|string|max:50',
            ],
            [
                'title.required'=> 'Il titolo è obbligatorio',
                'title.string'=> 'Il titolo deve essere una stringa',
                'title.max'=> 'Il titolo può essere lungo massimo 100 caratteri',

                'description.required'=> 'La descrizione è obbligatoria',
                
                'thumb.required'=> 'il link img è obbligatorio',
                
                'price.required'=> 'Il prezzo è obbligatorio',
                'price.string'=> 'Il prezzo deve essere una stringa',
                

                'series.required'=> 'Il campo serie è obbligatorio',
                'series.string'=> 'Il campo serie deve essere una stringa',
                'series.max'=> 'Il campo serie può essere lungo massimo 100 caratteri',

                'sale_date.required'=> 'Il campo data di vendita è obbligatorio',
                'sale_date.date'=> 'Il campo data di vendita deve essere una data',
                

                'type.required'=> 'Il tipo è obbligatorio',
                'type.string'=> 'Il tipo deve essere una stringa',
                'type.max'=> 'Il tipo può essere lungo massimo 50 caratteri',
            ]
        )->validate();
        return $validator;
    }
}
