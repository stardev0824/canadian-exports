<?php


namespace App\Paypal;


use App\User;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class ExecutePayment extends Paypal
{
    public function execute(Request $request,$price)
    {
        
        $paymentId = $request->paymentId;
        $payment = Payment::get($paymentId, $this->_api_context);

    // dd($payment);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);

        // $transaction = new Transaction();
        // $amount = new Amount();

        // $amount->setCurrency('USD');
        // $amount->setTotal($price);
        // $transaction->setAmount($amount);

        // //$transaction->setAmount($amount);
        // $execution->addTransaction($transaction);
        // dd($execution);
        $result = $payment->execute($execution, $this->_api_context);
        // dd($result);
        if ($result->getState()=="approved"){
            $user = User::find(session("user_id"));
            $expired_at=null;
            if ($user->expired_at==null || $user->expired_at< now())
            {
                $expired_at = now()->addMonths($this->getExpiredDate($user->package));
            }

            if ($user->expired_at>now())
            {
                $expired_at =$user->expired_at->addMonths($this->getExpiredDate($user->package));
            }
            $user->update([
                "paid_amount"=>$result->getTransactions()[0]->getAmount()->total,
                "payment_status"=>"Completed",
                "expired_at"=>$expired_at
            ]);
            $profile = $user->profile();
            if($user->approved == "0") {
                sendUserRegistrationMailToAdmin($user);
                session()->flash("success","Congratulations! Your profile was successfully created! \nWating for approvement.");
            }

        /***********************************************/
            $info_price = session("price");
    	    $info_ordernumber = $request->token;
            $info_paymentId = $request->paymentId;
		    $info_peyerid = $request->PayerID;
            $orderDetails = array("orderNumber" => $info_ordernumber,"customerName" => $user->name ,"customerEmail" => $user->email, "itemName" => "Membership Package: ".substr($user->package_description,0,-8),"itemPrice" => $info_price);
			system("php invoice/handler.php '".json_encode($orderDetails)."'");
		  
// 		  function sendgrid($to,$nameto,$subj,$message,$altmess=null,$attach=null){	
// 				$postfields = 'from=no-reply@canadianexports.org&fromname=Canadian Exports&to='.$to.'&subject='.$subj.'&text='.urlencode($altmess).'&html='.urlencode($message);
// 				$params = array(
// 			    'to'        => $to,
// 			    'subject'   => $subj,
// 			    'html'      => $message,
// 			    'text'      => urlencode($altmess),
// 			    'from'      => 'no-reply@canadianexports.org',
// 			    'fromname'      => 'Canadian Exports',
// 			  );
// 			  //    'files['.$fileName.']' => '@'.$filePath.'/'.$fileName
// 			  if(isset($attach)){
// 			  	 $file = explode("/",$attach);
// 			  	 $params['files['.end($file).']'] = file_get_contents($attach);			  }
			
// 				$ch = curl_init('https://api.sendgrid.com/api/mail.send.json');		
			
// 				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 				curl_setopt($ch, CURLINFO_HEADER_OUT, true);
// 				curl_setopt($ch, CURLOPT_POST, true);
// 				curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
// 				curl_setopt($ch, CURLOPT_VERBOSE, true);
			
// 				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// 				    'Authorization: Bearer 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'
// 				));
				 
// 				// Submit the POST request
// 				$result = curl_exec($ch);
// 				 echo $result;
// 				// Close cURL session handle
// 				curl_close($ch);
// 			}
// 			sendgrid($user->email,$user->name,"Your receipt from Canadian Exports","
// Dear ".$user->name.",
// <br>
// <br>
// Thank you for your payment at canadianexport.<br>
// Please contact us in case you have any question.
// <br>
// <br>
// <h4>If you have any questions, call us at 1-877-333-3014</h4>
// <hr>
// This email was sent from an outgoing-only address that cannot accept incoming emails. if you haven't found the information you are looking for and still have questions, please visit our website to access general information,
// frequently asked questions, contact us information, and more.   
// ","","invoice/".$info_ordernumber.".pdf");

// 			sendgrid($user->email,$user->name,"Welcome to Canadian Exports","
// Dear ".$user->name.",
// <br>
// Thank you for registering with www.canadianexports.org . We want to welcome you to our family, invite you to contact us anytime at any stage of the exporting process, and introduce you to the many benefits of registration,
// including:
// <ul>
// 	<li>Leads, leads, and more leads; keep your sales department busy. We generate an average number of leads of over 7,000 a day, every day. If you want us to filter them out and send you the ones from YOUR Business
// Category, just send us an email.</li>

// 	<li>Special Rates and discounts from many export-related service providers.</li>
// 	<li>Financing Programs that cover part or all of your export-related. expenses. This includes loans, grants, tax credits, guarantees and advisors.</li>
// 	<li>Live customer support Monday to Friday, between 09:00 and 17:00 EST.</li>
// 	<li>Monthly report on how your Business Profile is doing: number of visitors, Bounce Rate, Conversion Rate, and so on</li>
// 	<li>How other members in your Business Category are doing in terms of the same Ratios.</li>
// 	<li>And much more</li>
// </ul>
// <h4>If you have any questions, call us at 1-877-333-3014</h4>
// <hr>
// This email was sent from an outgoing-only address that cannot accept incoming emails. if you haven't found the information you are looking for and still have questions, please visit our website to access general information,
// frequently asked questions, contact us information, and more.   

// ");

			/******************************************/
            return redirect("/");
        }
        session()->flash("error","Oops something wrong");
        return redirect("/");
    }


    private function getExpiredDate($package)
    {
        switch ($package){
            case "one":return 1;
            case "two":return 4;
            default:return 16;
        }
    }
}
