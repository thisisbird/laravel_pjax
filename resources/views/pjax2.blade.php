<style>
    body{
        margin: 100px auto;
        background-color: yellowgreen;
        width: 600px;
        height: 600px;
    }
</style>
...猜猜我有沒有pjax <br>
<a href="/pjax"> 要載入的頁面連結1 </a>
<a href="/pjax2"> 要載入的頁面連結2 </a>
<a href="/pjax3"> 要載入的頁面連結3 </a>
<a href="/pjax4"> 要載入的頁面連結4 </a>
<br>...第三行

<hr>
<!-- 新增 Pjax 設定：(必須有一個空元素放載入的內容) -->
<div class="main-content" id="pjax-container">
    @yield('content') //與另一個檢視檔案對應2
    <div>
        qqqqqqqqq<br>
    </div>
</div>
...
<!-- JavaScripts建議將這些js下載到本地 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
<script>
    $(document).pjax('a', '#pjax-container');
    $(document).on("pjax:timeout", function(event) {
        // 阻止超時導致連結跳轉事件發生
        event.preventDefault()
    });
</script>