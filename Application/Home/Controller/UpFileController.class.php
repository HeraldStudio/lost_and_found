<?php
namespace Home\Controller;
use Think\Controller;
class UpFileController extends Controller{
public function upload(){
    

                foreach ($_FILES["pc_picture"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $name = $_FILES["pc_picture"]["name"][$key];
                        move_uploaded_file( $_FILES["pc_picture"]["tmp_name"][$key],"Public/pictures/picks/" . $_FILES['pc_picture']['name'][$key]);
                 }
                }

                  $image = new \Think\Image(); 
                  $image->open("Public/pictures/picks/" . $_FILES['pc_picture']['name'][$key]);
                  // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                  $image->thumb(100, 100)->save("Public/pictures/picks/small/" . $_FILES['pc_picture']['name'][$key]);
                      

        }


public function lupload(){
    

                foreach ($_FILES["ls_picture"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $name = $_FILES["ls_picture"]["name"][$key];
                        move_uploaded_file( $_FILES["ls_picture"]["tmp_name"][$key],"Public/pictures/loses/" . $_FILES['ls_picture']['name'][$key]);
                 }
                }

                  $image = new \Think\Image(); 
                  $image->open("Public/pictures/loses/" . $_FILES['ls_picture']['name'][$key]);
                  // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                  $image->thumb(100, 100)->save("Public/pictures/loses/small/" . $_FILES['ls_picture']['name'][$key]);
                      

        }

   

}
?>