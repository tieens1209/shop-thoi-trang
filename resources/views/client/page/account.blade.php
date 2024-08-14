@extends('layout.client')
@section('content')

<!-- Login -->
<div class="login">
    <!-- Container -->
    <div class="container">
      <!-- Login container -->
      <div class="login__container">
        <!-- Login d-flex -->
        <div class="login__d-flex d-flex">
          <!-- Login left -->
          <div class="login__left">
            <!-- Login box -->
            <div class="login__box active js-login-in">
              <!-- Login heading -->
              <h4 class="login__h4">Existing customers</h4>
              <!-- End login heading -->
              <!-- Login description -->
              <p class="login__description">Sign in to your account below:</p>
              <!-- End login description -->
              <!-- Form -->
              <form>
                <!-- Form group -->
                <div class="form-group required">
                  <input type="email" required="required" name="customer[email]" placeholder="Email address" class="form-group__input">
                </div>
                <!-- End form group -->
                <!-- Form group -->
                <div class="form-group required">
                  <input type="password" required="required" name="customer[password]" placeholder="Password" class="form-group__input">
                </div>
                <!-- End form group -->
                <!-- Forgot password -->
                <div class="login__forgot-password"><a href="#" class="js-login-forgot-password">forgot password?</a></div>
                <!-- End forgot password -->
                <!-- Action -->
                <div class="login__action"><input class="second-button" type="submit" value="Sign in"></div>
                <!-- End action -->
              </form>
              <!-- End form -->
            </div>
            <!-- End login box -->
            <!-- Login box -->
            <div class="login__box js-forgot-password">
              <!-- Login heading -->
              <h4 class="login__h4">Reset your password</h4>
              <!-- End login heading -->
              <!-- Login description -->
              <p class="login__description">Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.</p>
              <!-- End login description -->
              <!-- Form -->
              <form>
                <!-- Form group -->
                <div class="form-group required">
                  <input type="email" required="required" name="customer[email]" placeholder="Email address" class="form-group__input">
                </div>
                <!-- End form group -->
                <!-- Action -->
                <div class="login__action"><input class="second-button" type="submit" value="Submit"></div>
                <!-- End action -->
                <!-- Forgot password -->
                <div class="login__back"><a href="#" class="js-login-back">Back</a></div>
                <!-- End forgot password -->
              </form>
              <!-- End form -->
            </div>
            <!-- End login box -->
          </div>  
          <!-- End login left -->
          <!-- Login right -->
          <div class="login__right">
            <!-- Login box -->
            <div class="login__box active">
              <!-- Login heading -->
              <h4 class="login__h4">New customers</h4>
              <!-- End login heading -->
              <!-- Login description -->
              <p class="login__description">Create an account below:</p>
              <!-- End login description -->
              <!-- Form -->
              <form>
                <!-- Form groups -->
                <div class="row form-groups">
                  <div class="col-6">
                    <!-- Form group -->
                    <div class="form-group">
                      <input type="text" name="customer[first_name]" placeholder="First name" class="form-group__input">
                    </div>
                    <!-- End form group -->
                  </div>
                  <div class="col-6">
                    <!-- Form group -->
                    <div class="form-group">
                      <input type="text" name="customer[last_name]" placeholder="Last name" class="form-group__input">
                    </div>
                    <!-- End form group -->
                  </div>
                </div>
                <!-- End form groups -->
                <!-- Form group -->
                <div class="form-group required">
                  <input type="email" required="required" name="customer[email]" placeholder="Email address" class="form-group__input">
                </div>
                <!-- End form group -->
                <!-- Form group -->
                <div class="form-group required">
                  <input type="password" required="required" name="customer[password]" placeholder="Password" class="form-group__input">
                </div>
                <!-- End form group -->
                <!-- Action -->
                <div class="login__action"><input class="second-button" type="submit" value="Create an account"></div>
                <!-- End action -->
              </form>
              <!-- End form -->
            </div>
            <!-- End login box -->
          </div>
          <!-- End login right -->
        </div>
        <!-- End login d-flex -->
      </div>
      <!-- End login container -->
    </div>
    <!-- End container -->
  </div>
  <!-- End login -->

@endsection