<?php
/**
 * Created by PhpStorm.
 * User: ukerzheng
 * Date: 2017/3/31
 * Time: 16:21
 */
?>

    <!-- Modal -->
    <div class="modal fade" id="<?= $modalid ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $modalid ?>"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><?= $title ?></h4>
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
                            <tbody id="acklist">
                            </tbody>
                        </table>
                    </div>
                    <div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary">提交</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->

    <!-- 定义数据块 -->

<?php \app\widgets\JsBlock::begin(); ?>
    <script>
        $(function () {
            //显示窗口
            $("#<?=$modalid?>").on("show.bs.modal", function (e) {
                // --1)显示标题
                data = $(e.relatedTarget).data();
                $(".modal-header p").html(data['title']);

                // --2)获取已有的数据并填充
                axios.get('ack', {
                    params: {
                        eventid: data['eventid']
                    }
                })
                    .then(function (response) {
                        var temp = '';
                        $.each(response.data, function (i, val) {
                            temp += '<tr><td>' +
                                val.acknowledgeid + '</td><td>' +
                                val.action + '</td><td>' +
                                val.clock + '</td><td>' +
                                val.eventid + '</td><td>' +
                                val.message + '</td><td>' +
                                val.userid +
                                '</td></tr>';
                        });
                        $("#acklist").empty();
                        $("#acklist").append(temp);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                // --3显示确认信息框

            });

            //关闭窗口，更新数据
            $("#<?=$modalid?>").on("hidden.bs.modal", function () {
                $(this).removeData("bs.modal");
            });

        });
    </script>
<?php \app\widgets\JsBlock::end(); ?>