<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241216130942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historique_emprunt ADD id_emprunt_id INT DEFAULT NULL, ADD id_personnel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique_emprunt ADD CONSTRAINT FK_54542EA8BF56F43 FOREIGN KEY (id_emprunt_id) REFERENCES emprunt (id)');
        $this->addSql('ALTER TABLE historique_emprunt ADD CONSTRAINT FK_54542EA83FD1E507 FOREIGN KEY (id_personnel_id) REFERENCES personnel (id)');
        $this->addSql('CREATE INDEX IDX_54542EA8BF56F43 ON historique_emprunt (id_emprunt_id)');
        $this->addSql('CREATE INDEX IDX_54542EA83FD1E507 ON historique_emprunt (id_personnel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historique_emprunt DROP FOREIGN KEY FK_54542EA8BF56F43');
        $this->addSql('ALTER TABLE historique_emprunt DROP FOREIGN KEY FK_54542EA83FD1E507');
        $this->addSql('DROP INDEX IDX_54542EA8BF56F43 ON historique_emprunt');
        $this->addSql('DROP INDEX IDX_54542EA83FD1E507 ON historique_emprunt');
        $this->addSql('ALTER TABLE historique_emprunt DROP id_emprunt_id, DROP id_personnel_id');
    }
}
