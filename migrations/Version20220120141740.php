<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220120141740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80A76ED395');
        $this->addSql('ALTER TABLE user_user DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user_user ADD user_target INT NOT NULL, CHANGE user_id user_source INT NOT NULL');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A803AD8644E FOREIGN KEY (user_source) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80233D34C1 FOREIGN KEY (user_target) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_F7129A803AD8644E ON user_user (user_source)');
        $this->addSql('CREATE INDEX IDX_F7129A80233D34C1 ON user_user (user_target)');
        $this->addSql('ALTER TABLE user_user ADD PRIMARY KEY (user_source, user_target)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP is_verified');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A803AD8644E');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80233D34C1');
        $this->addSql('DROP INDEX IDX_F7129A803AD8644E ON user_user');
        $this->addSql('DROP INDEX IDX_F7129A80233D34C1 ON user_user');
        $this->addSql('ALTER TABLE user_user DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user_user ADD user_id INT NOT NULL, DROP user_source, DROP user_target');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD PRIMARY KEY (user_id)');
    }
}
