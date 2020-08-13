<?php
function convertapi($from,$to,$url){
header('location:api.php?from='.$from."&to=".$to."&url=".$url);
}

?>
