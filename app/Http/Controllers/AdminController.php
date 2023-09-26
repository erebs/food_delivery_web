<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Cache;
use App\Models\admin_detail;
use App\Models\franchise;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function admin_login(Request $req)
    {
        $rememberStatus=$req->rememberStatus;
        $uname=$req->username;
        $psw=$req->password;
        if($rememberStatus==0)
        {
            if(Auth::guard('admin')->attempt(['username' => $uname, 'password' => $psw]))
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
            
            if(Auth::guard('admin')->attempt(['username' => $req->username, 'password' => $req->password],true))
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
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

   

   
    public function dashboard()
    {
        
       $header="Dashboard";
        return view('admin.Dashboard',['header'=>$header]);
    }

    public function change_password()
    {
        return view('admin.ChangePassword');
       
    }
    public function password_update(Request $req)
    {
        $currentpass=auth()->guard('admin')->user()->password;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            admin_detail::where('id',1)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        }
        else{
            $data['err']="err";
        }
        echo json_encode($data);
       
    }

    public function edit_admin_profile()
    {
        $adm=admin_detail::where('id',1)->first();
        return view('admin.AdminProfileEdit',['adm'=>$adm]);
    }

     public function admin_profile_update(Request $req)
    {
       
           $adm=admin_detail::where('id',1)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$adm->profile_image;
        }
        else{
             $imgWillDelete = public_path() . '/admin/img/' . $adm->profile_image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/img'), $new_name);
            //$ins['Photo']=$new_name;
        }
        
            admin_detail::where('id',1)->update([
                'name'=>$req->cname,
                'mobile'=>$req->cmobile,
                'mail_id'=>$req->cmail,
                'profile_image'=>$new_name,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }


    ////////////////////////////////


    public function add_franchise()
    {

        return view('admin.FranchiseAdd');
    }

     public function franchise_add(Request $req)
    {

        if(franchise::where('mobile',$req->mobile)->exists())
        {
          $data['err']="error";  
        }
        else
        {
       
            franchise::create([
                'name'=>$req->name,
                'mobile'=>$req->mobile,
                'mail_id'=>$req->mail,
                'details'=>$req->det,
                'password'=>bcrypt($req->pass),
                'status'=>'Active',
                'profile_image'=>'',


            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

        public function active_franchise()
    {
        $franchise=franchise::where('status','Active')->latest()->get();

        return view('admin.ActiveFranchise',['franchise'=>$franchise]);
    }

        public function edit_franchise($fid)
    {
        $frid=decrypt($fid);

        $franchise=franchise::where('id',$frid)->first();

        return view('admin.FranchiseEdit',['franchise'=>$franchise]);
    }

     public function franchise_edit(Request $req)
    {
        if(franchise::where('mobile',$req->mobile)->where('id','!=',$req->fid)->exists())
        {
          $data['err']="error";  
        }
        else
        {
            franchise::where('id',$req->fid)->update([
                'name'=>$req->name,
                'mobile'=>$req->mobile,
                'mail_id'=>$req->mail,
                'details'=>$req->det,


            ]) ;
            $data['success']="success";
        }

        echo json_encode($data);
       
    }

     public function franchise_psw_update(Request $req)
    {
       
            franchise::where('id',$req->fid)->update([
                'password'=>bcrypt($req->pass),

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

     public function block_franchise(Request $req)
    {
       
            franchise::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

            public function blocked_franchise()
    {
        $franchise=franchise::where('status','Blocked')->latest()->get();

        return view('admin.BlockedFranchise',['franchise'=>$franchise]);
    }

         public function activate_franchise(Request $req)
    {
       
            franchise::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }


            public function view_franchise($fid)
    {
        $frid=decrypt($fid);

        $franchise=franchise::where('id',$frid)->first();

        return view('admin.FranchiseProfile',['franchise'=>$franchise]);
    }


  
   
    
}
