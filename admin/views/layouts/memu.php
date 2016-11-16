<?php

use app\assets\AppAsset;

use yii\helpers\Url;

?>

<div class="sidebar" id="sidebar">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="icon-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="icon-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="icon-group"></i>
			</button>

			<button class="btn btn-danger">
				<i class="icon-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- #sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="icon-dashboard"></i>
				<span class="menu-text"> 基本设置 </span>
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?=URL::toRoute('index/index')?>">
						<i class="icon-double-angle-right"></i>
						后台首页
					</a>
				</li>
				<li>
					<a href="<?=URL::toRoute('index/set')?>">
						<i class="icon-double-angle-right"></i>
						网站设置
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="icon-desktop"></i>
				<span class="menu-text"> 公司管理 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="javascript:void(0);" class="dropdown-toggle">
						<i class="icon-double-angle-right"></i>
						公司属性
						<b class="arrow icon-angle-down"></b>
					</a>
				
					<ul class="submenu">
						<li>
							<a href="<?=URL::toRoute('company/period')?>">
								<i class="icon-leaf"></i>
								融资阶段
							</a>
						</li>
						<li>
							<a href="<?=URL::toRoute('company/territory')?>">
								<i class="icon-leaf"></i>
								行业领域
							</a>
						</li>
						<li>
							<a href="<?=URL::toRoute('company/scale')?>">
								<i class="icon-leaf"></i>
								公司规模
							</a>
						</li>
						<li>
							<a href="<?=URL::toRoute('company/tag')?>">
								<i class="icon-leaf"></i>
								公司标签
							</a>
						</li>
						<!-- <li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-pencil"></i>
										
								第四级
								<b class="arrow icon-angle-down"></b>
							</a>
										
							<ul class="submenu">
								<li>
									<a href="#">
										<i class="icon-plus"></i>
										添加产品
									</a>
								</li>
										
								<li>
									<a href="#">
										<i class="icon-eye-open"></i>
										查看商品
									</a>
								</li>
							</ul>
						</li> -->
					</ul>
				</li> 
				<li>
					<a href="<?=URL::toRoute('company/index')?>">
						<i class="icon-double-angle-right"></i>
						公司列表
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<i class="icon-double-angle-right"></i>
						待审核
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="icon-list"></i>
				<span class="menu-text"> 岗位管理 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?=URL::toRoute('position/position')?>">
						<i class="icon-double-angle-right"></i>
						岗位列表
					</a>
				</li>

				<li>
					<a href="<?=URL::toRoute('position/cate')?>">
						<i class="icon-double-angle-right"></i>
						岗位类型
					</a>
				</li>

				<li>
					<a href="javascript:void(0);" class="dropdown-toggle">
						<i class="icon-double-angle-right"></i>
						<span class="menu-text"> 岗位要求 </span>

						<b class="arrow icon-angle-down"></b>
					</a>

					<ul class="submenu">
						<li>
							<a href="<?=URL::toRoute('position/experience')?>">
								<i class="icon-leaf"></i>
								工作经验
							</a>
						</li>
						<li>
							<a href="<?=URL::toRoute('position/education')?>">
								<i class="icon-leaf"></i>
								教育经历
							</a>
						</li>
						<li>
							<a href="<?=URL::toRoute('position/salary')?>">
								<i class="icon-leaf"></i>
								期望薪资
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<i class="icon-leaf"></i>
								工作性质
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="icon-edit"></i>
				<span class="menu-text"> 求职者管理 </span>
			
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?=URL::toRoute('user/user_list')?>">
						<i class="icon-double-angle-right"></i>
						求职者列表
					</a>
				</li>
				<li>
					<a href="<?=URL::toRoute('resume/resume_list')?>">
						<i class="icon-double-angle-right"></i>
						简历列表
					</a>
				</li>
			</ul>
		</li>
<!-- 
		<li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="icon-list-alt"></i>
				<span class="menu-text"> 简历管理 </span>
			
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				
			</ul>
		</li> -->

		<!-- <li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="icon-file-alt"></i>
				<span class="menu-text"> 日志管理 </span>
			
				<b class="arrow icon-angle-down"></b>
			</a>
		
			<ul class="submenu">
				<li>
					<a href="javascript:void(0);">
						<i class="icon-double-angle-right"></i>
						日志列表
					</a>
				</li>
			</ul>
		</li> -->

		<li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="icon-tag"></i>
				<span class="menu-text"> 网站管理员 </span>
			
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?=URL::toRoute('admin/admin_list')?>">
						<i class="icon-double-angle-right"></i>
						管理员列表
					</a>
				</li>
			</ul>
		</li>
		
		<li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="icon-file-alt"></i>
				<span class="menu-text"> 其他 </span>
			
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="javascript:void(0);">
						<i class="icon-double-angle-right"></i>
						客服
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<i class="icon-double-angle-right"></i>
						反馈
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<i class="icon-double-angle-right"></i>
						回收站
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:void(0);" class="dropdown-toggle">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="menu-text"> 更多功能陆续上线中 </span>
			</a>
		</li>
	</ul><!-- /.nav-list -->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>