<div class="card o-hidden border-0 shadow-lg my-5 mx-auto col-lg-7">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                            </div>
                            <form class="user" action="<?= base_url('auth/registration'); ?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?= form_error('name') ? 'is-invalid' :''; ?>" id="name" name="name" placeholder="Your name...">
																		<div class="invalid-feedback pl-3">
																			<?= form_error('name'); ?>
																		</div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email address..">
																		<div class="invalid-feedback pl-3">
																			<?= form_error('email')?>
																		</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user <?= form_error('password1') ? 'is-invalid' :''; ?>" id="password1" name="password1" placeholder="Password">
																				<div class="invalid-feedback pl-3">
																					<?= form_error('password1')?>
																				</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
