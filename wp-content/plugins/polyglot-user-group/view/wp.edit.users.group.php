<?php
$polyglotUserGroups = getPolyglotUserGroups();
//get menu
$menuName = 'header menu';
$menuItems = wp_get_nav_menu_items($menuName);
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
<h1>Group Setting</h1>
<div style="margin-top: 10px">
<table class="table table-condensed table-bordered table table-striped" id="userGroupContainer">
    <tr class="active" >
        <td width="10%">
            select
        </td>
        <td width="10%">
            Group ID
        </td>
        <td width="80%">
            Group Name
        </td>
    </tr>
    <?php foreach($polyglotUserGroups as $polyglotUserGroup){?>
        <tr class="success">
            <td width="10%">
                <input type='checkbox' id="group_<?php echo $polyglotUserGroup->getId();?>"
                       value="<?php echo $polyglotUserGroup->getId();?>">
            </td>
            <td width="10%">
                <?php echo $polyglotUserGroup->getId(); ?>
            </td>
            <td width="80%">
                <?php echo $polyglotUserGroup->getDescription(); ?>
            </td>
        </tr>
            
    <?php } ?>
</table>
</div>
<input type="button" value='Create Group' class="btn" id="create-user-group">
<input type="button" value='Delete Groups' class="btn" id="delete-user-group">
<h1>Sub Group Setting</h1>
<div style="margin-top: 10px">
<select onchange="getUserSubGroup()" id="userGroupList">
    <?php foreach($polyglotUserGroups as $polyglotUserGroup){ ?>
    <option value="<?php echo $polyglotUserGroup->getId() ?>">
            <?php echo $polyglotUserGroup->getDescription(); ?>
        </option>
    <?php } ?>
</select>
</div>

<div style="margin-top: 10px">
<table class="table table-condensed table-bordered table table-striped" id="userSubGroupContainer">
    
</table>
</div>

<input type="button" value='Create Sub Group' class="btn" id="create-user-subGroup">
<input type="button" value='Delete Sub Groups' class="btn" id="delete-user-subGroup">

<!--menu settings-->
<!--<h1>Menu Settings</h1>

<div>
    <select onchange="getSubGroupList()" id="menuSettingGroupList">
        <?php foreach($polyglotUserGroups as $polyglotUserGroup){ ?>
            <option value="<?php echo $polyglotUserGroup->getId() ?>">
                <?php echo $polyglotUserGroup->getDescription(); ?>
            </option>
        <?php } ?>
    </select>
    
    <select id="menuSettingSubGroupList">
    </select>
</div>

<div>
    
    <div>
        <table class="table-bordered table-striped table" id="menuItemsSetting">
            <tr>
                <td>
                    Show menu
                </td>
                <td>
                    Menu Description
                </td>
            </tr>
            <?php foreach ($menuItems as $menuItem) { ?>
                <tr>
                    <td>
                        <input type ="checkbox" value="<?php echo $menuItem->ID?>">
                    </td>
                    <td>
                        <?php echo $menuItem->title ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <input type="button" value='Save Menu Settings' class="btn" id="saveMenuSettings" onclick="saveSubGroupMenuSettings()">
    </div>
</div>-->

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
<!--Delete dialog form window-->
<div id="delete-dialog-form" title="Delete user group">
	<p class="validateTips">Delete User Group</p>

	<form>
	<fieldset>
		<label for="groupDescription">Delete user groups with id:</label>
		<div id="rowsForDelete"><div>
                <input type="hidden" name="rowsToDeleteString" id="rowsToDeleteString" />
	</fieldset>
	</form>
</div>

<!--Add sub user group dialog form window-->
<div id="dialog-add-sub-group-form" title="Add user Sub Group">
	<p class="validateTips">Add new User Sub Group</p>
	<form>
	<fieldset>
		<label for="subGroupDescription">Sub Group Description</label>
		<input type="text" name="subGroupDescription" id="subGroupDescription" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>

<!--Delete dialog form window-->
<div id="delete-sub-group-dialog-form" title="Delete user Sub group">
	<p class="validateTips">Delete User Syb Group</p>

	<form>
	<fieldset>
		<label for="groupDescription">Delete user sub groups with id:</label>
		<div id="subGroupsIds"><div>
                <input type="hidden" name="rowsToDeleteString" id="subGroupsIdsString" />
	</fieldset>
	</form>
</div>

                    