<!-- <?php 
header('content-type:text/html;charset=utf-8');
try {  
    $db = new PDO('mysql:host=127.0.0.1;dbname=project', 'root', '');  
    //查询  
    $rows = $db->query('SELECT * from room')->fetchAll(PDO::FETCH_ASSOC);
    $rs = array();
    foreach($rows as $row) {  
        $rs[] = $row; 
    }  
    $db = null;  
} catch (PDOException $e) {  
    print "Error!: " . $e->getMessage() . "<br/>";  
    die();  
}
// echo $rs;
print_r($rs);
echo "<br>";
print_r($rs[0][roomnumber]);
 ?> -->

 <?php 
            $dsn = "mysql:host=localhost;dbname=project";  
            $user = "root";  
            $pwd = "";  
            $pdo = new PDO($dsn, $user, $pwd);
            $select = "update room set roomnumber=4 where ID=1";  
            $pdo->exec($insert);
        ?>