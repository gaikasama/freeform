<?php require APPROOT . '/views/inc/head.php'?>
<section class="section section--l">
    <div class="container">


        <div class="background--m">
            <h2 class="title">Login</h2>
            <form action="<?php echo URLROOT; ?>/users/index" method ="POST" class="form">
                <div class="form__row">
                    <label for="email" class="form__label">
                        Email
                    </label>
                    <input type="email" name="email"
                        class="form__input <?php if(!empty($data['emailError']) || !empty($data['loginError'])) echo 'form__input-error'?>"
                        placeholder="Email">
                    <span class="form__error">
                        <?php echo $data['emailError']; ?>
                    </span>
                </div>
                <div class="form__row">
                    <label for="password" class="form__label">
                        Password
                    </label>
                    <input type="password" name="password"
                        class="form__input <?php if(!empty($data['passwordError']) || !empty($data['loginError'])) echo 'form__input-error'?>"
                        placeholder="Password">
                    <span class="form__error">
                        <?php echo $data['passwordError']; ?>
                    </span>
                </div>
                <span class="form__error">
                    <?php echo $data['loginError']?>
                </span>


                <button type="submit" name='submit' value="submit" class="button button--margin-top">Login</button>
            </form>

            <div class="form__message">
                <span class="form__message-text">Don't have an account yet?
                    <a href="<?php echo URLROOT?>/users/register" class="form__message-link">Sign Up</a>
                </span>
            </div>
        </div>

    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'?>