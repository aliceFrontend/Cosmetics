<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="padding-right">
                
                <div class="login__wrapper">
                     <div class="signup-form login">
                        <div class="login__title">
                           <h2>Войти</h2> 
                        </div>
                        <div class="login__error">
                         <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                       </div>
                        <form action="#" method="post">
                            <div class="login__email">
                               <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/> 
                            </div>
                            <div class="login__password">
                                <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            </div>
                            <div class="login__btn">
                               <input type="submit" name="submit" class="btn btn-default" value="Вход" /> 
                            </div>
                            <div class="login__help">
                                <p>Еще не зарегистрированы?</p> <a href="">Зарегистрироваться</a>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>