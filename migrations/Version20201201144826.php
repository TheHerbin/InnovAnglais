<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201144826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE liste_de_mots_mot');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE liste_de_mots_mot (liste_de_mots_id INT NOT NULL, mot_id INT NOT NULL, INDEX IDX_766C104D4C85B19E (liste_de_mots_id), INDEX IDX_766C104D63977652 (mot_id), PRIMARY KEY(liste_de_mots_id, mot_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE liste_de_mots_mot ADD CONSTRAINT FK_766C104D4C85B19E FOREIGN KEY (liste_de_mots_id) REFERENCES liste_de_mots (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liste_de_mots_mot ADD CONSTRAINT FK_766C104D63977652 FOREIGN KEY (mot_id) REFERENCES mot (id) ON DELETE CASCADE');
    }
}
