<?php

namespace migrations;

class m0001_initial {
    public function up() {
      $db= \core\Application::$app->db;
      $SQL = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL,
        firstName VARCHAR(255) NOT NULL,
        lastName VARCHAR(255) NOT NULL,
        status TINYINT NOT NULL DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      ) ENGINE=INNODB;";

      $db->pdo->exec($SQL);
    }

    public function down() {
      $db= \core\Application::$app->db;
      $SQL = "DROP TABLE users";
      $db->pdo->exec($SQL);
    }
}