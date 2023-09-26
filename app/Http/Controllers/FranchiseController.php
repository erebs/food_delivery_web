<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth,Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\franchise;

class FranchiseController extends Controller
{
    public function login()
    {
        return view('franchise.login');
    }

    public function franchise_login(Request $req)
    {
        $rememberStatus=$req->rememberStatus;
        $uname=$req->username;
        $psw=$req->password;
        if($rememberStatus==0)
        {
            if(Auth::guard('franchise')->attempt(['mobile' => $uname, 'password' => $psw]))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }    
        }
        else if($rememberStatus==1)
        {
            
            if(Auth::guard('admin')->attempt(['mobile' => $req->username, 'password' => $req->password],true))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }

        }

        echo json_encode($data);
    }

    public function logout()
    {
        Auth::guard('franchise')->logout();
        return redirect()->route('franchise.login');
    }

   

   
    public function dashboard()
    {
        
       $header="Dashboard";
        return view('franchise.Dashboard',['header'=>$header]);
    }

    public function change_password()
    {
        return view('franchise.ChangePassword');
       
    }
    public function password_update(Request $req)
    {
        $currentpass=auth()->guard('franchise')->user()->password;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            franchise::where('id',auth()->guard('franchise')->user()->id)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        }
        else{
            $data['err']="err";
        }
        echo json_encode($data);
       
    }

    public function edit_franchise_profile()
    {
        $franchise=franchise::where('id',auth()->guard('franchise')->user()->id)->first();
        return view('franchise.FranchiseProfileEdit',['franchise'=>$franchise]);
    }

     public function franchise_profile_update(Request $req)
    {
       
           $fr=franchise::where('id',auth()->guard('franchise')->user()->id)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$fr->profile_image;
        }
        else{
             $imgWillDelete = public_path() . '/admin/img/' . $fr->profile_image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/img'), $new_name);
            //$ins['Photo']=$new_name;
        }
        
            franchise::where('id',auth()->guard('franchise')->user()->id)->update([
                'name'=>$req->cname,
                'mobile'=>$req->cmobile,
                'mail_id'=>$req->cmail,
                'profile_image'=>$new_name,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }


    ////////////////////////////////
}
