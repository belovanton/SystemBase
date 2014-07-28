<?php
$con = mysql_connect('localhost','root', 'mysql');
mysql_select_db('mask', $con);
$res = mysql_query('show tables');
$tables = array();
echo "REVOKE ALL ON mask.* FROM mask@localhost;REVOKE ALL ON *.* FROM mask@localhost;\n";
while($row = mysql_fetch_row($res)){
   echo "GRANT ALL ON mask.".$row[0]." TO mask@localhost;\n";
}
echo "REVOKE DELETE ON mask.rb_user FROM mask@localhost;\n";

//Необходимо только при ручном изменении таблицы mysql.user
//echo "FLUSH PRIVILEGES;\n";

