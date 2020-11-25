<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201125183527 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE icone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE icone (id INT NOT NULL, classe VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE formation ALTER description TYPE TEXT');
        $this->addSql('ALTER TABLE formation ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE loisir ALTER description TYPE TEXT');
        $this->addSql('ALTER TABLE loisir ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE projet ALTER description TYPE TEXT');
        $this->addSql('ALTER TABLE projet ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE qualite DROP CONSTRAINT fk_68b3575f3da5256d');
        $this->addSql('DROP INDEX uniq_68b3575f3da5256d');
        $this->addSql('ALTER TABLE qualite ADD icone_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE qualite DROP image_id');
        $this->addSql('ALTER TABLE qualite ALTER description TYPE TEXT');
        $this->addSql('ALTER TABLE qualite ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE qualite ADD CONSTRAINT FK_68B3575F5A805D31 FOREIGN KEY (icone_id) REFERENCES icone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_68B3575F5A805D31 ON qualite (icone_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE qualite DROP CONSTRAINT FK_68B3575F5A805D31');
        $this->addSql('DROP SEQUENCE icone_id_seq CASCADE');
        $this->addSql('DROP TABLE icone');
        $this->addSql('ALTER TABLE formation ALTER description TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE formation ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE loisir ALTER description TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE loisir ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE projet ALTER description TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE projet ALTER description DROP DEFAULT');
        $this->addSql('DROP INDEX UNIQ_68B3575F5A805D31');
        $this->addSql('ALTER TABLE qualite ADD image_id INT NOT NULL');
        $this->addSql('ALTER TABLE qualite DROP icone_id');
        $this->addSql('ALTER TABLE qualite ALTER description TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE qualite ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE qualite ADD CONSTRAINT fk_68b3575f3da5256d FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_68b3575f3da5256d ON qualite (image_id)');
    }
}
