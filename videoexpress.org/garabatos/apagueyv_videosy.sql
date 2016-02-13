-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-08-2011 a las 09:34:23
-- Versión del servidor: 5.1.56
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `apagueyv_videosy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_banner`
--

CREATE TABLE IF NOT EXISTS `bak_banner` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT 'banner',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `imageurl` varchar(100) NOT NULL DEFAULT '',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `date` datetime DEFAULT NULL,
  `showBanner` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `bak_banner`
--

INSERT INTO `bak_banner` (`bid`, `cid`, `type`, `name`, `alias`, `imptotal`, `impmade`, `clicks`, `imageurl`, `clickurl`, `date`, `showBanner`, `checked_out`, `checked_out_time`, `editor`, `custombannercode`, `catid`, `description`, `sticky`, `ordering`, `publish_up`, `publish_down`, `tags`, `params`) VALUES
(1, 1, 'banner', 'OSM 1', 'osm-1', 0, 43, 0, 'osmbanner1.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', 1, 0, '0000-00-00 00:00:00', '', '', 13, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 1, 'banner', 'OSM 2', 'osm-2', 0, 49, 0, 'osmbanner2.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', 1, 0, '0000-00-00 00:00:00', '', '', 13, '', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 1, '', 'Joomla!', 'joomla', 0, 358, 0, '', 'http://www.joomla.org', '2006-05-29 14:21:28', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomla! The most popular and widely used Open Source CMS Project in the world.', 14, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(4, 1, '', 'JoomlaCode', 'joomlacode', 0, 358, 0, '', 'http://joomlacode.org', '2006-05-29 14:19:26', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomlaCode, development and distribution made easy.', 14, '', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 1, '', 'Joomla! Extensions', 'joomla-extensions', 0, 353, 0, '', 'http://extensions.joomla.org', '2006-05-29 14:23:21', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomla! Components, Modules, Plugins and Languages by the bucket load.', 14, '', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, 1, '', 'Joomla! Shop', 'joomla-shop', 0, 353, 0, '', 'http://shop.joomla.org', '2006-05-29 14:23:21', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nFor all your Joomla! merchandise.', 14, '', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(7, 1, '', 'Joomla! Promo Shop', 'joomla-promo-shop', 0, 11, 1, 'shop-ad.jpg', 'http://shop.joomla.org', '2007-09-19 17:26:24', 1, 0, '0000-00-00 00:00:00', '', '', 33, '', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(8, 1, '', 'Joomla! Promo Books', 'joomla-promo-books', 0, 10, 0, 'shop-ad-books.jpg', 'http://shop.joomla.org/amazoncom-bookstores.html', '2007-09-19 17:28:01', 1, 0, '0000-00-00 00:00:00', '', '', 33, '', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_bannerclient`
--

CREATE TABLE IF NOT EXISTS `bak_bannerclient` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` time DEFAULT NULL,
  `editor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bak_bannerclient`
--

INSERT INTO `bak_bannerclient` (`cid`, `name`, `contact`, `email`, `extrainfo`, `checked_out`, `checked_out_time`, `editor`) VALUES
(1, 'Open Source Matters', 'Administrator', 'admin@opensourcematters.org', '', 0, '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_bannertrack`
--

CREATE TABLE IF NOT EXISTS `bak_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_categories`
--

CREATE TABLE IF NOT EXISTS `bak_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `bak_categories`
--

INSERT INTO `bak_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
(1, 0, 'Latest', '', 'latest-news', 'taking_notes.jpg', '1', 'left', 'The latest news from the Joomla! Team', 1, 0, '0000-00-00 00:00:00', '', 1, 0, 1, ''),
(2, 0, 'Joomla! Specific Links', '', 'joomla-specific-links', 'clock.jpg', 'com_weblinks', 'left', 'A selection of links that are all related to the Joomla! Project.', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(3, 0, 'Newsflash', '', 'newsflash', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', '', 2, 0, 0, ''),
(4, 0, 'Joomla!', '', 'joomla', '', 'com_newsfeeds', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(5, 0, 'Free and Open Source Software', '', 'free-and-open-source-software', '', 'com_newsfeeds', 'left', 'Read the latest news about free and open source software from some of its leading advocates.', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(6, 0, 'Related Projects', '', 'related-projects', '', 'com_newsfeeds', 'left', 'Joomla builds on and collaborates with many other free and open source projects. Keep up with the latest news from some of them.', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(12, 0, 'Contacts', '', 'contacts', '', 'com_contact_details', 'left', 'Contact Details for this Web site', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(13, 0, 'Joomla', '', 'joomla', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(14, 0, 'Text Ads', '', 'text-ads', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(15, 0, 'Features', '', 'features', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, ''),
(17, 0, 'Benefits', '', 'benefits', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(18, 0, 'Platforms', '', 'platforms', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(19, 0, 'Other Resources', '', 'other-resources', '', 'com_weblinks', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(29, 0, 'The CMS', '', 'the-cms', '', '4', 'left', 'Information about the software behind Joomla!<br />', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(28, 0, 'Current Users', '', 'current-users', '', '3', 'left', 'Questions that users migrating to Joomla! 1.5 are likely to raise<br />', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(25, 0, 'The Project', '', 'the-project', '', '4', 'left', 'General facts about Joomla!<br />', 1, 65, '2007-06-28 14:50:15', NULL, 1, 0, 0, ''),
(27, 0, 'New to Joomla!', '', 'new-to-joomla', '', '3', 'left', 'Questions for new users of Joomla!', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(30, 0, 'The Community', '', 'the-community', '', '4', 'left', 'About the millions of Joomla! users and Web sites<br />', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(31, 0, 'General', '', 'general', '', '3', 'left', 'General questions about the Joomla! CMS', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(32, 0, 'Languages', '', 'languages', '', '3', 'left', 'Questions related to localisation and languages', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(33, 0, 'Joomla! Promo', '', 'joomla-promo', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(34, 0, 'Previews', '', 'previews', '', '5', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(35, 0, 'Latest Headlines', '', 'latest-headlines', '', '5', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(36, 0, 'Editors'' Picks', '', 'editors-picks', '', '5', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_components`
--

CREATE TABLE IF NOT EXISTS `bak_components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) unsigned NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `admin_menu_link` varchar(255) NOT NULL DEFAULT '',
  `admin_menu_alt` varchar(255) NOT NULL DEFAULT '',
  `option` varchar(50) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `admin_menu_img` varchar(255) NOT NULL DEFAULT '',
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `bak_components`
--

INSERT INTO `bak_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
(1, 'Banners', '', 0, 0, '', 'Banner Management', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, 'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n', 1),
(2, 'Banners', '', 0, 1, 'option=com_banners', 'Active Banners', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(3, 'Clients', '', 0, 1, 'option=com_banners&c=client', 'Manage Clients', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(4, 'Web Links', 'option=com_weblinks', 0, 0, '', 'Manage Weblinks', 'com_weblinks', 0, 'js/ThemeOffice/component.png', 0, 'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', 1),
(5, 'Links', '', 0, 4, 'option=com_weblinks', 'View existing weblinks', 'com_weblinks', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(6, 'Categories', '', 0, 4, 'option=com_categories&section=com_weblinks', 'Manage weblink categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(7, 'Contacts', 'option=com_contact', 0, 0, '', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/component.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(8, 'Contacts', '', 0, 7, 'option=com_contact', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, '', 1),
(9, 'Categories', '', 0, 7, 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', 2, 'js/ThemeOffice/categories.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(10, 'Polls', 'option=com_poll', 0, 0, 'option=com_poll', 'Manage Polls', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(11, 'News Feeds', 'option=com_newsfeeds', 0, 0, '', 'News Feeds Management', 'com_newsfeeds', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(12, 'Feeds', '', 0, 11, 'option=com_newsfeeds', 'Manage News Feeds', 'com_newsfeeds', 1, 'js/ThemeOffice/edit.png', 0, 'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 1),
(13, 'Categories', '', 0, 11, 'option=com_categories&section=com_newsfeeds', 'Manage Categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(14, 'User', 'option=com_user', 0, 0, '', '', 'com_user', 0, '', 1, '', 1),
(15, 'Search', 'option=com_search', 0, 0, 'option=com_search', 'Search Statistics', 'com_search', 0, 'js/ThemeOffice/component.png', 1, 'enabled=0\n\n', 1),
(16, 'Categories', '', 0, 1, 'option=com_categories&section=com_banner', 'Categories', '', 3, '', 1, '', 1),
(17, 'Wrapper', 'option=com_wrapper', 0, 0, '', 'Wrapper', 'com_wrapper', 0, '', 1, '', 1),
(18, 'Mail To', '', 0, 0, '', '', 'com_mailto', 0, '', 1, '', 1),
(19, 'Media Manager', '', 0, 0, 'option=com_media', 'Media Manager', 'com_media', 0, '', 1, 'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n', 1),
(20, 'Articles', 'option=com_content', 0, 0, '', '', 'com_content', 0, '', 1, 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\n\n', 1),
(21, 'Configuration Manager', '', 0, 0, '', 'Configuration', 'com_config', 0, '', 1, '', 1),
(22, 'Installation Manager', '', 0, 0, '', 'Installer', 'com_installer', 0, '', 1, '', 1),
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, '', 1),
(24, 'Mass mail', '', 0, 0, '', 'Mass Mail', 'com_massmail', 0, '', 1, 'mailSubjectPrefix=\nmailBodySuffix=\n\n', 1),
(25, 'Menu Editor', '', 0, 0, '', 'Menu Editor', 'com_menus', 0, '', 1, '', 1),
(27, 'Messaging', '', 0, 0, '', 'Messages', 'com_messages', 0, '', 1, '', 1),
(28, 'Modules Manager', '', 0, 0, '', 'Modules', 'com_modules', 0, '', 1, '', 1),
(29, 'Plugin Manager', '', 0, 0, '', 'Plugins', 'com_plugins', 0, '', 1, '', 1),
(30, 'Template Manager', '', 0, 0, '', 'Templates', 'com_templates', 0, '', 1, '', 1),
(31, 'User Manager', '', 0, 0, '', 'Users', 'com_users', 0, '', 1, 'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n', 1),
(32, 'Cache Manager', '', 0, 0, '', 'Cache', 'com_cache', 0, '', 1, '', 1),
(33, 'Control Panel', '', 0, 0, '', 'Control Panel', 'com_cpanel', 0, '', 1, '', 1),
(34, 'VirtueMart', 'option=com_virtuemart', 0, 0, 'option=com_virtuemart', 'VirtueMart', 'com_virtuemart', 0, '../components/com_virtuemart/shop_image/ps_image/menu_icon.png', 0, '', 1),
(35, 'virtuemart_version', '', 0, 9999, '', '', '', 0, '', 0, 'RELEASE=1.1.2\nDEV_STATUS=stable', 1),
(36, 'Gavick PhotoSlide GK2', 'option=com_gk2_photoslide', 0, 0, 'option=com_gk2_photoslide', 'Gavick PhotoSlide GK2', 'com_gk2_photoslide', 0, 'components/com_gk2_photoslide/interface/images/com_logo_gk2.png', 0, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_contact_details`
--

CREATE TABLE IF NOT EXISTS `bak_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `imagepos` varchar(20) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bak_contact_details`
--

INSERT INTO `bak_contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`) VALUES
(1, 'Name', 'name', 'Position', 'Street', 'Suburb', 'State', 'Country', 'Zip Code', 'Telephone', 'Fax', 'Miscellanous info', 'powered_by.png', 'top', 'email@email.com', 1, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=1\r\nshow_position=1\r\nshow_email=0\r\nshow_street_address=1\r\nshow_suburb=1\r\nshow_state=1\r\nshow_postcode=1\r\nshow_country=1\r\nshow_telephone=1\r\nshow_mobile=1\r\nshow_fax=1\r\nshow_webpage=1\r\nshow_misc=1\r\nshow_image=1\r\nallow_vcard=0\r\ncontact_icons=0\r\nicon_address=\r\nicon_email=\r\nicon_telephone=\r\nicon_fax=\r\nicon_misc=\r\nshow_email_form=1\r\nemail_description=1\r\nshow_email_copy=1\r\nbanned_email=\r\nbanned_subject=\r\nbanned_text=', 0, 12, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_content`
--

CREATE TABLE IF NOT EXISTS `bak_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `title_alias` varchar(255) NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `sectionid` int(11) unsigned NOT NULL DEFAULT '0',
  `mask` int(11) unsigned NOT NULL DEFAULT '0',
  `catid` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `parentid` int(11) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Volcado de datos para la tabla `bak_content`
--

INSERT INTO `bak_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(1, 'Welcome to Joomla!', 'welcome-to-joomla', '', '<div align="left"><strong>Joomla! is a free open source framework and content publishing system designed for quickly creating highly interactive multi-language Web sites, online communities, media portals, blogs and eCommerce applications. <br /></strong></div><p><strong><br /></strong><img src="images/stories/powered_by.png" border="0" alt="Joomla! Logo" title="Example Caption" hspace="6" vspace="0" width="165" height="68" align="left" />Joomla! provides an easy-to-use graphical user interface that simplifies the management and publishing of large volumes of content including HTML, documents, and rich media.  Joomla! is used by organisations of all sizes for intranets and extranets and is supported by a community of tens of thousands of users. </p>', 'With a fully documented library of developer resources, Joomla! allows the customisation of every aspect of a Web site including presentation, layout, administration, and the rapid integration with third-party applications.<p>Joomla! now provides more developer power while making the user experience all the more friendly. For those who always wanted increased extensibility, Joomla! 1.5 can make this happen.</p><p>A new framework, ground-up refactoring, and a highly-active development team brings the excitement of ''the next generation CMS'' to your fingertips.  Whether you are a systems architect or a complete ''noob'' Joomla! can take you to the next level of content delivery. ''More than a CMS'' is something we have been playing with as a catchcry because the new Joomla! API has such incredible power and flexibility, you are free to take whatever direction your creative mind takes you and Joomla! can help you get there so much more easily than ever before.</p><p>Thinking Web publishing? Think Joomla!</p>', -2, 1, 0, 1, '2008-08-12 10:00:00', 62, '', '2008-08-12 10:00:00', 62, 0, '0000-00-00 00:00:00', '2006-01-03 01:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 29, 0, 0, '', '', 0, 92, 'robots=\nauthor='),
(2, 'Newsflash 1', 'newsflash-1', '', '<p>Joomla! makes it easy to launch a Web site of any kind. Whether you want a brochure site or you are building a large online community, Joomla! allows you to deploy a new site in minutes and add extra functionality as you need it. The hundreds of available Extensions will help to expand your site and allow you to deliver new services that extend your reach into the Internet.</p>', '', 1, 1, 0, 3, '2008-08-10 06:30:34', 62, '', '2008-08-10 06:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 1, 'robots=\nauthor='),
(3, 'Newsflash 2', 'newsflash-2', '', '<p>The one thing about a Web site, it always changes! Joomla! makes it easy to add Articles, content, images, videos, and more. Site administrators can edit and manage content ''in-context'' by clicking the ''Edit'' link. Webmasters can also edit content through a graphical Control Panel that gives you complete control over your site.</p>', '', 1, 1, 0, 3, '2008-08-09 22:30:34', 62, '', '2008-08-09 22:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 4, '', '', 0, 0, 'robots=\nauthor='),
(4, 'Newsflash 3', 'newsflash-3', '', '<p>With a library of thousands of free <a href="http://extensions.joomla.org" target="_blank" title="The Joomla! Extensions Directory">Extensions</a>, you can add what you need as your site grows. Don''t wait, look through the <a href="http://extensions.joomla.org/" target="_blank" title="Joomla! Extensions">Joomla! Extensions</a>  library today. </p>', '', 1, 1, 0, 3, '2008-08-10 06:30:34', 62, '', '2008-08-10 06:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 5, '', '', 0, 1, 'robots=\nauthor='),
(5, 'Joomla! License Guidelines', 'joomla-license-guidelines', 'joomla-license-guidelines', '<p>This Web site is powered by <a href="http://joomla.org/" target="_blank" title="Joomla!">Joomla!</a> The software and default templates on which it runs are Copyright 2005-2008 <a href="http://www.opensourcematters.org/" target="_blank" title="Open Source Matters">Open Source Matters</a>. The sample content distributed with Joomla! is licensed under the <a href="http://docs.joomla.org/JEDL" target="_blank" title="Joomla! Electronic Document License">Joomla! Electronic Documentation License.</a> All data entered into this Web site and templates added after installation, are copyrighted by their respective copyright owners.</p> <p>If you want to distribute, copy, or modify Joomla!, you are welcome to do so under the terms of the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1" target="_blank" title="GNU General Public License"> GNU General Public License</a>. If you are unfamiliar with this license, you might want to read <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC4" target="_blank" title="How To Apply These Terms To Your Program">''How To Apply These Terms To Your Program''</a> and the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0-faq.html" target="_blank" title="GNU General Public License FAQ">''GNU General Public License FAQ''</a>.</p> <p>The Joomla! licence has always been GPL.</p>', '', 1, 4, 0, 25, '2008-08-20 10:11:07', 62, '', '2008-08-20 10:11:07', 62, 0, '0000-00-00 00:00:00', '2004-08-19 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 2, '', '', 0, 113, 'robots=\nauthor='),
(6, 'We are Volunteers', 'we-are-volunteers', '', '<p>The Joomla Core Team and Working Group members are volunteer developers, designers, administrators and managers who have worked together to take Joomla! to new heights in its relatively short life. Joomla! has some wonderfully talented people taking Open Source concepts to the forefront of industry standards.  Joomla! 1.5 is a major leap forward and represents the most exciting Joomla! release in the history of the project. </p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 4, '', '', 0, 54, 'robots=\nauthor='),
(9, 'Millions of Smiles', 'millions-of-smiles', '', '<p>The Joomla! team has millions of good reasons to be smiling about the Joomla! 1.5. In its current incarnation, it''s had millions of downloads, taking it to an unprecedented level of popularity.  The new code base is almost an entire re-factor of the old code base.  The user experience is still extremely slick but for developers the API is a dream.  A proper framework for real PHP architects seeking the best of the best.</p><p>If you''re a former Mambo User or a 1.0 series Joomla! User, 1.5 is the future of CMSs for a number of reasons.  It''s more powerful, more flexible, more secure, and intuitive.  Our developers and interface designers have worked countless hours to make this the most exciting release in the content management system sphere.</p><p>Go on ... get your FREE copy of Joomla! today and spread the word about this benchmark project. </p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 7, '', '', 0, 23, 'robots=\nauthor='),
(10, 'How do I localise Joomla! to my language?', 'how-do-i-localise-joomla-to-my-language', '', '<h4>General<br /></h4><p>In Joomla! 1.5 all User interfaces can be localised. This includes the installation, the Back-end Control Panel and the Front-end Site.</p><p>The core release of Joomla! 1.5 is shipped with multiple language choices in the installation but, other than English (the default), languages for the Site and Administration interfaces need to be added after installation. Links to such language packs exist below.</p>', '<p>Translation Teams for Joomla! 1.5 may have also released fully localised installation packages where site, administrator and sample data are in the local language. These localised releases can be found in the specific team projects on the <a href="http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/" target="_blank" title="JED">Joomla! Extensions Directory</a>.</p><h4>How do I install language packs?</h4><ul><li>First download both the admin and the site language packs that you require.</li><li>Install each pack separately using the Extensions-&gt;Install/Uninstall Menu selection and then the package file upload facility.</li><li>Go to the Language Manager and be sure to select Site or Admin in the sub-menu. Then select the appropriate language and make it the default one using the Toolbar button.</li></ul><h4>How do I select languages?</h4><ul><li>Default languages can be independently set for Site and for Administrator</li><li>In addition, users can define their preferred language for each Site and Administrator. This takes affect after logging in.</li><li>While logging in to the Administrator Back-end, a language can also be selected for the particular session.</li></ul><h4>Where can I find Language Packs and Localised Releases?</h4><p><em>Please note that Joomla! 1.5 is new and language packs for this version may have not been released at this time.</em> </p><ul><li><a href="http://joomlacode.org/gf/project/jtranslation/" target="_blank" title="Accredited Translations">The Joomla! Accredited Translations Project</a>  - This is a joint repository for language packs that were developed by teams that are members of the Joomla! Translations Working Group.</li><li><a href="http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/" target="_blank" title="Translations">The Joomla! Extensions Site - Translations</a>  </li><li><a href="http://community.joomla.org/translations.html" target="_blank" title="Translation Work Group Teams">List of Translation Teams and Translation Partner Sites for Joomla! 1.5</a> </li></ul>', 1, 3, 0, 32, '2008-07-30 14:06:37', 62, '', '2008-07-30 14:06:37', 62, 0, '0000-00-00 00:00:00', '2006-09-29 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 5, '', '', 0, 10, 'robots=\nauthor='),
(11, 'How do I upgrade to Joomla! 1.5 ?', 'how-do-i-upgrade-to-joomla-15', '', '<p>Joomla! 1.5 does not provide an upgrade path from earlier versions. Converting an older site to a Joomla! 1.5 site requires creation of a new empty site using Joomla! 1.5 and then populating the new site with the content from the old site. This migration of content is not a one-to-one process and involves conversions and modifications to the content dump.</p> <p>There are two ways to perform the migration:</p>', ' <div id="post_content-107"><li>An automated method of migration has been provided which uses a migrator Component to create the migration dump out of the old site (Mambo 4.5.x up to Joomla! 1.0.x) and a smart import facility in the Joomla! 1.5 Installation that performs required conversions and modifications during the installation process.</li> <li>Migration can be performed manually. This involves exporting the required tables, manually performing required conversions and modifications and then importing the content to the new site after it is installed.</li>  <p><!--more--></p> <h2><strong> Automated migration</strong></h2>  <p>This is a two phased process using two tools. The first tool is a migration Component named <font face="courier new,courier">com_migrator</font>. This Component has been contributed by Harald Baer and is based on his <strong>eBackup </strong>Component. The migrator needs to be installed on the old site and when activated it prepares the required export dump of the old site''s data. The second tool is built into the Joomla! 1.5 installation process. The exported content dump is loaded to the new site and all conversions and modification are performed on-the-fly.</p> <h3><u> Step 1 - Using com_migrator to export data from old site:</u></h3> <li>Install the <font face="courier new,courier">com_migrator</font> Component on the <u><strong>old</strong></u> site. It can be found at the <a href="http://joomlacode.org/gf/project/pasamioprojects/frs/" target="_blank" title="JoomlaCode">JoomlaCode developers forge</a>.</li> <li>Select the Component in the Component Menu of the Control Panel.</li> <li>Click on the <strong>Dump it</strong> icon. Three exported <em>gzipped </em>export scripts will be created. The first is a complete backup of the old site. The second is the migration content of all core elements which will be imported to the new site. The third is a backup of all 3PD Component tables.</li> <li>Click on the download icon of the particular exports files needed and store locally.</li> <li>Multiple export sets can be created.</li> <li>The exported data is not modified in anyway and the original encoding is preserved. This makes the <font face="courier new,courier">com_migrator</font> tool a recommended tool to use for manual migration as well.</li> <h3><u> Step 2 - Using the migration facility to import and convert data during Joomla! 1.5 installation:</u></h3><p>Note: This function requires the use of the <em><font face="courier new,courier">iconv </font></em>function in PHP to convert encodings. If <em><font face="courier new,courier">iconv </font></em>is not found a warning will be provided.</p> <li>In step 6 - Configuration select the ''Load Migration Script'' option in the ''Load Sample Data, Restore or Migrate Backed Up Content'' section of the page.</li> <li>Enter the table prefix used in the content dump. For example: ''#__'' or ''site2_'' are acceptable values.</li> <li>Select the encoding of the dumped content in the dropdown list. This should be the encoding used on the pages of the old site. (As defined in the _ISO variable in the language file or as seen in the browser page info/encoding/source)</li> <li>Browse the local host and select the migration export and click on <strong>Upload and Execute</strong></li> <li>A success message should appear or alternately a listing of database errors</li> <li>Complete the other required fields in the Configuration step such as Site Name and Admin details and advance to the final step of installation. (Admin details will be ignored as the imported data will take priority. Please remember admin name and password from the old site)</li> <p><u><br /></u></p></div>', 1, 3, 0, 28, '2008-07-30 20:27:52', 62, '', '2008-07-30 20:27:52', 62, 0, '0000-00-00 00:00:00', '2006-09-29 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 3, '', '', 0, 14, 'robots=\nauthor='),
(12, 'Why does Joomla! 1.5 use UTF-8 encoding?', 'why-does-joomla-15-use-utf-8-encoding', '', '<p>Well... how about never needing to mess with encoding settings again?</p><p>Ever needed to display several languages on one page or site and something always came up in Giberish?</p><p>With utf-8 (a variant of Unicode) glyphs (character forms) of basically all languages can be displayed with one single encoding setting. </p>', '', 1, 3, 0, 31, '2008-08-05 01:11:29', 62, '', '2008-08-05 01:11:29', 62, 0, '0000-00-00 00:00:00', '2006-10-03 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 8, '', '', 0, 29, 'robots=\nauthor='),
(13, 'What happened to the locale setting?', 'what-happened-to-the-locale-setting', '', 'This is now defined in the Language [<em>lang</em>].xml file in the Language metadata settings. If you are having locale problems such as dates do not appear in your language for example, you might want to check/edit the entries in the locale tag. Note that multiple locale strings can be set and the host will usually accept the first one recognised.', '', 1, 3, 0, 28, '2008-08-06 16:47:35', 62, '', '2008-08-06 16:47:35', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 2, '', '', 0, 11, 'robots=\nauthor='),
(14, 'What is the FTP layer for?', 'what-is-the-ftp-layer-for', '', '<p>The FTP Layer allows file operations (such as installing Extensions or updating the main configuration file) without having to make all the folders and files writable. This has been an issue on Linux and other Unix based platforms in respect of file permissions. This makes the site admin''s life a lot easier and increases security of the site.</p><p>You can check the write status of relevent folders by going to ''''Help-&gt;System Info" and then in the sub-menu to "Directory Permissions". With the FTP Layer enabled even if all directories are red, Joomla! will operate smoothly.</p><p>NOTE: the FTP layer is not required on a Windows host/server. </p>', '', 1, 3, 0, 31, '2008-08-06 21:27:49', 62, '', '2008-08-06 21:27:49', 62, 0, '0000-00-00 00:00:00', '2006-10-05 16:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', 6, 0, 6, '', '', 0, 23, 'robots=\nauthor='),
(15, 'Can Joomla! 1.5 operate with PHP Safe Mode On?', 'can-joomla-15-operate-with-php-safe-mode-on', '', '<p>Yes it can! This is a significant security improvement.</p><p>The <em>safe mode</em> limits PHP to be able to perfom actions only on files/folders who''s owner is the same as PHP is currently using (this is usually ''apache''). As files normally are created either by the Joomla! application or by FTP access, the combination of PHP file actions and the FTP Layer allows Joomla! to operate in PHP Safe Mode.</p>', '', 1, 3, 0, 31, '2008-08-06 19:28:35', 62, '', '2008-08-06 19:28:35', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 4, '', '', 0, 8, 'robots=\nauthor='),
(16, 'Only one edit window! How do I create "Read more..."?', 'only-one-edit-window-how-do-i-create-read-more', '', '<p>This is now implemented by inserting a <strong>Read more...</strong> tag (the button is located below the editor area) a dotted line appears in the edited text showing the split location for the <em>Read more....</em> A new Plugin takes care of the rest.</p><p>It is worth mentioning that this does not have a negative effect on migrated data from older sites. The new implementation is fully backward compatible.</p>', '', 1, 3, 0, 28, '2008-08-06 19:29:28', 62, '', '2008-08-06 19:29:28', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 4, '', '', 0, 20, 'robots=\nauthor='),
(17, 'My MySQL database does not support UTF-8. Do I have a problem?', 'my-mysql-database-does-not-support-utf-8-do-i-have-a-problem', '', 'No you don''t. Versions of MySQL lower than 4.1 do not have built in UTF-8 support. However, Joomla! 1.5 has made provisions for backward compatibility and is able to use UTF-8 on older databases. Let the installer take care of all the settings and there is no need to make any changes to the database (charset, collation, or any other).', '', 1, 3, 0, 31, '2008-08-07 09:30:37', 62, '', '2008-08-07 09:30:37', 62, 0, '0000-00-00 00:00:00', '2006-10-05 20:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 7, '', '', 0, 9, 'robots=\nauthor='),
(18, 'Joomla! Features', 'joomla-features', '', '<h4><font color="#ff6600">Joomla! features:</font></h4> <ul><li>Completely database driven site engines </li><li>News, products, or services sections fully editable and manageable</li><li>Topics sections can be added to by contributing Authors </li><li>Fully customisable layouts including <em>left</em>, <em>center</em>, and <em>right </em>Menu boxes </li><li>Browser upload of images to your own library for use anywhere in the site </li><li>Dynamic Forum/Poll/Voting booth for on-the-spot results </li><li>Runs on Linux, FreeBSD, MacOSX server, Solaris, and AIX', '  </li></ul> <h4>Extensive Administration:</h4> <ul><li>Change order of objects including news, FAQs, Articles etc. </li><li>Random Newsflash generator </li><li>Remote Author submission Module for News, Articles, FAQs, and Links </li><li>Object hierarchy - as many Sections, departments, divisions, and pages as you want </li><li>Image library - store all your PNGs, PDFs, DOCs, XLSs, GIFs, and JPEGs online for easy use </li><li>Automatic Path-Finder. Place a picture and let Joomla! fix the link </li><li>News Feed Manager. Easily integrate news feeds into your Web site.</li><li>E-mail a friend and Print format available for every story and Article </li><li>In-line Text editor similar to any basic word processor software </li><li>User editable look and feel </li><li>Polls/Surveys - Now put a different one on each page </li><li>Custom Page Modules. Download custom page Modules to spice up your site </li><li>Template Manager. Download Templates and implement them in seconds </li><li>Layout preview. See how it looks before going live </li><li>Banner Manager. Make money out of your site.</li></ul>', 1, 4, 0, 29, '2008-08-08 23:32:45', 62, '', '2008-08-08 23:32:45', 62, 0, '0000-00-00 00:00:00', '2006-10-07 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 4, '', '', 0, 59, 'robots=\nauthor='),
(19, 'Joomla! Overview', 'joomla-overview', '', '<p>If you''re new to Web publishing systems, you''ll find that Joomla! delivers sophisticated solutions to your online needs. It can deliver a robust enterprise-level Web site, empowered by endless extensibility for your bespoke publishing needs. Moreover, it is often the system of choice for small business or home users who want a professional looking site that''s simple to deploy and use. <em>We do content right</em>.<br /> </p><p>So what''s the catch? How much does this system cost?</p><p> Well, there''s good news ... and more good news! Joomla! 1.5 is free, it is released under an Open Source license - the GNU/General Public License v 2.0. Had you invested in a mainstream, commercial alternative, there''d be nothing but moths left in your wallet and to add new functionality would probably mean taking out a second mortgage each time you wanted something adding!</p><p>Joomla! changes all that ... <br />Joomla! is different from the normal models for content management software. For a start, it''s not complicated. Joomla! has been developed for everybody, and anybody can develop it further. It is designed to work (primarily) with other Open Source, free, software such as PHP, MySQL, and Apache. </p><p>It is easy to install and administer, and is reliable. </p><p>Joomla! doesn''t even require the user or administrator of the system to know HTML to operate it once it''s up and running.</p><p>To get the perfect Web site with all the functionality that you require for your particular application may take additional time and effort, but with the Joomla! Community support that is available and the many Third Party Developers actively creating and releasing new Extensions for the 1.5 platform on an almost daily basis, there is likely to be something out there to meet your needs. Or you could develop your own Extensions and make these available to the rest of the community. </p>', '', 1, 4, 0, 29, '2008-08-09 07:49:20', 62, '', '2008-08-09 07:49:20', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 2, '', '', 0, 245, 'robots=\nauthor='),
(20, 'Support and Documentation', 'support-and-documentation', '', '<h1>Support </h1><p>Support for the Joomla! CMS can be found on several places. The best place to start would be the <a href="http://docs.joomla.org/" target="_blank" title="Joomla! Official Documentation Wiki">Joomla! Official Documentation Wiki</a>. Here you can help yourself to the information that is regularly published and updated as Joomla! develops. There is much more to come too!</p> <p>Of course you should not forget the Help System of the CMS itself. On the <em>topmenu </em>in the Back-end Control panel you find the Help button which will provide you with lots of explanation on features.</p> <p>Another great place would of course be the <a href="http://forum.joomla.org/" target="_blank" title="Forum">Forum</a> . On the Joomla! Forum you can find help and support from Community members as well as from Joomla! Core members and Working Group members. The forum contains a lot of information, FAQ''s, just about anything you are looking for in terms of support.</p> <p>Two other resources for Support are the <a href="http://developer.joomla.org/" target="_blank" title="Joomla! Developer Site">Joomla! Developer Site</a> and the <a href="http://extensions.joomla.org/" target="_blank" title="Joomla! Extensions Directory">Joomla! Extensions Directory</a> (JED). The Joomla! Developer Site provides lots of technical information for the experienced Developer as well as those new to Joomla! and development work in general. The JED whilst not a support site in the strictest sense has many of the Extensions that you will need as you develop your own Web site.</p> <p>The Joomla! Developers and Bug Squad members are regularly posting their blog reports about several topics such as programming techniques and security issues.</p> <h1>Documentation</h1> <p>Joomla! Documentation can of course be found on the <a href="http://docs.joomla.org/" target="_blank" title="Joomla! Official Documentation Wiki">Joomla! Official Documentation Wiki</a>. You can find information for beginners, installation, upgrade, Frequently Asked Questions, developer topics, and a lot more. The Documentation Team helps oversee the wiki but you are invited to contribute content, as well.</p> <p>There are also books written about Joomla! You can find a listing of these books in the <a href="http://shop.joomla.org/" target="_blank" title="Joomla! Shop">Joomla! Shop</a>.</p>', '', 1, 4, 0, 25, '2008-08-09 08:33:57', 62, '', '2008-08-09 08:33:57', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 1, '', '', 0, 6, 'robots=\nauthor='),
(21, 'Joomla! Facts', 'joomla-facts', '', '<p>Here are some interesting facts about Joomla!</p><ul><li><span>Over 210,000 active registered Users on the <a href="http://forum.joomla.org" target="_blank" title="Joomla Forums">Official Joomla! community forum</a> and more on the many international community sites.</span><ul><li><span>over 1,000,000 posts in over 200,000 topics</span></li><li>over 1,200 posts per day</li><li>growing at 150 new participants each day!</li></ul></li><li><span>1168 Projects on the JoomlaCode (<a href="http://joomlacode.org/" target="_blank" title="JoomlaCode">joomlacode.org</a> ). All for open source addons by third party developers.</span><ul><li><span>Well over 6,000,000 downloads of Joomla! since the migration to JoomlaCode in March 2007.<br /></span></li></ul></li><li><span>Nearly 4,000 extensions for Joomla! have been registered on the <a href="http://extensions.joomla.org" target="_blank" title="http://extensions.joomla.org">Joomla! Extension Directory</a>  </span></li><li><span>Joomla.org exceeds 2 TB of traffic per month!</span></li></ul>', '', 1, 4, 0, 30, '2008-08-09 16:46:37', 62, '', '2008-08-09 16:46:37', 62, 0, '0000-00-00 00:00:00', '2006-10-07 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 1, '', '', 0, 50, 'robots=\nauthor='),
(22, 'What''s New in 1.5?', 'whats-new-in-15', '', '<p>As with previous releases, Joomla! provides a unified and easy-to-use framework for delivering content for Web sites of all kinds. To support the changing nature of the Internet and emerging Web technologies, Joomla! required substantial restructuring of its core functionality and we also used this effort to simplify many challenges within the current user interface. Joomla! 1.5 has many new features.</p>', '<p style="margin-bottom: 0in">In Joomla! 1.5, you''ll notice: </p>    <ul><li>     <p style="margin-bottom: 0in">       Substantially improved usability, manageability, and scalability far beyond the original Mambo foundations</p>   </li><li>     <p style="margin-bottom: 0in"> Expanded accessibility to support internationalisation, double-byte characters and right-to-left support for Arabic, Farsi, and Hebrew languages among others</p>   </li><li>     <p style="margin-bottom: 0in"> Extended integration of external applications through Web services and remote authentication such as the Lightweight Directory Access Protocol (LDAP)</p>   </li><li>     <p style="margin-bottom: 0in"> Enhanced content delivery, template and presentation capabilities to support accessibility standards and content delivery to any destination</p>   </li><li>     <p style="margin-bottom: 0in">       A more sustainable and flexible framework for Component and Extension developers</p>   </li><li>     <p style="margin-bottom: 0in">Backward compatibility with previous releases of Components, Templates, Modules, and other Extensions</p></li></ul>', 1, 4, 0, 29, '2008-08-11 22:13:58', 62, '', '2008-08-11 22:13:58', 62, 0, '0000-00-00 00:00:00', '2006-10-10 18:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 1, '', '', 0, 126, 'robots=\nauthor='),
(23, 'Platforms and Open Standards', 'platforms-and-open-standards', '', '<p class="MsoNormal">Joomla! runs on any platform including Windows, most flavours of Linux, several Unix versions, and the Apple OS/X platform.  Joomla! depends on PHP and the MySQL database to deliver dynamic content.  </p>            <p class="MsoNormal">The minimum requirements are:</p>      <ul><li>Apache 1.x, 2.x and higher</li><li>PHP 4.3 and higher</li><li>MySQL 3.23 and higher</li></ul>It will also run on alternative server platforms such as Windows IIS - provided they support PHP and MySQL - but these require additional configuration in order for the Joomla! core package to be successful installed and operated.', '', 1, 4, 0, 25, '2008-08-11 04:22:14', 62, '', '2008-08-11 04:22:14', 62, 0, '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 11, 'robots=\nauthor='),
(24, 'Content Layouts', 'content-layouts', '', '<p>Joomla! provides plenty of flexibility when displaying your Web content. Whether you are using Joomla! for a blog site, news or a Web site for a company, you''ll find one or more content styles to showcase your information. You can also change the style of content dynamically depending on your preferences. Joomla! calls how a page is laid out a <strong>layout</strong>. Use the guide below to understand which layouts are available and how you might use them. </p> <h2>Content </h2> <p>Joomla! makes it extremely easy to add and display content. All content  is placed where your mainbody tag in your template is located. There are three main types of layouts available in Joomla! and all of them can be customised via parameters. The display and parameters are set in the Menu Item used to display the content your working on. You create these layouts by creating a Menu Item and choosing how you want the content to display.</p> <h3>Blog Layout<br /> </h3> <p>Blog layout will show a listing of all Articles of the selected blog type (Section or Category) in the mainbody position of your template. It will give you the standard title, and Intro of each Article in that particular Category and/or Section. You can customise this layout via the use of the Preferences and Parameters, (See Article Parameters) this is done from the Menu not the Section Manager!</p> <h3>Blog Archive Layout<br /> </h3> <p>A Blog Archive layout will give you a similar output of Articles as the normal Blog Display but will add, at the top, two drop down lists for month and year plus a search button to allow Users to search for all Archived Articles from a specific month and year.</p> <h3>List Layout<br /> </h3> <p>Table layout will simply give you a <em>tabular </em>list<em> </em>of all the titles in that particular Section or Category. No Intro text will be displayed just the titles. You can set how many titles will be displayed in this table by Parameters. The table layout will also provide a filter Section so that Users can reorder, filter, and set how many titles are listed on a single page (up to 50)</p> <h2>Wrapper</h2> <p>Wrappers allow you to place stand alone applications and Third Party Web sites inside your Joomla! site. The content within a Wrapper appears within the primary content area defined by the "mainbody" tag and allows you to display their content as a part of your own site. A Wrapper will place an IFRAME into the content Section of your Web site and wrap your standard template navigation around it so it appears in the same way an Article would.</p> <h2>Content Parameters</h2> <p>The parameters for each layout type can be found on the right hand side of the editor boxes in the Menu Item configuration screen. The parameters available depend largely on what kind of layout you are configuring.</p>', '', 1, 4, 0, 29, '2008-08-12 22:33:10', 62, '', '2008-08-12 22:33:10', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 5, '', '', 0, 70, 'robots=\nauthor='),
(25, 'What are the requirements to run Joomla! 1.5?', 'what-are-the-requirements-to-run-joomla-15', '', '<p>Joomla! runs on the PHP pre-processor. PHP comes in many flavours, for a lot of operating systems. Beside PHP you will need a Web server. Joomla! is optimized for the Apache Web server, but it can run on different Web servers like Microsoft IIS it just requires additional configuration of PHP and MySQL. Joomla! also depends on a database, for this currently you can only use MySQL. </p>Many people know from their own experience that it''s not easy to install an Apache Web server and it gets harder if you want to add MySQL, PHP and Perl. XAMPP, WAMP, and MAMP are easy to install distributions containing Apache, MySQL, PHP and Perl for the Windows, Mac OSX and Linux operating systems. These packages are for localhost installations on non-public servers only.<br />The minimum version requirements are:<br /><ul><li>Apache 1.x or 2.x</li><li>PHP 4.3 or up</li><li>MySQL 3.23 or up</li></ul>For the latest minimum requirements details, see <a href="http://www.joomla.org/about-joomla/technical-requirements.html" target="_blank" title="Joomla! Technical Requirements">Joomla! Technical Requirements</a>.', '', 1, 3, 0, 31, '2008-08-11 00:42:31', 62, '', '2008-08-11 00:42:31', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 5, '', '', 0, 25, 'robots=\nauthor='),
(26, 'Extensions', 'extensions', '', '<p>Out of the box, Joomla! does a great job of managing the content needed to make your Web site sing. But for many people, the true power of Joomla! lies in the application framework that makes it possible for developers all around the world to create powerful add-ons that are called <strong>Extensions</strong>. An Extension is used to add capabilities to Joomla! that do not exist in the base core code. Here are just some examples of the hundreds of available Extensions:</p> <ul>   <li>Dynamic form builders</li>   <li>Business or organisational directories</li>   <li>Document management</li>   <li>Image and multimedia galleries</li>   <li>E-commerce and shopping cart engines</li>   <li>Forums and chat software</li>   <li>Calendars</li>   <li>E-mail newsletters</li>   <li>Data collection and reporting tools</li>   <li>Banner advertising systems</li>   <li>Paid subscription services</li>   <li>and many, many, more</li> </ul> <p>You can find more examples over at our ever growing <a href="http://extensions.joomla.org" target="_blank" title="Joomla! Extensions Directory">Joomla! Extensions Directory</a>. Prepare to be amazed at the amount of exciting work produced by our active developer community!</p><p>A useful guide to the Extension site can be found at:<br /><a href="http://extensions.joomla.org/content/view/15/63/" target="_blank" title="Guide to the Joomla! Extension site">http://extensions.joomla.org/content/view/15/63/</a> </p> <h3>Types of Extensions </h3><p>There are five types of extensions:</p> <ul>   <li>Components</li>   <li>Modules</li>   <li>Templates</li>   <li>Plugins</li>   <li>Languages</li> </ul> <p>You can read more about the specifics of these using the links in the Article Index - a Table of Contents (yet another useful feature of Joomla!) - at the top right or by clicking on the <strong>Next </strong>link below.<br /> </p> <hr title="Components" class="system-pagebreak" /> <h3><img src="images/stories/ext_com.png" border="0" alt="Component - Joomla! Extension Directory" title="Component - Joomla! Extension Directory" width="17" height="17" /> Components</h3> <p>A Component is the largest and most complex of the Extension types.  Components are like mini-applications that render the main body of the  page. An analogy that might make the relationship easier to understand  would be that Joomla! is a book and all the Components are chapters in  the book. The core Article Component (<font face="courier new,courier">com_content</font>), for example, is the  mini-application that handles all core Article rendering just as the  core registration Component (<font face="courier new,courier">com_user</font>) is the mini-application  that handles User registration.</p> <p>Many of Joomla!''s core features are provided by the use of default Components such as:</p> <ul>   <li>Contacts</li>   <li>Front Page</li>   <li>News Feeds</li>   <li>Banners</li>   <li>Mass Mail</li>   <li>Polls</li></ul><p>A Component will manage data, set displays, provide functions, and in general can perform any operation that does not fall under the general functions of the core code.</p> <p>Components work hand in hand with Modules and Plugins to provide a rich variety of content display and functionality aside from the standard Article and content display. They make it possible to completely transform Joomla! and greatly expand its capabilities.</p>  <hr title="Modules" class="system-pagebreak" /> <h3><img src="images/stories/ext_mod.png" border="0" alt="Module - Joomla! Extension Directory" title="Module - Joomla! Extension Directory" width="17" height="17" /> Modules</h3> <p>A more lightweight and flexible Extension used for page rendering is a Module. Modules are used for small bits of the page that are generally  less complex and able to be seen across different Components. To  continue in our book analogy, a Module can be looked at as a footnote  or header block, or perhaps an image/caption block that can be rendered  on a particular page. Obviously you can have a footnote on any page but  not all pages will have them. Footnotes also might appear regardless of  which chapter you are reading. Simlarly Modules can be rendered  regardless of which Component you have loaded.</p> <p>Modules are like little mini-applets that can be placed anywhere on your site. They work in conjunction with Components in some cases and in others are complete stand alone snippets of code used to display some data from the database such as Articles (Newsflash) Modules are usually used to output data but they can also be interactive form items to input data for example the Login Module or Polls.</p> <p>Modules can be assigned to Module positions which are defined in your Template and in the back-end using the Module Manager and editing the Module Position settings. For example, "left" and "right" are common for a 3 column layout. </p> <h4>Displaying Modules</h4> <p>Each Module is assigned to a Module position on your site. If you wish it to display in two different locations you must copy the Module and assign the copy to display at the new location. You can also set which Menu Items (and thus pages) a Module will display on, you can select all Menu Items or you can pick and choose by holding down the control key and selecting multiple locations one by one in the Modules [Edit] screen</p> <p>Note: Your Main Menu is a Module! When you create a new Menu in the Menu Manager you are actually copying the Main Menu Module (<font face="courier new,courier">mod_mainmenu</font>) code and giving it the name of your new Menu. When you copy a Module you do not copy all of its parameters, you simply allow Joomla! to use the same code with two separate settings.</p> <h4>Newsflash Example</h4> <p>Newsflash is a Module which will display Articles from your site in an assignable Module position. It can be used and configured to display one Category, all Categories, or to randomly choose Articles to highlight to Users. It will display as much of an Article as you set, and will show a <em>Read more...</em> link to take the User to the full Article.</p> <p>The Newsflash Component is particularly useful for things like Site News or to show the latest Article added to your Web site.</p>  <hr title="Plugins" class="system-pagebreak" /> <h3><img src="images/stories/ext_plugin.png" border="0" alt="Plugin - Joomla! Extension Directory" title="Plugin - Joomla! Extension Directory" width="17" height="17" /> Plugins</h3> <p>One  of the more advanced Extensions for Joomla! is the Plugin. In previous  versions of Joomla! Plugins were known as Mambots. Aside from changing their name their  functionality has been expanded. A Plugin is a section of code that  runs when a pre-defined event happens within Joomla!. Editors are Plugins, for example, that execute when the Joomla! event <font face="courier new,courier">onGetEditorArea</font> occurs. Using a Plugin allows a developer to change  the way their code behaves depending upon which Plugins are installed  to react to an event.</p>  <hr title="Languages" class="system-pagebreak" /> <h3><img src="images/stories/ext_lang.png" border="0" alt="Language - Joomla! Extensions Directory" title="Language - Joomla! Extensions Directory" width="17" height="17" /> Languages</h3> <p>New  to Joomla! 1.5 and perhaps the most basic and critical Extension is a Language. Joomla! is released with multiple Installation Languages but the base Site and Administrator are packaged in just the one Language <strong>en-GB</strong> - being English with GB spelling for example. To include all the translations currently available would bloat the core package and make it unmanageable for uploading purposes. The Language files enable all the User interfaces both Front-end and Back-end to be presented in the local preferred language. Note these packs do not have any impact on the actual content such as Articles. </p> <p>More information on languages is available from the <br />   <a href="http://community.joomla.org/translations.html" target="_blank" title="Joomla! Translation Teams">http://community.joomla.org/translations.html</a></p>', '', 1, 4, 0, 29, '2008-08-11 06:00:00', 62, '', '2008-08-11 06:00:00', 62, 0, '0000-00-00 00:00:00', '2006-10-10 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 24, 0, 3, 'About Joomla!, General, Extensions', '', 0, 102, 'robots=\nauthor=');
INSERT INTO `bak_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(27, 'The Joomla! Community', 'the-joomla-community', '', '<p><strong>Got a question? </strong>With more than 210,000 members, the Joomla! Discussion Forums at <a href="http://forum.joomla.org/" target="_blank" title="Forums">forum.joomla.org</a> are a great resource for both new and experienced users. Ask your toughest questions the community is waiting to see what you''ll do with your Joomla! site.</p><p><strong>Do you want to show off your new Joomla! Web site?</strong> Visit the <a href="http://forum.joomla.org/viewforum.php?f=514" target="_blank" title="Site Showcase">Site Showcase</a>Â section of our forum.</p><p><strong>Do you want to contribute?</strong></p><p>If you think working with Joomla is fun, wait until you start working on it. We''re passionate about helping Joomla users become contributors. There are many ways you can help Joomla''s development:</p><ul>	<li>Submit news about Joomla. We syndicate Joomla-related news on <a href="http://news.joomla.org" target="_blank" title="JoomlaConnect">JoomlaConnect<sup>TM</sup></a>. If you have Joomla news that you would like to share with the community, find out how to get connectedÂ <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">here</a>.</li>	<li>Report bugs and request features in our <a href="http://joomlacode.org/gf/project/joomla/tracker/" target="_blank" title="Joomla! developement trackers">trackers</a>. Please read <a href="http://docs.joomla.org/Filing_bugs_and_issues" target="_blank" title="Reporting Bugs">Reporting Bugs</a>, for details on how we like our bug reports served up</li><li>Submit patches for new and/or fixed behaviour. Please read <a href="http://docs.joomla.org/Patch_submission_guidelines" target="_blank" title="Submitting Patches">Submitting Patches</a>, for details on how to submit a patch.</li><li>Join the <a href="http://forum.joomla.org/viewforum.php?f=509" target="_blank" title="Joomla! development forums">developer forums</a> and share your ideas for how to improve Joomla. We''re always open to suggestions, although we''re likely to be sceptical of large-scale suggestions without some code to back it up.</li><li>Join any of the <a href="http://www.joomla.org/about-joomla/the-project/working-groups.html" target="_blank" title="Joomla! working groups">Joomla Working Groups</a> and bring your personal expertise to the Joomla community.Â </li></ul><p>These are just a few ways you can contribute. SeeÂ <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank" title="Contribute">Contribute to Joomla</a>Â for many more ways.</p>', '', 1, 4, 0, 30, '2008-08-12 16:50:48', 62, '', '2008-08-12 16:50:48', 62, 0, '0000-00-00 00:00:00', '2006-10-11 02:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 2, '', '', 0, 52, 'robots=\nauthor='),
(28, 'How do I install Joomla! 1.5?', 'how-do-i-install-joomla-15', '', '<p>Installing of Joomla! 1.5 is pretty easy. We assume you have set-up your Web site, and it is accessible with your browser.<br /><br />Download Joomla! 1.5, unzip it and upload/copy the files into the directory you Web site points to, fire up your browser and enter your Web site address and the installation will start.  </p><p>For full details on the installation processes check out the <a href="http://help.joomla.org/content/category/48/268/302" target="_blank" title="Joomla! 1.5 Installation Manual">Installation Manual</a> on the <a href="http://help.joomla.org" target="_blank" title="Joomla! Help Site">Joomla! Help Site</a> where you will also find download instructions for a PDF version too. </p>', '', 1, 3, 0, 31, '2008-08-11 01:10:59', 62, '', '2008-08-11 01:10:59', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 3, '', '', 0, 6, 'robots=\nauthor='),
(29, 'What is the purpose of the collation selection in the installation screen?', 'what-is-the-purpose-of-the-collation-selection-in-the-installation-screen', '', 'The collation option determines the way ordering in the database is done. In languages that use special characters, for instance the German umlaut, the database collation determines the sorting order. If you don''t know which collation you need, select the "utf8_general_ci" as most languages use this. The other collations listed are exceptions in regards to the general collation. If your language is not listed in the list of collations it most likely means that "utf8_general_ci is suitable.', '', 1, 3, 0, 32, '2008-08-11 03:11:38', 62, '', '2008-08-11 03:11:38', 62, 0, '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', 4, 0, 4, '', '', 0, 6, 'robots=\nauthor='),
(30, 'What languages are supported by Joomla! 1.5?', 'what-languages-are-supported-by-joomla-15', '', 'Within the Installer you will find a wide collection of languages. The installer currently supports the following languages: Arabic, Bulgarian, Bengali, Czech, Danish, German, Greek, English, Spanish, Finnish, French, Hebrew, Devanagari(India), Croatian(Croatia), Magyar (Hungary), Italian, Malay, Norwegian bokmal, Dutch, Portuguese(Brasil), Portugues(Portugal), Romanian, Russian, Serbian, Svenska, Thai and more are being added all the time.<br />By default the English language is installed for the Back and Front-ends. You can download additional language files from the <a href="http://extensions.joomla.org" target="_blank" title="Joomla! Extensions Directory">Joomla!Extensions Directory</a>. ', '', 1, 3, 0, 32, '2008-08-11 01:12:18', 62, '', '2008-08-11 01:12:18', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 2, '', '', 0, 8, 'robots=\nauthor='),
(31, 'Is it useful to install the sample data?', 'is-it-useful-to-install-the-sample-data', '', 'Well you are reading it right now! This depends on what you want to achieve. If you are new to Joomla! and have no clue how it all fits together, just install the sample data. If you don''t like the English sample data because you - for instance - speak Chinese, then leave it out.', '', 1, 3, 0, 27, '2008-08-11 09:12:55', 62, '', '2008-08-11 09:12:55', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 3, '', '', 0, 3, 'robots=\nauthor='),
(32, 'Where is the Static Content Item?', 'where-is-the-static-content', '', '<p>In Joomla! versions prior to 1.5 there were separate processes for creating a Static Content Item and normal Content Items. The processes have been combined now and whilst both content types are still around they are renamed as Articles for Content Items and Uncategorized Articles for Static Content Items. </p><p>If you want to create a static item, create a new Article in the same way as for standard content and rather than relating this to a particular Section and Category just select <span style="font-style: italic">Uncategorized</span> as the option in the Section and Category drop down lists.</p>', '', 1, 3, 0, 28, '2008-08-10 23:13:33', 62, '', '2008-08-10 23:13:33', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 6, '', '', 0, 5, 'robots=\nauthor='),
(33, 'What is an Uncategorised Article?', 'what-is-uncategorised-article', '', 'Most Articles will be assigned to a Section and Category. In many cases, you might not know where you want it to appear so put the Article in the <em>Uncategorized </em>Section/Category. The Articles marked as <em>Uncategorized </em>are handled as static content.', '', 1, 3, 0, 31, '2008-08-11 15:14:11', 62, '', '2008-08-11 15:14:11', 62, 0, '0000-00-00 00:00:00', '2006-10-10 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 2, '', '', 0, 6, 'robots=\nauthor='),
(34, 'Does the PDF icon render pictures and special characters?', 'does-the-pdf-icon-render-pictures-and-special-characters', '', 'Yes! Prior to Joomla! 1.5, only the text values of an Article and only for ISO-8859-1 encoding was allowed in the PDF rendition. With the new PDF library in place, the complete Article including images is rendered and applied to the PDF. The PDF generator also handles the UTF-8 texts and can handle any character sets from any language. The appropriate fonts must be installed but this is done automatically during a language pack installation.', '', 1, 3, 0, 32, '2008-08-11 17:14:57', 62, '', '2008-08-11 17:14:57', 62, 0, '0000-00-00 00:00:00', '2006-10-10 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 6, 'robots=\nauthor='),
(35, 'Is it possible to change A Menu Item''s Type?', 'is-it-possible-to-change-the-types-of-menu-entries', '', '<p>You indeed can change the Menu Item''s Type to whatever you want, even after they have been created. </p><p>If, for instance, you want to change the Blog Section of a Menu link, go to the Control Panel-&gt;Menus Menu-&gt;[menuname]-&gt;Menu Item Manager and edit the Menu Item. Select the <strong>Change Type</strong> button and choose the new style of Menu Item Type from the available list. Thereafter, alter the Details and Parameters to reconfigure the display for the new selection  as you require it.</p>', '', 1, 3, 0, 31, '2008-08-10 23:15:36', 62, '', '2008-08-10 23:15:36', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 1, '', '', 0, 18, 'robots=\nauthor='),
(36, 'Where did the Installers go?', 'where-did-the-installer-go', '', 'The improved Installer can be found under the Extensions Menu. With versions prior to Joomla! 1.5 you needed to select a specific Extension type when you wanted to install it and use the Installer associated with it, with Joomla! 1.5 you just select the Extension you want to upload, and click on install. The Installer will do all the hard work for you.', '', 1, 3, 0, 28, '2008-08-10 23:16:20', 62, '', '2008-08-10 23:16:20', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 1, '', '', 0, 4, 'robots=\nauthor='),
(37, 'Where did the Mambots go?', 'where-did-the-mambots-go', '', '<p>Mambots have been renamed as Plugins. </p><p>Mambots were introduced in Mambo and offered possibilities to add plug-in logic to your site mainly for the purpose of manipulating content. In Joomla! 1.5, Plugins will now have much broader capabilities than Mambots. Plugins are able to extend functionality at the framework layer as well.</p>', '', 1, 3, 0, 28, '2008-08-11 09:17:00', 62, '', '2008-08-11 09:17:00', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 5, '', '', 0, 4, 'robots=\nauthor='),
(38, 'I installed with my own language, but the Back-end is still in English', 'i-installed-with-my-own-language-but-the-back-end-is-still-in-english', '', '<p>A lot of different languages are available for the Back-end, but by default this language may not be installed. If you want a translated Back-end, get your language pack and install it using the Extension Installer. After this, go to the Extensions Menu, select Language Manager and make your language the default one. Your Back-end will be translated immediately.</p><p>Users who have access rights to the Back-end may choose the language they prefer in their Personal Details parameters. This is of also true for the Front-end language.</p><p> A good place to find where to download your languages and localised versions of Joomla! is <a href="http://extensions.joomla.org/index.php?option=com_mtree&task=listcats&cat_id=1837&Itemid=35" target="_blank" title="Translations for Joomla!">Translations for Joomla!</a> on JED.</p>', '', 1, 3, 0, 32, '2008-08-11 17:18:14', 62, '', '2008-08-11 17:18:14', 62, 0, '0000-00-00 00:00:00', '2006-10-10 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 1, '', '', 0, 7, 'robots=\nauthor='),
(39, 'How do I remove an Article?', 'how-do-i-remove-an-article', '', '<p>To completely remove an Article, select the Articles that you want to delete and move them to the Trash. Next, open the Article Trash in the Content Menu and select the Articles you want to delete. After deleting an Article, it is no longer available as it has been deleted from the database and it is not possible to undo this operation.  </p>', '', 1, 3, 0, 27, '2008-08-11 09:19:01', 62, '', '2008-08-11 09:19:01', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 2, '', '', 0, 4, 'robots=\nauthor='),
(40, 'What is the difference between Archiving and Trashing an Article? ', 'what-is-the-difference-between-archiving-and-trashing-an-article', '', '<p>When you <em>Archive </em>an Article, the content is put into a state which removes it from your site as published content. The Article is still available from within the Control Panel and can be <em>retrieved </em>for editing or republishing purposes. Trashed Articles are just one step from being permanently deleted but are still available until you Remove them from the Trash Manager. You should use Archive if you consider an Article important, but not current. Trash should be used when you want to delete the content entirely from your site and from future search results.  </p>', '', 1, 3, 0, 27, '2008-08-11 05:19:43', 62, '', '2008-08-11 05:19:43', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 1, '', '', 0, 5, 'robots=\nauthor='),
(41, 'Newsflash 5', 'newsflash-5', '', 'Joomla! 1.5 - ''Experience the Freedom''!. It has never been easier to create your own dynamic Web site. Manage all your content from the best CMS admin interface and in virtually any language you speak.', '', 1, 1, 0, 3, '2008-08-12 00:17:31', 62, '', '2008-08-12 00:17:31', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 2, '', '', 0, 4, 'robots=\nauthor='),
(42, 'Newsflash 4', 'newsflash-4', '', 'Yesterday all servers in the U.S. went out on strike in a bid to get more RAM and better CPUs. A spokes person said that the need for better RAM was due to some fool increasing the front-side bus speed. In future, buses will be told to slow down in residential motherboards.', '', 1, 1, 0, 3, '2008-08-12 00:25:50', 62, '', '2008-08-12 00:25:50', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 1, '', '', 0, 5, 'robots=\nauthor='),
(43, 'Example Pages and Menu Links', 'example-pages-and-menu-links', '', '<p>This page is an example of content that is <em>Uncategorized</em>; that is, it does not belong to any Section or Category. You will see there is a new Menu in the left column. It shows links to the same content presented in 4 different page layouts.</p><ul><li>Section Blog</li><li>Section Table</li><li> Blog Category</li><li>Category Table</li></ul><p>Follow the links in the <strong>Example Pages</strong> Menu to see some of the options available to you to present all the different types of content included within the default installation of Joomla!.</p><p>This includes Components and individual Articles. These links or Menu Item Types (to give them their proper name) are all controlled from within the <strong><font face="courier new,courier">Menu Manager-&gt;[menuname]-&gt;Menu Items Manager</font></strong>. </p>', '', 1, 0, 0, 0, '2008-08-12 09:26:52', 62, '', '2008-08-12 09:26:52', 62, 0, '0000-00-00 00:00:00', '2006-10-11 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 1, 'Uncategorized, Uncategorized, Example Pages and Menu Links', '', 0, 43, 'robots=\nauthor='),
(44, 'Joomla! Security Strike Team', 'joomla-security-strike-team', '', '<p>The Joomla! Project has assembled a top-notch team of experts to form the new Joomla! Security Strike Team. This new team will solely focus on investigating and resolving security issues. Instead of working in relative secrecy, the JSST will have a strong public-facing presence at the <a href="http://developer.joomla.org/security.html" target="_blank" title="Joomla! Security Center">Joomla! Security Center</a>.</p>', '<p>The new JSST will call the new <a href="http://developer.joomla.org/security.html" target="_blank" title="Joomla! Security Center">Joomla! Security Center</a> their home base. The Security Center provides a public presence for <a href="http://developer.joomla.org/security/news.html" target="_blank" title="Joomla! Security News">security issues</a> and a platform for the JSST to <a href="http://developer.joomla.org/security/articles-tutorials.html" target="_blank" title="Joomla! Security Articles">help the general public better understand security</a> and how it relates to Joomla!. The Security Center also offers users a clearer understanding of how security issues are handled. There''s also a <a href="http://feeds.joomla.org/JoomlaSecurityNews" target="_blank" title="Joomla! Security News Feed">news feed</a>, which provides subscribers an up-to-the-minute notification of security issues as they arise.</p>', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 3, '', '', 0, 2, 'robots=\nauthor='),
(45, 'Joomla! Community Portal', 'joomla-community-portal', '', '<p>The <a href="http://community.joomla.org/" target="_blank" title="Joomla! Community Portal">Joomla! Community Portal</a> is now online. There, you will find a constant source of information about the activities of contributors powering the Joomla! Project. Learn about <a href="http://community.joomla.org/events.html" target="_blank" title="Joomla! Events">Joomla! Events</a> worldwide, and see if there is a <a href="http://community.joomla.org/user-groups.html" target="_blank" title="Joomla! User Groups">Joomla! User Group</a> nearby.</p><p>The <a href="http://community.joomla.org/magazine.html" target="_blank" title="Joomla! Community Magazine">Joomla! Community Magazine</a> promises an interesting overview of feature articles, community accomplishments, learning topics, and project updates each month. Also, check out <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">JoomlaConnect&#0153;</a>. This aggregated RSS feed brings together Joomla! news from all over the world in your language. Get the latest and greatest by clicking <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">here</a>.</p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 2, '', '', 0, 5, 'robots=\nauthor='),
(46, 'Socom in Europe', 'socom-in-europe', '', '<p align="justify"><img class="caption" src="images/stories/demo/socom.png" border="0" alt="Only in 2009, Europe will play next Socom!" title="Only in 2009, Europe will play next Socom!" hspace="3" align="left" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 35, '2009-01-14 15:55:10', 62, '', '2009-01-14 19:40:11', 62, 0, '0000-00-00 00:00:00', '2009-01-14 15:55:10', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 3, '', '', 0, 0, 'robots=\nauthor='),
(47, 'Beyond Good and Evil', 'beyondgoodandevil', '', '<p align="justify"><img class="caption" src="images/stories/demo/beyond_good_and_evil.png" border="0" alt="Beyong Good and Evil" title="Beyong Good and Evil" align="left" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 36, '2009-01-14 16:07:53', 62, '', '2009-01-14 19:31:54', 62, 0, '0000-00-00 00:00:00', '2009-01-14 16:07:53', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 3, '', '', 0, 1, 'robots=\nauthor='),
(48, 'Resident Evil on next Generation', 'resident-evil-on-next-generation', '', '<img class="caption" src="images/stories/demo/resident-evil.png" border="0" alt="Resident Evil most terrible than ever" title="Resident Evil most terrible than ever" align="right" /> <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 34, '2009-01-14 16:17:33', 62, '', '2009-01-14 19:35:01', 62, 0, '0000-00-00 00:00:00', '2009-01-14 16:17:33', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 3, '', '', 0, 0, 'robots=\nauthor='),
(49, 'Big spectation for Gran Turism 6', 'big-spectation-for-gran-turism-6', '', '<p align="justify"><img class="caption" src="images/stories/demo/gturismo_wait.png" border="0" alt="We can''t wait for Gran Turism" title="We can''t wait for Gran Turism" align="left" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 34, '2009-01-14 16:21:13', 62, '', '2009-01-14 19:35:56', 62, 0, '0000-00-00 00:00:00', '2009-01-14 16:21:13', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 2, '', '', 0, 1, 'robots=\nauthor='),
(50, 'Sonic Riders once again!', 'sonic-riders-once-again', '', '<img class="caption" src="images/stories/demo/sonic_riders.png" border="0" alt="Sonic Riders - Now, with more friends!" title="Sonic Riders - Now, with more friends!" align="right" /> <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 35, '2009-01-14 16:26:13', 62, '', '2009-01-14 19:38:49', 62, 0, '0000-00-00 00:00:00', '2009-01-14 16:26:13', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 2, '', '', 0, 0, 'robots=\nauthor='),
(51, 'Street Fighters IV on 2009', 'street-fighters-iv-on-2009', '', '<img class="caption" src="images/stories/demo/bison-vega-street-fighter4.png" border="0" alt="The street fight still hangs on" title="The street fight still hangs on" align="left" /> <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 34, '2009-01-14 16:34:19', 62, '', '2009-01-14 19:39:26', 62, 0, '0000-00-00 00:00:00', '2009-01-14 16:34:19', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 1, '', '', 0, 26, 'robots=\nauthor='),
(52, 'Some rumors...', 'some-rumors', '', '<img class="caption" src="images/stories/demo/assassins_creed.png" border="0" alt="Assassins Creed - He is coming back for more!" title="Assassins Creed - He is coming back for more!" align="right" /> <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 35, '2009-01-14 16:39:32', 62, '', '2009-01-14 19:38:12', 62, 0, '0000-00-00 00:00:00', '2009-01-14 16:39:32', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 1, '', '', 0, 1, 'robots=\nauthor=');
INSERT INTO `bak_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(53, 'Pro Evolution 2009', 'pro-evolution-2009', '', '<img class="caption" src="images/stories/demo/pes2009.png" border="0" alt="Pro Evolution 2009 - Still the Best!" title="Pro Evolution 2009 - Still the Best!" align="left" /> <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 36, '2009-01-14 16:55:56', 62, '', '2009-01-14 19:36:29', 62, 0, '0000-00-00 00:00:00', '2009-01-14 16:55:56', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 2, '', '', 0, 1, 'robots=\nauthor='),
(54, 'Halo 3', 'halo-3', '', '<img class="caption" src="images/stories/demo/halo-3.png" border="0" alt="Halo 3 - Was it the end?" title="Halo 3 - Was it the end?" align="right" /> <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p align="justify">Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p align="justify">Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p align="justify">Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede leo ullamcorper orci. Cras adipiscing, odio sit amet volutpat facilisis, libero arcu placerat velit, et euismod magna risus a risus. Aliquam vehicula nunc vel sapien. Nunc gravida. Integer pede nibh, interdum vel, tincidunt et, consequat porta, quam. Duis in nisi. Aliquam tortor. Vestibulum tempus lacinia dui. In rhoncus ligula sed velit. In vel diam. Phasellus faucibus. Mauris euismod eleifend orci. Phasellus felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse in magna. Sed nisl. Fusce sem. </p>', '', 1, 5, 0, 36, '2009-01-14 17:07:45', 62, '', '2009-01-14 19:37:41', 62, 0, '0000-00-00 00:00:00', '2009-01-14 17:07:45', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 1, '', '', 0, 3, 'robots=\nauthor=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_content_frontpage`
--

CREATE TABLE IF NOT EXISTS `bak_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_content_frontpage`
--

INSERT INTO `bak_content_frontpage` (`content_id`, `ordering`) VALUES
(45, 1),
(6, 2),
(44, 3),
(5, 4),
(9, 5),
(30, 6),
(16, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_content_rating`
--

CREATE TABLE IF NOT EXISTS `bak_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_core_acl_aro`
--

CREATE TABLE IF NOT EXISTS `bak_core_acl_aro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_value` varchar(240) NOT NULL DEFAULT '0',
  `value` varchar(240) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `bak_core_acl_aro`
--

INSERT INTO `bak_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', '62', 0, 'Administrator', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_core_acl_aro_groups`
--

CREATE TABLE IF NOT EXISTS `bak_core_acl_aro_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `bak_core_acl_aro_groups`
--

INSERT INTO `bak_core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`) VALUES
(17, 0, 'ROOT', 1, 22, 'ROOT'),
(28, 17, 'USERS', 2, 21, 'USERS'),
(29, 28, 'Public Frontend', 3, 12, 'Public Frontend'),
(18, 29, 'Registered', 4, 11, 'Registered'),
(19, 18, 'Author', 5, 10, 'Author'),
(20, 19, 'Editor', 6, 9, 'Editor'),
(21, 20, 'Publisher', 7, 8, 'Publisher'),
(30, 28, 'Public Backend', 13, 20, 'Public Backend'),
(23, 30, 'Manager', 14, 19, 'Manager'),
(24, 23, 'Administrator', 15, 18, 'Administrator'),
(25, 24, 'Super Administrator', 16, 17, 'Super Administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_core_acl_aro_map`
--

CREATE TABLE IF NOT EXISTS `bak_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(230) NOT NULL DEFAULT '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_core_acl_aro_sections`
--

CREATE TABLE IF NOT EXISTS `bak_core_acl_aro_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(230) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(230) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `bak_core_acl_aro_sections`
--

INSERT INTO `bak_core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', 1, 'Users', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_core_acl_groups_aro_map`
--

CREATE TABLE IF NOT EXISTS `bak_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(240) NOT NULL DEFAULT '',
  `aro_id` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_core_acl_groups_aro_map`
--

INSERT INTO `bak_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES
(25, '', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_core_log_items`
--

CREATE TABLE IF NOT EXISTS `bak_core_log_items` (
  `time_stamp` date NOT NULL DEFAULT '0000-00-00',
  `item_table` varchar(50) NOT NULL DEFAULT '',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_core_log_searches`
--

CREATE TABLE IF NOT EXISTS `bak_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk2_photoslide_extensions`
--

CREATE TABLE IF NOT EXISTS `bak_gk2_photoslide_extensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `phpclassfile` varchar(255) NOT NULL,
  `version` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `desc` mediumtext NOT NULL,
  `storage` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bak_gk2_photoslide_extensions`
--

INSERT INTO `bak_gk2_photoslide_extensions` (`id`, `name`, `status`, `type`, `filename`, `phpclassfile`, `version`, `author`, `desc`, `storage`) VALUES
(1, 'GK EasyLinks', 1, 'extension', 'ext_easylinks.xml', 'ext_easylinks.php', '1.0', 'GavickPro', 'Interface extension to add easy way of preview and settings', ''),
(2, 'GK Rainbow', 1, 'extension', 'ext_rainbow.xml', 'ext_rainbow.php', '1.0', 'GavickPro', 'Interface extension to add easy way of selecting colors', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk2_photoslide_groups`
--

CREATE TABLE IF NOT EXISTS `bak_gk2_photoslide_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `plugin` varchar(255) NOT NULL,
  `mediumThumbX` int(11) NOT NULL DEFAULT '0',
  `mediumThumbY` int(11) NOT NULL DEFAULT '0',
  `bgcolor` varchar(32) NOT NULL DEFAULT '',
  `rows` int(11) NOT NULL DEFAULT '0',
  `cols` int(11) NOT NULL DEFAULT '0',
  `wordcount1` int(11) NOT NULL DEFAULT '0',
  `wordcount2` int(11) NOT NULL DEFAULT '0',
  `show_title` int(1) NOT NULL DEFAULT '0',
  `show_text` int(1) NOT NULL DEFAULT '0',
  `show_price` int(1) NOT NULL DEFAULT '0',
  `show_link` int(1) NOT NULL DEFAULT '0',
  `quality` int(3) NOT NULL DEFAULT '75',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bak_gk2_photoslide_groups`
--

INSERT INTO `bak_gk2_photoslide_groups` (`id`, `name`, `plugin`, `mediumThumbX`, `mediumThumbY`, `bgcolor`, `rows`, `cols`, `wordcount1`, `wordcount2`, `show_title`, `show_text`, `show_price`, `show_link`, `quality`) VALUES
(1, 'Header - Demo content', 'GK VM Header Rotator II', 297, 149, 'transparent', 2, 3, 7, 19, 1, 1, 1, 1, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk2_photoslide_plugins`
--

CREATE TABLE IF NOT EXISTS `bak_gk2_photoslide_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `phpclassfile` varchar(255) NOT NULL,
  `version` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `desc` mediumtext NOT NULL,
  `gfields` mediumtext NOT NULL,
  `sfields` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bak_gk2_photoslide_plugins`
--

INSERT INTO `bak_gk2_photoslide_plugins` (`id`, `name`, `status`, `type`, `filename`, `phpclassfile`, `version`, `author`, `desc`, `gfields`, `sfields`) VALUES
(1, 'GK VM Header Rotator II', 1, 'module', 'plg_gk2_vm_header_rotator_2.xml', 'plg_gk2_vm_header_rotator_2.php', '1.0', 'GavickPro', 'XML file for module Gavick VirtueMart Header rotator', 'mediumThumbX,mediumThumbY,bgcolor,rows,cols,wordcount1,wordcount2,show_title,show_text,show_price,show_link,quality', 'product,stretch');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk2_photoslide_slides`
--

CREATE TABLE IF NOT EXISTS `bak_gk2_photoslide_slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `published` int(1) NOT NULL,
  `access` int(1) NOT NULL,
  `file` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `product` int(11) NOT NULL DEFAULT '0',
  `stretch` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `bak_gk2_photoslide_slides`
--

INSERT INTO `bak_gk2_photoslide_slides` (`id`, `group_id`, `name`, `published`, `access`, `file`, `order`, `product`, `stretch`) VALUES
(25, 1, 'Slide - 6', 1, 0, '160596mada.png', 6, 10, 1),
(24, 1, 'Slide - 5', 1, 0, '212551ghostrecon.png', 5, 31, 1),
(22, 1, 'Slide - 4 ', 1, 0, '270332planetscape.png', 4, 38, 1),
(21, 1, 'Slide - 3', 0, 0, '624545gear.png', 3, 25, 1),
(20, 1, 'Slide - 2', 1, 0, '804388Little_big_planet.png', 2, 33, 1),
(19, 1, 'Slide - 1', 1, 0, '845229img1.jpg', 1, 30, 1),
(26, 1, 'Slide - 7', 1, 0, '911664Haze.png', 7, 32, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk3_photoslide_groups`
--

CREATE TABLE IF NOT EXISTS `bak_gk3_photoslide_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `type` varchar(32) NOT NULL,
  `thumb_x` int(11) DEFAULT NULL,
  `thumb_y` int(11) DEFAULT NULL,
  `image_x` int(11) NOT NULL,
  `image_y` int(11) NOT NULL,
  `background` varchar(11) NOT NULL,
  `default_quality` int(3) NOT NULL,
  `default_image` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bak_gk3_photoslide_groups`
--

INSERT INTO `bak_gk3_photoslide_groups` (`id`, `name`, `desc`, `type`, `thumb_x`, `thumb_y`, `image_x`, `image_y`, `background`, `default_quality`, `default_image`) VALUES
(1, 'Demo', 'Demo Header', 'Image Show 1', 100, 100, 673, 262, 'transparent', 99, 0),
(2, 'Gallery', 'Photo Gallery', 'Image Show 1', 70, 70, 600, 600, '#ffffff', 95, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk3_photoslide_options`
--

CREATE TABLE IF NOT EXISTS `bak_gk3_photoslide_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `bak_gk3_photoslide_options`
--

INSERT INTO `bak_gk3_photoslide_options` (`id`, `name`, `value`) VALUES
(1, 'modal_news', '0'),
(2, 'modal_settings', '1'),
(3, 'group_shortcuts', '1'),
(4, 'slide_shortcuts', '1'),
(5, 'wysiwyg', '1'),
(6, 'gavick_news', '1'),
(7, 'colorpickers', '1'),
(8, 'article_id', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk3_photoslide_slides`
--

CREATE TABLE IF NOT EXISTS `bak_gk3_photoslide_slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `article` int(11) DEFAULT NULL,
  `title` text,
  `link_type` int(2) DEFAULT NULL,
  `link` text,
  `content` text NOT NULL,
  `published` int(2) NOT NULL,
  `access` int(1) NOT NULL,
  `order` int(11) NOT NULL,
  `image_x` int(11) DEFAULT NULL,
  `image_y` int(11) DEFAULT NULL,
  `stretch` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `bak_gk3_photoslide_slides`
--

INSERT INTO `bak_gk3_photoslide_slides` (`id`, `group_id`, `name`, `filename`, `article`, `title`, `link_type`, `link`, `content`, `published`, `access`, `order`, `image_x`, `image_y`, `stretch`) VALUES
(27, 2, 'Slide9', '732921img13.jpg', 43, 'Slide 9', 1, '', '', 1, 0, 17, 0, 0, 0),
(19, 2, 'Slide1', '405334img1.jpg', 25, 'Slide 1', 1, '', '', 1, 0, 9, 0, 0, 0),
(36, 1, 'Slide4', '477807bravia3d.jpg', 43, 'Bravia 3D New Technology', 1, 'vm:PRODUCT=Hotpoint-Ariston Quadrio', '&lt;p&gt;Fusing stunning design with innovative features, BRAVIA TVs offer unparalleled picture performance.&lt;/p&gt;', 1, 0, 1, 0, 0, 0),
(23, 2, 'Slide5', '512407img3.jpg', 43, 'Slide 5', 1, '', '', 1, 0, 13, 0, 0, 0),
(24, 2, 'Slide6', '222309img2.jpg', 43, 'Slide 6', 1, '', '', 1, 0, 14, 0, 0, 0),
(25, 2, 'Slide7', '858126img11.jpg', 43, 'Slide 7', 1, '', '', 1, 0, 15, 0, 0, 0),
(26, 2, 'Slide8', '837881img12.jpg', 43, 'Slide 8', 1, '', '', 1, 0, 16, 0, 0, 0),
(20, 2, 'Slide2', '724198img9.jpg', 43, 'Slide 2', 1, '', '', 1, 0, 10, 0, 0, 0),
(22, 2, 'Slide4', '299998img6.jpg', 43, 'Slide 4', 1, '', '', 1, 0, 12, 0, 0, 0),
(30, 1, 'Slide4', '913810samsung_slide2.jpg', 43, 'Yerger Residence', 0, 'vm:PRODUCT=Hotpoint-Ariston 4D W/HA', '&lt;p&gt;American most popular, beautiful &amp;amp; affordable home.&lt;/p&gt;', 1, 0, 4, 0, 0, 0),
(28, 1, 'Slide1', '628136HomeCinema2.jpg', 43, 'Design Sponge', 0, 'vm:PRODUCT=Dolce Gusto Krupp', '&lt;p&gt;new and innovative furniture for your house&lt;/p&gt;', 1, 0, 3, 0, 0, 1),
(29, 1, 'Slide3', '116871samsung_slide.jpg', 43, 'Moco Loco', 0, 'vm:PRODUCT=Samsung Bio Sleeplus', '&lt;p&gt;complete your imagination, with new sofa furniture collection&lt;/p&gt;', 1, 0, 2, 0, 0, 0),
(21, 2, 'Slide3', '225735img5.jpg', 43, 'Slide 3', 1, '', '', 1, 0, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk3_tabs_manager_groups`
--

CREATE TABLE IF NOT EXISTS `bak_gk3_tabs_manager_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `bak_gk3_tabs_manager_groups`
--

INSERT INTO `bak_gk3_tabs_manager_groups` (`id`, `name`, `desc`) VALUES
(1, 'Demo', 'Demo group'),
(2, 'Headlines', 'Recent Headlins'),
(3, 'Demo variations', 'Group for GK Tab module variations');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk3_tabs_manager_options`
--

CREATE TABLE IF NOT EXISTS `bak_gk3_tabs_manager_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `bak_gk3_tabs_manager_options`
--

INSERT INTO `bak_gk3_tabs_manager_options` (`id`, `name`, `value`) VALUES
(1, 'modal_news', '0'),
(2, 'modal_settings', '1'),
(3, 'group_shortcuts', '1'),
(4, 'tab_shortcuts', '1'),
(5, 'wysiwyg', '1'),
(6, 'gavick_news', '1'),
(7, 'article_id', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_gk3_tabs_manager_tabs`
--

CREATE TABLE IF NOT EXISTS `bak_gk3_tabs_manager_tabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `published` int(2) NOT NULL,
  `access` int(1) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `bak_gk3_tabs_manager_tabs`
--

INSERT INTO `bak_gk3_tabs_manager_tabs` (`id`, `group_id`, `name`, `type`, `content`, `published`, `access`, `order`) VALUES
(1, 1, 'XHTML', 'xhtml', '&lt;p&gt;\r\n&lt;object width=\\&quot;400\\&quot; height=\\&quot;225\\&quot; data=\\&quot;http://vimeo.com/moogaloop.swf?clip_id=9770349&amp;amp;server=vimeo.com&amp;amp;show_title=0&amp;amp;show_byline=0&amp;amp;show_portrait=0&amp;amp;color=A44040&amp;amp;fullscreen=1&amp;amp;autoplay=0&amp;amp;loop=0\\&quot; type=\\&quot;application/x-shockwave-flash\\&quot;&gt;\r\n&lt;param name=\\&quot;movie\\&quot; value=\\&quot;http://vimeo.com/moogaloop.swf?clip_id=9770349&amp;amp;server=vimeo.com&amp;amp;show_title=0&amp;amp;show_byline=0&amp;amp;show_portrait=0&amp;amp;color=A44040&amp;amp;fullscreen=1&amp;amp;autoplay=0&amp;amp;loop=0\\&quot; /&gt;\r\n&lt;param name=\\&quot;wmode\\&quot; value=\\&quot;transparent\\&quot; /&gt;\r\n&lt;param name=\\&quot;allowfullscreen\\&quot; value=\\&quot;true\\&quot; /&gt;\r\n&lt;/object&gt;\r\n&lt;/p&gt;', 1, 0, 2),
(2, 1, 'Article', 'article', '64', 1, 0, 3),
(3, 1, 'Module', 'module', 'tab1', 1, 0, 1),
(4, 2, 'After Match News', 'module', 'tab2', 1, 0, 4),
(5, 2, 'Top Rated', 'module', 'tab3', 1, 0, 5),
(6, 2, 'Most Popular', 'module', 'tab4', 1, 0, 6),
(7, 3, 'Module 1', 'module', 'tab1', 1, 0, 7),
(8, 3, 'Module 2', 'module', 'tab1', 1, 0, 8),
(9, 3, 'Module 3', 'module', 'tab1', 1, 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_groups`
--

CREATE TABLE IF NOT EXISTS `bak_groups` (
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_groups`
--

INSERT INTO `bak_groups` (`id`, `name`) VALUES
(0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_jcomments`
--

CREATE TABLE IF NOT EXISTS `bak_jcomments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `object_id` int(11) unsigned NOT NULL DEFAULT '0',
  `object_group` varchar(255) NOT NULL DEFAULT '',
  `object_params` text NOT NULL,
  `lang` varchar(255) NOT NULL DEFAULT '',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `homepage` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `ip` varchar(15) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isgood` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ispoor` smallint(5) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subscribe` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `source` varchar(255) NOT NULL DEFAULT '',
  `source_id` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_userid` (`userid`),
  KEY `idx_source` (`source`),
  KEY `idx_email` (`email`),
  KEY `idx_lang` (`lang`),
  KEY `idx_subscribe` (`subscribe`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_object` (`object_id`,`object_group`,`published`,`date`),
  KEY `idx_path` (`path`,`level`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `bak_jcomments`
--

INSERT INTO `bak_jcomments` (`id`, `parent`, `path`, `level`, `object_id`, `object_group`, `object_params`, `lang`, `userid`, `name`, `username`, `email`, `homepage`, `title`, `comment`, `ip`, `date`, `isgood`, `ispoor`, `published`, `subscribe`, `source`, `source_id`, `checked_out`, `checked_out_time`, `editor`) VALUES
(1, 0, '0', 0, 22, 'com_content', '', 'en-GB', 0, 'Dziudek', 'Dziudek', 'dziudek@gmail.com', 'http://gavick.com', '', 'Vestibulum scelerisque, mi at fermentum lobortis, ante libero commodo nisl, at ornare orci ipsum ac diam. Nam a pharetra velit. Praesent et neque erat. Nulla nec odio vel turpis fermentum laoreet. Nullam aliquet mollis risus vitae feugiat.', '83.26.213.126', '2010-08-31 06:22:05', 2, 0, 1, 0, '', 0, 0, '0000-00-00 00:00:00', ''),
(2, 0, '0', 0, 22, 'com_content', '', 'en-GB', 0, 'Robert Gavick', 'Robert Gavick', 'info@gavick.com', 'http://gavick.com', '', 'Vestibulum scelerisque, mi at fermentum lobortis, ante libero commodo nisl, at ornare orci ipsum ac diam. Nam a pharetra velit. Praesent et neque erat. Nulla nec odio vel turpis fermentum laoreet. Nullam aliquet mollis risus vitae feugiat.<br />Nam et laoreet risus. Maecenas non orci ipsum, sit amet mollis turpis. Duis aliquam elit vel neque mollis iaculis. Suspendisse a nibh odio.Nam et laoreet risus. Maecenas non orci ipsum, sit amet mollis turpis. Duis aliquam elit vel neque mollis iaculis. Suspendisse a nibh odio.<br /><br />[quote name="Dziudek"]Lorem ipsum dolor sit amet.[/quote]<br />Lorem ipsum dolor sit amet.', '83.26.213.126', '2010-08-31 06:34:37', 0, 2, 1, 0, '', 0, 0, '0000-00-00 00:00:00', ''),
(3, 0, '0', 0, 22, 'com_content', '', 'en-GB', 0, 'Dziudek Dudek', 'Dziudek Dudek', 'dziudek@gmail.com', 'http://gavick.com', '', 'Vestibulum scelerisque, mi at fermentum lobortis, ante libero commodo nisl, at ornare orci ipsum ac diam. Nam a pharetra velit. Praesent et neque erat. Nulla nec odio vel turpis fermentum laoreet. Nullam aliquet mollis risus vitae feugiat.<br />Nam et laoreet risus. Maecenas non orci ipsum, sit amet mollis turpis. Duis aliquam elit vel neque mollis iaculis. Suspendisse a nibh odio.Nam et laoreet risus. Maecenas non orci ipsum, sit amet mollis turpis. Duis aliquam elit vel neque mollis iaculis. Suspendisse a nibh odio.', '83.26.213.126', '2010-08-31 06:42:58', 1, 1, 1, 0, '', 0, 0, '0000-00-00 00:00:00', ''),
(4, 0, '0', 0, 64, 'com_content', '', 'en-GB', 0, 'Paulo', 'Paulo', 'qqq@qqq.com', 'http://www.gavick.com', '', 'Fusce vestibulum iaculis laoreet. Proin dictum lobortis nisl vel eleifend. Pellentesque in sem sed enim congue placerat. Ut pharetra egestas lectus, nec sagittis dolor condimentum quis. Nam et laoreet risus. Maecenas non orci ipsum, sit amet mollis turpis. Duis aliquam elit vel neque mollis iaculis. Suspendisse a nibh odio.', '81.84.233.28', '2010-10-02 11:13:31', 0, 0, 1, 0, '', 0, 0, '0000-00-00 00:00:00', ''),
(5, 0, '0', 0, 22, 'com_content', '', 'en-GB', 0, 'Dziudek', 'Dziudek', 'dziudek@gmail.com', 'http://gavick.com', '', 'Lorem ipsum dolor sit amet :)', '83.26.237.94', '2010-11-29 14:27:17', 0, 0, 0, 0, '', 0, 0, '0000-00-00 00:00:00', ''),
(6, 0, '0', 0, 22, 'com_content', '', 'en-GB', 0, 'Dziudek', 'Dziudek', 'dziudek@gmail.com', 'http://gavick.com', '', 'Lipsum test', '83.26.237.94', '2010-11-29 14:27:58', 0, 0, 0, 0, '', 0, 0, '0000-00-00 00:00:00', ''),
(7, 0, '0', 0, 22, 'com_content', '', 'en-GB', 0, 'Dziudek', 'Dziudek', 'dziudek@gmail.com', 'http://gavick.com', '', 'Lipsum second test', '83.26.237.94', '2010-11-29 14:28:38', 0, 0, 0, 0, '', 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_jcomments_custom_bbcodes`
--

CREATE TABLE IF NOT EXISTS `bak_jcomments_custom_bbcodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `simple_pattern` varchar(255) NOT NULL DEFAULT '',
  `simple_replacement_html` text NOT NULL,
  `simple_replacement_text` text NOT NULL,
  `pattern` varchar(255) NOT NULL DEFAULT '',
  `replacement_html` text NOT NULL,
  `replacement_text` text NOT NULL,
  `button_acl` text NOT NULL,
  `button_open_tag` varchar(16) NOT NULL DEFAULT '',
  `button_close_tag` varchar(16) NOT NULL DEFAULT '',
  `button_title` varchar(255) NOT NULL DEFAULT '',
  `button_prompt` varchar(255) NOT NULL DEFAULT '',
  `button_image` varchar(255) NOT NULL DEFAULT '',
  `button_css` varchar(255) NOT NULL DEFAULT '',
  `button_enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `bak_jcomments_custom_bbcodes`
--

INSERT INTO `bak_jcomments_custom_bbcodes` (`id`, `name`, `simple_pattern`, `simple_replacement_html`, `simple_replacement_text`, `pattern`, `replacement_html`, `replacement_text`, `button_acl`, `button_open_tag`, `button_close_tag`, `button_title`, `button_prompt`, `button_image`, `button_css`, `button_enabled`, `ordering`, `published`) VALUES
(1, 'YouTube Video', '[youtube]http://www.youtube.com/watch?v={IDENTIFIER}[/youtube]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/{IDENTIFIER}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/{IDENTIFIER}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v={IDENTIFIER}', '\\[youtube\\]http\\:\\/\\/www\\.youtube\\.com\\/watch\\?v\\=([A-Za-z0-9-_]+)([A-Za-z0-9\\%\\&\\=\\#]*?)\\[\\/youtube\\]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/${1}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/${1}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[youtube]', '[/youtube]', 'YouTube Video', '', '', 'bbcode-youtube', 1, 1, 1),
(2, 'YouTube Video (short syntax)', '[youtube]{IDENTIFIER}[/youtube]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/{IDENTIFIER}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/{IDENTIFIER}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v={IDENTIFIER}', '\\[youtube\\]([A-Za-z0-9-_]+)([A-Za-z0-9\\%\\&\\=\\#]*?)\\[\\/youtube\\]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/${1}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/${1}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '', '', '', '', '', '', 0, 2, 1),
(3, 'YouTube Video (full syntax)', '[youtube]http://www.youtube.com/watch?v={IDENTIFIER}{TEXT}[/youtube]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/{IDENTIFIER}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/{IDENTIFIER}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v={IDENTIFIER}', '\\[youtube\\]http\\:\\/\\/www\\.youtube\\.com\\/watch\\?v\\=([A-Za-z0-9-_]+)([\\w0-9-\\+\\=\\!\\?\\(\\)\\[\\]\\{\\}\\&\\%\\*\\#\\.,_ ]+)\\[\\/youtube\\]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/${1}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/${1}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[youtube]', '[/youtube]', 'YouTube Video', '', '', '', 0, 3, 1),
(4, 'Google Video', '[google]http://video.google.com/videoplay?docid={IDENTIFIER}[/google]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId={IDENTIFIER}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid={IDENTIFIER}', '\\[google\\]http\\:\\/\\/video\\.google\\.com\\/videoplay\\?docid\\=([A-Za-z0-9-_]+)([A-Za-z0-9\\%\\&\\=\\#]*?)\\[\\/google\\]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId=${1}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[google]', '[/google]', 'Google Video', '', '', 'bbcode-google', 1, 4, 1),
(5, 'Google Video (short syntax)', '[google]{IDENTIFIER}[/google]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId={IDENTIFIER}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid={IDENTIFIER}', '\\[google\\]([A-Za-z0-9-_]+)([A-Za-z0-9\\%\\&\\=\\#]*?)\\[\\/google\\]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId=${1}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '', '', '', '', '', '', 0, 5, 1),
(6, 'Google Video (alternate syntax)', '[gv]http://video.google.com/videoplay?docid={IDENTIFIER}[/gv]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId={IDENTIFIER}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid={IDENTIFIER}', '\\[gv\\]http\\:\\/\\/video\\.google\\.com\\/videoplay\\?docid\\=([A-Za-z0-9-_]+)([A-Za-z0-9\\%\\&\\=\\#]*?)\\[\\/gv\\]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId=${1}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '', '', '', '', '', '', 0, 6, 1),
(7, 'Google Video (alternate syntax)', '[googlevideo]http://video.google.com/videoplay?docid={IDENTIFIER}[/googlevideo]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId={IDENTIFIER}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid={IDENTIFIER}', '\\[googlevideo\\]http\\:\\/\\/video\\.google\\.com\\/videoplay\\?docid\\=([A-Za-z0-9-_]+)([A-Za-z0-9\\%\\&\\=\\#]*?)\\[\\/googlevideo\\]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId=${1}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '', '', '', '', '', '', 0, 7, 1),
(8, 'Facebook Video', '[fv]http://www.facebook.com/video/video.php?v={IDENTIFIER}[/fv]', '<object width="425" height="350"><param name="movie" value="http://www.facebook.com/v/{IDENTIFIER}"></param><param name="wmode" value="transparent"></param><embed src="http://www.facebook.com/v/{IDENTIFIER}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.facebook.com/video/video.php?v={IDENTIFIER}', '\\[fv\\]http\\:\\/\\/www\\.facebook\\.com\\/video\\/video\\.php\\?v\\=([A-Za-z0-9-_]+)([A-Za-z0-9\\%\\&\\=\\#]*?)\\[\\/fv\\]', '<object width="425" height="350"><param name="movie" value="http://www.facebook.com/v/${1}"></param><param name="wmode" value="transparent"></param><embed src="http://www.facebook.com/v/${1}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.facebook.com/video/video.php?v=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[fv]', '[/fv]', 'Facebook Video', '', '', 'bbcode-facebook', 1, 8, 1),
(9, 'Facebook Video (short syntax)', '[fv]{IDENTIFIER}[/fv]', '<object width="425" height="350"><param name="movie" value="http://www.facebook.com/v/{IDENTIFIER}"></param><param name="wmode" value="transparent"></param><embed src="http://www.facebook.com/v/{IDENTIFIER}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.facebook.com/video/video.php?v={IDENTIFIER}', '\\[fv\\]([A-Za-z0-9-_]+)([A-Za-z0-9\\%\\&\\=\\#]*?)\\[\\/fv\\]', '<object width="425" height="350"><param name="movie" value="http://www.facebook.com/v/${1}"></param><param name="wmode" value="transparent"></param><embed src="http://www.facebook.com/v/${1}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.facebook.com/video/video.php?v=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '', '', '', '', '', '', 0, 9, 1),
(10, 'Wiki', '[wiki]{SIMPLETEXT}[/wiki]', '<a href="http://www.wikipedia.org/wiki/{SIMPLETEXT}" title="{SIMPLETEXT}" target="_blank">{SIMPLETEXT}</a>', '{SIMPLETEXT}', '\\[wiki\\]([A-Za-z0-9\\-\\+\\.,_ ]+)\\[\\/wiki\\]', '<a href="http://www.wikipedia.org/wiki/${1}" title="${1}" target="_blank">${1}</a>', '${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[wiki]', '[/wiki]', 'Wikipedia', '', '', 'bbcode-wiki', 1, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_jcomments_reports`
--

CREATE TABLE IF NOT EXISTS `bak_jcomments_reports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commentid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reason` tinytext NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_jcomments_settings`
--

CREATE TABLE IF NOT EXISTS `bak_jcomments_settings` (
  `component` varchar(50) NOT NULL DEFAULT '',
  `lang` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`component`,`lang`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_jcomments_settings`
--

INSERT INTO `bak_jcomments_settings` (`component`, `lang`, `name`, `value`) VALUES
('', '', 'enable_username_check', '1'),
('', '', 'username_maxlength', '20'),
('', '', 'forbidden_names', 'administrator,moderator'),
('', '', 'author_email', '2'),
('', '', 'author_homepage', '1'),
('', '', 'comment_maxlength', '1000'),
('', '', 'comment_minlength', '0'),
('', '', 'word_maxlength', '15'),
('', '', 'link_maxlength', '30'),
('', '', 'flood_time', '30'),
('', '', 'enable_notification', '0'),
('', '', 'notification_email', ''),
('', '', 'template', 'gk_style'),
('', '', 'enable_smiles', '0'),
('', '', 'comments_per_page', '10'),
('', '', 'comments_page_limit', '15'),
('', '', 'comments_pagination', 'both'),
('', '', 'comments_order', 'DESC'),
('', '', 'show_commentlength', '1'),
('', '', 'enable_nested_quotes', '1'),
('', '', 'enable_rss', '1'),
('', '', 'censor_replace_word', '[censored]'),
('', '', 'can_comment', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_reply', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'show_policy', 'Unregistered,Registered'),
('', '', 'enable_captcha', 'Unregistered'),
('', '', 'floodprotection', 'Unregistered,Registered,Author,Editor'),
('', '', 'enable_comment_length_check', 'Unregistered,Registered'),
('', '', 'autopublish', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'autolinkurls', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_subscribe', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_gravatar', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_view_homepage', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_publish', 'Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_view_email', 'Manager,Administrator,Super Administrator'),
('', '', 'can_edit', 'Manager,Administrator,Super Administrator'),
('', '', 'can_edit_own', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_delete', 'Manager,Administrator,Super Administrator'),
('', '', 'can_delete_own', 'Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_b', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_i', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_u', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_s', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_url', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_img', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_list', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_hide', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_view_ip', 'Administrator,Super Administrator'),
('', '', 'enable_categories', '1,3,28,27,31,32,29,25,30,35'),
('', '', 'emailprotection', 'Unregistered'),
('', '', 'enable_comment_maxlength_check', ''),
('', '', 'enable_autocensor', 'Unregistered'),
('', '', 'badwords', ''),
('', '', 'smiles', ':D	laugh.gif\n:lol:	lol.gif\n:-)	smile.gif\n;-)	wink.gif\n8)	cool.gif\n:-|	normal.gif\n:-*	whistling.gif\n:oops:	redface.gif\n:sad:	sad.gif\n:cry:	cry.gif\n:o	surprised.gif\n:-?	confused.gif\n:-x	sick.gif\n:eek:	shocked.gif\n:zzz	sleeping.gif\n:P	tongue.gif\n:roll:	rolleyes.gif\n:sigh:	unsure.gif'),
('', '', 'enable_mambots', '1'),
('', '', 'form_show', '1'),
('', '', 'display_author', 'name'),
('', '', 'enable_voting', '1'),
('', '', 'can_vote', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'merge_time', '0'),
('', '', 'template_view', 'list'),
('', '', 'message_policy_post', ''),
('', '', 'message_policy_whocancomment', ''),
('', '', 'message_locked', 'This content has been locked. You can no longer post any comment.'),
('', '', 'comment_title', '0'),
('', '', 'enable_custom_bbcode', '0'),
('', '', 'enable_bbcode_quote', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_code', ''),
('', '', 'enable_geshi', '0'),
('', '', 'can_report', ''),
('', '', 'enable_quick_moderation', '0'),
('', '', 'notification_type', '1,2'),
('', '', 'captcha_engine', 'kcaptcha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_jcomments_subscriptions`
--

CREATE TABLE IF NOT EXISTS `bak_jcomments_subscriptions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) unsigned NOT NULL DEFAULT '0',
  `object_group` varchar(255) NOT NULL DEFAULT '',
  `lang` varchar(255) NOT NULL DEFAULT '',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `hash` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_object` (`object_id`,`object_group`),
  KEY `idx_lang` (`lang`),
  KEY `idx_hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_jcomments_version`
--

CREATE TABLE IF NOT EXISTS `bak_jcomments_version` (
  `version` varchar(16) NOT NULL DEFAULT '',
  `previous` varchar(16) NOT NULL DEFAULT '',
  `installed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_jcomments_version`
--

INSERT INTO `bak_jcomments_version` (`version`, `previous`, `installed`, `updated`) VALUES
('2.2.0.0', '', '2010-08-30 10:12:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_jcomments_votes`
--

CREATE TABLE IF NOT EXISTS `bak_jcomments_votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commentid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_comment` (`commentid`,`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `bak_jcomments_votes`
--

INSERT INTO `bak_jcomments_votes` (`id`, `commentid`, `userid`, `ip`, `date`, `value`) VALUES
(1, 1, 0, '83.26.212.6', '2010-08-31 10:14:54', 1),
(2, 2, 0, '83.26.212.6', '2010-08-31 10:16:02', -1),
(3, 3, 0, '80.48.185.155', '2010-10-31 21:07:48', -1),
(4, 3, 0, '83.26.237.94', '2010-11-29 15:22:33', 1),
(5, 2, 0, '83.26.237.94', '2010-11-29 15:22:37', -1),
(6, 1, 0, '83.26.237.94', '2010-11-29 15:22:39', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2store_address`
--

CREATE TABLE IF NOT EXISTS `bak_k2store_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone_1` varchar(255) NOT NULL,
  `phone_2` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2store_orderdetails`
--

CREATE TABLE IF NOT EXISTS `bak_k2store_orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(15,5) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(15,5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2store_orders`
--

CREATE TABLE IF NOT EXISTS `bak_k2store_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `orderpayment_type` varchar(255) NOT NULL DEFAULT '' COMMENT 'Element name of payment plugin',
  `orderpayment_amount` decimal(15,5) DEFAULT '0.00000',
  `transaction_id` varchar(255) NOT NULL DEFAULT '',
  `transaction_status` varchar(255) NOT NULL DEFAULT '',
  `transaction_details` text NOT NULL,
  `created_date` datetime NOT NULL COMMENT 'GMT',
  `order_state` varchar(255) NOT NULL,
  `paypal_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_attachments`
--

CREATE TABLE IF NOT EXISTS `bak_k2_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleAttribute` text NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_categories`
--

CREATE TABLE IF NOT EXISTS `bak_k2_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent` int(11) DEFAULT '0',
  `extraFieldsGroup` int(11) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `trash` smallint(6) NOT NULL DEFAULT '0',
  `plugins` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`published`,`access`,`trash`),
  KEY `parent` (`parent`),
  KEY `ordering` (`ordering`),
  KEY `published` (`published`),
  KEY `access` (`access`),
  KEY `trash` (`trash`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `bak_k2_categories`
--

INSERT INTO `bak_k2_categories` (`id`, `name`, `alias`, `description`, `parent`, `extraFieldsGroup`, `published`, `access`, `ordering`, `image`, `params`, `trash`, `plugins`) VALUES
(1, 'Media Players', 'media-players', '<p>Check out the best Media Player on the Market</p>', 4, 0, 1, 0, 1, '1.png', 'inheritFrom=0\ntheme=\nnum_leading_items=1\nnum_leading_columns=1\nleadingImgSize=Medium\nnum_primary_items=2\nnum_primary_columns=2\nprimaryImgSize=Small\nnum_secondary_items=1\nnum_secondary_columns=1\nsecondaryImgSize=Medium\nnum_links=4\nnum_links_columns=1\nlinksImgSize=none\ncatCatalogMode=1\ncatFeaturedItems=1\ncatOrdering=rorder\ncatPagination=2\ncatPaginationResults=1\ncatTitle=0\ncatTitleItemCounter=0\ncatDescription=1\ncatImage=0\ncatFeedLink=0\nfeedLink=1\nsubCategories=1\nsubCatColumns=3\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=0\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=1\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=10\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Medium\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=0\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 0, ''),
(2, 'Home Projectors', 'home-projectors', '<p>There''s no place like our home.</p>', 4, 0, 1, 0, 3, '2.png', 'inheritFrom=1\ntheme=\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=1\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=1\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=0\ncatImage=0\ncatFeedLink=0\nfeedLink=0\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=0\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 0, ''),
(4, 'Technology', 'technology', '<p>From the best interior decorators and architects, we present the collections that stand out in this business. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales urna vel turpis sodales ultrices.</p>', 0, 0, 1, 0, 1, '', 'inheritFrom=0\ntheme=\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=1\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=0\ncatTitleItemCounter=0\ncatDescription=1\ncatImage=0\ncatFeedLink=0\nfeedLink=0\nsubCategories=1\nsubCatColumns=1\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=0\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 0, ''),
(5, 'Navigation GPS', 'navigation-gps', '<p>Don''t get lost with our GPS</p>', 4, 0, 1, 0, 2, '5.png', 'inheritFrom=1\ntheme=\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nfeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=0\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(6, 'Audio and Video', 'audio-and-video', '<p>The place were we rest must be unique.</p>', 4, 0, 1, 0, 4, '6.jpg', 'inheritFrom=1\ntheme=\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nfeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=0\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(7, 'TV, LED TV, 3D TV', 'tv-led-tv-3d-tv', '', 4, 0, 1, 0, 2, '7.png', 'inheritFrom=1\ntheme=\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nfeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=0\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_comments`
--

CREATE TABLE IF NOT EXISTS `bak_k2_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `commentDate` datetime NOT NULL,
  `commentText` text NOT NULL,
  `commentEmail` varchar(255) NOT NULL,
  `commentURL` varchar(255) NOT NULL,
  `published` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`),
  KEY `userID` (`userID`),
  KEY `published` (`published`),
  KEY `latestComments` (`published`,`commentDate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `bak_k2_comments`
--

INSERT INTO `bak_k2_comments` (`id`, `itemID`, `userID`, `userName`, `commentDate`, `commentText`, `commentEmail`, `commentURL`, `published`) VALUES
(1, 1, 0, 'Paulo', '2010-08-31 02:24:32', 'Maecenas porta vehicula erat, a sagittis nisl pulvinar ut. Vestibulum in sem sit amet nunc rutrum viverra id eu diam. Sed sed dui vitae nisi vehicula volutpat. In hac habitasse platea dictumst. Integer metus magna, lacinia luctus varius a, aliquet ac felis.', 'uuu@uuu.ili', 'http://www.uuu.design.com', 1),
(2, 1, 0, 'Robert Gavick', '2010-08-31 11:12:50', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas justo massa, sollicitudin ac congue in, dapibus sit amet mauris. Proin lacinia, metus ut suscipit vestibulum, quam sapien fermentum arcu, id vehicula lectus lorem ut leo.', 'info@gavick.com', '', 1),
(3, 1, 0, 'Dziudek', '2010-08-31 11:14:39', 'Vestibulum scelerisque, mi at fermentum lobortis, ante libero commodo nisl, at ornare orci ipsum ac diam. Nam a pharetra velit. Praesent et neque erat. Nulla nec odio vel turpis fermentum laoreet. Nullam aliquet mollis risus vitae feugiat.', 'dziudek@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_extra_fields`
--

CREATE TABLE IF NOT EXISTS `bak_k2_extra_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`),
  KEY `published` (`published`),
  KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_extra_fields_groups`
--

CREATE TABLE IF NOT EXISTS `bak_k2_extra_fields_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_items`
--

CREATE TABLE IF NOT EXISTS `bak_k2_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `catid` int(11) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `introtext` mediumtext,
  `fulltext` mediumtext,
  `video` text,
  `gallery` varchar(255) DEFAULT NULL,
  `extra_fields` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `extra_fields_search` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL,
  `checked_out` int(10) unsigned NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL,
  `publish_down` datetime NOT NULL,
  `trash` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `featured` smallint(6) NOT NULL DEFAULT '0',
  `featured_ordering` int(11) NOT NULL DEFAULT '0',
  `image_caption` text NOT NULL,
  `image_credits` varchar(255) NOT NULL,
  `video_caption` text NOT NULL,
  `video_credits` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `params` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `metakey` text NOT NULL,
  `plugins` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item` (`published`,`publish_up`,`publish_down`,`trash`,`access`),
  KEY `catid` (`catid`),
  KEY `created_by` (`created_by`),
  KEY `ordering` (`ordering`),
  KEY `featured` (`featured`),
  KEY `featured_ordering` (`featured_ordering`),
  KEY `hits` (`hits`),
  KEY `created` (`created`),
  FULLTEXT KEY `search` (`title`,`introtext`,`fulltext`,`extra_fields_search`,`image_caption`,`image_credits`,`video_caption`,`video_credits`,`metadesc`,`metakey`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `bak_k2_items`
--

INSERT INTO `bak_k2_items` (`id`, `title`, `alias`, `catid`, `published`, `introtext`, `fulltext`, `video`, `gallery`, `extra_fields`, `extra_fields_search`, `created`, `created_by`, `created_by_alias`, `checked_out`, `checked_out_time`, `modified`, `modified_by`, `publish_up`, `publish_down`, `trash`, `access`, `ordering`, `featured`, `featured_ordering`, `image_caption`, `image_credits`, `video_caption`, `video_credits`, `hits`, `params`, `metadesc`, `metadata`, `metakey`, `plugins`) VALUES
(1, 'Keep the Wilderness in the Wild', 'keep-the-wilderness-in-the-wild', 2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas justo  massa, sollicitudin ac congue in, dapibus sit amet mauris. Proin  lacinia, metus ut suscipit vestibulum, quam sapien fermentum arcu, id  vehicula lectus lorem ut leo. Donec pretium porttitor massa, id aliquam  dui convallis eu. Cras ultrices ultrices elementum.</p>\r\n', '\r\n<p>Vestibulum  scelerisque, mi at fermentum lobortis, ante libero commodo nisl, at  ornare orci ipsum ac diam. Nam a pharetra velit. Praesent et neque erat.  Nulla nec odio vel turpis fermentum laoreet. Nullam aliquet mollis  risus vitae feugiat. Phasellus malesuada tempor rhoncus. Mauris  bibendum, nibh a dapibus sagittis, massa mi adipiscing nulla, eleifend  cursus quam nulla vitae orci. Suspendisse hendrerit imperdiet mi sed  scelerisque. Vivamus tempus auctor velit, quis viverra neque commodo eu.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus. Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-08-31 00:08:21', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:27:16', 62, '2010-08-31 00:08:21', '0000-00-00 00:00:00', 1, 0, 1, 1, 0, 'Keep the Wilderness in the Wild', 'RentMe', '', '', 684, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=850000\n\n'),
(2, 'Villa Leon Design', 'villa-leon-design', 2, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor. Etiam laoreet  tellus quis neque suscipit ullamcorper. Sed ultricies aliquet egestas.</p>\r\n', '\r\n<p>Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>', NULL, NULL, '[]', '', '2010-08-31 09:53:12', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:21:36', 62, '2010-08-31 09:53:12', '0000-00-00 00:00:00', 1, 0, 4, 0, 0, 'Villa Leon', 'RentMe', '', '', 10, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=670000\n\n'),
(3, 'Newdream Palace Villa ', 'newdream-palace-villa', 2, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor.</p>\r\n', '\r\n<p>Etiam laoreet  tellus quis neque suscipit ullamcorper. Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>', NULL, NULL, '[]', '', '2010-08-31 10:10:28', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:24:04', 62, '2010-08-31 10:10:28', '0000-00-00 00:00:00', 1, 0, 5, 0, 0, 'Mussply House', 'RentMe', '', '', 3, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=970000\n\n'),
(20, 'Benq PE7700', 'benq-pe7700', 2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-10-31 04:58:07', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 03:34:32', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 1, 1, 0, '', '', '', '', 19, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=560\n\n'),
(4, 'Villa near Paraiso', 'villa-near-paraiso', 2, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor.</p>\r\n', '\r\n<p>Etiam laoreet  tellus quis neque suscipit ullamcorper. Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante.</p>', NULL, NULL, '[]', '', '2010-08-31 11:31:54', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:23:31', 62, '2010-08-31 11:31:54', '0000-00-00 00:00:00', 1, 0, 7, 0, 1, 'Villa Paraiso', 'RentHim', '', '', 22, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=540000\n\n'),
(5, 'Heidi Fleiss real mansion', 'heidi-fleiss-real-mansion', 2, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor.</p>\r\n', '\r\n<p>Etiam laoreet  tellus quis neque suscipit ullamcorper. Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>', NULL, NULL, '[]', '', '2010-08-31 12:29:42', 62, '', 0, '0000-00-00 00:00:00', '2010-12-01 22:27:45', 62, '2010-08-31 12:29:42', '0000-00-00 00:00:00', 1, 0, 2, 0, 0, '', '', '', '', 18, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=890000\n\n'),
(6, 'Jonathan Adler Villa', 'jonathan-adler-villa', 2, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor. Etiam laoreet  tellus quis neque suscipit ullamcorper.</p>\r\n', '\r\n<p>Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>', NULL, NULL, '[]', '', '2010-08-31 12:32:27', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:25:24', 62, '2010-08-31 12:32:27', '0000-00-00 00:00:00', 1, 0, 3, 0, 2, 'Blue Sky Villa', 'RentMe', '', '', 34, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=99000\n\n'),
(19, 'Debmoor yellow dream', 'debmoor-yellow-dream', 6, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-10-31 04:54:35', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:17:45', 62, '2010-10-31 04:54:35', '0000-00-00 00:00:00', 1, 0, 4, 0, 0, 'Debmoor yellow dream', 'RentMe', '', '', 3, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=3200\n\n'),
(7, 'New Millenium lines', 'new-millenium-lines', 5, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor. Etiam laoreet  tellus quis neque suscipit ullamcorper.</p>\r\n', '\r\n<p>Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>', NULL, NULL, '[]', '', '2010-08-31 12:39:16', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:25:38', 62, '2010-08-31 12:39:16', '0000-00-00 00:00:00', 1, 0, 4, 0, 3, '', '', '', '', 21, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=12000\n\n'),
(18, 'Spa Therapy Mystic Stone', 'spa-therapy-mystic-stone', 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus. Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue.</p>\r\n', '\r\n<p>Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>', NULL, NULL, '[]', '', '2010-10-31 00:12:28', 62, '', 0, '0000-00-00 00:00:00', '2010-12-01 03:15:11', 62, '2010-10-31 00:12:28', '0000-00-00 00:00:00', 1, 0, 4, 1, 0, 'Spa Therapy Stone', 'Spa Therapy Stone', '', '', 31, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=3400\n\n'),
(8, 'WaleCate Bathroom', 'walecate-bathroom', 1, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor. Etiam laoreet  tellus quis neque suscipit ullamcorper.</p>\r\n', '\r\n<p>Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>\r\n<p>Praesent vitae mauris nibh, ac laoreet leo. Curabitur magna magna,  elementum a tristique sed, porta quis nunc. Curabitur est purus, dapibus  ultricies commodo in, condimentum congue mauris. Duis enim nisl,  vulputate in tempor eu, commodo sed sapien.</p>', NULL, NULL, '[]', '', '2010-08-31 12:59:34', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 02:26:52', 62, '2010-08-31 12:59:34', '0000-00-00 00:00:00', 1, 0, 3, 0, 0, 'WaleCate Bathroom', '', '', '', 26, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=9200\n\n'),
(15, 'Guizo light bedroom', 'guizo-light-bedroom', 6, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus. Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus.</p>\r\n', '\r\n<p>Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>', NULL, NULL, '[]', '', '2010-10-30 12:54:15', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:19:46', 62, '2010-10-30 12:54:15', '0000-00-00 00:00:00', 1, 0, 1, 0, 0, '', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=5690\n\n'),
(9, 'Ysola H551-551 Hydrosilence', 'ysola-h551-551-hydrosilence', 1, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor. Etiam laoreet  tellus quis neque suscipit ullamcorper.</p>\r\n', '\r\n<p>Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>', NULL, NULL, '[]', '', '2010-08-31 13:31:06', 62, '', 0, '0000-00-00 00:00:00', '2010-12-01 21:51:24', 62, '2010-08-31 13:31:06', '0000-00-00 00:00:00', 1, 0, 1, 1, 0, '', '', '', '', 27, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1150\n\n'),
(10, 'Whirlpool Duet Steam Washer', 'whirlpool-duet-steam-washer', 5, 1, '<p><span class="leftcontent">Uses the natural power of steam to remove  tough stains like grass and grease and to sanitize towels and sheets  without bleach. The Handwashables cycle uses low, intermittent agitation  to mimic washing in the sink </span>fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id.</p>\r\n', '\r\n<p>Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>\r\n<p>Praesent vitae mauris nibh, ac laoreet leo. Curabitur magna magna,  elementum a tristique sed, porta quis nunc. Curabitur est purus, dapibus  ultricies commodo in, condimentum congue mauris. Duis enim nisl,  vulputate in tempor eu, commodo sed sapien. Nullam nec mauris ante.  Pellentesque ullamcorper lacinia molestie. Quisque luctus tincidunt  gravida. Ut ultricies, purus mattis vehicula bibendum, diam libero  tincidunt lacus, in aliquet lorem massa vel mauris. Vivamus lorem risus,  molestie vitae sagittis vestibulum, congue vitae enim. Nulla  consectetur lorem at neque placerat rhoncus nec quis ante. Vestibulum  ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia  Curae; In consectetur neque a leo ultrices sit amet egestas risus  porttitor. Etiam varius auctor est sit amet dignissim.</p>', NULL, NULL, '[]', '', '2010-08-31 13:37:35', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 02:28:17', 62, '2010-08-31 13:37:35', '0000-00-00 00:00:00', 1, 0, 2, 0, 0, 'Whirlpool Duet Steam Washer', '', '', '', 99, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=0\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=0\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1250\n\n'),
(25, 'Samsung  C750', 'samsung-c750', 7, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 03:51:44', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 04:11:09', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 1, 1, 0, '', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1450\n\n');
INSERT INTO `bak_k2_items` (`id`, `title`, `alias`, `catid`, `published`, `introtext`, `fulltext`, `video`, `gallery`, `extra_fields`, `extra_fields_search`, `created`, `created_by`, `created_by_alias`, `checked_out`, `checked_out_time`, `modified`, `modified_by`, `publish_up`, `publish_down`, `trash`, `access`, `ordering`, `featured`, `featured_ordering`, `image_caption`, `image_credits`, `video_caption`, `video_credits`, `hits`, `params`, `metadesc`, `metadata`, `metakey`, `plugins`) VALUES
(11, 'Open space modern kitchen ', 'open-space-modern-kitchen', 5, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor. Etiam laoreet  tellus quis neque suscipit ullamcorper.</p>\r\n', '\r\n<p>Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>\r\n<p>Praesent vitae mauris nibh, ac laoreet leo. Curabitur magna magna,  elementum a tristique sed, porta quis nunc. Curabitur est purus, dapibus  ultricies commodo in, condimentum congue mauris. Duis enim nisl,  vulputate in tempor eu, commodo sed sapien. Nullam nec mauris ante.  Pellentesque ullamcorper lacinia molestie. Quisque luctus tincidunt  gravida. Ut ultricies, purus mattis vehicula bibendum, diam libero  tincidunt lacus, in aliquet lorem massa vel mauris. Vivamus lorem risus,  molestie vitae sagittis vestibulum, congue vitae enim. Nulla  consectetur lorem at neque placerat rhoncus nec quis ante. Vestibulum  ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia  Curae; In consectetur neque a leo ultrices sit amet egestas risus  porttitor. Etiam varius auctor est sit amet dignissim.</p>', NULL, NULL, '[]', '', '2010-08-31 15:30:22', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:21:01', 62, '2010-08-31 15:30:22', '0000-00-00 00:00:00', 1, 0, 1, 0, 0, '', '', '', '', 43, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=3450\n\n'),
(13, 'Faklight nature kitchen', 'faklight-nature-kitchen', 5, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus. Quisque elementum, turpis ut eleifend ullamcorper, magna mi commodo erat, vel tempus nibh nulla et ipsum. Sed id est ut tellus sollicitudin egestas quis eget tellus. Aenean rhoncus, ante et condimentum interdum, nisi dolor convallis felis, eget elementum sem lorem vel metus. Vivamus id arcu at turpis viverra tempor porttitor ut mauris. Suspendisse ultricies purus quis urna pharetra nec molestie orci laoreet. Nulla blandit ullamcorper nisi id euismod. Sed tortor diam, lobortis auctor varius auctor, laoreet quis odio.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-10-30 12:17:21', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:20:36', 62, '2010-10-30 12:17:21', '0000-00-00 00:00:00', 1, 0, 3, 1, 1, '', '', '', '', 1, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=6780\n\n'),
(12, 'Spa Premium Massage', 'spa-premium-massage', 1, 1, '<p>Praesent a tellus vitae nisl vehicula semper. Quisque bibendum molestie  molestie. Sed pulvinar varius lorem eu laoreet. Nam varius auctor  dignissim. Aenean id tellus lorem, ut ultrices nisi. Morbi volutpat  dapibus velit at pretium. Etiam neque ligula, mollis ut ornare a,  pellentesque et ligula. Morbi cursus vehicula mauris in molestie. Mauris  nibh dolor, mattis eu tincidunt ac, dictum ac tortor. Etiam laoreet  tellus quis neque suscipit ullamcorper.</p>\r\n', '\r\n<p>Sed ultricies aliquet egestas.  Mauris vitae convallis mi. Aenean bibendum sagittis consequat. Aliquam  erat volutpat. Vivamus dapibus augue eu nulla bibendum mattis. Aliquam  erat volutpat. Donec iaculis placerat nisi nec lobortis. Quisque  elementum commodo bibendum. Praesent at ligula quam, ac molestie ipsum.</p>\r\n<p>Vivamus erat elit, fermentum at vulputate at, blandit et elit. Sed nulla  sapien, ultrices vestibulum convallis sed, feugiat a lectus. Nulla  facilisi. Nulla bibendum felis venenatis nunc ultricies fringilla.  Suspendisse tincidunt viverra sollicitudin. Ut condimentum imperdiet  est, id consectetur nisi posuere id. Mauris scelerisque lacus sed turpis  eleifend egestas. Donec lectus lorem, sollicitudin sit amet ultricies  vel, sollicitudin eget augue. Integer id sem eu erat mollis vehicula sit  amet non nisi. Nam ante nulla, semper mollis vehicula vitae, accumsan  sed nisl.</p>\r\n<p>Praesent vitae mauris nibh, ac laoreet leo. Curabitur magna magna,  elementum a tristique sed, porta quis nunc. Curabitur est purus, dapibus  ultricies commodo in, condimentum congue mauris. Duis enim nisl,  vulputate in tempor eu, commodo sed sapien. Nullam nec mauris ante.  Pellentesque ullamcorper lacinia molestie. Quisque luctus tincidunt  gravida. Ut ultricies, purus mattis vehicula bibendum, diam libero  tincidunt lacus, in aliquet lorem massa vel mauris. Vivamus lorem risus,  molestie vitae sagittis vestibulum, congue vitae enim. Nulla  consectetur lorem at neque placerat rhoncus nec quis ante. Vestibulum  ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia  Curae; In consectetur neque a leo ultrices sit amet egestas risus  porttitor. Etiam varius auctor est sit amet dignissim.</p>', NULL, NULL, '[]', '', '2010-08-31 15:25:51', 62, '', 0, '0000-00-00 00:00:00', '2010-12-01 13:57:35', 62, '2010-08-31 15:25:51', '0000-00-00 00:00:00', 1, 0, 2, 0, 0, 'Spa Premium Massage', 'Spa Corp', '', '', 49, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=0\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=0\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=18600\n\n'),
(14, 'Full kitchen Sieena', 'full-kitchen-sieena', 5, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus. Quisque elementum, turpis ut eleifend ullamcorper, magna mi commodo erat, vel tempus nibh nulla et ipsum. Sed id est ut tellus sollicitudin egestas quis eget tellus. Aenean rhoncus, ante et condimentum interdum, nisi dolor convallis felis, eget elementum sem lorem vel metus. Vivamus id arcu at turpis viverra tempor porttitor ut mauris. Suspendisse ultricies purus quis urna pharetra nec molestie orci laoreet. Nulla blandit ullamcorper nisi id euismod. Sed tortor diam, lobortis auctor varius auctor, laoreet quis odio.</p>\r\n<p> </p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-10-30 12:21:37', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:20:17', 62, '2010-10-30 12:21:37', '0000-00-00 00:00:00', 1, 0, 5, 0, 0, '', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=7680\n\n'),
(16, 'Palermo Deluxe 6 Room', 'palermo-deluxe-6-room', 6, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus. Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue.</p>\r\n', '\r\n<p>Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>', NULL, NULL, '[]', '', '2010-10-30 12:55:30', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:18:01', 62, '2010-10-30 12:55:30', '0000-00-00 00:00:00', 1, 0, 2, 0, 0, '', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1200\n\n'),
(17, 'Brittany Johnson suite', 'brittany-johnson-suite', 6, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>', NULL, NULL, '[]', '', '2010-10-30 17:22:29', 62, '', 0, '0000-00-00 00:00:00', '2010-10-31 18:17:53', 62, '2010-10-30 17:22:29', '0000-00-00 00:00:00', 1, 0, 3, 0, 0, '', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=8000\n\n'),
(21, 'OpenSea Bathroom', 'opensea-bathroom', 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-10-31 05:17:16', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 02:32:17', 62, '2010-10-31 05:17:16', '0000-00-00 00:00:00', 1, 0, 5, 0, 0, 'OpenSea Bathroom', '', '', '', 21, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1800\n\n'),
(22, 'EPSON EB-S72', 'epson-eb-s72', 2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 03:20:16', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 03:22:53', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 3, 1, 0, 'EB-S72 EPSON', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=560\n\n'),
(23, 'BENQ MP 525 ST', 'benq-mp-525-st', 2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 03:25:05', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 03:28:51', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 4, 1, 0, 'BENQ MP 525 ST', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=560\n\n'),
(24, 'SAMSUNG M200S', 'samsung-m200s', 2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 03:28:56', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 03:30:20', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 2, 1, 0, 'SAMSUNG M200S', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=560\n\n'),
(26, 'Samsung UA55C7000', 'samsung-ua55c7000', 7, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 03:56:37', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 04:11:37', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 5, 1, 0, '', '', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=970\n\n'),
(27, 'Sony Bravia 3D TV', 'sony-bravia-3d-tv', 7, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 04:05:13', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 04:11:28', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 4, 1, 0, 'Sony Bravia 3D TV', 'Sony', '', '', 0, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=2350\n\n'),
(28, 'LG LX9500 BLA', 'lg-lx9500-bla', 7, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 04:09:48', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 04:11:19', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 2, 1, 0, 'LG LX9500 BLA', '', '', '', 9, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1950\n\n'),
(29, 'DXG 3D Media Player', 'dxg-3d-media-player', 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 04:22:24', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 04:23:16', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 1, 1, 0, 'DXG 3D Media Player', '', '', '', 17, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1450\n\n'),
(30, 'JVC KD-AVX77', 'jvc-kd-avx77', 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 04:25:46', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 04:28:09', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 3, 1, 0, '', '', '', '', 1, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1950\n\n');
INSERT INTO `bak_k2_items` (`id`, `title`, `alias`, `catid`, `published`, `introtext`, `fulltext`, `video`, `gallery`, `extra_fields`, `extra_fields_search`, `created`, `created_by`, `created_by_alias`, `checked_out`, `checked_out_time`, `modified`, `modified_by`, `publish_up`, `publish_down`, `trash`, `access`, `ordering`, `featured`, `featured_ordering`, `image_caption`, `image_credits`, `video_caption`, `video_credits`, `hits`, `params`, `metadesc`, `metadata`, `metakey`, `plugins`) VALUES
(31, 'JVC KD-R901', 'jvc-kd-r901', 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 04:31:23', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 04:32:12', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 4, 1, 0, 'JVC KD-R901', '', '', '', 28, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1950\n\n'),
(32, 'AVM Fidelio', 'avm-fidelio', 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec erat eu leo congue porta id at odio. Mauris elementum, massa eget semper sodales, lacus nulla condimentum leo, vitae tincidunt erat sem at orci. Sed augue nisl, tempor quis sagittis eget, laoreet ac nulla. Nullam adipiscing commodo aliquet. Nullam in vestibulum enim. Nullam quis ante sit amet leo rhoncus posuere in non purus.</p>\r\n', '\r\n<p>Curabitur varius sem vitae nisl luctus tempor. Morbi sit amet lorem id nisi ultricies sollicitudin. Nam vel venenatis augue. Nunc eu mi dui, sit amet sagittis tellus. Suspendisse ante eros, venenatis nec porta in, pretium vel odio. Donec dignissim gravida feugiat. Vestibulum tortor tortor, ultrices ullamcorper convallis ut, luctus eget urna. Nunc ligula dui, fermentum non pretium ac, feugiat non urna. Nulla tincidunt ipsum at nibh euismod lacinia. Suspendisse magna urna, hendrerit id consectetur id, tempor elementum turpis. Aenean sodales, diam at sodales porttitor, massa elit cursus eros, sed tincidunt leo neque id mi.<br /><br />Mauris et sem non mi condimentum gravida. Duis at molestie ligula. Donec vehicula tincidunt nulla, quis scelerisque turpis placerat id. Aliquam blandit purus sed dui eleifend vel dignissim felis dapibus. Fusce condimentum accumsan mi venenatis fringilla. Fusce et felis nec ante facilisis ullamcorper. Ut nec nulla sed tortor aliquam vulputate. Integer iaculis, dolor eget ullamcorper placerat, odio urna scelerisque nibh, sit amet semper lectus mauris eu tellus.</p>\r\n<p> </p>', NULL, NULL, '[]', '', '2010-12-02 04:38:49', 62, '', 0, '0000-00-00 00:00:00', '2010-12-02 04:40:01', 62, '2010-10-31 04:58:07', '0000-00-00 00:00:00', 0, 0, 2, 1, 0, 'AVM Docking Speackers', '', '', '', 11, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', 'k2storeitem_price=1450\n\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_rating`
--

CREATE TABLE IF NOT EXISTS `bak_k2_rating` (
  `itemID` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_k2_rating`
--

INSERT INTO `bak_k2_rating` (`itemID`, `rating_sum`, `rating_count`, `lastip`) VALUES
(1, 16, 4, '80.48.185.155'),
(2, 9, 2, '79.169.183.213'),
(3, 5, 1, '77.54.121.181'),
(4, 5, 1, '77.54.121.181'),
(5, 7, 2, '79.169.183.213'),
(6, 9, 2, '80.48.185.155'),
(7, 4, 1, '77.54.121.181'),
(8, 5, 1, '77.54.121.181'),
(9, 9, 2, '79.169.183.213'),
(11, 4, 1, '77.54.121.181'),
(10, 8, 2, '79.169.183.213'),
(12, 9, 2, '80.48.185.155'),
(13, 4, 1, '79.169.183.213'),
(14, 5, 1, '79.169.183.213'),
(15, 4, 1, '79.169.183.213'),
(16, 5, 1, '79.169.183.213'),
(17, 5, 1, '79.169.183.213'),
(18, 4, 1, '79.169.183.213'),
(19, 5, 1, '79.169.183.213'),
(20, 5, 1, '79.169.183.213'),
(21, 4, 1, '79.169.183.213'),
(23, 5, 1, '79.169.183.213'),
(22, 4, 1, '79.169.183.213'),
(24, 3, 1, '79.169.183.213'),
(28, 3, 1, '79.169.183.213'),
(26, 5, 1, '79.169.183.213'),
(27, 4, 1, '79.169.183.213'),
(25, 4, 1, '79.169.183.213');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_tags`
--

CREATE TABLE IF NOT EXISTS `bak_k2_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

--
-- Volcado de datos para la tabla `bak_k2_tags`
--

INSERT INTO `bak_k2_tags` (`id`, `name`, `published`) VALUES
(105, 'tranquility', 1),
(106, 'debmoor', 1),
(107, 'yellow', 1),
(108, 'dark', 1),
(8, 'white & black', 1),
(109, 'green', 1),
(10, 'Andreas Stridsberg', 1),
(11, 'sweet', 1),
(12, 'face', 1),
(110, 'lines', 1),
(14, 'forbidden', 1),
(15, 'fuit', 1),
(16, 'photography', 1),
(17, 'Coffe', 1),
(18, 'creative', 1),
(111, 'clean', 1),
(21, 'art', 1),
(112, 'imperial', 1),
(25, 'Beijing', 1),
(26, 'advertisement', 1),
(27, 'Microsoft', 1),
(113, 'confortable', 1),
(114, 'villa', 1),
(115, 'near sea', 1),
(116, 'great view', 1),
(117, 'mansion', 1),
(118, 'real', 1),
(53, 'Cristiano Ronaldo', 1),
(61, 'House', 1),
(62, 'Villa Leon', 1),
(63, 'garden', 1),
(64, 'good ambient', 1),
(65, 'near city', 1),
(66, 'Villa Paraiso', 1),
(67, 'welcoming and family', 1),
(68, 'blue', 1),
(69, 'warm', 1),
(70, 'classic', 1),
(71, 'Bonaldo', 1),
(72, 'italian', 1),
(73, 'furniture', 1),
(74, 'design', 1),
(75, 'modern', 1),
(76, 'Kitchen', 1),
(77, 'open space', 1),
(78, 'familiar', 1),
(79, 'living room', 1),
(80, 'black', 1),
(81, 'monte santos', 1),
(82, 'kitchem', 1),
(83, 'lighter', 1),
(84, 'sieena', 1),
(85, 'balance', 1),
(86, 'elegance', 1),
(87, 'wild', 1),
(88, 'nature', 1),
(89, 'light', 1),
(90, 'sunlight', 1),
(91, 'dark modern', 1),
(92, 'impressive', 1),
(93, 'Brittany Johnson', 1),
(94, 'bedroom', 1),
(95, 'traditional', 1),
(96, 'elegant', 1),
(97, 'light colors', 1),
(98, 'Palermo', 1),
(99, 'Deluxe', 1),
(100, 'room', 1),
(101, 'red', 1),
(102, 'Millenium', 1),
(103, 'modern line', 1),
(104, 'harmony', 1),
(119, 'Whirlpool', 1),
(120, 'washing', 1),
(121, 'machine', 1),
(122, 'steam', 1),
(123, 'Hydrosilence', 1),
(124, 'bathroom', 1),
(125, 'walecate', 1),
(126, 'OpenSean', 1),
(127, 'romantic', 1),
(128, 'Benq', 1),
(129, 'PE7700', 1),
(130, 'Projector', 1),
(131, 'Epson', 1),
(132, 'EBS72', 1),
(133, 'Samsung', 1),
(134, 'MS200S', 1),
(135, 'TV', 1),
(136, 'LCD', 1),
(137, 'C750', 1),
(138, 'LED TV', 1),
(139, 'Sony', 1),
(140, 'Bravia', 1),
(141, '3D', 1),
(142, 'LG', 1),
(143, 'LX9500 BLA', 1),
(144, 'DXG 3D', 1),
(145, 'Media Player', 1),
(146, 'JVC', 1),
(147, 'Car Media', 1),
(148, 'Travell', 1),
(149, 'radio', 1),
(150, 'car', 1),
(151, 'music', 1),
(152, 'mp3', 1),
(153, 'USB', 1),
(154, 'Docking Station', 1),
(155, 'AVM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_tags_xref`
--

CREATE TABLE IF NOT EXISTS `bak_k2_tags_xref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagID` (`tagID`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1014 ;

--
-- Volcado de datos para la tabla `bak_k2_tags_xref`
--

INSERT INTO `bak_k2_tags_xref` (`id`, `tagID`, `itemID`) VALUES
(715, 65, 2),
(714, 64, 2),
(758, 95, 1),
(757, 88, 1),
(710, 78, 11),
(723, 67, 4),
(722, 66, 4),
(721, 63, 4),
(673, 94, 19),
(672, 73, 19),
(671, 107, 19),
(713, 63, 2),
(735, 70, 6),
(734, 69, 6),
(733, 68, 6),
(739, 104, 7),
(738, 103, 7),
(737, 102, 7),
(679, 97, 17),
(902, 134, 24),
(840, 125, 8),
(901, 133, 24),
(890, 130, 23),
(889, 128, 23),
(844, 122, 10),
(843, 121, 10),
(842, 120, 10),
(776, 75, 12),
(775, 74, 12),
(774, 73, 12),
(709, 77, 11),
(708, 76, 11),
(707, 75, 11),
(839, 124, 8),
(838, 86, 8),
(773, 72, 12),
(772, 71, 12),
(712, 62, 2),
(711, 61, 2),
(720, 61, 4),
(732, 61, 6),
(841, 119, 10),
(700, 83, 13),
(699, 82, 13),
(698, 70, 13),
(697, 86, 14),
(696, 85, 14),
(695, 84, 14),
(694, 76, 14),
(756, 87, 1),
(806, 124, 9),
(678, 96, 17),
(677, 94, 17),
(676, 93, 17),
(675, 75, 17),
(686, 101, 16),
(685, 100, 16),
(684, 99, 16),
(683, 98, 16),
(682, 80, 16),
(681, 75, 16),
(736, 76, 7),
(766, 101, 18),
(765, 79, 18),
(674, 73, 17),
(680, 73, 16),
(706, 73, 11),
(805, 123, 9),
(755, 61, 1),
(754, 105, 1),
(670, 106, 19),
(881, 132, 22),
(880, 131, 22),
(852, 127, 21),
(851, 124, 21),
(850, 126, 21),
(879, 130, 22),
(908, 130, 20),
(907, 129, 20),
(906, 128, 20),
(764, 73, 18),
(763, 112, 18),
(687, 94, 15),
(688, 73, 15),
(689, 97, 15),
(690, 113, 15),
(727, 61, 3),
(726, 116, 3),
(725, 115, 3),
(724, 114, 3),
(822, 65, 5),
(821, 61, 5),
(820, 118, 5),
(819, 117, 5),
(900, 130, 24),
(958, 137, 25),
(957, 136, 25),
(956, 135, 25),
(955, 133, 25),
(966, 141, 27),
(968, 138, 26),
(967, 133, 26),
(965, 140, 27),
(964, 139, 27),
(963, 135, 27),
(962, 143, 28),
(961, 142, 28),
(960, 141, 28),
(959, 135, 28),
(1005, 153, 31),
(989, 148, 30),
(976, 145, 29),
(975, 144, 29),
(988, 147, 30),
(987, 146, 30),
(1004, 152, 31),
(1003, 151, 31),
(1002, 150, 31),
(1001, 149, 31),
(1000, 146, 31),
(1013, 155, 32),
(1012, 154, 32),
(1011, 145, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_users`
--

CREATE TABLE IF NOT EXISTS `bak_k2_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `gender` enum('m','f') NOT NULL DEFAULT 'm',
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `group` int(11) NOT NULL DEFAULT '0',
  `plugins` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `group` (`group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bak_k2_users`
--

INSERT INTO `bak_k2_users` (`id`, `userID`, `userName`, `gender`, `description`, `image`, `url`, `group`, `plugins`) VALUES
(1, 62, 'Administrator', 'm', '<p>Hi, I''m Eli Manning and i welcome you to <em>yourStore</em> website, a place specifically dedicated to you.</p>', '1.jpg', 'http://www.gavick.com', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_k2_user_groups`
--

CREATE TABLE IF NOT EXISTS `bak_k2_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bak_k2_user_groups`
--

INSERT INTO `bak_k2_user_groups` (`id`, `name`, `permissions`) VALUES
(1, 'Registered', 'frontEdit=0\nadd=0\neditOwn=0\neditAll=0\npublish=0\ncomment=1\ninheritance=0\ncategories=all\n\n'),
(2, 'Site Owner', 'frontEdit=1\nadd=1\neditOwn=1\neditAll=1\npublish=1\ncomment=1\ninheritance=1\ncategories=all\n\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_menu`
--

CREATE TABLE IF NOT EXISTS `bak_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text,
  `type` varchar(50) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `componentid` int(11) unsigned NOT NULL DEFAULT '0',
  `sublevel` int(11) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL DEFAULT '0',
  `browserNav` tinyint(4) DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `utaccess` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL DEFAULT '0',
  `rgt` int(11) unsigned NOT NULL DEFAULT '0',
  `home` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Volcado de datos para la tabla `bak_menu`
--

INSERT INTO `bak_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(1, 'mainmenu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 1, 62, '2009-01-11 11:24:34', 0, 0, 0, 3, 'num_leading_articles=1\nnum_intro_articles=1\nnum_columns=1\nnum_links=0\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=0\nshow_pagination_results=0\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=Welcome to the Frontpage\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 1),
(2, 'mainmenu', 'Joomla! License', 'joomla-license', 'index.php?option=com_content&view=article&id=5', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=0\nshow_title=\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(41, 'mainmenu', 'FAQ', 'faq', 'index.php?option=com_content&view=section&id=3', 'component', 1, 0, 20, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1', 0, 0, 0),
(11, 'othermenu', 'Joomla! Home', 'joomla-home', 'http://www.joomla.org', 'url', 1, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(12, 'othermenu', 'Joomla! Forums', 'joomla-forums', 'http://forum.joomla.org', 'url', 1, 0, 0, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(13, 'othermenu', 'Joomla! Documentation', 'joomla-documentation', 'http://docs.joomla.org', 'url', 1, 0, 0, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(14, 'othermenu', 'Joomla! Community', 'joomla-community', 'http://community.joomla.org', 'url', 1, 0, 0, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(15, 'othermenu', 'Joomla! Magazine', 'joomla-community-magazine', 'http://community.joomla.org/magazine.html', 'url', 1, 0, 0, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(16, 'othermenu', 'OSM Home', 'osm-home', 'http://www.opensourcematters.org', 'url', 1, 0, 0, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 6, 'menu_image=-1\n\n', 0, 0, 0),
(17, 'othermenu', 'Administrator', 'administrator', 'administrator/', 'url', 1, 0, 0, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(18, 'topmenu', 'News', 'news', 'index.php?option=com_newsfeeds&view=newsfeed&id=1&feedid=1', 'component', 1, 0, 11, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_page_title=1\npage_title=News\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 0, 0, 0),
(20, 'usermenu', 'Your Details', 'your-details', 'index.php?option=com_user&view=user&task=edit', 'component', 1, 0, 14, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 1, 3, '', 0, 0, 0),
(24, 'usermenu', 'Logout', 'logout', 'index.php?option=com_user&view=login', 'component', 1, 0, 14, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 1, 3, '', 0, 0, 0),
(38, 'keyconcepts', 'Content Layouts', 'content-layouts', 'index.php?option=com_content&view=article&id=24', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(27, 'mainmenu', 'Joomla! Overview', 'joomla-overview', 'index.php?option=com_content&view=article&id=19', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(28, 'topmenu', 'About Joomla!', 'about-joomla', 'index.php?option=com_content&view=article&id=25', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(29, 'topmenu', 'Features', 'features', 'index.php?option=com_content&view=article&id=22', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(30, 'topmenu', 'The Community', 'the-community', 'index.php?option=com_content&view=article&id=27', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(34, 'mainmenu', 'What''s New in 1.5?', 'what-is-new-in-1-5', 'index.php?option=com_content&view=article&id=22', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(40, 'keyconcepts', 'Extensions', 'extensions', 'index.php?option=com_content&view=article&id=26', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(37, 'mainmenu', 'More about Joomla!', 'more-about-joomla', 'index.php?option=com_content&view=section&id=4', 'component', 1, 27, 20, 1, 4, 62, '2009-01-04 13:12:20', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(43, 'keyconcepts', 'Example Pages', 'example-pages', 'index.php?option=com_content&view=article&id=43', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(44, 'ExamplePages', 'Section Blog', 'section-blog', 'index.php?option=com_content&view=section&layout=blog&id=3', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Section Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(45, 'ExamplePages', 'Section Table', 'section-table', 'index.php?option=com_content&view=section&id=3', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Table Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nnlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(46, 'ExamplePages', 'Category Blog', 'categoryblog', 'index.php?option=com_content&view=category&layout=blog&id=31', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Blog layout (FAQs/General category)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(47, 'ExamplePages', 'Category Table', 'category-table', 'index.php?option=com_content&view=category&id=32', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Table layout (FAQs/Languages category)\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(48, 'mainmenu', 'Web Links', 'web-links', 'index.php?option=com_weblinks&view=categories', 'component', 1, 0, 4, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'image=-1\nimage_align=right\nshow_feed_link=1\nshow_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\ntarget=\nlink_icons=\npage_title=Weblinks\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(49, 'mainmenu', 'News Feeds', 'news-feeds', 'index.php?option=com_newsfeeds&view=categories', 'component', 1, 0, 11, 0, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Newsfeeds\nshow_comp_description=1\ncomp_description=\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 0, 0, 0),
(50, 'mainmenu', 'The News', 'the-news', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 0, 20, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=The News\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(51, 'usermenu', 'Submit an Article', 'submit-an-article', 'index.php?option=com_content&view=article&layout=form', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(52, 'usermenu', 'Submit a Web Link', 'submit-a-web-link', 'index.php?option=com_weblinks&view=weblink&layout=form', 'component', 1, 0, 4, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(53, 'mainmenu', 'Store', 'store', 'index.php?option=com_virtuemart', 'component', 1, 0, 34, 0, 9, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'product_id=\ncategory_id=\nflypage=\npage=\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(58, 'mainmenu', 'Dummy Item', 'dummy-item', '#', 'url', 1, 27, 0, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(54, 'mainmenu', 'Dummy Item', 'dummy-item', '#', 'url', 1, 37, 0, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(55, 'mainmenu', 'Dummy Item', 'dummy-item', '#', 'url', 1, 37, 0, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(56, 'mainmenu', 'Dummy Item', 'dummy-item', '#', 'url', 1, 37, 0, 2, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(57, 'mainmenu', 'Dummy Item', 'dummy-item', '#', 'url', 1, 37, 0, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(59, 'mainmenu', 'Dummy Item', 'dummy-item', '#', 'url', 1, 27, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(60, 'mainmenu', 'Dummy Item', 'dummy-item', '#', 'url', 1, 27, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_menu_types`
--

CREATE TABLE IF NOT EXISTS `bak_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `bak_menu_types`
--

INSERT INTO `bak_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'usermenu', 'User Menu', 'A Menu for logged in Users'),
(3, 'topmenu', 'Top Menu', 'Top level navigation'),
(4, 'othermenu', 'Resources', 'Additional links'),
(5, 'ExamplePages', 'Example Pages', 'Example Pages'),
(6, 'keyconcepts', 'Key Concepts', 'This describes some critical information for new Users.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_messages`
--

CREATE TABLE IF NOT EXISTS `bak_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` int(11) NOT NULL DEFAULT '0',
  `priority` int(1) unsigned NOT NULL DEFAULT '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_messages_cfg`
--

CREATE TABLE IF NOT EXISTS `bak_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_migration_backlinks`
--

CREATE TABLE IF NOT EXISTS `bak_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_modules`
--

CREATE TABLE IF NOT EXISTS `bak_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) DEFAULT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `numnews` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `control` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Volcado de datos para la tabla `bak_modules`
--

INSERT INTO `bak_modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES
(1, 'Main Menu', '', 1, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 1, 0, ''),
(2, 'Login', '', 1, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, '', 1, 1, ''),
(3, 'Popular', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_popular', 0, 2, 1, '', 0, 1, ''),
(4, 'Recent added Articles', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 2, 1, 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', 0, 1, ''),
(5, 'Menu Stats', '', 5, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 2, 1, '', 0, 1, ''),
(6, 'Unread Messages', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_unread', 0, 2, 1, '', 1, 1, ''),
(7, 'Online Users', '', 2, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_online', 0, 2, 1, '', 1, 1, ''),
(8, 'Toolbar', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 2, 1, '', 1, 1, ''),
(9, 'Quick Icons', '', 1, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicon', 0, 2, 1, '', 1, 1, ''),
(10, 'Logged in Users', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_logged', 0, 2, 1, '', 0, 1, ''),
(11, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, '', 1, 1, ''),
(12, 'Admin Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 1, 'mod_menu', 0, 2, 1, '', 0, 1, ''),
(13, 'Admin SubMenu', '', 1, 'submenu', 0, '0000-00-00 00:00:00', 1, 'mod_submenu', 0, 2, 1, '', 0, 1, ''),
(14, 'User Status', '', 1, 'status', 0, '0000-00-00 00:00:00', 1, 'mod_status', 0, 2, 1, '', 0, 1, ''),
(15, 'Title', '', 1, 'title', 0, '0000-00-00 00:00:00', 1, 'mod_title', 0, 2, 1, '', 0, 1, ''),
(16, 'Polls', '', 0, 'right', 0, '0000-00-00 00:00:00', 0, 'mod_poll', 0, 0, 1, 'id=14\ncache=1', 0, 0, ''),
(17, 'User Menu', '', 7, 'left', 62, '2009-01-09 17:57:46', 1, 'mod_mainmenu', 0, 1, 1, 'menutype=usermenu\nmoduleclass_sfx=_menu\ncache=1', 1, 0, ''),
(18, 'Login Form', '', 0, 'hidden2', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 0, 'cache=0\nmoduleclass_sfx=\npretext=\nposttext=\nlogin=\nlogout=\ngreeting=1\nname=0\nusesecure=0\n\n', 1, 0, ''),
(19, 'Latest News', '', 0, 'user10', 0, '0000-00-00 00:00:00', 0, 'mod_latestnews', 0, 0, 1, 'count=5\nordering=c_dsc\nuser_id=0\nshow_front=1\nsecid=\ncatid=\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n', 1, 0, ''),
(20, 'Statistics', '', 3, 'user8', 0, '0000-00-00 00:00:00', 0, 'mod_stats', 0, 0, 1, 'serverinfo=1\nsiteinfo=1\ncounter=1\nincrease=0\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(21, 'Who''s Online', '', 14, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_whosonline', 0, 0, 1, 'cache=0\nshowmode=0\nmoduleclass_sfx=\n\n', 0, 0, ''),
(22, 'Popular', '', 1, 'user5', 0, '0000-00-00 00:00:00', 0, 'mod_mostread', 0, 0, 1, 'moduleclass_sfx=\nshow_front=1\ncount=5\ncatid=\nsecid=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(23, 'Archive', '', 9, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_archive', 0, 0, 1, 'cache=1', 1, 0, ''),
(24, 'Sections', '', 10, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_sections', 0, 0, 1, 'cache=1', 1, 0, ''),
(25, 'Newsflash', '', 1, 'user6', 0, '0000-00-00 00:00:00', 0, 'mod_newsflash', 0, 0, 1, 'catid=3\nlayout=default\nimage=0\nlink_titles=\nshowLastSeparator=1\nreadmore=0\nitem_title=0\nitems=\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(26, 'Related Items', '', 11, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_related_items', 0, 0, 1, '', 0, 0, ''),
(27, 'Search', '', 1, 'user9', 0, '0000-00-00 00:00:00', 0, 'mod_search', 0, 0, 0, 'moduleclass_sfx=\nwidth=20\ntext=\nbutton=\nbutton_pos=right\nimagebutton=\nbutton_text=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(28, 'Random Image', '', 9, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_random_image', 0, 0, 1, '', 0, 0, ''),
(29, 'Top Menu', '', 0, 'user7', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 1, 'menutype=topmenu\nmenu_style=list_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=-nav\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=-1\nindent_image2=-1\nindent_image3=-1\nindent_image4=-1\nindent_image5=-1\nindent_image6=-1\nspacer=\nend_spacer=\n\n', 1, 0, ''),
(30, 'Banners', '', 1, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_banners', 0, 0, 0, 'target=1\ncount=1\ncid=1\ncatid=33\ntag_search=0\nordering=random\nheader_text=\nfooter_text=\nmoduleclass_sfx=\ncache=1\ncache_time=15\n\n', 1, 0, ''),
(31, 'Resources', '', 5, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 1, 'menutype=othermenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, ''),
(32, 'Wrapper', '', 12, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_wrapper', 0, 0, 1, '', 0, 0, ''),
(33, 'Footer', '', 2, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 0, 'cache=1\n\n', 1, 0, ''),
(34, 'Feed Display', '', 13, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_feed', 0, 0, 1, '', 1, 0, ''),
(35, 'Breadcrumbs', '', 1, 'breadcrumb', 0, '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 0, 0, 1, 'moduleclass_sfx=\ncache=0\nshowHome=1\nhomeText=Home\nshowComponent=1\nseparator=\n\n', 1, 0, ''),
(36, 'Syndication', '', 3, 'syndicate', 0, '0000-00-00 00:00:00', 1, 'mod_syndicate', 0, 0, 0, '', 1, 0, ''),
(38, 'Advertisement', '', 3, 'right', 0, '0000-00-00 00:00:00', 0, 'mod_banners', 0, 0, 1, 'count=4\r\nrandomise=0\r\ncid=0\r\ncatid=14\r\nheader_text=Featured Links:\r\nfooter_text=<a href="http://www.joomla.org">Ads by Joomla!</a>\r\nmoduleclass_sfx=_text\r\ncache=0\r\n\r\n', 0, 0, ''),
(39, 'Example Pages', '', 8, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'cache=1\nclass_sfx=\nmoduleclass_sfx=_menu\nmenutype=ExamplePages\nmenu_style=list_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\nwindow_open=\n\n', 0, 0, ''),
(40, 'Key Concepts', '', 6, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 1, 'cache=1\nclass_sfx=\nmoduleclass_sfx=_menu\nmenutype=keyconcepts\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\nwindow_open=\n\n', 0, 0, ''),
(41, 'Welcome to Joomla!', '<div style="padding: 5px">  <p>   Congratulations on choosing Joomla! as your content management system. To   help you get started, check out these excellent resources for securing your   server and pointers to documentation and other helpful resources. </p> <p>   <strong>Security</strong><br /> </p> <p>   On the Internet, security is always a concern. For that reason, you are   encouraged to subscribe to the   <a href="http://feedburner.google.com/fb/a/mailverify?uri=JoomlaSecurityNews" target="_blank">Joomla!   Security Announcements</a> for the latest information on new Joomla! releases,   emailed to you automatically. </p> <p>   If this is one of your first Web sites, security considerations may   seem complicated and intimidating. There are three simple steps that go a long   way towards securing a Web site: (1) regular backups; (2) prompt updates to the   <a href="http://www.joomla.org/download.html" target="_blank">latest Joomla! release;</a> and (3) a <a href="http://docs.joomla.org/Security_Checklist_2_-_Hosting_and_Server_Setup" target="_blank" title="good Web host">good Web host</a>. There are many other important security considerations that you can learn about by reading the <a href="http://docs.joomla.org/Category:Security_Checklist" target="_blank" title="Joomla! Security Checklist">Joomla! Security Checklist</a>. </p> <p>If you believe your Web site was attacked, or you think you have discovered a security issue in Joomla!, please do not post it in the Joomla! forums. Publishing this information could put other Web sites at risk. Instead, report possible security vulnerabilities to the <a href="http://developer.joomla.org/security/contact-the-team.html" target="_blank" title="Joomla! Security Task Force">Joomla! Security Task Force</a>.</p><p><strong>Learning Joomla!</strong> </p> <p>   A good place to start learning Joomla! is the   "<a href="http://docs.joomla.org/beginners" target="_blank">Absolute Beginner''s   Guide to Joomla!.</a>" There, you will find a Quick Start to Joomla!   <a href="http://help.joomla.org/ghop/feb2008/task048/joomla_15_quickstart.pdf" target="_blank">guide</a>   and <a href="http://help.joomla.org/ghop/feb2008/task167/index.html" target="_blank">video</a>,   amongst many other tutorials. The   <a href="http://community.joomla.org/magazine/view-all-issues.html" target="_blank">Joomla!   Community Magazine</a> also has   <a href="http://community.joomla.org/magazine/article/522-introductory-learning-joomla-using-sample-data.html" target="_blank">articles   for new learners</a> and experienced users, alike. A great place to look for   answers is the   <a href="http://docs.joomla.org/Category:FAQ" target="_blank">Frequently Asked   Questions (FAQ)</a>. If you are stuck on a particular screen in the   Administrator (which is where you are now), try clicking the Help toolbar   button to get assistance specific to that page. </p> <p>   If you still have questions, please feel free to use the   <a href="http://forum.joomla.org/" target="_blank">Joomla! Forums.</a> The forums   are an incredibly valuable resource for all levels of Joomla! users. Before   you post a question, though, use the forum search (located at the top of each   forum page) to see if the question has been asked and answered. </p> <p>   <strong>Getting Involved</strong> </p> <p>   <a name="twjs" title="twjs"></a> If you want to help make Joomla! better, consider getting   involved. There are   <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank">many ways   you can make a positive difference.</a> Have fun using Joomla!.</p></div>', 0, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 2, 1, 'moduleclass_sfx=\n\n', 1, 1, ''),
(42, 'Joomla! Security Newsfeed', '', 6, 'cpanel', 62, '2008-10-25 20:15:17', 1, 'mod_feed', 0, 0, 1, 'cache=1\ncache_time=15\nmoduleclass_sfx=\nrssurl=http://feeds.joomla.org/JoomlaSecurityNews\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=1\nrssitems=1\nrssitemdesc=1\nword_count=0\n\n', 0, 1, ''),
(43, 'Gavick VirtueMart Header Rotator II', '', 0, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_gk2_vm_header_2', 0, 0, 0, 'moduleclass_sfx=_clear\nmoduleid=vmhr1\ngroup_id=1\ntext_bg=#fff\ntext_bg_opacity=0.88\nstarth=30\ntmargin=4\ntpadding=4\ntborder=1\ntbordercolor=#f1f1f1\ntbgcolor=#ffffff\nanimationSpeed=350\nanimationInterval=3500\npagination=0\npagination_height=24\npagination_top=0\npagination_left=0\npreloading=1\ndesclayer=1\ndesclayer_animation=1\nclean_code=1\nuseMoo=2\nuseScript=2\ncompress_js=1\n\n', 0, 0, ''),
(45, 'VirtueMart Shopping Cart', '', 0, 'hidden1', 62, '2009-01-07 16:03:07', 1, 'mod_virtuemart_cart', 0, 0, 0, 'moduleclass_sfx=\nvmCartDirection=0\nvmEnableGreyBox=1\n\n', 0, 0, ''),
(46, 'VirtueMart Featured Products', '', 2, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_virtuemart_featureprod', 0, 0, 1, 'max_items=4\nshow_price=1\nshow_addtocart=1\ndisplay_style=vertical\nproducts_per_row=3\ncategory_id=\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', 0, 0, ''),
(48, 'VirtueMart Random Products', '', 0, 'top', 0, '0000-00-00 00:00:00', 1, 'mod_virtuemart_randomprod', 0, 0, 1, 'max_items=4\nshow_price=1\nshow_addtocart=1\ndisplay_style=horizontal\nproducts_per_row=4\ncategory_id=\nmoduleclass_sfx=\nclass_sfx=\n\n', 0, 0, ''),
(56, 'Main Menu', '', 0, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, ''),
(57, 'Games Previews', '', 0, 'user1', 0, '0000-00-00 00:00:00', 1, 'mod_news_show_gk3', 0, 0, 1, 'moduleclass_sfx=\nmodule_unique_id=newsshow1\nwidth=150px\nnews_type=0\nsection=5\ncategory=34\nsections=\ncategories=\nids=\nnews_amount=15\nnews_sort_value=created\nnews_sort_order=DESC\nnews_frontpage=1\nnews_column=1\nnews_rows=2\nunauthorized=0\nonly_frontpage=0\nshow_list=1\nrounded=0\nlist_style=1\nnews_content_header_pos=1\nnews_content_image_pos=1\nnews_content_text_pos=4\nnews_content_info_pos=1\nnews_content_readmore_pos=2\nnews_readmore_text=Read more...\nnews_header_link=1\nnews_image_link=1\nnews_text_link=0\nnews_author=1\nnews_cats=1\nnews_date=1\nnews_more_in=1\nnews_header_order=1\nnews_image_order=2\nnews_text_order=3\nnews_info_order=4\nnews_limit_type=1\nnews_limit=150\nclean_xhtml=1\nnews_content_timezone=0\nplugin_support=0\nonly_plugin=0\nimg_height=135px\nimg_width=270px\ndate_format=D, d M Y\nusername=0\nstartposition=0\npanel=0\npanel_font=0\npanel_amount=0\nuseMoo=2\nuseScript=2\ncompress_js=1\n\n', 0, 0, ''),
(54, 'VirtueMart Latest Products', '', 0, 'top', 0, '0000-00-00 00:00:00', 1, 'mod_virtuemart_latestprod', 0, 0, 1, 'max_items=4\nshow_price=1\nshow_addtocart=1\ndisplay_style=horizontal\nproducts_per_row=4\ncategory_id=\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', 0, 0, ''),
(55, 'GK Embed Media', '', 3, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_gk_embed_media', 0, 0, 0, 'moduleclass_sfx=_clear\nmodule_unique_id=gk_embed_media\nurl=\nwidth=0\nheight=0\ntype=other\nyt_related=1\nyt_border=1\nyt_style=0\nyt_color1=0x000000\nyt_color2=0x000000\ngv_fs=1\nveoh_fs=1\nveoh_bg=#000000\nveoh_autoplay=1\ndm_size=1\ndm_fs=1\ndm_bg=000000\ndm_glow=000000\ndm_fg=FFFFFF\ndm_special=000000\ndm_autoplay=1\ndm_related=1\nrev_fs=1\nvid_fs=1\nvid_autoplay=1\nvid_player=1\nother=<object width="250" height="145"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=932937&server=vimeo.com&show_title=1&show_byline=1&show_portrait=0&color=&fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=932937&server=vimeo.com&show_title=1&show_byline=1&show_portrait=0&color=&fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" wmode="transparent" width="250" height="145"></embed></object>\n\n', 0, 0, ''),
(60, 'Topics', '<ul><li>GamesÂ Main</li><li>FreeÂ Games</li><li>PuzzleÂ Games</li><li>CardÂ &Â BoardÂ Games</li><li>CasinoÂ Games</li><li>WordÂ Games</li><li>ArcadeÂ Games</li><li>SportsÂ Games</li></ul>', 2, 'user5', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(61, 'Features', '<ul><li>FreeÂ PokerÂ Games</li><li>FreeÂ SolitaireÂ Games</li><li>FreeÂ Blackjack</li><li>GamesÂ forÂ Kids</li><li>CommunityÂ Forum</li><li>FreeÂ MobileÂ Games</li><li class="lastItem">GamesÂ Help</li></ul>', 2, 'user6', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(58, 'Editor''s Picks', '', 4, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_news_show_gk3', 0, 0, 1, 'moduleclass_sfx=\nmodule_unique_id=newsshow2\nwidth=0\nnews_type=0\nsection=5\ncategory=36\nsections=\ncategories=\nids=\nnews_amount=15\nnews_sort_value=created\nnews_sort_order=DESC\nnews_frontpage=1\nnews_column=1\nnews_rows=3\nunauthorized=0\nonly_frontpage=0\nshow_list=0\nrounded=0\nlist_style=1\nnews_content_header_pos=1\nnews_content_image_pos=1\nnews_content_text_pos=4\nnews_content_info_pos=1\nnews_content_readmore_pos=2\nnews_readmore_text=Read more...\nnews_header_link=1\nnews_image_link=1\nnews_text_link=0\nnews_author=0\nnews_cats=0\nnews_date=0\nnews_more_in=1\nnews_header_order=2\nnews_image_order=1\nnews_text_order=3\nnews_info_order=4\nnews_limit_type=1\nnews_limit=110\nclean_xhtml=1\nnews_content_timezone=0\nplugin_support=0\nonly_plugin=0\nimg_height=100px\nimg_width=210px\ndate_format=D, d M Y\nusername=0\nstartposition=0\npanel=0\npanel_font=1\npanel_amount=1\nuseMoo=2\nuseScript=2\ncompress_js=1\n\n', 0, 0, ''),
(59, 'Latest Headlines', '', 0, 'user2', 0, '0000-00-00 00:00:00', 1, 'mod_news_show_gk3', 0, 0, 1, 'moduleclass_sfx=\nmodule_unique_id=newsshow3\nwidth=0\nnews_type=0\nsection=5\ncategory=35\nsections=\ncategories=\nids=\nnews_amount=15\nnews_sort_value=created\nnews_sort_order=DESC\nnews_frontpage=1\nnews_column=1\nnews_rows=2\nunauthorized=0\nonly_frontpage=0\nshow_list=1\nrounded=0\nlist_style=1\nnews_content_header_pos=1\nnews_content_image_pos=1\nnews_content_text_pos=1\nnews_content_info_pos=1\nnews_content_readmore_pos=2\nnews_readmore_text=Read more...\nnews_header_link=1\nnews_image_link=1\nnews_text_link=0\nnews_author=1\nnews_cats=1\nnews_date=1\nnews_more_in=1\nnews_header_order=1\nnews_image_order=2\nnews_text_order=3\nnews_info_order=4\nnews_limit_type=1\nnews_limit=135\nclean_xhtml=1\nnews_content_timezone=0\nplugin_support=0\nonly_plugin=0\nimg_height=135px\nimg_width=270px\ndate_format=D, d M Y\nusername=0\nstartposition=0\npanel=0\npanel_font=0\npanel_amount=0\nuseMoo=2\nuseScript=2\ncompress_js=1\n\n', 0, 0, ''),
(62, 'Most Popular', '<ul><li>TexasÂ Hold''emÂ Poker</li><li>Canasta</li><li>GinÂ Rummy</li><li>SlotsÂ Lounge</li><li>Cribbage</li><li>SuperÂ Collapse!Â Puzzles</li><li>Hearts</li><li>Spades</li></ul>', 3, 'user7', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(63, 'Latest Games', '<ul><li>BejeweledÂ 2</li><li>TextTwist</li><li>ClassicÂ Solitaire</li><li>FamilyÂ Feud</li><li>SCRABBLEÂ Blast</li><li class="lastItem">JewelÂ Quest</li><li>Card Games</li><li>Other Games</li></ul>', 1, 'user8', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(64, 'Quick Links', '<ul><li>Buy Movie Tickets</li><li>Set My TiVo</li><li>Check Stock Quotes</li><li>Check Sports Scores</li><li>Lose Weight</li><li>Listen to Music</li><li>FreeÂ Coupons</li><li>MapQuest</li></ul>', 2, 'user9', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(66, 'Who''s Online', '', 2, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_whosonline', 0, 0, 1, 'cache=0\nshowmode=0\nmoduleclass_sfx=\n\n', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_modules_menu`
--

CREATE TABLE IF NOT EXISTS `bak_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_modules_menu`
--

INSERT INTO `bak_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 1),
(16, 1),
(17, 0),
(18, 0),
(19, 1),
(19, 2),
(19, 27),
(20, 1),
(21, 1),
(22, 1),
(22, 2),
(22, 27),
(25, 1),
(27, 0),
(29, 0),
(30, 0),
(31, 1),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0),
(38, 1),
(39, 43),
(39, 44),
(39, 45),
(39, 46),
(39, 47),
(40, 0),
(43, 1),
(45, 0),
(46, 53),
(48, 1),
(54, 1),
(55, 1),
(56, 2),
(56, 27),
(56, 34),
(56, 48),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(66, 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_newsfeeds`
--

CREATE TABLE IF NOT EXISTS `bak_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text NOT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(11) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(11) unsigned NOT NULL DEFAULT '3600',
  `checked_out` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `bak_newsfeeds`
--

INSERT INTO `bak_newsfeeds` (`catid`, `id`, `name`, `alias`, `link`, `filename`, `published`, `numarticles`, `cache_time`, `checked_out`, `checked_out_time`, `ordering`, `rtl`) VALUES
(4, 1, 'Joomla! Announcements', 'joomla-official-news', 'http://feeds.joomla.org/JoomlaAnnouncements', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(4, 2, 'Joomla! Core Team Blog', 'joomla-core-team-blog', 'http://feeds.joomla.org/JoomlaCommunityCoreTeamBlog', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(4, 3, 'Joomla! Community Magazine', 'joomla-community-magazine', 'http://feeds.joomla.org/JoomlaMagazine', '', 1, 20, 3600, 0, '0000-00-00 00:00:00', 3, 0),
(4, 4, 'Joomla! Developer News', 'joomla-developer-news', 'http://feeds.joomla.org/JoomlaDeveloper', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0),
(4, 5, 'Joomla! Security News', 'joomla-security-news', 'http://feeds.joomla.org/JoomlaSecurityNews', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 5, 0),
(5, 6, 'Free Software Foundation Blogs', 'free-software-foundation-blogs', 'http://www.fsf.org/blogs/RSS', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0),
(5, 7, 'Free Software Foundation', 'free-software-foundation', 'http://www.fsf.org/news/RSS', NULL, 1, 5, 3600, 62, '2008-09-14 00:24:25', 3, 0),
(5, 8, 'Software Freedom Law Center Blog', 'software-freedom-law-center-blog', 'http://www.softwarefreedom.org/feeds/blog/', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(5, 9, 'Software Freedom Law Center News', 'software-freedom-law-center', 'http://www.softwarefreedom.org/feeds/news/', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(5, 10, 'Open Source Initiative Blog', 'open-source-initiative-blog', 'http://www.opensource.org/blog/feed', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 5, 0),
(6, 11, 'PHP News and Announcements', 'php-news-and-announcements', 'http://www.php.net/feed.atom', NULL, 1, 5, 3600, 62, '2008-09-14 00:25:37', 1, 0),
(6, 12, 'Planet MySQL', 'planet-mysql', 'http://www.planetmysql.org/rss20.xml', NULL, 1, 5, 3600, 62, '2008-09-14 00:25:51', 2, 0),
(6, 13, 'Linux Foundation Announcements', 'linux-foundation-announcements', 'http://www.linuxfoundation.org/press/rss20.xml', NULL, 1, 5, 3600, 62, '2008-09-14 00:26:11', 3, 0),
(6, 14, 'Mootools Blog', 'mootools-blog', 'http://feeds.feedburner.com/mootools-blog', NULL, 1, 5, 3600, 62, '2008-09-14 00:26:51', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_plugins`
--

CREATE TABLE IF NOT EXISTS `bak_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `element` varchar(100) NOT NULL DEFAULT '',
  `folder` varchar(100) NOT NULL DEFAULT '',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `iscore` tinyint(3) NOT NULL DEFAULT '0',
  `client_id` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `bak_plugins`
--

INSERT INTO `bak_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Authentication - Joomla', 'joomla', 'authentication', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(2, 'Authentication - LDAP', 'ldap', 'authentication', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
(3, 'Authentication - GMail', 'gmail', 'authentication', 0, 4, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(4, 'Authentication - OpenID', 'openid', 'authentication', 0, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(5, 'User - Joomla!', 'joomla', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'autoregister=1\n\n'),
(6, 'Search - Content', 'content', 'search', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
(7, 'Search - Contacts', 'contacts', 'search', 0, 3, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(8, 'Search - Categories', 'categories', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(9, 'Search - Sections', 'sections', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(10, 'Search - Newsfeeds', 'newsfeeds', 'search', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(11, 'Search - Weblinks', 'weblinks', 'search', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(12, 'Content - Pagebreak', 'pagebreak', 'content', 0, 10000, 1, 1, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
(13, 'Content - Rating', 'vote', 'content', 0, 4, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Content - Email Cloaking', 'emailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'mode=1\n\n'),
(15, 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', 0, 5, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(16, 'Content - Load Module', 'loadmodule', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n'),
(17, 'Content - Page Navigation', 'pagenavigation', 'content', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'position=1\n\n'),
(18, 'Editor - No Editor', 'none', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(19, 'Editor - TinyMCE 2.0', 'tinymce', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 'theme=advanced\ncleanup=1\ncleanup_startup=0\nautosave=0\ncompressed=0\nrelative_urls=1\ntext_direction=ltr\nlang_mode=0\nlang_code=en\ninvalid_elements=applet\ncontent_css=1\ncontent_css_custom=\nnewlines=0\ntoolbar=top\nhr=1\nsmilies=1\ntable=1\nstyle=1\nlayer=1\nxhtmlxtras=0\ntemplate=0\ndirectionality=1\nfullscreen=1\nhtml_height=550\nhtml_width=750\npreview=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\n\n'),
(20, 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(21, 'Editor Button - Image', 'image', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(22, 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(23, 'Editor Button - Readmore', 'readmore', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(24, 'XML-RPC - Joomla', 'joomla', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(25, 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n'),
(27, 'System - SEF', 'sef', 'system', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(28, 'System - Debug', 'debug', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n'),
(29, 'System - Legacy', 'legacy', 'system', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', 'route=0\n\n'),
(30, 'System - Cache', 'cache', 'system', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n'),
(31, 'System - Log', 'log', 'system', 0, 5, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(32, 'System - Remember Me', 'remember', 'system', 0, 6, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(33, 'System - Backlink', 'backlink', 'system', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_polls`
--

CREATE TABLE IF NOT EXISTS `bak_polls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `voters` int(9) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `lag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `bak_polls`
--

INSERT INTO `bak_polls` (`id`, `title`, `alias`, `voters`, `checked_out`, `checked_out_time`, `published`, `access`, `lag`) VALUES
(14, 'Joomla! is used for?', 'joomla-is-used-for', 11, 0, '0000-00-00 00:00:00', 1, 0, 86400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_poll_data`
--

CREATE TABLE IF NOT EXISTS `bak_poll_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `bak_poll_data`
--

INSERT INTO `bak_poll_data` (`id`, `pollid`, `text`, `hits`) VALUES
(1, 14, 'Community Sites', 2),
(2, 14, 'Public Brand Sites', 3),
(3, 14, 'eCommerce', 1),
(4, 14, 'Blogs', 0),
(5, 14, 'Intranets', 0),
(6, 14, 'Photo and Media Sites', 2),
(7, 14, 'All of the Above!', 3),
(8, 14, '', 0),
(9, 14, '', 0),
(10, 14, '', 0),
(11, 14, '', 0),
(12, 14, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_poll_date`
--

CREATE TABLE IF NOT EXISTS `bak_poll_date` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL DEFAULT '0',
  `poll_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `bak_poll_date`
--

INSERT INTO `bak_poll_date` (`id`, `date`, `vote_id`, `poll_id`) VALUES
(1, '2006-10-09 13:01:58', 1, 14),
(2, '2006-10-10 15:19:43', 7, 14),
(3, '2006-10-11 11:08:16', 7, 14),
(4, '2006-10-11 15:02:26', 2, 14),
(5, '2006-10-11 15:43:03', 7, 14),
(6, '2006-10-11 15:43:38', 7, 14),
(7, '2006-10-12 00:51:13', 2, 14),
(8, '2007-05-10 19:12:29', 3, 14),
(9, '2007-05-14 14:18:00', 6, 14),
(10, '2007-06-10 15:20:29', 6, 14),
(11, '2007-07-03 12:37:53', 2, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_poll_menu`
--

CREATE TABLE IF NOT EXISTS `bak_poll_menu` (
  `pollid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_sections`
--

CREATE TABLE IF NOT EXISTS `bak_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `bak_sections`
--

INSERT INTO `bak_sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES
(1, 'News', '', 'news', 'articles.jpg', 'content', 'right', 'Select a news topic from the list below, then select a news article to read.', 1, 0, '0000-00-00 00:00:00', 3, 0, 2, ''),
(3, 'FAQs', '', 'faqs', 'key.jpg', 'content', 'left', 'From the list below choose one of our FAQs topics, then select an FAQ to read. If you have a question which is not in this section, please contact us.', 1, 0, '0000-00-00 00:00:00', 5, 0, 23, ''),
(4, 'About Joomla!', '', 'about-joomla', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 2, 0, 14, ''),
(5, 'Demo', '', 'demo', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 6, 0, 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_session`
--

CREATE TABLE IF NOT EXISTS `bak_session` (
  `username` varchar(150) DEFAULT '',
  `time` varchar(14) DEFAULT '',
  `session_id` varchar(200) NOT NULL DEFAULT '0',
  `guest` tinyint(4) DEFAULT '1',
  `userid` int(11) DEFAULT '0',
  `usertype` varchar(50) DEFAULT '',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `data` longtext,
  PRIMARY KEY (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_session`
--

INSERT INTO `bak_session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`) VALUES
('', '1294786587', 'e3d25280914a66128af6805a49cafe73', 1, 0, '', 0, 0, 'DX4lG4W492Kf04i2Iikb9tldGInJ78DszkgwFDUtQFNqqVSMIZBLKC0dfw8OqcCVIV2kyewVTaPSxNSuY7Eov16X7eBOJZ-5kUgSuLEKW7EcHh-uB-MWLTGadpzOGxYx5XtD9pXqyEnaLeRBAm1Q1wD6Eo4YdrEs0f3IXppG_YzF_UY8uV_ZtGPJJ5PYGnl1eljBRwfft1v49tP5KYhF2SBfgAx_78GlWiL4uGz3443UWK5bFftktBHz4Cp48ZPbjnFzLndyqK6pKh6ioxJ_TTR13SFMdHxp3KGJ9On5Kw9prSMbqLVCda2LE9phdatguo4nUQ4QCfMnvffAQNp6DwvvmnyrhkZuUWSnX2oyPcjgvgpTBadG4bT1yYr87ZX_QyfZ1VpnuUDLk-oCOrQToULQlwdr6Klb1g1yPt3CHecw_Z3y9g2fuN5AMKdZXb-vZVEHCKxc3iRebhZZXM77NRVO-y8UzZiKj1B6pC2jibWdgsmPOSIHDthWJpV0riHHDPEblGtYUvQpscTsQPEwyPb4_pV-xgr63ifibThZu5pCVxGjwKRwozXsZRISnbLUuCq8N7jdSB-Di7dU_sBxrUyLQsoAyFuzX-pR3rBozMdcu0vbUXJM86L-J1ErL8cBNDUHyaJTLmbNiCLNiQzfdMcFzVyfd7sMSbMjERvS76NB1i9Moh_Ww4RvJcFySlCdzNetsv3G5iIKaRHF8M4UQGQADkRYmeGXoTiVmBFbEKB-wT-tXkK_tcfefP0usJ4Z653qBUom9rF4lU6osP-DAIluMWFEY0hgt4KpSUyCF0MxC4NB33GS6V-USHk7xxvm2iMwLcxWyH-ChUYAqP-RVDatEGvRjMJePQRvM7gciQGUx9AakXVpQ7kDP2BCb3eF-N6o1rTyILCyqLyalhk5M1hOL0HcYISuPpuDfiwCMSJUvGBM_txLq8iZng5qcgUcyGZ-HQxre34F5sE929fmPxc0F_XblXfrTdnj2XuhJsJzKOe3rOsArG8ZaqrbrgN3KGxnvy2nKKDjEtFWoLQUxQCutRm0mduyhp__HIMrdiijfLnsW7qqS4zOUuA3QbZh5fMy1C2HZA7bRxnl5gkxsT5z8jzClrBRtWu2w8mYGVEmBehR-FAWbqwFiSRi_jKlq1oxbk2FDyy1R-tKEPFUq8tk6n_XZBHhuNFrNhk-q93asnI3BdPfxBukMGEwyGNv938Tp_L8iJ8bEmHnSgNWEOqMEB5kdscr6Vdn0pFo_035QfSHI0OrwVgm5oSlrEqctqPB6G3nesieCys854_MdYbr0DuTuncx-RRH56tJjcahHyc8iFuVVwlLgj3ibRWC1LaMCA9UwYa_6I6GomsIwocZp5oXFTepAu4oh1kVeEqoNQijI2U0qaFzERVnu222jpRzu_8MhTBVqvZmB0cK4511fzKBvzLznTCfEGCj6t-YAU_419QkmfakV3IMcD_aKcjbYvOpgqeFk9mT3NAdbGxd6Ostynzuc0CUqZD6-wXi9o5LufN6ChH_PycX9uTNVJdogHSX1y5R1VP5jDyd8_GuVCpp-DZeujtWFs2z3j7EBLHvg8IxSG6poZJhjykgRmc0VErMou4rIfljksqS8wCoO7QM9lwmCFfEfa6wYrpzvknBl-6PXsmSTPBGvWipuqdKLhpSx3dNoCFGbOSHZhzvYAxMkVSKoyYmeitFlIXSP5qi8iy_VbADoYaWyLoyJzvVLlrh_GjDUT5MEBlrHO02tti6nlfki27bvrwd3VU7mh9-UyBmKL7iqN3XeGuoP0GKY20zvzSGeolGn8GecdimP5EYp6Ri1pZowbBeIicdqDziYUktFM4uDWYFjoG-kfs8r-smQfPC0sGr6xdt8Urb2_P4jT-zW0wP0uaDNVyoVqDNJUSYNFjD4BHA8C1mWW7_CNAWlTgB2_9FNnLTNQjhQVyaLUFczVHEkeVjlEyELaVk6jVE2z2WFhW20Gro9xVEGSnj6ZNGPMQOqSAsUdMS7AkJO_2ZTgVdncAivlRaG4fP8ZztrfwVjcE8i0xl0rT7ueOfslSfrBIfE7Jh70gE2lvPrZ24klWVZXNqIODs53-zqccu-j6UvN3AXUfBgs56rVss5z7CgXyIXe6Y1FXS93htq8akqsODdz_D5bcQ7qR9ReAPAnVjd7zoXLKYaHb7AI_yChs5u8QwdkhpCkYDop9CE3mgjnN90jBbk33m116a1w-igRwhyGPB8Mu2wJHiRZczCp2qKNtSyeFuyAvHUOamG8YqGJrkA5VOHLLYa-Ly0toOX4x_zsfLqvq3ZtnMQaQaxjJgjxjM88pwfsVxXsRqgZKFaB6ym4Sijz8YkgjjkdLdj1UDlMhv9J3medhPLlmQ36d8L94xtJYS25XK2s1nOyMxLxtyqLlWSnH-Fd1UoLJnp1Mpb48c93r9ce0JHIZ4itrlPTyuJNqVw6FBjBdZAizsUuIDLzmFLMxfKRYBZpzeH-euypPqJXoF70X_-1GgbFXDMRmifXo4H30gPXX0Je6yuXSZvqI_V8As65GfS1YrpXMyuWnU4k99EjiNbaOh0txghEygBay1x9liXZJD9jV_JvRPes7z1fHD6eWkaCtU7kyTRyc9o_aOB6LpM1x3wsho6EOTbE_3U4DQkb--dJPyI-kmERUG6HQynI6Nnm0_hdf4RcBnIkUEO--bznT96TC5tZBpS6nlgQvl_xvjPdxDuygbaw7Wv0uHYDgl6W-BVBbiVwmTe5B5q-dq7xFk5iqQ4c2PuJPk27GnY894H1JMhUeTtfD2gt8rSlhR7XB4S6sKR1NPGvMCSd1jgIqBYT2aHmOSi9w_x3e7DsTfWT3eUTbCLS031jdOnwGYve7Krn76uegt8Rf7hrlHfYB-k3omkKBPpxLtrfuYd3F6KRyoy3LzHAAwVkmbrzayx1FSMuh7e3H24vRt_EjqzHrvIfx9e-x7lJLIq5wdeJSB86I0XxDTD7BHQ4KhUF64qtCaJxZo2MtUETnQRoyX6TNBc5f5XWWc2OV3q-lfupZMpD2ekmVuJP-aJMjs4I9om3bsWX3ve6eQhuV8EPbq45kviQPLy4pR8z3OcAzuohP0-8O_6PCoskuMa6BRULYOqWxn9iWgJKSX-2-fww-_S9GsQdQhmXZkptz3Lc-k57n4WSiP732ez4aBForTY1rpfPyg7b8I5X_QahJekZqSSSt3Y-na7wElQxJ4CB2M5Pm7CfBFr0PayPze5MK2Nv2LEvkiHjtee_D2lQwrZ9s9hm8tyR-OAGe4SUbpmZFr41bJVCPvh10Kgv-n0n4j2QxRyi0AvZBM0FIAU3QSUYR8iefisulyJGUqUf12fXPsIvVMdGoHjXre-RO9GQ6_INn3nQmOK0lliGMJa3NPGN7_dJXpuuJlF9tH0eoyViLRXwUlOZ8__2gOnV2ft4rlHS166Mf5Wg6CVRuzA703K3NUPjdCXvHgQtYXuEpKJ1sy55UP8AbWvrM1qQXJv_hYxnmBQyWqKlTq-n9pnd3iXMKAw0rTS2zv8AP1XZZhKT2AzypqHG8ezOKPsQrQCxbjtTv93OuVn8FlTsDpiVkI8U5dip5NBaeI5llNRyDTOI9ba483Io1HDNhbqWS9dCBrRH3bPr6amh94QDd9KbSasaZxMGvdMKrRxCUXcZuPAXYrdgY5IRlRJkp953Fj4OcrtBfcQkENSLxd-N6o3r0mJuHIU-bTrMbojEDrzsYY3dypLGuiGiYJL589D5PpXI7HCh5mJTdcTWGvDq18yPuZtU0t7kWAqjKoqHwfK426evkivimr2mIxw_wMm2Oj8QvRar8mPZVEIDOKhcU5pjv_3Y_CN65j8vEsIJHba3OSgu79K5LPsWj17DrD77CzItS-NGYgUGPMIMi9bBEUQ3iz4H5l2aZNka_LO1ExGibi92i4mp1a941HrQStkvTF508MIdI2pzIZBdBff89RNzZGQq2QfUlrJ-dz9HQd0zAhhpOrEsM3E9XVYvBylQPCbVxbFPmFvgQ5SW217kqIJb3GA6PUpbuUVmLg8txgXn7OMze4piQEN2Ck5BDK9_RrUIFMsr4vRzI8o7Em0sBj8-T69FnRInPuhJeX4etWhCqdUrFr8o4LxuOqnYbz5itZL5bl1HrkZuiGmFulM3fFQK6NESQbObdvpS7J1lgk-qodXC-8i1Y9sgrdwubn6se3ZEPlhZIsOiqYrowh5XFABpWeuwpVTF4CnX8QfVzAVXxJ_IY-LobnkRLEDNh1Dui6hKJ1uEUwRgWpo2c8rbVkYmaNlpw-KpInaXtICyze8xyrV90tcT86LPaYTzVpFSFG6UHouXxk9thCLknTEGb83zERPcKK2Z-WZZYALJV011R2ZR53AWMRRmWI5NyWWLx37iHk4G1tHF1QBE4lokaceoO3u6hq5ONAfEJubtYU34NFNkndYaGXLxe2KK1SEiPupBSluG3WvLTTLU7A5x0bIAOtctzn6J7yCDCEhtBxcKwWlsNrVIkVs8ltBvYopDcK5985H60CeqSEAOtoHLhAxvMf43-Ka2dzotYDNGBrZQeo-f0i3_scy53QEQOGSvqsZqzDeMUqXOoXz0j_u0psWZBpbfTTG7GTGXJ7yO3_Ro-3hcMPH0k2iZuUycHsW9MC0BiVzQ1lsmUt4egaPRls8lvL_WxH372Z-g79vheTappUqia_VVFBPMebRAsiz08HmKYrFBw08lIP0qIUzMWEjTPAX7Y1ZBmVvDpC0HsK5fAQ3ivCjWdxp7lv4opuIgynW96ooJ6QDH_2JFQaFjW6ifNtJm4AzikxG0n_1NEjbc0CxvCvMS1A2ejIteJnG0Rh9qZvVNWRLMG1sYANFmxWAsngOTKoscijxXFFb7sxf7hTF2jX9kcPSxViEv8vghhIWkhTugQpDnQLKUUfErSyY0OojuebX8Yyv4P-xYXfQTKPI5gAF360Zjz4_MYrufViujgOqM4cZJzayw_Txmpl6zhzZeH2Ar2I59kqmq1t5YXI4zWgN2ZHq_NYE1J_K3cFywpsDi_9hdUm4sxWoKNoR5AU5dOp9kifSDTvipnYHCsTpHBEvfILHy8cseFL-XCVr4XNuACVwJDOPGGnvuWlrvmW2wvAVvGEgSL4dxsfYSs01uNUMhzLDhAKmjCL_GfTr0fbgZagoePXQY4Wz1Eo_Of0Tf6gNk-ewhEzR4adTjbMMchsKLpY8SAzgog6EMjnnQh0mwoc4f6qe493y3Pk5aprHMrCX-huQ8ZH89wW0I5Qb44yiFycTyLFyqRb3293-iBIlwYLRhGGx53avkGkY0E0h6M4RveKLWNPLhmyubcTuYhPGTCqqlOs1v1FrYG36qvSmhppMKyGcTpogqejVpstgyNxXa27Li8MH_-yRMmLdA..'),
('admin', '1294786583', 'cfb1a80854a0001235bb3a201c34415f', 0, 62, 'Super Administrator', 25, 1, 'UHGin3Ze833Srj24siNeTURoWIriAhjf5KFJIY1u5qkVjwmT4xK6g4y0F_xcS7Gazwold9WALG6-T_N9aDWapVbk-s-4z9gHBhspmGuhvWjh-zN_QTm0Mir4dpXPexwRSm8g1UCm6ccxcVUBQXw-IdwXDEWEgF53vN8WNv9NPNTgxXyzrQ71VbnGI8BdGfx7ArWoaeRNl6x_T3f0RhS6nST1jlTN1VdgEFpeQ5w-ksE432KGiEqhXLYd6fI_h9ymST8yN9SS_fgFgYZtMOCoQugOiFkMwea9yASDrYAzGaflOYW2Nneev-Iqb5nU2tduM3tU4RuxstzuIcTdOS9MirarBTt8D5WcNRGPekI8EwNnUN01ADXqfpLLByA6DbIxBjQrDFV4zJRSRWfst9Sdtkw-cjjcHH8lHuH1s7mejCc4iL6uBFP8KYBGoi1vBD7q9Ggg5wNdKjm_NEl06amr7J7VJUHt0-aOYCSYqAADx-L0NfiwIonwmsr-4NGI1vlt288CG-jR0s6y5d5oJiVGB3YwZ9VXlaeYDX3_fhq5nSM44zuc7uGhT51keUPqh0gbD9Oc8WZdH_oMXLVljNCMSg186ArT4BAProdchdNK7viBfGY_wQnmJYTRQDQDDAfVXi38z9NOuxpQZAu1HqBISDgK97O-JVNrsxfBHB6YPx0_U1zw6kHaWb1MqQwbIEtXCVfXfWKdDXQHwwt-3_Jo4Uu0Hdh2ZA40i-C-tPh8zfDkA5JzivmIp9TFhLInag1r68kFCSs0a4gE53GtgokWTO4gcG14IsUmywsl7u7kJkEcdKUR8uPyAQ-gDS2d1lDbbbKP2iu6ANh_-WDWUD8nkszmckL1fLefdaAWZhc43mbzds318TU3Rwvb7QNEWRHlu9U8l8WNV1wIrg1Py1P0w-fFz23EWYPyTwNG2wj0Hg3ZftgooNEzV_FQFoD4_yLrutXAYagTPkno6ZSlX7WjqQeiqM5P76tjP5R6DAhsaOZCVPoIJFVq5tM9y5QIlPW_wbFLSa8Pw3b7Wg1NuHGPjv3L-qCrd74BMaUN7dq00oyDLq1CQDrdPPfnLgtxmHcWdpPrtUGX64NKgiYj7RE4STgl2-DTwsxTmg_cdM5oWIbsgKSAB3ghDc_FrsV-Ghb9g8vT1TohhaKNiW1gP4_99xslf_eoGhwD23PaaHRKrl5bCMcSKKqUkapvf6pdAPyOAO3k5G61KT8AInTBpITqeTxiPLAf1XUimph4psKAXB0kV4f7yvcpesB3RqKVNmMC-9Uja4riaYSLwrhW-WivKz61YUh_7fBuPM6e59BZ4-55Dv7a05XRzXjPkdz0lUdbIE5wzBeAT5TTMYKvJNi4C0Paip6IUZLacePrAe1teD2NGSKr9iZY_QRx-uIJxolmMwaEIlhyMftQssQK2Pm0cH3rdNKJe4VDXC9BuaG396kjMYkVrJ9A9NxbpswsUj2ObDfreV-UpLpHjOhYiWyphPA8KfQRL8UmtCOZPb4Hx-mvbF2b78c0ZW6jYne8kP4d1usyGyA_syrfhRcKnzgcHZXB21Lg8jGEoRKmSQ1dF6LbGYAUMylyj5QWHBa0v66TiiAMVSweAHqQjQahaBEmYobxNPt96VMTrQfVVOopey7e2NfTVrOHoz_w4xA5mgez0x9WBxQhGznfZ-QEiPwixJctDDYyMy5a0dUKCI98yGIr35d6fmhK7WDVmWeQz1dgb-BDpFokqFxII5x5XQEvR8XjaeM5Lk6QCt0ByP8vPwwkWxTXBEhm1yw4JRiRBX8Cwd3DEo2qbYqcqCSUiMUuyULXpbrKD7dmTCjX6rBi3XeFkjS4_waDMuQe1G1vF25YBxdfAakSVnb4iRcQukOKwxRaHn8LCf_zXAnOKZvJpkbcCD2U9ZgAZ59fOtXsSspXb0yoUewl8X6wVUdB7obRqIM1w9sJofh05MwBu8fgglIrmTFxgOPlpd6z9g3awOuZOogbQBdBVLdHquQPFjpbDY1XSA9iQ6UN-icJ0d_QCpNvgeaRf7eMUVxm9psKVweHDuCFQN-HYIj05fJ04zq9UEQWi5qIgP-5PIPJcD03rHqzj4CZWuRHBTVXrooORTcKXriKh6x04xsbKW3BRval_gARn8Vms0yZpErxDBE-I4YHHXKna0bA0IkR8iq0Ym4NsiDjgs6rF09d6do7JtVMIt9nKG5VihpTWA2CvrT-khg.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_stats_agents`
--

CREATE TABLE IF NOT EXISTS `bak_stats_agents` (
  `agent` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_templates_menu`
--

CREATE TABLE IF NOT EXISTS `bak_templates_menu` (
  `template` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bak_templates_menu`
--

INSERT INTO `bak_templates_menu` (`template`, `menuid`, `client_id`) VALUES
('gk_elvesocial', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_users`
--

CREATE TABLE IF NOT EXISTS `bak_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `usertype` varchar(25) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `bak_users`
--

INSERT INTO `bak_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`) VALUES
(62, 'Administrator', 'admin', 'eee@eee.pl', '77fe4f73ac57b3557f3b48cff96071f7:ZjxNrTR9po56wQaot96w2XWRNe7TBf9z', 'Super Administrator', 0, 1, 25, '2009-01-04 11:54:40', '2011-01-11 22:56:06', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_affiliate`
--

CREATE TABLE IF NOT EXISTS `bak_vm_affiliate` (
  `affiliate_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `active` char(1) NOT NULL DEFAULT 'N',
  `rate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`affiliate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Used to store affiliate user entries' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_affiliate_sale`
--

CREATE TABLE IF NOT EXISTS `bak_vm_affiliate_sale` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `visit_id` varchar(32) NOT NULL DEFAULT '',
  `affiliate_id` int(11) NOT NULL DEFAULT '0',
  `rate` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores orders that affiliates have placed';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_auth_group`
--

CREATE TABLE IF NOT EXISTS `bak_vm_auth_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(128) DEFAULT NULL,
  `group_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds all the user groups' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `bak_vm_auth_group`
--

INSERT INTO `bak_vm_auth_group` (`group_id`, `group_name`, `group_level`) VALUES
(1, 'admin', 0),
(2, 'storeadmin', 250),
(3, 'shopper', 500),
(4, 'demo', 750);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_auth_user_group`
--

CREATE TABLE IF NOT EXISTS `bak_vm_auth_user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps the user to user groups';

--
-- Volcado de datos para la tabla `bak_vm_auth_user_group`
--

INSERT INTO `bak_vm_auth_user_group` (`user_id`, `group_id`) VALUES
(62, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_auth_user_vendor`
--

CREATE TABLE IF NOT EXISTS `bak_vm_auth_user_vendor` (
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  KEY `idx_auth_user_vendor_user_id` (`user_id`),
  KEY `idx_auth_user_vendor_vendor_id` (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a user to a vendor';

--
-- Volcado de datos para la tabla `bak_vm_auth_user_vendor`
--

INSERT INTO `bak_vm_auth_user_vendor` (`user_id`, `vendor_id`) VALUES
(62, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_cart`
--

CREATE TABLE IF NOT EXISTS `bak_vm_cart` (
  `user_id` int(11) NOT NULL,
  `cart_content` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores the cart contents of a user';

--
-- Volcado de datos para la tabla `bak_vm_cart`
--

INSERT INTO `bak_vm_cart` (`user_id`, `cart_content`, `last_updated`) VALUES
(62, 'a:1:{s:3:"idx";i:0;}', '2009-01-15 02:34:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_category`
--

CREATE TABLE IF NOT EXISTS `bak_vm_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `category_name` varchar(128) NOT NULL DEFAULT '',
  `category_description` text,
  `category_thumb_image` varchar(255) DEFAULT NULL,
  `category_full_image` varchar(255) DEFAULT NULL,
  `category_publish` char(1) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `category_browsepage` varchar(255) NOT NULL DEFAULT 'browse_1',
  `products_per_row` tinyint(2) NOT NULL DEFAULT '1',
  `category_flypage` varchar(255) DEFAULT NULL,
  `list_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `idx_category_vendor_id` (`vendor_id`),
  KEY `idx_category_name` (`category_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Product Categories are stored here' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `bak_vm_category`
--

INSERT INTO `bak_vm_category` (`category_id`, `vendor_id`, `category_name`, `category_description`, `category_thumb_image`, `category_full_image`, `category_publish`, `cdate`, `mdate`, `category_browsepage`, `products_per_row`, `category_flypage`, `list_order`) VALUES
(6, 1, 'XBox 360', '', 'resized/XBox_360_496e48257d02c_180x180.png', 'XBox_360_496e4825893b3.png', 'Y', 1231947294, 1231964774, 'browse_4', 1, 'flypage.tpl', 4),
(7, 1, 'PlayStation 3', '', 'resized/PlayStation_3_496e4a80a7d43_180x180.png', 'PlayStation_3_496e4a80b19ab.png', 'Y', 1231947311, 1231964800, 'browse_4', 1, 'flypage.tpl', 5),
(8, 1, 'Wii', '', 'resized/Wii_496e4b80bd131_180x180.png', 'Wii_496e4b80c6d79.png', 'Y', 1231947328, 1231965056, 'browse_4', 1, 'flypage.tpl', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_category_xref`
--

CREATE TABLE IF NOT EXISTS `bak_vm_category_xref` (
  `category_parent_id` int(11) NOT NULL DEFAULT '0',
  `category_child_id` int(11) NOT NULL DEFAULT '0',
  `category_list` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_child_id`),
  KEY `category_xref_category_parent_id` (`category_parent_id`),
  KEY `idx_category_xref_category_list` (`category_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Category child-parent relation list';

--
-- Volcado de datos para la tabla `bak_vm_category_xref`
--

INSERT INTO `bak_vm_category_xref` (`category_parent_id`, `category_child_id`, `category_list`) VALUES
(0, 6, NULL),
(0, 7, NULL),
(0, 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_country`
--

CREATE TABLE IF NOT EXISTS `bak_vm_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) NOT NULL DEFAULT '1',
  `country_name` varchar(64) DEFAULT NULL,
  `country_3_code` char(3) DEFAULT NULL,
  `country_2_code` char(2) DEFAULT NULL,
  PRIMARY KEY (`country_id`),
  KEY `idx_country_name` (`country_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Country records' AUTO_INCREMENT=245 ;

--
-- Volcado de datos para la tabla `bak_vm_country`
--

INSERT INTO `bak_vm_country` (`country_id`, `zone_id`, `country_name`, `country_3_code`, `country_2_code`) VALUES
(1, 1, 'Afghanistan', 'AFG', 'AF'),
(2, 1, 'Albania', 'ALB', 'AL'),
(3, 1, 'Algeria', 'DZA', 'DZ'),
(4, 1, 'American Samoa', 'ASM', 'AS'),
(5, 1, 'Andorra', 'AND', 'AD'),
(6, 1, 'Angola', 'AGO', 'AO'),
(7, 1, 'Anguilla', 'AIA', 'AI'),
(8, 1, 'Antarctica', 'ATA', 'AQ'),
(9, 1, 'Antigua and Barbuda', 'ATG', 'AG'),
(10, 1, 'Argentina', 'ARG', 'AR'),
(11, 1, 'Armenia', 'ARM', 'AM'),
(12, 1, 'Aruba', 'ABW', 'AW'),
(13, 1, 'Australia', 'AUS', 'AU'),
(14, 1, 'Austria', 'AUT', 'AT'),
(15, 1, 'Azerbaijan', 'AZE', 'AZ'),
(16, 1, 'Bahamas', 'BHS', 'BS'),
(17, 1, 'Bahrain', 'BHR', 'BH'),
(18, 1, 'Bangladesh', 'BGD', 'BD'),
(19, 1, 'Barbados', 'BRB', 'BB'),
(20, 1, 'Belarus', 'BLR', 'BY'),
(21, 1, 'Belgium', 'BEL', 'BE'),
(22, 1, 'Belize', 'BLZ', 'BZ'),
(23, 1, 'Benin', 'BEN', 'BJ'),
(24, 1, 'Bermuda', 'BMU', 'BM'),
(25, 1, 'Bhutan', 'BTN', 'BT'),
(26, 1, 'Bolivia', 'BOL', 'BO'),
(27, 1, 'Bosnia and Herzegowina', 'BIH', 'BA'),
(28, 1, 'Botswana', 'BWA', 'BW'),
(29, 1, 'Bouvet Island', 'BVT', 'BV'),
(30, 1, 'Brazil', 'BRA', 'BR'),
(31, 1, 'British Indian Ocean Territory', 'IOT', 'IO'),
(32, 1, 'Brunei Darussalam', 'BRN', 'BN'),
(33, 1, 'Bulgaria', 'BGR', 'BG'),
(34, 1, 'Burkina Faso', 'BFA', 'BF'),
(35, 1, 'Burundi', 'BDI', 'BI'),
(36, 1, 'Cambodia', 'KHM', 'KH'),
(37, 1, 'Cameroon', 'CMR', 'CM'),
(38, 1, 'Canada', 'CAN', 'CA'),
(39, 1, 'Cape Verde', 'CPV', 'CV'),
(40, 1, 'Cayman Islands', 'CYM', 'KY'),
(41, 1, 'Central African Republic', 'CAF', 'CF'),
(42, 1, 'Chad', 'TCD', 'TD'),
(43, 1, 'Chile', 'CHL', 'CL'),
(44, 1, 'China', 'CHN', 'CN'),
(45, 1, 'Christmas Island', 'CXR', 'CX'),
(46, 1, 'Cocos (Keeling) Islands', 'CCK', 'CC'),
(47, 1, 'Colombia', 'COL', 'CO'),
(48, 1, 'Comoros', 'COM', 'KM'),
(49, 1, 'Congo', 'COG', 'CG'),
(50, 1, 'Cook Islands', 'COK', 'CK'),
(51, 1, 'Costa Rica', 'CRI', 'CR'),
(52, 1, 'Cote D''Ivoire', 'CIV', 'CI'),
(53, 1, 'Croatia', 'HRV', 'HR'),
(54, 1, 'Cuba', 'CUB', 'CU'),
(55, 1, 'Cyprus', 'CYP', 'CY'),
(56, 1, 'Czech Republic', 'CZE', 'CZ'),
(57, 1, 'Denmark', 'DNK', 'DK'),
(58, 1, 'Djibouti', 'DJI', 'DJ'),
(59, 1, 'Dominica', 'DMA', 'DM'),
(60, 1, 'Dominican Republic', 'DOM', 'DO'),
(61, 1, 'East Timor', 'TMP', 'TP'),
(62, 1, 'Ecuador', 'ECU', 'EC'),
(63, 1, 'Egypt', 'EGY', 'EG'),
(64, 1, 'El Salvador', 'SLV', 'SV'),
(65, 1, 'Equatorial Guinea', 'GNQ', 'GQ'),
(66, 1, 'Eritrea', 'ERI', 'ER'),
(67, 1, 'Estonia', 'EST', 'EE'),
(68, 1, 'Ethiopia', 'ETH', 'ET'),
(69, 1, 'Falkland Islands (Malvinas)', 'FLK', 'FK'),
(70, 1, 'Faroe Islands', 'FRO', 'FO'),
(71, 1, 'Fiji', 'FJI', 'FJ'),
(72, 1, 'Finland', 'FIN', 'FI'),
(73, 1, 'France', 'FRA', 'FR'),
(74, 1, 'France, Metropolitan', 'FXX', 'FX'),
(75, 1, 'French Guiana', 'GUF', 'GF'),
(76, 1, 'French Polynesia', 'PYF', 'PF'),
(77, 1, 'French Southern Territories', 'ATF', 'TF'),
(78, 1, 'Gabon', 'GAB', 'GA'),
(79, 1, 'Gambia', 'GMB', 'GM'),
(80, 1, 'Georgia', 'GEO', 'GE'),
(81, 1, 'Germany', 'DEU', 'DE'),
(82, 1, 'Ghana', 'GHA', 'GH'),
(83, 1, 'Gibraltar', 'GIB', 'GI'),
(84, 1, 'Greece', 'GRC', 'GR'),
(85, 1, 'Greenland', 'GRL', 'GL'),
(86, 1, 'Grenada', 'GRD', 'GD'),
(87, 1, 'Guadeloupe', 'GLP', 'GP'),
(88, 1, 'Guam', 'GUM', 'GU'),
(89, 1, 'Guatemala', 'GTM', 'GT'),
(90, 1, 'Guinea', 'GIN', 'GN'),
(91, 1, 'Guinea-bissau', 'GNB', 'GW'),
(92, 1, 'Guyana', 'GUY', 'GY'),
(93, 1, 'Haiti', 'HTI', 'HT'),
(94, 1, 'Heard and Mc Donald Islands', 'HMD', 'HM'),
(95, 1, 'Honduras', 'HND', 'HN'),
(96, 1, 'Hong Kong', 'HKG', 'HK'),
(97, 1, 'Hungary', 'HUN', 'HU'),
(98, 1, 'Iceland', 'ISL', 'IS'),
(99, 1, 'India', 'IND', 'IN'),
(100, 1, 'Indonesia', 'IDN', 'ID'),
(101, 1, 'Iran (Islamic Republic of)', 'IRN', 'IR'),
(102, 1, 'Iraq', 'IRQ', 'IQ'),
(103, 1, 'Ireland', 'IRL', 'IE'),
(104, 1, 'Israel', 'ISR', 'IL'),
(105, 1, 'Italy', 'ITA', 'IT'),
(106, 1, 'Jamaica', 'JAM', 'JM'),
(107, 1, 'Japan', 'JPN', 'JP'),
(108, 1, 'Jordan', 'JOR', 'JO'),
(109, 1, 'Kazakhstan', 'KAZ', 'KZ'),
(110, 1, 'Kenya', 'KEN', 'KE'),
(111, 1, 'Kiribati', 'KIR', 'KI'),
(112, 1, 'Korea, Democratic People''s Republic of', 'PRK', 'KP'),
(113, 1, 'Korea, Republic of', 'KOR', 'KR'),
(114, 1, 'Kuwait', 'KWT', 'KW'),
(115, 1, 'Kyrgyzstan', 'KGZ', 'KG'),
(116, 1, 'Lao People''s Democratic Republic', 'LAO', 'LA'),
(117, 1, 'Latvia', 'LVA', 'LV'),
(118, 1, 'Lebanon', 'LBN', 'LB'),
(119, 1, 'Lesotho', 'LSO', 'LS'),
(120, 1, 'Liberia', 'LBR', 'LR'),
(121, 1, 'Libyan Arab Jamahiriya', 'LBY', 'LY'),
(122, 1, 'Liechtenstein', 'LIE', 'LI'),
(123, 1, 'Lithuania', 'LTU', 'LT'),
(124, 1, 'Luxembourg', 'LUX', 'LU'),
(125, 1, 'Macau', 'MAC', 'MO'),
(126, 1, 'Macedonia, The Former Yugoslav Republic of', 'MKD', 'MK'),
(127, 1, 'Madagascar', 'MDG', 'MG'),
(128, 1, 'Malawi', 'MWI', 'MW'),
(129, 1, 'Malaysia', 'MYS', 'MY'),
(130, 1, 'Maldives', 'MDV', 'MV'),
(131, 1, 'Mali', 'MLI', 'ML'),
(132, 1, 'Malta', 'MLT', 'MT'),
(133, 1, 'Marshall Islands', 'MHL', 'MH'),
(134, 1, 'Martinique', 'MTQ', 'MQ'),
(135, 1, 'Mauritania', 'MRT', 'MR'),
(136, 1, 'Mauritius', 'MUS', 'MU'),
(137, 1, 'Mayotte', 'MYT', 'YT'),
(138, 1, 'Mexico', 'MEX', 'MX'),
(139, 1, 'Micronesia, Federated States of', 'FSM', 'FM'),
(140, 1, 'Moldova, Republic of', 'MDA', 'MD'),
(141, 1, 'Monaco', 'MCO', 'MC'),
(142, 1, 'Mongolia', 'MNG', 'MN'),
(143, 1, 'Montserrat', 'MSR', 'MS'),
(144, 1, 'Morocco', 'MAR', 'MA'),
(145, 1, 'Mozambique', 'MOZ', 'MZ'),
(146, 1, 'Myanmar', 'MMR', 'MM'),
(147, 1, 'Namibia', 'NAM', 'NA'),
(148, 1, 'Nauru', 'NRU', 'NR'),
(149, 1, 'Nepal', 'NPL', 'NP'),
(150, 1, 'Netherlands', 'NLD', 'NL'),
(151, 1, 'Netherlands Antilles', 'ANT', 'AN'),
(152, 1, 'New Caledonia', 'NCL', 'NC'),
(153, 1, 'New Zealand', 'NZL', 'NZ'),
(154, 1, 'Nicaragua', 'NIC', 'NI'),
(155, 1, 'Niger', 'NER', 'NE'),
(156, 1, 'Nigeria', 'NGA', 'NG'),
(157, 1, 'Niue', 'NIU', 'NU'),
(158, 1, 'Norfolk Island', 'NFK', 'NF'),
(159, 1, 'Northern Mariana Islands', 'MNP', 'MP'),
(160, 1, 'Norway', 'NOR', 'NO'),
(161, 1, 'Oman', 'OMN', 'OM'),
(162, 1, 'Pakistan', 'PAK', 'PK'),
(163, 1, 'Palau', 'PLW', 'PW'),
(164, 1, 'Panama', 'PAN', 'PA'),
(165, 1, 'Papua New Guinea', 'PNG', 'PG'),
(166, 1, 'Paraguay', 'PRY', 'PY'),
(167, 1, 'Peru', 'PER', 'PE'),
(168, 1, 'Philippines', 'PHL', 'PH'),
(169, 1, 'Pitcairn', 'PCN', 'PN'),
(170, 1, 'Poland', 'POL', 'PL'),
(171, 1, 'Portugal', 'PRT', 'PT'),
(172, 1, 'Puerto Rico', 'PRI', 'PR'),
(173, 1, 'Qatar', 'QAT', 'QA'),
(174, 1, 'Reunion', 'REU', 'RE'),
(175, 1, 'Romania', 'ROM', 'RO'),
(176, 1, 'Russian Federation', 'RUS', 'RU'),
(177, 1, 'Rwanda', 'RWA', 'RW'),
(178, 1, 'Saint Kitts and Nevis', 'KNA', 'KN'),
(179, 1, 'Saint Lucia', 'LCA', 'LC'),
(180, 1, 'Saint Vincent and the Grenadines', 'VCT', 'VC'),
(181, 1, 'Samoa', 'WSM', 'WS'),
(182, 1, 'San Marino', 'SMR', 'SM'),
(183, 1, 'Sao Tome and Principe', 'STP', 'ST'),
(184, 1, 'Saudi Arabia', 'SAU', 'SA'),
(185, 1, 'Senegal', 'SEN', 'SN'),
(186, 1, 'Seychelles', 'SYC', 'SC'),
(187, 1, 'Sierra Leone', 'SLE', 'SL'),
(188, 1, 'Singapore', 'SGP', 'SG'),
(189, 1, 'Slovakia (Slovak Republic)', 'SVK', 'SK'),
(190, 1, 'Slovenia', 'SVN', 'SI'),
(191, 1, 'Solomon Islands', 'SLB', 'SB'),
(192, 1, 'Somalia', 'SOM', 'SO'),
(193, 1, 'South Africa', 'ZAF', 'ZA'),
(194, 1, 'South Georgia and the South Sandwich Islands', 'SGS', 'GS'),
(195, 1, 'Spain', 'ESP', 'ES'),
(196, 1, 'Sri Lanka', 'LKA', 'LK'),
(197, 1, 'St. Helena', 'SHN', 'SH'),
(198, 1, 'St. Pierre and Miquelon', 'SPM', 'PM'),
(199, 1, 'Sudan', 'SDN', 'SD'),
(200, 1, 'Suriname', 'SUR', 'SR'),
(201, 1, 'Svalbard and Jan Mayen Islands', 'SJM', 'SJ'),
(202, 1, 'Swaziland', 'SWZ', 'SZ'),
(203, 1, 'Sweden', 'SWE', 'SE'),
(204, 1, 'Switzerland', 'CHE', 'CH'),
(205, 1, 'Syrian Arab Republic', 'SYR', 'SY'),
(206, 1, 'Taiwan', 'TWN', 'TW'),
(207, 1, 'Tajikistan', 'TJK', 'TJ'),
(208, 1, 'Tanzania, United Republic of', 'TZA', 'TZ'),
(209, 1, 'Thailand', 'THA', 'TH'),
(210, 1, 'Togo', 'TGO', 'TG'),
(211, 1, 'Tokelau', 'TKL', 'TK'),
(212, 1, 'Tonga', 'TON', 'TO'),
(213, 1, 'Trinidad and Tobago', 'TTO', 'TT'),
(214, 1, 'Tunisia', 'TUN', 'TN'),
(215, 1, 'Turkey', 'TUR', 'TR'),
(216, 1, 'Turkmenistan', 'TKM', 'TM'),
(217, 1, 'Turks and Caicos Islands', 'TCA', 'TC'),
(218, 1, 'Tuvalu', 'TUV', 'TV'),
(219, 1, 'Uganda', 'UGA', 'UG'),
(220, 1, 'Ukraine', 'UKR', 'UA'),
(221, 1, 'United Arab Emirates', 'ARE', 'AE'),
(222, 1, 'United Kingdom', 'GBR', 'GB'),
(223, 1, 'United States', 'USA', 'US'),
(224, 1, 'United States Minor Outlying Islands', 'UMI', 'UM'),
(225, 1, 'Uruguay', 'URY', 'UY'),
(226, 1, 'Uzbekistan', 'UZB', 'UZ'),
(227, 1, 'Vanuatu', 'VUT', 'VU'),
(228, 1, 'Vatican City State (Holy See)', 'VAT', 'VA'),
(229, 1, 'Venezuela', 'VEN', 'VE'),
(230, 1, 'Viet Nam', 'VNM', 'VN'),
(231, 1, 'Virgin Islands (British)', 'VGB', 'VG'),
(232, 1, 'Virgin Islands (U.S.)', 'VIR', 'VI'),
(233, 1, 'Wallis and Futuna Islands', 'WLF', 'WF'),
(234, 1, 'Western Sahara', 'ESH', 'EH'),
(235, 1, 'Yemen', 'YEM', 'YE'),
(236, 1, 'Yugoslavia', 'YUG', 'YU'),
(237, 1, 'The Democratic Republic of Congo', 'DRC', 'DC'),
(238, 1, 'Zambia', 'ZMB', 'ZM'),
(239, 1, 'Zimbabwe', 'ZWE', 'ZW'),
(240, 1, 'East Timor', 'XET', 'XE'),
(241, 1, 'Jersey', 'XJE', 'XJ'),
(242, 1, 'St. Barthelemy', 'XSB', 'XB'),
(243, 1, 'St. Eustatius', 'XSE', 'XU'),
(244, 1, 'Canary Islands', 'XCA', 'XC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_coupons`
--

CREATE TABLE IF NOT EXISTS `bak_vm_coupons` (
  `coupon_id` int(16) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(32) NOT NULL DEFAULT '',
  `percent_or_total` enum('percent','total') NOT NULL DEFAULT 'percent',
  `coupon_type` enum('gift','permanent') NOT NULL DEFAULT 'gift',
  `coupon_value` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Used to store coupon codes' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `bak_vm_coupons`
--

INSERT INTO `bak_vm_coupons` (`coupon_id`, `coupon_code`, `percent_or_total`, `coupon_type`, `coupon_value`) VALUES
(1, 'test1', 'total', 'gift', '6.00'),
(2, 'test2', 'percent', 'permanent', '15.00'),
(3, 'test3', 'total', 'permanent', '4.00'),
(4, 'test4', 'total', 'gift', '15.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_creditcard`
--

CREATE TABLE IF NOT EXISTS `bak_vm_creditcard` (
  `creditcard_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `creditcard_name` varchar(70) NOT NULL DEFAULT '',
  `creditcard_code` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`creditcard_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Used to store credit card types' AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `bak_vm_creditcard`
--

INSERT INTO `bak_vm_creditcard` (`creditcard_id`, `vendor_id`, `creditcard_name`, `creditcard_code`) VALUES
(1, 1, 'Visa', 'VISA'),
(2, 1, 'MasterCard', 'MC'),
(3, 1, 'American Express', 'amex'),
(4, 1, 'Discover Card', 'discover'),
(5, 1, 'Diners Club', 'diners'),
(6, 1, 'JCB', 'jcb'),
(7, 1, 'Australian Bankcard', 'australian_bc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_csv`
--

CREATE TABLE IF NOT EXISTS `bak_vm_csv` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(128) NOT NULL DEFAULT '',
  `field_default_value` text,
  `field_ordering` int(3) NOT NULL DEFAULT '0',
  `field_required` char(1) DEFAULT 'N',
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds all fields which are used on CVS Ex-/Import' AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `bak_vm_csv`
--

INSERT INTO `bak_vm_csv` (`field_id`, `field_name`, `field_default_value`, `field_ordering`, `field_required`) VALUES
(1, 'product_sku', '', 1, 'Y'),
(2, 'product_s_desc', '', 5, 'N'),
(3, 'product_desc', '', 6, 'N'),
(4, 'product_thumb_image', '', 7, 'N'),
(5, 'product_full_image', '', 8, 'N'),
(6, 'product_weight', '', 9, 'N'),
(7, 'product_weight_uom', 'KG', 10, 'N'),
(8, 'product_length', '', 11, 'N'),
(9, 'product_width', '', 12, 'N'),
(10, 'product_height', '', 13, 'N'),
(11, 'product_lwh_uom', '', 14, 'N'),
(12, 'product_in_stock', '0', 15, 'N'),
(13, 'product_available_date', '', 16, 'N'),
(14, 'product_discount_id', '', 17, 'N'),
(15, 'product_name', '', 2, 'Y'),
(16, 'product_price', '', 4, 'N'),
(17, 'category_path', '', 3, 'Y'),
(18, 'manufacturer_id', '', 18, 'N'),
(19, 'product_tax_id', '', 19, 'N'),
(20, 'product_sales', '', 20, 'N'),
(21, 'product_parent_id', '0', 21, 'N'),
(22, 'attribute', '', 22, 'N'),
(23, 'custom_attribute', '', 23, 'N'),
(24, 'attributes', '', 24, 'N'),
(25, 'attribute_values', '', 25, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_currency`
--

CREATE TABLE IF NOT EXISTS `bak_vm_currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(64) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  PRIMARY KEY (`currency_id`),
  KEY `idx_currency_name` (`currency_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Used to store currencies' AUTO_INCREMENT=159 ;

--
-- Volcado de datos para la tabla `bak_vm_currency`
--

INSERT INTO `bak_vm_currency` (`currency_id`, `currency_name`, `currency_code`) VALUES
(1, 'Andorran Peseta', 'ADP'),
(2, 'United Arab Emirates Dirham', 'AED'),
(3, 'Afghanistan Afghani', 'AFA'),
(4, 'Albanian Lek', 'ALL'),
(5, 'Netherlands Antillian Guilder', 'ANG'),
(6, 'Angolan Kwanza', 'AOK'),
(7, 'Argentine Peso', 'ARS'),
(9, 'Australian Dollar', 'AUD'),
(10, 'Aruban Florin', 'AWG'),
(11, 'Barbados Dollar', 'BBD'),
(12, 'Bangladeshi Taka', 'BDT'),
(14, 'Bulgarian Lev', 'BGL'),
(15, 'Bahraini Dinar', 'BHD'),
(16, 'Burundi Franc', 'BIF'),
(17, 'Bermudian Dollar', 'BMD'),
(18, 'Brunei Dollar', 'BND'),
(19, 'Bolivian Boliviano', 'BOB'),
(20, 'Brazilian Real', 'BRL'),
(21, 'Bahamian Dollar', 'BSD'),
(22, 'Bhutan Ngultrum', 'BTN'),
(23, 'Burma Kyat', 'BUK'),
(24, 'Botswanian Pula', 'BWP'),
(25, 'Belize Dollar', 'BZD'),
(26, 'Canadian Dollar', 'CAD'),
(27, 'Swiss Franc', 'CHF'),
(28, 'Chilean Unidades de Fomento', 'CLF'),
(29, 'Chilean Peso', 'CLP'),
(30, 'Yuan (Chinese) Renminbi', 'CNY'),
(31, 'Colombian Peso', 'COP'),
(32, 'Costa Rican Colon', 'CRC'),
(33, 'Czech Koruna', 'CZK'),
(34, 'Cuban Peso', 'CUP'),
(35, 'Cape Verde Escudo', 'CVE'),
(36, 'Cyprus Pound', 'CYP'),
(40, 'Danish Krone', 'DKK'),
(41, 'Dominican Peso', 'DOP'),
(42, 'Algerian Dinar', 'DZD'),
(43, 'Ecuador Sucre', 'ECS'),
(44, 'Egyptian Pound', 'EGP'),
(46, 'Ethiopian Birr', 'ETB'),
(47, 'Euro', 'EUR'),
(49, 'Fiji Dollar', 'FJD'),
(50, 'Falkland Islands Pound', 'FKP'),
(52, 'British Pound', 'GBP'),
(53, 'Ghanaian Cedi', 'GHC'),
(54, 'Gibraltar Pound', 'GIP'),
(55, 'Gambian Dalasi', 'GMD'),
(56, 'Guinea Franc', 'GNF'),
(58, 'Guatemalan Quetzal', 'GTQ'),
(59, 'Guinea-Bissau Peso', 'GWP'),
(60, 'Guyanan Dollar', 'GYD'),
(61, 'Hong Kong Dollar', 'HKD'),
(62, 'Honduran Lempira', 'HNL'),
(63, 'Haitian Gourde', 'HTG'),
(64, 'Hungarian Forint', 'HUF'),
(65, 'Indonesian Rupiah', 'IDR'),
(66, 'Irish Punt', 'IEP'),
(67, 'Israeli Shekel', 'ILS'),
(68, 'Indian Rupee', 'INR'),
(69, 'Iraqi Dinar', 'IQD'),
(70, 'Iranian Rial', 'IRR'),
(73, 'Jamaican Dollar', 'JMD'),
(74, 'Jordanian Dinar', 'JOD'),
(75, 'Japanese Yen', 'JPY'),
(76, 'Kenyan Schilling', 'KES'),
(77, 'Kampuchean (Cambodian) Riel', 'KHR'),
(78, 'Comoros Franc', 'KMF'),
(79, 'North Korean Won', 'KPW'),
(80, '(South) Korean Won', 'KRW'),
(81, 'Kuwaiti Dinar', 'KWD'),
(82, 'Cayman Islands Dollar', 'KYD'),
(83, 'Lao Kip', 'LAK'),
(84, 'Lebanese Pound', 'LBP'),
(85, 'Sri Lanka Rupee', 'LKR'),
(86, 'Liberian Dollar', 'LRD'),
(87, 'Lesotho Loti', 'LSL'),
(89, 'Libyan Dinar', 'LYD'),
(90, 'Moroccan Dirham', 'MAD'),
(91, 'Malagasy Franc', 'MGF'),
(92, 'Mongolian Tugrik', 'MNT'),
(93, 'Macau Pataca', 'MOP'),
(94, 'Mauritanian Ouguiya', 'MRO'),
(95, 'Maltese Lira', 'MTL'),
(96, 'Mauritius Rupee', 'MUR'),
(97, 'Maldive Rufiyaa', 'MVR'),
(98, 'Malawi Kwacha', 'MWK'),
(99, 'Mexican Peso', 'MXP'),
(100, 'Malaysian Ringgit', 'MYR'),
(101, 'Mozambique Metical', 'MZM'),
(102, 'Nigerian Naira', 'NGN'),
(103, 'Nicaraguan Cordoba', 'NIC'),
(105, 'Norwegian Kroner', 'NOK'),
(106, 'Nepalese Rupee', 'NPR'),
(107, 'New Zealand Dollar', 'NZD'),
(108, 'Omani Rial', 'OMR'),
(109, 'Panamanian Balboa', 'PAB'),
(110, 'Peruvian Nuevo Sol', 'PEN'),
(111, 'Papua New Guinea Kina', 'PGK'),
(112, 'Philippine Peso', 'PHP'),
(113, 'Pakistan Rupee', 'PKR'),
(114, 'Polish ZĹ‚oty', 'PLN'),
(116, 'Paraguay Guarani', 'PYG'),
(117, 'Qatari Rial', 'QAR'),
(118, 'Romanian Leu', 'RON'),
(119, 'Rwanda Franc', 'RWF'),
(120, 'Saudi Arabian Riyal', 'SAR'),
(121, 'Solomon Islands Dollar', 'SBD'),
(122, 'Seychelles Rupee', 'SCR'),
(123, 'Sudanese Pound', 'SDP'),
(124, 'Swedish Krona', 'SEK'),
(125, 'Singapore Dollar', 'SGD'),
(126, 'St. Helena Pound', 'SHP'),
(127, 'Sierra Leone Leone', 'SLL'),
(128, 'Somali Schilling', 'SOS'),
(129, 'Suriname Guilder', 'SRG'),
(130, 'Sao Tome and Principe Dobra', 'STD'),
(131, 'Russian Ruble', 'RUB'),
(132, 'El Salvador Colon', 'SVC'),
(133, 'Syrian Potmd', 'SYP'),
(134, 'Swaziland Lilangeni', 'SZL'),
(135, 'Thai Bath', 'THB'),
(136, 'Tunisian Dinar', 'TND'),
(137, 'Tongan Pa''anga', 'TOP'),
(138, 'East Timor Escudo', 'TPE'),
(139, 'Turkish Lira', 'TRL'),
(140, 'Trinidad and Tobago Dollar', 'TTD'),
(141, 'Taiwan Dollar', 'TWD'),
(142, 'Tanzanian Schilling', 'TZS'),
(143, 'Uganda Shilling', 'UGS'),
(144, 'US Dollar', 'USD'),
(145, 'Uruguayan Peso', 'UYP'),
(146, 'Venezualan Bolivar', 'VEB'),
(147, 'Vietnamese Dong', 'VND'),
(148, 'Vanuatu Vatu', 'VUV'),
(149, 'Samoan Tala', 'WST'),
(150, 'Democratic Yemeni Dinar', 'YDD'),
(151, 'Yemeni Rial', 'YER'),
(152, 'New Yugoslavia Dinar', 'YUD'),
(153, 'South African Rand', 'ZAR'),
(154, 'Zambian Kwacha', 'ZMK'),
(155, 'Zaire Zaire', 'ZRZ'),
(156, 'Zimbabwe Dollar', 'ZWD'),
(157, 'Slovak Koruna', 'SKK'),
(158, 'Armenian Dram', 'AMD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_export`
--

CREATE TABLE IF NOT EXISTS `bak_vm_export` (
  `export_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `export_name` varchar(255) DEFAULT NULL,
  `export_desc` text NOT NULL,
  `export_class` varchar(50) NOT NULL,
  `export_enabled` char(1) NOT NULL DEFAULT 'N',
  `export_config` text NOT NULL,
  `iscore` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`export_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Export Modules' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_function`
--

CREATE TABLE IF NOT EXISTS `bak_vm_function` (
  `function_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `function_name` varchar(32) DEFAULT NULL,
  `function_class` varchar(32) DEFAULT NULL,
  `function_method` varchar(32) DEFAULT NULL,
  `function_description` text,
  `function_perms` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`function_id`),
  KEY `idx_function_module_id` (`module_id`),
  KEY `idx_function_name` (`function_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Used to map a function alias to a ''real'' class::function' AUTO_INCREMENT=195 ;

--
-- Volcado de datos para la tabla `bak_vm_function`
--

INSERT INTO `bak_vm_function` (`function_id`, `module_id`, `function_name`, `function_class`, `function_method`, `function_description`, `function_perms`) VALUES
(1, 1, 'userAdd', 'ps_user', 'add', '', 'admin,storeadmin'),
(2, 1, 'userDelete', 'ps_user', 'delete', '', 'admin,storeadmin'),
(3, 1, 'userUpdate', 'ps_user', 'update', '', 'admin,storeadmin'),
(31, 2, 'productAdd', 'ps_product', 'add', '', 'admin,storeadmin'),
(6, 1, 'functionAdd', 'ps_function', 'add', '', 'admin'),
(7, 1, 'functionUpdate', 'ps_function', 'update', '', 'admin'),
(8, 1, 'functionDelete', 'ps_function', 'delete', '', 'admin'),
(9, 1, 'userLogout', 'ps_user', 'logout', '', 'none'),
(10, 1, 'userAddressAdd', 'ps_user_address', 'add', '', 'admin,storeadmin,shopper,demo'),
(11, 1, 'userAddressUpdate', 'ps_user_address', 'update', '', 'admin,storeadmin,shopper'),
(12, 1, 'userAddressDelete', 'ps_user_address', 'delete', '', 'admin,storeadmin,shopper'),
(13, 1, 'moduleAdd', 'ps_module', 'add', '', 'admin'),
(14, 1, 'moduleUpdate', 'ps_module', 'update', '', 'admin'),
(15, 1, 'moduleDelete', 'ps_module', 'delete', '', 'admin'),
(16, 1, 'userLogin', 'ps_user', 'login', '', 'none'),
(17, 3, 'vendorAdd', 'ps_vendor', 'add', '', 'admin'),
(18, 3, 'vendorUpdate', 'ps_vendor', 'update', '', 'admin,storeadmin'),
(19, 3, 'vendorDelete', 'ps_vendor', 'delete', '', 'admin'),
(20, 3, 'vendorCategoryAdd', 'ps_vendor_category', 'add', '', 'admin'),
(21, 3, 'vendorCategoryUpdate', 'ps_vendor_category', 'update', '', 'admin'),
(22, 3, 'vendorCategoryDelete', 'ps_vendor_category', 'delete', '', 'admin'),
(23, 4, 'shopperAdd', 'ps_shopper', 'add', '', 'none'),
(24, 4, 'shopperDelete', 'ps_shopper', 'delete', '', 'admin,storeadmin'),
(25, 4, 'shopperUpdate', 'ps_shopper', 'update', '', 'admin,storeadmin,shopper'),
(26, 4, 'shopperGroupAdd', 'ps_shopper_group', 'add', '', 'admin,storeadmin'),
(27, 4, 'shopperGroupUpdate', 'ps_shopper_group', 'update', '', 'admin,storeadmin'),
(28, 4, 'shopperGroupDelete', 'ps_shopper_group', 'delete', '', 'admin,storeadmin'),
(30, 5, 'orderStatusSet', 'ps_order', 'order_status_update', '', 'admin,storeadmin'),
(32, 2, 'productDelete', 'ps_product', 'delete', '', 'admin,storeadmin'),
(33, 2, 'productUpdate', 'ps_product', 'update', '', 'admin,storeadmin'),
(34, 2, 'productCategoryAdd', 'ps_product_category', 'add', '', 'admin,storeadmin'),
(35, 2, 'productCategoryUpdate', 'ps_product_category', 'update', '', 'admin,storeadmin'),
(36, 2, 'productCategoryDelete', 'ps_product_category', 'delete', '', 'admin,storeadmin'),
(37, 2, 'productPriceAdd', 'ps_product_price', 'add', '', 'admin,storeadmin'),
(38, 2, 'productPriceUpdate', 'ps_product_price', 'update', '', 'admin,storeadmin'),
(39, 2, 'productPriceDelete', 'ps_product_price', 'delete', '', 'admin,storeadmin'),
(40, 2, 'productAttributeAdd', 'ps_product_attribute', 'add', '', 'admin,storeadmin'),
(41, 2, 'productAttributeUpdate', 'ps_product_attribute', 'update', '', 'admin,storeadmin'),
(42, 2, 'productAttributeDelete', 'ps_product_attribute', 'delete', '', 'admin,storeadmin'),
(43, 7, 'cartAdd', 'ps_cart', 'add', '', 'none'),
(44, 7, 'cartUpdate', 'ps_cart', 'update', '', 'none'),
(45, 7, 'cartDelete', 'ps_cart', 'delete', '', 'none'),
(46, 10, 'checkoutComplete', 'ps_checkout', 'add', '', 'shopper,storeadmin,admin'),
(48, 8, 'paymentMethodUpdate', 'ps_payment_method', 'update', '', 'admin,storeadmin'),
(49, 8, 'paymentMethodAdd', 'ps_payment_method', 'add', '', 'admin,storeadmin'),
(50, 8, 'paymentMethodDelete', 'ps_payment_method', 'delete', '', 'admin,storeadmin'),
(51, 5, 'orderDelete', 'ps_order', 'delete', '', 'admin,storeadmin'),
(52, 11, 'addTaxRate', 'ps_tax', 'add', '', 'admin,storeadmin'),
(53, 11, 'updateTaxRate', 'ps_tax', 'update', '', 'admin,storeadmin'),
(54, 11, 'deleteTaxRate', 'ps_tax', 'delete', '', 'admin,storeadmin'),
(55, 10, 'checkoutValidateST', 'ps_checkout', 'validate_shipto', '', 'none'),
(59, 5, 'orderStatusUpdate', 'ps_order_status', 'update', '', 'admin,storeadmin'),
(60, 5, 'orderStatusAdd', 'ps_order_status', 'add', '', 'storeadmin,admin'),
(61, 5, 'orderStatusDelete', 'ps_order_status', 'delete', '', 'admin,storeadmin'),
(62, 1, 'currencyAdd', 'ps_currency', 'add', 'add a currency', 'storeadmin,admin'),
(63, 1, 'currencyUpdate', 'ps_currency', 'update', '        update a currency', 'storeadmin,admin'),
(64, 1, 'currencyDelete', 'ps_currency', 'delete', 'delete a currency', 'storeadmin,admin'),
(65, 1, 'countryAdd', 'ps_country', 'add', 'Add a country ', 'storeadmin,admin'),
(66, 1, 'countryUpdate', 'ps_country', 'update', 'Update a country record', 'storeadmin,admin'),
(67, 1, 'countryDelete', 'ps_country', 'delete', 'Delete a country record', 'storeadmin,admin'),
(68, 2, 'product_csv', 'ps_csv', 'upload_csv', '', 'admin'),
(110, 7, 'waitingListAdd', 'zw_waiting_list', 'add', '', 'none'),
(111, 13, 'addzone', 'ps_zone', 'add', 'This will add a zone', 'admin,storeadmin'),
(112, 13, 'updatezone', 'ps_zone', 'update', 'This will update a zone', 'admin,storeadmin'),
(113, 13, 'deletezone', 'ps_zone', 'delete', 'This will delete a zone', 'admin,storeadmin'),
(114, 13, 'zoneassign', 'ps_zone', 'assign', 'This will assign a country to a zone', 'admin,storeadmin'),
(115, 1, 'writeConfig', 'ps_config', 'writeconfig', 'This will write the configuration details to phpshop.cfg.php', 'admin'),
(116, 12839, 'carrierAdd', 'ps_shipping', 'add', '', 'admin,storeadmin'),
(117, 12839, 'carrierDelete', 'ps_shipping', 'delete', '', 'admin,storeadmin'),
(118, 12839, 'carrierUpdate', 'ps_shipping', 'update', '', 'admin,storeadmin'),
(119, 12839, 'rateAdd', 'ps_shipping', 'rate_add', '', 'admin,storeadmin'),
(120, 12839, 'rateUpdate', 'ps_shipping', 'rate_update', '', 'admin,shopadmin'),
(121, 12839, 'rateDelete', 'ps_shipping', 'rate_delete', '', 'admin,storeadmin'),
(122, 10, 'checkoutProcess', 'ps_checkout', 'process', '', 'none'),
(123, 5, 'downloadRequest', 'ps_order', 'download_request', 'This checks if the download request is valid and sends the file to the browser as file download if the request was successful, otherwise echoes an error', 'none'),
(124, 98, 'affiliateAdd', 'ps_affiliate', 'add', '', 'admin,storeadmin'),
(125, 98, 'affiliateUpdate', 'ps_affiliate', 'update', '', 'admin,storeadmin'),
(126, 98, 'affiliateDelete', 'ps_affiliate', 'delete', '', 'admin,storeadmin'),
(127, 98, 'affiliateEmail', 'ps_affiliate', 'email', '', 'admin,storeadmin'),
(128, 99, 'manufacturerAdd', 'ps_manufacturer', 'add', '', 'admin,storeadmin'),
(129, 99, 'manufacturerUpdate', 'ps_manufacturer', 'update', '', 'admin,storeadmin'),
(130, 99, 'manufacturerDelete', 'ps_manufacturer', 'delete', '', 'admin,storeadmin'),
(131, 99, 'manufacturercategoryAdd', 'ps_manufacturer_category', 'add', '', 'admin,storeadmin'),
(132, 99, 'manufacturercategoryUpdate', 'ps_manufacturer_category', 'update', '', 'admin,storeadmin'),
(133, 99, 'manufacturercategoryDelete', 'ps_manufacturer_category', 'delete', '', 'admin,storeadmin'),
(134, 7, 'addReview', 'ps_reviews', 'process_review', 'This lets the user add a review and rating to a product.', 'admin,storeadmin,shopper,demo'),
(135, 7, 'productReviewDelete', 'ps_reviews', 'delete_review', 'This deletes a review and from a product.', 'admin,storeadmin'),
(136, 8, 'creditcardAdd', 'ps_creditcard', 'add', 'Adds a Credit Card entry.', 'admin,storeadmin'),
(137, 8, 'creditcardUpdate', 'ps_creditcard', 'update', 'Updates a Credit Card entry.', 'admin,storeadmin'),
(138, 8, 'creditcardDelete', 'ps_creditcard', 'delete', 'Deletes a Credit Card entry.', 'admin,storeadmin'),
(139, 2, 'changePublishState', 'vmAbstractObject.class', 'handlePublishState', 'Changes the publish field of an item, so that it can be published or unpublished easily.', 'admin,storeadmin'),
(140, 2, 'export_csv', 'ps_csv', 'export_csv', 'This function exports all relevant product data to CSV.', 'admin,storeadmin'),
(141, 2, 'reorder', 'ps_product_category', 'reorder', 'Changes the list order of a category.', 'admin,storeadmin'),
(142, 2, 'discountAdd', 'ps_product_discount', 'add', 'Adds a discount.', 'admin,storeadmin'),
(143, 2, 'discountUpdate', 'ps_product_discount', 'update', 'Updates a discount.', 'admin,storeadmin'),
(144, 2, 'discountDelete', 'ps_product_discount', 'delete', 'Deletes a discount.', 'admin,storeadmin'),
(145, 8, 'shippingmethodSave', 'ps_shipping_method', 'save', '', 'admin,storeadmin'),
(146, 2, 'uploadProductFile', 'ps_product_files', 'add', 'Uploads and Adds a Product Image/File.', 'admin,storeadmin'),
(147, 2, 'updateProductFile', 'ps_product_files', 'update', 'Updates a Product Image/File.', 'admin,storeadmin'),
(148, 2, 'deleteProductFile', 'ps_product_files', 'delete', 'Deletes a Product Image/File.', 'admin,storeadmin'),
(149, 12843, 'couponAdd', 'ps_coupon', 'add_coupon_code', 'Adds a Coupon.', 'admin,storeadmin'),
(150, 12843, 'couponUpdate', 'ps_coupon', 'update_coupon', 'Updates a Coupon.', 'admin,storeadmin'),
(151, 12843, 'couponDelete', 'ps_coupon', 'remove_coupon_code', 'Deletes a Coupon.', 'admin,storeadmin'),
(152, 12843, 'couponProcess', 'ps_coupon', 'process_coupon_code', 'Processes a Coupon.', 'admin,storeadmin,shopper,demo'),
(153, 2, 'ProductTypeAdd', 'ps_product_type', 'add', 'Function add a Product Type and create new table product_type_<id>.', 'admin'),
(154, 2, 'ProductTypeUpdate', 'ps_product_type', 'update', 'Update a Product Type.', 'admin'),
(155, 2, 'ProductTypeDelete', 'ps_product_type', 'delete', 'Delete a Product Type and drop table product_type_<id>.', 'admin'),
(156, 2, 'ProductTypeReorder', 'ps_product_type', 'reorder', 'Changes the list order of a Product Type.', 'admin'),
(157, 2, 'ProductTypeAddParam', 'ps_product_type_parameter', 'add_parameter', 'Function add a Parameter into a Product Type and create new column in table product_type_<id>.', 'admin'),
(158, 2, 'ProductTypeUpdateParam', 'ps_product_type_parameter', 'update_parameter', 'Function update a Parameter in a Product Type and a column in table product_type_<id>.', 'admin'),
(159, 2, 'ProductTypeDeleteParam', 'ps_product_type_parameter', 'delete_parameter', 'Function delete a Parameter from a Product Type and drop a column in table product_type_<id>.', 'admin'),
(160, 2, 'ProductTypeReorderParam', 'ps_product_type_parameter', 'reorder_parameter', 'Changes the list order of a Parameter.', 'admin'),
(161, 2, 'productProductTypeAdd', 'ps_product_product_type', 'add', 'Add a Product into a Product Type.', 'admin,storeadmin'),
(162, 2, 'productProductTypeDelete', 'ps_product_product_type', 'delete', 'Delete a Product from a Product Type.', 'admin,storeadmin'),
(163, 1, 'stateAdd', 'ps_country', 'addState', 'Add a State ', 'storeadmin,admin'),
(164, 1, 'stateUpdate', 'ps_country', 'updateState', 'Update a state record', 'storeadmin,admin'),
(165, 1, 'stateDelete', 'ps_country', 'deleteState', 'Delete a state record', 'storeadmin,admin'),
(166, 2, 'csvFieldAdd', 'ps_csv', 'add', 'Add a CSV Field ', 'storeadmin,admin'),
(167, 2, 'csvFieldUpdate', 'ps_csv', 'update', 'Update a CSV Field', 'storeadmin,admin'),
(168, 2, 'csvFieldDelete', 'ps_csv', 'delete', 'Delete a CSV Field', 'storeadmin,admin'),
(169, 1, 'userfieldSave', 'ps_userfield', 'savefield', 'add or edit a user field', 'admin'),
(170, 1, 'userfieldDelete', 'ps_userfield', 'deletefield', '', 'admin'),
(171, 1, 'changeordering', 'vmAbstractObject.class', 'handleordering', '', 'admin'),
(172, 2, 'moveProduct', 'ps_product', 'move', 'Move products from one category to another.', 'admin,storeadmin'),
(173, 7, 'productAsk', 'ps_communication', 'mail_question', 'Lets the customer send a question about a specific product.', 'none'),
(174, 7, 'recommendProduct', 'ps_communication', 'sendRecommendation', 'Lets the customer send a recommendation about a specific product to a friend.', 'none'),
(175, 2, 'reviewUpdate', 'ps_reviews', 'update', 'Modify a review about a specific product.', 'admin'),
(176, 8, 'ExportUpdate', 'ps_export', 'update', '', 'admin,storeadmin'),
(177, 8, 'ExportAdd', 'ps_export', 'add', '', 'admin,storeadmin'),
(178, 8, 'ExportDelete', 'ps_export', 'delete', '', 'admin,storeadmin'),
(179, 1, 'writeThemeConfig', 'ps_config', 'writeThemeConfig', 'Writes a theme configuration file.', 'admin'),
(180, 1, 'usergroupAdd', 'usergroup.class', 'add', 'Add a new user group', 'admin'),
(181, 1, 'usergroupUpdate', 'usergroup.class', 'update', 'Update an user group', 'admin'),
(182, 1, 'usergroupDelete', 'usergroup.class', 'delete', 'Delete an user group', 'admin'),
(183, 1, 'setModulePermissions', 'ps_module', 'update_permissions', '', 'admin'),
(184, 1, 'setFunctionPermissions', 'ps_function', 'update_permissions', '', 'admin'),
(185, 2, 'insertDownloadsForProduct', 'ps_order', 'insert_downloads_for_product', '', 'admin'),
(186, 5, 'mailDownloadId', 'ps_order', 'mail_download_id', '', 'storeadmin,admin'),
(187, 7, 'replaceSavedCart', 'ps_cart', 'replaceCart', 'Replace cart with saved cart', 'none'),
(188, 7, 'mergeSavedCart', 'ps_cart', 'mergeSaved', 'Merge saved cart with cart', 'none'),
(189, 7, 'deleteSavedCart', 'ps_cart', 'deleteCart', 'Delete saved cart', 'none'),
(190, 7, 'savedCartDelete', 'ps_cart', 'deleteSaved', 'Delete items from saved cart', 'none'),
(191, 7, 'savedCartUpdate', 'ps_cart', 'updateSaved', 'Update saved cart items', 'none'),
(192, 1, 'getupdatepackage', 'update.class', 'getPatchPackage', 'Retrieves the Patch Package from the virtuemart.net Servers.', 'admin'),
(193, 1, 'applypatchpackage', 'update.class', 'applyPatch', 'Applies the Patch using the instructions from the update.xml file in the downloaded patch.', 'admin'),
(194, 1, 'removePatchPackage', 'update.class', 'removePackageFile', 'Removes  a Patch Package File and its extracted contents.', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_manufacturer`
--

CREATE TABLE IF NOT EXISTS `bak_vm_manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `mf_name` varchar(64) DEFAULT NULL,
  `mf_email` varchar(255) DEFAULT NULL,
  `mf_desc` text,
  `mf_category_id` int(11) DEFAULT NULL,
  `mf_url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Manufacturers are those who create products' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bak_vm_manufacturer`
--

INSERT INTO `bak_vm_manufacturer` (`manufacturer_id`, `mf_name`, `mf_email`, `mf_desc`, `mf_category_id`, `mf_url`) VALUES
(1, 'Manufacturer', 'info@manufacturer.com', 'An example for a manufacturer', 1, 'http://www.a-url.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_manufacturer_category`
--

CREATE TABLE IF NOT EXISTS `bak_vm_manufacturer_category` (
  `mf_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `mf_category_name` varchar(64) DEFAULT NULL,
  `mf_category_desc` text,
  PRIMARY KEY (`mf_category_id`),
  KEY `idx_manufacturer_category_category_name` (`mf_category_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Manufactorers are assigned to these categories' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bak_vm_manufacturer_category`
--

INSERT INTO `bak_vm_manufacturer_category` (`mf_category_id`, `mf_category_name`, `mf_category_desc`) VALUES
(1, '-default-', 'This is the default manufacturer category');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_module`
--

CREATE TABLE IF NOT EXISTS `bak_vm_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `module_description` text,
  `module_perms` varchar(255) DEFAULT NULL,
  `module_publish` char(1) DEFAULT NULL,
  `list_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`module_id`),
  KEY `idx_module_name` (`module_name`),
  KEY `idx_module_list_order` (`list_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='VirtueMart Core Modules, not: Joomla modules' AUTO_INCREMENT=12844 ;

--
-- Volcado de datos para la tabla `bak_vm_module`
--

INSERT INTO `bak_vm_module` (`module_id`, `module_name`, `module_description`, `module_perms`, `module_publish`, `list_order`) VALUES
(1, 'admin', '<h4>ADMINISTRATIVE USERS ONLY</h4>\r\n\r\n<p>Only used for the following:</p>\r\n<OL>\r\n\r\n<LI>User Maintenance</LI>\r\n<LI>Module Maintenance</LI>\r\n<LI>Function Maintenance</LI>\r\n</OL>\r\n', 'admin', 'Y', 1),
(2, 'product', '<p>Here you can adminster your online catalog of products.  The Product Administrator allows you to create product categories, create new products, edit product attributes, and add product items for each attribute value.</p>', 'storeadmin,admin', 'Y', 4),
(3, 'vendor', '<h4>ADMINISTRATIVE USERS ONLY</h4>\r\n<p>Here you can manage the vendors on the phpShop system.</p>', 'admin', 'Y', 6),
(4, 'shopper', '<p>Manage shoppers in your store.  Allows you to create shopper groups.  Shopper groups can be used when setting the price for a product.  This allows you to create different prices for different types of users.  An example of this would be to have a ''wholesale'' group and a ''retail'' group. </p>', 'admin,storeadmin', 'Y', 4),
(5, 'order', '<p>View Order and Update Order Status.</p>', 'admin,storeadmin', 'Y', 5),
(6, 'msgs', 'This module is unprotected an used for displaying system messages to users.  We need to have an area that does not require authorization when things go wrong.', 'none', 'N', 99),
(7, 'shop', 'This is the Washupito store module.  This is the demo store included with the phpShop distribution.', 'none', 'Y', 99),
(8, 'store', '', 'storeadmin,admin', 'Y', 2),
(9, 'account', 'This module allows shoppers to update their account information and view previously placed orders.', 'shopper,storeadmin,admin,demo', 'N', 99),
(10, 'checkout', '', 'none', 'N', 99),
(11, 'tax', 'The tax module allows you to set tax rates for states or regions within a country.  The rate is set as a decimal figure.  For example, 2 percent tax would be 0.02.', 'admin,storeadmin', 'Y', 8),
(12, 'reportbasic', 'The report basic module allows you to do queries on all orders.', 'admin,storeadmin', 'Y', 7),
(13, 'zone', 'This is the zone-shipping module. Here you can manage your shipping costs according to Zones.', 'admin,storeadmin', 'N', 9),
(12839, 'shipping', '<h4>Shipping</h4><p>Let this module calculate the shipping fees for your customers.<br>Create carriers for shipping areas and weight groups.</p>', 'admin,storeadmin', 'Y', 10),
(98, 'affiliate', 'administrate the affiliates on your store.', 'storeadmin,admin', 'N', 99),
(99, 'manufacturer', 'Manage the manufacturers of products in your store.', 'storeadmin,admin', 'Y', 12),
(12842, 'help', 'Help Module', 'admin,storeadmin', 'Y', 13),
(12843, 'coupon', 'Coupon Management', 'admin,storeadmin', 'Y', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_orders`
--

CREATE TABLE IF NOT EXISTS `bak_vm_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `order_number` varchar(32) DEFAULT NULL,
  `user_info_id` varchar(32) DEFAULT NULL,
  `order_total` decimal(15,5) NOT NULL DEFAULT '0.00000',
  `order_subtotal` decimal(15,5) DEFAULT NULL,
  `order_tax` decimal(10,2) DEFAULT NULL,
  `order_tax_details` text NOT NULL,
  `order_shipping` decimal(10,2) DEFAULT NULL,
  `order_shipping_tax` decimal(10,2) DEFAULT NULL,
  `coupon_discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `coupon_code` varchar(32) DEFAULT NULL,
  `order_discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `order_currency` varchar(16) DEFAULT NULL,
  `order_status` char(1) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `ship_method_id` varchar(255) DEFAULT NULL,
  `customer_note` text NOT NULL,
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`order_id`),
  KEY `idx_orders_user_id` (`user_id`),
  KEY `idx_orders_vendor_id` (`vendor_id`),
  KEY `idx_orders_order_number` (`order_number`),
  KEY `idx_orders_user_info_id` (`user_info_id`),
  KEY `idx_orders_ship_method_id` (`ship_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Used to store all orders' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_order_history`
--

CREATE TABLE IF NOT EXISTS `bak_vm_order_history` (
  `order_status_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `order_status_code` char(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customer_notified` int(1) DEFAULT '0',
  `comments` text,
  PRIMARY KEY (`order_status_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all actions and changes that occur to an order' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_order_item`
--

CREATE TABLE IF NOT EXISTS `bak_vm_order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `user_info_id` varchar(32) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_item_sku` varchar(64) NOT NULL DEFAULT '',
  `order_item_name` varchar(64) NOT NULL DEFAULT '',
  `product_quantity` int(11) DEFAULT NULL,
  `product_item_price` decimal(15,5) DEFAULT NULL,
  `product_final_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `order_item_currency` varchar(16) DEFAULT NULL,
  `order_status` char(1) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `product_attribute` text,
  PRIMARY KEY (`order_item_id`),
  KEY `idx_order_item_order_id` (`order_id`),
  KEY `idx_order_item_user_info_id` (`user_info_id`),
  KEY `idx_order_item_vendor_id` (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all items (products) which are part of an order' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_order_payment`
--

CREATE TABLE IF NOT EXISTS `bak_vm_order_payment` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `payment_method_id` int(11) DEFAULT NULL,
  `order_payment_code` varchar(30) NOT NULL DEFAULT '',
  `order_payment_number` blob,
  `order_payment_expire` int(11) DEFAULT NULL,
  `order_payment_name` varchar(255) DEFAULT NULL,
  `order_payment_log` text,
  `order_payment_trans_id` text NOT NULL,
  KEY `idx_order_payment_order_id` (`order_id`),
  KEY `idx_order_payment_method_id` (`payment_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='The payment method that was chosen for a specific order';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_order_status`
--

CREATE TABLE IF NOT EXISTS `bak_vm_order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_status_code` char(1) NOT NULL DEFAULT '',
  `order_status_name` varchar(64) DEFAULT NULL,
  `order_status_description` text NOT NULL,
  `list_order` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_status_id`),
  KEY `idx_order_status_list_order` (`list_order`),
  KEY `idx_order_status_vendor_id` (`vendor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='All available order statuses' AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `bak_vm_order_status`
--

INSERT INTO `bak_vm_order_status` (`order_status_id`, `order_status_code`, `order_status_name`, `order_status_description`, `list_order`, `vendor_id`) VALUES
(1, 'P', 'Pending', '', 1, 1),
(2, 'C', 'Confirmed', '', 2, 1),
(3, 'X', 'Cancelled', '', 3, 1),
(4, 'R', 'Refunded', '', 4, 1),
(5, 'S', 'Shipped', '', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_order_user_info`
--

CREATE TABLE IF NOT EXISTS `bak_vm_order_user_info` (
  `order_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `address_type` char(2) DEFAULT NULL,
  `address_type_name` varchar(32) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `middle_name` varchar(32) DEFAULT NULL,
  `phone_1` varchar(32) DEFAULT NULL,
  `phone_2` varchar(32) DEFAULT NULL,
  `fax` varchar(32) DEFAULT NULL,
  `address_1` varchar(64) NOT NULL DEFAULT '',
  `address_2` varchar(64) DEFAULT NULL,
  `city` varchar(32) NOT NULL DEFAULT '',
  `state` varchar(32) NOT NULL DEFAULT '',
  `country` varchar(32) NOT NULL DEFAULT 'US',
  `zip` varchar(32) NOT NULL DEFAULT '',
  `user_email` varchar(255) DEFAULT NULL,
  `extra_field_1` varchar(255) DEFAULT NULL,
  `extra_field_2` varchar(255) DEFAULT NULL,
  `extra_field_3` varchar(255) DEFAULT NULL,
  `extra_field_4` char(1) DEFAULT NULL,
  `extra_field_5` char(1) DEFAULT NULL,
  `bank_account_nr` varchar(32) NOT NULL DEFAULT '',
  `bank_name` varchar(32) NOT NULL DEFAULT '',
  `bank_sort_code` varchar(16) NOT NULL DEFAULT '',
  `bank_iban` varchar(64) NOT NULL DEFAULT '',
  `bank_account_holder` varchar(48) NOT NULL DEFAULT '',
  `bank_account_type` enum('Checking','Business Checking','Savings') NOT NULL DEFAULT 'Checking',
  PRIMARY KEY (`order_info_id`),
  KEY `idx_order_info_order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores the BillTo and ShipTo Information at order time' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_payment_method`
--

CREATE TABLE IF NOT EXISTS `bak_vm_payment_method` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `payment_method_name` varchar(255) DEFAULT NULL,
  `payment_class` varchar(50) NOT NULL DEFAULT '',
  `shopper_group_id` int(11) DEFAULT NULL,
  `payment_method_discount` decimal(12,2) DEFAULT NULL,
  `payment_method_discount_is_percent` tinyint(1) NOT NULL,
  `payment_method_discount_max_amount` decimal(10,2) NOT NULL,
  `payment_method_discount_min_amount` decimal(10,2) NOT NULL,
  `list_order` int(11) DEFAULT NULL,
  `payment_method_code` varchar(8) DEFAULT NULL,
  `enable_processor` char(1) DEFAULT NULL,
  `is_creditcard` tinyint(1) NOT NULL DEFAULT '0',
  `payment_enabled` char(1) NOT NULL DEFAULT 'N',
  `accepted_creditcards` varchar(128) NOT NULL DEFAULT '',
  `payment_extrainfo` text NOT NULL,
  `payment_passkey` blob NOT NULL,
  PRIMARY KEY (`payment_method_id`),
  KEY `idx_payment_method_vendor_id` (`vendor_id`),
  KEY `idx_payment_method_name` (`payment_method_name`),
  KEY `idx_payment_method_list_order` (`list_order`),
  KEY `idx_payment_method_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='The payment methods of your store' AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `bak_vm_payment_method`
--

INSERT INTO `bak_vm_payment_method` (`payment_method_id`, `vendor_id`, `payment_method_name`, `payment_class`, `shopper_group_id`, `payment_method_discount`, `payment_method_discount_is_percent`, `payment_method_discount_max_amount`, `payment_method_discount_min_amount`, `list_order`, `payment_method_code`, `enable_processor`, `is_creditcard`, `payment_enabled`, `accepted_creditcards`, `payment_extrainfo`, `payment_passkey`) VALUES
(1, 1, 'Purchase Order', '', 6, '0.00', 0, '0.00', '0.00', 4, 'PO', 'N', 0, 'Y', '', '', ''),
(2, 1, 'Cash On Delivery', '', 5, '-2.00', 0, '0.00', '0.00', 5, 'COD', 'N', 0, 'Y', '', '', ''),
(3, 1, 'Credit Card', 'ps_authorize', 5, '0.00', 0, '0.00', '0.00', 0, 'AN', 'Y', 0, 'Y', '1,2,6,7,', '', ''),
(4, 1, 'PayPal', 'ps_paypal', 5, '0.00', 0, '0.00', '0.00', 0, 'PP', 'P', 0, 'Y', '', '<?php\r\n$db1 = new ps_DB();\r\n$q = "SELECT country_2_code FROM #__vm_country WHERE country_3_code=''".$user->country."'' ORDER BY country_2_code ASC";\r\n$db1->query($q);\r\n\r\n$url = "https://www.paypal.com/cgi-bin/webscr";\r\n$tax_total = $db->f("order_tax") + $db->f("order_shipping_tax");\r\n$discount_total = $db->f("coupon_discount") + $db->f("order_discount");\r\n$post_variables = Array(\r\n"cmd" => "_ext-enter",\r\n"redirect_cmd" => "_xclick",\r\n"upload" => "1",\r\n"business" => PAYPAL_EMAIL,\r\n"receiver_email" => PAYPAL_EMAIL,\r\n"item_name" => $VM_LANG->_(''PHPSHOP_ORDER_PRINT_PO_NUMBER'').": ". $db->f("order_id"),\r\n"order_id" => $db->f("order_id"),\r\n"invoice" => $db->f("order_number"),\r\n"amount" => round( $db->f("order_subtotal")+$tax_total-$discount_total, 2),\r\n"shipping" => sprintf("%.2f", $db->f("order_shipping")),\r\n"currency_code" => $_SESSION[''vendor_currency''],\r\n\r\n"address_override" => "1",\r\n"first_name" => $dbbt->f(''first_name''),\r\n"last_name" => $dbbt->f(''last_name''),\r\n"address1" => $dbbt->f(''address_1''),\r\n"address2" => $dbbt->f(''address_2''),\r\n"zip" => $dbbt->f(''zip''),\r\n"city" => $dbbt->f(''city''),\r\n"state" => $dbbt->f(''state''),\r\n"country" => $db1->f(''country_2_code''),\r\n"email" => $dbbt->f(''user_email''),\r\n"night_phone_b" => $dbbt->f(''phone_1''),\r\n"cpp_header_image" => $vendor_image_url,\r\n\r\n"return" => SECUREURL ."index.php?option=com_virtuemart&page=checkout.result&order_id=".$db->f("order_id"),\r\n"notify_url" => SECUREURL ."administrator/components/com_virtuemart/notify.php",\r\n"cancel_return" => SECUREURL ."index.php",\r\n"undefined_quantity" => "0",\r\n\r\n"test_ipn" => PAYPAL_DEBUG,\r\n"pal" => "NRUBJXESJTY24",\r\n"no_shipping" => "1",\r\n"no_note" => "1"\r\n);\r\nif( $page == "checkout.thankyou" ) {\r\n$query_string = "?";\r\nforeach( $post_variables as $name => $value ) {\r\n$query_string .= $name. "=" . urlencode($value) ."&";\r\n}\r\nvmRedirect( $url . $query_string );\r\n} else {\r\necho ''<form action="''.$url.''" method="post" target="_blank">'';\r\necho ''<input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" alt="Click to pay with PayPal - it is fast, free and secure!" />'';\r\n\r\nforeach( $post_variables as $name => $value ) {\r\necho ''<input type="hidden" name="''.$name.''" value="''.htmlspecialchars($value).''" />'';\r\n}\r\necho ''</form>'';\r\n\r\n}\r\n?>', ''),
(5, 1, 'PayMate', 'ps_paymate', 5, '0.00', 0, '0.00', '0.00', 0, 'PM', 'P', 0, 'N', '', '<script type="text/javascript" language="javascript">\n  function openExpress(){\n      var url = ''https://www.paymate.com.au/PayMate/ExpressPayment?mid=<?php echo PAYMATE_USERNAME.\n          "&amt=".$db->f("order_total").\n   "&currency=".$_SESSION[''vendor_currency''].\n       "&ref=".$db->f("order_id").\n      "&pmt_sender_email=".$user->email.\n         "&pmt_contact_firstname=".$user->first_name.\n       "&pmt_contact_surname=".$user->last_name.\n          "&regindi_address1=".$user->address_1.\n     "&regindi_address2=".$user->address_2.\n     "&regindi_sub=".$user->city.\n       "&regindi_pcode=".$user->zip;?>''\n        var newWin = window.open(url, ''wizard'', ''height=640,width=500,scrollbars=0,toolbar=no'');\n  self.name = ''parent'';\n       newWin.focus();\n  }\n  </script>\n  <div align="center">\n  <p>\n  <a href="javascript:openExpress();">\n  <img src="https://www.paymate.com.au/homepage/images/butt_PayNow.gif" border="0" alt="Pay with Paymate Express">\n  <br />click here to pay your account</a>\n  </p>\n  </div>', ''),
(6, 1, 'WorldPay', 'ps_worldpay', 5, '0.00', 0, '0.00', '0.00', 0, 'WP', 'P', 0, 'N', '', '<form action="https://select.worldpay.com/wcc/purchase" method="post">\n                                                <input type=hidden name="testMode" value="100"> \n                                                  <input type="hidden" name="instId" value="<?php echo WORLDPAY_INST_ID ?>" />\n                                            <input type="hidden" name="cartId" value="<?php echo $db->f("order_id") ?>" />\n                                               <input type="hidden" name="amount" value="<?php echo $db->f("order_total") ?>" />\n                                            <input type="hidden" name="currency" value="<?php echo $_SESSION[''vendor_currency''] ?>" />\n                                           <input type="hidden" name="desc" value="Products" />\n                                            <input type="hidden" name="email" value="<?php echo $user->email?>" />\n                                                 <input type="hidden" name="address" value="<?php echo $user->address_1?>&#10<?php echo $user->address_2?>&#10<?php echo\n                                                $user->city?>&#10<?php echo $user->state?>" />\n                                             <input type="hidden" name="name" value="<?php echo $user->title?><?php echo $user->first_name?>. <?php echo $user->middle_name?><?php echo $user->last_name?>" />\n                                           <input type="hidden" name="country" value="<?php echo $user->country?>"/>\n                                              <input type="hidden" name="postcode" value="<?php echo $user->zip?>" />\n                                                <input type="hidden" name="tel"  value="<?php echo $user->phone_1?>">\n                                                  <input type="hidden" name="withDelivery"  value="true">\n                                                 <br />\n                                                <input type="submit" value ="PROCEED TO PAYMENT PAGE" />\n                                                  </form>', ''),
(7, 1, '2Checkout', 'ps_twocheckout', 5, '0.00', 0, '0.00', '0.00', 0, '2CO', 'P', 0, 'N', '', '<?php\n      $q  = "SELECT * FROM #__users WHERE user_info_id=''".$db->f("user_info_id")."''"; \n    $dbbt = new ps_DB;\n   $dbbt->setQuery($q);\n        $dbbt->query();\n      $dbbt->next_record(); \n       // Get ship_to information\n    if( $db->f("user_info_id") != $dbbt->f("user_info_id")) {\n         $q2  = "SELECT * FROM #__vm_user_info WHERE user_info_id=''".$db->f("user_info_id")."''"; \n    $dbst = new ps_DB;\n   $dbst->setQuery($q2);\n       $dbst->query();\n      $dbst->next_record();\n      }\n     else  {\n         $dbst = $dbbt;\n    }\n                     \n      //Authnet vars to send\n        $formdata = array (\n   ''x_login'' => TWOCO_LOGIN,\n   ''x_email_merchant'' => ((TWOCO_MERCHANT_EMAIL == ''True'') ? ''TRUE'' : ''FALSE''),\n                  \n      // Customer Name and Billing Address\n  ''x_first_name'' => $dbbt->f("first_name"),\n        ''x_last_name'' => $dbbt->f("last_name"),\n  ''x_company'' => $dbbt->f("company"),\n      ''x_address'' => $dbbt->f("address_1"),\n    ''x_city'' => $dbbt->f("city"),\n    ''x_state'' => $dbbt->f("state"),\n  ''x_zip'' => $dbbt->f("zip"),\n      ''x_country'' => $dbbt->f("country"),\n      ''x_phone'' => $dbbt->f("phone_1"),\n        ''x_fax'' => $dbbt->f("fax"),\n      ''x_email'' => $dbbt->f("email"),\n \n       // Customer Shipping Address\n  ''x_ship_to_first_name'' => $dbst->f("first_name"),\n        ''x_ship_to_last_name'' => $dbst->f("last_name"),\n  ''x_ship_to_company'' => $dbst->f("company"),\n      ''x_ship_to_address'' => $dbst->f("address_1"),\n    ''x_ship_to_city'' => $dbst->f("city"),\n    ''x_ship_to_state'' => $dbst->f("state"),\n  ''x_ship_to_zip'' => $dbst->f("zip"),\n      ''x_ship_to_country'' => $dbst->f("country"),\n     \n       ''x_invoice_num'' => $db->f("order_number"),\n       ''x_receipt_link_url'' => SECUREURL."2checkout_notify.php"\n  );\n    \n     if( TWOCO_TESTMODE == "Y" )\n   $formdata[''demo''] = "Y";\n       \n       $version = "2";\n    $url = "https://www2.2checkout.com/2co/buyer/purchase";\n    $formdata[''x_amount''] = number_format($db->f("order_total"), 2, ''.'', '''');\n \n       //build the post string\n       $poststring = '''';\n  foreach($formdata AS $key => $val){\n          $poststring .= "<input type=''hidden'' name=''$key'' value=''$val'' />\n ";\n    }\n    \n      ?>\n    <form action="<?php echo $url ?>" method="post" target="_blank">\n       <?php echo $poststring ?>\n    <p>Click on the Image below to pay...</p>\n     <input type="image" name="submit" src="https://www.2checkout.com/images/buy_logo.gif" border="0" alt="Make payments with 2Checkout, it''s fast and secure!" title="Pay your Order with 2Checkout, it''s fast and secure!" />\n      </form>', ''),
(8, 1, 'NoChex', 'ps_nochex', 5, '0.00', 0, '0.00', '0.00', 0, 'NOCHEX', 'P', 0, 'N', '', '<form action="https://www.nochex.com/nochex.dll/checkout" method=post target="_blank"> \n                                                                                     <input type="hidden" name="email" value="<?php echo NOCHEX_EMAIL ?>" />\n                                                                                 <input type="hidden" name="amount" value="<?php printf("%.2f", $db->f("order_total"))?>" />\n                                                                                        <input type="hidden" name="ordernumber" value="<?php $db->p("order_id") ?>" />\n                                                                                       <input type="hidden" name="logo" value="<?php echo $vendor_image_url ?>" />\n                                                                                    <input type="hidden" name="returnurl" value="<?php echo SECUREURL ."index.php?option=com_virtuemart&amp;page=checkout.result&amp;order_id=".$db->f("order_id") ?>" />\n                                                                                      <input type="image" name="submit" src="http://www.nochex.com/web/images/paymeanimated.gif"> \n                                                                                    </form>', ''),
(9, 1, 'Credit Card (PayMeNow)', 'ps_paymenow', 5, '0.00', 0, '0.00', '0.00', 0, 'PN', 'Y', 0, 'N', '1,2,3,', '', ''),
(10, 1, 'eWay', 'ps_eway', 5, '0.00', 0, '0.00', '0.00', 0, 'EWAY', 'Y', 0, 'N', '', '', ''),
(11, 1, 'eCheck.net', 'ps_echeck', 5, '0.00', 0, '0.00', '0.00', 0, 'ECK', 'B', 0, 'N', '', '', ''),
(12, 1, 'Credit Card (eProcessingNetwork)', 'ps_epn', 5, '0.00', 0, '0.00', '0.00', 0, 'EPN', 'Y', 0, 'N', '1,2,3,', '', ''),
(13, 1, 'iKobo', '', 5, '0.00', 0, '0.00', '0.00', 0, 'IK', 'P', 0, 'N', '', '<form action="https://www.iKobo.com/store/index.php" method="post"> \n  <input type="hidden" name="cmd" value="cart" />Click on the image below to Pay with iKobo\n  <input type="image" src="https://www.ikobo.com/merchant/buttons/ikobo_pay1.gif" name="submit" alt="Pay with iKobo" /> \n  <input type="hidden" name="poid" value="USER_ID" /> \n  <input type="hidden" name="item" value="Order: <?php $db->p("order_id") ?>" /> \n  <input type="hidden" name="price" value="<?php printf("%.2f", $db->f("order_total"))?>" /> \n  <input type="hidden" name="firstname" value="<?php echo $user->first_name?>" /> \n  <input type="hidden" name="lastname" value="<?php echo $user->last_name?>" /> \n  <input type="hidden" name="address" value="<?php echo $user->address_1?>&#10<?php echo $user->address_2?>" /> \n  <input type="hidden" name="city" value="<?php echo $user->city?>" /> \n  <input type="hidden" name="state" value="<?php echo $user->state?>" /> \n  <input type="hidden" name="zip" value="<?php echo $user->zip?>" /> \n  <input type="hidden" name="phone" value="<?php echo $user->phone_1?>" /> \n  <input type="hidden" name="email" value="<?php echo $user->email?>" /> \n  </form> >', ''),
(14, 1, 'iTransact', '', 5, '0.00', 0, '0.00', '0.00', 0, 'ITR', 'P', 0, 'N', '', '<?php\n  //your iTransact account details\n  $vendorID = "XXXXX";\n  global $vendor_name;\n  $mername = $vendor_name;\n  \n  //order details\n  $total = $db->f("order_total");$first_name = $user->first_name;$last_name = $user->last_name;$address = $user->address_1;$city = $user->city;$state = $user->state;$zip = $user->zip;$country = $user->country;$email = $user->email;$phone = $user->phone_1;$home_page = $mosConfig_live_site."/index.php";$ret_addr = $mosConfig_live_site."/index.php";$cc_payment_image = $mosConfig_live_site."/components/com_virtuemart/shop_image/ps_image/cc_payment.jpg";\n  ?>\n  <form action="https://secure.paymentclearing.com/cgi-bin/mas/split.cgi" method="POST"> \n                <input type="hidden" name="vendor_id" value="<?php echo $vendorID; ?>" />\n              <input type="hidden" name="home_page" value="<?php echo $home_page; ?>" />\n             <input type="hidden" name="ret_addr" value="<?php echo $ret_addr; ?>" />\n               <input type="hidden" name="mername" value="<?php echo $mername; ?>" />\n         <!--Enter text in the next value that should appear on the bottom of the order form.-->\n               <INPUT type="hidden" name="mertext" value="" />\n         <!--If you are accepting checks, enter the number 1 in the next value.  Enter the number 0 if you are not accepting checks.-->\n                <INPUT type="hidden" name="acceptchecks" value="0" />\n           <!--Enter the number 1 in the next value if you want to allow pre-registered customers to pay with a check.  Enter the number 0 if not.-->\n            <INPUT type="hidden" name="allowreg" value="0" />\n               <!--If you are set up with Check Guarantee, enter the number 1 in the next value.  Enter the number 0 if not.-->\n              <INPUT type="hidden" name="checkguar" value="0" />\n              <!--Enter the number 1 in the next value if you are accepting credit card payments.  Enter the number zero if not.-->\n         <INPUT type="hidden" name="acceptcards" value="1">\n              <!--Enter the number 1 in the next value if you want to allow a separate mailing address for credit card orders.  Enter the number 0 if not.-->\n               <INPUT type="hidden" name="altaddr" value="0" />\n                <!--Enter the number 1 in the next value if you want the customer to enter the CVV number for card orders.  Enter the number 0 if not.-->\n             <INPUT type="hidden" name="showcvv" value="1" />\n                \n              <input type="hidden" name="1-desc" value="Order Total" />\n               <input type="hidden" name="1-cost" value="<?php echo $total; ?>" />\n            <input type="hidden" name="1-qty" value="1" />\n          <input type="hidden" name="total" value="<?php echo $total; ?>" />\n             <input type="hidden" name="first_name" value="<?php echo $first_name; ?>" />\n           <input type="hidden" name="last_name" value="<?php echo $last_name; ?>" />\n             <input type="hidden" name="address" value="<?php echo $address; ?>" />\n         <input type="hidden" name="city" value="<?php echo $city; ?>" />\n               <input type="hidden" name="state" value="<?php echo $state; ?>" />\n             <input type="hidden" name="zip" value="<?php echo $zip; ?>" />\n         <input type="hidden" name="country" value="<?php echo $country; ?>" />\n         <input type="hidden" name="phone" value="<?php echo $phone; ?>" />\n             <input type="hidden" name="email" value="<?php echo $email; ?>" />\n             <p><input type="image" alt="Process Secure Credit Card Transaction using iTransact" border="0" height="60" width="210" src="<?php echo $cc_payment_image; ?>" /> </p>\n            </form>', ''),
(15, 1, 'Verisign PayFlow Pro', 'payflow_pro', 5, '0.00', 0, '0.00', '0.00', 0, 'PFP', 'Y', 0, 'Y', '1,2,6,7,', '', ''),
(16, 1, 'Dankort/PBS via ePay', 'ps_epay', 5, '0.00', 0, '0.00', '0.00', 0, 'EPAY', 'P', 0, 'Y', '', '<?php\r\nrequire_once(CLASSPATH ."payment/ps_epay.cfg.php");\r\n$url=basename($mosConfig_live_site);\r\nfunction get_iso_code($code) {\r\nswitch ($code) {\r\ncase "ADP": return "020"; break;\r\ncase "AED": return "784"; break;\r\ncase "AFA": return "004"; break;\r\ncase "ALL": return "008"; break;\r\ncase "AMD": return "051"; break;\r\ncase "ANG": return "532"; break;\r\ncase "AOA": return "973"; break;\r\ncase "ARS": return "032"; break;\r\ncase "AUD": return "036"; break;\r\ncase "AWG": return "533"; break;\r\ncase "AZM": return "031"; break;\r\ncase "BAM": return "977"; break;\r\ncase "BBD": return "052"; break;\r\ncase "BDT": return "050"; break;\r\ncase "BGL": return "100"; break;\r\ncase "BGN": return "975"; break;\r\ncase "BHD": return "048"; break;\r\ncase "BIF": return "108"; break;\r\ncase "BMD": return "060"; break;\r\ncase "BND": return "096"; break;\r\ncase "BOB": return "068"; break;\r\ncase "BOV": return "984"; break;\r\ncase "BRL": return "986"; break;\r\ncase "BSD": return "044"; break;\r\ncase "BTN": return "064"; break;\r\ncase "BWP": return "072"; break;\r\ncase "BYR": return "974"; break;\r\ncase "BZD": return "084"; break;\r\ncase "CAD": return "124"; break;\r\ncase "CDF": return "976"; break;\r\ncase "CHF": return "756"; break;\r\ncase "CLF": return "990"; break;\r\ncase "CLP": return "152"; break;\r\ncase "CNY": return "156"; break;\r\ncase "COP": return "170"; break;\r\ncase "CRC": return "188"; break;\r\ncase "CUP": return "192"; break;\r\ncase "CVE": return "132"; break;\r\ncase "CYP": return "196"; break;\r\ncase "CZK": return "203"; break;\r\ncase "DJF": return "262"; break;\r\ncase "DKK": return "208"; break;\r\ncase "DOP": return "214"; break;\r\ncase "DZD": return "012"; break;\r\ncase "ECS": return "218"; break;\r\ncase "ECV": return "983"; break;\r\ncase "EEK": return "233"; break;\r\ncase "EGP": return "818"; break;\r\ncase "ERN": return "232"; break;\r\ncase "ETB": return "230"; break;\r\ncase "EUR": return "978"; break;\r\ncase "FJD": return "242"; break;\r\ncase "FKP": return "238"; break;\r\ncase "GBP": return "826"; break;\r\ncase "GEL": return "981"; break;\r\ncase "GHC": return "288"; break;\r\ncase "GIP": return "292"; break;\r\ncase "GMD": return "270"; break;\r\ncase "GNF": return "324"; break;\r\ncase "GTQ": return "320"; break;\r\ncase "GWP": return "624"; break;\r\ncase "GYD": return "328"; break;\r\ncase "HKD": return "344"; break;\r\ncase "HNL": return "340"; break;\r\ncase "HRK": return "191"; break;\r\ncase "HTG": return "332"; break;\r\ncase "HUF": return "348"; break;\r\ncase "IDR": return "360"; break;\r\ncase "ILS": return "376"; break;\r\ncase "INR": return "356"; break;\r\ncase "IQD": return "368"; break;\r\ncase "IRR": return "364"; break;\r\ncase "ISK": return "352"; break;\r\ncase "JMD": return "388"; break;\r\ncase "JOD": return "400"; break;\r\ncase "JPY": return "392"; break;\r\ncase "KES": return "404"; break;\r\ncase "KGS": return "417"; break;\r\ncase "KHR": return "116"; break;\r\ncase "KMF": return "174"; break;\r\ncase "KPW": return "408"; break;\r\ncase "KRW": return "410"; break;\r\ncase "KWD": return "414"; break;\r\ncase "KYD": return "136"; break;\r\ncase "KZT": return "398"; break;\r\ncase "LAK": return "418"; break;\r\ncase "LBP": return "422"; break;\r\ncase "LKR": return "144"; break;\r\ncase "LRD": return "430"; break;\r\ncase "LSL": return "426"; break;\r\ncase "LTL": return "440"; break;\r\ncase "LVL": return "428"; break;\r\ncase "LYD": return "434"; break;\r\ncase "MAD": return "504"; break;\r\ncase "MDL": return "498"; break;\r\ncase "MGF": return "450"; break;\r\ncase "MKD": return "807"; break;\r\ncase "MMK": return "104"; break;\r\ncase "MNT": return "496"; break;\r\ncase "MOP": return "446"; break;\r\ncase "MRO": return "478"; break;\r\ncase "MTL": return "470"; break;\r\ncase "MUR": return "480"; break;\r\ncase "MVR": return "462"; break;\r\ncase "MWK": return "454"; break;\r\ncase "MXN": return "484"; break;\r\ncase "MXV": return "979"; break;\r\ncase "MYR": return "458"; break;\r\ncase "MZM": return "508"; break;\r\ncase "NAD": return "516"; break;\r\ncase "NGN": return "566"; break;\r\ncase "NIO": return "558"; break;\r\ncase "NOK": return "578"; break;\r\ncase "NPR": return "524"; break;\r\ncase "NZD": return "554"; break;\r\ncase "OMR": return "512"; break;\r\ncase "PAB": return "590"; break;\r\ncase "PEN": return "604"; break;\r\ncase "PGK": return "598"; break;\r\ncase "PHP": return "608"; break;\r\ncase "PKR": return "586"; break;\r\ncase "PLN": return "985"; break;\r\ncase "PYG": return "600"; break;\r\ncase "QAR": return "634"; break;\r\ncase "ROL": return "642"; break;\r\ncase "RUB": return "643"; break;\r\ncase "RUR": return "810"; break;\r\ncase "RWF": return "646"; break;\r\ncase "SAR": return "682"; break;\r\ncase "SBD": return "090"; break;\r\ncase "SCR": return "690"; break;\r\ncase "SDD": return "736"; break;\r\ncase "SEK": return "752"; break;\r\ncase "SGD": return "702"; break;\r\ncase "SHP": return "654"; break;\r\ncase "SIT": return "705"; break;\r\ncase "SKK": return "703"; break;\r\ncase "SLL": return "694"; break;\r\ncase "SOS": return "706"; break;\r\ncase "SRG": return "740"; break;\r\ncase "STD": return "678"; break;\r\ncase "SVC": return "222"; break;\r\ncase "SYP": return "760"; break;\r\ncase "SZL": return "748"; break;\r\ncase "THB": return "764"; break;\r\ncase "TJS": return "972"; break;\r\ncase "TMM": return "795"; break;\r\ncase "TND": return "788"; break;\r\ncase "TOP": return "776"; break;\r\ncase "TPE": return "626"; break;\r\ncase "TRL": return "792"; break;\r\ncase "TRY": return "949"; break;\r\ncase "TTD": return "780"; break;\r\ncase "TWD": return "901"; break;\r\ncase "TZS": return "834"; break;\r\ncase "UAH": return "980"; break;\r\ncase "UGX": return "800"; break;\r\ncase "USD": return "840"; break;\r\ncase "UYU": return "858"; break;\r\ncase "UZS": return "860"; break;\r\ncase "VEB": return "862"; break;\r\ncase "VND": return "704"; break;\r\ncase "VUV": return "548"; break;\r\ncase "XAF": return "950"; break;\r\ncase "XCD": return "951"; break;\r\ncase "XOF": return "952"; break;\r\ncase "XPF": return "953"; break;\r\ncase "YER": return "886"; break;\r\ncase "YUM": return "891"; break;\r\ncase "ZAR": return "710"; break;\r\ncase "ZMK": return "894"; break;\r\ncase "ZWD": return "716"; break;\r\n}\r\nreturn "XXX"; // return invalid code if the currency is not found \r\n}\r\n\r\nfunction calculateePayCurrency($order_id)\r\n{\r\n$db =& new ps_DB;\r\n$currency_code = "208";\r\n$q = "SELECT order_currency FROM #__vm_orders where order_id = " . $order_id;\r\n$db->query($q);\r\nif ($db->next_record()) {\r\n	$currency_code = get_iso_code($db->f("order_currency"));\r\n}\r\nreturn $currency_code;\r\n}\r\n echo $VM_LANG->_(''VM_CHECKOUT_EPAY_PAYMENT_CHECKOUT_HEADER'');\r\n?>\r\n<script type="text/javascript" src="http://www.epay.dk/js/standardwindow.js"></script>\r\n<script type="text/javascript">\r\nfunction printCard(cardId)\r\n{\r\ndocument.write ("<table border=0 cellspacing=10 cellpadding=10>");\r\nswitch (cardId) {\r\ncase 1: document.write ("<input type=hidden name=cardtype value=1>"); break;\r\ncase 2: document.write ("<input type=hidden name=cardtype value=2>"); break;\r\ncase 3: document.write ("<input type=hidden name=cardtype value=3>"); break;\r\ncase 4: document.write ("<input type=hidden name=cardtype value=4>"); break;\r\ncase 5: document.write ("<input type=hidden name=cardtype value=5>"); break;\r\ncase 6: document.write ("<input type=hidden name=cardtype value=6>"); break;\r\ncase 7: document.write ("<input type=hidden name=cardtype value=7>"); break;\r\ncase 8: document.write ("<input type=hidden name=cardtype value=8>"); break;\r\ncase 9: document.write ("<input type=hidden name=cardtype value=9>"); break;\r\ncase 10: document.write ("<input type=hidden name=cardtype value=10>"); break;\r\ncase 12: document.write ("<input type=hidden name=cardtype value=12>"); break;\r\ncase 13: document.write ("<input type=hidden name=cardtype value=13>"); break;\r\ncase 14: document.write ("<input type=hidden name=cardtype value=14>"); break;\r\ncase 15: document.write ("<input type=hidden name=cardtype value=15>"); break;\r\ncase 16: document.write ("<input type=hidden name=cardtype value=16>"); break;\r\ncase 17: document.write ("<input type=hidden name=cardtype value=17>"); break;\r\ncase 18: document.write ("<input type=hidden name=cardtype value=18>"); break;\r\ncase 19: document.write ("<input type=hidden name=cardtype value=19>"); break;\r\ncase 21: document.write ("<input type=hidden name=cardtype value=21>"); break;\r\ncase 22: document.write ("<input type=hidden name=cardtype value=22>"); break;\r\n}\r\ndocument.write ("</table>");\r\n}\r\n</script>\r\n<form action="https://ssl.ditonlinebetalingssystem.dk/popup/default.asp" method="post" name="ePay" target="ePay_window" id="ePay">\r\n<input type="hidden" name="merchantnumber" value="<?php echo EPAY_MERCHANTNUMBER ?>">\r\n<input type="hidden" name="amount" value="<?php echo round($db->f("order_total")*100, 2 ) ?>">\r\n<input type="hidden" name="currency" value="<?php echo calculateePayCurrency($order_id)?>">\r\n<input type="hidden" name="orderid" value="<?php echo $order_id ?>">\r\n<input type="hidden" name="ordretext" value="">\r\n<?php \r\nif (EPAY_CALLBACK == "1")\r\n{\r\n	echo ''<input type="hidden" name="callbackurl" value="'' . $mosConfig_live_site . ''/index.php?page=checkout.epay_result&accept=1&sessionid='' . $sessionid . ''&option=com_virtuemart&Itemid=1">'';\r\n}\r\n?>\r\n<input type="hidden" name="accepturl" value="<?php echo $mosConfig_live_site ?>/index.php?page=checkout.epay_result&accept=1&sessionid=<?php echo $sessionid ?>&option=com_virtuemart&Itemid=1">\r\n<input type="hidden" name="declineurl" value="<?php echo $mosConfig_live_site ?>/index.php?page=checkout.epay_result&accept=0&sessionid=<?php echo $sessionid ?>&option=com_virtuemart&Itemid=1">\r\n<input type="hidden" name="group" value="<?php echo EPAY_GROUP ?>">\r\n<input type="hidden" name="instant" value="<?php echo EPAY_INSTANT_CAPTURE ?>">\r\n<input type="hidden" name="language" value="<?php echo EPAY_LANGUAGE ?>">\r\n<input type="hidden" name="authsms" value="<?php echo EPAY_AUTH_SMS ?>">\r\n<input type="hidden" name="authmail" value="<?php echo EPAY_AUTH_MAIL . (strlen(EPAY_AUTH_MAIL) > 0 && EPAY_AUTHEMAILCUSTOMER == 1 ? ";" : "") . (EPAY_AUTHEMAILCUSTOMER == 1 ? $user->user_email : ""); ?>">\r\n<input type="hidden" name="windowstate" value="<?php echo EPAY_WINDOW_STATE ?>">\r\n<input type="hidden" name="use3D" value="<?php echo EPAY_3DSECURE ?>">\r\n<input type="hidden" name="addfee" value="<?php echo EPAY_ADDFEE ?>">\r\n<input type="hidden" name="subscription" value="<?php echo EPAY_SUBSCRIPTION ?>">\r\n<input type="hidden" name="MD5Key" value="<?php if (EPAY_MD5_TYPE == 2) echo md5( calculateePayCurrency($order_id) . round($db->f("order_total")*100, 2 ) . $order_id  . EPAY_MD5_KEY)?>">\r\n<?php\r\nif (EPAY_CARDTYPES_1 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(1)</script>";\r\nif (EPAY_CARDTYPES_2 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(2)</script>";\r\nif (EPAY_CARDTYPES_3 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(3)</script>";\r\nif (EPAY_CARDTYPES_4 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(4)</script>";\r\nif (EPAY_CARDTYPES_5 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(5)</script>";\r\nif (EPAY_CARDTYPES_6 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(6)</script>";\r\nif (EPAY_CARDTYPES_7 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(7)</script>";\r\nif (EPAY_CARDTYPES_8 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(8)</script>";\r\nif (EPAY_CARDTYPES_9 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(9)</script>";\r\nif (EPAY_CARDTYPES_10 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(10)</script>";\r\nif (EPAY_CARDTYPES_11 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(11)</script>";\r\nif (EPAY_CARDTYPES_12 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(12)</script>";\r\nif (EPAY_CARDTYPES_14 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(14)</script>";\r\nif (EPAY_CARDTYPES_15 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(15)</script>";\r\nif (EPAY_CARDTYPES_16 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(16)</script>";\r\nif (EPAY_CARDTYPES_17 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(17)</script>";\r\nif (EPAY_CARDTYPES_18 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(18)</script>";\r\nif (EPAY_CARDTYPES_19 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(19)</script>";\r\nif (EPAY_CARDTYPES_21 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(21)</script>";\r\nif (EPAY_CARDTYPES_22 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(22)</script>";;\r\n?>\r\n</form>\r\n<script>open_ePay_window();</script>\r\n<br>\r\n<table border="0" width="100%"><tr><td><input type="button" onClick="open_ePay_window()" value="<?php echo $VM_LANG->_(''VM_CHECKOUT_EPAY_BUTTON_OPEN_WINDOW'') ?>"></td><td width="100%" id="flashLoader"></td></tr></table><br><br><br>\r\n<?php echo $VM_LANG->_(''VM_CHECKOUT_EPAY_PAYMENT_CHECKOUT_FOOTER'') ?>\r\n<br><br>\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/epay_logo.gif" border="0">&nbsp;&nbsp;&nbsp;\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/mastercard_securecode.gif" border="0">&nbsp;&nbsp;&nbsp;\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/pci.gif" border="0">&nbsp;&nbsp;&nbsp;\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/verisign_secure.gif" border="0">&nbsp;&nbsp;&nbsp;\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/visa_secure.gif" border="0">&nbsp;&nbsp;&nbsp;;', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `product_parent_id` int(11) NOT NULL DEFAULT '0',
  `product_sku` varchar(64) NOT NULL DEFAULT '',
  `product_s_desc` varchar(255) DEFAULT NULL,
  `product_desc` text,
  `product_thumb_image` varchar(255) DEFAULT NULL,
  `product_full_image` varchar(255) DEFAULT NULL,
  `product_publish` char(1) DEFAULT NULL,
  `product_weight` decimal(10,4) DEFAULT NULL,
  `product_weight_uom` varchar(32) DEFAULT 'pounds.',
  `product_length` decimal(10,4) DEFAULT NULL,
  `product_width` decimal(10,4) DEFAULT NULL,
  `product_height` decimal(10,4) DEFAULT NULL,
  `product_lwh_uom` varchar(32) DEFAULT 'inches',
  `product_url` varchar(255) DEFAULT NULL,
  `product_in_stock` int(11) NOT NULL DEFAULT '0',
  `product_available_date` int(11) DEFAULT NULL,
  `product_availability` varchar(56) NOT NULL DEFAULT '',
  `product_special` char(1) DEFAULT NULL,
  `product_discount_id` int(11) DEFAULT NULL,
  `ship_code_id` int(11) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `product_name` varchar(64) DEFAULT NULL,
  `product_sales` int(11) NOT NULL DEFAULT '0',
  `attribute` text,
  `custom_attribute` text NOT NULL,
  `product_tax_id` tinyint(2) NOT NULL DEFAULT '0',
  `product_unit` varchar(32) DEFAULT NULL,
  `product_packaging` int(11) DEFAULT NULL,
  `child_options` varchar(45) DEFAULT NULL,
  `quantity_options` varchar(45) DEFAULT NULL,
  `child_option_ids` varchar(45) DEFAULT NULL,
  `product_order_levels` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `idx_product_vendor_id` (`vendor_id`),
  KEY `idx_product_product_parent_id` (`product_parent_id`),
  KEY `idx_product_sku` (`product_sku`),
  KEY `idx_product_ship_code_id` (`ship_code_id`),
  KEY `idx_product_name` (`product_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='All products are stored here.' AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `bak_vm_product`
--

INSERT INTO `bak_vm_product` (`product_id`, `vendor_id`, `product_parent_id`, `product_sku`, `product_s_desc`, `product_desc`, `product_thumb_image`, `product_full_image`, `product_publish`, `product_weight`, `product_weight_uom`, `product_length`, `product_width`, `product_height`, `product_lwh_uom`, `product_url`, `product_in_stock`, `product_available_date`, `product_availability`, `product_special`, `product_discount_id`, `ship_code_id`, `cdate`, `mdate`, `product_name`, `product_sales`, `attribute`, `custom_attribute`, `product_tax_id`, `product_unit`, `product_packaging`, `child_options`, `quantity_options`, `child_option_ids`, `product_order_levels`) VALUES
(31, 1, 0, 'Ghost Recon 2', 'Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libe', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p>', 'resized/Ghost_Recon_Adva_496e2baadf4a0_180x180.png', 'Ghost_Recon_Adva_496e2baaf061e.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 23, 1231887600, '24h.gif', 'N', 1, NULL, 1231956906, 1231956906, 'Ghost Recon Advanced Warfigher 2', 0, 'Language,English,French,German,Spanish,Portuguese,Polish;Special Edition,Gold Edition[+24]', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(32, 1, 0, 'Haze', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p>', 'resized/Haze_496e2ccfe0f41_180x180.png', 'Haze_496e2cd011827.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 34, 1231887600, '24h.gif', 'N', 1, NULL, 1231957200, 1231957200, 'Haze', 0, 'Language,English,French,German,Spanish,Portuguese,Polish;Special edition,Gold edition[+35]', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(33, 1, 0, 'Little Big Planet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p>', 'resized/Little_Big_Plane_496e2e3fee976_180x180.png', 'Little_Big_Plane_496e2e400b8b7.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 3, 1231887600, '2-3d.gif', 'N', 0, NULL, 1231957568, 1231957568, 'Little Big Planet', 0, 'Language,English,French,German,Spanish,Portuguese,Polish;Special Edition,Gold Edition[+15]', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(30, 1, 0, 'Viva Pinata', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p>', 'resized/Viva_Pi__ata_496e28bde0973_180x180.png', 'Viva_Pi__ata_496e28be04de1.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 30, 1231887600, '48h.gif', 'N', 1, NULL, 1231956158, 1231965237, 'Viva Pinata', 0, 'Language,English,French,German,Spanish,Portuguese,Polish;Special Edition,Extra Gold Edition[+35]', '', 2, 'piece', 0, 'N,N,N,N,N,Y,20%,10%,', 'none,0,0,1', '', '0,0'),
(35, 1, 0, 'Assassins Creed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p>', 'resized/Assassins_Creed_496e30e1e56d7_180x180.png', 'Assassins_Creed_496e30e1f417c.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 3, 1231887600, '2-3d.gif', 'N', 0, NULL, 1231958242, 1231965115, 'Assassins Creed', 0, 'Language,English,German,Italian;Special,Special cover design[+5]', '', 2, 'piece', 0, 'N,N,N,N,N,Y,20%,10%,', 'none,0,0,1', '', '0,0'),
(36, 1, 0, 'COD 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p>', 'resized/Call_of_Duty___W_496e321a615f1_180x180.png', 'Call_of_Duty___W_496e321a74eaa.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 15, 1231887600, '24h.gif', 'Y', 0, NULL, 1231958554, 1231958554, 'Call of Duty - World at War', 0, 'Language,English,Italian,Portuguese,Chinese;Specials,Gold Edition WWII', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(34, 1, 0, 'Gears War 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis.', 'resized/Gears_of_War_2_496e2feecb029_180x180.png', 'Gears_of_War_2_496e2feee5e12.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 23, 1231887600, '24h.gif', 'N', 1, NULL, 1231957998, 1231957998, 'Gears of War 2', 0, 'Language,English,French,German,Spanish,Portuguese,Polish;Special Edition,Hard Core Edition[+35]', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(28, 1, 0, 'Madagascar 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p>', 'resized/Madagascar_2_496e2756429f1_180x180.png', 'Madagascar_2_496e27565feb0.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 10, 1231887600, '24h.gif', 'N', 0, NULL, 1231955798, 1231956586, 'Madagascar 2', 0, 'Language,English,French,German,Spanish,Portuguese,Polish', '', 2, 'piece', 0, 'N,N,N,N,N,Y,20%,10%,', 'none,0,0,1', '', '0,0'),
(29, 1, 0, 'Pokemon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut.</p>', 'resized/Pokemon_Battle_R_496e281fa0fb3_180x180.png', 'Pokemon_Battle_R_496e281fbbbff.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1231887600, '48h.gif', 'N', 0, NULL, 1231955999, 1231956675, 'Pokemon Battle Revolution', 0, 'Language,English,French,German,Spanish,Portuguese,Polish;Special Ed,Special Edition Package[+25]', '', 2, 'piece', 0, 'N,N,N,N,N,Y,20%,10%,', 'none,0,0,1', '', '0,0'),
(37, 1, 0, 'Mario Sonic', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p><p>Vivamus a diam. Morbi consequat, ipsum nec pellentesque egestas, quam sapien blandit sem, non venenatis pede </p>', 'resized/Mario___Sonic_at_496e330d351f0_180x180.png', 'Mario___Sonic_at_496e330d46389.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 3, 1231887600, '7d.gif', 'N', 1, NULL, 1231958797, 1231959836, 'Mario & Sonic Olympic', 0, 'Special Edition,Gold Edition[+15];Special Pad,Super Pad mov[+45]', '', 0, 'piece', 0, 'N,N,N,N,N,Y,20%,10%,', 'none,0,0,1', '', '0,0'),
(38, 1, 0, 'Transformers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor. </p><p>Cras nec mauris. Quisque nunc. Sed enim neque, ornare eget, tincidunt ut, accumsan ac, ipsum. Ut eget tortor nec lectus eleifend tempus. Integer vitae sapien eget justo porta mattis. Phasellus a ante sit amet mi pulvinar condimentum. Nunc condimentum libero tincidunt risus. In lectus nisl, dapibus quis, aliquam sed, imperdiet non, justo. Nam porta aliquet turpis. Ut molestie vulputate dui. In enim leo, porta sit amet, condimentum sed, elementum consequat, purus. Nam at massa sed leo eleifend ornare. In eu dui. In elit metus, vestibulum non, feugiat mattis, malesuada quis, justo. </p><p>Cras sit amet ante. Morbi ut orci quis arcu interdum iaculis. Pellentesque id urna id ante facilisis porta. Sed elementum, magna nec vulputate porta, est nulla congue elit, in laoreet tellus dolor et augue. Phasellus non lectus. Aliquam erat volutpat. Vestibulum tincidunt nunc varius metus. Pellentesque blandit. Pellentesque eget enim eu justo dapibus dictum. Curabitur eu ipsum. Morbi fermentum nibh sed odio. Nulla ut nibh. Pellentesque massa est, placerat iaculis, blandit ut, viverra et, pede. Aliquam ac orci. Ut malesuada nisi quis neque. Nunc quis quam nec nunc fermentum accumsan. Mauris ut turpis. </p>', 'resized/Transformers_the_496e37962b2f2_180x180.png', 'Transformers_the_496e3796460b7.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 7, 1231887600, '48h.gif', 'N', 1, NULL, 1231959958, 1231959958, 'Transformers the Game', 0, 'Acessories,Game Pad[+45];Language,English,Spanish,French', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_attribute`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_attribute` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `attribute_name` char(255) NOT NULL DEFAULT '',
  `attribute_value` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`attribute_id`),
  KEY `idx_product_attribute_product_id` (`product_id`),
  KEY `idx_product_attribute_name` (`attribute_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores attributes + their specific values for Child Products' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_attribute_sku`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_attribute_sku` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `attribute_name` char(255) NOT NULL DEFAULT '',
  `attribute_list` int(11) NOT NULL DEFAULT '0',
  KEY `idx_product_attribute_sku_product_id` (`product_id`),
  KEY `idx_product_attribute_sku_attribute_name` (`attribute_name`),
  KEY `idx_product_attribute_list` (`attribute_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Attributes for a Parent Product used by its Child Products';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_category_xref`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_category_xref` (
  `category_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `product_list` int(11) DEFAULT NULL,
  KEY `idx_product_category_xref_category_id` (`category_id`),
  KEY `idx_product_category_xref_product_id` (`product_id`),
  KEY `idx_product_category_xref_product_list` (`product_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps Products to Categories';

--
-- Volcado de datos para la tabla `bak_vm_product_category_xref`
--

INSERT INTO `bak_vm_product_category_xref` (`category_id`, `product_id`, `product_list`) VALUES
(8, 38, 1),
(8, 29, 1),
(6, 28, 1),
(6, 36, 1),
(8, 37, 1),
(7, 33, 1),
(6, 34, 1),
(7, 32, 1),
(7, 31, 1),
(7, 35, 1),
(6, 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_discount`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_discount` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `is_percent` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` int(11) NOT NULL DEFAULT '0',
  `end_date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`discount_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Discounts that can be assigned to products' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bak_vm_product_discount`
--

INSERT INTO `bak_vm_product_discount` (`discount_id`, `amount`, `is_percent`, `start_date`, `end_date`) VALUES
(1, '20.00', 1, 1097704800, 1194390000),
(2, '2.00', 0, 1098655200, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_download`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_download` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  `end_date` int(11) NOT NULL DEFAULT '0',
  `download_max` int(11) NOT NULL DEFAULT '0',
  `download_id` varchar(32) NOT NULL DEFAULT '',
  `file_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`download_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Active downloads for selling downloadable goods';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_files`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_files` (
  `file_id` int(19) NOT NULL AUTO_INCREMENT,
  `file_product_id` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(128) NOT NULL DEFAULT '',
  `file_title` varchar(128) NOT NULL DEFAULT '',
  `file_description` mediumtext NOT NULL,
  `file_extension` varchar(128) NOT NULL DEFAULT '',
  `file_mimetype` varchar(64) NOT NULL DEFAULT '',
  `file_url` varchar(254) NOT NULL DEFAULT '',
  `file_published` tinyint(1) NOT NULL DEFAULT '0',
  `file_is_image` tinyint(1) NOT NULL DEFAULT '0',
  `file_image_height` int(11) NOT NULL DEFAULT '0',
  `file_image_width` int(11) NOT NULL DEFAULT '0',
  `file_image_thumb_height` int(11) NOT NULL DEFAULT '50',
  `file_image_thumb_width` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Additional Images and Files which are assigned to products' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_mf_xref`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_mf_xref` (
  `product_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  KEY `idx_product_mf_xref_product_id` (`product_id`),
  KEY `idx_product_mf_xref_manufacturer_id` (`manufacturer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a product to a manufacturer';

--
-- Volcado de datos para la tabla `bak_vm_product_mf_xref`
--

INSERT INTO `bak_vm_product_mf_xref` (`product_id`, `manufacturer_id`) VALUES
(38, 1),
(37, 1),
(29, 1),
(28, 1),
(36, 1),
(33, 1),
(34, 1),
(32, 1),
(31, 1),
(35, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_price`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_price` (
  `product_price_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `product_price` decimal(12,5) DEFAULT NULL,
  `product_currency` char(16) DEFAULT NULL,
  `product_price_vdate` int(11) DEFAULT NULL,
  `product_price_edate` int(11) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `shopper_group_id` int(11) DEFAULT NULL,
  `price_quantity_start` int(11) unsigned NOT NULL DEFAULT '0',
  `price_quantity_end` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_price_id`),
  KEY `idx_product_price_product_id` (`product_id`),
  KEY `idx_product_price_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds price records for a product' AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `bak_vm_product_price`
--

INSERT INTO `bak_vm_product_price` (`product_price_id`, `product_id`, `product_price`, `product_currency`, `product_price_vdate`, `product_price_edate`, `cdate`, `mdate`, `shopper_group_id`, `price_quantity_start`, `price_quantity_end`) VALUES
(36, 36, '79.00000', 'USD', 0, 0, 1231958554, 1231958554, 5, 0, 0),
(37, 37, '67.00000', 'USD', 0, 0, 1231958797, 1231959836, 5, 0, 0),
(29, 29, '56.00000', 'USD', 0, 0, 1231955999, 1231956675, 5, 0, 0),
(28, 28, '45.00000', 'USD', 0, 0, 1231955798, 1231956586, 5, 0, 0),
(33, 33, '69.00000', 'USD', 0, 0, 1231957568, 1231957568, 5, 0, 0),
(34, 34, '56.00000', 'USD', 0, 0, 1231957998, 1231957998, 5, 0, 0),
(38, 38, '46.00000', 'USD', 0, 0, 1231959958, 1231959958, 5, 0, 0),
(32, 32, '65.00000', 'USD', 0, 0, 1231957200, 1231957200, 5, 0, 0),
(31, 31, '45.00000', 'USD', 0, 0, 1231956906, 1231956906, 5, 0, 0),
(35, 35, '45.00000', 'USD', 0, 0, 1231958242, 1231965115, 5, 0, 0),
(30, 30, '65.00000', 'USD', 0, 0, 1231956158, 1231965237, 5, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_product_type_xref`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_product_type_xref` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `product_type_id` int(11) NOT NULL DEFAULT '0',
  KEY `idx_product_product_type_xref_product_id` (`product_id`),
  KEY `idx_product_product_type_xref_product_type_id` (`product_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps products to a product type';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_relations`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_relations` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `related_products` text,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_reviews`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `user_rating` tinyint(1) NOT NULL DEFAULT '0',
  `review_ok` int(11) NOT NULL DEFAULT '0',
  `review_votes` int(11) NOT NULL DEFAULT '0',
  `published` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`review_id`),
  UNIQUE KEY `product_id` (`product_id`,`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `bak_vm_product_reviews`
--

INSERT INTO `bak_vm_product_reviews` (`review_id`, `product_id`, `comment`, `userid`, `time`, `user_rating`, `review_ok`, `review_votes`, `published`) VALUES
(3, 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor.', 62, 1231965163, 5, 0, 0, 'N'),
(4, 34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor.', 62, 1231965176, 5, 0, 0, 'N'),
(5, 32, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor.', 62, 1231965194, 3, 0, 0, 'N'),
(6, 38, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor.', 62, 1231965208, 2, 0, 0, 'N'),
(7, 36, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor.', 62, 1231965221, 5, 0, 0, 'N'),
(8, 30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor.', 62, 1231965249, 4, 0, 0, 'N'),
(9, 33, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor.', 62, 1231965263, 4, 0, 0, 'N'),
(10, 28, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis. In non mauris. Suspendisse a nunc eu erat consequat dictum. Suspendisse et sapien ornare lectus sodales eleifend. Nam rhoncus magna. Sed ullamcorper massa sagittis nisl. Integer volutpat dolor eget elit. Maecenas in nibh. Cras in orci ac dolor aliquam fringilla. Etiam volutpat, ante sollicitudin eleifend malesuada, dui ante faucibus risus, ac accumsan turpis nulla a nisl. Cras nunc. Aenean arcu. Nullam consectetur, eros eu malesuada fringilla, arcu purus semper nibh, sit amet ullamcorper nulla ligula ut dolor. Maecenas id neque. Nam ligula. Proin a risus vel ipsum blandit porttitor.', 62, 1231965281, 1, 0, 0, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_type`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_type` (
  `product_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_name` varchar(255) NOT NULL DEFAULT '',
  `product_type_description` text,
  `product_type_publish` char(1) DEFAULT NULL,
  `product_type_browsepage` varchar(255) DEFAULT NULL,
  `product_type_flypage` varchar(255) DEFAULT NULL,
  `product_type_list_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_type_parameter`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_type_parameter` (
  `product_type_id` int(11) NOT NULL DEFAULT '0',
  `parameter_name` varchar(255) NOT NULL DEFAULT '',
  `parameter_label` varchar(255) NOT NULL DEFAULT '',
  `parameter_description` text,
  `parameter_list_order` int(11) NOT NULL DEFAULT '0',
  `parameter_type` char(1) NOT NULL DEFAULT 'T',
  `parameter_values` varchar(255) DEFAULT NULL,
  `parameter_multiselect` char(1) DEFAULT NULL,
  `parameter_default` varchar(255) DEFAULT NULL,
  `parameter_unit` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`product_type_id`,`parameter_name`),
  KEY `idx_product_type_parameter_product_type_id` (`product_type_id`),
  KEY `idx_product_type_parameter_parameter_order` (`parameter_list_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Parameters which are part of a product type';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_product_votes`
--

CREATE TABLE IF NOT EXISTS `bak_vm_product_votes` (
  `product_id` int(255) NOT NULL DEFAULT '0',
  `votes` text NOT NULL,
  `allvotes` int(11) NOT NULL DEFAULT '0',
  `rating` tinyint(1) NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all votes for a product';

--
-- Volcado de datos para la tabla `bak_vm_product_votes`
--

INSERT INTO `bak_vm_product_votes` (`product_id`, `votes`, `allvotes`, `rating`, `lastip`) VALUES
(35, '5', 1, 5, '85.139.106.151'),
(34, '5', 1, 5, '85.139.106.151'),
(32, '3', 1, 3, '85.139.106.151'),
(38, '2', 1, 2, '85.139.106.151'),
(36, '5', 1, 5, '85.139.106.151'),
(30, '4', 1, 4, '85.139.106.151'),
(33, '4', 1, 4, '85.139.106.151'),
(28, '1', 1, 1, '85.139.106.151');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_shipping_carrier`
--

CREATE TABLE IF NOT EXISTS `bak_vm_shipping_carrier` (
  `shipping_carrier_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_carrier_name` char(80) NOT NULL DEFAULT '',
  `shipping_carrier_list_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shipping_carrier_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Shipping Carriers as used by the Standard Shipping Module' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bak_vm_shipping_carrier`
--

INSERT INTO `bak_vm_shipping_carrier` (`shipping_carrier_id`, `shipping_carrier_name`, `shipping_carrier_list_order`) VALUES
(1, 'DHL', 0),
(2, 'UPS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_shipping_label`
--

CREATE TABLE IF NOT EXISTS `bak_vm_shipping_label` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `shipper_class` varchar(32) DEFAULT NULL,
  `ship_date` varchar(32) DEFAULT NULL,
  `service_code` varchar(32) DEFAULT NULL,
  `special_service` varchar(32) DEFAULT NULL,
  `package_type` varchar(16) DEFAULT NULL,
  `order_weight` decimal(10,2) DEFAULT NULL,
  `is_international` tinyint(1) DEFAULT NULL,
  `additional_protection_type` varchar(16) DEFAULT NULL,
  `additional_protection_value` decimal(10,2) DEFAULT NULL,
  `duty_value` decimal(10,2) DEFAULT NULL,
  `content_desc` varchar(255) DEFAULT NULL,
  `label_is_generated` tinyint(1) NOT NULL DEFAULT '0',
  `tracking_number` varchar(32) DEFAULT NULL,
  `label_image` blob,
  `have_signature` tinyint(1) NOT NULL DEFAULT '0',
  `signature_image` blob,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores information used in generating shipping labels';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_shipping_rate`
--

CREATE TABLE IF NOT EXISTS `bak_vm_shipping_rate` (
  `shipping_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_rate_name` varchar(255) NOT NULL DEFAULT '',
  `shipping_rate_carrier_id` int(11) NOT NULL DEFAULT '0',
  `shipping_rate_country` text NOT NULL,
  `shipping_rate_zip_start` varchar(32) NOT NULL DEFAULT '',
  `shipping_rate_zip_end` varchar(32) NOT NULL DEFAULT '',
  `shipping_rate_weight_start` decimal(10,3) NOT NULL DEFAULT '0.000',
  `shipping_rate_weight_end` decimal(10,3) NOT NULL DEFAULT '0.000',
  `shipping_rate_value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `shipping_rate_package_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `shipping_rate_currency_id` int(11) NOT NULL DEFAULT '0',
  `shipping_rate_vat_id` int(11) NOT NULL DEFAULT '0',
  `shipping_rate_list_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shipping_rate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Shipping Rates, used by the Standard Shipping Module' AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `bak_vm_shipping_rate`
--

INSERT INTO `bak_vm_shipping_rate` (`shipping_rate_id`, `shipping_rate_name`, `shipping_rate_carrier_id`, `shipping_rate_country`, `shipping_rate_zip_start`, `shipping_rate_zip_end`, `shipping_rate_weight_start`, `shipping_rate_weight_end`, `shipping_rate_value`, `shipping_rate_package_fee`, `shipping_rate_currency_id`, `shipping_rate_vat_id`, `shipping_rate_list_order`) VALUES
(1, 'Inland &gt; 4kg', 1, 'DEU', '00000', '99999', '0.000', '4.000', '5.62', '2.00', 47, 0, 1),
(2, 'Inland &gt; 8kg', 1, 'DEU', '00000', '99999', '4.000', '8.000', '6.39', '2.00', 47, 0, 2),
(3, 'Inland &gt; 12kg', 1, 'DEU', '00000', '99999', '8.000', '12.000', '7.16', '2.00', 47, 0, 3),
(4, 'Inland &gt; 20kg', 1, 'DEU', '00000', '99999', '12.000', '20.000', '8.69', '2.00', 47, 0, 4),
(5, 'EU+ &gt;  4kg', 1, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '0.000', '4.000', '14.57', '2.00', 47, 0, 5),
(6, 'EU+ &gt;  8kg', 1, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '4.000', '8.000', '18.66', '2.00', 47, 0, 6),
(7, 'EU+ &gt; 12kg', 1, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '8.000', '12.000', '22.57', '2.00', 47, 0, 7),
(8, 'EU+ &gt; 20kg', 1, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '12.000', '20.000', '30.93', '2.00', 47, 0, 8),
(9, 'Europe &gt; 4kg', 1, 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '0.000', '4.000', '23.78', '2.00', 47, 0, 9),
(10, 'Europe &gt;  8kg', 1, 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '4.000', '8.000', '29.91', '2.00', 47, 0, 10),
(11, 'Europe &gt; 12kg', 1, 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '8.000', '12.000', '36.05', '2.00', 47, 0, 11),
(12, 'Europe &gt; 20kg', 1, 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '12.000', '20.000', '48.32', '2.00', 47, 0, 12),
(13, 'World_1 &gt;  4kg', 1, 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '0.000', '4.000', '26.84', '2.00', 47, 0, 13),
(14, 'World_1 &gt; 8kg', 1, 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '4.000', '8.000', '35.02', '2.00', 47, 0, 14),
(15, 'World_1 &gt;12kg', 1, 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '8.000', '12.000', '43.20', '2.00', 47, 0, 15),
(16, 'World_1 &gt;20kg', 1, 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '12.000', '20.000', '59.57', '2.00', 47, 0, 16),
(17, 'World_2 &gt; 4kg', 1, '', '00000', '99999', '0.000', '4.000', '32.98', '2.00', 47, 0, 17),
(18, 'World_2 &gt; 8kg', 1, '', '00000', '99999', '4.000', '8.000', '47.29', '2.00', 47, 0, 18),
(19, 'World_2 &gt; 12kg', 1, '', '00000', '99999', '8.000', '12.000', '61.61', '2.00', 47, 0, 19),
(20, 'World_2 &gt; 20kg', 1, '', '00000', '99999', '12.000', '20.000', '90.24', '2.00', 47, 0, 20),
(21, 'UPS Express', 2, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '0.000', '20.000', '5.24', '2.00', 47, 0, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_shopper_group`
--

CREATE TABLE IF NOT EXISTS `bak_vm_shopper_group` (
  `shopper_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `shopper_group_name` varchar(32) DEFAULT NULL,
  `shopper_group_desc` text,
  `shopper_group_discount` decimal(5,2) NOT NULL DEFAULT '0.00',
  `show_price_including_tax` tinyint(1) NOT NULL DEFAULT '1',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shopper_group_id`),
  KEY `idx_shopper_group_vendor_id` (`vendor_id`),
  KEY `idx_shopper_group_name` (`shopper_group_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Shopper Groups that users can be assigned to' AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `bak_vm_shopper_group`
--

INSERT INTO `bak_vm_shopper_group` (`shopper_group_id`, `vendor_id`, `shopper_group_name`, `shopper_group_desc`, `shopper_group_discount`, `show_price_including_tax`, `default`) VALUES
(5, 1, '-default-', 'This is the default shopper group.', '0.00', 1, 1),
(6, 1, 'Gold Level', 'Gold Level phpShoppers.', '0.00', 1, 0),
(7, 1, 'Wholesale', 'Shoppers that can buy at wholesale.', '0.00', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_shopper_vendor_xref`
--

CREATE TABLE IF NOT EXISTS `bak_vm_shopper_vendor_xref` (
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `shopper_group_id` int(11) DEFAULT NULL,
  `customer_number` varchar(32) DEFAULT NULL,
  KEY `idx_shopper_vendor_xref_user_id` (`user_id`),
  KEY `idx_shopper_vendor_xref_vendor_id` (`vendor_id`),
  KEY `idx_shopper_vendor_xref_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a user to a Shopper Group of a Vendor';

--
-- Volcado de datos para la tabla `bak_vm_shopper_vendor_xref`
--

INSERT INTO `bak_vm_shopper_vendor_xref` (`user_id`, `vendor_id`, `shopper_group_id`, `customer_number`) VALUES
(62, 1, 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_state`
--

CREATE TABLE IF NOT EXISTS `bak_vm_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL DEFAULT '1',
  `state_name` varchar(64) DEFAULT NULL,
  `state_3_code` char(3) DEFAULT NULL,
  `state_2_code` char(2) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  UNIQUE KEY `state_3_code` (`country_id`,`state_3_code`),
  UNIQUE KEY `state_2_code` (`country_id`,`state_2_code`),
  KEY `idx_country_id` (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='States that are assigned to a country' AUTO_INCREMENT=449 ;

--
-- Volcado de datos para la tabla `bak_vm_state`
--

INSERT INTO `bak_vm_state` (`state_id`, `country_id`, `state_name`, `state_3_code`, `state_2_code`) VALUES
(1, 223, 'Alabama', 'ALA', 'AL'),
(2, 223, 'Alaska', 'ALK', 'AK'),
(3, 223, 'Arizona', 'ARZ', 'AZ'),
(4, 223, 'Arkansas', 'ARK', 'AR'),
(5, 223, 'California', 'CAL', 'CA'),
(6, 223, 'Colorado', 'COL', 'CO'),
(7, 223, 'Connecticut', 'CCT', 'CT'),
(8, 223, 'Delaware', 'DEL', 'DE'),
(9, 223, 'District Of Columbia', 'DOC', 'DC'),
(10, 223, 'Florida', 'FLO', 'FL'),
(11, 223, 'Georgia', 'GEA', 'GA'),
(12, 223, 'Hawaii', 'HWI', 'HI'),
(13, 223, 'Idaho', 'IDA', 'ID'),
(14, 223, 'Illinois', 'ILL', 'IL'),
(15, 223, 'Indiana', 'IND', 'IN'),
(16, 223, 'Iowa', 'IOA', 'IA'),
(17, 223, 'Kansas', 'KAS', 'KS'),
(18, 223, 'Kentucky', 'KTY', 'KY'),
(19, 223, 'Louisiana', 'LOA', 'LA'),
(20, 223, 'Maine', 'MAI', 'ME'),
(21, 223, 'Maryland', 'MLD', 'MD'),
(22, 223, 'Massachusetts', 'MSA', 'MA'),
(23, 223, 'Michigan', 'MIC', 'MI'),
(24, 223, 'Minnesota', 'MIN', 'MN'),
(25, 223, 'Mississippi', 'MIS', 'MS'),
(26, 223, 'Missouri', 'MIO', 'MO'),
(27, 223, 'Montana', 'MOT', 'MT'),
(28, 223, 'Nebraska', 'NEB', 'NE'),
(29, 223, 'Nevada', 'NEV', 'NV'),
(30, 223, 'New Hampshire', 'NEH', 'NH'),
(31, 223, 'New Jersey', 'NEJ', 'NJ'),
(32, 223, 'New Mexico', 'NEM', 'NM'),
(33, 223, 'New York', 'NEY', 'NY'),
(34, 223, 'North Carolina', 'NOC', 'NC'),
(35, 223, 'North Dakota', 'NOD', 'ND'),
(36, 223, 'Ohio', 'OHI', 'OH'),
(37, 223, 'Oklahoma', 'OKL', 'OK'),
(38, 223, 'Oregon', 'ORN', 'OR'),
(39, 223, 'Pennsylvania', 'PEA', 'PA'),
(40, 223, 'Rhode Island', 'RHI', 'RI'),
(41, 223, 'South Carolina', 'SOC', 'SC'),
(42, 223, 'South Dakota', 'SOD', 'SD'),
(43, 223, 'Tennessee', 'TEN', 'TN'),
(44, 223, 'Texas', 'TXS', 'TX'),
(45, 223, 'Utah', 'UTA', 'UT'),
(46, 223, 'Vermont', 'VMT', 'VT'),
(47, 223, 'Virginia', 'VIA', 'VA'),
(48, 223, 'Washington', 'WAS', 'WA'),
(49, 223, 'West Virginia', 'WEV', 'WV'),
(50, 223, 'Wisconsin', 'WIS', 'WI'),
(51, 223, 'Wyoming', 'WYO', 'WY'),
(52, 38, 'Alberta', 'ALB', 'AB'),
(53, 38, 'British Columbia', 'BRC', 'BC'),
(54, 38, 'Manitoba', 'MAB', 'MB'),
(55, 38, 'New Brunswick', 'NEB', 'NB'),
(56, 38, 'Newfoundland and Labrador', 'NFL', 'NL'),
(57, 38, 'Northwest Territories', 'NWT', 'NT'),
(58, 38, 'Nova Scotia', 'NOS', 'NS'),
(59, 38, 'Nunavut', 'NUT', 'NU'),
(60, 38, 'Ontario', 'ONT', 'ON'),
(61, 38, 'Prince Edward Island', 'PEI', 'PE'),
(62, 38, 'Quebec', 'QEC', 'QC'),
(63, 38, 'Saskatchewan', 'SAK', 'SK'),
(64, 38, 'Yukon', 'YUT', 'YT'),
(65, 222, 'England', 'ENG', 'EN'),
(66, 222, 'Northern Ireland', 'NOI', 'NI'),
(67, 222, 'Scotland', 'SCO', 'SD'),
(68, 222, 'Wales', 'WLS', 'WS'),
(69, 13, 'Australian Capital Territory', 'ACT', 'AT'),
(70, 13, 'New South Wales', 'NSW', 'NW'),
(71, 13, 'Northern Territory', 'NOT', 'NT'),
(72, 13, 'Queensland', 'QLD', 'QL'),
(73, 13, 'South Australia', 'SOA', 'SA'),
(74, 13, 'Tasmania', 'TAS', 'TA'),
(75, 13, 'Victoria', 'VIC', 'VI'),
(76, 13, 'Western Australia', 'WEA', 'WA'),
(77, 138, 'Aguascalientes', 'AGS', 'AG'),
(78, 138, 'Baja California Norte', 'BCN', 'BN'),
(79, 138, 'Baja California Sur', 'BCS', 'BS'),
(80, 138, 'Campeche', 'CAM', 'CA'),
(81, 138, 'Chiapas', 'CHI', 'CS'),
(82, 138, 'Chihuahua', 'CHA', 'CH'),
(83, 138, 'Coahuila', 'COA', 'CO'),
(84, 138, 'Colima', 'COL', 'CM'),
(85, 138, 'Distrito Federal', 'DFM', 'DF'),
(86, 138, 'Durango', 'DGO', 'DO'),
(87, 138, 'Guanajuato', 'GTO', 'GO'),
(88, 138, 'Guerrero', 'GRO', 'GU'),
(89, 138, 'Hidalgo', 'HGO', 'HI'),
(90, 138, 'Jalisco', 'JAL', 'JA'),
(91, 138, 'MĂ©xico (Estado de)', 'EDM', 'EM'),
(92, 138, 'MichoacĂˇn', 'MCN', 'MI'),
(93, 138, 'Morelos', 'MOR', 'MO'),
(94, 138, 'Nayarit', 'NAY', 'NY'),
(95, 138, 'Nuevo LeĂłn', 'NUL', 'NL'),
(96, 138, 'Oaxaca', 'OAX', 'OA'),
(97, 138, 'Puebla', 'PUE', 'PU'),
(98, 138, 'QuerĂ©taro', 'QRO', 'QU'),
(99, 138, 'Quintana Roo', 'QUR', 'QR'),
(100, 138, 'San Luis PotosĂ­', 'SLP', 'SP'),
(101, 138, 'Sinaloa', 'SIN', 'SI'),
(102, 138, 'Sonora', 'SON', 'SO'),
(103, 138, 'Tabasco', 'TAB', 'TA'),
(104, 138, 'Tamaulipas', 'TAM', 'TM'),
(105, 138, 'Tlaxcala', 'TLX', 'TX'),
(106, 138, 'Veracruz', 'VER', 'VZ'),
(107, 138, 'YucatĂˇn', 'YUC', 'YU'),
(108, 138, 'Zacatecas', 'ZAC', 'ZA'),
(109, 30, 'Acre', 'ACR', 'AC'),
(110, 30, 'Alagoas', 'ALG', 'AL'),
(111, 30, 'AmapĂˇ', 'AMP', 'AP'),
(112, 30, 'Amazonas', 'AMZ', 'AM'),
(113, 30, 'BahĂ­a', 'BAH', 'BA'),
(114, 30, 'CearĂˇ', 'CEA', 'CE'),
(115, 30, 'Distrito Federal', 'DFB', 'DF'),
(116, 30, 'Espirito Santo', 'ESS', 'ES'),
(117, 30, 'GoiĂˇs', 'GOI', 'GO'),
(118, 30, 'MaranhĂŁo', 'MAR', 'MA'),
(119, 30, 'Mato Grosso', 'MAT', 'MT'),
(120, 30, 'Mato Grosso do Sul', 'MGS', 'MS'),
(121, 30, 'Minas GeraĂ­s', 'MIG', 'MG'),
(122, 30, 'ParanĂˇ', 'PAR', 'PR'),
(123, 30, 'ParaĂ­ba', 'PRB', 'PB'),
(124, 30, 'ParĂˇ', 'PAB', 'PA'),
(125, 30, 'Pernambuco', 'PER', 'PE'),
(126, 30, 'PiauĂ­', 'PIA', 'PI'),
(127, 30, 'Rio Grande do Norte', 'RGN', 'RN'),
(128, 30, 'Rio Grande do Sul', 'RGS', 'RS'),
(129, 30, 'Rio de Janeiro', 'RDJ', 'RJ'),
(130, 30, 'RondĂ´nia', 'RON', 'RO'),
(131, 30, 'Roraima', 'ROR', 'RR'),
(132, 30, 'Santa Catarina', 'SAC', 'SC'),
(133, 30, 'Sergipe', 'SER', 'SE'),
(134, 30, 'SĂŁo Paulo', 'SAP', 'SP'),
(135, 30, 'Tocantins', 'TOC', 'TO'),
(136, 44, 'Anhui', 'ANH', '34'),
(137, 44, 'Beijing', 'BEI', '11'),
(138, 44, 'Chongqing', 'CHO', '50'),
(139, 44, 'Fujian', 'FUJ', '35'),
(140, 44, 'Gansu', 'GAN', '62'),
(141, 44, 'Guangdong', 'GUA', '44'),
(142, 44, 'Guangxi Zhuang', 'GUZ', '45'),
(143, 44, 'Guizhou', 'GUI', '52'),
(144, 44, 'Hainan', 'HAI', '46'),
(145, 44, 'Hebei', 'HEB', '13'),
(146, 44, 'Heilongjiang', 'HEI', '23'),
(147, 44, 'Henan', 'HEN', '41'),
(148, 44, 'Hubei', 'HUB', '42'),
(149, 44, 'Hunan', 'HUN', '43'),
(150, 44, 'Jiangsu', 'JIA', '32'),
(151, 44, 'Jiangxi', 'JIX', '36'),
(152, 44, 'Jilin', 'JIL', '22'),
(153, 44, 'Liaoning', 'LIA', '21'),
(154, 44, 'Nei Mongol', 'NML', '15'),
(155, 44, 'Ningxia Hui', 'NIH', '64'),
(156, 44, 'Qinghai', 'QIN', '63'),
(157, 44, 'Shandong', 'SNG', '37'),
(158, 44, 'Shanghai', 'SHH', '31'),
(159, 44, 'Shaanxi', 'SHX', '61'),
(160, 44, 'Sichuan', 'SIC', '51'),
(161, 44, 'Tianjin', 'TIA', '12'),
(162, 44, 'Xinjiang Uygur', 'XIU', '65'),
(163, 44, 'Xizang', 'XIZ', '54'),
(164, 44, 'Yunnan', 'YUN', '53'),
(165, 44, 'Zhejiang', 'ZHE', '33'),
(166, 104, 'Gaza Strip', 'GZS', 'GZ'),
(167, 104, 'West Bank', 'WBK', 'WB'),
(168, 104, 'Other', 'OTH', 'OT'),
(169, 151, 'St. Maarten', 'STM', 'SM'),
(170, 151, 'Bonaire', 'BNR', 'BN'),
(171, 151, 'Curacao', 'CUR', 'CR'),
(172, 175, 'Alba', 'ABA', 'AB'),
(173, 175, 'Arad', 'ARD', 'AR'),
(174, 175, 'Arges', 'ARG', 'AG'),
(175, 175, 'Bacau', 'BAC', 'BC'),
(176, 175, 'Bihor', 'BIH', 'BH'),
(177, 175, 'Bistrita-Nasaud', 'BIS', 'BN'),
(178, 175, 'Botosani', 'BOT', 'BT'),
(179, 175, 'Braila', 'BRL', 'BR'),
(180, 175, 'Brasov', 'BRA', 'BV'),
(181, 175, 'Bucuresti', 'BUC', 'B'),
(182, 175, 'Buzau', 'BUZ', 'BZ'),
(183, 175, 'Calarasi', 'CAL', 'CL'),
(184, 175, 'Caras Severin', 'CRS', 'CS'),
(185, 175, 'Cluj', 'CLJ', 'CJ'),
(186, 175, 'Constanta', 'CST', 'CT'),
(187, 175, 'Covasna', 'COV', 'CV'),
(188, 175, 'Dambovita', 'DAM', 'DB'),
(189, 175, 'Dolj', 'DLJ', 'DJ'),
(190, 175, 'Galati', 'GAL', 'GL'),
(191, 175, 'Giurgiu', 'GIU', 'GR'),
(192, 175, 'Gorj', 'GOR', 'GJ'),
(193, 175, 'Hargita', 'HRG', 'HR'),
(194, 175, 'Hunedoara', 'HUN', 'HD'),
(195, 175, 'Ialomita', 'IAL', 'IL'),
(196, 175, 'Iasi', 'IAS', 'IS'),
(197, 175, 'Ilfov', 'ILF', 'IF'),
(198, 175, 'Maramures', 'MAR', 'MM'),
(199, 175, 'Mehedinti', 'MEH', 'MH'),
(200, 175, 'Mures', 'MUR', 'MS'),
(201, 175, 'Neamt', 'NEM', 'NT'),
(202, 175, 'Olt', 'OLT', 'OT'),
(203, 175, 'Prahova', 'PRA', 'PH'),
(204, 175, 'Salaj', 'SAL', 'SJ'),
(205, 175, 'Satu Mare', 'SAT', 'SM'),
(206, 175, 'Sibiu', 'SIB', 'SB'),
(207, 175, 'Suceava', 'SUC', 'SV'),
(208, 175, 'Teleorman', 'TEL', 'TR'),
(209, 175, 'Timis', 'TIM', 'TM'),
(210, 175, 'Tulcea', 'TUL', 'TL'),
(211, 175, 'Valcea', 'VAL', 'VL'),
(212, 175, 'Vaslui', 'VAS', 'VS'),
(213, 175, 'Vrancea', 'VRA', 'VN'),
(214, 105, 'Agrigento', 'AGR', 'AG'),
(215, 105, 'Alessandria', 'ALE', 'AL'),
(216, 105, 'Ancona', 'ANC', 'AN'),
(217, 105, 'Aosta', 'AOS', 'AO'),
(218, 105, 'Arezzo', 'ARE', 'AR'),
(219, 105, 'Ascoli Piceno', 'API', 'AP'),
(220, 105, 'Asti', 'AST', 'AT'),
(221, 105, 'Avellino', 'AVE', 'AV'),
(222, 105, 'Bari', 'BAR', 'BA'),
(223, 105, 'Belluno', 'BEL', 'BL'),
(224, 105, 'Benevento', 'BEN', 'BN'),
(225, 105, 'Bergamo', 'BEG', 'BG'),
(226, 105, 'Biella', 'BIE', 'BI'),
(227, 105, 'Bologna', 'BOL', 'BO'),
(228, 105, 'Bolzano', 'BOZ', 'BZ'),
(229, 105, 'Brescia', 'BRE', 'BS'),
(230, 105, 'Brindisi', 'BRI', 'BR'),
(231, 105, 'Cagliari', 'CAG', 'CA'),
(232, 105, 'Caltanissetta', 'CAL', 'CL'),
(233, 105, 'Campobasso', 'CBO', 'CB'),
(234, 105, 'Carbonia-Iglesias', 'CAR', 'CI'),
(235, 105, 'Caserta', 'CAS', 'CE'),
(236, 105, 'Catania', 'CAT', 'CT'),
(237, 105, 'Catanzaro', 'CTZ', 'CZ'),
(238, 105, 'Chieti', 'CHI', 'CH'),
(239, 105, 'Como', 'COM', 'CO'),
(240, 105, 'Cosenza', 'COS', 'CS'),
(241, 105, 'Cremona', 'CRE', 'CR'),
(242, 105, 'Crotone', 'CRO', 'KR'),
(243, 105, 'Cuneo', 'CUN', 'CN'),
(244, 105, 'Enna', 'ENN', 'EN'),
(245, 105, 'Ferrara', 'FER', 'FE'),
(246, 105, 'Firenze', 'FIR', 'FI'),
(247, 105, 'Foggia', 'FOG', 'FG'),
(248, 105, 'Forli-Cesena', 'FOC', 'FC'),
(249, 105, 'Frosinone', 'FRO', 'FR'),
(250, 105, 'Genova', 'GEN', 'GE'),
(251, 105, 'Gorizia', 'GOR', 'GO'),
(252, 105, 'Grosseto', 'GRO', 'GR'),
(253, 105, 'Imperia', 'IMP', 'IM'),
(254, 105, 'Isernia', 'ISE', 'IS'),
(255, 105, 'L''Aquila', 'AQU', 'AQ'),
(256, 105, 'La Spezia', 'LAS', 'SP'),
(257, 105, 'Latina', 'LAT', 'LT'),
(258, 105, 'Lecce', 'LEC', 'LE'),
(259, 105, 'Lecco', 'LCC', 'LC'),
(260, 105, 'Livorno', 'LIV', 'LI'),
(261, 105, 'Lodi', 'LOD', 'LO'),
(262, 105, 'Lucca', 'LUC', 'LU'),
(263, 105, 'Macerata', 'MAC', 'MC'),
(264, 105, 'Mantova', 'MAN', 'MN'),
(265, 105, 'Massa-Carrara', 'MAS', 'MS'),
(266, 105, 'Matera', 'MAA', 'MT'),
(267, 105, 'Medio Campidano', 'MED', 'VS'),
(268, 105, 'Messina', 'MES', 'ME'),
(269, 105, 'Milano', 'MIL', 'MI'),
(270, 105, 'Modena', 'MOD', 'MO'),
(271, 105, 'Napoli', 'NAP', 'NA'),
(272, 105, 'Novara', 'NOV', 'NO'),
(273, 105, 'Nuoro', 'NUR', 'NU'),
(274, 105, 'Ogliastra', 'OGL', 'OG'),
(275, 105, 'Olbia-Tempio', 'OLB', 'OT'),
(276, 105, 'Oristano', 'ORI', 'OR'),
(277, 105, 'Padova', 'PDA', 'PD'),
(278, 105, 'Palermo', 'PAL', 'PA'),
(279, 105, 'Parma', 'PAA', 'PR'),
(280, 105, 'Pavia', 'PAV', 'PV'),
(281, 105, 'Perugia', 'PER', 'PG'),
(282, 105, 'Pesaro e Urbino', 'PES', 'PU'),
(283, 105, 'Pescara', 'PSC', 'PE'),
(284, 105, 'Piacenza', 'PIA', 'PC'),
(285, 105, 'Pisa', 'PIS', 'PI'),
(286, 105, 'Pistoia', 'PIT', 'PT'),
(287, 105, 'Pordenone', 'POR', 'PN'),
(288, 105, 'Potenza', 'PTZ', 'PZ'),
(289, 105, 'Prato', 'PRA', 'PO'),
(290, 105, 'Ragusa', 'RAG', 'RG'),
(291, 105, 'Ravenna', 'RAV', 'RA'),
(292, 105, 'Reggio Calabria', 'REG', 'RC'),
(293, 105, 'Reggio Emilia', 'REE', 'RE'),
(294, 105, 'Rieti', 'RIE', 'RI'),
(295, 105, 'Rimini', 'RIM', 'RN'),
(296, 105, 'Roma', 'ROM', 'RM'),
(297, 105, 'Rovigo', 'ROV', 'RO'),
(298, 105, 'Salerno', 'SAL', 'SA'),
(299, 105, 'Sassari', 'SAS', 'SS'),
(300, 105, 'Savona', 'SAV', 'SV'),
(301, 105, 'Siena', 'SIE', 'SI'),
(302, 105, 'Siracusa', 'SIR', 'SR'),
(303, 105, 'Sondrio', 'SOO', 'SO'),
(304, 105, 'Taranto', 'TAR', 'TA'),
(305, 105, 'Teramo', 'TER', 'TE'),
(306, 105, 'Terni', 'TRN', 'TR'),
(307, 105, 'Torino', 'TOR', 'TO'),
(308, 105, 'Trapani', 'TRA', 'TP'),
(309, 105, 'Trento', 'TRE', 'TN'),
(310, 105, 'Treviso', 'TRV', 'TV'),
(311, 105, 'Trieste', 'TRI', 'TS'),
(312, 105, 'Udine', 'UDI', 'UD'),
(313, 105, 'Varese', 'VAR', 'VA'),
(314, 105, 'Venezia', 'VEN', 'VE'),
(315, 105, 'Verbano Cusio Ossola', 'VCO', 'VB'),
(316, 105, 'Vercelli', 'VER', 'VC'),
(317, 105, 'Verona', 'VRN', 'VR'),
(318, 105, 'Vibo Valenzia', 'VIV', 'VV'),
(319, 105, 'Vicenza', 'VII', 'VI'),
(320, 105, 'Viterbo', 'VIT', 'VT'),
(321, 195, 'A CoruĂ±a', 'ACO', '15'),
(322, 195, 'Alava', 'ALA', '01'),
(323, 195, 'Albacete', 'ALB', '02'),
(324, 195, 'Alicante', 'ALI', '03'),
(325, 195, 'Almeria', 'ALM', '04'),
(326, 195, 'Asturias', 'AST', '33'),
(327, 195, 'Avila', 'AVI', '05'),
(328, 195, 'Badajoz', 'BAD', '06'),
(329, 195, 'Baleares', 'BAL', '07'),
(330, 195, 'Barcelona', 'BAR', '08'),
(331, 195, 'Burgos', 'BUR', '09'),
(332, 195, 'Caceres', 'CAC', '10'),
(333, 195, 'Cadiz', 'CAD', '11'),
(334, 195, 'Cantabria', 'CAN', '39'),
(335, 195, 'Castellon', 'CAS', '12'),
(336, 195, 'Ceuta', 'CEU', '51'),
(337, 195, 'Ciudad Real', 'CIU', '13'),
(338, 195, 'Cordoba', 'COR', '14'),
(339, 195, 'Cuenca', 'CUE', '16'),
(340, 195, 'Girona', 'GIR', '17'),
(341, 195, 'Granada', 'GRA', '18'),
(342, 195, 'Guadalajara', 'GUA', '19'),
(343, 195, 'Guipuzcoa', 'GUI', '20'),
(344, 195, 'Huelva', 'HUL', '21'),
(345, 195, 'Huesca', 'HUS', '22'),
(346, 195, 'Jaen', 'JAE', '23'),
(347, 195, 'La Rioja', 'LRI', '26'),
(348, 195, 'Las Palmas', 'LPA', '35'),
(349, 195, 'Leon', 'LEO', '24'),
(350, 195, 'Lleida', 'LLE', '25'),
(351, 195, 'Lugo', 'LUG', '27'),
(352, 195, 'Madrid', 'MAD', '28'),
(353, 195, 'Malaga', 'MAL', '29'),
(354, 195, 'Melilla', 'MEL', '52'),
(355, 195, 'Murcia', 'MUR', '30'),
(356, 195, 'Navarra', 'NAV', '31'),
(357, 195, 'Ourense', 'OUR', '32'),
(358, 195, 'Palencia', 'PAL', '34'),
(359, 195, 'Pontevedra', 'PON', '36'),
(360, 195, 'Salamanca', 'SAL', '37'),
(361, 195, 'Santa Cruz de Tenerife', 'SCT', '38'),
(362, 195, 'Segovia', 'SEG', '40'),
(363, 195, 'Sevilla', 'SEV', '41'),
(364, 195, 'Soria', 'SOR', '42'),
(365, 195, 'Tarragona', 'TAR', '43'),
(366, 195, 'Teruel', 'TER', '44'),
(367, 195, 'Toledo', 'TOL', '45'),
(368, 195, 'Valencia', 'VAL', '46'),
(369, 195, 'Valladolid', 'VLL', '47'),
(370, 195, 'Vizcaya', 'VIZ', '48'),
(371, 195, 'Zamora', 'ZAM', '49'),
(372, 195, 'Zaragoza', 'ZAR', '50'),
(373, 11, 'Aragatsotn', 'ARG', 'AG'),
(374, 11, 'Ararat', 'ARR', 'AR'),
(375, 11, 'Armavir', 'ARM', 'AV'),
(376, 11, 'Gegharkunik', 'GEG', 'GR'),
(377, 11, 'Kotayk', 'KOT', 'KT'),
(378, 11, 'Lori', 'LOR', 'LO'),
(379, 11, 'Shirak', 'SHI', 'SH'),
(380, 11, 'Syunik', 'SYU', 'SU'),
(381, 11, 'Tavush', 'TAV', 'TV'),
(382, 11, 'Vayots-Dzor', 'VAD', 'VD'),
(383, 11, 'Yerevan', 'YER', 'ER'),
(384, 99, 'Andaman & Nicobar Islands', 'ANI', 'AI'),
(385, 99, 'Andhra Pradesh', 'AND', 'AN'),
(386, 99, 'Arunachal Pradesh', 'ARU', 'AR'),
(387, 99, 'Assam', 'ASS', 'AS'),
(388, 99, 'Bihar', 'BIH', 'BI'),
(389, 99, 'Chandigarh', 'CHA', 'CA'),
(390, 99, 'Chhatisgarh', 'CHH', 'CH'),
(391, 99, 'Dadra & Nagar Haveli', 'DAD', 'DD'),
(392, 99, 'Daman & Diu', 'DAM', 'DA'),
(393, 99, 'Delhi', 'DEL', 'DE'),
(394, 99, 'Goa', 'GOA', 'GO'),
(395, 99, 'Gujarat', 'GUJ', 'GU'),
(396, 99, 'Haryana', 'HAR', 'HA'),
(397, 99, 'Himachal Pradesh', 'HIM', 'HI'),
(398, 99, 'Jammu & Kashmir', 'JAM', 'JA'),
(399, 99, 'Jharkhand', 'JHA', 'JH'),
(400, 99, 'Karnataka', 'KAR', 'KA'),
(401, 99, 'Kerala', 'KER', 'KE'),
(402, 99, 'Lakshadweep', 'LAK', 'LA'),
(403, 99, 'Madhya Pradesh', 'MAD', 'MD'),
(404, 99, 'Maharashtra', 'MAH', 'MH'),
(405, 99, 'Manipur', 'MAN', 'MN'),
(406, 99, 'Meghalaya', 'MEG', 'ME'),
(407, 99, 'Mizoram', 'MIZ', 'MI'),
(408, 99, 'Nagaland', 'NAG', 'NA'),
(409, 99, 'Orissa', 'ORI', 'OR'),
(410, 99, 'Pondicherry', 'PON', 'PO'),
(411, 99, 'Punjab', 'PUN', 'PU'),
(412, 99, 'Rajasthan', 'RAJ', 'RA'),
(413, 99, 'Sikkim', 'SIK', 'SI'),
(414, 99, 'Tamil Nadu', 'TAM', 'TA'),
(415, 99, 'Tripura', 'TRI', 'TR'),
(416, 99, 'Uttaranchal', 'UAR', 'UA'),
(417, 99, 'Uttar Pradesh', 'UTT', 'UT'),
(418, 99, 'West Bengal', 'WES', 'WE'),
(419, 101, 'Ahmadi va Kohkiluyeh', 'BOK', 'BO'),
(420, 101, 'Ardabil', 'ARD', 'AR'),
(421, 101, 'Azarbayjan-e Gharbi', 'AZG', 'AG'),
(422, 101, 'Azarbayjan-e Sharqi', 'AZS', 'AS'),
(423, 101, 'Bushehr', 'BUS', 'BU'),
(424, 101, 'Chaharmahal va Bakhtiari', 'CMB', 'CM'),
(425, 101, 'Esfahan', 'ESF', 'ES'),
(426, 101, 'Fars', 'FAR', 'FA'),
(427, 101, 'Gilan', 'GIL', 'GI'),
(428, 101, 'Gorgan', 'GOR', 'GO'),
(429, 101, 'Hamadan', 'HAM', 'HA'),
(430, 101, 'Hormozgan', 'HOR', 'HO'),
(431, 101, 'Ilam', 'ILA', 'IL'),
(432, 101, 'Kerman', 'KER', 'KE'),
(433, 101, 'Kermanshah', 'BAK', 'BA'),
(434, 101, 'Khorasan-e Junoubi', 'KHJ', 'KJ'),
(435, 101, 'Khorasan-e Razavi', 'KHR', 'KR'),
(436, 101, 'Khorasan-e Shomali', 'KHS', 'KS'),
(437, 101, 'Khuzestan', 'KHU', 'KH'),
(438, 101, 'Kordestan', 'KOR', 'KO'),
(439, 101, 'Lorestan', 'LOR', 'LO'),
(440, 101, 'Markazi', 'MAR', 'MR'),
(441, 101, 'Mazandaran', 'MAZ', 'MZ'),
(442, 101, 'Qazvin', 'QAS', 'QA'),
(443, 101, 'Qom', 'QOM', 'QO'),
(444, 101, 'Semnan', 'SEM', 'SE'),
(445, 101, 'Sistan va Baluchestan', 'SBA', 'SB'),
(446, 101, 'Tehran', 'TEH', 'TE'),
(447, 101, 'Yazd', 'YAZ', 'YA'),
(448, 101, 'Zanjan', 'ZAN', 'ZA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_tax_rate`
--

CREATE TABLE IF NOT EXISTS `bak_vm_tax_rate` (
  `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `tax_state` varchar(64) DEFAULT NULL,
  `tax_country` varchar(64) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `tax_rate` decimal(10,4) DEFAULT NULL,
  PRIMARY KEY (`tax_rate_id`),
  KEY `idx_tax_rate_vendor_id` (`vendor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='The tax rates for your store' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bak_vm_tax_rate`
--

INSERT INTO `bak_vm_tax_rate` (`tax_rate_id`, `vendor_id`, `tax_state`, `tax_country`, `mdate`, `tax_rate`) VALUES
(2, 1, 'CA', 'USA', 964565926, '0.0825');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_userfield`
--

CREATE TABLE IF NOT EXISTS `bak_vm_userfield` (
  `fieldid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '',
  `maxlength` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `required` tinyint(4) DEFAULT '0',
  `ordering` int(11) DEFAULT NULL,
  `cols` int(11) DEFAULT NULL,
  `rows` int(11) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `default` int(11) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `registration` tinyint(1) NOT NULL DEFAULT '0',
  `shipping` tinyint(1) NOT NULL DEFAULT '0',
  `account` tinyint(1) NOT NULL DEFAULT '1',
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `calculated` tinyint(1) NOT NULL DEFAULT '0',
  `sys` tinyint(4) NOT NULL DEFAULT '0',
  `vendor_id` int(11) DEFAULT NULL,
  `params` mediumtext,
  PRIMARY KEY (`fieldid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds the fields for the user information' AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `bak_vm_userfield`
--

INSERT INTO `bak_vm_userfield` (`fieldid`, `name`, `title`, `description`, `type`, `maxlength`, `size`, `required`, `ordering`, `cols`, `rows`, `value`, `default`, `published`, `registration`, `shipping`, `account`, `readonly`, `calculated`, `sys`, `vendor_id`, `params`) VALUES
(1, 'email', 'REGISTER_EMAIL', '', 'emailaddress', 100, 30, 1, 2, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, NULL),
(7, 'title', 'PHPSHOP_SHOPPER_FORM_TITLE', '', 'select', 0, 0, 0, 8, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, NULL),
(3, 'password', 'PHPSHOP_SHOPPER_FORM_PASSWORD_1', '', 'password', 25, 30, 1, 4, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, NULL),
(4, 'password2', 'PHPSHOP_SHOPPER_FORM_PASSWORD_2', '', 'password', 25, 30, 1, 5, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, NULL),
(6, 'company', 'PHPSHOP_SHOPPER_FORM_COMPANY_NAME', '', 'text', 64, 30, 0, 7, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(5, 'delimiter_billto', 'PHPSHOP_USER_FORM_BILLTO_LBL', '', 'delimiter', 25, 30, 0, 6, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 0, 1, NULL),
(2, 'username', 'REGISTER_UNAME', '', 'text', 25, 30, 1, 3, 0, 0, '', 0, 1, 1, 0, 1, 0, 0, 1, 1, ''),
(35, 'address_type_name', 'PHPSHOP_USER_FORM_ADDRESS_LABEL', '', 'text', 32, 30, 1, 6, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 0, 1, 1, NULL),
(8, 'first_name', 'PHPSHOP_SHOPPER_FORM_FIRST_NAME', '', 'text', 32, 30, 1, 9, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(9, 'last_name', 'PHPSHOP_SHOPPER_FORM_LAST_NAME', '', 'text', 32, 30, 1, 10, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(10, 'middle_name', 'PHPSHOP_SHOPPER_FORM_MIDDLE_NAME', '', 'text', 32, 30, 0, 11, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(11, 'address_1', 'PHPSHOP_SHOPPER_FORM_ADDRESS_1', '', 'text', 64, 30, 1, 12, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(12, 'address_2', 'PHPSHOP_SHOPPER_FORM_ADDRESS_2', '', 'text', 64, 30, 0, 13, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(13, 'city', 'PHPSHOP_SHOPPER_FORM_CITY', '', 'text', 32, 30, 1, 14, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(14, 'zip', 'PHPSHOP_SHOPPER_FORM_ZIP', '', 'text', 32, 30, 1, 15, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(15, 'country', 'PHPSHOP_SHOPPER_FORM_COUNTRY', '', 'select', 0, 0, 1, 16, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(16, 'state', 'PHPSHOP_SHOPPER_FORM_STATE', '', 'select', 0, 0, 1, 17, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(17, 'phone_1', 'PHPSHOP_SHOPPER_FORM_PHONE', '', 'text', 32, 30, 1, 18, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(18, 'phone_2', 'PHPSHOP_SHOPPER_FORM_PHONE2', '', 'text', 32, 30, 0, 19, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(19, 'fax', 'PHPSHOP_SHOPPER_FORM_FAX', '', 'text', 32, 30, 0, 20, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(20, 'delimiter_bankaccount', 'PHPSHOP_ACCOUNT_BANK_TITLE', '', 'delimiter', 25, 30, 0, 21, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 0, 1, NULL),
(21, 'bank_account_holder', 'PHPSHOP_ACCOUNT_LBL_BANK_ACCOUNT_HOLDER', '', 'text', 48, 30, 0, 22, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(22, 'bank_account_nr', 'PHPSHOP_ACCOUNT_LBL_BANK_ACCOUNT_NR', '', 'text', 32, 30, 0, 23, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(23, 'bank_sort_code', 'PHPSHOP_ACCOUNT_LBL_BANK_SORT_CODE', '', 'text', 16, 30, 0, 24, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(24, 'bank_name', 'PHPSHOP_ACCOUNT_LBL_BANK_NAME', '', 'text', 32, 30, 0, 25, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(25, 'bank_account_type', 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE', '', 'select', 0, 0, 0, 26, 0, 0, '', 0, 1, 0, 0, 1, 1, 0, 1, 1, ''),
(26, 'bank_iban', 'PHPSHOP_ACCOUNT_LBL_BANK_IBAN', '', 'text', 64, 30, 0, 27, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(27, 'delimiter_sendregistration', 'BUTTON_SEND_REG', '', 'delimiter', 25, 30, 0, 28, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, 1, NULL),
(28, 'agreed', 'PHPSHOP_I_AGREE_TO_TOS', '', 'checkbox', NULL, NULL, 1, 29, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 1, 1, NULL),
(29, 'delimiter_userinfo', 'PHPSHOP_ORDER_PRINT_CUST_INFO_LBL', '', 'delimiter', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 0, 1, NULL),
(30, 'extra_field_1', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_1', '', 'text', 255, 30, 0, 31, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL),
(31, 'extra_field_2', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_2', '', 'text', 255, 30, 0, 32, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL),
(32, 'extra_field_3', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_3', '', 'text', 255, 30, 0, 33, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL),
(33, 'extra_field_4', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_4', '', 'select', 1, 1, 0, 34, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL),
(34, 'extra_field_5', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_5', '', 'select', 1, 1, 0, 35, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_userfield_values`
--

CREATE TABLE IF NOT EXISTS `bak_vm_userfield_values` (
  `fieldvalueid` int(11) NOT NULL AUTO_INCREMENT,
  `fieldid` int(11) NOT NULL DEFAULT '0',
  `fieldtitle` varchar(255) NOT NULL DEFAULT '',
  `fieldvalue` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `sys` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fieldvalueid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds the different values for dropdown and radio lists' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `bak_vm_userfield_values`
--

INSERT INTO `bak_vm_userfield_values` (`fieldvalueid`, `fieldid`, `fieldtitle`, `fieldvalue`, `ordering`, `sys`) VALUES
(1, 25, 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_BUSINESSCHECKING', 'Checking', 1, 1),
(2, 25, 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_CHECKING', 'Business Checking', 2, 1),
(3, 25, 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_SAVINGS', 'Savings', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_user_info`
--

CREATE TABLE IF NOT EXISTS `bak_vm_user_info` (
  `user_info_id` varchar(32) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `address_type` char(2) DEFAULT NULL,
  `address_type_name` varchar(32) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `middle_name` varchar(32) DEFAULT NULL,
  `phone_1` varchar(32) DEFAULT NULL,
  `phone_2` varchar(32) DEFAULT NULL,
  `fax` varchar(32) DEFAULT NULL,
  `address_1` varchar(64) NOT NULL DEFAULT '',
  `address_2` varchar(64) DEFAULT NULL,
  `city` varchar(32) NOT NULL DEFAULT '',
  `state` varchar(32) NOT NULL DEFAULT '',
  `country` varchar(32) NOT NULL DEFAULT 'US',
  `zip` varchar(32) NOT NULL DEFAULT '',
  `user_email` varchar(255) DEFAULT NULL,
  `extra_field_1` varchar(255) DEFAULT NULL,
  `extra_field_2` varchar(255) DEFAULT NULL,
  `extra_field_3` varchar(255) DEFAULT NULL,
  `extra_field_4` char(1) DEFAULT NULL,
  `extra_field_5` char(1) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `perms` varchar(40) NOT NULL DEFAULT 'shopper',
  `bank_account_nr` varchar(32) NOT NULL DEFAULT '',
  `bank_name` varchar(32) NOT NULL DEFAULT '',
  `bank_sort_code` varchar(16) NOT NULL DEFAULT '',
  `bank_iban` varchar(64) NOT NULL DEFAULT '',
  `bank_account_holder` varchar(48) NOT NULL DEFAULT '',
  `bank_account_type` enum('Checking','Business Checking','Savings') NOT NULL DEFAULT 'Checking',
  PRIMARY KEY (`user_info_id`),
  KEY `idx_user_info_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Customer Information, BT = BillTo and ST = ShipTo';

--
-- Volcado de datos para la tabla `bak_vm_user_info`
--

INSERT INTO `bak_vm_user_info` (`user_info_id`, `user_id`, `address_type`, `address_type_name`, `company`, `title`, `last_name`, `first_name`, `middle_name`, `phone_1`, `phone_2`, `fax`, `address_1`, `address_2`, `city`, `state`, `country`, `zip`, `user_email`, `extra_field_1`, `extra_field_2`, `extra_field_3`, `extra_field_4`, `extra_field_5`, `cdate`, `mdate`, `perms`, `bank_account_nr`, `bank_name`, `bank_sort_code`, `bank_iban`, `bank_account_holder`, `bank_account_type`) VALUES
('f035186726f8bae04e163f2c702f92c0', 62, 'BT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'US', '', 'eee@eee.pl', NULL, NULL, NULL, NULL, NULL, 1231066480, 1231062999, 'shopper', '', '', '', '', '', 'Checking');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_vendor`
--

CREATE TABLE IF NOT EXISTS `bak_vm_vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(64) DEFAULT NULL,
  `contact_last_name` varchar(32) NOT NULL DEFAULT '',
  `contact_first_name` varchar(32) NOT NULL DEFAULT '',
  `contact_middle_name` varchar(32) DEFAULT NULL,
  `contact_title` varchar(32) DEFAULT NULL,
  `contact_phone_1` varchar(32) NOT NULL DEFAULT '',
  `contact_phone_2` varchar(32) DEFAULT NULL,
  `contact_fax` varchar(32) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `vendor_phone` varchar(32) DEFAULT NULL,
  `vendor_address_1` varchar(64) NOT NULL DEFAULT '',
  `vendor_address_2` varchar(64) DEFAULT NULL,
  `vendor_city` varchar(32) NOT NULL DEFAULT '',
  `vendor_state` varchar(32) NOT NULL DEFAULT '',
  `vendor_country` varchar(32) NOT NULL DEFAULT 'US',
  `vendor_zip` varchar(32) NOT NULL DEFAULT '',
  `vendor_store_name` varchar(128) NOT NULL DEFAULT '',
  `vendor_store_desc` text,
  `vendor_category_id` int(11) DEFAULT NULL,
  `vendor_thumb_image` varchar(255) DEFAULT NULL,
  `vendor_full_image` varchar(255) DEFAULT NULL,
  `vendor_currency` varchar(16) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `vendor_image_path` varchar(255) DEFAULT NULL,
  `vendor_terms_of_service` text NOT NULL,
  `vendor_url` varchar(255) NOT NULL DEFAULT '',
  `vendor_min_pov` decimal(10,2) DEFAULT NULL,
  `vendor_freeshipping` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vendor_currency_display_style` varchar(64) NOT NULL DEFAULT '',
  `vendor_accepted_currencies` text NOT NULL,
  `vendor_address_format` text NOT NULL,
  `vendor_date_format` varchar(255) NOT NULL,
  PRIMARY KEY (`vendor_id`),
  KEY `idx_vendor_name` (`vendor_name`),
  KEY `idx_vendor_category_id` (`vendor_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Vendors manage their products in your store' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bak_vm_vendor`
--

INSERT INTO `bak_vm_vendor` (`vendor_id`, `vendor_name`, `contact_last_name`, `contact_first_name`, `contact_middle_name`, `contact_title`, `contact_phone_1`, `contact_phone_2`, `contact_fax`, `contact_email`, `vendor_phone`, `vendor_address_1`, `vendor_address_2`, `vendor_city`, `vendor_state`, `vendor_country`, `vendor_zip`, `vendor_store_name`, `vendor_store_desc`, `vendor_category_id`, `vendor_thumb_image`, `vendor_full_image`, `vendor_currency`, `cdate`, `mdate`, `vendor_image_path`, `vendor_terms_of_service`, `vendor_url`, `vendor_min_pov`, `vendor_freeshipping`, `vendor_currency_display_style`, `vendor_accepted_currencies`, `vendor_address_format`, `vendor_date_format`) VALUES
(1, 'Washupito''s Tiendita', 'Owner', 'Demo', 'Store', 'Mr.', '555-555-1212', '555-555-1212', '555-555-1212', 'eee@eee.pl', '555-555-1212', '100 Washupito Avenue, N.W.', '', 'Lake Forest', 'CA', 'USA', '92630', 'Washupito''s Tiendita', '<p>We have the best tools for do-it-yourselfers.  Check us out! </p>\r\n		<p>We were established in 1969 in a time when getting good tools was expensive, but the quality was good.  Now that only a select few of those authentic tools survive, we have dedicated this store to bringing the experience alive for collectors and master mechanics everywhere.</p>\r\n		<p>You can easily find products selecting the category you would like to browse above.</p>', 0, '', 'c19970d6f2970cb0d1b13bea3af3144a.gif', 'USD', 950302468, 968309845, 'shop_image/', '<h5>You haven''t configured any terms of service yet. Click <a href=administrator/index2.php?page=store.store_form&option=com_virtuemart>here</a> to change this text.</h5>', 'http://project.gavickpro.serwery.pl/robert/dec2008', '0.00', '0.00', '1|$|2|.| |2|1', 'USD', '{storename}\n{address_1}\n{address_2}\n{city}, {zip}', '%A, %d %B %Y %H:%M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_vendor_category`
--

CREATE TABLE IF NOT EXISTS `bak_vm_vendor_category` (
  `vendor_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_category_name` varchar(64) DEFAULT NULL,
  `vendor_category_desc` text,
  PRIMARY KEY (`vendor_category_id`),
  KEY `idx_vendor_category_category_name` (`vendor_category_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='The categories that vendors are assigned to' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `bak_vm_vendor_category`
--

INSERT INTO `bak_vm_vendor_category` (`vendor_category_id`, `vendor_category_name`, `vendor_category_desc`) VALUES
(6, '-default-', 'Default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_visit`
--

CREATE TABLE IF NOT EXISTS `bak_vm_visit` (
  `visit_id` varchar(255) NOT NULL DEFAULT '',
  `affiliate_id` int(11) NOT NULL DEFAULT '0',
  `pages` int(11) NOT NULL DEFAULT '0',
  `entry_page` varchar(255) NOT NULL DEFAULT '',
  `exit_page` varchar(255) NOT NULL DEFAULT '',
  `sdate` int(11) NOT NULL DEFAULT '0',
  `edate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`visit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Records the visit of an affiliate';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_waiting_list`
--

CREATE TABLE IF NOT EXISTS `bak_vm_waiting_list` (
  `waiting_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `notify_email` varchar(150) NOT NULL DEFAULT '',
  `notified` enum('0','1') DEFAULT '0',
  `notify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`waiting_list_id`),
  KEY `product_id` (`product_id`),
  KEY `notify_email` (`notify_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores notifications, users waiting f. products out of stock' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_vm_zone_shipping`
--

CREATE TABLE IF NOT EXISTS `bak_vm_zone_shipping` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(255) DEFAULT NULL,
  `zone_cost` decimal(10,2) DEFAULT NULL,
  `zone_limit` decimal(10,2) DEFAULT NULL,
  `zone_description` text NOT NULL,
  `zone_tax_rate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='The Zones managed by the Zone Shipping Module' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `bak_vm_zone_shipping`
--

INSERT INTO `bak_vm_zone_shipping` (`zone_id`, `zone_name`, `zone_cost`, `zone_limit`, `zone_description`, `zone_tax_rate`) VALUES
(1, 'Default', '6.00', '35.00', 'This is the default Shipping Zone. This is the zone information that all countries will use until you assign each individual country to a Zone.', 2),
(2, 'Zone 1', '1000.00', '10000.00', 'This is a zone example', 2),
(3, 'Zone 2', '2.00', '22.00', 'This is the second zone. You can use this for notes about this zone', 2),
(4, 'Zone 3', '11.00', '64.00', 'Another usefull thing might be details about this zone or special instructions.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bak_weblinks`
--

CREATE TABLE IF NOT EXISTS `bak_weblinks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `bak_weblinks`
--

INSERT INTO `bak_weblinks` (`id`, `catid`, `sid`, `title`, `alias`, `url`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `archived`, `approved`, `params`) VALUES
(1, 2, 0, 'Joomla!', 'joomla', 'http://www.joomla.org', 'Home of Joomla!', '2005-02-14 15:19:02', 3, 1, 0, '0000-00-00 00:00:00', 1, 0, 1, 'target=0'),
(2, 2, 0, 'php.net', 'php', 'http://www.php.net', 'The language that Joomla! is developed in', '2004-07-07 11:33:24', 6, 1, 0, '0000-00-00 00:00:00', 3, 0, 1, ''),
(3, 2, 0, 'MySQL', 'mysql', 'http://www.mysql.com', 'The database that Joomla! uses', '2004-07-07 10:18:31', 1, 1, 0, '0000-00-00 00:00:00', 5, 0, 1, ''),
(4, 2, 0, 'OpenSourceMatters', 'opensourcematters', 'http://www.opensourcematters.org', 'Home of OSM', '2005-02-14 15:19:02', 11, 1, 0, '0000-00-00 00:00:00', 2, 0, 1, 'target=0'),
(5, 2, 0, 'Joomla! - Forums', 'joomla-forums', 'http://forum.joomla.org', 'Joomla! Forums', '2005-02-14 15:19:02', 5, 1, 0, '0000-00-00 00:00:00', 4, 0, 1, 'target=0'),
(6, 2, 0, 'Ohloh Tracking of Joomla!', 'ohloh-tracking-of-joomla', 'http://www.ohloh.net/projects/20', 'Objective reports from Ohloh about Joomla''s development activity. Joomla! has some star developers with serious kudos.', '2007-07-19 09:28:31', 1, 1, 0, '0000-00-00 00:00:00', 6, 0, 1, 'target=0\n\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_banner`
--

CREATE TABLE IF NOT EXISTS `jos_banner` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT 'banner',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `imageurl` varchar(100) NOT NULL DEFAULT '',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `date` datetime DEFAULT NULL,
  `showBanner` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `jos_banner`
--

INSERT INTO `jos_banner` (`bid`, `cid`, `type`, `name`, `alias`, `imptotal`, `impmade`, `clicks`, `imageurl`, `clickurl`, `date`, `showBanner`, `checked_out`, `checked_out_time`, `editor`, `custombannercode`, `catid`, `description`, `sticky`, `ordering`, `publish_up`, `publish_down`, `tags`, `params`) VALUES
(1, 1, 'banner', 'OSM 1', 'osm-1', 0, 806, 0, 'osmbanner1.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', 1, 0, '0000-00-00 00:00:00', '', '', 13, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 1, 'banner', 'OSM 2', 'osm-2', 0, 49, 0, 'osmbanner2.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', 1, 0, '0000-00-00 00:00:00', '', '', 13, '', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 1, '', 'Joomla!', 'joomla', 0, 897, 0, '', 'http://www.joomla.org', '2006-05-29 14:21:28', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomla! The most popular and widely used Open Source CMS Project in the world.', 14, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(4, 1, '', 'JoomlaCode', 'joomlacode', 0, 897, 0, '', 'http://joomlacode.org', '2006-05-29 14:19:26', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomlaCode, development and distribution made easy.', 14, '', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 1, '', 'Joomla! Extensions', 'joomla-extensions', 0, 892, 0, '', 'http://extensions.joomla.org', '2006-05-29 14:23:21', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomla! Components, Modules, Plugins and Languages by the bucket load.', 14, '', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, 1, '', 'Joomla! Shop', 'joomla-shop', 0, 892, 0, '', 'http://shop.joomla.org', '2006-05-29 14:23:21', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nFor all your Joomla! merchandise.', 14, '', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(7, 1, '', 'Joomla! Promo Shop', 'joomla-promo-shop', 0, 51, 1, 'shop-ad.jpg', 'http://shop.joomla.org', '2007-09-19 17:26:24', 1, 0, '0000-00-00 00:00:00', '', '', 33, '', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(8, 1, '', 'Joomla! Promo Books', 'joomla-promo-books', 0, 47, 0, 'shop-ad-books.jpg', 'http://shop.joomla.org/amazoncom-bookstores.html', '2007-09-19 17:28:01', 1, 0, '0000-00-00 00:00:00', '', '', 33, '', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_bannerclient`
--

CREATE TABLE IF NOT EXISTS `jos_bannerclient` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` time DEFAULT NULL,
  `editor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `jos_bannerclient`
--

INSERT INTO `jos_bannerclient` (`cid`, `name`, `contact`, `email`, `extrainfo`, `checked_out`, `checked_out_time`, `editor`) VALUES
(1, 'Open Source Matters', 'Administrator', 'admin@opensourcematters.org', '', 0, '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_bannertrack`
--

CREATE TABLE IF NOT EXISTS `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_categories`
--

CREATE TABLE IF NOT EXISTS `jos_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `jos_categories`
--

INSERT INTO `jos_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
(1, 0, 'Latest', '', 'latest-news', 'taking_notes.jpg', '1', 'left', 'The latest news from the Joomla! Team', 1, 0, '0000-00-00 00:00:00', '', 1, 0, 1, ''),
(2, 0, 'Joomla! Specific Links', '', 'joomla-specific-links', 'clock.jpg', 'com_weblinks', 'left', 'A selection of links that are all related to the Joomla! Project.', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(3, 0, 'Newsflash', '', 'newsflash', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', '', 2, 0, 0, ''),
(4, 0, 'Joomla!', '', 'joomla', '', 'com_newsfeeds', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(5, 0, 'Free and Open Source Software', '', 'free-and-open-source-software', '', 'com_newsfeeds', 'left', 'Read the latest news about free and open source software from some of its leading advocates.', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(6, 0, 'Related Projects', '', 'related-projects', '', 'com_newsfeeds', 'left', 'Joomla builds on and collaborates with many other free and open source projects. Keep up with the latest news from some of them.', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(12, 0, 'Contacts', '', 'contacts', '', 'com_contact_details', 'left', '<p>Contact Details for this Web site</p>', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(13, 0, 'Joomla', '', 'joomla', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(14, 0, 'Text Ads', '', 'text-ads', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(15, 0, 'Features', '', 'features', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, ''),
(17, 0, 'Benefits', '', 'benefits', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(18, 0, 'Platforms', '', 'platforms', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(19, 0, 'Other Resources', '', 'other-resources', '', 'com_weblinks', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(29, 0, 'The CMS', '', 'the-cms', '', '4', 'left', 'Information about the software behind Joomla!<br />', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(28, 0, 'Current Users', '', 'current-users', '', '3', 'left', 'Questions that users migrating to Joomla! 1.5 are likely to raise<br />', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(25, 0, 'The Project', '', 'the-project', '', '4', 'left', 'General facts about Joomla!<br />', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(27, 0, 'New to Joomla!', '', 'new-to-joomla', '', '3', 'left', 'Questions for new users of Joomla!', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(30, 0, 'The Community', '', 'the-community', '', '4', 'left', 'About the millions of Joomla! users and Web sites<br />', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(31, 0, 'General', '', 'general', '', '3', 'left', 'General questions about the Joomla! CMS', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(32, 0, 'Languages', '', 'languages', '', '3', 'left', 'Questions related to localisation and languages', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(33, 0, 'Joomla! Promo', '', 'joomla-promo', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(34, 0, 'Demo', '', 'demo', '', '5', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_components`
--

CREATE TABLE IF NOT EXISTS `jos_components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) unsigned NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `admin_menu_link` varchar(255) NOT NULL DEFAULT '',
  `admin_menu_alt` varchar(255) NOT NULL DEFAULT '',
  `option` varchar(50) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `admin_menu_img` varchar(255) NOT NULL DEFAULT '',
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Volcado de datos para la tabla `jos_components`
--

INSERT INTO `jos_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
(1, 'Banners', '', 0, 0, '', 'Banner Management', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, 'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n', 1),
(2, 'Banners', '', 0, 1, 'option=com_banners', 'Active Banners', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(3, 'Clients', '', 0, 1, 'option=com_banners&c=client', 'Manage Clients', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(4, 'Web Links', 'option=com_weblinks', 0, 0, '', 'Manage Weblinks', 'com_weblinks', 0, 'js/ThemeOffice/component.png', 0, 'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', 1),
(5, 'Links', '', 0, 4, 'option=com_weblinks', 'View existing weblinks', 'com_weblinks', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(6, 'Categories', '', 0, 4, 'option=com_categories&section=com_weblinks', 'Manage weblink categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(7, 'Contacts', 'option=com_contact', 0, 0, '', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/component.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(8, 'Contacts', '', 0, 7, 'option=com_contact', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, '', 1),
(9, 'Categories', '', 0, 7, 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', 2, 'js/ThemeOffice/categories.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(10, 'Polls', 'option=com_poll', 0, 0, 'option=com_poll', 'Manage Polls', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(11, 'News Feeds', 'option=com_newsfeeds', 0, 0, '', 'News Feeds Management', 'com_newsfeeds', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(12, 'Feeds', '', 0, 11, 'option=com_newsfeeds', 'Manage News Feeds', 'com_newsfeeds', 1, 'js/ThemeOffice/edit.png', 0, 'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 1),
(13, 'Categories', '', 0, 11, 'option=com_categories&section=com_newsfeeds', 'Manage Categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(14, 'User', 'option=com_user', 0, 0, '', '', 'com_user', 0, '', 1, '', 1),
(15, 'Search', 'option=com_search', 0, 0, 'option=com_search', 'Search Statistics', 'com_search', 0, 'js/ThemeOffice/component.png', 1, 'enabled=0\n\n', 1),
(16, 'Categories', '', 0, 1, 'option=com_categories&section=com_banner', 'Categories', '', 3, '', 1, '', 1),
(17, 'Wrapper', 'option=com_wrapper', 0, 0, '', 'Wrapper', 'com_wrapper', 0, '', 1, '', 1),
(18, 'Mail To', '', 0, 0, '', '', 'com_mailto', 0, '', 1, '', 1),
(19, 'Media Manager', '', 0, 0, 'option=com_media', 'Media Manager', 'com_media', 0, '', 1, 'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\nallowed_media_usergroup=3\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n', 1),
(20, 'Articles', 'option=com_content', 0, 0, '', '', 'com_content', 0, '', 1, 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\n\n', 1),
(21, 'Configuration Manager', '', 0, 0, '', 'Configuration', 'com_config', 0, '', 1, '', 1),
(22, 'Installation Manager', '', 0, 0, '', 'Installer', 'com_installer', 0, '', 1, '', 1),
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, 'site=es-ES\nadministrator=es-ES\n\n', 1),
(24, 'Mass mail', '', 0, 0, '', 'Mass Mail', 'com_massmail', 0, '', 1, 'mailSubjectPrefix=\nmailBodySuffix=\n\n', 1),
(25, 'Menu Editor', '', 0, 0, '', 'Menu Editor', 'com_menus', 0, '', 1, '', 1),
(27, 'Messaging', '', 0, 0, '', 'Messages', 'com_messages', 0, '', 1, '', 1),
(28, 'Modules Manager', '', 0, 0, '', 'Modules', 'com_modules', 0, '', 1, '', 1),
(29, 'Plugin Manager', '', 0, 0, '', 'Plugins', 'com_plugins', 0, '', 1, '', 1),
(30, 'Template Manager', '', 0, 0, '', 'Templates', 'com_templates', 0, '', 1, '', 1),
(31, 'User Manager', '', 0, 0, '', 'Users', 'com_users', 0, '', 1, 'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n', 1),
(32, 'Cache Manager', '', 0, 0, '', 'Cache', 'com_cache', 0, '', 1, '', 1),
(33, 'Control Panel', '', 0, 0, '', 'Control Panel', 'com_cpanel', 0, '', 1, '', 1),
(66, 'Gavick Tabs Manager GK3', 'option=com_gk3_tabs_manager', 0, 0, 'option=com_gk3_tabs_manager', 'Gavick Tabs Manager GK3', 'com_gk3_tabs_manager', 0, 'components/com_gk3_tabs_manager/interface/images/com_logo_gk3.png', 0, '', 1),
(65, 'K2', 'option=com_k2', 0, 0, 'option=com_k2', 'K2', 'com_k2', 0, 'components/com_k2/images/system/k2-icon.png', 0, 'enable_css=1\nimagesQuality=100\nitemImageXS=100\nitemImageS=150\nitemImageM=290\nitemImageL=350\nitemImageXL=550\nitemImageGeneric=100\ncatImageWidth=100\ncatImageDefault=1\nuserImageWidth=100\nuserImageDefault=1\ncommenterImgWidth=48\nuserName=1\nuserImage=1\nuserDescription=1\nuserURL=1\nuserEmail=1\nuserFeed=1\nuserItemCount=10\nuserItemTitle=1\nuserItemTitleLinked=1\nuserItemDateCreated=1\nuserItemImage=1\nuserItemIntroText=1\nuserItemCategory=1\nuserItemTags=1\nuserItemCommentsAnchor=1\nuserItemReadMore=1\nuserItemK2Plugins=1\ngenericItemCount=10\ngenericItemTitle=1\ngenericItemTitleLinked=1\ngenericItemDateCreated=1\ngenericItemImage=1\ngenericItemIntroText=1\ngenericItemCategory=1\ngenericItemReadMore=1\ngenericItemExtraFields=0\ncomments=1\ncommentsOrdering=DESC\ncommentsLimit=10\ncommentsFormPosition=below\ncommentsPublishing=1\ngravatar=1\nrecaptcha=0\nrecaptcha_public_key=\nrecaptcha_private_key=\nsocialButtonCode=\ntwitterUsername=\ntinyURL=1\nfeedLimit=10\nfeedItemImage=1\nfeedImgSize=S\nfeedItemIntroText=1\nfeedTextWordLimit=\nfeedItemFullText=1\nintroTextCleanup=0\nintroTextCleanupExcludeTags=\nintroTextCleanupTagAttr=\nfullTextCleanup=0\nfullTextCleanupExcludeTags=\nfullTextCleanupTagAttr=\nlinkPopupWidth=900\nlinkPopupHeight=600\nfrontendEditing=1\nshowImageTab=1\nshowImageGalleryTab=1\nshowVideoTab=1\nshowExtraFieldsTab=1\nshowAttachmentsTab=1\nshowK2Plugins=1\nmergeEditors=1\nsideBarDisplay=1\nSEFReplacements=Å \\|S, Å’\\|O, Å½\\|Z, Å¡\\|s, Å“\\|oe, Å¾\\|z, Å¸\\|Y, Â¥\\|Y, Âµ\\|u, Ã€\\|A, Ã�\\|A, Ã‚\\|A, Ãƒ\\|A, Ã„\\|A, Ã…\\|A, Ã†\\|A, Ã‡\\|C, Ãˆ\\|E, Ã‰\\|E, ÃŠ\\|E, Ã‹\\|E, ÃŒ\\|I, Ã�\\|I, ÃŽ\\|I, Ã�\\|I, Ã�\\|D, Ã‘\\|N, Ã’\\|O, Ã“\\|O, Ã”\\|O, Ã•\\|O, Ã–\\|O, Ã˜\\|O, Ã™\\|U, Ãš\\|U, Ã›\\|U, Ãœ\\|U, Ã�\\|Y, ÃŸ\\|s, Ã \\|a, Ã¡\\|a, Ã¢\\|a, Ã£\\|a, Ã¤\\|a, Ã¥\\|a, Ã¦\\|a, Ã§\\|c, Ã¨\\|e, Ã©\\|e, Ãª\\|e, Ã«\\|e, Ã¬\\|i, Ã­\\|i, Ã®\\|i, Ã¯\\|i, Ã°\\|o, Ã±\\|n, Ã²\\|o, Ã³\\|o, Ã´\\|o, Ãµ\\|o, Ã¶\\|o, Ã¸\\|o, Ã¹\\|u, Ãº\\|u, Ã»\\|u, Ã¼\\|u, Ã½\\|y, Ã¿\\|y, ÃŸ\\|ss\nattachmentsFolder=\nhideImportButton=0\ntaggingSystem=1\ngoogleSearch=0\ngoogleSearchContainer=k2Container\nK2UserProfile=1\nK2UserGroup=1\nredirect=\nadminSearch=simple\nshowItemsCounterAdmin=1\nshowChildCatItems=1\ndisableCompactOrdering=0\nsh404SefLabelCat=\nsh404SefLabelUser=blog\n\n', 1),
(80, 'Import', '', 0, 74, 'option=com_jcomments&task=import', 'Import', 'com_jcomments', 5, 'components/com_jcomments/assets/import16x16.png', 0, '', 1),
(81, 'About', '', 0, 74, 'option=com_jcomments&task=about', 'About', 'com_jcomments', 6, 'components/com_jcomments/assets/jcomments16x16.png', 0, '', 1),
(79, 'Custom BBCode', '', 0, 74, 'option=com_jcomments&task=custombbcodes', 'Custom BBCode', 'com_jcomments', 4, 'components/com_jcomments/assets/custombbcodes16x16.png', 0, '', 1),
(78, 'Subscriptions', '', 0, 74, 'option=com_jcomments&task=subscriptions', 'Subscriptions', 'com_jcomments', 3, 'components/com_jcomments/assets/subscriptions16x16.png', 0, '', 1),
(74, 'JComments', 'option=com_jcomments', 0, 0, 'option=com_jcomments', 'JComments', 'com_jcomments', 0, 'components/com_jcomments/assets/jcomments16x16.png', 0, 'object_group=com_jcomments\nobject_id=1\n', 1),
(75, 'Manage comments', '', 0, 74, 'option=com_jcomments&task=comments', 'Manage comments', 'com_jcomments', 0, 'components/com_jcomments/assets/comments16x16.png', 0, '', 1),
(76, 'Settings', '', 0, 74, 'option=com_jcomments&task=settings', 'Settings', 'com_jcomments', 1, 'components/com_jcomments/assets/settings16x16.png', 0, '', 1),
(77, 'Smiles', '', 0, 74, 'option=com_jcomments&task=smiles', 'Smiles', 'com_jcomments', 2, 'components/com_jcomments/assets/smiles16x16.png', 0, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_contact_details`
--

CREATE TABLE IF NOT EXISTS `jos_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `imagepos` varchar(20) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `jos_contact_details`
--

INSERT INTO `jos_contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`) VALUES
(1, 'Name', 'name', 'Position', 'Street', 'Suburb', 'State', 'Country', 'Zip Code', 'Telephone', 'Fax', 'Miscellanous info', 'powered_by.png', 'top', 'email@email.com', 1, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=1\r\nshow_position=1\r\nshow_email=0\r\nshow_street_address=1\r\nshow_suburb=1\r\nshow_state=1\r\nshow_postcode=1\r\nshow_country=1\r\nshow_telephone=1\r\nshow_mobile=1\r\nshow_fax=1\r\nshow_webpage=1\r\nshow_misc=1\r\nshow_image=1\r\nallow_vcard=0\r\ncontact_icons=0\r\nicon_address=\r\nicon_email=\r\nicon_telephone=\r\nicon_fax=\r\nicon_misc=\r\nshow_email_form=1\r\nemail_description=1\r\nshow_email_copy=1\r\nbanned_email=\r\nbanned_subject=\r\nbanned_text=', 0, 12, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_content`
--

CREATE TABLE IF NOT EXISTS `jos_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `title_alias` varchar(255) NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `sectionid` int(11) unsigned NOT NULL DEFAULT '0',
  `mask` int(11) unsigned NOT NULL DEFAULT '0',
  `catid` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `parentid` int(11) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Volcado de datos para la tabla `jos_content`
--

INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(1, 'Welcome to Joomla!', 'welcome-to-joomla', '', '<div><strong>Joomla! is a free open source framework and content publishing system designed for quickly creating highly interactive multi-language Web sites, online communities, media portals, blogs and eCommerce applications. <br /></strong></div>\r\n<p><strong><br /></strong><img class="caption" src="images/stories/powered_by.png" border="0" alt="Joomla! Logo" title="Example Caption" hspace="6" vspace="0" width="165" height="68" align="left" />Joomla! provides an easy-to-use graphical user interface that simplifies the management and publishing of large volumes of content including HTML, documents, and rich media.  Joomla! is used by organisations of all sizes for intranets and extranets and is supported by a community of tens of thousands of users.</p>\r\n', '\r\n<p>With a fully documented library of developer resources, Joomla! allows the customisation of every aspect of a Web site including presentation, layout, administration, and the rapid integration with third-party applications.</p>\r\n<p>Joomla! now provides more developer power while making the user experience all the more friendly. For those who always wanted increased extensibility, Joomla! 1.5 can make this happen.</p>\r\n<p>A new framework, ground-up refactoring, and a highly-active development team brings the excitement of ''the next generation CMS'' to your fingertips.  Whether you are a systems architect or a complete ''noob'' Joomla! can take you to the next level of content delivery. ''More than a CMS'' is something we have been playing with as a catchcry because the new Joomla! API has such incredible power and flexibility, you are free to take whatever direction your creative mind takes you and Joomla! can help you get there so much more easily than ever before.</p>\r\n<p>Thinking Web publishing? Think Joomla!</p>', -2, 1, 0, 1, '2008-08-12 10:00:00', 62, '', '2009-07-31 13:30:39', 62, 0, '0000-00-00 00:00:00', '2006-01-03 01:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 30, 0, 0, '', '', 0, 109, 'robots=\nauthor='),
(2, 'Newsflash 1', 'newsflash-1', '', '<p>Joomla! makes it easy to launch a Web site of any kind. Whether you want a brochure site or you are building a large online community, Joomla! allows you to deploy a new site in minutes and add extra functionality as you need it. The hundreds of available Extensions will help to expand your site and allow you to deliver new services that extend your reach into the Internet.</p>', '', -2, 1, 0, 3, '2008-08-10 06:30:34', 62, '', '2008-08-10 06:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 1, 'robots=\nauthor='),
(3, 'Newsflash 2', 'newsflash-2', '', '<p>The one thing about a Web site, it always changes! Joomla! makes it easy to add Articles, content, images, videos, and more. Site administrators can edit and manage content ''in-context'' by clicking the ''Edit'' link. Webmasters can also edit content through a graphical Control Panel that gives you complete control over your site.</p>', '', -2, 1, 0, 3, '2008-08-09 22:30:34', 62, '', '2008-08-09 22:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 0, '', '', 0, 0, 'robots=\nauthor='),
(4, 'Newsflash 3', 'newsflash-3', '', '<p>With a library of thousands of free <a href="http://extensions.joomla.org" target="_blank" title="The Joomla! Extensions Directory">Extensions</a>, you can add what you need as your site grows. Don''t wait, look through the <a href="http://extensions.joomla.org/" target="_blank" title="Joomla! Extensions">Joomla! Extensions</a>  library today. </p>', '', -2, 1, 0, 3, '2008-08-10 06:30:34', 62, '', '2008-08-10 06:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 1, 'robots=\nauthor='),
(5, 'Joomla! License Guidelines', 'joomla-license-guidelines', 'joomla-license-guidelines', '<p>This Web site is powered by <a href="http://joomla.org/" target="_blank" title="Joomla!">Joomla!</a> The software and default templates on which it runs are Copyright 2005-2008 <a href="http://www.opensourcematters.org/" target="_blank" title="Open Source Matters">Open Source Matters</a>. The sample content distributed with Joomla! is licensed under the <a href="http://docs.joomla.org/JEDL" target="_blank" title="Joomla! Electronic Document License">Joomla! Electronic Documentation License.</a> All data entered into this Web site and templates added after installation, are copyrighted by their respective copyright owners.</p> <p>If you want to distribute, copy, or modify Joomla!, you are welcome to do so under the terms of the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1" target="_blank" title="GNU General Public License"> GNU General Public License</a>. If you are unfamiliar with this license, you might want to read <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC4" target="_blank" title="How To Apply These Terms To Your Program">''How To Apply These Terms To Your Program''</a> and the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0-faq.html" target="_blank" title="GNU General Public License FAQ">''GNU General Public License FAQ''</a>.</p> <p>The Joomla! licence has always been GPL.</p>', '', -2, 4, 0, 25, '2008-08-20 10:11:07', 62, '', '2008-08-20 10:11:07', 62, 0, '0000-00-00 00:00:00', '2004-08-19 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 129, 'robots=\nauthor='),
(6, 'We are Volunteers', 'we-are-volunteers', '', '<p>The Joomla Core Team and Working Group members are volunteer developers, designers, administrators and managers who have worked together to take Joomla! to new heights in its relatively short life. Joomla! has some wonderfully talented people taking Open Source concepts to the forefront of industry standards.  Joomla! 1.5 is a major leap forward and represents the most exciting Joomla! release in the history of the project. </p>', '', -2, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 0, '', '', 0, 54, 'robots=\nauthor='),
(9, 'Millions of Smiles', 'millions-of-smiles', '', '<p>The Joomla! team has millions of good reasons to be smiling about the Joomla! 1.5. In its current incarnation, it''s had millions of downloads, taking it to an unprecedented level of popularity.  The new code base is almost an entire re-factor of the old code base.  The user experience is still extremely slick but for developers the API is a dream.  A proper framework for real PHP architects seeking the best of the best.</p><p>If you''re a former Mambo User or a 1.0 series Joomla! User, 1.5 is the future of CMSs for a number of reasons.  It''s more powerful, more flexible, more secure, and intuitive.  Our developers and interface designers have worked countless hours to make this the most exciting release in the content management system sphere.</p><p>Go on ... get your FREE copy of Joomla! today and spread the word about this benchmark project. </p>', '', -2, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 0, '', '', 0, 23, 'robots=\nauthor='),
(10, 'How do I localise Joomla! to my language?', 'how-do-i-localise-joomla-to-my-language', '', '<h4>General<br /></h4><p>In Joomla! 1.5 all User interfaces can be localised. This includes the installation, the Back-end Control Panel and the Front-end Site.</p><p>The core release of Joomla! 1.5 is shipped with multiple language choices in the installation but, other than English (the default), languages for the Site and Administration interfaces need to be added after installation. Links to such language packs exist below.</p>', '<p>Translation Teams for Joomla! 1.5 may have also released fully localised installation packages where site, administrator and sample data are in the local language. These localised releases can be found in the specific team projects on the <a href="http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/" target="_blank" title="JED">Joomla! Extensions Directory</a>.</p><h4>How do I install language packs?</h4><ul><li>First download both the admin and the site language packs that you require.</li><li>Install each pack separately using the Extensions-&gt;Install/Uninstall Menu selection and then the package file upload facility.</li><li>Go to the Language Manager and be sure to select Site or Admin in the sub-menu. Then select the appropriate language and make it the default one using the Toolbar button.</li></ul><h4>How do I select languages?</h4><ul><li>Default languages can be independently set for Site and for Administrator</li><li>In addition, users can define their preferred language for each Site and Administrator. This takes affect after logging in.</li><li>While logging in to the Administrator Back-end, a language can also be selected for the particular session.</li></ul><h4>Where can I find Language Packs and Localised Releases?</h4><p><em>Please note that Joomla! 1.5 is new and language packs for this version may have not been released at this time.</em> </p><ul><li><a href="http://joomlacode.org/gf/project/jtranslation/" target="_blank" title="Accredited Translations">The Joomla! Accredited Translations Project</a>  - This is a joint repository for language packs that were developed by teams that are members of the Joomla! Translations Working Group.</li><li><a href="http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/" target="_blank" title="Translations">The Joomla! Extensions Site - Translations</a>  </li><li><a href="http://community.joomla.org/translations.html" target="_blank" title="Translation Work Group Teams">List of Translation Teams and Translation Partner Sites for Joomla! 1.5</a> </li></ul>', -2, 3, 0, 32, '2008-07-30 14:06:37', 62, '', '2008-07-30 14:06:37', 62, 0, '0000-00-00 00:00:00', '2006-09-29 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 0, '', '', 0, 10, 'robots=\nauthor='),
(11, 'How do I upgrade to Joomla! 1.5 ?', 'how-do-i-upgrade-to-joomla-15', '', '<p>Joomla! 1.5 does not provide an upgrade path from earlier versions. Converting an older site to a Joomla! 1.5 site requires creation of a new empty site using Joomla! 1.5 and then populating the new site with the content from the old site. This migration of content is not a one-to-one process and involves conversions and modifications to the content dump.</p> <p>There are two ways to perform the migration:</p>', ' <div id="post_content-107"><li>An automated method of migration has been provided which uses a migrator Component to create the migration dump out of the old site (Mambo 4.5.x up to Joomla! 1.0.x) and a smart import facility in the Joomla! 1.5 Installation that performs required conversions and modifications during the installation process.</li> <li>Migration can be performed manually. This involves exporting the required tables, manually performing required conversions and modifications and then importing the content to the new site after it is installed.</li>  <p><!--more--></p> <h2><strong> Automated migration</strong></h2>  <p>This is a two phased process using two tools. The first tool is a migration Component named <font face="courier new,courier">com_migrator</font>. This Component has been contributed by Harald Baer and is based on his <strong>eBackup </strong>Component. The migrator needs to be installed on the old site and when activated it prepares the required export dump of the old site''s data. The second tool is built into the Joomla! 1.5 installation process. The exported content dump is loaded to the new site and all conversions and modification are performed on-the-fly.</p> <h3><u> Step 1 - Using com_migrator to export data from old site:</u></h3> <li>Install the <font face="courier new,courier">com_migrator</font> Component on the <u><strong>old</strong></u> site. It can be found at the <a href="http://joomlacode.org/gf/project/pasamioprojects/frs/" target="_blank" title="JoomlaCode">JoomlaCode developers forge</a>.</li> <li>Select the Component in the Component Menu of the Control Panel.</li> <li>Click on the <strong>Dump it</strong> icon. Three exported <em>gzipped </em>export scripts will be created. The first is a complete backup of the old site. The second is the migration content of all core elements which will be imported to the new site. The third is a backup of all 3PD Component tables.</li> <li>Click on the download icon of the particular exports files needed and store locally.</li> <li>Multiple export sets can be created.</li> <li>The exported data is not modified in anyway and the original encoding is preserved. This makes the <font face="courier new,courier">com_migrator</font> tool a recommended tool to use for manual migration as well.</li> <h3><u> Step 2 - Using the migration facility to import and convert data during Joomla! 1.5 installation:</u></h3><p>Note: This function requires the use of the <em><font face="courier new,courier">iconv </font></em>function in PHP to convert encodings. If <em><font face="courier new,courier">iconv </font></em>is not found a warning will be provided.</p> <li>In step 6 - Configuration select the ''Load Migration Script'' option in the ''Load Sample Data, Restore or Migrate Backed Up Content'' section of the page.</li> <li>Enter the table prefix used in the content dump. For example: ''#__'' or ''site2_'' are acceptable values.</li> <li>Select the encoding of the dumped content in the dropdown list. This should be the encoding used on the pages of the old site. (As defined in the _ISO variable in the language file or as seen in the browser page info/encoding/source)</li> <li>Browse the local host and select the migration export and click on <strong>Upload and Execute</strong></li> <li>A success message should appear or alternately a listing of database errors</li> <li>Complete the other required fields in the Configuration step such as Site Name and Admin details and advance to the final step of installation. (Admin details will be ignored as the imported data will take priority. Please remember admin name and password from the old site)</li> <p><u><br /></u></p></div>', -2, 3, 0, 28, '2008-07-30 20:27:52', 62, '', '2008-07-30 20:27:52', 62, 0, '0000-00-00 00:00:00', '2006-09-29 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 0, '', '', 0, 14, 'robots=\nauthor='),
(12, 'Why does Joomla! 1.5 use UTF-8 encoding?', 'why-does-joomla-15-use-utf-8-encoding', '', '<p>Well... how about never needing to mess with encoding settings again?</p><p>Ever needed to display several languages on one page or site and something always came up in Giberish?</p><p>With utf-8 (a variant of Unicode) glyphs (character forms) of basically all languages can be displayed with one single encoding setting. </p>', '', -2, 3, 0, 31, '2008-08-05 01:11:29', 62, '', '2008-08-05 01:11:29', 62, 0, '0000-00-00 00:00:00', '2006-10-03 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 0, '', '', 0, 29, 'robots=\nauthor='),
(13, 'What happened to the locale setting?', 'what-happened-to-the-locale-setting', '', 'This is now defined in the Language [<em>lang</em>].xml file in the Language metadata settings. If you are having locale problems such as dates do not appear in your language for example, you might want to check/edit the entries in the locale tag. Note that multiple locale strings can be set and the host will usually accept the first one recognised.', '', -2, 3, 0, 28, '2008-08-06 16:47:35', 62, '', '2008-08-06 16:47:35', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 11, 'robots=\nauthor='),
(14, 'What is the FTP layer for?', 'what-is-the-ftp-layer-for', '', '<p>The FTP Layer allows file operations (such as installing Extensions or updating the main configuration file) without having to make all the folders and files writable. This has been an issue on Linux and other Unix based platforms in respect of file permissions. This makes the site admin''s life a lot easier and increases security of the site.</p><p>You can check the write status of relevent folders by going to ''''Help-&gt;System Info" and then in the sub-menu to "Directory Permissions". With the FTP Layer enabled even if all directories are red, Joomla! will operate smoothly.</p><p>NOTE: the FTP layer is not required on a Windows host/server. </p>', '', -2, 3, 0, 31, '2008-08-06 21:27:49', 62, '', '2008-08-06 21:27:49', 62, 0, '0000-00-00 00:00:00', '2006-10-05 16:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', 6, 0, 0, '', '', 0, 23, 'robots=\nauthor='),
(15, 'Can Joomla! 1.5 operate with PHP Safe Mode On?', 'can-joomla-15-operate-with-php-safe-mode-on', '', '<p>Yes it can! This is a significant security improvement.</p><p>The <em>safe mode</em> limits PHP to be able to perform actions only on files/folders who''s owner is the same as PHP is currently using (this is usually ''apache''). As files normally are created either by the Joomla! application or by FTP access, the combination of PHP file actions and the FTP Layer allows Joomla! to operate in PHP Safe Mode.</p>', '', -2, 3, 0, 31, '2008-08-06 19:28:35', 62, '', '2008-08-06 19:28:35', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 8, 'robots=\nauthor='),
(16, 'Only one edit window! How do I create "Read more..."?', 'only-one-edit-window-how-do-i-create-read-more', '', '<p>This is now implemented by inserting a <strong>Read more...</strong> tag (the button is located below the editor area) a dotted line appears in the edited text showing the split location for the <em>Read more....</em> A new Plugin takes care of the rest.</p><p>It is worth mentioning that this does not have a negative effect on migrated data from older sites. The new implementation is fully backward compatible.</p>', '', -2, 3, 0, 28, '2008-08-06 19:29:28', 62, '', '2008-08-06 19:29:28', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 20, 'robots=\nauthor='),
(17, 'My MySQL database does not support UTF-8. Do I have a problem?', 'my-mysql-database-does-not-support-utf-8-do-i-have-a-problem', '', 'No you don''t. Versions of MySQL lower than 4.1 do not have built in UTF-8 support. However, Joomla! 1.5 has made provisions for backward compatibility and is able to use UTF-8 on older databases. Let the installer take care of all the settings and there is no need to make any changes to the database (charset, collation, or any other).', '', -2, 3, 0, 31, '2008-08-07 09:30:37', 62, '', '2008-08-07 09:30:37', 62, 0, '0000-00-00 00:00:00', '2006-10-05 20:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 0, '', '', 0, 10, 'robots=\nauthor='),
(18, 'Joomla! Features', 'joomla-features', '', '<h4><font color="#ff6600">Joomla! features:</font></h4> <ul><li>Completely database driven site engines </li><li>News, products, or services sections fully editable and manageable</li><li>Topics sections can be added to by contributing Authors </li><li>Fully customisable layouts including <em>left</em>, <em>center</em>, and <em>right </em>Menu boxes </li><li>Browser upload of images to your own library for use anywhere in the site </li><li>Dynamic Forum/Poll/Voting booth for on-the-spot results </li><li>Runs on Linux, FreeBSD, MacOSX server, Solaris, and AIX', '  </li></ul> <h4>Extensive Administration:</h4> <ul><li>Change order of objects including news, FAQs, Articles etc. </li><li>Random Newsflash generator </li><li>Remote Author submission Module for News, Articles, FAQs, and Links </li><li>Object hierarchy - as many Sections, departments, divisions, and pages as you want </li><li>Image library - store all your PNGs, PDFs, DOCs, XLSs, GIFs, and JPEGs online for easy use </li><li>Automatic Path-Finder. Place a picture and let Joomla! fix the link </li><li>News Feed Manager. Easily integrate news feeds into your Web site.</li><li>E-mail a friend and Print format available for every story and Article </li><li>In-line Text editor similar to any basic word processor software </li><li>User editable look and feel </li><li>Polls/Surveys - Now put a different one on each page </li><li>Custom Page Modules. Download custom page Modules to spice up your site </li><li>Template Manager. Download Templates and implement them in seconds </li><li>Layout preview. See how it looks before going live </li><li>Banner Manager. Make money out of your site.</li></ul>', -2, 4, 0, 29, '2008-08-08 23:32:45', 62, '', '2008-08-08 23:32:45', 62, 0, '0000-00-00 00:00:00', '2006-10-07 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 0, '', '', 0, 59, 'robots=\nauthor='),
(19, 'Joomla! Overview', 'joomla-overview', '', '<p>If you''re new to Web publishing systems, you''ll find that Joomla! delivers sophisticated solutions to your online needs. It can deliver a robust enterprise-level Web site, empowered by endless extensibility for your bespoke publishing needs. Moreover, it is often the system of choice for small business or home users who want a professional looking site that''s simple to deploy and use. <em>We do content right</em>.<br /> </p><p>So what''s the catch? How much does this system cost?</p><p> Well, there''s good news ... and more good news! Joomla! 1.5 is free, it is released under an Open Source license - the GNU/General Public License v 2.0. Had you invested in a mainstream, commercial alternative, there''d be nothing but moths left in your wallet and to add new functionality would probably mean taking out a second mortgage each time you wanted something adding!</p><p>Joomla! changes all that ... <br />Joomla! is different from the normal models for content management software. For a start, it''s not complicated. Joomla! has been developed for everybody, and anybody can develop it further. It is designed to work (primarily) with other Open Source, free, software such as PHP, MySQL, and Apache. </p><p>It is easy to install and administer, and is reliable. </p><p>Joomla! doesn''t even require the user or administrator of the system to know HTML to operate it once it''s up and running.</p><p>To get the perfect Web site with all the functionality that you require for your particular application may take additional time and effort, but with the Joomla! Community support that is available and the many Third Party Developers actively creating and releasing new Extensions for the 1.5 platform on an almost daily basis, there is likely to be something out there to meet your needs. Or you could develop your own Extensions and make these available to the rest of the community. </p>', '', -2, 4, 0, 29, '2008-08-09 07:49:20', 62, '', '2008-08-09 07:49:20', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 0, '', '', 0, 188, 'robots=\nauthor='),
(20, 'Support and Documentation', 'support-and-documentation', '', '<h1>Support </h1><p>Support for the Joomla! CMS can be found on several places. The best place to start would be the <a href="http://docs.joomla.org/" target="_blank" title="Joomla! Official Documentation Wiki">Joomla! Official Documentation Wiki</a>. Here you can help yourself to the information that is regularly published and updated as Joomla! develops. There is much more to come too!</p> <p>Of course you should not forget the Help System of the CMS itself. On the <em>topmenu </em>in the Back-end Control panel you find the Help button which will provide you with lots of explanation on features.</p> <p>Another great place would of course be the <a href="http://forum.joomla.org/" target="_blank" title="Forum">Forum</a> . On the Joomla! Forum you can find help and support from Community members as well as from Joomla! Core members and Working Group members. The forum contains a lot of information, FAQ''s, just about anything you are looking for in terms of support.</p> <p>Two other resources for Support are the <a href="http://developer.joomla.org/" target="_blank" title="Joomla! Developer Site">Joomla! Developer Site</a> and the <a href="http://extensions.joomla.org/" target="_blank" title="Joomla! Extensions Directory">Joomla! Extensions Directory</a> (JED). The Joomla! Developer Site provides lots of technical information for the experienced Developer as well as those new to Joomla! and development work in general. The JED whilst not a support site in the strictest sense has many of the Extensions that you will need as you develop your own Web site.</p> <p>The Joomla! Developers and Bug Squad members are regularly posting their blog reports about several topics such as programming techniques and security issues.</p> <h1>Documentation</h1> <p>Joomla! Documentation can of course be found on the <a href="http://docs.joomla.org/" target="_blank" title="Joomla! Official Documentation Wiki">Joomla! Official Documentation Wiki</a>. You can find information for beginners, installation, upgrade, Frequently Asked Questions, developer topics, and a lot more. The Documentation Team helps oversee the wiki but you are invited to contribute content, as well.</p> <p>There are also books written about Joomla! You can find a listing of these books in the <a href="http://shop.joomla.org/" target="_blank" title="Joomla! Shop">Joomla! Shop</a>.</p>', '', -2, 4, 0, 25, '2008-08-09 08:33:57', 62, '', '2008-08-09 08:33:57', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 0, '', '', 0, 6, 'robots=\nauthor='),
(21, 'Joomla! Facts', 'joomla-facts', '', '<p>Here are some interesting facts about Joomla!</p><ul><li><span>Over 210,000 active registered Users on the <a href="http://forum.joomla.org" target="_blank" title="Joomla Forums">Official Joomla! community forum</a> and more on the many international community sites.</span><ul><li><span>over 1,000,000 posts in over 200,000 topics</span></li><li>over 1,200 posts per day</li><li>growing at 150 new participants each day!</li></ul></li><li><span>1168 Projects on the JoomlaCode (<a href="http://joomlacode.org/" target="_blank" title="JoomlaCode">joomlacode.org</a> ). All for open source addons by third party developers.</span><ul><li><span>Well over 6,000,000 downloads of Joomla! since the migration to JoomlaCode in March 2007.<br /></span></li></ul></li><li><span>Nearly 4,000 extensions for Joomla! have been registered on the <a href="http://extensions.joomla.org" target="_blank" title="http://extensions.joomla.org">Joomla! Extension Directory</a>  </span></li><li><span>Joomla.org exceeds 2 TB of traffic per month!</span></li></ul>', '', -2, 4, 0, 30, '2008-08-09 16:46:37', 62, '', '2008-08-09 16:46:37', 62, 0, '0000-00-00 00:00:00', '2006-10-07 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 0, '', '', 0, 491, 'robots=\nauthor='),
(22, 'What''s New in 1.5?', 'whats-new-in-15', '', '<p>As with previous releases, Joomla! provides a unified and easy-to-use framework for delivering content for Web sites of all kinds. To support the changing nature of the Internet and emerging Web technologies, Joomla! required substantial restructuring of its core functionality and we also used this effort to simplify many challenges within the current user interface. Joomla! 1.5 has many new features.</p>', '<p style="margin-bottom: 0in">In Joomla! 1.5, you''ll notice: </p>    <ul><li>     <p style="margin-bottom: 0in">       Substantially improved usability, manageability, and scalability far beyond the original Mambo foundations</p>   </li><li>     <p style="margin-bottom: 0in"> Expanded accessibility to support internationalisation, double-byte characters and right-to-left support for Arabic, Farsi, and Hebrew languages among others</p>   </li><li>     <p style="margin-bottom: 0in"> Extended integration of external applications through Web services and remote authentication such as the Lightweight Directory Access Protocol (LDAP)</p>   </li><li>     <p style="margin-bottom: 0in"> Enhanced content delivery, template and presentation capabilities to support accessibility standards and content delivery to any destination</p>   </li><li>     <p style="margin-bottom: 0in">       A more sustainable and flexible framework for Component and Extension developers</p>   </li><li>     <p style="margin-bottom: 0in">Backward compatibility with previous releases of Components, Templates, Modules, and other Extensions</p></li></ul>', -2, 4, 0, 29, '2008-08-11 22:13:58', 62, '', '2008-08-11 22:13:58', 62, 0, '0000-00-00 00:00:00', '2006-10-10 18:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 0, '', '', 0, 214, 'robots=\nauthor='),
(23, 'Platforms and Open Standards', 'platforms-and-open-standards', '', '<p class="MsoNormal">Joomla! runs on any platform including Windows, most flavours of Linux, several Unix versions, and the Apple OS/X platform.  Joomla! depends on PHP and the MySQL database to deliver dynamic content.  </p>            <p class="MsoNormal">The minimum requirements are:</p>      <ul><li>Apache 1.x, 2.x and higher</li><li>PHP 4.3 and higher</li><li>MySQL 3.23 and higher</li></ul>It will also run on alternative server platforms such as Windows IIS - provided they support PHP and MySQL - but these require additional configuration in order for the Joomla! core package to be successful installed and operated.', '', -2, 4, 0, 25, '2008-08-11 04:22:14', 62, '', '2008-08-11 04:22:14', 62, 0, '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 11, 'robots=\nauthor='),
(24, 'Content Layouts', 'content-layouts', '', '<p>Joomla! provides plenty of flexibility when displaying your Web content. Whether you are using Joomla! for a blog site, news or a Web site for a company, you''ll find one or more content styles to showcase your information. You can also change the style of content dynamically depending on your preferences. Joomla! calls how a page is laid out a <strong>layout</strong>. Use the guide below to understand which layouts are available and how you might use them. </p> <h2>Content </h2> <p>Joomla! makes it extremely easy to add and display content. All content  is placed where your mainbody tag in your template is located. There are three main types of layouts available in Joomla! and all of them can be customised via parameters. The display and parameters are set in the Menu Item used to display the content your working on. You create these layouts by creating a Menu Item and choosing how you want the content to display.</p> <h3>Blog Layout<br /> </h3> <p>Blog layout will show a listing of all Articles of the selected blog type (Section or Category) in the mainbody position of your template. It will give you the standard title, and Intro of each Article in that particular Category and/or Section. You can customise this layout via the use of the Preferences and Parameters, (See Article Parameters) this is done from the Menu not the Section Manager!</p> <h3>Blog Archive Layout<br /> </h3> <p>A Blog Archive layout will give you a similar output of Articles as the normal Blog Display but will add, at the top, two drop down lists for month and year plus a search button to allow Users to search for all Archived Articles from a specific month and year.</p> <h3>List Layout<br /> </h3> <p>Table layout will simply give you a <em>tabular </em>list<em> </em>of all the titles in that particular Section or Category. No Intro text will be displayed just the titles. You can set how many titles will be displayed in this table by Parameters. The table layout will also provide a filter Section so that Users can reorder, filter, and set how many titles are listed on a single page (up to 50)</p> <h2>Wrapper</h2> <p>Wrappers allow you to place stand alone applications and Third Party Web sites inside your Joomla! site. The content within a Wrapper appears within the primary content area defined by the "mainbody" tag and allows you to display their content as a part of your own site. A Wrapper will place an IFRAME into the content Section of your Web site and wrap your standard template navigation around it so it appears in the same way an Article would.</p> <h2>Content Parameters</h2> <p>The parameters for each layout type can be found on the right hand side of the editor boxes in the Menu Item configuration screen. The parameters available depend largely on what kind of layout you are configuring.</p>', '', -2, 4, 0, 29, '2008-08-12 22:33:10', 62, '', '2008-08-12 22:33:10', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 0, '', '', 0, 70, 'robots=\nauthor='),
(25, 'What are the requirements to run Joomla! 1.5?', 'what-are-the-requirements-to-run-joomla-15', '', '<p>Joomla! runs on the PHP pre-processor. PHP comes in many flavours, for a lot of operating systems. Beside PHP you will need a Web server. Joomla! is optimized for the Apache Web server, but it can run on different Web servers like Microsoft IIS it just requires additional configuration of PHP and MySQL. Joomla! also depends on a database, for this currently you can only use MySQL. </p>Many people know from their own experience that it''s not easy to install an Apache Web server and it gets harder if you want to add MySQL, PHP and Perl. XAMPP, WAMP, and MAMP are easy to install distributions containing Apache, MySQL, PHP and Perl for the Windows, Mac OSX and Linux operating systems. These packages are for localhost installations on non-public servers only.<br />The minimum version requirements are:<br /><ul><li>Apache 1.x or 2.x</li><li>PHP 4.3 or up</li><li>MySQL 3.23 or up</li></ul>For the latest minimum requirements details, see <a href="http://www.joomla.org/about-joomla/technical-requirements.html" target="_blank" title="Joomla! Technical Requirements">Joomla! Technical Requirements</a>.', '', -2, 3, 0, 31, '2008-08-11 00:42:31', 62, '', '2008-08-11 00:42:31', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 0, '', '', 0, 29, 'robots=\nauthor='),
(26, 'Extensions', 'extensions', '', '<p>Out of the box, Joomla! does a great job of managing the content needed to make your Web site sing. But for many people, the true power of Joomla! lies in the application framework that makes it possible for developers all around the world to create powerful add-ons that are called <strong>Extensions</strong>. An Extension is used to add capabilities to Joomla! that do not exist in the base core code. Here are just some examples of the hundreds of available Extensions:</p> <ul>   <li>Dynamic form builders</li>   <li>Business or organisational directories</li>   <li>Document management</li>   <li>Image and multimedia galleries</li>   <li>E-commerce and shopping cart engines</li>   <li>Forums and chat software</li>   <li>Calendars</li>   <li>E-mail newsletters</li>   <li>Data collection and reporting tools</li>   <li>Banner advertising systems</li>   <li>Paid subscription services</li>   <li>and many, many, more</li> </ul> <p>You can find more examples over at our ever growing <a href="http://extensions.joomla.org" target="_blank" title="Joomla! Extensions Directory">Joomla! Extensions Directory</a>. Prepare to be amazed at the amount of exciting work produced by our active developer community!</p><p>A useful guide to the Extension site can be found at:<br /><a href="http://extensions.joomla.org/content/view/15/63/" target="_blank" title="Guide to the Joomla! Extension site">http://extensions.joomla.org/content/view/15/63/</a> </p> <h3>Types of Extensions </h3><p>There are five types of extensions:</p> <ul>   <li>Components</li>   <li>Modules</li>   <li>Templates</li>   <li>Plugins</li>   <li>Languages</li> </ul> <p>You can read more about the specifics of these using the links in the Article Index - a Table of Contents (yet another useful feature of Joomla!) - at the top right or by clicking on the <strong>Next </strong>link below.<br /> </p> <hr title="Components" class="system-pagebreak" /> <h3><img src="images/stories/ext_com.png" border="0" alt="Component - Joomla! Extension Directory" title="Component - Joomla! Extension Directory" width="17" height="17" /> Components</h3> <p>A Component is the largest and most complex of the Extension types.  Components are like mini-applications that render the main body of the  page. An analogy that might make the relationship easier to understand  would be that Joomla! is a book and all the Components are chapters in  the book. The core Article Component (<font face="courier new,courier">com_content</font>), for example, is the  mini-application that handles all core Article rendering just as the  core registration Component (<font face="courier new,courier">com_user</font>) is the mini-application  that handles User registration.</p> <p>Many of Joomla!''s core features are provided by the use of default Components such as:</p> <ul>   <li>Contacts</li>   <li>Front Page</li>   <li>News Feeds</li>   <li>Banners</li>   <li>Mass Mail</li>   <li>Polls</li></ul><p>A Component will manage data, set displays, provide functions, and in general can perform any operation that does not fall under the general functions of the core code.</p> <p>Components work hand in hand with Modules and Plugins to provide a rich variety of content display and functionality aside from the standard Article and content display. They make it possible to completely transform Joomla! and greatly expand its capabilities.</p>  <hr title="Modules" class="system-pagebreak" /> <h3><img src="images/stories/ext_mod.png" border="0" alt="Module - Joomla! Extension Directory" title="Module - Joomla! Extension Directory" width="17" height="17" /> Modules</h3> <p>A more lightweight and flexible Extension used for page rendering is a Module. Modules are used for small bits of the page that are generally  less complex and able to be seen across different Components. To  continue in our book analogy, a Module can be looked at as a footnote  or header block, or perhaps an image/caption block that can be rendered  on a particular page. Obviously you can have a footnote on any page but  not all pages will have them. Footnotes also might appear regardless of  which chapter you are reading. Simlarly Modules can be rendered  regardless of which Component you have loaded.</p> <p>Modules are like little mini-applets that can be placed anywhere on your site. They work in conjunction with Components in some cases and in others are complete stand alone snippets of code used to display some data from the database such as Articles (Newsflash) Modules are usually used to output data but they can also be interactive form items to input data for example the Login Module or Polls.</p> <p>Modules can be assigned to Module positions which are defined in your Template and in the back-end using the Module Manager and editing the Module Position settings. For example, "left" and "right" are common for a 3 column layout. </p> <h4>Displaying Modules</h4> <p>Each Module is assigned to a Module position on your site. If you wish it to display in two different locations you must copy the Module and assign the copy to display at the new location. You can also set which Menu Items (and thus pages) a Module will display on, you can select all Menu Items or you can pick and choose by holding down the control key and selecting multiple locations one by one in the Modules [Edit] screen</p> <p>Note: Your Main Menu is a Module! When you create a new Menu in the Menu Manager you are actually copying the Main Menu Module (<font face="courier new,courier">mod_mainmenu</font>) code and giving it the name of your new Menu. When you copy a Module you do not copy all of its parameters, you simply allow Joomla! to use the same code with two separate settings.</p> <h4>Newsflash Example</h4> <p>Newsflash is a Module which will display Articles from your site in an assignable Module position. It can be used and configured to display one Category, all Categories, or to randomly choose Articles to highlight to Users. It will display as much of an Article as you set, and will show a <em>Read more...</em> link to take the User to the full Article.</p> <p>The Newsflash Component is particularly useful for things like Site News or to show the latest Article added to your Web site.</p>  <hr title="Plugins" class="system-pagebreak" /> <h3><img src="images/stories/ext_plugin.png" border="0" alt="Plugin - Joomla! Extension Directory" title="Plugin - Joomla! Extension Directory" width="17" height="17" /> Plugins</h3> <p>One  of the more advanced Extensions for Joomla! is the Plugin. In previous  versions of Joomla! Plugins were known as Mambots. Aside from changing their name their  functionality has been expanded. A Plugin is a section of code that  runs when a pre-defined event happens within Joomla!. Editors are Plugins, for example, that execute when the Joomla! event <font face="courier new,courier">onGetEditorArea</font> occurs. Using a Plugin allows a developer to change  the way their code behaves depending upon which Plugins are installed  to react to an event.</p>  <hr title="Languages" class="system-pagebreak" /> <h3><img src="images/stories/ext_lang.png" border="0" alt="Language - Joomla! Extensions Directory" title="Language - Joomla! Extensions Directory" width="17" height="17" /> Languages</h3> <p>New  to Joomla! 1.5 and perhaps the most basic and critical Extension is a Language. Joomla! is released with multiple Installation Languages but the base Site and Administrator are packaged in just the one Language <strong>en-GB</strong> - being English with GB spelling for example. To include all the translations currently available would bloat the core package and make it unmanageable for uploading purposes. The Language files enable all the User interfaces both Front-end and Back-end to be presented in the local preferred language. Note these packs do not have any impact on the actual content such as Articles. </p> <p>More information on languages is available from the <br />   <a href="http://community.joomla.org/translations.html" target="_blank" title="Joomla! Translation Teams">http://community.joomla.org/translations.html</a></p>', '', -2, 4, 0, 29, '2008-08-11 06:00:00', 62, '', '2008-08-11 06:00:00', 62, 0, '0000-00-00 00:00:00', '2006-10-10 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 24, 0, 0, 'About Joomla!, General, Extensions', '', 0, 103, 'robots=\nauthor=');
INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(27, 'The Joomla! Community', 'the-joomla-community', '', '<p><strong>Got a question? </strong>With more than 210,000 members, the Joomla! Discussion Forums at <a href="http://forum.joomla.org/" target="_blank" title="Forums">forum.joomla.org</a> are a great resource for both new and experienced users. Ask your toughest questions the community is waiting to see what you''ll do with your Joomla! site.</p><p><strong>Do you want to show off your new Joomla! Web site?</strong> Visit the <a href="http://forum.joomla.org/viewforum.php?f=514" target="_blank" title="Site Showcase">Site Showcase</a> section of our forum.</p><p><strong>Do you want to contribute?</strong></p><p>If you think working with Joomla is fun, wait until you start working on it. We''re passionate about helping Joomla users become contributors. There are many ways you can help Joomla''s development:</p><ul>	<li>Submit news about Joomla. We syndicate Joomla-related news on <a href="http://news.joomla.org" target="_blank" title="JoomlaConnect">JoomlaConnect<sup>TM</sup></a>. If you have Joomla news that you would like to share with the community, find out how to get connected <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">here</a>.</li>	<li>Report bugs and request features in our <a href="http://joomlacode.org/gf/project/joomla/tracker/" target="_blank" title="Joomla! developement trackers">trackers</a>. Please read <a href="http://docs.joomla.org/Filing_bugs_and_issues" target="_blank" title="Reporting Bugs">Reporting Bugs</a>, for details on how we like our bug reports served up</li><li>Submit patches for new and/or fixed behaviour. Please read <a href="http://docs.joomla.org/Patch_submission_guidelines" target="_blank" title="Submitting Patches">Submitting Patches</a>, for details on how to submit a patch.</li><li>Join the <a href="http://forum.joomla.org/viewforum.php?f=509" target="_blank" title="Joomla! development forums">developer forums</a> and share your ideas for how to improve Joomla. We''re always open to suggestions, although we''re likely to be sceptical of large-scale suggestions without some code to back it up.</li><li>Join any of the <a href="http://www.joomla.org/about-joomla/the-project/working-groups.html" target="_blank" title="Joomla! working groups">Joomla Working Groups</a> and bring your personal expertise to the Joomla community. </li></ul><p>These are just a few ways you can contribute. See <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank" title="Contribute">Contribute to Joomla</a> for many more ways.</p>', '', -2, 4, 0, 30, '2008-08-12 16:50:48', 62, '', '2008-08-12 16:50:48', 62, 0, '0000-00-00 00:00:00', '2006-10-11 02:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 0, '', '', 0, 54, 'robots=\nauthor='),
(28, 'How do I install Joomla! 1.5?', 'how-do-i-install-joomla-15', '', '<p>Installing of Joomla! 1.5 is pretty easy. We assume you have set-up your Web site, and it is accessible with your browser.<br /><br />Download Joomla! 1.5, unzip it and upload/copy the files into the directory you Web site points to, fire up your browser and enter your Web site address and the installation will start.  </p><p>For full details on the installation processes check out the <a href="http://help.joomla.org/content/category/48/268/302" target="_blank" title="Joomla! 1.5 Installation Manual">Installation Manual</a> on the <a href="http://help.joomla.org" target="_blank" title="Joomla! Help Site">Joomla! Help Site</a> where you will also find download instructions for a PDF version too. </p>', '', -2, 3, 0, 31, '2008-08-11 01:10:59', 62, '', '2008-08-11 01:10:59', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 0, '', '', 0, 5, 'robots=\nauthor='),
(29, 'What is the purpose of the collation selection in the installation screen?', 'what-is-the-purpose-of-the-collation-selection-in-the-installation-screen', '', 'The collation option determines the way ordering in the database is done. In languages that use special characters, for instance the German umlaut, the database collation determines the sorting order. If you don''t know which collation you need, select the "utf8_general_ci" as most languages use this. The other collations listed are exceptions in regards to the general collation. If your language is not listed in the list of collations it most likely means that "utf8_general_ci is suitable.', '', -2, 3, 0, 32, '2008-08-11 03:11:38', 62, '', '2008-08-11 03:11:38', 62, 0, '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', 4, 0, 0, '', '', 0, 6, 'robots=\nauthor='),
(30, 'What languages are supported by Joomla! 1.5?', 'what-languages-are-supported-by-joomla-15', '', 'Within the Installer you will find a wide collection of languages. The installer currently supports the following languages: Arabic, Bulgarian, Bengali, Czech, Danish, German, Greek, English, Spanish, Finnish, French, Hebrew, Devanagari(India), Croatian(Croatia), Magyar (Hungary), Italian, Malay, Norwegian bokmal, Dutch, Portuguese(Brasil), Portugues(Portugal), Romanian, Russian, Serbian, Svenska, Thai and more are being added all the time.<br />By default the English language is installed for the Back and Front-ends. You can download additional language files from the <a href="http://extensions.joomla.org" target="_blank" title="Joomla! Extensions Directory">Joomla!Extensions Directory</a>. ', '', -2, 3, 0, 32, '2008-08-11 01:12:18', 62, '', '2008-08-11 01:12:18', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 0, '', '', 0, 8, 'robots=\nauthor='),
(31, 'Is it useful to install the sample data?', 'is-it-useful-to-install-the-sample-data', '', 'Well you are reading it right now! This depends on what you want to achieve. If you are new to Joomla! and have no clue how it all fits together, just install the sample data. If you don''t like the English sample data because you - for instance - speak Chinese, then leave it out.', '', -2, 3, 0, 27, '2008-08-11 09:12:55', 62, '', '2008-08-11 09:12:55', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 0, '', '', 0, 3, 'robots=\nauthor='),
(32, 'Where is the Static Content Item?', 'where-is-the-static-content', '', '<p>In Joomla! versions prior to 1.5 there were separate processes for creating a Static Content Item and normal Content Items. The processes have been combined now and whilst both content types are still around they are renamed as Articles for Content Items and Uncategorized Articles for Static Content Items. </p><p>If you want to create a static item, create a new Article in the same way as for standard content and rather than relating this to a particular Section and Category just select <span style="font-style: italic">Uncategorized</span> as the option in the Section and Category drop down lists.</p>', '', -2, 3, 0, 28, '2008-08-10 23:13:33', 62, '', '2008-08-10 23:13:33', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 0, '', '', 0, 5, 'robots=\nauthor='),
(33, 'What is an Uncategorised Article?', 'what-is-uncategorised-article', '', 'Most Articles will be assigned to a Section and Category. In many cases, you might not know where you want it to appear so put the Article in the <em>Uncategorized </em>Section/Category. The Articles marked as <em>Uncategorized </em>are handled as static content.', '', -2, 3, 0, 31, '2008-08-11 15:14:11', 62, '', '2008-08-11 15:14:11', 62, 0, '0000-00-00 00:00:00', '2006-10-10 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 0, '', '', 0, 6, 'robots=\nauthor='),
(34, 'Does the PDF icon render pictures and special characters?', 'does-the-pdf-icon-render-pictures-and-special-characters', '', 'Yes! Prior to Joomla! 1.5, only the text values of an Article and only for ISO-8859-1 encoding was allowed in the PDF rendition. With the new PDF library in place, the complete Article including images is rendered and applied to the PDF. The PDF generator also handles the UTF-8 texts and can handle any character sets from any language. The appropriate fonts must be installed but this is done automatically during a language pack installation.', '', -2, 3, 0, 32, '2008-08-11 17:14:57', 62, '', '2008-08-11 17:14:57', 62, 0, '0000-00-00 00:00:00', '2006-10-10 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 6, 'robots=\nauthor='),
(35, 'Is it possible to change A Menu Item''s Type?', 'is-it-possible-to-change-the-types-of-menu-entries', '', '<p>You indeed can change the Menu Item''s Type to whatever you want, even after they have been created. </p><p>If, for instance, you want to change the Blog Section of a Menu link, go to the Control Panel-&gt;Menus Menu-&gt;[menuname]-&gt;Menu Item Manager and edit the Menu Item. Select the <strong>Change Type</strong> button and choose the new style of Menu Item Type from the available list. Thereafter, alter the Details and Parameters to reconfigure the display for the new selection  as you require it.</p>', '', -2, 3, 0, 31, '2008-08-10 23:15:36', 62, '', '2008-08-10 23:15:36', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 0, '', '', 0, 18, 'robots=\nauthor='),
(36, 'Where did the Installers go?', 'where-did-the-installer-go', '', 'The improved Installer can be found under the Extensions Menu. With versions prior to Joomla! 1.5 you needed to select a specific Extension type when you wanted to install it and use the Installer associated with it, with Joomla! 1.5 you just select the Extension you want to upload, and click on install. The Installer will do all the hard work for you.', '', -2, 3, 0, 28, '2008-08-10 23:16:20', 62, '', '2008-08-10 23:16:20', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 0, '', '', 0, 4, 'robots=\nauthor='),
(37, 'Where did the Mambots go?', 'where-did-the-mambots-go', '', '<p>Mambots have been renamed as Plugins. </p><p>Mambots were introduced in Mambo and offered possibilities to add plug-in logic to your site mainly for the purpose of manipulating content. In Joomla! 1.5, Plugins will now have much broader capabilities than Mambots. Plugins are able to extend functionality at the framework layer as well.</p>', '', -2, 3, 0, 28, '2008-08-11 09:17:00', 62, '', '2008-08-11 09:17:00', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 0, '', '', 0, 4, 'robots=\nauthor='),
(38, 'I installed with my own language, but the Back-end is still in English', 'i-installed-with-my-own-language-but-the-back-end-is-still-in-english', '', '<p>A lot of different languages are available for the Back-end, but by default this language may not be installed. If you want a translated Back-end, get your language pack and install it using the Extension Installer. After this, go to the Extensions Menu, select Language Manager and make your language the default one. Your Back-end will be translated immediately.</p><p>Users who have access rights to the Back-end may choose the language they prefer in their Personal Details parameters. This is of also true for the Front-end language.</p><p> A good place to find where to download your languages and localised versions of Joomla! is <a href="http://extensions.joomla.org/index.php?option=com_mtree&task=listcats&cat_id=1837&Itemid=35" target="_blank" title="Translations for Joomla!">Translations for Joomla!</a> on JED.</p>', '', -2, 3, 0, 32, '2008-08-11 17:18:14', 62, '', '2008-08-11 17:18:14', 62, 0, '0000-00-00 00:00:00', '2006-10-10 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, '', '', 0, 7, 'robots=\nauthor='),
(39, 'How do I remove an Article?', 'how-do-i-remove-an-article', '', '<p>To completely remove an Article, select the Articles that you want to delete and move them to the Trash. Next, open the Article Trash in the Content Menu and select the Articles you want to delete. After deleting an Article, it is no longer available as it has been deleted from the database and it is not possible to undo this operation.  </p>', '', -2, 3, 0, 27, '2008-08-11 09:19:01', 62, '', '2008-08-11 09:19:01', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 0, '', '', 0, 4, 'robots=\nauthor='),
(40, 'What is the difference between Archiving and Trashing an Article? ', 'what-is-the-difference-between-archiving-and-trashing-an-article', '', '<p>When you <em>Archive </em>an Article, the content is put into a state which removes it from your site as published content. The Article is still available from within the Control Panel and can be <em>retrieved </em>for editing or republishing purposes. Trashed Articles are just one step from being permanently deleted but are still available until you Remove them from the Trash Manager. You should use Archive if you consider an Article important, but not current. Trash should be used when you want to delete the content entirely from your site and from future search results.  </p>', '', -2, 3, 0, 27, '2008-08-11 05:19:43', 62, '', '2008-08-11 05:19:43', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 0, '', '', 0, 5, 'robots=\nauthor='),
(41, 'Newsflash 5', 'newsflash-5', '', 'Joomla! 1.5 - ''Experience the Freedom''!. It has never been easier to create your own dynamic Web site. Manage all your content from the best CMS admin interface and in virtually any language you speak.', '', -2, 1, 0, 3, '2008-08-12 00:17:31', 62, '', '2008-08-12 00:17:31', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 0, '', '', 0, 4, 'robots=\nauthor='),
(42, 'Newsflash 4', 'newsflash-4', '', 'Yesterday all servers in the U.S. went out on strike in a bid to get more RAM and better CPUs. A spokes person said that the need for better RAM was due to some fool increasing the front-side bus speed. In future, buses will be told to slow down in residential motherboards.', '', -2, 1, 0, 3, '2008-08-12 00:25:50', 62, '', '2008-08-12 00:25:50', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 0, '', '', 0, 5, 'robots=\nauthor='),
(43, 'Example Pages and Menu Links', 'example-pages-and-menu-links', '', '<p>This page is an example of content that is <em>Uncategorized</em>; that is, it does not belong to any Section or Category. You will see there is a new Menu in the left column. It shows links to the same content presented in 4 different page layouts.</p><ul><li>Section Blog</li><li>Section Table</li><li> Blog Category</li><li>Category Table</li></ul><p>Follow the links in the <strong>Example Pages</strong> Menu to see some of the options available to you to present all the different types of content included within the default installation of Joomla!.</p><p>This includes Components and individual Articles. These links or Menu Item Types (to give them their proper name) are all controlled from within the <strong><font face="courier new,courier">Menu Manager-&gt;[menuname]-&gt;Menu Items Manager</font></strong>. </p>', '', -2, 0, 0, 0, '2008-08-12 09:26:52', 62, '', '2008-08-12 09:26:52', 62, 0, '0000-00-00 00:00:00', '2006-10-11 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 0, 'Uncategorized, Uncategorized, Example Pages and Menu Links', '', 0, 43, 'robots=\nauthor='),
(44, 'Joomla! Security Strike Team', 'joomla-security-strike-team', '', '<p>The Joomla! Project has assembled a top-notch team of experts to form the new Joomla! Security Strike Team. This new team will solely focus on investigating and resolving security issues. Instead of working in relative secrecy, the JSST will have a strong public-facing presence at the <a href="http://developer.joomla.org/security.html" target="_blank" title="Joomla! Security Center">Joomla! Security Center</a>.</p>', '<p>The new JSST will call the new <a href="http://developer.joomla.org/security.html" target="_blank" title="Joomla! Security Center">Joomla! Security Center</a> their home base. The Security Center provides a public presence for <a href="http://developer.joomla.org/security/news.html" target="_blank" title="Joomla! Security News">security issues</a> and a platform for the JSST to <a href="http://developer.joomla.org/security/articles-tutorials.html" target="_blank" title="Joomla! Security Articles">help the general public better understand security</a> and how it relates to Joomla!. The Security Center also offers users a clearer understanding of how security issues are handled. There''s also a <a href="http://feeds.joomla.org/JoomlaSecurityNews" target="_blank" title="Joomla! Security News Feed">news feed</a>, which provides subscribers an up-to-the-minute notification of security issues as they arise.</p>', -2, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 0, '', '', 0, 1, 'robots=\nauthor='),
(45, 'Joomla! Community Portal', 'joomla-community-portal', '', '<p>The <a href="http://community.joomla.org/" target="_blank" title="Joomla! Community Portal">Joomla! Community Portal</a> is now online. There, you will find a constant source of information about the activities of contributors powering the Joomla! Project. Learn about <a href="http://community.joomla.org/events.html" target="_blank" title="Joomla! Events">Joomla! Events</a> worldwide, and see if there is a <a href="http://community.joomla.org/user-groups.html" target="_blank" title="Joomla! User Groups">Joomla! User Group</a> nearby.</p><p>The <a href="http://community.joomla.org/magazine.html" target="_blank" title="Joomla! Community Magazine">Joomla! Community Magazine</a> promises an interesting overview of feature articles, community accomplishments, learning topics, and project updates each month. Also, check out <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">JoomlaConnect&#0153;</a>. This aggregated RSS feed brings together Joomla! news from all over the world in your language. Get the latest and greatest by clicking <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">here</a>.</p>', '', -2, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 0, '', '', 0, 5, 'robots=\nauthor=');
INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(46, 'Typography', 'typography', '', '<p><span class="gk_color-6">This page presents most of typographical aspects of <strong>elvesocial</strong> template. Make your readers happy with great Typography and User Experience!</span></p>\r\n<p class="gk_info1">This is a sample info message. Use <strong>&lt;p class="gk_info1"&gt;Your info message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_tips1">This is a sample tips message. Use <strong>&lt;p class="gk_tips1"&gt;Your tips goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_warning1">This is a sample warning message. Use <strong>&lt;p class="gk_warning1"&gt;Your warning message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_info2">This is a sample info message. Use <strong>&lt;p class="gk_info2"&gt;Your info message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_tips2">This is a sample tips message. Use <strong>&lt;p class="gk_tips2"&gt;Your tips goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_warning2">This is a sample warning message. Use <strong>&lt;p class="gk_warning2"&gt;Your warning message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_info3">This is a sample info message. Use <strong>&lt;p class="gk_info3"&gt;Your info message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_tips3">This is a sample tips message. Use <strong>&lt;p class="gk_tips3"&gt;Your tips goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_warning3">This is a sample warning message. Use <strong>&lt;p class="gk_warning3"&gt;Your warning message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_info4">This is a sample info message. Use <strong>&lt;p class="gk_info4"&gt;Your info message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_tips4">This is a sample tips message. Use <strong>&lt;p class="gk_tips4"&gt;Your tips goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_warning4">This is a sample warning message. Use <strong>&lt;p class="gk_warning4"&gt;Your warning message goes here!&lt;/p&gt;</strong>.</p>\r\n<h1>This is heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer semper egestas nunc in volutpat. Fusce adipiscing velit ac eros tempor iaculis. Phasellus venenatis mollis augue, non posuere odio placerat in. Etiam volutpat ultrices lectus. Fusce eu felis erat. Donec congue interdum elit, sed ornare magna convallis lacinia. In hac habitasse platea dictumst. Mauris volutpat consectetur accumsan.</p>\r\n<h2>This is heading 2</h2>\r\n<p>Cras diam justo, sodales quis lobortis sed, lobortis vel mauris. Sed a mollis nunc. Quisque semper condimentum lectus, eget laoreet ipsum auctor et. Quisque sagittis luctus augue, id fringilla enim euismod quis. Nullam blandit, elit at euismod rutrum, tortor nibh posuere mauris, in volutpat diam ante ac dui. Sed velit massa, imperdiet placerat tristique et, consectetur a lorem. Praesent aliquet turpis in quam tempor eu pulvinar nibh luctus.</p>\r\n<h3>This is heading 3</h3>\r\n<p>Vivamus rhoncus arcu sit amet est tristique convallis nec vel eros. Vestibulum euismod luctus velit quis porta. Aliquam varius placerat mauris sed vehicula. Integer porta facilisis sapien, in tempus lorem mattis molestie. Suspendisse potenti. Praesent quis diam non dolor convallis mattis eu id nulla.</p>\r\n<h4>This is heading 4</h4>\r\n<p>Proin urna erat, egestas vel consectetur at, accumsan at purus. Donec est risus, facilisis dignissim placerat nec, euismod lacinia nisi. Nam ac sem sed quam sollicitudin condimentum et eu neque. Nunc enim urna, ultricies ac mollis pretium, imperdiet hendrerit massa. Sed eleifend felis sed tellus cursus lacinia. Aenean venenatis aliquet euismod. Nam quis turpis tellus, vitae malesuada neque.</p>\r\n<p> </p>\r\n<p class="gk_audio">This is a sample audio message. Use <strong>&lt;p class="gk_audio"&gt;Your audio message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_webcam">This is a sample webcam message. Use <strong>&lt;p class="gk_webcam"&gt;Your webcam goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_email">This is a sample email message. Use <strong>&lt;p class="gk_email"&gt;Your email message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_creditcard">This is a sample creditcard message. Use <strong>&lt;p class="gk_creditcard"&gt;Your creditcart message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_feed">This is a sample feed message. Use <strong>&lt;p class="gk_feed"&gt;Your feed goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_help">This is a sample help message. Use <strong>&lt;p class="gk_help"&gt;Your help message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_images">This is a sample images message. Use <strong>&lt;p class="gk_images"&gt;Your images message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_lock">This is a sample lock message. Use <strong>&lt;p class="gk_lock"&gt;Your webcam goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_printer">This is a sample printer message. Use <strong>&lt;p class="gk_printer"&gt;Your printer message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_report">This is a sample report message. Use <strong>&lt;p class="gk_report"&gt;Your report message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_script">This is a sample script message. Use <strong>&lt;p class="gk_script"&gt;Your script goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_time">This is a sample time message. Use <strong>&lt;p class="gk_time"&gt;Your time message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_user">This is a sample user message. Use <strong>&lt;p class="gk_user"&gt;Your user message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_world">This is a sample world message. Use <strong>&lt;p class="gk_world"&gt;Your world goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_cart">This is a sample cart message. Use <strong>&lt;p class="gk_cart"&gt;Your cart message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_cd">This is a sample cd message. Use <strong>&lt;p class="gk_cd"&gt;Your cd message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_chart_bar">This is a sample chart_bar message. Use <strong>&lt;p class="gk_chart_bar"&gt;Your chart_bar goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_chart_line">This is a sample chart_line message. Use <strong>&lt;p class="gk_chart_line"&gt;Your chart_line message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_chart_pie">This is a sample chart_pie message. Use <strong>&lt;p class="gk_chart_pie"&gt;Your chart_pie message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_clock">This is a sample clock message. Use <strong>&lt;p class="gk_clock"&gt;Your clock goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_cog">This is a sample cog message. Use <strong>&lt;p class="gk_cog"&gt;Your cog message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_coins">This is a sample coins message. Use <strong>&lt;p class="gk_coins"&gt;Your coins message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_compress">This is a sample compress message. Use <strong>&lt;p class="gk_compress"&gt;Your compress goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_computer">This is a sample computer message. Use <strong>&lt;p class="gk_computer"&gt;Your computer message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_cross">This is a sample cross message. Use <strong>&lt;p class="gk_cross"&gt;Your cross message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_disk">This is a sample disk message. Use <strong>&lt;p class="gk_disk"&gt;Your disk goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_error">This is a sample error message. Use <strong>&lt;p class="gk_error"&gt;Your error message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_exclamation">This is a sample exclamation message. Use <strong>&lt;p class="gk_exclamation"&gt;Your exclamation message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_film">This is a sample film message. Use <strong>&lt;p class="gk_film"&gt;Your film goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_folder">This is a sample folder message. Use <strong>&lt;p class="gk_folder"&gt;Your folder message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_group">This is a sample group message. Use <strong>&lt;p class="gk_group"&gt;Your group message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_heart">This is a sample heart message. Use <strong>&lt;p class="gk_heart"&gt;Your heart goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_house">This is a sample house message. Use <strong>&lt;p class="gk_house"&gt;Your house message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_image">This is a sample image message. Use <strong>&lt;p class="gk_image"&gt;Your image message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_information">This is a sample information message. Use <strong>&lt;p class="gk_information"&gt;Your information message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_magnifier">This is a sample magnifier message. Use <strong>&lt;p class="gk_magnifier"&gt;Your magnifier message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_money">This is a sample money message. Use <strong>&lt;p class="gk_money"&gt;Your money goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_new">This is a sample new message. Use <strong>&lt;p class="gk_new"&gt;Your new message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_note">This is a sample note message. Use <strong>&lt;p class="gk_note"&gt;Your note message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_page">This is a sample page message. Use <strong>&lt;p class="gk_page"&gt;Your page goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_page_white">This is a sample page_white message. Use <strong>&lt;p class="gk_page_white"&gt;Your page_white message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_plugin">This is a sample plugin message. Use <strong>&lt;p class="gk_plugin"&gt;Your plugin message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_accept">This is a sample accept message. Use <strong>&lt;p class="gk_accept"&gt;Your accept goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_add">This is a sample add message. Use <strong>&lt;p class="gk_add"&gt;Your add message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_camera">This is a sample camera message. Use <strong>&lt;p class="gk_camera"&gt;Your camera message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_brick">This is a sample brick message. Use <strong>&lt;p class="gk_brick"&gt;Your brick goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_box">This is a sample box message. Use <strong>&lt;p class="gk_box"&gt;Your box message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_calendar">This is a sample calendar message. Use <strong>&lt;p class="gk_calendar"&gt;Your calendar message goes here!&lt;/p&gt;</strong>.</p>\r\n<p> </p>\r\n<p>This is a <span class="gk_highlight-1">highlight phrase</span>. Use <strong>&lt;span class="gk_highlight-1"&gt;Your highlight phrase goes here!&lt;/span&gt;</strong>.</p>\r\n<p>This is a <span class="gk_highlight-2">highlight phrase</span>. Use <strong>&lt;span class="gk_highlight-2"&gt;Your highlight phrase goes here!&lt;/span&gt;</strong>.</p>\r\n<p>This is a <span class="gk_highlight-3">highlight phrase</span>. Use <strong>&lt;span class="gk_highlight-3"&gt;Your highlight phrase goes here!&lt;/span&gt;</strong>.</p>\r\n<p>This is a <span class="gk_highlight-4">highlight phrase</span>. Use <strong>&lt;span class="gk_highlight-4"&gt;Your highlight phrase goes here!&lt;/span&gt;</strong>.</p>\r\n<p> </p>\r\n<p>Below is a sample of <strong>&lt;pre&gt;</strong> or <strong>&lt;div class="gk_code1"&gt;</strong></p>\r\n<pre>#wrapper {<br />	position: relative;<br />	float: left;<br />	display: block;<br />}<br /></pre>\r\n<p> </p>\r\n<p>Below is a sample of <strong>&lt;div class="gk_code2"&gt;</strong></p>\r\n<div class="gk_code2">#wrapper {<br /> position: relative;<br /> float: left;<br /> display: block;<br />}</div>\r\n<p> </p>\r\n<p>Below is a sample of <strong>&lt;div class="gk_code3"&gt;&lt;h4&gt;Name of your file&lt;/h4&gt;Here goes your code&lt;/div&gt;</strong></p>\r\n<div class="gk_code3">\r\n<h4>File</h4>\r\n#wrapper {<br /> position: relative;<br /> float: left;<br /> display: block;<br />}</div>\r\n<p> </p>\r\n<p>Types of unordered lists</p>\r\n<table border="0" width="100%">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>&lt;ul class="gk_bullet1"&gt;</strong></p>\r\n<ul class="gk_bullet1">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_bullet2"&gt;</strong></p>\r\n<ul class="gk_bullet2">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_bullet3"&gt;</strong></p>\r\n<ul class="gk_bullet3">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>&lt;ul class="gk_bullet4"&gt;</strong></p>\r\n<ul class="gk_bullet4">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_circle1"&gt;</strong></p>\r\n<ul class="gk_circle1">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_circle2"&gt;</strong></p>\r\n<ul class="gk_circle2">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>&lt;ul class="gk_square1"&gt;</strong></p>\r\n<ul class="gk_square1">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_square2"&gt;</strong></p>\r\n<ul class="gk_square2">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_square3"&gt;</strong></p>\r\n<ul class="gk_square3">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Types of ordered list:</p>\r\n<table border="0" width="100%">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>&lt;ol class="gk_roman"&gt;</strong></p>\r\n<ol class="gk_roman">\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n</ol></td>\r\n<td>\r\n<p><strong>&lt;ol class="gk_dec"&gt;</strong></p>\r\n<ol class="gk_dec">\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n</ol></td>\r\n<td>\r\n<p><strong>&lt;ol class="gk_alpha"&gt;</strong></p>\r\n<ol class="gk_alpha">\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n</ol></td>\r\n<td>\r\n<p><strong>&lt;ol class="gk_decimalLeadingZero"&gt;</strong></p>\r\n<ol class="gk_decimalLeadingZero">\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n</ol></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong>&lt;div class="gk_number1"&gt;&lt;p&gt;&lt;span&gt;here goes a number&lt;/span&gt;and here text of element&lt;/p&gt;</strong></p>\r\n<div class="gk_number1">\r\n<p><span>01</span> Element</p>\r\n<p><span>02</span> Element</p>\r\n</div>\r\n<p><strong>&lt;div class="gk_number2"&gt;&lt;p&gt;&lt;span&gt;here goes a number&lt;/span&gt;and here text of element&lt;/p&gt;</strong></p>\r\n<div class="gk_number2">\r\n<p><span>01</span> Element</p>\r\n<p><span>02</span> Element</p>\r\n</div>\r\n<p> </p>\r\n<p>This is a sample of an abbreviation <abbr title="Doctor">Dr</abbr>. Use <strong>&lt;abbr title="Here goes full word or phrase"&gt;here goes an abbreviation&lt;/abbr&gt;</strong></p>\r\n<p> </p>\r\n<p>This is a sample of an acronym <acronym title="North Atlantic Treaty Organization">NATO</acronym>. Use <strong>&lt;acronym title="Here goes full phrase"&gt;here goes an acronym&lt;/abbr&gt;</strong></p>\r\n<p> </p>\r\n<p>Below are samples of definition lists</p>\r\n<p><strong>&lt;dl class="gk_def1"&gt;&lt;dt&gt;Here goes the word you''re about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;</strong></p>\r\n<dl class="gk_def1"> <dt>Butter</dt> <dd>it is a dairy product made by churning fresh or fermented cream or milk. It is generally used as a spread and a condiment, as well as in cooking applications such as baking, sauce making, and frying. Butter consists of butterfat, water and milk proteins.</dd> <dt>Dairy milk</dt> <dd> is an opaque white liquid produced by the mammary glands of mammals (including monotremes). It provides the primary source of nutrition for newborn mammals before they are able to digest other types of food.</dd> </dl>\r\n<p><strong>&lt;dl class="gk_def2"&gt;&lt;dt&gt;Here goes the word you''re about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;</strong></p>\r\n<dl class="gk_def2"> <dt>Butter</dt> <dd>it is a dairy product made by churning fresh or fermented cream or milk. It is generally used as a spread and a condiment, as well as in cooking applications such as baking, sauce making, and frying. Butter consists of butterfat, water and milk proteins.</dd> <dt>Dairy milk</dt> <dd> is an opaque white liquid produced by the mammary glands of mammals (including monotremes). It provides the primary source of nutrition for newborn mammals before they are able to digest other types of food.</dd> </dl>\r\n<p><strong>&lt;dl class="gk_def3"&gt;&lt;dt&gt;Here goes the word you''re about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;</strong></p>\r\n<dl class="gk_def3"> <dt>Butter</dt> <dd>it is a dairy product made by churning fresh or fermented cream or milk. It is generally used as a spread and a condiment, as well as in cooking applications such as baking, sauce making, and frying. Butter consists of butterfat, water and milk proteins.</dd> <dt>Dairy milk</dt> <dd> is an opaque white liquid produced by the mammary glands of mammals (including monotremes). It provides the primary source of nutrition for newborn mammals before they are able to digest other types of food.</dd> </dl>\r\n<p> </p>\r\n<div class="gk_legend1">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend1"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend2">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend2"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend3">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend3"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend4">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend4"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend5">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend5"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend6">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend6"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<p> </p>\r\n<p><span class="gk_Dropcap1">T</span>his is a sample text with Dropcap. Use <strong>&lt;p&gt; &lt;span class="gk_Dropcap1"&gt;t&lt;/span&gt;</strong> to make the first letter larger. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend. Vivamus ullamcorper est id libero aliquam ullamcorper. Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut..<strong>&lt;/p&gt;</strong>.</p>\r\n<p class="gk_Dropcap2"><span class="gk_Dropcap2">T</span>his is a sample text with Dropcap. Use <strong>&lt;p&gt; &lt;span class="gk_Dropcap2"&gt;t&lt;/span&gt;</strong> to make the first letter larger. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend. Vivamus ullamcorper est id libero aliquam ullamcorper. Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut..<strong>&lt;/p&gt;</strong>.</p>\r\n<p class="gk_Dropcap3"><span class="gk_Dropcap3">T</span>his is a sample text with Dropcap. Use <strong>&lt;p class="gk_Dropcap3"&gt; &lt;span class="gk_Dropcap3"&gt;t&lt;/span&gt;</strong> to make the first letter larger. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend. Vivamus ullamcorper est id libero aliquam ullamcorper. Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut..<strong>&lt;/p&gt;</strong>.</p>\r\n<p> </p>\r\n<p>Below are samples of text in which part of it is displayed in a separate block</p>\r\n<p><strong>&lt;p&gt; Here goes main part of the text &lt;span class="gk_blockTextLeft"&gt;Block of text&lt;/span&gt;rest of the text&lt;/p&gt; </strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend.<span class="gk_blockTextLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue.</span>Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut. Morbi cursus est vel velit hendrerit dictum.</p>\r\n<p><strong>&lt;p&gt; Here goes main part of the text &lt;span class="gk_blockTextRight"&gt;Block of text&lt;/span&gt;rest of the text&lt;/p&gt; </strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend.<span class="gk_blockTextRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue.</span>Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut. Morbi cursus est vel velit hendrerit dictum.</p>\r\n<p><strong>&lt;p&gt; Here goes main part of the text &lt;span class="gk_blockTextCenter"&gt;Block of text&lt;/span&gt;rest of the text&lt;/p&gt; </strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend.<span class="gk_blockTextCenter">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue.</span>Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut. Morbi cursus est vel velit hendrerit dictum.</p>\r\n<p> </p>\r\n<blockquote>This is a sample quote text. Use <strong>&lt; blockquote &gt; Your quoted text goes here!&lt; /blockquote &gt;</strong></blockquote>\r\n<blockquote>\r\n<div class="gk_blockquote1">\r\n<div>This is a sample quote text. Use<strong>&lt; blockquote&gt;&lt;div class="gk_blockquote1"&gt;&lt;div&gt; Your quoted text goes here!&lt; /div&gt;&lt; /div&gt;&lt; /blockquote &gt;</strong></div>\r\n</div>\r\n</blockquote>\r\n<p> </p>\r\n<blockquote>\r\n<div class="gk_blockquote2">\r\n<div>This is a sample quote text. Use<strong>&lt; blockquote&gt;&lt;div class="gk_blockquote2"&gt;&lt;div&gt; Your quoted text goes here!&lt; /div&gt;&lt; /div&gt;&lt; /blockquote &gt;</strong></div>\r\n</div>\r\n</blockquote>\r\n<p> </p>\r\n<blockquote>\r\n<div class="gk_blockquote3">\r\n<div>This is a sample quote text. Use<strong>&lt; blockquote&gt;&lt;div class="gk_blockquote3"&gt;&lt;div&gt; Your quoted text goes here!&lt; /div&gt;&lt; /div&gt;&lt; /blockquote &gt;</strong></div>\r\n</div>\r\n</blockquote>\r\n<p> </p>\r\n<blockquote>\r\n<div class="gk_blockquote4">\r\n<div>This is a sample quote text. Use<strong>&lt; blockquote&gt;&lt;div class="gk_blockquote4"&gt;&lt;div&gt; Your quoted text goes here!&lt; /div&gt;&lt; /div&gt;&lt; /blockquote &gt;</strong></div>\r\n</div>\r\n</blockquote>\r\n<p> </p>\r\n<p><span class="gk_clear">This is a sample pin note. Use <strong>&lt;span class="gk_clear"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_clear-1">This is a sample pin note. Use <strong>&lt;span class="gk_clear-1"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_clear-2">This is a sample pin note. Use <strong>&lt;span class="gk_clear-2"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color">This is a sample pin note. Use <strong>&lt;span class="gk_color"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-1">This is a sample pin note. Use <strong>&lt;span class="gk_color-1"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-2">This is a sample pin note. Use <strong>&lt;span class="gk_color-2"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-3">This is a sample pin note. Use <strong>&lt;span class="gk_color-3"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-4">This is a sample pin note. Use <strong>&lt;span class="gk_color-4"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-5">This is a sample pin note. Use <strong>&lt;span class="gk_color-5"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-6">This is a sample pin note. Use <strong>&lt;span class="gk_color-6"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-7">This is a sample pin note. Use <strong>&lt;span class="gk_color-7"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>', '', -2, 0, 0, 0, '2009-07-31 18:16:30', 62, '', '2010-05-21 00:42:21', 62, 0, '0000-00-00 00:00:00', '2009-07-31 18:16:30', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 0, '', '', 0, 138, 'robots=\nauthor='),
(47, 'Modules Positions', 'modules-positions', '', '<p><span class="color-6"><strong>elvesocial</strong> template supports full width configurations for use with galleries or forums, make sure you do not publish any modules in right column and the component will fill the entire width.</span></p>\r\n<p> </p>\r\n<p style="text-align: center;"><img src="images/stories/demo/modulepositions.png" border="0" /></p>', '', -2, 0, 0, 0, '2009-07-31 23:23:02', 62, '', '2009-07-31 23:26:26', 62, 0, '0000-00-00 00:00:00', '2009-07-31 23:23:02', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 0, '', '', 0, 309, 'robots=\nauthor='),
(48, 'Me and my Husband', 'me-and-my-husband', '', '<p><img class="caption" src="images/stories/demo/demo1.jpg" border="0" alt="Me and my Husband on holidays" title="Me and my Husband on holidays" /></p>\r\n<div id="lipsum">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fringilla justo in nisl faucibus vel mollis risus ultricies. Morbi sed tristique sem. Integer dictum, risus sit amet venenatis eleifend, nibh risus ullamcorper eros, id molestie ante velit sed est. Fusce at porttitor nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit magna, ac aliquam nisi. Duis porta rhoncus odio, a lobortis lorem mattis in. Curabitur eget dolor mi, quis euismod nulla. Integer orci augue, fringilla eget rhoncus at, dictum a tortor. Vestibulum suscipit, leo id dignissim ultricies, sapien magna dignissim ante, ac accumsan eros nibh quis risus. In facilisis luctus ante, eu suscipit purus imperdiet ut. Vivamus condimentum suscipit sem vel laoreet.</p>\r\n<p>Proin interdum facilisis varius. Curabitur ac lorem nibh, sed mattis nisi. Morbi sodales risus ut orci consectetur egestas. Nulla tortor nulla, malesuada at placerat eu, adipiscing sed erat. Nunc id odio nisl. Pellentesque tincidunt tristique imperdiet. Proin ultricies nulla non magna lobortis eleifend. Maecenas blandit orci in enim convallis ultrices. Aliquam vel commodo neque. Vestibulum quis magna at mi sagittis pharetra eget nec diam. Pellentesque ullamcorper neque at sapien elementum a egestas neque varius. Donec vitae adipiscing nisl. Maecenas euismod diam porttitor sapien venenatis volutpat.</p>\r\n<p>Vestibulum ultricies sollicitudin felis nec pellentesque. Phasellus fermentum lorem odio, quis bibendum mauris. Integer pellentesque leo non dolor sagittis eu feugiat lectus blandit. Vestibulum sed turpis libero, quis gravida felis. Proin lorem sapien, semper lobortis malesuada a, elementum eget nunc. Nulla feugiat lacinia urna eu ultricies. Pellentesque rhoncus nunc id augue condimentum vestibulum. Aenean ornare urna et dui varius bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In ac massa posuere arcu euismod pretium ac vel sapien. Suspendisse sed ipsum diam, in luctus odio. Aliquam sit amet nulla mi. Nulla rhoncus ultrices sem non rutrum.</p>\r\n<p>Nulla facilisi. Suspendisse vitae placerat felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis massa felis, vel adipiscing libero. Aliquam erat volutpat. Aliquam et orci sit amet nulla tempor aliquet eget et sapien. Integer vehicula faucibus laoreet. Nullam at sem lobortis purus feugiat hendrerit sed vitae mauris. Donec eu felis nec libero faucibus lacinia. Ut aliquet felis vel neque dapibus eget commodo magna dapibus. Ut cursus pretium odio, auctor interdum quam dictum nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed suscipit, ipsum eget posuere tincidunt, massa urna condimentum purus, id tincidunt erat felis id ligula. Donec feugiat turpis eget tellus mattis eu rhoncus dolor eleifend.</p>\r\n<p>Mauris bibendum, neque sit amet bibendum aliquet, velit risus luctus orci, sit amet vulputate ligula felis ut sapien. In sed nisl metus, nec vulputate leo. Nunc porttitor, nulla eu hendrerit eleifend, purus nisi facilisis magna, id pretium eros lorem in leo. Aliquam at sapien nec erat lacinia vulputate. Nulla dignissim convallis dolor in egestas. Vivamus ante mi, tristique mattis cursus at, consequat et urna. Praesent dapibus mattis varius. Mauris at magna magna, id aliquam turpis. Aliquam cursus ligula nec augue venenatis fringilla. Ut pretium congue sagittis. Phasellus imperdiet risus in risus cursus aliquet.</p>\r\n</div>', '', -2, 5, 0, 34, '2009-08-01 15:32:11', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-08-01 15:32:11', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 0, '', '', 0, 0, 'robots=\nauthor='),
(50, 'Videos', 'videos', '', '<p><a href="http://www.juegos.com"><img class="caption" src="images/stories/demo/img1.jpg" border="0" alt="Your community with your brand" title="Your community with your brand" align="left" /></a></p>', '', -2, 5, 0, 34, '2009-08-01 16:56:29', 62, '', '2011-01-20 16:54:26', 62, 0, '0000-00-00 00:00:00', '2009-08-01 16:56:29', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 12, 0, 0, '', '', 0, 313, 'robots=\nauthor='),
(57, 'Videos con muy buenos mensajes', 'sherk-4-para-siempre', '', '<p><span style="color: #ff9900;"><span style="font-size: medium;"><strong>Videos y Garabatos <br /><br /><span style="color: #800000;">Videos infantiles con muy buenos mensajes . . .</span></strong></span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: small;"><span style="color: #ff9900;"><span style="color: #003366;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. . .</span></span></span></p>\r\n<table border="0">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>\r\n<object width="620" height="495" data="images/flash/videodemo.swf" type="application/x-shockwave-flash">\r\n<param name="quality" value="high" />\r\n<param name="src" value="images/flash/videodemo.swf" />\r\n</object>\r\n</p>\r\n</td>\r\n<td></td>\r\n<td>\r\n<object width="324" height="352" data="images/flash/pdfs.swf" type="application/x-shockwave-flash">\r\n<param name="quality" value="high" />\r\n<param name="src" value="images/flash/pdfs.swf" />\r\n</object>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', 1, 5, 0, 34, '2011-01-20 17:01:37', 62, '', '2011-08-02 17:25:16', 100, 100, '2011-08-02 19:35:24', '2011-01-20 17:01:37', '0000-00-00 00:00:00', '', '', 'show_title=1\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nlanguage=\nkeyref=\nreadmore=', 25, 0, 1, '', '', 0, 185, 'robots=\nauthor='),
(49, 'Your Community with your brand', 'your-community-with-your-brand', '', '<p style="text-align: justify;"><img class="caption" src="images/stories/demo/elvesocial_com1.png" border="0" alt="Your Community with your brand" title="Your Community with your brand" /></p>', '', -2, 1, 0, 1, '2009-08-01 15:52:08', 62, '', '2011-01-12 18:24:01', 62, 0, '0000-00-00 00:00:00', '2009-08-01 15:52:08', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 9, 0, 0, '', '', 0, 0, 'robots=\nauthor='),
(51, 'Garabacuentos', 'gabaracuentos', '', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin-top: 0px; margin-right: 0px; margin-bottom: 14px; margin-left: 0px; padding: 0px;"><img src="images/imagenes/1.png" border="0" alt="Palacio del Rey" width="186" height="139" style="float: left; margin-right: 15px;" />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>\r\n<h3 style="margin-top: 0px; margin-right: 0px; margin-bottom: 14px; margin-left: 0px; font-weight: bold; font-size: 11px; text-align: left; padding: 0px;">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin-top: 0px; margin-right: 0px; margin-bottom: 14px; margin-left: 0px; padding: 0px;">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>\r\n<p>\r\n<object width="425" height="349" data="http://www.youtube.com/v/zHdVpREiDPc?version=3&amp;hl=es_MX&amp;rel=0" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/zHdVpREiDPc?version=3&amp;hl=es_MX&amp;rel=0" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n</p>\r\n<hr title="Hoja 2" class="system-pagebreak" />\r\n<p> </p>\r\n<h3 style="margin-top: 0px; margin-right: 0px; margin-bottom: 14px; margin-left: 0px; font-weight: bold; font-size: 11px; text-align: left; padding: 0px;">1914 translation by H. Rackham</h3>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin-top: 0px; margin-right: 0px; margin-bottom: 14px; margin-left: 0px; padding: 0px;">"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>\r\n<p><a href="http://www.yahoo.com"><img class="caption" src="images/stories/demo/img2.jpg" border="0" alt="Share photos" title="Share photos" align="left" /></a></p>\r\n<p>\r\n<object width="560" height="349" data="http://www.youtube.com/v/yrgYmpxZeD0?version=3&amp;hl=es_MX&amp;rel=0" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/yrgYmpxZeD0?version=3&amp;hl=es_MX&amp;rel=0" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n</p>', '', 1, 0, 0, 0, '2009-08-01 17:14:13', 62, '', '2011-08-02 18:00:48', 100, 0, '0000-00-00 00:00:00', '2009-08-01 17:14:13', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 15, 0, 3, '', '', 0, 99, 'robots=\nauthor='),
(52, 'Juegos', 'juegos', '', '<p><a href="http://www.google.com.co" target="_blank">Juegos cristianos.com</a></p>\r\n<p> </p>\r\n<p><img src="images/stories/demo/img3.jpg" border="0" alt="Juegos Videos y Garabatos" title="Juegos" align="left" /></p>', '', 1, 0, 0, 0, '2009-08-01 17:18:19', 62, '', '2011-08-02 18:01:34', 100, 100, '2011-08-02 18:01:35', '2009-08-01 17:18:19', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 2, '', '', 0, 34, 'robots=\nauthor='),
(58, 'Catálogo de videos', 'catalogo-de-videos', '', '<table border="0">\r\n<tbody>\r\n<tr>\r\n<td><img src="images/imagenes/catalogo/odisea1.jpg" border="0" alt="Anastasia" width="180" height="349" /></td>\r\n<td></td>\r\n<td><img src="images/imagenes/catalogo/odisea2.jpg" border="0" alt="Buscando a NEMO" width="180" height="331" /><br /></td>\r\n<td></td>\r\n<td><img src="images/imagenes/catalogo/odisea3.jpg" border="0" alt="ALvin y las ardillas" width="119" height="250" /></td>\r\n<td></td>\r\n<td><img src="images/imagenes/catalogo/odisea4.jpg" border="0" alt="Spunky" width="188" height="302" /></td>\r\n<td></td>\r\n<td><img src="images/imagenes/catalogo/odisea5.jpg" border="0" alt="Odisea 5" width="250" height="575" /></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border="0">\r\n<tbody>\r\n<tr>\r\n<td><img src="images/imagenes/catalogo/anastasia.jpg" border="0" alt="Anastasia" width="380" height="549" /></td>\r\n<td></td>\r\n<td><img src="images/imagenes/catalogo/nemo.jpg" border="0" alt="Buscando a NEMO" width="380" height="531" /><br /></td>\r\n<td></td>\r\n<td><img src="images/imagenes/catalogo/ardillas.jpg" border="0" alt="ALvin y las ardillas" width="319" height="450" /></td>\r\n<td></td>\r\n<td><img src="images/imagenes/catalogo/spunky.jpg" border="0" alt="Spunky" width="288" height="402" /></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n</tbody>\r\n</table>', '', 1, 0, 0, 0, '2011-08-02 17:25:21', 100, '', '2011-08-02 17:46:51', 100, 0, '0000-00-00 00:00:00', '2011-08-02 17:25:21', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 1, '', '', 0, 10, 'robots=\nauthor=');
INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(53, 'Module Variations', 'module-variations', '', '<p>Please remember about using space at  beginning of suffix name in module options. You can use: <strong>white</strong> and <strong>green</strong> suffixes.</p>\r\n<p>Additionaly for the modules in the header section you can use <strong>blue</strong> suffix.</p>\r\n<p>Suffix <strong>clear</strong> is used usually in header positions for Image  Show and GK Tab modules.</p>', '', -2, 1, 0, 1, '2010-05-02 12:15:03', 62, '', '2010-05-28 07:47:56', 62, 0, '0000-00-00 00:00:00', '2010-05-02 12:15:03', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 0, '', '', 0, 24, 'robots=\nauthor='),
(54, 'IE6 style', 'ie6-style', '', '<p>Internet Explorer 6 is on the way out, but there is still a  significant number of users that are stuck to this browser. According to  this, we decided that our templates are going to support IE 6 slightly.  By dint of the "IE6 Bar" plug-in, available in templates menu options,  users can apply the upper bar in their IE browser to keep them informed  that Internet Explorer can not display the Web site properly.  Additionally, instead of the whole range of template styles, we created  one style- Universal Internet Explorer 6 CSS - <a href="http://code.google.com/p/universal-ie6-css/" target="_blank">project''s  website</a>. Thanks to this, users will have the full access to the  web’s content, but on the other hand, a web site’s appearance and  functioning might be more rough to some extend.</p>', '', -2, 1, 0, 1, '2010-05-02 12:18:57', 62, '', '2010-05-21 20:18:02', 62, 0, '0000-00-00 00:00:00', '2010-05-02 12:18:57', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 0, '', '', 0, 5, 'robots=\nauthor='),
(55, 'Messages', 'messages', '', '<p>Joomla! offers three different types of messages. Creatings standard information about Joomla! system is presented depending on a message type as follows:</p>\r\n<dl id="system-message"><dt class="error">Error</dt><dd class="message message fade"> \r\n<ul>\r\n<li>This is a sample message</li>\r\n</ul>\r\n</dd></dl> <dl id="system-message"><dt class="error">Error</dt><dd class="notice message fade"> \r\n<ul>\r\n<li>This is a sample warning message</li>\r\n</ul>\r\n</dd></dl> <dl id="system-message"><dt class="error">Error</dt><dd class="error message fade"> \r\n<ul>\r\n<li>This is a sample error message</li>\r\n</ul>\r\n</dd></dl>', '', -2, 1, 0, 1, '2010-05-02 12:21:19', 62, '', '2010-05-21 20:17:53', 62, 0, '0000-00-00 00:00:00', '2010-05-02 12:21:19', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 0, '', '', 0, 27, 'robots=\nauthor='),
(56, 'Chrome Frame', 'chrome-frame', '', '<p>Google Chrome Frame is a retort of Google company to Internet  Explorer browser which is still widely popular, despite the fact that  its rendering engine remains fallen behind other internet browsers. By  applying this plug-in, users can benefit from Webkit engine capabilities  and, at the same time, do not loose the opportunity of using Internet  Explorer interface. To make this interesting solution work, an  appropriate "meta name" has to be implemented into the head section of  the visited page.</p>\r\n<p>In accordance with that, our template contains an appropriate option  in its settings that helps the user to switch the meta name in the head  section, so that all IE users that have Google Chrome Frame plug-in  installed will be able to see the web site along with all facilities  offered by Webkit rendering engine.</p>\r\n<p>To get know more about Google Chrome Frame, please visit:</p>\r\n<p><a href="http://code.google.com/intl/pl-PL/chrome/chromeframe/">http://code.google.com/intl/pl-PL/chrome/chromeframe/</a> - the official Project’s web side containing the link to the plug-in.</p>\r\n<p><a href="http://www.chromium.org/developers/how-tos/chrome-frame-getting-started">http://www.chromium.org/developers/how-tos/chrome-frame-getting-started</a> - more info about Google Chrome Frame for developers.</p>', '', -2, 1, 0, 1, '2010-05-02 12:23:57', 62, '', '2010-05-21 20:17:44', 62, 0, '0000-00-00 00:00:00', '2010-05-02 12:23:57', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 0, '', '', 0, 8, 'robots=\nauthor=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_content_frontpage`
--

CREATE TABLE IF NOT EXISTS `jos_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_content_frontpage`
--

INSERT INTO `jos_content_frontpage` (`content_id`, `ordering`) VALUES
(49, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_content_rating`
--

CREATE TABLE IF NOT EXISTS `jos_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_core_acl_aro`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_value` varchar(240) NOT NULL DEFAULT '0',
  `value` varchar(240) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `jos_core_acl_aro`
--

INSERT INTO `jos_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', '62', 0, 'Administrator', 0),
(48, 'users', '100', 0, 'Manuel Obando', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_core_acl_aro_groups`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `jos_core_acl_aro_groups`
--

INSERT INTO `jos_core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`) VALUES
(17, 0, 'ROOT', 1, 22, 'ROOT'),
(28, 17, 'USERS', 2, 21, 'USERS'),
(29, 28, 'Public Frontend', 3, 12, 'Public Frontend'),
(18, 29, 'Registered', 4, 11, 'Registered'),
(19, 18, 'Author', 5, 10, 'Author'),
(20, 19, 'Editor', 6, 9, 'Editor'),
(21, 20, 'Publisher', 7, 8, 'Publisher'),
(30, 28, 'Public Backend', 13, 20, 'Public Backend'),
(23, 30, 'Manager', 14, 19, 'Manager'),
(24, 23, 'Administrator', 15, 18, 'Administrator'),
(25, 24, 'Super Administrator', 16, 17, 'Super Administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_core_acl_aro_map`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(230) NOT NULL DEFAULT '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_core_acl_aro_sections`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(230) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(230) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `jos_core_acl_aro_sections`
--

INSERT INTO `jos_core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', 1, 'Users', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_core_acl_groups_aro_map`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(240) NOT NULL DEFAULT '',
  `aro_id` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_core_acl_groups_aro_map`
--

INSERT INTO `jos_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES
(25, '', 10),
(25, '', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_core_log_items`
--

CREATE TABLE IF NOT EXISTS `jos_core_log_items` (
  `time_stamp` date NOT NULL DEFAULT '0000-00-00',
  `item_table` varchar(50) NOT NULL DEFAULT '',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_core_log_searches`
--

CREATE TABLE IF NOT EXISTS `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_gk3_tabs_manager_groups`
--

CREATE TABLE IF NOT EXISTS `jos_gk3_tabs_manager_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `jos_gk3_tabs_manager_groups`
--

INSERT INTO `jos_gk3_tabs_manager_groups` (`id`, `name`, `desc`) VALUES
(1, 'Demo', 'Demo group');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_gk3_tabs_manager_options`
--

CREATE TABLE IF NOT EXISTS `jos_gk3_tabs_manager_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `jos_gk3_tabs_manager_options`
--

INSERT INTO `jos_gk3_tabs_manager_options` (`id`, `name`, `value`) VALUES
(1, 'modal_news', '0'),
(2, 'modal_settings', '1'),
(3, 'group_shortcuts', '1'),
(4, 'tab_shortcuts', '1'),
(5, 'wysiwyg', '1'),
(6, 'gavick_news', '1'),
(7, 'article_id', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_gk3_tabs_manager_tabs`
--

CREATE TABLE IF NOT EXISTS `jos_gk3_tabs_manager_tabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `published` int(2) NOT NULL,
  `access` int(1) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `jos_gk3_tabs_manager_tabs`
--

INSERT INTO `jos_gk3_tabs_manager_tabs` (`id`, `group_id`, `name`, `type`, `content`, `published`, `access`, `order`) VALUES
(1, 1, 'Create your own social network', 'xhtml', '&lt;p&gt;&lt;img src=\\&quot;images/stories/demo/tab_content_img1.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;gavickpro  joomla template jomsocial component\\&quot; /&gt; &lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=\\&quot;images/stories/demo/b_buy_now.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;Buy now!\\&quot; /&gt; &lt;a href=\\&quot;index.php?option=com_community&amp;amp;view=frontpage&amp;amp;Itemid=82\\&quot;&gt;&lt;img src=\\&quot;images/stories/demo/b_live_demo.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;Live Demo!\\&quot; /&gt;&lt;/a&gt;&lt;/p&gt;', 1, 0, 1),
(2, 1, 'Your community with your brand', 'xhtml', '&lt;p&gt;&lt;img src=\\&quot;images/stories/demo/your_community.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;your_community\\&quot; /&gt;&lt;/p&gt;', 1, 0, 2),
(3, 1, 'Get GavickPro JomSocial Coupon', 'xhtml', '&lt;p&gt;&lt;img src=\\&quot;images/stories/demo/get_gavick.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;gavickpro jomsocial  coupon\\&quot; /&gt;&lt;/p&gt;', 1, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_groups`
--

CREATE TABLE IF NOT EXISTS `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_groups`
--

INSERT INTO `jos_groups` (`id`, `name`) VALUES
(0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_jcomments`
--

CREATE TABLE IF NOT EXISTS `jos_jcomments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `object_id` int(11) unsigned NOT NULL DEFAULT '0',
  `object_group` varchar(255) NOT NULL DEFAULT '',
  `object_params` text NOT NULL,
  `lang` varchar(255) NOT NULL DEFAULT '',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `homepage` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `ip` varchar(15) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isgood` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ispoor` smallint(5) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subscribe` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `source` varchar(255) NOT NULL DEFAULT '',
  `source_id` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_userid` (`userid`),
  KEY `idx_source` (`source`),
  KEY `idx_email` (`email`),
  KEY `idx_lang` (`lang`),
  KEY `idx_subscribe` (`subscribe`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_object` (`object_id`,`object_group`,`published`,`date`),
  KEY `idx_level` (`level`),
  KEY `idx_path` (`path`,`level`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `jos_jcomments`
--

INSERT INTO `jos_jcomments` (`id`, `parent`, `path`, `level`, `object_id`, `object_group`, `object_params`, `lang`, `userid`, `name`, `username`, `email`, `homepage`, `title`, `comment`, `ip`, `date`, `isgood`, `ispoor`, `published`, `subscribe`, `source`, `source_id`, `checked_out`, `checked_out_time`, `editor`) VALUES
(4, 0, '0', 0, 57, 'com_content', '', 'es-ES', 0, 'Carlos Maldonado', 'Carlos Maldonado', 'creativo@apagueyvamonos.com', '', '', 'Me parece muy bueno el mensaje de esta pelicula, aunque hay que mostrar muchas verdades a nuestros hijos que tal vez no se puedan ver de una manera muy clara. :D', '190.156.186.236', '2011-01-20 17:54:52', 1, 0, 1, 0, '', 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_jcomments_custom_bbcodes`
--

CREATE TABLE IF NOT EXISTS `jos_jcomments_custom_bbcodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `simple_pattern` varchar(255) NOT NULL DEFAULT '',
  `simple_replacement_html` text NOT NULL,
  `simple_replacement_text` text NOT NULL,
  `pattern` varchar(255) NOT NULL DEFAULT '',
  `replacement_html` text NOT NULL,
  `replacement_text` text NOT NULL,
  `button_acl` text NOT NULL,
  `button_open_tag` varchar(16) NOT NULL DEFAULT '',
  `button_close_tag` varchar(16) NOT NULL DEFAULT '',
  `button_title` varchar(255) NOT NULL DEFAULT '',
  `button_prompt` varchar(255) NOT NULL DEFAULT '',
  `button_image` varchar(255) NOT NULL DEFAULT '',
  `button_css` varchar(255) NOT NULL DEFAULT '',
  `button_enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `jos_jcomments_custom_bbcodes`
--

INSERT INTO `jos_jcomments_custom_bbcodes` (`id`, `name`, `simple_pattern`, `simple_replacement_html`, `simple_replacement_text`, `pattern`, `replacement_html`, `replacement_text`, `button_acl`, `button_open_tag`, `button_close_tag`, `button_title`, `button_prompt`, `button_image`, `button_css`, `button_enabled`, `ordering`, `published`) VALUES
(1, 'YouTube Video', '[youtube]http://www.youtube.com/watch?v={IDENTIFIER}[/youtube]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/{IDENTIFIER}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/{IDENTIFIER}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v={IDENTIFIER}', '\\[youtube\\]http\\://www\\.youtube\\.com/watch\\?v\\=([A-Za-z0-9-_]+)\\[\\/youtube\\]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/${1}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/${1}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[youtube]', '[/youtube]', 'YouTube Video', '', '', 'bbcode-youtube', 1, 1, 1),
(2, 'Google Video', '[google]http://video.google.com/videoplay?docid={IDENTIFIER}[/google]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId={IDENTIFIER}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid={IDENTIFIER}', '\\[google\\]http\\://video\\.google\\.com/videoplay\\?docid\\=([A-Za-z0-9-_]+)\\[\\/google\\]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId=${1}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[google]', '[/google]', 'Google Video', '', '', 'bbcode-google', 1, 2, 1),
(3, 'Wiki', '[wiki]{TEXT}[/wiki]', '<a href="http://www.wikipedia.org/wiki/{TEXT}" title="{TEXT}" target="_blank">{TEXT}</a>', '{TEXT}', '\\[wiki\\]([\\w0-9-\\+\\.,_ ]+)\\[\\/wiki\\]', '<a href="http://www.wikipedia.org/wiki/${1}" title="${1}" target="_blank">${1}</a>', '${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[wiki]', '[/wiki]', 'Wikipedia', '', '', 'bbcode-wiki', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_jcomments_reports`
--

CREATE TABLE IF NOT EXISTS `jos_jcomments_reports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commentid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reason` tinytext NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_jcomments_settings`
--

CREATE TABLE IF NOT EXISTS `jos_jcomments_settings` (
  `component` varchar(50) NOT NULL DEFAULT '',
  `lang` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`component`,`lang`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_jcomments_settings`
--

INSERT INTO `jos_jcomments_settings` (`component`, `lang`, `name`, `value`) VALUES
('', '', 'enable_username_check', '0'),
('', '', 'username_maxlength', '0'),
('', '', 'forbidden_names', ''),
('', '', 'author_email', '2'),
('', '', 'author_homepage', '0'),
('', '', 'comment_maxlength', '0'),
('', '', 'word_maxlength', '0'),
('', '', 'link_maxlength', '0'),
('', '', 'flood_time', '0'),
('', '', 'enable_notification', '0'),
('', '', 'notification_email', ''),
('', '', 'template', 'default'),
('', '', 'enable_smiles', '1'),
('', '', 'comments_per_page', '10'),
('', '', 'comments_page_limit', '10'),
('', '', 'comments_pagination', 'both'),
('', '', 'comments_order', 'DESC'),
('', '', 'show_commentlength', '0'),
('', '', 'enable_nested_quotes', '0'),
('', '', 'enable_rss', '0'),
('', '', 'censor_replace_word', ''),
('', '', 'can_comment', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_reply', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'show_policy', 'Unregistered,Registered'),
('', '', 'enable_captcha', 'Unregistered'),
('', '', 'floodprotection', 'Unregistered,Registered,Author,Editor'),
('', '', 'enable_comment_length_check', 'Unregistered,Registered'),
('', '', 'autopublish', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'autolinkurls', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_subscribe', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_gravatar', ''),
('', '', 'can_view_homepage', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_publish', 'Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_view_email', 'Manager,Administrator,Super Administrator'),
('', '', 'can_edit', 'Manager,Administrator,Super Administrator'),
('', '', 'can_edit_own', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_delete', 'Manager,Administrator,Super Administrator'),
('', '', 'can_delete_own', 'Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_b', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_i', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_u', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_s', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_url', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_img', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_list', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_hide', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_view_ip', 'Administrator,Super Administrator'),
('', '', 'enable_categories', '34'),
('', '', 'emailprotection', 'Unregistered'),
('', '', 'enable_comment_maxlength_check', ''),
('', '', 'enable_autocensor', 'Unregistered'),
('', '', 'badwords', ''),
('', '', 'smiles', ':D	laugh.gif\n:lol:	lol.gif\n:-)	smile.gif\n;-)	wink.gif\n8)	cool.gif\n:-|	normal.gif\n:-*	whistling.gif\n:oops:	redface.gif\n:sad:	sad.gif\n:cry:	cry.gif\n:o	surprised.gif\n:-?	confused.gif\n:-x	sick.gif\n:eek:	shocked.gif\n:zzz	sleeping.gif\n:P	tongue.gif\n:roll:	rolleyes.gif\n:sigh:	unsure.gif'),
('', '', 'enable_mambots', '1'),
('', '', 'form_show', '1'),
('', '', 'display_author', 'name'),
('', '', 'enable_voting', '1'),
('', '', 'can_vote', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'merge_time', '30'),
('', '', 'gzip_js', ''),
('', '', 'template_view', 'list'),
('', '', 'message_policy_post', ''),
('', '', 'message_policy_whocancomment', ''),
('', '', 'message_locked', ''),
('', '', 'comment_title', '0'),
('', '', 'enable_custom_bbcode', '1'),
('', '', 'enable_bbcode_quote', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_code', ''),
('', '', 'enable_geshi', '0'),
('', '', 'notification_type', '1,2'),
('', '', 'captcha_engine', 'kcaptcha'),
('', '', 'comment_minlength', '0'),
('', '', 'enable_quick_moderation', '0'),
('', '', 'can_report', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_jcomments_subscriptions`
--

CREATE TABLE IF NOT EXISTS `jos_jcomments_subscriptions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) unsigned NOT NULL DEFAULT '0',
  `object_group` varchar(255) NOT NULL DEFAULT '',
  `lang` varchar(255) NOT NULL DEFAULT '',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `hash` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_object` (`object_id`,`object_group`),
  KEY `idx_lang` (`lang`),
  KEY `idx_hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_jcomments_version`
--

CREATE TABLE IF NOT EXISTS `jos_jcomments_version` (
  `version` varchar(16) NOT NULL DEFAULT '',
  `previous` varchar(16) NOT NULL DEFAULT '',
  `installed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_jcomments_version`
--

INSERT INTO `jos_jcomments_version` (`version`, `previous`, `installed`, `updated`) VALUES
('2.2.0.2', '', '2010-05-06 13:58:09', '2011-01-20 13:08:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_jcomments_votes`
--

CREATE TABLE IF NOT EXISTS `jos_jcomments_votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commentid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_comment` (`commentid`,`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `jos_jcomments_votes`
--

INSERT INTO `jos_jcomments_votes` (`id`, `commentid`, `userid`, `ip`, `date`, `value`) VALUES
(1, 4, 0, '190.157.100.14', '2011-06-16 19:41:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_attachments`
--

CREATE TABLE IF NOT EXISTS `jos_k2_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleAttribute` text NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_categories`
--

CREATE TABLE IF NOT EXISTS `jos_k2_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent` int(11) DEFAULT '0',
  `extraFieldsGroup` int(11) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `trash` smallint(6) NOT NULL DEFAULT '0',
  `plugins` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`published`,`access`,`trash`),
  KEY `parent` (`parent`),
  KEY `ordering` (`ordering`),
  KEY `published` (`published`),
  KEY `access` (`access`),
  KEY `trash` (`trash`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `jos_k2_categories`
--

INSERT INTO `jos_k2_categories` (`id`, `name`, `alias`, `description`, `parent`, `extraFieldsGroup`, `published`, `access`, `ordering`, `image`, `params`, `trash`, `plugins`) VALUES
(1, 'News', 'news', 'Select a news topic from the list below, then select a news article to read.', 0, 0, 1, 0, 3, 'articles.jpg', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(2, 'Latest', 'latest', 'The latest news from the Joomla! Team', 1, 0, 1, 0, 1, 'taking_notes.jpg', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(3, 'Newsflash', 'newsflash', '', 1, 0, 1, 0, 2, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(4, 'FAQs', 'faqs', 'From the list below choose one of our FAQs topics, then select an FAQ to read. If you have a question which is not in this section, please contact us.', 0, 0, 1, 0, 5, 'key.jpg', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(5, 'Current Users', 'current-users', 'Questions that users migrating to Joomla! 1.5 are likely to raise<br />', 4, 0, 1, 0, 2, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(6, 'New to Joomla!', 'new-to-joomla', 'Questions for new users of Joomla!', 4, 0, 1, 0, 3, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(7, 'General', 'general', 'General questions about the Joomla! CMS', 4, 0, 1, 0, 1, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(8, 'Languages', 'languages', 'Questions related to localisation and languages', 4, 0, 1, 0, 4, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(9, 'About Joomla!', 'about-joomla', '', 0, 0, 1, 0, 2, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(10, 'The CMS', 'the-cms', 'Information about the software behind Joomla!<br />', 9, 0, 1, 0, 2, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(11, 'The Project', 'the-project', 'General facts about Joomla!<br />', 9, 0, 1, 0, 1, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(12, 'The Community', 'the-community', 'About the millions of Joomla! users and Web sites<br />', 9, 0, 1, 0, 3, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(13, 'Demo', 'demo', '', 0, 0, 1, 0, 6, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(14, 'Template articles', 'template-articles', '', 13, 0, 1, 0, 1, '', ' =Advanced\ntheme=default\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(15, 'Fashion Introduction', 'fashion-introduction', '', 0, 0, 1, 0, 1, '', 'inheritFrom=0\ntheme=\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=0\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 0, ''),
(16, 'Our Products', 'our-products', '<p>Our company we have a wide variety of products, specialized for professional support in different ranges of your business. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu.</p>', 0, 0, 1, 0, 2, '', 'inheritFrom=0\ntheme=\nnum_leading_items=1\nnum_leading_columns=1\nleadingImgSize=Small\nnum_primary_items=1\nnum_primary_columns=1\nprimaryImgSize=Medium\nnum_secondary_items=1\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=0\nnum_links_columns=0\nlinksImgSize=XSmall\ncatCatalogMode=1\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=0\ncatTitleItemCounter=0\ncatDescription=1\ncatImage=0\ncatFeedLink=0\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=0\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=1\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=10\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 0, ''),
(17, 'Men''s Fashion', 'mens-fashion', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur  elit vel purus rutrum consectetur. Vestibulum augue sapien, ultricies  vitae placerat vitae, vehicula vel erat.</p>', 16, 1, 1, 0, 2, '17.jpg', 'inheritFrom=19\ntheme=\nnum_leading_items=1\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=1\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=1\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 0, ''),
(18, 'Printers', 'printers', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur  elit vel purus rutrum consectetur. Vestibulum augue sapien, ultricies  vitae placerat vitae, vehicula vel erat.</p>', 16, 1, 0, 0, 3, '18.jpg', 'inheritFrom=0\ntheme=\nnum_leading_items=4\nnum_leading_columns=2\nleadingImgSize=Small\nnum_primary_items=2\nnum_primary_columns=2\nprimaryImgSize=Small\nnum_secondary_items=3\nnum_secondary_columns=3\nsecondaryImgSize=Medium\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=0\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=1\ncatItemAuthor=0\ncatItemDateCreated=0\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=0\ncatItemIntroTextWordLimit=10\ncatItemExtraFields=0\ncatItemHits=1\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, ''),
(19, 'Women''s fashion', 'womens-fashion', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur  elit vel purus rutrum consectetur. Vestibulum augue sapien, ultricies  vitae placerat vitae, vehicula vel erat.</p>', 16, 1, 1, 0, 1, '19.jpg', 'inheritFrom=0\ntheme=\nnum_leading_items=2\nnum_leading_columns=2\nleadingImgSize=Medium\nnum_primary_items=2\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 0, ''),
(20, 'SmartPhones', 'smartphones', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur   elit vel purus rutrum consectetur. Vestibulum augue sapien, ultricies   vitae placerat vitae, vehicula vel erat.</p>', 16, 1, 0, 0, 4, '20.jpg', 'inheritFrom=18\ntheme=\nnum_leading_items=2\nnum_leading_columns=1\nleadingImgSize=Large\nnum_primary_items=4\nnum_primary_columns=2\nprimaryImgSize=Medium\nnum_secondary_items=4\nnum_secondary_columns=1\nsecondaryImgSize=Small\nnum_links=4\nnum_links_columns=1\nlinksImgSize=XSmall\ncatCatalogMode=0\ncatFeaturedItems=1\ncatOrdering=\ncatPagination=2\ncatPaginationResults=1\ncatTitle=1\ncatTitleItemCounter=1\ncatDescription=1\ncatImage=1\ncatFeedLink=1\nsubCategories=1\nsubCatColumns=2\nsubCatOrdering=\nsubCatTitle=1\nsubCatTitleItemCounter=1\nsubCatDescription=1\nsubCatImage=1\nitemImageXS=\nitemImageS=\nitemImageM=\nitemImageL=\nitemImageXL=\ncatItemTitle=1\ncatItemTitleLinked=1\ncatItemFeaturedNotice=0\ncatItemAuthor=1\ncatItemDateCreated=1\ncatItemRating=0\ncatItemImage=1\ncatItemIntroText=1\ncatItemIntroTextWordLimit=\ncatItemExtraFields=0\ncatItemHits=0\ncatItemCategory=1\ncatItemTags=1\ncatItemAttachments=0\ncatItemAttachmentsCounter=0\ncatItemVideo=0\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=0\ncatItemImageGallery=0\ncatItemDateModified=0\ncatItemReadMore=1\ncatItemCommentsAnchor=1\ncatItemK2Plugins=1\nitemDateCreated=1\nitemTitle=1\nitemFeaturedNotice=1\nitemAuthor=1\nitemFontResizer=1\nitemPrintButton=1\nitemEmailButton=1\nitemSocialButton=1\nitemVideoAnchor=1\nitemImageGalleryAnchor=1\nitemCommentsAnchor=1\nitemRating=1\nitemImage=1\nitemImgSize=Large\nitemImageMainCaption=1\nitemImageMainCredits=1\nitemIntroText=1\nitemFullText=1\nitemExtraFields=1\nitemDateModified=1\nitemHits=1\nitemTwitterLink=1\nitemCategory=1\nitemTags=1\nitemShareLinks=1\nitemAttachments=1\nitemAttachmentsCounter=1\nitemRelated=1\nitemRelatedLimit=5\nitemVideo=1\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=0\nitemVideoCaption=1\nitemVideoCredits=1\nitemImageGallery=1\nitemNavigation=1\nitemComments=1\nitemAuthorBlock=1\nitemAuthorImage=1\nitemAuthorDescription=1\nitemAuthorURL=1\nitemAuthorEmail=1\nitemAuthorLatest=1\nitemAuthorLatestLimit=5\nitemK2Plugins=1\n\n', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_comments`
--

CREATE TABLE IF NOT EXISTS `jos_k2_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `commentDate` datetime NOT NULL,
  `commentText` text NOT NULL,
  `commentEmail` varchar(255) NOT NULL,
  `commentURL` varchar(255) NOT NULL,
  `published` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`),
  KEY `userID` (`userID`),
  KEY `published` (`published`),
  KEY `latestComments` (`published`,`commentDate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `jos_k2_comments`
--

INSERT INTO `jos_k2_comments` (`id`, `itemID`, `userID`, `userName`, `commentDate`, `commentText`, `commentEmail`, `commentURL`, `published`) VALUES
(1, 55, 0, 'Robert', '2010-04-20 14:09:29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin est massa, vestibulum in gravida vel, pellentesque vel neque. Phasellus felis mi, dapibus at interdum eu, sagittis quis diam. Donec ullamcorper lacus et nunc porttitor eleifend vitae at quam. Donec tincidunt mauris vel metus tincidunt quis accumsan massa malesuada.', 'robert@robert.pl', '', 1),
(2, 57, 0, 'Daniele', '2010-04-21 22:54:37', 'Extra points for this equipment.', 'dlo@ldodo.tt', '', 1),
(3, 56, 0, 'Mariela Cris', '2010-04-21 23:33:34', 'Have it from 5 month ago and still with no problems at all.', 'grge@geyd.rd', '', 1),
(4, 60, 0, 'Truthy', '2010-04-21 23:59:56', 'Toshiba as been always my first choice. This E205 have a nice performance. I recommend it.', 'getgs@pppl.jd', '', 1),
(5, 63, 0, 'Boss', '2010-04-22 02:29:07', 'Elegance, powerful and really smart phone.\nI like a lot.', 'wrea@oyudf.vkv', '', 1),
(6, 66, 0, 'Kamane', '2010-04-22 14:27:29', 'Amazing image quality. Excellent for both personal or professional production.', 'keke@ldop.yy', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_extra_fields`
--

CREATE TABLE IF NOT EXISTS `jos_k2_extra_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`),
  KEY `published` (`published`),
  KEY `ordering` (`ordering`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `jos_k2_extra_fields`
--

INSERT INTO `jos_k2_extra_fields` (`id`, `name`, `value`, `type`, `group`, `published`, `ordering`) VALUES
(1, 'Name', '[{"name":null,"value":"","target":null}]', 'textfield', 1, 1, 1),
(2, 'Code', '[{"name":null,"value":"","target":null}]', 'textfield', 1, 1, 2),
(3, 'Price', '[{"name":null,"value":"","target":null}]', 'textfield', 1, 1, 4),
(4, 'Description', '[{"name":null,"value":"","target":null}]', 'textarea', 1, 1, 5),
(5, 'Features', '[{"name":null,"value":"","target":null}]', 'textarea', 1, 1, 6),
(7, 'Trademark', '[{"name":null,"value":"","target":null}]', 'textfield', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_extra_fields_groups`
--

CREATE TABLE IF NOT EXISTS `jos_k2_extra_fields_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `jos_k2_extra_fields_groups`
--

INSERT INTO `jos_k2_extra_fields_groups` (`id`, `name`) VALUES
(1, 'Products');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_items`
--

CREATE TABLE IF NOT EXISTS `jos_k2_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `catid` int(11) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `introtext` text NOT NULL,
  `fulltext` text NOT NULL,
  `video` text,
  `gallery` varchar(255) DEFAULT NULL,
  `extra_fields` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `extra_fields_search` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL,
  `checked_out` int(10) unsigned NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL,
  `publish_down` datetime NOT NULL,
  `trash` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `featured` smallint(6) NOT NULL DEFAULT '0',
  `featured_ordering` int(11) NOT NULL DEFAULT '0',
  `image_caption` text NOT NULL,
  `image_credits` varchar(255) NOT NULL,
  `video_caption` text NOT NULL,
  `video_credits` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `params` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `metakey` text NOT NULL,
  `plugins` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item` (`published`,`publish_up`,`publish_down`,`trash`,`access`),
  KEY `catid` (`catid`),
  KEY `created_by` (`created_by`),
  KEY `ordering` (`ordering`),
  KEY `featured` (`featured`),
  KEY `featured_ordering` (`featured_ordering`),
  KEY `hits` (`hits`),
  FULLTEXT KEY `search` (`title`,`introtext`,`fulltext`,`extra_fields_search`,`image_caption`,`image_credits`,`video_caption`,`video_credits`,`metadesc`,`metakey`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `jos_k2_items`
--

INSERT INTO `jos_k2_items` (`id`, `title`, `alias`, `catid`, `published`, `introtext`, `fulltext`, `video`, `gallery`, `extra_fields`, `extra_fields_search`, `created`, `created_by`, `created_by_alias`, `checked_out`, `checked_out_time`, `modified`, `modified_by`, `publish_up`, `publish_down`, `trash`, `access`, `ordering`, `featured`, `featured_ordering`, `image_caption`, `image_credits`, `video_caption`, `video_credits`, `hits`, `params`, `metadesc`, `metadata`, `metakey`, `plugins`) VALUES
(56, 'Pixma MP490', 'pixma-mp490', 18, 1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque.</p>', '', NULL, NULL, '[{"id":"1","value":"Canon Pixma MP490"},{"id":"2","value":"MP490XP90"},{"id":"7","value":"Canon"},{"id":"3","value":"350,00\\u20ac"},{"id":"4","value":"The PIXMA MP490 multifunction printer is a versatile and easy to use, designed to print lab-quality photos. Print directly from a variety of memory cards and preview images on the TFT screen of 4.5 cm."},{"id":"5","value":"Print, Copy and Scan\\r\\nISO Speed 8.4 \\/ 4.8 ipm monochrome \\/ color ESAT\\r\\nPrint resolution of 4800 dpi and ink droplets of 2pl *\\r\\nPhoto 10 x 15 cm in 43 Mon\\r\\nSlots for memory card and TFT screen of 4.5 cm\\r\\nEasy-WebPrint EX\\r\\n1200dpi scanner\\r\\nOutput tray with automatic opening\\r\\nChromaLife100 +"},{"id":"6","value":"3"}]', 'Canon Pixma MP490 MP490XP90 Canon 350,00€ The PIXMA MP490 multifunction printer is a versatile and easy to use, designed to print lab-quality photos. Print directly from a variety of memory cards and preview images on the TFT screen of 4.5 cm. Print, Copy and Scan\r\nISO Speed 8.4 / 4.8 ipm monochrome / color ESAT\r\nPrint resolution of 4800 dpi and ink droplets of 2pl *\r\nPhoto 10 x 15 cm in 43 Mon\r\nSlots for memory card and TFT screen of 4.5 cm\r\nEasy-WebPrint EX\r\n1200dpi scanner\r\nOutput tray with automatic opening\r\nChromaLife100 + White ', '2010-04-21 22:01:44', 62, '', 0, '0000-00-00 00:00:00', '2010-04-21 22:52:41', 62, '2010-04-21 22:01:44', '0000-00-00 00:00:00', 1, 0, 1, 0, 1, '', '', '', '', 14, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(57, 'MFC-790CW', 'mfc-790cw', 18, 1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque. Curabitur sollicitudin vulputate velit tincidunt  euismod.</p>', '', NULL, NULL, '[{"id":"1","value":"MFC-790CW"},{"id":"2","value":"MFC-790CWUTF"},{"id":"7","value":"Brother"},{"id":"3","value":"185,00\\u20ac"},{"id":"4","value":"The MFC-790cw all-in-one includes an easy-to use, intuitive and interactive 4.2\\" TouchScreen. It helps improve your productivity with fast print speeds and 15-sheet maximum capacity auto document feeder. Connecting this machine to multiple users is easy via the wireless (802.11b\\/g) or wired (Ethernet) network connection. It comes with a built-in digital answering machine, full-duplex speaker phone and handset."},{"id":"5","value":"4.2\\u201d TouchScreen Color LCD Display. Easily navigate through the menu by selecting items on screen. Plus, preview faxes, preview\\/enhance\\/edit photos and view help menus.\\r\\nBuilt-in Wireless (802.11b\\/g) and Wired (Ethernet) Interfaces. Allows you to share the all-in-one to print, scan, PC Fax and access your digital camera media cards slots or USB flash memory drive.\\r\\nDigital Answering Machine. Holds up to 29 minutes of messages\\/ 99 messages, full duplex speakerphone and corded handset.\\r\\nFast Color Printing on Demand. With speeds up to 33ppm black and 27ppm color.\\r\\nHigh Quality Printing. With droplet sizes as small as 1.5 picoliters and resolutions as high as 6000 x 1200dpi.\\r\\nUnattended Fax, Copy or Scan. Up to 15-sheet auto document feeder.\\r\\nSend and Receive Faxes. Hi-Speed Super G3 33.6K bps fax modem allows black and white or color faxing with or without a PC.\\r\\nDirect Photo Printing on Demand. Print photos directly from your digital camera''s media card slots, PictBridge-enabled camera, or USB Flash Memory Drive.\\r\\nFlatbed Copying and Scanning."},{"id":"6","value":"2"}]', 'MFC-790CW MFC-790CWUTF Brother 185,00€ The MFC-790cw all-in-one includes an easy-to use, intuitive and interactive 4.2" TouchScreen. It helps improve your productivity with fast print speeds and 15-sheet maximum capacity auto document feeder. Connecting this machine to multiple users is easy via the wireless (802.11b/g) or wired (Ethernet) network connection. It comes with a built-in digital answering machine, full-duplex speaker phone and handset. 4.2” TouchScreen Color LCD Display. Easily navigate through the menu by selecting items on screen. Plus, preview faxes, preview/enhance/edit photos and view help menus.\r\nBuilt-in Wireless (802.11b/g) and Wired (Ethernet) Interfaces. Allows you to share the all-in-one to print, scan, PC Fax and access your digital camera media cards slots or USB flash memory drive.\r\nDigital Answering Machine. Holds up to 29 minutes of messages/ 99 messages, full duplex speakerphone and corded handset.\r\nFast Color Printing on Demand. With speeds up to 33ppm black and 27ppm color.\r\nHigh Quality Printing. With droplet sizes as small as 1.5 picoliters and resolutions as high as 6000 x 1200dpi.\r\nUnattended Fax, Copy or Scan. Up to 15-sheet auto document feeder.\r\nSend and Receive Faxes. Hi-Speed Super G3 33.6K bps fax modem allows black and white or color faxing with or without a PC.\r\nDirect Photo Printing on Demand. Print photos directly from your digital camera''s media card slots, PictBridge-enabled camera, or USB Flash Memory Drive.\r\nFlatbed Copying and Scanning. Black ', '2010-04-21 22:25:43', 62, '', 0, '0000-00-00 00:00:00', '2010-04-21 22:52:56', 62, '2010-04-21 22:25:43', '0000-00-00 00:00:00', 1, 0, 2, 0, 2, '', '', '', '', 5, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(58, 'HP Photosmart', 'hp-photosmart', 18, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque.</p>', '', NULL, NULL, '[{"id":"1","value":"HP Photosmart Premium "},{"id":"2","value":"HP5463"},{"id":"7","value":"HP"},{"id":"3","value":"124,00\\u20ac"},{"id":"4","value":"Print how you want, when you want \\u2013 wirelessly1, from your iPhone\\u21222 and even directly from Snapfish.com3 \\u2013 with this versatile all-in-one. View, edit and print photos \\u2013 scan and copy too \\u2013 via the large HP TouchSmart screen."},{"id":"5","value":"Enjoy a superior HP TouchSmart experience \\u2013 view, edit, print photos without a PC.\\r\\nEnjoy complete connectivity with wireless networking1, iPhone\\u2122 printing2 and more.\\r\\nSave paper, energy and money with resource conserving printing."},{"id":"6","value":"2"}]', 'HP Photosmart Premium  HP5463 HP 124,00€ Print how you want, when you want – wirelessly1, from your iPhone™2 and even directly from Snapfish.com3 – with this versatile all-in-one. View, edit and print photos – scan and copy too – via the large HP TouchSmart screen. Enjoy a superior HP TouchSmart experience – view, edit, print photos without a PC.\r\nEnjoy complete connectivity with wireless networking1, iPhone™ printing2 and more.\r\nSave paper, energy and money with resource conserving printing. Black ', '2010-04-21 23:07:47', 62, '', 0, '0000-00-00 00:00:00', '2010-04-21 23:23:37', 62, '2010-04-21 23:07:47', '0000-00-00 00:00:00', 1, 0, 3, 0, 3, '', '', '', '', 20, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(59, 'Officejet Pro 6500', 'officejet-pro-6500', 18, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque.</p>', '', NULL, NULL, '[{"id":"1","value":"Officejet Pro 6500"},{"id":"2","value":"J6500XX"},{"id":"7","value":"HP"},{"id":"3","value":"197,60\\u20ac"},{"id":"4","value":"All-in-one HP Officejet Pro 6500 is designed for home users or micro \\/ small businesses who want an all-in-one printer, scanner, fax and copier with energy efficiency, network ready for professional results at an exceptionally low cost per page."},{"id":"5","value":"Information quickly (Fast facts)\\r\\nPrint speed (black, draft quality, A4)\\r\\nUp to 32 ppm\\r\\nPrint speed (black, draft quality, A4)\\r\\nUp to 31 ppm\\r\\nPrint quality (black, best quality)\\r\\nUp to 4800 x 1200 optimized dpi color\\r\\nWhen printing from a computer on HP photo papers and 1200 input dpi selected\\r\\nHardware scanning resolution\\r\\nUp to 2400 x 4800 dpi"},{"id":"6","value":"4"}]', 'Officejet Pro 6500 J6500XX HP 197,60€ All-in-one HP Officejet Pro 6500 is designed for home users or micro / small businesses who want an all-in-one printer, scanner, fax and copier with energy efficiency, network ready for professional results at an exceptionally low cost per page. Information quickly (Fast facts)\r\nPrint speed (black, draft quality, A4)\r\nUp to 32 ppm\r\nPrint speed (black, draft quality, A4)\r\nUp to 31 ppm\r\nPrint quality (black, best quality)\r\nUp to 4800 x 1200 optimized dpi color\r\nWhen printing from a computer on HP photo papers and 1200 input dpi selected\r\nHardware scanning resolution\r\nUp to 2400 x 4800 dpi Grey ', '2010-04-21 23:23:42', 62, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2010-04-21 23:23:42', '0000-00-00 00:00:00', 1, 0, 4, 0, 0, '', '', '', '', 28, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(60, 'Calvin Kelin', 'calvin-kelin', 17, 1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor   nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non   luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non   fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis   molestie. Ut et odio at velit eleifend pretium.</p>', '', NULL, NULL, '[{"id":"1","value":"Calvin Klein Sport Collection"},{"id":"2","value":"Calvin Klein"},{"id":"7","value":"Calvin Klein"},{"id":"3","value":"479,00\\u20ac"},{"id":"4","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. "},{"id":"5","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus."}]', 'Calvin Klein Sport Collection Calvin Klein Calvin Klein 479,00€ In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet.  In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus. ', '2010-04-21 23:55:15', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:30:46', 62, '2010-04-21 23:55:15', '0000-00-00 00:00:00', 0, 0, 1, 0, 4, '', '', '', '', 34, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(61, 'Zara Collection', 'zara-collection', 17, 1, '<p><span class="itemImage"><a class="modal" href="../media/k2/items/cache/83c2446a0896df0a1f4af01c940ae1d9_XL.jpg" title="Click to preview image"> </a> </span></p>\r\n<!-- Item text -->\r\n<div class="itemFullText">\r\n<p style="text-align: justify;">Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac  sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit  amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie  pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at  velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec  arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor    nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non    luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non    fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue  mattis   molestie. Ut et odio at velit eleifend pretium.</p>\r\n</div>', '', NULL, NULL, '[{"id":"1","value":"Zara Collection"},{"id":"2","value":"Zara Collection"},{"id":"7","value":"Zara Collection"},{"id":"3","value":"899,00\\u20ac"},{"id":"4","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. "},{"id":"5","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus."}]', 'Zara Collection Zara Collection Zara Collection 899,00€ In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet.  In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus. ', '2010-04-22 00:32:17', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:32:07', 62, '2010-04-22 00:32:17', '0000-00-00 00:00:00', 0, 0, 2, 1, 1, '', '', '', '', 9, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(62, 'Opium Men´s Collection', 'opium-men´s-collection', 17, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu.  Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar  eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit  eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu.  Curabitur eget massa eget ipsum lobortis  mattis nec in neque.</p>', '', NULL, NULL, '[{"id":"1","value":"Opium Men\\u00b4s Collection"},{"id":"2","value":"Opium Men\\u00b4s Collection"},{"id":"7","value":"Opium"},{"id":"3","value":"997,00\\u20ac"},{"id":"4","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. "},{"id":"5","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus."}]', 'Opium Men´s Collection Opium Men´s Collection Opium 997,00€ In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet.  In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus. ', '2010-04-22 00:49:49', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:36:05', 62, '2010-04-22 00:49:49', '0000-00-00 00:00:00', 0, 0, 3, 0, 5, '', '', '', '', 16, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(63, 'Touch Pro2', 'touch-pro2', 20, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque.</p>', '', NULL, NULL, '[{"id":"1","value":"HTC Touch Pro2"},{"id":"2","value":"63GHY99"},{"id":"7","value":"HTC"},{"id":"3","value":"549,00\\u20ac"},{"id":"4","value":"Sometimes your opinion needs to be read, but sometimes it demands to be heard. The Touch Pro2 is equipped with a spacious keyboard that makes it a breeze to get your message out. But when written word is not enough, it only takes one touch to respond to an email with the urgency of a phone call.\\r\\n\\r\\nGet all the key stakeholders involved. If they were in on the email, then simply tap next to their image icon to get them in on the call. The HTC Touch Pro2 helps make it easy to share your ideas with all the people that matter."},{"id":"5","value":"Qualcomm\\u00ae MSM7200A\\u2122, 528 MHz\\r\\nWindows Mobile\\u00ae 6.1 Professional\\r\\nROM: 512 MB\\r\\nRAM: 288 MB\\r\\n116 X 59.2 X 17.25 mm (4.57 X 2.33 X 0.68 polegadas)\\r\\n3.6 inches TFT-LCD touch screen with resolution 480 x 800 WVGA\\r\\nTilt adjustable screen"},{"id":"6","value":"1"}]', 'HTC Touch Pro2 63GHY99 HTC 549,00€ Sometimes your opinion needs to be read, but sometimes it demands to be heard. The Touch Pro2 is equipped with a spacious keyboard that makes it a breeze to get your message out. But when written word is not enough, it only takes one touch to respond to an email with the urgency of a phone call.\r\n\r\nGet all the key stakeholders involved. If they were in on the email, then simply tap next to their image icon to get them in on the call. The HTC Touch Pro2 helps make it easy to share your ideas with all the people that matter. Qualcomm® MSM7200A™, 528 MHz\r\nWindows Mobile® 6.1 Professional\r\nROM: 512 MB\r\nRAM: 288 MB\r\n116 X 59.2 X 17.25 mm (4.57 X 2.33 X 0.68 polegadas)\r\n3.6 inches TFT-LCD touch screen with resolution 480 x 800 WVGA\r\nTilt adjustable screen Red ', '2010-04-22 02:20:33', 62, '', 0, '0000-00-00 00:00:00', '2010-04-22 15:12:15', 62, '2010-04-22 02:20:33', '0000-00-00 00:00:00', 1, 0, 1, 1, 1, '', '', '', '', 23, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(64, 'Blackberry Bold 9700', 'blackberry-bold-9700', 20, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus, dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi, tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget ipsum lobortis  mattis nec in neque.</p>', '', NULL, NULL, '[{"id":"1","value":"Blackberry Bold 9700"},{"id":"2","value":"HFGST89"},{"id":"7","value":"Blackberry"},{"id":"3","value":"650,00\\u20ac"},{"id":"4","value":""},{"id":"5","value":""},{"id":"6","value":"1"}]', 'Blackberry Bold 9700 HFGST89 Blackberry 650,00€   Red ', '2010-04-22 02:59:58', 62, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2010-04-22 02:59:58', '0000-00-00 00:00:00', 1, 0, 2, 0, 7, '', '', '', '', 8, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(65, 'Springfiled Men''s Collection', 'springfiled-mens-collection', 17, 1, '<p><span class="itemImage"><a class="modal" href="../media/k2/items/cache/c3997142576e6f4d163ead570965368d_XL.jpg" title="Click to preview image"> </a> </span></p>\r\n<!-- Item text -->\r\n<div class="itemFullText">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu  dolor  nec velit aliquam iaculis ac sed arcu. Integer nisi lacus,  dapibus non  luctus sed, facilisis sit amet arcu. Praesent augue mi,  tincidunt non  fringilla ornare, molestie pulvinar eros. Nullam ac quam  et augue mattis  molestie. Ut et odio at velit eleifend pretium. Duis eu  est a sem  varius adipiscing in nec arcu. Curabitur eget massa eget  ipsum lobortis  mattis nec in neque. Integer nisi lacus, dapibus non   luctus sed, facilisis sit amet arcu.  Praesent augue mi, tincidunt non   fringilla ornare, molestie pulvinar  eros. Nullam ac quam et augue  mattis  molestie. Ut et odio at velit  eleifend pretium. Duis eu est a  sem  varius adipiscing in nec arcu.  Curabitur eget massa eget ipsum  lobortis  mattis nec in neque.</p>\r\n</div>', '', NULL, NULL, '[{"id":"1","value":"HP Pavilion DV3000"},{"id":"2","value":"8GFE675"},{"id":"7","value":"HP"},{"id":"3","value":"769,00\\u20ac"},{"id":"4","value":"If you are looking for a strong entertainment machine at a reasonable price, the HP Pavilion dv3000 certainly fits the bill nicely. Just be aware that it''s not the lightest or sleekest in its class. "},{"id":"5","value":"2.13GHz Intel Core2 Duo P7450 Processor (3MB L2 Cache, 1066MHz FSB) 4 GB DDR3 RAM (2 Dimm), Max supported 8 GB 500GB (7200RPM) SATA Hard Drive, LightScribe SuperMulti 8X DVD\\u00b1R\\/RW with Double Layer Support 15.6\\" Diagonal High Definition HP LED BrightView Display (1366x768); ATI Mobility Radeon HD 4650 with up to 2.8 GB total available graphics memory with 1 GB dedicated Genuine Windows 7 Home Premium 64-bit, *Up to 3.5 Hours of Battery Life"}]', 'HP Pavilion DV3000 8GFE675 HP 769,00€ If you are looking for a strong entertainment machine at a reasonable price, the HP Pavilion dv3000 certainly fits the bill nicely. Just be aware that it''s not the lightest or sleekest in its class.  2.13GHz Intel Core2 Duo P7450 Processor (3MB L2 Cache, 1066MHz FSB) 4 GB DDR3 RAM (2 Dimm), Max supported 8 GB 500GB (7200RPM) SATA Hard Drive, LightScribe SuperMulti 8X DVD±R/RW with Double Layer Support 15.6" Diagonal High Definition HP LED BrightView Display (1366x768); ATI Mobility Radeon HD 4650 with up to 2.8 GB total available graphics memory with 1 GB dedicated Genuine Windows 7 Home Premium 64-bit, *Up to 3.5 Hours of Battery Life ', '2010-04-22 03:06:41', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:41:24', 62, '2010-04-22 03:06:41', '0000-00-00 00:00:00', 0, 0, 4, 1, 2, '', '', '', '', 131, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(66, 'Independent Women Style', 'independent-women-style', 19, 1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"Independent Women"},{"id":"2","value":"She\\u00b4s Independent"},{"id":"7","value":"Independent Women"},{"id":"3","value":"545,00\\u20ac"},{"id":"4","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. "},{"id":"5","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus."}]', 'Independent Women She´s Independent Independent Women 545,00€ In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet.  In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus. ', '2010-04-22 14:22:04', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:56:46', 62, '2010-04-22 14:22:04', '0000-00-00 00:00:00', 0, 0, 1, 0, 0, '', '', '', '', 19, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(67, 'Exotic Woman Style', 'exotic-style', 19, 1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"What''s this? It''s Fashio"},{"id":"2","value":"UTE9908"},{"id":"7","value":"ExoticW"},{"id":"3","value":"654,90\\u20ac"},{"id":"4","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. "},{"id":"5","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus."}]', 'What''s this? It''s Fashio UTE9908 ExoticW 654,90€ In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet.  In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus. ', '2010-04-22 14:29:42', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:59:06', 62, '2010-04-22 14:29:42', '0000-00-00 00:00:00', 0, 0, 2, 1, 3, '', '', '', '', 7, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(68, 'Relax Woman Style', 'relax-woman-style', 19, 1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"Relax Collection"},{"id":"2","value":"Relax Baby"},{"id":"7","value":"Relax Something"},{"id":"3","value":"534,00\\u20ac"},{"id":"4","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. "},{"id":"5","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus."}]', 'Relax Collection Relax Baby Relax Something 534,00€ In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet.  In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus. ', '2010-04-22 14:33:44', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:59:18', 62, '2010-04-22 14:33:44', '0000-00-00 00:00:00', 0, 0, 3, 0, 0, '', '', '', '', 6, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', '');
INSERT INTO `jos_k2_items` (`id`, `title`, `alias`, `catid`, `published`, `introtext`, `fulltext`, `video`, `gallery`, `extra_fields`, `extra_fields_search`, `created`, `created_by`, `created_by_alias`, `checked_out`, `checked_out_time`, `modified`, `modified_by`, `publish_up`, `publish_down`, `trash`, `access`, `ordering`, `featured`, `featured_ordering`, `image_caption`, `image_credits`, `video_caption`, `video_credits`, `hits`, `params`, `metadesc`, `metadata`, `metakey`, `plugins`) VALUES
(69, 'City Free Style Woman', 'city-free-style-woman', 19, 1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"City Stile Collection"},{"id":"2","value":"City Style 999"},{"id":"7","value":"City Style"},{"id":"3","value":"1.150,00\\u20ac"},{"id":"4","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. "},{"id":"5","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus."}]', 'City Stile Collection City Style 999 City Style 1.150,00€ In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet.  In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus. ', '2010-04-22 14:39:06', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:51:16', 62, '2010-04-22 14:39:06', '0000-00-00 00:00:00', 0, 0, 4, 1, 4, '', '', '', '', 52, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(70, 'Omnia 2', 'omnia-2', 20, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"GT-I8000 Omnia 2"},{"id":"2","value":"TFRP99OX"},{"id":"7","value":"Samsung"},{"id":"3","value":"429,90\\u20ac"},{"id":"4","value":"Samsung\\u2019s Omnia handset was a pretty popular smartphone when it was originally released, but the march of time is never kind to phones so an update is more than a little overdue. With the Omnia II Samsung is hoping to make up for lost time by kitting the handset out with a faster processor, OLED screen and a host of interesting multimedia features. "},{"id":"5","value":"Another issue with OLED screens is that although they look very bright indoors, outdoors their performance isn\\u2019t usually as good as LCD. Thankfully the one Samsung has used here doesn\\u2019t suffer too badly from this issue. Outdoors back to back with an iPhone 2G , the Omnia II doesn\\u2019t look too much darker."},{"id":"6","value":"2"}]', 'GT-I8000 Omnia 2 TFRP99OX Samsung 429,90€ Samsung’s Omnia handset was a pretty popular smartphone when it was originally released, but the march of time is never kind to phones so an update is more than a little overdue. With the Omnia II Samsung is hoping to make up for lost time by kitting the handset out with a faster processor, OLED screen and a host of interesting multimedia features.  Another issue with OLED screens is that although they look very bright indoors, outdoors their performance isn’t usually as good as LCD. Thankfully the one Samsung has used here doesn’t suffer too badly from this issue. Outdoors back to back with an iPhone 2G , the Omnia II doesn’t look too much darker. Black ', '2010-04-22 14:48:52', 62, '', 0, '0000-00-00 00:00:00', '2010-04-22 14:53:09', 62, '2010-04-22 14:48:52', '0000-00-00 00:00:00', 1, 0, 3, 0, 2, '', '', '', '', 7, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(71, 'HTC Hero', 'htc-hero', 20, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"HTC Hero"},{"id":"2","value":"T654GH"},{"id":"7","value":"HTC"},{"id":"3","value":"654,00\\u20ac"},{"id":"4","value":"HTC Hero is our first phone to embody HTC Sense\\u2122 - an intuitive. HTC Hero makes staying close as simple as turning to your friend and saying hello."},{"id":"5","value":"TFT capacitive touchscreen, 65K colors\\r\\nSize 320 x 480 pixels, 3.2 inches - Sense UI - Multi-touch input method - Accelerometer sensor for UI auto-rotate - Trackball.\\r\\n288 MB RAM, 512 MB ROM"},{"id":"6","value":"2"}]', 'HTC Hero T654GH HTC 654,00€ HTC Hero is our first phone to embody HTC Sense™ - an intuitive. HTC Hero makes staying close as simple as turning to your friend and saying hello. TFT capacitive touchscreen, 65K colors\r\nSize 320 x 480 pixels, 3.2 inches - Sense UI - Multi-touch input method - Accelerometer sensor for UI auto-rotate - Trackball.\r\n288 MB RAM, 512 MB ROM Black ', '2010-04-22 14:57:22', 62, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2010-04-22 14:57:22', '0000-00-00 00:00:00', 1, 0, 4, 1, 3, '', '', '', '', 181, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(55, 'Welcome to my Fashion Top Selection', 'welcome-to-my-fashion-top-selection', 15, 1, '<p>Are you comfortable with responsibility and entrepreneurial thinking?  Are you flexible and quick with ideas? In short: would you like to get  things moving in your career? If the answer is yes, then arvato is the  place for you.We offer you the opportunity for professional and  personal advancement, as part of an international team that provides  behind-the-scenes support services to the world’s leading companies.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam risus odio,  fringilla quis rhoncus non, pulvinar ac urna. Maecenas at odio eget  orci porta sodales in a turpis. Duis egestas ornare purus a commodo.  Curabitur lacinia iaculis elementum. Praesent hendrerit iaculis erat et  lobortis. Quisque nec nibh turpis. Aenean mi nulla, commodo vitae  sodales vitae, hendrerit ut dui. Praesent ipsum nisi, suscipit quis  malesuada vel, consectetur ut urna. Vestibulum ante ipsum primis in  faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse  platea dictumst. Nunc neque magna, molestie non euismod quis, pharetra  ac magna. Praesent venenatis elementum justo sed adipiscing. Curabitur  scelerisque ipsum et sem vulputate facilisis. Aenean dignissim, dolor  dignissim dapibus iaculis, massa turpis placerat dolor, a pellentesque  augue ligula in mauris. Vestibulum vitae magna mauris, nec suscipit  magna. Sed vulputate risus turpis, id hendrerit massa. Ut consectetur  laoreet felis, vel pulvinar tellus convallis sit amet.</p>', '', NULL, NULL, '[]', '', '2010-04-20 11:57:47', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 19:05:28', 62, '2010-04-20 11:57:47', '0000-00-00 00:00:00', 0, 0, 1, 0, 0, '', '', '', '', 257, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=0\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=0\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_rating`
--

CREATE TABLE IF NOT EXISTS `jos_k2_rating` (
  `itemID` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_k2_rating`
--

INSERT INTO `jos_k2_rating` (`itemID`, `rating_sum`, `rating_count`, `lastip`) VALUES
(56, 4, 1, '85.139.180.225'),
(57, 5, 1, '85.139.180.225'),
(58, 3, 1, '85.139.180.225'),
(60, 13, 3, '85.139.180.225'),
(61, 4, 1, '85.139.180.225'),
(63, 9, 2, '77.54.121.181'),
(65, 4, 1, '77.54.121.181'),
(62, 4, 1, '77.54.121.181'),
(59, 4, 1, '77.54.121.181'),
(66, 4, 1, '77.54.121.181'),
(68, 3, 1, '77.54.121.181'),
(69, 9, 2, '85.139.180.225'),
(70, 5, 1, '77.54.121.181');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_tags`
--

CREATE TABLE IF NOT EXISTS `jos_k2_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Volcado de datos para la tabla `jos_k2_tags`
--

INSERT INTO `jos_k2_tags` (`id`, `name`, `published`) VALUES
(1, 'About Joomla!', 1),
(2, 'General', 1),
(3, 'Extensions', 1),
(4, 'Careers', 1),
(5, ' job', 1),
(6, 'canon', 1),
(7, 'printer', 1),
(8, 'MFC790CW', 1),
(9, 'BROTHER', 1),
(10, 'HP', 1),
(11, 'Photosmart', 1),
(12, 'Officejet', 1),
(13, 'J6500', 1),
(14, 'Toshiba', 1),
(15, 'Satellite', 1),
(16, 'E205', 1),
(17, 'EasyNote MB85', 1),
(18, 'Packard Bell', 1),
(19, 'Laptop', 1),
(20, 'PAVILION', 1),
(21, 'DV61360US ', 1),
(22, 'HTC', 1),
(23, 'Touch Pro2', 1),
(24, 'Smartphone', 1),
(25, 'Blackberry', 1),
(26, 'Bold 9700', 1),
(27, 'Pavillion', 1),
(28, 'DV3000', 1),
(29, 'Sony', 1),
(30, 'HDRXR550V', 1),
(31, 'camera', 1),
(32, 'HD', 1),
(33, 'SANYO', 1),
(34, 'Xacti VPCCA9', 1),
(35, 'GZHM200N', 1),
(36, 'JVC', 1),
(37, 'HDCTM300ECK', 1),
(38, 'Panasonic', 1),
(39, 'GTI8000 Omnia 2', 1),
(40, 'Samsung', 1),
(41, 'HTC Hero', 1),
(42, 'Android', 1),
(43, 'city', 1),
(44, 'women', 1),
(45, 'style', 1),
(46, 'Exotic', 1),
(47, 'Calvin Kelin', 1),
(48, 'collection', 1),
(49, 'fashion', 1),
(50, 'zara', 1),
(51, 'Opium', 1),
(52, 'springfield', 1),
(53, 'Relax', 1),
(54, 'Independent', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_tags_xref`
--

CREATE TABLE IF NOT EXISTS `jos_k2_tags_xref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagID` (`tagID`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=200 ;

--
-- Volcado de datos para la tabla `jos_k2_tags_xref`
--

INSERT INTO `jos_k2_tags_xref` (`id`, `tagID`, `itemID`) VALUES
(36, 9, 57),
(33, 7, 56),
(32, 6, 56),
(35, 8, 57),
(34, 7, 57),
(48, 11, 58),
(47, 10, 58),
(46, 7, 58),
(49, 10, 59),
(50, 12, 59),
(51, 13, 59),
(52, 7, 59),
(173, 48, 61),
(172, 49, 61),
(171, 50, 61),
(170, 49, 60),
(169, 48, 60),
(168, 47, 60),
(179, 51, 62),
(178, 49, 62),
(177, 48, 62),
(98, 24, 63),
(97, 23, 63),
(96, 22, 63),
(65, 25, 64),
(66, 26, 64),
(67, 24, 64),
(182, 48, 65),
(181, 49, 65),
(180, 52, 65),
(192, 54, 66),
(191, 49, 66),
(190, 44, 66),
(199, 53, 68),
(195, 46, 67),
(194, 45, 67),
(193, 44, 67),
(198, 49, 68),
(197, 48, 68),
(196, 44, 68),
(185, 45, 69),
(184, 44, 69),
(183, 43, 69),
(92, 40, 70),
(91, 39, 70),
(90, 24, 70),
(93, 41, 71),
(94, 24, 71),
(95, 42, 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_users`
--

CREATE TABLE IF NOT EXISTS `jos_k2_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `gender` enum('m','f') NOT NULL DEFAULT 'm',
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `group` int(11) NOT NULL DEFAULT '0',
  `plugins` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `group` (`group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `jos_k2_users`
--

INSERT INTO `jos_k2_users` (`id`, `userID`, `userName`, `gender`, `description`, `image`, `url`, `group`, `plugins`) VALUES
(1, 62, 'Administrator', 'f', 'Rachel is based near Berlin and is the Web Editor for Corporate 2. She is  the founder of Corporate 2  and enjoys all things internet.', '1.jpg', '', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_k2_user_groups`
--

CREATE TABLE IF NOT EXISTS `jos_k2_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `jos_k2_user_groups`
--

INSERT INTO `jos_k2_user_groups` (`id`, `name`, `permissions`) VALUES
(1, 'Registered', 'frontEdit=0\nadd=0\neditOwn=0\neditAll=0\npublish=0\ncomment=1\ninheritance=0\ncategories=all\n\n'),
(2, 'Site Owner', 'frontEdit=1\nadd=1\neditOwn=1\neditAll=1\npublish=1\ncomment=1\ninheritance=1\ncategories=all\n\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_menu`
--

CREATE TABLE IF NOT EXISTS `jos_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text,
  `type` varchar(50) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `componentid` int(11) unsigned NOT NULL DEFAULT '0',
  `sublevel` int(11) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL DEFAULT '0',
  `browserNav` tinyint(4) DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `utaccess` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL DEFAULT '0',
  `rgt` int(11) unsigned NOT NULL DEFAULT '0',
  `home` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Volcado de datos para la tabla `jos_menu`
--

INSERT INTO `jos_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(1, 'mainmenu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'num_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=ViDeOs y GaRaBaToS\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 1),
(2, 'mainmenu', 'Joomla! License', 'joomla-license', 'index.php?option=com_content&view=article&id=5', 'component', -2, 0, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=0\nshow_title=\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(11, 'othermenu', 'Joomla! Home', 'joomla-home', 'http://www.joomla.org', 'url', 1, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(12, 'othermenu', 'Joomla! Forums', 'joomla-forums', 'http://forum.joomla.org', 'url', 1, 0, 0, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(13, 'othermenu', 'Joomla! Documentation', 'joomla-documentation', 'http://docs.joomla.org', 'url', 1, 0, 0, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(14, 'othermenu', 'Joomla! Community', 'joomla-community', 'http://community.joomla.org', 'url', 1, 0, 0, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(15, 'othermenu', 'Joomla! Magazine', 'joomla-community-magazine', 'http://community.joomla.org/magazine.html', 'url', 1, 0, 0, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(16, 'othermenu', 'OSM Home', 'osm-home', 'http://www.opensourcematters.org', 'url', 1, 0, 0, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 6, 'menu_image=-1\n\n', 0, 0, 0),
(17, 'othermenu', 'Administrator', 'administrator', 'administrator/', 'url', 1, 0, 0, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(18, 'topmenu', 'News', 'news', 'index.php?option=com_newsfeeds&view=newsfeed&id=1&feedid=1', 'component', 1, 0, 11, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_page_title=1\npage_title=News\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 0, 0, 0),
(20, 'usermenu', 'Your Details', 'your-details', 'index.php?option=com_user&view=user&task=edit', 'component', 1, 0, 14, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 1, 3, '', 0, 0, 0),
(24, 'usermenu', 'Logout', 'logout', 'index.php?option=com_user&view=login', 'component', 1, 0, 14, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 1, 3, '', 0, 0, 0),
(38, 'keyconcepts', 'Garabacuentos', 'garabacuentos', 'index.php?option=com_content&view=article&id=51', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=0\nshow_title=\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(28, 'topmenu', 'About Joomla!', 'about-joomla', 'index.php?option=com_content&view=article&id=25', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(29, 'topmenu', 'Features', 'features', 'index.php?option=com_content&view=article&id=22', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(30, 'topmenu', 'The Community', 'the-community', 'index.php?option=com_content&view=article&id=27', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(40, 'keyconcepts', 'Juegos', 'juegos', 'index.php?option=com_content&view=article&id=52', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=0\nshow_title=\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(43, 'keyconcepts', 'Example Pages', 'example-pages', 'index.php?option=com_content&view=article&id=43', 'component', 0, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(44, 'ExamplePages', 'Section Blog', 'section-blog', 'index.php?option=com_content&view=section&layout=blog&id=3', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Section Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(45, 'ExamplePages', 'Section Table', 'section-table', 'index.php?option=com_content&view=section&id=3', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Table Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nnlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(46, 'ExamplePages', 'Category Blog', 'categoryblog', 'index.php?option=com_content&view=category&layout=blog&id=31', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Blog layout (FAQs/General category)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(47, 'ExamplePages', 'Category Table', 'category-table', 'index.php?option=com_content&view=category&id=32', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Table layout (FAQs/Languages category)\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(51, 'usermenu', 'Submit an Article', 'submit-an-article', 'index.php?option=com_content&view=article&layout=form', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(52, 'usermenu', 'Submit a Web Link', 'submit-a-web-link', 'index.php?option=com_weblinks&view=weblink&layout=form', 'component', 1, 0, 4, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(61, 'mainmenu', 'Dummy item', 'dummy-item', '#', 'url', -2, 0, 0, 3, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(63, 'footer-menu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 14, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_page_title=1\npage_title=Welcome to the Frontpage\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=front\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(65, 'footer-menu', 'FAQ', 'faq', 'index.php?option=com_content&view=section&id=3', 'component', 1, 0, 20, 0, 15, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(70, 'footer-menu', 'News Feeds', 'news-feeds', 'index.php?option=com_newsfeeds&view=categories', 'component', 1, 0, 11, 0, 16, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Newsfeeds\nshow_comp_description=1\ncomp_description=\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 0, 0, 0),
(71, 'footer-menu', 'The News', 'the-news', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 0, 20, 0, 17, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=The News\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(72, 'footer-menu', 'Typography', 'typography', 'index.php?option=com_content&view=article&id=46', 'component', 1, 0, 20, 0, 18, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(73, 'footer-menu', 'Modules Positions', 'modules-positions', 'index.php?option=com_content&view=article&id=47', 'component', 1, 0, 20, 0, 19, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(83, 'mainmenu', 'Template', 'template', '#', 'url', 1, 0, 0, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(84, 'mainmenu', 'Module positions', 'module-positions', 'index.php?option=com_content&view=article&id=47', 'component', 1, 83, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(85, 'mainmenu', 'Module variations', 'module-variations', 'index.php?option=com_content&view=article&id=53', 'component', 1, 83, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(116, 'mainmenu', '3rd party extensions', '3rd-party-extensions', '#', 'url', 1, 0, 0, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(86, 'mainmenu', 'Typography', 'typography', 'index.php?option=com_content&view=article&id=46', 'component', 1, 83, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(87, 'mainmenu', 'Layouts', 'layouts', '#', 'url', 1, 83, 0, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(88, 'mainmenu', 'IE6 style', 'ie6-style', 'index.php?option=com_content&view=article&id=54', 'component', 1, 87, 20, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(89, 'mainmenu', 'Messages', 'messages', 'index.php?option=com_content&view=article&id=55', 'component', 1, 87, 20, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(91, 'mainmenu', 'Chrome Frame', 'chrome-frame', 'index.php?option=com_content&view=article&id=56', 'component', 1, 87, 20, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(92, 'mainmenu', 'Joomla! pages', 'joomla-pages', 'index.php?option=com_content&view=article&id=47', 'component', 1, 0, 20, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(93, 'mainmenu', 'Poll', 'poll', 'index.php?option=com_poll&view=poll&id=14', 'component', 1, 92, 10, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(94, 'mainmenu', 'Search', 'search', 'index.php?option=com_search&view=search', 'component', 1, 92, 15, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'search_areas=1\nshow_date=\nenabled=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(95, 'mainmenu', 'Wrapper', 'wrapper', 'index.php?option=com_wrapper&view=wrapper', 'component', 1, 92, 17, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'url=http://www.gavick.com/\nscrolling=auto\nwidth=100%\nheight=500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(96, 'mainmenu', 'System', 'system', 'index.php?option=com_content&view=article&id=47', 'component', 1, 0, 20, 0, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(97, 'mainmenu', 'Error 404', 'error-404', '?option=XXX&Itemid=80', 'url', 1, 96, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(98, 'mainmenu', 'offline', 'offline', '?tmpl=offline', 'url', 1, 96, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(99, 'mainmenu', 'Menu types', 'menu-types', 'index.php?option=com_content&view=article&id=47', 'component', 1, 0, 20, 0, 9, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(100, 'mainmenu', 'Mega menu', 'mega-menu', '?gk_menu=mega', 'url', 1, 99, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(101, 'mainmenu', 'Moo menu', 'moo-menu', '?gk_menu=moo', 'url', 1, 99, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(102, 'mainmenu', 'Split menu', 'split-menu', '?gk_menu=split', 'url', 1, 99, 0, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(103, 'mainmenu', 'Dropline menu', 'dropline-menu', '?gk_menu=dropline', 'url', 1, 99, 0, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(104, 'mainmenu', 'CSS menu', 'css-menu', '?gk_menu=css', 'url', 1, 99, 0, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(105, 'mainmenu', 'Web links', 'web-links', '#', 'url', 1, 92, 0, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(106, 'mainmenu', 'Web links category', 'web-links-category', 'index.php?option=com_weblinks&view=category&id=2', 'component', 1, 105, 4, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_feed_link=0\nshow_comp_description=\ncomp_description=\nshow_link_hits=\nshow_link_description=\nshow_other_cats=\nshow_headings=1\ntarget=\nlink_icons=-1\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(107, 'mainmenu', 'Web links category list', 'web-links-category-list', 'index.php?option=com_weblinks&view=category&id=2', 'component', 1, 105, 4, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_feed_link=1\nshow_comp_description=\ncomp_description=\nshow_link_hits=\nshow_link_description=\nshow_other_cats=\nshow_headings=\ntarget=\nlink_icons=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(108, 'mainmenu', 'Web links submission', 'web-links-submission', 'index.php?option=com_weblinks&view=weblink&layout=form', 'component', 1, 105, 4, 2, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_comp_description=\ncomp_description=\nshow_link_hits=\nshow_link_description=\nshow_other_cats=\nshow_headings=\ntarget=\nlink_icons=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(109, 'mainmenu', 'News feeds', 'news-feeds', '#', 'url', 1, 92, 0, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(110, 'mainmenu', 'News feeds category list', 'news-feeds-category-list', 'index.php?option=com_newsfeeds&view=categories', 'component', 1, 109, 11, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_limit=1\nshow_comp_description=1\ncomp_description=\nimage=-1\nimage_align=right\nshow_headings=\nshow_name=\nshow_articles=\nshow_link=\nshow_cat_description=\nshow_cat_items=\nshow_feed_image=\nshow_feed_description=\nshow_item_description=\nfeed_word_count=0\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(111, 'mainmenu', 'News feeds category', 'news-feeds-category', 'index.php?option=com_newsfeeds&view=category&id=4', 'component', 1, 109, 11, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_limit=1\nshow_headings=\nshow_name=\nshow_articles=\nshow_link=\nshow_cat_description=\nshow_cat_items=\nshow_feed_image=\nshow_feed_description=\nshow_item_description=\nfeed_word_count=0\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(112, 'mainmenu', 'News feeds feed', 'news-feeds-feed', 'index.php?option=com_newsfeeds&view=newsfeed&id=1', 'component', 1, 109, 11, 2, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_headings=\nshow_name=\nshow_articles=\nshow_link=\nshow_cat_description=\nshow_cat_items=\nshow_feed_image=\nshow_feed_description=\nshow_item_description=\nfeed_word_count=0\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(113, 'mainmenu', 'Contacts', 'contacts', '#', 'url', 1, 92, 0, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(114, 'mainmenu', 'Contact category', 'contact-category', 'index.php?option=com_contact&view=category&catid=0', 'component', 1, 113, 7, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=20\nimage=-1\nimage_align=right\nshow_limit=0\nshow_feed_link=1\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=\nshow_position=\nshow_email=\nshow_telephone=\nshow_mobile=\nshow_fax=\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(115, 'mainmenu', 'Contact single', 'contact-single', 'index.php?option=com_contact&view=contact&id=1', 'component', 1, 113, 7, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_contact_list=0\nshow_category_crumb=0\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=\nshow_position=\nshow_email=\nshow_telephone=\nshow_mobile=\nshow_fax=\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(117, 'mainmenu', 'K2', 'k2', 'http://getk2.org/', 'url', 1, 116, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(118, 'mainmenu', 'JComments', 'jcomments', 'index.php?option=com_content&view=article&id=51', 'component', 1, 116, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(119, 'mainmenu', 'JomSocial', 'jomsocial', 'index.php?option=com_community&view=frontpage', 'component', -2, 0, 45, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(121, 'mainmenu', 'Item', 'item', 'index.php?option=com_k2&view=item&layout=item&id=55', 'component', 1, 117, 65, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(122, 'mainmenu', 'Categories', 'categories', 'index.php?option=com_k2&view=itemlist&layout=category&task=category&id=16', 'component', 1, 117, 65, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'categories=16\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(123, 'mainmenu', 'Men''s Fashion', 'mens-fashion', 'index.php?option=com_k2&view=itemlist&layout=category&task=category&id=17', 'component', 1, 122, 65, 3, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'categories=17\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(124, 'mainmenu', 'Tag', 'tag', 'index.php?option=com_k2&view=itemlist&layout=generic&tag=collection&task=tag', 'component', 1, 117, 65, 2, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'categoriesFilter=15|9|11|10|12|16|19|17|1|2|3|4|7|5|6|8|13|14\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(125, 'mainmenu', 'Women''s fashion', 'womens-fashion', 'index.php?option=com_k2&view=itemlist&layout=category&task=category&id=19', 'component', 1, 122, 65, 3, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'categories=19\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(128, 'mainmenu', 'User', 'user', 'index.php?option=com_k2&view=itemlist&layout=user&id=62&task=user', 'component', 1, 117, 65, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(130, 'usermenu', 'VDIEO PRUEBA', 'vdieo-prueba', 'index.php?option=com_content&view=article&id=57', 'component', 0, 0, 20, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(131, 'usermenu', 'Acceder', 'acceder', 'index.php?option=com_user&view=login', 'component', 0, 0, 14, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_login_title=1\nheader_login=\nlogin=\nlogin_message=0\ndescription_login=0\ndescription_login_text=\nimage_login=-1\nimage_login_align=right\nshow_logout_title=1\nheader_logout=\nlogout=\nlogout_message=1\ndescription_logout=1\ndescription_logout_text=\nimage_logout=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(132, 'usermenu', 'REgistrarse', 'registrarse', 'index.php?option=com_user&view=register', 'component', 0, 0, 14, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(133, 'keyconcepts', 'catalogo', 'catalogo', 'index.php?option=com_content&view=article&id=58', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_menu_types`
--

CREATE TABLE IF NOT EXISTS `jos_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `jos_menu_types`
--

INSERT INTO `jos_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'usermenu', 'User Menu', 'A Menu for logged in Users'),
(3, 'topmenu', 'Top Menu', 'Top level navigation'),
(4, 'othermenu', 'Resources', 'Additional links'),
(5, 'ExamplePages', 'Example Pages', 'Example Pages'),
(6, 'keyconcepts', 'Key Concepts', 'This describes some critical information for new Users.'),
(7, 'footer-menu', 'footer menu', 'Menu visible in footer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_messages`
--

CREATE TABLE IF NOT EXISTS `jos_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` int(11) NOT NULL DEFAULT '0',
  `priority` int(1) unsigned NOT NULL DEFAULT '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_messages_cfg`
--

CREATE TABLE IF NOT EXISTS `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_migration_backlinks`
--

CREATE TABLE IF NOT EXISTS `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_modules`
--

CREATE TABLE IF NOT EXISTS `jos_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) DEFAULT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `numnews` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `control` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Volcado de datos para la tabla `jos_modules`
--

INSERT INTO `jos_modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES
(2, 'Login', '', 1, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, '', 1, 1, ''),
(3, 'Popular', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_popular', 0, 2, 1, '', 0, 1, ''),
(4, 'Recent added Articles', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 2, 1, 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', 0, 1, ''),
(5, 'Menu Stats', '', 5, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 2, 1, '', 0, 1, ''),
(6, 'Unread Messages', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_unread', 0, 2, 1, '', 1, 1, ''),
(7, 'Online Users', '', 2, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_online', 0, 2, 1, '', 1, 1, ''),
(8, 'Toolbar', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 2, 1, '', 1, 1, ''),
(9, 'Quick Icons', '', 1, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicon', 0, 2, 1, '', 1, 1, ''),
(10, 'Logged in Users', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_logged', 0, 2, 1, '', 0, 1, ''),
(11, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, '', 1, 1, ''),
(12, 'Admin Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 1, 'mod_menu', 0, 2, 1, '', 0, 1, ''),
(13, 'Admin SubMenu', '', 1, 'submenu', 0, '0000-00-00 00:00:00', 1, 'mod_submenu', 0, 2, 1, '', 0, 1, ''),
(14, 'User Status', '', 1, 'status', 0, '0000-00-00 00:00:00', 1, 'mod_status', 0, 2, 1, '', 0, 1, ''),
(15, 'Title', '', 1, 'title', 0, '0000-00-00 00:00:00', 1, 'mod_title', 0, 2, 1, '', 0, 1, ''),
(41, 'Welcome to Joomla!', '<div style="padding: 5px">  <p>   Congratulations on choosing Joomla! as your content management system. To   help you get started, check out these excellent resources for securing your   server and pointers to documentation and other helpful resources. </p> <p>   <strong>Security</strong><br /> </p> <p>   On the Internet, security is always a concern. For that reason, you are   encouraged to subscribe to the   <a href="http://feedburner.google.com/fb/a/mailverify?uri=JoomlaSecurityNews" target="_blank">Joomla!   Security Announcements</a> for the latest information on new Joomla! releases,   emailed to you automatically. </p> <p>   If this is one of your first Web sites, security considerations may   seem complicated and intimidating. There are three simple steps that go a long   way towards securing a Web site: (1) regular backups; (2) prompt updates to the   <a href="http://www.joomla.org/download.html" target="_blank">latest Joomla! release;</a> and (3) a <a href="http://docs.joomla.org/Security_Checklist_2_-_Hosting_and_Server_Setup" target="_blank" title="good Web host">good Web host</a>. There are many other important security considerations that you can learn about by reading the <a href="http://docs.joomla.org/Category:Security_Checklist" target="_blank" title="Joomla! Security Checklist">Joomla! Security Checklist</a>. </p> <p>If you believe your Web site was attacked, or you think you have discovered a security issue in Joomla!, please do not post it in the Joomla! forums. Publishing this information could put other Web sites at risk. Instead, report possible security vulnerabilities to the <a href="http://developer.joomla.org/security/contact-the-team.html" target="_blank" title="Joomla! Security Task Force">Joomla! Security Task Force</a>.</p><p><strong>Learning Joomla!</strong> </p> <p>   A good place to start learning Joomla! is the   "<a href="http://docs.joomla.org/beginners" target="_blank">Absolute Beginner''s   Guide to Joomla!.</a>" There, you will find a Quick Start to Joomla!   <a href="http://help.joomla.org/ghop/feb2008/task048/joomla_15_quickstart.pdf" target="_blank">guide</a>   and <a href="http://help.joomla.org/ghop/feb2008/task167/index.html" target="_blank">video</a>,   amongst many other tutorials. The   <a href="http://community.joomla.org/magazine/view-all-issues.html" target="_blank">Joomla!   Community Magazine</a> also has   <a href="http://community.joomla.org/magazine/article/522-introductory-learning-joomla-using-sample-data.html" target="_blank">articles   for new learners</a> and experienced users, alike. A great place to look for   answers is the   <a href="http://docs.joomla.org/Category:FAQ" target="_blank">Frequently Asked   Questions (FAQ)</a>. If you are stuck on a particular screen in the   Administrator (which is where you are now), try clicking the Help toolbar   button to get assistance specific to that page. </p> <p>   If you still have questions, please feel free to use the   <a href="http://forum.joomla.org/" target="_blank">Joomla! Forums.</a> The forums   are an incredibly valuable resource for all levels of Joomla! users. Before   you post a question, though, use the forum search (located at the top of each   forum page) to see if the question has been asked and answered. </p> <p>   <strong>Getting Involved</strong> </p> <p>   <a name="twjs" title="twjs"></a> If you want to help make Joomla! better, consider getting   involved. There are   <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank">many ways   you can make a positive difference.</a> Have fun using Joomla!.</p></div>', 0, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 2, 1, 'moduleclass_sfx=\n\n', 1, 1, ''),
(42, 'Joomla! Security Newsfeed', '', 6, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_feed', 0, 0, 1, 'cache=1\ncache_time=15\nmoduleclass_sfx=\nrssurl=http://feeds.joomla.org/JoomlaSecurityNews\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=1\nrssitems=1\nrssitemdesc=1\nword_count=0\n\n', 0, 1, ''),
(79, 'K2 QuickIcons (admin)', '', 99, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_k2_quickicons', 0, 2, 1, 'modCSSStyling=1\nmodLogo=1\n', 0, 1, ''),
(116, 'ANIMACION PRINCIPAL', '', 0, 'header1', 0, '0000-00-00 00:00:00', 1, 'mod_flashw3c', 0, 0, 0, 'moduleclass_sfx=clear\nfm_path=images/flash/\nfm_source=anime.swf\nfm_width=996\nfm_height=400\nfm_version=8.0.22.0\nfm_quality=best\nfm_loop=yes\nfm_menu=yes\nfm_wmode=transparent\n\n', 0, 0, ''),
(117, 'CREDITOS', '<table border="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td style="padding-left: 60px;">Contáctenos a: gerencia@videoexpress.org  Tel.: (57 1) 526 9007 • Cel.: 312 4907879  Bogotá - Colombia • © VideoExpress.org. 2011                     <img src="images/stories/creditos.png" border="0" alt="Mm Design" width="25" height="21" /></td>\r\n<td>\r\n<object style="width: 150px; height: 30px;" width="150" height="30" data="images/flash/sonido.swf" type="application/x-shockwave-flash">\r\n<param name="quality" value="high" />\r\n<param name="src" value="images/flash/sonido.swf" />\r\n</object>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 0, 'footnav', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(118, 'Juegos / Garabacuentos / Videos', '<table border="0">\r\n<tbody>\r\n<tr>\r\n<td><a href="index.php?option=com_content&amp;view=article&amp;id=52&amp;Itemid=40"><img src="images/stories/demo/img3.jpg" border="0" alt="Juegos" width="257" height="200" /></a></td>\r\n<td style="padding-left: 60px;"></td>\r\n<td><a href="index.php?option=com_content&amp;view=article&amp;id=58&amp;Itemid=133"><img src="images/stories/demo/img1.jpg" border="0" alt="Videos" width="238" height="200" /></a></td>\r\n<td style="padding-left: 60px;"></td>\r\n<td><a href="index.php?option=com_content&amp;view=article&amp;id=51&amp;Itemid=38"><img src="images/stories/demo/img2.jpg" border="0" alt="Gabaracuentos" width="269" height="200" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>', 0, 'bottom9', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 0, 'moduleclass_sfx=\n\n', 0, 0, ''),
(120, 'HEADER', '<p><img src="images/imagenes/cabezoteint.png" border="0" alt="Videos y Garabatos" width="996" height="132" style="border: 0px none currentColor;" /></p>', 0, 'garabatos', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 0, 'moduleclass_sfx=\n\n', 0, 0, ''),
(121, 'Menu Videos', '', 0, 'right_top', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 0, 'menutype=keyconcepts\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_modules_menu`
--

CREATE TABLE IF NOT EXISTS `jos_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_modules_menu`
--

INSERT INTO `jos_modules_menu` (`moduleid`, `menuid`) VALUES
(79, 0),
(116, 1),
(117, 0),
(118, 1),
(120, 11),
(120, 12),
(120, 13),
(120, 14),
(120, 15),
(120, 16),
(120, 17),
(120, 18),
(120, 20),
(120, 24),
(120, 28),
(120, 29),
(120, 30),
(120, 38),
(120, 40),
(120, 43),
(120, 44),
(120, 45),
(120, 46),
(120, 47),
(120, 51),
(120, 52),
(120, 63),
(120, 65),
(120, 70),
(120, 71),
(120, 72),
(120, 73),
(120, 83),
(120, 84),
(120, 85),
(120, 86),
(120, 87),
(120, 88),
(120, 89),
(120, 91),
(120, 92),
(120, 93),
(120, 94),
(120, 95),
(120, 96),
(120, 97),
(120, 98),
(120, 99),
(120, 100),
(120, 101),
(120, 102),
(120, 103),
(120, 104),
(120, 105),
(120, 106),
(120, 107),
(120, 108),
(120, 109),
(120, 110),
(120, 111),
(120, 112),
(120, 113),
(120, 114),
(120, 115),
(120, 116),
(120, 117),
(120, 118),
(120, 121),
(120, 122),
(120, 123),
(120, 124),
(120, 125),
(120, 128),
(121, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_newsfeeds`
--

CREATE TABLE IF NOT EXISTS `jos_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text NOT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(11) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(11) unsigned NOT NULL DEFAULT '3600',
  `checked_out` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `jos_newsfeeds`
--

INSERT INTO `jos_newsfeeds` (`catid`, `id`, `name`, `alias`, `link`, `filename`, `published`, `numarticles`, `cache_time`, `checked_out`, `checked_out_time`, `ordering`, `rtl`) VALUES
(4, 1, 'Joomla! Announcements', 'joomla-official-news', 'http://feeds.joomla.org/JoomlaAnnouncements', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(4, 2, 'Joomla! Core Team Blog', 'joomla-core-team-blog', 'http://feeds.joomla.org/JoomlaCommunityCoreTeamBlog', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(4, 3, 'Joomla! Community Magazine', 'joomla-community-magazine', 'http://feeds.joomla.org/JoomlaMagazine', '', 1, 20, 3600, 0, '0000-00-00 00:00:00', 3, 0),
(4, 4, 'Joomla! Developer News', 'joomla-developer-news', 'http://feeds.joomla.org/JoomlaDeveloper', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0),
(4, 5, 'Joomla! Security News', 'joomla-security-news', 'http://feeds.joomla.org/JoomlaSecurityNews', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 5, 0),
(5, 6, 'Free Software Foundation Blogs', 'free-software-foundation-blogs', 'http://www.fsf.org/blogs/RSS', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0),
(5, 7, 'Free Software Foundation', 'free-software-foundation', 'http://www.fsf.org/news/RSS', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 3, 0),
(5, 8, 'Software Freedom Law Center Blog', 'software-freedom-law-center-blog', 'http://www.softwarefreedom.org/feeds/blog/', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(5, 9, 'Software Freedom Law Center News', 'software-freedom-law-center', 'http://www.softwarefreedom.org/feeds/news/', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(5, 10, 'Open Source Initiative Blog', 'open-source-initiative-blog', 'http://www.opensource.org/blog/feed', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 5, 0),
(6, 11, 'PHP News and Announcements', 'php-news-and-announcements', 'http://www.php.net/feed.atom', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(6, 12, 'Planet MySQL', 'planet-mysql', 'http://www.planetmysql.org/rss20.xml', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(6, 13, 'Linux Foundation Announcements', 'linux-foundation-announcements', 'http://www.linuxfoundation.org/press/rss20.xml', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 3, 0),
(6, 14, 'Mootools Blog', 'mootools-blog', 'http://feeds.feedburner.com/mootools-blog', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_plugins`
--

CREATE TABLE IF NOT EXISTS `jos_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `element` varchar(100) NOT NULL DEFAULT '',
  `folder` varchar(100) NOT NULL DEFAULT '',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `iscore` tinyint(3) NOT NULL DEFAULT '0',
  `client_id` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `jos_plugins`
--

INSERT INTO `jos_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Authentication - Joomla', 'joomla', 'authentication', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(2, 'Authentication - LDAP', 'ldap', 'authentication', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
(3, 'Authentication - GMail', 'gmail', 'authentication', 0, 4, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(4, 'Authentication - OpenID', 'openid', 'authentication', 0, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(5, 'User - Joomla!', 'joomla', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'autoregister=1\n\n'),
(6, 'Search - Content', 'content', 'search', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
(7, 'Search - Contacts', 'contacts', 'search', 0, 3, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(8, 'Search - Categories', 'categories', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(9, 'Search - Sections', 'sections', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(10, 'Search - Newsfeeds', 'newsfeeds', 'search', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(11, 'Search - Weblinks', 'weblinks', 'search', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(12, 'Content - Pagebreak', 'pagebreak', 'content', 0, 10000, 1, 1, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
(13, 'Content - Rating', 'vote', 'content', 0, 4, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Content - Email Cloaking', 'emailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'mode=1\n\n'),
(15, 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', 0, 5, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(16, 'Content - Load Module', 'loadmodule', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n'),
(17, 'Content - Page Navigation', 'pagenavigation', 'content', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'position=1\n\n'),
(18, 'Editor - No Editor', 'none', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(19, 'Editor - TinyMCE', 'tinymce', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 'mode=extended\nskin=0\ncompressed=0\ncleanup_startup=0\ncleanup_save=2\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=0\nvisualchars=1\nnonbreaking=1\nblockquote=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=0\ncontextmenu=1\ninlinepopups=1\nsafari=0\ncustom_plugin=\ncustom_button=\n\n'),
(20, 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(21, 'Editor Button - Image', 'image', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(22, 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(23, 'Editor Button - Readmore', 'readmore', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(24, 'XML-RPC - Joomla', 'joomla', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(25, 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n'),
(27, 'System - SEF', 'sef', 'system', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(28, 'System - Debug', 'debug', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n'),
(29, 'System - Legacy', 'legacy', 'system', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', 'route=0\n\n'),
(30, 'System - Cache', 'cache', 'system', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n'),
(31, 'System - Log', 'log', 'system', 0, 5, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(32, 'System - Remember Me', 'remember', 'system', 0, 6, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(33, 'System - Backlink', 'backlink', 'system', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(34, 'Button - GK Typography', 'gk_typography', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(51, 'System - K2', 'k2', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(50, 'Search - K2', 'k2', 'search', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n'),
(57, 'Content - JComments', 'jcomments', 'content', 0, 10001, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(52, 'User - K2', 'k2', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(54, 'JA Menu Parameters', 'plg_jamenuparams', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(55, 'JComments - Avatar', 'jcomments.avatar', 'jcomments', 0, 0, 1, 0, 0, 62, '2011-01-20 18:58:46', 'avatar_type=gravatar\navatar_noavatar=default\navatar_link_target=_blank\n'),
(59, 'System - JComments', 'jcomments', 'system', 0, 8, 1, 0, 0, 0, '0000-00-00 00:00:00', 'disable_template_css=0\n\n'),
(60, 'Editor Button - JComments ON', 'jcommentson', 'editors-xtd', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(61, 'Editor Button - JComments OFF', 'jcommentsoff', 'editors-xtd', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(62, 'User - JComments', 'jcomments', 'user', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(58, 'Search - JComments', 'jcomments', 'search', 0, 7, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(63, 'System - Mootools Upgrade', 'mtupgrade', 'system', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_polls`
--

CREATE TABLE IF NOT EXISTS `jos_polls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `voters` int(9) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `lag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `jos_polls`
--

INSERT INTO `jos_polls` (`id`, `title`, `alias`, `voters`, `checked_out`, `checked_out_time`, `published`, `access`, `lag`) VALUES
(14, 'Joomla! is used for?', 'joomla-is-used-for', 14, 0, '0000-00-00 00:00:00', 1, 0, 86400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_poll_data`
--

CREATE TABLE IF NOT EXISTS `jos_poll_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `jos_poll_data`
--

INSERT INTO `jos_poll_data` (`id`, `pollid`, `text`, `hits`) VALUES
(1, 14, 'Community Sites', 2),
(2, 14, 'Public Brand Sites', 4),
(3, 14, 'eCommerce', 2),
(4, 14, 'Blogs', 0),
(5, 14, 'Intranets', 1),
(6, 14, '', 2),
(7, 14, '', 3),
(8, 14, '', 0),
(9, 14, '', 0),
(10, 14, '', 0),
(11, 14, '', 0),
(12, 14, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_poll_date`
--

CREATE TABLE IF NOT EXISTS `jos_poll_date` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL DEFAULT '0',
  `poll_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `jos_poll_date`
--

INSERT INTO `jos_poll_date` (`id`, `date`, `vote_id`, `poll_id`) VALUES
(1, '2006-10-09 13:01:58', 1, 14),
(2, '2006-10-10 15:19:43', 7, 14),
(3, '2006-10-11 11:08:16', 7, 14),
(4, '2006-10-11 15:02:26', 2, 14),
(5, '2006-10-11 15:43:03', 7, 14),
(6, '2006-10-11 15:43:38', 7, 14),
(7, '2006-10-12 00:51:13', 2, 14),
(8, '2007-05-10 19:12:29', 3, 14),
(9, '2007-05-14 14:18:00', 6, 14),
(10, '2007-06-10 15:20:29', 6, 14),
(11, '2007-07-03 12:37:53', 2, 14),
(12, '2009-07-31 13:51:46', 3, 14),
(13, '2010-04-29 20:50:10', 5, 14),
(14, '2010-05-20 11:41:17', 2, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_poll_menu`
--

CREATE TABLE IF NOT EXISTS `jos_poll_menu` (
  `pollid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_sections`
--

CREATE TABLE IF NOT EXISTS `jos_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `jos_sections`
--

INSERT INTO `jos_sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES
(1, 'News', '', 'news', 'articles.jpg', 'content', 'right', 'Select a news topic from the list below, then select a news article to read.', 1, 0, '0000-00-00 00:00:00', 3, 0, 2, ''),
(3, 'FAQs', '', 'faqs', 'key.jpg', 'content', 'left', 'From the list below choose one of our FAQs topics, then select an FAQ to read. If you have a question which is not in this section, please contact us.', 1, 0, '0000-00-00 00:00:00', 5, 0, 23, ''),
(4, 'About Joomla!', '', 'about-joomla', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 2, 0, 14, ''),
(5, 'Demo', '', 'demo', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 6, 0, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_session`
--

CREATE TABLE IF NOT EXISTS `jos_session` (
  `username` varchar(150) DEFAULT '',
  `time` varchar(14) DEFAULT '',
  `session_id` varchar(200) NOT NULL DEFAULT '0',
  `guest` tinyint(4) DEFAULT '1',
  `userid` int(11) DEFAULT '0',
  `usertype` varchar(50) DEFAULT '',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `data` longtext,
  PRIMARY KEY (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_session`
--

INSERT INTO `jos_session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`) VALUES
('', '1313244254', 'c01a83e38b98339c98f232acf39487ff', 1, 0, '', 0, 0, '__default|a:7:{s:15:"session.counter";i:1;s:19:"session.timer.start";i:1313244254;s:18:"session.timer.last";i:1313244254;s:17:"session.timer.now";i:1313244254;s:22:"session.client.browser";s:66:"Opera/9.80 (Windows NT 6.0; U; es-ES) Presto/2.9.168 Version/11.50";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:76:"/home/apagueyv/public_html/garabatos/libraries/joomla/html/parameter/element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_stats_agents`
--

CREATE TABLE IF NOT EXISTS `jos_stats_agents` (
  `agent` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_templates_menu`
--

CREATE TABLE IF NOT EXISTS `jos_templates_menu` (
  `template` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jos_templates_menu`
--

INSERT INTO `jos_templates_menu` (`template`, `menuid`, `client_id`) VALUES
('gk_elvesocial', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_users`
--

CREATE TABLE IF NOT EXISTS `jos_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `usertype` varchar(25) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `jos_users`
--

INSERT INTO `jos_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`) VALUES
(62, 'Administrator', 'carlosm', 'eee@eee.pl', 'be428ec1b88d57e236535aa9ead5448b:nBk5urQnjObairS1qhdj4uLZn3QB0VXX', 'Super Administrator', 0, 1, 25, '2009-07-30 18:07:29', '2011-08-02 16:51:20', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),
(100, 'Manuel Obando', 'manuelob', 'gerencia@videoexpress.com', '88dc720475d4e8907fef7c00ad4827ce:2bKAS8g3ZHSw7sVhcoLYKWEYEkFn2UVQ', 'Super Administrator', 0, 0, 25, '2011-08-02 16:51:16', '2011-08-02 19:29:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_weblinks`
--

CREATE TABLE IF NOT EXISTS `jos_weblinks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `jos_weblinks`
--

INSERT INTO `jos_weblinks` (`id`, `catid`, `sid`, `title`, `alias`, `url`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `archived`, `approved`, `params`) VALUES
(1, 2, 0, 'Joomla!', 'joomla', 'http://www.joomla.org', 'Home of Joomla!', '2005-02-14 15:19:02', 4, 1, 0, '0000-00-00 00:00:00', 1, 0, 1, 'target=0'),
(2, 2, 0, 'php.net', 'php', 'http://www.php.net', 'The language that Joomla! is developed in', '2004-07-07 11:33:24', 6, 1, 0, '0000-00-00 00:00:00', 3, 0, 1, ''),
(3, 2, 0, 'MySQL', 'mysql', 'http://www.mysql.com', 'The database that Joomla! uses', '2004-07-07 10:18:31', 2, 1, 0, '0000-00-00 00:00:00', 5, 0, 1, ''),
(4, 2, 0, 'OpenSourceMatters', 'opensourcematters', 'http://www.opensourcematters.org', 'Home of OSM', '2005-02-14 15:19:02', 11, 1, 0, '0000-00-00 00:00:00', 2, 0, 1, 'target=0'),
(5, 2, 0, 'Joomla! - Forums', 'joomla-forums', 'http://forum.joomla.org', 'Joomla! Forums', '2005-02-14 15:19:02', 4, 1, 0, '0000-00-00 00:00:00', 4, 0, 1, 'target=0'),
(6, 2, 0, 'Ohloh Tracking of Joomla!', 'ohloh-tracking-of-joomla', 'http://www.ohloh.net/projects/20', 'Objective reports from Ohloh about Joomla''s development activity. Joomla! has some star developers with serious kudos.', '2007-07-19 09:28:31', 1, 1, 0, '0000-00-00 00:00:00', 6, 0, 1, 'target=0\n\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
