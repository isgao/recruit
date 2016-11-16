<?php

use app\assets\AppAsset;

use yii\helpers\Url;

?>

<div class="main-container" id="main-container">
	<script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>

	<div class="main-container-inner">
		<a class="menu-toggler" id="menu-toggler" href="#">
			<span class="menu-text"></span>
		</a>

		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">
					try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
				</script>

				<ul class="breadcrumb">
					<li>
						<i class="icon-home home-icon"></i>
						<a href="javascript:void(0);">首页</a>
					</li>
					<li class="active">控制台</li>
				</ul><!-- .breadcrumb -->
			</div>
		</div><!-- /.main-content -->
		
		<table width="26%" cellspacing="0" cellpadding="5" class="border_table_org" style="float:left">
			<thead>
				<tr><th>系统信息</th></tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<table class="list_table2" width="100%">
							<colgroup>
								<col width="80px" />
								<col />
							</colgroup>
							<tbody>
								
								<tr><th>当前版本号</th><td></td></tr>
								<tr><th>最新版本号</th><td></td></tr>
								<tr><th>官网地址</th><td><a href='http://www.jooyea.cn' target='_blank'><b class='red3'>www.jooyea.cn</b></a></td></tr>
								<tr><th>服务器软件</th><td></td></tr>
								<tr><th>附件上传容量</th><td></td></tr>
								<tr><th>授权信息</th><td><b class="green">授权商业版本</b><b class="red2">非授权版本</b></td></tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>

		<table width="27%" cellspacing="0" cellpadding="5" class="border_table_org" style="float:left">
			<thead>
				<tr><th>基础统计</th></tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<table class="list_table2" width="100%">
							<colgroup>
								<col width="80px" />
								<col />
							</colgroup>
							<tbody>
								<tr><th>商家数量</th><td><a href="{url:/member/seller_list}"><b class="f14 red3"></b> 家</a></td></tr>
								<tr><th>销售总额</th><td><a href="{url:/market/amount}"><b class="f14 red3"></b> 元</a></td></tr>
								<tr><th>注册用户</th><td><a href="{url:/member/member_list}"><b class="f14 red3"></b> 个</a></td></tr>
								<tr><th>产品数量</th><td><a href="{url:/goods/goods_list}"><b class="f14 red3"></b> 个</a></td></tr>
								<tr><th>品牌数量</th><td><a href="{url:/brand/brand_list}"><b class="f14 red3"></b> 个</a></td></tr>
								<tr><th>订单数量</th><td><a href="{url:/order/order_list}"><b class="f14 red3"></b> 个</a></td></tr>
								<tr><th>库存预警</th><td><a href="javascript:formSubmit('storeNumWarning');"><b class="f14 red3"></b> 个</a></td></tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>

		<table width="25%" cellspacing="0" cellpadding="5" class="border_table_org" style="float:left">
			<thead>
				<tr><th>待处理</th></tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<table class="list_table2" width="100%">
							<colgroup>
								<col width="80px" />
								<col />
							</colgroup>
		
							<tbody>
								<tr><th>待回复评论</th><td><a href="{url:/comment/comment_list/search[c.recomment_time]/=0}"><b class="red3 f14"></b></a> 个</td></tr>
								<tr><th>待回复建议</th><td><a href='{url:/comment/suggestion_list/search[a.re_time=]/0}'><b class="red3 f14"></b></a> 个</td></tr>
								<tr><th>待回复咨询</th><td><a href="{url:/comment/refer_list/search[r.status=]/0}"><b class="red3 f14"></b></a> 个</td></tr>
								<tr><th>未发货订单</th><td><a href="{url:/order/order_list/search[distribution_status]/0}"><b class="f14 red3"></b></a> 个</td></tr>
								<tr><th>退款申请</th><td><a href="{url:/order/refundment_list}"><b class="red3 f14"></b></a> 个</td></tr>
								<tr><th>待审商家</th><td><a href="{url:/member/seller_list/search[is_lock=]/1}"><b class="red3 f14"></b></a> 个</td></tr>
								<tr><th>待审商品</th><td><a href="{url:/goods/goods_list/search[is_del]/3}"><b class="red3 f14"></b></a> 个</td></tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!-- 皮肤设置 -->
		<div class="ace-settings-container" id="ace-settings-container">
			<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
				<i class="icon-cog bigger-150"></i>
			</div>

			<div class="ace-settings-box" id="ace-settings-box">
				<div>
					<div class="pull-left">
						<select id="skin-colorpicker" class="hide">
							<option data-skin="default" value="#438EB9">#438EB9</option>
							<option data-skin="skin-1" value="#222A2D">#222A2D</option>
							<option data-skin="skin-2" value="#C6487E">#C6487E</option>
							<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
						</select>
					</div>
					<span>&nbsp; 选择皮肤</span>
				</div>

				<div>
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
					<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
				</div>

				<div>
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
					<label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
				</div>

				<div>
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
					<label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
				</div>

				<div>
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
					<label class="lbl" for="ace-settings-rtl">切换到左边</label>
				</div>

				<div>
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
					<label class="lbl" for="ace-settings-add-container">
						切换窄屏
						<b></b>
					</label>
				</div>
			</div>
		</div><!-- /#ace-settings-container -->
	</div><!-- /.main-container-inner -->
	
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="icon-double-angle-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->

