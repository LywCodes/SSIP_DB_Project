<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tailwindcss-colors.css">
</head>
<body>
    

<div class="container">
    <div class="checkoutLayout">

        
        <div class="returnCart">
            <a href="index.html">keep shopping</a>
            <h1>List Product in Cart</h1>
            <div class="list">

                <div class="item">
                    <img src="images/1.webp">
                    <div class="info">
                        <div class="name">PRODUCT 1</div>
                        <div class="price">$22/1 product</div>
                    </div>
                    <div class="quantity">5</div>
                    <div class="returnPrice">$433.3</div>
                </div>

            </div>
        </div>

        <form action="" class="checkoutForm">
            <div class="right">
                <h1>Checkout</h1>

                
                <div class="return">
                    <div class="row">
                        <div>Total Quantity</div>
                        <div class="totalQuantity">70</div>
                    </div>
                    <div class="row">
                        <div>Total Price</div>
                        <div class="totalPrice">$900</div>
                    </div>
                </div>


                <div class="payment-wrapper">
                
                    <div class="payment-right">
                        
                            <h1 class="payment-title">Payment Details</h1>
                            <div class="payment-method">
                                <input type="radio" name="payment-method" id="method-1" checked>
                                <label for="method-1" class="payment-method-item">
                                    <img src="./images/QRIS.png" alt="">
                                </label>

                                <input type="radio" name="payment-method" id="method-2">
                                <label for="method-2" class="payment-method-item">
                                    <img src="images/BCA.png" alt="">
                                </label>

                                <input type="radio" name="payment-method" id="method-3">
                                <label for="method-3" class="payment-method-item">
                                    <img src="images/mandiri.png" alt="">
                                </label>

                                <input type="radio" name="payment-method" id="method-4">
                                <label for="method-4" class="payment-method-item">
                                    <img src="images/master-card.png" alt="">
                                </label>
                    
                            </div>
                            <div class="payment-form-group">
                                    <input type="text" placeholder=" " class="payment-form-control" id="cvv">
                                    <label for="cvv" class="payment-form-label payment-form-label-required">CVV</label>
                                </div>
                    </div>
                </div>
                <button type="submit" class="buttonCheckout">CHECKOUT</button>
                
            </div>
        </form>
    </div>
</div>


<script src="checkout.js"></script>

</body>
</html>
