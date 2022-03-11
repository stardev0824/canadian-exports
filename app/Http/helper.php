<?php

use App\Issue;
use Illuminate\Support\Facades\Storage;

if (!function_exists("admin"))
{
    function admin(){
        return auth()->guard("admin");
    }
}

if (!function_exists("aurl"))
{
    function aurl($url=null)
    {
        return url('admin/'.$url);
    }
}

if (!function_exists("getAllCategories"))
{
    function getAllCategories()
    {
        //return \App\Category::all();
        return \App\Category::orderBy('name_en', 'asc')->get();
    }
}

if (!function_exists("getAllBanAndSpo"))
{
    function getAllBanAndSpo($type)
    {
        return \App\BannerAndSponsor::where("type",$type)->get();
    }
}

if (!function_exists("getAllEvent"))
{
    function getAllEvents($limit=null,$paginate=null)
    {
        if (isset($limit))
        {
            return \App\Event::orderBy('updated_at', 'desc')->limit($limit)->get();
        }

        if (isset($paginate))
        {
            return \App\Event::orderBy('updated_at', 'desc')->paginate($paginate);
        }
        return \App\Event::orderBy('updated_at', 'desc')->get();
    }
}

if (!function_exists("getAllIssues")){
    function getAllIssues()
    {
        return \App\Issue::orderBy("created_at","desc")->paginate(9);
    }
}

if (!function_exists("socialMedia")){
    function socialMedia()
    {
        return \App\SocialMedia::all();
    }
}

if (!function_exists("getAllTestimonies"))
{
    function getAllTestimonies()
    {
        return \App\Testimonial::orderBy('id',"desc")->paginate(10);
    }
}

if (!function_exists("upload"))
{
    function upload($file,$type)
    {
        if (isset($file))
        {
            $hashName = $file->hashName();
            $path = $type."/".time()."/".$hashName;
            $file->store($path);
            return $path."/".$hashName;
        }
        return null;
    }
}

if (!function_exists("delete_profile"))
{
    function delete_profile($profile)
    {
        delete_media($profile);
        $profile->social_media()->delete();
        $profile->categories()->detach();
        $profile->delete();
    }
}

if (!function_exists("delete_media"))
{
    function delete_media($profile)
    {
        if (isset($profile->media()->get()->first()->logo)){
            Storage::has($profile->media()->get()->first()->logo)?Storage::delete($profile->media()->get()->first()->logo):"";
        }


        if (isset($profile->media()->get()->first()->image_1)){
            Storage::has($profile->media()->get()->first()->image_1)?Storage::delete($profile->media()->get()->first()->image_1):"";
        }

        if (isset($profile->media()->get()->first()->image_2)){
            Storage::has($profile->media()->get()->first()->image_2)?Storage::delete($profile->media()->get()->first()->image_2):"";
        }

        if (isset($profile->media()->get()->first()->image_3)){
            Storage::has($profile->media()->get()->first()->image_3)?Storage::delete($profile->media()->get()->first()->image_3):"";
        }

        if (isset($profile->media()->get()->first()->image_4)){
            Storage::has($profile->media()->get()->first()->image_4)?Storage::delete($profile->media()->get()->first()->image_4):"";
        }

        $profile->media()->delete();
    }

}

if (!function_exists("auth_profile"))
{
    function auth_profile()
    {
        return auth()->user()->profile();
    }
}

if (!function_exists("getInfos"))
{
    function getInfos()
    {
        $infos = \App\Info::query()->get()->first();

        return $infos;
    }
}

if (!function_exists("getPackageDescription"))
{
    function getPackageDescription($package)
    {
        switch ($package){
            case "zero": session()->put("price", 0); return "Free plan";
            case "one": session()->put("price", 6.99); return "One months subscription - $6.99";
            case "two": session()->put("price", 13.98);return "Three months subscription - $13.98 (one months free)";
            case "three": session()->put("price", 55.92); return "One year subscription - $55.92 (four months free)";
            case "four": session()->put("price", 69.9); return "One months subscription - $69.9";
            case "five": session()->put("price", 139.8);return "Three months subscription - $139.8 (one months free)";
            case "six": session()->put("price", 559.2); return "One year subscription - $559.2 (four months free)";
            default: break;
        }
    }
}

if (!function_exists("getAllItems"))
{
    function getAllItems($paginateNumber=null)
    {
        if (isset($paginateNumber))
        {
            return \App\Buy::orderBy("created_at","desc")->paginate($paginateNumber);
        }

        if ($paginateNumber==0)
        {
            return \App\Buy::orderBy("created_at","desc")->get();
        }

        return App\Buy::orderBy("created_at","desc")->paginate(9);
    }
}

if (!function_exists("getVideoHtmlAttribute"))
{
    function getVideoHtmlAttribute($url=null)
    {
        if (isset($url)){
            $embed = Cohensive\Embed\Facades\Embed::make($url)->parseUrl();

            if (!$embed)
                return '';

            $embed->setAttribute(['width' => 200]);
            return $embed->getHtml();
        }else{
            return null;
        }

    }
}
if (!function_exists('str_truncate'))
{
    function str_truncate($string, $limit, $break=".", $pad="...")
    {

        $string = strip_tags($string);
        // return with no change if string is shorter than $limit
        if(strlen($string) <= $limit) return $string;

        // is $break present between $limit and the end of the string?
        if(false !== ($breakpoint = strpos($string, $break, $limit))) {
            if($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }
}


if (!function_exists("getCurrentIssue")){
    function getCurrentIssue(){
        $issue = Issue::where("is_current_issue",true)->orderBy("created_at","desc")->get()->first();
        return isset($issue)?$issue:null;
    }
}

if (!function_exists("sendUserRegistrationMailToAdmin")){
    function sendUserRegistrationMailToAdmin($user){
        $profile = $user->profile();

        $to = env('ADMIN_MAIL');
        $from = $user->email;

        $categories = $profile->categories->toArray();
        $categoryList = [];
        foreach($categories as $one) 
            array_push($categoryList, "\"".$one['name_en']."\"");
        $categoryList = implode(", ", $categoryList);

        $companyName = $profile->company_name;
        $package = $user->package_description;
        $token = hash('sha256', Str::random(60));
        $user->update(['approved'=> $token]);
        
        $data = ['to'=>$to, 'from'=>$from, 'companyName'=>$companyName, 'categoryList'=>$categoryList, 'package'=>$package, 'token'=>$token];
        Mail::send("mails.reg_to_admin", compact("data"), function($message) use ($data) {
            $message->to($data['to'])
                    ->from($data['from'])
                    ->subject("Canadian Exports: New user registration");
        });
    }
}
