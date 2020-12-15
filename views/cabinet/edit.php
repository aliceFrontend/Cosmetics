<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="padding-right">
                <div class="edits__wrapper">
                  <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form edits">
                        <div class="edits__title">
                          <h2>Редактирование данных</h2>  
                        </div>
                        
                        <form action="#" method="post">
                            <div class="edits__name">
                               <input placeholder="name" type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/> 
                            </div>
                            <div class="edits__password">
                                 <input placeholder= "password" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            </div>
                            <div class="edits__btn">
                              <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />  
                            </div>
                            
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>  
                </div>
                
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>