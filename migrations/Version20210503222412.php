<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503222412 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA98702F506');
        $this->addSql('DROP INDEX IDX_64C19AA98702F506 ON agence');
        $this->addSql('ALTER TABLE agence DROP cars_id');
        $this->addSql('ALTER TABLE cars ADD id_agence_id INT DEFAULT NULL, ADD disponibilite VARCHAR(255) NOT NULL, ADD datemiseencirculation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1457108F2A FOREIGN KEY (id_agence_id) REFERENCES agence (id)');
        $this->addSql('CREATE INDEX IDX_95C71D1457108F2A ON cars (id_agence_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE agence ADD cars_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA98702F506 FOREIGN KEY (cars_id) REFERENCES cars (id)');
        $this->addSql('CREATE INDEX IDX_64C19AA98702F506 ON agence (cars_id)');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1457108F2A');
        $this->addSql('DROP INDEX IDX_95C71D1457108F2A ON cars');
        $this->addSql('ALTER TABLE cars DROP id_agence_id, DROP disponibilite, DROP datemiseencirculation');
    }
}
