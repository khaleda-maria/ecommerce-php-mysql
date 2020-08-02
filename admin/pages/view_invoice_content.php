<?php
    $order_id=$_GET['order_id'];
    $customer_query_result=$obj_admin->select_customer_info_by_order_id($order_id);
    $customer_info=mysqli_fetch_assoc($customer_query_result);
    
    $shipping_query_result=$obj_admin->select_shipping_info_by_order_id($order_id);
    $shipping_info=  mysqli_fetch_assoc($shipping_query_result);
    
    $product_query_result=$obj_admin->select_product_info_by_order_id($order_id);

?>
<style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

/*    a {
        color: #5D6975;
        text-decoration: underline;
    }*/

    

    header {
        padding: 10px 0;
        margin-bottom: 30px;
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 90px;
    }

    h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
    }

    #project {
        float: left;
    }

    #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: right;
        text-align: right;
    }

    #project div,
    #company div {
        white-space: nowrap;        
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
        background: #F5F5F5;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;        
        font-weight: normal;
    }

    table .service,
    table .desc {
        text-align: left;
    }

    table td {
        padding: 20px;
        text-align: right;
    }

    table td.service,
    table td.desc {
        vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table td.grand {
        border-top: 1px solid #5D6975;;
    }

    #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
    }

/*    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }*/
</style>
<header class="clearfix">
    <div id="logo">
        <img src="../assets/admin_assets/img/logo.png">
    </div>
    <h1>INVOICE No# 000<?php echo $order_id; ?></h1>
    <div id="company" class="clearfix">
        <div><u>Billing Information</u></div><br/>
        <div><?php echo $customer_info['first_name'].' '.$customer_info['last_name']; ?><br /><?php echo $customer_info['address']; ?></div>
        <div><?php echo $customer_info['phone_number']; ?></div>
        <div><a href="mailto:company@example.com"><?php echo $customer_info['email_address']; ?></a></div>
    </div>
    <div id="project">
        <div><u>Shipping Information</u></div><br/>
        <div><?php echo $shipping_info['full_name']; ?></div>
        <div><?php echo $shipping_info['address']; ?></div>
        <div><?php echo $shipping_info['email_address']; ?></div>
        <div><?php echo $shipping_info['phone_number']; ?></div>
    </div>
</header>
<main>
    <table>
        <thead>
            <tr>
                <th class="service">SERVICE</th>
                <th class="desc">DESCRIPTION</th>
                <th>PRICE</th>
                <th>QTY</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php $sum=0; while ($row=  mysqli_fetch_assoc($product_query_result)) { ?>
            <tr>
                <td class="service"><?php echo $row['product_id']; ?></td>
                <td class="desc"><?php echo $row['product_name']; ?></td>
                <td class="unit"><?php echo'BDT: '.$row['product_price']; ?></td>
                <td class="qty"><?php echo $row['product_quantity']; ?></td>
                <td class="total">
                    <?php $total=$row['product_price']*$row['product_quantity'];                        echo 'BDT: '.$total; ?>
                </td>
            </tr>
            <?php $sum=$sum+$total; } ?>
            <tr>
                <td colspan="4">SUBTOTAL</td>
                <td class="total"><?php echo 'BDT: '.$sum; ?></td>
            </tr>
            <tr>
                <td colspan="4">VAT 15%</td>
                <td class="total"><?php $vat=$total*0.15; echo 'BDT: '.$vat;?></td>
            </tr>
            <tr>
                <td colspan="4" class="grand total">GRAND TOTAL</td>
                <td class="grand total"><?php echo 'BDT: '.($total+$vat); ;?></td>
            </tr>
        </tbody>
    </table>
</main>