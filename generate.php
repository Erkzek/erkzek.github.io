<?php

require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;


$elevatorID = $_POST['elevatorID'];
$contractID = $_POST['contractID'];
$contractDate = $_POST['contractDate'];
$subContractor = $_POST['subContractor'];
$subContractorAddress  = $_POST['subContractorAddress'];
$NIP = $_POST['NIP'];
$representative = $_POST['representative'];
$prokurent  = $_POST['prokurent'];
$elevatorType = $_POST['elevatorType'];
$elevatorCapacity = $_POST['elevatorCapacity'];
$elevatorStops = $_POST['elevatorStops'];
$elevatorEntries = $_POST['elevatorEntries'];
$elevatorSites = $_POST['elevatorSites'];
$harmonogram = $_POST['harmonogram'];
$workFront = $_POST['workFront'];
$UDT = $_POST['UDT'];
$deadline = $_POST['deadline'];
$price  = $_POST['price'];
$priceInWords = $_POST['priceInWords'];
$VAT = $_POST['VAT'];
$facture = $_POST['facture'];
$warranty = $_POST['warranty'];
$warrantyStart  = $_POST['warrantyStart'];
$penalty = $_POST['penalty'];

$template = new TemplateProcessor('form.docx');

$template->setValue('elewatorID', $elevatorID);
$template->setValue('contractID', $contractID);
$template->setValue('contractDate', $contractDate);
$template->setValue('subContractor', $subContractor);
$template->setValue('subContractorAddress', $subContractorAddress);
$template->setValue('NIP',$NIP);
$template->setValue('representative', $representative);
$template->setValue('prokurent', $prokurent);
$template->setValue('elevatorType', $elevatorType);
$template->setValue('elevatorCapacity', $elevatorCapacity);
$template->setValue('elevatorStops', $elevatorStops);
$template->setValue('elevatorEntries', $elevatorEntries);
$template->setValue('elevatorSites', $elevatorSites);

if(isset($_POST['harmonogram'])){
    $template->setValue('harmonogram', ' zgodnie z Załącznikiem Nr 3 do Umowy');
    $template->setValue('harmonogram1','Załącznik Nr 3 – Zakres prac <w:br/>Załącznik Nr 4 – Polisa OC');
}else{
    $template->setValue('harmonogram', "\u{200B}");
    $template->setValue('harmonogram1','Załącznik Nr 3 – Polisa OC');
}
$template->setValue('workFront', $workFront);
$template->setValue('UDT', $UDT);
$template->setValue('deadline', $deadline);
$template->setValue('price', $price);
$template->setValue('priceInWords', $priceInWords);
$template->setValue('VAT', $VAT);
$template->setValue('facture', $facture);
$template->setValue('warranty', $warranty);
$template->setValue('warrantyStart', $warrantyStart);
$template->setValue('penalty', $penalty);

$outputFile = 'UM_'.$contractID.'_'.$contractDate.'.docx';
$template->saveAs($outputFile);


header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
header("Content-Disposition: attachment; filename=\"" . basename($outputFile) . "\"");
header("Content-Length: " . filesize($outputFile));
readfile($outputFile);
unlink($outputFile);
exit;








/*
 * elevatorID
 * contractID
 * contractDate
 * subContractor
 * subContractorAddress
 * NIP
 * representative
 * prokurent
 * elevatorType
 * elevatorCapacity
 * elevatorStops
 * elevatorEntries
 * elevatorSites  - dwustronnie czy jednostronnie
 * harmonogram - zgodnie z Załącznikiem Nr 3 do Umowy
 * workFront
 * UDT  odbiorem przez UDT-CERT / dopuszczającym do eksploatacji przez UDT
 * deadline
 * price
 * priceInWords
 * VAT
 * facture
 * warranty
 * warrantyStart - dnia badania na zgodność z normą zharmonizowaną przez jednostkę notyfikowaną / podpisania protokołu końcowego
 * penalty
 * harmonogram1 - Załącznik Nr 3 – Zakres prac
Załącznik Nr 3 – Polisa OC

 *
 *
 *
 *elektrycznego bez maszynowni / hydraulicznego
 */