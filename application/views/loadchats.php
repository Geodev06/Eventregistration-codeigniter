<?php
                    $server ='127.0.0.1';
                    $user = 'root';
                    $pass = '';
                    $dbname = 'event_reg';
                    $db = mysqli_connect($server, $user, $pass, $dbname);
                    $qry ="SELECT content,sender,receiver,sender_name from tbl_conversations where message_id = '".$_SESSION["sess_mess_id"]."'";
                    $result = mysqli_query($db, $qry);
                    if ($result) {
                        
                    while($row = mysqli_fetch_assoc($result)) {
                        
                        if($row["sender"] == $_SESSION["user_id"])
                        {
                            echo "<div class='text-right'>";
                            echo "<b class='text-primary'>You :</b> ";
                            echo "<p id='send_p'>".$row["content"]."</p> ";
                            echo "</div>";
                        }else
                        {
                            echo "<div class='text-left'>";
                            echo "<b class='text-success'>".$row["sender_name"]."</b> ";
                            echo "<p id='receive_p'>".$row["content"]."</p> ";
                            echo "</div>";
                        }     
                        
                    }
                    } else {
                    echo "No Records found!";
                    }
?>