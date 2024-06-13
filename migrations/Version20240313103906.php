<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313103906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note_qcm (id INT AUTO_INCREMENT NOT NULL, id_util_id INT DEFAULT NULL, id_qcm_id INT DEFAULT NULL, note VARCHAR(255) NOT NULL, INDEX IDX_A752DE1411C087F0 (id_util_id), INDEX IDX_A752DE14D955F44B (id_qcm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qcm (id INT AUTO_INCREMENT NOT NULL, id_ue_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_D7A1FEF48C6DC281 (id_ue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, id_qcm_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_B6F7494ED955F44B (id_qcm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, id_question_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_5FB6DEC76353B48 (id_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trait_ue (id INT AUTO_INCREMENT NOT NULL, id_dep_id INT NOT NULL, id_arv_id INT NOT NULL, INDEX IDX_8D680EE0A77D1D81 (id_dep_id), INDEX IDX_8D680EE01B987C (id_arv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ue (id INT AUTO_INCREMENT NOT NULL, id_theme_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, x INT NOT NULL, y INT NOT NULL, INDEX IDX_2E490A9B9D99812 (id_theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_theme (utilisateur_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_51B0BFD6FB88E14F (utilisateur_id), INDEX IDX_51B0BFD659027487 (theme_id), PRIMARY KEY(utilisateur_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note_qcm ADD CONSTRAINT FK_A752DE1411C087F0 FOREIGN KEY (id_util_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE note_qcm ADD CONSTRAINT FK_A752DE14D955F44B FOREIGN KEY (id_qcm_id) REFERENCES qcm (id)');
        $this->addSql('ALTER TABLE qcm ADD CONSTRAINT FK_D7A1FEF48C6DC281 FOREIGN KEY (id_ue_id) REFERENCES ue (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ED955F44B FOREIGN KEY (id_qcm_id) REFERENCES qcm (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC76353B48 FOREIGN KEY (id_question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE trait_ue ADD CONSTRAINT FK_8D680EE0A77D1D81 FOREIGN KEY (id_dep_id) REFERENCES ue (id)');
        $this->addSql('ALTER TABLE trait_ue ADD CONSTRAINT FK_8D680EE01B987C FOREIGN KEY (id_arv_id) REFERENCES ue (id)');
        $this->addSql('ALTER TABLE ue ADD CONSTRAINT FK_2E490A9B9D99812 FOREIGN KEY (id_theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE utilisateur_theme ADD CONSTRAINT FK_51B0BFD6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_theme ADD CONSTRAINT FK_51B0BFD659027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note_qcm DROP FOREIGN KEY FK_A752DE1411C087F0');
        $this->addSql('ALTER TABLE note_qcm DROP FOREIGN KEY FK_A752DE14D955F44B');
        $this->addSql('ALTER TABLE qcm DROP FOREIGN KEY FK_D7A1FEF48C6DC281');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494ED955F44B');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC76353B48');
        $this->addSql('ALTER TABLE trait_ue DROP FOREIGN KEY FK_8D680EE0A77D1D81');
        $this->addSql('ALTER TABLE trait_ue DROP FOREIGN KEY FK_8D680EE01B987C');
        $this->addSql('ALTER TABLE ue DROP FOREIGN KEY FK_2E490A9B9D99812');
        $this->addSql('ALTER TABLE utilisateur_theme DROP FOREIGN KEY FK_51B0BFD6FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_theme DROP FOREIGN KEY FK_51B0BFD659027487');
        $this->addSql('DROP TABLE note_qcm');
        $this->addSql('DROP TABLE qcm');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE trait_ue');
        $this->addSql('DROP TABLE ue');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_theme');
    }
}