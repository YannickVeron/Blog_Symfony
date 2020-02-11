<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200211144049 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql("ALTER TABLE user ADD COLUMN password VARCHAR(255) NOT NULL DEFAULT ''");
        $this->addSql("ALTER TABLE user ADD COLUMN roles CLOB NOT NULL DEFAULT '[]'");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, is_active, is_blocked FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, is_blocked BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO user (id, username, is_active, is_blocked) SELECT id, username, is_active, is_blocked FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
