<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\ServiceNo;
use Illuminate\Http\Request;
use Exception;
use File;
use Illuminate\Support\Facades\DB;

class UploadImagesController extends Controller
{
    //

    public function insert(Request $request)
    {
        if(!$request->has('id')){
            return response()->json(['message'=>'application id is required']);
        }
        
        $destinationPath = 'asset/images/upload-images';
        $img_exits = public_path().'/asset/images/upload-images/';

        $application = ServiceNo::find($request->id);
        if(!$application){
            return response()->json(['status'=>'404','message'=>"user not found"]);
        }

    

     
            if($request->has('before_image_1')){
                
                
                if(File::exists($img_exits.$application->before_image_1)){
                    File::delete($img_exits.$application->before_image_1);
                }
    
                $file5 = $request->file('before_image_1');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-before-image-1-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->before_image_1="http://dbkl.aerosynergy.com.my/".$destinationPath."/". $filename;
    
            }

            if($request->has('before_image_2')){
                
                
                if(File::exists($img_exits.$application->before_image_2)){
                    File::delete($img_exits.$application->before_image_2);
                }
    
                $file5 = $request->file('before_image_2');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-before-image-2-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->before_image_2="http://dbkl.aerosynergy.com.my/".$destinationPath."/". $filename;
    
            }

            if($request->has('during_image_1')){
                
                
                if(File::exists($img_exits.$application->during_image_1)){
                    File::delete($img_exits.$application->during_image_1);
                }
    
                $file5 = $request->file('during_image_1');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-during-image-1-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->during_image_1="http://dbkl.aerosynergy.com.my/".$destinationPath."/". $filename;
    
            }

            if($request->has('during_image_2')){
                
                
                if(File::exists($img_exits.$application->during_image_2)){
                    File::delete($img_exits.$application->during_image_2);
                }
    
                $file5 = $request->file('during_image_2');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-during-image-2-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->during_image_2="http://dbkl.aerosynergy.com.my/".$destinationPath."/". $filename;
    
            }

            if($request->has('after_image_1')){
                
                
                if(File::exists($img_exits.$application->after_image_1)){
                    File::delete($img_exits.$application->after_image_1);
                }
    
                $file5 = $request->file('after_image_1');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-after-image-1-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->after_image_1="http://dbkl.aerosynergy.com.my/".$destinationPath."/". $filename;
    
            }
    
            if($request->has('after_image_2')){
                
                
                if(File::exists($img_exits.$application->after_image_2)){
                    File::delete($img_exits.$application->after_image_2);
                }
    
                $file5 = $request->file('after_image_2');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-after-image-2-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->after_image_2="http://dbkl.aerosynergy.com.my/".$destinationPath."/". $filename;
    
            }

            $application->created_by = $request->created_by;
            $application->date       = $request->date;

        // return $application;

        try {
            $application->update();
            DB::raw("UPDATE service_no_details set geometry = st_geomfromtext('POINT('||$request->long||' '||$request->lat||')',4326) where id = $re");
        }catch(Exception $e){ 
            return response()->json(['status'=>'500' ,'message'=>"failed"]);
            return $e->getMessage();
        }
        return response()->json(['status'=>'200','message'=>"success"]);
    }
}
