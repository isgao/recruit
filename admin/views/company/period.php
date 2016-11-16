<?php

use app\assets\AppAsset;

use yii\helpers\Url;
use yii\widgets\LinkPager;      //分页

?>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><a href="javascript:void(0);">公司管理</a><span class="crumb-step">&gt;</span><a href="javascript:void(0);">公司属性</a><span class="crumb-step">&gt;</span><span class="crumb-name">融资阶段</span></div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <a href="<?=URL::toRoute('company/period_add')?>"><i class="icon-font"></i>新增阶段</a>
                    <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>已有阶段</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($period as $k=>$v):?>
                    <tr>
                        <td class="tc"><input name="id[]" value="<?=$v['period_id']?>" type="checkbox"></td>
                        <td><?=$v['name']?></td>
                        <td>
                            <a class="link-update" href="#">修改</a>
                            <a class="link-del" href="#">删除</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?=LinkPager::widget(['pagination' => $pagination])?>
            </div>
        </form>
    </div>
</div>