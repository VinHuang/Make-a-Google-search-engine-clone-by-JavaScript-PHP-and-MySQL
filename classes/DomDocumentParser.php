<?php
class DomDocumentParser {

	// private $doc;

	public function __construct($url) {

		$options = array(
			'http'=>array('method'=>"GET", 'header'=>"User-Agent: doodleBot/0.1\n")
            );
        // 建立一個 array 它 key 是 'http' , 
        // value 是另外一個新建立 array，內層的 array 有兩個 key 是 'mehtod' 與 'header',
        // 粗箭頭後面是他們的對應 value
        // 這些是 stream_context_create 的 options 格式

		$context = stream_context_create($options);
        // stream_context_create 可以模擬 get / post 行為

		$this->doc = new DomDocument();
        @$this->doc->loadHTML(file_get_contents($url, false, $context));
        // file_get_contents 可以把文件讀入一個 string 裡
        // DomDocument 可以在 php 更好的操作 DOM
        // $this->doc->loadHTML() 則會暫時存在 $this->doc 上
        // 這樣可以用 $this->doc 做 DOM 操作
	}

	public function getlinks() {
        return $this->doc->getElementsByTagName("a");
        // $this->doc 是 new DomDocument(); 的新實例，
        // 後面 getElementsByTagName() 應該是指使用 
        // 類別 DomDocument 內建的方法 getElementsByTagName()
        // 所以這個方法的用途應該就是回傳某一頁所有的 <a>
    }
    // 在 crawl.php :9 被使用

}
?>