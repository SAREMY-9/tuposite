<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class CategoriesController extends Controller
{
    public function catSubcatList(Request $request)
    {
        $data = [
            'pageTitle' => 'Categories & Subcategories Management'
        ];

        return view('back.pages.admin.cats-subcats-list', $data);
    }



    public function addCategory(Request $request){

        $data = [

            'pageTitle' => 'Tupo.Add Category'
        ];

        return view('back.pages.admin.add-category', $data); 

    }


    public function storeCategory(Request $request){

        //validate the form

        $request->validate([
            
            'category_name'=>'required|min:5|unique:categories,category_name',
            'category_image'=>'required|image|mimes:png,jpg,jpeg,svg',
        
        ],  
    [


        'category_name.required'=>':Attribute is required',
        'category_name.min'=>':Attribute must contain atleast 5 characters',
        'category_name.unique'=>'This :Attribute already exists',
        'category_image.required'=>':Attribute is required',
        'category_image.image'=>':Attribute must be an image',
        'category_image.mimes'=>':Attribute must be in JPG,JPEG,PNG or SVG format'
    ]);

        if($request->hasFile('category_image')){

            $path = 'images/categories/';
            $file = $request -> file('category_image');
            $filename= time().'_'.$file->getClientOriginalName();


            if(!File::exists(public_path($path))){

                File::makeDirectory(public_path($path), 0755, true);
            }

            //upload category 

            $upload =$file ->move(public_path($path), $filename);

            if($upload){

                //save category into database

                $category = new Category();
                $category ->category_name = $request -> category_name;
                $category->category_image = $filename;
                $saved = $category ->save();

                if($saved){

                    return redirect()->route('admin.manage-categories.add-category')->with('success',
                    '<b>'.ucfirst($request->category_name). '</b> category has been successfully added.');
                }

                else{

                    return redirect()->route('admin.manage-categories.add-category')->with('fail',
                    'Something went wrong. Try again later.');


                }

            }

            else {

                return redirect()->route('admin.manage-categories.add-category')->with('fail',
                'Something went wrong while uploading category image.');
            }
        }


    }
}
