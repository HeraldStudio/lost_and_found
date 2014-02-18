<?php if (!defined('THINK_PATH')) exit();?>
<div class="thumbnail content <?php echo ($infoType); ?>">
  <div class="con-pic" id="<?php echo ($content_id); ?>">
    <img src=<?php echo ($picture_url); ?> style="width:240px;height:120px;">
  </div>
  <div class="caption">
    <div class="con-describe">
      <p><?php
 if($infoType=="con-pick"){ ?>
          捡到
          <?php
 } else{ ?>
          丢失
          <?php
 } ?>：<?php echo ($thing_name); ?></p> 
      <p>地点：<?php echo ($place); ?></p>
      <p>时间：<?php echo ($datetime); ?></p>
      <p>描述：<?php echo ($thing_describe); ?></p>
    </div>
    <p>
      <button class="btn btn-default btn-xs comment" id="<?php echo ($content_id); ?>">评论</button>
      <button class="btn btn-primary btn-xs detail" id="<?php echo ($content_id); ?>">详情</button>
    </p>
  </div>
</div>