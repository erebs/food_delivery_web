<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth,Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\franchise;
use App\Models\shop;

class FranchiseShopController extends Controller
{
        public function add_shop()
    {
        return view('franchise.shop.AddShop');
    }

       public function active_shops()
    {
        $shop=shop::where('franchise_id',auth()->guard('franchise')->user()->id)->where('status','Active')->latest()->get();
        return view('franchise.shop.ActiveShops',['shop'=>$shop]);
    }

             public function shop_add(Request $req)
    {

        if(shop::where('mobile',$req->mobile)->exists())
        {
          $data['err']="error";  
        }
        else
        {
       
          $image = $req->file('img');
          $new_name = time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/food_safety_license'), $new_name);

          $image1 = $req->file('img1');
          $new_name1 = time() . '.' . $image1->getClientOriginalExtension();
          $image1->move(public_path('uploads/logo'), $new_name1);

            shop::create([
                'shop_type'=>$req->type,
                'shop_name'=>$req->shname,
                'proprietor'=>$req->name,
                'mobile'=>$req->mobile,
                'mail_id'=>$req->mail,
                'location'=>$req->location,
                'address'=>$req->det,
                'pincode'=>$req->pincode,
                'food_safety_license'=>$new_name,
                'logo'=>$new_name1,
                'expiry_date'=>$req->expiry,
                'password'=>bcrypt($req->pass),
                'status'=>'Active',
                'franchise_id'=>auth()->guard('franchise')->user()->id,
                'is_available'=>'Off'

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

    public function edit_shop($sid)
    {
        $shopid=decrypt($sid);

        $shop=shop::where('id',$shopid)->first();

        return view('franchise.shop.ShopEdit',['shop'=>$shop]);
    }

    public function shop_edit(Request $req)
    {

        if(shop::where('mobile',$req->mobile)->where('id','!=',$req->shopid)->exists())
        {
          $data['err']="error";  
        }
        else
        {
            $shp=shop::where('id',$req->shopid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$shp->food_safety_license;
        }
        else{
             $imgWillDelete = public_path() . '/upload/food_safety_license/' . $shp->food_safety_license;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/food_safety_license'), $new_name);
        }

        $img1 = $req->file('img1');
        if($img1=='')
        {
            $new_name1=$shp->logo;
        }
        else{
             $imgWillDelete1 = public_path() . '/upload/logo/' . $shp->logo;
            File::delete($imgWillDelete1);
          $image1 = $req->file('img1');
             $new_name1 = time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('upload/logo'), $new_name1);
        }


            shop::where('id',$req->shopid)->update([
                'shop_type'=>$req->type,
                'shop_name'=>$req->shname,
                'proprietor'=>$req->name,
                'mobile'=>$req->mobile,
                'mail_id'=>$req->mail,
                'location'=>$req->location,
                'address'=>$req->det,
                'pincode'=>$req->pincode,
                'food_safety_license'=>$new_name,
                'logo'=>$new_name1,
                'expiry_date'=>$req->expiry,

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }


            public function shop_psw_update(Request $req)
    {


            shop::where('id',$req->sid)->update([
                'password'=>bcrypt($req->pass),

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

      public function block_shop(Request $req)
    {
       
            shop::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

       public function blocked_shops()
    {
        $shop=shop::where('franchise_id',auth()->guard('franchise')->user()->id)->where('status','Blocked')->latest()->get();

        return view('franchise.shop.BlockedShops',['shop'=>$shop]);
    }

        public function activate_shop(Request $req)
    {
       
            shop::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

        public function view_shop($sid)
    {
        $shopid=decrypt($sid);

        $shop=shop::where('id',$shopid)->first();

        return view('franchise.shop.Profile',['shop'=>$shop]);
    }

}
