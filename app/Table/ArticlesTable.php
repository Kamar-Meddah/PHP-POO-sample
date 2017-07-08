<?php
namespace med\app\Table;
use med\core\table\Table;

class ArticlesTable extends Table
{
    public function last($arg=[])
    {
        extract($arg);
        return $this->query("
        SELECT
        articles.id,articles.titre,articles.contenu,categories.titre as categorie
        FROM
        articles LEFT JOIN categories
        ON articles.category_id=categories.id
        ORDER BY articles.date DESC
        LIMIT $arg1,$arg2");
    }
    
    public function all($arg=[])
    {
        extract($arg);
        return $this->query("
        SELECT
        articles.id,articles.titre,articles.contenu,articles.category_id,categories.titre as categorie
        FROM
        articles LEFT JOIN categories
        ON articles.category_id=categories.id
        ORDER BY articles.titre ASC
        LIMIT $arg1,$arg2
        ");
    }

    public function search($index,$arg=[])
    {
        extract($arg);
        return $this->query("
        SELECT
        articles.id,articles.titre,articles.contenu,categories.titre as categorie
        FROM
        articles LEFT JOIN categories
        ON articles.category_id=categories.id
        WhERE
        articles.titre LIKE ?
        ORDER BY articles.date DESC
        LIMIT $arg1,$arg2",
        ['%'.$index.'%']);
    }

    public function countsearch($index)
    {
        return $this->query("
        SELECT
        COUNT(id) as total
        FROM
        articles
        WHERE
        titre LIKE ?",
        ['%'.$index.'%'],true);
    }

    public function lastByCategorie($category_id,$arg=[])
    {
      extract($arg);
      return $this->query("
      SELECT
      articles.id,articles.titre,articles.contenu,categories.titre as categorie
      FROM
      articles LEFT JOIN categories
      ON category_id=categories.id
      WHERE
      category_id=?
      ORDER BY articles.date DESC
      LIMIT $arg1,$arg2"
      ,[$category_id]);
    }

    public function find($id,$one=true)
    {
      return $this->query('
      select
      articles.id,articles.titre,articles.contenu,categories.titre as categorie,articles.category_id
      FROM
      articles LEFT JOIN categories
      ON articles.category_id=categories.id
      WHERE
      articles.id=?'
      ,[$id],$one);
    }

    public function deletekey($id)
    {
        return $this->query('DELETE FROM '.$this->table.' WHERE category_id=? ',[$id]);
    }

    public function countByCategorie($id)
    {
      return $this->query('
      SELECT COUNT(id) AS total FROM '.$this->table.' where category_id=? ',[$id],true);
    }

}