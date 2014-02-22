<?php if (!defined('THINK_PATH')) exit();?>
<div class="thumbnail content <?php echo ($infoType); ?>">
  <div 
      <?php
 if($infoType=="con-pick"){ ?>
      class="con-pic btnPick"
      <?php
 }else{ ?>
      class="con-pic btnLose" 
      <?php
 } ?>
  id="<?php echo ($content_id); ?>">
    <img src=<?php echo ($picture_url); ?> style="width:<?php echo ($width); ?>px; height:<?php echo ($height); ?>px; margin-top:<?php echo ($marginTop); ?>px; margin-left:<?php echo ($marginLeft); ?>px;">
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
      <button 
      <?php
 if($infoType=="con-pick"){ ?>
      class="btn btn-primary btn-xs btnPick comment" 
      <?php
 }else{ ?>
      class="btn btn-primary btn-xs btnLose comment" 
      <?php
 } ?>

      id="<?php echo ($content_id); ?>"><span class="glyphicon glyphicon-comment"></span> 评论</button>
      <button 
      <?php
 if($infoType=="con-pick"){ ?>
        class="btn btn-success btn-xs btnPick detail"
      <?php
 }else{ ?>
        class="btn btn-danger btn-xs btnLose detail"
      <?php
 } ?>
       id="<?php echo ($content_id); ?>"><span class="glyphicon glyphicon-list-alt"></span> 详情</button>
    </p>
  </div>
</div>