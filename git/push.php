<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.

shell_exec( 'cd /var/www/npex42.dev/html/website && git reset --hard HEAD && git pull --force' );


?>