<?php
namespace App\Repositories\Eloquent;
use App\Models\Emploi;
use App\Repositories\Interfaces\EmploiRepositoryInterface;

class EmploiRepository implements EmploiRepositoryInterface {

    public function all(){
        return Emploi::all();
    }
    public function getById(int $id){
        return Emploi::where('id',$id)->first();
    }
    public function save(Emploi $emploi){
        return $emploi->save();
    }

    public function update(Emploi $emploi){
        return emploi::find($emploi->get('id'))
        ->update([
            'nom'=>$emploi->get('nom'),
            'description'=>$emploi->get('description'),
            'entreprise'=>$emploi->get('entreprise'),
            'exigences'=>$emploi->get('exigences'),
            'posteVacant'=>$emploi->get('posteVacant'),
            'type'=>$emploi->get('type'),
            'remuneration'=>$emploi->get('remuneration')
        ]);
    }
    public function delete(int $id){
        return Emploi::where('id',$id)->delete();
    }
    public function getByName(string $nom)
    {
        return Emploi::where('nom',$nom)->first();
    }

}
