<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505083552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company ADD jurisdiction_id INT NOT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F8C52AF17 FOREIGN KEY (jurisdiction_id) REFERENCES jurisdiction (id)');
        $this->addSql('CREATE INDEX IDX_4FBF094F8C52AF17 ON company (jurisdiction_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F8C52AF17');
        $this->addSql('DROP INDEX IDX_4FBF094F8C52AF17 ON company');
        $this->addSql('ALTER TABLE company DROP jurisdiction_id');
    }
}
