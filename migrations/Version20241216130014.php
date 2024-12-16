<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241216130014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD id_etudiant_id INT DEFAULT NULL, ADD id_livre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556702C95E FOREIGN KEY (id_livre_id) REFERENCES livre (id)');
        $this->addSql('CREATE INDEX IDX_42C84955C5F87C54 ON reservation (id_etudiant_id)');
        $this->addSql('CREATE INDEX IDX_42C849556702C95E ON reservation (id_livre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955C5F87C54');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556702C95E');
        $this->addSql('DROP INDEX IDX_42C84955C5F87C54 ON reservation');
        $this->addSql('DROP INDEX IDX_42C849556702C95E ON reservation');
        $this->addSql('ALTER TABLE reservation DROP id_etudiant_id, DROP id_livre_id');
    }
}
