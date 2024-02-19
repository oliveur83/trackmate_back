<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240131145742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ue ADD id_theme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ue ADD CONSTRAINT FK_2E490A9B9D99812 FOREIGN KEY (id_theme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_2E490A9B9D99812 ON ue (id_theme_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ue DROP FOREIGN KEY FK_2E490A9B9D99812');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP INDEX IDX_2E490A9B9D99812 ON ue');
        $this->addSql('ALTER TABLE ue DROP id_theme_id');
    }
}
