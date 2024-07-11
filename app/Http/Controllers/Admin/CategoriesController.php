<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function catSubcatList(Request $request)
    {
        $data = [
            'pageTitle' => 'Categories & Subcategories Management'
        ];

        return view('back.pages.admin.cats-subcats-list', $data);
    }
}
