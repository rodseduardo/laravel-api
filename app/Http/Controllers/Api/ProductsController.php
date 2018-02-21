<?php

namespace App\Http\Controllers\Api;

use App\Products;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    use \App\Http\Controllers\ApiControllerTrait;

    protected $model;

    public function __construct(Products $model)
    {
        $this->model = $model;
    }
}
