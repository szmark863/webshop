<div class="container">
        <div class="row d-flex justify-content-center mx-auto">
            <div class="col-md-6 col-xs-12 div-style">
            <form method="POST" action="login.inc.php">
                <div class="d-flex justify-content-center mx-auto main-label" >
                    <h2>Bejelentkezés</h2>
                </div>
                <div class="form-group">
                    <input required type="text" class="form-control text-box" name="username" id="username" aria-describedby="username" placeholder="Felhasználónév">
                </div>
                <div class="form-group">
                    <input required type="password" class="form-control text-box" name="password" id="password" placeholder="Jelszó">
                </div>
                <div class="form-group justify-content-center d-flex">
                    <button type="submit" name="submit" class="btn btn-danger button-submit">Bejelentkezek</button>
                </div>
            </form>
        </div>
        </div>
</div>