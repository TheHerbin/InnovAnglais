<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110150344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, posologie VARCHAR(30) NOT NULL, modalitesdepaiement VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_de_mots (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_de_mots_mot (liste_de_mots_id INT NOT NULL, mot_id INT NOT NULL, INDEX IDX_766C104D4C85B19E (liste_de_mots_id), INDEX IDX_766C104D63977652 (mot_id), PRIMARY KEY(liste_de_mots_id, mot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mot (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, code INT NOT NULL, categorie VARCHAR(35) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, resultatstest VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, entreprise VARCHAR(100) DEFAULT NULL, adresse VARCHAR(125) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liste_de_mots_mot ADD CONSTRAINT FK_766C104D4C85B19E FOREIGN KEY (liste_de_mots_id) REFERENCES liste_de_mots (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liste_de_mots_mot ADD CONSTRAINT FK_766C104D63977652 FOREIGN KEY (mot_id) REFERENCES mot (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_de_mots_mot DROP FOREIGN KEY FK_766C104D4C85B19E');
        $this->addSql('ALTER TABLE liste_de_mots_mot DROP FOREIGN KEY FK_766C104D63977652');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE liste_de_mots');
        $this->addSql('DROP TABLE liste_de_mots_mot');
        $this->addSql('DROP TABLE mot');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE utilisateur');
    }
}
