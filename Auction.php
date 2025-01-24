<!DOCTYPE html> 
<html> 
    <head> 
        <title>Form</title> 
    </head> 
   
    <body> 
	<?php
			// Include the database configuration file
		require_once 'dbconfig.php';
	?>
	<style>
		.form-style-8{
			font-family: 'Open Sans Condensed', arial, sans;
			width: 500px;
			padding: 30px;
			background: #FFFFFF;
			margin: 50px auto;
			box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
			-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
			-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

		}
		.form-style-8 h2{
			background: #4D4D4D;
			text-transform: uppercase;
			font-family: 'Open Sans Condensed', sans-serif;
			color: #797979;
			font-size: 18px;
			font-weight: 100;
			padding: 20px;
			margin: -30px -30px 30px -30px;
		}
		.form-style-8 input[type="text"],
		.form-style-8 input[type="PlayerNo"],
		.form-style-8 input[type="Amount"],
		.form-style-8 input[type="email"],
		.form-style-8 input[type="number"],
		.form-style-8 input[type="search"],
		.form-style-8 input[type="time"],
		.form-style-8 input[type="url"],
		.form-style-8 input[type="password"],
		.form-style-8 textarea,
		.form-style-8 select 
		{
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			outline: none;
			display: block;
			width: 100%;
			padding: 7px;
			border: none;
			border-bottom: 1px solid #ddd;
			background: transparent;
			margin-bottom: 10px;
			font: 16px Arial, Helvetica, sans-serif;
			height: 45px;
		}
		.form-style-8 textarea{
			resize:none;
			overflow: hidden;
		}
		.form-style-8 input[type="button"], 
		.form-style-8 input[type="submit"]{
			-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
			-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
			box-shadow: inset 0px 1px 0px 0px #45D6D6;
			background-color: #2CBBBB;
			border: 1px solid #27A0A0;
			display: inline-block;
			cursor: pointer;
			color: #FFFFFF;
			font-family: 'Open Sans Condensed', sans-serif;
			font-size: 14px;
			padding: 8px 18px;
			text-decoration: none;
			text-transform: uppercase;
		}
		.form-style-8 input[type="button"]:hover, 
		.form-style-8 input[type="submit"]:hover {
			background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
			background-color:#34CACA;
		}
		.container {
			  position : relative;
			  //height : 1200px;
			  max-width : 900px;
			  margin: 20px;
			  top : -50px;
			  //left: 500px;
			  
			  align-items : start;
			  //justify-content : center;
			  display : grid;
			  grid: auto/ auto auto auto auto;
			  padding : 10px; 
			  column-gap: 10px;
			}
		.styled-table {
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			font-family: sans-serif;
			min-width: 400px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
			
		}
		.styled-table thead tr {
			background-color: #009879;
			color: #ffffff;
			text-align: left;
		}
		.styled-table th,
		.styled-table td{
			padding: 12px 15px;
		}
		
		
		
		
		
		.styled-table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		.styled-table tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		.styled-table tbody tr:last-of-type {
			border-bottom: 2px solid #009879;
		}
		.styled-table tbody tr.active-row {
			font-weight: bold;
			color: #009879;
		}
		.header{
		  
			  font-family: '3d', serif;
			  font-size: 75px;
			  text-shadow: 4px 4px 4px #aaa;
			  text-align: center;
			  text-decoration-line: underline;
		}

		</style>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=3d">
		<div class='header'>KPL-2 Auction</div>
        <!-- form tag to create form --> 
        <form action = "playerauction.php" method = "post" class="form-style-8"> 
				<select id="Team" name="Team">
				  <option value="1">Choose Team</option>
				  <option value="1">ROYAL CHALLENGERS KATRIYAL</option>
				  <option value="2">GRK TEAM</option>
				  <option value="3">Brave Blazers</option>
				  <option value="4">Katriyal super kings</option>
				  <option value="5">SRSK</option>
				  <option value="6">Sun rises katriyala</option>
				  <option value="7">Dhruva army of Katriyalx</option>
				</select>  
            <input type = "PlayerNo" name="PlayerNo" placeholder="Enter Player Number as per list"/> 
            <input type = "Amount" name="Amount" placeholder="Enter Bid Amount"/> 
            <input type = "submit" name = "submit" value = "Submit"> 
        </form> 
          
        <!-- script to check form submission --> 
		<?php
					$result = $db->query("SELECT t.FranchiseName,2000-IFNULL(sum(AMOUNT),0)  leftpurse,t.teamowner,count(1) buy FROM teamdetails t left join `auction` a on t.TeamNo=a.TEAMNO
											where a.TEAMNO=1");
					$team1 = $result->fetch_assoc();
					$result = $db->query("SELECT t.FranchiseName,2000-IFNULL(sum(AMOUNT),0)  leftpurse,t.teamowner,count(1) buy FROM teamdetails t left join `auction` a on t.TeamNo=a.TEAMNO
											where a.TEAMNO=2");
					$team2 = $result->fetch_assoc();
					$result = $db->query("SELECT t.FranchiseName,2000-IFNULL(sum(AMOUNT),0)  leftpurse,t.teamowner,count(1) buy FROM teamdetails t left join `auction` a on t.TeamNo=a.TEAMNO
											where a.TEAMNO=3");
					$team3 = $result->fetch_assoc();
					$result = $db->query("SELECT t.FranchiseName,2000-IFNULL(sum(AMOUNT),0)  leftpurse,t.teamowner,count(1) buy FROM teamdetails t left join `auction` a on t.TeamNo=a.TEAMNO
											where a.TEAMNO=4");
					$team4 = $result->fetch_assoc();
					$result = $db->query("SELECT t.FranchiseName,2000-IFNULL(sum(AMOUNT),0)  leftpurse,t.teamowner,count(1) buy FROM teamdetails t left join `auction` a on t.TeamNo=a.TEAMNO
											where a.TEAMNO=5");
					$team5 = $result->fetch_assoc();
					$result = $db->query("SELECT t.FranchiseName,2000-IFNULL(sum(AMOUNT),0)  leftpurse,t.teamowner,count(1) buy FROM teamdetails t left join `auction` a on t.TeamNo=a.TEAMNO
											where a.TEAMNO=6");
					$team6 = $result->fetch_assoc();
					$result = $db->query("SELECT t.FranchiseName,2000-IFNULL(sum(AMOUNT),0)  leftpurse,t.teamowner,count(1) buy FROM teamdetails t left join `auction` a on t.TeamNo=a.TEAMNO
											where a.TEAMNO=7");
					$team7 = $result->fetch_assoc();
		?>
		    
		
	<div class='container'>			
		<!------------------------Table 1--------------------		-->
		<div>
			<table class="styled-table">
				<caption><b><?=$team1['FranchiseName']." - (".$team1['leftpurse'];?>)<b></caption>
				<thead class="thead-dark">
					<tr>
						<th style="width:5px">PlayerNo</th>
						<th>PlayerName<?="   <b>(".$team1['buy'].")"?></th>
						<th style="width:5px">Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$result = $db->query("SELECT p.SNO PlayerListNo,t.FranchiseName franchisename, p.PNAME playername,a.AMOUNT amount FROM `auction` a
										left join teamdetails t on t.TeamNo = a.TEAMNO
										left join completeplayers p on p.SNO=a.PLAYERNO
										where t.teamno=1");
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?= $row['PlayerListNo'] ?></td>
						<td><?= $row['playername'] ?></td>
						<td><?= $row['amount'] ?></td>
					</tr>
				<?php } } else { ?>
					<tr><td colspan="5">No records found...</td></tr>
				<?php } ?>
				</tbody>
			</table>
		</div>

		<!------------------------Table 2--------------------		-->
		<div>
			<table class="styled-table">
				<caption><b><?=$team2['FranchiseName']." - (".$team2['leftpurse'];?>)<b></caption>
				<thead class="thead-dark">
					<tr>
						<th style="width:5px">PlayerNo</th>
						<th>PlayerName<?="   <b>(".$team2['buy'].")"?></th>
						<th style="width:5px">Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$result = $db->query("SELECT p.SNO PlayerListNo,t.FranchiseName franchisename, p.PNAME playername,a.AMOUNT amount FROM `auction` a
										left join teamdetails t on t.TeamNo = a.TEAMNO
										left join completeplayers p on p.SNO=a.PLAYERNO
										where t.teamno=2;");
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?= $row['PlayerListNo'] ?></td>
						<td><?= $row['playername'] ?></td>
						<td><?= $row['amount'] ?></td>
					</tr>
				<?php } } else { ?>
					<tr><td colspan="5">No records found...</td></tr>
				<?php } ?>
				</tbody>
			</table>
		</div>

		<!------------------------Table 3--------------------		-->
		<div>
			<table class="styled-table">
				<caption><b><?=$team3['FranchiseName']." - (".$team3['leftpurse'];?>)<b></caption>
				<thead class="thead-dark">
					<tr>
						<th style="width:5px">PlayerNo</th>
						<th>PlayerName<?="   <b>(".$team3['buy'].")"?></th>
						<th style="width:5px">Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$result = $db->query("SELECT p.SNO PlayerListNo,t.FranchiseName franchisename, p.PNAME playername,a.AMOUNT amount FROM `auction` a
										left join teamdetails t on t.TeamNo = a.TEAMNO
										left join completeplayers p on p.SNO=a.PLAYERNO
										where t.teamno=3;");
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?= $row['PlayerListNo'] ?></td>
						<td><?= $row['playername'] ?></td>
						<td><?= $row['amount'] ?></td>
					</tr>
				<?php } } else { ?>
					<tr><td colspan="5">No records found...</td></tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
			
		<!------------------------Table 4--------------------		-->
		<div>
			<table class="styled-table">
				<caption><b><?=$team4['FranchiseName']." - (".$team4['leftpurse'];?>)<b></caption>
				<thead class="thead-dark">
					<tr>
						<th style="width:5px">PlayerNo</th>
						<th>PlayerName<?="   <b>(".$team4['buy'].")"?></th>
						<th style="width:5px">Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$result = $db->query("SELECT p.SNO PlayerListNo,t.FranchiseName franchisename, p.PNAME playername,a.AMOUNT amount FROM `auction` a
										left join teamdetails t on t.TeamNo = a.TEAMNO
										left join completeplayers p on p.SNO=a.PLAYERNO
										where t.teamno=4;");
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?= $row['PlayerListNo'] ?></td>
						<td><?= $row['playername'] ?></td>
						<td><?= $row['amount'] ?></td>
					</tr>
				<?php } } else { ?>
					<tr><td colspan="5">No records found...</td></tr>
				<?php } ?>
				</tbody>
			</table>
		</div>	

		<!------------------------Table 5--------------------		-->
		<div>
			<table class="styled-table">
				<caption><b><?=$team5['FranchiseName']." - (".$team5['leftpurse'];?>)<b></caption>
				<thead class="thead-dark">
					<tr>
						<th style="width:5px">PlayerNo</th>
						<th>PlayerName<?="   <b>(".$team5['buy'].")"?></th>
						<th style="width:5px">Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$result = $db->query("SELECT p.SNO PlayerListNo,t.FranchiseName franchisename, p.PNAME playername,a.AMOUNT amount FROM `auction` a
										left join teamdetails t on t.TeamNo = a.TEAMNO
										left join completeplayers p on p.SNO=a.PLAYERNO
										where t.teamno=5;");
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?= $row['PlayerListNo'] ?></td>
						<td><?= $row['playername'] ?></td>
						<td><?= $row['amount'] ?></td>
					</tr>
				<?php } } else { ?>
					<tr><td colspan="5">No records found...</td></tr>
				<?php } ?>
				</tbody>
			</table>
		</div>

		<!------------------------Table 6--------------------		-->
		<div>
			<table class="styled-table">
				<caption><b><?=$team6['FranchiseName']." - (".$team6['leftpurse'];?>)<b></caption>
				<thead class="thead-dark">
					<tr>
						<th style="width:5px">PlayerNo</th>
						<th>PlayerName<?="   <b>(".$team6['buy'].")"?></th>
						<th style="width:5px">Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$result = $db->query("SELECT p.SNO PlayerListNo,t.FranchiseName franchisename, p.PNAME playername,a.AMOUNT amount FROM `auction` a
										left join teamdetails t on t.TeamNo = a.TEAMNO
										left join completeplayers p on p.SNO=a.PLAYERNO
										where t.teamno=6;");
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?= $row['PlayerListNo'] ?></td>
						<td><?= $row['playername'] ?></td>
						<td><?= $row['amount'] ?></td>
					</tr>
				<?php } } else { ?>
					<tr><td colspan="5">No records found...</td></tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
				
		<!------------------------Table 7--------------------		-->
		<div>
			<table class="styled-table">
				<caption><b><?=$team7['FranchiseName']." - (".$team7['leftpurse'];?>)<b></caption>
				<thead class="thead-dark">
					<tr>
						<th style="width:5px">PlayerNo</th>
						<th>PlayerName<?="   <b>(".$team7['buy'].")"?></th>
						<th style="width:5px">Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$result = $db->query("SELECT p.SNO PlayerListNo,t.FranchiseName franchisename, p.PNAME playername,a.AMOUNT amount FROM `auction` a
										left join teamdetails t on t.TeamNo = a.TEAMNO
										left join completeplayers p on p.SNO=a.PLAYERNO
										where t.teamno=7;");
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?= $row['PlayerListNo'] ?></td>
						<td><?= $row['playername'] ?></td>
						<td><?= $row['amount'] ?></td>
					</tr>
				<?php } } else { ?>
					<tr><td colspan="5">No records found...</td></tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</DIV>
</body> 
</html>
