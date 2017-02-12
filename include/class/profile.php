<?php
require_once('upload.php');

$error = false;
if (isset($_POST['submit'])) {

    if (empty($_POST['name']) || empty($_POST['username'])) {
        $_SESSION['error'] = 'Feld leer!';
    }
    else
    {
        $name = $_POST['name'];
        $username = $_POST['username'];

        $db_panel->updateProfile($name, $username, $_SESSION['user_id']);
    }
    if (isset($_FILES['file']) && !empty($_FILES["file"]["name"])) {

        $upload = Upload::factory('uploads/files', ROOT_PATH);
        $upload->file($_FILES['file']);

        $upload->set_max_file_size(5);
        $upload->set_allowed_mime_types(array('image/jpeg', 'image/png'));

        //$validation = new validation();
        //$upload->callbacks($validation, array('check_mime_type'));

        try {
            $result = $upload->upload();
        } catch (Exception $e) {
            $_SESSION['error'] = $upload->get_errors();
            $error = true;
        }

        if (!$error) {
            $db_panel->updateProfileImage($result['path'], $_SESSION['user_id']);
        }
    }
}