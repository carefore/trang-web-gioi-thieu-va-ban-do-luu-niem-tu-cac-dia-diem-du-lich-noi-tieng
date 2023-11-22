$(document).ready(function(){
    // Khi trang được tải, lấy danh sách sản phẩm từ cơ sở dữ liệu và hiển thị
    refreshProductList();

    // Xử lý sự kiện khi form được nộp
    $("#productForm").submit(function(e){
        e.preventDefault(); // Ngăn chặn hành động mặc định của form

        // Gửi dữ liệu form đến server bằng AJAX
        $.ajax({
            type: "POST",
            url: "process.php",
            data: $("#productForm").serialize(), // Chuyển dữ liệu form thành chuỗi
            success: function(response){
                // Hiển thị thông báo và làm mới danh sách sản phẩm
                alert(response);
                refreshProductList();
            }
        });
    });

    // Hàm để làm mới danh sách sản phẩm
    function refreshProductList(){
        $.ajax({
            type: "GET",
            url: "getProducts.php",
            success: function(response){
                // Hiển thị danh sách sản phẩm trong phần tử có id là "productList"
                $("#productList").html(response);
            }
        });
    }
});
