<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetics</title>
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/main.css">
</head>
<body>
    <div class="header">
        <div class="container header__menu">
           <div class="logo">
               <a href="/">
                   <img src="/template/images/icon/logo-fox.svg" alt="">
                   KoreanCosmetics
               </a>
           </div>
           <ul class="header__panel">
              <li>
                <a href="/cart"><img src="/template/images/icon/add-to-basket.svg" alt=""></i>Корзина<span id="cart-count">(<?php echo Cart::countItems(); ?>)</span>
                </a>
            </li>

                <?php if (isset ($_SESSION ['user']) && User::isAdmin() == 1): ?>
                 <li>
                    <a href="/panel/"><img src="/template/images/icon/account.svg" alt="">Админка</a>
                </li>
                 <?php endif; ?>

                <?php if (User::isGuest()): ?>                                        
                    <li>
                        <a href="/user/login/"><img src="/template/images/icon/padlock.svg" alt="">Вход </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/cabinet/"><img src="/template/images/icon/account.svg" alt="">Аккаунт</a>
                    </li>                                    
                    <li>
                        <a href="/user/logout/"><img src="/template/images/icon/padlock.svg" alt="">Выход</a>
                    </li>                                        
                <?php endif; ?> 
           </ul>
            
        </div>
        <!-- <div class="container">  
            <div class="search">
                <input type="text" placeholder="поиск">
            </div>
        </div> -->
        <div class="search-wrapper">
              <form action="/catalog" class="search">
                  <input class="search-input" id="title-search-input_fixed" type="text" name="q" value="" placeholder="Поиск" size="20" maxlength="50" autocomplete="off">
              </form>
        </div>
    </div>
