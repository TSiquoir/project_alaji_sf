<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200217140102 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92A76ED395');
        $this->addSql('DROP INDEX IDX_A412FA92A76ED395 ON quiz');
        $this->addSql('ALTER TABLE quiz CHANGE user_id trainer_id INT NOT NULL');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A412FA92FB08EDF6 ON quiz (trainer_id)');
        $this->addSql('ALTER TABLE student DROP suspended');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92FB08EDF6');
        $this->addSql('DROP INDEX IDX_A412FA92FB08EDF6 ON quiz');
        $this->addSql('ALTER TABLE quiz CHANGE trainer_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A412FA92A76ED395 ON quiz (user_id)');
        $this->addSql('ALTER TABLE student ADD suspended TINYINT(1) NOT NULL');
    }
}
