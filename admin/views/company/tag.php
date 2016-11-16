<?php

use app\assets\AppAsset;

use yii\helpers\Url;
use yii\widgets\LinkPager;      //分页

?>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><a href="javascript:void(0);">公司管理</a><span class="crumb-step">&gt;</span><a href="javascript:void(0);">公司属性</a><span class="crumb-step">&gt;</span><span class="crumb-name">公司标签</span></div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <a href="<?=URL::toRoute('company/tag_add')?>"><i class="icon-font"></i>新增标签</a>
                    <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab">
                    <tr>
                        <th class="" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>排序</th>
                        <th>标签</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($tag as $k=>$v):?>
                    <tr class="<?=$v['tag_id']?>">
                        <td class="tc"><input name="id[]" value="<?=$v['tag_id']?>" type="checkbox"></td>
                        <td id="<?=$v['tag_id']?>"><?=$v['sort']?></td>
                        <td><span class="tag_name"><?=$v['tag_name']?></span></td>
                        <td>
                            <a class="link-del" href="javascript:void(0);">删除</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?=LinkPager::widget(['pagination' => $pagination])?>
            </div>
        </form>
    </div>
</div>
<script>
    //批删
    $(document).on('click',"#batchDel",function(){
        var i=0;
        var delete_id = new Array();
        $('.tc').each(function(){
            var re = $(this).children().attr("checked");
            //alert(re);
            //console.log(re);
            /*if(){  
                console.log(i++);  
                delete_id[i] = $(this).val();  
            } */ 
        })
       // console.log(delete_id);
    })

    //删除
    $(".link-del").click(function(){
        if(confirm("确定要删除吗？")){
            var id = $(this).parent().parent().attr("class");
            console.log(id);
            var url = "<?=URL::toRoute('company/tag_delete');?>";

            $.get(url,{id:id},function(msg){
                //console.log(msg);
                if(msg == 'ok'){
                    $('.'+id+'').remove();
                }
            })
        }
    })

    //修改成输入框
    /*$(document).on('click',".tag_name",function(){
        var ter_name = $(this).text();
        $(this).parent().html('<input type="text" value="'+ter_name+'" class="accomplish">');
        //console.log(ter_name);
        $(".accomplish").focus();
    })*/

    //失去焦点 保存 显示
    $(document).on('blur',".accomplish",function(){
        var rer_name = $(this).val();
        var id = $(this).parent().attr('id');
        //console.log(id);
        var url="<?=URL::toRoute('company/tag_update')?>";

        $.get(url,{id:id,name:rer_name},function(msg){
            //console.log(msg);
            if(msg == 'ok'){
                var span = '<span class="tag_name">'+rer_name+'</span>';
                //console.log();
                $('#'+id+'').html(span);
               
            }
        })

    })

</script>