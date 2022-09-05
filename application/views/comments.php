<style>
.p_mess{
    margin:0px;
    padding-left: 10px;
}.p_mess1{
    color:rgb(55,55,55);
    margin:4px;
    padding-left: 10px;
}
.dcm {
    background:white;
    border-radius: 5px;
}
</style>
<?php 
        $server ='127.0.0.1';
		$user = 'root';
		$pass = '';
		$dbname = 'event_reg';
		$db = mysqli_connect($server, $user, $pass, $dbname);
		$qry ="SELECT comments,commentator,date_c from tbl_feed where post_id = '".$_SESSION["post_id"]."' and type_p = 2 ORDER BY id ASC";
        $result = mysqli_query($db, $qry);
        echo   "<div class ='container-fluid'>";
          echo  "<div class='row'>";
		if ($result) {
         
		while($row = mysqli_fetch_assoc($result)) {

            echo   "<div class='col-lg-12 d_'>";
            echo "<div class='dcm'>";
            echo   "<p class='p_mess text-primary'>".$row["commentator"]."</p> ";
            echo    "<p class='p_mess1'>".$row["comments"]."</p><hr> ";
            echo "</div>";
            echo   "</div>";
		}
		} else {
		echo "No Comments found!";
        }
        echo   "</div>";
        echo  "</div>";
?>

        
