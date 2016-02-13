<?php
$str = "<p>texto á</p>";

// Outputs an empty string
echo htmlentities($str, ENT_QUOTES, "UTF-8");

// Outputs "!!!"
echo $otro = htmlentities($str, ENT_QUOTES | ENT_IGNORE, "UTF-8");

echo html_entity_decode($otro);
?>