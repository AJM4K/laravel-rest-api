<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\fileExists;

class Uploadfile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* NOTE : https://medium.com/@laravelprotips/storing-public-and-private-files-images-in-laravel-a-comprehensive-guide-6620789fad3b
        there are public folder and storage folder
        for example we have this file : public/uploads/images/store/image.jpg
        any files that we put in the public folder could be reachable from ( localhost/uploads/images/store/image.jpg )
        1.2. Using the /storage/app/public Directory
Let’s take an example: We have an image called cat.jpg and we want to place it in storage/app/public.

The storage/app/public/ directory in Laravel is perfect for storing files you want to make publicly available, like user uploads: images, videos, or documents. However, unlike the public/ directory, files here aren't directly reachable through a URL.

Instead, Laravel cleverly uses a symbolic link pointing from public/storage to storage/app/public/, allowing users to access these files via a web link.

To set this up, just run the command php artisan storage:link. After doing this, any file in storage/app/public/ becomes accessible with a URL prefixed with storage/. So, our cat.jpg would be viewable at the storage/cat.jpg URL.
         */

        $filename = "image.jpg";
        $pdffile = "filetest.pdf";
        $videofile = "video.mp4";
        $path = public_path('\\uploads\\images\\store\\' . $filename); // Adjust the folder path as needed
        $pathpdf = public_path('\\uploads\\images\\store\\' . $pdffile); // Adjust the folder path as needed
        $pathVideo = public_path('\\uploads\\images\\store\\' . $videofile); // Adjust the folder path as needed

             //  echo $path;
            // $path = storage_path('images/my-image.jpg');
//        if(file_exists($path)){
//            // return images
//            return response()->file($path); // view in browser
//            // return response()->download($path); // download to client
//            // return files here
//            // return response()->file($pathpdf); // view in browser
//            // return response()->download($pathpdf); // download to client
//
//            // return videos here
//            // return response()->file($pathVideo); // view in browser
//            // return response()->download($pathVideo); // download to client
//
//        }
        $publicStorage = storage_path('app/public/filetest.pdf');
        $privateStorage = storage_path('app/private/image.jpg');

        // this will get us the location path of this file such
       // $pathStorate = Storage::url('image.jpg');

        // this is working from storage
       // return response()->download($privateStorage, ['Content-Type' => 'application/pdf']);
        return response()->ile($privateStorage);

        // currently this is not working

         //return $pathStorate;


//        if (file_exists($path)) {
//            return response()->file($path);
//        } else {
//            return response()->json(['error' => 'Image not found'], 404);
//        }
        // return Response::download($path);
//        $userCanDownload = true;
//        if ($userCanDownload) {
//            return Storage::download('\\private\\image.jpg');
//        }
//        return response()->noContent();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }
        $path = public_path() . '/uploads/images/store/';
        $file->move($path, $file->getClientOriginalName());
        return response()->json(compact('path'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
