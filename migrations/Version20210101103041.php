<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210101103041 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE demande_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE demande (id INT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, objectif TEXT NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(15) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE formation ALTER lieu SET NOT NULL');
        $this->addSql('ALTER TABLE formation ALTER nom SET NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE demande_id_seq CASCADE');
        $this->addSql('DROP TABLE demande');
        $this->addSql('ALTER TABLE formation ALTER lieu DROP NOT NULL');
        $this->addSql('ALTER TABLE formation ALTER nom DROP NOT NULL');
    }
}
