<?php

use app\assets\AppAsset;

use yii\helpers\Url;
use yii\widgets\LinkPager;      //分页

?>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><a href="javascript:void(0);">求职者管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">求职者列表</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form action="#" method="post">
                <table class="search-tab">
                    <tr>
                        <th width="120">选择行业   :</th>
                        <td>
                            <select name="search-sort" id="">
                                <option value="">全部</option>
                                <option value="19">精品界面</option><option value="20">推荐界面</option>
                            </select>
                        </td>
                        <th width="70">关键字:</th>
                        <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                        <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc"><input class="allChoose" name="" type="checkbox"></th>
                        <th>用户名</th>
                        <th>联系方式</th>
                        <th>Email</th>
                        <th>学历</th>
                        <th>工作经验</th>
                        <th>住址</th>
                        <th>简介</th>
                        <th>注册时间</th>
                        <th>上一次登录时间</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($user as $k=>$v):?>
                    <tr>
                        <td class="tc"><input name="id[]" value="<?=$v['company_id']?>" type="checkbox"></td>
                        <td></td>
                        <td title=""><a target="_blank" href="#" title=""><?=$v['full_name']?></a>
                        </td>
                        <td><?=$v['site_url']?></td>
                        <td></td>
                        <td><?=$v['brief_intro']?></td>
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