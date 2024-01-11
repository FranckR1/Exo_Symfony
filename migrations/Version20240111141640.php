<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240111141640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C1C3AC5D2');
        $this->addSql('DROP INDEX IDX_BE2DDF8C1C3AC5D2 ON produits');
        $this->addSql('ALTER TABLE produits CHANGE id_categories_id idCategories INT NOT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CB8075882 FOREIGN KEY (idCategories) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CB8075882 ON produits (idCategories)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CB8075882');
        $this->addSql('DROP INDEX IDX_BE2DDF8CB8075882 ON produits');
        $this->addSql('ALTER TABLE produits CHANGE idCategories id_categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C1C3AC5D2 FOREIGN KEY (id_categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C1C3AC5D2 ON produits (id_categories_id)');
    }
}
