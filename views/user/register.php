<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="padding-right">
                <div class="register__wrapper">
                  <div class="register__success alert alert-success">
                     <?php if ($result): ?>
                        <p>Вы зарегистрированы!</p>
                        <p>
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo aspernatur, excepturi natus, voluptates numquam rerum dolorum delectus eaque quis praesentium ratione, perspiciatis qui dolor mollitia vel odio quas, modi. Quae omnis delectus veniam doloribus ut, non corporis libero dolores dolor commodi nesciunt esse aspernatur labore sit aut, laborum est temporibus provident expedita iusto velit quis eos! Voluptatum cupiditate facilis quasi, repudiandae, quas sit architecto esse, error id impedit eligendi voluptates dolorem totam dicta amet iure nisi et facere. Quae quod, iusto delectus, enim, aut excepturi ad reprehenderit, ab aliquam tempore explicabo ea esse quibusdam dolorem nihil! Veniam, at blanditiis optio?
                        </p>
                        <p>
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo aspernatur, excepturi natus, voluptates numquam rerum dolorum delectus eaque quis praesentium ratione, perspiciatis qui dolor mollitia vel odio quas, modi. Quae omnis delectus veniam doloribus ut, non corporis libero dolores dolor commodi nesciunt esse aspernatur labore sit aut, laborum est temporibus provident expedita iusto velit quis eos! Voluptatum cupiditate facilis quasi, repudiandae, quas sit architecto esse, error id impedit eligendi voluptates dolorem totam dicta amet iure nisi et facere. Quae quod, iusto delectus, enim, aut excepturi ad reprehenderit, ab aliquam tempore explicabo ea esse quibusdam dolorem nihil! Veniam, at blanditiis optio?
                        </p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                  </div>
                   

                        <div class="signup-form"><!--sign up form-->
                            <div class="register__title">
                                <h2>Регистрация на сайте</h2>
                            </div>
                            <form action="#" method="post">
                                <div class="register__name">
                                    <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/> 
                                </div>
                               <div class="register__email">
                                  <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>  
                               </div>
                               <div class="register__password">
                                   <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                               </div>
                                <div class="register__btn">
                                  <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />  
                                </div>
                                 <div class="login__help">
                                    <p>Уже зарегистрированы?</p> <a href="/user/login">Войти</a>
                                </div>
                            </form>
                        </div><!--/sign up form-->
                    
                    <?php endif; ?>
              </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>