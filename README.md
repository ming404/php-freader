#PHP Freader

PHP Freader is a replacement product (sort of) to Google Reader which cease service by July 2013. Although most users are using mobile devices to read news and feeds, I just thought that there must be some other users who still prefer to have a nice desktop web version of feed / rss reader to use, including myself.

PHP Freader is built with latest technology like HTML5, JQuery and BootstrapJS.

![](http://www.php-freader.org/wp-content/uploads/2013/06/overview1.png)

##Demo and Installtion Guide
[Demo](http://demo.php-freader.org/) | [Installation](http://www.php-freader.org/installation/)

##Author
[Ming teoh](http://www.linkedin.com/in/mingteoh)

##Features
- Add new subscription / feed url
- Unlimited subscriptions
- Tag / untag feeds, sort of like grouping / upgrouping feeds
- View items from multiple feeds via selecting tag
- View unread items only, or all items
- Bulk marking feed items as read
- Search by keywords
- Star feed items (similar idea to flag feed item as favorite so that it can be easily retrieved in future)
- Lazy load feed items as per window scroll (like Facebook), and mark item as read automatically
- Check for latest feed items when outdated (15 minutes interval)
- Optional cron job script to retrieve latest feed items at specific interval time frame
- Template coding keep simple and standard using BootstrapJS so that other users (potentially developers) can customise it easily
- Digest encrypted / gzip contents
- Handle feed url redirection
- Showing unread count to each subscriptions and tags
- Fixed potential memory leaks
- Support future releases detection
- Implemented clean job which to be set as cron job and clean up periodically
- Allow user registrations (turn off by default, turn on via config.php) and login
