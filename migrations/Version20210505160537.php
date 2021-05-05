<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505160537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historical_address ADD address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historical_address ADD CONSTRAINT FK_1B26DA3DF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_1B26DA3DF5B7AF75 ON historical_address (address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historical_address DROP FOREIGN KEY FK_1B26DA3DF5B7AF75');
        $this->addSql('DROP INDEX IDX_1B26DA3DF5B7AF75 ON historical_address');
        $this->addSql('ALTER TABLE historical_address DROP address_id');
    }
}
