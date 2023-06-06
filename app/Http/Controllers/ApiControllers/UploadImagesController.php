<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
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
    
        if(!$request->has('id')){
            return response()->json(['message'=>'application id is required']);
        }
        
        
        $destinationPath ='asset/images/upload-images';
        // $img_exits = public_path().'/asset/images/upload-images/';
        $url = asset('asset/images/upload-images');

        $application = ServiceNo::find($request->id);
        if(!$application){
            return response()->json(['statusCode'=>'404','message'=>"user not found"]);
        }


        if ($request->hasFile('before') && $request->before != []) {
            
        
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
    

        if ($request->hasFile('during') && $request->during != []) {
        
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

        if ($request->hasFile('after') && $request->after != []) {
        
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
     
       
            
            
            $user_sql="Select id from users where name = '$request->created_by' limit 1";
            $user_id=DB::select($user_sql);
            $application->created_by = $user_id[0]->id;
            $application->date       = $request->date;

        try {
            if ($request->has('status')) {
               $application->status = $request->status;
            }
            $application->update();
            
            
            // DB::insert("UPDATE service_no_details set geom = st_geomfromtext('POINT('||$request->long||' '||$request->lat||')',4326) where id = $request->id");

            DB::statement("UPDATE service_no_details SET geom = ST_GeomFromText('POINT(' || CAST(? AS text) || ' ' || CAST(? AS text) || ')', 4326) WHERE id = ?", [$request->long, $request->lat, $request->id]);
// 
            // if ($request->has('status')) {
            //     PurchaseOrder::where('po_number',$application->po_no)->update(['status'=>$request->status]);
            // }
           
            DB::disconnect();
        }catch(Exception $e){ 
            DB::disconnect();
            return response()->json(['statusCode'=>'500' ,'message'=>"failed"]);
            return $e->getMessage();
        }
        return response()->json(['statusCode'=>'200','message'=>"success"]);
    }
}
