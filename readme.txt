=== Post 'n Page Views ===
Contributors: designbyrono
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=N5TKVJK6MVV46
Tags: admin, post, page, stats, views, easy stats
Requires at least: 2.5
Tested up to: 3.1
Stable tag: 1.0

Reports the number of views for pages and posts, in the admin lists and can be used in the front end.


== Description ==

This very simple plugin keeps a count of your post/page views:

* In the admin post and page tabs, it adds a neat column that tracks the number of views.

* In the front end, you can display page or post view by adding the following code in your templates: `<?php print_page_views(get_the_ID()); ?>`. The default output will be something like: <strong>235 views</strong>


This plugin requires the new JetPack by Wordpress.com or the old Wordpress.com Stats plugins.

For a live demo, visit: http://www.AbsoluteFiction.com

Inspired by 'Easy Stats 1.0', by WPCEO.


== Installation ==

1. Upload `post-n-page-views` to the `/wp-content/plugins/` directory

2. Activate `Post 'n Page Views` through the 'Plugins' menu in WordPress

3. Place `<?php print_page_views(get_the_ID()); ?>` in your templates


== Screenshots ==

1. Administration panel post list

1. Administration panel page list

2. User aera posts page


== Frequently Asked Questions ==

= Can I hide the stats from users that are not logged in? =

Yes. In your templates, simply use the following code instead:
`<?php if ($user_ID): ?> ... <?php print_page_views(get_the_ID()); ?> ... <?php endif; ?>`
Replace the '...' with whatever other HTML you need to keep your design consistent.


== Changelog ==

= 1.0 =
* Initial release


== Upgrade Notice ==

= 1.0 =
* None.