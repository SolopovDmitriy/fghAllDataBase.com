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
            <h3 class="box-title m-b-0">Вход  в Админ Панель</h3>
            <small>Укажите свои персональные данные </small>
            <form class="form-horizontal new-lg-form" method="post" id="loginform" action="/controlpanel/admin/checkuser">
                <div class="form-group  m-t-20">
                    <div class="col-xs-12">
                        <label>Email Address</label>
                        <input class="form-control" type="email" required="" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Password</label>
                        <input class="form-control" type="password" required="" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-info pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> Помнить меня </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i
                                    class="fa fa-lock m-r-5"></i> Забыли пароль?</a></div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light"
                                type="submit">Войти
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"
                                               title="Login with Facebook"> <i aria-hidden="true"
                                                                               class="fa fa-facebook"></i> </a> <a
                                    href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"
                                    title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>У Вас отсутствует аккаунт? <a href="/controlpanel/admin/register" class="text-primary m-l-5"><b>Зарегистрироваться</b></a>
                        </p>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" id="recoverform" action="/controlpanel/admin/resetPassword" method="post">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" name="email" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>