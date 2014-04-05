<?php if (!defined('THINK_PATH')) exit();?>  <table class="table table-hover">
     <tr class="success">
        <th><strong>信息</strong></th>
        <th><strong>类型</strong></th>
        <th><strong>名称</strong></th>
        <th><strong>地点</strong></th>
        <th><strong>时间</strong></th>
        <th><strong>状态</strong></th>
        <th><strong>确认</strong></th>
        <th><strong>删除</strong></th>
        <th><strong>查看留言</strong></th>
      </tr>
     <tr>
        <?php if(is_array($lsinfo)): foreach($lsinfo as $key=>$l): ?><td>丢失</td>
        <td><?php echo ($l["type"]); ?></td>
        <td><?php echo ($l["thing_name"]); ?></td>
        <td><?php echo ($l["place"]); ?></td>
        <td><?php echo ($l["datetime"]); ?></td>
        <td>
      <?php
 if($l['if_find']==0){ ?>
      未归还
      <?php
 }else{ ?>
      已归还
      <?php
 } ?>
    </td>
        <td><button type="lose" infoid="1" class="btn btn-sm btn-default confirm" id="<?php echo ($l["lose_id"]); ?>"><span class="glyphicon glyphicon-ok confirm"></span>
          <?php
 if($l['if_find']==0){ ?>
      等待确认
      <?php
 }else{ ?>
      已归还
      <?php
 } ?></button></td>
         <td ><button type="lose" infoid="2" class="btn btn-sm btn-danger delete"  id="<?php echo ($l["lose_id"]); ?>"><span class="glyphicon glyphicon-remove"></span>删除</button></td>
          <td ><button type="lose" infoid="2" class="btn btn-sm btn-default remark"  id="<?php echo ($l["lose_id"]); ?>"  data-toggle="modal" data-target="#demo<?php echo ($l["lose_id"]); ?>" ><span class="glyphicon glyphicon-circle-arrow-down"></span>查看留言</button></td>
         </tr><?php endforeach; endif; ?> 
   </table>

 
   

 

   <script src="/1/7/6/lost_and_found/Public/js/manage.js"></script>