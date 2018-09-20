<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
    function store(Request $request) {
        if($request->hasfile('file'))
        {
            // dd($request->file('file'));
            $path = '/images/';
            foreach($request->file('file') as $image)
            {
                $name = $image->getClientOriginalName();
                $new_name = time().'_'.$name;
                $image->move(public_path().$path, $new_name);  
                $images[] = $path.$new_name;
            }
	        return $images;
        }
  //   	$file = Input::file('file');
  //   	dd($request);
  //   	// return \Response::json($file, 200);
		// $destinationPath = 'images';
		// // If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		// // $filename = str_random(12);
		// $str_random = str_random(12);
		// $filename = $file->getClientOriginalName();
		// $extension =$file->getClientOriginalExtension(); 
		// $upload_success = Input::file('file')->move($destinationPath, $str_random.'_'.$filename);
		// $path = '/'.$destinationPath.'/'.$str_random.'_'.$filename;

		// if( $upload_success ) {
		//    return \Response::json($path, 200);
		// } else {
		//    return \Response::json('error', 400);
		// }
    }
}
