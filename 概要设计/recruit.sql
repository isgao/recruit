/*
Navicat MySQL Data Transfer

Source Server         : stone
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : recruit

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2016-11-05 09:25:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for rec_admin
-- ----------------------------
DROP TABLE IF EXISTS `rec_admin`;
CREATE TABLE `rec_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for rec_areas
-- ----------------------------
DROP TABLE IF EXISTS `rec_areas`;
CREATE TABLE `rec_areas` (
  `area_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL COMMENT '上一级的id值',
  `area_name` varchar(50) NOT NULL COMMENT '地区名称',
  `sort` int(10) unsigned NOT NULL DEFAULT '99' COMMENT '排序',
  PRIMARY KEY (`area_id`),
  KEY `parent_id` (`parent_id`),
  KEY `sort` (`sort`)
) ENGINE=InnoDB AUTO_INCREMENT=659004403 DEFAULT CHARSET=utf8 COMMENT='地区信息';

-- ----------------------------
-- Table structure for rec_collection
-- ----------------------------
DROP TABLE IF EXISTS `rec_collection`;
CREATE TABLE `rec_collection` (
  `u_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='收藏表';

-- ----------------------------
-- Table structure for rec_company
-- ----------------------------
DROP TABLE IF EXISTS `rec_company`;
CREATE TABLE `rec_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(100) DEFAULT NULL COMMENT '简称',
  `full_name` varchar(255) DEFAULT NULL COMMENT '全称',
  `logo` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `scale_id` int(11) DEFAULT NULL COMMENT '规模ID',
  `period_id` smallint(2) DEFAULT NULL COMMENT '发展阶段（融资）ID',
  `brief_intro` varchar(255) DEFAULT NULL,
  `intro` text,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for rec_company_tag
-- ----------------------------
DROP TABLE IF EXISTS `rec_company_tag`;
CREATE TABLE `rec_company_tag` (
  `company_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for rec_company_territory
-- ----------------------------
DROP TABLE IF EXISTS `rec_company_territory`;
CREATE TABLE `rec_company_territory` (
  `company_id` int(11) NOT NULL,
  `territory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行业领域表 与 公司表 的衍生表';

-- ----------------------------
-- Table structure for rec_education
-- ----------------------------
DROP TABLE IF EXISTS `rec_education`;
CREATE TABLE `rec_education` (
  `edu_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL COMMENT '简历ID',
  `school_name` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL COMMENT '专业',
  `degree` char(10) DEFAULT NULL COMMENT '学历 1大专 2本科 3硕士 4博士',
  `graduate_year` mediumint(4) DEFAULT NULL COMMENT '毕业年份',
  PRIMARY KEY (`edu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教育经历';

-- ----------------------------
-- Table structure for rec_experience
-- ----------------------------
DROP TABLE IF EXISTS `rec_experience`;
CREATE TABLE `rec_experience` (
  `experience_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`experience_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='工作经验时长';

-- ----------------------------
-- Table structure for rec_founder
-- ----------------------------
DROP TABLE IF EXISTS `rec_founder`;
CREATE TABLE `rec_founder` (
  `founder_id` smallint(8) NOT NULL,
  `company_id` int(11) DEFAULT NULL COMMENT '公司ID',
  `name` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`founder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='创始团队';

-- ----------------------------
-- Table structure for rec_internship
-- ----------------------------
DROP TABLE IF EXISTS `rec_internship`;
CREATE TABLE `rec_internship` (
  `internship_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL COMMENT '简历ID',
  `company_name` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `date_start` date DEFAULT NULL COMMENT '在职时间开始',
  `date_end` date DEFAULT NULL COMMENT '在职时间结束',
  `job_intro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`internship_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for rec_investor
-- ----------------------------
DROP TABLE IF EXISTS `rec_investor`;
CREATE TABLE `rec_investor` (
  `investor_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL COMMENT '公司ID',
  `period_id` int(11) DEFAULT NULL COMMENT '发展阶段（融资类型）ID',
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`investor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='投资机构';

-- ----------------------------
-- Table structure for rec_period
-- ----------------------------
DROP TABLE IF EXISTS `rec_period`;
CREATE TABLE `rec_period` (
  `period_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司发展阶段（融资情况）';

-- ----------------------------
-- Table structure for rec_position
-- ----------------------------
DROP TABLE IF EXISTS `rec_position`;
CREATE TABLE `rec_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `position_cate_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL COMMENT '公司ID',
  `department` varchar(100) DEFAULT NULL COMMENT '所属部门',
  `position_type` tinyint(1) DEFAULT NULL COMMENT '职位特性 0兼职 1全职 2实习',
  `salary_min` int(11) DEFAULT NULL COMMENT '最低薪水',
  `salary_max` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `experience_id` smallint(11) DEFAULT NULL COMMENT '经验',
  `degree` char(10) DEFAULT NULL,
  `brief_intro` varchar(255) DEFAULT NULL COMMENT '简介',
  `intro` text,
  PRIMARY KEY (`position_id`),
  KEY `position_cate_id` (`position_cate_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for rec_position_cate
-- ----------------------------
DROP TABLE IF EXISTS `rec_position_cate`;
CREATE TABLE `rec_position_cate` (
  `position_cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`position_cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='职位分类';

-- ----------------------------
-- Table structure for rec_product
-- ----------------------------
DROP TABLE IF EXISTS `rec_product`;
CREATE TABLE `rec_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL COMMENT '公司ID',
  `poster` varchar(255) DEFAULT NULL COMMENT '海报',
  `name` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司产品';

-- ----------------------------
-- Table structure for rec_project
-- ----------------------------
DROP TABLE IF EXISTS `rec_project`;
CREATE TABLE `rec_project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL COMMENT '简历ID',
  `name` varchar(100) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL COMMENT '项目链接',
  `job_duty` varchar(255) DEFAULT NULL COMMENT '项目所负职责',
  `intro` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='项目经验';

-- ----------------------------
-- Table structure for rec_resume
-- ----------------------------
DROP TABLE IF EXISTS `rec_resume`;
CREATE TABLE `rec_resume` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `position_type` tinyint(1) DEFAULT NULL COMMENT '职位特性 0兼职 1全职 2实习',
  `position` varchar(100) DEFAULT NULL COMMENT '求职岗位',
  `position_city` varchar(100) DEFAULT NULL,
  `salary_id` tinyint(1) DEFAULT NULL COMMENT '薪水ID',
  `askfor` text COMMENT '职位的补充说明',
  `resume_status` tinyint(1) DEFAULT NULL COMMENT '简历状态 0未投递 1已投递 2查看中 3通过筛选 4面试 5不合适',
  `user_status` tinyint(1) DEFAULT NULL COMMENT '求职者状态    0目前离职，可入岗        1在职，考虑跳槽       2不想找工作   3应届生',
  `intro` text COMMENT '自己介绍描述',
  PRIMARY KEY (`r_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `rec_resume_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `rec_user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='简历表';

-- ----------------------------
-- Table structure for rec_salary
-- ----------------------------
DROP TABLE IF EXISTS `rec_salary`;
CREATE TABLE `rec_salary` (
  `salary_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `min` int(11) DEFAULT NULL COMMENT '最低薪水',
  `max` int(11) DEFAULT NULL COMMENT '最高薪水',
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`salary_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='薪水表';

-- ----------------------------
-- Table structure for rec_scale
-- ----------------------------
DROP TABLE IF EXISTS `rec_scale`;
CREATE TABLE `rec_scale` (
  `scale_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `min` int(11) DEFAULT NULL COMMENT '员工最少人数',
  `max` varchar(255) DEFAULT NULL COMMENT '员工最多人数',
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`scale_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司规模';

-- ----------------------------
-- Table structure for rec_skill
-- ----------------------------
DROP TABLE IF EXISTS `rec_skill`;
CREATE TABLE `rec_skill` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL COMMENT '简历ID',
  `name` varchar(100) DEFAULT NULL,
  `level` tinyint(1) DEFAULT '0' COMMENT '技能强度   0了解    1熟悉    2掌握    3精通    4专家',
  PRIMARY KEY (`skill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='技能自评';

-- ----------------------------
-- Table structure for rec_tag
-- ----------------------------
DROP TABLE IF EXISTS `rec_tag`;
CREATE TABLE `rec_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `tag_name` varchar(100) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='标签';

-- ----------------------------
-- Table structure for rec_territory
-- ----------------------------
DROP TABLE IF EXISTS `rec_territory`;
CREATE TABLE `rec_territory` (
  `territory_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`territory_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行业领域';

-- ----------------------------
-- Table structure for rec_user
-- ----------------------------
DROP TABLE IF EXISTS `rec_user`;
CREATE TABLE `rec_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0未锁定  1锁定  2回收站',
  `head_ico` varchar(255) DEFAULT NULL,
  `degree` char(10) DEFAULT '0' COMMENT '学历 0不限 1大专 2本科 3硕士 4博士',
  `work_experience` tinyint(1) DEFAULT NULL COMMENT '工作经验ID',
  `qq` int(11) DEFAULT NULL,
  `province` int(11) DEFAULT NULL COMMENT '省ID',
  `city` int(11) DEFAULT NULL COMMENT '市ID',
  `area` int(11) DEFAULT NULL COMMENT '区ID',
  `address` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `intro` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL COMMENT '注册时间',
  `last_login` datetime DEFAULT NULL COMMENT '上一次登录时间',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='求职者表';

-- ----------------------------
-- Table structure for rec_works
-- ----------------------------
DROP TABLE IF EXISTS `rec_works`;
CREATE TABLE `rec_works` (
  `works_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL COMMENT '简历ID',
  `title` varchar(100) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '作品状态 0离线 1在线',
  `intro` text COMMENT '作品描述',
  PRIMARY KEY (`works_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='个人作品';
