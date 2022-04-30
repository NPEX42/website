<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.

$result = shell_exec( 'cd /var/www/npex42.dev/html/website && git checkout prod && git pull --force' );
echo $result

?>
