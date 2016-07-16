<?php
use yii\widgets\LinkPager;

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td width="80">用户id</td>
                <td width="120">用户名</td>
                <td width="160">地址</td>
                <td width="100">注册日期</td>
            </tr>
            </tbody>
            <?php foreach ($models as $model) { ?>
            <tr>
                <td><?php echo $model->id ?></td>
                <td><?php echo $model->name ?></td>
                <td><?php echo $model->address ?></td>
                <td><?php echo $model->registration_date ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
    </div>
</div>