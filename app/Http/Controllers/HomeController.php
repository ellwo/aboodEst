<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Post;
use App\Models\Service;
use App\Models\ServicePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    //

    public $base_url="";


    // public function listFolders()
    // {
    // }

    // function listFolderFiles($dir){
    //     $ffs = scandir($dir);

    //     unset($ffs[array_search('.', $ffs, true)]);
    //     unset($ffs[array_search('..', $ffs, true)]);

    //     // prevent empty ordered elements
    //     if (count($ffs) < 1)
    //         return;

    //     echo '<div>';
    //     foreach($ffs as $ff){
    //         echo '<div style="display:block;">'.$ff;
    //         if(is_dir($dir.'/'.$ff))
    //         {$this->listFolderFiles($dir.'/'.$ff);
    //         }else
    //          {
    //             $ext = pathinfo($ff, PATHINFO_EXTENSION);
    //            // $url_path=pathinfo('',PATHINFO);

    //             if($ext!="jpg" && $ext!="png")
    //             echo '<h1>'.$ext.'</h1>';
    //             else
    //             echo '<img src="'.$dir.'/'.$ff.'" />';

    //         }
    //         echo '</div>';
    //     }
    //     echo '</div>';
    // }

    // function listFoldersAndImages($dir) {
    //     if (is_dir($dir)) {
    //         $folders = array_diff(scandir($dir), ['.', '..']);

    //         foreach ($folders as $folder) {
    //             $folderPath = $dir . DIRECTORY_SEPARATOR . $folder;
    //             echo "<div class='card'>";
    //             echo "<div class='folder-name'>$folder</div>";

    //             // Check if the folder contains any image files
    //             $imageFiles = glob($folderPath . '/*.jpg'); // You can add more image extensions as needed

    //             if (!empty($imageFiles)) {
    //                 $firstImage = $imageFiles[0];
    //                 echo "<img src='$firstImage' alt='Image from $folder' class='folder-image' />";
    //             } else {
    //                 echo "<div class='no-image'>No image found</div>";
    //             }

    //             echo "</div>";
    //         }
    //     }
    // }
    // function listFoldersAndImages2($dir) {
    //     if (is_dir($dir)) {
    //         $folders = array_diff(scandir($dir), ['.', '..']);

    //         foreach ($folders as $folder) {
    //             $folderPath = $dir . DIRECTORY_SEPARATOR . $folder;
    //             echo "<div class='card'>";
    //             echo "<div class='folder-name'>$folder</div>";

    //             // Check if the folder contains any image files
    //             $imageFiles = glob($folderPath . '/*.jpg'); // You can add more image extensions as needed

    //             if (!empty($imageFiles)) {
    //                 $firstImage = $imageFiles[0];
    //                 // Generate an absolute URL to the image using Laravel's URL helper
    //                 $imageUrl = $firstImage;
    //               // return  dd(readfile($imageUrl));

    //             // return dd( File::dirname($imageUrl));
    //               $imageUrl=Storage::url($imageUrl);
    //                 echo "<img src='$imageUrl' alt='Image from $folder' class='folder-image' />";
    //             } else {
    //                 echo "<div class='no-image'>No image found</div>";
    //             }

    //             echo "</div>";
    //         }
    //     }
    // }

    function rashad($log_directory ) {







if(isset($_GET['id']))
{
  $log_directory=$_GET['id'];
}

// $log_directory = 'img/portfolio';

$results_array = array();

if (is_dir($log_directory))
{
        if ($handle = opendir($log_directory))
        {
                //Notice the parentheses I added:
                while(($file = readdir($handle)) !== FALSE)
                {
                         $results_array[] = $file;
                }
                closedir($handle);
        }
}

$folders=[];
//Output findings
foreach($results_array as $value)
{

  if($value!="."&&$value!=".."&&$value!=""){


    if(is_dir($log_directory.'/'.$value))
    $folders[]=[
        'name'=>$value,
        'img'=>route('readImage',['img'=>$this->findFirstImageRelativePath($log_directory.'/'.$value)]),
        'url'=>route("home",['id'=>$log_directory .'/'.$value,'val'=>$value])
    ];

}

}


if(count($folders)==0){
    $ffs = scandir($log_directory);

    $vedioList=[];
    foreach ($ffs as $value) {
        # code...

        if($value!="."&&$value!=".."&&$value!=""){



            $file=$log_directory.'/'.$value;
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $url="";
      if( in_array($extension, [ 'avi','wmv', 'mkv', 'mp4'])){
           $url= route('readVideo',['vid'=>$file]);
           
          // 'media' . substr($log_directory, strlen(public_path('media'))) . '/' . $value;

           $vedioList[]=[
            'title'=>substr($log_directory, strspn($log_directory,'Movies')),
            'name'=>$log_directory."/".basename( $log_directory),
            'url'=>$url,
            'img'=>route('readImage',['img'=>$this->findFirstImageRelativePath($log_directory)])
        ];




        }
    }

    }

    $substring = strstr($log_directory, "My Passport/");
        
    $substring=str_replace('My Passport','',$substring);
$array_fa=explode('/',$substring);
$pathArray = $array_fa;

$result = [];

$link = $this->base_url;

foreach ($pathArray as $directory) {
    $link .= $directory;
    $result[] = [
        'name' => $directory,
        'link' => $link
    ];
    $link .= '/';
}



    return view('vediolist',['vedioList'=>$vedioList,'tree'=>$result]);
    return dd($vedioList);


}


$substring = strstr($log_directory, "My Passport/");
        
$substring=str_replace('My Passport','',$substring);
$array_fa=explode('/',$substring);
$pathArray = $array_fa;

$result = [];

$link = $this->base_url;

foreach ($pathArray as $directory) {
$link .= $directory;
$result[] = [
    'name' => $directory,
    'link' => $link
];
$link .= '/';
}
return view('folders',['folders'=>$folders,'tree'=>$result]);
//return dd($folders);




}
function findFirstImageRelativePath($directoryPath,$orVedio=false) {
    // Get a list of all files in the directory
    $files = scandir($directoryPath);

    // Iterate through the files and find the first image
    foreach ($files as $file) {
        // Ignore "." and ".." directories
        if ($file != "." && $file != "..") {
            // Get the file extension
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            // Check if the file has an image extension
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                // Return the relative path of the first image found

                return $directoryPath."/".$file;
                return 'media' . substr($directoryPath, strlen(public_path('media'))) . '/' . $file;
            }
        }
    }

    // Return null if no image is found
    return null;
}

    function index() {





       // return $this->rashad(public_path('/media'));
       
       $this->base_url='/media/mrzoom/My Passport';
       //'/media/mrzoom/188019D88019BCE6/Dlast/Movies';
       return  $this->rashad($this->base_url);

        $folderPath = '/media'; // Set the path to your folder
    $folders = [];

    // Get all directories in the specified path
    $directories = Storage::disk('public')->directories($folderPath);

    // Iterate through directories and get the first image in each folder
    foreach ($directories as $directory) {
        $files = Storage::disk('public')->files($directory);

     //   dd($files);
        $image = null;

        // Find the first image in the folder
        foreach ($files as $file) {
          $extension = pathinfo($file, PATHINFO_EXTENSION);

            // Check if the file has an image extension
            if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                $image = $file;
                break;
            }
        }

        // Add folder name and image path to the data array
        $folders[] = [
            'name' => basename($directory),
            'image' => $image ? Storage::url($image) : null,
        ];
    }

    return view('folders', compact('folders'));

