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
            <small>Укажите код подтверждения из Вашей электронной почты </small>

            <form class="form-horizontal new-lg-form" method="post" id="loginform" action="/controlpanel/admin/checkVerificateNumber">
                <div class="form-group  m-t-20">
                    <div class="col-xs-12">
                        <label>Введите код подтверждения</label>
                        <input class="form-control" type="text" required="" name="number" >
                        <input class="form-control" type="hidden" required="" name="id" value="<?=$data['id']?>">
                    </div
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light"
                                type="submit">Подтвердить почту
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>