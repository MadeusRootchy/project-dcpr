<?php
//3 param
//..host name
//..user 
//....password 
//...database name//
function connect_mysqli($hostname,$user,$pswd,$dbname){
    $con = new mysqli($hostname,$user,$pswd,$dbname);
    if($con)
    return $con;

}
//  if(connect_mysqli("localhost","root","","base_dcpr")){
//     echo "<center>connection succed</center>";
// }

?>