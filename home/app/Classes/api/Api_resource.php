<?php
/**
 * 说明：数组的每个值之间必须使用,间隔
 */
return array(
	//查找用户
	'getUserList'=>array(
	    'query'=>array(
	    	'name'   => 'user',
	    	'select' => 'u_id,username,email',
	    	'where'  => "username,like,%#word#%",
	    	'orderBy'  => 'u_id,desc',
	    	'limit'  => 10,
	    )
	),
	//查找职位一级分类
	'getFirstCate'=>array(
	    'query'=>array(
	    	'name'    => 'position_cate',
	    	'where'   => "parent_id,0",
	    	'orderBy' => 'sort',
	    	'limit'   => 10,
	    )
	),
	//查找职位二、三级分类
	'getSecondCate'=>array(
	    'query'=>array(
	    	'name'    => 'position_cate',
	    	'where'   => "parent_id,#parent_id#",
	    	'orderBy' => 'sort',
	    	'limit'   => 10,
	    )
	),
	//查找热门三级分类
	'getHotCate'=>array(
	    'query'=>array(
	    	'name'    => 'position_cate',
	    	'where'   => "is_hot,1",
	    	'orderBy' => 'sort',
	    	'limit'   => 10,
	    )
	),
	//查找热门职位
	'getHotPosition'=>array(
	    'query'=>array(
	    	'name'    => 'position',
	    	'select'  =>	'experience.name as sname,position.*',
	    	'join'	   =>	'experience,experience.experience_id,position.experience_id',
	    	'where'   => "is_hot,1",
	    	'orderBy' => 'sort,desc',
	    	'limit'   => 10,
	    )
	),
	//查找最新职位
	'getNewPosition'=>array(
	    'query'=>array(
	    	'name'    => 'position',
	    	'select'  =>	'experience.name as sname,position.*',
	    	'join'	   =>	'experience,experience.experience_id,position.experience_id',
	    	'where'   => "is_new,1",
	    	'orderBy' => 'sort,desc',
	    	'limit'   => 10,
	    )
	),

	//根据职位查找公司
	'getCompanyByJob'=>array(
	    'query'=>array(
	    	'name'    => 'company as c',
	    	'select'  =>  'short_name,originator,rec_c.company_id,rec_p.name as pname,rec_s.min,rec_s.max,rec_t.name as tname',
	    	'join1'	   =>   'period as p,p.period_id,c.period_id',
	    	'join2'   =>  'scale as s,s.scale_id,c.scale_id',
	    	//连公司领域
	    	'join3'   =>	'company_territory as ct,ct.company_id,c.company_id',
	    	'join4'   =>	'territory as t,t.territory_id,ct.territory_id',
	    	'where'   =>  "c.company_id,#id#",
	    )
	),
	//根据公司ID查标签
	'getTagByCompanyId'=>array(
		'query'	=>	array(
			'name'	 =>	'company as c',
			'select'=>	'tag_name,c.company_id',
	    	'join5' =>	'company_tag as ctag,ctag.company_id,c.company_id',
	    	'join6' =>	'tag,tag.tag_id,ctag.tag_id',
	    	'where' =>  "c.company_id,#id#",
			)
		),
    //查询登录用户个人信息
    'getUser'=>array(
        'query'=>array(
            'name'=>'user',
            'join'=>'experience as e,user.work_experience,e.experience_id',
            'where'=>'username,#session_username#'
        )
    ),
	//示例
	'getCompanyList' => array(
		'file' => 'Company.php','class' => 'APICompany'
	),
);