<?php
namespace Home\Controller;
use Think\Controller;
class FormHandleController extends Controller{
    /*用于表单上传发布的信息*/
	Public function form(){
         $tp = I('tp');
         if($tp == 'pc'){
            $model = "picks";
            $tp_id = "pick_id";
         }else{
            $model = "loses";
            $tp_id = "lose_id";
         }
		 $data = array(
            "thing_name" =>  I('thing_name'),
            "place" => I('place'),
            "datetime" =>I('datetime'),
            "contact" =>I('contact'),
            "thing_describe" => I('thing_describe'),
            "type" =>I('type'),
            "picture_name" =>I('picture_name'),
            "update_time" =>date('Y-m-d H:i:s'),
            "if_has_picture" =>I('if_has_picture'),
            "if_give_back"=>false,
            "if_find"=>false
            );
            $id =  M($model)->data($data)->add();
            $user = M($model);
            if($data['if_has_picture']){
            $this->upload($id,$model); 
            $user->where("$tp_id = $id")->setField('picture_name',$id.'.jpg');
            }else{
            $user->where("$tp_id = $id")->setField('picture_name',null);
            };
                           
    	if($id){
            $data['status']=1;
            $data['tp']=$model;
            $this->AjaxReturn($data,'json');
        }else{
            $data['tp']=$model;
        	$data['status']=0;
            $this->AjaxReturn($data,'json');
        }
    }


    /*用于上传文件和建立缩略图*/
    public function upload($name,$model){
    

                foreach ($_FILES["picture"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        move_uploaded_file( $_FILES["picture"]["tmp_name"][$key],"Public/pictures/$model/" . $name.'.jpg');
                 }
                }

                  $image = new \Think\Image(); 
                  $image->open("Public/pictures/$model/" .$name.'.jpg');
                  // 按照原图的比例生成一个最大为100*100的缩略图并保存为thumb.jpg
                  $image->thumb(100, 100)->save("Public/pictures/picks/small/" . $_FILES['picture']['name'][$key]);
                      

                }


}
?>