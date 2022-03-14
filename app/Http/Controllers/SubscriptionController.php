<?php

namespace App\Http\Controllers;

use App\Paypal\PaypalAgrement;
use Illuminate\Http\Request;
use App\Paypal\CreatePlan;

class SubscriptionController extends Controller
{
    public function create(){
        $plan = new CreatePlan();
        $plan->create();
    }
    public function listPlan(){
        $plan= new CreatePlan();
        return $plan->listPlan();

    }
    public function activePlan($id){
        $plan= new Createplan($id);
        return $plan->active($id);

    }
    public function createAgrement($id){
        // dd(session()->has('recuringPackage')==true );
        if(session()->has('recuringPackage')==true && session()->get('recuringPackage')=="zero"){
            $id="P-0413594924882850CN6BUMNY";
        }
        if(session()->has('recuringPackage')==true && session()->get('recuringPackage')=="one"){
            $id="P-0413594924882850CN6BUMNY";
        }
        if(session()->has('recuringPackage')==true && session()->get('recuringPackage')=="two"){
            $id="P-854646590J667164WN6CMNNQ";
        }
        if(session()->has('recuringPackage')==true && session()->get('recuringPackage')=="three"){
            $id="P-56199853UL1936346N55QCPI";
        }
        if(session()->has('recuringPackage')==true && session()->get('recuringPackage')=="four"){
            $id="P-43Y08457FD330861CMIXBGUA";
        }
        if(session()->has('recuringPackage')==true && session()->get('recuringPackage')=="five"){
            $id="P-854646590J667164WN6CMNNQ";
        }
        if(session()->has('recuringPackage')==true && session()->get('recuringPackage')=="six"){
            $id="P-56199853UL1936346N55QCPI";
        }
        $plan= new PaypalAgrement();
        return $plan->create($id);

    }
    public function execute($status){
        $plan= new PaypalAgrement();
        if($status=='success' || $status=='true'){
           return $plan->execute(request('token')); 
        }
    }
}
