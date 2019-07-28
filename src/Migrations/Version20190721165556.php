<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190721165556 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE viste (id INT AUTO_INCREMENT NOT NULL, moderechargement VARCHAR(255) NOT NULL, rattachement VARCHAR(255) NOT NULL, verificationid VARCHAR(255) NOT NULL, point VARCHAR(255) NOT NULL, bundle VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pos1 (id INT AUTO_INCREMENT NOT NULL, msisdn VARCHAR(255) DEFAULT NULL, dealer VARCHAR(255) NOT NULL, nomdealer VARCHAR(255) NOT NULL, cet VARCHAR(255) NOT NULL, nompos VARCHAR(255) NOT NULL, autrecontact VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, niveaustock VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, account VARCHAR(255) NOT NULL, profile VARCHAR(255) NOT NULL, localite VARCHAR(255) NOT NULL, possegntl VARCHAR(255) NOT NULL, possegreg VARCHAR(255) NOT NULL, rgm30 VARCHAR(255) NOT NULL, smartphone VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE isite (id INT AUTO_INCREMENT NOT NULL, logitude VARCHAR(255) NOT NULL, latitude VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE biographie CHANGE operations operations MEDIUMTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE viste');
        $this->addSql('DROP TABLE pos1');
        $this->addSql('DROP TABLE isite');
        $this->addSql('ALTER TABLE biographie CHANGE operations operations MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
