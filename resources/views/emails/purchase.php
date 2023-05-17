<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
<body>
<div style="width: 600px; padding: 15px; margin: 0 auto; ">


<div style="text-align: center; width: 200px; margin: 0 auto;">
<img src="https://cdn.dribbble.com/userupload/3158902/file/original-7c71bfa677e61dea61bc2acd59158d32.jpg?resize=400x300"width="80" height="80" />
</div>

<h2 style="color: #d23600;">Hello</h2><?= user()->fullname ?>,</h2>
<p>Your order confirmation details: < style="color: #0b97c4;">
 #<?= $data['order_no'] ?>
</span>
</p>



<table cellpadding="5" cellpadding="5" border="0" width="600" style="border: 1px solid  #0a0a0a" >

<tr style="background-color: #000000; color: #ffffff;">

<th style="text-aligh: left;">Product Name</th><th>Unit Price</th><th>Quantity</th><th>Total</th>
</tr>


<?php foreach ($data['product'] as $item): ?>

<tr>
    <td width="400"><?= $item['name'] ?></td>
    <td width="100">$<?= $item['price'] ?></td>
    <td width="50"><?= $item['quantity'] ?></td>
    <td width="50">$<?= $item['total'] ?></td>
</tr>

<?php endforeach; ?>
</table>

<h4>Total Amount: $<?= $item['total'] ?> </h4>

<p>
    We hope to see you again.
   <h2>My Store</h2>
</p>

</div>

</body>
</html>


