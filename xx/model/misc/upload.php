<?php

Namespace Xx\Model\Misc;
Use System as System;

Class Upload Extends System\gdImagestyle {


    public function Access($file, $folder) {
        if (!is_writable(dirname($folder . $file))) {
            exit("Access denied");
        }
    }

    public function Attach($file, $newFilename, $folder, $type, $maxSize = 10485760) {

        $this->Access($newFilename, $folder);

        if(isset($file)) {

            if($file['type'] != $type) {
                exit("Incorrect filetype");
            }
            if($file['size'] > $maxSize) {    
                exit("File is too big");
            }

            move_uploaded_file(
                $file['tmp_name'],
                $folder . $newFilename
            );

        }

    }

    public function Resize($originalFolder, $originalFile, $newFolder, $newFile, $w, $h, $crop = false) {
        $this->Access($newFile, $newFolder);
        $res = System\gdImagestyle::image_resize($originalFolder . $originalFile, $w, $h, $crop);
        imagejpeg($res, $newFolder . $newFile);

    }

    public function Delete($file, $folder) {
        $this->Access($file, $folder);
        unlink($folder . $file);
    }

}

?>