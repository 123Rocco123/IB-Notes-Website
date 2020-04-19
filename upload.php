<?php
    if(isset($_FILES['file'])) {
        $file = $_FILES['file'];
        
        // File Properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $fileType = $file['file']['type'];
        
        //Work out the file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        
        $allowed = array('jpg', 'jpeg', 'pdf', 'png');
        
        if (in_array($file_ext, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize <= 50000) {
                    
                    $file_name_new = uniqid('', true).'.'. $file_ext;
                    $file_destination = 'uploads/' . $file_name_new;
                    
                    if(move_uploaded_file($file_tmp, $file_destination)) {
                        echo $file_destination;
                    }
                } else {
                    echo "Your file is too large.";
                }
            }
        } else {
            echo "You can't upload files of this type.";
        }
    }
?>