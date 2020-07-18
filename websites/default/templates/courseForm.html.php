<form action="" method="post" class="row">
		<div class="col-6">
		<input type="hidden" name="course[course_id]" value="<?=$course['course_id'] ?? ''?>" />
		<label for="name">Course Name</label>
        <input type="text" name="course[name]" value="<?=$course['name'] ?? ''?>" />
		</br>
		<!-- <label for="name">Number of Modules</label>
        <input type="text" name="course[no_of_modules]" value="<?=$course['no_of_modules'] ?? ''?>" />
		</br> -->
		<label for="name">Course Duration</label>
        <input type="number"  min="1" max="5" name="course[course_duration]" value="<?=$course['course_duration'] ?? ''?>" />
		<span>Years</span>
		</br>	
		<label for="name">Leader</label>
		<select name="course[staff_id]" >
			<?php
			
			foreach ($staffs as $staff ) {
				if($course['staff_id']!=$staff['staff_id']){
					echo'<option value="'.$staff['staff_id'].'" >'.$staff['Fname'].'</option>';
				}
				if($course['staff_id']==$staff['staff_id']){
				echo'<option value="'.$staff['staff_id'].'" selected class="font-weight-bold">'.$staff['Fname'].' (Current Leader)</option>';
				}
			}
			?>
		</select>
		</br>
		</div>
		
		<div class="col-6">
			<!-- <div id="modules" class="row">
				<?php
				
					foreach ($modules as $module ) {
						echo'
							<label class="col-6 ">Module Name</label>
							<input class="col-6 my-2" type="text" name="module[]" value="'.$module['name'].'"/>
						';
					}
				?>	
			</div>
			<button type="button" id="addModBtn" onclick="addInput()" >add Module</button>  -->
		</div>
		<input type="submit" value="Submit">
</form>



<!-- <script>
	var modbtn=document.getElementById("addModBtn");
	var container =document.getElementById("modules");
	modbtn.addEventListener("click",addInput())
	function addInput(){
		var l = document.createElement("LABEL");
		l.innerHTML = " Module Name : ";
		l.setAttribute("class","col-6 ");

		var x = document.createElement("INPUT");
		x.setAttribute("type", "text");
		x.setAttribute("name", "module[]");
		x.setAttribute("class", "col-6 my-2");

		container.appendChild(l);
		container.appendChild(x);
		container.appendChild(document.createElement("br"));
	}
</script> -->
