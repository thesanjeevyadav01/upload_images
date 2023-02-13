
<?php

function inputFields($placeholder,$name,$value,$type){
    $ele="
    <input type='$type' name='$name' placeholder='$placeholder' value='$value' autocomplete=\"off\">
    ";

    echo $ele;
}
?>
