<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240624083014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrateur ADD id INT AUTO_INCREMENT NOT NULL, DROP id_user, DROP Mes_Travaux, DROP CV, DROP Lettre_De_Motivation, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE visiteur ADD id INT AUTO_INCREMENT NOT NULL, DROP id_user, DROP Nom_Prenom, DROP Telephone, DROP Email, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE administrateur MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON administrateur');
        $this->addSql('ALTER TABLE administrateur ADD id_user INT NOT NULL, ADD Mes_Travaux INT NOT NULL, ADD CV INT NOT NULL, ADD Lettre_De_Motivation INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE administrateur ADD PRIMARY KEY (id_user)');
        $this->addSql('ALTER TABLE visiteur MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON visiteur');
        $this->addSql('ALTER TABLE visiteur ADD id_user INT NOT NULL, ADD Nom_Prenom INT NOT NULL, ADD Telephone INT NOT NULL, ADD Email INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE visiteur ADD PRIMARY KEY (id_user)');
    }
}
