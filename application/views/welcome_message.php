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
        <input type="hidden" name="moo" value="baa" />

        <label for="userfile">Your list of stories:</label>
        <br />
        <input type="file" name="userfile" size="20" />
        <br /><br />
        <label for="ignore_first_row">Ignore the first row:</label>
        <input type="checkbox" name="ignore_first_row" id="ignore_first_row" value="1" />
        <br />    <br />
        <input type="submit" value="Upload that shizzle!" />

        </form>    
    </div>
</div>
<hr />
<div id="pastebox" class="clearfix">
    <h2>Can't be arsed with a CSV? Paste each story in here</h2>
    <?php echo form_open_multipart('stories/paster');?>
    <label for="story">User story</label><br />
    <textarea name="story" id="story"></textarea>
    <br /><br />
    <label for="cos">Conditions of Satisfaction</label><br />
    <textarea name="cos" id="cos"></textarea>
    <br /><br />
    <label for="stakeholder">Stakeholder</label><br />
    <input type="text" name="stakeholder" id="stakeholder" value="" />
    <br /><br />
    <label for="effort">Effort</label><br />
    <input type="text" name="effort" id="effort" value="" />        
    <br /><br />
    <label for="release">Release</label><br />
    <input type="text" name="release" id="release" value="" />
    <br /><br />
    <label for="scope">Scope</label><br />
    <input type="text" name="scope" id="scope" value="" />        
    <br /><br />
    <label for="sprint">Sprint</label><br />
    <input type="text" name="sprint" id="sprint" value="" />
    <br />    <br />
    <input type="submit" value="Save and add another" />
    <br />    <br />
    <input type="submit" value="Enough! Let me print!" />

</div>
