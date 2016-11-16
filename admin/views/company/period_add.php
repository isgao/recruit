<?php
use app\assets\AppAsset;

use yii\helpers\Url;
?>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="javascript:void(0)">公司管理</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="javascript:void(0)">公司属性</a><span class="crumb-step">&gt;</span><span>新增阶段</span></div>
    </div>
    <div class="result-wrap">
        <div class="result-content">
            <form action="<?=URL::toRoute('company/period_add')?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <tbody>
                        <tr>
                            <th><i class="require-red">*</i>阶段名称：</th>
                            <td>
                                <input class="common-text required" id="title" name="title" size="50" value="" type="text">
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