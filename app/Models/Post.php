<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{

        protected $with = ['category', 'user'];

        public static function some(){

            return cache()->remember('posts', now()->addMinutes(2), function(){


                return DB::table("posts")->paginate(5);
            });
        }


        public function getRouteKeyName(){

            return 'slug';
          }
    


        public function category(){

            return $this->belongsTo( Category::class );

        }

        public function user(){

            return $this->belongsTo(User::class);
        }

        

        


        

}