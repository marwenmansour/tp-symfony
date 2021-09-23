<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923131123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prof ADD classe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prof ADD CONSTRAINT FK_5BBA70BB8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5BBA70BB8F5EA509 ON prof (classe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prof DROP FOREIGN KEY FK_5BBA70BB8F5EA509');
        $this->addSql('DROP INDEX UNIQ_5BBA70BB8F5EA509 ON prof');
        $this->addSql('ALTER TABLE prof DROP classe_id');
    }
}
