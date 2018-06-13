<?php
    session_start();
    include './pdo.php';
    @$username = $_SESSION['username'];
    $userid = (int)$_SESSION["userid"];
    $_SESSION['activenav'] = "addpc";
    if(!isset($_SESSION["userid"])) {
        $_SESSION['errormessage'] = "You need to Login or Register before adding a PC!";
        header("location: ./login.php");
    }
    if(isset($_POST["Submit"])) {
        $insertpcsql = "INSERT INTO `computer` (`cid`, `name`, `description`, `picture`, `entrycreatorfk`, `created`) VALUES (?, ?, ?, ?, ?, NOW());";
        $statement = $pdo->prepare($insertpcsql);
        $statement->execute(array(NULL, $_POST["pcname"], $_POST["pcdescription"], $_POST["pcpicture"], $userid));
        header("location: ./allpc.php");
        die("Entry successful.");
    }
    if(isset($_POST['UploadButton'])){
      $UploadName = $_FILES['UploadFileField']['name'];
      $UploadTmp = $_FILES['UploadFileField']['tmp_name'];
      $UploadType = $_FILES['UploadFileField']['type'];
      $UploadName = preg_replace("#[^a-z0-9.]#i", "", $UploadName);
      $UploadPath = "./src/$UploadName";
      $pcdescription = $_POST["pcdescription"];
      $pcname = $_POST["pcname"];
      move_uploaded_file($UploadTmp, "src/$UploadName");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PCP - Add PC</title>
        <?php include './head.php'; ?>
    </head>
    <body class="grey darken-4">
        <?php include './navbar.php'; ?>
        <div class="container">
            <div class="card-panel">
            <h3 class="center">Add a Computer</h3>
                <form action="./addpc.php" method="post" enctype="multipart/form-data" name="FileUploadForm" id="FileUploadForm">
                <div class="row">
                    <div class="input-field col l12 m12 s12">
                        <input type="text" name="pcname" class="validate" id="pcname" maxlength="32" value="<?php echo @$pcname ?>"/>
                        <label for="pcname">The name of your PC</label>
                    </div>
                    <div class="input-field col l5 m12 s12">
                        <input type="text" name="pcpicture" class="validate" id="pcpicture" maxlength="192" value="<?php echo @$UploadPath ?>"/>
                        <label for="pcpicture">Link to the picture</label>
                    </div>
                        <div class="col l5 m10 s9">
                            <div class="file-field input-field">
                              <div class="btn light-blue">
                                <span><i class="large material-icons">folder</i></span>
                                <input type="file" name="UploadFileField" id="UploadFileField" class="tooltipped" data-tooltip="You can either link an image source or upload an image."/>
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Choose a file to upload.">
                              </div>
                            </div>
                        </div>
                        <div class="input-field col l2 m2 s3">
                            <button class="btn waves-effect waves-light light-blue uploadbtn right" type="Submit" name="UploadButton" id="UploadButton" value="Upload"><i class="large material-icons">file_upload</i></button>
                        </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="pcdescription" id="pcdescription" class="validate materialize-textarea" maxlength="2048" value="<?php echo @$pcdescription ?>"/></textarea>
                        <label for="pcdescription">Description of your PC</label>
                    </div>
                </div>
                <blockquote> Note: Adding entry as <?php echo "$username"?></blockquote>
                <button class="btn waves-effect waves-light light-blue darken-1" type="Submit" name="Submit">Submit<i class="material-icons right">send</i></button>
                </form>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
              $('.tooltipped').tooltip();
            });
        </script>
        <style>
            .uploadbtn {
                margin-top: 5px;
            }
        </style>
    </body>
</html>
