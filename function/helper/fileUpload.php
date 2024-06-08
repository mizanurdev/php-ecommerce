<?php
    function fileUpload($file,$directory){
        $file_name = basename($file['name']);
        $file_info = explode('.',$file_name);
        $file_ext = array_pop($file_info);
        $file_base_name = time().".".$file_ext;
        $file_tmp_name = $file['tmp_name'];
        $file_url = $directory.$file_base_name;
        move_uploaded_file($file_tmp_name,$file_url);
        return $file_url;
    }
?>