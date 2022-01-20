<form method="post" action="">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Логін (email)</label>
        <input type="text" name="login" value="<?=$_POST['login']?>" class="form-control" id="exampleInputEmail1" /*aria-describedby="emailHelp"*/>
<!--        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">Пароль (ще раз)</label>
        <input type="password" name="password2" class="form-control" id="exampleInputPassword2">
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Прізвище</label>
        <input type="text" name="lastname" value="<?=$_POST['lastname']?>" class="form-control" id="lastname">
    </div>
    <div class="mb-3">
        <label for="firstname" class="form-label">Ім'я</label>
        <input type="text" name="firstname" value="<?=$_POST['firstname']?>" class="form-control" id="firstname">
    </div>
<!--    <div class="mb-3">-->
<!--        <label for="access" class="form-label">Доступ</label>-->
<!--        <input type="text" name="access" class="form-control" id="access">-->
<!--    </div>-->
<!--    <div class="mb-3 form-check">-->
<!--        <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--        <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--    </div>-->
    <button type="submit" class="btn btn-primary">Зареєструватися</button>
</form>
