<?php

exec('php background_service.php > /dev/null 2>&1 &');
header('Location: .');