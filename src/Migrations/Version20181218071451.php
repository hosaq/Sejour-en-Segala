<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181218071451 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE immo DROP type, DROP titre, DROP description, DROP prix, DROP ville, DROP code_postal, DROP vendu, DROP date');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE immo ADD type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD titre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD description LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD prix INT DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD code_postal VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD vendu VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD date DATETIME NOT NULL');
    }
}
