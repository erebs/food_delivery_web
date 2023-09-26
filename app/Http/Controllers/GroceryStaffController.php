<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth,Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\staff;

class GroceryStaffController extends Controller
{
     public function add_staff()
    {
        return view('grocery.staff.AddStaff');
    }

         public function staff_add(Request $req)
    {

        if(staff::where('mobile',$req->mobile)->exists())
        {
          $data['err']="error";  
        }
        else
        {
       
          $image = $req->file('img');
          $new_name = time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/license'), $new_name);

            staff::create([
                'name'=>$req->name,
                'mobile'=>$req->mobile,
                'mail_id'=>$req->mail,
                'address'=>$req->det,
                'license'=>$new_name,
                'password'=>bcrypt($req->pass),
                'status'=>'Active',
                'staff_type'=>'Franchise',
                'franchise_id'=>'',
                'shop_id'=>auth()->guard('shop')->user()->id,

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

        public function active_staff()
    {
        $staff=staff::where('shop_id',auth()->guard('shop')->user()->id)->where('status','Active')->latest()->get();

        return view('grocery.staff.ActiveStaff',['staff'=>$staff]);
    }

        public function edit_staff($fid)
    {
        $frid=decrypt($fid);

        $staff=staff::where('id',$frid)->first();

        return view('grocery.staff.StaffEdit',['staff'=>$staff]);
    }

        public function staff_edit(Request $req)
    {

        if(staff::where('mobile',$req->mobile)->where('id','!=',$req->sid)->exists())
        {
          $data['err']="error";  
        }
        else
        {

        $stf=staff::where('id',$req->sid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$stf->license;
        }
        else{
             $imgWillDelete = public_path() . '/upload/license/' . $stf->license;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/license'), $new_name);
            //$ins['Photo']=$new_name;
        }

            staff::where('id',$req->sid)->update([
                'name'=>$req->name,
                'mobile'=>$req->mobile,
                'mail_id'=>$req->mail,
                'address'=>$req->det,
                'license'=>$new_name,

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

        public function staff_psw_update(Request $req)
    {


            staff::where('id',$req->sid)->update([
                'password'=>bcrypt($req->pass),

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

      public function block_staff(Request $req)
    {
       
            staff::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

       public function blocked_staff()
    {
        $staff=staff::where('shop_id',auth()->guard('shop')->user()->id)->where('status','Blocked')->latest()->get();

        return view('grocery.staff.BlockedStaff',['staff'=>$staff]);
    }

        public function activate_staff(Request $req)
    {
       
            staff::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }
}
