<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    use ApiControllerTrait;

    protected $model;

    public function __construct(\App\User $model)
    {
        $this->model = $model;
    }
}
