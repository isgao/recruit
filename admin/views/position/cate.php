<?php

use app\assets\AppAsset;

use yii\helpers\Url;
use yii\widgets\LinkPager;      //分页

?>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><a href="javascript:void(0);">岗位管理</a><span class="crumb-step">&gt;</span><span class="crumb-step">&gt;</span><span class="crumb-name">岗位类型</span></div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <a href="<?=URL::toRoute('position/cate_add')?>"><i class="icon-font"></i>新增类型</a>
                    <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab">
                    <tr>
                        <th class="" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>岗位类型</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($cate as $k=>$v):?>
                    <tr id="<?=$v['position_cate_id']?>">
                        <!-- <td><input class="tiny" id="s{$item['id']}" size="2" type="text" onblur="toSort({$item['id']});" value="{$item['sort']}" /></td> -->
                        <td></td>
                        <td><?=$v['name']?></td>
                        <td>
                            <a href=""><img class="operator" src="" alt="修改" title="修改" /></a>
                            <a href="javascript:void(0)" onclick="delModel({link:'{url:/goods/category_del/cid/$item[id]}'})"><img class="operator" src="" alt="删除" title="删除" /></a>
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
            var url = "<?=URL::toRoute('company/cate_delete');?>";

            $.get(url,{id:id},function(msg){
                //console.log(msg);
                if(msg == 'ok'){
                    $('.'+id+'').remove();
                }
            })
        }
    })

    //修改成输入框
    /*$(document).on('click',".cate_name",function(){
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
        var url="<?=URL::toRoute('company/cate_update')?>";

        $.get(url,{id:id,name:rer_name},function(msg){
            //console.log(msg);
            if(msg == 'ok'){
                var span = '<span class="cate_name">'+rer_name+'</span>';
                //console.log();
                $('#'+id+'').html(span);
               
            }
        })

    })

</script>