<?php
$output = shell_exec('cd /home/username/public_html && git pull origin main');
echo "<pre>$output</pre>";
?>
