<?php

namespace App\Paypal;

use App\Paypal\PaypalAgrement;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Common\PayPalModel;

class CreatePlan extends Paypal{
	public function create(){
		$plan = new Plan();
		$plan->setName('Three months subscription - $13.98*')
		    ->setDescription('Three months subscription - $13.98* Canadian Exports | Canadian products and services')
		    ->setType('fixed');
		$paymentDefinition = new PaymentDefinition();
		$paymentDefinition->setName('Recuring Payments')
						    ->setType('REGULAR')
						    ->setFrequency('Month')
						    ->setFrequencyInterval("3")
						    ->setCycles("12")
						    ->setAmount(new Currency(array('value' => 13.98, 'currency' => 'USD')));
		$chargeModel = new ChargeModel();
		$chargeModel->setType('SHIPPING')
		    ->setAmount(new Currency(array('value' => 0, 'currency' => 'USD')));

		$paymentDefinition->setChargeModels(array($chargeModel));

		$merchantPreferences = new MerchantPreferences();

		// $baseUrl = getBaseUrl();
		$merchantPreferences->setReturnUrl(config('paypal.url.success'))
	    ->setCancelUrl(config('paypal.url.failure'))
	    ->setAutoBillAmount("yes")
	    ->setInitialFailAmountAction("CONTINUE")
	    ->setMaxFailAttempts("0")
	    ->setSetupFee(new Currency(array('value' => 13.98, 'currency' => 'USD')));

	    $plan->setPaymentDefinitions(array($paymentDefinition));
		$plan->setMerchantPreferences($merchantPreferences);

		$output = $plan->create($this->_api_context);
		// this->active($output->id)
		dd($output);
	}
	public function listPlan(){
		$params = array('page_size' => '2');
    	$planList = Plan::all($params, $this->_api_context);
    	return $planList;
	}
	public function planDetail($id){
    	$planList = Plan::get($id, $this->_api_context);
    	return $planList;
	}
	public function active($id){
		$patch = new Patch();
		$createdPlan=Plan::get($id,$this->_api_context);
	    $value = new PayPalModel('{
		       "state":"ACTIVE"
		     }');

	    $patch->setOp('replace')
	        ->setPath('/')
	        ->setValue($value);
	    $patchRequest = new PatchRequest();
	    $patchRequest->addPatch($patch);

	    $createdPlan->update($patchRequest, $this->_api_context);
	    $plan = Plan::get($createdPlan->getId(), $this->_api_context);
	    return $plan;
	}
	public function createAgrement($id){
		$agreement= new PaypalAgrement();
		$agreement->create($id);
	}
} 
?>