<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250930083651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0259F1BC6');
        $this->addSql('DROP INDEX IDX_8F91ABF0259F1BC6 ON avis');
        $this->addSql('ALTER TABLE avis CHANGE id_utilisateur_avis_id utilisateur_avis_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF06375870D FOREIGN KEY (utilisateur_avis_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF06375870D ON avis (utilisateur_avis_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF06375870D');
        $this->addSql('DROP INDEX IDX_8F91ABF06375870D ON avis');
        $this->addSql('ALTER TABLE avis CHANGE utilisateur_avis_id id_utilisateur_avis_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0259F1BC6 FOREIGN KEY (id_utilisateur_avis_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8F91ABF0259F1BC6 ON avis (id_utilisateur_avis_id)');
    }
}
