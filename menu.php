<?php
if($act){
if($act == 'botComment'){
include $act.'.php';
}
print'
<div class="aclb fcg fsl abt apm">
<a class="fcs" href="index.php"> &laquo; Home </a>
';
if($act == menu){
print '
</div>
';

botMenu();
}else{
print '
<a class="fcs" href="?act=menu"> &laquo; Menu </a>
</div>
';
}
}else{
include 'chat.php';
botMenu();
}
function botMenu(){
print '
<div class="aclb fcg fsl abt apm">
<b>Menu</b><div/>
<div class="aclb fcg fsl abb">
<div class="acw apm">


&raquo; <a class="fcs" href="?act=botComment">Bot Comment ( Click Here ) </a><br/>
</div>
</div><br/>
<div class="acg apm">
<span class="mfss fcg"><a class="fcs" href="keluar.php"> Add Another Token </a> ( '.$_SESSION['name'].' )
</span></div>'; 
}
?>