<section id="wrapper" class="new-login-register">
    <div class="lg-info-panel">
        <div class="inner-panel">
            <div class="lg-content">
                <h2>Система управления ренным бизнесом</h2>
                <p class="text-muted">
                    Мы интегрируем CRM не только по всей украине но и по всему миру
                </p>
            </div>
        </div>
    </div>
    <div class="new-login-box">
        <div class="white-box">
            <h3 class="box-title m-b-0">Изменение пароля</h3>
            <small>Укажите старый и новый пароль</small>
            <?php
            echo $_SESSION ['login'];
            ?>
            <form class="form-horizontal new-lg-form" method="post" id="loginform" action="/controlpanel/admin/updatePassword">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Старый пароль</label>
                        <input class="form-control" type="password" required="" name="oldPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Новый пароль</label>
                        <input class="form-control" type="password" required="" name="newPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light"
                                type="submit">Изменить пароль
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>