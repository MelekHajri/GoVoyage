<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517133348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_flight ADD client_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_flight ADD CONSTRAINT FK_8AA6AF95DC2902E0 FOREIGN KEY (client_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8AA6AF95DC2902E0 ON reservation_flight (client_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_flight DROP FOREIGN KEY FK_8AA6AF95DC2902E0');
        $this->addSql('DROP INDEX IDX_8AA6AF95DC2902E0 ON reservation_flight');
        $this->addSql('ALTER TABLE reservation_flight DROP client_id_id');
    }
}
