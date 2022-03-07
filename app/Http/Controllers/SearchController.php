<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Event;
use App\Buy;
use App\Http\Requests\UserRegisterRequest;
use App\InfoLetter;
use App\Mail\CommentMail;
use App\Mail\ContactCompanyMail;
use App\Mail\InquireMail;
use App\Media;
use App\Profile;
use App\SocialMedia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->category == 2){
            $cond = [];
            $q = $_GET['q'];
            if(!empty($_GET['criteria']) && $_GET['criteria'] == 1 ) $cond[] = ['profiles.company_name', 'like', "%".$q."%"];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 2 ) $cond[] = ['profiles.company_name', '=', $q];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 3 ) $cond[] = ['profiles.company_name', 'like', "%".$q."%"];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 4 ){	
					if(preg_match("/ and /i",$q)){ $qex = explode(" AND ",$q);
						$qex = explode(" and ",$q);
    					$cond[] = ['profiles.company_name', 'like', "%".$qex[0]."%"];
    					$cond[] = ['profiles.company_name', 'like', "%".$qex[1]."%"];
    				}else{
    					$cond[] = ['profiles.company_name', 'like', "%".$q."%"];
    				}   				
    			}
    			$searches =  DB::table('profiles')->select('profiles.id','profiles.user_id','profiles.company_name','profiles.company_email','profiles.address','profiles.site','profiles.phone','profiles.fax','profiles.short_description','profiles.description','profiles.langs','profiles.tag_line','profiles.key_word','media.logo')->join('media','media.profile_id','=','profiles.id')->join('category_profile','category_profile.profile_id','=','profiles.id')->where($cond)->where(['category_profile.category_id' => $_GET['bussines_category']])->paginate(20);
    			//$searches = Profile::where($cond)->with('media')->paginate(20);
    			//$searchres=DB::table('profiles')->select('*')->where($cond)->paginate(20);
    			//print_r($searches->toArray());die;
    			return view("advance-search",compact("searches"));
        }
        if($request->category == 3){
            $cond = [];
            $q = $_GET['q'];
            if(!empty($_GET['criteria']) && $_GET['criteria'] == 1 ) $cond[] = ['title', 'like', "%".$q."%"];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 2 ) $cond[] = ['title', '=', $q];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 3 ) $cond[] = ['title', 'like', "%".$q."%"];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 4 ){	
					if(preg_match("/ and /i",$q)){ $qex = explode(" AND ",$q);
						$qex = explode(" and ",$q);
    					$cond[] = ['title', 'like', "%".$qex[0]."%"];
    					$cond[] = ['title', 'like', "%".$qex[1]."%"];
    				}else{
    					$cond[] = ['title', 'like', "%".$q."%"];
    				}   				
    			}
    			$searches = Event::where($cond)->paginate(20);
    			return view("advance-search",compact("searches"));
        }
        if($request->category == 4){
            $cond = [];
            $q = $_GET['q'];
            if(!empty($_GET['criteria']) && $_GET['criteria'] == 1 ) $cond[] = ['name', 'like', "%".$q."%"];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 2 ) $cond[] = ['name', '=', $q];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 3 ) $cond[] = ['name', 'like', "%".$q."%"];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 4 ){	
					if(preg_match("/ and /i",$q)){ $qex = explode(" AND ",$q);
						$qex = explode(" and ",$q);
    					$cond[] = ['name', 'like', "%".$qex[0]."%"];
    					$cond[] = ['name', 'like', "%".$qex[1]."%"];
    				}else{
    					$cond[] = ['name', 'like', "%".$q."%"];
    				}   				
    			}
    			$searches = Buy::where($cond)->paginate(20);
    			//print_r($searches->toArray());die;
    			return view("advance-search",compact("searches"));
        }
        return view("advance-search");
    }

}
