<?php

    session_start();
    ini_set("display_errors", "1");
    error_reporting(E_ALL & ~E_NOTICE);
    if (file_exists(__DIR__ ."/installer/index.php") && !file_exists(__DIR__ ."/core/installer.lock"))
    {
        header('Location: installer/');
    }
    else
    {
        ob_start();
        require_once("core/classes/core.php");
        $core = new Core();
        $page = ob_get_contents();
        ob_clean();
        $page = $core->finalise($page);
        ob_end_flush();
    }

?>