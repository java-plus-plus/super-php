<?php
abstract class SimpleDBConfig {

    /**
     * Primary/Default database
     * 
     * @var string $primary_db
     */
    protected string $primary_db = "test_db";

    /**
     * Database user username
     * 
     * @var string $username username
     */
    protected string $username = "root";

    /**
     * Database user password
     * 
     * @var string $password Password
     */
    protected string $password = "";

    /**
     * Database server host
     *
     * @var string
     */
    protected string $host = 'localhost';

    /**
     * Debug type (is debug?)
     *
     * @var bool
     */
    protected bool $debug = false;
}
