<?php
function dd($data)
{
    dump($data);
    die();
}

function dateFr($date): string
{
    $date = new DateTime($date);
    return $date->format('d-m-Y');
}

function asset(string $path)
{
    echo WEB_URL . "ressources/$path";
}

function dump($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function AssetJs(string $view)
{
    echo WEB_URL . "ressources/js/$view";
}
function AssetCss(string $view)
{
    echo WEB_URL . "ressources/CSS/$view";
}
function AssetImg(string $view)
{
    echo WEB_URL . "/image/$view";
}

function get_list_per_page(array $list, int $page, int $nbrElementPerPage)
{
    $totalElement = count($list);
    $nbrPage = get_nbrpage($list, $nbrElementPerPage);
    $iDepart = ($page - 1) * $nbrElementPerPage;
    $iArrive = ($totalElement - $nbrPage) + $nbrElementPerPage;
    $listPerPage = array();
    for ($i = $iDepart; $i < $iDepart + $nbrElementPerPage; $i++) {
        if ($i >= $totalElement) {
            return $listPerPage;
        } else {
            array_push($listPerPage, $list[$i]);
        }
    }

    return $listPerPage;
}

function get_nbrpage(array $list, int $nbrElementPerPage)
{
    $totalElement = count($list);
    return ceil($totalElement / $nbrElementPerPage);
}
