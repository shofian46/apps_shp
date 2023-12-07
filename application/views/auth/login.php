
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                                    </div>
																		<div>
																			<?= $this->session->flashdata('message'); ?>
																		</div>
                                    <form class="user" action="<?= base_url('auth'); ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter Email Address...">
																						<div class="invalid-feedback pl-3">
																							<?= form_error('email')?>
																						</div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
																						<div class="invalid-feedback pl-3">
																							<?= form_error('password')?>
																						</div>
                                        </div>
                                        <button type="submit" class="btn btn-primary bg-gradient-primary btn-user btn-block">
                                            SignIn
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
