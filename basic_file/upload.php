<?php

if(isset($_POST['submit'])){

    // echo "<pre>";
    // print_r($_FILES['file_upload']); //will print the values and the keys of the array
    // echo "<pre>";

    $upload_errors = array(
        UPLOAD_ERR_OK => 'There is no error', // Value: 0;
        UPLOAD_ERR_INI_SIZE => 'The upload file exceeds the upload_max_filesize directive in php.ini.', // Value: 1;
        UPLOAD_ERR_FORM_SIZE => ' The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.', // Value: 2;
        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.', // Value: 3;
        UPLOAD_ERR_NO_FILE => 'No file was uploaded.', // Value: 4;
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.', // Value: 6;
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.', // Value: 7;
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.' // Value: 8;
    );

    $tmp_name = $_FILES['file_upload']['tmp_name']; // A temporary address where the file is located before processing the upload request
    $file_name = $_FILES['file_upload']['name']; // Name of file which is uploading
    $directory = "uploads/"; // Filder for permament uploaded files

    if(move_uploaded_file($tmp_name, $directory . $file_name)){ // Build-in function which moves an uploaded file to a new location. Return true or false
        $the_message = "File uploaded successfully";
    } else {
        $the_error = $_FILES['file_upload']['error']; // Types of error occurred when the file is uploading
        $the_message = $upload_errors[$the_error]; // placing the error in array $upload_errors
    }

}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>Document</title>

    </head>

    <body>

        <form action="upload.php" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" is for multifile data -->

        <h2>
            <?php
                // Echo the error
                if(!empty($upload_errors)){
                    echo $the_message;
                }

            ?>
        </h2>
            <input type="file" name="file_upload">
            <br>
            <input type="submit" name="submit">
        </form>

    </body>

</html>