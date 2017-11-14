<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Inotes" />
    <meta property="og:description" content="Inotes - Hãy giữ những mẩu note của bạn tại đây."/>
    <meta property="og:image" content="<?php echo $domain.'img/Notes.png'; ?>"/>
    <title>Inotes</title>
    <link rel="shortcut icon" href="img/Notes.png" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/css.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/Site.css" type="text/css" media="screen"/>
    <!--<link rel="canonical" href="https://anotepad.com/"/>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/gl.js"></script>
    <script src="js/save.js"></script>
    <script src="js/on_of_editor.js"></script>
    <script src="js/pre.js"></script>
    

    <!-- Main Quill library -->
    <script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>
    <script src="https://cdn.quilljs.com/1.3.4/quill.min.js"></script>
    <!-- Theme included stylesheets -->
    <link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.4/quill.bubble.css" rel="stylesheet">
    

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
                                <!-- <li class="">
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
                    <input type="text" name="notetitle" id="edit_title" class="form-control title" placeholder="Chủ đề..." tabindex="1" maxlength="200" />
                    <input type="hidden" name="notetype" id="notetype" value="PlainText" />
                    <input type="hidden" name="notenumber" id="notenumber" />
                    <input type="hidden" name="autosavenotenumber" id="autosavenotenumber"/>
                </div>
            </div>

            <div class="form-group save-pre l">
                <div class="col-sm-12 col-sm-12-save ">
                    <span>
                        <input type="button" class="btn btn-primary" value="Lưu" id="btnSaveNote" onclick="SaveNote();" tabindex="3" /> &nbsp;
                    </span>
                    <span>
                        <input type="button" class="btn btn-primary" value="Xem trước" id="btnPreviewNote" onclick="PreNote();" tabindex="3" /> &nbsp;
                    </span>
                    
                </div>
            </div>

            <div class="form-group text-content-big ">
                <p id="on-of-editor" onclick="on_of_editor()">Use editor</p>
                <div class="col-sm-12 ">
                    <textarea style="width: 100%; font-size: 18px; line-height: 18px" name="notecontent" class="form-control textarea" id="edit_textarea" placeholder="Viết 1 note..." tabindex="2" rows="19"></textarea>
                    <div id="toolbar-container">
                        <span class="ql-formats">
                        <select class="ql-font"></select>
                        <select class="ql-size"></select>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                        </span>
                        <span class="ql-formats">
                        <select class="ql-color"></select>
                        <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-script" value="sub"></button>
                        <button class="ql-script" value="super"></button>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-header" value="1"></button>
                        <button class="ql-header" value="2"></button>
                        <button class="ql-blockquote"></button>
                        <button class="ql-code-block"></button>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-indent" value="-1"></button>
                        <button class="ql-indent" value="+1"></button>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-direction" value="rtl"></button>
                        <select class="ql-align"></select>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                        <button class="ql-formula"></button>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-clean"></button>
                        </span>
                    </div>
                          <!-- Create the editor container -->
                    <div id="editor">
                        <p>Hello World!</p>
                        <p>Some initial <strong>bold</strong> text</p>
                        <p><br></p>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6" style="margin-bottom: 20px;">
                    <span id="p-url"></span> <p><a href="#" target="_blank" id="url"></a></p>
                    <input type="button" class="btn btn-primary ll" value="Lưu" id="btnSaveNote" onclick="SaveNote();" tabindex="3" /> &nbsp;
                    <input type="button" class="btn btn-primary ll" value="Xem trước" id="btnPreviewNote" onclick="PreNote();" tabindex="3" /> &nbsp;
                    <input type="text" class="google-link-input ll" placeholder="Dán link cần rút gọn tại đây" id="btnPreviewNote" tabindex="3" oninput="get_gl()" /> &nbsp;
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

    <?php $directory = "note/file"; $files = scandir($directory); $num_files = count($files)-2; ?>
    <div class="footer">
        <div style="text-align: center">
            <p style="color: #fff; font-size: 19px">Tổng Note: <span><?php echo $num_files; ?></span></p>
            <p style="color: #fff;">&copy; 2017 Inotes</p>
        </div>
    </div>

    <style>body a#uservoice-feedback-tab, body a#uservoice-feedback-tab:link { display: none!important; }</style>
</body>
</html>


<script>
  var quill = new Quill('#editor', {
    modules: {
      formula: true,
      syntax: true,
      toolbar: '#toolbar-container'
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
  });
</script>