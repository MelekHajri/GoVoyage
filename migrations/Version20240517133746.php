<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517133746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_tour ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_tour ADD CONSTRAINT FK_7CE8340119EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7CE8340119EB6921 ON reservation_tour (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_tour DROP FOREIGN KEY FK_7CE8340119EB6921');
        $this->addSql('DROP INDEX IDX_7CE8340119EB6921 ON reservation_tour');
        $this->addSql('ALTER TABLE reservation_tour DROP client_id');
    }
}
