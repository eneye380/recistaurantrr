<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="../lib/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="../lib/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

        <script src="postreview.js" type="text/javascript"></script>
        <!--script src="postpost.js" type="text/javascript"></script-->
    </head>
    <body style="background: #1b6d85">


        <?php
        session_start();
        require '../database/db_connection_info.php';
        /* Create connection
          if($_SERVER['REQUEST_METHOD']=='GET'){
          $placeid = $_GET['placeid'];
          }else{
          die("error");
          } */
        if(!isset($_SESSION['logon'])){
            
            header("Location: /model/admin1.php");
        }

        $conn = new mysqli($localhost, $username, $password, $db);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM comment_adminview;";
        $result = $conn->query($sql);
        $i = 0;
        $name = "";
        $num = "";
        if ($result->num_rows > 0) {
            // output data of each row
            echo"<div><h2 id='' style='color:gold'>USER:::" . $_SESSION['logon'] . ", Welcome</h2>";
            echo"<div><h6 style='color:grey' id='adminhint'></h6>";
            $size = 1;
            while ($row = $result->fetch_assoc()) {
                $i++;
                $num = "$i";
                $name = "form" . "$num";


                //echo $i;
                if ($size % 4 == 1) {
                    echo "<div class='row text-center' style=''>";
                }
                //echo $name;
                echo "<div class='well col-md-3 col-sm-6 col-xs-12 hero-feature'><div style='background:grey; margin-top:5px;height:150px;overflow:auto'><form method='get' name='$name'> </p><p style='color:black'> " . "<input value =" . $row['placeid'] . " type='text' name='adminid' size='50px'>" .
                "<p>comment".$i."</p>".
                        "<h2 style='color:green'>Restaurant Name:" . $row["restaurant_name"] . "</h2>" .
                "<p style='color:green'>Name:</p>
		<p style='color:lightgreen'> " . $row["name"] . "</p>
		<p style='color:black'> Comment: </p>
		<p style='color:yellow;font-style:italic'> " . $row["comment"] .
                "<p style='color:yellow'>" . $row["timestamp"] . "</p></p> 
		" . "</p><p style='color:white'> Email:</p>
		<p style='color:yellow'> " . $row["email"] . "</div><br>
		<input type='hidden' name='admine' value =" . $row["email"] . ">
		<div><input id='uploadComment' type='button' value='upload' form='$name' onclick='uploadComment($name)'>
			<input id='deleteComment' type='button' value='delete' form='$name' onclick='deleteComment($name)'></form></div></div>";
                //$i++;
                if ($size % 4 == 0) {
                    echo "</div>";
                }
                $size++;
            }
            //echo"</div>";
        } else {
            echo "No records";
        }
        $conn->close();
        ?>


    </body>
</html>
