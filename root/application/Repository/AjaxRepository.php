<?php


class AjaxRepository extends DatabaseService
{
    public function fetchCountry($term)
    {
        $q = $this->getConnection()->prepare("SELECT id, country_name_ru as text FROM country WHERE country_name_ru LIKE :term ");
        $q->bindValue('term', $term.'%');
        $q->execute();

        return $q->fetchAll();
    }

    public function fetchRegion($term, $countryId)
    {
        $q = $this->getConnection()->prepare("SELECT id, region_name_ru as text FROM region WHERE (id_country=:country) AND (region_name_ru LIKE :term)");
        $q->bindValue('term', $term.'%');
        $q->bindValue('country', $countryId);
        $q->execute();

        return $q->fetchAll();
    }

    public function fetchCity($term, $regionId)
    {
        $q = $this->getConnection()->prepare("SELECT id, city_name_ru as text FROM city WHERE (id_region=:region) AND (city_name_ru LIKE :term)");
        $q->bindValue('term', $term.'%');
        $q->bindValue('region', $regionId);
        $q->execute();

        return $q->fetchAll();
    }

}
