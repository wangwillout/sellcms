/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : sellcms

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-15 18:13:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('管理员', '1', '1468560574');
INSERT INTO `auth_assignment` VALUES ('编辑', '4', '1468564138');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1468487046', '1468487046');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/create', '2', null, null, null, '1468544834', '1468544834');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/admin/user/update', '2', null, null, null, '1468550778', '1468550778');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1468487047', '1468487047');
INSERT INTO `auth_item` VALUES ('/coach/*', '2', null, null, null, '1468486990', '1468486990');
INSERT INTO `auth_item` VALUES ('/coach/coach/*', '2', null, null, null, '1468486988', '1468486988');
INSERT INTO `auth_item` VALUES ('/coach/coach/create', '2', null, null, null, '1468486982', '1468486982');
INSERT INTO `auth_item` VALUES ('/coach/coach/delete', '2', null, null, null, '1468486985', '1468486985');
INSERT INTO `auth_item` VALUES ('/coach/coach/index', '2', null, null, null, '1468486978', '1468486978');
INSERT INTO `auth_item` VALUES ('/coach/coach/update', '2', null, null, null, '1468486984', '1468486984');
INSERT INTO `auth_item` VALUES ('/coach/coach/upload', '2', null, null, null, '1468486966', '1468486966');
INSERT INTO `auth_item` VALUES ('/coach/coach/upload-delete', '2', null, null, null, '1468486973', '1468486973');
INSERT INTO `auth_item` VALUES ('/coach/coach/upload-imperavi', '2', null, null, null, '1468486976', '1468486976');
INSERT INTO `auth_item` VALUES ('/coach/coach/view', '2', null, null, null, '1468486980', '1468486980');
INSERT INTO `auth_item` VALUES ('管理员', '1', null, null, null, '1468487023', '1468487023');
INSERT INTO `auth_item` VALUES ('编辑', '1', null, null, null, '1468564079', '1468564079');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/default/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/default/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/signup');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/upload');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/upload-delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/upload-imperavi');
INSERT INTO `auth_item_child` VALUES ('管理员', '/coach/coach/view');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for coach
-- ----------------------------
DROP TABLE IF EXISTS `coach`;
CREATE TABLE `coach` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '幼儿辅导ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `type` tinyint(4) NOT NULL COMMENT '类型',
  `img` varchar(255) DEFAULT NULL COMMENT '图片',
  `display` tinyint(4) NOT NULL COMMENT '状态（0、不展示 1、展示）',
  `start_time` int(11) DEFAULT NULL COMMENT '活动开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '活动结束时间',
  `join_cost` int(11) DEFAULT NULL COMMENT '参与人数',
  `content` text COMMENT '内容',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coach
-- ----------------------------
INSERT INTO `coach` VALUES ('5', '幼儿园开学温馨提示', '1', '1/DecTtlsudaselfuHPdouqLlYDwytMXd5.png', '1', '0', '0', null, '', '1468490565', '1468490565');

-- ----------------------------
-- Table structure for coach_info
-- ----------------------------
DROP TABLE IF EXISTS `coach_info`;
CREATE TABLE `coach_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '幼儿辅导详情ID',
  `coachid` int(11) NOT NULL COMMENT '辅导ID',
  `content` text COMMENT '内容',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coach_info
-- ----------------------------

-- ----------------------------
-- Table structure for file_storage_item
-- ----------------------------
DROP TABLE IF EXISTS `file_storage_item`;
CREATE TABLE `file_storage_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `component` varchar(255) NOT NULL,
  `path` varchar(1024) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `upload_ip` varchar(15) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of file_storage_item
