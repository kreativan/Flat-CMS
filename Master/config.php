<?php 

/*
        //General Settings
        $ivm_site_name = Flatinet;
        $ivm_language = 'english';
        $ivm_blog_posts = '5'; // blog post per page

        // Email Settings
        $ivm_master_mail="email@gmail.com";
        $ivm_master_name="Ivan Milincic";   // your name
        $ivm_smtp="off"; // on/ off
        $ivm_smtp_host="smtp1.example.com"; // eg. smtp.gmail.com
        $ivm_smtp_user="smtp_username"; // email adress
        $ivm_smtp_password="smtp_password"; // passowrd
        $ivm_smtp_secure="ssl"; //ssl or tls
        $ivm_smtp_port="465";

        // Dev Settings
        $less="on"; // less preprocessor on-off
        $g_analytics="off"; // google analytics on-off
        $custom_js="off";   // custom inline js (admin -> system)
        $custom_css="off"; // custom inline css (admin -> system)
*/

        include("ivm/system/config.php"); // admin config file, comment if u wont to use params above;

	
$path             = '/FLAT'; // If installed in root, leave blank. If in "subfolder", use "/subfolder"
$admin            = 'admin'; // Admin folder name
$password         = 'admin'; // Admin login
$autobackup       = true; // Turn on/off auto-backup feature
date_default_timezone_set('Europe/Belgrade'); // More: https://php.net/manual/en/timezones.php
$language         = $ivm_language;

// EDITOR

$wysiwyg          = true; // Toggle on/off WYSIWYG editor in blocks/blog
$allow            = array('txt','jpeg','gif','jpg','svg','png','pdf','zip'); // File types allowed to be uploaded

// GALLERY

$thumbnail_height = '140';
$thumbnail_width  = '220';

// FORM

$mail_inputs      = array('Name'=>'text','Email'=>'email'); // Input fields eg: 'Phone'=>'text'
$lang_form_name   = 'Name'; // Must match "Name" input above
$lang_form_email  = 'Email'; // Must match "Email" input above
$mail_textarea    = array('Comment'=>'7'); // 7 = Number of rows in comment textarea

// Tip: To add more form fields, add to the $mail_inputs array


// BLOG

$result_per_page  = $ivm_blog_posts; // Blog posts per page
$disqus_comments  = false; // Turn on/off blog comments (Disqus)
$disqus_shortname = "sample-name"; // Your disqus account name
$date_format      = "M j, Y"; // More: https://php.net/manual/en/function.date.php

// RSS

$blog_title       = 'My Blog';
$blog_description = 'This is my blog.';
$blog_url         = "http://example.com/blog";
$rss_lang         = 'en-us';
$url_prefix   	  = 'blog'; // blog-1-post-title, if changed also edit htaccess
