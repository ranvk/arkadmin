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
            $("#<?=$modalid?>").on("hidden.bs.modal", function () {
                $(this).removeData("bs.modal");
            });
            $("#<?=$modalid?>").on("show.bs.modal", function (e) {
                data = $(e.relatedTarget).data();
                alert(data['title']);
                $(".modal-header p").html(data['title']);
            });
        });
    </script>
<?php \app\widgets\JsBlock::end(); ?>