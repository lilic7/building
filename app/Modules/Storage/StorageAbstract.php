<?php
namespace App\Modules\Storage;


abstract class StorageAbstract
{
    abstract function getSettings();

    abstract function saveSettings($country, $currency);

    abstract function getProject();

    abstract function saveProject($projectId);

    abstract function updateProject($request, $countWorks);

    abstract function getWorkList();

    abstract function deleteProject();

    abstract function setWork($work_id);

    abstract function getBuildingPrice();

    abstract function getBuildingCategory();

    abstract function getBuildingType();

    abstract function removeAllWorks();

    abstract function getColorPrice();

    abstract function getMaterialPrice();

    abstract function getRatio();

    abstract function getWindowPrice();

    abstract function getDoorPrice();

    abstract function getColorName();

    abstract function getMaterialName();
}