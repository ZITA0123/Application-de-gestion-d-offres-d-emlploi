<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;
use App\Http\Resources\Offre as OffreResource;
use App\Http\Resources\OffreCollection;

class OffreController extends Controller
{
    //
    public function index()
    {
        return new OffreCollection(Offre::all());
    }
    public function show($id)
    {
        return new OffreResource(Offre::findOrFail($id));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nameoffre' => 'required',
            'nomentreprise' => 'required',
            'localisation' => 'required',
            'datedepub' => 'required',
            'dateexpiration' => 'required',
            'info' => 'required',
            'discription' => 'required',
            'exigence' => 'required',

        ]);

        $offre = Offre::create($request->all());

        return (new OffreResource($offre))
                ->response()
                ->setStatusCode(201);
    }
    public function delete($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->delete();

        return response()->json(null, 204);
    }
    public function edit($id,Request $request)
    {
        $offre = Offre::findOrFail($id);
        $request->validate([
            'nameoffre' => 'required',
            'nomentreprise' => 'required',
            'localisation' => 'required',
            'datedepub' => 'required',
            'dateexpiration' => 'required',
            'info' => 'required',
            'discription' => 'required',
            'exigence' => 'required',

        ]);
        $input = $request->all();

        $offre->fill($input)->save();
    return  (new OffreResource($offre))
            ->response()
            ->setStatusCode(201);
    }


    public function findbyname($nameoffre)
    {
        return new OffreResource(Offre::findOrFail($nameoffre));
    }

}
