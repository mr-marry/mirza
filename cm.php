<?php
$com =
array(
'cPhoto' => array(
  '<nama> :O XO ┈•❀💗✾ωℴω_Cʋʇℯ_ℴωℯsℴʍℯ✾💗❀•┈🔙⚘ℓσνєℓу⚘N͞i͞c͞e͞🍥s͞w͞e͞e͞t͞ 💞 :D',
),
'cBiasa' => array(
     '<3 🌺ℒℴѵℯℒy ⚘🌺 <nama> ;) ',
      ),
'cKondisi' => array(
       array(
           array(
           ' <3 [=S ʜ ʋ p"ʌ ɭ ɓ=] 😋👌 :p <nama> ',
            ),
       ),
   ),

'cNo1' => array(
        ':D ❤👈😍🅢🅤🅟🅔🅡🅑💯😍👉❤
 🔙🔙🔙',
        ),

'cNoZ' => array(
       '<nama>...!! <n> <me>...!! <n>  XO ❤👈😍🅢🅤🅟🅔🅡🅑💯😍👉❤
 🔙🔙🔙 ',
       ),

'cLatah1'=> array(
       ':* ★🌹二【«#αʍαʐɨռɢ »】二🌹★ <nama> <n> :D ',
       ),

'cLatah'=> array(
       '<3 🌿✿🍹#ƒąйtąşтiç🍹#ʆѳѵɛΙy🍹✿🌿',
      ),

'cKata' => array(
      '<3 💲➤❀๑▬๑۩#AwEsOℳe۩๑▬๑🔙🅰️ :p ',
     ),
   'cAcak' => $text,
   );

 function _req($url,$type=null){
   $opts = array(
            19913 => 1,
            10002 => $url,
            10018 => 'MAUI-based Generic / bOt Koplak by MuAVia',
            );
   $ch=curl_init();
   curl_setopt_array($ch,$opts);
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
  }

 function saveFile($x,$y){
   $f = fopen($x,'w');
             fwrite($f,$y);
             fclose($f);
   }

 function getData($dir,$token,$params=null){
    $param = array(
        'access_token' => $token,
        );
   if($params){ 
       $arrayParams=array_merge($params,$param);
       }else{
       $arrayParams =$param;
       }
   $url = getUrl('graph',$dir,$arrayParams);
   $result = json_decode(_req($url),true);
   if($result[data]){
       return $result[data];
       }else{
       return $result;
       }
   }

 function getUrl($domain,$dir,$uri=null){
   if($uri){
       foreach($uri as $key =>$value){
           $parsing[] = $key . '=' . $value;
           }
       $parse = '?' . implode('&',$parsing);
       }
   return 'https://' . $domain . '.facebook.com/' . $dir . $parse; 
   }

