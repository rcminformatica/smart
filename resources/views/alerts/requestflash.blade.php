@if(count($errors) > 0)


    {!!notify()->flash($errors->first(), 'error',['timer' => 2000]) !!}


@endif