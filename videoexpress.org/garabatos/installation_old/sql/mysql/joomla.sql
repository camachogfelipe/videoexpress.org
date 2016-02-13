-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 28 Maj 2010, 23:25
-- Wersja serwera: 5.1.37
-- Wersja PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `quickstart_jul2009`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__banner`
--

CREATE TABLE IF NOT EXISTS `#__banner` (
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
-- Zrzut danych tabeli `#__banner`
--

INSERT INTO `#__banner` (`bid`, `cid`, `type`, `name`, `alias`, `imptotal`, `impmade`, `clicks`, `imageurl`, `clickurl`, `date`, `showBanner`, `checked_out`, `checked_out_time`, `editor`, `custombannercode`, `catid`, `description`, `sticky`, `ordering`, `publish_up`, `publish_down`, `tags`, `params`) VALUES
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
-- Struktura tabeli dla  `#__bannerclient`
--

CREATE TABLE IF NOT EXISTS `#__bannerclient` (
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
-- Zrzut danych tabeli `#__bannerclient`
--

INSERT INTO `#__bannerclient` (`cid`, `name`, `contact`, `email`, `extrainfo`, `checked_out`, `checked_out_time`, `editor`) VALUES
(1, 'Open Source Matters', 'Administrator', 'admin@opensourcematters.org', '', 0, '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__bannertrack`
--

CREATE TABLE IF NOT EXISTS `#__bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__bannertrack`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__categories`
--

CREATE TABLE IF NOT EXISTS `#__categories` (
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
-- Zrzut danych tabeli `#__categories`
--

INSERT INTO `#__categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
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
-- Struktura tabeli dla  `#__components`
--

CREATE TABLE IF NOT EXISTS `#__components` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Zrzut danych tabeli `#__components`
--

INSERT INTO `#__components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
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
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, 'site=en-GB\nadministrator=en-GB\n\n', 1),
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
(57, 'JComments', 'option=com_jcomments', 0, 0, 'option=com_jcomments', 'JComments', 'com_jcomments', 0, 'class:jcomments-logo', 0, 'object_group=com_jcomments\nobject_id=1\n', 1),
(58, 'Manage comments', '', 0, 57, 'option=com_jcomments&task=view', 'Manage comments', 'com_jcomments', 0, 'class:jcomments-edit', 0, '', 1),
(59, 'Settings', '', 0, 57, 'option=com_jcomments&task=settings', 'Settings', 'com_jcomments', 1, 'class:jcomments-settings', 0, '', 1),
(60, 'Smiles', '', 0, 57, 'option=com_jcomments&task=smiles', 'Smiles', 'com_jcomments', 2, 'class:jcomments-smiles', 0, '', 1),
(61, 'Subscriptions', '', 0, 57, 'option=com_jcomments&task=subscriptions', 'Subscriptions', 'com_jcomments', 3, 'class:jcomments-subscriptions', 0, '', 1),
(62, 'Custom BBCode', '', 0, 57, 'option=com_jcomments&task=custombbcodes', 'Custom BBCode', 'com_jcomments', 4, 'class:jcomments-custombbcode', 0, '', 1),
(63, 'Import', '', 0, 57, 'option=com_jcomments&task=import', 'Import', 'com_jcomments', 5, 'class:jcomments-import', 0, '', 1),
(64, 'About', '', 0, 57, 'option=com_jcomments&task=about', 'About', 'com_jcomments', 6, 'class:jcomments-logo', 0, '', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__contact_details`
--

CREATE TABLE IF NOT EXISTS `#__contact_details` (
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
-- Zrzut danych tabeli `#__contact_details`
--

INSERT INTO `#__contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`) VALUES
(1, 'Name', 'name', 'Position', 'Street', 'Suburb', 'State', 'Country', 'Zip Code', 'Telephone', 'Fax', 'Miscellanous info', 'powered_by.png', 'top', 'email@email.com', 1, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=1\r\nshow_position=1\r\nshow_email=0\r\nshow_street_address=1\r\nshow_suburb=1\r\nshow_state=1\r\nshow_postcode=1\r\nshow_country=1\r\nshow_telephone=1\r\nshow_mobile=1\r\nshow_fax=1\r\nshow_webpage=1\r\nshow_misc=1\r\nshow_image=1\r\nallow_vcard=0\r\ncontact_icons=0\r\nicon_address=\r\nicon_email=\r\nicon_telephone=\r\nicon_fax=\r\nicon_misc=\r\nshow_email_form=1\r\nemail_description=1\r\nshow_email_copy=1\r\nbanned_email=\r\nbanned_subject=\r\nbanned_text=', 0, 12, 0, '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__content`
--

CREATE TABLE IF NOT EXISTS `#__content` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Zrzut danych tabeli `#__content`
--

INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(1, 'Welcome to Joomla!', 'welcome-to-joomla', '', '<div><strong>Joomla! is a free open source framework and content publishing system designed for quickly creating highly interactive multi-language Web sites, online communities, media portals, blogs and eCommerce applications. <br /></strong></div>\r\n<p><strong><br /></strong><img class="caption" src="images/stories/powered_by.png" border="0" alt="Joomla! Logo" title="Example Caption" hspace="6" vspace="0" width="165" height="68" align="left" />Joomla! provides an easy-to-use graphical user interface that simplifies the management and publishing of large volumes of content including HTML, documents, and rich media.  Joomla! is used by organisations of all sizes for intranets and extranets and is supported by a community of tens of thousands of users.</p>\r\n', '\r\n<p>With a fully documented library of developer resources, Joomla! allows the customisation of every aspect of a Web site including presentation, layout, administration, and the rapid integration with third-party applications.</p>\r\n<p>Joomla! now provides more developer power while making the user experience all the more friendly. For those who always wanted increased extensibility, Joomla! 1.5 can make this happen.</p>\r\n<p>A new framework, ground-up refactoring, and a highly-active development team brings the excitement of ''the next generation CMS'' to your fingertips.  Whether you are a systems architect or a complete ''noob'' Joomla! can take you to the next level of content delivery. ''More than a CMS'' is something we have been playing with as a catchcry because the new Joomla! API has such incredible power and flexibility, you are free to take whatever direction your creative mind takes you and Joomla! can help you get there so much more easily than ever before.</p>\r\n<p>Thinking Web publishing? Think Joomla!</p>', 1, 1, 0, 1, '2008-08-12 10:00:00', 62, '', '2009-07-31 13:30:39', 62, 0, '0000-00-00 00:00:00', '2006-01-03 01:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 30, 0, 1, '', '', 0, 109, 'robots=\nauthor='),
(2, 'Newsflash 1', 'newsflash-1', '', '<p>Joomla! makes it easy to launch a Web site of any kind. Whether you want a brochure site or you are building a large online community, Joomla! allows you to deploy a new site in minutes and add extra functionality as you need it. The hundreds of available Extensions will help to expand your site and allow you to deliver new services that extend your reach into the Internet.</p>', '', 1, 1, 0, 3, '2008-08-10 06:30:34', 62, '', '2008-08-10 06:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 1, 'robots=\nauthor='),
(3, 'Newsflash 2', 'newsflash-2', '', '<p>The one thing about a Web site, it always changes! Joomla! makes it easy to add Articles, content, images, videos, and more. Site administrators can edit and manage content ''in-context'' by clicking the ''Edit'' link. Webmasters can also edit content through a graphical Control Panel that gives you complete control over your site.</p>', '', 1, 1, 0, 3, '2008-08-09 22:30:34', 62, '', '2008-08-09 22:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 4, '', '', 0, 0, 'robots=\nauthor='),
(4, 'Newsflash 3', 'newsflash-3', '', '<p>With a library of thousands of free <a href="http://extensions.joomla.org" target="_blank" title="The Joomla! Extensions Directory">Extensions</a>, you can add what you need as your site grows. Don''t wait, look through the <a href="http://extensions.joomla.org/" target="_blank" title="Joomla! Extensions">Joomla! Extensions</a>  library today. </p>', '', 1, 1, 0, 3, '2008-08-10 06:30:34', 62, '', '2008-08-10 06:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 5, '', '', 0, 1, 'robots=\nauthor='),
(5, 'Joomla! License Guidelines', 'joomla-license-guidelines', 'joomla-license-guidelines', '<p>This Web site is powered by <a href="http://joomla.org/" target="_blank" title="Joomla!">Joomla!</a> The software and default templates on which it runs are Copyright 2005-2008 <a href="http://www.opensourcematters.org/" target="_blank" title="Open Source Matters">Open Source Matters</a>. The sample content distributed with Joomla! is licensed under the <a href="http://docs.joomla.org/JEDL" target="_blank" title="Joomla! Electronic Document License">Joomla! Electronic Documentation License.</a> All data entered into this Web site and templates added after installation, are copyrighted by their respective copyright owners.</p> <p>If you want to distribute, copy, or modify Joomla!, you are welcome to do so under the terms of the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1" target="_blank" title="GNU General Public License"> GNU General Public License</a>. If you are unfamiliar with this license, you might want to read <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC4" target="_blank" title="How To Apply These Terms To Your Program">''How To Apply These Terms To Your Program''</a> and the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0-faq.html" target="_blank" title="GNU General Public License FAQ">''GNU General Public License FAQ''</a>.</p> <p>The Joomla! licence has always been GPL.</p>', '', 1, 4, 0, 25, '2008-08-20 10:11:07', 62, '', '2008-08-20 10:11:07', 62, 0, '0000-00-00 00:00:00', '2004-08-19 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 2, '', '', 0, 129, 'robots=\nauthor='),
(6, 'We are Volunteers', 'we-are-volunteers', '', '<p>The Joomla Core Team and Working Group members are volunteer developers, designers, administrators and managers who have worked together to take Joomla! to new heights in its relatively short life. Joomla! has some wonderfully talented people taking Open Source concepts to the forefront of industry standards.  Joomla! 1.5 is a major leap forward and represents the most exciting Joomla! release in the history of the project. </p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 9, '', '', 0, 54, 'robots=\nauthor='),
(9, 'Millions of Smiles', 'millions-of-smiles', '', '<p>The Joomla! team has millions of good reasons to be smiling about the Joomla! 1.5. In its current incarnation, it''s had millions of downloads, taking it to an unprecedented level of popularity.  The new code base is almost an entire re-factor of the old code base.  The user experience is still extremely slick but for developers the API is a dream.  A proper framework for real PHP architects seeking the best of the best.</p><p>If you''re a former Mambo User or a 1.0 series Joomla! User, 1.5 is the future of CMSs for a number of reasons.  It''s more powerful, more flexible, more secure, and intuitive.  Our developers and interface designers have worked countless hours to make this the most exciting release in the content management system sphere.</p><p>Go on ... get your FREE copy of Joomla! today and spread the word about this benchmark project. </p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 10, '', '', 0, 23, 'robots=\nauthor='),
(10, 'How do I localise Joomla! to my language?', 'how-do-i-localise-joomla-to-my-language', '', '<h4>General<br /></h4><p>In Joomla! 1.5 all User interfaces can be localised. This includes the installation, the Back-end Control Panel and the Front-end Site.</p><p>The core release of Joomla! 1.5 is shipped with multiple language choices in the installation but, other than English (the default), languages for the Site and Administration interfaces need to be added after installation. Links to such language packs exist below.</p>', '<p>Translation Teams for Joomla! 1.5 may have also released fully localised installation packages where site, administrator and sample data are in the local language. These localised releases can be found in the specific team projects on the <a href="http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/" target="_blank" title="JED">Joomla! Extensions Directory</a>.</p><h4>How do I install language packs?</h4><ul><li>First download both the admin and the site language packs that you require.</li><li>Install each pack separately using the Extensions-&gt;Install/Uninstall Menu selection and then the package file upload facility.</li><li>Go to the Language Manager and be sure to select Site or Admin in the sub-menu. Then select the appropriate language and make it the default one using the Toolbar button.</li></ul><h4>How do I select languages?</h4><ul><li>Default languages can be independently set for Site and for Administrator</li><li>In addition, users can define their preferred language for each Site and Administrator. This takes affect after logging in.</li><li>While logging in to the Administrator Back-end, a language can also be selected for the particular session.</li></ul><h4>Where can I find Language Packs and Localised Releases?</h4><p><em>Please note that Joomla! 1.5 is new and language packs for this version may have not been released at this time.</em> </p><ul><li><a href="http://joomlacode.org/gf/project/jtranslation/" target="_blank" title="Accredited Translations">The Joomla! Accredited Translations Project</a>  - This is a joint repository for language packs that were developed by teams that are members of the Joomla! Translations Working Group.</li><li><a href="http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/" target="_blank" title="Translations">The Joomla! Extensions Site - Translations</a>  </li><li><a href="http://community.joomla.org/translations.html" target="_blank" title="Translation Work Group Teams">List of Translation Teams and Translation Partner Sites for Joomla! 1.5</a> </li></ul>', 1, 3, 0, 32, '2008-07-30 14:06:37', 62, '', '2008-07-30 14:06:37', 62, 0, '0000-00-00 00:00:00', '2006-09-29 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 5, '', '', 0, 10, 'robots=\nauthor='),
(11, 'How do I upgrade to Joomla! 1.5 ?', 'how-do-i-upgrade-to-joomla-15', '', '<p>Joomla! 1.5 does not provide an upgrade path from earlier versions. Converting an older site to a Joomla! 1.5 site requires creation of a new empty site using Joomla! 1.5 and then populating the new site with the content from the old site. This migration of content is not a one-to-one process and involves conversions and modifications to the content dump.</p> <p>There are two ways to perform the migration:</p>', ' <div id="post_content-107"><li>An automated method of migration has been provided which uses a migrator Component to create the migration dump out of the old site (Mambo 4.5.x up to Joomla! 1.0.x) and a smart import facility in the Joomla! 1.5 Installation that performs required conversions and modifications during the installation process.</li> <li>Migration can be performed manually. This involves exporting the required tables, manually performing required conversions and modifications and then importing the content to the new site after it is installed.</li>  <p><!--more--></p> <h2><strong> Automated migration</strong></h2>  <p>This is a two phased process using two tools. The first tool is a migration Component named <font face="courier new,courier">com_migrator</font>. This Component has been contributed by Harald Baer and is based on his <strong>eBackup </strong>Component. The migrator needs to be installed on the old site and when activated it prepares the required export dump of the old site''s data. The second tool is built into the Joomla! 1.5 installation process. The exported content dump is loaded to the new site and all conversions and modification are performed on-the-fly.</p> <h3><u> Step 1 - Using com_migrator to export data from old site:</u></h3> <li>Install the <font face="courier new,courier">com_migrator</font> Component on the <u><strong>old</strong></u> site. It can be found at the <a href="http://joomlacode.org/gf/project/pasamioprojects/frs/" target="_blank" title="JoomlaCode">JoomlaCode developers forge</a>.</li> <li>Select the Component in the Component Menu of the Control Panel.</li> <li>Click on the <strong>Dump it</strong> icon. Three exported <em>gzipped </em>export scripts will be created. The first is a complete backup of the old site. The second is the migration content of all core elements which will be imported to the new site. The third is a backup of all 3PD Component tables.</li> <li>Click on the download icon of the particular exports files needed and store locally.</li> <li>Multiple export sets can be created.</li> <li>The exported data is not modified in anyway and the original encoding is preserved. This makes the <font face="courier new,courier">com_migrator</font> tool a recommended tool to use for manual migration as well.</li> <h3><u> Step 2 - Using the migration facility to import and convert data during Joomla! 1.5 installation:</u></h3><p>Note: This function requires the use of the <em><font face="courier new,courier">iconv </font></em>function in PHP to convert encodings. If <em><font face="courier new,courier">iconv </font></em>is not found a warning will be provided.</p> <li>In step 6 - Configuration select the ''Load Migration Script'' option in the ''Load Sample Data, Restore or Migrate Backed Up Content'' section of the page.</li> <li>Enter the table prefix used in the content dump. For example: ''#__'' or ''site2_'' are acceptable values.</li> <li>Select the encoding of the dumped content in the dropdown list. This should be the encoding used on the pages of the old site. (As defined in the _ISO variable in the language file or as seen in the browser page info/encoding/source)</li> <li>Browse the local host and select the migration export and click on <strong>Upload and Execute</strong></li> <li>A success message should appear or alternately a listing of database errors</li> <li>Complete the other required fields in the Configuration step such as Site Name and Admin details and advance to the final step of installation. (Admin details will be ignored as the imported data will take priority. Please remember admin name and password from the old site)</li> <p><u><br /></u></p></div>', 1, 3, 0, 28, '2008-07-30 20:27:52', 62, '', '2008-07-30 20:27:52', 62, 0, '0000-00-00 00:00:00', '2006-09-29 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 3, '', '', 0, 14, 'robots=\nauthor='),
(12, 'Why does Joomla! 1.5 use UTF-8 encoding?', 'why-does-joomla-15-use-utf-8-encoding', '', '<p>Well... how about never needing to mess with encoding settings again?</p><p>Ever needed to display several languages on one page or site and something always came up in Giberish?</p><p>With utf-8 (a variant of Unicode) glyphs (character forms) of basically all languages can be displayed with one single encoding setting. </p>', '', 1, 3, 0, 31, '2008-08-05 01:11:29', 62, '', '2008-08-05 01:11:29', 62, 0, '0000-00-00 00:00:00', '2006-10-03 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 8, '', '', 0, 29, 'robots=\nauthor='),
(13, 'What happened to the locale setting?', 'what-happened-to-the-locale-setting', '', 'This is now defined in the Language [<em>lang</em>].xml file in the Language metadata settings. If you are having locale problems such as dates do not appear in your language for example, you might want to check/edit the entries in the locale tag. Note that multiple locale strings can be set and the host will usually accept the first one recognised.', '', 1, 3, 0, 28, '2008-08-06 16:47:35', 62, '', '2008-08-06 16:47:35', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 2, '', '', 0, 11, 'robots=\nauthor='),
(14, 'What is the FTP layer for?', 'what-is-the-ftp-layer-for', '', '<p>The FTP Layer allows file operations (such as installing Extensions or updating the main configuration file) without having to make all the folders and files writable. This has been an issue on Linux and other Unix based platforms in respect of file permissions. This makes the site admin''s life a lot easier and increases security of the site.</p><p>You can check the write status of relevent folders by going to ''''Help-&gt;System Info" and then in the sub-menu to "Directory Permissions". With the FTP Layer enabled even if all directories are red, Joomla! will operate smoothly.</p><p>NOTE: the FTP layer is not required on a Windows host/server. </p>', '', 1, 3, 0, 31, '2008-08-06 21:27:49', 62, '', '2008-08-06 21:27:49', 62, 0, '0000-00-00 00:00:00', '2006-10-05 16:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', 6, 0, 6, '', '', 0, 23, 'robots=\nauthor='),
(15, 'Can Joomla! 1.5 operate with PHP Safe Mode On?', 'can-joomla-15-operate-with-php-safe-mode-on', '', '<p>Yes it can! This is a significant security improvement.</p><p>The <em>safe mode</em> limits PHP to be able to perform actions only on files/folders who''s owner is the same as PHP is currently using (this is usually ''apache''). As files normally are created either by the Joomla! application or by FTP access, the combination of PHP file actions and the FTP Layer allows Joomla! to operate in PHP Safe Mode.</p>', '', 1, 3, 0, 31, '2008-08-06 19:28:35', 62, '', '2008-08-06 19:28:35', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 4, '', '', 0, 8, 'robots=\nauthor='),
(16, 'Only one edit window! How do I create "Read more..."?', 'only-one-edit-window-how-do-i-create-read-more', '', '<p>This is now implemented by inserting a <strong>Read more...</strong> tag (the button is located below the editor area) a dotted line appears in the edited text showing the split location for the <em>Read more....</em> A new Plugin takes care of the rest.</p><p>It is worth mentioning that this does not have a negative effect on migrated data from older sites. The new implementation is fully backward compatible.</p>', '', 1, 3, 0, 28, '2008-08-06 19:29:28', 62, '', '2008-08-06 19:29:28', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 4, '', '', 0, 20, 'robots=\nauthor='),
(17, 'My MySQL database does not support UTF-8. Do I have a problem?', 'my-mysql-database-does-not-support-utf-8-do-i-have-a-problem', '', 'No you don''t. Versions of MySQL lower than 4.1 do not have built in UTF-8 support. However, Joomla! 1.5 has made provisions for backward compatibility and is able to use UTF-8 on older databases. Let the installer take care of all the settings and there is no need to make any changes to the database (charset, collation, or any other).', '', 1, 3, 0, 31, '2008-08-07 09:30:37', 62, '', '2008-08-07 09:30:37', 62, 0, '0000-00-00 00:00:00', '2006-10-05 20:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 7, '', '', 0, 10, 'robots=\nauthor='),
(18, 'Joomla! Features', 'joomla-features', '', '<h4><font color="#ff6600">Joomla! features:</font></h4> <ul><li>Completely database driven site engines </li><li>News, products, or services sections fully editable and manageable</li><li>Topics sections can be added to by contributing Authors </li><li>Fully customisable layouts including <em>left</em>, <em>center</em>, and <em>right </em>Menu boxes </li><li>Browser upload of images to your own library for use anywhere in the site </li><li>Dynamic Forum/Poll/Voting booth for on-the-spot results </li><li>Runs on Linux, FreeBSD, MacOSX server, Solaris, and AIX', '  </li></ul> <h4>Extensive Administration:</h4> <ul><li>Change order of objects including news, FAQs, Articles etc. </li><li>Random Newsflash generator </li><li>Remote Author submission Module for News, Articles, FAQs, and Links </li><li>Object hierarchy - as many Sections, departments, divisions, and pages as you want </li><li>Image library - store all your PNGs, PDFs, DOCs, XLSs, GIFs, and JPEGs online for easy use </li><li>Automatic Path-Finder. Place a picture and let Joomla! fix the link </li><li>News Feed Manager. Easily integrate news feeds into your Web site.</li><li>E-mail a friend and Print format available for every story and Article </li><li>In-line Text editor similar to any basic word processor software </li><li>User editable look and feel </li><li>Polls/Surveys - Now put a different one on each page </li><li>Custom Page Modules. Download custom page Modules to spice up your site </li><li>Template Manager. Download Templates and implement them in seconds </li><li>Layout preview. See how it looks before going live </li><li>Banner Manager. Make money out of your site.</li></ul>', 1, 4, 0, 29, '2008-08-08 23:32:45', 62, '', '2008-08-08 23:32:45', 62, 0, '0000-00-00 00:00:00', '2006-10-07 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 4, '', '', 0, 59, 'robots=\nauthor='),
(19, 'Joomla! Overview', 'joomla-overview', '', '<p>If you''re new to Web publishing systems, you''ll find that Joomla! delivers sophisticated solutions to your online needs. It can deliver a robust enterprise-level Web site, empowered by endless extensibility for your bespoke publishing needs. Moreover, it is often the system of choice for small business or home users who want a professional looking site that''s simple to deploy and use. <em>We do content right</em>.<br /> </p><p>So what''s the catch? How much does this system cost?</p><p> Well, there''s good news ... and more good news! Joomla! 1.5 is free, it is released under an Open Source license - the GNU/General Public License v 2.0. Had you invested in a mainstream, commercial alternative, there''d be nothing but moths left in your wallet and to add new functionality would probably mean taking out a second mortgage each time you wanted something adding!</p><p>Joomla! changes all that ... <br />Joomla! is different from the normal models for content management software. For a start, it''s not complicated. Joomla! has been developed for everybody, and anybody can develop it further. It is designed to work (primarily) with other Open Source, free, software such as PHP, MySQL, and Apache. </p><p>It is easy to install and administer, and is reliable. </p><p>Joomla! doesn''t even require the user or administrator of the system to know HTML to operate it once it''s up and running.</p><p>To get the perfect Web site with all the functionality that you require for your particular application may take additional time and effort, but with the Joomla! Community support that is available and the many Third Party Developers actively creating and releasing new Extensions for the 1.5 platform on an almost daily basis, there is likely to be something out there to meet your needs. Or you could develop your own Extensions and make these available to the rest of the community. </p>', '', 1, 4, 0, 29, '2008-08-09 07:49:20', 62, '', '2008-08-09 07:49:20', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 2, '', '', 0, 188, 'robots=\nauthor='),
(20, 'Support and Documentation', 'support-and-documentation', '', '<h1>Support </h1><p>Support for the Joomla! CMS can be found on several places. The best place to start would be the <a href="http://docs.joomla.org/" target="_blank" title="Joomla! Official Documentation Wiki">Joomla! Official Documentation Wiki</a>. Here you can help yourself to the information that is regularly published and updated as Joomla! develops. There is much more to come too!</p> <p>Of course you should not forget the Help System of the CMS itself. On the <em>topmenu </em>in the Back-end Control panel you find the Help button which will provide you with lots of explanation on features.</p> <p>Another great place would of course be the <a href="http://forum.joomla.org/" target="_blank" title="Forum">Forum</a> . On the Joomla! Forum you can find help and support from Community members as well as from Joomla! Core members and Working Group members. The forum contains a lot of information, FAQ''s, just about anything you are looking for in terms of support.</p> <p>Two other resources for Support are the <a href="http://developer.joomla.org/" target="_blank" title="Joomla! Developer Site">Joomla! Developer Site</a> and the <a href="http://extensions.joomla.org/" target="_blank" title="Joomla! Extensions Directory">Joomla! Extensions Directory</a> (JED). The Joomla! Developer Site provides lots of technical information for the experienced Developer as well as those new to Joomla! and development work in general. The JED whilst not a support site in the strictest sense has many of the Extensions that you will need as you develop your own Web site.</p> <p>The Joomla! Developers and Bug Squad members are regularly posting their blog reports about several topics such as programming techniques and security issues.</p> <h1>Documentation</h1> <p>Joomla! Documentation can of course be found on the <a href="http://docs.joomla.org/" target="_blank" title="Joomla! Official Documentation Wiki">Joomla! Official Documentation Wiki</a>. You can find information for beginners, installation, upgrade, Frequently Asked Questions, developer topics, and a lot more. The Documentation Team helps oversee the wiki but you are invited to contribute content, as well.</p> <p>There are also books written about Joomla! You can find a listing of these books in the <a href="http://shop.joomla.org/" target="_blank" title="Joomla! Shop">Joomla! Shop</a>.</p>', '', 1, 4, 0, 25, '2008-08-09 08:33:57', 62, '', '2008-08-09 08:33:57', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 1, '', '', 0, 6, 'robots=\nauthor='),
(21, 'Joomla! Facts', 'joomla-facts', '', '<p>Here are some interesting facts about Joomla!</p><ul><li><span>Over 210,000 active registered Users on the <a href="http://forum.joomla.org" target="_blank" title="Joomla Forums">Official Joomla! community forum</a> and more on the many international community sites.</span><ul><li><span>over 1,000,000 posts in over 200,000 topics</span></li><li>over 1,200 posts per day</li><li>growing at 150 new participants each day!</li></ul></li><li><span>1168 Projects on the JoomlaCode (<a href="http://joomlacode.org/" target="_blank" title="JoomlaCode">joomlacode.org</a> ). All for open source addons by third party developers.</span><ul><li><span>Well over 6,000,000 downloads of Joomla! since the migration to JoomlaCode in March 2007.<br /></span></li></ul></li><li><span>Nearly 4,000 extensions for Joomla! have been registered on the <a href="http://extensions.joomla.org" target="_blank" title="http://extensions.joomla.org">Joomla! Extension Directory</a>  </span></li><li><span>Joomla.org exceeds 2 TB of traffic per month!</span></li></ul>', '', 1, 4, 0, 30, '2008-08-09 16:46:37', 62, '', '2008-08-09 16:46:37', 62, 0, '0000-00-00 00:00:00', '2006-10-07 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 1, '', '', 0, 491, 'robots=\nauthor='),
(22, 'What''s New in 1.5?', 'whats-new-in-15', '', '<p>As with previous releases, Joomla! provides a unified and easy-to-use framework for delivering content for Web sites of all kinds. To support the changing nature of the Internet and emerging Web technologies, Joomla! required substantial restructuring of its core functionality and we also used this effort to simplify many challenges within the current user interface. Joomla! 1.5 has many new features.</p>', '<p style="margin-bottom: 0in">In Joomla! 1.5, you''ll notice: </p>    <ul><li>     <p style="margin-bottom: 0in">       Substantially improved usability, manageability, and scalability far beyond the original Mambo foundations</p>   </li><li>     <p style="margin-bottom: 0in"> Expanded accessibility to support internationalisation, double-byte characters and right-to-left support for Arabic, Farsi, and Hebrew languages among others</p>   </li><li>     <p style="margin-bottom: 0in"> Extended integration of external applications through Web services and remote authentication such as the Lightweight Directory Access Protocol (LDAP)</p>   </li><li>     <p style="margin-bottom: 0in"> Enhanced content delivery, template and presentation capabilities to support accessibility standards and content delivery to any destination</p>   </li><li>     <p style="margin-bottom: 0in">       A more sustainable and flexible framework for Component and Extension developers</p>   </li><li>     <p style="margin-bottom: 0in">Backward compatibility with previous releases of Components, Templates, Modules, and other Extensions</p></li></ul>', 1, 4, 0, 29, '2008-08-11 22:13:58', 62, '', '2008-08-11 22:13:58', 62, 0, '0000-00-00 00:00:00', '2006-10-10 18:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 1, '', '', 0, 214, 'robots=\nauthor='),
(23, 'Platforms and Open Standards', 'platforms-and-open-standards', '', '<p class="MsoNormal">Joomla! runs on any platform including Windows, most flavours of Linux, several Unix versions, and the Apple OS/X platform.  Joomla! depends on PHP and the MySQL database to deliver dynamic content.  </p>            <p class="MsoNormal">The minimum requirements are:</p>      <ul><li>Apache 1.x, 2.x and higher</li><li>PHP 4.3 and higher</li><li>MySQL 3.23 and higher</li></ul>It will also run on alternative server platforms such as Windows IIS - provided they support PHP and MySQL - but these require additional configuration in order for the Joomla! core package to be successful installed and operated.', '', 1, 4, 0, 25, '2008-08-11 04:22:14', 62, '', '2008-08-11 04:22:14', 62, 0, '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 11, 'robots=\nauthor='),
(24, 'Content Layouts', 'content-layouts', '', '<p>Joomla! provides plenty of flexibility when displaying your Web content. Whether you are using Joomla! for a blog site, news or a Web site for a company, you''ll find one or more content styles to showcase your information. You can also change the style of content dynamically depending on your preferences. Joomla! calls how a page is laid out a <strong>layout</strong>. Use the guide below to understand which layouts are available and how you might use them. </p> <h2>Content </h2> <p>Joomla! makes it extremely easy to add and display content. All content  is placed where your mainbody tag in your template is located. There are three main types of layouts available in Joomla! and all of them can be customised via parameters. The display and parameters are set in the Menu Item used to display the content your working on. You create these layouts by creating a Menu Item and choosing how you want the content to display.</p> <h3>Blog Layout<br /> </h3> <p>Blog layout will show a listing of all Articles of the selected blog type (Section or Category) in the mainbody position of your template. It will give you the standard title, and Intro of each Article in that particular Category and/or Section. You can customise this layout via the use of the Preferences and Parameters, (See Article Parameters) this is done from the Menu not the Section Manager!</p> <h3>Blog Archive Layout<br /> </h3> <p>A Blog Archive layout will give you a similar output of Articles as the normal Blog Display but will add, at the top, two drop down lists for month and year plus a search button to allow Users to search for all Archived Articles from a specific month and year.</p> <h3>List Layout<br /> </h3> <p>Table layout will simply give you a <em>tabular </em>list<em> </em>of all the titles in that particular Section or Category. No Intro text will be displayed just the titles. You can set how many titles will be displayed in this table by Parameters. The table layout will also provide a filter Section so that Users can reorder, filter, and set how many titles are listed on a single page (up to 50)</p> <h2>Wrapper</h2> <p>Wrappers allow you to place stand alone applications and Third Party Web sites inside your Joomla! site. The content within a Wrapper appears within the primary content area defined by the "mainbody" tag and allows you to display their content as a part of your own site. A Wrapper will place an IFRAME into the content Section of your Web site and wrap your standard template navigation around it so it appears in the same way an Article would.</p> <h2>Content Parameters</h2> <p>The parameters for each layout type can be found on the right hand side of the editor boxes in the Menu Item configuration screen. The parameters available depend largely on what kind of layout you are configuring.</p>', '', 1, 4, 0, 29, '2008-08-12 22:33:10', 62, '', '2008-08-12 22:33:10', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 5, '', '', 0, 70, 'robots=\nauthor='),
(25, 'What are the requirements to run Joomla! 1.5?', 'what-are-the-requirements-to-run-joomla-15', '', '<p>Joomla! runs on the PHP pre-processor. PHP comes in many flavours, for a lot of operating systems. Beside PHP you will need a Web server. Joomla! is optimized for the Apache Web server, but it can run on different Web servers like Microsoft IIS it just requires additional configuration of PHP and MySQL. Joomla! also depends on a database, for this currently you can only use MySQL. </p>Many people know from their own experience that it''s not easy to install an Apache Web server and it gets harder if you want to add MySQL, PHP and Perl. XAMPP, WAMP, and MAMP are easy to install distributions containing Apache, MySQL, PHP and Perl for the Windows, Mac OSX and Linux operating systems. These packages are for localhost installations on non-public servers only.<br />The minimum version requirements are:<br /><ul><li>Apache 1.x or 2.x</li><li>PHP 4.3 or up</li><li>MySQL 3.23 or up</li></ul>For the latest minimum requirements details, see <a href="http://www.joomla.org/about-joomla/technical-requirements.html" target="_blank" title="Joomla! Technical Requirements">Joomla! Technical Requirements</a>.', '', 1, 3, 0, 31, '2008-08-11 00:42:31', 62, '', '2008-08-11 00:42:31', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 5, '', '', 0, 29, 'robots=\nauthor='),
(26, 'Extensions', 'extensions', '', '<p>Out of the box, Joomla! does a great job of managing the content needed to make your Web site sing. But for many people, the true power of Joomla! lies in the application framework that makes it possible for developers all around the world to create powerful add-ons that are called <strong>Extensions</strong>. An Extension is used to add capabilities to Joomla! that do not exist in the base core code. Here are just some examples of the hundreds of available Extensions:</p> <ul>   <li>Dynamic form builders</li>   <li>Business or organisational directories</li>   <li>Document management</li>   <li>Image and multimedia galleries</li>   <li>E-commerce and shopping cart engines</li>   <li>Forums and chat software</li>   <li>Calendars</li>   <li>E-mail newsletters</li>   <li>Data collection and reporting tools</li>   <li>Banner advertising systems</li>   <li>Paid subscription services</li>   <li>and many, many, more</li> </ul> <p>You can find more examples over at our ever growing <a href="http://extensions.joomla.org" target="_blank" title="Joomla! Extensions Directory">Joomla! Extensions Directory</a>. Prepare to be amazed at the amount of exciting work produced by our active developer community!</p><p>A useful guide to the Extension site can be found at:<br /><a href="http://extensions.joomla.org/content/view/15/63/" target="_blank" title="Guide to the Joomla! Extension site">http://extensions.joomla.org/content/view/15/63/</a> </p> <h3>Types of Extensions </h3><p>There are five types of extensions:</p> <ul>   <li>Components</li>   <li>Modules</li>   <li>Templates</li>   <li>Plugins</li>   <li>Languages</li> </ul> <p>You can read more about the specifics of these using the links in the Article Index - a Table of Contents (yet another useful feature of Joomla!) - at the top right or by clicking on the <strong>Next </strong>link below.<br /> </p> <hr title="Components" class="system-pagebreak" /> <h3><img src="images/stories/ext_com.png" border="0" alt="Component - Joomla! Extension Directory" title="Component - Joomla! Extension Directory" width="17" height="17" /> Components</h3> <p>A Component is the largest and most complex of the Extension types.  Components are like mini-applications that render the main body of the  page. An analogy that might make the relationship easier to understand  would be that Joomla! is a book and all the Components are chapters in  the book. The core Article Component (<font face="courier new,courier">com_content</font>), for example, is the  mini-application that handles all core Article rendering just as the  core registration Component (<font face="courier new,courier">com_user</font>) is the mini-application  that handles User registration.</p> <p>Many of Joomla!''s core features are provided by the use of default Components such as:</p> <ul>   <li>Contacts</li>   <li>Front Page</li>   <li>News Feeds</li>   <li>Banners</li>   <li>Mass Mail</li>   <li>Polls</li></ul><p>A Component will manage data, set displays, provide functions, and in general can perform any operation that does not fall under the general functions of the core code.</p> <p>Components work hand in hand with Modules and Plugins to provide a rich variety of content display and functionality aside from the standard Article and content display. They make it possible to completely transform Joomla! and greatly expand its capabilities.</p>  <hr title="Modules" class="system-pagebreak" /> <h3><img src="images/stories/ext_mod.png" border="0" alt="Module - Joomla! Extension Directory" title="Module - Joomla! Extension Directory" width="17" height="17" /> Modules</h3> <p>A more lightweight and flexible Extension used for page rendering is a Module. Modules are used for small bits of the page that are generally  less complex and able to be seen across different Components. To  continue in our book analogy, a Module can be looked at as a footnote  or header block, or perhaps an image/caption block that can be rendered  on a particular page. Obviously you can have a footnote on any page but  not all pages will have them. Footnotes also might appear regardless of  which chapter you are reading. Simlarly Modules can be rendered  regardless of which Component you have loaded.</p> <p>Modules are like little mini-applets that can be placed anywhere on your site. They work in conjunction with Components in some cases and in others are complete stand alone snippets of code used to display some data from the database such as Articles (Newsflash) Modules are usually used to output data but they can also be interactive form items to input data for example the Login Module or Polls.</p> <p>Modules can be assigned to Module positions which are defined in your Template and in the back-end using the Module Manager and editing the Module Position settings. For example, "left" and "right" are common for a 3 column layout. </p> <h4>Displaying Modules</h4> <p>Each Module is assigned to a Module position on your site. If you wish it to display in two different locations you must copy the Module and assign the copy to display at the new location. You can also set which Menu Items (and thus pages) a Module will display on, you can select all Menu Items or you can pick and choose by holding down the control key and selecting multiple locations one by one in the Modules [Edit] screen</p> <p>Note: Your Main Menu is a Module! When you create a new Menu in the Menu Manager you are actually copying the Main Menu Module (<font face="courier new,courier">mod_mainmenu</font>) code and giving it the name of your new Menu. When you copy a Module you do not copy all of its parameters, you simply allow Joomla! to use the same code with two separate settings.</p> <h4>Newsflash Example</h4> <p>Newsflash is a Module which will display Articles from your site in an assignable Module position. It can be used and configured to display one Category, all Categories, or to randomly choose Articles to highlight to Users. It will display as much of an Article as you set, and will show a <em>Read more...</em> link to take the User to the full Article.</p> <p>The Newsflash Component is particularly useful for things like Site News or to show the latest Article added to your Web site.</p>  <hr title="Plugins" class="system-pagebreak" /> <h3><img src="images/stories/ext_plugin.png" border="0" alt="Plugin - Joomla! Extension Directory" title="Plugin - Joomla! Extension Directory" width="17" height="17" /> Plugins</h3> <p>One  of the more advanced Extensions for Joomla! is the Plugin. In previous  versions of Joomla! Plugins were known as Mambots. Aside from changing their name their  functionality has been expanded. A Plugin is a section of code that  runs when a pre-defined event happens within Joomla!. Editors are Plugins, for example, that execute when the Joomla! event <font face="courier new,courier">onGetEditorArea</font> occurs. Using a Plugin allows a developer to change  the way their code behaves depending upon which Plugins are installed  to react to an event.</p>  <hr title="Languages" class="system-pagebreak" /> <h3><img src="images/stories/ext_lang.png" border="0" alt="Language - Joomla! Extensions Directory" title="Language - Joomla! Extensions Directory" width="17" height="17" /> Languages</h3> <p>New  to Joomla! 1.5 and perhaps the most basic and critical Extension is a Language. Joomla! is released with multiple Installation Languages but the base Site and Administrator are packaged in just the one Language <strong>en-GB</strong> - being English with GB spelling for example. To include all the translations currently available would bloat the core package and make it unmanageable for uploading purposes. The Language files enable all the User interfaces both Front-end and Back-end to be presented in the local preferred language. Note these packs do not have any impact on the actual content such as Articles. </p> <p>More information on languages is available from the <br />   <a href="http://community.joomla.org/translations.html" target="_blank" title="Joomla! Translation Teams">http://community.joomla.org/translations.html</a></p>', '', 1, 4, 0, 29, '2008-08-11 06:00:00', 62, '', '2008-08-11 06:00:00', 62, 0, '0000-00-00 00:00:00', '2006-10-10 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 24, 0, 3, 'About Joomla!, General, Extensions', '', 0, 103, 'robots=\nauthor=');
INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(27, 'The Joomla! Community', 'the-joomla-community', '', '<p><strong>Got a question? </strong>With more than 210,000 members, the Joomla! Discussion Forums at <a href="http://forum.joomla.org/" target="_blank" title="Forums">forum.joomla.org</a> are a great resource for both new and experienced users. Ask your toughest questions the community is waiting to see what you''ll do with your Joomla! site.</p><p><strong>Do you want to show off your new Joomla! Web site?</strong> Visit the <a href="http://forum.joomla.org/viewforum.php?f=514" target="_blank" title="Site Showcase">Site Showcase</a> section of our forum.</p><p><strong>Do you want to contribute?</strong></p><p>If you think working with Joomla is fun, wait until you start working on it. We''re passionate about helping Joomla users become contributors. There are many ways you can help Joomla''s development:</p><ul>	<li>Submit news about Joomla. We syndicate Joomla-related news on <a href="http://news.joomla.org" target="_blank" title="JoomlaConnect">JoomlaConnect<sup>TM</sup></a>. If you have Joomla news that you would like to share with the community, find out how to get connected <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">here</a>.</li>	<li>Report bugs and request features in our <a href="http://joomlacode.org/gf/project/joomla/tracker/" target="_blank" title="Joomla! developement trackers">trackers</a>. Please read <a href="http://docs.joomla.org/Filing_bugs_and_issues" target="_blank" title="Reporting Bugs">Reporting Bugs</a>, for details on how we like our bug reports served up</li><li>Submit patches for new and/or fixed behaviour. Please read <a href="http://docs.joomla.org/Patch_submission_guidelines" target="_blank" title="Submitting Patches">Submitting Patches</a>, for details on how to submit a patch.</li><li>Join the <a href="http://forum.joomla.org/viewforum.php?f=509" target="_blank" title="Joomla! development forums">developer forums</a> and share your ideas for how to improve Joomla. We''re always open to suggestions, although we''re likely to be sceptical of large-scale suggestions without some code to back it up.</li><li>Join any of the <a href="http://www.joomla.org/about-joomla/the-project/working-groups.html" target="_blank" title="Joomla! working groups">Joomla Working Groups</a> and bring your personal expertise to the Joomla community. </li></ul><p>These are just a few ways you can contribute. See <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank" title="Contribute">Contribute to Joomla</a> for many more ways.</p>', '', 1, 4, 0, 30, '2008-08-12 16:50:48', 62, '', '2008-08-12 16:50:48', 62, 0, '0000-00-00 00:00:00', '2006-10-11 02:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 2, '', '', 0, 54, 'robots=\nauthor='),
(28, 'How do I install Joomla! 1.5?', 'how-do-i-install-joomla-15', '', '<p>Installing of Joomla! 1.5 is pretty easy. We assume you have set-up your Web site, and it is accessible with your browser.<br /><br />Download Joomla! 1.5, unzip it and upload/copy the files into the directory you Web site points to, fire up your browser and enter your Web site address and the installation will start.  </p><p>For full details on the installation processes check out the <a href="http://help.joomla.org/content/category/48/268/302" target="_blank" title="Joomla! 1.5 Installation Manual">Installation Manual</a> on the <a href="http://help.joomla.org" target="_blank" title="Joomla! Help Site">Joomla! Help Site</a> where you will also find download instructions for a PDF version too. </p>', '', 1, 3, 0, 31, '2008-08-11 01:10:59', 62, '', '2008-08-11 01:10:59', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 3, '', '', 0, 5, 'robots=\nauthor='),
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
(43, 'Example Pages and Menu Links', 'example-pages-and-menu-links', '', '<p>This page is an example of content that is <em>Uncategorized</em>; that is, it does not belong to any Section or Category. You will see there is a new Menu in the left column. It shows links to the same content presented in 4 different page layouts.</p><ul><li>Section Blog</li><li>Section Table</li><li> Blog Category</li><li>Category Table</li></ul><p>Follow the links in the <strong>Example Pages</strong> Menu to see some of the options available to you to present all the different types of content included within the default installation of Joomla!.</p><p>This includes Components and individual Articles. These links or Menu Item Types (to give them their proper name) are all controlled from within the <strong><font face="courier new,courier">Menu Manager-&gt;[menuname]-&gt;Menu Items Manager</font></strong>. </p>', '', 1, 0, 0, 0, '2008-08-12 09:26:52', 62, '', '2008-08-12 09:26:52', 62, 0, '0000-00-00 00:00:00', '2006-10-11 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, 'Uncategorized, Uncategorized, Example Pages and Menu Links', '', 0, 43, 'robots=\nauthor='),
(44, 'Joomla! Security Strike Team', 'joomla-security-strike-team', '', '<p>The Joomla! Project has assembled a top-notch team of experts to form the new Joomla! Security Strike Team. This new team will solely focus on investigating and resolving security issues. Instead of working in relative secrecy, the JSST will have a strong public-facing presence at the <a href="http://developer.joomla.org/security.html" target="_blank" title="Joomla! Security Center">Joomla! Security Center</a>.</p>', '<p>The new JSST will call the new <a href="http://developer.joomla.org/security.html" target="_blank" title="Joomla! Security Center">Joomla! Security Center</a> their home base. The Security Center provides a public presence for <a href="http://developer.joomla.org/security/news.html" target="_blank" title="Joomla! Security News">security issues</a> and a platform for the JSST to <a href="http://developer.joomla.org/security/articles-tutorials.html" target="_blank" title="Joomla! Security Articles">help the general public better understand security</a> and how it relates to Joomla!. The Security Center also offers users a clearer understanding of how security issues are handled. There''s also a <a href="http://feeds.joomla.org/JoomlaSecurityNews" target="_blank" title="Joomla! Security News Feed">news feed</a>, which provides subscribers an up-to-the-minute notification of security issues as they arise.</p>', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 7, '', '', 0, 1, 'robots=\nauthor='),
(45, 'Joomla! Community Portal', 'joomla-community-portal', '', '<p>The <a href="http://community.joomla.org/" target="_blank" title="Joomla! Community Portal">Joomla! Community Portal</a> is now online. There, you will find a constant source of information about the activities of contributors powering the Joomla! Project. Learn about <a href="http://community.joomla.org/events.html" target="_blank" title="Joomla! Events">Joomla! Events</a> worldwide, and see if there is a <a href="http://community.joomla.org/user-groups.html" target="_blank" title="Joomla! User Groups">Joomla! User Group</a> nearby.</p><p>The <a href="http://community.joomla.org/magazine.html" target="_blank" title="Joomla! Community Magazine">Joomla! Community Magazine</a> promises an interesting overview of feature articles, community accomplishments, learning topics, and project updates each month. Also, check out <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">JoomlaConnect&#0153;</a>. This aggregated RSS feed brings together Joomla! news from all over the world in your language. Get the latest and greatest by clicking <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">here</a>.</p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 5, '', '', 0, 5, 'robots=\nauthor=');
INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(46, 'Typography', 'typography', '', '<p><span class="gk_color-6">This page presents most of typographical aspects of <strong>elvesocial</strong> template. Make your readers happy with great Typography and User Experience!</span></p>\r\n<p class="gk_info1">This is a sample info message. Use <strong>&lt;p class="gk_info1"&gt;Your info message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_tips1">This is a sample tips message. Use <strong>&lt;p class="gk_tips1"&gt;Your tips goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_warning1">This is a sample warning message. Use <strong>&lt;p class="gk_warning1"&gt;Your warning message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_info2">This is a sample info message. Use <strong>&lt;p class="gk_info2"&gt;Your info message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_tips2">This is a sample tips message. Use <strong>&lt;p class="gk_tips2"&gt;Your tips goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_warning2">This is a sample warning message. Use <strong>&lt;p class="gk_warning2"&gt;Your warning message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_info3">This is a sample info message. Use <strong>&lt;p class="gk_info3"&gt;Your info message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_tips3">This is a sample tips message. Use <strong>&lt;p class="gk_tips3"&gt;Your tips goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_warning3">This is a sample warning message. Use <strong>&lt;p class="gk_warning3"&gt;Your warning message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_info4">This is a sample info message. Use <strong>&lt;p class="gk_info4"&gt;Your info message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_tips4">This is a sample tips message. Use <strong>&lt;p class="gk_tips4"&gt;Your tips goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_warning4">This is a sample warning message. Use <strong>&lt;p class="gk_warning4"&gt;Your warning message goes here!&lt;/p&gt;</strong>.</p>\r\n<h1>This is heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer semper egestas nunc in volutpat. Fusce adipiscing velit ac eros tempor iaculis. Phasellus venenatis mollis augue, non posuere odio placerat in. Etiam volutpat ultrices lectus. Fusce eu felis erat. Donec congue interdum elit, sed ornare magna convallis lacinia. In hac habitasse platea dictumst. Mauris volutpat consectetur accumsan.</p>\r\n<h2>This is heading 2</h2>\r\n<p>Cras diam justo, sodales quis lobortis sed, lobortis vel mauris. Sed a mollis nunc. Quisque semper condimentum lectus, eget laoreet ipsum auctor et. Quisque sagittis luctus augue, id fringilla enim euismod quis. Nullam blandit, elit at euismod rutrum, tortor nibh posuere mauris, in volutpat diam ante ac dui. Sed velit massa, imperdiet placerat tristique et, consectetur a lorem. Praesent aliquet turpis in quam tempor eu pulvinar nibh luctus.</p>\r\n<h3>This is heading 3</h3>\r\n<p>Vivamus rhoncus arcu sit amet est tristique convallis nec vel eros. Vestibulum euismod luctus velit quis porta. Aliquam varius placerat mauris sed vehicula. Integer porta facilisis sapien, in tempus lorem mattis molestie. Suspendisse potenti. Praesent quis diam non dolor convallis mattis eu id nulla.</p>\r\n<h4>This is heading 4</h4>\r\n<p>Proin urna erat, egestas vel consectetur at, accumsan at purus. Donec est risus, facilisis dignissim placerat nec, euismod lacinia nisi. Nam ac sem sed quam sollicitudin condimentum et eu neque. Nunc enim urna, ultricies ac mollis pretium, imperdiet hendrerit massa. Sed eleifend felis sed tellus cursus lacinia. Aenean venenatis aliquet euismod. Nam quis turpis tellus, vitae malesuada neque.</p>\r\n<p> </p>\r\n<p class="gk_audio">This is a sample audio message. Use <strong>&lt;p class="gk_audio"&gt;Your audio message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_webcam">This is a sample webcam message. Use <strong>&lt;p class="gk_webcam"&gt;Your webcam goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_email">This is a sample email message. Use <strong>&lt;p class="gk_email"&gt;Your email message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_creditcard">This is a sample creditcard message. Use <strong>&lt;p class="gk_creditcard"&gt;Your creditcart message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_feed">This is a sample feed message. Use <strong>&lt;p class="gk_feed"&gt;Your feed goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_help">This is a sample help message. Use <strong>&lt;p class="gk_help"&gt;Your help message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_images">This is a sample images message. Use <strong>&lt;p class="gk_images"&gt;Your images message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_lock">This is a sample lock message. Use <strong>&lt;p class="gk_lock"&gt;Your webcam goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_printer">This is a sample printer message. Use <strong>&lt;p class="gk_printer"&gt;Your printer message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_report">This is a sample report message. Use <strong>&lt;p class="gk_report"&gt;Your report message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_script">This is a sample script message. Use <strong>&lt;p class="gk_script"&gt;Your script goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_time">This is a sample time message. Use <strong>&lt;p class="gk_time"&gt;Your time message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_user">This is a sample user message. Use <strong>&lt;p class="gk_user"&gt;Your user message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_world">This is a sample world message. Use <strong>&lt;p class="gk_world"&gt;Your world goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_cart">This is a sample cart message. Use <strong>&lt;p class="gk_cart"&gt;Your cart message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_cd">This is a sample cd message. Use <strong>&lt;p class="gk_cd"&gt;Your cd message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_chart_bar">This is a sample chart_bar message. Use <strong>&lt;p class="gk_chart_bar"&gt;Your chart_bar goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_chart_line">This is a sample chart_line message. Use <strong>&lt;p class="gk_chart_line"&gt;Your chart_line message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_chart_pie">This is a sample chart_pie message. Use <strong>&lt;p class="gk_chart_pie"&gt;Your chart_pie message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_clock">This is a sample clock message. Use <strong>&lt;p class="gk_clock"&gt;Your clock goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_cog">This is a sample cog message. Use <strong>&lt;p class="gk_cog"&gt;Your cog message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_coins">This is a sample coins message. Use <strong>&lt;p class="gk_coins"&gt;Your coins message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_compress">This is a sample compress message. Use <strong>&lt;p class="gk_compress"&gt;Your compress goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_computer">This is a sample computer message. Use <strong>&lt;p class="gk_computer"&gt;Your computer message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_cross">This is a sample cross message. Use <strong>&lt;p class="gk_cross"&gt;Your cross message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_disk">This is a sample disk message. Use <strong>&lt;p class="gk_disk"&gt;Your disk goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_error">This is a sample error message. Use <strong>&lt;p class="gk_error"&gt;Your error message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_exclamation">This is a sample exclamation message. Use <strong>&lt;p class="gk_exclamation"&gt;Your exclamation message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_film">This is a sample film message. Use <strong>&lt;p class="gk_film"&gt;Your film goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_folder">This is a sample folder message. Use <strong>&lt;p class="gk_folder"&gt;Your folder message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_group">This is a sample group message. Use <strong>&lt;p class="gk_group"&gt;Your group message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_heart">This is a sample heart message. Use <strong>&lt;p class="gk_heart"&gt;Your heart goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_house">This is a sample house message. Use <strong>&lt;p class="gk_house"&gt;Your house message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_image">This is a sample image message. Use <strong>&lt;p class="gk_image"&gt;Your image message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_information">This is a sample information message. Use <strong>&lt;p class="gk_information"&gt;Your information message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_magnifier">This is a sample magnifier message. Use <strong>&lt;p class="gk_magnifier"&gt;Your magnifier message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_money">This is a sample money message. Use <strong>&lt;p class="gk_money"&gt;Your money goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_new">This is a sample new message. Use <strong>&lt;p class="gk_new"&gt;Your new message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_note">This is a sample note message. Use <strong>&lt;p class="gk_note"&gt;Your note message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_page">This is a sample page message. Use <strong>&lt;p class="gk_page"&gt;Your page goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_page_white">This is a sample page_white message. Use <strong>&lt;p class="gk_page_white"&gt;Your page_white message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_plugin">This is a sample plugin message. Use <strong>&lt;p class="gk_plugin"&gt;Your plugin message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_accept">This is a sample accept message. Use <strong>&lt;p class="gk_accept"&gt;Your accept goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_add">This is a sample add message. Use <strong>&lt;p class="gk_add"&gt;Your add message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_camera">This is a sample camera message. Use <strong>&lt;p class="gk_camera"&gt;Your camera message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_brick">This is a sample brick message. Use <strong>&lt;p class="gk_brick"&gt;Your brick goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_box">This is a sample box message. Use <strong>&lt;p class="gk_box"&gt;Your box message goes here!&lt;/p&gt;</strong>.</p>\r\n<p class="gk_calendar">This is a sample calendar message. Use <strong>&lt;p class="gk_calendar"&gt;Your calendar message goes here!&lt;/p&gt;</strong>.</p>\r\n<p> </p>\r\n<p>This is a <span class="gk_highlight-1">highlight phrase</span>. Use <strong>&lt;span class="gk_highlight-1"&gt;Your highlight phrase goes here!&lt;/span&gt;</strong>.</p>\r\n<p>This is a <span class="gk_highlight-2">highlight phrase</span>. Use <strong>&lt;span class="gk_highlight-2"&gt;Your highlight phrase goes here!&lt;/span&gt;</strong>.</p>\r\n<p>This is a <span class="gk_highlight-3">highlight phrase</span>. Use <strong>&lt;span class="gk_highlight-3"&gt;Your highlight phrase goes here!&lt;/span&gt;</strong>.</p>\r\n<p>This is a <span class="gk_highlight-4">highlight phrase</span>. Use <strong>&lt;span class="gk_highlight-4"&gt;Your highlight phrase goes here!&lt;/span&gt;</strong>.</p>\r\n<p> </p>\r\n<p>Below is a sample of <strong>&lt;pre&gt;</strong> or <strong>&lt;div class="gk_code1"&gt;</strong></p>\r\n<pre>#wrapper {<br />	position: relative;<br />	float: left;<br />	display: block;<br />}<br /></pre>\r\n<p> </p>\r\n<p>Below is a sample of <strong>&lt;div class="gk_code2"&gt;</strong></p>\r\n<div class="gk_code2">#wrapper {<br /> position: relative;<br /> float: left;<br /> display: block;<br />}</div>\r\n<p> </p>\r\n<p>Below is a sample of <strong>&lt;div class="gk_code3"&gt;&lt;h4&gt;Name of your file&lt;/h4&gt;Here goes your code&lt;/div&gt;</strong></p>\r\n<div class="gk_code3">\r\n<h4>File</h4>\r\n#wrapper {<br /> position: relative;<br /> float: left;<br /> display: block;<br />}</div>\r\n<p> </p>\r\n<p>Types of unordered lists</p>\r\n<table border="0" width="100%">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>&lt;ul class="gk_bullet1"&gt;</strong></p>\r\n<ul class="gk_bullet1">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_bullet2"&gt;</strong></p>\r\n<ul class="gk_bullet2">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_bullet3"&gt;</strong></p>\r\n<ul class="gk_bullet3">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>&lt;ul class="gk_bullet4"&gt;</strong></p>\r\n<ul class="gk_bullet4">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_circle1"&gt;</strong></p>\r\n<ul class="gk_circle1">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_circle2"&gt;</strong></p>\r\n<ul class="gk_circle2">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>&lt;ul class="gk_square1"&gt;</strong></p>\r\n<ul class="gk_square1">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_square2"&gt;</strong></p>\r\n<ul class="gk_square2">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<p><strong>&lt;ul class="gk_square3"&gt;</strong></p>\r\n<ul class="gk_square3">\r\n<li>Element 1</li>\r\n<li>Element 2</li>\r\n<li>Element 3</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Types of ordered list:</p>\r\n<table border="0" width="100%">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>&lt;ol class="gk_roman"&gt;</strong></p>\r\n<ol class="gk_roman">\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n</ol></td>\r\n<td>\r\n<p><strong>&lt;ol class="gk_dec"&gt;</strong></p>\r\n<ol class="gk_dec">\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n</ol></td>\r\n<td>\r\n<p><strong>&lt;ol class="gk_alpha"&gt;</strong></p>\r\n<ol class="gk_alpha">\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n</ol></td>\r\n<td>\r\n<p><strong>&lt;ol class="gk_decimalLeadingZero"&gt;</strong></p>\r\n<ol class="gk_decimalLeadingZero">\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n<li>Element</li>\r\n</ol></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong>&lt;div class="gk_number1"&gt;&lt;p&gt;&lt;span&gt;here goes a number&lt;/span&gt;and here text of element&lt;/p&gt;</strong></p>\r\n<div class="gk_number1">\r\n<p><span>01</span> Element</p>\r\n<p><span>02</span> Element</p>\r\n</div>\r\n<p><strong>&lt;div class="gk_number2"&gt;&lt;p&gt;&lt;span&gt;here goes a number&lt;/span&gt;and here text of element&lt;/p&gt;</strong></p>\r\n<div class="gk_number2">\r\n<p><span>01</span> Element</p>\r\n<p><span>02</span> Element</p>\r\n</div>\r\n<p> </p>\r\n<p>This is a sample of an abbreviation <abbr title="Doctor">Dr</abbr>. Use <strong>&lt;abbr title="Here goes full word or phrase"&gt;here goes an abbreviation&lt;/abbr&gt;</strong></p>\r\n<p> </p>\r\n<p>This is a sample of an acronym <acronym title="North Atlantic Treaty Organization">NATO</acronym>. Use <strong>&lt;acronym title="Here goes full phrase"&gt;here goes an acronym&lt;/abbr&gt;</strong></p>\r\n<p> </p>\r\n<p>Below are samples of definition lists</p>\r\n<p><strong>&lt;dl class="gk_def1"&gt;&lt;dt&gt;Here goes the word you''re about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;</strong></p>\r\n<dl class="gk_def1"> <dt>Butter</dt> <dd>it is a dairy product made by churning fresh or fermented cream or milk. It is generally used as a spread and a condiment, as well as in cooking applications such as baking, sauce making, and frying. Butter consists of butterfat, water and milk proteins.</dd> <dt>Dairy milk</dt> <dd> is an opaque white liquid produced by the mammary glands of mammals (including monotremes). It provides the primary source of nutrition for newborn mammals before they are able to digest other types of food.</dd> </dl>\r\n<p><strong>&lt;dl class="gk_def2"&gt;&lt;dt&gt;Here goes the word you''re about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;</strong></p>\r\n<dl class="gk_def2"> <dt>Butter</dt> <dd>it is a dairy product made by churning fresh or fermented cream or milk. It is generally used as a spread and a condiment, as well as in cooking applications such as baking, sauce making, and frying. Butter consists of butterfat, water and milk proteins.</dd> <dt>Dairy milk</dt> <dd> is an opaque white liquid produced by the mammary glands of mammals (including monotremes). It provides the primary source of nutrition for newborn mammals before they are able to digest other types of food.</dd> </dl>\r\n<p><strong>&lt;dl class="gk_def3"&gt;&lt;dt&gt;Here goes the word you''re about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;</strong></p>\r\n<dl class="gk_def3"> <dt>Butter</dt> <dd>it is a dairy product made by churning fresh or fermented cream or milk. It is generally used as a spread and a condiment, as well as in cooking applications such as baking, sauce making, and frying. Butter consists of butterfat, water and milk proteins.</dd> <dt>Dairy milk</dt> <dd> is an opaque white liquid produced by the mammary glands of mammals (including monotremes). It provides the primary source of nutrition for newborn mammals before they are able to digest other types of food.</dd> </dl>\r\n<p> </p>\r\n<div class="gk_legend1">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend1"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend2">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend2"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend3">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend3"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend4">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend4"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend5">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend5"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<div class="gk_legend6">\r\n<h4>Legend</h4>\r\n<p>This is a sample legend note. Use <strong>&lt;div class="gk_legend6"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;</strong>.</p>\r\n</div>\r\n<p> </p>\r\n<p><span class="gk_Dropcap1">T</span>his is a sample text with Dropcap. Use <strong>&lt;p&gt; &lt;span class="gk_Dropcap1"&gt;t&lt;/span&gt;</strong> to make the first letter larger. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend. Vivamus ullamcorper est id libero aliquam ullamcorper. Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut..<strong>&lt;/p&gt;</strong>.</p>\r\n<p class="gk_Dropcap2"><span class="gk_Dropcap2">T</span>his is a sample text with Dropcap. Use <strong>&lt;p&gt; &lt;span class="gk_Dropcap2"&gt;t&lt;/span&gt;</strong> to make the first letter larger. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend. Vivamus ullamcorper est id libero aliquam ullamcorper. Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut..<strong>&lt;/p&gt;</strong>.</p>\r\n<p class="gk_Dropcap3"><span class="gk_Dropcap3">T</span>his is a sample text with Dropcap. Use <strong>&lt;p class="gk_Dropcap3"&gt; &lt;span class="gk_Dropcap3"&gt;t&lt;/span&gt;</strong> to make the first letter larger. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend. Vivamus ullamcorper est id libero aliquam ullamcorper. Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut..<strong>&lt;/p&gt;</strong>.</p>\r\n<p> </p>\r\n<p>Below are samples of text in which part of it is displayed in a separate block</p>\r\n<p><strong>&lt;p&gt; Here goes main part of the text &lt;span class="gk_blockTextLeft"&gt;Block of text&lt;/span&gt;rest of the text&lt;/p&gt; </strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend.<span class="gk_blockTextLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue.</span>Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut. Morbi cursus est vel velit hendrerit dictum.</p>\r\n<p><strong>&lt;p&gt; Here goes main part of the text &lt;span class="gk_blockTextRight"&gt;Block of text&lt;/span&gt;rest of the text&lt;/p&gt; </strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend.<span class="gk_blockTextRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue.</span>Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut. Morbi cursus est vel velit hendrerit dictum.</p>\r\n<p><strong>&lt;p&gt; Here goes main part of the text &lt;span class="gk_blockTextCenter"&gt;Block of text&lt;/span&gt;rest of the text&lt;/p&gt; </strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue. Duis quis quam sed purus porta eleifend.<span class="gk_blockTextCenter">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum pulvinar justo, sed faucibus ligula feugiat ac. Morbi quis enim nulla, vel congue augue.</span>Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus. Nam fermentum, eros quis ullamcorper convallis, libero mauris lacinia eros, sed tempus leo lorem vitae purus. Nunc a malesuada felis. Cras ultrices sapien eu nisi elementum non blandit urna sodales. Duis accumsan cursus massa, eu facilisis diam porta ut. Morbi cursus est vel velit hendrerit dictum.</p>\r\n<p> </p>\r\n<blockquote>This is a sample quote text. Use <strong>&lt; blockquote &gt; Your quoted text goes here!&lt; /blockquote &gt;</strong></blockquote>\r\n<blockquote>\r\n<div class="gk_blockquote1">\r\n<div>This is a sample quote text. Use<strong>&lt; blockquote&gt;&lt;div class="gk_blockquote1"&gt;&lt;div&gt; Your quoted text goes here!&lt; /div&gt;&lt; /div&gt;&lt; /blockquote &gt;</strong></div>\r\n</div>\r\n</blockquote>\r\n<p> </p>\r\n<blockquote>\r\n<div class="gk_blockquote2">\r\n<div>This is a sample quote text. Use<strong>&lt; blockquote&gt;&lt;div class="gk_blockquote2"&gt;&lt;div&gt; Your quoted text goes here!&lt; /div&gt;&lt; /div&gt;&lt; /blockquote &gt;</strong></div>\r\n</div>\r\n</blockquote>\r\n<p> </p>\r\n<blockquote>\r\n<div class="gk_blockquote3">\r\n<div>This is a sample quote text. Use<strong>&lt; blockquote&gt;&lt;div class="gk_blockquote3"&gt;&lt;div&gt; Your quoted text goes here!&lt; /div&gt;&lt; /div&gt;&lt; /blockquote &gt;</strong></div>\r\n</div>\r\n</blockquote>\r\n<p> </p>\r\n<blockquote>\r\n<div class="gk_blockquote4">\r\n<div>This is a sample quote text. Use<strong>&lt; blockquote&gt;&lt;div class="gk_blockquote4"&gt;&lt;div&gt; Your quoted text goes here!&lt; /div&gt;&lt; /div&gt;&lt; /blockquote &gt;</strong></div>\r\n</div>\r\n</blockquote>\r\n<p> </p>\r\n<p><span class="gk_clear">This is a sample pin note. Use <strong>&lt;span class="gk_clear"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_clear-1">This is a sample pin note. Use <strong>&lt;span class="gk_clear-1"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_clear-2">This is a sample pin note. Use <strong>&lt;span class="gk_clear-2"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color">This is a sample pin note. Use <strong>&lt;span class="gk_color"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-1">This is a sample pin note. Use <strong>&lt;span class="gk_color-1"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-2">This is a sample pin note. Use <strong>&lt;span class="gk_color-2"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-3">This is a sample pin note. Use <strong>&lt;span class="gk_color-3"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-4">This is a sample pin note. Use <strong>&lt;span class="gk_color-4"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-5">This is a sample pin note. Use <strong>&lt;span class="gk_color-5"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-6">This is a sample pin note. Use <strong>&lt;span class="gk_color-6"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>\r\n<p><span class="gk_color-7">This is a sample pin note. Use <strong>&lt;span class="gk_color-7"&gt;</strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>&lt;/span&gt;</strong></span></p>', '', 1, 0, 0, 0, '2009-07-31 18:16:30', 62, '', '2010-05-21 00:42:21', 62, 0, '0000-00-00 00:00:00', '2009-07-31 18:16:30', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 2, '', '', 0, 137, 'robots=\nauthor='),
(47, 'Modules Positions', 'modules-positions', '', '<p><span class="color-6"><strong>elvesocial</strong> template supports full width configurations for use with galleries or forums, make sure you do not publish any modules in right column and the component will fill the entire width.</span></p>\r\n<p> </p>\r\n<p style="text-align: center;"><img src="images/stories/demo/modulepositions.png" border="0" /></p>', '', 1, 0, 0, 0, '2009-07-31 23:23:02', 62, '', '2009-07-31 23:26:26', 62, 0, '0000-00-00 00:00:00', '2009-07-31 23:23:02', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 1, '', '', 0, 287, 'robots=\nauthor='),
(48, 'Me and my Husband', 'me-and-my-husband', '', '<p><img class="caption" src="images/stories/demo/demo1.jpg" border="0" alt="Me and my Husband on holidays" title="Me and my Husband on holidays" /></p>\r\n<div id="lipsum">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fringilla justo in nisl faucibus vel mollis risus ultricies. Morbi sed tristique sem. Integer dictum, risus sit amet venenatis eleifend, nibh risus ullamcorper eros, id molestie ante velit sed est. Fusce at porttitor nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit magna, ac aliquam nisi. Duis porta rhoncus odio, a lobortis lorem mattis in. Curabitur eget dolor mi, quis euismod nulla. Integer orci augue, fringilla eget rhoncus at, dictum a tortor. Vestibulum suscipit, leo id dignissim ultricies, sapien magna dignissim ante, ac accumsan eros nibh quis risus. In facilisis luctus ante, eu suscipit purus imperdiet ut. Vivamus condimentum suscipit sem vel laoreet.</p>\r\n<p>Proin interdum facilisis varius. Curabitur ac lorem nibh, sed mattis nisi. Morbi sodales risus ut orci consectetur egestas. Nulla tortor nulla, malesuada at placerat eu, adipiscing sed erat. Nunc id odio nisl. Pellentesque tincidunt tristique imperdiet. Proin ultricies nulla non magna lobortis eleifend. Maecenas blandit orci in enim convallis ultrices. Aliquam vel commodo neque. Vestibulum quis magna at mi sagittis pharetra eget nec diam. Pellentesque ullamcorper neque at sapien elementum a egestas neque varius. Donec vitae adipiscing nisl. Maecenas euismod diam porttitor sapien venenatis volutpat.</p>\r\n<p>Vestibulum ultricies sollicitudin felis nec pellentesque. Phasellus fermentum lorem odio, quis bibendum mauris. Integer pellentesque leo non dolor sagittis eu feugiat lectus blandit. Vestibulum sed turpis libero, quis gravida felis. Proin lorem sapien, semper lobortis malesuada a, elementum eget nunc. Nulla feugiat lacinia urna eu ultricies. Pellentesque rhoncus nunc id augue condimentum vestibulum. Aenean ornare urna et dui varius bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In ac massa posuere arcu euismod pretium ac vel sapien. Suspendisse sed ipsum diam, in luctus odio. Aliquam sit amet nulla mi. Nulla rhoncus ultrices sem non rutrum.</p>\r\n<p>Nulla facilisi. Suspendisse vitae placerat felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis massa felis, vel adipiscing libero. Aliquam erat volutpat. Aliquam et orci sit amet nulla tempor aliquet eget et sapien. Integer vehicula faucibus laoreet. Nullam at sem lobortis purus feugiat hendrerit sed vitae mauris. Donec eu felis nec libero faucibus lacinia. Ut aliquet felis vel neque dapibus eget commodo magna dapibus. Ut cursus pretium odio, auctor interdum quam dictum nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed suscipit, ipsum eget posuere tincidunt, massa urna condimentum purus, id tincidunt erat felis id ligula. Donec feugiat turpis eget tellus mattis eu rhoncus dolor eleifend.</p>\r\n<p>Mauris bibendum, neque sit amet bibendum aliquet, velit risus luctus orci, sit amet vulputate ligula felis ut sapien. In sed nisl metus, nec vulputate leo. Nunc porttitor, nulla eu hendrerit eleifend, purus nisi facilisis magna, id pretium eros lorem in leo. Aliquam at sapien nec erat lacinia vulputate. Nulla dignissim convallis dolor in egestas. Vivamus ante mi, tristique mattis cursus at, consequat et urna. Praesent dapibus mattis varius. Mauris at magna magna, id aliquam turpis. Aliquam cursus ligula nec augue venenatis fringilla. Ut pretium congue sagittis. Phasellus imperdiet risus in risus cursus aliquet.</p>\r\n</div>', '', -2, 5, 0, 34, '2009-08-01 15:32:11', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-08-01 15:32:11', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 0, '', '', 0, 0, 'robots=\nauthor='),
(50, 'Your community with your brand', 'your-community-with-your-brand', '', '<p><img class="caption" src="images/stories/demo/img1.jpg" border="0" alt="Your community with your brand" title="Your community with your brand" align="left" />Build your own social network with your own logos, graphics and themes. Customize the look of your community through CSS edits; or use the included templates to get your community up and running in no time.</p>\r\n', '\r\n<p> </p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non eros tortor, eu pulvinar est. Cras cursus, nulla id ullamcorper auctor, felis dui venenatis quam, vel tempus velit lorem non tortor. Mauris a tincidunt diam. Suspendisse potenti. Fusce sodales, ante id gravida adipiscing, massa turpis sollicitudin enim, sed adipiscing massa nibh ac lorem. Suspendisse placerat massa non tortor elementum in facilisis enim ultricies. Vivamus pulvinar ultrices velit at lacinia. Aenean tincidunt est eu urna tincidunt bibendum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tortor velit, luctus a venenatis quis, luctus ut erat. Aliquam erat volutpat. Phasellus magna dolor, mattis fringilla rhoncus vitae, sagittis et eros. Maecenas lectus leo, pellentesque quis pellentesque ut, gravida id risus. Vivamus dapibus nisi sit amet tellus commodo viverra. Maecenas blandit nisi ac nisl ultricies consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et ante tellus, sit amet iaculis risus. Aenean vehicula leo sit amet nisi facilisis a lacinia turpis feugiat. Morbi faucibus nisi a lectus cursus ut rhoncus velit fringilla. Nam cursus, est et vehicula aliquet, tortor enim blandit justo, ac adipiscing mauris eros sed dolor.</p>\r\n<p>Nunc dignissim posuere velit, tempor consequat lorem luctus nec. Quisque congue elit nibh, in fermentum tortor. Etiam lacus nisl, convallis eget gravida sit amet, viverra sed velit. In eros diam, laoreet at consectetur at, feugiat feugiat neque. Nullam eget enim turpis, nec vestibulum magna. Pellentesque sed mauris turpis, ac pharetra eros. Aenean scelerisque justo a ligula dictum adipiscing. Pellentesque ac venenatis erat. Aliquam in tortor ipsum. Donec ac ante purus, quis vulputate tortor. Ut laoreet eleifend nibh consectetur mattis.</p>\r\n<p>Etiam feugiat, nulla et fringilla laoreet, libero dolor suscipit orci, sed facilisis nisi dui sit amet magna. Etiam vehicula, leo vitae iaculis ultricies, dolor lectus porta est, a tincidunt libero velit vehicula eros. Praesent blandit diam vel massa feugiat interdum. Integer facilisis interdum sem, et placerat mauris ullamcorper a. Aenean scelerisque nisl at tellus posuere sagittis. Proin ac lacus purus. Morbi posuere ultrices urna, at tincidunt quam placerat at. Proin eget purus lacus, nec aliquet ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur est sapien, dignissim eget ullamcorper at, consectetur eu nisi.</p>\r\n<p>Etiam varius tortor vulputate neque sollicitudin quis viverra elit rutrum. Duis ornare vestibulum lacus, vel dictum leo ultrices a. Curabitur massa dolor, vehicula at porttitor in, sagittis ac ligula. Ut facilisis nisi ut lectus imperdiet vitae tempus est hendrerit. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam aliquam pellentesque adipiscing. Curabitur congue commodo tortor eget iaculis. Donec tincidunt, quam quis vestibulum congue, magna est tempus dolor, blandit egestas lorem elit non nulla. Etiam consectetur, lectus ac vestibulum elementum, felis velit ullamcorper ligula, non elementum neque sem non enim. Fusce hendrerit mauris eu nisi condimentum sodales. In sollicitudin nisl et elit euismod eget venenatis neque tempus. Sed non purus nec orci mattis fringilla eget ut neque. Nullam at ultrices lectus. Etiam malesuada ornare massa at vestibulum. In eget ligula ac felis auctor lobortis at non orci. Nunc hendrerit sagittis pulvinar. In non dui sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris libero metus, tincidunt vitae fringilla convallis, fringilla vitae ante.</p>', 1, 5, 0, 34, '2009-08-01 16:56:29', 62, '', '2010-04-27 23:03:05', 62, 0, '0000-00-00 00:00:00', '2009-08-01 16:56:29', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 7, '', '', 0, 310, 'robots=\nauthor='),
(49, 'Your Community with your brand', 'your-community-with-your-brand', '', '<p style="text-align: justify;"><img class="caption" src="images/stories/demo/elvesocial_com1.png" border="0" alt="Your Community with your brand" title="Your Community with your brand" />Build your own social network with your own logos, graphics and themes. Customize the look of your community through CSS edits; or use the included templates to get your community up and running in no time.</p>\r\n<div id="lipsum" style="text-align: justify;">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fringilla justo in nisl faucibus vel mollis risus ultricies. Morbi sed tristique sem. Integer dictum, risus sit amet venenatis eleifend, nibh risus ullamcorper eros, id molestie ante velit sed est. Fusce at porttitor nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget velit magna, ac aliquam nisi. Duis porta rhoncus odio, a lobortis lorem mattis in. Curabitur eget dolor mi, quis euismod nulla. Integer orci augue, fringilla eget rhoncus at, dictum a tortor. Vestibulum suscipit, leo id dignissim ultricies, sapien magna dignissim ante, ac accumsan eros nibh quis risus. In facilisis luctus ante, eu suscipit purus imperdiet ut. Vivamus condimentum suscipit sem vel laoreet.</p>\r\n<p>Proin interdum facilisis varius. Curabitur ac lorem nibh, sed mattis nisi. Morbi sodales risus ut orci consectetur egestas. Nulla tortor nulla, malesuada at placerat eu, adipiscing sed erat. Nunc id odio nisl. Pellentesque tincidunt tristique imperdiet. Proin ultricies nulla non magna lobortis eleifend. Maecenas blandit orci in enim convallis ultrices. Aliquam vel commodo neque. Vestibulum quis magna at mi sagittis pharetra eget nec diam. Pellentesque ullamcorper neque at sapien elementum a egestas neque varius. Donec vitae adipiscing nisl. Maecenas euismod diam porttitor sapien venenatis volutpat.</p>\r\n<p>Vestibulum ultricies sollicitudin felis nec pellentesque. Phasellus fermentum lorem odio, quis bibendum mauris. Integer pellentesque leo non dolor sagittis eu feugiat lectus blandit. Vestibulum sed turpis libero, quis gravida felis. Proin lorem sapien, semper lobortis malesuada a, elementum eget nunc. Nulla feugiat lacinia urna eu ultricies. Pellentesque rhoncus nunc id augue condimentum vestibulum. Aenean ornare urna et dui varius bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In ac massa posuere arcu euismod pretium ac vel sapien. Suspendisse sed ipsum diam, in luctus odio. Aliquam sit amet nulla mi. Nulla rhoncus ultrices sem non rutrum.</p>\r\n<p>Nulla facilisi. Suspendisse vitae placerat felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis massa felis, vel adipiscing libero. Aliquam erat volutpat. Aliquam et orci sit amet nulla tempor aliquet eget et sapien. Integer vehicula faucibus laoreet. Nullam at sem lobortis purus feugiat hendrerit sed vitae mauris. Donec eu felis nec libero faucibus lacinia. Ut aliquet felis vel neque dapibus eget commodo magna dapibus. Ut cursus pretium odio, auctor interdum quam dictum nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed suscipit, ipsum eget posuere tincidunt, massa urna condimentum purus, id tincidunt erat felis id ligula. Donec feugiat turpis eget tellus mattis eu rhoncus dolor eleifend.</p>\r\n<p style="text-align: justify;">Mauris bibendum, neque sit amet bibendum aliquet, velit risus luctus orci, sit amet vulputate ligula felis ut sapien. In sed nisl metus, nec vulputate leo. Nunc porttitor, nulla eu hendrerit eleifend, purus nisi facilisis magna, id pretium eros lorem in leo. Aliquam at sapien nec erat lacinia vulputate. Nulla dignissim convallis dolor in egestas. Vivamus ante mi, tristique mattis cursus at, consequat et urna. Praesent dapibus mattis varius. Mauris at magna magna, id aliquam turpis. Aliquam cursus ligula nec augue venenatis fringilla. Ut pretium congue sagittis. Phasellus imperdiet risus in risus cursus aliquet.</p>\r\n</div>', '', 1, 1, 0, 1, '2009-08-01 15:52:08', 62, '', '2010-04-27 22:41:38', 62, 0, '0000-00-00 00:00:00', '2009-08-01 15:52:08', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 6, '', '', 0, 0, 'robots=\nauthor=');
INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(51, 'Share photos', 'share-photos', '', '<p><img class="caption" src="images/stories/demo/img2.jpg" border="0" alt="Share photos" title="Share photos" align="left" />Creating photo albums to share with friends is as easy as 1-2-3! Get your friends to comment on your photos, and as an admin, delete the community photos you deem inappropriate. You have total control over ...</p>\r\n', '\r\n<p> </p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non eros tortor, eu pulvinar est. Cras cursus, nulla id ullamcorper auctor, felis dui venenatis quam, vel tempus velit lorem non tortor. Mauris a tincidunt diam. Suspendisse potenti. Fusce sodales, ante id gravida adipiscing, massa turpis sollicitudin enim, sed adipiscing massa nibh ac lorem. Suspendisse placerat massa non tortor elementum in facilisis enim ultricies. Vivamus pulvinar ultrices velit at lacinia. Aenean tincidunt est eu urna tincidunt bibendum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tortor velit, luctus a venenatis quis, luctus ut erat. Aliquam erat volutpat. Phasellus magna dolor, mattis fringilla rhoncus vitae, sagittis et eros. Maecenas lectus leo, pellentesque quis pellentesque ut, gravida id risus. Vivamus dapibus nisi sit amet tellus commodo viverra. Maecenas blandit nisi ac nisl ultricies consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et ante tellus, sit amet iaculis risus. Aenean vehicula leo sit amet nisi facilisis a lacinia turpis feugiat. Morbi faucibus nisi a lectus cursus ut rhoncus velit fringilla. Nam cursus, est et vehicula aliquet, tortor enim blandit justo, ac adipiscing mauris eros sed dolor.</p>\r\n<p>Nunc dignissim posuere velit, tempor consequat lorem luctus nec. Quisque congue elit nibh, in fermentum tortor. Etiam lacus nisl, convallis eget gravida sit amet, viverra sed velit. In eros diam, laoreet at consectetur at, feugiat feugiat neque. Nullam eget enim turpis, nec vestibulum magna. Pellentesque sed mauris turpis, ac pharetra eros. Aenean scelerisque justo a ligula dictum adipiscing. Pellentesque ac venenatis erat. Aliquam in tortor ipsum. Donec ac ante purus, quis vulputate tortor. Ut laoreet eleifend nibh consectetur mattis.</p>\r\n<p>Etiam feugiat, nulla et fringilla laoreet, libero dolor suscipit orci, sed facilisis nisi dui sit amet magna. Etiam vehicula, leo vitae iaculis ultricies, dolor lectus porta est, a tincidunt libero velit vehicula eros. Praesent blandit diam vel massa feugiat interdum. Integer facilisis interdum sem, et placerat mauris ullamcorper a. Aenean scelerisque nisl at tellus posuere sagittis. Proin ac lacus purus. Morbi posuere ultrices urna, at tincidunt quam placerat at. Proin eget purus lacus, nec aliquet ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur est sapien, dignissim eget ullamcorper at, consectetur eu nisi.</p>\r\n<p>Etiam varius tortor vulputate neque sollicitudin quis viverra elit rutrum. Duis ornare vestibulum lacus, vel dictum leo ultrices a. Curabitur massa dolor, vehicula at porttitor in, sagittis ac ligula. Ut facilisis nisi ut lectus imperdiet vitae tempus est hendrerit. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam aliquam pellentesque adipiscing. Curabitur congue commodo tortor eget iaculis. Donec tincidunt, quam quis vestibulum congue, magna est tempus dolor, blandit egestas lorem elit non nulla. Etiam consectetur, lectus ac vestibulum elementum, felis velit ullamcorper ligula, non elementum neque sem non enim. Fusce hendrerit mauris eu nisi condimentum sodales. In sollicitudin nisl et elit euismod eget venenatis neque tempus. Sed non purus nec orci mattis fringilla eget ut neque. Nullam at ultrices lectus. Etiam malesuada ornare massa at vestibulum. In eget ligula ac felis auctor lobortis at non orci. Nunc hendrerit sagittis pulvinar. In non dui sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris libero metus, tincidunt vitae fringilla convallis, fringilla vitae ante.</p>', 1, 5, 0, 34, '2009-08-01 17:14:13', 62, '', '2009-08-02 06:12:52', 62, 0, '0000-00-00 00:00:00', '2009-08-01 17:14:13', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 6, '', '', 0, 78, 'robots=\nauthor='),
(52, 'Create groups and manage them', 'create-groups-and-manage-them', '', '<p><img class="caption" src="images/stories/demo/img3.jpg" border="0" alt="Create groups and manage them" title="Create groups and manage them" align="left" />Create unlimited special-interest groups with Jomsocial and manage them all easily. Add more members to your groups by inviting your friends and hide any group you wish with our unique Privacy Settings.</p>\r\n', '\r\n<p> </p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non eros tortor, eu pulvinar est. Cras cursus, nulla id ullamcorper auctor, felis dui venenatis quam, vel tempus velit lorem non tortor. Mauris a tincidunt diam. Suspendisse potenti. Fusce sodales, ante id gravida adipiscing, massa turpis sollicitudin enim, sed adipiscing massa nibh ac lorem. Suspendisse placerat massa non tortor elementum in facilisis enim ultricies. Vivamus pulvinar ultrices velit at lacinia. Aenean tincidunt est eu urna tincidunt bibendum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tortor velit, luctus a venenatis quis, luctus ut erat. Aliquam erat volutpat. Phasellus magna dolor, mattis fringilla rhoncus vitae, sagittis et eros. Maecenas lectus leo, pellentesque quis pellentesque ut, gravida id risus. Vivamus dapibus nisi sit amet tellus commodo viverra. Maecenas blandit nisi ac nisl ultricies consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et ante tellus, sit amet iaculis risus. Aenean vehicula leo sit amet nisi facilisis a lacinia turpis feugiat. Morbi faucibus nisi a lectus cursus ut rhoncus velit fringilla. Nam cursus, est et vehicula aliquet, tortor enim blandit justo, ac adipiscing mauris eros sed dolor.</p>\r\n<p>Nunc dignissim posuere velit, tempor consequat lorem luctus nec. Quisque congue elit nibh, in fermentum tortor. Etiam lacus nisl, convallis eget gravida sit amet, viverra sed velit. In eros diam, laoreet at consectetur at, feugiat feugiat neque. Nullam eget enim turpis, nec vestibulum magna. Pellentesque sed mauris turpis, ac pharetra eros. Aenean scelerisque justo a ligula dictum adipiscing. Pellentesque ac venenatis erat. Aliquam in tortor ipsum. Donec ac ante purus, quis vulputate tortor. Ut laoreet eleifend nibh consectetur mattis.</p>\r\n<p>Etiam feugiat, nulla et fringilla laoreet, libero dolor suscipit orci, sed facilisis nisi dui sit amet magna. Etiam vehicula, leo vitae iaculis ultricies, dolor lectus porta est, a tincidunt libero velit vehicula eros. Praesent blandit diam vel massa feugiat interdum. Integer facilisis interdum sem, et placerat mauris ullamcorper a. Aenean scelerisque nisl at tellus posuere sagittis. Proin ac lacus purus. Morbi posuere ultrices urna, at tincidunt quam placerat at. Proin eget purus lacus, nec aliquet ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur est sapien, dignissim eget ullamcorper at, consectetur eu nisi.</p>\r\n<p>Etiam varius tortor vulputate neque sollicitudin quis viverra elit rutrum. Duis ornare vestibulum lacus, vel dictum leo ultrices a. Curabitur massa dolor, vehicula at porttitor in, sagittis ac ligula. Ut facilisis nisi ut lectus imperdiet vitae tempus est hendrerit. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam aliquam pellentesque adipiscing. Curabitur congue commodo tortor eget iaculis. Donec tincidunt, quam quis vestibulum congue, magna est tempus dolor, blandit egestas lorem elit non nulla. Etiam consectetur, lectus ac vestibulum elementum, felis velit ullamcorper ligula, non elementum neque sem non enim. Fusce hendrerit mauris eu nisi condimentum sodales. In sollicitudin nisl et elit euismod eget venenatis neque tempus. Sed non purus nec orci mattis fringilla eget ut neque. Nullam at ultrices lectus. Etiam malesuada ornare massa at vestibulum. In eget ligula ac felis auctor lobortis at non orci. Nunc hendrerit sagittis pulvinar. In non dui sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris libero metus, tincidunt vitae fringilla convallis, fringilla vitae ante.</p>', 1, 5, 0, 34, '2009-08-01 17:18:19', 62, '', '2009-08-02 06:10:16', 62, 0, '0000-00-00 00:00:00', '2009-08-01 17:18:19', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 5, '', '', 0, 20, 'robots=\nauthor='),
(53, 'Module Variations', 'module-variations', '', '<p>Please remember about using space at  beginning of suffix name in module options. You can use: <strong>white</strong> and <strong>green</strong> suffixes.</p>\r\n<p>Additionaly for the modules in the header section you can use <strong>blue</strong> suffix.</p>\r\n<p>Suffix <strong>clear</strong> is used usually in header positions for Image  Show and GK Tab modules.</p>', '', 1, 1, 0, 1, '2010-05-02 12:15:03', 62, '', '2010-05-28 07:47:56', 62, 0, '0000-00-00 00:00:00', '2010-05-02 12:15:03', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 8, '', '', 0, 24, 'robots=\nauthor='),
(54, 'IE6 style', 'ie6-style', '', '<p>Internet Explorer 6 is on the way out, but there is still a  significant number of users that are stuck to this browser. According to  this, we decided that our templates are going to support IE 6 slightly.  By dint of the "IE6 Bar" plug-in, available in templates menu options,  users can apply the upper bar in their IE browser to keep them informed  that Internet Explorer can not display the Web site properly.  Additionally, instead of the whole range of template styles, we created  one style- Universal Internet Explorer 6 CSS - <a href="http://code.google.com/p/universal-ie6-css/" target="_blank">project''s  website</a>. Thanks to this, users will have the full access to the  web’s content, but on the other hand, a web site’s appearance and  functioning might be more rough to some extend.</p>', '', 1, 1, 0, 1, '2010-05-02 12:18:57', 62, '', '2010-05-21 20:18:02', 62, 0, '0000-00-00 00:00:00', '2010-05-02 12:18:57', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 3, '', '', 0, 5, 'robots=\nauthor='),
(55, 'Messages', 'messages', '', '<p>Joomla! offers three different types of messages. Creatings standard information about Joomla! system is presented depending on a message type as follows:</p>\r\n<dl id="system-message"><dt class="error">Error</dt><dd class="message message fade"> \r\n<ul>\r\n<li>This is a sample message</li>\r\n</ul>\r\n</dd></dl> <dl id="system-message"><dt class="error">Error</dt><dd class="notice message fade"> \r\n<ul>\r\n<li>This is a sample warning message</li>\r\n</ul>\r\n</dd></dl> <dl id="system-message"><dt class="error">Error</dt><dd class="error message fade"> \r\n<ul>\r\n<li>This is a sample error message</li>\r\n</ul>\r\n</dd></dl>', '', 1, 1, 0, 1, '2010-05-02 12:21:19', 62, '', '2010-05-21 20:17:53', 62, 0, '0000-00-00 00:00:00', '2010-05-02 12:21:19', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 2, '', '', 0, 27, 'robots=\nauthor='),
(56, 'Chrome Frame', 'chrome-frame', '', '<p>Google Chrome Frame is a retort of Google company to Internet  Explorer browser which is still widely popular, despite the fact that  its rendering engine remains fallen behind other internet browsers. By  applying this plug-in, users can benefit from Webkit engine capabilities  and, at the same time, do not loose the opportunity of using Internet  Explorer interface. To make this interesting solution work, an  appropriate "meta name" has to be implemented into the head section of  the visited page.</p>\r\n<p>In accordance with that, our template contains an appropriate option  in its settings that helps the user to switch the meta name in the head  section, so that all IE users that have Google Chrome Frame plug-in  installed will be able to see the web site along with all facilities  offered by Webkit rendering engine.</p>\r\n<p>To get know more about Google Chrome Frame, please visit:</p>\r\n<p><a href="http://code.google.com/intl/pl-PL/chrome/chromeframe/">http://code.google.com/intl/pl-PL/chrome/chromeframe/</a> - the official Project’s web side containing the link to the plug-in.</p>\r\n<p><a href="http://www.chromium.org/developers/how-tos/chrome-frame-getting-started">http://www.chromium.org/developers/how-tos/chrome-frame-getting-started</a> - more info about Google Chrome Frame for developers.</p>', '', 1, 1, 0, 1, '2010-05-02 12:23:57', 62, '', '2010-05-21 20:17:44', 62, 0, '0000-00-00 00:00:00', '2010-05-02 12:23:57', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 4, '', '', 0, 8, 'robots=\nauthor=');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__content_frontpage`
--

CREATE TABLE IF NOT EXISTS `#__content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__content_frontpage`
--

INSERT INTO `#__content_frontpage` (`content_id`, `ordering`) VALUES
(49, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__content_rating`
--

CREATE TABLE IF NOT EXISTS `#__content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__content_rating`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__core_acl_aro`
--

CREATE TABLE IF NOT EXISTS `#__core_acl_aro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_value` varchar(240) NOT NULL DEFAULT '0',
  `value` varchar(240) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `#__section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `#__gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Zrzut danych tabeli `#__core_acl_aro`
--

INSERT INTO `#__core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', '62', 0, 'Administrator', 0),
(38, 'users', '90', 0, 'Kuki Soler', 0),
(39, 'users', '91', 0, 'Peter Gabriel', 0),
(40, 'users', '92', 0, 'Natalie Portman', 0),
(41, 'users', '93', 0, 'Taylor Crash', 0),
(42, 'users', '94', 0, 'Theresa Midfield', 0),
(43, 'users', '95', 0, 'Cool Jazz', 0),
(44, 'users', '96', 0, 'Jean Philip', 0),
(45, 'users', '97', 0, 'Jennifer Law', 0),
(46, 'users', '98', 0, 'Gabriel Salvatori', 0),
(47, 'users', '99', 0, 'Linda Bauli', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__core_acl_aro_groups`
--

CREATE TABLE IF NOT EXISTS `#__core_acl_aro_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `#__gacl_parent_id_aro_groups` (`parent_id`),
  KEY `#__gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Zrzut danych tabeli `#__core_acl_aro_groups`
--

INSERT INTO `#__core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`) VALUES
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
-- Struktura tabeli dla  `#__core_acl_aro_map`
--

CREATE TABLE IF NOT EXISTS `#__core_acl_aro_map` (
  `acl_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(230) NOT NULL DEFAULT '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__core_acl_aro_map`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__core_acl_aro_sections`
--

CREATE TABLE IF NOT EXISTS `#__core_acl_aro_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(230) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(230) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `#__gacl_value_aro_sections` (`value`),
  KEY `#__gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `#__core_acl_aro_sections`
--

INSERT INTO `#__core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', 1, 'Users', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__core_acl_groups_aro_map`
--

CREATE TABLE IF NOT EXISTS `#__core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(240) NOT NULL DEFAULT '',
  `aro_id` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__core_acl_groups_aro_map`
--

INSERT INTO `#__core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES
(18, '', 38),
(18, '', 39),
(18, '', 40),
(18, '', 41),
(18, '', 42),
(18, '', 43),
(18, '', 44),
(18, '', 45),
(18, '', 46),
(18, '', 47),
(25, '', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__core_log_items`
--

CREATE TABLE IF NOT EXISTS `#__core_log_items` (
  `time_stamp` date NOT NULL DEFAULT '0000-00-00',
  `item_table` varchar(50) NOT NULL DEFAULT '',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__core_log_items`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__core_log_searches`
--

CREATE TABLE IF NOT EXISTS `#__core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__core_log_searches`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__gk3_tabs_manager_groups`
--

CREATE TABLE IF NOT EXISTS `#__gk3_tabs_manager_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `#__gk3_tabs_manager_groups`
--

INSERT INTO `#__gk3_tabs_manager_groups` (`id`, `name`, `desc`) VALUES
(1, 'Demo', 'Demo group');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__gk3_tabs_manager_options`
--

CREATE TABLE IF NOT EXISTS `#__gk3_tabs_manager_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `#__gk3_tabs_manager_options`
--

INSERT INTO `#__gk3_tabs_manager_options` (`id`, `name`, `value`) VALUES
(1, 'modal_news', '0'),
(2, 'modal_settings', '1'),
(3, 'group_shortcuts', '1'),
(4, 'tab_shortcuts', '1'),
(5, 'wysiwyg', '1'),
(6, 'gavick_news', '1'),
(7, 'article_id', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__gk3_tabs_manager_tabs`
--

CREATE TABLE IF NOT EXISTS `#__gk3_tabs_manager_tabs` (
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
-- Zrzut danych tabeli `#__gk3_tabs_manager_tabs`
--

INSERT INTO `#__gk3_tabs_manager_tabs` (`id`, `group_id`, `name`, `type`, `content`, `published`, `access`, `order`) VALUES
(1, 1, 'Create your own social network', 'xhtml', '&lt;p&gt;&lt;img src=\\&quot;images/stories/demo/tab_content_img1.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;gavickpro  joomla template jomsocial component\\&quot; /&gt; &lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=\\&quot;images/stories/demo/b_buy_now.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;Buy now!\\&quot; /&gt; &lt;a href=\\&quot;index.php?option=com_community&amp;amp;view=frontpage&amp;amp;Itemid=82\\&quot;&gt;&lt;img src=\\&quot;images/stories/demo/b_live_demo.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;Live Demo!\\&quot; /&gt;&lt;/a&gt;&lt;/p&gt;', 1, 0, 1),
(2, 1, 'Your community with your brand', 'xhtml', '&lt;p&gt;&lt;img src=\\&quot;images/stories/demo/your_community.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;your_community\\&quot; /&gt;&lt;/p&gt;', 1, 0, 2),
(3, 1, 'Get GavickPro JomSocial Coupon', 'xhtml', '&lt;p&gt;&lt;img src=\\&quot;images/stories/demo/get_gavick.png\\&quot; border=\\&quot;0\\&quot; alt=\\&quot;gavickpro jomsocial  coupon\\&quot; /&gt;&lt;/p&gt;', 1, 0, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__groups`
--

CREATE TABLE IF NOT EXISTS `#__groups` (
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__groups`
--

INSERT INTO `#__groups` (`id`, `name`) VALUES
(0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__jcomments`
--

CREATE TABLE IF NOT EXISTS `#__jcomments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
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
  KEY `idx_object` (`object_id`,`object_group`,`published`,`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `#__jcomments`
--

INSERT INTO `#__jcomments` (`id`, `parent`, `object_id`, `object_group`, `object_params`, `lang`, `userid`, `name`, `username`, `email`, `homepage`, `title`, `comment`, `ip`, `date`, `isgood`, `ispoor`, `published`, `subscribe`, `source`, `checked_out`, `checked_out_time`, `editor`) VALUES
(1, 0, 22, 'com_content', '', 'en-GB', 0, 'eee@eee.pl', 'eee@eee.pl', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dignissim quam sed nulla placerat malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec a ornare risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean vitae purus at orci pellentesque tempus in sed metus. Cras vulputate aliquam posuere. Morbi sed scelerisque tellus. Donec a dui vel sapien tincidunt facilisis.', '212.51.220.159', '2010-05-07 10:58:34', 0, 0, 1, 0, '', 0, '0000-00-00 00:00:00', ''),
(2, 0, 51, 'com_content', '', 'en-GB', 0, 'Robert Gavick', 'Robert Gavick', 'test@test.pl', '', '', 's lorem elit non nulla. Etiam consectetur, lectus ac vestibulum elementum, felis velit ullamcorper ligula, non elementum neque sem non enim. Fusce hendrerit mauris eu nisi condimentum sodales. In sollicitudin nisl et elit euismod eget venenatis neque tempus. Sed non purus nec orci mattis fringilla eget ut neque. Nullam at ultrices lectus. Etiam malesuada ornare massa at vestibulum. In eget ligula ac felis auctor lobortis at non orci. Nunc hendrerit sagittis pulvinar. In non dui sapien. Pellentesque habitant morbi tristique senectus et netus e', '80.48.185.155', '2010-05-28 11:11:33', 0, 0, 1, 0, '', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__jcomments_custom_bbcodes`
--

CREATE TABLE IF NOT EXISTS `#__jcomments_custom_bbcodes` (
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
-- Zrzut danych tabeli `#__jcomments_custom_bbcodes`
--

INSERT INTO `#__jcomments_custom_bbcodes` (`id`, `name`, `simple_pattern`, `simple_replacement_html`, `simple_replacement_text`, `pattern`, `replacement_html`, `replacement_text`, `button_acl`, `button_open_tag`, `button_close_tag`, `button_title`, `button_prompt`, `button_image`, `button_css`, `button_enabled`, `ordering`, `published`) VALUES
(1, 'YouTube Video', '[youtube]http://www.youtube.com/watch?v={IDENTIFIER}[/youtube]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/{IDENTIFIER}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/{IDENTIFIER}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v={IDENTIFIER}', '\\[youtube\\]http\\://www\\.youtube\\.com/watch\\?v\\=([A-Za-z0-9-_]+)\\[\\/youtube\\]', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/${1}"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/${1}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>', 'http://www.youtube.com/watch?v=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[youtube]', '[/youtube]', 'YouTube Video', '', '', 'bbcode-youtube', 1, 1, 1),
(2, 'Google Video', '[google]http://video.google.com/videoplay?docid={IDENTIFIER}[/google]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId={IDENTIFIER}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid={IDENTIFIER}', '\\[google\\]http\\://video\\.google\\.com/videoplay\\?docid\\=([A-Za-z0-9-_]+)\\[\\/google\\]', '<embed style="width:425px; height:350px;" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId=${1}" flashvars=""></embed>', 'http://video.google.com/videoplay?docid=${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[google]', '[/google]', 'Google Video', '', '', 'bbcode-google', 1, 2, 1),
(3, 'Wiki', '[wiki]{TEXT}[/wiki]', '<a href="http://www.wikipedia.org/wiki/{TEXT}" title="{TEXT}" target="_blank">{TEXT}</a>', '{TEXT}', '\\[wiki\\]([\\w0-9-\\+\\.,_ ]+)\\[\\/wiki\\]', '<a href="http://www.wikipedia.org/wiki/${1}" title="${1}" target="_blank">${1}</a>', '${1}', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator', '[wiki]', '[/wiki]', 'Wikipedia', '', '', 'bbcode-wiki', 1, 3, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__jcomments_settings`
--

CREATE TABLE IF NOT EXISTS `#__jcomments_settings` (
  `component` varchar(50) NOT NULL DEFAULT '',
  `lang` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`component`,`lang`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__jcomments_settings`
--

INSERT INTO `#__jcomments_settings` (`component`, `lang`, `name`, `value`) VALUES
('', '', 'enable_username_check', '0'),
('', '', 'username_maxlength', '0'),
('', '', 'forbidden_names', ''),
('', '', 'author_email', '2'),
('', '', 'author_homepage', '1'),
('', '', 'comment_maxlength', '0'),
('', '', 'word_maxlength', '0'),
('', '', 'link_maxlength', '0'),
('', '', 'flood_time', '0'),
('', '', 'enable_notification', '0'),
('', '', 'notification_email', ''),
('', '', 'template', 'gk_style'),
('', '', 'enable_smiles', '0'),
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
('', '', 'enable_bbcode_b', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_i', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_u', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_s', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_url', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_img', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_list', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_hide', 'Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'can_view_ip', 'Administrator,Super Administrator'),
('', '', 'enable_categories', '1,3,28,27,31,32,29,25,30,34'),
('', '', 'emailprotection', 'Unregistered'),
('', '', 'enable_comment_maxlength_check', ''),
('', '', 'enable_autocensor', 'Unregistered'),
('', '', 'badwords', ''),
('', '', 'smiles', ':D	laugh.gif\n:lol:	lol.gif\n:-)	smile.gif\n;-)	wink.gif\n8)	cool.gif\n:-|	normal.gif\n:-*	whistling.gif\n:oops:	redface.gif\n:sad:	sad.gif\n:cry:	cry.gif\n:o	surprised.gif\n:-?	confused.gif\n:-x	sick.gif\n:eek:	shocked.gif\n:zzz	sleeping.gif\n:P	tongue.gif\n:roll:	rolleyes.gif\n:sigh:	unsure.gif'),
('', '', 'enable_mambots', '0'),
('', '', 'form_show', '1'),
('', '', 'display_author', 'name'),
('', '', 'enable_voting', '0'),
('', '', 'can_vote', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'merge_time', '30'),
('', '', 'gzip_js', '0'),
('', '', 'template_view', 'list'),
('', '', 'message_policy_post', ''),
('', '', 'message_policy_whocancomment', ''),
('', '', 'message_locked', ''),
('', '', 'comment_title', '0'),
('', '', 'enable_custom_bbcode', '0'),
('', '', 'enable_bbcode_quote', 'Unregistered,Registered,Author,Editor,Publisher,Manager,Administrator,Super Administrator'),
('', '', 'enable_bbcode_code', ''),
('', '', 'enable_geshi', '0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__jcomments_subscriptions`
--

CREATE TABLE IF NOT EXISTS `#__jcomments_subscriptions` (
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

--
-- Zrzut danych tabeli `#__jcomments_subscriptions`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__jcomments_version`
--

CREATE TABLE IF NOT EXISTS `#__jcomments_version` (
  `version` varchar(16) NOT NULL DEFAULT '',
  `previous` varchar(16) NOT NULL DEFAULT '',
  `installed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__jcomments_version`
--

INSERT INTO `#__jcomments_version` (`version`, `previous`, `installed`, `updated`) VALUES
('2.1.0.0', '', '2010-05-06 13:58:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__jcomments_votes`
--

CREATE TABLE IF NOT EXISTS `#__jcomments_votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commentid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_comment` (`commentid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `#__jcomments_votes`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__k2_attachments`
--

CREATE TABLE IF NOT EXISTS `#__k2_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleAttribute` text NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `#__k2_attachments`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__k2_categories`
--

CREATE TABLE IF NOT EXISTS `#__k2_categories` (
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
-- Zrzut danych tabeli `#__k2_categories`
--

INSERT INTO `#__k2_categories` (`id`, `name`, `alias`, `description`, `parent`, `extraFieldsGroup`, `published`, `access`, `ordering`, `image`, `params`, `trash`, `plugins`) VALUES
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
-- Struktura tabeli dla  `#__k2_comments`
--

CREATE TABLE IF NOT EXISTS `#__k2_comments` (
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
-- Zrzut danych tabeli `#__k2_comments`
--

INSERT INTO `#__k2_comments` (`id`, `itemID`, `userID`, `userName`, `commentDate`, `commentText`, `commentEmail`, `commentURL`, `published`) VALUES
(1, 55, 0, 'Robert', '2010-04-20 14:09:29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin est massa, vestibulum in gravida vel, pellentesque vel neque. Phasellus felis mi, dapibus at interdum eu, sagittis quis diam. Donec ullamcorper lacus et nunc porttitor eleifend vitae at quam. Donec tincidunt mauris vel metus tincidunt quis accumsan massa malesuada.', 'robert@robert.pl', '', 1),
(2, 57, 0, 'Daniele', '2010-04-21 22:54:37', 'Extra points for this equipment.', 'dlo@ldodo.tt', '', 1),
(3, 56, 0, 'Mariela Cris', '2010-04-21 23:33:34', 'Have it from 5 month ago and still with no problems at all.', 'grge@geyd.rd', '', 1),
(4, 60, 0, 'Truthy', '2010-04-21 23:59:56', 'Toshiba as been always my first choice. This E205 have a nice performance. I recommend it.', 'getgs@pppl.jd', '', 1),
(5, 63, 0, 'Boss', '2010-04-22 02:29:07', 'Elegance, powerful and really smart phone.\nI like a lot.', 'wrea@oyudf.vkv', '', 1),
(6, 66, 0, 'Kamane', '2010-04-22 14:27:29', 'Amazing image quality. Excellent for both personal or professional production.', 'keke@ldop.yy', '', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__k2_extra_fields`
--

CREATE TABLE IF NOT EXISTS `#__k2_extra_fields` (
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
-- Zrzut danych tabeli `#__k2_extra_fields`
--

INSERT INTO `#__k2_extra_fields` (`id`, `name`, `value`, `type`, `group`, `published`, `ordering`) VALUES
(1, 'Name', '[{"name":null,"value":"","target":null}]', 'textfield', 1, 1, 1),
(2, 'Code', '[{"name":null,"value":"","target":null}]', 'textfield', 1, 1, 2),
(3, 'Price', '[{"name":null,"value":"","target":null}]', 'textfield', 1, 1, 4),
(4, 'Description', '[{"name":null,"value":"","target":null}]', 'textarea', 1, 1, 5),
(5, 'Features', '[{"name":null,"value":"","target":null}]', 'textarea', 1, 1, 6),
(7, 'Trademark', '[{"name":null,"value":"","target":null}]', 'textfield', 1, 1, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__k2_extra_fields_groups`
--

CREATE TABLE IF NOT EXISTS `#__k2_extra_fields_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `#__k2_extra_fields_groups`
--

INSERT INTO `#__k2_extra_fields_groups` (`id`, `name`) VALUES
(1, 'Products');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__k2_items`
--

CREATE TABLE IF NOT EXISTS `#__k2_items` (
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
-- Zrzut danych tabeli `#__k2_items`
--

INSERT INTO `#__k2_items` (`id`, `title`, `alias`, `catid`, `published`, `introtext`, `fulltext`, `video`, `gallery`, `extra_fields`, `extra_fields_search`, `created`, `created_by`, `created_by_alias`, `checked_out`, `checked_out_time`, `modified`, `modified_by`, `publish_up`, `publish_down`, `trash`, `access`, `ordering`, `featured`, `featured_ordering`, `image_caption`, `image_credits`, `video_caption`, `video_credits`, `hits`, `params`, `metadesc`, `metadata`, `metakey`, `plugins`) VALUES
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
INSERT INTO `#__k2_items` (`id`, `title`, `alias`, `catid`, `published`, `introtext`, `fulltext`, `video`, `gallery`, `extra_fields`, `extra_fields_search`, `created`, `created_by`, `created_by_alias`, `checked_out`, `checked_out_time`, `modified`, `modified_by`, `publish_up`, `publish_down`, `trash`, `access`, `ordering`, `featured`, `featured_ordering`, `image_caption`, `image_credits`, `video_caption`, `video_credits`, `hits`, `params`, `metadesc`, `metadata`, `metakey`, `plugins`) VALUES
(69, 'City Free Style Woman', 'city-free-style-woman', 19, 1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"City Stile Collection"},{"id":"2","value":"City Style 999"},{"id":"7","value":"City Style"},{"id":"3","value":"1.150,00\\u20ac"},{"id":"4","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. "},{"id":"5","value":"In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus."}]', 'City Stile Collection City Style 999 City Style 1.150,00€ In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet.  In sed tellus vel nisl molestie molestie a sed magna. Quisque semper, lorem et laoreet venenatis, urna lorem rhoncus mi, vitae cursus arcu magna sit amet erat. In gravida ipsum fringilla lorem tempus imperdiet. Aenean ultrices tellus sed dolor semper feugiat. Phasellus turpis elit, suscipit ut facilisis quis, rhoncus non erat. Donec at vestibulum risus. ', '2010-04-22 14:39:06', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 18:51:16', 62, '2010-04-22 14:39:06', '0000-00-00 00:00:00', 0, 0, 4, 1, 4, '', '', '', '', 52, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(70, 'Omnia 2', 'omnia-2', 20, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"GT-I8000 Omnia 2"},{"id":"2","value":"TFRP99OX"},{"id":"7","value":"Samsung"},{"id":"3","value":"429,90\\u20ac"},{"id":"4","value":"Samsung\\u2019s Omnia handset was a pretty popular smartphone when it was originally released, but the march of time is never kind to phones so an update is more than a little overdue. With the Omnia II Samsung is hoping to make up for lost time by kitting the handset out with a faster processor, OLED screen and a host of interesting multimedia features. "},{"id":"5","value":"Another issue with OLED screens is that although they look very bright indoors, outdoors their performance isn\\u2019t usually as good as LCD. Thankfully the one Samsung has used here doesn\\u2019t suffer too badly from this issue. Outdoors back to back with an iPhone 2G , the Omnia II doesn\\u2019t look too much darker."},{"id":"6","value":"2"}]', 'GT-I8000 Omnia 2 TFRP99OX Samsung 429,90€ Samsung’s Omnia handset was a pretty popular smartphone when it was originally released, but the march of time is never kind to phones so an update is more than a little overdue. With the Omnia II Samsung is hoping to make up for lost time by kitting the handset out with a faster processor, OLED screen and a host of interesting multimedia features.  Another issue with OLED screens is that although they look very bright indoors, outdoors their performance isn’t usually as good as LCD. Thankfully the one Samsung has used here doesn’t suffer too badly from this issue. Outdoors back to back with an iPhone 2G , the Omnia II doesn’t look too much darker. Black ', '2010-04-22 14:48:52', 62, '', 0, '0000-00-00 00:00:00', '2010-04-22 14:53:09', 62, '2010-04-22 14:48:52', '0000-00-00 00:00:00', 1, 0, 3, 0, 2, '', '', '', '', 7, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(71, 'HTC Hero', 'htc-hero', 20, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu  mattis lectus. Quisque mattis, risus eget luctus tempus, mauris sem  lacinia libero, non fermentum dui dui in diam. Mauris ultrices porta  eros, ut aliquam lectus pulvinar convallis. Aliquam quis sapien interdum  nibh tincidunt sollicitudin vitae sit amet est. Maecenas nec tellus in  urna laoreet fermentum. Etiam consequat, sem a tincidunt egestas, odio  tellus faucibus risus, eu faucibus nisi ante sit amet massa. Cras nisi  turpis, dictum in tempor at, gravida ac elit.</p>', '', NULL, NULL, '[{"id":"1","value":"HTC Hero"},{"id":"2","value":"T654GH"},{"id":"7","value":"HTC"},{"id":"3","value":"654,00\\u20ac"},{"id":"4","value":"HTC Hero is our first phone to embody HTC Sense\\u2122 - an intuitive. HTC Hero makes staying close as simple as turning to your friend and saying hello."},{"id":"5","value":"TFT capacitive touchscreen, 65K colors\\r\\nSize 320 x 480 pixels, 3.2 inches - Sense UI - Multi-touch input method - Accelerometer sensor for UI auto-rotate - Trackball.\\r\\n288 MB RAM, 512 MB ROM"},{"id":"6","value":"2"}]', 'HTC Hero T654GH HTC 654,00€ HTC Hero is our first phone to embody HTC Sense™ - an intuitive. HTC Hero makes staying close as simple as turning to your friend and saying hello. TFT capacitive touchscreen, 65K colors\r\nSize 320 x 480 pixels, 3.2 inches - Sense UI - Multi-touch input method - Accelerometer sensor for UI auto-rotate - Trackball.\r\n288 MB RAM, 512 MB ROM Black ', '2010-04-22 14:57:22', 62, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2010-04-22 14:57:22', '0000-00-00 00:00:00', 1, 0, 4, 1, 3, '', '', '', '', 181, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', ''),
(55, 'Welcome to my Fashion Top Selection', 'welcome-to-my-fashion-top-selection', 15, 1, '<p>Are you comfortable with responsibility and entrepreneurial thinking?  Are you flexible and quick with ideas? In short: would you like to get  things moving in your career? If the answer is yes, then arvato is the  place for you.We offer you the opportunity for professional and  personal advancement, as part of an international team that provides  behind-the-scenes support services to the world’s leading companies.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam risus odio,  fringilla quis rhoncus non, pulvinar ac urna. Maecenas at odio eget  orci porta sodales in a turpis. Duis egestas ornare purus a commodo.  Curabitur lacinia iaculis elementum. Praesent hendrerit iaculis erat et  lobortis. Quisque nec nibh turpis. Aenean mi nulla, commodo vitae  sodales vitae, hendrerit ut dui. Praesent ipsum nisi, suscipit quis  malesuada vel, consectetur ut urna. Vestibulum ante ipsum primis in  faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse  platea dictumst. Nunc neque magna, molestie non euismod quis, pharetra  ac magna. Praesent venenatis elementum justo sed adipiscing. Curabitur  scelerisque ipsum et sem vulputate facilisis. Aenean dignissim, dolor  dignissim dapibus iaculis, massa turpis placerat dolor, a pellentesque  augue ligula in mauris. Vestibulum vitae magna mauris, nec suscipit  magna. Sed vulputate risus turpis, id hendrerit massa. Ut consectetur  laoreet felis, vel pulvinar tellus convallis sit amet.</p>', '', NULL, NULL, '[]', '', '2010-04-20 11:57:47', 62, '', 0, '0000-00-00 00:00:00', '2010-05-21 19:05:28', 62, '2010-04-20 11:57:47', '0000-00-00 00:00:00', 0, 0, 1, 0, 0, '', '', '', '', 257, 'catItemTitle=\ncatItemTitleLinked=\ncatItemFeaturedNotice=\ncatItemAuthor=\ncatItemDateCreated=\ncatItemRating=0\ncatItemImage=\ncatItemIntroText=\ncatItemExtraFields=\ncatItemHits=\ncatItemCategory=\ncatItemTags=\ncatItemAttachments=\ncatItemAttachmentsCounter=\ncatItemVideo=\ncatItemVideoWidth=\ncatItemVideoHeight=\ncatItemVideoAutoPlay=\ncatItemImageGallery=\ncatItemDateModified=\ncatItemReadMore=\ncatItemCommentsAnchor=\ncatItemK2Plugins=\nitemDateCreated=\nitemTitle=\nitemFeaturedNotice=\nitemAuthor=\nitemFontResizer=\nitemPrintButton=\nitemEmailButton=\nitemSocialButton=\nitemVideoAnchor=\nitemImageGalleryAnchor=\nitemCommentsAnchor=\nitemRating=0\nitemImage=\nitemImgSize=\nitemImageMainCaption=\nitemImageMainCredits=\nitemIntroText=\nitemFullText=\nitemExtraFields=\nitemDateModified=\nitemHits=\nitemTwitterLink=\nitemCategory=\nitemTags=\nitemShareLinks=\nitemAttachments=\nitemAttachmentsCounter=\nitemRelated=\nitemRelatedLimit=\nitemVideo=\nitemVideoWidth=\nitemVideoHeight=\nitemVideoAutoPlay=\nitemVideoCaption=\nitemVideoCredits=\nitemImageGallery=\nitemNavigation=\nitemComments=\nitemAuthorBlock=\nitemAuthorImage=\nitemAuthorDescription=\nitemAuthorURL=\nitemAuthorEmail=\nitemAuthorLatest=\nitemAuthorLatestLimit=\nitemK2Plugins=\n\n', '', 'robots=\nauthor=', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__k2_rating`
--

CREATE TABLE IF NOT EXISTS `#__k2_rating` (
  `itemID` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__k2_rating`
--

INSERT INTO `#__k2_rating` (`itemID`, `rating_sum`, `rating_count`, `lastip`) VALUES
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
-- Struktura tabeli dla  `#__k2_tags`
--

CREATE TABLE IF NOT EXISTS `#__k2_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Zrzut danych tabeli `#__k2_tags`
--

INSERT INTO `#__k2_tags` (`id`, `name`, `published`) VALUES
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
-- Struktura tabeli dla  `#__k2_tags_xref`
--

CREATE TABLE IF NOT EXISTS `#__k2_tags_xref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagID` (`tagID`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=200 ;

--
-- Zrzut danych tabeli `#__k2_tags_xref`
--

INSERT INTO `#__k2_tags_xref` (`id`, `tagID`, `itemID`) VALUES
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
-- Struktura tabeli dla  `#__k2_users`
--

CREATE TABLE IF NOT EXISTS `#__k2_users` (
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
-- Zrzut danych tabeli `#__k2_users`
--

INSERT INTO `#__k2_users` (`id`, `userID`, `userName`, `gender`, `description`, `image`, `url`, `group`, `plugins`) VALUES
(1, 62, 'Administrator', 'f', 'Rachel is based near Berlin and is the Web Editor for Corporate 2. She is  the founder of Corporate 2  and enjoys all things internet.', '1.jpg', '', 1, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__k2_user_groups`
--

CREATE TABLE IF NOT EXISTS `#__k2_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `#__k2_user_groups`
--

INSERT INTO `#__k2_user_groups` (`id`, `name`, `permissions`) VALUES
(1, 'Registered', 'frontEdit=0\nadd=0\neditOwn=0\neditAll=0\npublish=0\ncomment=1\ninheritance=0\ncategories=all\n\n'),
(2, 'Site Owner', 'frontEdit=1\nadd=1\neditOwn=1\neditAll=1\npublish=1\ncomment=1\ninheritance=1\ncategories=all\n\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__menu`
--

CREATE TABLE IF NOT EXISTS `#__menu` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=130 ;

--
-- Zrzut danych tabeli `#__menu`
--

INSERT INTO `#__menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(1, 'mainmenu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 19, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_page_title=1\npage_title=Welcome to the Frontpage\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=front\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 1),
(2, 'mainmenu', 'Joomla! License', 'joomla-license', 'index.php?option=com_content&view=article&id=5', 'component', -2, 0, 20, 1, 17, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=0\nshow_title=\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
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
(28, 'topmenu', 'About Joomla!', 'about-joomla', 'index.php?option=com_content&view=article&id=25', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(29, 'topmenu', 'Features', 'features', 'index.php?option=com_content&view=article&id=22', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(30, 'topmenu', 'The Community', 'the-community', 'index.php?option=com_content&view=article&id=27', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(40, 'keyconcepts', 'Extensions', 'extensions', 'index.php?option=com_content&view=article&id=26', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(43, 'keyconcepts', 'Example Pages', 'example-pages', 'index.php?option=com_content&view=article&id=43', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(44, 'ExamplePages', 'Section Blog', 'section-blog', 'index.php?option=com_content&view=section&layout=blog&id=3', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Section Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(45, 'ExamplePages', 'Section Table', 'section-table', 'index.php?option=com_content&view=section&id=3', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Table Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nnlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(46, 'ExamplePages', 'Category Blog', 'categoryblog', 'index.php?option=com_content&view=category&layout=blog&id=31', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Blog layout (FAQs/General category)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(47, 'ExamplePages', 'Category Table', 'category-table', 'index.php?option=com_content&view=category&id=32', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Table layout (FAQs/Languages category)\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(51, 'usermenu', 'Submit an Article', 'submit-an-article', 'index.php?option=com_content&view=article&layout=form', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(52, 'usermenu', 'Submit a Web Link', 'submit-a-web-link', 'index.php?option=com_weblinks&view=weblink&layout=form', 'component', 1, 0, 4, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(61, 'mainmenu', 'Dummy item', 'dummy-item', '#', 'url', -2, 0, 0, 3, 18, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(63, 'footer-menu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 14, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_page_title=1\npage_title=Welcome to the Frontpage\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=front\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(65, 'footer-menu', 'FAQ', 'faq', 'index.php?option=com_content&view=section&id=3', 'component', 1, 0, 20, 0, 15, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(70, 'footer-menu', 'News Feeds', 'news-feeds', 'index.php?option=com_newsfeeds&view=categories', 'component', 1, 0, 11, 0, 16, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Newsfeeds\nshow_comp_description=1\ncomp_description=\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 0, 0, 0),
(71, 'footer-menu', 'The News', 'the-news', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 0, 20, 0, 17, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=The News\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(72, 'footer-menu', 'Typography', 'typography', 'index.php?option=com_content&view=article&id=46', 'component', 1, 0, 20, 0, 18, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(73, 'footer-menu', 'Modules Positions', 'modules-positions', 'index.php?option=com_content&view=article&id=47', 'component', 1, 0, 20, 0, 19, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(83, 'mainmenu', 'Template', 'template', '#', 'url', 1, 0, 0, 0, 21, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(84, 'mainmenu', 'Module positions', 'module-positions', 'index.php?option=com_content&view=article&id=47', 'component', 1, 83, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(85, 'mainmenu', 'Module variations', 'module-variations', 'index.php?option=com_content&view=article&id=53', 'component', 1, 83, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(116, 'mainmenu', '3rd party extensions', '3rd-party-extensions', '#', 'url', 1, 0, 0, 0, 23, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(86, 'mainmenu', 'Typography', 'typography', 'index.php?option=com_content&view=article&id=46', 'component', 1, 83, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(87, 'mainmenu', 'Layouts', 'layouts', '#', 'url', 1, 83, 0, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(88, 'mainmenu', 'IE6 style', 'ie6-style', 'index.php?option=com_content&view=article&id=54', 'component', 1, 87, 20, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(89, 'mainmenu', 'Messages', 'messages', 'index.php?option=com_content&view=article&id=55', 'component', 1, 87, 20, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(91, 'mainmenu', 'Chrome Frame', 'chrome-frame', 'index.php?option=com_content&view=article&id=56', 'component', 1, 87, 20, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(92, 'mainmenu', 'Joomla! pages', 'joomla-pages', 'index.php?option=com_content&view=article&id=47', 'component', 1, 0, 20, 0, 22, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(93, 'mainmenu', 'Poll', 'poll', 'index.php?option=com_poll&view=poll&id=14', 'component', 1, 92, 10, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(94, 'mainmenu', 'Search', 'search', 'index.php?option=com_search&view=search', 'component', 1, 92, 15, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'search_areas=1\nshow_date=\nenabled=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(95, 'mainmenu', 'Wrapper', 'wrapper', 'index.php?option=com_wrapper&view=wrapper', 'component', 1, 92, 17, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'url=http://www.gavick.com/\nscrolling=auto\nwidth=100%\nheight=500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(96, 'mainmenu', 'System', 'system', 'index.php?option=com_content&view=article&id=47', 'component', 1, 0, 20, 0, 24, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(97, 'mainmenu', 'Error 404', 'error-404', '?option=XXX&Itemid=80', 'url', 1, 96, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(98, 'mainmenu', 'offline', 'offline', '?tmpl=offline', 'url', 1, 96, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(99, 'mainmenu', 'Menu types', 'menu-types', 'index.php?option=com_content&view=article&id=47', 'component', 1, 0, 20, 0, 25, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
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
(119, 'mainmenu', 'JomSocial', 'jomsocial', 'index.php?option=com_community&view=frontpage', 'component', -2, 0, 45, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(121, 'mainmenu', 'Item', 'item', 'index.php?option=com_k2&view=item&layout=item&id=55', 'component', 1, 117, 65, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(122, 'mainmenu', 'Categories', 'categories', 'index.php?option=com_k2&view=itemlist&layout=category&task=category&id=16', 'component', 1, 117, 65, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'categories=16\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(123, 'mainmenu', 'Men''s Fashion', 'mens-fashion', 'index.php?option=com_k2&view=itemlist&layout=category&task=category&id=17', 'component', 1, 122, 65, 3, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'categories=17\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(124, 'mainmenu', 'Tag', 'tag', 'index.php?option=com_k2&view=itemlist&layout=generic&tag=collection&task=tag', 'component', 1, 117, 65, 2, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'categoriesFilter=15|9|11|10|12|16|19|17|1|2|3|4|7|5|6|8|13|14\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(125, 'mainmenu', 'Women''s fashion', 'womens-fashion', 'index.php?option=com_k2&view=itemlist&layout=category&task=category&id=19', 'component', 1, 122, 65, 3, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'categories=19\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\nmega_showtitle=1\nmega_desc=\nmega_cols=1\nmega_group=0\nmega_width=\nmega_colw=\nmega_colxw=\nmega_class=\nmega_subcontent=0\n\n', 0, 0, 0),
(128, 'mainmenu', 'User', 'user', 'index.php?option=com_k2&view=itemlist&layout=user&id=62&task=user', 'component', 1, 117, 65, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__menu_types`
--

CREATE TABLE IF NOT EXISTS `#__menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `#__menu_types`
--

INSERT INTO `#__menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'usermenu', 'User Menu', 'A Menu for logged in Users'),
(3, 'topmenu', 'Top Menu', 'Top level navigation'),
(4, 'othermenu', 'Resources', 'Additional links'),
(5, 'ExamplePages', 'Example Pages', 'Example Pages'),
(6, 'keyconcepts', 'Key Concepts', 'This describes some critical information for new Users.'),
(7, 'footer-menu', 'footer menu', 'Menu visible in footer');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__messages`
--

CREATE TABLE IF NOT EXISTS `#__messages` (
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

--
-- Zrzut danych tabeli `#__messages`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__messages_cfg`
--

CREATE TABLE IF NOT EXISTS `#__messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__messages_cfg`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__migration_backlinks`
--

CREATE TABLE IF NOT EXISTS `#__migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__migration_backlinks`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__modules`
--

CREATE TABLE IF NOT EXISTS `#__modules` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Zrzut danych tabeli `#__modules`
--

INSERT INTO `#__modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES
(1, 'Main Menu', '', 2, 'right', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 1, 'menutype=mainmenu\nmenu_style=vert_indent\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 1, 0, ''),
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
(16, 'Polls', '', 0, 'bottom11', 0, '0000-00-00 00:00:00', 1, 'mod_poll', 0, 0, 1, 'id=14\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(17, 'User Menu', '', 5, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 1, 1, 'menutype=usermenu\nmoduleclass_sfx=_menu\ncache=1', 1, 0, ''),
(18, 'Login Form', '', 0, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, 'cache=0\nmoduleclass_sfx=\npretext=\nposttext=\nlogin=\nlogout=\ngreeting=1\nname=0\nusesecure=0\n\n', 1, 0, ''),
(19, 'Latest News', '', 1, 'user1', 0, '0000-00-00 00:00:00', 0, 'mod_latestnews', 0, 0, 1, 'count=5\nordering=c_dsc\nuser_id=0\nshow_front=1\nsecid=\ncatid=\nmoduleclass_sfx=_green\ncache=1\ncache_time=900\n\n', 1, 0, ''),
(20, 'Statistics', '', 0, 'bottom9', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 0, 1, 'serverinfo=1\nsiteinfo=1\ncounter=1\nincrease=0\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(21, 'Who''s Online', '', 5, 'header2', 0, '0000-00-00 00:00:00', 1, 'mod_whosonline', 0, 0, 1, 'cache=0\nshowmode=0\nmoduleclass_sfx= blue\n\n', 0, 0, ''),
(22, 'Popular', '', 1, 'user2', 0, '0000-00-00 00:00:00', 0, 'mod_mostread', 0, 0, 1, 'moduleclass_sfx=_blue\nshow_front=1\ncount=5\ncatid=\nsecid=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(23, 'Archive', '', 8, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_archive', 0, 0, 1, 'cache=1', 1, 0, ''),
(24, 'Sections', '', 0, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_sections', 0, 0, 1, 'count=5\nmoduleclass_sfx=_white\ncache=1\ncache_time=900\n\n', 1, 0, ''),
(25, 'Newsflash', '', 0, 'top', 0, '0000-00-00 00:00:00', 0, 'mod_newsflash', 0, 0, 1, 'catid=3\nlayout=default\nimage=0\nlink_titles=\nshowLastSeparator=1\nreadmore=0\nitem_title=0\nitems=\nmoduleclass_sfx=_lightblue\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(26, 'Related Items', '', 10, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_related_items', 0, 0, 1, '', 0, 0, ''),
(27, 'Search', '', 0, 'header2', 0, '0000-00-00 00:00:00', 1, 'mod_search', 0, 0, 1, 'moduleclass_sfx=\nwidth=20\ntext=\nbutton=1\nbutton_pos=right\nimagebutton=\nbutton_text=\nset_itemid=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(28, 'Random Image', '', 7, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_random_image', 0, 0, 1, '', 0, 0, ''),
(29, 'Top Menu', '', 0, 'bottom12', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=topmenu\nmenu_style=list_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=-nav\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=-1\nindent_image2=-1\nindent_image3=-1\nindent_image4=-1\nindent_image5=-1\nindent_image6=-1\nspacer=\nend_spacer=\n\n', 1, 0, ''),
(30, 'Banners', '', 0, 'banner', 0, '0000-00-00 00:00:00', 0, 'mod_banners', 0, 0, 0, 'target=1\ncount=1\ncid=1\ncatid=33\ntag_search=0\nordering=random\nheader_text=\nfooter_text=\nmoduleclass_sfx=\ncache=1\ncache_time=15\n\n', 1, 0, ''),
(31, 'Resources', '', 0, 'header2', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 1, 'menutype=othermenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_blue\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, ''),
(32, 'Wrapper', '', 11, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_wrapper', 0, 0, 1, '', 0, 0, ''),
(33, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 0, 'cache=1\n\n', 1, 0, ''),
(34, 'Feed Display', '', 12, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_feed', 0, 0, 1, '', 1, 0, ''),
(35, 'Breadcrumbs', '', 0, 'breadcrumb', 0, '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 0, 0, 1, 'showHome=1\nhomeText=Home\nshowLast=1\nseparator=\nmoduleclass_sfx= clear\ncache=0\n\n', 1, 0, ''),
(36, 'Syndication', '', 3, 'syndicate', 0, '0000-00-00 00:00:00', 1, 'mod_syndicate', 0, 0, 0, '', 1, 0, ''),
(38, 'Advertisement', '', 1, 'right2', 0, '0000-00-00 00:00:00', 0, 'mod_banners', 0, 0, 1, 'target=1\ncount=4\ncid=0\ncatid=14\ntag_search=0\nordering=0\nheader_text=Featured Links:\nfooter_text=<a href="http://www.joomla.org">Ads by Joomla!</a>\nmoduleclass_sfx= text\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(39, 'Example Pages', '', 0, 'header2', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 1, 'menutype=ExamplePages\nmenu_style=list_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, ''),
(40, 'Key Concepts', '', 4, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'cache=1\nclass_sfx=\nmoduleclass_sfx=_menu\nmenutype=keyconcepts\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\nwindow_open=\n\n', 0, 0, ''),
(41, 'Welcome to Joomla!', '<div style="padding: 5px">  <p>   Congratulations on choosing Joomla! as your content management system. To   help you get started, check out these excellent resources for securing your   server and pointers to documentation and other helpful resources. </p> <p>   <strong>Security</strong><br /> </p> <p>   On the Internet, security is always a concern. For that reason, you are   encouraged to subscribe to the   <a href="http://feedburner.google.com/fb/a/mailverify?uri=JoomlaSecurityNews" target="_blank">Joomla!   Security Announcements</a> for the latest information on new Joomla! releases,   emailed to you automatically. </p> <p>   If this is one of your first Web sites, security considerations may   seem complicated and intimidating. There are three simple steps that go a long   way towards securing a Web site: (1) regular backups; (2) prompt updates to the   <a href="http://www.joomla.org/download.html" target="_blank">latest Joomla! release;</a> and (3) a <a href="http://docs.joomla.org/Security_Checklist_2_-_Hosting_and_Server_Setup" target="_blank" title="good Web host">good Web host</a>. There are many other important security considerations that you can learn about by reading the <a href="http://docs.joomla.org/Category:Security_Checklist" target="_blank" title="Joomla! Security Checklist">Joomla! Security Checklist</a>. </p> <p>If you believe your Web site was attacked, or you think you have discovered a security issue in Joomla!, please do not post it in the Joomla! forums. Publishing this information could put other Web sites at risk. Instead, report possible security vulnerabilities to the <a href="http://developer.joomla.org/security/contact-the-team.html" target="_blank" title="Joomla! Security Task Force">Joomla! Security Task Force</a>.</p><p><strong>Learning Joomla!</strong> </p> <p>   A good place to start learning Joomla! is the   "<a href="http://docs.joomla.org/beginners" target="_blank">Absolute Beginner''s   Guide to Joomla!.</a>" There, you will find a Quick Start to Joomla!   <a href="http://help.joomla.org/ghop/feb2008/task048/joomla_15_quickstart.pdf" target="_blank">guide</a>   and <a href="http://help.joomla.org/ghop/feb2008/task167/index.html" target="_blank">video</a>,   amongst many other tutorials. The   <a href="http://community.joomla.org/magazine/view-all-issues.html" target="_blank">Joomla!   Community Magazine</a> also has   <a href="http://community.joomla.org/magazine/article/522-introductory-learning-joomla-using-sample-data.html" target="_blank">articles   for new learners</a> and experienced users, alike. A great place to look for   answers is the   <a href="http://docs.joomla.org/Category:FAQ" target="_blank">Frequently Asked   Questions (FAQ)</a>. If you are stuck on a particular screen in the   Administrator (which is where you are now), try clicking the Help toolbar   button to get assistance specific to that page. </p> <p>   If you still have questions, please feel free to use the   <a href="http://forum.joomla.org/" target="_blank">Joomla! Forums.</a> The forums   are an incredibly valuable resource for all levels of Joomla! users. Before   you post a question, though, use the forum search (located at the top of each   forum page) to see if the question has been asked and answered. </p> <p>   <strong>Getting Involved</strong> </p> <p>   <a name="twjs" title="twjs"></a> If you want to help make Joomla! better, consider getting   involved. There are   <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank">many ways   you can make a positive difference.</a> Have fun using Joomla!.</p></div>', 0, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 2, 1, 'moduleclass_sfx=\n\n', 1, 1, ''),
(42, 'Joomla! Security Newsfeed', '', 6, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_feed', 0, 0, 1, 'cache=1\ncache_time=15\nmoduleclass_sfx=\nrssurl=http://feeds.joomla.org/JoomlaSecurityNews\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=1\nrssitems=1\nrssitemdesc=1\nword_count=0\n\n', 0, 1, ''),
(43, 'Footer_menu', '', 0, 'footnav', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=footer-menu\nmenu_style=horiz_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, ''),
(110, 'Gavick Tab GK1', '', 0, 'header1', 0, '0000-00-00 00:00:00', 1, 'mod_gk_tab', 0, 0, 0, 'moduleclass_sfx=clear\nmodule_id=tabmix1\nmoduleHeight=260px\nmoduleWidth=0\ntabsGroupID=1\nnews_content_header_pos=1\nnews_content_image_pos=1\nnews_content_text_pos=1\nnews_content_info_pos=1\nnews_content_readmore_pos=2\nnews_readmore_text=READMORE\nnews_header_link=1\nnews_image_link=1\nnews_text_link=0\nnews_author=1\nnews_cats=1\nnews_date=1\nnews_header_order=1\nnews_image_order=2\nnews_text_order=3\nnews_info_order=4\nnews_limit_type=0\nnews_limit=30\nclean_xhtml=1\nnews_content_timezone=0\nimg_height=0\nimg_width=0\ndate_format=D, d M Y\nusername=0\nactivator=click\nanimation=0\nanimationType=2\nanimationSpeed=350\nanimationInterval=5000\nanimationFun=Fx.Transitions.linear\nbuttons=0\nstyleCSS=style1\nstyleType=0\nstyleFile=\nstyleSuffix=\nfixedHeight=0\nfixedHeightValue=200\nalwaysHide=0\nclean_code=1\nuseCSS=1\nuseMoo=2\nuseScript=2\ncompress_js=1\n\n', 0, 0, ''),
(59, 'About Us', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non eros tortor, eu pulvinar est. Cras cursus, nulla id ullamcorper auctor, felis dui venenatis quam, vel tempus velit lorem non tortor. Mauris a tincidunt diam. Suspendisse potenti. Fusce sodales, ante id gravida adipiscing, massa turpis sollicitudin enim, sed adipiscing massa nibh ac lorem.</p>', 0, 'bottom10', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(61, 'Fly Coupon', '<p><img src="images/stories/demo/fly_coupon.png" border="0" alt="gavickpto jomsocial 50 off" /></p>', 5, 'header2', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 0, 'moduleclass_sfx= clear\n\n', 0, 0, ''),
(111, 'GK Register', '', 0, 'register', 0, '0000-00-00 00:00:00', 1, 'mod_gk_register', 0, 0, 0, 'moduleclass_sfx=\nmodule_unique_id=gk_reg1\n\n', 0, 0, ''),
(79, 'K2 QuickIcons (admin)', '', 99, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_k2_quickicons', 0, 2, 1, 'modCSSStyling=1\nmodLogo=1\n', 0, 1, ''),
(77, 'K2 Login', '', 15, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_k2_login', 0, 0, 1, 'greeting=1\nname=1\nuserAvatar=1\n', 0, 0, ''),
(78, 'K2 Categories', '', 2, 'right2', 0, '0000-00-00 00:00:00', 1, 'mod_k2_tools', 0, 0, 1, 'moduleclass_sfx= green\nmodule_usage=4\narchiveItemsCounter=1\narchiveCategory=0\nauthors_module_category=0\nauthorItemsCounter=1\nauthorAvatar=1\nauthorLatestItem=1\ncalendarCategory=0\nhome=\nseperator=\nroot_id=0\nend_level=\ncategoriesListOrdering=\ncategoriesListItemsCounter=1\nroot_id2=0\nwidth=40\ntext=\nbutton=\nimagebutton=\nbutton_text=\nmin_size=75\nmax_size=300\ncloud_limit=30\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(76, 'K2 Content', '', 10, 'right2', 0, '0000-00-00 00:00:00', 1, 'mod_k2_content', 0, 0, 1, 'moduleclass_sfx=\ngetTemplate=Default\nsource=filter\ncatfilter=1\ncategory_id=19|17\ngetChildren=0\nitems_limit=4\nitemsOrdering=rdate\nFeaturedItems=1\npopularityRange=\nitem=0\nitemTitle=1\nitemAuthor=1\nitemAuthorAvatar=1\nitemIntroText=1\nitemIntroTextWordLimit=30\nitemImage=1\nitemImgSize=XSmall\nitemVideo=1\nitemVideoCaption=1\nitemVideoCredits=1\nitemAttachments=1\nitemTags=1\nitemCategory=1\nitemDateCreated=1\nitemHits=1\nitemReadMore=1\nitemExtraFields=0\nitemCommentsCounter=1\nfeed=1\nitemPreText=\nitemCustomLink=0\nitemCustomLinkURL=http://\nitemCustomLinkTitle=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(75, 'K2 Comments', '', 5, 'right2', 0, '0000-00-00 00:00:00', 1, 'mod_k2_comments', 0, 0, 1, 'moduleclass_sfx= blue\nmodule_usage=0\ncatfilter=1\ncategory_id=16|17|19|18|20\ncomments_limit=3\ncomments_word_limit=5\ncommenterName=1\ncommentAvatar=1\ncommentDate=1\ncommentDateFormat=relative\ncommentLink=1\nitemTitle=0\nitemCategory=0\nfeed=1\ncommenters_limit=10\ncommenterAvatar=1\ncommenterLink=1\ncommenterCommentsCounter=1\ncommenterLatestComment=1\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(109, 'Sections', '', 13, 'right2', 0, '0000-00-00 00:00:00', 0, 'mod_sections', 0, 0, 1, 'count=5\nmoduleclass_sfx= white\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(112, 'K2 Content', '', 11, 'right2', 0, '0000-00-00 00:00:00', 1, 'mod_k2_content', 0, 0, 1, 'moduleclass_sfx=\ngetTemplate=Default\nsource=filter\ncatfilter=1\ncategory_id=19\ngetChildren=0\nitems_limit=4\nitemsOrdering=rdate\nFeaturedItems=1\npopularityRange=\nitem=0\nitemTitle=1\nitemAuthor=1\nitemAuthorAvatar=1\nitemIntroText=1\nitemIntroTextWordLimit=30\nitemImage=1\nitemImgSize=XSmall\nitemVideo=1\nitemVideoCaption=1\nitemVideoCredits=1\nitemAttachments=1\nitemTags=1\nitemCategory=1\nitemDateCreated=1\nitemHits=1\nitemReadMore=1\nitemExtraFields=0\nitemCommentsCounter=1\nfeed=1\nitemPreText=\nitemCustomLink=0\nitemCustomLinkURL=http://\nitemCustomLinkTitle=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(113, 'K2 Content', '', 12, 'right2', 0, '0000-00-00 00:00:00', 1, 'mod_k2_content', 0, 0, 1, 'moduleclass_sfx=\ngetTemplate=Default\nsource=filter\ncatfilter=1\ncategory_id=17\ngetChildren=0\nitems_limit=4\nitemsOrdering=rdate\nFeaturedItems=1\npopularityRange=\nitem=0\nitemTitle=1\nitemAuthor=1\nitemAuthorAvatar=1\nitemIntroText=1\nitemIntroTextWordLimit=30\nitemImage=1\nitemImgSize=XSmall\nitemVideo=1\nitemVideoCaption=1\nitemVideoCredits=1\nitemAttachments=1\nitemTags=1\nitemCategory=1\nitemDateCreated=1\nitemHits=1\nitemReadMore=1\nitemExtraFields=0\nitemCommentsCounter=1\nfeed=1\nitemPreText=\nitemCustomLink=0\nitemCustomLinkURL=http://\nitemCustomLinkTitle=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(114, 'News Pro GK4', '', 0, 'bottom1', 0, '0000-00-00 00:00:00', 1, 'mod_news_pro_gk4', 0, 0, 0, 'moduleclass_sfx=\nautomatic_module_id=1\nmodule_unique_id=newspro1\nmodule_width=100\ndata_source=com_sections\ncom_sections=5\ncom_articles=\nk2_articles=\nnews_sort_value=title\nnews_sort_order=DESC\nnews_frontpage=1\nunauthorized=0\nonly_frontpage=0\nstartposition=0\nnews_full_pages=3\nnews_column=3\nnews_rows=1\nart_padding=2px 4px 2px 4px\nnews_content_header_float=left\nnews_content_header_pos=left\nnews_header_link=1\ntitle_limit=40\ntitle_limit_type=chars\nnews_content_image_float=left\nnews_content_image_pos=left\nnews_image_link=1\nnews_content_text_float=left\nnews_content_text_pos=left\nnews_text_link=0\nnews_limit=30\nnews_limit_type=words\nnews_content_info_float=left\nnews_content_info_pos=left\nnews_content_info2_float=left\nnews_content_info2_pos=left\ninfo_format=%AUTHOR \\| %COMMENTS \\| %DATE \\| %HITS \\| %CATEGORY\ninfo2_format=\ncategory_link=1\ndate_format=%d %b %Y\ndate_publish=0\nusername=users.name\nuser_avatar=0\navatar_size=16\nnews_header_order=1\nnews_header_enabled=1\nnews_image_order=2\nnews_image_enabled=1\nnews_text_order=3\nnews_text_enabled=1\nnews_info_order=4\nnews_info_enabled=1\nnews_info2_order=4\nnews_info2_enabled=1\nnews_content_readmore_pos=right\nnews_readmore_enabled=1\nnews_short_pages=3\nlinks_amount=3\nlinks_margin=0 10px 0 10px\nlinks_position=bottom\nlinks_width=50\nlist_title_limit=20\nlist_title_limit_type=chars\nlist_text_limit=30\nlist_text_limit_type=words\ncreate_thumbs=0\nk2_thumbs=0\nimg_width=0\nimg_height=0\nimg_margin=0px\nimg_bg=#000\nimg_stretch=0\nimg_quality=95\ncache_time=30\ntop_interface_style=arrows\nbottom_interface_style=arrows\nautoanim=0\nhover_anim=0\nanimation_speed=350\nanimation_interval=5000\nclean_xhtml=1\nmore_text_value=...\nparse_plugins=0\nclean_plugins=0\nuseCSS=1\nuseMoo=2\nuseScript=2\n\n', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__modules_menu`
--

CREATE TABLE IF NOT EXISTS `#__modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__modules_menu`
--

INSERT INTO `#__modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(16, 1),
(16, 129),
(17, 0),
(18, 0),
(19, 1),
(19, 2),
(19, 27),
(20, 1),
(20, 129),
(21, 1),
(22, 1),
(22, 2),
(22, 27),
(24, 27),
(25, 1),
(27, 1),
(27, 63),
(27, 129),
(29, 1),
(30, 0),
(31, 1),
(32, 0),
(33, 0),
(34, 0),
(35, 38),
(35, 40),
(35, 43),
(35, 44),
(35, 45),
(35, 46),
(35, 47),
(35, 63),
(35, 65),
(35, 70),
(35, 71),
(35, 72),
(35, 73),
(35, 83),
(35, 84),
(35, 85),
(35, 86),
(35, 87),
(35, 88),
(35, 89),
(35, 91),
(35, 92),
(35, 93),
(35, 94),
(35, 95),
(35, 96),
(35, 99),
(35, 100),
(35, 101),
(35, 102),
(35, 103),
(35, 104),
(35, 105),
(35, 106),
(35, 107),
(35, 108),
(35, 109),
(35, 110),
(35, 111),
(35, 112),
(35, 113),
(35, 114),
(35, 115),
(35, 116),
(35, 117),
(35, 118),
(35, 119),
(35, 121),
(35, 122),
(35, 123),
(35, 124),
(35, 125),
(35, 126),
(35, 127),
(35, 128),
(35, 129),
(36, 0),
(38, 129),
(39, 1),
(40, 0),
(43, 0),
(59, 1),
(59, 129),
(61, 1),
(75, 121),
(75, 123),
(75, 124),
(75, 125),
(75, 126),
(75, 127),
(75, 128),
(76, 121),
(76, 128),
(77, 0),
(78, 121),
(78, 123),
(78, 124),
(78, 125),
(78, 126),
(78, 127),
(78, 128),
(79, 0),
(109, 129),
(110, 1),
(110, 129),
(111, 0),
(112, 123),
(112, 124),
(113, 125),
(114, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__newsfeeds`
--

CREATE TABLE IF NOT EXISTS `#__newsfeeds` (
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
-- Zrzut danych tabeli `#__newsfeeds`
--

INSERT INTO `#__newsfeeds` (`catid`, `id`, `name`, `alias`, `link`, `filename`, `published`, `numarticles`, `cache_time`, `checked_out`, `checked_out_time`, `ordering`, `rtl`) VALUES
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
-- Struktura tabeli dla  `#__plugins`
--

CREATE TABLE IF NOT EXISTS `#__plugins` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Zrzut danych tabeli `#__plugins`
--

INSERT INTO `#__plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
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
(19, 'Editor - TinyMCE', 'tinymce', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 'theme=advanced\ncleanup=1\ncleanup_startup=0\nautosave=0\ncompressed=0\nrelative_urls=1\ntext_direction=ltr\nlang_mode=0\nlang_code=en\ninvalid_elements=applet\ncontent_css=1\ncontent_css_custom=\nnewlines=0\ntoolbar=top\nhr=1\nsmilies=1\ntable=1\nstyle=1\nlayer=1\nxhtmlxtras=0\ntemplate=0\ndirectionality=1\nfullscreen=1\nhtml_height=550\nhtml_width=750\npreview=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\n\n'),
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
(44, 'Content - JComments', 'jcomments', 'content', 0, 10001, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(45, 'Search - JComments', 'jcomments', 'search', 0, 7, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(46, 'System - JComments', 'jcomments', 'system', 0, 8, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(47, 'Editor Button - JComments ON', 'jcommentson', 'editors-xtd', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(48, 'Editor Button - JComments OFF', 'jcommentsoff', 'editors-xtd', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(49, 'User - JComments', 'jcomments', 'user', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(52, 'User - K2', 'k2', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(54, 'JA Menu Parameters', 'plg_jamenuparams', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__polls`
--

CREATE TABLE IF NOT EXISTS `#__polls` (
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
-- Zrzut danych tabeli `#__polls`
--

INSERT INTO `#__polls` (`id`, `title`, `alias`, `voters`, `checked_out`, `checked_out_time`, `published`, `access`, `lag`) VALUES
(14, 'Joomla! is used for?', 'joomla-is-used-for', 14, 0, '0000-00-00 00:00:00', 1, 0, 86400);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__poll_data`
--

CREATE TABLE IF NOT EXISTS `#__poll_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Zrzut danych tabeli `#__poll_data`
--

INSERT INTO `#__poll_data` (`id`, `pollid`, `text`, `hits`) VALUES
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
-- Struktura tabeli dla  `#__poll_date`
--

CREATE TABLE IF NOT EXISTS `#__poll_date` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL DEFAULT '0',
  `poll_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Zrzut danych tabeli `#__poll_date`
--

INSERT INTO `#__poll_date` (`id`, `date`, `vote_id`, `poll_id`) VALUES
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
-- Struktura tabeli dla  `#__poll_menu`
--

CREATE TABLE IF NOT EXISTS `#__poll_menu` (
  `pollid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__poll_menu`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__sections`
--

CREATE TABLE IF NOT EXISTS `#__sections` (
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
-- Zrzut danych tabeli `#__sections`
--

INSERT INTO `#__sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES
(1, 'News', '', 'news', 'articles.jpg', 'content', 'right', 'Select a news topic from the list below, then select a news article to read.', 1, 0, '0000-00-00 00:00:00', 3, 0, 2, ''),
(3, 'FAQs', '', 'faqs', 'key.jpg', 'content', 'left', 'From the list below choose one of our FAQs topics, then select an FAQ to read. If you have a question which is not in this section, please contact us.', 1, 0, '0000-00-00 00:00:00', 5, 0, 23, ''),
(4, 'About Joomla!', '', 'about-joomla', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 2, 0, 14, ''),
(5, 'Demo', '', 'demo', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 6, 0, 1, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__session`
--

CREATE TABLE IF NOT EXISTS `#__session` (
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
-- Zrzut danych tabeli `#__session`
--

INSERT INTO `#__session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`) VALUES
('', '1275081875', '9251gt4pjte6h0gkguqm783vv6', 1, 0, '', 0, 0, '__default|a:8:{s:15:"session.counter";i:4;s:19:"session.timer.start";i:1275081171;s:18:"session.timer.last";i:1275081872;s:17:"session.timer.now";i:1275081875;s:22:"session.client.browser";s:115:"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.0 (KHTML, like Gecko) Chrome/6.0.408.1 Safari/534.0";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:74:"C:\\xampp\\htdocs\\QUICKSTART_JUL2009\\libraries\\joomla\\html\\parameter\\element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}s:13:"session.token";s:32:"0e67174e350a7b1bf9acdd82ef9753f7";}'),
('admin', '1275081671', '75ca78297ab4ae72679da49f34ac55ed', 0, 62, 'Super Administrator', 25, 1, '__default|a:8:{s:15:"session.counter";i:5;s:19:"session.timer.start";i:1275081660;s:18:"session.timer.last";i:1275081668;s:17:"session.timer.now";i:1275081671;s:22:"session.client.browser";s:115:"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.0 (KHTML, like Gecko) Chrome/6.0.408.1 Safari/534.0";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:2:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}s:11:"application";a:1:{s:4:"data";O:8:"stdClass":1:{s:4:"lang";s:0:"";}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";s:2:"62";s:4:"name";s:13:"Administrator";s:8:"username";s:5:"admin";s:5:"email";s:10:"eee@eee.pl";s:8:"password";s:65:"e2e83385c74a4ddc82eb15e9c3b26cea:ivmkLjApG0QFja80WAyblVe5zc9Z4vdN";s:14:"password_clear";s:0:"";s:8:"usertype";s:19:"Super Administrator";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:3:"gid";s:2:"25";s:12:"registerDate";s:19:"2009-07-30 18:07:29";s:13:"lastvisitDate";s:19:"2010-05-28 21:21:00";s:10:"activation";s:0:"";s:6:"params";s:56:"admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n";s:3:"aid";i:2;s:5:"guest";i:0;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:74:"C:\\xampp\\htdocs\\QUICKSTART_JUL2009\\libraries\\joomla\\html\\parameter\\element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":5:{s:14:"admin_language";s:0:"";s:8:"language";s:0:"";s:6:"editor";s:0:"";s:8:"helpsite";s:0:"";s:8:"timezone";s:1:"0";}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}s:13:"session.token";s:32:"45a324800a3a4914ae699587337b45de";}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__stats_agents`
--

CREATE TABLE IF NOT EXISTS `#__stats_agents` (
  `agent` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__stats_agents`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__templates_menu`
--

CREATE TABLE IF NOT EXISTS `#__templates_menu` (
  `template` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `#__templates_menu`
--

INSERT INTO `#__templates_menu` (`template`, `menuid`, `client_id`) VALUES
('gk_elvesocial', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__users`
--

CREATE TABLE IF NOT EXISTS `#__users` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Zrzut danych tabeli `#__users`
--

INSERT INTO `#__users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`) VALUES
(62, 'Administrator', 'admin', 'eee@eee.pl', 'e2e83385c74a4ddc82eb15e9c3b26cea:ivmkLjApG0QFja80WAyblVe5zc9Z4vdN', 'Super Administrator', 0, 1, 25, '2009-07-30 18:07:29', '2010-05-28 21:21:04', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),
(91, 'Peter Gabriel ', 'peter', 'ccc@ccc.com', 'ac16be265cfe466e544e7a94195846ee:hgl0NcXv8CWaPB05i0csnkfgzA57j1xb', 'Registered', 0, 0, 18, '2010-05-24 21:10:46', '0000-00-00 00:00:00', '', 'language=\ntimezone=0\n\n'),
(90, 'Kuki Soler', 'kuki', 'aaa@eee.pl', '3269dec2d977935f00b89b4f17c0ca99:nExqldhPObrdYIDgsKKvic0hu7KeRtSK', 'Registered', 0, 0, 18, '2010-05-24 20:46:39', '2010-05-24 21:57:48', '', 'language=\ntimezone=0\n\n'),
(92, 'Natalie Portman', 'natalie', 'aaa@aaa.com', '7e2f7249c75c0ec297065d7b24398c43:qyoNuIPjl28V8h0T26wMoylWQOpLAxI7', 'Registered', 0, 0, 18, '2010-05-24 21:15:17', '0000-00-00 00:00:00', '', 'language=\ntimezone=0\n\n'),
(93, 'Taylor Crash ', 'taylor', 'bbb@aaa.pl', '20465d4ccf5e30787578276b01b6eeaa:ZRh5XSr5oPGUsy6PLrQBheaxbw6GuGHp', 'Registered', 0, 0, 18, '2010-05-24 21:19:48', '0000-00-00 00:00:00', '84ce4fe4cd1a87c687df0366c4d7a8b0', 'language=\ntimezone=0\n\n'),
(94, 'Theresa Midfield', 'theresa', 'aaa@ccc.com', 'f07bc7cf7147cb4bc1c72663fceeae5f:qll0ru73sbNvsnuLQ4AEytCDQjAjGqYX', 'Registered', 0, 0, 18, '2010-05-24 21:32:29', '0000-00-00 00:00:00', 'a092f2a369a51fea066819eb216ec664', '\n'),
(95, 'Cool Jazz ', 'cool', 'ccc@fff.com', '6aeb8364f8ce73a923454d169c8c6db5:wEgfBg1KGawBJIWm48qkp48M822JweKi', 'Registered', 0, 0, 18, '2010-05-24 21:36:04', '0000-00-00 00:00:00', '48ee6bda9966f4b318c53f60e3fa8492', 'language=\ntimezone=0\n\n'),
(96, 'Jean Philip ', 'jean', 'qqq@www.com', '154b208cf51c4f51439d4be5f2583128:BWtNAQ1bMQuRaiXcRktlAlwBe0cwygkt', 'Registered', 0, 0, 18, '2010-05-24 21:41:04', '0000-00-00 00:00:00', 'cabefda19da01421347ac01391e91c73', '\n'),
(97, 'Jennifer Law ', 'jennifer', 'ttt@uuu.com', '31f85ce04480b47149cb1c25a0c40e36:zuBeaLVtEDzB9odhp4NmV9cjeSiPKa4g', 'Registered', 0, 0, 18, '2010-05-24 21:43:52', '0000-00-00 00:00:00', '9989e2ccc45fe6d3f2ccf5ebad058ec0', '\n'),
(98, 'Gabriel Salvatori ', 'gabriel', '888@fff.com', '70db4c60b33763978fa0c3cac46f8abf:OveAc3ZQbyyeVUyqALw2akoxIsc3jxi3', 'Registered', 0, 0, 18, '2010-05-24 21:46:24', '0000-00-00 00:00:00', '1d5759881f194b929717466428ac908c', '\n'),
(99, 'Linda Bauli ', 'linda', 'sss@lll.com', '826d6efe2a6a6feecdc5fa8ffa189834:l2ZxyytGSeJwT6B0bSozkfmH89oauGC4', 'Registered', 0, 0, 18, '2010-05-24 21:49:30', '0000-00-00 00:00:00', 'f1439286bc2278f8858700113184f8a0', '\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `#__weblinks`
--

CREATE TABLE IF NOT EXISTS `#__weblinks` (
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
-- Zrzut danych tabeli `#__weblinks`
--

INSERT INTO `#__weblinks` (`id`, `catid`, `sid`, `title`, `alias`, `url`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `archived`, `approved`, `params`) VALUES
(1, 2, 0, 'Joomla!', 'joomla', 'http://www.joomla.org', 'Home of Joomla!', '2005-02-14 15:19:02', 4, 1, 0, '0000-00-00 00:00:00', 1, 0, 1, 'target=0'),
(2, 2, 0, 'php.net', 'php', 'http://www.php.net', 'The language that Joomla! is developed in', '2004-07-07 11:33:24', 6, 1, 0, '0000-00-00 00:00:00', 3, 0, 1, ''),
(3, 2, 0, 'MySQL', 'mysql', 'http://www.mysql.com', 'The database that Joomla! uses', '2004-07-07 10:18:31', 2, 1, 0, '0000-00-00 00:00:00', 5, 0, 1, ''),
(4, 2, 0, 'OpenSourceMatters', 'opensourcematters', 'http://www.opensourcematters.org', 'Home of OSM', '2005-02-14 15:19:02', 11, 1, 0, '0000-00-00 00:00:00', 2, 0, 1, 'target=0'),
(5, 2, 0, 'Joomla! - Forums', 'joomla-forums', 'http://forum.joomla.org', 'Joomla! Forums', '2005-02-14 15:19:02', 4, 1, 0, '0000-00-00 00:00:00', 4, 0, 1, 'target=0'),
(6, 2, 0, 'Ohloh Tracking of Joomla!', 'ohloh-tracking-of-joomla', 'http://www.ohloh.net/projects/20', 'Objective reports from Ohloh about Joomla''s development activity. Joomla! has some star developers with serious kudos.', '2007-07-19 09:28:31', 1, 1, 0, '0000-00-00 00:00:00', 6, 0, 1, 'target=0\n\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
