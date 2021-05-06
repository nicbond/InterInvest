<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505110058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historical_company ADD company_id INT DEFAULT NULL, CHANGE date_registration created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE historical_company ADD CONSTRAINT FK_59D7BCF3979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_59D7BCF3979B1AD6 ON historical_company (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historical_company DROP FOREIGN KEY FK_59D7BCF3979B1AD6');
        $this->addSql('DROP INDEX IDX_59D7BCF3979B1AD6 ON historical_company');
        $this->addSql('ALTER TABLE historical_company DROP company_id, CHANGE created_at date_registration DATETIME NOT NULL');
    }
}
