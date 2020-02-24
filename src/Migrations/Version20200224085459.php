<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200224085459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, is_active, is_blocked, password, roles FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL COLLATE BINARY, is_active BOOLEAN NOT NULL, is_blocked BOOLEAN NOT NULL, password VARCHAR(255) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , email VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO user (id, username, is_active, is_blocked, password, roles) SELECT id, username, is_active, is_blocked, password, roles FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, is_active, is_blocked, password, roles FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, is_blocked BOOLEAN NOT NULL, password VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE BINARY, roles CLOB DEFAULT \'[]\' NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO user (id, username, is_active, is_blocked, password, roles) SELECT id, username, is_active, is_blocked, password, roles FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}