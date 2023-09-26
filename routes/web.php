<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\FranchiseStaffController;
use App\Http\Controllers\FranchiseShopController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopStaffController;
use App\Http\Controllers\ShopRestaurentController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\GroceryController;
use App\Http\Controllers\GroceryStaffController;
use App\Http\Controllers\ShopGroceryController;

Route::get('/administrator', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin_login', [AdminController::class, 'admin_login']);


Route::middleware(['AdminLoginCheck','PreventBack'])->group(function () {


Route::get('/administrator/dashboard' , [AdminController::class, 'dashboard']);
Route::get('/administrator/logout' , [AdminController::class, 'logout']);
Route::get('/administrator/change-password', [AdminController::class, 'change_password']);
Route::post('/administrator/password-update', [AdminController::class, 'password_update']);
Route::get('/administrator/edit-profile', [AdminController::class, 'edit_admin_profile']);
Route::post('/administrator/profile-update', [AdminController::class, 'admin_profile_update']);

Route::get('/administrator/add-franchise', [AdminController::class, 'add_franchise']);
Route::post('/administrator/franchise-add', [AdminController::class, 'franchise_add']);
Route::get('/administrator/edit-franchise/{fid}', [AdminController::class, 'edit_franchise']);
Route::post('/administrator/franchise-edit', [AdminController::class, 'franchise_edit']);
Route::post('/administrator/franchise-psw-update', [AdminController::class, 'franchise_psw_update']);
Route::post('/administrator/block-franchise', [AdminController::class, 'block_franchise']);
Route::post('/administrator/activate-franchise', [AdminController::class, 'activate_franchise']);

Route::get('/administrator/active-franchise', [AdminController::class, 'active_franchise']);
Route::get('/administrator/blocked-franchise', [AdminController::class, 'blocked_franchise']);
Route::get('/administrator/view-franchise/{fid}', [AdminController::class, 'view_franchise']);
Route::get('/administrator/active-franchise', [AdminController::class, 'active_franchise']);

Route::get('/administrator/restaurent-categories', [AdminCategoryController::class, 'restaurent_categories']);
Route::get('/administrator/add-rcategory', [AdminCategoryController::class, 'add_rcategory']);
Route::post('/administrator/rcategory-add', [AdminCategoryController::class, 'rcategory_add']);
Route::get('/administrator/edit-rcategory/{cid}' , [AdminCategoryController::class, 'edit_rcategory']);
Route::post('/administrator/rcategory-edit' , [AdminCategoryController::class, 'rcategory_edit']);
Route::post('/administrator/block-rcategory' , [AdminCategoryController::class, 'block_rcategory']);
Route::post('/administrator/activate-rcategory' , [AdminCategoryController::class, 'activate_rcategory']);

Route::get('/administrator/grocery-categories', [AdminCategoryController::class, 'grocery_categories']);
Route::get('/administrator/add-gcategory', [AdminCategoryController::class, 'add_gcategory']);
Route::post('/administrator/gcategory-add', [AdminCategoryController::class, 'gcategory_add']);
Route::get('/administrator/edit-gcategory/{cid}' , [AdminCategoryController::class, 'edit_gcategory']);
Route::post('/administrator/gcategory-edit' , [AdminCategoryController::class, 'gcategory_edit']);
Route::post('/administrator/block-gcategory' , [AdminCategoryController::class, 'block_gcategory']);
Route::post('/administrator/activate-gcategory' , [AdminCategoryController::class, 'activate_gcategory']);


    
});


Route::get('/franchise', [FranchiseController::class, 'login'])->name('franchise.login');
Route::post('/franchise_login', [FranchiseController::class, 'franchise_login']);

Route::middleware(['FranchiseLoginCheck','PreventBack'])->group(function () {

Route::get('/franchise/dashboard' , [FranchiseController::class, 'dashboard']);
Route::get('/franchise/logout' , [FranchiseController::class, 'logout']);
Route::get('/franchise/change-password', [FranchiseController::class, 'change_password']);
Route::post('/franchise/password-update', [FranchiseController::class, 'password_update']);
Route::get('/franchise/edit-profile', [FranchiseController::class, 'edit_franchise_profile']);
Route::post('/franchise/profile-update', [FranchiseController::class, 'franchise_profile_update']);

Route::get('/franchise/add-staff' , [FranchiseStaffController::class, 'add_staff']);
Route::post('/franchise/staff-add' , [FranchiseStaffController::class, 'staff_add']);
Route::get('/franchise/active-staff', [FranchiseStaffController::class, 'active_staff']);
Route::get('/franchise/edit-staff/{fid}', [FranchiseStaffController::class, 'edit_staff']);
Route::post('/franchise/staff-edit', [FranchiseStaffController::class, 'staff_edit']);
Route::post('/franchise/staff-psw-update', [FranchiseStaffController::class, 'staff_psw_update']);
Route::post('/franchise/block-staff', [FranchiseStaffController::class, 'block_staff']);
Route::post('/franchise/activate-staff', [FranchiseStaffController::class, 'activate_staff']);
Route::get('/franchise/blocked-staff', [FranchiseStaffController::class, 'blocked_staff']);

Route::get('/franchise/active-shops' , [FranchiseShopController::class, 'active_shops']);
Route::get('/franchise/add-shop' , [FranchiseShopController::class, 'add_shop']);
Route::get('/franchise/edit-shop/{sid}' , [FranchiseShopController::class, 'edit_shop']);
Route::post('/franchise/shop-add' , [FranchiseShopController::class, 'shop_add']);
Route::post('/franchise/shop-edit' , [FranchiseShopController::class, 'shop_edit']);
Route::post('/franchise/shop-psw-update', [FranchiseShopController::class, 'shop_psw_update']);
Route::post('/franchise/block-shop', [FranchiseShopController::class, 'block_shop']);
Route::post('/franchise/activate-shop', [FranchiseShopController::class, 'activate_shop']);
Route::get('/franchise/blocked-shops', [FranchiseShopController::class, 'blocked_shops']);
Route::get('/franchise/view-shop/{sid}', [FranchiseShopController::class, 'view_shop']);

});


Route::get('/merchant', [ShopController::class, 'login'])->name('shop.login');
Route::post('/shop_login', [ShopController::class, 'shop_login']);

Route::middleware(['ShopLoginCheck','PreventBack'])->group(function () {

Route::get('/merchant/dashboard' , [ShopController::class, 'dashboard']);
Route::get('/merchant/logout' , [ShopController::class, 'logout']);
Route::get('/merchant/change-password', [ShopController::class, 'change_password']);
Route::post('/merchant/password-update', [ShopController::class, 'password_update']);
Route::get('/merchant/edit-profile', [ShopController::class, 'edit_shop_profile']);
Route::post('/merchant/profile-update', [ShopController::class, 'shop_profile_update']);

Route::get('/merchant/shop-availability', [ShopController::class, 'shop_availability']);
Route::post('/merchant/availability-update', [ShopController::class, 'availability_update']);

Route::get('/merchant/add-staff' , [ShopStaffController::class, 'add_staff']);
Route::post('/merchant/staff-add' , [ShopStaffController::class, 'staff_add']);
Route::get('/merchant/active-staff', [ShopStaffController::class, 'active_staff']);
Route::get('/merchant/edit-staff/{fid}', [ShopStaffController::class, 'edit_staff']);
Route::post('/merchant/staff-edit', [ShopStaffController::class, 'staff_edit']);
Route::post('/merchant/staff-psw-update', [ShopStaffController::class, 'staff_psw_update']);
Route::post('/merchant/block-staff', [ShopStaffController::class, 'block_staff']);
Route::post('/merchant/activate-staff', [ShopStaffController::class, 'activate_staff']);
Route::get('/merchant/blocked-staff', [ShopStaffController::class, 'blocked_staff']);

Route::get('/merchant/add-category' , [ShopRestaurentController::class, 'add_category']);
Route::post('/merchant/category-add' , [ShopRestaurentController::class, 'category_add']);
Route::get('/merchant/active-categories' , [ShopRestaurentController::class, 'active_categories']);
Route::get('/merchant/blocked-categories' , [ShopRestaurentController::class, 'blocked_categories']);
Route::get('/merchant/edit-category/{cid}' , [ShopRestaurentController::class, 'edit_category']);
Route::post('/merchant/category-edit' , [ShopRestaurentController::class, 'category_edit']);
Route::post('/merchant/block-category' , [ShopRestaurentController::class, 'block_category']);
Route::post('/merchant/activate-category' , [ShopRestaurentController::class, 'activate_category']);

Route::get('/merchant/add-item' , [ShopRestaurentController::class, 'add_item']);
Route::post('/merchant/item-add' , [ShopRestaurentController::class, 'item_add']);
Route::get('/merchant/active-items' , [ShopRestaurentController::class, 'active_items']);
Route::get('/merchant/blocked-items' , [ShopRestaurentController::class, 'blocked_items']);
Route::get('/merchant/edit-item/{cid}' , [ShopRestaurentController::class, 'edit_item']);
Route::post('/merchant/item-edit' , [ShopRestaurentController::class, 'item_edit']);
Route::post('/merchant/block-item' , [ShopRestaurentController::class, 'block_item']);
Route::post('/merchant/activate-item' , [ShopRestaurentController::class, 'activate_item']);
Route::get('/merchant/view-item/{cid}' , [ShopRestaurentController::class, 'view_item']);

Route::get('/merchant/edit-price/{cid}' , [ShopRestaurentController::class, 'edit_price']);
Route::post('/merchant/price-edit' , [ShopRestaurentController::class, 'price_edit']);

Route::get('/merchant/add-variant/{cid}' , [ShopRestaurentController::class, 'add_variant']);
Route::post('/merchant/variant-add' , [ShopRestaurentController::class, 'variant_add']);

Route::get('/merchant/edit-variant/{vid}' , [ShopRestaurentController::class, 'edit_variant']);
Route::post('/merchant/variant-edit' , [ShopRestaurentController::class, 'variant_edit']);

Route::post('/merchant/get-items' , [ShopRestaurentController::class, 'get_items']);
Route::post('/merchant/add-relateditem' , [ShopRestaurentController::class, 'add_relateditems']);
Route::post('/merchant/get-itemslist' , [ShopRestaurentController::class, 'get_itemslist']);
Route::post('/merchant/delete-itemslist' , [ShopRestaurentController::class, 'delete_itemslist']);




////////////////////////////////////



Route::get('/grocery/dashboard' , [GroceryController::class, 'dashboard']);
Route::get('/grocery/logout' , [GroceryController::class, 'logout']);
Route::get('/grocery/change-password', [GroceryController::class, 'change_password']);
Route::post('/grocery/password-update', [GroceryController::class, 'password_update']);
Route::get('/grocery/edit-profile', [GroceryController::class, 'edit_shop_profile']);
Route::post('/grocery/profile-update', [GroceryController::class, 'shop_profile_update']);

Route::get('/grocery/shop-availability', [GroceryController::class, 'shop_availability']);
Route::post('/grocery/availability-update', [GroceryController::class, 'availability_update']);

Route::get('/grocery/add-staff' , [GroceryStaffController::class, 'add_staff']);
Route::post('/grocery/staff-add' , [GroceryStaffController::class, 'staff_add']);
Route::get('/grocery/active-staff', [GroceryStaffController::class, 'active_staff']);
Route::get('/grocery/edit-staff/{fid}', [GroceryStaffController::class, 'edit_staff']);
Route::post('/grocery/staff-edit', [GroceryStaffController::class, 'staff_edit']);
Route::post('/grocery/staff-psw-update', [GroceryStaffController::class, 'staff_psw_update']);
Route::post('/grocery/block-staff', [GroceryStaffController::class, 'block_staff']);
Route::post('/grocery/activate-staff', [GroceryStaffController::class, 'activate_staff']);
Route::get('/grocery/blocked-staff', [GroceryStaffController::class, 'blocked_staff']);

Route::get('/grocery/add-category' , [ShopGroceryController::class, 'add_category']);
Route::post('/grocery/category-add' , [ShopGroceryController::class, 'category_add']);
Route::get('/grocery/active-categories' , [ShopGroceryController::class, 'active_categories']);
Route::get('/grocery/blocked-categories' , [ShopGroceryController::class, 'blocked_categories']);
Route::get('/grocery/edit-category/{cid}' , [ShopGroceryController::class, 'edit_category']);
Route::post('/grocery/category-edit' , [ShopGroceryController::class, 'category_edit']);
Route::post('/grocery/block-category' , [ShopGroceryController::class, 'block_category']);
Route::post('/grocery/activate-category' , [ShopGroceryController::class, 'activate_category']);

Route::get('/grocery/add-item' , [ShopGroceryController::class, 'add_item']);
Route::post('/grocery/item-add' , [ShopGroceryController::class, 'item_add']);
Route::get('/grocery/active-items' , [ShopGroceryController::class, 'active_items']);
Route::get('/grocery/blocked-items' , [ShopGroceryController::class, 'blocked_items']);
Route::get('/grocery/edit-item/{cid}' , [ShopGroceryController::class, 'edit_item']);
Route::post('/grocery/item-edit' , [ShopGroceryController::class, 'item_edit']);
Route::post('/grocery/block-item' , [ShopGroceryController::class, 'block_item']);
Route::post('/grocery/activate-item' , [ShopGroceryController::class, 'activate_item']);
Route::get('/grocery/view-item/{cid}' , [ShopGroceryController::class, 'view_item']);

Route::get('/grocery/edit-price/{cid}' , [ShopGroceryController::class, 'edit_price']);
Route::post('/grocery/price-edit' , [ShopGroceryController::class, 'price_edit']);

Route::get('/grocery/add-variant/{cid}' , [ShopGroceryController::class, 'add_variant']);
Route::post('/grocery/variant-add' , [ShopGroceryController::class, 'variant_add']);

Route::get('/grocery/edit-variant/{vid}' , [ShopGroceryController::class, 'edit_variant']);
Route::post('/grocery/variant-edit' , [ShopGroceryController::class, 'variant_edit']);

Route::post('/grocery/get-items' , [ShopGroceryController::class, 'get_items']);
Route::post('/grocery/add-relateditem' , [ShopGroceryController::class, 'add_relateditems']);
Route::post('/grocery/get-itemslist' , [ShopGroceryController::class, 'get_itemslist']);
Route::post('/grocery/delete-itemslist' , [ShopGroceryController::class, 'delete_itemslist']);


});
