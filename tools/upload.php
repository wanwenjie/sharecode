<?php
/*注意是$_FILES,而不是$_FIFLES*/
define('ACC',true);
require('./include/init.php');
require('./tools/upTool.class.php');
print_r($_FILES);
$file = new upTool('pic');
$file ->up();

