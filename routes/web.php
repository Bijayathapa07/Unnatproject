<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserProfileController;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('galleries',[PagesController::class,'gallery'])->name('gallery');


Route::get('/home',[PagesController::class,'homes'])->name('homes');
Route::get('/contactus',[PagesController::class,'contact'])->name('contact');

Route::get('/viewproduct/{product}',[PagesController::class,'viewproduct'])
->name('viewproduct');

Route::get('/dashboard', function () {
    $products = Product::count();
    $categories = Category::count();
    $galleries = Gallery::count();
    return view('dashboard',compact('products','categories','galleries'));
})->middleware(['auth', 'verified','isadmin'])->name('dashboard');


Route::get('/checkout',[CartController::class,'checkout'])->name('cart.checkout');

Route::post('/order/store',[OrderController::class,'store'])->name('order.store');



   
    Route::get('/mycart',[CartController::class,'index'])->middleware('auth')->name('cart.index');
    Route::post('/mycart/store',[CartController::class,'store'])->middleware('auth')->name('cart.store');
    Route::get('/userprofile',[UserProfileController::class,'userprofile'])->name('user.userprofile');
    Route::get('/userprofile/edit/{id}',[UserProfileController::class,'edit'])->name('userprofile.edit');
    Route::post('/userprofile/update/{id}',[UserProfileController::class,'update'])->name('usersprofileupdate');

    Route::get('/frontend/cart/{cart}/delete',[CartController::class,'destory'])->name('cart.delete');

    Route::post('/contact-us',[ContactController::class,'store'])->name('contactdetails');


    Route::get('/userlogin',[PagesController::class,'userlogin'])->name('userlogin');
    Route::get('/userregister',[PagesController::class,'userregister'])->name('user.register');
    Route::post('/userregister',[PagesController::class,'userstore'])->name('user.store');
    Route::get('/order/list',[PagesController::class,'orders'])->name('order.list');




    
    Route::get('/order/status/{id}/{status}',[OrderController::class,'status'])->name('order.status');
    Route::get('/order/{id}/details',[OrderController::class,'details'])->name('orders.details');




    Route::get('/categoryproduct/{id}',[PagesController::class,'categoryproduct'])->name('categoryproduct');

    Route::post('/frontend/cart/{id}/update',[CartController::class,'update'])->name('cart.update');


    Route::post('/khaltiverify',[OrderController::class,'khaltiverify'])->name('khaltiverify');




    Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth','isadmin')->group(function (){

    Route::get('/category',[CategoryController::class,'index'])->middleware('auth')->name('category.index'); 
    Route::get('/category/create',[CategoryController::class,'create'])->middleware('auth')->name('category.create');
    Route::post('/category/store',[CategoryController::class,'store'])->middleware('auth')->name('category.store');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->middleware('auth')->name('category.edit');
    Route::post('/category/{id}/update',[CategoryController::class,'update'])->middleware('auth')->name('category.update');
    Route::get('/category/{id}/destroy',[CategoryController::class,'destroy'])->middleware('auth')->name('category.destroy');



    Route::get('/gallery',[GalleryController::class,'index'])->name('gallery.index');
    Route::get('/gallery/create',[GalleryController::class,'create'])->middleware('auth')->name('gallery.create');
    Route::post('/gallery/store',[GalleryController::class,'store'])->middleware('auth')->name('gallery.store');
    Route::get('/gallery/{id}/edit',[GalleryController::class,'edit'])->middleware('auth')->name('gallery.edit');
    Route::post('/gallery/{id}/update',[GalleryController::class,'update'])->middleware('auth')->name('gallery.update');
    Route::get('/gallery/{id}/destroy',[GalleryController::class,'destroy'])->middleware('auth')->name('gallery.destroy');



    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->middleware('auth')->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->middleware('auth')->name('product.store');

    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->middleware('auth')->name('product.edit');
    Route::post('/product/{id}/update',[ProductController::class,'update'])->middleware('auth')->name('product.update');
    Route::get('/product/{id}/destroy',[ProductController::class,'destroy'])->middleware('auth')->name('product.destroy');


    Route::get('/order',[OrderController::class,'index'])->name('order.index');
    Route::get('/order/{id}/edit',[OrderController::class,'edit'])->name('order.edit');
    Route::get('/order/{id}/update',[OrderController::class,'update'])->name('order.update');






});

require __DIR__.'/auth.php';
