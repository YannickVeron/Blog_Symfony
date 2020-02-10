<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210090020 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, content CLOB NOT NULL, created_at DATETIME NOT NULL, is_deleted BOOLEAN NOT NULL, author_id INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, is_blocked BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, content CLOB NOT NULL, created_at DATETIME NOT NULL, is_deleted BOOLEAN NOT NULL, author_id INTEGER NOT NULL, post_id INTEGER NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE comment');
    }
}
