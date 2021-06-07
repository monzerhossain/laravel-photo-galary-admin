<?php
/**
 * Created by PhpStorm.
 * User: monzer
 * Date: 6/6/21
 * Time: 9:38 AM
 */

namespace App\Http\Controllers;

use App\Models\categories;


class CategoryApiController extends Controller
{
    public function getCategories(){
        try {
            return categories::all();
        }
        catch (\Exception $ex)
        {
            return response()->json( ["message" => "Something went wrong. Please contact the administration"], 500);
        }
    }
}