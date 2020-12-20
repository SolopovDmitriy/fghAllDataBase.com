    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel">
                <a href="javascript:void(0)" class="p-20 di"><img src="/controlpanel/static/plugins/images/admin-logo.png"></a>
                <div class="lg-content">
                    <h2>Система управления ренным бизнесом</h2>
                    <p class="text-muted">Мы интегрируем CRM не только по всей Украине, но и по всему миру</p> 
                </div>
            </div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <h3 class="box-title m-b-0">Регистрация Нового пользователя</h3> <small>Введите ваши данные</small>
                <form class="form-horizontal new-lg-form" method="post" id="loginform" action="/controlpanel/admin/registeruser">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="login" placeholder="login"> </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="email" placeholder="Email"> </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="password" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="cpassword" placeholder="Confirm Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Я принимаю <a href="#">условия лицензии</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Зарегистрироваться</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Уже есть аккаунт?<a href="/controlpanel/admin/loginin" class="text-danger m-l-5"><b>Ввойти</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>