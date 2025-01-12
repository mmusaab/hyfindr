<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240902170908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bitbag_banners (id INT AUTO_INCREMENT NOT NULL, locale_id INT DEFAULT NULL, section_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, alt VARCHAR(255) DEFAULT NULL, filename VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, priority INT NOT NULL, clicks INT DEFAULT 0 NOT NULL, UNIQUE INDEX UNIQ_28D8EFD8B548B0F (path), INDEX IDX_28D8EFD8E559DFD1 (locale_id), INDEX IDX_28D8EFD8D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bitbag_banners_ads (banner_id INT NOT NULL, ad_id INT NOT NULL, INDEX IDX_EA80EDC684EC833 (banner_id), INDEX IDX_EA80EDC4F34D596 (ad_id), PRIMARY KEY(banner_id, ad_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bitbag_banners_ad (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, startAt DATETIME NOT NULL, endAt DATETIME NOT NULL, priority INT NOT NULL, code VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7CEC9E5D5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bitbag_banners_section (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, width INT DEFAULT NULL, height INT DEFAULT NULL, UNIQUE INDEX UNIQ_76F7DA425E237E06 (name), UNIQUE INDEX UNIQ_76F7DA4277153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bitbag_banners ADD CONSTRAINT FK_28D8EFD8E559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id)');
        $this->addSql('ALTER TABLE bitbag_banners ADD CONSTRAINT FK_28D8EFD8D823E37A FOREIGN KEY (section_id) REFERENCES bitbag_banners_section (id)');
        $this->addSql('ALTER TABLE bitbag_banners_ads ADD CONSTRAINT FK_EA80EDC684EC833 FOREIGN KEY (banner_id) REFERENCES bitbag_banners (id)');
        $this->addSql('ALTER TABLE bitbag_banners_ads ADD CONSTRAINT FK_EA80EDC4F34D596 FOREIGN KEY (ad_id) REFERENCES bitbag_banners_ad (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bitbag_banners DROP FOREIGN KEY FK_28D8EFD8E559DFD1');
        $this->addSql('ALTER TABLE bitbag_banners DROP FOREIGN KEY FK_28D8EFD8D823E37A');
        $this->addSql('ALTER TABLE bitbag_banners_ads DROP FOREIGN KEY FK_EA80EDC684EC833');
        $this->addSql('ALTER TABLE bitbag_banners_ads DROP FOREIGN KEY FK_EA80EDC4F34D596');
        $this->addSql('DROP TABLE bitbag_banners');
        $this->addSql('DROP TABLE bitbag_banners_ads');
        $this->addSql('DROP TABLE bitbag_banners_ad');
        $this->addSql('DROP TABLE bitbag_banners_section');
    }
}
