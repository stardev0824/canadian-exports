<?php


function sendgrid($to,$nameto,$subj,$message,$altmess=null,$attach=null){

	
	$postfields = 'from=no-reply@canadianexports.org&fromname=Canadian Exports&to='.$to.'&subject='.$subj.'&text='.urlencode($altmess).'&html='.urlencode($message);
	$params = array(
    'to'        => $to,
    'subject'   => $subj,
    'html'      => $message,
    'text'      => urlencode($altmess),
    'from'      => 'no-reply@canadianexports.org',
    'fromname'      => 'Canadian Exports',
  );
  //    'files['.$fileName.']' => '@'.$filePath.'/'.$fileName
  if(isset($attach)){
  	 $file = explode("/",$attach);
  	 $params['files['.end($file).']'] = file_get_contents($attach);
  }

	$ch = curl_init('https://api.sendgrid.com/api/mail.send.json');
	

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_VERBOSE, true);

	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Authorization: Bearer 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'
	));
	 
	// Submit the POST request
	$result = curl_exec($ch);
	 echo $result;
	// Close cURL session handle
	curl_close($ch);
}


?>