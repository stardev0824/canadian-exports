<?php
/*
 * INVOICR : THE PHP INVOICE GENERATOR (HTML, DOCX, PDF)
 * Visit https://code-boxx.com/invoicr-php-invoice-generator for more
 * 
 * ! YOU CAN DELETE THE ENTIRE EXAMPLE FOLDER IF YOU DON'T NEED IT... !
 */

/* [STEP 1 - CREATE NEW INVOICR OBJECT] */
require dirname(__DIR__) . DIRECTORY_SEPARATOR . "invoicr.php";
$invoice = new Invoicr();


/* [STEP 2 - FEED ALL THE INFORMATION] */
// 2A - COMPANY INFORMATION
// OR YOU CAN PERMANENTLY CODE THIS INTO THE LIBRARY ITSELF
$invoice->set("company", [
	(isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "/sitelogo.png",
	__DIR__ . DIRECTORY_SEPARATOR . "sitelogo.png", 
	"Street Address, 1051 Blvd Decarie, ",
	"P. O. Box: 53555 NORGATE, Montreal - Qc.",
	"Canada Postal Code: H4L 3M0. ",
	"Phone: +1-514-557-7856 (From the rest of the world)",
	"Fax: +1-514-333-4979 ",
	"https://www.canadianexports.org",
	" info@canadianexports.org"
]);

// 2B - INVOICE INFO
$invoice->set("invoice", [
	["Order Number", "CB-123-456"]
]);

// 2C - BILL TO
$invoice->set("billto", [
	"Customer Name",
	"Street Address"
]);


// 2E - ITEMS
// YOU CAN JUST DUMP THE ENTIRE ARRAY IN USING SET, BUT HERE IS HOW TO ADD ONE AT A TIME... 
$items = [
	["Rubber Hose", "5m long rubber hose", 3, "$5.50", "$16.50"],
	["Rubber Shoe", "For slipping, not for running", 1, "$20.00", "$20.00"]
];
foreach ($items as $i) { $invoice->add("items", $i); }

// 2F - TOTALS
$invoice->set("totals", [
	["SUB-TOTAL", "$108.00"],
	["DISCOUNT 10%", "-$10.80"],
	["TOTAL", "$97.20"]
]);

// 2G - NOTES, IF ANY
$invoice->set("notes", [
	"http://www.canadianexports.org/page/privacy_policy",
	"Please retain for your records."
]);


/* [STEP 3 - OUTPUT] */
// 3A - CHOOSE TEMPLATE, DEFAULTS TO SIMPLE IF NOT SPECIFIED
$invoice->template("simple");

/*****************************************************************************/
// 3B - OUTPUT IN HTML
// DEFAULT DISPLAY IN BROWSER | 1 DISPLAY IN BROWSER | 2 FORCE DOWNLOAD | 3 SAVE ON SERVER
 $invoice->outputHTML();
 //$invoice->outputHTML(1);
 //$invoice->outputHTML(2, "invoice.html");
 //$invoice->outputHTML(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.html");
/*****************************************************************************/
// 3C - PDF OUTPUT
// DEFAULT DISPLAY IN BROWSER | 1 DISPLAY IN BROWSER | 2 FORCE DOWNLOAD | 3 SAVE ON SERVER
 //$invoice->outputPDF();
 //$invoice->outputPDF(1);
 //$invoice->outputPDF(2, "invoice.pdf");
 $invoice->outputPDF(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.pdf");
/*****************************************************************************/
// 3D - DOCX OUTPUT
// DEFAULT FORCE DOWNLOAD| 1 FORCE DOWNLOAD | 2 SAVE ON SERVER
// $invoice->outputDOCX();
// $invoice->outputDOCX(1, "invoice.docx");
// $invoice->outputDOCX(2, __DIR__ . DIRECTORY_SEPARATOR . "invoice.docx");
/*****************************************************************************/
?>