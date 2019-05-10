<?php 
//$filename: thuộctính name của input type="file"
//$target_dir: thư mục file sẽ được lưu  
function uploadFile($filename, $target_dir = "uploads/"){
    if($_FILES[$filename]["size"]){
        $nameArr = explode(".", basename($_FILES[$filename]["name"]));
        // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $nameArr[0] .= '_'.rand(0,1000);

        $target_file = $target_dir . $nameArr[0] . '.' . $nameArr[1];
        $uploadOk = 1;
        

        if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) {
            return $target_file;
            // echo "The file ". basename( $_FILES[$filename]["name"]). " has been uploaded.";
        } else {
            return '';
            // echo "Sorry, there was an error uploading your file.";
        }
    } else {
        return '';
    }
}