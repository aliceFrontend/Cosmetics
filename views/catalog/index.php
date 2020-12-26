<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 catalog">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id_category'];?>"
                                           class="<?php if ($categoryId == $categoryItem['id_category']) echo 'active'; ?>"
                                           >                                                                                    
                                            <?php echo $categoryItem['categoryname'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Найденные товары</h2>
                    
                    <?php foreach ($latestProducts as $product): ?>
                        <div class="col-sm-4 product__wrapper">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/Admin/img/<?php echo $product['Image'];?>" alt="" />
                                        <h2><?php echo $product['PricePerOne'];?>$</h2>
                                        <p>
                                            <a href="/product/<?php echo $product['ID_Product'];?>">
                                                <?php echo $product['ProductName'];?>
                                            </a>
                                        </p>
                                        <a href="/cart/add/<?php echo $product['ID_Product'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>                              

                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>