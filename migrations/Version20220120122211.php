<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220120122211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE style DROP FOREIGN KEY FK_33BDB86A71179CD6');
        $this->addSql('DROP INDEX IDX_33BDB86A71179CD6 ON style');
        $this->addSql('ALTER TABLE style ADD name VARCHAR(255) NOT NULL, CHANGE name_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE style ADD CONSTRAINT FK_33BDB86ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_33BDB86ABCF5E72D ON style (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE style DROP FOREIGN KEY FK_33BDB86ABCF5E72D');
        $this->addSql('DROP INDEX IDX_33BDB86ABCF5E72D ON style');
        $this->addSql('ALTER TABLE style DROP name, CHANGE categorie_id name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE style ADD CONSTRAINT FK_33BDB86A71179CD6 FOREIGN KEY (name_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_33BDB86A71179CD6 ON style (name_id)');
    }
}
