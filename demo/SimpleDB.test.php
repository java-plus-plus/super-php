<pre>
<?php
require_once __DIR__ . "/../components/SimpleDB.php";
$db1 = new SimpleDB(
    // primary_db: "Ooi", // If not entered, then the default value will be taken from SimpleDBConfig.
    // username: "jishnu", // If not entered, then the default value will be taken from SimpleDBConfig.
    // password: "kdfskj", // If not entered, then the default value will be taken from SimpleDBConfig.
    // host: "Google", // If not entered, then the default value will be taken from SimpleDBConfig.
    debug: true, // If not entered, then the default value will be taken from SimpleDBConfig.
);
// var_export($db->current_connection);
$db2 = new SimpleDB(
    // primary_db: "Ooi", // If not entered, then the default value will be taken from SimpleDBConfig.
    // username: "jishnu", // If not entered, then the default value will be taken from SimpleDBConfig.
    // password: "kdfskj", // If not entered, then the default value will be taken from SimpleDBConfig.
    // host: "Google", // If not entered, then the default value will be taken from SimpleDBConfig.
    debug: true, // If not entered, then the default value will be taken from SimpleDBConfig.
);
// var_export($db->current_connection);
$db3 = new SimpleDB(
    // primary_db: "Ooi", // If not entered, then the default value will be taken from SimpleDBConfig.
    // username: "jishnu", // If not entered, then the default value will be taken from SimpleDBConfig.
    // password: "kdfskj", // If not entered, then the default value will be taken from SimpleDBConfig.
    // host: "Google", // If not entered, then the default value will be taken from SimpleDBConfig.
    debug: true, // If not entered, then the default value will be taken from SimpleDBConfig.
);
// var_export($db->current_connection);
$db4 = new SimpleDB(
    // primary_db: "Ooi", // If not entered, then the default value will be taken from SimpleDBConfig.
    // username: "jishnu", // If not entered, then the default value will be taken from SimpleDBConfig.
    // password: "kdfskj", // If not entered, then the default value will be taken from SimpleDBConfig.
    // host: "Google", // If not entered, then the default value will be taken from SimpleDBConfig.
    debug: true, // If not entered, then the default value will be taken from SimpleDBConfig.
);

$dbABC = new SimpleDB(
    primary_db: "secondary_database",
    username: "otherUser",
    password: "new pass"
);


// var_export($db->current_connection);
// $oneRow = $db->getOne("SELECT * FROM users");
// print_r($oneRow);
// $allRows = $db->getAll("SELECT * FROM users");
// print_r($allRows);
// $deleteResult = $db->run("DELETE FROM users WHERE id = ?", [2]);
// print_r($deleteResult);

?>
</pre>