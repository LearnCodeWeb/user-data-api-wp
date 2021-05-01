<script>
    jQuery(document).ready(() => {
        jQuery('#addUserForm').on("submit", () => {
            if (jQuery("#un").val() == "") {
                jQuery("#msg").html('<div class="alert-error">Please enter user name first!</div>');
                return false;
            }
            if (jQuery("#ue").val() == "") {
                jQuery("#msg").html('<div class="alert-error">Please enter email first!</div>');
                return false;
            }
            if (jQuery("#us").val() == "") {
                jQuery("#msg").html('<div class="alert-error">Please select status first!</div>');
                return false;
            }
            sendAjaxDataForm('#addUserForm', 'http://localhost/userapi/users/adduser');
        })
    })
</script>
<div class="container">
    <h1>User Add Form</h1>
    <div id="msg"></div>
    <form method="POST" id="addUserForm" onsubmit="return false;">
        <div class="form-group">
            <label>User Name <span class="text-danger">*</span></label>
            <input type="text" name="username" id="un" class="form-control" placeholder="Enter user name">
        </div>
        <div class="form-group">
            <label>User Email <span class="text-danger">*</span></label>
            <input type="email" name="email" id="ue" class="form-control" placeholder="Enter user name">
        </div>
        <div class="form-group">
            <label>User Status <span class="text-danger">*</span></label>
            <select name="status" id="us" class="form-control">
                <option value="">Select</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="adduserbtn" id="adduserbtn" class="button" value="adduserbtn">Add User</button>
        </div>
    </form>
</div>