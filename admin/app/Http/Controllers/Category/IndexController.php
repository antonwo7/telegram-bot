<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        return CategoryResource::collection(Category::all());
    }
}
