<?php

$symlinkTarget =  __DIR__.'/../laravel/storage/app/public';
$symlinkPath = __DIR__.'/storage';


// Create the symbolic link
if (!file_exists($symlinkPath)) {
    symlink($symlinkTarget, $symlinkPath);
    echo 'Symbolic link created successfully.';
} else {
    echo 'Symbolic link already exists.';
}
