<?php
include("classes/DomDocumentParser.php");
// 引入DomDocumentParser

function createLink($src, $url) {


}

function followLinks($url) {

	$parser = new DomDocumentParser($url);
    // 函數每執行一次，都會新建立一個 DomDocumentParser 實體。
    // $url 會在 DomDocumentParser 的 __construct($url) 當作參數傳入

    $linkList = $parser->getLinks();
    // 執行 類別 DomDocumentParser 的 公開方法 getlinks()
    // ，並用 $linkList 儲存 getLinks() return 回來的值
    // 這個方法的用途應該就是回傳某一頁所有的 <a>
    // 所以會是某一頁所有 link 的集合

	foreach($linkList as $link) {
        $href = $link->getAttribute("href");
        // 使用 $link 的類別方法 getAttribute() 取得 <a> 的 href 屬性值
        
        if(strpos($href, "#") !== false) {
            continue;
        }else if (substr($href, 0, 11) == 'javascript:'){
            continue;
        }

        echo $href . "<br>";
        // 印出靠DomDocumentParser類別方法getLinks()收集到的 <a> href 值並換行
	}

}

$startUrl = "https://pkq.herokuapp.com/poke-profile/124#recipe";
followLinks($startUrl);
// 做一個function 放入指定參數

?>