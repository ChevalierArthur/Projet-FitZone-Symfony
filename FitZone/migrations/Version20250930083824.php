<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250930083824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6387BA20EEA');
        $this->addSql('DROP INDEX IDX_4C62E6387BA20EEA ON contact');
        $this->addSql('ALTER TABLE contact CHANGE idutilisateurcontact_id utilisateur_contact_id INT NOT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638D519E75C FOREIGN KEY (utilisateur_contact_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638D519E75C ON contact (utilisateur_contact_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638D519E75C');
        $this->addSql('DROP INDEX IDX_4C62E638D519E75C ON contact');
        $this->addSql('ALTER TABLE contact CHANGE utilisateur_contact_id idutilisateurcontact_id INT NOT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6387BA20EEA FOREIGN KEY (idutilisateurcontact_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4C62E6387BA20EEA ON contact (idutilisateurcontact_id)');
    }
}
