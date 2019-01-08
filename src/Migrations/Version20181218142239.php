<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181218142239 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE immo ADD titre VARCHAR(255) NOT NULL, ADD type VARCHAR(255) DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL, ADD prix INT DEFAULT NULL, ADD surface INT DEFAULT NULL, ADD surface_terrain INT DEFAULT NULL, ADD pays VARCHAR(255) DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD code_postal INT DEFAULT NULL, ADD vendu VARCHAR(255) DEFAULT NULL, ADD date DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE immo DROP titre, DROP type, DROP description, DROP prix, DROP surface, DROP surface_terrain, DROP pays, DROP ville, DROP code_postal, DROP vendu, DROP date');
    }
}
