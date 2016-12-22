<?php
require_once('upload.php');

$error = null;
if (isset($_POST['submit'])) {

    if (empty($_POST['name']) || empty($_POST['username'])) {
        $error = 'Feld leer';
    }
    else
    {
        $name=$_POST['name'];
        $username=$_POST['username'];

        $db_panel->updateProfile($name, $username, $_SESSION['user_id']);
    }
    if (isset($_FILES['file'])) {

        $upload = Upload::factory('uploads/files');
        $upload->file($_FILES['file']);
        $upload->set_max_file_size(5);
        $upload->set_allowed_mime_types(array('image/jpeg', 'image/png', 'image/gif'));

        $result = $upload->upload();

        if ($result != null) {
            $db_panel->updateProfileImage($result['path'], $_SESSION['user_id']);
        }
    }
}