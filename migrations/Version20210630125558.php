<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210630125558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ip_blocked');
        $this->addSql('ALTER TABLE friends MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE friends DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE friends ADD friend_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE7069A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE70696A5458E8 FOREIGN KEY (friend_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_21EE7069A76ED395 ON friends (user_id)');
        $this->addSql('CREATE INDEX IDX_21EE70696A5458E8 ON friends (friend_id)');
        $this->addSql('ALTER TABLE friends ADD PRIMARY KEY (user_id, friend_id)');
        $this->addSql('ALTER TABLE login_attempt CHANGE date date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ip_blocked (id INT AUTO_INCREMENT NOT NULL, ip_address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, blocked_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE7069A76ED395');
        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE70696A5458E8');
        $this->addSql('DROP INDEX IDX_21EE7069A76ED395 ON friends');
        $this->addSql('DROP INDEX IDX_21EE70696A5458E8 ON friends');
        $this->addSql('ALTER TABLE friends ADD id INT AUTO_INCREMENT NOT NULL, DROP friend_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE login_attempt CHANGE date date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
