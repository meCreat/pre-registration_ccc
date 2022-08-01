<?php

include 'global_function.php';
$header_code = "<h1>A bla bla</h1><script>alert('HACKED')</script>";



echo array_html($header_code);