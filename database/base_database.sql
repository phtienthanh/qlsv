-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2017 at 10:43 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `categories`, `image`, `is_deleted`, `slug`, `date`) VALUES
(96, 'bao cong an 12312312312312312312123123123123123123123123123123123123123', '1123123', 'baoca', '1', '1505114585.jpg', 0, 'bao-cong-an.html', '11/9/2017'),
(95, 'doanthi123123', '<form id="vast-vpaid-form">\r\n                                <div id="remain_detail">\r\n                                    <p style="font-weight: bold;">Tối 7/9, Lễ trao giải Ấn tượng VTV (VTV Awards) đã chính thức diễn ra. Đây là giải thưởng dành cho những người làm truyền hình, những cá nhân, tổ chức đã và đang đóng góp cho sự phát triển của Đài Truyền hình Việt Nam. Khác với năm ngoái, chương trình năm nay được tổ chức và thực hiện tại thủ đô Hà Nội.</p>\r\n<p>Xuất hiện tại thảm đỏ lễ trao giải là hàng loạt những gương mặt nghệ sĩ đang được yêu thích nhất hiện nay như NSND Hoàng Dũng, NSƯT Trung Anh, Hồng Đăng, Đan Lê, Nhã Phương, Bảo Thanh, Hoa hậu Đỗ Mỹ Linh… Sự đổ bộ của các sao Việt đã thu hút đông đảo sự chú ý của những người có mặt.</p>\r\n<p style="text-align: center;"><img class="alignnone size-full wp-image-348621" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-11.jpg" alt="dien vien blogtin (1)" width="500" height="750"></p>\r\n<p>NSND Hoàng Dũng.</p>\r\n<p style="text-align: center;"><img class="alignnone size-full wp-image-348622" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-21.jpg" alt="dien vien blogtin (2)" width="500" height="750"></p>\r\n<p>Mỹ Tâm gây bất ngờ khi xuất hiện trong trang phục cực gợi cảm.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348623" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-31.jpg" alt="dien vien blogtin (3)" width="500" height="750"></p>\r\n<p>Hồng Đăng.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348624" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-41.jpg" alt="dien vien blogtin (4)" width="500" height="750"></p>\r\n<p>Nhã Phương khoe vai trần gợi cảm.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348625" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-51.jpg" alt="dien vien blogtin (5)" width="500" height="750"></p>\r\n<p>Hoa hậu Mỹ Linh.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348626" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-61.jpg" alt="dien vien blogtin (6)" width="500" height="750"></p>\r\n<p>Hai người đẹp tự tin khoe sắc.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348627" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-71.jpg" alt="dien vien blogtin (7)" width="500" height="750"></p>\r\n<p>Vợ chồng Bảo Thanh.</p>\r\n<p style="text-align: center;"><img class="alignnone size-full wp-image-348628" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-81.jpg" alt="dien vien blogtin (8)" width="500" height="750"></p>\r\n<p>Đan Lê và ông xã – đạo diễn Khải Anh.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348629" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-91.jpg" alt="dien vien blogtin (9)" width="620" height="413"></p>\r\n<p>Bảo Ngậu và Phan Hương “Người Phán Xử”.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348630" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-10.jpg" alt="dien vien blogtin (10)" width="620" height="413"></p>\r\n<p>NSƯT Trung Anh cũng có mặt.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348631" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-111.jpg" alt="dien vien blogtin (11)" width="500" height="750"></p>\r\n<p>Jordan Vogt-Roberts – đạo diễn bộ phim Kong: Skull Island</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348632" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-12.jpg" alt="dien vien blogtin (12)" width="500" height="750"></p>\r\n<p>MC Minh Hà.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348633" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-13.jpg" alt="dien vien blogtin (13)" width="500" height="750"></p>\r\n<p>Yến Lê.</p>\r\n<p style="text-align: center;"><img class="alignnone size-full wp-image-348634" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-14.jpg" alt="dien vien blogtin (14)" width="500" height="750"></p>\r\n<p>Nhóm MTV.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348635" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-15.jpg" alt="dien vien blogtin (15)" width="500" height="750"></p>\r\n<p>Bích Phương rạng rỡ trong hậu trường.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348636" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-16.jpg" alt="dien vien blogtin (16)" width="500" height="751"></p>\r\n<p>MC Đức Bảo.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348637" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-17.jpg" alt="dien vien blogtin (17)" width="500" height="750"></p>\r\n<p>MC Thái Dũng.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348638" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-18.jpg" alt="dien vien blogtin (18)" width="500" height="750"></p>\r\n<p>MC Phí Linh.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348639" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-19.jpg" alt="dien vien blogtin (19)" width="500" height="750"></p>\r\n<p>Vận động viên Ánh Viên.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348640" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-20.jpg" alt="dien vien blogtin (20)" width="500" height="750"></p>\r\n<p>Diễn viên Kim Oanh</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348641" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-211.jpg" alt="dien vien blogtin (21)" width="500" height="750"></p>\r\n<p>Vân Hugo đảm nhận vai trò MC lễ trao giải.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348642" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-22.jpg" alt="dien vien blogtin (22)" width="500" height="750"></p>\r\n<p>Công Lý sánh đôi bên người yêu xinh đẹp.</p>\r\n<p style="text-align: center;">\r\n</p><p style="text-align: center;"><img class="alignnone size-full wp-image-348643" src="http://img.blogtin.com/2017/09/dien-vien-blogtin-23.jpg" alt="dien vien blogtin (23)" width="500" height="750"></p>\r\n<p>MC Thành Trung.</p>\r\n<p style="text-align: right;">Theo Trí thức trẻ</p>\r\n                                </div>\r\n\r\n\r\n                                <div class="clear-float"></div>\r\n<div style="padding:5px 0 5px 0;width:100%;float: left;">\r\n<ins class="adsbygoogle" style="display: block; text-align: center; height: 137px;" data-ad-format="fluid" data-ad-layout="in-article" data-ad-client="ca-pub-3599960059103364" data-ad-slot="6801757208" data-adsbygoogle-status="done"><ins id="aswift_1_expand" style="display:inline-table;border:none;height:137px;margin:0;padding:0;position:relative;visibility:visible;width:545px;background-color:transparent;"><ins id="aswift_1_anchor" style="display:block;border:none;height:137px;margin:0;padding:0;position:relative;visibility:visible;width:545px;background-color:transparent;"><iframe width="545" height="137" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_1" name="aswift_1" style="left:0;position:absolute;top:0;width:545px;height:137px;"></iframe></ins></ins></ins>\r\n<script>\r\n     (adsbygoogle = window.adsbygoogle || []).push({});\r\n</script>\r\n</div>\r\n\r\n<div class="like_top">		<div class="item">			<div class="fb-like" data-href="http://blogtin.video/dan-sao-viet-long-lay-hoi-ngo-tren-tham-do-vtv-awards-2017.html" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>		</div>		<div class="item">			<div class="fb-share-button" data-href="http://blogtin.video/dan-sao-viet-long-lay-hoi-ngo-tren-tham-do-vtv-awards-2017.html" data-layout="button_count" data-show-faces="false" data-share="false"></div>		</div>		<div class="item">			<div class="fb-like" data-href="https://www.facebook.com/blogtincom" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>		</div>		<div class="item last">			<div id="___ytsubscribe_1" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 123px; height: 24px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 123px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I1_1504861111484" name="I1_1504861111484" src="https://www.youtube.com/subscribe_embed?usegapi=1&amp;channelid=UCdUzXg-HCL_8uFjIY7Be_KA&amp;layout=default&amp;count=default&amp;origin=http%3A%2F%2Fblogtin.video&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.wekA59kPUjU.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCOacrwW3spyEgPbbz9Wh2MPXqdCDA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I1_1504861111484&amp;parent=http%3A%2F%2Fblogtin.video&amp;pfname=&amp;rpctoken=11698124" data-gapiattached="true"></iframe></div>		</div>	</div> \r\n\r\n<div class="clear-float"></div>\r\n<div class="box_news tincungchuyenmuc" style="position:relative;z-index:999">\r\n    <h2>\r\n        <a href="javascript:void(0);" class="title">Tin liên quan</a>\r\n    </h2>\r\n\r\n    \r\n     <div id="SC_TBlock_255525" class="SC_TBlock SC_TBlock_255525_t2" data-ad-built="1"><style>                                \r\n.SC_TBlock_255525_abm a                                      \r\n{                                   \r\n  display: list-item;                                   \r\n  text-align: left;                                \r\n  margin-top: 8px;\r\n  margin-left: 1em;                               \r\n  text-decoration: none;                           \r\n  color: black;\r\n  font-family: Arial, Helvetica, sans-serif;  \r\n  font-size: 14px;                                  \r\n}  \r\n.SC_TBlock_255525_abm a:nth-child(2) {\r\n     margin-top: 0px;\r\n}                                             \r\n.SC_TBlock_255525_abm a:hover                                \r\n{                                                  \r\n  color:crimson;                             \r\n}                                                  \r\n.SC_TBlock_255525_abm > div                                  \r\n{                                                                               \r\n  position: absolute;                              \r\n  min-width: 300px;                               \r\n  top: 0px;                                        \r\n  right: -280px;                                   \r\n  z-index: 9999999;                                \r\n  overflow: hidden;                               \r\n  background: rgba(255, 255, 255, 0.94);           \r\n  transition: opacity 0.7s;                                \r\n  box-shadow: 4px 3px 27px -1px rgba(0,0,0,0.75);  \r\n  border-radius: 5px 0px 5px 5px;                  \r\n  padding: 17px;\r\n  display: table;                                  \r\n}   \r\n.SC_TBlock_255525_abm > div.left                  \r\n{                                                                               \r\n    border-radius: 0px 5px 5px 5px;                         \r\n}\r\n.SC_TBlock_255525_abm > div.left .SC_TBlock_255525_acb {\r\n    left: 0px;   \r\n}   \r\n.SC_TBlock_255525_abm > div.right                  \r\n{                                                                               \r\n    border-radius: 5px 0px 5px 5px;                        \r\n}   \r\n.SC_TBlock_255525_abm > div.right .SC_TBlock_255525_acb {\r\n    right: 0px;   \r\n}\r\n[iscriteo="true"] .SC_TBlock_255525_arb {\r\n    display: none;\r\n}                                                                                            \r\n.SC_TBlock_255525_acb,                                      \r\n.SC_TBlock_255525_arb {                                    \r\n  position: absolute;                              \r\n  top:0;                                           \r\n  background: white;                               \r\n  border: none;                                    \r\n  cursor:pointer;                                  \r\n  outline:none;                                   \r\n  width: 17px;                                     \r\n  height: 17px;                                    \r\n  background-size: contain;                        \r\n  transition: 0.2s;                                \r\n}                                                  \r\n.SC_TBlock_255525_acb {                                     \r\n  background-color: transparent;                   \r\n}                                                                      \r\n.SC_TBlock_255525_t1 .SC_TBlock_255525_arb {                      \r\n    left: 0px;                                     \r\n}                                                  \r\n.SC_TBlock_255525_t1 .SC_TBlock_255525_arb {                      \r\n    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAARCAYAAAACCvahAAABH0lEQVQ4T82T2YqDQBBFyy1uxAX0/38wKOK+h1OhHTJ5GJiXmQKhtesuXde2zvM85Zdl/X8wp9v3XWzbFsuyXs9326bpOA5hTZPjOMJ727YSRZH4vv8OppGGaZr0WZZF3wEC2LZNAUmS6DdKlQGyCXPXdaoYBIG4rqtrU4bodrt9Ka/rKnVdS9/3+hGlPM91DRlnxck8zxKGoWRZJkqA7OPxUFUKdoA0QUYxpKZpBBEqjmMpiuITjNU0TbUJRRo5UlVVFxhnZVm+wDCyOY6j2kGVogknqGKfAbKHs8s2Q4EAm6iZiLCLKtMHiIv7/f4ZlckREliHYbji8TxPFU0CDPItKkDYI0fObRyYgWHf/Fkmuitn82cBNMw/Xba/u1VPPCMJy0kYAQ0AAAAASUVORK5CYII=");\r\n}                                                  \r\n.SC_TBlock_255525_t1 .SC_TBlock_255525_acb {                       \r\n    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAARCAYAAAA7bUf6AAABh0lEQVQ4T63UP0hVcRjG8c8tKkjJQRzaLEwMBxVa3KShFsm0IYL+QBDoEK2C4JhDkxrUUJCDDZE61OIiNLTUUFAURIsUVEMgeE1MBXnhd+Tcw7lxh850OO/L83ve5/t7T8V/eCoFjaP404BuEzayvrxIC8bxDY/wt0TsEG7gNO7id/RkIuFgAnPoQjOelohcxg7e4TruhaO8k1G8xg+cxXHcxy4O4hbW8ArHUs+DvJN4P4zhNM5XDCQnC7iY6itoRwcWsVkUydzfSae9xzVcwEvM4xTOYTo/apFO1ML6JaziC7rxGSfQiefF0MtEskOWMIafaMMMrpThr+ckMghCLxLBCHcQ2wjxGvxlIkEpKITtXkRGQeFNCr4VD+tlEhdpCEewnEbow7OU0Sd8x/nkLuhsFencTB/DQQ/6k4OwHvij/hFvMYK4oI/zIrELU5jFAZxJSIs5RrAfsJ7GnEQ1n0nMehu/8CS7SAWVGPUqTiZa0bu/O1lvzXb+Y5uDXLVsixv4A5S37AFwfEsSkdavgAAAAABJRU5ErkJggg==");     \r\n}                                                                 \r\n.SC_TBlock_255525_t2 .SC_TBlock_255525_arb {             \r\n    right: 0px;                                    \r\n}                                                  \r\n.SC_TBlock_255525_t2 .SC_TBlock_255525_arb {             \r\n  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAARCAYAAAA7bUf6AAAAUklEQVQ4T2NkoAJgpIIZDIQM+Y9kCU61xBgCUgMybNQQSIjCwmJwhEkCAwPDAkpiZz9SOnHElTAJpRN5JI0PyTVkcKVYmC/ITvZEZXJCAUuUIQCiQBUS6fWmcwAAAABJRU5ErkJggg==");        \r\n}                                                  \r\n.SC_TBlock_255525_t2 .SC_TBlock_255525_acb {              \r\n  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAARCAYAAAA7bUf6AAAA80lEQVQ4T7XTvUoDQRiF4SeClxEs7MQQwSYi0cYgFmIhWCnYCLb2drkBSysrQRGsEhQVBAvRyh9I493IBxtYl+wkgXVhmmXnnTPv+bamgqdWAcO/QBYwg0Ei4Tzm8Dz8pphkER9Yw/sIUAOfaOOtDBLvW3jELp5yoFU8YBOv+QPKnHRwjUP0sIEb7OOumDAldhsXOMdxtm5HuRrXThenOMNJmewUJK5whUscZOt+miQhMVwcIa6wlQF38DKJk6gx6tsrSFxHJFnBd6qdGKQfxIY/NWabmvjCUh5UdLKM2ZJBGx4eoDr6qWGb+p8cV/FEwEogvwVQJBKS+d6VAAAAAElFTkSuQmCC");              \r\n}                                                  \r\n.SC_TBlock_255525_abm                                        \r\n{                                                  \r\n  position: fixed;                              \r\n  width: 100%;                                     \r\n  height: 100%;                                    \r\n  overflow: hidden;                                \r\n  left: 0;                                         \r\n  top: 0;                                        \r\n}    \r\n#SC_TBlock_255525 .SC_TBlock_255525_abm, \r\n#SC_TBlock_255525 .SC_TBlock_255525_abm:hover {\r\n    background: none!important;\r\n}                                              </style><div style="padding: 0px; border: 1px solid rgb(255, 255, 255); background-color: rgb(255, 255, 255); margin: 0px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" id="SC_TBlock_255525_Table"><tbody><tr style="border: none;"><td class="SC_TBlock_255525_td" style="text-align: left; vertical-align: top; padding: 5px; border: none;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0px;"><tbody><tr style="border: none;"><td style="text-align: left; vertical-align: top; border: 0px; width: 150px;"><a href="http://tôi_giảm_7kg_trong_đêm_ghi_lại_công_lấy" title="Tôi giảm 7kg trong đêm! Ghi lại công thức: lấy 3 lít nước nóng và thêm…" rel="external nofollow" target="_blank" style="position: relative; display: inline-block;"><img src="https://cdn.user-api.com/r/5923cc03287f3eb6078b4a41/img_150x150.gif" alt="Tôi giảm 7kg trong đêm! Ghi lại công thức: lấy 3 lít nước nóng và thêm…" id="SC_TBlock_255525_0" onmouseover="window.SC_TeaserBlock.imgMouseOver(this.id, \'SC_TBlock_255525\')" onmouseout="window.SC_TeaserBlock.imgMouseOut(this.id, \'SC_TBlock_255525\')" style="border: none; width: 150px; min-width: 150px; height: 150px; position: static; opacity: 1 !important;"><button class="SC_TBlock_255525_arb" title="abuse"></button></a></td></tr><tr style="border: none;"><td style="text-align: left; vertical-align: top; border: 0px;"><a href="http://tôi_giảm_7kg_trong_đêm_ghi_lại_công_lấy" title="Tôi giảm 7kg trong đêm! Ghi lại công thức: lấy 3 lít nước nóng và thêm…" class="SC_TBlock_255525_title" classname="SC_TBlock_255525_title" id="SC_TBlock_255525_0_link" rel="external nofollow" target="_blank" style="display: inline-block; width: 150px; line-height: normal;">Tôi giảm 7kg trong đêm! Ghi lại công thức: lấy 3 lít nước nóng và thêm…</a></td></tr></tbody></table></td><td class="SC_TBlock_255525_td" style="text-align: left; vertical-align: top; padding: 5px; border: none;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0px;"><tbody><tr style="border: none;"><td style="text-align: left; vertical-align: top; border: 0px; width: 150px;"><a href="http://loại_bỏ_mỡ_bụng_trong_9_ngày_không_ăn_1" title="Loại bỏ mỡ bụng trong 9 ngày không ăn kiêng hay thể thao! Đến giờ ngủ, làm 1 ly" rel="external nofollow" target="_blank" style="position: relative; display: inline-block;"><img src="https://cdn.user-api.com/r/58cfce3e287f3e475b8b494f/img_150x150.gif" alt="Loại bỏ mỡ bụng trong 9 ngày không ăn kiêng hay thể thao! Đến giờ ngủ, làm 1 ly" id="SC_TBlock_255525_1" onmouseover="window.SC_TeaserBlock.imgMouseOver(this.id, \'SC_TBlock_255525\')" onmouseout="window.SC_TeaserBlock.imgMouseOut(this.id, \'SC_TBlock_255525\')" style="border: none; width: 150px; min-width: 150px; height: 150px; position: static; opacity: 1 !important;"><button class="SC_TBlock_255525_arb" title="abuse"></button></a></td></tr><tr style="border: none;"><td style="text-align: left; vertical-align: top; border: 0px;"><a href="http://loại_bỏ_mỡ_bụng_trong_9_ngày_không_ăn_1" title="Loại bỏ mỡ bụng trong 9 ngày không ăn kiêng hay thể thao! Đến giờ ngủ, làm 1 ly" class="SC_TBlock_255525_title" classname="SC_TBlock_255525_title" id="SC_TBlock_255525_1_link" rel="external nofollow" target="_blank" style="display: inline-block; width: 150px; line-height: normal;">Loại bỏ mỡ bụng trong 9 ngày không ăn kiêng hay thể thao! Đến giờ ngủ, làm 1 ly</a></td></tr></tbody></table></td><td class="SC_TBlock_255525_td" style="text-align: left; vertical-align: top; padding: 5px; border: none;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0px;"><tbody><tr style="border: none;"><td style="text-align: left; vertical-align: top; border: 0px; width: 150px;"><a href="http://ký_sinh_trùng_sẽ_chui_ra_sau_1_đêm_bài" title="Ký sinh trùng sẽ chui ra sau 1 đêm! Bài thuốc cực mạnh với giá chỉ 1 đồng..." rel="external nofollow" target="_blank" style="position: relative; display: inline-block;"><img src="https://cdn.user-api.com/r/59955a9b287f3ec5638b45fe/img_150x150.jpg" alt="Ký sinh trùng sẽ chui ra sau 1 đêm! Bài thuốc cực mạnh với giá chỉ 1 đồng..." id="SC_TBlock_255525_2" onmouseover="window.SC_TeaserBlock.imgMouseOver(this.id, \'SC_TBlock_255525\')" onmouseout="window.SC_TeaserBlock.imgMouseOut(this.id, \'SC_TBlock_255525\')" style="border: none; width: 150px; min-width: 150px; height: 150px; position: static; opacity: 1 !important;"><button class="SC_TBlock_255525_arb" title="abuse"></button></a></td></tr><tr style="border: none;"><td style="text-align: left; vertical-align: top; border: 0px;"><a href="http://ký_sinh_trùng_sẽ_chui_ra_sau_1_đêm_bài" title="Ký sinh trùng sẽ chui ra sau 1 đêm! Bài thuốc cực mạnh với giá chỉ 1 đồng..." class="SC_TBlock_255525_title" classname="SC_TBlock_255525_title" id="SC_TBlock_255525_2_link" rel="external nofollow" target="_blank" style="display: inline-block; width: 150px; line-height: normal;">Ký sinh trùng sẽ chui ra sau 1 đêm! Bài thuốc cực mạnh với giá chỉ 1 đồng...</a></td></tr></tbody></table></td></tr></tbody></table><div class="SC_TBlock_255525_ads-modal-button"><div style="margin:0;"><div style="font-size:12px;background-color: rgba(255, 255, 255, 0.8);padding: 0;">\r\n<img src="//st-n.ads5-adnow.com/i/logo/adnow-mini-v2.png">\r\n</div><style>#SC_TBlock_255525 .SC_TBlock_255525_ads-modal-button {\r\n    visibility: visible!important;\r\n    display: inline-block!important;\r\n    text-decoration: none;\r\n    z-index: 99;\r\n    width: 100%;\r\n    color: #999;\r\n    line-height: 13px;\r\n    position: relative;\r\n    font-size: 10px;\r\n    vertical-align: top;\r\n    margin:0;\r\n    padding:0;\r\n}\r\n#SC_TBlock_255525 .SC_TBlock_255525_ads-modal-button div {\r\n    float: right;\r\n    display: inline-block;\r\n    vertical-align: top;\r\n    cursor: pointer;\r\n}\r\n#SC_TBlock_255525 .SC_TBlock_255525_ads-modal-button div:hover { cursor: pointer; }\r\n#SC_TBlock_255525_sc_blockscreen,\r\n#SC_TBlock_255525_sc_modalwindow {\r\n    position: fixed;\r\n    z-index: 9999;\r\n}\r\n#SC_TBlock_255525_sc_blockscreen {\r\n    background: rgba(0, 0, 0, .5);\r\n    left: 0;\r\n    right: 0;\r\n    top: 0;\r\n    bottom: 0;\r\n    z-index: 9990;\r\n}\r\n#SC_TBlock_255525_sc_modalwindow {\r\n    z-index: 9998;\r\n    background: #fff;\r\n    padding: 20px 10px;\r\n    border-radius: 5px;\r\n    border: 1px solid #a1a1a1;\r\n    box-shadow: 0 0 10px #444;\r\n    font-family: Arial, sans-serif;\r\n    font-size: 14px;\r\n    text-align: left;\r\n    -moz-box-sizing: content-box;\r\n    -webkit-box-sizing: content-box;\r\n    box-sizing: content-box;\r\n    color: #333;\r\n}\r\n#SC_TBlock_255525_sc_modalwindow a {\r\n    color: #00cb43;\r\n    text-decoration: underline;\r\n}\r\n#SC_TBlock_255525_sc_modalwindow a:hover {\r\n    text-decoration: none;\r\n}\r\n#sc_modalwindow p {\r\n    -webkit-margin-before: 1em;\r\n    -webkit-margin-after: 1em;\r\n    -webkit-margin-start: 0px;\r\n    -webkit-margin-end: 0px;\r\n}\r\n@media screen and (max-width: 640px) {\r\n    #SC_TBlock_255525_sc_modalwindow {\r\n        max-width: 90%;\r\n       -webkit-box-sizing: border-box;\r\n       -moz-box-sizing: border-box;\r\n       box-sizing: border-box;\r\n       margin-top: 0 !important;\r\n       margin-left: 0 !important;\r\n       left: 10px !important;\r\n       top: 50px !important;\r\n    }\r\n}\r\n.SC_TBlock_255525_close {\r\n    border-radius: 50%;\r\n    border: 1px solid #444;\r\n    color: #000;\r\n    width: 20px;\r\n    height: 20px;\r\n    font-size: 15px;\r\n    text-align: center;\r\n    line-height: 20px;\r\n    position: absolute;\r\n    right: 0;\r\n    top: 0;\r\n    margin-top: -10px;\r\n    margin-right: -10px;\r\n    background-color: #fff;\r\n    -webkit-transition: all 200ms ease-out;\r\n    -moz-transition: all 200ms ease-out;\r\n    -ms-transition: all 200ms ease-out;\r\n    -o-transition: all 200ms ease-out;\r\n    transition: all 200ms ease-out;\r\n}\r\n.SC_TBlock_255525_close:hover {\r\n    cursor: pointer;\r\n    color: #fff;\r\n    background-color: #000;\r\n}\r\n.SC_TBlock_255525_popup-title {\r\n    font-size: 18px;\r\n    font-weight: 700;\r\n    text-align: center;\r\n}</style></div></div></div></div>\r\n<script type="text/javascript">\r\n    (sc_adv_out = window.sc_adv_out || []).push({\r\n        id : "255525",\r\n        domain : "n.ads1-adnow.com"\r\n    });\r\n</script>\r\n<script type="text/javascript" src="//st-n.ads1-adnow.com/js/adv_out.js"></script>\r\n\r\n        <!--\r\n    <div id="SC_TBlock_223374" class="SC_TBlock">loading...</div>\r\n    <script type="text/javascript">var SC_CId = "223374",SC_Domain="n.ads3-adnow.com";SC_Start_223374=(new Date).getTime();</script>\r\n    <script type="text/javascript" src="http://st-n.ads3-adnow.com/js/adv_out.js"></script>\r\n    -->\r\n    <!-- Composite Start -->\r\n    <!--<div id="M205318ScriptRootC91397">-->\r\n    <!--        <div id="M205318PreloadC91397">-->\r\n    <!--        Loading...-->\r\n    <!--    </div>-->\r\n    <!--        <script>-->\r\n    <!--                (function(){-->\r\n    <!--            var D=new Date(),d=document,b=\'body\',ce=\'createElement\',ac=\'appendChild\',st=\'style\',ds=\'display\',n=\'none\',gi=\'getElementById\';-->\r\n    <!--            var i=d[ce](\'iframe\');i[st][ds]=n;d[gi]("M205318ScriptRootC91397")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}-->\r\n    <!--            catch(e){var iw=d;var c=d[gi]("M205318ScriptRootC91397");}var dv=iw[ce](\'div\');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=91397;c[ac](dv);-->\r\n    <!--            var s=iw[ce](\'script\');s.async=\'async\';s.defer=\'defer\';s.charset=\'utf-8\';s.src="//jsc.mgid.com/b/l/blogtin.com.91397.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();-->\r\n    <!--    </script>-->\r\n    <!--</div>-->\r\n    <!-- Composite End -->\r\n\r\n</div>\r\n</form>', 'phanquan', '1', '1504861139.jpg', 0, 'doanthi123123.html', '08/9/2017'),
(94, '123123123', '<div id="main-detail">\r\n                        <h1 class="title_detail"><strong>Bầu Đức lên tiếng vụ trao Công Phượng cho HLV Hoàng Anh Tuấn</strong></h1>\r\n<p>Ngày 7/9, trên trang facebook chính thức của HLV Hoàng Anh Tuấn, ông bất ngờ chia sẻ với dòng status "Cậu ấy không có lỗi! Hãy trao cậu ấy cho tôi!!!Tiên trách kỷ...!", kèm theo đó là hình ảnh tiền đạo Nguyễn Công Phượng của HAGL. Điều này cho thấy HLV Hoàng Anh Tuấn có thể sẽ muốn làm thầy Công Phượng. Ở thời điểm hiện tại, nhiều ý kiến cho rằng ông Tuấn đang bày tỏ mong muốn dẫn dắt ĐTQG Việt Nam sau khi HLV Hữu Thắng từ chức. Tuy nhiên, cũng không ngoại trừ việc ông Tuấn muốn làm thầy Công Phượng tại HAGL.</p>\r\n<p style="text-align: center;"><center><div class="share_image"> <div class="item_gallery" data-src="http://media.thethao247.vn/upload/vuongnh/2017/09/08/104837-2.jpg" data-sub-html="<div class=\'sapo_slide\'>undefined</div>"> <div class="thumb_detail"> <div class="share_detailimg"><a href="javascript:void(0);" onclick="javascript:window.open(\'https://www.facebook.com/dialog/feed?app_id=1436620903220400&amp;display=popup&amp;caption=thethao247.vn&amp;link=http://thethao247.vn/95-bau-duc-len-tieng-vu-trao-cong-phuong-cho-hlv-hoang-anh-tuan-d147983.html&amp;redirect_uri=http://thethao247.vn/95-bau-duc-len-tieng-vu-trao-cong-phuong-cho-hlv-hoang-anh-tuan-d147983.html#close_window\', \'\',  \'menubar=no, toolbar=no, resizable=yes, scrollbars=yes, height=600, width=600\')" class="share_fbimg"><i class="fa fa-facebook" aria-hidden="true"></i> Chia sẻ</a> <a href="javascript:void(0);" onclick="javascript:window.open(\'https://plus.google.com/share?url=http://thethao247.vn/95-bau-duc-len-tieng-vu-trao-cong-phuong-cho-hlv-hoang-anh-tuan-d147983.html\', \'\',  \'menubar=no, toolbar=no, resizable=yes, scrollbars=yes, height=600, width=600\')" class="share_fbimg share_gleimg"><i class="fa fa-google-plus" aria-hidden="true"></i> Chia sẻ</a></div> <div class="expan_img" style="display:none !important;"><i class="fa fa-arrows-alt" aria-hidden="true"></i></div> <img class="img-responsive" src="http://media.thethao247.vn/upload/vuongnh/2017/09/08/104837-2.jpg" alt="undefined" title="undefined"> </div>  </div> </div></center></p>\r\n<p>Sau khi nhận được thông tin trên, Bầu Đức đã lên tiếng. Trao đổi với báo giới sáng nay, cựu Phó chủ tịch VFF nói: “Trao Công Phượng để làm gì? Có biết đào tạo đâu mà trao. Đào tạo được cầu thủ nào thành tài chỉ ra coi thử?</p>\r\n<p><span>Hoàng Anh Tuấn nói nhiều quá. Thực sự là nói hơi nhiều, coi thường HLV khác là không được. Mình phải thận trọng, bình tĩnh, biết mình đang ở đâu. </span><span>Cứ nghĩ mình đang trên trời là không được. Cậu ta nói giao Công Phượng cho cậu ta, giao làm gì? Nói thế hóa ra bảo Hữu Thắng không biết làm? Nói vậy là không được.</span></p>\r\n<p>Hoàng Anh Tuấn chưa làm được gì đâu. Tuấn làm được gì? Đưa U20 Việt Nam đi World Cup là may thôi. Vào vòng bảng đúng thứ 4 thì ai nói là có thành tích.</p>\r\n<div id="AdAsia"></div><div id="bs_mobileinpage"><p></p><p></p><p></p><p></p></div><p>Dẫn dắt V.League có thành tích gì đâu nên thôi hãy khuyên Tuấn làm đi, đừng nói nhiều nữa. Dù muốn hay không thì Hữu Thắng từng có thành tích vô địch V.League.</p>\r\n<p>Nói Tuấn lên thay Hữu Thắng là không được. Tầm thường quá nên không nói nhiều”.</p>\r\n<p><strong>Công Vinh trao tài trợ 20 tỷ cho bóng đá nữ TP.HCM</strong></p>\r\n<p>Tại Lễ mừng công SEA Games 29 của ngành Thể thao TP.HCM diễn ra vào tối 7/9, bóng đá nữ TP.HCM đã nhận được con số tài trợ khủng với 4 tỷ đồng/năm, và tổng số tiền cho 5 năm là 20 tỷ đồng từ Quyền chủ tịch CLB TP.HCM – Lê Công Vinh.</p>\r\n<p>Theo thông tin mới nhất, Lê Công Vinh đã đại diện cho Hội đồng quản trị công ty tài trợ 20 tỷ đồng cho bóng đá nữ TP.HCM. Quyền Chủ tịch CLB TP.HCM sau này sẽ hỗ trợ về chuyên môn lẫn các vấn đề liên quan đến bóng đá nữ TP.HCM. "Bóng đá nữ TP.HCM còn nhiều khó khăn nên chuyện hỗ trợ này là điều tốt để phát triển. Sau này, tôi sẽ chung tay góp phần phát triển bóng đá nữ TP.HCM, hy vọng bóng đá TP.HCM sẽ gặt hái nhiều thành công", Công Vinh chia sẻ.</p>\r\n<p><strong>Mourinho chốt tương lai vào tháng 11</strong></p>\r\n<p>Tờ Independent (Anh) cho biết M.U đã quyết định sẽ khởi động việc đàm phán gia hạn hợp đồng cho HLV Jose Mourinho ngay tháng 11 tới. Mặc dù hợp đồng hiện tại tới năm 2019 mới hết hạn nhưng M.U cảm thấy cần thiết phải giữ chân Mourinho bằng một giao kèo mới. “Quỷ đỏ” muốn mọi thỏa thuận hoàn tất trước Giáng Sinh thay vì chờ đợi tới sang Hè năm sau, thời điểm biến động trên sân cỏ có thể tác động tới ý định của chiến lược gia Bồ Đào Nha. Trong cuộc phỏng vấn mới đây, Mourinho cho biết ông không quan tâm tới việc gia hạn hợp đồng và không cần một cam kết dài hạn để làm tốt công việc của mình.</p>                    </div>', '123123', '1', '1504839308.jpg', 1, '123123123.html', '08/9/2017'),
(93, 'bao bong da', '1231231231', '123123', '1', '1504772082.jpg', 0, 'bao-bong-da.html', '07/9/2017');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_deleted`) VALUES
(1, 'All', 0),
(3, '123', 1),
(4, '123123', 1),
(5, '123123', 1),
(6, '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `security` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED DEFAULT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `lang_folder` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `lang_folder`, `avatar`, `role`, `is_deleted`, `token`) VALUES
(1, '170.00', '123123', '123123', '123123', 'doanthi2241@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, 1, '123123123', '123123123', NULL, NULL, NULL, 'doanthi.jpg', 'Admin', 0, NULL),
(2, NULL, NULL, '123123', NULL, 'doanthi1117@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'd123', '123123', NULL, NULL, NULL, 'doanthi.jpg', 'Admin', 0, NULL),
(3, NULL, NULL, '123123', NULL, 'anhthu.daut222ay196@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, '123123123', '123123111', NULL, NULL, NULL, '1505211313.jpg', 'Admin', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
