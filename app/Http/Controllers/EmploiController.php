<?php

namespace App\Http\Controllers;
use App\Repositories\Interfaces\EmploiRepositoryInterface;
use App\Models\Emploi;

use Illuminate\Http\Request;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    var $emploiRepository;
    public function __construct(emploiRepositoryInterface $emploiRepository)
    {
        $this->emploiRepository=$emploiRepository;
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $emplois=$this->emploiRepository->all();
        return response()->json($emplois);
    }
    private function validateRequest($request){
        $request->validate([
            'nom'=>'required| max:60',
            'description'=>'required|max:60',
            'entreprise'=>'required|max:60',
            'exigences'=>'required|max:60',
            'posteVacant'=>'required|max:60',
            'type'=>'required|max:60',
            'remuneration'=>'nullable',
           // 'posteVacant'=>'nullable|max:255'

        ]);
    }

    public function getemploi($id){
        $emploi= $this->emploiRepository->getById($id);
        return response()->json($emploi);
    }
    public function save(Request $request)
    {
        $validateData=$this->validateRequest($request);
        $emploi=new emploi([
            'nom'=>$request->get('nom'),
            'description'=>$request->get('description'),
            'entreprise'=>$request->get('entreprise'),
            'type'=>$request->get('type'),
            'posteVacant'=>$request->get('posteVacant'),
            'exigences'=>$request->get('exigences'),
            'remuneration'=>$request->get('remuneration'),

        ]);
        $this->emploiRepository->save($emploi);
        return response()->json($emploi);
    }
    /*
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\emploi  $emploi
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, emploi $emploi)
    {
        $validateData=$this->validateRequest($request);
        $this->emploiRepository->update($emploi);
        return response()->json($this->emploiRepository->getById($request->get('id')));
    }


    public function delete($id){
        if($this->emploiRepository->delete(($id))){
            return response()->json(["status"=>'suppression effectuÃ©e',200]);
        }
        return response()->json(["status"=>'Erreur suppression ',500]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
