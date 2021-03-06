<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923125508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere ADD prof_id INT NOT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574AABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9014574AABC1F7FE ON matiere (prof_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574AABC1F7FE');
        $this->addSql('DROP INDEX UNIQ_9014574AABC1F7FE ON matiere');
        $this->addSql('ALTER TABLE matiere DROP prof_id');
    }
}
