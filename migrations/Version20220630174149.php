<?php
declare(strict_types=1);
namespace DoctrineMigrations;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200707174149 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `entreprise` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `villeimm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `capitale` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numsiren` int COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `dateimm` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `adress` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `entr_id` bigint(20) NOT NULL,
  `author` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adress_entr_id_idx` (`entr_id`),
  CONSTRAINT `entr_id` FOREIGN KEY (`entr_id`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;');
    }
    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}