function getLog($x,$y){
if(!is_dir('log')){
   mkdir('log');
   }
   if(file_exists('log/cm_'.$x)){
       $log=file_get_contents('log/cm_'.$x);
       }else{
       $log=' ';
       }

  if(ereg($y[id],$log)){
       return false;
       }else{
if(strlen($log) > 2000){
   $n = strlen($log) - 2000;
   }else{
  $n= 0;
   }
       saveFile('log/cm_'.$x,substr($log,$n).' '.$y[id]);
       return true;
      }
 }

 function getC($c,$me,$data,$n,$emo){

       foreach($c[cKondisi] as $txt){
           foreach($txt[0] as $kata){
               if(ereg($kata,strtolower($data[$n][message]))){
                   $tKondisi = $txt[1];
                   $kondisi=true;
                   }
               }
           }

    $type=acak();

if($data[$n][type] == 'photo'){ $text = $c[cPhoto]; }
elseif($kondisi){ $text = $tKondisi; }
elseif($type == 'cNomer'){ 
if(count($data[$n][comments][data]) == 0 ){ $text = $c[cNo1]; }else{  $text = $c[cNoZ]; }
         }
elseif($type == 'cLatah'){ 
        if($n == 0 || $n == count($data)-1){ $text = $c[cLatah1]; }else{ $text = $c[cLatah]; }
         }
elseif($type == 'cKata'){ $text = $c[cAcak]; }
elseif($type == 'cBiasa'){ $text = $c[cBiasa]; }

  $replace = array(
        '<ucapan>',
        '<me>',
        '<nama>',
        '<idA>',
        '<idZ>',
        '<posA>',
        '<posZ>',
        '<mess>',
        '<messA>',
        '<messZ>',
        '<comA>',
        '<comZ>',
        '<no>',
        '<n>',
        '<lucu>',
        '<konyol>',
        '<motivasi>',
        '<telat>',
     ); 
  $p= urldecode('
') . '::::::::::::::::::::::::::::::::::::::::: (y) :::::::::::::::::::::::::::::::::::::::::' . urldecode('
');

  $replaced = array(
     ucapan(),
     ' @['.$me.':1] ',
     getName($data[$n][from][id],$data[$n][from][name]),
     getName($data[$n-1][from][id],$data[$n-1][from][id]),
     getName($data[$n+1][from][id],$data[$n+1][from][id]),
     getName($data[$n][comments][data][0][from][id],$data[$n][comments][data][0][from][name]),
     getName($data[$n][comments][data][count($data[$n][comments][data])-1][from][id],$data[$n][comments][data][count($data[$n][comments][data])-1][from][name]),
     $p.$data[$n][message].$p,
     $p.$data[$n-1][message].$p,
     $p.$data[$n+1][message].$p,
     $p.$com[0][message].$p,
     $p.$data[$n][comments][data][count($data[$n][comments][data])-1][message].$p,
     count($data[$n][comments][data])+1,
     urldecode('
'),
     $p.$asem.$p,
     $p.$asem.$p,
     $p.$asem.$p,
     getDelay($data[$n][created_time],1),
    );
   $result=str_replace($replace,$replaced,$text[rand(0,count($text)-1)]);
if($emo==1){
return getEmo($result);
}else{
return $result;
}
}
function getEmo($n){

$emo=array(
urldecode('󾀀'),
urldecode('󾀁'),
urldecode('󾀂'),
urldecode('󾀃'),
urldecode('󾀄'),
urldecode('󾀅'),
urldecode('󾀇'), 
urldecode('󾀸'), 
urldecode('󾀼'),
urldecode('󾀽'),
urldecode('󾀾'),
urldecode('󾀿'),
urldecode('󾁀'),
urldecode('󾁁'),
urldecode('󾁂'),
urldecode('󾁃'),
urldecode('󾁅'),
urldecode('󾁆'),
urldecode('󾁇'),
urldecode('󾁈'),
urldecode('󾁉'), 
urldecode('󾁑'),
urldecode('󾁒'),
urldecode('󾁓'), 
urldecode('󾆐'),
urldecode('󾆑'),
urldecode('󾆒'),
urldecode('󾆓'),
urldecode('󾆔'),
urldecode('󾆖'),
urldecode('󾆛'),
urldecode('󾆜'),
urldecode('󾆝'),
urldecode('󾆞'),
urldecode('󾆠'),
urldecode('󾆡'),
urldecode('󾆢'),
urldecode('󾆤'),
urldecode('󾆥'),
urldecode('󾆦'),
urldecode('󾆧'),
urldecode('󾆨'),
urldecode('󾆩'),
urldecode('󾆪'),
urldecode('󾆫'),
urldecode('󾆮'),
urldecode('󾆯'),
urldecode('󾆰'),
urldecode('󾆱'),
urldecode('󾆲'),
urldecode('󾆳'), 
urldecode('󾆵'),
urldecode('󾆶'),
urldecode('󾆷'),
urldecode('󾆸'),
urldecode('󾆻'),
urldecode('󾆼'),
urldecode('󾆽'),
urldecode('󾆾'),
urldecode('󾆿'),
urldecode('󾇀'),
urldecode('󾇁'),
urldecode('󾇂'),
urldecode('󾇃'),
urldecode('󾇄'),
urldecode('󾇅'),
urldecode('󾇆'),
urldecode('󾇇'), 
urldecode('󾇈'),
urldecode('󾇉'),
urldecode('󾇊'),
urldecode('󾇋'),
urldecode('󾇌'),
urldecode('󾇍'),
urldecode('󾇎'),
urldecode('󾇏'),
urldecode('󾇐'),
urldecode('󾇑'),
urldecode('󾇒'),
urldecode('󾇓'),
urldecode('󾇔'),
urldecode('󾇕'),
urldecode('󾇖'),
urldecode('󾇗'),
urldecode('󾇘'),
urldecode('󾇙'),
urldecode('󾇛'), 
urldecode('󾌬'),
urldecode('󾌭'),
urldecode('󾌮'),
urldecode('󾌯'),
urldecode('󾌰'),
urldecode('󾌲'),
urldecode('󾌳'),
urldecode('󾌴'),
urldecode('󾌶'),
urldecode('󾌸'),
urldecode('󾌹'),
urldecode('󾌺'),
urldecode('󾌻'),
urldecode('󾌼'),
urldecode('󾌽'),
urldecode('󾌾'),
urldecode('󾌿'), 
urldecode('󾌠'),
urldecode('󾌡'),
urldecode('󾌢'),
urldecode('󾌣'),
urldecode('󾌤'),
urldecode('󾌥'),
urldecode('󾌦'),
urldecode('󾌧'),
urldecode('󾌨'),
urldecode('󾌩'),
urldecode('󾌪'),
urldecode('󾌫'), 
urldecode('󾍀'),
urldecode('󾍁'),
urldecode('󾍂'),
urldecode('󾍃'),
urldecode('󾍄'),
urldecode('󾍅'),
urldecode('󾍆'),
urldecode('󾍇'),
urldecode('󾍈'),
urldecode('󾍉'),
urldecode('󾍊'),
urldecode('󾍋'),
urldecode('󾍌'),
urldecode('󾍍'),
urldecode('󾍏'),
urldecode('󾍐'),
urldecode('󾍗'),
urldecode('󾍘'),
urldecode('󾍙'),
urldecode('󾍛'),
urldecode('󾍜'),
urldecode('󾍞'), 
urldecode('󾓲'), 
urldecode('󾓴'),
urldecode('󾓶'), 
urldecode('󾔐'),
urldecode('󾔒'),
urldecode('󾔓'),
urldecode('󾔖'),
urldecode('󾔗'),
urldecode('󾔘'),
urldecode('󾔙'),
urldecode('󾔚'),
urldecode('󾔜'),
urldecode('󾔞'),
urldecode('󾔟'),
urldecode('󾔤'),
urldecode('󾔥'),
urldecode('󾔦'),
urldecode('󾔨'), 
urldecode('󾔸'),
urldecode('󾔼'),
urldecode('󾔽'), 
urldecode('󾟜'), 
urldecode('󾠓'),
urldecode('󾠔'),
urldecode('󾠚'),
urldecode('󾠜'),
urldecode('󾠝'),
urldecode('󾠞'),
urldecode('󾠣'), 
urldecode('󾠧'),
urldecode('󾠨'),
urldecode('󾠩'), 
urldecode('󾥠'), 
urldecode('󾦁'),
urldecode('󾦂'),
urldecode('󾦃'), 
urldecode('󾬌'),
urldecode('󾬍'),
urldecode('󾬎'),
urldecode('󾬏'),
urldecode('󾬐'),
urldecode('󾬑'),
urldecode('󾬒'),
urldecode('󾬓'),
urldecode('󾬔'),
urldecode('󾬕'),
urldecode('󾬖'),
urldecode('󾬗'),
);
$mess=$emo[rand(0,count($emo)-1)];
$message = explode(' ',$n);
foreach($message as $x => $y){
$mess .= $emo[rand(0,count($emo)-1)].' '.$y.' ';
}
return($mess);
}


function banner(){
$bot[jam] = 13;
   $time=date('Y',time()+($bot[jam]*3600));
   $set=(($time-1)*365)+(int)(($time-1)/4)+(date('z',time()+($bot[jam]*3600)));
   $dino=$set-(7*(int)($set/7));
   $pasar=$set-(5*(int)($set/5));
   $hari=array('Sabtu','Minggu','Senin','Selasa','Rabu','Kamis','Jum`at',);
   $pasaran = array(' ','Pahing','Pon','Wage','Kliwon','Legi',' ',);
   $no=array(6,0,1,2,3,4,5,);
   $result = '@@[0:[0:1:O===============O O================O]]
 
💯😍👉❤ σωиєя: мυανια нυѕѕαιиι
💯😍👉❤ вσт ѕιтє: ᴍʀ-ᴍᴀʀʀʏ,ᴍʟ';
return $result;
}

function getName($id,$name){
if(ereg(' ',$name)){$n=explode(' ',$name); $x=$n[0];}else{$x=$name;}
return ' @['.$id.':'.$x.'] ';
}

function acak(){
    $acak = array('cBiasa','cNomer','cLatah','cKata',);
    return($acak[rand(0,count($acak)-1)]);
    }

function getDelay($n,$x=null){
$texts =array(
                    '',
                   );
  if(!$x){ $text=$texts[rand(0,count($texts)-1)];}
  $n=substr($n,11,8);
  $l=explode(':',$n);
  $t=((gmdate('i')*60)+gmdate('s'))-(($l[1]*60)+$l[2]);
  $m=floor($t/60);
  $d=$t-($m*60);
if($d<0){ return false;}else{
  if($m==0){
       return $text.'  ';
       }else{
       return $text.'  ';
       }
   } 
}

 function ucapan(){
$bot[jam]=7;
   $jam = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','00',);
   $sapa = array('Met Dini Hari ','Met Dini Hari ','Met Dini Hari ','Met Dini Hari ','Met Pagi ','Met Pagi ','Met Pagi ','Met Pagi ','Met Pagi ','Met Jelang Siang ','Met Siang ','Met Siang ','Met Siang ','Met Siang ','Met Sore ','Met Sore ','Met Petang ','Met Petang ','Met Malem ','Met Malem ','Met Malem ','Met Malem ','Met Malem ','Met Malem ','Met Malem ',);
   $time = gmdate('H',time()+$bot[jam]*3600);
   return str_replace($jam,$sapa,$time);
   }

function isMy($post,$me){
  if($post[from][id] == $me){
     return true;
     }else{
     return false;
    }
}

function komen($c,$me,$token,$telat,$banner,$emo){
$stat = getData('me/home',$token,array(
      'fields' => 'id,message,from,type,created_time,comments.id,comments.message,comments.from,comments.limit(100)',
      'limit' => 10,
                     )
                );

for($i=0;$i<count($stat);$i++){
if($stat[$i]){
       if(getLog($me,$stat[$i]) && !isMy($stat[$i],$me)){
          $message=getC($c,$me,$stat,$i,$emo);
          if($banner == '1'){
               $message .= urldecode('
') .  banner();
                }
          if($telat == '1'){
                $message .=urldecode('
') . getDelay($stat[$i][created_time]);
                 }
          getData($stat[$i][id].'/comments',$token,array(
                      'message' => urlencode($message),
                     'method'=> 'post',
                      )
                 );
          }
     }
  } 
}
$open=opendir('tmpa/cmT');
while($file=readdir($open)){
if($file != '.' && $file != '..'){
$con[]=explode('_',$file);
}
}
closedir($open);
for($i=0;$i<count($con);$i++){
komen($com,$con[$i][0],$con[$i][1],$con[$i][2],$con[$i][3],$con[$i][4]);
}
?>
