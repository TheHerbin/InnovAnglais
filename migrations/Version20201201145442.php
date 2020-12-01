<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201145442 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mot DROP FOREIGN KEY FK_A43432C2531E22F');
        $this->addSql('DROP INDEX IDX_A43432C2531E22F ON mot');
        $this->addSql('ALTER TABLE mot DROP liste_de_mot_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mot ADD liste_de_mot_id INT NOT NULL');
        $this->addSql('ALTER TABLE mot ADD CONSTRAINT FK_A43432C2531E22F FOREIGN KEY (liste_de_mot_id) REFERENCES liste_de_mots (id)');
        $this->addSql('CREATE INDEX IDX_A43432C2531E22F ON mot (liste_de_mot_id)');
    }
}
