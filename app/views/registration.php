<?php require APPROOT . '/views/inc/head.php'?>

<section class="section">
    <div class="container">

        <div class="background--m">
            <h2 class="title">Register</h2>
            <form action="<?php echo URLROOT?>/users/register" method="POST" class="form">
                <div class="form__row form__row--flex-row">
                    <div class="form__row--m">
                        <label for="first_name" class="form__label">First Name</label>
                        <input type="text" name="first_name"
                            class="form__input <?php if(!empty($data['firstNameError'])) echo 'form__input-error'?>"
                            placeholder="First Name">
                        <span class="form__error">
                            <?php echo $data['firstNameError']; ?>
                        </span>
                    </div>

                    <div class="form__row--m">
                        <label for="last_name" class="form__label">Last Name</label>
                        <input type="text" name="last_name"
                            class="form__input <?php if(!empty($data['lastNameError'])) echo 'form__input-error'?>"
                            placeholder="Last Name">
                        <span class="form__error">
                            <?php echo $data['lastNameError']; ?>
                        </span>
                    </div>

                </div>

                <div class="form__row">
                    <label for="address" class="form__label">Address</label>
                    <input type="text" name="address"
                        class="form__input <?php if(!empty($data['addressError'])) echo 'form__input-error'?>"
                        placeholder="Address">
                    <span class="form__error">
                        <?php echo $data['addressError']; ?>
                    </span>
                </div>

                <div class="form__row">
                    <label for="email" class="form__label">Email</label>
                    <input type="text" name="email"
                        class="form__input <?php if(!empty($data['emailError'])) echo 'form__input-error'?>"
                        placeholder="Email">
                    <span class="form__error">
                        <?php echo $data['emailError']; ?>
                    </span>
                </div>

                <div class="form__row form__row--flex-row">
                    <div class="form__row--m">
                        <label for="password" class="form__label">Password</label>
                        <input type="password" name="password"
                            class="form__input <?php if(!empty($data['passwordError'])) echo 'form__input-error'?>"
                            placeholder="Password">
                        <span class="form__error">
                            <?php echo $data['passwordError']; ?>
                        </span>
                    </div>
                    <div class="form__row--m">
                        <label for="confirmPassword" class="form__label">Confirm password</label>
                        <input type="password" name="confirmPassword"
                            class="form__input <?php if(!empty($data['confirmPasswordError'])) echo 'form__input-error'?>"
                            placeholder="Confirm password">
                        <span class="form__error">
                            <?php echo $data['confirmPasswordError']; ?>
                        </span>
                    </div>

                </div>












                <button type="submit" name='submit' value="submit" class="button button--margin-top">Send</button>
            </form>

            <div class="form__message">
                <span>
                    Already have an account?
                    <a href="<?php echo URLROOT?>" class="form__message-link">Login</a>
                </span>

            </div>
        </div>

    </div>
</section>


<?php require APPROOT . '/views/inc/footer.php'?>