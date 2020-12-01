<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124124054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur_tests (utilisateur_id INT NOT NULL, tests_id INT NOT NULL, INDEX IDX_D4A5A480FB88E14F (utilisateur_id), INDEX IDX_D4A5A480F5D80971 (tests_id), PRIMARY KEY(utilisateur_id, tests_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_tests ADD CONSTRAINT FK_D4A5A480FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_tests ADD CONSTRAINT FK_D4A5A480F5D80971 FOREIGN KEY (tests_id) REFERENCES tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liste_de_mots ADD theme_id INT NOT NULL');
        $this->addSql('ALTER TABLE liste_de_mots ADD CONSTRAINT FK_B94DD69D59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_B94DD69D59027487 ON liste_de_mots (theme_id)');
        $this->addSql('ALTER TABLE tests ADD resultat_id INT NOT NULL');
        $this->addSql('ALTER TABLE tests ADD CONSTRAINT FK_1260FC5ED233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id)');
        $this->addSql('CREATE INDEX IDX_1260FC5ED233E95C ON tests (resultat_id)');
        $this->addSql('ALTER TABLE utilisateur ADD abonnement_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3F1D74413 ON utilisateur (abonnement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE utilisateur_tests');
        $this->addSql('ALTER TABLE liste_de_mots DROP FOREIGN KEY FK_B94DD69D59027487');
        $this->addSql('DROP INDEX IDX_B94DD69D59027487 ON liste_de_mots');
        $this->addSql('ALTER TABLE liste_de_mots DROP theme_id');
        $this->addSql('ALTER TABLE tests DROP FOREIGN KEY FK_1260FC5ED233E95C');
        $this->addSql('DROP INDEX IDX_1260FC5ED233E95C ON tests');
        $this->addSql('ALTER TABLE tests DROP resultat_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3F1D74413');
        $this->addSql('DROP INDEX IDX_1D1C63B3F1D74413 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP abonnement_id');
    }
}
