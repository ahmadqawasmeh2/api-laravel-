<?php

namespace App\Http\Controllers\categrioy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\categrioy;

class Categrioescontroller extends Controller
{
    public function index()
    {
        // $categroiy = categrioy::get();
        $categroiy = categrioy::select('id','name_' . app()->getLocale())->get();
        return response()->json($categroiy);
    }
    public function getCategoryById(Request $request)
    {
      $categro=categrioy::select('id','name_' . app()->getLocale())->find($request->id);
      if(!$categro)
      {
         return $this->returnError('001','هذا القسم غير موجود');
      }
      return $this->returnData('categrioy', $categro,'تم استرجاع بنجاح');
    }

    public function changeStatus(Request $request)
    {
        categrioy::where('id',$request -> id)
        -> update(['Active' =>$request ->  Active]);

        return $this->returnSuccessMessage('تم تغير بحاله بنجاح');
    }
}
