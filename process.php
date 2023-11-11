<?php
$jsonData = $_POST['data'];
$data = json_decode($jsonData, true);
//echo "passed adta is ".$data;

//echo $data['username'];


$myFile = "data.json";
$arr_data = [];

$formdata = [
    'username' => $data['username'],
    'thought' => $data['thought'],
];

$jsondata = file_get_contents($myFile);

if ($jsondata !== false) {
    $arr_data = json_decode($jsondata, true);
    if ($arr_data === null) {
        $arr_data = [];
    }
}

// Append the new form data to the existing array
$arr_data[] = $formdata;

$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

if (file_put_contents($myFile, $jsondata)) {
    echo 'Posted successfully';
}
?>
