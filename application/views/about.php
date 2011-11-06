<h2>About</h2>
<p>
    Story printer was created to help fulfil my desire to maintain useful
    data on a physical sprint backlog. We keep our stories in a Google Docs
    Spreadsheet and copying them onto cards is a bit labourious. Often times 
    things are missed, or even misunderstood.
</p>
<p>
    This won't be for everyone. I understand that the act of writing the cards
    out by hand, spurs conversation, so - if you're already struggling from 
    lack of communication, this might not be the best thing for you, but if 
    your teams work well together and you're also suffering from writers
    cramp when duplicating work to cards, then maybe you'll find this useful.
</p>
<p>
    So far, there have been <?= $uploads; ?> .CSVs uploaded to the Story
    Printer!
</p>
<h2>Security</h2>
<p>
    When you upload your .csv to the site, it stores it temporarily while it 
    stores the stories in a session, then deletes the file. You can see it do 
    this by looking at the source on <a href="https://github.com/MikePearce/Story-Printer">github</a>. The, your data is stored in a PHP
    session which I'm not clever enough to work out how to look at (and I
    don't really want to).
</p>
<p>
    Alternatively, download the source from <a href="https://github.com/MikePearce/Story-Printer">github</a> and install yourself locally!
</p>
<h2>Coming soon</h2>
<p>
    Currently, the story printer has a very limited use. But I intend to flesh
    it out over the coming weeks and months with a few more features, detailed
    below:
</p>
<ul>
    <li>Data stored in HTML5 LocalStorage</li>
    <li>Ability to edit the stories once they've been uploaded</li>
    <li>Some kind of column mapping, so you don't have to use an exact format
        of your CSVs</li>
</ul>
<p>
    After this, there will be more, but for me the natural progression is for a
    full backlog management tool, but without the sprint backlog facet that
    most online tools have. In the future, this will be somewhere to 
    manage just your backlog and your stories.
</p>
<h2>Get in touch</h2>
<p>
    If you'd like to request new features, or just to get in touch and give
    me a digital jumping chest-bump, then feel free to email me on 
    <a href="mailto:mike@mikepearce.net">mike@mikepearce.net</a> or find me on
    Twitter as <a href="http://twitter.com/MikePearce">MikePearce</a>.
</p>