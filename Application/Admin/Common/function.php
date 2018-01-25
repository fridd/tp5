<?php


//处理方法
function rmdirr($dirname) {
    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    if ($dir) {
        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            //递归
            rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
        }
    }
}

//公共函数
//获取文件修改时间
function getfiletime($file, $DataDir) {
    $a = filemtime($DataDir . $file);
    $time = date("Y-m-d H:i:s", $a);
    return $time;
}

//获取文件的大小
function getfilesize($file, $DataDir) {
    $perms = stat($DataDir . $file);
    $size = $perms['size'];
    // 单位自动转换函数
    $kb = 1024;         // Kilobyte
    $mb = 1024 * $kb;   // Megabyte
    $gb = 1024 * $mb;   // Gigabyte
    $tb = 1024 * $gb;   // Terabyte

    if ($size < $kb) {
        return $size . " B";
    } else if ($size < $mb) {
        return round($size / $kb, 2) . " KB";
    } else if ($size < $gb) {
        return round($size / $mb, 2) . " MB";
    } else if ($size < $tb) {
        return round($size / $gb, 2) . " GB";
    } else {
        return round($size / $tb, 2) . " TB";
    }
}

/* 
 * 递归重组节点信息
 * @param $node 要重组的节点数组
 * @param $pid 父级ID
 * @return
 */
function node_regroup($node, $pid = 0, $access = null) {
    $arr = array();
    foreach($node as $v) {
        if(is_array($access)) {
            $v['access'] = in_array($v['id'], $access) ?  1 : 0;//判断是否已经拥有权限
        }
        if($v['pid'] == $pid) {
            $v['child'] = node_regroup($node, $v['id'], $access);
            $arr[] = $v;
        }
    }
    return $arr;
}


/**
 * 保存某商品的相册图片
 * @param   int     $cat_type
 * @param   array   $image_files
 * @param   array   $title
 * @return  void
 */
function handle_gallery_image($image_files, $titles, $image_urls)
{

    /* 是否处理缩略图 */
    foreach ($titles AS $key => $title)
    {
        /* 是否成功上传 */
        $flag = false;
        if (isset($image_files['error']))
        {
            if ($image_files['error'][$key] == 0)
            {
                $flag = true;
            }
        }
        else
        {
            if ($image_files['tmp_name'][$key] != 'none')
            {
                $flag = true;
            }
        }

        if ($flag)
        {

            $upload = array(
                'name' => $image_files['name'][$key],
                'type' => $image_files['type'][$key],
                'tmp_name' => $image_files['tmp_name'][$key],
                'size' => $image_files['size'][$key],
            );
            if (isset($image_files['error']))
            {
                $upload['error'] = $image_files['error'][$key];
            }

            $img_original = upload_image($upload);
          
            if ($img_original === false)
            {
                $message['error']=$img_original;
                return $message;
            }
            
            $arr['img_url']=$img_original;
            $arr['title']=$title;
            M("Figure")->add($arr);

        }
        elseif (!empty($image_urls[$key]) && copy(trim($image_urls[$key]), ROOT_PATH . 'temp/' . basename($image_urls[$key])))
        {
            $image_url = trim($image_urls[$key]);

            //定义原图路径
            $down_img = ROOT_PATH . 'temp/' . basename($image_url);

            /* 重新格式化图片名称 */
            $img_url =  htmlspecialchars($image_url);
        
            $arr['img_url']=$img_url;
            $arr['title']=$title;
            M("Figure")->add($arr);

            @unlink($down_img);
        }
    }
}

/**
 * 图片上传的处理函数
 *
 * @access      public
 * @param       array       upload       包含上传的图片文件信息的数组
 * @param       array       dir          文件要上传在$this->data_dir下的目录名。如果为空图片放在则在$this->images_dir下以当月命名的目录下
 * @param       array       img_name     上传图片名称，为空则随机生成
 * @return      mix         如果成功则返回文件名，否则返回false
 */
function upload_image($upload, $dir = '', $img_name = '')
{

    /* 没有指定目录默认为根目录images */
    if (empty($dir))
    {
        /* 创建当月目录 */
        $dir = date('Ymd');
        $dir = ROOT_PATH . '/Public/images/' . $dir . '/';
    }

    /* 如果目标目录不存在，则创建它 */
    if (!file_exists($dir))
    {
        if (!mkdir($dir))
        {
            /* 创建目录失败 */
            return false;
        }
    }
    
    if (empty($img_name))
    {
        $img_name = unique_name($dir);
        $img_name = $dir . $img_name . get_filetype($upload['name']);
    }

    if (!check_img_type($upload['type']))
    {
        return false;
    }

    if (move_file($upload, $img_name))
    {
        return str_replace(ROOT_PATH, '', $img_name);
    }
    else
    {

        return false;
    }
}

/**
 *  生成指定目录不重名的文件名
 *
 * @access  public
 * @param   string      $dir        要检查是否有同名文件的目录
 *
 * @return  string      文件名
 */
function unique_name($dir)
{
    $filename = '';
    while (empty($filename))
    {
        $filename = random_filename();
        if (file_exists($dir . $filename . '.jpg') || file_exists($dir . $filename . '.gif') || file_exists($dir . $filename . '.png'))
        {
            $filename = '';
        }
    }

    return $filename;
}

/**
 * 生成随机的数字串
 *
 * @author: weber liu
 * @return string
 */
function random_filename()
{
    $str = '';
    for($i = 0; $i < 9; $i++)
    {
        $str .= mt_rand(0, 9);
    }

    return time() . $str;
}

/**
 *  返回文件后缀名，如‘.php’
 *
 * @access  public
 * @param
 *
 * @return  string      文件后缀名
 */
function get_filetype($path)
{
    $pos = strrpos($path, '.');
    if ($pos !== false)
    {
        return substr($path, $pos);
    }
    else
    {
        return '';
    }
}

/**
 * 检查图片类型
 * @param   string  $img_type   图片类型
 * @return  bool
 */
function check_img_type($img_type)
{
    return $img_type == 'image/pjpeg' ||
           $img_type == 'image/x-png' ||
           $img_type == 'image/png'   ||
           $img_type == 'image/gif'   ||
           $img_type == 'image/jpeg';
}

/**
 *
 *
 * @access  public
 * @param
 *
 * @return void
 */
function move_file($upload, $target)
{
    if (isset($upload['error']) && $upload['error'] > 0)
    {
        return false;
    }

    if (!move_upload_file($upload['tmp_name'], $target))
    {
        return false;
    }

    return true;
}

/**
 * 将上传文件转移到指定位置
 *
 * @param string $file_name
 * @param string $target_name
 * @return blog
 */
function move_upload_file($file_name, $target_name = '')
{
    if (function_exists("move_uploaded_file"))
    {
        if (move_uploaded_file($file_name, $target_name))
        {
            @chmod($target_name,0755);
            return true;
        }
        else if (copy($file_name, $target_name))
        {
            @chmod($target_name,0755);
            return true;
        }
    }
    elseif (copy($file_name, $target_name))
    {
        @chmod($target_name,0755);
        return true;
    }
    return false;
}

?>