-- ----------------------------
INSERT INTO `file_storage_item` VALUES ('1', 'fileStorage', '1/tQ4f-LK4hITuwgEKajwXXCQu5G3xS8O7.png', 'image/png', '10185', 'tQ4f-LK4hITuwgEKajwXXCQu5G3xS8O7', '127.0.0.1', '1468463354');
INSERT INTO `file_storage_item` VALUES ('2', 'fileStorage', '1/7YUave5Il0r2jlC8cWdHH2Yk4R9vY5qD.png', 'image/png', '10185', '7YUave5Il0r2jlC8cWdHH2Yk4R9vY5qD', '127.0.0.1', '1468465627');
INSERT INTO `file_storage_item` VALUES ('3', 'fileStorage', '1/p3CRiyfJ4epm2dJ2N0rUKtdYfaM_Fd4a.png', 'image/png', '10185', 'p3CRiyfJ4epm2dJ2N0rUKtdYfaM_Fd4a', '127.0.0.1', '1468465909');
INSERT INTO `file_storage_item` VALUES ('4', 'fileStorage', '1/sTYzqR_ZSdUFgs4Q0sQNyrdkesElXdIi.png', 'image/png', '10185', 'sTYzqR_ZSdUFgs4Q0sQNyrdkesElXdIi', '127.0.0.1', '1468466242');
INSERT INTO `file_storage_item` VALUES ('5', 'fileStorage', '1/krv0FG2RztNBiXZTLcxFVbPmJJgmLZey.png', 'image/png', '10185', 'krv0FG2RztNBiXZTLcxFVbPmJJgmLZey', '127.0.0.1', '1468466335');
INSERT INTO `file_storage_item` VALUES ('8', 'fileStorage', '1/ten7QJU6oT6SCmZyjfcWGY5C3rrcjmHz.png', 'image/png', '9285', 'ten7QJU6oT6SCmZyjfcWGY5C3rrcjmHz', '127.0.0.1', '1468473809');
INSERT INTO `file_storage_item` VALUES ('10', 'fileStorage', '1/htozKVDNc8GnPGGtM601ZOLfZrH0RGzj.png', 'image/png', '10185', 'htozKVDNc8GnPGGtM601ZOLfZrH0RGzj', '127.0.0.1', '1468490488');
INSERT INTO `file_storage_item` VALUES ('12', 'fileStorage', '1/DecTtlsudaselfuHPdouqLlYDwytMXd5.png', 'image/png', '10185', 'DecTtlsudaselfuHPdouqLlYDwytMXd5', '127.0.0.1', '1468490562');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单名',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '菜单状态：0不显示;1显示;2删除',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父菜单ID',
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '菜单级别',
  `url` varchar(100) NOT NULL COMMENT '链接地址',
  `type` tinyint(4) NOT NULL COMMENT '菜单类型（0为前端，1为后端）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '幼儿辅导', '1', '1', '0', '1', '', '1');
INSERT INTO `menu` VALUES ('2', '幼儿辅导', '2', '1', '1', '2', 'coach/coach', '1');
INSERT INTO `menu` VALUES ('3', '权限管理', '3', '1', '0', '1', '', '1');
INSERT INTO `menu` VALUES ('4', '用户列表', '4', '1', '3', '3', 'admin/user/index', '1');
INSERT INTO `menu` VALUES ('5', '分配角色', '5', '1', '3', '2', 'admin/assignment', '1');
INSERT INTO `menu` VALUES ('6', '角色列表', '6', '1', '3', '2', 'admin/role', '1');
INSERT INTO `menu` VALUES ('7', '权限列表', '7', '0', '3', '2', 'admin/permission', '1');
INSERT INTO `menu` VALUES ('8', '路由列表', '8', '0', '3', '2', 'admin/route', '1');
INSERT INTO `menu` VALUES ('9', '规则列表', '9', '0', '3', '2', 'admin/rule', '1');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1468402066');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1468402069');
INSERT INTO `migration` VALUES ('m150318_213934_file_storage_item', '1468402069');
INSERT INTO `migration` VALUES ('m160428_100253_menu_create', '1468402069');
INSERT INTO `migration` VALUES ('m160503_015754_trends', '1468402069');
INSERT INTO `migration` VALUES ('m160503_022844_contactus', '1468402069');
INSERT INTO `migration` VALUES ('m160503_031550_information', '1468402069');
INSERT INTO `migration` VALUES ('m160503_032201_case', '1468402069');
INSERT INTO `migration` VALUES ('m160503_034257_joinus', '1468402069');
INSERT INTO `migration` VALUES ('m160503_054621_banners', '1468402069');
INSERT INTO `migration` VALUES ('m160503_065524_team', '1468402070');
INSERT INTO `migration` VALUES ('m160503_070439_partner', '1468402070');
INSERT INTO `migration` VALUES ('m160505_100412_create_data_items', '1468402070');
INSERT INTO `migration` VALUES ('m160509_072542_carousel', '1468402070');
INSERT INTO `migration` VALUES ('m160517_032332_product', '1468402070');
INSERT INTO `migration` VALUES ('m160517_034516_product_detail', '1468402070');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1468483436');
INSERT INTO `migration` VALUES ('m160312_050000_create_user', '1468483436');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1468483813');

-- ----------------------------
-- Table structure for newstype
-- ----------------------------
DROP TABLE IF EXISTS `newstype`;
CREATE TABLE `newstype` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类型ID',
  `name` varchar(256) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newstype
-- ----------------------------
INSERT INTO `newstype` VALUES ('1', '温馨提醒');
INSERT INTO `newstype` VALUES ('2', '育儿知识');
INSERT INTO `newstype` VALUES ('3', '活动');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(100) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', null, 'e10adc3949ba59abbe56e057f20f883e', null, 'admin@admin.com', '1', '1214141414', null);
INSERT INTO `user` VALUES ('4', 'user', null, 'e10adc3949ba59abbe56e057f20f883e', null, 'user@user.com', '1', '1468551786', '1468551786');
