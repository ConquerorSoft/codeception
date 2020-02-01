<?php 
include './vendor/autoload.php';
$stringTransformation = new conquerorsoft\codeception\StringTransformation();

?>
<h1>String transformation</h1>
<form id="encode_form" method="post">
    <label>Plain string:</label>
    <input type="text" id="plain_string_input" name="plain_string_input"/>
    <input type="submit" id="encode_button" name="encode_button" value="Encode"/>
</form>

<form id="decode_form" method="post">
    <label>Encoded string:</label>
    <input type="text" id="encoded_string_input" name="encoded_string_input"/>
    <input type="submit" id="decode_button" name="decode_button" value="Decode"/>
</form>

<?php
if(isset($_POST['encode_button'])) {
    $plainStringInput = filter_input(
            INPUT_POST,
            'plain_string_input',
            FILTER_SANITIZE_SPECIAL_CHARS);
    $encodedString = htmlspecialchars($stringTransformation->encode($plainStringInput));
    echo "'$plainStringInput' plain string is encoded as '$encodedString'";
}

if(isset($_POST['decode_button'])) {
    $encodedString = filter_input(
            INPUT_POST,
            'encoded_string_input',
            FILTER_SANITIZE_SPECIAL_CHARS);
    $plainStringInput = htmlspecialchars($stringTransformation->decode($encodedString));
    echo "'$encodedString' encoded string is decoded as '$plainStringInput'";
}