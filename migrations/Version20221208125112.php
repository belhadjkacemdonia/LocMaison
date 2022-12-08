<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208125112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maison ADD modele_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66DAC14B70A FOREIGN KEY (modele_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_F90CB66DAC14B70A ON maison (modele_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maison DROP FOREIGN KEY FK_F90CB66DAC14B70A');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP INDEX IDX_F90CB66DAC14B70A ON maison');
        $this->addSql('ALTER TABLE maison DROP modele_id');
    }
}
