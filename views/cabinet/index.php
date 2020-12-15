<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row user__cabinet">

            <h1>Кабинет пользователя</h1>
            
            <h3>Привет, <?php echo $user['Name'];?>!</h3>
            <!-- <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <li><a href="/cabinet/history">Список покупок</a></li>
            </ul> -->

            <div class="user__items">
                <div class="user__item">
                    <a href="/cabinet/edit">Редактировать данные</a>
                </div>
                <div class="user__item">
                    <a href="/cabinet/history">Список покупок</a>
                </div>  
            </div>
            
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>