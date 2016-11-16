<?php
use app\assets\AppAsset;

use yii\helpers\Url;
?>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="javascript:void(0)">岗位管理</a><span class="crumb-step">&gt;</span><span class="crumb-step">&gt;</span><span>新增岗位</span></div>
    </div>
    <div class="result-wrap">
        <div class="result-content">
            <form action="<?=URL::toRoute('position/cate_add')?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <tbody>
                        <tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="parent_id" id="catid" class="required">
                                    <option value="0">顶级分类</option>
                                    <?php foreach($parent as $k=>$v):?>
                                        <option value="<?=$v['position_cate_id']?>"><?=$v['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>新增类型：</th>
                            <td>
                                <input class="common-text required" id="title" name="cate" size="20" value="" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red"></i>排序：</th>
                            <td>
                                <input class="common-text required" id="title" name="sort" size="5" value="" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>