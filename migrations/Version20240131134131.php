<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240131134131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE qcm (id INT AUTO_INCREMENT NOT NULL, id_ue_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_D7A1FEF48C6DC281 (id_ue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ue (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE qcm ADD CONSTRAINT FK_D7A1FEF48C6DC281 FOREIGN KEY (id_ue_id) REFERENCES ue (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE qcm DROP FOREIGN KEY FK_D7A1FEF48C6DC281');
        $this->addSql('DROP TABLE qcm');
        $this->addSql('DROP TABLE ue');
    }
}
