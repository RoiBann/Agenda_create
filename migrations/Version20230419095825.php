<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419095825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact_details ADD contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact_details ADD CONSTRAINT FK_E8092A0BE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('CREATE INDEX IDX_E8092A0BE7A1254A ON contact_details (contact_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact_details DROP FOREIGN KEY FK_E8092A0BE7A1254A');
        $this->addSql('DROP INDEX IDX_E8092A0BE7A1254A ON contact_details');
        $this->addSql('ALTER TABLE contact_details DROP contact_id');
    }
}
