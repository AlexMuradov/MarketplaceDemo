<?php

class xx {
    function one($t) {
        echo $t;
        return $this;
    }
    function two() {
        echo "how are you";
        return $this;
    }
}

$call = new xx;
$call->one("hi ")->two();

?>