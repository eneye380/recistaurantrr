<!doctype html>


<html>
    <head>
        <script type="text/javascript" src="postreview.js"></script>
      <style>
	h1{
		color:red;
		font-weight:bold;
	}
	#div1{
		background:white;
		padding:20px;
	}
	#div2{
		background:black;
		padding:200px;
	}
	table{
		color: white;
		background:rgb(200,24,240);
		text-align:center;
		margin:auto;
	}
</style>  
    </head>
	<div id="div1" >
		<h1>RECISTAURANT MANAGEMENT CONSOLE</h1>
		<div id="div2" class="form-group">
			<form role="form" method="post" onsubmit="return passwordCheck(this)">
			<table>
				<tr>
					<th colspan=2>Admin Only Access</th>
				</tr>
				<tr>
					<td>Password</td>
					<td><input class="form-control" type="password" name="password" ></td>
				</tr>
				<tr>
					
                                    <td colspan=2><input type="submit" name="submit" value="Login" ></td>
                                        
				</tr>
			</table>
                            
			</form>
                    <p id="adminhint" style="color:red;margin: auto;width:200px" class="pull-right"></p>
		</div>	
                
		<!--div>
			<input id="uploadComment" type="submit" value="upload">
			<input id="deleteComment" type="submit" value="delete">
		</div-->
	</div>
	<?php
	
	?>
</html>