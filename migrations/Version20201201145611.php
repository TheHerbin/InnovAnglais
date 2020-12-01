<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201145611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_de_mots ADD mots_id INT NOT NULL');
        $this->addSql('ALTER TABLE liste_de_mots ADD CONSTRAINT FK_B94DD69D62771A8B FOREIGN KEY (mots_id) REFERENCES mot (id)');
        $this->addSql('CREATE INDEX IDX_B94DD69D62771A8B ON liste_de_mots (mots_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_de_mots DROP FOREIGN KEY FK_B94DD69D62771A8B');
        $this->addSql('DROP INDEX IDX_B94DD69D62771A8B ON liste_de_mots');
        $this->addSql('ALTER TABLE liste_de_mots DROP mots_id');
    }
}
