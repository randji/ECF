<?php
function uploadImage($imageName) {
    if(isset($_FILES[$imageName])) {
        $errors = array();
        $file_name = $_FILES[$imageName]['name'];
        $file_size = $_FILES[$imageName]['size'];
        $file_tmp = $_FILES[$imageName]['tmp_name'];
        $file_type = $_FILES[$imageName]['type'];
        $file_parts = explode('.', $_FILES[$imageName]['name']);
        $file_ext = strtolower(end($file_parts));

        $extensions = array("jpeg", "jpg", "png");

        if(in_array($file_ext, $extensions) === true){
            $upload_dir = "../img/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            move_uploaded_file($file_tmp, $upload_dir . $file_name);
            return $upload_dir . $file_name;
        }else{
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            print_r($errors);
            return false;
        }
    }
    return false;
}
