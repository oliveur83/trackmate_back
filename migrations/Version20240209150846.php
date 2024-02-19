<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209150846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur_theme (utilisateur_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_51B0BFD6FB88E14F (utilisateur_id), INDEX IDX_51B0BFD659027487 (theme_id), PRIMARY KEY(utilisateur_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_theme ADD CONSTRAINT FK_51B0BFD6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_theme ADD CONSTRAINT FK_51B0BFD659027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur_theme DROP FOREIGN KEY FK_51B0BFD6FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_theme DROP FOREIGN KEY FK_51B0BFD659027487');
        $this->addSql('DROP TABLE utilisateur_theme');
    }
}
