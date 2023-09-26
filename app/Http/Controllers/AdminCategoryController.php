<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\restaurent_category;
use App\Models\grocery_category;
use Illuminate\Support\Facades\File;

class AdminCategoryController extends Controller
{
     public function restaurent_categories()
    {
         $cat=restaurent_category::where('added_by', 'Admin')->latest()->get();
         return view('admin.category.RestaurentCategories',['cat'=>$cat]);
    }

    public function add_rcategory()
    {
         return view('admin.category.RestaurentCategoryAdd');
    }

        public function rcategory_add(Request $req)
    {

        if(restaurent_category::where('category',$req->cat)->exists())
        {
          $data['err']="error";  
        }
        else
        {
       
          $image = $req->file('img');
          $new_name = time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/restaurent_category'), $new_name);

            restaurent_category::create([
                'category'=>$req->cat,
                'added_by'=>'Admin',
                'image'=>$new_name,
                'desc'=>$req->det,
                'disp_order'=>$req->order,
                'status'=>'Active',

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }


    public function edit_rcategory($cid)
    {
        $catid=decrypt($cid);

        $cat=restaurent_category::where('id',$catid)->first();

        return view('admin.category.RestaurentCategoryEdit',['cat'=>$cat]);
    }

        public function rcategory_edit(Request $req)
    {

        if(restaurent_category::where('category',$req->cat)->where('id','!=',$req->catid)->exists())            
        {
          $data['err']="error";  
        }
        else
        {

        $ct=restaurent_category::where('id',$req->catid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$ct->image;
        }
        else{
             $imgWillDelete = public_path() . '/upload/restaurent_category/' . $ct->image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/restaurent_category'), $new_name);
            //$ins['Photo']=$new_name;
        }


            restaurent_category::where('id',$req->catid)->update([
                'category'=>$req->cat,
                'image'=>$new_name,
                'desc'=>$req->det,
                'disp_order'=>$req->order,

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

          public function block_rcategory(Request $req)
    {
       
            restaurent_category::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

      public function activate_rcategory(Request $req)
    {
       
            restaurent_category::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }


////////////////////////////////////////////////////////////



     public function grocery_categories()
    {
        $cat=grocery_category::where('added_by', 'Admin')->latest()->get();
        return view('admin.category.GroceryCategories',['cat'=>$cat]);
    }


        public function add_gcategory()
    {
         return view('admin.category.GroceryCategoryAdd');
    }

        public function gcategory_add(Request $req)
    {

        if(grocery_category::where('category',$req->cat)->exists())
        {
          $data['err']="error";  
        }
        else
        {
       
          $image = $req->file('img');
          $new_name = time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/grocery_category'), $new_name);

            grocery_category::create([
                'category'=>$req->cat,
                'added_by'=>'Admin',
                'image'=>$new_name,
                'desc'=>$req->det,
                'disp_order'=>$req->order,
                'status'=>'Active',

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }


    public function edit_gcategory($cid)
    {
        $catid=decrypt($cid);

        $cat=grocery_category::where('id',$catid)->first();

        return view('admin.category.GroceryCategoryEdit',['cat'=>$cat]);
    }

        public function gcategory_edit(Request $req)
    {

        if(grocery_category::where('category',$req->cat)->where('id','!=',$req->catid)->exists())            
        {
          $data['err']="error";  
        }
        else
        {

        $ct=grocery_category::where('id',$req->catid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$ct->image;
        }
        else{
             $imgWillDelete = public_path() . '/upload/grocery_category/' . $ct->image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/grocery_category'), $new_name);
            //$ins['Photo']=$new_name;
        }


            grocery_category::where('id',$req->catid)->update([
                'category'=>$req->cat,
                'image'=>$new_name,
                'desc'=>$req->det,
                'disp_order'=>$req->order,

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

          public function block_gcategory(Request $req)
    {
       
            grocery_category::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

      public function activate_gcategory(Request $req)
    {
       
            grocery_category::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }
}
