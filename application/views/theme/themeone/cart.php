
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            
                            $total=0;
                            if($items==NULL)
                            {
                                echo '<tr><td  colspan="5" >Cart is EMpty</td></tr>';
                            }else{
                            foreach ($items as $item) {
                                $total=$total+($item->stock_price *$item->quantity);
                            echo '
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="'.base_url().'uploads/stock/'.$item->stock_pic.'" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>'. substr($item->stock_des, 0, 20).'</h5>
                                        </td>
                                        <td class="price">
                                            <span>$'.$item->stock_price.'</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="'.$item->quantity.'">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">
                                        <a href="'.base_url().'shop/Delete/cart/?itemID='.$item->cart_id.'"><i class="fa fa-trash fa-3x"></a></i>
                                        </td>
                                   </tr>';
                                }
                            }
                                $delivery=0;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary"> 
                            <h5>Cart Total</h5>
                            <form action="<?php echo base_url()?>checkout" method="post">
                                <ul class="summary-table">
                                    <?php $all=$total+$delivery; ?>
                                    <li><span>subtotal:</span> <span>$<?php echo $total; ?></span></li>
                                    <li><span>delivery:</span> <span><?php echo $delivery; ?></span></li>
                                    <li><span>total:</span> <span>$<?php echo $all; ?></span></li>
                                </ul>
                                <input type="hidden" value="<?php echo $all;?>" name="amount">
                                <ul class="summary-table">
                                    <select name="payment" required>
                                        <option value="" >Payment Method</option>
                                        <option value="cash">Cash On delivery</option>
                                        <option value="stripe">Stripe Payment</option>
                                    </select>
                                </ul>
                                <div class="cart-btn mt-100">
                                <?php
                                        if($items==NULL)
                                        {
                                            echo '<input type="submit" value="CheckOut"   disabled class="btn amado-btn w-100" >';
                                        }else{
                                        echo '<input type="submit" value="CheckOut"  class="btn amado-btn w-100" >';    
                                        }                            
                                ?>
                                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'checkout.php'?>