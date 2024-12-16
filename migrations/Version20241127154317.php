<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127154317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt ADD id_etudiant_id INT NOT NULL, ADD id_exemplaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7E66B7B44 FOREIGN KEY (id_exemplaire_id) REFERENCES exemplaire (id)');
        $this->addSql('CREATE INDEX IDX_364071D7C5F87C54 ON emprunt (id_etudiant_id)');
        $this->addSql('CREATE INDEX IDX_364071D7E66B7B44 ON emprunt (id_exemplaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7C5F87C54');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7E66B7B44');
        $this->addSql('DROP INDEX IDX_364071D7C5F87C54 ON emprunt');
        $this->addSql('DROP INDEX IDX_364071D7E66B7B44 ON emprunt');
        $this->addSql('ALTER TABLE emprunt DROP id_etudiant_id, DROP id_exemplaire_id');
    }
}
