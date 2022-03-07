<?php
/*
 * BLUEBERRY DOCX INVOICE THEME
 * Visit https://code-boxx.com/invoicr-php-invoice-generator for more
 */

// THE TABLE STYLE
$tableStyle = [
	'width' => 5000, 
	'unit' => 'pct', 
	'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER
];

// COMPANY LOGO + INFORMATION
$section = $pw->addSection();
$table = $section->addTable($tableStyle);
$cell = $table->addRow()->addCell();
$cell->addText("SALES INVOICE",
	['color'=>"258ec7", 'bold'=>true, 'size'=>20],
	['spaceAfter' => 200, 'spaceBefore'=>0]);
for ($i=2;$i<count($this->company);$i++) {
	$cell->addText($this->company[$i],
		['color' => '888888','size' => "9"], 
		['spaceAfter' => 0,]
	);
}
$cell = $table->addCell();
$cell->addImage($this->company[1], ['width'=>120, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT]);

// BILL TO
$section->addText(" ",[],['spaceBefore'=>200]);
$table = $section->addTable($tableStyle);
$cell = $table->addRow()->addCell();
$cell->addText("BILL TO",['bold'=>true],['spaceAfter' => 0, 'spaceBefore'=>0]);
foreach ($this->billto as $b) { 
	$cell->addText($b,[],['spaceAfter' => 0, 'spaceBefore'=>0]);
}

// SHIP TO
$cell = $table->addCell();
$cell->addText("SHIP TO",['bold'=>true],['spaceAfter' => 0, 'spaceBefore'=>0]);
foreach ($this->shipto as $s) { 
	$cell->addText($s,[],['spaceAfter' => 0, 'spaceBefore'=>0]);
}

// INVOICE INFO
$cell = $table->addCell();
foreach ($this->invoice as $i) {
	$textrun = $cell->addTextRun(['spaceAfter' => 0, 'spaceBefore'=>0]);
	$textrun->addText($i[0].": ",['bold'=>true]);
	$textrun->addText($i[1]);
}

// ITEMS
$section->addText(" ",[],['spaceBefore'=>200]);
$table = $section->addTable($tableStyle);
$table->addRow();
$style = [
	'borderBottomSize' => 18, 'borderBottomColor' => '98c5dc',
	'borderTopSize' => 18, 'borderTopColor' => '98c5dc', 'bgColor' => '98c5dc'
];
$cell = $table->addCell(2000, $style);
$cell->addText("Item",['bold'=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Quantity",['bold'=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Unit Price",['bold'=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Amount",['bold'=>true]);
$style = ['borderBottomSize' => 10, 'borderBottomColor' => 'c8d2d7', 'bgColor' => 'e4eff5'];
foreach ($this->items as $i) {
	$table->addRow();
	$cell = $table->addCell(2000, $style);
	$cell->addText($i[0]);
	if ($i[1]!="") { $cell->addText($i[1],['size'=>9,'color'=>'999999']); }
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[2]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[3]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[4]);
}

// TOTALS
$style = ['bgcolor'=>'98c5dc'];
if (count($this->totals)>0) { foreach ($this->totals as $t) {
	$table->addRow();
	$cell = $table->addCell(4000, array_merge($style, ['gridSpan' => 3]));
	$cell->addText($t[0], ['bold'=>true]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($t[1], ['bold'=>true]);
}}

// NOTES
if (count($this->notes)>0) {
	$section->addText(" ");
	$style = ['bgcolor'=>'e4eff5'];
	$table = $section->addTable($tableStyle);
	$cell = $table->addRow()->addCell(5000, $style);
	foreach ($this->notes as $n) {
		$cell->addText($n);
	}
}
?>