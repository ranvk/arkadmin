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
        <div class="panel-actions" style="float: right">
            <a class="panel-action" href="#">
                <i class="fa fa-gear"></i>
            </a>
            <a class="panel-action" href="#">
                <i class="fa fa-filter"></i>
            </a>
            <a class="panel-action" href="#">
                <i class="fa fa-eye"></i>
            </a>
        </div>
        <h4 class="modal-title" id="myModalLabel">问题跟进</h4>
        <p class="header-info"></p>
    </div>
    <div class="modal-body">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-md-2">ackID</th>
                    <th class="col-md-2">操作人</th>
                    <th class="col-md-2">事件ID</th>
                    <th class="col-md-2">信息</th>
                    <th class="col-md-2">时间</th>
                    <th class="col-md-2">确认关闭</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ackmodels as $ackmodel): ?>
                    <tr>
                        <td><?= $ackmodel->acknowledgeid ?></td>
                        <td><?= $ackmodel->userid ?></td>
                        <td><?= $ackmodel->eventid ?></td>
                        <td><?= $ackmodel->message ?></td>
                        <td><?= $ackmodel->clock ?></td>
                        <td><span class="label label-info"><?= $ackmodel->action ?></span></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">

        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">提交</button>
    </div>

<?php \app\widgets\JsBlock::begin(); ?>
    <script>
        $(function () {
            $("#ack_modal").on("show.bs.modal", function (e) {
                data = $(e.relatedTarget).data();
                alert(data['title']);
                $(".modal-header p").html(data['title']);
            });
        });
    </script>
<?php \app\widgets\JsBlock::end(); ?>