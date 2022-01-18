<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220118153905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project_tag (project_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_91F26D60166D1F9C (project_id), INDEX IDX_91F26D60BAD26311 (tag_id), PRIMARY KEY(project_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_category (project_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_3B02921A166D1F9C (project_id), INDEX IDX_3B02921A12469DE2 (category_id), PRIMARY KEY(project_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user (user_id INT NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_domain (user_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_C2FB0536A76ED395 (user_id), INDEX IDX_C2FB0536115F0EE5 (domain_id), PRIMARY KEY(user_id, domain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_tag (user_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_E89FD608A76ED395 (user_id), INDEX IDX_E89FD608BAD26311 (tag_id), PRIMARY KEY(user_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_tag ADD CONSTRAINT FK_91F26D60166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_tag ADD CONSTRAINT FK_91F26D60BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_category ADD CONSTRAINT FK_3B02921A166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_category ADD CONSTRAINT FK_3B02921A12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_domain ADD CONSTRAINT FK_C2FB0536A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_domain ADD CONSTRAINT FK_C2FB0536115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_tag ADD CONSTRAINT FK_E89FD608A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_tag ADD CONSTRAINT FK_E89FD608BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE need_content ADD project_id INT NOT NULL, ADD need_id INT NOT NULL');
        $this->addSql('ALTER TABLE need_content ADD CONSTRAINT FK_42DB5222166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE need_content ADD CONSTRAINT FK_42DB5222624AF264 FOREIGN KEY (need_id) REFERENCES need (id)');
        $this->addSql('CREATE INDEX IDX_42DB5222166D1F9C ON need_content (project_id)');
        $this->addSql('CREATE INDEX IDX_42DB5222624AF264 ON need_content (need_id)');
        $this->addSql('ALTER TABLE social_link ADD user_id INT NOT NULL, ADD social_id INT NOT NULL');
        $this->addSql('ALTER TABLE social_link ADD CONSTRAINT FK_79BD4A95A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE social_link ADD CONSTRAINT FK_79BD4A95FFEB5B27 FOREIGN KEY (social_id) REFERENCES social (id)');
        $this->addSql('CREATE INDEX IDX_79BD4A95A76ED395 ON social_link (user_id)');
        $this->addSql('CREATE INDEX IDX_79BD4A95FFEB5B27 ON social_link (social_id)');
        $this->addSql('ALTER TABLE step ADD project_id INT NOT NULL');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_43B9FE3C166D1F9C ON step (project_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE project_tag');
        $this->addSql('DROP TABLE project_category');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('DROP TABLE user_domain');
        $this->addSql('DROP TABLE user_tag');
        $this->addSql('ALTER TABLE need_content DROP FOREIGN KEY FK_42DB5222166D1F9C');
        $this->addSql('ALTER TABLE need_content DROP FOREIGN KEY FK_42DB5222624AF264');
        $this->addSql('DROP INDEX IDX_42DB5222166D1F9C ON need_content');
        $this->addSql('DROP INDEX IDX_42DB5222624AF264 ON need_content');
        $this->addSql('ALTER TABLE need_content DROP project_id, DROP need_id');
        $this->addSql('ALTER TABLE social_link DROP FOREIGN KEY FK_79BD4A95A76ED395');
        $this->addSql('ALTER TABLE social_link DROP FOREIGN KEY FK_79BD4A95FFEB5B27');
        $this->addSql('DROP INDEX IDX_79BD4A95A76ED395 ON social_link');
        $this->addSql('DROP INDEX IDX_79BD4A95FFEB5B27 ON social_link');
        $this->addSql('ALTER TABLE social_link DROP user_id, DROP social_id');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C166D1F9C');
        $this->addSql('DROP INDEX IDX_43B9FE3C166D1F9C ON step');
        $this->addSql('ALTER TABLE step DROP project_id');
    }
}
