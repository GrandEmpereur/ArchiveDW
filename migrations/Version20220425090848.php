<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425090848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, img LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, link LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaries (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, project_id INT NOT NULL, comment LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, active TINYINT(1) NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, rgpd TINYINT(1) NOT NULL, INDEX IDX_4ED55CCB727ACA70 (parent_id), INDEX IDX_4ED55CCB166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, img LONGTEXT NOT NULL, description LONGTEXT NOT NULL, technos LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', url_type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) DEFAULT NULL, grade INT DEFAULT NULL, git LONGTEXT NOT NULL, is_asso TINYINT(1) NOT NULL, logo LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaries ADD CONSTRAINT FK_4ED55CCB727ACA70 FOREIGN KEY (parent_id) REFERENCES commentaries (id)');
        $this->addSql('ALTER TABLE commentaries ADD CONSTRAINT FK_4ED55CCB166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaries DROP FOREIGN KEY FK_4ED55CCB727ACA70');
        $this->addSql('ALTER TABLE commentaries DROP FOREIGN KEY FK_4ED55CCB166D1F9C');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE commentaries');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE user');
    }
}
