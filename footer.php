
<div id="footer">
<?php
 echo ("IP:");
 echo $_SERVER['SERVER_ADDR'];
 echo ("|");
 echo ("Puerto:");
 echo $_SERVER['REMOTE_PORT'];
 echo ("|");
 echo ("Usuario:");
// echo $_COOKIE['username'];
 echo "<b>$session->username</b>";
 echo ("|");
 echo (require ("deviceON.php")); 
 echo ("|");
?>
<!--<b><?=$_COOKIE["Tusername"]?></b>-->
<p>
Data from <a href="/crc/404.php">CRCVta</a>
-
Ver. 0.2
-
Update:2017
  - Powered by:<a href="#">lufer</a>
</p>
     </div>
            </div>

    </body>
</html>
