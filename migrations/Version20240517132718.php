<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517132718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payement ADD payement_flight_id INT NOT NULL, ADD payement_hotel_id INT NOT NULL, ADD peyement_tour_id INT NOT NULL');
        $this->addSql('ALTER TABLE payement ADD CONSTRAINT FK_B20A7885B1153811 FOREIGN KEY (payement_flight_id) REFERENCES reservation_flight (id)');
        $this->addSql('ALTER TABLE payement ADD CONSTRAINT FK_B20A7885BC86DC6D FOREIGN KEY (payement_hotel_id) REFERENCES reservation_hotel (id)');
        $this->addSql('ALTER TABLE payement ADD CONSTRAINT FK_B20A7885E41964BD FOREIGN KEY (peyement_tour_id) REFERENCES reservation_tour (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B20A7885B1153811 ON payement (payement_flight_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B20A7885BC86DC6D ON payement (payement_hotel_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B20A7885E41964BD ON payement (peyement_tour_id)');
        $this->addSql('ALTER TABLE reservation_flight ADD flight_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_flight ADD CONSTRAINT FK_8AA6AF9591F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('CREATE INDEX IDX_8AA6AF9591F478C5 ON reservation_flight (flight_id)');
        $this->addSql('ALTER TABLE reservation_hotel ADD hotel_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT FK_402C8E7E3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('CREATE INDEX IDX_402C8E7E3243BB18 ON reservation_hotel (hotel_id)');
        $this->addSql('ALTER TABLE reservation_tour ADD tour_package_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_tour ADD CONSTRAINT FK_7CE834011290BD60 FOREIGN KEY (tour_package_id) REFERENCES tour_package (id)');
        $this->addSql('CREATE INDEX IDX_7CE834011290BD60 ON reservation_tour (tour_package_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payement DROP FOREIGN KEY FK_B20A7885B1153811');
        $this->addSql('ALTER TABLE payement DROP FOREIGN KEY FK_B20A7885BC86DC6D');
        $this->addSql('ALTER TABLE payement DROP FOREIGN KEY FK_B20A7885E41964BD');
        $this->addSql('DROP INDEX UNIQ_B20A7885B1153811 ON payement');
        $this->addSql('DROP INDEX UNIQ_B20A7885BC86DC6D ON payement');
        $this->addSql('DROP INDEX UNIQ_B20A7885E41964BD ON payement');
        $this->addSql('ALTER TABLE payement DROP payement_flight_id, DROP payement_hotel_id, DROP peyement_tour_id');
        $this->addSql('ALTER TABLE reservation_flight DROP FOREIGN KEY FK_8AA6AF9591F478C5');
        $this->addSql('DROP INDEX IDX_8AA6AF9591F478C5 ON reservation_flight');
        $this->addSql('ALTER TABLE reservation_flight DROP flight_id');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY FK_402C8E7E3243BB18');
        $this->addSql('DROP INDEX IDX_402C8E7E3243BB18 ON reservation_hotel');
        $this->addSql('ALTER TABLE reservation_hotel DROP hotel_id');
        $this->addSql('ALTER TABLE reservation_tour DROP FOREIGN KEY FK_7CE834011290BD60');
        $this->addSql('DROP INDEX IDX_7CE834011290BD60 ON reservation_tour');
        $this->addSql('ALTER TABLE reservation_tour DROP tour_package_id');
    }
}
