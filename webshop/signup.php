<div class="container">
        <div class="row d-flex justify-content-center mx-auto">
            <div class="col-md-6 col-xs-12 div-style">
            <form method="POST" action="signup.inc.php">
                <div class="d-flex justify-content-center mx-auto main-label" >
                    <h2>Regisztráció</h2>
                </div>
                <div class="form-group">
                    <input required type="text" class="form-control text-box" name="username" id="username" aria-describedby="username" placeholder="Felhasználónév (kis és nagy betűk számok 1-től 9-ig)"  pattern="[A-Za-z0-9]+">
                </div>
                <div class="form-group">
                    <input required type="email" class="form-control text-box" name="email" id="email" aria-describedby="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input required type="password" class="form-control text-box" name="password" id="password" placeholder="Jelszó">
                </div>
                <div class="form-group justify-content-center d-flex">
                    <button type="submit" name="submit" class="btn btn-danger button-submit">Regisztrálok</button>
                </div>
            </form>
        </div>
    </div>
</div>