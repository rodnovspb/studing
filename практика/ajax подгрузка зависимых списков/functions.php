<?php
if(isset($_GET['country'])){
    $countryId = $_GET['country'];
    unset($_GET['country']);
    getRegions($countryId);
}
if (isset($_GET['region'])){
    $regionId = $_GET['region'];
    unset($_GET['region']);
    getCities($regionId);
}
if(isset($_POST['submit']) && isset($_POST['city'])){
    global $link;
    $id = (int)$_POST['city'];
    $query = "SELECT city_name_ru FROM city_ WHERE id_city = $id";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $city = mysqli_fetch_assoc($res)['city_name_ru'];
}


function selectCountries(){
    global $link;
    $query = "SELECT * FROM country_";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $countries = [];
    while($row = mysqli_fetch_assoc($res)){
        $countries[] = $row;
    }
    return $countries;
}

function getRegions($id){
    global $link;
    $id = (int)$id;
    $query = "SELECT id_region, region_name_ru FROM region_ WHERE id_country = $id";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $regions = [];
    while($row = mysqli_fetch_assoc($res)){
        $regions[] = $row;
    }
    exit(json_encode($regions));
}

function getCities($id){
    global $link;
    $id = (int)$id;
    $query = "SELECT id_city, city_name_ru FROM city_ WHERE id_region = $id";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $cities = [];
    while($row = mysqli_fetch_assoc($res)){
        $cities[] = $row;
    }
    exit(json_encode($cities));
}

