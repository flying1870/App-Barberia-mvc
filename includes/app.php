<?php

use Dotenv\Dotenv;
use Model\ActiveRecord;

require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Import helper functions and database configuration
require 'funciones.php';
require 'database.php';

// Check if the database connection is set correctly
if (!$db) {
    die("Error: Unable to connect to the database.");
}

// Connect ActiveRecord to the database
ActiveRecord::setDB($db);

