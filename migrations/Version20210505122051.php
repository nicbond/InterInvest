<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505122051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historical_company ADD jurisdiction_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historical_company ADD CONSTRAINT FK_59D7BCF38C52AF17 FOREIGN KEY (jurisdiction_id) REFERENCES jurisdiction (id)');
        $this->addSql('CREATE INDEX IDX_59D7BCF38C52AF17 ON historical_company (jurisdiction_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historical_company DROP FOREIGN KEY FK_59D7BCF38C52AF17');
        $this->addSql('DROP INDEX IDX_59D7BCF38C52AF17 ON historical_company');
        $this->addSql('ALTER TABLE historical_company DROP jurisdiction_id');
    }
}
