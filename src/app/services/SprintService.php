<?php


namespace App\services;

use App\repositories\SprintRepository;
use App\repositories\SprintCompetenceRepository;


class SprintService {
    
      public function __construct(
       private SprintRepository $sprintrepo ,
       private SprintCompetenceRepository $sprintCompetenceRepo){}

       public function delete (int $id){
            $this->sprintCompetenceRepo->detachAllBySprint($id);
            $this->sprintrepo->delete($id);
       }
}