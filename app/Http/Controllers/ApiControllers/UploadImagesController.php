<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\ServiceNo;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use File;
use Illuminate\Support\Facades\DB;

class UploadImagesController extends Controller
{
    //

    public function insert(Request $request)
    {
       
  
        
        
        if($request->has('created_by')){
           
        $created_by =  DB::select($request->created_by);
        // return $created_by;
        if(!$created_by){
            return response()->json(['message'=>'no user found for created by']);
        }
        }else{
            return response()->json(['message'=>'application created by is required']);
        }
        // return $created_by[0]->id;
        if(!$request->has('id')){
            return response()->json(['message'=>'application id is required']);
        }
        
        
        $destinationPath ='asset/images/upload-images';
        // $img_exits = public_path().'/asset/images/upload-images/';
        $url = asset('asset/images/upload-images');

        $application = ServiceNo::find($request->id);
        if(!$application){
            return response()->json(['status'=>'404','message'=>"user not found"]);
        }


        if ($request->hasFile('before')) {
        
            $images = $request->file('before');
            $before = 1;
            foreach ($images as $image) {
 
             $exc = $image->getClientOriginalExtension();    
                $filename =   $application->sn.'-before-image-'.$before.'-'.strtotime(now()).'.'.$exc;
                $image->move($destinationPath, $filename);
                $before_image[]=$url."/". $filename;
                $before ++ ;
            }
            $application->before_images =  $before_image;
        }
    

        if ($request->hasFile('during')) {
        
            $images = $request->file('during');
            $during = 1;
            foreach ($images as $image) {
 
             $exc = $image->getClientOriginalExtension();    
                $filename =   $application->sn.'-during-image-'.$during.'-'.strtotime(now()).'.'.$exc;
                $image->move($destinationPath, $filename);
                $during_image[]=$url."/". $filename;
                $during ++ ;
            }
            $application->during_images = $during_image;
        }

        if ($request->hasFile('after')) {
        
            $images = $request->file('after');
            $after = 1;
            foreach ($images as $image) {
 
             $exc = $image->getClientOriginalExtension();    
                $filename =   $application->sn.'-after-image-'.$after.'-'.strtotime(now()).'.'.$exc;
                $image->move($destinationPath, $filename);
                $after_image[]=$url."/". $filename;
                $after ++ ;
            }
            $application->after_images = $after_image;
        }
     
            // if($request->has('before_image_1')){
                
                
            //     // if(File::exists($img_exits.$application->before_image_1)){
            //     //     File::delete($img_exits.$application->before_image_1);
            //     // }
    
            //     $file5 = $request->file('before_image_1');   
    
            //     $exc = $file5->getClientOriginalExtension();    
            //     $filename =   $application->ref_num.'-image-before-image-1-'.strtotime(now()).'.'.$exc;
            //     $file5->move($destinationPath, $filename);
            //     $application->before_image_1=$url.$destinationPath."/". $filename;
    
            // }

            // if($request->has('before_image_2')){
                
                
            //     if(File::exists($img_exits.$application->before_image_2)){
            //         File::delete($img_exits.$application->before_image_2);
            //     }
    
            //     $file5 = $request->file('before_image_2');   
    
            //     $exc = $file5->getClientOriginalExtension();    
            //     $filename =   $application->ref_num.'-image-before-image-2-'.strtotime(now()).'.'.$exc;
            //     $file5->move($destinationPath, $filename);
            //     $application->before_image_2=$url.$destinationPath."/". $filename;
    
            // }

            // if($request->has('during_image_1')){
                
                
            //     if(File::exists($img_exits.$application->during_image_1)){
            //         File::delete($img_exits.$application->during_image_1);
            //     }
    
            //     $file5 = $request->file('during_image_1');   
    
            //     $exc = $file5->getClientOriginalExtension();    
            //     $filename =   $application->ref_num.'-image-during-image-1-'.strtotime(now()).'.'.$exc;
            //     $file5->move($destinationPath, $filename);
            //     $application->during_image_1=$url.$destinationPath."/". $filename;
    
            // }

            // if($request->has('during_image_2')){
                
                
            //     if(File::exists($img_exits.$application->during_image_2)){
            //         File::delete($img_exits.$application->during_image_2);
            //     }
    
            //     $file5 = $request->file('during_image_2');   
    
            //     $exc = $file5->getClientOriginalExtension();    
            //     $filename =   $application->ref_num.'-image-during-image-2-'.strtotime(now()).'.'.$exc;
            //     $file5->move($destinationPath, $filename);
            //     $application->during_image_2=$url.$destinationPath."/". $filename;
    
            // }

            // if($request->has('after_image_1')){
                
                
            //     if(File::exists($img_exits.$application->after_image_1)){
            //         File::delete($img_exits.$application->after_image_1);
            //     }
    
            //     $file5 = $request->file('after_image_1');   
    
            //     $exc = $file5->getClientOriginalExtension();    
            //     $filename =   $application->ref_num.'-image-after-image-1-'.strtotime(now()).'.'.$exc;
            //     $file5->move($destinationPath, $filename);
            //     $application->after_image_1=$url.$destinationPath."/". $filename;
    
            // }
    
            // if($request->has('after_image_2')){
                
                
            //     if(File::exists($img_exits.$application->after_image_2)){
            //         File::delete($img_exits.$application->after_image_2);
            //     }
    
            //     $file5 = $request->file('after_image_2');   
    
            //     $exc = $file5->getClientOriginalExtension();    
            //     $filename =   $application->ref_num.'-image-after-image-2-'.strtotime(now()).'.'.$exc;
            //     $file5->move($destinationPath, $filename);
            //     $application->after_image_2=$url.$destinationPath."/". $filename;
    
            // }

            $application->created_by = $created_by[0]->id;
            $application->date       = $request->date;

        // return $application;

        try {
            $application->update();
            
            DB::insert("UPDATE service_no_details set geom = st_geomfromtext('POINT('||$request->long||' '||$request->lat||')',4326) where id = $request->id");
        }catch(Exception $e){ 
            return response()->json(['status'=>'500' ,'message'=>"failed"]);
            return $e->getMessage();
        }
        return response()->json(['status'=>'200','message'=>"success"]);
    }
}
