<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Full_Name'] ?? null;
    $email = $_POST['Email'] ?? null;
    $password = $_POST['Password'] ?? null;
    $comment = $_POST['comment'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $singing = $_POST['value1'] ?? null;
    $dancing = $_POST['value2'] ?? null;
    $reading = $_POST['value3'] ?? null;

    $errors = [];
    if (!$name || !$email || !$password || !$gender)
        array_push($errors, "All information is required");
    if (strpos($email, '@') == false)
        array_push($errors, "Email is not valid");
    if (strlen($password) < 6)
        array_push($errors, "Password is too small");
}

$target_File = "File/" . $_FILES["file"]["name"];

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_File)) {
    echo "You have uploadede a new file";
    echo "<br>" . $_FILES(["file"]["type"]);
    echo "<img src='" . $file . "'>";
}

$formdata = array(
    'name' => $name,
    'email' => $email,
    'password' => $password,
    'comment' => $comment,
    'gender' => $gender,
    "file_path" => "$target_File"
);


$existingdata = file_get_contents('data.json');
$tempJSONdata = json_decode($existingdata);
$tempJSONdata[] = $formdata;
//Convert updated array to JSON
$jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);

//write json data into data.json file
if (file_put_contents("data.json", $jsondata)) {
    echo "Data successfully saved <br>";
} else
    echo "no data saved";

$data = file_get_contents("data.json");
$mydata = json_decode($data);


//echo "my value: ".$mydata[1]->lastName;
foreach ($mydata as $myobject) {
    foreach ($myobject as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
    echo "<br>";
}

?>

<?php if (!empty($errors)) : ?>
    <div>
        <?php foreach ($errors as $error) : ?>
            <h3 style="color:red"><?php echo $error ?></h3>
        <?php endforeach ?>
    </div>
<?php endif ?>