<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201125174424 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE formation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loisir_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE personne_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE projet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE qualite_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE technologie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE formation (id INT NOT NULL, image_id INT NOT NULL, date_debut VARCHAR(255) NOT NULL, date_fin VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_404021BF3DA5256D ON formation (image_id)');
        $this->addSql('CREATE TABLE image (id INT NOT NULL, fichier VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE loisir (id INT NOT NULL, image_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CF3B20603DA5256D ON loisir (image_id)');
        $this->addSql('CREATE TABLE personne (id INT NOT NULL, image_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, personne VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FCEC9EF3DA5256D ON personne (image_id)');
        $this->addSql('CREATE TABLE projet (id INT NOT NULL, couverture_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50159CA93F0A9AF5 ON projet (couverture_id)');
        $this->addSql('CREATE TABLE projet_image (projet_id INT NOT NULL, image_id INT NOT NULL, PRIMARY KEY(projet_id, image_id))');
        $this->addSql('CREATE INDEX IDX_6E9BEBE9C18272 ON projet_image (projet_id)');
        $this->addSql('CREATE INDEX IDX_6E9BEBE93DA5256D ON projet_image (image_id)');
        $this->addSql('CREATE TABLE projet_technologie (projet_id INT NOT NULL, technologie_id INT NOT NULL, PRIMARY KEY(projet_id, technologie_id))');
        $this->addSql('CREATE INDEX IDX_76BB624AC18272 ON projet_technologie (projet_id)');
        $this->addSql('CREATE INDEX IDX_76BB624A261A27D2 ON projet_technologie (technologie_id)');
        $this->addSql('CREATE TABLE projet_personne (projet_id INT NOT NULL, personne_id INT NOT NULL, PRIMARY KEY(projet_id, personne_id))');
        $this->addSql('CREATE INDEX IDX_284EA218C18272 ON projet_personne (projet_id)');
        $this->addSql('CREATE INDEX IDX_284EA218A21BD112 ON projet_personne (personne_id)');
        $this->addSql('CREATE TABLE qualite (id INT NOT NULL, image_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_68B3575F3DA5256D ON qualite (image_id)');
        $this->addSql('CREATE TABLE technologie (id INT NOT NULL, image_id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AD8136743DA5256D ON technologie (image_id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loisir ADD CONSTRAINT FK_CF3B20603DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EF3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA93F0A9AF5 FOREIGN KEY (couverture_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_image ADD CONSTRAINT FK_6E9BEBE9C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_image ADD CONSTRAINT FK_6E9BEBE93DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_technologie ADD CONSTRAINT FK_76BB624AC18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_technologie ADD CONSTRAINT FK_76BB624A261A27D2 FOREIGN KEY (technologie_id) REFERENCES technologie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_personne ADD CONSTRAINT FK_284EA218C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_personne ADD CONSTRAINT FK_284EA218A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE qualite ADD CONSTRAINT FK_68B3575F3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE technologie ADD CONSTRAINT FK_AD8136743DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE formation DROP CONSTRAINT FK_404021BF3DA5256D');
        $this->addSql('ALTER TABLE loisir DROP CONSTRAINT FK_CF3B20603DA5256D');
        $this->addSql('ALTER TABLE personne DROP CONSTRAINT FK_FCEC9EF3DA5256D');
        $this->addSql('ALTER TABLE projet DROP CONSTRAINT FK_50159CA93F0A9AF5');
        $this->addSql('ALTER TABLE projet_image DROP CONSTRAINT FK_6E9BEBE93DA5256D');
        $this->addSql('ALTER TABLE qualite DROP CONSTRAINT FK_68B3575F3DA5256D');
        $this->addSql('ALTER TABLE technologie DROP CONSTRAINT FK_AD8136743DA5256D');
        $this->addSql('ALTER TABLE projet_personne DROP CONSTRAINT FK_284EA218A21BD112');
        $this->addSql('ALTER TABLE projet_image DROP CONSTRAINT FK_6E9BEBE9C18272');
        $this->addSql('ALTER TABLE projet_technologie DROP CONSTRAINT FK_76BB624AC18272');
        $this->addSql('ALTER TABLE projet_personne DROP CONSTRAINT FK_284EA218C18272');
        $this->addSql('ALTER TABLE projet_technologie DROP CONSTRAINT FK_76BB624A261A27D2');
        $this->addSql('DROP SEQUENCE formation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE image_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE loisir_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE personne_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE projet_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE qualite_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE technologie_id_seq CASCADE');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE loisir');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE projet_image');
        $this->addSql('DROP TABLE projet_technologie');
        $this->addSql('DROP TABLE projet_personne');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('DROP TABLE technologie');
    }
}
