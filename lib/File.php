<?php
class File {
    public static function build_path($path_array) { 
        $ROOT_FOLDER = '/home/ann2/decadollem/public_html/ProjetPHP';
        return $ROOT_FOLDER. '/' . join('/', $path_array);
    }
}
?>