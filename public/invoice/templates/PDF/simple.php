<?php
/*
 * THE SIMPLE PDF INVOICE THEME
 * Visit https://code-boxx.com/invoicr-php-invoice-generator for more
 */

// HTML HEADER & STYLES
$this->data = "<!DOCTYPE html><html><head><style>".
"html,body{font-family:DejaVuSans}#bigi{margin-bottom:20px;font-size:18px;font-weight:bold;color:#ad132f;padding:10px}#company,#billship{margin-bottom:10px}#company img{max-width:180px;height:auto}#billship,#company,#items{width:80%;border-collapse:collapse}#billship td{width:33%}#billship td,#items td,#items th{padding:7px}#items th{text-align:left;border-top:2px solid #000;}#items td{border-bottom:1px solid #ccc}.idesc{color:#999}.ttl{font-weight:700}.right{text-align:right}#notes{padding:10px;margin-top:80px}".
"</style></head><body><div id='invoice'>";

// COMPANY LOGO + INFORMATION <img src\="/var/www/html/freelancer/CA-EX/public/invoice/invoicr-11/example/sitelogo.png" width="90"/>
$this->data .= '<table id="company"><tr><td><span style="font-weight:bold;color:#000;font-size:16px;">CANADIANEXPORTS</span></td></tr><tr><td><br>';
for ($i=2;$i<count($this->company);$i++) {
	$this->data .= "<div>".$this->company[$i]."</div>";
}
$this->data .= "</td></tr></table>";

$this->data .= "";

// BILL TO
$this->data .= "<table id='billship' style='border-top:2px solid #000;'><tr><td>";
$this->data .= date("d M, Y")."<br>";
foreach ($this->invoice as $i) {
	$this->data .= "<strong>$i[0]:</strong> $i[1]<br>";
}

// INVOICE INFO
$this->data .= "</td></tr><tr><td>";
foreach ($this->billto as $b) { $this->data .= $b."<br>"; }
$this->data .= "</td></tr></table>";

// ITEMS
$this->data .= "<table id='items'><tr style='height:1px;'><th style='width:80%;'></th><th></th></tr>";
foreach ($this->items as $i) {
	$this->data .= "<tr><td  style='border-bottom:0px;'><div>".$i[0]."</div>".($i[1]==""?"":"<small class='idesc'>$i[1]</small>")."</td><td style='border-bottom:0px;'>".$i[4]."</td></tr>";
}
$this->data .= "<tr ><td colspan='2'  style='border-bottom:2px solid #000;'></td></tr>";
// TOTALS
if (count($this->totals)>0) { foreach ($this->totals as $t) {
	$this->data .= "<tr class='ttl'><td class='right' style='border-bottom:0px;' colspan='1'>$t[0]</td><td style='border-bottom:0px;'>$t[1]</td></tr>";
}}
$this->data .= "</table>";


// NOTES
if (count($this->notes)>0) {
	$this->data .= "<div id='notes'>";
	foreach ($this->notes as $n) {
		$this->data .= $n."<br>";
	}
	$this->data .= "</div>";
}

// CLOSE
$this->data .= "</div></body></html>";
$mpdf->WriteHTML($this->data);
?>