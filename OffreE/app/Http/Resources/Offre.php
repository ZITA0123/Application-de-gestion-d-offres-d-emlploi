<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Offre extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nameoffre'=> $this->nameoffre,
            'nomentreprise' =>  $this->nomentreprise,
            'localisation' => $this->localisation,
            'datedepub' => $this->datedepub,
            'dateexpiration' => $this->dateexpiration,
            'info' => $this->info,
            'discription' => $this->discription,
            'exigence' => $this->exigence,
        ];
    }
}
