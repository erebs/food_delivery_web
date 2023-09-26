<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\grocery_category;
use App\Models\grocery_item;
use App\Models\grocery_variant;
use App\Models\related_grocery_item;
use Illuminate\Support\Facades\File;

class ShopGroceryController extends Controller
{
     public function add_category()
    {
        return view('grocery.shop.AddCategory');
    }

    public function category_add(Request $req)
    {

        if(grocery_category::where('category',$req->cat)->where('added_by','Admin')->orwhere('added_by',auth()->guard('shop')->user()->id)->exists())
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
                'added_by'=>auth()->guard('shop')->user()->id,
                'image'=>$new_name,
                'desc'=>$req->det,
                'disp_order'=>$req->order,
                'status'=>'Active',

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

        public function active_categories()
    {
        $cat=grocery_category::where('status','Active')
        ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
              })
        ->latest()
        ->get();

        return view('grocery.shop.ActiveCategories',['cat'=>$cat]);
    }

        public function edit_category($cid)
    {
        $catid=decrypt($cid);

        $cat=grocery_category::where('id',$catid)->first();

        return view('grocery.shop.EditCategory',['cat'=>$cat]);
    }

        public function category_edit(Request $req)
    {

        if(grocery_category::where('category',$req->cat)->where('id','!=',$req->catid)
            ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
          })->exists())            
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

          public function block_category(Request $req)
    {
       
            grocery_category::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

     public function blocked_categories()
    {
        $cat=grocery_category::where('added_by',auth()->guard('shop')->user()->id)->where('status','Blocked')->latest()->get();

        return view('grocery.shop.BlockedCategories',['cat'=>$cat]);
    }

            public function activate_category(Request $req)
    {
       
            grocery_category::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }



    /////////////////////////////////////


        public function add_item()
    {
        $cat=grocery_category::where('status','Active')
        ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
              })
        ->latest()
        ->get();
        return view('grocery.shop.AddItem',['cat'=>$cat]);
    }

    public function item_add(Request $req)
    {

        if(grocery_item::where('item',$req->item)->where('added_by',auth()->guard('shop')->user()->id)->exists())
        {
          $data['err']="error";  
        }
        else
        {
       
          $img = $req->file('img');
        if($img=='')
        {
            $new_name='';
        }
        else{

          $image = $req->file('img');
          $new_name = time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/grocery_items'), $new_name);
        }

            if($req->cust=='No')
            {
                 grocery_item::create([
                'catid'=>$req->cat,
                'added_by'=>auth()->guard('shop')->user()->id,
                'item'=>$req->item,
                'type'=>$req->type,
                'is_recommendable'=>$req->rec,
                'is_newarrival'=>$req->newar,
                'is_customize'=>$req->cust,
                'normal_price'=>$req->price,
                'is_offer'=>'No',
                'image'=>$new_name,
                'desc'=>$req->det,
                'status'=>'Active',

            ]) ;
            }

            if($req->cust=='Yes')
            {
                 grocery_item::create([
                'catid'=>$req->cat,
                'added_by'=>auth()->guard('shop')->user()->id,
                'item'=>$req->item,
                'type'=>$req->type,
                'is_recommendable'=>$req->rec,
                'is_newarrival'=>$req->newar,
                'is_customize'=>$req->cust,
                'normal_price'=>$req->p1,
                'is_offer'=>'No',
                'image'=>$new_name,
                'desc'=>$req->det,
                'status'=>'Active',

            ]) ;

                 $last_item=grocery_item::select('id')->where('added_by',auth()->guard('shop')->user()->id)->orderBy('id','DESC')->limit(1)->first();

                grocery_variant::create([
                'item'=>$last_item->id,
                'is_default'=>1,
                'variant'=>$req->v1,
                'normal_price'=>$req->p1,
                'is_offer'=>'No',
                'status'=>'Active',

                ]) ;

                if($req->v2!='')
                {
                    grocery_variant::create([
                'item'=>$last_item->id,
                'is_default'=>0,
                'variant'=>$req->v2,
                'normal_price'=>$req->p2,
                'is_offer'=>'No',
                'status'=>'Active',

                ]) ;
                }

                 if($req->v3!='')
                {
                    grocery_variant::create([
                'item'=>$last_item->id,
                'is_default'=>0,
                'variant'=>$req->v3,
                'normal_price'=>$req->p3,
                'is_offer'=>'No',
                'status'=>'Active',

                ]) ;
                }






            }




            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

    public function active_items()
    {
        $items=grocery_item::where('added_by', auth()->guard('shop')->user()->id)->where('status', 'Active')->latest()->get();


        return view('grocery.shop.ActiveItems',['items'=>$items]);
    }

        public function edit_item($cid)
    {
        $itemid=decrypt($cid);

        $item=grocery_item::where('id',$itemid)->first();
         $cat=grocery_category::where('status','Active')
        ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
              })
        ->latest()
        ->get();

        return view('grocery.shop.EditItem',['item'=>$item,'cat'=>$cat]);
    }

        public function item_edit(Request $req)
    {

        if(grocery_item::where('item',$req->item)->where('id','!=',$req->itemid)->where('added_by',auth()->guard('shop')->user()->id)->exists())           
        {
          $data['err']="error";  
        }
        else
        {

        $ct=grocery_item::where('id',$req->itemid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$ct->image;
        }
        else{
             $imgWillDelete = public_path() . '/upload/grocery_items/' . $ct->image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/grocery_items'), $new_name);
            //$ins['Photo']=$new_name;
        }


            grocery_item::where('id',$req->itemid)->update([
                'catid'=>$req->cat,
                'item'=>$req->item,
                'type'=>$req->type,
                'is_recommendable'=>$req->rec,
                'is_newarrival'=>$req->newar,
                'image'=>$new_name,
                'desc'=>$req->det,

            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

          public function block_item(Request $req)
    {
       
            grocery_item::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

     public function blocked_items()
    {
        $items=grocery_item::where('added_by',auth()->guard('shop')->user()->id)->where('status','Blocked')->latest()->get();

        return view('grocery.shop.BlockedItems',['items'=>$items]);
    }

            public function activate_item(Request $req)
    {
       
            grocery_item::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }


    ////////////////////////////////////////////////////////////////////


    public function view_item($cid)
    {
        $itemid=decrypt($cid);

        $item=grocery_item::where('id',$itemid)->first();
        $variant=grocery_variant::where('item',$itemid)->get();
        $rel=related_grocery_item::where('item',$itemid)->latest()->get();
        $cat=grocery_category::where('status','Active')
        ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
              })
        ->latest()
        ->get();

        return view('grocery.shop.ItemDetails',['item'=>$item,'variant'=>$variant,'cat'=>$cat,'rel'=>$rel]);
    }

             public function edit_price($cid)
    {
        $itemid=decrypt($cid);

        $item=grocery_item::where('id',$itemid)->first();

        return view('grocery.shop.PriceEdit',['item'=>$item]);
    }

        public function price_edit(Request $req)
    {
       
            grocery_item::where('id',$req->pid)->update([

                'normal_price'=>$req->price,
                'is_offer'=>$req->isoffer,
                'offer_percentage'=>$req->percent,
                'offer_price'=>$req->oprice,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

    public function add_variant($cid)
    {
        $itemid=decrypt($cid);

        $item=grocery_item::where('id',$itemid)->first();

        return view('grocery.shop.AddVariant',['item'=>$item]);
    }

        public function variant_add(Request $req)
    {
       
            grocery_variant::create([

                'item'=>$req->pid,
                'variant'=>$req->variant,
                'is_default'=>0,
                'normal_price'=>$req->price,
                'is_offer'=>$req->isoffer,
                'offer_percentage'=>$req->percent,
                'offer_price'=>$req->oprice,
                'status'=>'Active',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

        public function edit_variant($cid)
    {
        $itemid=decrypt($cid);

        $item=grocery_variant::where('id',$itemid)->first();

        return view('grocery.shop.EditVariant',['item'=>$item]);
    }

         public function variant_edit(Request $req)
    {

        $fitem=grocery_variant::select('is_default','item')->where('id',$req->pid)->first();

        if($fitem->is_default==1)
        {
                grocery_variant::where('id',$req->pid)->update([
                'variant'=>$req->variant,
                'normal_price'=>$req->price,
                'is_offer'=>$req->isoffer,
                'offer_percentage'=>$req->percent,
                'offer_price'=>$req->oprice,
                'status'=>$req->status,

                ]) ;

                grocery_item::where('id',$fitem->item)->update([

                'normal_price'=>$req->price,
                'is_offer'=>$req->isoffer,
                'offer_percentage'=>$req->percent,
                'offer_price'=>$req->oprice,

                ]);

        }
        else
        {
          grocery_variant::where('id',$req->pid)->update([
                'variant'=>$req->variant,
                'normal_price'=>$req->price,
                'is_offer'=>$req->isoffer,
                'offer_percentage'=>$req->percent,
                'offer_price'=>$req->oprice,
                'status'=>$req->status,

                ]) ;  
        }
       

            $data['success']="success";
        
        echo json_encode($data);
       
    }

    ///////////////////////////////////////////////////


    public function get_items(Request $req)
    {
        $catid = $req->cat;
        $items = grocery_item::where('catid', $catid)->where('id','!=', $req->itm)->where('status', 'Active')->get();

        $v = '';
        $val = "Choose items";
            echo "<option value=" . $v . " >" . $val . "</option>";
        foreach ($items as $i) {
            
                echo "<option value=" . $i->id . " >" . $i->item . "</option>";
            }
        
    }

        public function add_relateditems(Request $req)
    {
       if(related_grocery_item::where('item',$req->itemid)->where('related_item',$req->item)->exists())
       {
        $data['err']="error";
       }
       else
       {
                related_grocery_item::create([

                'item'=>$req->itemid,
                'related_item'=>$req->item,

            ]) ;
            $data['success']="success";
       }

        
        echo json_encode($data);
       
    }

    public function get_itemslist(Request $req)
    {
        $itemid = $req->itm;
        $items = related_grocery_item::where('item', $itemid)->latest()->get();
        
            $output = '';
           
            if(empty($items) || count($items) === 0)
            {
                 $output .= '<li>No items found</li>';
            }
            else
            {
            foreach ($items as $i) {
                $output .= '    <li>
                                            <div class="timeline-panel">
                                               
                                                <div class="media-body">
                                                    <h5 class="mb-1">'.$i->GetItem->item.'</h5>
                                                    <!-- <small class="d-block">29 July 2020 - 02:26 PM</small> -->
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" style="cursor:pointer;" onclick="DeleteRel('.$i->id.')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>';
            }
        }
            echo $output;
    }

           public function delete_itemslist(Request $req)
    {
       
            related_grocery_item::where('id',$req->itm)->delete();
            $output='';
            echo $output;
       
    }
}
