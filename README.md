## About

Story printer was created to help fulfil my desire to maintain useful data on a physical sprint backlog. We keep our stories in a Google Docs Spreadsheet and copying them onto cards is a bit labourious. Often times things are missed, or even misunderstood.
     
This won't be for everyone. I understand that the act of writing the cards out by hand, spurs conversation, so - if you're already struggling from lack of communication, this might not be the best thing for you, but if your teams work well together and you're also suffering from writers cramp when duplicating work to cards, then maybe you'll find this useful.

## Security

When you upload your .csv to the site, it stores it temporarily while it stores the stories in a session, then deletes the file. You can see it do this by looking at the source on github. The, your data is stored in a PHP session which I'm not clever enough to work out how to look at (and I don't really want to).

Alternatively, download the source from github and install yourself locally!

## Coming soon

Currently, the story printer has a very limited use. But I intend to flesh it out over the coming weeks and months with a few more features, detailed below:

 * Data stored in HTML5 LocalStorage
 * Ability to edit the stories once they've been uploaded</li>
 * Some kind of column mapping, so you don't have to use an exact format of your CSVs

After this, there will be more, but for me the natural progression is for a     full backlog management tool, but without the sprint backlog facet that     most online tools have. In the future, this will be somewhere to manage just your backlog and your stories.

## Installation

This is based on codeigniter, so, create yourself a vhost:

    <VirtualHost *:80>
        DocumentRoot /some/place/to/have/storyprinter/public
        ServerName www.your.url 
        <Directory "/some/place/to/have/storyprinter/public">
            Options FollowSymLinks
            AllowOverride FileInfo	     
            RewriteEngine On
            RewriteCond $1 !^(index\.php|css|img|images|fckeditor|scripts|js|robots\.txt|favicon\.ico)
            RewriteRule ^(.*)$ /index.php/$1 [L]
            </Directory>
        </VirtualHost>

Then put everything in `/some/place/to/have/storyprinter/` and you should be good to go