<?php
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['perfix'=>'admin','middleware' => 'auth'] , function(){

//for posts

Route::get('/posts', 'PostController@index')->name('posts');

	Route::get('/post/create', 'PostController@create')->name('post.create');
	Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');

	Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
Route::post('/post/store', 'PostController@store')->name('post.store');



///for category

//show the categories in DB
// Route::get('/categories', 'CategoriesController@index')->name('categories');
//
// category.edit by id------
Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');

//delete category
Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');


Route::get('/category/create', 'CategoriesController@create')->name('category.create');

Route::post('/category/store', 'CategoriesController@store')->name('category.store');
Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

});

Route::get('/mm',function(){
 $category =App\Category::where('name','sa');
  $posts =App\Post::find(2);
	
  $w =$category->with(['posts'])->get();
return $w;	
// return response()->json(array("category"=>$w));
// return App\Category::with(['posts'])->get();
//return $a;
// $q= date('d_m_y');
// $w = '1_12_19';
// //$w = date('d/m/y');
// echo $q;
// echo $w;
// if (strtotime($w) <= strtotime($q))
// 	{	
// 		$r= strtotime($w);

// 		echo $r;
// 		echo "adass";
// 	}

// $originalDate = "20-03-21";
// $newDate = date("d/m/Y", strtotime($originalDate));
// echo $newDate;
//$q="2019-12-1";//y-m-d
// $date1 = date($q); // your input
// $date2 = date("d/m/y"); 
// //today

// if($newDate < $date2) {

//     echo " input date is in the past";
// }

 // 	$source = '2012-07-31';
 //    $date = new DateTime($source);
 //    $ldate = new DateTime('today');
 //    //echo $ldate->format('d.m.y');
 //    if($date->format('d.m.Y') > $ldate->format('d.m.Y'))
 //    {
 //    echo $date->format('d.m.Y'); // 31.07.2012
 //    echo $ldate->format('d.m.Y'); // 31-07-2012
	// }
// $current = Carbon::createMidnightDate();
// $str_arr = explode (" ", $current);  
//print_r($str_arr);
//$source1 = Carbon::now()->add(1,'day'); 
//$source= Carbon::createMidnightDate($str_arr[0],$str_arr[1],$str_arr[2])->addDays(-1);
//echo $str_arr;
// if ($current->equalTo($source)) {
// 	echo $source;
// echo $current;

//}
// Carbon::createF
	// return response()->json(array($a));
// // var_dump($a);
// 	$post->name ='laravel';
// 	$post->save();
	// return $post;

// 	$w =App\Post::with(['category'])->get();
// 	return [$a , $w];
	//$q=new DateTime('today');
//echo date("d/m/y");
//return App\User::find(1);
})->name('mm');













// Route::get('/categories', 'CategoriesController@index')->name('categories');


