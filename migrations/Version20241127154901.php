<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127154901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exemplaire ADD id_livre_id INT NOT NULL');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C926702C95E FOREIGN KEY (id_livre_id) REFERENCES livre (id)');
        $this->addSql('CREATE INDEX IDX_5EF83C926702C95E ON exemplaire (id_livre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C926702C95E');
        $this->addSql('DROP INDEX IDX_5EF83C926702C95E ON exemplaire');
        $this->addSql('ALTER TABLE exemplaire DROP id_livre_id');
    }
}
