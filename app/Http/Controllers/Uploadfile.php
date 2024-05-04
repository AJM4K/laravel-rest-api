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
        $filename = "image.jpg";
        $pdffile = "filetest.pdf";
        $videofile = "video.mp4";
        $path = public_path('\\uploads\\images\\store\\' . $filename); // Adjust the folder path as needed
        $pathpdf = public_path('\\uploads\\images\\store\\' . $pdffile); // Adjust the folder path as needed
        $pathVideo = public_path('\\uploads\\images\\store\\' . $videofile); // Adjust the folder path as needed

        //  echo $path;
       // $path = storage_path('images/my-image.jpg');
        if(file_exists($path)){
            // return images
           // return response()->file($path); // view in browser
           // return response()->download($path); // download to client

            // return files here
           // return response()->file($pathpdf); // view in browser
           // return response()->download($pathpdf); // download to client

            // return videos here
           // return response()->file($pathVideo); // view in browser
           // return response()->download($pathVideo); // download to client

        }
        $filePath = storage_path('app/static_file.pdf');
        return response()->download($filePath, 'my-file.pdf', ['Content-Type' => 'application/pdf']);




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
