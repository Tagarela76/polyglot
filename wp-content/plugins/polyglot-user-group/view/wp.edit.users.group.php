<?php
$polyglotUserGroups = getPolyglotUserGroups();


?>
<style>
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
</style>

<table>
    <tr>
        <td>
            Group ID
        </td>
        <td>
            Group Name
        </td>
    </tr>
    <?php foreach($polyglotUserGroups as $polyglotUserGroup){?>
        <tr>
            <td>
                <?php echo $polyglotUserGroup->getId(); ?>
            </td>
            <td>
                <?php echo $polyglotUserGroup->getDescription(); ?>
            </td>
        </tr>
            
    <?php } ?>
</table>

<input type="button" value='Create Group' class="btn-inverse" id="create-user-group">
<!--Dialog window-->
<div id="dialog-form" title="Create new user">
	<p class="validateTips">Add new User Group</p>

	<form>
	<fieldset>
		<label for="groupDescription">Group Description</label>
		<input type="text" name="groupDescription" id="groupDescription" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>


