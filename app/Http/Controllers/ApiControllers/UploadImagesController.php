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
        
        
        $destinationPath = 'asset/images/upload-images';
        $img_exits = public_path().'/asset/images/upload-images/';
        $url = "http://121.121.232.54:9090/";

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
                $application->before_image_1=$url.$destinationPath."/". $filename;
    
            }

            if($request->has('before_image_2')){
                
                
                if(File::exists($img_exits.$application->before_image_2)){
                    File::delete($img_exits.$application->before_image_2);
                }
    
                $file5 = $request->file('before_image_2');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-before-image-2-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->before_image_2=$url.$destinationPath."/". $filename;
    
            }

            if($request->has('during_image_1')){
                
                
                if(File::exists($img_exits.$application->during_image_1)){
                    File::delete($img_exits.$application->during_image_1);
                }
    
                $file5 = $request->file('during_image_1');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-during-image-1-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->during_image_1=$url.$destinationPath."/". $filename;
    
            }

            if($request->has('during_image_2')){
                
                
                if(File::exists($img_exits.$application->during_image_2)){
                    File::delete($img_exits.$application->during_image_2);
                }
    
                $file5 = $request->file('during_image_2');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-during-image-2-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->during_image_2=$url.$destinationPath."/". $filename;
    
            }

            if($request->has('after_image_1')){
                
                
                if(File::exists($img_exits.$application->after_image_1)){
                    File::delete($img_exits.$application->after_image_1);
                }
    
                $file5 = $request->file('after_image_1');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-after-image-1-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->after_image_1=$url.$destinationPath."/". $filename;
    
            }
    
            if($request->has('after_image_2')){
                
                
                if(File::exists($img_exits.$application->after_image_2)){
                    File::delete($img_exits.$application->after_image_2);
                }
    
                $file5 = $request->file('after_image_2');   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-after-image-2-'.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->after_image_2=$url.$destinationPath."/". $filename;
    
            }
            $user_sql="Select id from users where name = '$request->created_by' limit 1";
           // echo $user_sql;
            $user_id=DB::select($user_sql);

           // print_r($user_id);
            // echo $user_id[0]->id;
            // exit();
           // $application->created_by = $request->created_by;
           $application->created_by = $user_id[0]->id;

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