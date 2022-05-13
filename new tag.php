<?php
/*// 追加写入用户名下文件
$code="001";//动态数据
    $json_string = file_get_contents("text.json");// 从文件中读取数据到PHP变量
    $data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
    $data[$code]=array("a"=>"as","b"=>"bs","c"=>"cs");
    $json_strings = json_encode($data);
    file_put_contents("text.json",$json_strings);//写入
//修改
 $json_string = file_get_contents("text.json");// 从文件中读取数据到PHP变量
    $data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
    $data["001"]["a"]="aas";
    $json_strings = json_encode($data);
    file_put_contents("text.json",$json_strings);//写入*/
// $json_string = file_get_contents("tag.json");
// $data = json_decode($json_string,true);
/*
$code = array(
   "https://console.dnspod.cn/dns/list"=>"https://cloudcache.tencent-cloud.cn/open_proj/proj_qcloud_v2/tc-console/dnspod/gateway/css/img/dnspod.ico",
   "https://jixia.icu/#/jxdo/"=>"https://jixia.icu/favicon.ico",
   "https://docs.qq.com/desktop/mydoc/folder/NtEeZKQmaFNT?_t=1636115127918"=>"https://docs.gtimg.com/desktop/favicon2.ico",
   "https://buuoj.cn/challenges"=>"https://buuoj.cn/themes/buu_core/static/img/favicon.ico"
);
$json_strings = json_encode($code);
print_r($json_strings);
*/
$json_string = file_get_contents("tag.json");
$data = json_decode($json_string,true);
// foreach($data as $url => $ico) {
//    echo "<a href=$url><img src=$ico style='width:55px;margin: 2px;border: 1px solid #cccccc;'/></a>";
// }
foreach ($data as $name=>$key) {
   $url = $key['url'];
   $ico = $key['ico'];
   echo "<a href=$url 
            style='
               display:block;
               float:left;
               width:62px;
               height:80px;
               margin:6px;
               text-align:center;
               text-decoration: none;
               color:#c62828;
               border: 1px solid #cccccc;
               font-size: 0.9em;
            '>
            <img src=$ico 
               style='
                  width:55px;
                  margin: 2px;
                  
               '/>
            <div style=' text-overflow: ellipsis;white-space: nowrap;overflow: hidden;   '>
               $name
            </div>
         </a>";
}
function add_tag($tag_url,$tag_ico,$tag_name){

   $json_string = file_get_contents("tag.json");
   $data = json_decode($json_string,true);
   $data["$tag_name"] = array("url"=>$tag_url,"ico"=>$tag_ico);
   $json_string = json_encode($data);
   file_put_contents("tag.json",$json_string);
}
if($_SERVER['SCRIPT_NAME'] == "/new tag/new_tag/new tag.php" and @$_REQUEST['url'] and @$_REQUEST['ico']){
   if(!@$_REQUEST['name']){
      $tag_name = "none";
   }else{
      $tag_name = $_REQUEST['name'];
   }
   $add_tag_url = $_REQUEST['url'];
   $add_tag_ico = $_REQUEST['ico'];
   $add_tag_name = $tag_name;
   add_tag($add_tag_url,$add_tag_ico,$add_tag_name);
}
echo "<input style='width:60px;' onclick='input_area()' id='plus'/>
      

      <form action='new tag.php' id='show_login'>
         <input type='text' name='url' placeholder='url' /><br>
         <input type='text' name='ico' placeholder='ico' /><br>
         <input type='text' name='name' placeholder='name' /><br>
         <input type='submit' value='添加' /><br>
         <input type='button' value='关闭' onclick='close_input_area()'/><br>
      </form>
      <script>
         function input_area(){
           show_login.style.display='block'
         }
         function close_input_area() {
               show_login.style.display = 'none'
         }
      </script>
";
echo  "
         <style type='text/css'>
               #show_login{
                  text-align:center;
                  display: none; /* 默认隐藏 */
                  position: fixed; /* 固定定位 */
                  z-index: 1; /* 设置在顶层 */
                  left: 0;
                  top: 0;
                  margin-top:30px;
                  margin-left:35%;
                  width: 30%; 
                  height: 210px;
                  overflow: auto; 
                  background-color: rgb(0,0,0); 
                  background-color: rgba(0,0,0,0.4);
               }
               #show_login input{
                  width:100%;
                  height:20%;
               }
               #add{
                  margin:6px;
                  width:72px;
                  height:82px;
                  display:block;
                  float:left;
                  text-decoration: none;
               }
               #plus{
                  
                  margin-top:10px;
                  width: 62px;
                  height: 62px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  color: #205DA2;
                  font-size: 75px;
                  border-radius: 13.18px;
                  border: 4.16px dashed #205DA2;
                  box-sizing: border-box;
                  position: relative;
                  margin-bottom: 11.1px;
              }
              #plus::before {
                  content: '';
                  position: absolute;
                  width: 31.25px;
                  border-top: 4.16px solid;
              }

              #plus::after {
                  content: '';
                  position: absolute;
                  height: 31.25px;
                  border-left: 4.16px solid;
              }
         </style>
      ";