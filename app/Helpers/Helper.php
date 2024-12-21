<?php

namespace App\Helpers;
use Session;
use Illuminate\Support\Facades\DB;

class Helper{

	public static function get_user_data(string $string)

    {
        $query = DB::table("users")->where("id",$string);
        if($query->count() > 0)
        {
            return $query->get()->first();
        } else
        {
            return false;
        }

    }

     public static function get_permission_data(string $string)
    {
        $query = DB::table("user_permissions")->where("id",$string);
        if($query->count() > 0)
        {
            return $query->get()->first();
        } else
        {
            return false;
        }
    }


    public static function user_role_name($id){

		$result = DB::table('user_permissions')->where('id',$id)->first();
        if($result !='' && isset($result)){
            return $result->cname;
        }else{
            echo "-";
        }
	}


    public static function getTwoLinesText($text, $wordLimit = 10){

        $words = explode(' ', $text);
        if (count($words) > $wordLimit) {
            return implode(' ', array_slice($words, 0, $wordLimit)) . '...';
        }
        return $text;
	}

    public static function get_category_name($id){

		$result = DB::table('categories')->where('id',$id)->value('name');
        if($result !='' && isset($result)){
            return $result;
        }else{
            echo "-";
        }
	}
    public static function get_product_name($id){

		$result = DB::table('products')->where('id',$id)->value('name');
        if($result !='' && isset($result)){
            return $result;
        }else{
            echo "-";
        }
	}


}
