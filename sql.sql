-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 10 月 19 日 13:16
-- 服务器版本: 5.0.18
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sq_tpl_email`
--

-- --------------------------------------------------------

--
-- 表的结构 `web_members`
--

CREATE TABLE IF NOT EXISTS `web_members` (
  `uid` smallint(5) unsigned NOT NULL auto_increment,
  `uname` char(20) NOT NULL default '',
  `upwd` char(32) NOT NULL default '',
  `logins` smallint(5) NOT NULL default '0',
  `regip` char(15) NOT NULL default '',
  `regdate` int(10) unsigned NOT NULL default '0',
  `lastip` char(15) NOT NULL default '',
  `lastvisit` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  KEY `uname` (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `web_members`
--

INSERT INTO `web_members` (`uid`, `uname`, `upwd`, `logins`, `regip`, `regdate`, `lastip`, `lastvisit`) VALUES
(1, 'admin', '77e2edcc9b40441200e31dc57dbb8829', 134, '127.0.0.1', 1237193608, '58.67.137.233', 1259735589);

-- --------------------------------------------------------

--
-- 表的结构 `web_orderinfo`
--

CREATE TABLE IF NOT EXISTS `web_orderinfo` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `model` varchar(50) NOT NULL,
  `buynum` smallint(5) NOT NULL default '0',
  `price` float(10,2) NOT NULL default '0.00',
  `name` varchar(10) NOT NULL,
  `tele` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `sheng` varchar(10) NOT NULL,
  `shi` varchar(10) NOT NULL,
  `xian` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `note` varchar(255) NOT NULL,
  `addtime` int(10) NOT NULL default '0',
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `web_orderinfo`
--

INSERT INTO `web_orderinfo` (`id`, `model`, `buynum`, `price`, `name`, `tele`, `mobile`, `sheng`, `shi`, `xian`, `address`, `zipcode`, `note`, `addtime`, `ip`) VALUES
(8, 'admin', 2, 100.00, '李庆民', '13520357627', '13520357627', '北京', '朝阳', '双井', '详细地址', '100012', '备 注', 1287493947, '127.0.0.1');
