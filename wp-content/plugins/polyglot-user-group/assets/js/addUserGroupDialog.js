/**
 * Dialog Window for add user group
 * 
 * @returns null
 */
function AddUserGroup() {
    this.divId = '';
    this.isLoaded = false;

    this.iniDialog = function(divId) {
        divId = typeof divId !== 'undefined' ? divId : this.divId;
        if (divId != this.divId) {
            this.divId = divId;
        }

        var that = this;
        jQuery("#" + divId).dialog({
            width: 350,
            height: 300,
            autoOpen: false,
            resizable: true,
            dragable: true,
            modal: true,
            buttons: {
                'Cancel': function() {
                    that.isLoaded = false;
                    $(this).dialog('close');
                    that.allUsers = [];
                },
                'Save': function() {
                    that.save();
                    $(this).dialog('close');
                }
            }
        });
    }

    this.openDialog = function() {
        jQuery('#addUserGroup').html('');
        jQuery('#' + this.divId).dialog('open');
        if (!this.isLoaded) {
            this.loadContent();
        }
        return false;
    }

    this.loadContent = function() {
        var that = this;
       
    }

    this.save = function() {
    }
}

function UserGroupDialog() {
    this.AddUserGroup = new AddUserGroup();
}

jQuery(function() {
    //	ini global object
    userGroupDialog.AddUserGroup.iniDialog();
});