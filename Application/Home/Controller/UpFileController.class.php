<?php
namespace Home\Controller;
use Think\Controller;
class UpFileController extends Controller{
public function upload(){
    if($_FILES['pc_picture']["name"] != null){
                    //上传图片
                if ((($_FILES["pc_picture"]["type"] == "image/gif")
                || ($_FILES["pc_picture"]["type"] == "image/jpeg")
                || ($_FILES["pc_picture"]["type"] == "image/jpg")
                || ($_FILES["pc_picture"]["type"] == "image/png"))
                && ($_FILES["pc_picture"]["size"] < 5120000))
                  {
                  if ($_FILES["pc_picture"]["error"] > 0)
                    {
                    echo "<script>alert('图片上传不成功。图片要gif、jpg、png格式，而且小于5M');</script>";
                    exit;
                    }
                  else
                    {
                          move_uploaded_file($_FILES["pc_picture"]["tmp_name"],
                          "Public/pictures/picks/" . $_FILES["pc_picture"]["name"].'.jpg');
                          //建立数据模型
                          $data = array(
                            'picture_name' => $_FILES["pc_picture"]["name"]
                          
                            );
                          M('pick_picture')->data($data)->add();    

                    }
                  }
                else
                  {
                  echo "<script>alert('图片上传不成功。图片要gif、jpg、png格式，而且小于5M');</script>";
                  exit;
                  }
            }
        }




public function lupload(){
    if($_FILES['ls_picture']["name"] != null){
                    //上传图片
                if ((($_FILES["ls_picture"]["type"] == "image/gif")
                || ($_FILES["ls_picture"]["type"] == "image/jpeg")
                || ($_FILES["ls_picture"]["type"] == "image/jpg")
                || ($_FILES["ls_picture"]["type"] == "image/png"))
                && ($_FILES["ls_picture"]["size"] < 5120000))
                  {
                  if ($_FILES["ls_picture"]["error"] > 0)
                    {
                    echo "<script>alert('图片上传不成功。图片要gif、jpg、png格式，而且小于5M');</script>";
                    exit;
                    }
                  else
                    {
                          move_uploaded_file($_FILES["ls_picture"]["tmp_name"],
                          "Public/pictures/loses/" . $_FILES["ls_picture"]["name"].'.jpg')
                          
                    }
                  }
                else
                  {
                  echo "<script>alert('图片上传不成功。图片要gif、jpg、png格式，而且小于5M');</script>";
                  exit;
                  }
            }
       }          

}
?>