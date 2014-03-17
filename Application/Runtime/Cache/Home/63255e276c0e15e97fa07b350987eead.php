<?php if (!defined('THINK_PATH')) exit();?><div id="detailImg">
	<img src="<?php echo ($picture_url); ?>" style="width:<?php echo ($width); ?>px; height:<?php echo ($height); ?>px; margin-top:<?php echo ($marginTop); ?>px; margin-left:<?php echo ($marginLeft); ?>px; ">
</div>
<div id="detailRight">
	<div id="detailInfo">
		<p>
			<?php
 if($infoType=="pick"){ ?>
			捡到
			<?php
 }else{ ?>
			丢失
			<?php
 } ?>
			：<?php echo ($thing_name); ?></p>
		<p>地点：<?php echo ($place); ?></p>
		<p>时间：<?php echo ($datetime); ?></p>
		<p>描述：<?php echo ($thing_describe); ?></p>
		<p>发布者：<?php echo ($name); ?></p>
		<p>发布时间：<?php echo ($update_time); ?></p>
		<p>联系方式：<button class="btn btn-primary btn-sm getContact">点击获取</button></p>
	</div>
	<div id="detailComment">
		<h4><strong>评论:</strong></h4>
		<?php
 for($i=0;$i<count($comments);$i++){ ?>
			<p class="commenter"><strong><?php echo ($comments[$i]["name"]); ?>:</strong><?php echo ($comments[$i]["comment"]); ?> (<?php echo ($comments[$i]["datetime"]); ?>)</p>
		<?php
 } ?>
	</div>
		<textarea type="area" rows="2" cols="4" class="form-control" id="commentContent2" placeholder="我要评论"></textarea>
		<button class="btn btn-default btn-s" id="submit2">发表</button>
</div>

<div class="clear"></div>