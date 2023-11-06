$(document).ready(function() {
    $(".editGroup").click(function() {
        // Thực hiện lấy dữ liệu khi click button
        FK_iMaNV = $(this).attr("data-FK_iMaNV");
        FK_iMaKH = $(this).attr("data-FK_iMaKH");
        FK_iMaTrangThai = $(this).attr("data-FK_iMaTrangThai");
        dThoiGianTao = $(this).attr("data-dThoiGianTao");
        dNgayNhanHang = $(this).attr("data-dNgayNhanHang");
        sGhiChu = $(this).attr("data-sGhiChu");
        PK_iMaDon = $(this).attr("data-PK_iMaDon");

        // Hiển thị lên trên form
        $("#manhanvien").val(FK_iMaNV);
        $("#makhachhang").val(FK_iMaKH);
        $("#trangthai").val(FK_iMaTrangThai);
        $("#thoigiantao").val(dThoiGianTao);
        $("#ngaynhanhang").val(dNgayNhanHang);
        $("#ghichu").val(sGhiChu);
        $("#madon").val(PK_iMaDon);
    })

    var currentDate = new Date();
    var formattedDate = currentDate.toISOString().substr(0, 10);
    $("#dThoiGianTao").val(formattedDate);
})


