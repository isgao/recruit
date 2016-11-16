<?php

use app\assets\AppAsset;

use yii\helpers\Url;
use yii\widgets\LinkPager;      //分页

?>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><a href="javascript:void(0);">管理管理员</a><span class="crumb-step">&gt;</span><span class="crumb-name">管理员列表</span></div>
    </div>

    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <a href="<?=URL::toRoute('admin/admin_add')?>"><i class="icon-font"></i>新增管理员</a>
                    <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>管理员</th>
                        <th>添加时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($admin as $k=>$v):?>
                    <tr>
                        <td class="tc"><input name="id[]" value="<?=$v['admin_id']?>" type="checkbox"></td>
                        <td><?=$v['admin_id']?></td>
                        <td title=""><?=$v['username']?></td>
                        <td><?=$v['add_time']?></td>
                        <td>
                            <?php if($v['status']==0){?>
                                正常
                            <?php }else{?>
                                待审核
                            <?php }?>
                        </td>
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