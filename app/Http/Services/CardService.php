<?php

namespace App\Http\Services;

use App\Http\Services\ServiceAbstract;
use App\Models\Card;

class CardService extends ServiceAbstract {

    /**
     * 
     * 
    */
    public function __construct($card){
        parent::__construct($card);
    }

}