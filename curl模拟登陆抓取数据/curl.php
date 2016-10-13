<?php
 header("Content-type: text/html; charset=utf-8"); 
  function login_post($url, $cookie, $post) {
    $curl = curl_init();//初始化curl模块
    curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址
    curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息,0为显示
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中
    curl_setopt($curl, CURLOPT_POST, 1);//post方式提交
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息
    $rs =curl_exec($curl);//执行cURL
    $rs = iconv("gbk", "utf-8", $rs);
    curl_close($curl);//关闭cURL资源，并且释放系统资源
    //print_r($rs);
  }
 $post=array(
   'lgt'=>'0',
   'pwuser'=>'ldmldm',
   'pwpwd'=>'123456ldm',
   'forward'=>'100',
   'jumpurl'=>'http://bbs.php100.com/index.php',
   'step'=>'2',
   'cktime'=>'500',
   'submit' => '登录'
 );


   //登录后要获取信息的地址  $url2 = "http://m.oschina.net/my";  //模拟登录

 $cookie=dirname(__FILE__) . '/cookie_oschina.txt';
 login_post("http://bbs.php100.com/login.php",$cookie,$post);
//登录成功后获取数据

function get_content($url, $cookie) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, '1');
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie
    $rs = curl_exec($ch); //执行cURL抓取页面内容
   
    $rs = iconv("gbk", "utf-8", $rs);
    // preg_match("/<li>金币：(.*)<\/li>/",$rs,$arr);
    // print_r($arr);
    curl_close($ch);
  print_r($rs);
    
}

get_content('http://bbs.php100.com/index.php', $cookie);


//====================
//设置post的数据
// $post = array (
//     'email' => 'oschina账户',
//     'pwd' => 'oschina密码',
//     'goto_page' => '/my',
//     'error_page' => '/login',
//     'save_login' => '1',
//     'submit' => '现在登录'
// );
  //登录地址  $url = "http://m.oschina.net/action/user/login";  //设置cookie保存路径  $cookie = dirname(__FILE__) . '/cookie_oschina.txt';  //登录后要获取信息的地址  $url2 = "http://m.oschina.net/my";  //模拟登录
//login_post($url, $cookie, $post);  //获取登录页的信息  $content = get_content($url2, $cookie);  //删除cookie文件
// @ unlink($cookie);  //匹配页面信息  $preg = "/<td class='portrait'>(.*)<\/td>/i";
// preg_match_all($preg, $content, $arr);  $str = $arr[1][0];  //输出内容  echo $str;
?>