<?php
use yii\helpers\Url;

?>

<div class="uk-grid">
    <div class="uk-width-3-6 uk-container-center">
        <div class="imageupload panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">图片上传</h3>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default active">文件</button>
                        <button type="button" class="btn btn-default">抓取地址</button>
                    </div>
                </div>
                <div class="file-tab panel-body">
                    <label class="btn btn-default btn-file">
                        <span>浏览</span>
                        <!-- The file is stored here. -->
                        <input type="file" name="image-file">
                    </label>
                    <button type="button" class="btn btn-default">删除</button>
                </div>
                <div class="url-tab panel-body">
                    <div class="input-group">
                        <input type="text" class="form-control hasclear" placeholder="Image URL">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default">提交</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default">删除</button>
                    <!-- The URL is stored here. -->
                    <input type="hidden" name="image-url">
                </div>
            </div>

            <!-- bootstrap-imageupload method buttons. -->
            <button type="button" id="imageupload-disable" class="btn btn-danger">禁止</button>
            <button type="button" id="imageupload-enable" class="btn btn-success">允许</button>
            <button type="button" id="imageupload-reset" class="btn btn-primary">复位</button>
        </div>
    </div>
</div>


<?php 
$js = <<< JS
    var imageupload = $('.imageupload').imageupload();

    $('#imageupload-disable').on('click', function() {
        imageupload.imageupload('disable');
        $(this).blur();
    })

    $('#imageupload-enable').on('click', function() {
        imageupload.imageupload('enable');
        $(this).blur();
    })

    $('#imageupload-reset').on('click', function() {
        imageupload.imageupload('reset');
        $(this).blur();
    });

JS;
$this->registerJs($js);
?>
