<?php
require_once '../config.php';
if(!isset($_GET['note']) or strlen($_GET['note']) != 16){
    $_GET['note'] = null;
    echo '<center>Không tồn tại Note <br><a href="'.$domain.'">Trang chủ</a></center>';
}
if ($_GET['note'] != null and strlen($_GET['note']) == 16) {
    $_GET['note'] = htmlentities($_GET['note'], ENT_QUOTES, "UTF-8");
    $f = @file_get_contents('file/'.$_GET['note'].'.txt');
    if($f == false) {echo '<center>Không tồn tại Note <br><a href="'.$domain.'">Trang chủ</a></center>';}
    if($f == true){
    $json = json_decode($f);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Inotes" />
    <meta property="og:description" content="Inotes - Hãy giữ những mẩu note của bạn tại đây."/>
    <meta property="og:image" content="<?php echo $domain.'img/Notes.png'; ?>"/>
    <title>Inotes</title>
    <link rel="shortcut icon" href="../img/Notes.png" />
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/css.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/Site.css" type="text/css" media="screen"/>
    <!--<link rel="canonical" href="https://anotepad.com/"/>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/gl.js"></script>

    <script type="text/javascript" src="https://cdn.anotepad.com/stylesheets/bootstrap-3.1.1/js/bootstrap.js"></script>

    

</head>

<body>
    <div class="header">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <div id="logo">
                <div class="container">
                    <a href="/" id="logo_img" title="Online Notpad"></a>
                    <a href="<?php echo $domain; ?>"><span>Inotes</span> </a>
                    <span id="subTitle"> <!--- free online notepad--></span>
                </div>
            </div>

            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="container-fluid">

                        <ul class="nav nav-pills">
                            <li class="active">
                                <a href="<?php echo $domain; ?>"><span>Trang chủ</span></a>
                            </li>
                            <!-- <li class="">
                                <a href="/features"><span>Features</span></a>
                            </li> -->
                            <li class="">
                                <a href="javascript:void(0)"><span>Chúng tôi</span></a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)" onclick="UserVoice.Popin.show(); return false;"><span>Phản hồi</span></a>
                            </li>
                               <!--  <li class="">
                                    <a href="/create_account"><span>Register/Login</span></a>
                                </li> -->
                        </ul>

                    </div>
                </div>

            </div>
        </nav>

    </div>
    <div class="containerMain">
        <div class="container">
            

<div id="edit_content">
    <div class="note_form">
        <form method="post" name="note_form" id="note_form" role="form" class="form-horizontal" action="//localhost/" onsubmit="return false;">
            <div class="form-group title-input-t l">
                <div class="col-sm-9">
                    <input type="text" name="notetitle" id="edit_title" class="form-control title" placeholder="Chủ đề..." value="<?php echo $json->title; ?>" tabindex="1" maxlength="200" disabled/>
                    <input type="hidden" name="notetype" id="notetype" value="PlainText" />
                    <input type="hidden" name="notenumber" id="notenumber" />
                    <input type="hidden" name="autosavenotenumber" id="autosavenotenumber"/>
                </div>
            </div>

            <div class="form-group save-pre l">
                <div class="col-sm-12 col-sm-12-save ">
                   <!--  <span>
                        <input type="button" class="btn btn-primary" value="Save" id="btnSaveNote" onclick="fnSaveNote();" tabindex="3" /> &nbsp;
                    </span>
                    <span>
                        <input type="button" class="btn btn-primary" value="Preview" id="btnPreviewNote" onclick="fnSaveNote();" tabindex="3" /> &nbsp;
                    </span> -->
                    
                </div>
            </div>

            <div class="form-group text-content-big ">
                <div class="col-sm-12 ">
                    <div contenteditable="false" auto style="width: 100%; font-size: 18px; line-height: 18px" name="notecontent" class="form-control textarea" id="edit_textarea" placeholder="Viết 1 note..." tabindex="2" rows="19"><?php echo $json->note; ?></div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6" style="margin-bottom: 20px;">
                    <!-- <input type="button" class="btn btn-primary ll" value="Save" id="btnSaveNote" onclick="fnSaveNote();" tabindex="3" /> &nbsp;
                    <input type="button" class="btn btn-primary ll" value="Preview" id="btnPreviewNote" onclick="fnSaveNote();" tabindex="3" /> &nbsp; -->
                    <input type="text" class="google-link-input ll" placeholder="Dán link cần rút gọn tại đây" id="btnPreviewNote" oninput="get_gl()" tabindex="3" /> &nbsp;
                    <!-- <input type="button" class="btn btn-primary sub-google-link-input ll" value="Rút gọn link" id="btnPreviewNote" tabindex="3" /> &nbsp; -->
                </div>
                    <div class="col-md-6">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle" style="display: block" data-ad-client="ca-pub-3860002410887566" data-ad-slot="1719742222" data-ad-format="auto"></ins>
                    </div>
            </div>
        </form>

    </div>
</div>

<div class="modal" id="manageNoteAccessModal" tabindex="-1" role="dialog" aria-labelledby="noteAccessLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="noteAccessModalLabel">Note Read Permission</h4>
            </div>
            <div class="modal-body">
                <div class="radio">
                    <label>
                        <input type="radio" name="access" id="accesspublic" value="2" checked=checked onclick="fnUpdateNoteAccessText('Public Note');">
                        Public Note
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="access" id="accessprivate" value="1"  onclick="fnUpdateNoteAccessText('Private Note');">
                        Private Note
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="access" id="accesspasswordprotected" value="3"  onclick="fnUpdateNoteAccessText('Password Protected');">
                        Password Protected Note &nbsp; <input type="text" name="password" id="password" placeholder="Password" />
                    </label>
                </div>
                <hr/>
                <h4>Note Edit Permission</h4>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quickedit" id="quickedit" value="true" >
                        Allow other people with editor password to edit this note &nbsp;
                        <input type="text" name="quickeditpassword" id="quickeditpassword" placeholder="Editor Password" />
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="displayNotes clearfix">
        <div class="notes">
        <div style="font-size: 16px;font-weight: bold"><!-- My Saved Notes --></div>
            <div class="my_notes">
            <div class="topLinks">
                <strong>
                    <a href="javascript:fnSortByTitle();" role="button"><!-- Sort by Title --></a> <!-- | -->
                    <a href="javascript:fnSortByUpdated();" role="button"><!-- Sort by Updated --></a>
                </strong>
            </div>
        </div>
        </div>
</div>

<div class="modal" id="manageFolderModal" tabindex="-1" role="dialog" aria-labelledby="manageFolderModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Manage Folders</h4>
            </div>
            <div class="modal-body" id="manageFolderContent">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


        </div>
    </div>
    <br style="clear: both;" />

    <?php $directory = "file"; $files = scandir($directory); $num_files = count($files)-2; ?>
    <div class="footer">
        <div style="text-align: center">
            <p style="color: #fff; font-size: 19px">Tổng Note: <span><?php echo $num_files; ?></span></p>
            <p style="color: #fff;">&copy; 2017 Inotes</p>
        </div>
    </div>

    <style>body a#uservoice-feedback-tab, body a#uservoice-feedback-tab:link { display: none!important; }</style>
</body>
</html>
  
<?php }}?>
