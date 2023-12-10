<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            padding: 20px;
        }

        .invoice {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .bill-info {
            display: flex;
            justify-content: space-between;
        }

        .bill-info div {
            width: 48%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }

        .thank-you {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }

        hr {
            border: none;
            /* Xóa đường kẻ mặc định */
            border-top: 2px dashed #999;
            /* Đặt đường kẻ nét đứt với màu sắc và chiều cao mong muốn */
            margin: 20px 0;
            /* Thêm khoảng trắng trên và dưới nếu cần thiết */
        }
    </style>
</head>

<body>

    <div class="invoice">
        <div class="header">
            <h1>HÓA ĐƠN BÁN HÀNG</h1>
            <i><?= date('d/m/Y', strtotime($orders['dThoiGianTao'])) ?></i> <br>
            <strong>Nhân viên: <i><?= $orders['sTenNV'] ?></i></strong>

        </div>

        <div>
            <div>
                <p><strong>Tên cửa hàng:</strong> BỈM SỮA NANA'S HOUSE</p>
                <p><strong>Địa chỉ:</strong> số 243 Đ. Trường Chinh, Khương Thượng, Thanh Xuân, Hà Nội</p>
            </div>
            <hr>
            <div>
                <p><strong>Tên khách hàng:</strong> <?= $orders['sTenKH'] ?></p>
                <p><strong>Số điện thoại:</strong> <?= $orders['sSDT'] ?></p>
                <p><strong>Địa chỉ:</strong> <?= $orders['sDiaChi'] ?></p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Chiết khấu</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php $k = 1 ?>
                <?php foreach ($orderDetails as $orderDetail) : ?>
                    <tr>
                        <td><?= $k++ ?></td>
                        <td>
                            <?= $orderDetail['sTenSP'] ?>
                        </td>
                        <td><?= number_format($orderDetail['fGiaBanLe'], 0, '.', '.') ?></td>
                        <td><?= $orderDetail['iSoLuong'] ?></td>
                        <td>
                            <?php $currentDate = date('Y-m-d') ?>
                            <?php if (isset($orderDetail['fChietKhau'])) : ?>
                                <?php if ($currentDate >= $orderDetail['dNgayHieuLuc'] && $currentDate <= $orderDetail['dNgayHetHieuLuc']) : ?>
                                    <?php echo $orderDetail['fChietKhau'] ?: 0 ?>
                                <?php else : ?>
                                    0
                                <?php endif ?>
                            <?php else : ?>
                                0
                            <?php endif ?>
                        </td>
                        <td class="thanhtien">
                            <?php $currentDate = date('Y-m-d') ?>
                            <?php if (isset($orderDetail['fChietKhau'])) : ?>
                                <?php if ($currentDate >= $orderDetail['dNgayHieuLuc'] && $currentDate <= $orderDetail['dNgayHetHieuLuc']) : ?>
                                    <?php echo   number_format(($orderDetail['iSoLuong'] * $orderDetail['fGiaBanLe'] * (1 - $orderDetail['fChietKhau'] / 100 ?: 0)), 0, '.', '.') ?>
                                <?php else : ?>
                                    <?php echo   number_format(($orderDetail['iSoLuong'] * $orderDetail['fGiaBanLe']), 0, '.', '.') ?>
                                <?php endif ?>
                            <?php else : ?>
                                <?php echo   number_format(($orderDetail['iSoLuong'] * $orderDetail['fGiaBanLe']), 0, '.', '.') ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div>

        </div>
        <p><i><strong>Ghi chú: </strong><?= $orders['sGhiChu'] ?></i> </p>
        <div class="total">
            <p><strong>Tổng cộng: </strong> <span class="h5 tongtien" id="total-price">
                    <?php
                    $tong = 0;
                    foreach ($orderDetails as $orderDetail) {
                        $currentDate = date('Y-m-d');
                        if (isset($orderDetail['fChietKhau'])) {
                            if ($currentDate >= $orderDetail['dNgayHieuLuc'] && $currentDate <= $orderDetail['dNgayHetHieuLuc']) {
                                $tong += $orderDetail['iSoLuong'] * $orderDetail['fGiaBanLe'] * (1 - $orderDetail['fChietKhau'] / 100);
                            } else {
                                $tong += $orderDetail['iSoLuong'] * $orderDetail['fGiaBanLe'];
                            }
                        } else {
                            $tong += $orderDetail['iSoLuong'] * $orderDetail['fGiaBanLe'];
                        }
                        number_format($tong, 0, '.', '.');
                    }
                    ?>
                    <?php echo number_format($tong, 0, '.', '.'); ?>
                </span> VNĐ</p>
            <p><strong>Trạng thái:</strong> <?= $orders['sTenTrangThai'] ?></p>
        </div>

        <div class="thank-you">
            <p><em>Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi!</em></p>
        </div>
    </div>
</body>

</html>