<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth,Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\shop;

class GroceryController extends Controller
{

   
    public function dashboard()
    {
        
       $header="Dashboard";
        return view('grocery.Dashboard',['header'=>$header]);
    }

    public function change_password()
    {
        return view('grocery.ChangePassword');
       
    }
    public function password_update(Request $req)
    {
        $currentpass=auth()->guard('shop')->user()->password;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            shop::where('id',auth()->guard('shop')->user()->id)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        }
        else{
            $data['err']="err";
        }
        echo json_encode($data);
       
    }

    public function edit_shop_profile()
    {
        $shop=shop::where('id',auth()->guard('shop')->user()->id)->first();
        return view('grocery.ShopProfileEdit',['shop'=>$shop]);
    }

     public function shop_profile_update(Request $req)
    {
       
        $shp=shop::where('id',auth()->guard('shop')->user()->id)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$shp->profile_image;
        }
        else{
             $imgWillDelete = public_path() . '/uploads/shop/' . $shp->profile_image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/shop'), $new_name);
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

        
            shop::where('id',auth()->guard('shop')->user()->id)->update([

                'shop_name'=>$req->shname,
                'proprietor'=>$req->name,
                'mail_id'=>$req->mail,
                'location'=>$req->location,
                'address'=>$req->det,
                'pincode'=>$req->pincode,
                'logo'=>$new_name1,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

        public function shop_availability()
    {
        $shop=shop::select('is_available','available_from','available_to','id')->where('id',auth()->guard('shop')->user()->id)->first();
        return view('grocery.ShopAvailability',['shop'=>$shop]);
    }

         public function availability_update(Request $req)
    {
       
        
            shop::where('id',auth()->guard('shop')->user()->id)->update([

                'is_available'=>$req->avl,
                'available_from'=>$req->avlfrom,
                'available_to'=>$req->avlto,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

}
