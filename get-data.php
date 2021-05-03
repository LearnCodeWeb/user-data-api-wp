<?php define('WP_USE_THEMES', false); ?>
<script>
	const getAjaxData = (data) => {
		var userRow = '';
		jQuery.each(data, function(key, value) {
			console.log(key);
			userRow += '<tr id="parent' + key + '">';
			userRow += '<th scope="row" class="check-column"><label class="screen-reader-text" for="user' + key + '"></label><input type="checkbox" name="users[]" data-user-check="true" id="user' + key + '" class="administrator" value="' + value.userid + '"></th>';
			userRow += '<td scope="col" id="userid" class="manage-column column-name">' + value.userid + '</td>';
			userRow += '<td scope="col" id="username" class="manage-column column-name"><a href="<?= apiurl ?>users/profile:' + value.userid + '" class="ajax">' + value.username + '</a></td>';
			userRow += '<td scope="col" id="email" class="manage-column column-name">' + value.email + '</td>';
			userRow += '<td scope="col" id="status" class="manage-column column-name" align="center">' + value.status + '</td>';
			userRow += '<td scope="col" id="created" class="manage-column column-name" align="center">' + value.created + '</td>';
			userRow += '</tr>';
		});
		jQuery('#user-list').html(userRow);
		jQuery.colorbox.close();
	}
	jQuery(document).ready(() => {
		sendAjaxData('<?= apiurl ?>users/all', 'GET');
		jQuery('#searchForm').on("submit", () => {
			sendAjaxDataForm('#searchForm', '<?= apiurl ?>users/searchdata', 'GET');
		});
	})

	function delSelected() {
		const getSelect = jQuery('[data-user-check]:checked').map((n, i) => {
			return i.value;
		}).get().join(',');
		sendAjaxData('<?= apiurl ?>users/delluser:' + getSelect, 'DELETE')
	}
</script>
<div class="wrap">
	<h1 class="wp-heading-inline">Api Users Data</h1>
	<hr class="wp-header-end">
	<div id="message" class="updated notice">
		<p>If data not load then click on this button. <button type="button" name="getUserData" id="getUserData" class="button" value="Get Users Data" onclick="sendAjaxData('<?= apiurl ?>users/all', 'GET')">Get Users Data</button></p>
	</div>
	<h2 class="screen-reader-text">Filter users list</h2>
	<form method="get" id="searchForm" onsubmit="return false;">
		<div class="tablenav top">
			<div class="alignleft actions">
				<p class="search-box">
					<input type="search" id="user-search-input" name="s">
					<input type="submit" id="search-submit" class="button" value="Search Users">
					<a href="<?php echo apidata_url; ?>ajax/add-users.php" id="adduser" class="button ajax" value="adduser">Add User</a>
					<button type="button" id="remove" class="button btn-red" onclick="if(confirm('Are you sure to delete selected user(s)?')){delSelected()}" value="remove">Remove User</button>
				</p>
			</div>
			<br class="clear">
		</div>
	</form>
	<h2 class="screen-reader-text">Users list</h2>
	<table class="wp-list-table widefat fixed striped table-view-list users">
		<thead>
			<tr>
				<td class="manage-column check-column" width="50">
					<label class="screen-reader-text" for="check-all-user-1">Select All</label>
					<input type="checkbox" id="check-all-user-1" onchange="checkAllUsers('#check-all-user-1')">
				</td>
				<th scope="col" id="username" class="manage-column column-name" width="80">User ID</th>
				<th scope="col" id="name" class="manage-column column-name">Name</th>
				<th scope="col" id="email" class="manage-column column-name">Email</th>
				<th scope="col" id="posts" class="manage-column column-posts num">Status</th>
				<th scope="col" id="datetime" class="manage-column column-posts num">Datetime</th>
			</tr>
		</thead>
		<tbody id="user-list" data-user-list="userlist">
			<tr id="user-1">
				<th scope="row" class="check-column">
					<label class="screen-reader-text" for="user_1">Select zaid</label>
					<input type="checkbox" name="users[]" id="user_1" class="administrator">
				</th>
				<td scope="col" id="username" class="manage-column column-name">User ID</td>
				<td scope="col" id="name" class="manage-column column-name">Name</td>
				<td scope="col" id="email" class="manage-column column-name">Email</td>
				<td scope="col" id="posts" class="manage-column column-posts num">Status</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td class="manage-column check-column" width="50">
					<label class="screen-reader-text" for="check-all-user-2">Select All</label>
					<input type="checkbox" id="check-all-user-2" onchange="checkAllUsers('#check-all-user-2')">
				</td>
				<th scope="col" id="username" class="manage-column column-name" width="80">User ID</th>
				<th scope="col" id="name" class="manage-column column-name">Name</th>
				<th scope="col" id="email" class="manage-column column-name">Email</th>
				<th scope="col" id="posts" class="manage-column column-posts num">Status</th>
				<th scope="col" id="datetime" class="manage-column column-posts num">Datetime</th>
			</tr>
		</tfoot>
	</table>
	<div class="clear"></div>
</div>