//    return $this->listFoldersAndImages2('D:/Dlast/Movies');





        $resntPost=Post::orderBy('updated_at','desc')->take(3)->get();

        $services=Service::all();

        $companies=Company::all();
        $service_prices=ServicePrice::all();


        return view('pages.index',[
            'services'=>$services,
            'posts'=>$resntPost,
            'companies'=>$companies,
            'service_prices'=>$service_prices
        ]);
    }

    public function show($folder)
    {
        $folderPath = public_path('media/'.$folder);
        $folders = [];
        $videos = [];
        $requestedVideo = null;

        $items = scandir($folderPath);

        foreach ($items as $item) {
            if ($item !== '.' && $item !== '..') {
                $itemPath = $folderPath . '/' . $item;
                $relativePath = 'media/'.$folder . '/' . $item;

                if (is_dir($itemPath)) {
                    $folders[] = $relativePath;
                } elseif (in_array(pathinfo($itemPath, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv'])) {
                    $video = [
                        'name' => $relativePath,
                        'url' => asset($relativePath),
                    ];
                    $videos[] = $video;

                    if ($video['name'] === 'media/'.$folder) {
                        $requestedVideo = $video;
                    }
                }
            }
        }

        return view('folders', compact('folders', 'videos', 'requestedVideo'));
    }


    function findFirstImage($directoryPath) {
        // Get a list of all files in the directory
        $files = scandir($directoryPath);

        // Iterate through the files and find the first image
        foreach ($files as $file) {
            // Ignore "." and ".." directories
            if ($file != "." && $file != "..") {
                // Get the file extension
                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                // Check if the file has an image extension
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    // Return the path to the first image found
                    return $directoryPath . DIRECTORY_SEPARATOR . $file;
                }
            }
        }

        // Return null if no image is found
        return null;
    }

    function findFirstImageName($directoryPath) {
        // Get a list of all files in the directory
        $files = scandir($directoryPath);

        // Iterate through the files and find the first image
        foreach ($files as $file) {
            // Ignore "." and ".." directories
            if ($file != "." && $file != "..") {
                // Get the file extension
                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                // Check if the file has an image extension
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    // Return the filename of the first image found
                    return $file;
                }
            }
        }

        // Return null if no image is found
        return null;
    }

}
