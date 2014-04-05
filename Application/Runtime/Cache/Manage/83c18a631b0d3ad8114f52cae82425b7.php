<?php if (!defined('THINK_PATH')) exit();?>    <!-- remarkModal -->
      <div class="modal fade" id="demo<?php echo ($id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">查看留言</h4>
            </div>
            <div class="modal-body">
              <?php
 if($comment){ ?>
              <?php if(is_array($comment)): foreach($comment as $key=>$c): ?><div class="media">
              <div class="media-body">
                <h4 class="media-heading"><?php echo ($c["comment"]); ?></h4>
                <div align="right"><?php echo ($c["name"]); ?>(<?php echo ($c["datetime"]); ?>)</div>
              </div>
            </div>
            <hr><?php endforeach; endif; ?>
          <?php
 }else{ ?>
          <div class="media">
              <div class="media-body">
              <p>对不起，没有用户留言</p>
              </div>
            </div>
        <?php
 } ?>    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->