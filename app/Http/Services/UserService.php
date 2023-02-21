<?php

namespace App\Http\Services;

use App\Models\User;

class UserService extends ServiceAbstract {

    public function __construct(){
        parent::__construct(new User());
    }

}