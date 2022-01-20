<form method="post" action="">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Логін (email)</label>
        <input type="text" name="login" value="<?=$_POST['login']?>" class="form-control" id="exampleInputEmail1" /*aria-describedby="emailHelp"*/>
        <div id="emailHelp" class="form-text">Якщо Ви не маєте  власного аккаунту, зареєструйтесь.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Увійти</button>
</form>


<!--<main class="form-signin">-->
<!--    <form method="post" action="">-->
<!--        <div class="form-floating">-->
<!--            <input type="text" name="login" value="--><?//=$_POST['login']?><!--" class="form-control" id="exampleInputEmail1" /*aria-describedby="emailHelp"*/>-->
<!--            <label for="floatingInput">Логін (email)</label>-->
<!--        </div>-->
<!--        <div class="form-floating">-->
<!--            <input type="password" name="password" class="form-control" id="exampleInputPassword1">-->
<!--            <label for="floatingPassword">Пароль</label>-->
<!--        </div>-->
<!--        <button class="w-100 btn btn-lg btn-primary" type="submit">Увійти</button>-->
<!--    </form>-->
<!--</main>-->