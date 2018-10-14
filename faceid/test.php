<?php
    require_once 'AipFace.php';
    // 你的 APPID AK SK
    const APP_ID = '14335899';
    const API_KEY = 'z9cfhRjcMEL0cF2lk0wSArm6';
    const SECRET_KEY = 'gZtzVLubYXGvoOFFvthd0XxQqbDlBwY2';

    $client = new AipFace(APP_ID, API_KEY, SECRET_KEY);

    //创建组
    /*
    $groupId="Library";
    var_dump($client->groupAdd($groupId));
    */
    
    
    
    //查看所有组
    /*
    var_dump($client->getGroupList());
    */
    
    
    
    //注册人脸
    /*
    $image = "https://www.1024s.cn/1.jpg";

    $imageType = "URL";

    $groupId = "Library";

    $userId = "201612410130";

    // 调用人脸注册
    $client->addUser($image, $imageType, $groupId, $userId);
    // 如果有可选参数
    $options = array();
    $options["user_info"] = "王越权";
    // 带参数调用人脸注册
    echo'<pre>';
    var_dump($client->addUser($image, $imageType, $groupId, $userId, $options));
    echo'</pre>';
    */


    //人脸检索

    $image = "https://www.1024s.cn/text1.jpg";

    $imageType = "URL";

    $groupIdList = "Library";

    // 调用人脸搜索
    var_dump($client->search($image, $imageType, $groupIdList));
    /*
    // 如果有可选参数
    $options = array();
    $options["quality_control"] = "NORMAL";
    $options["liveness_control"] = "LOW";
    $options["user_id"] = "233451";
    $options["max_user_num"] = 3;

    // 带参数调用人脸搜索
    $client->search($image, $imageType, $groupIdList, $options);
    */
?>