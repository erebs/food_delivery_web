<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\restaurent_category;
use App\Models\restaurent_item;
use App\Models\food_variant;
use App\Models\related_food_item;
use Illuminate\Support\Facades\File;

class ShopRestaurentController extends Controller
{


    public function add_category()
    {
        return view('shop.restaurent.AddCategory');
    }

    public function category_add(Request $req)
    {

        if(restaurent_category::where('category',$req->cat)->where('added_by','Admin')->orwhere('added_by',auth()->guard('shop')->user()->id)->exists())
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
        $cat=restaurent_category::where('status','Active')
        ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
              })
        ->latest()
        ->get();

        return view('shop.restaurent.ActiveCategories',['cat'=>$cat]);
    }

        public function edit_category($cid)
    {
        $catid=decrypt($cid);

        $cat=restaurent_category::where('id',$catid)->first();

        return view('shop.restaurent.EditCategory',['cat'=>$cat]);
    }

        public function category_edit(Request $req)
    {

        if(restaurent_category::where('category',$req->cat)->where('id','!=',$req->catid)
            ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
          })->exists())            
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

          public function block_category(Request $req)
    {
       
            restaurent_category::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

     public function blocked_categories()
    {
        $cat=restaurent_category::where('added_by',auth()->guard('shop')->user()->id)->where('status','Blocked')->latest()->get();

        return view('shop.restaurent.BlockedCategories',['cat'=>$cat]);
    }

            public function activate_category(Request $req)
    {
       
            restaurent_category::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }



    /////////////////////////////////////


        public function add_item()
    {
        $cat=restaurent_category::where('status','Active')
        ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
              })
        ->latest()
        ->get();
        return view('shop.restaurent.AddItem',['cat'=>$cat]);
    }

    public function item_add(Request $req)
    {

        if(restaurent_item::where('item',$req->item)->where('added_by',auth()->guard('shop')->user()->id)->exists())
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
          $image->move(public_path('uploads/restaurent_items'), $new_name);
        }

            if($req->cust=='No')
            {
                 restaurent_item::create([
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
                 restaurent_item::create([
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

                 $last_item=restaurent_item::select('id')->where('added_by',auth()->guard('shop')->user()->id)->orderBy('id','DESC')->limit(1)->first();

                food_variant::create([
                'item'=>$last_item->id,
                'is_default'=>1,
                'variant'=>$req->v1,
                'normal_price'=>$req->p1,
                'is_offer'=>'No',
                'status'=>'Active',

                ]) ;

                if($req->v2!='')
                {
                    food_variant::create([
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
                    food_variant::create([
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
        $items=restaurent_item::where('added_by', auth()->guard('shop')->user()->id)->where('status', 'Active')->latest()->get();


        return view('shop.restaurent.ActiveItems',['items'=>$items]);
    }

        public function edit_item($cid)
    {
        $itemid=decrypt($cid);

        $item=restaurent_item::where('id',$itemid)->first();
         $cat=restaurent_category::where('status','Active')
        ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
              })
        ->latest()
        ->get();

        return view('shop.restaurent.EditItem',['item'=>$item,'cat'=>$cat]);
    }

        public function item_edit(Request $req)
    {

        if(restaurent_item::where('item',$req->item)->where('id','!=',$req->itemid)->where('added_by',auth()->guard('shop')->user()->id)->exists())           
        {
          $data['err']="error";  
        }
        else
        {

        $ct=restaurent_item::where('id',$req->itemid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$ct->image;
        }
        else{
             $imgWillDelete = public_path() . '/upload/restaurent_items/' . $ct->image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/restaurent_items'), $new_name);
            //$ins['Photo']=$new_name;
        }


            restaurent_item::where('id',$req->itemid)->update([
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
       
            restaurent_item::where('id',$req->buid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

     public function blocked_items()
    {
        $items=restaurent_item::where('added_by',auth()->guard('shop')->user()->id)->where('status','Blocked')->latest()->get();

        return view('shop.restaurent.BlockedItems',['items'=>$items]);
    }

            public function activate_item(Request $req)
    {
       
            restaurent_item::where('id',$req->body)->update([
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

        $item=restaurent_item::where('id',$itemid)->first();
        $variant=food_variant::where('item',$itemid)->get();
        $rel=related_food_item::where('item',$itemid)->latest()->get();
        $cat=restaurent_category::where('status','Active')
        ->where(function($q) {
              $q->where('added_by', 'Admin')
              ->orWhere('added_by', auth()->guard('shop')->user()->id);
              })
        ->latest()
        ->get();

        return view('shop.restaurent.ItemDetails',['item'=>$item,'variant'=>$variant,'cat'=>$cat,'rel'=>$rel]);
    }

             public function edit_price($cid)
    {
        $itemid=decrypt($cid);

        $item=restaurent_item::where('id',$itemid)->first();

        return view('shop.restaurent.PriceEdit',['item'=>$item]);
    }

        public function price_edit(Request $req)
    {
       
            restaurent_item::where('id',$req->pid)->update([

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

        $item=restaurent_item::where('id',$itemid)->first();

        return view('shop.restaurent.AddVariant',['item'=>$item]);
    }

        public function variant_add(Request $req)
    {
       
            food_variant::create([

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

        $item=food_variant::where('id',$itemid)->first();

        return view('shop.restaurent.EditVariant',['item'=>$item]);
    }

         public function variant_edit(Request $req)
    {

        $fitem=food_variant::select('is_default','item')->where('id',$req->pid)->first();

        if($fitem->is_default==1)
        {
                food_variant::where('id',$req->pid)->update([
                'variant'=>$req->variant,
                'normal_price'=>$req->price,
                'is_offer'=>$req->isoffer,
                'offer_percentage'=>$req->percent,
                'offer_price'=>$req->oprice,
                'status'=>$req->status,

                ]) ;

                restaurent_item::where('id',$fitem->item)->update([

                'normal_price'=>$req->price,
                'is_offer'=>$req->isoffer,
                'offer_percentage'=>$req->percent,
                'offer_price'=>$req->oprice,

                ]);

        }
        else
        {
          food_variant::where('id',$req->pid)->update([
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
        $items = restaurent_item::where('catid', $catid)->where('id','!=', $req->itm)->where('status', 'Active')->get();

        $v = '';
        $val = "Choose items";
            echo "<option value=" . $v . " >" . $val . "</option>";
        foreach ($items as $i) {
            
                echo "<option value=" . $i->id . " >" . $i->item . "</option>";
            }
        
    }

        public function add_relateditems(Request $req)
    {
       if(related_food_item::where('item',$req->itemid)->where('related_item',$req->item)->exists())
       {
        $data['err']="error";
       }
       else
       {
                related_food_item::create([

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
        $items = related_food_item::where('item', $itemid)->latest()->get();
        
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
       
            related_food_item::where('id',$req->itm)->delete();
            $output='';
            echo $output;
       
    }

}
