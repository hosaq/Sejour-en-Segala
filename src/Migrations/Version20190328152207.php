<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190328152207 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE immo_interets (immo_id INT NOT NULL, interets_id INT NOT NULL, INDEX IDX_FE9137DDACCF8247 (immo_id), INDEX IDX_FE9137DD75621B20 (interets_id), PRIMARY KEY(immo_id, interets_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE immo_interets ADD CONSTRAINT FK_FE9137DDACCF8247 FOREIGN KEY (immo_id) REFERENCES immo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE immo_interets ADD CONSTRAINT FK_FE9137DD75621B20 FOREIGN KEY (interets_id) REFERENCES interets (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE immo_interets');
    }
}
