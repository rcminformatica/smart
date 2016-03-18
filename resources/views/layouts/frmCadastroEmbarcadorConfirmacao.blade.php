@extends('layouts.principal')
@section('content')


<!--	  <div class="contact-content">
    <div class="top-header span_top">
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" alt="" /></a>
            <p>Movie Theater</p>
        </div>
        <div class="search v-search">
            <form>
                <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
                <input type="submit" value="">
            </form>
        </div>
        <div class="clearfix"></div>
    </div> -->
<!---contact-->
<div class="clearfix"></div>
<div class="centraliza">
<legend>Seu cadastro realizado com sucesso ! ..</legend>
<p> Enviamos uma confirmação para o seu e-mail !</p>
<p> Efetue seu login <a href="{{!! url('/cadastro') !!}}"/> Aqui </p>
</div>
<div class="clearfix"></div>

@endsection