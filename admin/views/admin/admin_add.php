<?php
use app\assets\AppAsset;

use yii\helpers\Url;
?>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="javascript:void(0)">管理管理员</a><span class="crumb-step">&gt;</span><span class="crumb-step">&gt;</span><span>新增管理员</span></div>
    </div>
    <div class="result-wrap">
        <div class="result-content">
            <form action="<?=URL::toRoute('admin/admin_add')?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <tbody>
                        <tr>
                            <th><i class="require-red">*</i>账号：</th>
                            <td>
                                <input class="common-text required" id="title" name="username" size="20" value="" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>密码：</th>
                            <td>
                                <input class="common-text required" id="password1" name="password1" size="20" value="" type="password">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>确认密码：</th>
                            <td>
                                <input class="common-text required" id="password2" name="password2" size="20" value="" type="password">
                                <span id="hint"></span>
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
<script>
    $(document).on('blur','#password2',function(){
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();

        if(password2!=password1){
            $('#hint').html('<font color="red">*密码必须保持一致！</font>');
        }else{
            $('#hint').html('<font color="red"> </font>');
        }
    })
</script>