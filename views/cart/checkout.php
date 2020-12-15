<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row cart__wrap">
            <div class="col-sm-3 catalog">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id_category']; ?>">
                                            <?php echo $categoryItem['categoryname']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items cart__table">
                    <h2 class="title text-center">Корзина</h2>


                    <?php if ($result): ?>
                        <p>Заказ оформлен. Мы Вам перезвоним.</p>
                    <?php else: ?>

                        <h4 class="order__title">Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>,</h4>

                        <?php if (!$result): ?>                        

                            <div class="col-sm-4">
                                <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                                <div class="user__order">
                                    <form action="#" method="post">

                                        <div class="order__name">
                                          <input placeholder = "name" type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/>  
                                        </div>
                                        
                                        <div class="order__number">
                                            <input placeholder="number" type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>"/>
                                        </div>
                                        
                                        <div class="order__comments">
                                            <input placehoder="comments" type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/> 
                                        </div>
                                        <div class="order__btn">
                                           <input type="submit" name="submit" class="btn btn-default" value="Оформить" /> 
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>

                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>