<?php
// fuam6tdqijx5 >=L5^g0sm:O cpanel password

UPDATE `services` SET `service_image` = 'More_services1.jpg' WHERE `services`.`service_id` = 54;
UPDATE `services` SET `service_image` = 'default_upload.png' WHERE `services`.`service_id` = 53;
UPDATE `services` SET `service_description` = 'Coming soon' WHERE `services`.`service_id` = 53;

UPDATE `banner` SET `status` = 'disable';
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (1).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (2).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (3).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (4).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (5).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (6).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (7).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (8).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (9).jpg', 'enable');
INSERT INTO `banner`(`banner_image`, `status`) VALUES ('imgL (10).jpg', 'enable');

UPDATE `testimonial` SET `status` = 'disable';
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("Awesome, that's all I can say. Quick delivery, quality service and lowest prices. Thanks a lot.", 'Fayomi Charles', 'testimonial (1).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("Just now I received the parcel and the ordered products is so good. Great fitting and bold look, I just love it. Thanks for this nice blouse making.", 'Bukola Tolu', 'testimonial (4).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("Ansvel works perfectly fine for people with less time on their hand for shopping, especially when style is not what you are ready to compromise on. Thanks for their amazing service.", 'Onyia Kingsley', 'testimonial (2).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("Two words, Excellent and Affordable. Thank God for people like you. God bless your good work.", 'Ugwu Martin', 'testimonial (3).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("I am a working man and it was always difficult for me to find time to reach out to my tailor. But now with Ansvel it is so easy, as they schedule pick up & delivery as per my timing.", 'Ridwan yemisi', 'testimonial (7).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("It has always been hard to find the right traditional style and tailor to with it. But now with Ansvel, I can do that from the comfort of my bedroom. Thanks guys.", 'Emmanuel Mgbe', 'testimonial (5).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("Finally! I have a tailor that keeps to time. A million thanks to the team behind this beautiful concept. - Brown", 'Brown Kehinde', 'testimonial (8).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("Great work guys... It's been a pleasure.", 'Sunday Okeke', 'testimonial (9).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("I just collected my Suit, it is perfect. I love it. Lovely work done by u all. Thank you everyone.", 'Secondus Anini', 'testimonial (10).jpg', 'enable');
INSERT INTO `testimonial`(`content`, `name`, `image`, `status`) VALUES ("Just like many other first timers here, I also doubted. But they delivered. Both in quality and time. For all of you that want quality but don't have the time, Ansvel is the place for you.", 'Temi Mohammed', 'testimonial (6).jpg', 'enable');

UPDATE `homepage_meta` SET `img`='logo221.png', `meta_title`='Ansvel | Doorstep Tailoring Services for Ladies, Gents & Kids', `meta_keyword`='tailors for ladies,tailors,tailors for gents,alteration tailor,sewing,fashion,kids tailor,home visit tailor,on call tailor,online stitching service,bridal western & fashion dress tailors',`meta_desc`='Online tailoring services for Men, Women & Kids at your doorstep',`copyright`='Ansvel LTD',`author`='Ansvel LTD',`geography`='World',`language`='English' WHERE `id` = 1;
UPDATE `add_link_menu` SET `link_menu_name`='Ansvel' WHERE `id` = 1;

UPDATE `information_link` SET `info_link_name`='Sell On Ansvel',`info_link_address`='vendor-home' WHERE `id` = 1;
UPDATE `information_link` SET `info_link_address`='vendor' WHERE `id` = 2;
UPDATE `information_link` SET `info_link_address`='tell-your-friend' WHERE `id` = 3;
UPDATE `information_link` SET `info_link_address`='welcome/login' WHERE `id` = 4;
UPDATE `information_link` SET `info_link_address`='measurement-guide' WHERE `id` = 5;
UPDATE `information_link` SET `info_link_address`='blog' WHERE `id` = 6;
UPDATE `information_link` SET `info_link_address`='brands' WHERE `id` = 7;
UPDATE `information_link` SET `info_link_address`='Vendor/vendor_home' WHERE `id` = 8;
UPDATE `information_link` SET `status_enable`='disable' WHERE `id` = 9;

UPDATE `mobiledarzi` SET `link`='about-us' WHERE `id` = 1;
UPDATE `mobiledarzi` SET `link`='how-it-works' WHERE `id` = 2;
UPDATE `mobiledarzi` SET `link`='blog' WHERE `id` = 3;
UPDATE `mobiledarzi` SET `link`='terms-and-condition' WHERE `id` = 4;
UPDATE `mobiledarzi` SET `link`='privacy-policy' WHERE `id` = 5;
UPDATE `mobiledarzi` SET `link`='careers' WHERE `id` = 6;
UPDATE `mobiledarzi` SET `link`='sitemap.xml' WHERE `id` = 7;

UPDATE `service_link` SET `service_link_address`='stitching' WHERE `id` = 1;
UPDATE `service_link` SET `service_link_address`='fabric' WHERE `id` = 2;
UPDATE `service_link` SET `service_link_address`='uniform' WHERE `id` = 3;
UPDATE `service_link` SET `service_link_address`='accessories' WHERE `id` = 4;
UPDATE `service_link` SET `service_link_address`='altration' WHERE `id` = 5;
UPDATE `service_link` SET `service_link_address`='more-services' WHERE `id` = 6;
UPDATE `service_link` SET `service_link_address`='donate' WHERE `id` = 7;
UPDATE `service_link` SET `service_link_address`='bridal' WHERE `id` = 8;
UPDATE `service_link` SET `service_link_address`='online-boutique/women/1' WHERE `id` = 9;

UPDATE `customer_support_link` SET `link_address`='faq' WHERE `id` = 1;
UPDATE `customer_support_link` SET `link_address`='contact' WHERE `id` = 2;
UPDATE `customer_support_link` SET `link_address`='cancel-return' WHERE `id` = 3;
UPDATE `customer_support_link` SET `link_address`='payment' WHERE `id` = 4;
UPDATE `customer_support_link` SET `link_address`='shipping' WHERE `id` = 5;
UPDATE `customer_support_link` SET `link_address`='manage-profile' WHERE `id` = 6;
UPDATE `customer_support_link` SET `link_address`='track-order' WHERE `id` = 7;

ALTER TABLE `vendor` ADD account_name VARCHAR(255) NOT NULL;
ALTER TABLE `vendor` ADD bank_name VARCHAR(50) NOT NULL;
ALTER TABLE `vendor` ADD sort_code VARCHAR(50) NOT NULL;
ALTER TABLE `vendor` ADD tin VARCHAR(50) NOT NULL;
ALTER TABLE `vendor` ADD acc_class VARCHAR(50) NOT NULL;
ALTER TABLE `vendor` ADD business_name VARCHAR(50) NOT NULL;
ALTER TABLE `vendor` ADD category VARCHAR(50)l
// ALTER TABLE `posts_product_files` CHANGE `posts_product_id` `file_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT;