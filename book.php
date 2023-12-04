<div id="modalBook" class="modal">
            <div class="book-content">
                <span class="close">&times;</span>
                <div class="form-box-book select-container">
                <form method="post" id="dishForm" action="">
                <h2>Select the options</h2>

                <div class="quantity-container">
                    <div>
                        <label class="" for="quantity"><h3>Quantity</h3></label>
                    </div>
                    <div>
                        <button id="decrease" class="quantity-button">-</button>
                        <input id="quantity" type="number" name="quantity" min="1" max="10" value="<?php echo $quantity;?>"> 
                        <button id="increase" class="quantity-button">+</button>
                    </div>
                </div>

                <h3 class="">Total: $<span id="total"></span></h3>

                <div class="select-container">
                    <h3>Ordering mode</h3>
                    <div class="select-radio">
                        <div>
                            <input type="radio" id="diningIn" name="eating-style" value="diningIn" required>
                            <label for="diningIn">Dining In</label>
                        </div>
                        <div>
                            <input type="radio" id="express" name="eating-style" value="express" required>
                            <label for="express">Express</label>
                        </div>
                        <div>
                            <input type="radio" id="takeout" name="eating-style" value="takeout" required>
                            <label for="takeout">Takeout</label>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="date" name="date" value="">
                <input type="hidden" id="time" name="time" value="">
                <input type="hidden" id="dish_price" name="dish_price" value="<?php echo $item[0]["dish_price"];?>">
                <input type="hidden" id="id_dish" name="id_dish" value="<?php echo $item[0]["id_dish"];?>">
                <input type='hidden' id="index" name="index" value="<?php echo $pos_array;?>">

                <input class="cart-btn wine-color" type="submit" id="addToCartBtn" value="Add to cart">
                
                </form>

                </div>
            </div>
            </div>
