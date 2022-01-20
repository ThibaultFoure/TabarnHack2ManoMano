<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220120125529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail_product (id INT AUTO_INCREMENT NOT NULL, style_id INT DEFAULT NULL, product_id INT DEFAULT NULL, quantity INT NOT NULL, cheap_product VARCHAR(255) NOT NULL, average_product VARCHAR(255) NOT NULL, expensive_product VARCHAR(255) NOT NULL, INDEX IDX_B4858478BACD6074 (style_id), INDEX IDX_B48584784584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detail_product ADD CONSTRAINT FK_B4858478BACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE detail_product ADD CONSTRAINT FK_B48584784584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE detail_product');
    }
}
