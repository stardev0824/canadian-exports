<?php

function sendgrid($to,$nameto,$subj,$message,$altmess=null){
	
	$postfields = 'from=no-reply@study-intheus.com&fromname=Study In Canada&to='.$to.'&subject='.$subj.'&text='.urlencode($altmess).'&html='.urlencode($message);

	$ch = curl_init('https://api.sendgrid.com/api/mail.send.json');
	

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
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