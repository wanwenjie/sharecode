-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 09 月 06 日 13:30
-- 服务器版本: 5.0.22
-- PHP 版本: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sharecode`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(20) NOT NULL,
  `pwd` varchar(12) NOT NULL,
  `flag` int(2) default '0',
  `email` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `user`, `pwd`, `flag`, `email`) VALUES
(1, 'admin', '123456', 1, '1654206@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `animation`
--

CREATE TABLE IF NOT EXISTS `animation` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(50) default NULL,
  `title` varchar(50) NOT NULL,
  `cat_id` int(6) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `size` int(11) NOT NULL,
  `content` text NOT NULL,
  `file_path` varchar(60) NOT NULL,
  `user` varchar(30) NOT NULL,
  `collect` int(11) NOT NULL default '0',
  `skim` int(11) NOT NULL default '0',
  `pic` varchar(30) NOT NULL,
  `down` int(11) NOT NULL default '0',
  `_check` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`,`title`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- 转存表中的数据 `animation`
--

INSERT INTO `animation` (`id`, `url`, `title`, `cat_id`, `date`, `size`, `content`, `file_path`, `user`, `collect`, `skim`, `pic`, `down`, `_check`) VALUES
(1, '../uploads/wh/html5-canvas-magic-effect/', 'HTML5梦幻特效 可给任意元素添加魔幻效果', 1, '2016-09-06 12:22:13', 48612, 'HTML5梦幻特效 可给任意元素添加魔幻效果', '../uploads/wh/html5-canvas-magic-effect.zip', 'wh', 0, 0, '../uploads/wh/phbgynfm.png', 0, 1),
(2, '../uploads/wh/html5-svg-shanche-animation/', 'HTML5/SVG 实现过山车动画', 1, '2016-09-06 12:23:05', 78187, 'HTML5/SVG 实现过山车动画', '../uploads/wh/html5-svg-shanche-animation.zip', 'wh', 0, 0, '../uploads/wh/qm9y48ho.png', 0, 1),
(3, '../uploads/wh/html5-canvas-huitailang/', 'HTML5 Canvas绘制灰太狼 超级可爱', 1, '2016-09-06 12:23:50', 2377, 'HTML5 Canvas绘制灰太狼 超级可爱', '../uploads/wh/html5-canvas-huitailang.zip', 'wh', 0, 0, '../uploads/wh/bwfrtd53.png', 0, 1),
(4, '../uploads/wh/html5-css3-new-cake/', '用HTML5/CSS3给女朋友送个生日蛋糕', 1, '2016-09-06 12:24:33', 42271, '用HTML5/CSS3给女朋友送个生日蛋糕', '../uploads/wh/html5-css3-new-cake.zip', 'wh', 0, 0, '../uploads/wh/aws10zty.jpg', 0, 1),
(5, '../uploads/wh/html5-svg-fox-run-animation/', 'HTML5 SVG狐狸奔跑动画 相当大气', 1, '2016-09-06 12:25:10', 20751, 'HTML5 SVG狐狸奔跑动画 相当大气', '../uploads/wh/html5-svg-fox-run-animation.zip', 'wh', 0, 0, '../uploads/wh/fagtvheb.png', 0, 1),
(6, '../uploads/wh/css3-loading-jump/', '很有个性的CSS3弹跳Loading动画', 1, '2016-09-06 12:25:40', 1603, '很有个性的CSS3弹跳Loading动画', '../uploads/wh/css3-loading-jump.zip', 'wh', 0, 0, '../uploads/wh/pq3mhgrn.png', 0, 1),
(7, '../uploads/wh/html5-boy-run-animation/', 'HTML5/CSS3奔跑动画 动画效果非常逼真', 1, '2016-09-06 12:26:17', 355147, 'HTML5/CSS3奔跑动画 动画效果非常逼真', '../uploads/wh/html5-boy-run-animation.zip', 'wh', 0, 0, '../uploads/wh/v58uagw0.png', 0, 1),
(8, '../uploads/wh/html5-svg-face-icon/', '一套HTML5/SVG表情图标 表情超可爱', 1, '2016-09-06 12:27:02', 4193, '一套HTML5/SVG表情图标 表情超可爱', '../uploads/wh/html5-svg-face-icon.zip', 'wh', 0, 0, '../uploads/wh/pm54x6g2.png', 0, 1),
(9, '../uploads/wh/html5-flash-gallery/', 'HTML5鼠标滑过图片特效', 1, '2016-09-06 12:27:41', 329117, 'HTML5鼠标滑过图片特效', '../uploads/wh/html5-flash-gallery.zip', 'wh', 0, 0, '../uploads/wh/on8rmegv.png', 0, 1),
(10, '../uploads/wh/CSS3BouncingBall/', 'CSS3跳动小球', 1, '2016-09-06 12:28:32', 22628, 'CSS3跳动小球', '../uploads/wh/CSS3BouncingBall.zip', 'wh', 0, 0, '../uploads/wh/6pfte1kh.png', 0, 1),
(11, '../uploads/wh/html5-3d-carousel/', 'HTML5 TweenMax.js和jQuery实现的3D图片动画 可多角度旋转', 1, '2016-09-06 12:29:18', 62052, 'TweenMax是一个很常用的动画制作框架，TweenMax.js是TweenMax的JS版本，\r\n今天我们就结合TweenMax.js和HTML5来实现一款超炫的3D图片墙动画，几张图片围成一个围墙，\r\n然后图片墙可以随着鼠标的移动而旋转，旋转速度可以根据鼠标来变化，非常酷的HTML5 3D动画应用。', '../uploads/wh/html5-3d-carousel.zip', 'wh', 0, 0, '../uploads/wh/qilfox0z.png', 0, 1),
(12, '../uploads/wh/html5-3d-cube-image/', 'HTML5 3D正方体旋转动画 很酷的3D特效', 1, '2016-09-06 12:30:32', 186806, '之前我们分享过很多非常不错的HTML5 3D立体动画特效，尤其是一些HTML5 Canvas动画，更是酷得让人惊叹。\r\n今天我们又要来分享一款好玩的HTML5 3D效果，\r\n该特效是一个可以旋转播放的正方体，你可以从多个视角来查看正方体，非常不错的3D效果。', '../uploads/wh/html5-3d-cube-image.zip', 'wh', 0, 0, '../uploads/wh/v4imo7k9.png', 0, 1),
(13, '../uploads/wh/html5-cube-any-face/', 'HTML5 3D正方体特效 可任意面旋转定位', 1, '2016-09-06 12:32:01', 74723, '之前对于HTML5立方体动画我们已经有过不少分享了，像这款HTML5/CSS3 3D立方体扭曲动画、HTML5 3D立方体旋转动画都非常不错。\r\n今天我们要介绍的这款HTML5 3D立方体动画的特点是可以定位立方体的任意面，同时也可以在不同的方向上旋转。', '../uploads/wh/html5-cube-any-face.zip', 'wh', 0, 0, '../uploads/wh/z9kfnacw.png', 0, 1),
(14, '../uploads/wh/html5-svg-3d-model/', 'HTML5 SVG 3D空间模型 可拖拽缩放', 1, '2016-09-06 12:32:48', 5622, '这是一个基于HTML5和SVG的3D空间模型，这个3D模型提供了x、y、z三个坐标轴以及一个平面网格。\r\n我们可以对这个HTML5 3D模型进行缩放、拖拽、翻转等操作，这些操作可以通过鼠标，也可以通过快捷键，非常方便。', '../uploads/wh/html5-svg-3d-model.zip', 'wh', 0, 0, '../uploads/wh/hgenspbw.png', 0, 1),
(15, '../uploads/wh/html5-svg-line-chart-colorful/', '基于HTML5的SVG动画折线图表 线颜色渐变', 1, '2016-09-06 12:33:29', 5304, '\r\n今天给大家带来一款HTML5图表应用，图表是基于SVG结构的折线图。\r\n遗憾的是这款HTML5图表不可以自定义数据点，\r\n但是有一个特点是折线的颜色是渐变的，并且在图表数据初始化的时候，折线显示是带有动画特效的。', '../uploads/wh/html5-svg-line-chart-colorful.zip', 'wh', 0, 0, '../uploads/wh/50inq3rs.png', 0, 1),
(16, '../uploads/wh/jiaoben2329/', 'HTML5 3D立体图片相册', 1, '2016-09-06 12:34:26', 870135, '\r\nHTML5非常强大，尤其是和CSS3结合，有时候能达到非同凡响的网页动画效果。今天要分享的这款HTML5应用就是一款很酷的3D立体图片相册应用，\r\n它可以用鼠标多拽从多个角度浏览相册图片，点击图片，就可以放大图片，相册图片都是美女，千万别让女朋友看到。', '../uploads/wh/jiaoben2329.zip', 'wh', 0, 0, '../uploads/wh/groe96wt.png', 0, 1),
(17, '../uploads/wh/HTML2016-8-24-19/', 'HTML5超炫3D元素周期表三维图片墙效果 ', 1, '2016-09-06 12:35:15', 114900, '这是一款超酷的3D元素周期表三维图片墙效果，使用html5和jquery技术制作，有4种不同的效果。\r\n使用Chrome或火狐浏览器观看效果最佳。 ', '../uploads/wh/HTML2016-8-24-19.zip', 'wh', 0, 0, '../uploads/wh/25ohdy89.jpg', 0, 1),
(18, '../uploads/wh/HTML5-UI-20/', 'jQuery和CSS3炫酷可交互的图片墙特效 ', 1, '2016-09-06 12:35:55', 465737, 'Polaroid_Gallery是一款效果非常酷的可交互的jQuery和CSS3图片墙特效插件。\r\n该照片墙插件可以使用圆点导航按钮将相应的图片旋转居中显示，当点击居中的图片时，图片会翻转到反面，显示图片的信息。 ', '../uploads/wh/HTML5-UI-20.zip', 'wh', 0, 0, '../uploads/wh/cp7wboyr.png', 0, 1),
(19, '../uploads/wh/voxels-liquid/', ' HTML5 WebGL实验 超酷的HTML5 Canvas波浪墙', 1, '2016-09-06 12:36:40', 91609, '在HTML5特效中，和水波相关的我们已经分享过两款：HTML5 WebGL水面水波荡漾特效、HTML5水波荡漾动画特效。这又是一款HTML5 Canvas实验项目，也是波浪特效，\r\n只是这不是真正的水波，而是利用柱体高度的变化实现的波浪墙效果。', '../uploads/wh/voxels-liquid.zip', 'wh', 0, 0, '../uploads/wh/sadc1qzr.jpg', 0, 1),
(20, '../uploads/wh/html5-ball-pool/', ' HTML5重力感应动画特效 冲撞小球演示', 1, '2016-09-06 12:37:20', 35440, '前面我已经向大家分享过一款非常绚的HTML5重力感应游戏特效，我们只需要用鼠标甩动页面上的元素就可以实现模拟重力感应的效果。今天这款HML5重力感应动画特效功能更强，页面上会掉落大小不等的小球，我们可以拖动小球，也可以点击页面空白来生产更多的小球，\r\n如果你的电脑配置高，可以试试产生更多的小球来玩，非常有趣。', '../uploads/wh/html5-ball-pool.zip', 'wh', 0, 0, '../uploads/wh/i0bhefnq.jpg', 0, 1),
(21, '../uploads/wh/jiaoben839/', ' CSS3图片层叠展开特效 可展开扇形效果', 1, '2016-09-06 12:38:12', 579120, '今天要分享的这款CSS3图片特效没有那么绚丽，它的功能非常简单，当你把鼠标移到图片上时，多张图片便会由原先的叠在一起变成展开状态，展开过程中伴随CSS3动画，\r\n展开的形状是扇形。这款简单的CSS3图片层叠展开动画可以应用在图片展示和图片分享上。', '../uploads/wh/jiaoben839.zip', 'wh', 0, 0, '../uploads/wh/g5pzwgk7.jpg', 0, 1),
(22, '../uploads/wh/5iweb2016052701/', '高性能的jQuery/Zepto 3D旋转木马插件', 1, '2016-09-06 12:39:23', 899356, '高性能的jQuery/Zepto 3D旋转木马插件', '../uploads/wh/5iweb2016052701.zip', 'wh', 0, 0, '../uploads/wh/u280gfop.jpg', 0, 1),
(23, '../uploads/wh/daohang01/', 'CSS3 3D折叠菜单导航', 2, '2016-09-06 12:44:27', 8240, ' 一个非常有情怀的特效demo，几年前在做项目接触到css3 3d特效时，就是参考这个demo来模仿制作的。\r\n\r\n几天前从起尘的硬盘里面把它找出来，希望能帮到有需要的童鞋', '../uploads/wh/daohang01.zip', 'wh', 0, 0, '../uploads/wh/ir1xm6gh.jpg', 0, 1),
(24, '../uploads/wh/daohang02/', '商场3D导航', 2, '2016-09-06 12:45:12', 58588, '一款非常酷炫的商场导航地图！\r\n\r\n包含了每一层的店面分布，以及每一家店面的详情介绍。支持右边快速搜索店面查找！', '../uploads/wh/daohang02.zip', 'wh', 0, 0, '../uploads/wh/gowtkg3q.jpg', 0, 1),
(25, '../uploads/wh/daohang03/', 'css3弹性导航菜单', 2, '2016-09-06 12:46:47', 55560, '包含有三种弹性菜单特效 ', '../uploads/wh/daohang03.zip', 'wh', 0, 0, '../uploads/wh/erag5uyp.jpg', 0, 1),
(26, '../uploads/wh/daohang04/', 'CSS3飘带3D导航特效', 2, '2016-09-06 12:47:21', 13167, 'CSS3飘带3D导航特效', '../uploads/wh/daohang04.zip', 'wh', 0, 0, '../uploads/wh/8kwa2uo9.jpg', 0, 1),
(27, '../uploads/wh/daohang05/', '多层级菜单导航特效', 2, '2016-09-06 12:47:51', 100021, '多层级菜单导航特效', '../uploads/wh/daohang05.zip', 'wh', 0, 0, '../uploads/wh/hoxs6l9k.jpg', 0, 1),
(28, '../uploads/wh/daohang06/', 'jQuery 3D响应式菜单导航特效', 2, '2016-09-06 12:48:26', 44339, 'jQuery 3D响应式菜单导航特效', '../uploads/wh/daohang06.zip', 'wh', 0, 0, '../uploads/wh/x5tz8y9p.jpg', 0, 1),
(29, '../uploads/wh/daohang07/', 'jQuery和CSS3超酷导航特效', 2, '2016-09-06 12:48:59', 48661, 'jQuery和CSS3超酷导航特效', '../uploads/wh/daohang07.zip', 'wh', 0, 0, '../uploads/wh/2lt1ruzg.jpg', 0, 1),
(30, '../uploads/wh/daohang08/', '圆环css3导航特效', 2, '2016-09-06 12:49:36', 70178, '圆环css3导航特效', '../uploads/wh/daohang08.zip', 'wh', 0, 0, '../uploads/wh/am9fk751.jpg', 0, 1),
(31, '../uploads/wh/daohang09/', 'tmall天猫效果', 2, '2016-09-06 12:50:13', 113605, 'tmall天猫效果', '../uploads/wh/daohang09.zip', 'wh', 0, 0, '../uploads/wh/npkdlam8.jpg', 0, 1),
(32, '../uploads/wh/daohang10/', '圆形导航特效', 2, '2016-09-06 12:50:44', 251727, '圆形导航特效', '../uploads/wh/daohang10.zip', 'wh', 0, 0, '../uploads/wh/rwc69d2g.jpg', 0, 1),
(33, '../uploads/wh/daohang11/', 'CSS3折叠导航特效', 2, '2016-09-06 12:51:19', 346135, 'CSS3折叠导航特效', '../uploads/wh/daohang11.zip', 'wh', 0, 0, '../uploads/wh/4u3regkm.jpg', 0, 1),
(34, '../uploads/wh/daohang12/', 'CSS3导航特效十种集合', 2, '2016-09-06 12:51:55', 198296, 'CSS3导航特效十种集合', '../uploads/wh/daohang12.zip', 'wh', 0, 0, '../uploads/wh/yzvq6e0g.jpg', 0, 1),
(35, '../uploads/wh/daohang13/', 'CSS3菜单导航特效', 2, '2016-09-06 12:52:33', 112200, 'CSS3菜单导航特效', '../uploads/wh/daohang13.zip', 'wh', 0, 0, '../uploads/wh/w4yfmg1b.jpg', 0, 1),
(36, '../uploads/wh/daohang14/', '一款3D导航特效，实用性比较强！', 2, '2016-09-06 12:53:08', 51261, '一款3D导航特效，实用性比较强！', '../uploads/wh/daohang14.zip', 'wh', 0, 0, '../uploads/wh/z7b3wmt2.jpg', 0, 1),
(37, '../uploads/wh/daohang15/', 'HTML5 3D导航特效', 2, '2016-09-06 12:53:40', 61154, 'HTML5 3D导航特效', '../uploads/wh/daohang15.zip', 'wh', 0, 0, '../uploads/wh/pifa1wzb.jpg', 0, 1),
(38, '../uploads/wh/daohang16/', 'HTML5全屏菜单导航特效', 2, '2016-09-06 12:54:17', 442147, 'HTML5全屏菜单导航特效', '../uploads/wh/daohang16.zip', 'wh', 0, 0, '../uploads/wh/d4lt53nz.jpg', 0, 1),
(39, '../uploads/wh/meiti01/', 'jquery+html5网页播放器代码', 3, '2016-09-06 12:56:45', 0, 'jquery+html5网页播放器代码', '../uploads/wh/meiti01.zip', 'wh', 0, 0, '../uploads/wh/snapt6r5.jpg', 0, 0),
(40, '../uploads/wh/meiti03/', 'HTML5创意音乐播放器', 3, '2016-09-06 13:00:36', 87214, '一款很有意思的html5音乐播放器，作者把播放器做成了一个类似笑脸的模样，^_^ \r\n', '../uploads/wh/meiti03.zip', 'wh', 0, 0, '../uploads/wh/w52r93zn.jpg', 0, 1),
(41, '../uploads/wh/meiti01/', 'jquery+html5网页播放器代码', 3, '2016-09-06 13:01:44', 0, 'jquery+html5网页播放器代码', '../uploads/wh/meiti01.zip', 'wh', 0, 0, '../uploads/wh/bu0osml6.jpg', 0, 0),
(42, '../uploads/wh/meiti04/', 'HTML5视频播放器特效', 3, '2016-09-06 13:03:03', 182884, 'HTML5视频播放器特效', '../uploads/wh/meiti04.zip', 'wh', 0, 0, '../uploads/wh/kim6gtav.jpg', 0, 1),
(43, '../uploads/wh/meiti05/', 'HTML5视频播放器', 3, '2016-09-06 13:03:54', 297826, 'HTML5视频播放器', '../uploads/wh/meiti05.zip', 'wh', 0, 0, '../uploads/wh/7p0x5vy4.jpg', 0, 1),
(44, '../uploads/wh/meiti06/', 'jPlayer音乐播放器特效', 3, '2016-09-06 13:04:28', 305394, 'jPlayer音乐播放器特效', '../uploads/wh/meiti06.zip', 'wh', 0, 0, '../uploads/wh/63gfkvyb.jpg', 0, 1),
(45, '../uploads/wh/meiti07/', '支持THML5的多功能视频播放器插件', 3, '2016-09-06 13:05:00', 1903556, '支持THML5的多功能视频播放器插件', '../uploads/wh/meiti07.zip', 'wh', 0, 0, '../uploads/wh/lqzs8dnr.jpg', 0, 1),
(46, '../uploads/wh/meiti08/', 'mp3播放器插件audio.js', 3, '2016-09-06 13:05:35', 14684, 'mp3播放器插件audio.js', '../uploads/wh/meiti08.zip', 'wh', 0, 0, '../uploads/wh/r3716i9d.jpg', 0, 1),
(47, '../uploads/wh/5iweb2016072901/', '兼容PC和移动端的日期选择jquery插件-Mobiscroll', 4, '2016-09-06 13:07:20', 137080, '兼容PC和移动端的日期选择jquery插件-Mobiscroll', '../uploads/wh/5iweb2016072901.zip', 'wh', 0, 0, '../uploads/wh/4kw2f3eu.jpg', 0, 1),
(48, '../uploads/wh/html5-gradient-3d-text/', 'HTML5颜色渐变3D文字特效', 4, '2016-09-06 13:08:17', 1535, '之前我们已经分享过不少HTML5文字特效，效果都还不错，尤其是这款HTML5摆动的文字特效 类似柳枝摆动，更是有非常酷的文字动画效果。\r\n今天我们要分享一款HTML5 3D文字特效，文字的颜色是渐变的，同时有文字阴影，更加凸显了3D立体的效果。', '../uploads/wh/html5-gradient-3d-text.zip', 'wh', 0, 0, '../uploads/wh/icg01p89.png', 0, 1),
(49, '../uploads/wh/CSSButtonsPseudoElements/', '新款CSS3按钮组合 5组可爱CSS3按钮', 4, '2016-09-06 13:09:04', 87089, '之前我分享过一些时尚的CSS3动画按钮，比如CSS3渲染Checkbox实现3D开关切换按钮、纯CSS3 3D按钮 按钮酷似牛奶般剔透等等。今天就再来分享一款可爱的CSS3按钮组合\r\n，该CSS3按钮一共有5种不同的风格，有几款还有3D立体的效果。一起来欣赏这些可爱的CSS3按钮吧。', '../uploads/wh/CSSButtonsPseudoElements.zip', 'wh', 0, 0, '../uploads/wh/c4yr0ghw.jpg', 0, 1),
(50, '../uploads/wh/css3-loading-1/', ' CSS3 Loading进度条加载动画特效 3款绚丽风格', 4, '2016-09-06 13:09:41', 37839, '\r\n前面我向大家分享了几款非常漂亮的CSS3进度条插件，CSS3 SVG 进度条 Loading 动画、纯CSS3进度条 华丽5色进度条示例。\r\n今天我要分享一款更加炫酷的CSS3进度条加载动画特效，该动画特效有3个不同的风格，注意，IE6，7，8是不支持该进度条动画的。', '../uploads/wh/css3-loading-1.zip', 'wh', 0, 0, '../uploads/wh/4iu76053.jpg', 0, 1),
(51, '../uploads/wh/43-contact-form/', 'CSS3联系表单 清新外观带美化Select表单', 4, '2016-09-06 13:11:00', 15253, '之前我向大家分享过一款非常绚丽的CSS3发光表单，的确是很酷，大家可以先看看。今天要分享的这款CSS3表单就比较清新简单了。表单整体看上去很干净，\r\n特别的是，该CSS3联系表单有一个自定义的美化select表单，表单项在被激活的时候边框颜色会改变。', '../uploads/wh/43-contact-form.zip', 'wh', 0, 0, '../uploads/wh/86qc3kwl.jpg', 0, 1),
(52, '../uploads/wh/shuru06/', 'css3按钮点击特效', 4, '2016-09-06 13:11:34', 97611, 'css3按钮点击特效', '../uploads/wh/shuru06.zip', 'wh', 0, 0, '../uploads/wh/1nzu2s39.gif', 0, 1),
(53, '../uploads/wh/shuru07/', 'js输入框字数限制提醒', 4, '2016-09-06 13:12:09', 1693, 'js输入框字数限制提醒', '../uploads/wh/shuru07.zip', 'wh', 0, 0, '../uploads/wh/52guv1yb.jpg', 0, 1),
(54, '../uploads/wh/shuru08/', '移动端城市选择控件', 4, '2016-09-06 13:12:45', 127569, '移动端城市选择控件', '../uploads/wh/shuru08.zip', 'wh', 0, 0, '../uploads/wh/4t37yuih.jpg', 0, 1),
(55, '../uploads/wh/html5-fruit-ninja/', 'HTML5版切水果游戏 HTML5游戏极品', 5, '2016-09-06 13:14:29', 1144047, '这是一款由百度JS小组提供的HTML5版切水果游戏，记得切水果游戏当年非常火，\r\n今天我找到了一款基于HTML5实现的网页版切水果游戏。虽然和原版的切水果游戏相比功能不怎么完善，\r\n但是该HTML5切水果游戏也算有声有色，画面也十分华丽。', '../uploads/wh/html5-fruit-ninja.zip', 'wh', 0, 0, '../uploads/wh/gxuw481v.jpg', 0, 1),
(56, '../uploads/wh/jiaoben1765/', 'HTML5中国象棋游戏 自定义象棋难度', 5, '2016-09-06 13:15:09', 1605124, '棋类游戏在桌面游戏中已经非常成熟，中国象棋的版本也非常多。\r\n今天这款基于HTML5技术的中国象棋游戏非常有特色，\r\n我们不仅可以选择中国象棋的游戏难度，而且可以切换棋盘的样式。程序写累了，喝上一杯咖啡，和电脑对弈几把吧，\r\n相信这HTML5中国象棋游戏的实现算法你比较清楚，可以打开源码来研究一下这款HTML5中国象棋游戏。', '../uploads/wh/jiaoben1765.zip', 'wh', 0, 0, '../uploads/wh/6gb3xfty.jpg', 0, 0),
(57, '../uploads/wh/html5-flappy-text/', '奇葩版Flappy Bird,HTML5 Flappy Text游戏', 5, '2016-09-06 13:16:32', 9144, '前段时间Flappy Bird游戏那是相当的火，有无数年轻人为之疯狂，\r\n我们也在html5tricks网站上分享过一款简易的HTML5版Flappy Bird。\r\n今天我们要分享一款奇葩版的Flappy Bird——HTML5 Flappy Text游戏，\r\n用若干个字母来代替bird，每触碰一个障碍，字母就会少一个。一起来玩玩吧。', '../uploads/wh/html5-flappy-text.zip', 'wh', 0, 0, '../uploads/wh/wu8fsokg.jpg', 0, 1),
(58, '../uploads/wh/wuziqi/', 'HTML5五子棋游戏 画面超酷 可设置难度', 5, '2016-09-06 13:17:10', 230946, '前几天我向大家分享过一款HTML5中国象棋游戏，效果令人惊叹，\r\n小编的实力很难胜过电脑。今天我要向大家分享一款HTML5五子棋游戏，不仅游戏画面非常华丽，\r\n而且可以自己设置难度，并且可以选择人机对战还是人人对战，这款HTML5五子棋游戏绝对称得上HTML5游戏中的极品。', '../uploads/wh/wuziqi.zip', 'wh', 0, 0, '../uploads/wh/kna92ypd.jpg', 0, 1),
(59, '../uploads/wh/jiaoben1892/', '浪漫程序员 HTML5爱心表白动画', 1, '2016-09-06 13:18:00', 32817, '我们程序员在追求爱情方面也是非常浪漫的，\r\n下面是一位同学利用自己所学的HTML5知识自制的HTML5爱心表白动画，画面非常温馨甜蜜，\r\n这样的创意很容易打动女孩，如果你是单身的程序员，也赶紧来制作自己的爱心表白动画吧。', '../uploads/wh/jiaoben1892.zip', 'wh', 0, 0, '../uploads/wh/gypv1o0s.jpg', 0, 1),
(60, '../uploads/wh/flappy-bird/', 'HTML5版Flappy Bird游戏 仅65行Javascript代码', 5, '2016-09-06 13:18:37', 88569, 'Flappy Bird相信大家都很熟悉了，2014年最热门的手机游戏之一。\r\nFlappy Bird这款游戏是一位来自越南河内的独立游戏开发者阮哈东开发，\r\n形式简易但难度极高的休闲游戏，很容易让人上瘾。今天我们用HTML5来重写这款Flappy Bird游戏，值得注意的是，\r\n利用Phaser框架，只需65行Javascript代码即可实现HTML5版的Flappy Bird游戏。按空格键控制小鸟，试试看吧。', '../uploads/wh/flappy-bird.zip', 'wh', 0, 0, '../uploads/wh/5oyvg37r.png', 0, 1),
(61, '../uploads/wh/html5-pcman/', 'HTML5吃豆人游戏PCMAN', 5, '2016-09-06 13:19:23', 3162, '今天又要介绍一款不错的HTML5游戏，HTML5吃豆人游戏，\r\n画面上有一个吃豆人和一群怪物，你需要控制吃豆人移动吃掉路上的小豆子，\r\n一旦吃豆人遇到怪物被吃掉的时候，你就GAME OVER了。这款HTML5游戏还有一点没完善，\r\n就是吃豆人碰到怪物的时候不能被怪物吃掉，有兴趣的同学可以继续把它完善。HTML5游戏开发不仅需要技术，也需要创意。', '../uploads/wh/html5-pcman.zip', 'wh', 0, 0, '../uploads/wh/sadqopi5.jpg', 0, 1),
(62, '..', '飞机大战', 5, '2016-09-06 13:20:04', 0, '飞机大战', '../uploads/wh/html5-fly.zip', 'wh', 0, 0, '../uploads/wh/9fihow52.jpg', 0, 0),
(63, '../uploads/wh/jiaoben1144/', 'HTML5重力感应游戏 甩甩领导的头像', 5, '2016-09-06 13:21:44', 186756, '快过年了，工资没涨多少吧，年终奖没发吧，恨领导吧。现在利用这款HTML5重力感应游戏来尽情甩领导的头像吧。\r\n制作一些你憎恨的领导们的头像图片，利用该HTML5重力感应游戏插件来拖动鼠标甩动这些头像，叫你不加工资…叫你不加工资…', '../uploads/wh/jiaoben1144.zip', 'wh', 0, 0, '../uploads/wh/gqyzi3uk.jpg', 0, 1),
(64, '../uploads/wh/html5-mario/', 'HTML5超级玛丽游戏重体验 HTML5游戏经典', 5, '2016-09-06 13:22:25', 146523, '\r\n还记得小时候一起玩过的超级玛丽冒险游戏吗？\r\n是的，那是我们小时候很火的一款游戏，今天老外利用HTML5技术让超级玛丽可以在网页上跑了，\r\nHTML5版的超级玛丽虽然没有原版的功能强大，\r\n但是如果你有兴趣，完全可以把它写完善了。HTML5真的很强大，HTML5游戏方面更是犀利。', '../uploads/wh/html5-mario.zip', 'wh', 0, 0, '../uploads/wh/auro7sgc.jpg', 0, 1),
(65, '../uploads/wh/201410271656/', ' html5游戏 坦克大战 ', 5, '2016-09-06 13:23:10', 160035, '这是一款使用html5 canvas和js制作的经典90版坦克大战小游戏。\r\n这个html5坦克大战游戏中的各种坦克的等级和宝物与原版完全一样，想研究坦克大战源码的朋友速度了。\r\n\r\n', '../uploads/wh/201410271656.zip', 'wh', 0, 0, '../uploads/wh/u0qn469f.jpg', 0, 1),
(66, '../uploads/wh/201501201535/', '小游戏 俄罗斯方块 ', 5, '2016-09-06 13:23:55', 420675, 'Blockrain是一款最新的经典html5俄罗斯方块游戏插件。\r\n该俄罗斯方块游戏使用html5和jQuery制作，具有使用简单、响应式、可定制、速度快、有积分记录和自动游戏的特点。', '../uploads/wh/201501201535.zip', 'wh', 0, 0, '../uploads/wh/4qoune6g.jpg', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(12) NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`) VALUES
(1, 'UI'),
(2, '导航'),
(3, '媒体'),
(4, '输入'),
(5, '其他');

-- --------------------------------------------------------

--
-- 表的结构 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(30) NOT NULL,
  `collect_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `collect`
--

INSERT INTO `collect` (`id`, `user`, `collect_id`) VALUES
(1, 'wwj', 62);

-- --------------------------------------------------------

--
-- 表的结构 `demo`
--

CREATE TABLE IF NOT EXISTS `demo` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(50) character set utf8 NOT NULL,
  `title` varchar(21) character set utf8 NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `content` text character set utf8 NOT NULL,
  `file_path` varchar(50) character set utf8 NOT NULL,
  `skim` int(11) NOT NULL default '0',
  `size` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `demo`
--

INSERT INTO `demo` (`id`, `url`, `title`, `date`, `content`, `file_path`, `skim`, `size`) VALUES
(1, '../demo/20160906/code3/', '加载动画', '2016-09-06 12:04:46', '加载动画', '../demo/20160906/code3.zip', 0, 10657),
(2, '../demo/20160906/code2/', '统计图', '2016-09-06 12:06:14', '统计图', '../demo/20160906/code2.zip', 0, 11681),
(3, '../demo/20160906/code4/', '泡泡游戏', '2016-09-06 12:06:35', '泡泡游戏', '../demo/20160906/code4.zip', 0, 12695),
(4, '../demo/20160906/code5/', 'css文本动画', '2016-09-06 12:06:54', 'css文本动画', '../demo/20160906/code5.zip', 0, 10234),
(5, '../demo/20160906/code6/', '哈利波特魔法棒', '2016-09-06 12:07:11', '哈利波特魔法棒', '../demo/20160906/code6.zip', 0, 10777),
(6, '../demo/20160906/code7/', '字格', '2016-09-06 12:07:26', '字格', '../demo/20160906/code7.zip', 0, 10790),
(7, '../demo/20160906/code8/', '碰撞检查的小行星', '2016-09-06 12:07:43', '碰撞检查的小行星', '../demo/20160906/code8.zip', 0, 16904),
(8, '../demo/20160906/code9/', '普罗米修斯', '2016-09-06 12:08:13', '普罗米修斯', '../demo/20160906/code9.zip', 0, 10630),
(9, '../demo/20160906/code10/', '三维旋转四面体', '2016-09-06 12:08:28', '三维旋转四面体', '../demo/20160906/code10.zip', 0, 11553),
(10, '../demo/20160906/code11/', 'svg动画聚虎', '2016-09-06 12:08:45', 'svg动画聚虎', '../demo/20160906/code11.zip', 0, 18046),
(11, '../demo/20160906/code12/', '轨道', '2016-09-06 12:09:02', '轨道', '../demo/20160906/code12.zip', 0, 11741),
(12, '../demo/20160906/code13/', '提交按钮', '2016-09-06 12:09:19', '提交按钮', '../demo/20160906/code13.zip', 0, 13227),
(13, '../demo/20160906/code14/', '文本混合模式文本阴影', '2016-09-06 12:09:36', '文本混合模式文本阴影', '../demo/20160906/code14.zip', 0, 10574),
(14, '../demo/20160906/code15/', '扩散限制聚集', '2016-09-06 12:09:53', '扩散限制聚集', '../demo/20160906/code15.zip', 0, 11261),
(15, '../demo/20160906/code16/', '蝴蝶爆炸', '2016-09-06 12:10:10', '蝴蝶爆炸', '../demo/20160906/code16.zip', 0, 10841),
(16, '../demo/20160906/code17/', '开关', '2016-09-06 12:10:26', '开关', '../demo/20160906/code17.zip', 0, 11899),
(17, '../demo/20160906/code18/', 'phyllotaxis', '2016-09-06 12:10:44', 'phyllotaxis', '../demo/20160906/code18.zip', 0, 10870),
(18, '../demo/20160906/code19/', '全响应可扩展网络布局', '2016-09-06 12:11:02', '全响应可扩展网络布局', '../demo/20160906/code19.zip', 0, 13229),
(19, '../demo/20160906/code20/', '谷歌滑块', '2016-09-06 12:11:18', '谷歌滑块', '../demo/20160906/code20.zip', 0, 10916),
(20, '../demo/20160906/code21/', 'windows10 切换按钮', '2016-09-06 12:11:44', 'windows10 切换按钮', '../demo/20160906/code21.zip', 0, 11293),
(21, '../demo/20160906/code22/', '简单的手风琴效果', '2016-09-06 12:12:01', '简单的手风琴效果', '../demo/20160906/code22.zip', 0, 11976),
(22, '../demo/20160906/code23/', '音乐播放器界面', '2016-09-06 12:12:16', '音乐播放器界面', '../demo/20160906/code23.zip', 0, 11714),
(23, '../demo/20160906/code24/', '反馈表情', '2016-09-06 12:12:31', '反馈表情', '../demo/20160906/code24.zip', 0, 11760),
(24, '../demo/20160906/code25/', '勇敢的时钟', '2016-09-06 12:13:06', '勇敢的时钟', '../demo/20160906/code25.zip', 0, 12575),
(25, '../demo/20160906/code26/', 'hunter-aliens-mk1', '2016-09-06 12:13:20', 'hunter-aliens-mk1', '../demo/20160906/code26.zip', 0, 14944);

-- --------------------------------------------------------

--
-- 表的结构 `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `follows`
--

INSERT INTO `follows` (`id`, `user`, `author`) VALUES
(1, 'wwj', 'wh');

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(15) NOT NULL auto_increment,
  `user` varchar(50) character set utf8 NOT NULL,
  `pwd` varchar(12) NOT NULL,
  `flag` int(2) default '0',
  `email` varchar(25) NOT NULL,
  `pic` varchar(50) default '../uploads/headPic/default.png',
  `follows` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_name` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`id`, `user`, `pwd`, `flag`, `email`, `pic`, `follows`) VALUES
(1, 'wwj', '147528', 1, '1654206898@qq.com', '../uploads/wwj/dnrphb56.jpeg', 0),
(2, 'wh', '456789', 0, '2209747841@qq.com', '../uploads/wh/wsdu31bg.jpg', 1);
