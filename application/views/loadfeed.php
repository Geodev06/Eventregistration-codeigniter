<style>
.d_ {
    border-radius : 10px;
    margin:4px;
}
#p_mess {
    font-size:10px;
}
#acro_sender {
    font-size: 18px;
    padding : 2px 2px;
    color:white;
    background: linear-gradient(to top left, #00ff00 0%, #009933 100%);
    border-radius: 50%;
    height :30px;
    width :30px;
}
#pd {
    margin :0;
    margin-top:-20px;
}
.btn-view-2 {
    height : 30px;
    width :180px;
    border:none;
    border-radius : 120px;
    background-color: seagreen;
    color:white;
}
</style>
<?php 
        $server ='127.0.0.1';
		$user = 'root';
		$pass = '';
		$dbname = 'event_reg';
		$db = mysqli_connect($server, $user, $pass, $dbname);
		$qry ="SELECT comments,post_id,content,sender,acro_sender,date_c from tbl_feed where type_p = 1 ORDER BY id DESC";
        $result = mysqli_query($db, $qry);
        echo   "<div class ='container'>";
          echo  "<div class='row'>";
		if ($result) {
         
		while($row = mysqli_fetch_assoc($result)) {

               /* echo "<div class='row d_'>";
			    echo "<div class='col-md-12 mr-5'>";
				echo "<div class='text-left'>";
				echo "<b class='text-success'>".$row["sender"]."</b> ";
                echo "<p id='receive_p'>".$row["content"]."</p> ";
                echo "</div>";   */
            echo   "<div class='col-lg-12 d_'>";
            echo   "<div class='card border-0 text-success p-3'>";
            echo   "<p id='receive_p '><div id='acro_sender'>".$row["acro_sender"] .' '."</div>".$row["sender"]."</p> ";
            echo   "<p class='text-dark' id='pd'>Date posted : ".$row["date_c"]."</p> ";
            echo   "</div>";
            echo   "<div class='card-header'>";
            echo    "<p id='p_mess'>".$row["content"]."</p> ";
            echo    "<form action=". base_url().'index.php/dashboard/getpostid'." method='post'>";
            echo    "<input name='txtid' type='hidden' value='".$row["post_id"]."'>";
            echo    "<input type='submit' class='btn-view-2' value='View details' />";
            echo    "</form>";
            echo   "</div>";
            echo   "</div>";
		}
		} else {
		echo "No Records found!";
        }
        echo   "</div>";
        echo  "</div>";
?>

        
