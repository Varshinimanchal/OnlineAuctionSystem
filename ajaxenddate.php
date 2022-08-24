<input name="end_date" class="form-control"  type="date" placeholder="End date" min="<?php echo date('Y-m-d', strtotime($_GET['start_date'] . ' +1 day')); ?>" value="<?php if(isset($_GET['editid'])){	echo date("Y-m-d",strtotime($rsedit['end_date_time'])); }	else { 		 echo date('Y-m-d', strtotime($_GET['start_date'] . ' +1 day'));
	}	?>"	<?php 		if(isset($_GET['editid'])) 		{
			echo " readonly  style='background-color:#fcf8e3;' ";
		} 		?>		>