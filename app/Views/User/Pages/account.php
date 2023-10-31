<div class="container main-container headerOffset">

    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active"> Authentication</li>
            </ul>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> Authentication</span></h1>

            <div class="row userInfo">

                <div class="col-xs-12 col-sm-6">
                    <h2 class="block-title-2"> Create an account </h2>

                    <form role="form" class="regForm">
                        <div class="form-group">
                            <label>Name</label>
                            <input title="Please enter your username (at least 3 characters)" type="text"
                                   class="form-control" placeholder="Enter name" required minlength="3">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input title="Please enter valid email" type="email" class="form-control"
                                   placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input required minlength="5"
                                   title="Please enter your password, between 5 and 12 characters" type="password"
                                   class="form-control" placeholder="Password">
                        </div>
                        <div class="error">
                        </div>

                        <button type="submit" class="btn   btn-primary"><i class="fa fa-user"></i> Create an account
                        </button>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h2 class="block-title-2"><span>Already registered?</span></h2>

                    <form role="form" class="logForm ">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="checkbox">
                                Remember me </label>
                        </div>
                        <div class="form-group">
                            <p><a title="Recover your forgotten password" href="forgot-password.html">Forgot your
                                password? </a></p>
                        </div>
                        <a class="btn btn-primary" href="account.html"><i class="fa fa-sign-in"></i> Sign In</a>


                    </form>
                </div>
            </div>
            <!--/row end-->

        </div>

        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /wrapper -->