<?php

namespace App\Http\Controllers\Api;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Auth;

class UserController extends ApiController
{
    public function getUser()
    {
        return $this->ajaxResponse(Auth::user());
    }
}