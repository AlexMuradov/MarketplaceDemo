<?php

Class Upl {

    protected $_controller;
    protected $_view;

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $LngRegistration;
        global $LngHome;
        global $lng;
        global $mailer;

        ?>
            <link rel="stylesheet" href="/static/js/dropzone/dropzone.css">


<form action="/ru/fileupload/type:1/listing:1" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="fileToUpload">
<input type="submit" value="Upload Image" name="submit">
</form>

<form action="/ru/fileupload/type:1/listing:1"
      class="dropzone"
      id="my-awesome-dropzone"></form>

      <script src="/static/js/dropzone/dropzone.js"></script>
        <?php
    }


}

?>