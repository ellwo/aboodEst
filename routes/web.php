<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PassportInfoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicePriceController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Iman\Streamer\VideoStreamer;

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


Route::get('/readVideo', function () {
    $path = $_GET['vid'];
    
    VideoStreamer::streamFile($path);
})->name('readVideo');
Route::get('/readImage',function(){
   
    $imagePath = $_GET['img'];

// Set the appropriate Content-Type header
header('Content-Type: image/jpeg');

// Read and output the image 
 return readfile($imagePath);
})->name('readImage');

// Route::get('/readVideo',function(){
   
//     $path = $_GET['vid'];

//    // return readfile($path);
// $size=filesize($path);

// $fm=@fopen($path,'rb');
// if(!$fm) {
//   // You can also redirect here
//   header ("HTTP/1.0 404 Not Found");
//   die();
// }

// $begin=0;
// $end=$size;

// if(isset($_SERVER['HTTP_RANGE'])) {
//   if(preg_match('/bytes=\h*(\d+)-(\d*)[\D.*]?/i', $_SERVER['HTTP_RANGE'], $matches)) {
//     $begin=intval($matches[0]);
//     if(!empty($matches[1])) {
//       $end=intval($matches[1]);
//     }
//   }
// }

// if($begin>0||$end<$size)
//   header('HTTP/1.0 206 Partial Content');
// else
//   header('HTTP/1.0 200 OK');

// header("Content-Type: video/mp4");
// header('Accept-Ranges: bytes');
// header('Content-Length:'.($end-$begin));
// header("Content-Disposition: inline;");
// header("Content-Range: bytes $begin-$end/$size");
// header("Content-Transfer-Encoding: binary\n");
// header('Connection: close');

// $cur=$begin;
// fseek($fm,$begin,0);

// while(!feof($fm)&&$cur<$end&&(connection_status()==0))
// { print fread($fm,min(1024*16,$end-$cur));
//   $cur+=1024*16;
//   usleep(1000);
// }
// die();


// })->name('readVideo');

Route::get('/show/{folder?}',[HomeController::class,'show']);
/**function ($folder) {
    $folderPath = public_path('media/'.$folder); // Set the path to the selected folder
    $folders = [];
    $videos = [];

    // Get all files in the specified path
    $items = scandir($folderPath);

    // Iterate through items and separate folders and videos
    foreach ($items as $item) {
        if ($item !== '.' && $item !== '..') {
            $itemPath = $folderPath . '/' . $item;
            $relativePath = 'media/'.$folder . '/' . $item;

            if (is_dir($itemPath)) {
                $folders[] = $relativePath;
            } elseif (in_array(pathinfo($itemPath, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv'])) {
                $videos[] = [
                    'name' => $relativePath,
                    'url' => asset($relativePath),
                ];
            }
        }
    }

    return view('folders', compact('folders', 'videos'));
})->where('folder', '.*'); */




Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('pass.search', [PassportInfoController::class,'search'])->name('pass.search');
Route::get('/pass.search.get', [PassportInfoController::class,'search'])->name('pass.search.get');
Route::view('/من-نحن','pages.about-us')->name('about-us');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('service',ServiceController::class)->name('index','service');
Route::get('/address',[AddressController::class,'index'])->name('address');
Route::get('/address/{id}',[AddressController::class,'show'])->name('address.show');
Route::resource('/post',PostController::class)->name('index','post');
Route::resource('/service_price',ServicePriceController::class)->name('index','service_price');
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
