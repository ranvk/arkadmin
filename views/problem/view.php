<?php
/**
 * Created by PhpStorm.
 * User: ukerzheng
 * Date: 2017/4/1
 * Time: 16:37
 */
$this->context->layout = false;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">问题详细</h4>
</div>
<div class="modal-body">
<?= var_dump($model)?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary">提交</button>
</div>
