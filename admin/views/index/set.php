<?php

use app\assets\AppAsset;

use yii\helpers\Url;

?>
<div class="crumb-wrap">
    <div class="crumb-list"><a href="javascript:void(0);">&nbsp;&nbsp;&nbsp;&nbsp;基本设置</a><span class="crumb-step">&gt;</span><span class="crumb-name">网站设置</span></div>
</div>
<div class="config-items">
    <div class="result-content">
    <form action="<?=URL::toRoute('index/save_config');?>" method="post">
        <table class="insert-tab">
            <tbody>
                <tr>
                    <th width="15%"><i class="require-red">*</i>域名：</th>
                    <td><input type="text" id="" value="" size="85" name="url" class="common-text"></td>
                </tr>
                <tr>
                    <th><i class="require-red">*</i>站点标题：</th>
                    <td><input type="text" id="" value="" size="85" name="title" class="common-text"></td>
                </tr>
                <tr>
                    <th><i class="require-red">*</i>关键字：</th>
                    <td><input type="text" id="" value="" size="85" name="keywords" class="common-text"></td>
                </tr>
                <tr>
                    <th><i class="require-red">*</i>描述：</th>
                    <td><input type="text" id="" value="" size="85" name="description" class="common-text"></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交" class="btn btn-primary btn6 mr10">
                        <input type="button" value="返回" onclick="history.go(-1)" class="btn btn6">
                    </td>
                </tr>
            </tbody> 
        </table>
    </form>
    </div>
</div>