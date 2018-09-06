/*
Navicat MySQL Data Transfer

Source Server         : 地老天荒果
Source Server Version : 50718
Source Host           : gz-cdb-9yvp3vjn.sql.tencentcdb.com:63119
Source Database       : youhuijuan

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2018-09-06 11:04:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for guanlian
-- ----------------------------
DROP TABLE IF EXISTS `guanlian`;
CREATE TABLE `guanlian` (
  `openid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for youhuijuan
-- ----------------------------
DROP TABLE IF EXISTS `youhuijuan`;
CREATE TABLE `youhuijuan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `offername` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offermount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `string` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
