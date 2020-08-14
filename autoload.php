<?php
function convertapi($from,$to,$url,$reditecturi){
header('location:api.php?from='.$from."&to=".$to."&url=".$url."&redirecturi=".$redirecturi);
}

?>
