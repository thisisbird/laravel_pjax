...猜猜我沒有pjax <br>
<a href="/pjax"> 要載入的頁面連結1 </a>
<a href="/pjax2"> 要載入的頁面連結2 </a>
<a href="/pjax3"> 要載入的頁面連結3 </a>
<a href="/pjax4"> 要載入的頁面連結4 </a>
<br>...第三行

<hr>
<!-- 新增 Pjax 設定：(必須有一個空元素放載入的內容) -->
<div class="main-content" id="pjax-container">
    @yield('content') //與另一個檢視檔案對應4

    <div>
        qqqqqqqqq<br>
        QQQQQQQQQ<br>
        kerkerker
    </div>
</div>
--------------------
<div>
    !!!我可能不會出現!!!
</div>
...
