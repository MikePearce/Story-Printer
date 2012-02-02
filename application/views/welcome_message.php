<div id="acontainer" class="clearfix">
    <div id="site_description">
        <h2>Print your user stories</h2>
        <p>
            Let's face it, there is nothing that can replace the use of a 
            <a href="http://wp.me/pRx9I-4z">physical sprint backlog</a>. But, it's
            often easier to maintain a product backlog in some digital tool.
        </p>
        <p>
            If your digital tool of choice cannot print to an index card sized
            physical version of your user story, you can use this tool.
        </p>
        <p>
            Simply upload a CSV of the stories you want printed, and we'll take
            care of the rest.
        </p>
    </div>
    <div id="upload">
        <h2>Upload your CSV here</h2>

        <?php echo form_open_multipart('stories/index');?>
        <p>
            <em>Note: stories that have a status of 'ready' will be imported.
                Everything else will be ignored.</em>
        </p>
        <input type="hidden" name="moo" value="baa" />
        <label for="userfile">Your list of stories:</label>
        <br />
        <input type="file" name="userfile" size="20" />
        <br /><br />
        <input type="submit" value="Upload that shizzle!" />

        </form>    
    </div>
</div>
<hr />
<h3>CSV format</h2>
<p>
    You no longer need to use specific columns in your CSV. As long as it has 
    column headings, you can now map your own to StoryPrinters. Below are
    explanations of the parts of the cards you'll see when you upload.
</p>
<div id="csv_info">
    <dl>
        <dt>Story Number</dt>
            <dd>A unique identifier for your story</dd>
        <dt>User Story</dt>
            <dd>The story itself <em>(As a [user], I need [some feature], so that I get [some value])</em></dd>
        <dt>Acceptance criterias</dt>
            <dd>The things that will tell you when your story is complete.</dd>
        <dt>Stakeholders</dt>
            <dd>The people with the money, drive and passion. Your sponsers.</dd>
        <dt>Effort</dt>
            <dd>The story points, or whatever effort metric you use.</dd>
        <dt>Scope</dt>
            <dd>Whether this was created with the backlog, or an emergent idea.</dd>
        <dt>Status</dt>
            <dd>Is it done or ready? (Add 'ready' to this column to be able to import only ready stories. Add 'done' to be able to ignore these when you import.)</dd>
        <dt>Sprint</dt>
            <dd>Which sprint did it go in?</dd>
        <dt>Release</dt>
            <dd>Which release is it going in?</dd>
    </dl>
</div>
<div id="example">
    <p>
        If you want to see examples of product backlogs which will work with
        the StoryPrinter, you can use these.
    </p>
    <p>
        Want it quick? <a href="example.csv" target="_blank">Download here</a>.
    </p>
    <p>
        Want to copy? <a href="https://docs.google.com/spreadsheet/ccc?key=0Aiayy3JXl-sfdGdOTC1hQ196NWVMVXZLNy1Kd0dWbXc" target="_blank">Google Doc version here</a>.
    </p>
    <p>&nbsp;</p>
    <h2>Subscribe</h2>
    <p>
        Get informed of updates to the application and other news from Mike by subscribing to the newsletter.
    <p>
        <form action="http://freshsent.info/cgi-bin/dada/mail.cgi" method="post">
            <fieldset>
            <input type="hidden" name="list" value="mikepearce" />
            <p>
                <label for="email">Email Address:</label>
            	<input type="text" name="email" id="email" value="" />
            </p>
                <input type="hidden" name="f" id="f_s" value="subscribe" />
            <p>
                <input type="submit" value="Submit" class="processing" />
            </p> 
            </fieldset>
        </form> 
</div>
    
