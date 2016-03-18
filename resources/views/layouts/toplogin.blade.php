@include('alerts.requestflash')
<div class="top">
    <p class="logo">COTAÇÃO DE FRETES</>

    <div class="login">
        <form name="form1" action="{{ url('/login') }}"  method="post">
            {!! csrf_field() !!}

            <fieldset  class="grupo" style="background-color:  #333333">
                <div class="campo">
                    <label for="email" style="color: #f7c201"> E-mail</label>
                    <input type="text" value="{{ old('email') }}"   name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'e-mail';}" style="width: 250px" />

                </div>
                <div class="campo">
                    <label for="password" style="color: #f7c201"> Senha</label>
                    <input type="password" value="" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Senha';}" style="width: 110px"/>


                </div>



                <!-- <p class="age"><a href="#">Login</a></p> -->

            </fieldset>

            <input type="submit" value="Login" >



        </form>
    </div>
</div>