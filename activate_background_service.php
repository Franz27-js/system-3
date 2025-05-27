<?php

exec('php background_task.php > /dev/null 2>&1 &');
header('Location: .');