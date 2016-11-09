

<?php $__env->startSection('title', '请输入此页面title'); ?>

<?php $__env->startSection('content'); ?>
	<div id="sidebar">
		<!--导航分类 start-->
		<div class="mainNavs">
					
			<div class="menu_box">
				<div class="menu_main">
					<h2>技术 <span></span></h2>
					<a href="h/jobs/list_Java?labelWords=label">Java</a>
					<a href="h/jobs/list_PHP?labelWords=label">PHP</a>
					<a href="h/jobs/list_C?labelWords=label">C</a>
					<a href="h/jobs/list_C++?labelWords=label">C++</a>
					<a href="h/jobs/list_Android?labelWords=label">Android</a>
					<a href="h/jobs/list_iOS?labelWords=label">iOS</a>
					<a href="h/jobs/list_前端开发?labelWords=label">前端开发</a>
					<a href="h/jobs/list_测试?labelWords=label">测试</a>
					<a href="h/jobs/list_技术经理?labelWords=label">技术经理</a>
					<a href="h/jobs/list_项目经理?labelWords=label">项目经理</a>
					<a href="h/jobs/list_架构师?labelWords=label">架构师</a>
				</div>
				<div class="menu_sub dn">
				   	<dl class="reset">
				        <dt><a href="h/jobs/list_后端开发?labelWords=label"></a></dt>
					    <dd><a href="h/jobs/list_Java?labelWords=label">Java</a>
						    <a href="h/jobs/list_C%2B%2B?labelWords=label">C++</a>
						    <a href="h/jobs/list_PHP?labelWords=label">PHP</a>
						    <a href="h/jobs/list_Node.js?labelWords=label">Node.js</a>
						</dd>
				    </dl>
					<dl class="reset">
				        <dt><a href="h/jobs/list_移动开发?labelWords=label"></a></dt>
					    <dd><a href="h/jobs/list_HTML5?labelWords=label">HTML5</a>
						    <a href="h/jobs/list_Android?labelWords=label">Android</a>
						</dd>
				    </dl>
				</div>
			</div>
			
			<div class="menu_box">
				<div class="menu_main">
					<h2>职能 <span></span></h2>
					<a href="h/jobs/list_HR?labelWords=label">HR</a>
			        <a href="h/jobs/list_行政?labelWords=label">行政</a>
			        <a href="h/jobs/list_会计?labelWords=label">会计</a>
			        <a href="h/jobs/list_出纳?labelWords=label">出纳</a>
			    </div>
				<div class="menu_sub dn">
				   	<dl class="reset">
				        <dt><a href="h/jobs/list_人力资源?labelWords=label"></a></dt>
					    <dd>
							<a href="h/jobs/list_%E4%BA%BA%E5%8A%9B%E8%B5%84%E6%BA%90?labelWords=label">人力资源</a>
							<a href="h/jobs/list_%E6%8B%9B%E8%81%98?labelWords=label">招聘</a>
							<a href="h/jobs/list_%E7%BB%A9%E6%95%88%E8%80%83%E6%A0%B8%E7%BB%8F%E7%90%86?labelWords=label">绩效考核经理</a>
						</dd>
				    </dl>
				</div>
			</div>
		</div>
		<!--导航分类 end-->
		<a class="subscribe" href="subscribe.html" target="_blank">订阅职位</a>
	</div>

	<div class="content">
	    <div id="search_box">
			<form id="searchForm" name="searchForm" action="list.html" method="get">
		        <ul id="searchType">
		        	<li data-searchtype="1" class="type_selected">职位</li>
		        	<li data-searchtype="4">公司</li>
		        </ul>
		        <div class="searchtype_arrow"></div>
		        <input type="text" id="search_input" name = "kd"  tabindex="1" value=""  placeholder="请输入职位名称，如：产品经理"  />
		        <input type="hidden" name="spc" id="spcInput" value=""/>
		        <input type="hidden" name="pl" id="plInput" value=""/>
		        <input type="hidden" name="gj" id="gjInput" value=""/>
		        <input type="hidden" name="xl" id="xlInput" value=""/>
		        <input type="hidden" name="yx" id="yxInput" value=""/>
		        <input type="hidden" name="gx" id="gxInput" value="" />
		        <input type="hidden" name="st" id="stInput" value="" />
		        <input type="hidden" name="labelWords" id="labelWords" value="" />
		        <input type="hidden" name="lc" id="lc" value="" />
		        <input type="hidden" name="workAddress" id="workAddress" value=""/>
		                <input type="hidden" name="city" id="cityInput" value=""/>
		                <input type="submit" id="search_button" value="搜索" />
	    	</form>
		</div>
		<style>
			.ui-autocomplete{width:488px;background:#fafafa !important;position: relative;z-index:10;border: 2px solid #91cebe;}
			.ui-autocomplete-category{font-size:16px;color:#999;width:50px;position: absolute;z-index:11; right: 0px;/*top: 6px; */text-align:center;border-top: 1px dashed #e5e5e5;padding:5px 0;}
			.ui-menu-item{ *width:439px;vertical-align: middle;position: relative;margin: 0px;margin-right: 50px !important;background:#fff;border-right: 1px dashed #ededed;}
			.ui-menu-item a{display:block;overflow:hidden;}
		</style>
		<script type="text/javascript" src="style/js/search.min.js"></script>

		<dl class="hotSearch">
			<dt>热门搜索：</dt>
			<dd><a href="list.htmlJava?labelWords=label&city=">Java</a></dd>
			<dd><a href="list.htmlPHP?labelWords=label&city=">PHP</a></dd>
			<dd><a href="list.htmlAndroid?labelWords=label&city=">Android</a></dd>
			<dd><a href="list.htmliOS?labelWords=label&city=">iOS</a></dd>
			<dd><a href="list.html前端?labelWords=label&city=">前端</a></dd>
			<dd><a href="list.html产品经理?labelWords=label&city=">产品经理</a></dd>
			<dd><a href="list.htmlUI?labelWords=label&city=">UI</a></dd>
			<dd><a href="list.html运营?labelWords=label&city=">运营</a></dd>
			<dd><a href="list.htmlBD?labelWords=label&city=">BD</a></dd>
			<dd><a href="list.html?gx=实习&city=">实习</a></dd>
		</dl>

		<div id="home_banner">
	        <ul class="banner_bg">
	        	<li  class="banner_bg_3" >
	                <a href="#" target="_blank">
	                	<img src="style/images/d03110162390422bb97cebc7fd2ab586.jpg" width="612" height="160" alt="出北京记——第一站厦门" /></a>
	            </li>
	        </ul>
	        <div class="banner_control">
	            <em></em> 
	            <ul class="thumbs">
	            	<li  class="thumbs_1 current" >
	                    <i></i>
	                    <img src="style/images/4469b1b83b1f46c7adec255c4b1e4802.jpg" width="113" height="42" />
	                </li>
	                <li  class="thumbs_2" >
	                	<i></i>
	                    <img src="style/images/381b343557774270a508206b3a725f39.jpg" width="113" height="42" />
	                </li>
	                <li  class="thumbs_3" >
	                    <i></i>
	                    <img src="style/images/354d445c5fd84f1990b91eb559677eb5.jpg" width="113" height="42" />
	                </li>
	            </ul>
	        </div>
	    </div><!--/#main_banner-->
		
		<ul id="da-thumbs" class="da-thumbs">
	    	<li>
	    		<a href="h/c/1650.html" target="_blank">
	    		<img src="style/images/a254b11ecead45bda166afa8aaa9c8bc.jpg" width="113" height="113" alt="联想" />
	                    <div class="hot_info">
	                    	<h2 title="联想">联想</h2>
	                        <em></em>
	                        <p title="世界因联想更美好">
	                        	世界因联想更美好
	                        </p>
	                    </div>
	            </a>
	        </li>
	    </ul>
	    
	    <ul class="reset hotabbing">
	    	<li class="current">热门职位</li>
	    	<li>最新职位</li>
	    </ul>

	    <div id="hotList">
	        <ul class="hot_pos reset">
	        	<li class="clearfix">
	        		<div class="mb10">
		                <a href="h/jobs/147822.html" target="_blank">运营总监</a>&nbsp;<span class="c9">[北京]</span>
		            </div>
	                <span><em class="c7">月薪： </em>15k-20k</span>
	                <span><em class="c7">经验：</em> 3-5年</span>
	                <span><em class="c7">最低学历： </em>本科</span>
	                <br />
	                <span><em class="c7">职位诱惑：</em>发展前景</span>
	                <br />
	                <span>1天前发布</span>
	                <!-- <a  class="wb">分享到微博</a> -->

		    		<div class="hot_pos_r">
			            <div class="mb10 recompany"><a href="h/c/399.html" target="_blank">节操精选</a></div>
			            <span><em class="c7">领域：</em> 移动互联网</span>
			            <span><em class="c7">创始人：</em>陈桦</span><br />
			            <span><em class="c7">阶段：</em> 初创型(天使轮)</span>
			            <span><em class="c7">规模：</em>少于15人</span>
		            </div>
		        </li>

	            <li class="odd clearfix">
	            	<div class="mb10">
		                <a href="h/jobs/147974.html" target="_blank">售前工程师（运维经验优先）</a> 
		                            &nbsp;<span class="c9">[北京]</span>
		            </div>
	                <span><em class="c7">月薪： </em>6k-12k</span>
	                <span><em class="c7">经验：</em> 3-5年</span>
	                <span><em class="c7">最低学历： </em>大专</span>
	                <br />
	                <span><em class="c7">职位诱惑：</em>五险一金+商业保险+带薪年假+奖金等</span>
	                <br />
	                <span>1天前发布</span>
	                <!-- <a  class="wb">分享到微博</a> -->

		            <div class="hot_pos_r">
		                <div class="mb10 recompany"><a href="h/c/5232.html" target="_blank">监控宝</a></div>
		                <span><em class="c7">领域：</em> 云计算\大数据</span><br />
		                <span><em class="c7">阶段：</em> 成长型(A轮)</span>
		                <span><em class="c7">规模：</em>50-150人</span>
		                <li>五险一金</li>
		            </div>
		        </li>
	        
	        	<li class="clearfix">
	            	<div class="hot_pos_l">
		                <div class="mb10">
		                    <a href="h/jobs/91655.html" target="_blank">市场策划经理-线上活动-北京-02267</a>&nbsp;<span class="c9">[北京]</span>
		                </div>
	                    <span><em class="c7">月薪： </em>10k-15k</span>
	                    <span><em class="c7">经验：</em>5-10年</span>
	                    <span><em class="c7">最低学历：</em> 本科</span>
	                    <br />
	                    <span><em class="c7">职位诱惑：</em>六险一金，饭补，班车，晋升机制，氛围好</span>
	                    <br />
	                    <span>14:16发布</span>
	                    <!-- <a  class="wb">分享到微博</a> -->
		            </div>

		            <div class="hot_pos_r">
		                <div class="mb10"><a href="h/c/8143.html" target="_blank">途家网</a></div>
		                <span><em class="c7">领域：</em> 移动互联网,O2O</span>
		                <span><em class="c7">创始人：</em>罗军</span><br />
	                    <span> <em class="c7">阶段： </em>成长型(B轮)</span>
	                    <span> <em class="c7">规模：</em>500-2000人</span>
		            </div>
		        </li>

	            <a href="list.html?city=%E5%85%A8%E5%9B%BD" class="btn fr" target="_blank">查看更多</a>
	        </ul>
	    </div>

		<div class="clear"></div>
		<div id="linkbox">
		    <dl>
		        <dt>友情链接</dt>
		        <dd>
		        		<a href="http://www.zhuqu.com/" target="_blank">住趣家居网</a> <span>|</span>
		        		<a href="http://www.woshipm.com/" target="_blank">人人都是产品经理</a> <span>|</span>
		        		<a href="http://zaodula.com/" target="_blank">互联网er的早读课</a> <span>|</span>
		                <a href="http://lieyunwang.com/" target="_blank">猎云网</a> <span>|</span>
		        		<a href="http://www.ucloud.cn/" target="_blank">UCloud</a> <span>|</span>
		          		<a href="http://www.iconfans.com/" target="_blank">iconfans</a>  <span>|</span>
		          		<a href="http://www.html5dw.com/" target="_blank">html5梦工厂</a>   <span>|</span>
		          		<a href="http://www.sykong.com/" target="_blank">手游那点事</a> 
		          		
		          		<a href="http://www.mycodes.net/" target="_blank">源码之家</a> <span>|</span>
		          		<a href="http://www.uehtml.com/" target="_blank">uehtml</a> <span>|</span>
		          		<a href="http://www.w3cplus.com/" target="_blank">W3CPlus</a> <span>|</span>
		          		<a href="http://www.boxui.com/" target="_blank">盒子UI</a> <span>|</span>
		          		<a href="http://www.uimaker.com/" target="_blank">uimaker</a> <span>|</span>
		          		<a href="http://www.yixieshi.com/" target="_blank">互联网的一些事</a> <span>|</span>
		          		<a href="http://www.chuanke.com/" target="_blank">传课网</a> <span>|</span>
		          		<a href="http://www.eoe.cn/" target="_blank">安卓开发</a> <span>|</span>
		          		<a href="http://www.eoeandroid.com/" target="_blank">安卓开发论坛</a> 
		          		<a href="http://hao.360.cn/" target="_blank" >360安全网址导航</a> <span>|</span>
		          		<a href="http://se.360.cn/" target="_blank" >360安全浏览器</a> <span>|</span>
		          		<a href="http://www.hao123.com/" target="_blank" >hao123上网导航</a> <span>|</span>
		          		<a href="http://www.ycpai.com" target="_blank" >互联网创业</a><span>|</span>
		          		<a href="http://www.zhongchou.cn" target="_blank" >众筹网</a><span>|</span>
		          		<a href="http://www.marklol.com/" target="_blank" >马克互联网</a><span>|</span>
		          		<a href="http://www.chaohuhr.com/" target="_blank" >巢湖英才网</a>
		          		
		          		<a href="http://www.zhubajie.com/" target="_blank" >创意服务外包</a><span>|</span>
		          		<a href="http://www.thinkphp.cn/" target="_blank" >thinkphp</a><span>|</span>
		          		<a href="http://www.chuangxinpai.com/" target="_blank" >创新派</a><span>|</span>

		          		<a href="http://w3cshare.com/" target="_blank" >W3Cshare</a><span>|</span>
		          		<a href="http://www.518lunwen.cn/" target="_blank" >论文发表网</a><span>|</span>
		          		<a href="http://www.199it.com" target="_blank" >199it</a><span>|</span>

		          		<a href="http://www.shichangbu.com" target="_blank" >市场部网</a><span>|</span>
		          		<a href="http://www.meitu.com/" target="_blank" >美图公司</a><span>|</span>
		          		<a href="https://www.teambition.com/" target="_blank" >Teambition</a>
		          		<a href="http://oupeng.com/" target="_blank" >欧朋浏览器</a><span>|</span>
		          		<a href="http://iwebad.com/" target="_blank">网络广告人社区</a>
		          		<a href="h/af/flink.html" target="_blank" class="more">更多</a>
		        </dd>
		    </dl>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>