<?php if (!defined('THINK_PATH')) exit();?>
  <table class="table table-hover">
    <td><?php echo ($lsinfo["type"]); ?></td>
     <!--  <tr>
        <?php if(is_array($arr)): foreach($arr as $key=>$l): ?><td >丢失</td>
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
        <td><button type="lose" infoid="1" class="btn btn-sm btn-default" id="confirm" ><span class="glyphicon glyphicon-ok"></span>
          <?php
 if($l['if_find']==0){ ?>
      等待确认
      <?php
 }else{ ?>
      已归还
      <?php
 } ?></a> </button></td>
        <td ><button type="lose" infoid="2" class="btn btn-sm btn-danger" ><span class="glyphicon glyphicon-remove"></span><a href="<?php echo U('Home/LoseInfo/delete',array('lose_id'=>$l['lose_id']));?>">删除</a></button></td>
      </tr><?php endforeach; endif; ?>
    <tr>
      <td colspan='8' align='right'>
        <?php echo ($page); ?>
      </td>
    </tr> -->
  </table>