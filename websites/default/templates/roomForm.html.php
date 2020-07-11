<form action="" method="post">
		<input type="hidden" name="room[room_id]" value="<?=$room['room_id'] ?? ''?>" />
		<label for="name">Location</label>
        <input type="text" name="room[location]" value="<?=$room['location'] ?? ''?>" />
		</br>
		<label for="name">Room Number</label>
        <input type="text" name="room[room_number]" value="<?=$room['room_number'] ?? ''?>" />
		</br>

		<input type="submit" value="Submit">
</form>