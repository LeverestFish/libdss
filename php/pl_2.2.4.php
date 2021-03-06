<?php
error_reporting(0);
require_once '../php/DB.php';

$myDB = new DB();
$conn = $myDB->connection();

//出版年份分布
$sqlPub = "SELECT YEAR(pubdate) as years,count(YEAR(pubdate)) as pubNum FROM books GROUP by YEAR(pubdate);";
$resultPub = $conn->query($sqlPub);
$pubYears = array();
$pubCount = array();
while ($rowPub=$resultPub->fetch_assoc()){
    $pubTime = $rowPub['years'];
    $pubCounts = $rowPub['pubNum'];
    array_push($pubYears,$pubTime);
    array_push($pubCount,$pubCounts);
}
//借阅与出版年份的关系
$sql = "SELECT YEAR(pubdate) as pubdate, COUNT(ID) as borrowNum FROM(SELECT borecords.bookID as ID, books.pubdate as pubdate
FROM borecords INNER JOIN books ON borecords.bookID=books.bookID) x GROUP BY  YEAR(pubdate);";
$resultbor_pub = $conn->query($sql);
$borDate = array();
$pub_bor_year = array();
while ($rowKind=$resultbor_pub->fetch_assoc()){
    $pubTime = $rowKind['pubdate'];
    $borNum = $rowKind['borrowNum'];
    array_push($pub_bor_year,$pubTime);
    array_push($borDate,$borNum);
}
$sqlPubNum = "SELECT YEAR(pubdate) , sum(booksnum) as booksNum FROM books_num GROUP BY YEAR(pubdate);";
$resultPubNum = $conn->query($sqlPubNum);
$pubNum = array();
while($rowKind=$resultPubNum->fetch_assoc()){
    $borNum = $rowKind['booksNum'];
    array_push($pubNum,$borNum);
}
for($i=0;$i<COUNT($pubYears);$i++){
    for($j=0;$j<COUNT($pub_bor_year);$j++) {
        if ($pubYears[$i] === $pub_bor_year[$j]) {
            $borDate[$j] = $borDate[$j] / $pubNum[$i];
            continue;
        }
    }
}
//计算到此步之后，$borDate存储每一年图书的借阅量与馆藏量比值，$pub_bor_year存储出版年份

$yearDate = array();
for($i=0;$i<count($borDate);$i++){
    $yearDate[] = [
        "value"=>$borDate[$i],
        "name"=>$pub_bor_year[$i]
    ];
}

$data = [
    "success" => 0,
    "legend" => [
        "data" => ["1901","1905","1953","1954","1955","1956","1957","1958","1959","1960","1961","1962","1963","1964","1965","1966",
        "1970","1972","1973","1975","1976","1977","1978","1979","1980","1981","1982","1983","1984","1985","1986","1987","1988","1989",
            "1990","1991","1992","1993","1994","1995","1996","1997","1998","1999","2000","2001","2002","2003","2004","2005","2006",
            "2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020"]
    ],
    "series"=>[
        "data"=>$yearDate
    ],
];

//把unicode变成中文
$json_string = json_encode($data, JSON_UNESCAPED_UNICODE);

// 写入文件
file_put_contents('../json/pl_2.2.4.txt', $json_string);


